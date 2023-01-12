<?php
use think\Route;

Route::domain('127.0.0.79',function(){

//    Route::get('zqxw/yingchao/tuotenamureci', 'tiyu/index/switch_page');

    //tag
    Route::get('tag/index', 'tiyu/tags/index');
    Route::get('tag/:id', 'tiyu/tags/content',[],['id'=>'\d+']);

    Route::post('tag/search', 'tiyu/tags/search');

    //内容页
    Route::get('<f_string>/:id', 'tiyu/content/index',[],['f_string'=>'\w+','id'=>'\d+']);

    //二级
    Route::get('<f_string>/index', 'tiyu/second/index',[],['f_string'=>'\w+']);

    //三级
    Route::get('<f_string>/<s_string>/index', 'tiyu/third/index',[],['f_string'=>'\w+','s_string'=>'\w+']);

    //四级
    Route::get('<f_string>/<s_string>/<t_string>/index', 'tiyu/fourth/index',[],['f_string'=>'\w+','s_string'=>'\w+','t_string'=>'\w+']);

//    Route::get('tag/<f_string>/<s_string>', 'tiyu/tags/index',[],['f_string'=>'\w+','s_string'=>'\w+']);

//    Route::get('<string>/<string>/<string>/<id>', 'tiyu/index/switch_view',[],['string'=>'\w+','id'=>'\d+']);
//    Route::get('<string>/<string>/<string>', 'tiyu/index/switch_page',[],['string'=>'\w+']);


//    //首页
//    Route::get('/', 'index/index/index');
//    Route::get('index', 'index/index/index');
//
//    //工具
//    Route::any('tools/:action', 'index/tools/index');
//    Route::get('tools/', 'index/tools/lists');

//    //搜索
//    Route::any('search', 'index/lists/search');
//
//    //pc文章展示页
//    Route::get('article/:id', 'index/article/index',[],['id'=>'\d+']);

//    //pc标签
//    Route::get('tag/list_<id>_<p>', 'index/tag/lists',[],['id'=>'\d+','p'=>'\d+']);
//    Route::get('tag/list_<id>', 'index/tag/lists',[],['id'=>'\d+']);

//    //pc二级分类列表和二级分类列表分页
//    Route::get('/:first/list_<id>_<p>', 'index/lists/lists',[],['id'=>'\d+','p'=>'\d+']);
////    Route::get('lists/list_<id>', 'index/lists/lists',[],['id'=>'\d+']);

//    //pc一级分类页
////    Route::get('lists/index_<id>', 'index/lists/index',[],['id'=>'\d+']);
//    Route::get('/:first/', 'index/lists/index');

////标签
//    Route::get('tag/list_<id>_<p>', 'index/tag/lists',[],['id'=>'\d+','p'=>'\d+']);
//    Route::get('tag/list_<id>', 'index/tag/lists',[],['id'=>'\d+']);

//    //关于我们
//    Route::get('about/index', 'index/index/about');

//    Route::bind('index');
    Route::bind('tiyu');

});


//Route::get('tiyu/:id', 'index/index/test');

Route::domain('127.0.0.76','admin');


//Route::domain('m.scripthome.com','m');

//return [
//    '__domain__'=>[
//        'scripthome.com'       => 'index',
//        'm.scripthome.com'     =>  'm',
//        'admin.scripthome.com' => 'admin'
//    ]
//];


