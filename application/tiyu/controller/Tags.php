<?php
namespace app\tiyu\controller;

use think\Request;
use think\Db;
use think\Page;

class Tags extends PcBase{

    private $tag_num = 50;

    public function index(){
        $p = input('p',1);
        $hot_tags = Db::name('mulu_new_tags')
            ->where('hot',1)
            ->order('new_tag_id asc')
            ->limit(21)
            ->field('new_tag_id,tag_name')
            ->select();
        $this->assign('hot_tags',$hot_tags);

        $count = Db::name('mulu_new_tags')
            ->count();
        if( ceil($count/$this->tag_num) > $this->limit_pages ){
            $count = $this->limit_pages * $this->tag_num;
        }
        $page = new Page($count, $this->tag_num);
        $lists = Db::name('mulu_new_tags')
            ->order('new_tag_id','desc')
            ->limit($page->firstRow . ',' . $page->listRows)->select();

        $this->assign('lists',$lists);
        $this->assign('page',$page);
        $this->assign('p',$p);
        $this->assign('url','tag');

//        $page->show_tiyu();

        return $this->fetch('tags/index');
    }

    public function content(){
        $id = input('id',1);
        $tag = Db::name('mulu_new_tags')->find($id);
        if(empty($tag))
        {
            throw new \think\exception\HttpException(404, '页面不存在');
        }
        $this->assign('tag',$tag);

        $today_zhibo = Db::name('mulu_zhibos')->alias('ss')
            ->join('mulu_category c','c.category_id = ss.c_id')
            ->where('ss.status',1)
            ->limit(10)
            ->order('ss.create_time desc')
            ->field('ss.*,c.top_id')
            ->select();
        $this->assign('today_zhibo',$today_zhibo);

        $football_video = Db::name('mulu_videos')->alias('ss')
            ->join('mulu_category c','c.category_id = ss.c_id')
            ->where('ss.status',1)->where('ss.t',$this->football)
            ->order('ss.create_time desc')
            ->limit(10)
            ->field('ss.*,c.top_id')
            ->select();
        $this->assign('football_video',$football_video);

        $basketball_video = Db::name('mulu_videos')->alias('ss')
            ->join('mulu_category c','c.category_id = ss.c_id')
            ->where('ss.status',1)->where('ss.t',$this->basketball)
            ->order('ss.create_time desc')
            ->limit(10)
            ->field('ss.*,c.top_id')
            ->select();
        $this->assign('basketball_video',$basketball_video);

        $latest_new = Db::name('mulu_articles')->alias('ss')
            ->join('mulu_category c','c.category_id = ss.c_id')
            ->where('ss.status',1)
            ->order('ss.article_id desc')
            ->limit(10)
            ->field('ss.*,c.top_id')
            ->select();
        $this->assign('latest_new',$latest_new);

        $hot_tag = Db::name('mulu_new_tags')
            ->where('hot',1)
            ->order('new_tag_id desc')
            ->limit(20)
            ->select();
        $this->assign('hot_tag',$hot_tag);

        $tag_zhibo = Db::name('mulu_new_tag_relative')->alias('r')
            ->join('mulu_zhibos z','z.id = r.article_id')
            ->join('mulu_category c','c.category_id = z.c_id')
            ->where('r.tag_id',$id)->where('r.type',$this->type_zhibo)->where('z.status',1)
            ->order('r.article_id desc')
            ->field('z.*,c.top_id,c.category_name')
            ->limit(5)
            ->select();
        $this->assign('tag_zhibo',$tag_zhibo);

        $tag_video = Db::name('mulu_new_tag_relative')->alias('r')
            ->join('mulu_videos z','z.id = r.article_id')
            ->join('mulu_category c','c.category_id = z.c_id')
            ->where('r.tag_id',$id)->where('r.type',$this->type_video)->where('z.status',1)
            ->order('r.article_id desc')
            ->field('z.*,c.top_id,c.category_name')
            ->limit(5)
            ->select();
        $this->assign('tag_video',$tag_video);

        $tag_highlight = Db::name('mulu_new_tag_relative')->alias('r')
                ->join('mulu_highlights z','z.id = r.article_id')
                ->join('mulu_category c','c.category_id = z.c_id')
                ->where('r.tag_id',$id)->where('r.type',$this->type_highlight)->where('z.status',1)
                ->order('r.article_id desc')
                ->field('z.*,c.top_id,c.category_name')
                ->limit(5)
                ->select();
        $this->assign('tag_highlight',$tag_highlight);

        $tag_new = Db::name('mulu_new_tag_relative')->alias('r')
            ->join('mulu_articles z','z.article_id = r.article_id')
            ->join('mulu_category c','c.category_id = z.c_id')
            ->where('r.tag_id',$id)->where('r.type',$this->type_highlight)->where('z.status',1)
            ->order('r.article_id desc')
            ->field('z.*,c.top_id,c.category_name')
            ->limit(5)
            ->select();
        $this->assign('tag_new',$tag_new);

        $this->assign('top_category',$this->top_category);
        return $this->fetch('tags/content');
    }

    public function search(){
        $tag = trim(input('tag',''));
        $return = array();
        if($tag == ''){
            $return['code'] = 0;
            echo json_encode($return);exit;
        }

        $search = Db::name('mulu_new_tags')->where('tag_name',$tag)->find();
        if(empty($search)){
            $return['code'] = 0;
            echo json_encode($return);exit;
        }else{
            $return['code'] = 1;
            $return['id'] = $search['new_tag_id'];
            echo json_encode($return);exit;
        }



    }

}