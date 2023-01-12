<?php
use think\Route;

Route::domain('www.scripthome.com',function(){

    //首页
    Route::get('/', 'index/index/index');
    Route::get('index', 'index/index/index');

    //工具
    Route::any('tools/:action', 'index/tools/index');
    Route::get('tools/', 'index/tools/lists');

    //搜索
    Route::any('search', 'index/lists/search');

    //pc文章展示页
    Route::get('article/:id', 'index/article/index',[],['id'=>'\d+']);

    //pc标签
    Route::get('tag/list_<id>_<p>', 'index/tag/lists',[],['id'=>'\d+','p'=>'\d+']);
    Route::get('tag/list_<id>', 'index/tag/lists',[],['id'=>'\d+']);

    //pc二级分类列表和二级分类列表分页
    Route::get('/:first/list_<id>_<p>', 'index/lists/lists',[],['id'=>'\d+','p'=>'\d+']);
//    Route::get('lists/list_<id>', 'index/lists/lists',[],['id'=>'\d+']);

    //pc一级分类页
//    Route::get('lists/index_<id>', 'index/lists/index',[],['id'=>'\d+']);
    Route::get('/:first/', 'index/lists/index');


//标签
    Route::get('tag/list_<id>_<p>', 'index/tag/lists',[],['id'=>'\d+','p'=>'\d+']);
    Route::get('tag/list_<id>', 'index/tag/lists',[],['id'=>'\d+']);

    //关于我们
    Route::get('about/index', 'index/index/about');

    Route::bind('index');

});


Route::domain('admin.scripthome.com','admin');


//Route::domain('m.scripthome.com','m');

//return [
//    '__domain__'=>[
//        'scripthome.com'       => 'index',
//        'm.scripthome.com'     =>  'm',
//        'admin.scripthome.com' => 'admin'
//    ]
//];


