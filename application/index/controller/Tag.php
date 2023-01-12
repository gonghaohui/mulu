<?php
namespace app\index\controller;

use think\Db;
use think\Page;

//use think\Page;
//use think\Request;

class Tag extends PcBase
{
    public function lists(){
        $id = input('id');
        $p = input('p',1);
        if($id==''){
            throw new \think\exception\HttpException(404, '页面不存在');
        }
        $per = 20;

        $nowTag = Db::name('article_tags')->where('tag_id',$id)->find();
        if(empty($nowTag)){
            throw new \think\exception\HttpException(404, '页面不存在');
        }
        $this->assign('nowTag',$nowTag);

        $count = Db::name('article_tags_relative')->where('tag_id',$id)->count();
        $page = new Page($count, $per);

        $lists = Db::name('article_tags_relative')->alias('atr')
            ->join('think_articles a','a.article_id = atr.article_id')
            ->where('atr.tag_id',$id)
            ->where('a.status',1)
            ->order('atr.r_id','desc')
            ->limit($page->firstRow . ',' . $page->listRows)->select();

        $this->assign('lists',$lists);
        $this->assign('page',$page);
        $this->assign('p',$p);

        //最新的10篇文章
        $latestArticles = Db::name('articles')->cache('latest_article_10',600)
            ->where('status',1)
            ->order('article_id','desc')
            ->limit(10)
            ->field('article_id,title')
            ->select();
        $this->assign('latestArticles',$latestArticles);

        $tools = config('tools');
        $this->assign('tools',$tools);

        return $this->fetch('index/tag_list');
    }




}