<?php
namespace app\index\controller;


use think\Db;


use app\common\model\ArticleCategoryModel;

class Index extends PcBase
{
    public function index(){

        $categoryModel = new ArticleCategoryModel();
        $categories = $categoryModel->where('pid',0)->where('status',1)->order('sort','asc')->select();

        //热门标签
        $hotTags = Db::name('articles_sort')
//            ->cache('index_hot_tags',500)
            ->alias('as')
            ->join('article_tags at','at.tag_id = as.article_id')
            ->where('as.sort_type',4)
            ->order('as.sort_id','asc')
            ->limit(40)
            ->field('at.*')
            ->select();

        //工具列表
        $tools = config('tools');
        $this->assign('tools',$tools);


        //友情链接
        $links = Db::name('friend_link')
            ->where('is_show',1)
            ->order('orderby','desc')
            ->select();

        $this->assign('links',$links);
        $this->assign('hotTags',$hotTags);
        $this->assign('categories',$categories);
        return $this->fetch('index/index');

    }


    public function about(){
        return $this->fetch('index/about');
    }

    public function test(){
        echo "test";
//        header('Content-type: text/xml');
//        $domain = "https://www.scriptjp.com";
/*        echo '<?xml version="1.0" encoding="UTF-8"?> */
//  <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
//  <url>
//  <loc>https://www.scriptjp.com</loc>
//  <lastmod>2020-08-01T00:00:00+08:00</lastmod>
//  <changefreq>monthly</changefreq>
//  <priority>1</priority>
//  </url>';




    }
}
