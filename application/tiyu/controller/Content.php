<?php
namespace app\tiyu\controller;

use think\Request;
use think\Db;

class Content extends PcBase
{

    public function index(){
        //1:新闻2直播:3录像:4:集锦

        $url_array = Request::instance()->param();
        $url = $url_array['f_string'];
        $id = $url_array['id'];

        $category = Db::name('mulu_category')
            ->where('pinyin',$url)
            ->where('status',1)
            ->find();
        if(empty($category))
        {
            throw new \think\exception\HttpException(404, '页面不存在');
        }

        if($category['type'] == $this->type_new){
            $new = Db::name('mulu_articles')->alias('a')
                ->join('think_mulu_category c','c.category_id = a.c_id')
                ->where('a.status',1)->where('a.article_id',$id)
                ->field('a.*,c.category_name,c.pinyin,c.tag_id,c.pid')
                ->find();

            if(empty($new))
            {
                throw new \think\exception\HttpException(404, '页面不存在');
            }

            $new['name'] = str_replace('新闻','',$new['category_name']);
            if($new['pid'] == 0){
                $new_category['pinyin'] = '';
                $zhibo_category['pinyin'] = '';
                $video_category['pinyin'] = '';
                $highlight_category['pinyin'] = '';
            }else{
                $zhibo_category = Db::name('mulu_category')
                    ->where('status',1)->where('category_name','like',$new['name']."%")->where('type',$this->type_zhibo)
                    ->field('pinyin')
                    ->find();
                if(empty($zhibo_category)){
                    $zhibo_category['pinyin'] = '';
                }
                $this->assign('zhibo_category',$zhibo_category);

                $video_category = Db::name('mulu_category')
                    ->where('status',1)->where('category_name','like',$new['name']."%")->where('type',$this->type_video)
                    ->field('pinyin')
                    ->find();
                if(empty($video_category)){
                    $video_category['pinyin'] = '';
                }
                $this->assign('video_category',$video_category);

                $highlight_category = Db::name('mulu_category')
                    ->where('status',1)->where('category_name','like',$new['name']."%")->where('type',$this->type_highlight)
                    ->field('pinyin')
                    ->find();
                if(empty($highlight_category)){
                    $highlight_category['pinyin'] = '';
                }
                $this->assign('highlight_category',$highlight_category);
            }

            $this->assign('top_category',$this->top_category);
            $this->assign('url',$url);
            $this->assign('category',$category);
            $this->assign('new',$new);

            $tags = Db::name('mulu_new_tag_relative')->alias('r')
                ->join('think_mulu_new_tags t','t.new_tag_id = r.tag_id')
                ->where('r.type',$this->type_new)->where('r.article_id',$id)
                ->field('r.tag_id,t.tag_name,t.new_count as count')
                ->select();
            $this->assign('tags',$tags);

            $i = 1;
            $tag_list = [];
            foreach ($tags as $key => $tag){
                $tag_list[$i] = $tag;
                if($i<=2){
                    $tag_news = Db::name('mulu_new_tag_relative')->alias('r')
                        ->join('think_mulu_articles a','a.article_id = r.article_id')
                        ->join('think_mulu_category c','c.category_id = a.c_id')
                        ->where('r.article_id','<>',$id)->where('r.tag_id',$tag['tag_id'])->where('r.type',$this->type_new)->where('a.status',1)
                        ->order('r_id','desc')
                        ->field('a.article_id,a.title,a.create_time,c.top_id')
                        ->limit(10)
                        ->select();
                    $tag_list[$i]['news'] = $tag_news;
                }
                $i++;
            }
//            print_r($tag_list);exit;
            $this->assign('tag_list',$tag_list);

            //推荐阅读
            $support_news = Db::name('mulu_articles')->alias('a')
                ->join('think_mulu_category c','c.category_id = a.c_id')
                ->where('a.t',$new['t'])
                ->where('a.article_id','<>',$id)
                ->where('a.content_img',1)
                ->where('a.hot',1)
                ->order('a.article_id','desc')
                ->field('a.article_id,a.thumbnail,a.title,a.create_time,c.top_id')
                ->limit(10)
                ->select();
            $this->assign('support_news',$support_news);

            //实时热点(最新)
            $hot_news = Db::name('mulu_articles')->alias('a')
                ->join('think_mulu_category c','c.category_id = a.c_id')
                ->where('a.t',$new['t'])
                ->where('a.article_id','<>',$id)
                ->where('a.hot',0)
                ->order('a.article_id','desc')
                ->field('a.article_id,a.title,a.create_time,c.top_id')
                ->limit(10)
                ->select();
            $this->assign('hot_news',$hot_news);

            return $this->fetch('content/new');


        }else if($category['type'] == $this->type_video){
            $video = Db::name('mulu_videos')->alias('a')
                ->join('think_mulu_category c','c.category_id = a.c_id')
                ->where('a.status',1)->where('a.id',$id)
                ->field('a.*,c.category_name,c.pinyin,c.tag_id,c.pid')
                ->find();

            if(empty($video))
            {
                throw new \think\exception\HttpException(404, '页面不存在');
            }

            $video['name'] = str_replace('录像','',$video['category_name']);
            if($video['pid'] == 0){
                $new_category['pinyin'] = '';
                $zhibo_category['pinyin'] = '';
                $video_category['pinyin'] = '';
                $highlight_category['pinyin'] = '';
            }else{
                $zhibo_category = Db::name('mulu_category')
                    ->where('status',1)->where('category_name','like',$video['name']."%")->where('type',$this->type_zhibo)
                    ->field('pinyin')
                    ->find();
                if(empty($zhibo_category)){
                    $zhibo_category['pinyin'] = '';
                }
                $this->assign('zhibo_category',$zhibo_category);

                $new_category = Db::name('mulu_category')
                    ->where('status',1)->where('category_name','like',$video['name']."%")->where('type',$this->type_new)
                    ->field('pinyin')
                    ->find();
                if(empty($new_category)){
                    $new_category['pinyin'] = '';
                }
                $this->assign('new_category',$new_category);

                $highlight_category = Db::name('mulu_category')
                    ->where('status',1)->where('category_name','like',$video['name']."%")->where('type',$this->type_highlight)
                    ->field('pinyin')
                    ->find();
                if(empty($highlight_category)){
                    $highlight_category['pinyin'] = '';
                }
                $this->assign('highlight_category',$highlight_category);
            }

            $this->assign('top_category',$this->top_category);
            $this->assign('url',$url);
            $this->assign('category',$category);
            $this->assign('video',$video);

            $tags = Db::name('mulu_new_tag_relative')->alias('r')
                ->join('think_mulu_new_tags t','t.new_tag_id = r.tag_id')
                ->where('r.type',$this->type_video)->where('r.article_id',$id)
                ->field('r.tag_id,t.tag_name,t.video_count as count')
                ->select();
            $this->assign('tags',$tags);

            $i = 1;
            $tag_list = [];
            foreach ($tags as $key => $tag){
                $tag_list[$i] = $tag;
                if($i<=2){
                    $tag_videos = Db::name('mulu_new_tag_relative')->alias('r')
                        ->join('think_mulu_videos a','a.id = r.article_id')
                        ->join('think_mulu_category c','c.category_id = a.c_id')
                        ->where('r.article_id','<>',$id)->where('r.tag_id',$tag['tag_id'])->where('r.type',$this->type_video)->where('a.status',1)
                        ->order('r_id','desc')
                        ->field('a.id,a.title,a.create_time,c.top_id')
                        ->limit(10)
                        ->select();
                    $tag_list[$i]['videos'] = $tag_videos;
                }else{
                    $tag_list[$i]['videos'] = [];
                }
                $i++;
            }
//            print_r($tag_list);exit;
            $this->assign('tag_list',$tag_list);

            //推荐阅读
            $support_news = Db::name('mulu_articles')->alias('a')
                ->join('think_mulu_category c','c.category_id = a.c_id')
                ->where('a.content_img',1)
                ->where('a.hot',1)
                ->order('a.article_id','desc')
                ->field('a.article_id,a.thumbnail,a.title,a.create_time,c.top_id')
                ->limit(10)
                ->select();
            $this->assign('support_news',$support_news);

            //实时热点(最新)
            $hot_news = Db::name('mulu_articles')->alias('a')
                ->join('think_mulu_category c','c.category_id = a.c_id')
                ->where('a.hot',0)
                ->order('a.article_id','desc')
                ->field('a.article_id,a.title,a.create_time,c.top_id')
                ->limit(10)
                ->select();
            $this->assign('hot_news',$hot_news);

            return $this->fetch('content/video');


        }else if($category['type'] == $this->type_highlight){
            $highlight = Db::name('mulu_highlights')->alias('a')
                ->join('think_mulu_category c','c.category_id = a.c_id')
                ->where('a.status',1)->where('a.id',$id)
                ->field('a.*,c.category_name,c.pinyin,c.tag_id,c.pid')
                ->find();

            if(empty($highlight))
            {
                throw new \think\exception\HttpException(404, '页面不存在');
            }

            $highlight['name'] = str_replace('集锦','',$highlight['category_name']);
            if($highlight['pid'] == 0){
                $new_category['pinyin'] = '';
                $zhibo_category['pinyin'] = '';
                $video_category['pinyin'] = '';
                $highlight_category['pinyin'] = '';
            }else{
                $zhibo_category = Db::name('mulu_category')
                    ->where('status',1)->where('category_name','like',$highlight['name']."%")->where('type',$this->type_zhibo)
                    ->field('pinyin')
                    ->find();
                if(empty($zhibo_category)){
                    $zhibo_category['pinyin'] = '';
                }
                $this->assign('zhibo_category',$zhibo_category);

                $new_category = Db::name('mulu_category')
                    ->where('status',1)->where('category_name','like',$highlight['name']."%")->where('type',$this->type_new)
                    ->field('pinyin')
                    ->find();
                if(empty($new_category)){
                    $new_category['pinyin'] = '';
                }
                $this->assign('new_category',$new_category);

                $video_category = Db::name('mulu_category')
                    ->where('status',1)->where('category_name','like',$highlight['name']."%")->where('type',$this->type_video)
                    ->field('pinyin')
                    ->find();
                if(empty($video_category)){
                    $video_category['pinyin'] = '';
                }
                $this->assign('video_category',$video_category);
            }

            $this->assign('top_category',$this->top_category);
            $this->assign('url',$url);
            $this->assign('category',$category);
            $this->assign('highlight',$highlight);

            $tags = Db::name('mulu_new_tag_relative')->alias('r')
                ->join('think_mulu_new_tags t','t.new_tag_id = r.tag_id')
                ->where('r.type',$this->type_highlight)->where('r.article_id',$id)
                ->field('r.tag_id,t.tag_name,t.video_count as count')
                ->select();
            $this->assign('tags',$tags);

            $i = 1;
            $tag_list = [];
            foreach ($tags as $key => $tag){
                $tag_list[$i] = $tag;
                if($i<=2){
                    $tag_highlights = Db::name('mulu_new_tag_relative')->alias('r')
                        ->join('think_mulu_videos a','a.id = r.article_id')
                        ->join('think_mulu_category c','c.category_id = a.c_id')
                        ->where('r.article_id','<>',$id)->where('r.tag_id',$tag['tag_id'])->where('r.type',$this->type_highlight)->where('a.status',1)
                        ->order('r_id','desc')
                        ->field('a.id,a.title,a.create_time,c.top_id')
                        ->limit(10)
                        ->select();
                    $tag_list[$i]['highlights'] = $tag_highlights;
                }else{
                    $tag_list[$i]['highlights'] = [];
                }
                $i++;
            }
//            print_r($tag_list);exit;
            $this->assign('tag_list',$tag_list);

            //推荐阅读
            $support_news = Db::name('mulu_articles')->alias('a')
                ->join('think_mulu_category c','c.category_id = a.c_id')
                ->where('a.content_img',1)
                ->where('a.hot',1)
                ->order('a.article_id','desc')
                ->field('a.article_id,a.thumbnail,a.title,a.create_time,c.top_id')
                ->limit(10)
                ->select();
            $this->assign('support_news',$support_news);

            //实时热点(最新)
            $hot_news = Db::name('mulu_articles')->alias('a')
                ->join('think_mulu_category c','c.category_id = a.c_id')
                ->where('a.hot',0)
                ->order('a.article_id','desc')
                ->field('a.article_id,a.title,a.create_time,c.top_id')
                ->limit(10)
                ->select();
            $this->assign('hot_news',$hot_news);

            return $this->fetch('content/highlight');


        }else if($category['type'] == $this->type_zhibo){
            $this->assign('category',$category);
//            print_r($category);exit;
            $zhibo = Db::name('mulu_zhibos')->alias('a')
                ->join('think_mulu_category c','c.category_id = a.c_id')
                ->where('a.status',1)->where('a.id',$id)
                ->field('a.*,c.category_name,c.pinyin,c.tag_id')
                ->find();
            if(empty($zhibo))
            {
                throw new \think\exception\HttpException(404, '页面不存在');
            }
            $this->assign('zhibo',$zhibo);

            $latest_new = Db::name('mulu_articles')->alias('a')
                ->join('think_mulu_category c','c.category_id = a.c_id')
                ->where('a.status',1)->where('a.t',$category['t'])->where('a.hot',0)
                ->order('a.article_id desc')
                ->field('a.article_id,a.title,c.top_id')
                ->limit(10)
                ->select();
            $this->assign('latest_new',$latest_new);

            $hot_new = Db::name('mulu_articles')->alias('a')
                ->join('think_mulu_category c','c.category_id = a.c_id')
                ->where('a.status',1)->where('a.t',$category['t'])->where('a.hot',1)
                ->order('a.article_id desc')
                ->field('a.article_id,a.title,c.top_id')
                ->limit(10)
                ->select();
            $this->assign('hot_new',$hot_new);

            $this->assign('top_category',$this->top_category);
            return $this->fetch('content/zhibo');
        }



    }







}