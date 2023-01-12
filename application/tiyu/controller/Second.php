<?php
namespace app\tiyu\controller;

use think\Request;
use think\Db;

class Second extends PcBase
{

    public function index()
    {
        //1:新闻2直播:3录像:4:集锦
        $url_array = Request::instance()->param();
        $url = $url_array['f_string'];
        $second = Db::name('mulu_category')->where('pinyin',$url)->where('status',1)->find();
        if(empty($second))
        {
            throw new \think\exception\HttpException(404, '页面不存在');
        }
        $this->assign('url',$url);
        $this->assign('second',$second);

        if($second['type'] == $this->type_new and $second['t'] == $this->football){
            //足球新闻
            $leagues = Db::name('mulu_category')
                ->where('category_id','in','27,28,29,30,31,32')
                ->where('t',$second['t'])
                ->where('status',1)
                ->order('sort','asc')
                ->field('category_id,pinyin,category_name,img')
                ->select();
//            print_r($leagues);exit;

            $top_right = $leagues;
            foreach ($top_right as $key => $right){
                $top_right[$key]['category_name'] = str_replace('新闻','',$right['category_name']);
                $right_news = Db::name('mulu_articles')
                    ->where('status',1)->where('c_id',$right['category_id'])->where('t',$second['t'])
                    ->field('article_id,title')
                    ->order('article_id','desc')
                    ->limit(5)
                    ->select();
                $top_right[$key]['news'] = $right_news;
            }
            $this->assign('top_right',$top_right);

            foreach ($leagues as $key => $league){
                $teams = Db::name('mulu_category')
                    ->where('status',1)->where('pid',$league['category_id'])->where('support',1)
                    ->order('sort','asc')
                    ->limit(4)
                    ->field('category_id,pinyin,category_name,img')
                    ->select();
                foreach ($teams as $t => $team){
                    $news = Db::name('mulu_articles')
                        ->where('status',1)->where('c_id',$team['category_id'])
                        ->field('article_id,title')
                        ->order('article_id','desc')
                        ->limit(10)
                        ->select();
                    $teams[$t]['news'] = $news;

                }

                $leagues[$key]['teams'] = $teams;
            }
            $this->assign('leagues',$leagues);

            $three = Db::name('mulu_articles')->alias('a')
                ->join('think_mulu_category c','c.category_id = a.c_id')
                ->where('a.hot',1)->where('a.content_img',1)->where('a.status',1)->where('a.t',$this->football)
                ->order('a.article_id desc')
                ->field('a.title,a.thumbnail,a.article_id,c.top_id')
                ->limit(3)
                ->select();
            $this->assign('three',$three);

            $hot_games = Db::name('mulu_zhibos')->alias('z')
                ->join('think_mulu_category c','c.category_id = z.c_id')
                ->where('z.t',$second['t'])
                ->order('z.create_time desc')
                ->field('z.*,c.top_id')
                ->limit(10)
                ->select();
            $this->assign('hot_games',$hot_games);
            $this->assign('time',time());

            $other_games_url = Db::name('mulu_category')
                ->where('category_id','in','9,10,11')
                ->order('sort asc')
                ->select();
            $this->assign('other_games_url',$other_games_url);

            $all_games_url = Db::name('mulu_category')->find(3);
            $this->assign('all_games_url',$all_games_url);

            $this->assign('top_category',$this->top_category);
            return $this->fetch('second/new_football');


        }else if($second['type'] == $this->type_new and $second['t'] == $this->basketball){
            //篮球新闻
            $leagues = Db::name('mulu_category')
                ->where('category_id','in','39,40,610,630,631')->where('status',1)
                ->order('sort','asc')
                ->field('category_id,pinyin,category_name,img')
                ->select();

            $top_right = $leagues;
            foreach ($top_right as $key => $right){
                $top_right[$key]['category_name'] = str_replace('新闻','',$right['category_name']);
                $right_news = Db::name('mulu_articles')
                    ->where('status',1)->where('c_id',$right['category_id'])
                    ->field('article_id,title')
                    ->order('article_id','desc')
                    ->limit(5)
                    ->select();
                $top_right[$key]['news'] = $right_news;
            }
            $this->assign('top_right',$top_right);

            $nba_highlight = Db::name('mulu_highlights')->alias('h')
                ->join('mulu_category c','c.category_id = h.c_id')
                ->where('h.status',1)
                ->where('h.c_id',37)
                ->order('h.id','desc')
                ->field('h.id,h.title,c.top_id')
                ->limit(5)
                ->select();
            $this->assign('nba_highlight',$nba_highlight);

            $teams = Db::name('mulu_category')
                ->where('category_id','in','634,610,630,635,631')
//                ->where('category_id','in','634,610')
                ->where('status',1)
                ->field('category_id,category_name,img,top_id,pinyin')
                ->select();
            foreach ($teams as $key => $team){

                $tags = Db::name('mulu_new_tags')
                    ->where('tag_category_new_relative',$team['category_id'])
                    ->where('hot',1)
                    ->field('tag_name,new_tag_id')
                    ->select();

                array_unshift($tags,['tag_name'=>$team['category_name'],'category_id'=>$team['category_id'],'type'=>'team']);

                foreach ($tags as $kk => $tag){
                    if(isset($tag['type'])){
                        $news = Db::name('mulu_articles')
                            ->where('status',1)->where('c_id',$tag['category_id'])
                            ->field('article_id,title')
                            ->order('article_id','desc')
                            ->limit(10)
                            ->select();
                        $tags[$kk]['news'] = $news;
                    }else{
                        $news = Db::name('mulu_new_tag_relative')->alias('r')
                            ->join('think_mulu_articles a','a.article_id = r.article_id')
                            ->where('r.tag_id',$tag['new_tag_id'])
                            ->where('a.status',1)
                            ->order('r.article_id','desc')
                            ->field('a.article_id,a.title')
                            ->limit(10)
                            ->select();
                        $tags[$kk]['news'] = $news;

                    }

                }

                $teams[$key]['team_array'] = $tags;
            }
            $this->assign('teams',$teams);

            $three = Db::name('mulu_articles')->alias('a')
                ->join('think_mulu_category c','c.category_id = a.c_id')
                ->where('a.hot',1)->where('a.content_img',1)->where('a.status',1)->where('a.t',$this->basketball)
                ->order('a.article_id desc')
                ->field('a.title,a.thumbnail,a.article_id,c.top_id')
                ->limit(3)
                ->select();
            $this->assign('three',$three);

            $hot_games = Db::name('mulu_zhibos')->alias('z')
                ->join('think_mulu_category c','c.category_id = z.c_id')
                ->where('z.t',$second['t'])
                ->order('z.create_time desc')
                ->field('z.*,c.top_id')
                ->limit(10)
                ->select();
            $this->assign('hot_games',$hot_games);
            $this->assign('time',time());

            $other_games_url = Db::name('mulu_category')
                ->where('category_id','in','33,34')
                ->order('sort asc')
                ->select();
            $this->assign('other_games_url',$other_games_url);

            $all_games_url = Db::name('mulu_category')->find(4);
            $this->assign('all_games_url',$all_games_url);

            $this->assign('top_category',$this->top_category);
            return $this->fetch('second/new_basketball');

        }else if($second['type'] == $this->type_video){
            //录像
            $lians = Db::name('mulu_category')
                ->where('pid',$second['category_id'])
                ->where('status',1)
                ->field('category_name,pinyin,category_id')
                ->select();

            $lians_news = $lians;
            foreach ($lians as $key => $lian){
                $lians[$key]['category_name'] = str_replace('录像','球队',$lian['category_name']);
                $lians[$key]['teams'] = Db::name('mulu_category')
                    ->where('pid',$lian['category_id'])
                    ->where('status',1)
                    ->field('category_id,category_name,pinyin,img')
                    ->select();
            }
            $this->assign('lians',$lians);

            $type_name = $second['t'] == 1 ? '足球' : '篮球';
            $this->assign('type_name',$type_name);
            $hot_videos = Db::name('mulu_videos')->alias('v')
                ->join('mulu_category c','c.category_id = v.c_id')
                ->where('v.status',1)->where('v.t',$second['t'])
                ->where('v.hot',1)
                ->order('v.id','desc')
                ->limit(20)
                ->field('v.id,v.title,v.create_time,c.top_id')
                ->select();
            $this->assign('hot_videos',$hot_videos);

            $latest_videos = Db::name('mulu_videos')->alias('v')
                ->join('mulu_category c','c.category_id = v.c_id')
                ->where('v.status',1)->where('v.t',$second['t'])
                ->where('v.hot',0)
                ->order('v.id','desc')
                ->limit(20)
                ->field('v.id,v.title,v.create_time,c.top_id')
                ->select();
            $this->assign('latest_videos',$latest_videos);

            foreach ($lians_news as $key => $l){
                $lians_news[$key]['teams'] = Db::name('mulu_category')
                    ->where('pid',$l['category_id'])
                    ->where('status',1)
                    ->where('support',1)
                    ->field('category_id,category_name,pinyin,img')
                    ->select();

                $lians_news[$key]['videos'] = Db::name('mulu_videos')->alias('v')
                    ->join('mulu_category c','c.category_id = v.c_id')
                    ->where('v.status',1)->where('v.c_id',$l['category_id'])
                    ->order('v.id','desc')
                    ->limit(20)
                    ->field('v.id,v.title,v.create_time,c.top_id')
                    ->select();
            }
            $this->assign('lians_news',$lians_news);

            $this->assign('top_category',$this->top_category);
            return $this->fetch('second/video');
        }else if($second['type'] == $this->type_highlight){
            //集锦
            $type_name = $second['t'] == 1 ? '足球' : '篮球';
            $this->assign('type_name',$type_name);
            $hot_highlights = Db::name('mulu_highlights')->alias('v')
                ->join('mulu_category c','c.category_id = v.c_id')
                ->where('v.status',1)->where('v.t',$second['t'])
                ->where('v.hot',1)
                ->order('v.id','desc')
                ->limit(20)
                ->field('v.id,v.title,v.create_time,c.top_id')
                ->select();
            $this->assign('hot_highlights',$hot_highlights);

            $latest_highlights = Db::name('mulu_highlights')->alias('v')
                ->join('mulu_category c','c.category_id = v.c_id')
                ->where('v.status',1)->where('v.t',$second['t'])
                ->where('v.hot',0)
                ->order('v.id','desc')
                ->limit(20)
                ->field('v.id,v.title,v.create_time,c.top_id')
                ->select();
            $this->assign('latest_highlights',$latest_highlights);

            $lians_news = Db::name('mulu_category')
                ->where('pid',$second['category_id'])
                ->where('status',1)
                ->field('category_name,pinyin,category_id')
                ->select();
            foreach ($lians_news as $key => $l){
                $lians_news[$key]['teams'] = Db::name('mulu_category')
                    ->where('pid',$l['category_id'])
                    ->where('status',1)
                    ->where('support',1)
                    ->field('category_id,category_name,pinyin,img')
                    ->select();

                $lians_news[$key]['videos'] = Db::name('mulu_highlights')->alias('v')
                    ->join('mulu_category c','c.category_id = v.c_id')
                    ->where('v.status',1)->where('v.c_id',$l['category_id'])
                    ->order('v.id','desc')
                    ->limit(20)
                    ->field('v.id,v.title,v.create_time,c.top_id')
                    ->select();
            }
            $this->assign('lians_news',$lians_news);


            $this->assign('top_category',$this->top_category);
            return $this->fetch('second/highlight');
        }else if($second['type'] == $this->type_zhibo){
            //直播
            $type_name = $second['t'] == 1 ? '足球' : '篮球';
            $this->assign('type_name',$type_name);
            $now = date("Y-m-d H:i:s",time());
            $this->assign('now',$now);

            $today_time = strtotime(date("Y-m-d",time()).' 00:00:00');
//            $today_time = strtotime(date("Y-m-d",1659722400).' 00:00:00');
            $days = 10;
            //直播时间
            $zhiboData = $this->zhibo_data($today_time,$days,true);
//            print_r($zhiboData);exit;
            $end_time = $today_time + (86400 * $days);
//            echo date('Y-m-d H:i:s',$end_time);exit;
            $zhibo_data = Db::name('mulu_zhibos')->alias('z')
                ->join('mulu_category c','c.category_id = z.c_id')
                ->where('z.status',1)->where('create_time','between',[$today_time,$end_time])->where('z.t',$second['t'])
                ->order('z.create_time asc')
                ->field('z.*,c.category_name,c.pinyin')
                ->select();
            foreach ($zhibo_data as $item){
                $dd = date('Ymd',$item['create_time']);
                $item['category_name'] = str_replace('直播','',$item['category_name']);
                $zhiboData[$dd]['list'][] = $item;

            }
            $this->assign('zhiboData',$zhiboData);
//            print_r($zhiboData);exit;

            //录像时间
            $video_today_time = strtotime(date("Y-m-d",time()).' 23:59:59');
//            $video_today_time = strtotime(date("Y-m-d",1670226707).' 23:59:59');
            $video_end_time = $video_today_time - (86400 * $days);
            $videoData = $this->zhibo_data($video_today_time,$days,false);
            $video_data = Db::name('mulu_videos')->alias('v')
                ->join('mulu_category c','c.category_id = v.c_id')
                ->where('v.status',1)
                ->where('v.create_time','between',[$video_end_time,$video_today_time])
                ->where('v.t',$second['t'])
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
            return $this->fetch('second/zhibo');
        }


    }//if($category['type'] == 1)

}