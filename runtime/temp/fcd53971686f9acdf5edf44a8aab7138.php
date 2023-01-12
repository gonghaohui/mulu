<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:67:"D:\gary\mulu\public/../application/tiyu\view\content\highlight.html";i:1672996209;s:53:"D:\gary\mulu\application\tiyu\view\public\header.html";i:1671309968;s:53:"D:\gary\mulu\application\tiyu\view\public\footer.html";i:1670883333;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" />
    <title><?php echo $highlight['title']; ?></title>
    <meta content="<?php echo $highlight['title']; ?>" name="description">
    <meta content="<?php echo $highlight['title']; ?>" name="keywords">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" href="/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"  />
    <link rel="stylesheet" href="/static/tiyu/css/reset.css" />
    <link rel="stylesheet" href="/static/tiyu/css/index.css">
    <link rel="stylesheet" href="/static/tiyu/css/style.css" />
    <link rel="stylesheet" href="/static/tiyu/css/sy-footer.css">
    <script type="text/javascript"  src="/static/tiyu/js/jquery.min.js"></script>
    <script type="text/javascript" src="/static/tiyu/js/biebuzhu.js"></script>
</head>

<body>
<!-- header/S -->
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

<?php if($highlight['pid'] != 0): ?>
<div class="topic_subnav_box">
    <div class="topic_subnav">
        <ul>
            <?php if($new_category['pinyin'] != null): ?>
            <li> <a href="/<?php echo $new_category['pinyin']; ?>/index.html" class=""><?php echo $highlight['name']; ?>新闻</a> </li>
            <?php endif; if($zhibo_category['pinyin'] != null): ?>
            <li> <a href="/<?php echo $zhibo_category['pinyin']; ?>/index.html" class=""><?php echo $highlight['name']; ?>直播</a> </li>
            <?php endif; if($video_category['pinyin'] != null): ?>
            <li> <a href="/<?php echo $video_category['pinyin']; ?>/index.html" class=""><?php echo $highlight['name']; ?>录像</a> </li>
            <?php endif; if($highlight['pinyin'] != null): ?>
            <li> <a href="/<?php echo $highlight['pinyin']; ?>/index.html" class="hover"><?php echo $highlight['name']; ?>集锦</a> </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<?php endif; ?>

<div class="content_box">
    <div class="local"><span class="one">当前位置：</span>
        <a href="/<?php echo $category['pinyin']; ?>/index.html"><span><?php echo $category['category_name']; ?></span></a> >
        <a href="/<?php echo $highlight['pinyin']; ?>/index.html"><span><?php echo $highlight['category_name']; ?></span></a>
    </div>
    <div class="content_block_left">
        <div class="articles_text_box">
            <div class="bread_crumb">

            </div>
            <div class="articles_text">
                <div class="title">
                    <h1><?php echo $highlight['title']; ?></h1>
                    <time><?php echo date("Y-m-d H:i:s",$highlight['create_time']); ?></time>
                </div>
                <p>
                    <?php echo $highlight['content']; ?>
                </p>
            </div>
            <div class="articles_tag_text clearfix">
                <ul>
                    <?php if(is_array($tags) || $tags instanceof \think\Collection || $tags instanceof \think\Paginator): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?>
                    <li><a href=/tag/<?php echo $tag['tag_id']; ?>.html target="_blank"><?php echo $tag['tag_name']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <div class="reading_box">
            <div class="reading_padding">
                <div class="reading_title">
                    <h1>推荐阅读</h1>
                </div>
                <div class="news_list">
                    <?php if(is_array($support_news) || $support_news instanceof \think\Collection || $support_news instanceof \think\Paginator): $i = 0; $__LIST__ = $support_news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                    <div class="block_img">
                        <a href="/<?php echo $top_category[$new['top_id']]; ?>/<?php echo $new['article_id']; ?>.html" class="tag_posituon">
                            <img src="<?php echo $new['thumbnail']; ?>" alt="<?php echo $new['title']; ?>">
                        </a>
                        <div class="infro">
                            <h1><a href="/<?php echo $top_category[$new['top_id']]; ?>/<?php echo $new['article_id']; ?>.html"><?php echo $new['title']; ?></a></h1>
                            <p><a href="/<?php echo $top_category[$new['top_id']]; ?>/<?php echo $new['article_id']; ?>.html"></a></p>
                            <time><?php echo date("Y-m-d",$new['create_time']); ?></time>
                        </div>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="content_right">
        <?php if(is_array($tag_list) || $tag_list instanceof \think\Collection || $tag_list instanceof \think\Paginator): $i = 0; $__LIST__ = $tag_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag_highlight): $mod = ($i % 2 );++$i;?>
        <div class="block">
            <div class="block_title">
                <h1>相关<?php echo $tag_highlight['tag_name']; ?>录像</h1>
            </div>
            <div class="hot_video_con">
                <ul>
                    <?php if(is_array($tag_highlight['highlights']) || $tag_highlight['highlights'] instanceof \think\Collection || $tag_highlight['highlights'] instanceof \think\Paginator): $i = 0; $__LIST__ = $tag_highlight['highlights'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$highlight): $mod = ($i % 2 );++$i;?>
                    <li> <img style="width: 12px" src="/static/tiyu/images/919901b301f64ce5b2622ae2fe536d3e.gif">
                        <a href="/<?php echo $top_category[$highlight['top_id']]; ?>/<?php echo $highlight['id']; ?>.html" title="<?php echo $highlight['title']; ?>"target="_blank"><?php echo $highlight['title']; ?></a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>

        <div class="block">
            <div class="block_title">
                <h1>实时热点</h1>
            </div>
            <div class="hot_video_con">
                <ul>
                    <?php if(is_array($hot_news) || $hot_news instanceof \think\Collection || $hot_news instanceof \think\Paginator): $i = 0; $__LIST__ = $hot_news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                    <li> <img style="width: 12px" src="/static/tiyu/images/919901b301f64ce5b2622ae2fe536d3e.gif">
                        <a href="/<?php echo $top_category[$new['top_id']]; ?>/<?php echo $new['article_id']; ?>.html" title="<?php echo $new['title']; ?>"target="_blank"><?php echo $new['title']; ?></a>
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