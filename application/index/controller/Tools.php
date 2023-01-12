<?php
namespace app\index\controller;

use think\Db;
//use think\Page;
//use think\Request;

class Tools extends PcBase
{

    /**
     * 各种在线工具
     */
    public function index(){
        $action =  input('action');
        $tools = config('tools');
        if(!isset($tools[$action])){
            throw new \think\exception\HttpException(404, '页面不存在');
        }

        //最新的10篇文章
        $latestArticles = Db::name('articles')->cache('latest_article_10',600)
            ->where('status',1)
            ->order('article_id','desc')
            ->limit(10)
            ->field('article_id,title')
            ->select();
        $this->assign('latestArticles',$latestArticles);

        $this->assign('tools',$tools);
        $this->assign('tool',$tools[$action]);
        return $this->fetch('tools/'.$action);

    }

    /**
     * 在线工具首页
     */
    public function lists(){

        $tools = config('tools');
        $this->assign('tools',$tools);

        //最热门的10篇文章
        $rankArticles = Db::name('articles_sort')->alias('as')
            ->join('think_articles a','a.article_id = as.article_id')
            ->where('as.sort_type',0)
            ->where('as.category',0)
            ->order('as.sort_id','asc')
            ->limit(10)
            ->field('as.*,a.title')
            ->select();
        $this->assign('rankArticles',$rankArticles);

        //最新的10篇文章
        $latestArticles = Db::name('articles')->cache('latest_article_10',600)
            ->where('status',1)
            ->order('article_id','desc')
            ->limit(10)
            ->field('article_id,title')
            ->select();
        $this->assign('latestArticles',$latestArticles);

        return $this->fetch('tools/index');
    }



}