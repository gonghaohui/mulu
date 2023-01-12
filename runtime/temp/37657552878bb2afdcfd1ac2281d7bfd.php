<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:63:"D:\gary\mulu\public/../application/tiyu\view\content\zhibo.html";i:1672823195;s:53:"D:\gary\mulu\application\tiyu\view\public\header.html";i:1671309968;s:53:"D:\gary\mulu\application\tiyu\view\public\footer.html";i:1670883333;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" />
    <meta name="copyright" content="https://www.24zbw.com" />
    <title><?php echo date("Y-m-d",$zhibo['create_time']); ?> <?php echo $zhibo['saishi']; ?> <?php echo $zhibo['zhudui']; ?> VS <?php echo $zhibo['kedui']; ?></title>
    <meta content="<?php echo date('Y-m-d H:i:s',$zhibo['create_time']); ?> <?php echo $zhibo['zhudui']; ?>VS<?php echo $zhibo['kedui']; ?>" name="description" />
    <meta content="<?php echo $zhibo['saishi']; ?>,<?php echo $zhibo['zhudui']; ?>,<?php echo $zhibo['kedui']; ?>" name="keywords" />
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" href="/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"  />
    <link rel="stylesheet" href="/static/tiyu/css/reset.css" />
    <link rel="stylesheet" href="/static/tiyu/css/index.css">
    <link rel="stylesheet" href="/static/tiyu/css/style.css" />
    <link rel="stylesheet" href="/static/tiyu/css/sy-footer.css" />
    <script type="text/javascript"  src="/static/tiyu/js/jquery.min.js"></script>
    <script type="text/javascript" src="/static/tiyu/js/biebuzhu.js"></script>
</head>
<body>
<!-- header/S -->
<!--手机导航-->
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

<div class="content_box">
    <div class="local"><span class="one">当前位置：</span>
        <a href="/index.html">首页</a> >
        <a href="/<?php echo $category['pinyin']; ?>/index.html"><?php echo $category['category_name']; ?></a> >
        <a href="/<?php echo $zhibo['pinyin']; ?>/index.html"><?php echo $zhibo['category_name']; ?></a></div>
    <div class="content_block_left">
        <div class="fixed_score_box">
            <div class="fixed_score_top">
                <div class="score_name_left">
                    <!--<img class="lazy" src="/static/tiyu/images/default_img_60x60.png" data-original="http://www.24zb.top/img/2012326152433.jpg" alt="<?php echo $zhibo['zhudui']; ?>" />-->
                    <h1><?php echo $zhibo['zhudui']; ?></h1>
                </div>
                <div class="score_name">
                    <div class="leagueName">
                        <?php echo $zhibo['saishi']; ?>
                    </div>
                    <p><?php echo date("m月-d日 H:i",$zhibo['create_time']); ?></p>
                    <span><?php echo $zhibo['bifen']; ?></span>

                </div>
                <div class="score_name_left score_name_right">
                    <!--<img class="lazy" src="/static/tiyu/images/default_img_60x60.png" data-original="http://www.24zb.top/img/20200817161813.png" alt="<?php echo $zhibo['kedui']; ?>" />-->
                    <h1><?php echo $zhibo['kedui']; ?></h1>
                </div>
            </div>
        </div>
        <div class="fixed_score_link">
            <div class="fixed_score_taggle">
                <div class="signal">
                    <img class="lazy signal_img" src="/static/tiyu/images/signal.png" />
                    <span>信号源</span>
                </div>
                <div class="signalCon" id="signalConZ" data-name="<?php echo $zhibo['saishi']; ?>">
                    <div class="signalCon_listD"><h5>直播信号1</h5></div>
                </div>
            </div>
        </div>
        <div>



            <div class="fixsco_tab_content" style="">
                <div class="playback_list">
                </div>
            </div>
        </div>
        <div style="width: 100%;height:20px;background: #f1f1f1"></div>
        <div class="nav_explain">
            <p>本站所有直播和视频链接均由网友提供，并链接到其他网站播放。</p>
        </div>
        <div style="width: 100%;height:20px;background: #f1f1f1"></div>
    </div>
    <div class="content_right">


        <div class="block">
            <div class="block_title">
                <h1>比赛相关新闻</h1>
            </div>
            <div class="hot_video_con">
                <ul>
                    <?php if(is_array($latest_new) || $latest_new instanceof \think\Collection || $latest_new instanceof \think\Paginator): $i = 0; $__LIST__ = $latest_new;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                    <li>
                        <a href="/<?php echo $top_category[$new['top_id']]; ?>/<?php echo $new['article_id']; ?>.html" title="<?php echo $new['title']; ?>" target="_blank"><i></i><?php echo $new['title']; ?></a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <div class="block">
            <div class="block_title">
                <h1>实时热点</h1>
            </div>
            <div class="hot_video_con">
                <ul>
                    <?php if(is_array($hot_new) || $hot_new instanceof \think\Collection || $hot_new instanceof \think\Paginator): $i = 0; $__LIST__ = $hot_new;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                    <li>
                        <a href="/<?php echo $top_category[$new['top_id']]; ?>/<?php echo $new['article_id']; ?>.html" title="<?php echo $new['title']; ?>" target="_blank"><i></i><?php echo $new['title']; ?></a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div style="clear:both;"></div>
</div>
<!--底部-->
<div class="footer">
    <div class="copyright">
        <div class="link"> <a target="_blank" href="/about.html" rel="nofollow">网站地图</a> | <a target="_blank" href="/law.html" rel="nofollow">联系我们</a> | <a target="_blank" href="/view.html" rel="nofollow">免责声明</a> </div>
        <p>Copyright © 2019-2029球迷网 版权所 备案：<a href="http://www.beian.miit.gov.cn" target="_blank;" rel="nofollow">闽ICP备19013775号-2</a> <a target="_blank" style="padding-left:10px;" href="https://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44010602001489" rel="nofollow"><img src="images/ghs.png"/>粤公网安备 44xxxxxxxxx号</a> </p>
        <p>球迷网是一个体育导航，所有直播和视频链接均由网友提供，并链接到其他网站播放，如有异议请与我们取得联系。</p>
    </div>
</div>
</body>
</html>