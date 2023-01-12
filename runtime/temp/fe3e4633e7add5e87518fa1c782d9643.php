<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:62:"D:\gary\mulu\public/../application/tiyu\view\second\video.html";i:1672465871;s:53:"D:\gary\mulu\application\tiyu\view\public\header.html";i:1671309968;s:53:"D:\gary\mulu\application\tiyu\view\public\footer.html";i:1670883333;}*/ ?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo $second['category_name']; ?></title>
    <meta content="<?php echo $second['keywords']; ?>" name="keywords">
    <meta content="<?php echo $second['description']; ?>" name="description">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="/static/tiyu/css/index.css">
    <link rel="stylesheet" href="/static/tiyu/css/style.css">
    <link href="/static/tiyu/css/public.css" type="text/css" rel="stylesheet">
    <link href="/static/tiyu/css/biaoqian.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="/static/tiyu/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/static/tiyu/js/swiper/swiper-4.5.0.min.js"></script>
    <script type="text/javascript"  src="/static/tiyu/js/jquery.min.js"></script>
    <script type="text/javascript" src="/static/tiyu/js/biebuzhu.js"></script>
</head>
<body>
<!-- header/S -->

<!-- nav/S -->
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

<!--手机导航-->


<!--biaoqin-->
<div class="main">
    <!--ctj_box-->
    <div class="center07">
        <div class="ahos">
            <div class="ahos_top_qiudui">
                <ul class="btnlist" rel=".tabcontent_1">
                    <?php if(is_array($lians) || $lians instanceof \think\Collection || $lians instanceof \think\Paginator): $i = 0; $__LIST__ = $lians;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lian): $mod = ($i % 2 );++$i;?>
                    <li><?php echo $lian['category_name']; ?></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="ahos_qiudui tabcontent_1">
                <?php if(is_array($lians) || $lians instanceof \think\Collection || $lians instanceof \think\Paginator): $i = 0; $__LIST__ = $lians;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lian): $mod = ($i % 2 );++$i;?>
                <ul>
                    <?php if(is_array($lian['teams']) || $lian['teams'] instanceof \think\Collection || $lian['teams'] instanceof \think\Paginator): $i = 0; $__LIST__ = $lian['teams'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$team): $mod = ($i % 2 );++$i;?>
                    <li><a href="/<?php echo $team['pinyin']; ?>/index.html"><img src="<?php echo $team['img']; ?>" alt="<?php echo $team['category_name']; ?>"><br><?php echo $team['category_name']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
    <div class="content_box2">
        <div class="row_one">
            <div class="col-sm-6">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">推荐<?php echo $type_name; ?>视频</div>
                        <!--<a href="#" class="more" title="收起">更多>></a>-->
                    </div>
                    <ul class="list-group">
                        <?php if(is_array($hot_videos) || $hot_videos instanceof \think\Collection || $hot_videos instanceof \think\Paginator): $i = 0; $__LIST__ = $hot_videos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): $mod = ($i % 2 );++$i;?>
                        <li>
                            <a href="/<?php echo $top_category[$video['top_id']]; ?>/<?php echo $video['id']; ?>.html" title="<?php echo $video['title']; ?>">
                                <b><?php echo $video['title']; ?></b>
                            </a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">最新<?php echo $type_name; ?>视频</div>
                        <!--<a href="#" class="more" title="收起">更多>></a>-->
                    </div>
                    <ul class="panel-body list-group">
                        <?php if(is_array($latest_videos) || $latest_videos instanceof \think\Collection || $latest_videos instanceof \think\Paginator): $i = 0; $__LIST__ = $latest_videos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): $mod = ($i % 2 );++$i;?>
                        <li>
                            <a href="/<?php echo $top_category[$video['top_id']]; ?>/<?php echo $video['id']; ?>.html" title="<?php echo $video['title']; ?>">
                                <b><?php echo $video['title']; ?></b>
                            </a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>

            <?php if(is_array($lians_news) || $lians_news instanceof \think\Collection || $lians_news instanceof \think\Paginator): $i = 0; $__LIST__ = $lians_news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ln): $mod = ($i % 2 );++$i;?>
            <div class="col-sm-6">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title"><?php echo $ln['category_name']; ?></div>
                        <ul class="panle-title-list">
                            <?php if(is_array($ln['teams']) || $ln['teams'] instanceof \think\Collection || $ln['teams'] instanceof \think\Paginator): $i = 0; $__LIST__ = $ln['teams'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$team): $mod = ($i % 2 );++$i;?>
                            <li><a href="/<?php echo $team['pinyin']; ?>/index.html"><?php echo $team['category_name']; ?></a></li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <a href="/<?php echo $ln['pinyin']; ?>/index.html" class="more" title="收起">更多>></a></div>
                    <ul class="panel-body list-group">
                        <?php if(is_array($ln['videos']) || $ln['videos'] instanceof \think\Collection || $ln['videos'] instanceof \think\Paginator): $i = 0; $__LIST__ = $ln['videos'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): $mod = ($i % 2 );++$i;?>
                        <li>
                            <a href="/<?php echo $top_category[$video['top_id']]; ?>/<?php echo $video['id']; ?>.html" title="<?php echo $video['title']; ?>"><?php echo $video['title']; ?></a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>





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
    $(".btnlist").each(function(idx,item){
        $(item).children().eq(0).addClass("cur");
        if(!!$(this).attr("rel"))
        {
            $($(this).attr("rel")).children().eq(0).addClass("cur");
        }
    });
    $(".btnlist").children().bind("mouseenter touch",function(){
        if($(this).is(".cur")){return false;}
        var parent = $(this).parent();
        var obj_box= $($(this).parent().attr("rel"));
        var index  = parent.children().index(this);
        if(obj_box.children().eq(index).size() <= 0){ return false;}
        parent.find(".cur").removeClass("cur");
        $(this).addClass("cur");
        obj_box.children().removeClass("cur");
        obj_box.children().eq(index).addClass("cur");
        return false;
    });
</script>
<script type="text/javascript" src="/static/tiyu/js/index1.js"></script>
</body></html>