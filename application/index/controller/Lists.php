<?php
namespace app\index\controller;

use app\common\model\ArticleCategoryModel;
use think\Db;
use think\Page;

class Lists extends PcBase
{
    /**
     * 一级分类列表
     */
    public function index(){
        $first =  input('first');

        $nowCategory = Db::name('article_category')
            ->where('category_url',$first)
            ->where('status',1)
            ->where('pid',0)
            ->find();

        if(empty($nowCategory)){
            throw new \think\exception\HttpException(404, '页面不存在');
        }
        $categoryModel = new ArticleCategoryModel();
        $firstCategories = $categoryModel
            ->where('pid',$nowCategory['category_id'])
            ->where('status',1)
            ->select();

        if(empty($firstCategories[0])){
            throw new \think\exception\HttpException(404, '页面不存在');
        }



        $firstRankArticles = Db::name('articles_sort')->alias('as')
            ->join('think_articles a','a.article_id = as.article_id')
            ->where('as.sort_type',1)
            ->where('as.category',$nowCategory['category_id'])
            ->order('as.sort_id','asc')
            ->limit(10)
            ->field('as.*,a.title')
            ->select();

        $latestFirstArticles = Db::name('articles')
            ->where('first_category',$nowCategory['category_id'])
            ->where('status',1)
            ->order('create_time','desc')
            ->limit(10)
            ->select();


        $this->assign('nowCategory',$nowCategory);
        $this->assign('latestFirstArticles',$latestFirstArticles);
        $this->assign('firstRankArticles',$firstRankArticles);
        $this->assign('firstCategories',$firstCategories);
        return $this->fetch('index/list');
    }


    /**
     * 二级分类列表
     */
    public function lists(){
        $first = input('first','none');
        $id = input('id');
        $p = input('p',1);

        $per = 20;

        $nowSecondCategory = Db::name('article_category')->alias('ac')
            ->join('think_article_category first_ac','first_ac.category_id = ac.pid')
            ->where('first_ac.pid',0)
            ->where('ac.category_id',$id)
            ->where('ac.status',1)
            ->field('ac.*,first_ac.category_id first_category_id,first_ac.category_name_jp first_category_name_jp,first_ac.category_url first_category_url')
            ->find();
        $this->assign('nowSecondCategory',$nowSecondCategory);

        if(empty($nowSecondCategory) or $nowSecondCategory['first_category_url'] != $first){
            throw new \think\exception\HttpException(404, '页面不存在');
        }

        $count = Db::name('articles')->where('second_category',$id)->where('status',1)->count();
        $page = new Page($count, $per);
        $lists = Db::name('articles')
            ->where('status',1)
            ->where('second_category',$id)
            ->order('article_id','desc')
            ->limit($page->firstRow . ',' . $page->listRows)->select();

        $this->assign('lists',$lists);
        $this->assign('page',$page);
        $this->assign('p',$p);


        $secondRankArticles = Db::name('articles_sort')->alias('as')
            ->join('think_articles a','a.article_id = as.article_id')
            ->where('as.sort_type',2)
            ->where('as.category',$id)
            ->order('as.sort_id','asc')
            ->limit(10)
            ->field('as.*,a.title')
            ->select();
        $this->assign('secondRankArticles',$secondRankArticles);

        //工具列表
        $tools = config('tools');
        $this->assign('tools',$tools);

        $this->assign('first',$first);
        return $this->fetch('index/list2');
    }


    public function search(){

        $keywords = input('keywords','');
        $category = input('category','');
        $lists = array();
        if(request()->isPost()){

            if($keywords == ''){
                $lists = array();
            }else{
                $lists = Db::name('articles')
                    ->where('first_category',$category)
                    ->where('title','like','%'.$keywords.'%')
                    ->where('status',1)
                    ->order('article_id','desc')
                    ->limit(100)
                    ->field('article_id,title,create_time')
                    ->select();
            }
        }

        $rankArticles = Db::name('articles_sort')->alias('as')
            ->join('think_articles a','a.article_id = as.article_id')
            ->where('as.sort_type',0)
            ->where('as.category',0)
            ->order('as.sort_id','asc')
            ->limit(20)
            ->field('as.*,a.title')
            ->select();
        $this->assign('rankArticles',$rankArticles);

        $latestArticles = Db::name('articles')->where('status',1)->order('article_id','desc')->limit(10)->select();
        $this->assign('latestArticles',$latestArticles);

        $this->assign('lists',$lists);
        $this->assign('keywords',$keywords);
        $this->assign('category',$category);
        return $this->fetch('index/search');
    }



}