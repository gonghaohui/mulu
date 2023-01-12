<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:62:"D:\gary\mulu\public/../application/tiyu\view\tags\content.html";i:1672740121;s:53:"D:\gary\mulu\application\tiyu\view\public\header.html";i:1671309968;s:53:"D:\gary\mulu\application\tiyu\view\public\footer.html";i:1670883333;}*/ ?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
    <title><?php echo $tag['tag_name']; ?>专题</title>
    <meta content="<?php echo $tag['tag_name']; ?>" name="keywords">
    <meta content="<?php echo $tag['tag_name']; ?>" name="description">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="/static/tiyu/css/index.css">
    <link rel="stylesheet" href="/static/tiyu/css/style.css">
    <link href="/static/tiyu/css/public.css" type="text/css" rel="stylesheet">
    <link href="/static/tiyu/css/bqdetail.css" type="text/css" rel="stylesheet">
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

<!--biaoqinfl-->
<div class="main">
    <!-- 面包屑导航 -->
    <ul class="Bread-nav clearfix">
        <li><a href="/index.html">首页</a></li>
        <li><i>></i><a href="/tag/index.html">标签</a></li>
        <li><i>></i><?php echo $tag['tag_name']; ?></li>
    </ul>
    <div class="wrap">
        <div class="fl l-box">
            <div class="l-content sp-box live-cont-foot">
                <h3 class="head-fi">
                    <p><?php echo $tag['tag_name']; ?>直播（全部赛事）</p>
                    <a href="#" target="_blank">更多>></a></h3>

                <div class="live-box">
                    <dl id="one">
                        <?php if(is_array($tag_zhibo) || $tag_zhibo instanceof \think\Collection || $tag_zhibo instanceof \think\Paginator): $i = 0; $__LIST__ = $tag_zhibo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zhobo): $mod = ($i % 2 );++$i;?>
                        <dd class="clearfix">
                            <div>
                                <p class="once-time"><?php echo date("m-d H:i",$zhobo['create_time']); ?></p>
                                <p class="once-event"><?php echo $zhobo['category_name']; ?></p>
                                <p class="once-game"><?php echo $zhobo['zhudui']; ?>VS<?php echo $zhobo['kedui']; ?></p>
                                <p class="video-link">

                                </p>
                            </div>
                        </dd>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </dl>
                    <p class="center center_a">点击进入<a target="_blank" href="#"><span class="weight"><?php echo $tag['tag_name']; ?>直播</span></a></p>
                </div>






            </div>


            <div class="l-content lx-box">
                <h3 class="head-fi">
                    <p><?php echo $tag['tag_name']; ?>比赛录像</p>
                    <a href="#" target="_blank">更多>></a></h3>
                <ul>
                    <?php if(is_array($tag_video) || $tag_video instanceof \think\Collection || $tag_video instanceof \think\Paginator): $i = 0; $__LIST__ = $tag_video;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): $mod = ($i % 2 );++$i;?>
                    <li>
                        <i></i>
                        <a target="_blank" class="wordcont" href="/<?php echo $top_category[$video['top_id']]; ?>/<?php echo $video['id']; ?>.html"><?php echo $video['title']; ?></a>
                        <b><?php echo date("Y-m-d H:i:s",$video['create_time']); ?></b>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <li class="center center_b">点击进入<a target="_blank" class="weight1" href="#"><?php echo $tag['tag_name']; ?>录像</a></li>
                </ul>

            </div>


            <div class="l-content sp-box">
                <h3 class="head-fi">
                    <p><?php echo $tag['tag_name']; ?>视频集锦</p>
                    <a href="#" target="_blank">更多>></a></h3>
                <ul>
                    <?php if(is_array($tag_highlight) || $tag_highlight instanceof \think\Collection || $tag_highlight instanceof \think\Paginator): $i = 0; $__LIST__ = $tag_highlight;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$highlight): $mod = ($i % 2 );++$i;?>
                    <li>
                        <i></i>
                        <a target="_blank" class="wordcont" href="/<?php echo $top_category[$highlight['top_id']]; ?>/<?php echo $highlight['id']; ?>.html"><?php echo $highlight['title']; ?></a>
                        <b><?php echo date("Y-m-d H:i:s",$highlight['create_time']); ?></b>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <li class="center center_b">点击进入<a target="_blank" class="weight1" href="#"><?php echo $tag['tag_name']; ?>集锦</a></li>
                </ul>

            </div>


            <div class="l-content lx-box">
                <h3 class="head-fi">
                    <p><?php echo $tag['tag_name']; ?>新闻</p>
                    <a target="_blank" href="#">更多>></a></h3>
                <ul>
                    <?php if(is_array($tag_new) || $tag_new instanceof \think\Collection || $tag_new instanceof \think\Paginator): $i = 0; $__LIST__ = $tag_new;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                    <li>
                        <i></i>
                        <a target="_blank" class="wordcont" href="/<?php echo $top_category[$new['top_id']]; ?>/<?php echo $new['article_id']; ?>.html"><?php echo $new['title']; ?></a>
                        <b><?php echo date("Y-m-d H:i:s",$new['create_time']); ?></b>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <li class="center center_b">点击进入<a target="_blank" class="weight1" href="#"><?php echo $tag['tag_name']; ?>新闻</a></li>
                </ul>

            </div>



        </div>
        <div class="fr r-box">
            <div class="r-content">
                <h4 class="header-f">今日直播<a target="_blank" href="/<?php echo $top_category[3]; ?>/index.html">更多>></a></h4>
                <ul>
                    <?php if(is_array($today_zhibo) || $today_zhibo instanceof \think\Collection || $today_zhibo instanceof \think\Paginator): $i = 0; $__LIST__ = $today_zhibo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zhibo): $mod = ($i % 2 );++$i;?>
                    <li><a target="_blank" href="/<?php echo $top_category[$zhibo['top_id']]; ?>/<?php echo $zhibo['id']; ?>.html"><i></i><?php echo date("H:i",$zhibo['create_time']); ?> <?php echo $zhibo['zhudui']; ?>vs<?php echo $zhibo['kedui']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="r-content videoshi">
                <h4 class="header-f">足球录像</h4>
                <ul>
                    <?php if(is_array($football_video) || $football_video instanceof \think\Collection || $football_video instanceof \think\Paginator): $i = 0; $__LIST__ = $football_video;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$football): $mod = ($i % 2 );++$i;?>
                    <li><a target="_blank" href="/<?php echo $top_category[$football['top_id']]; ?>/<?php echo $football['id']; ?>.html"><i></i><?php echo $football['title']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                </ul>
            </div>
            <div class="r-content videoshi">
                <h4 class="header-f">篮球录像</h4>
                <ul>
                    <?php if(is_array($basketball_video) || $basketball_video instanceof \think\Collection || $basketball_video instanceof \think\Paginator): $i = 0; $__LIST__ = $basketball_video;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$basketball): $mod = ($i % 2 );++$i;?>
                    <li><a target="_blank" href="/<?php echo $top_category[$basketball['top_id']]; ?>/<?php echo $basketball['id']; ?>.html"><i></i><?php echo $basketball['title']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>



            <div class="r-content videoshi">
                <h4 class="header-f">最新新闻</h4>
                <ul>
                    <?php if(is_array($latest_new) || $latest_new instanceof \think\Collection || $latest_new instanceof \think\Paginator): $i = 0; $__LIST__ = $latest_new;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$latest): $mod = ($i % 2 );++$i;?>
                    <li><a target="_blank" href="/<?php echo $top_category[$latest['top_id']]; ?>/<?php echo $latest['article_id']; ?>.html"><i></i><?php echo $latest['title']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="r-content hot-bq">
                <h4 class="header-f">热门标签<a target="_blank" href="/tag/index.html">更多>></a></h4>
                <div>
                    <?php if(is_array($hot_tag) || $hot_tag instanceof \think\Collection || $hot_tag instanceof \think\Paginator): $i = 0; $__LIST__ = $hot_tag;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hot): $mod = ($i % 2 );++$i;?>
                    <a target="_blank" href="/tag/<?php echo $hot['new_tag_id']; ?>.html"><?php echo $hot['tag_name']; ?></a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
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

<!-- 公共底部 -->
<script type="text/javascript" src="/static/tiyu/js/default.js" data-cfasync="false"></script>
<script type="text/javascript" src="/static/tiyu/js/index.js" data-cfasync="false"></script>
</body></html>