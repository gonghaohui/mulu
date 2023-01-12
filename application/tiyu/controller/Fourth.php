<?php
namespace app\tiyu\controller;

use think\Page;
use think\Request;
use think\Db;

class Fourth extends PcBase
{
    public function index(){
        //1:新闻2直播:3录像:4:集锦
        $url_array = Request::instance()->param();
        $f_url = $url_array['f_string'];
        $url = $f_url.'/'.$url_array['s_string'].'/'.$url_array['t_string'];
        $fourth = Db::name('mulu_category')->alias('c')
            ->join('think_mulu_category cc','cc.category_id = c.pid')
            ->where('c.pinyin',$url)->where('c.status',1)
            ->field('c.*,cc.pinyin as p_pinyin,cc.category_name as p_category_name')
            ->find();
        if(empty($fourth))
        {
            throw new \think\exception\HttpException(404, '页面不存在');
        }

        $this->assign('f_url',$f_url);
        $this->assign('url',$url);
        $this->assign('fourth',$fourth);

        $p = input('p',1);

        if($fourth['type'] == $this->type_new){
            $count = Db::name('mulu_articles')
                ->where('c_id',$fourth['category_id'])->where('status',1)
                ->count();
            if( ceil($count/$this->num) > $this->limit_pages ){
                $count = $this->limit_pages * $this->num;
            }
            $page = new Page($count, $this->num);
            $lists = Db::name('mulu_articles')
                ->where('status',1)
                ->where('c_id',$fourth['category_id'])
                ->order('article_id','desc')
                ->limit($page->firstRow . ',' . $page->listRows)->select();

            $this->assign('lists',$lists);
            $this->assign('page',$page);
            $this->assign('p',$p);

            $hot_news = Db::name('mulu_articles')->alias('a')
                ->join('think_mulu_category c','c.category_id = a.c_id')
                ->where('a.status',1)
                ->where('a.hot',1)
                ->order('a.article_id','desc')
                ->limit('10')
                ->field('a.article_id,a.title,c.top_id')
                ->select();
            $this->assign('hot_news',$hot_news);

            $team_tags = Db::name('mulu_new_tags')
                ->where('tag_category_new_relative',$fourth['category_id'])
                ->select();
            $this->assign('team_tags',$team_tags);

            $hot_tags = Db::name('mulu_category')
                ->where('pid','in',function ($query){
                    $query->name('mulu_category')->where('pid',0)->where('type',$this->type_new)->field('category_id');
                })
                ->field('category_id,category_name,tag_id')
                ->select();
            foreach ($hot_tags as $key => $tag){
                $hot_tags[$key]['category_name'] = str_replace('新闻','',$tag['category_name']);
                $tags = Db::name('mulu_category')
                    ->where('pid',$tag['category_id'])
                    ->field('category_id,category_name,tag_id')
                    ->select();
                $hot_tags[$key]['tags'] = $tags;
            }
            $this->assign('hot_tags',$hot_tags);

            //搜索栏目
            $this->assign('fourth',$fourth);
            $zhibo_category = Db::name('mulu_category')
                ->where('status',1)->where('category_name',$fourth['category_name'])->where('type',$this->type_zhibo)
                ->field('pinyin')
                ->find();
            if(empty($zhibo_category)){
                $zhibo_category['pinyin'] = '';
            }
            $this->assign('zhibo_category',$zhibo_category);

            $highlight_category = Db::name('mulu_category')
                ->where('status',1)->where('category_name',$fourth['category_name'])->where('type',$this->type_highlight)
                ->field('pinyin')
                ->find();
            if(empty($highlight_category)){
                $highlight_category['pinyin'] = '';
            }
            $this->assign('highlight_category',$highlight_category);

            $video_category = Db::name('mulu_category')
                ->where('status',1)->where('category_name',$fourth['category_name'])->where('type',$this->type_video)
                ->field('pinyin,category_id')
                ->find();
            if(empty($video_category)){
                $video_category['pinyin'] = '';
            }
            $this->assign('video_category',$video_category);

            $this->assign('top_category',$this->top_category);
            return $this->fetch('fourth/new_list');


        }else if ($fourth['type'] == $this->type_video){
            $count = Db::name('mulu_videos')
                ->where('c_id',$fourth['category_id'])->where('status',1)
                ->count();
            if( ceil($count/$this->num) > $this->limit_pages ){
                $count = $this->limit_pages * $this->num;
            }
            $page = new Page($count, $this->num);
            $lists = Db::name('mulu_videos')
                ->where('status',1)
                ->where('c_id',$fourth['category_id'])
                ->order('id','desc')
                ->limit($page->firstRow . ',' . $page->listRows)->select();

            $this->assign('lists',$lists);
            $this->assign('page',$page);
            $this->assign('p',$p);

            $hot_news = Db::name('mulu_articles')->alias('a')
                ->join('think_mulu_category c','c.category_id = a.c_id')
                ->where('a.status',1)
                ->where('a.hot',1)
                ->order('a.article_id','desc')
                ->limit('10')
                ->field('a.article_id,a.title,c.top_id')
                ->select();
            $this->assign('hot_news',$hot_news);

            $team_tags = Db::name('mulu_new_tags')
                ->where('tag_category_video_relative',$fourth['category_id'])
                ->select();
            $this->assign('team_tags',$team_tags);

            $hot_tags = Db::name('mulu_category')
                ->where('pid','in',function ($query){
                    $query->name('mulu_category')->where('pid',0)->where('type',$this->type_video)->field('category_id');
                })
                ->field('category_id,category_name,tag_id')
                ->select();
            foreach ($hot_tags as $key => $tag){
                $hot_tags[$key]['category_name'] = str_replace('录像','',$tag['category_name']);
                $tags = Db::name('mulu_category')
                    ->where('pid',$tag['category_id'])
                    ->field('category_id,category_name,tag_id')
                    ->select();
                $hot_tags[$key]['tags'] = $tags;
            }
            $this->assign('hot_tags',$hot_tags);

            //搜索栏目
            $zhibo_category = Db::name('mulu_category')
                ->where('status',1)->where('category_name',$fourth['category_name'])->where('type',$this->type_zhibo)
                ->field('pinyin')
                ->find();
            if(empty($zhibo_category)){
                $zhibo_category['pinyin'] = '';
            }
            $this->assign('zhibo_category',$zhibo_category);

            $highlight_category = Db::name('mulu_category')
                ->where('status',1)->where('category_name',$fourth['category_name'])->where('type',$this->type_highlight)
                ->field('pinyin')
                ->find();
            if(empty($highlight_category)){
                $highlight_category['pinyin'] = '';
            }
            $this->assign('highlight_category',$highlight_category);

            $new_category = Db::name('mulu_category')
                ->where('status',1)->where('category_name',$fourth['category_name'])->where('type',$this->type_new)
                ->field('pinyin,category_id')
                ->find();
            if(empty($new_category)){
                $new_category['pinyin'] = '';
            }
            $this->assign('new_category',$new_category);

            $this->assign('top_category',$this->top_category);
            return $this->fetch('fourth/video');


        }else if($fourth['type'] == $this->type_highlight){
            $count = Db::name('mulu_videos')
                ->where('c_id',$fourth['category_id'])->where('status',1)
                ->count();
            if( ceil($count/$this->num) > $this->limit_pages ){
                $count = $this->limit_pages * $this->num;
            }
            $page = new Page($count, $this->num);
            $lists = Db::name('mulu_highlights')
                ->where('status',1)
                ->where('c_id',$fourth['category_id'])
                ->order('id','desc')
                ->limit($page->firstRow . ',' . $page->listRows)->select();

            $this->assign('lists',$lists);
            $this->assign('page',$page);
            $this->assign('p',$p);

            $hot_news = Db::name('mulu_articles')->alias('a')
                ->join('think_mulu_category c','c.category_id = a.c_id')
                ->where('a.status',1)
                ->where('a.hot',1)
                ->order('a.article_id','desc')
                ->limit('10')
                ->field('a.article_id,a.title,c.top_id')
                ->select();
            $this->assign('hot_news',$hot_news);

            $team_tags = Db::name('mulu_new_tags')
                ->where('tag_category_highlight_relative',$fourth['category_id'])
                ->select();
            $this->assign('team_tags',$team_tags);

            $hot_tags = Db::name('mulu_category')
                ->where('pid','in',function ($query){
                    $query->name('mulu_category')->where('pid',0)->where('type',$this->type_highlight)->field('category_id');
                })
                ->field('category_id,category_name,tag_id')
                ->select();
            foreach ($hot_tags as $key => $tag){
                $hot_tags[$key]['category_name'] = str_replace('集锦','',$tag['category_name']);
                $tags = Db::name('mulu_category')
                    ->where('pid',$tag['category_id'])
                    ->field('category_id,category_name,tag_id')
                    ->select();
                $hot_tags[$key]['tags'] = $tags;
            }
            $this->assign('hot_tags',$hot_tags);

            //搜索栏目
            $zhibo_category = Db::name('mulu_category')
                ->where('status',1)->where('category_name',$fourth['category_name'])->where('type',$this->type_zhibo)
                ->field('pinyin')
                ->find();
            if(empty($zhibo_category)){
                $zhibo_category['pinyin'] = '';
            }
            $this->assign('zhibo_category',$zhibo_category);

            $video_category = Db::name('mulu_category')
                ->where('status',1)->where('category_name',$fourth['category_name'])->where('type',$this->type_video)
                ->field('pinyin')
                ->find();
            if(empty($video_category)){
                $video_category['pinyin'] = '';
            }
            $this->assign('video_category',$video_category);

            $new_category = Db::name('mulu_category')
                ->where('status',1)->where('category_name',$fourth['category_name'])->where('type',$this->type_new)
                ->field('pinyin,category_id')
                ->find();
            if(empty($new_category)){
                $new_category['pinyin'] = '';
            }
            $this->assign('new_category',$new_category);

            $this->assign('top_category',$this->top_category);
            return $this->fetch('fourth/highlight');


        }else if($fourth['type'] == $this->type_zhibo){

            $this->assign('fourth',$fourth);
            $type_name = $fourth['t'] == 1 ? '足球' : '篮球';
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
                ->where('z.c_id',$fourth['category_id'])
                ->where('z.status',1)->where('create_time','between',[$today_time,$end_time])->where('z.t',$fourth['t'])
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
                ->where('v.c_id',$fourth['category_id'])
                ->where('v.status',1)
                ->where('v.create_time','between',[$video_end_time,$video_today_time])
                ->where('v.t',$fourth['t'])
                ->order('v.create_time desc')
                ->field('v.id,v.title,v.create_time,c.category_name,c.pinyin,c.top_id')
                ->select();
            foreach ($video_data as $item){
                $dd = date('Ymd',$item['create_time']);
                $videoData[$dd]['list'][] = $item;
            }
            $this->assign('videoData',$videoData);

            $this->assign('top_category',$this->top_category);
            return $this->fetch('fourth/zhibo');


        }




    }







}