<?php
namespace app\tiyu\controller;

use think\Request;
use think\Db;

class Third extends PcBase
{

    public function index()
    {
        //1:新闻2直播:3录像:4:集锦
        $url_array = Request::instance()->param();
        $f_url = $url_array['f_string'];
        $url = $f_url.'/'.$url_array['s_string'];
        $third = Db::name('mulu_category')->alias('c')
            ->join('think_mulu_category cc','cc.category_id = c.pid')
            ->where('c.pinyin',$url)->where('c.status',1)
            ->field('c.*,cc.pinyin as p_pinyin,cc.category_name as p_category_name,c.t')
            ->find();
        if(empty($third))
        {
            throw new \think\exception\HttpException(404, '页面不存在');
        }
        $this->assign('f_url',$f_url);
        $this->assign('third',$third);

        if($third['type'] == $this->type_new){
            //足球新闻

            $teams = Db::name('mulu_category')
                ->where('pid',$third['category_id'])->where('status',1)->where('support',1)
                ->order('sort','asc')
                ->field('category_id,pinyin,category_name,img')
                ->limit(6)
                ->select();
            $top_right = $teams;
            foreach ($top_right as $key => $right){
                $right_news = Db::name('mulu_articles')
                    ->where('status',1)->where('c_id',$right['category_id'])
                    ->field('article_id,title')
                    ->order('article_id','desc')
                    ->limit(5)
                    ->select();
                $top_right[$key]['news'] = $right_news;
            }
            $this->assign('top_right',$top_right);

            foreach ($teams as $key => $team){
                $players = Db::name('mulu_new_tags')
                    ->where('tag_category_new_relative',$team['category_id'])->where('hot',1)
                    ->order('new_tag_id','asc')
                    ->limit(6)
                    ->field('tag_name,new_tag_id')
                    ->select();
                foreach ($players as $t => $player){
                    $news = Db::name('mulu_new_tag_relative')->alias('r')
                        ->join('think_mulu_articles a','a.article_id = r.article_id')
                        ->where('a.status',1)->where('r.tag_id',$player['new_tag_id'])
                        ->field('a.article_id,a.title')
                        ->order('r.r_id','desc')
                        ->limit(10)
                        ->select();
                    $players[$t]['news'] = $news;

                }

                $teams[$key]['players'] = $players;
            }
            $this->assign('teams',$teams);

            //直播列表
            $all_games_url = Db::name('mulu_category')->find(3);
            $this->assign('all_games_url',$all_games_url);

            $hot_games = Db::name('mulu_zhibos')->alias('z')
                ->join('think_mulu_category c','c.category_id = z.c_id')
                ->where('z.t',$third['t'])
                ->order('z.create_time desc')
                ->field('z.*,c.top_id')
                ->limit(10)
                ->select();
            $this->assign('hot_games',$hot_games);
            $this->assign('time',time());

            $this->assign('top_category',$this->top_category);
            return $this->fetch('third/new');
        }else if($third['type'] == $this->type_zhibo){
            $this->assign('third',$third);

            $type_name = $third['t'] == 1 ? '足球' : '篮球';
            $this->assign('type_name',$type_name);
            $now = date("Y-m-d H:i:s",time());
            $this->assign('now',$now);
            $today_time = strtotime(date("Y-m-d",time()).' 00:00:00');
//            $today_time = strtotime(date("Y-m-d",1659722400).' 00:00:00');
            $days = 10;
            //直播时间
            $zhiboData = $this->zhibo_data($today_time,$days,true);
            $end_time = $today_time + (86400 * $days);
            $zhibo_data = Db::name('mulu_zhibos')->alias('z')
                ->join('mulu_category c','c.category_id = z.c_id')
                ->where('z.c_id',$third['category_id'])
                ->where('z.status',1)->where('create_time','between',[$today_time,$end_time])->where('z.t',$third['t'])
                ->order('z.create_time asc')
                ->field('z.*,c.category_name,c.pinyin')
                ->select();
            foreach ($zhibo_data as $item){
                $dd = date('Ymd',$item['create_time']);
                $item['category_name'] = str_replace('直播','',$item['category_name']);
                $zhiboData[$dd]['list'][] = $item;

            }
            $this->assign('zhiboData',$zhiboData);

            $video_today_time = strtotime(date("Y-m-d",time()).' 23:59:59');
            $video_end_time = $video_today_time - (86400 * $days);
            $videoData = $this->zhibo_data($video_today_time,$days,false);
            $video_data = Db::name('mulu_videos')->alias('v')
                ->join('mulu_category c','c.category_id = v.c_id')
                ->where('v.c_id',$third['category_id'])
                ->where('v.status',1)
                ->where('v.create_time','between',[$video_end_time,$video_today_time])
                ->where('v.t',$third['t'])
                ->order('v.create_time desc')
                ->field('v.id,v.title,v.create_time,c.category_name,c.pinyin,c.top_id')
                ->select();
            foreach ($video_data as $item){
                $dd = date('Ymd',$item['create_time']);
                $videoData[$dd]['list'][] = $item;
            }
            $this->assign('videoData',$videoData);
//            print_r($videoData);exit;

            $this->assign('top_category',$this->top_category);
            return $this->fetch('third/zhibo');

        }else if($third['type'] == $this->type_video){
            $third['video_name'] = str_replace('录像','',$third['category_name']);
            $third['zhibo_name'] = $third['video_name'].'直播';
            $third['highlight_name'] = $third['video_name'].'集锦';
            $third['new_name'] = $third['video_name'].'新闻';
            $this->assign('third',$third);

            $hot_video = Db::name('mulu_videos')->alias('v')
                ->join('mulu_category c','c.category_id = v.c_id')
                ->where('v.status',1)->where('v.c_id',$third['category_id'])->where('v.hot',1)
                ->order('v.id desc')
                ->field('v.*,c.top_id')
                ->limit(20)
                ->select();
            $this->assign('hot_video',$hot_video);

            $latest_video = Db::name('mulu_videos')->alias('v')
                ->join('mulu_category c','c.category_id = v.c_id')
                ->where('v.status',1)->where('v.c_id',$third['category_id'])->where('v.hot',0)
                ->order('v.create_time desc')
                ->field('v.*,c.top_id')
                ->limit(20)
                ->select();
            $this->assign('latest_video',$latest_video);

            //搜索栏目
            $zhibo_category = Db::name('mulu_category')
                ->where('status',1)->where('category_name',$third['zhibo_name'])->where('type',$this->type_zhibo)
                ->field('pinyin')
                ->find();
            if(empty($zhibo_category)){
                $zhibo_category['pinyin'] = '';
            }
            $this->assign('zhibo_category',$zhibo_category);

            $highlight_category = Db::name('mulu_category')
                ->where('status',1)->where('category_name',$third['highlight_name'])->where('type',$this->type_highlight)
                ->field('pinyin')
                ->find();
            if(empty($highlight_category)){
                $highlight_category['pinyin'] = '';
            }
            $this->assign('highlight_category',$highlight_category);

            $new_category = Db::name('mulu_category')
                ->where('status',1)->where('category_name',$third['new_name'])->where('type',$this->type_new)
                ->field('pinyin,category_id')
                ->find();
            if(empty($new_category)){
                $new_category['pinyin'] = '';
            }
            $this->assign('new_category',$new_category);

            if(!empty($new_category)){
                $teams = Db::name('mulu_category')
                    ->where('pid',$new_category['category_id'])->where('status',1)->where('support',1)
                    ->order('sort','asc')
                    ->field('category_id,pinyin,category_name,img')
                    ->limit(6)
                    ->select();
                foreach ($teams as $key => $team){
                    $players = Db::name('mulu_new_tags')
                        ->where('tag_category_new_relative',$team['category_id'])->where('hot',1)
                        ->order('new_tag_id','asc')
                        ->limit(6)
                        ->field('tag_name,new_tag_id')
                        ->select();
                    foreach ($players as $t => $player){
                        $news = Db::name('mulu_new_tag_relative')->alias('r')
                            ->join('think_mulu_articles a','a.article_id = r.article_id')
                            ->where('a.status',1)->where('r.tag_id',$player['new_tag_id'])->where('r.type',$this->type_new)
                            ->field('a.article_id,a.title')
                            ->order('r.r_id','desc')
                            ->limit(10)
                            ->select();
                        $players[$t]['news'] = $news;
                    }
                    $teams[$key]['players'] = $players;
                }
            }else{
                $teams = [];
            }
            $this->assign('teams',$teams);

            $this->assign('top_category',$this->top_category);
            return $this->fetch('third/video');

        }else if($third['type'] == $this->type_highlight){
            $third['highlight_name'] = str_replace('集锦','',$third['category_name']);
            $third['zhibo_name'] = $third['highlight_name'].'直播';
            $third['video_name'] = $third['highlight_name'].'录像';
            $third['new_name'] = $third['highlight_name'].'新闻';
            $this->assign('third',$third);

            $hot_highlight = Db::name('mulu_highlights')->alias('v')
                ->join('mulu_category c','c.category_id = v.c_id')
                ->where('v.status',1)->where('v.c_id',$third['category_id'])->where('v.hot',1)
                ->order('v.id desc')
                ->field('v.*,c.top_id')
                ->limit(20)
                ->select();
            $this->assign('hot_highlight',$hot_highlight);

            $latest_highlight = Db::name('mulu_highlights')->alias('v')
                ->join('mulu_category c','c.category_id = v.c_id')
                ->where('v.status',1)->where('v.c_id',$third['category_id'])->where('v.hot',0)
                ->order('v.create_time desc')
                ->field('v.*,c.top_id')
                ->limit(20)
                ->select();
            $this->assign('latest_highlight',$latest_highlight);

            $zhibo_category = Db::name('mulu_category')
                ->where('status',1)->where('category_name',$third['zhibo_name'])->where('type',$this->type_zhibo)
                ->field('pinyin')
                ->find();
            if(empty($zhibo_category)){
                $zhibo_category['pinyin'] = '';
            }
            $this->assign('zhibo_category',$zhibo_category);

            $video_category = Db::name('mulu_category')
                ->where('status',1)->where('category_name',$third['video_name'])->where('type',$this->type_video)
                ->field('pinyin')
                ->find();
            if(empty($video_category)){
                $video_category['pinyin'] = '';
            }
            $this->assign('video_category',$video_category);

            $new_category = Db::name('mulu_category')
                ->where('status',1)->where('category_name',$third['new_name'])->where('type',$this->type_new)
                ->field('pinyin,category_id')
                ->find();
            if(empty($new_category)){
                $new_category['pinyin'] = '';
            }
            $this->assign('new_category',$new_category);

            if(!empty($new_category)){
                $teams = Db::name('mulu_category')
                    ->where('pid',$new_category['category_id'])->where('status',1)->where('support',1)
                    ->order('sort','asc')
                    ->field('category_id,pinyin,category_name,img')
                    ->limit(6)
                    ->select();
                foreach ($teams as $key => $team){
                    $players = Db::name('mulu_new_tags')
                        ->where('tag_category_new_relative',$team['category_id'])->where('hot',1)
                        ->order('new_tag_id','asc')
                        ->limit(6)
                        ->field('tag_name,new_tag_id')
                        ->select();
                    foreach ($players as $t => $player){
                        $news = Db::name('mulu_new_tag_relative')->alias('r')
                            ->join('think_mulu_articles a','a.article_id = r.article_id')
                            ->where('a.status',1)->where('r.tag_id',$player['new_tag_id'])->where('r.type',$this->type_new)
                            ->field('a.article_id,a.title')
                            ->order('r.r_id','desc')
                            ->limit(10)
                            ->select();
                        $players[$t]['news'] = $news;
                    }
                    $teams[$key]['players'] = $players;
                }
            }else{
                $teams = [];
            }
            $this->assign('teams',$teams);

            $this->assign('top_category',$this->top_category);
            return $this->fetch('third/highlight');
        }


    }

}