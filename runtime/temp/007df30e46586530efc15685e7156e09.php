<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:60:"D:\gary\mulu\public/../application/tiyu\view\tags\index.html";i:1672746378;s:53:"D:\gary\mulu\application\tiyu\view\public\header.html";i:1671309968;s:53:"D:\gary\mulu\application\tiyu\view\public\footer.html";i:1670883333;}*/ ?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>tag标签</title>
    <meta content="tag标签" name="keywords">
    <meta content="tag标签" name="description">

    <link rel="stylesheet" href="/static/tiyu/css/index.css">
    <link rel="stylesheet" href="/static/tiyu/css/style.css">
    <link href="/static/tiyu/css/public.css" type="text/css" rel="stylesheet">
    <link href="/static/tiyu/css/biaoqian.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="/static/tiyu/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript"  src="/static/tiyu/js/jquery.min.js"></script>
    <script type="text/javascript" src="/static/tiyu/js/biebuzhu.js"></script>
</head>
<body>

<div id="header">
    <div id="topbar">
        <div class="layout fn-clear content">
            <p class="fn-left"></p>
            <p class="fn-right"><a href="javascript:addfav()" >加入收藏</a><em>|</em><a href="javascript:setHomepage()">设为首页</a></p>
        </div>
    </div>
    <!-- topbar end -->

    <div id="headbar" class="layout fn-clear content">
        <div id="logo"> <a href="/"><img src="/static/tiyu/images/video_zxh_0718_logo11.png" alt="球网" /></a> </div>
    </div>
    <!-- headbar end -->

    <div id="navbar" class="layout fn-clear content">
        <ul id="nav">
            <li class='nav-item current'><a class="nav-link" href="/index.html">首页</a></li>
            <?php if(is_array($navigation) || $navigation instanceof \think\Collection || $navigation instanceof \think\Paginator): $i = 0; $__LIST__ = $navigation;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?>
            <li  class='nav-item  drop-down'  id="nav-nba"><a class="nav-link drop-title" href="/<?php echo $nav['pinyin']; ?>/index.html" target="_blank"><?php echo $nav['category_name']; ?></a>
                <div class="subNav">
                    <ul>
                        <?php if(is_array($nav['sub']) || $nav['sub'] instanceof \think\Collection || $nav['sub'] instanceof \think\Paginator): $i = 0; $__LIST__ = $nav['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?>
                        <li><a href="/<?php echo $sub['pinyin']; ?>/index.html"><?php echo $sub['category_name']; ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <!-- // topbar end -->
</div>

<div class="zc_dh content">

    <b><a href="/<?php echo $navigation[0]['pinyin']; ?>/index.html" target="_blank"><?php echo $navigation[0]['category_name']; ?></a></b>：
    <?php if(is_array($navigation['0']['sub']) || $navigation['0']['sub'] instanceof \think\Collection || $navigation['0']['sub'] instanceof \think\Paginator): $i = 0; $__LIST__ = $navigation['0']['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ss): $mod = ($i % 2 );++$i;?>
    <a href="/<?php echo $ss['pinyin']; ?>/index.html" target="_blank"><?php echo $ss['category_name']; ?></a>
    <?php endforeach; endif; else: echo "" ;endif; ?>

    &#160;

    <b><a href="/<?php echo $navigation[1]['pinyin']; ?>/index.html" target="_blank"><?php echo $navigation[1]['category_name']; ?></a></b>：
    <?php if(is_array($navigation['1']['sub']) || $navigation['1']['sub'] instanceof \think\Collection || $navigation['1']['sub'] instanceof \think\Paginator): $i = 0; $__LIST__ = $navigation['1']['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ss): $mod = ($i % 2 );++$i;?>
    <a href="/<?php echo $ss['pinyin']; ?>/index.html" target="_blank"><?php echo $ss['category_name']; ?></a>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</div>

<!--手机导航-->
<div class="m-nav-box">
    <div class="m-nav"><a href="/" class="m-logo">球网</a><i class="m-menu-btn"></i><i class="m-so-btn"></i></div>
    <div class="m-so">
        <form name="searchform" target="_blank">
            <input name="q" type="text" id="bdcsMain" maxlength="15" class="m-sotxt">
            <input type="submit" value="搜索" class="m-sobtn">
        </form>
    </div>
    <div class="m-menu">
        <?php if(is_array($navigation) || $navigation instanceof \think\Collection || $navigation instanceof \think\Paginator): $i = 0; $__LIST__ = $navigation;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?>
        <a href="/<?php echo $nav['pinyin']; ?>/index.html"><?php echo $nav['category_name']; ?></a>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>

<!--biaoqin-->
<div class="main">
    <!-- 面包屑导航 -->
    <ul class="Bread-nav clearfix">
        <li><a href="/index.html">首页</a></li>
        <li><i>></i>标签搜索</li>
    </ul>
    <div class="wrap search-box" >
        <div class="tab-index-box">
            <div class="tab-box">
                <p class="fl">
                    <input class="searchCont" type="text" name="name" placeholder="请输入要搜索的专题..." value="">
                </p>
                <b class="fl"><input type="submit" name="" class="searchBtn"></b>
            </div>
            <div class="index-ulb">
                <ul class="index-box">
                </ul>
            </div>
        </div>

        <div class="noresul-box">
            未找到您所搜索的专题。
        </div>
        <div class="hot-bqbox">
            <?php if(is_array($hot_tags) || $hot_tags instanceof \think\Collection || $hot_tags instanceof \think\Paginator): $i = 0; $__LIST__ = $hot_tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hot): $mod = ($i % 2 );++$i;?>
            <a target="_blank" href="/tag/<?php echo $hot['new_tag_id']; ?>.html"><?php echo $hot['tag_name']; ?></a>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <p class="mlink"><a>查看全部专题<i></i></a></p>
    </div>

    <div class="wrap">
        <div class="all-box " id="allBox" style="display:block;">
            <ul class="clearfix head-s">
                <li class="active fl">全部专题</li>
                <li class="sear-btn"><a href="#" class="clearfix"><b></b><span>搜索</span></a></li>
            </ul>
            <div class="biaoqian-box">



                <div class="all-bq">
                    <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
                    <a href="/tag/<?php echo $list['new_tag_id']; ?>.html" target="_blank"><?php echo $list['tag_name']; ?></a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                </div>
                <nav class="page1">
                    <?php echo $page->show_tiyu($url); ?>
                </nav>



            </div>
        </div>
    </div>
</div>
<!-- 公共底部 -->

<!--底部-->
<div class="footer">
    <div class="copyright">
        <div class="link"> <a target="_blank" href="/about.html" rel="nofollow">网站地图</a> | <a target="_blank" href="/law.html" rel="nofollow">联系我们</a> | <a target="_blank" href="/view.html" rel="nofollow">免责声明</a> </div>
        <p>Copyright © 2019-2029球迷网 版权所 备案：<a href="http://www.beian.miit.gov.cn" target="_blank;" rel="nofollow">闽ICP备19013775号-2</a> <a target="_blank" style="padding-left:10px;" href="https://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44010602001489" rel="nofollow"><img src="images/ghs.png"/>粤公网安备 44xxxxxxxxx号</a> </p>
        <p>球迷网是一个体育导航，所有直播和视频链接均由网友提供，并链接到其他网站播放，如有异议请与我们取得联系。</p>
    </div>
</div>

<script>
    $('.searchBtn').click(function(){
        var tag = $('.searchCont').val();
        if(tag != ''){
            $.ajax({
                url:'/tag/search',
                method:'post',
                dataType:'json',
                data:{
                    tag:tag
                },
                success:function(res){
                    if(res.code == 1){
                        $(".noresul-box").css('display','none');
                        window.location.href = "/tag/"+res.id+".html";
                    }else{
                        $(".noresul-box").css('display','block');
                    }
                }
            });
        }
    });
</script>

<script type="text/javascript" src="/static/tiyu/js/default.js" data-cfasync="false"></script>
<script type="text/javascript" src="/static/tiyu/js/index.js" data-cfasync="false"></script>
</body></html>