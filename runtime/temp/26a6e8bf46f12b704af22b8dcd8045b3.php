<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:61:"D:\gary\mulu\public/../application/tiyu\view\index\index.html";i:1673434786;s:53:"D:\gary\mulu\application\tiyu\view\public\header.html";i:1671309968;s:53:"D:\gary\mulu\application\tiyu\view\public\footer.html";i:1670883333;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $site['web_site_title']; ?></title>
    <meta name="keywords" content="<?php echo $site['web_site_keyword']; ?>" />
    <meta name="description" content="<?php echo $site['web_site_description']; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="renderer" content="webkit|ie-comp|ie-stand" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
    <link rel="stylesheet" href="/static/tiyu/css/plugs.css" />
    <link rel="stylesheet" href="/static/tiyu/css/common.css">
    <link rel="stylesheet" href="/static/tiyu/css/index.css">
    <link rel="stylesheet" href="/static/tiyu/css/style.css">
    <link rel="stylesheet" href="/static/tiyu/css/prospect_report.css">
    <link rel="stylesheet" href="/static/tiyu/css/hot_news.css" />
    <script type="text/javascript"  src="/static/tiyu/js/jquery.min.js"></script>

    <script type="text/javascript" src="/static/tiyu/js/swiper/swiper-4.5.0.min.js"></script>
    <script type="text/javascript" src="/static/tiyu/js/common.js"></script>
    <script type="text/javascript" src="/static/tiyu/js/common1.js"></script>
    <script type="text/javascript" src="/static/tiyu/js/biebuzhu.js"></script>
</head>
<body>
<div>
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
    <!-- nav/S -->
    <!--手机导航-->

</div>
<!-- main -->
<div class="main">
    <!-- hot infor -->
    <div class="focus-con clearfix">
        <div class="pull-left focus-banner">
            <!-- banner -->
            <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="0"></li>
                    <li data-target="#myCarousel" data-slide-to="0"></li>
                    <li data-target="#myCarousel" data-slide-to="0"></li>
                </ol>
                <div class="carousel-inner">
                    <?php if(is_array($loops) || $loops instanceof \think\Collection || $loops instanceof \think\Paginator): $k = 0; $__LIST__ = $loops;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$loop): $mod = ($k % 2 );++$k;?>
                    <div class='item <?php if($k == 1): ?>active<?php endif; ?>'> <a href="/<?php echo $loop['url']; ?>/<?php echo $loop['article_id']; ?>.html" title="<?php echo $loop['title']; ?>" target="_blank"><img src="<?php echo $loop['img']; ?>" alt="<?php echo $loop['title']; ?>" width="370" height="230">
                        <div class="fbanner-title"><?php echo $loop['title']; ?></div>
                    </a> </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <a class="carousel-control left" href="javascript:;" data-slide="prev"><span></span></a> <a class="carousel-control right" href="javascript:;" data-slide="next"><span></span></a> </div>
            <!-- video -->
            <div class="video-con">
                <div class="title clearfix">
                    <h2 class="pull-left rb-title">精彩视频</h2>
                    <ul class="pull-right titleNav clearfix">
                    </ul>
                </div>
                <ul class="video-list-ul">
                    <?php if(is_array($head_video) || $head_video instanceof \think\Collection || $head_video instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($head_video) ? array_slice($head_video,0,6, true) : $head_video->slice(0,6, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): $mod = ($i % 2 );++$i;?>
                    <li class="pull-left video-list">
                        <a href="/<?php echo $top_category[$video['top_id']]; ?>/<?php echo $video['id']; ?>.html" target="_blank" title="<?php echo $video['title']; ?>">
                            <img src="<?php echo $video['img']; ?>" width="118" height="85" alt="<?php echo $video['title']; ?>">
                        <p class="text-hidden"><?php echo $video['title']; ?></p>
                        <i class="coverMask"></i> <i class="playBtn"></i> </a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <ul class="video-item-ul">
                    <?php if(is_array($head_video) || $head_video instanceof \think\Collection || $head_video instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($head_video) ? array_slice($head_video,6,3, true) : $head_video->slice(6,3, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): $mod = ($i % 2 );++$i;?>
                    <li class="video-item"> <a href="/<?php echo $top_category[$video['top_id']]; ?>/<?php echo $video['id']; ?>.html" target="_blank" title="<?php echo $video['title']; ?>"><span class="video-icon"></span><?php echo $video['title']; ?></a> </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <div class="pull-left focus-news">
            <?php if(is_array($head_hot_new) || $head_hot_new instanceof \think\Collection || $head_hot_new instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($head_hot_new) ? array_slice($head_hot_new,0,1, true) : $head_hot_new->slice(0,1, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
            <h2><a href="/<?php echo $top_category[$new['top_id']]; ?>/<?php echo $new['article_id']; ?>.html" title="<?php echo $new['title']; ?>" target="_blank"><span class="red-tip text-uppercase">头条</span><?php echo $new['title']; ?></a></h2>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <ul class="red-dl">
                <?php if(is_array($head_hot_new) || $head_hot_new instanceof \think\Collection || $head_hot_new instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($head_hot_new) ? array_slice($head_hot_new,1,3, true) : $head_hot_new->slice(1,3, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                <li><a href="/<?php echo $top_category[$new['top_id']]; ?>/<?php echo $new['article_id']; ?>.html" title="<?php echo $new['title']; ?>" target="_blank"><?php echo $new['title']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>

            <?php if(is_array($head_international_new) || $head_international_new instanceof \think\Collection || $head_international_new instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($head_international_new) ? array_slice($head_international_new,0,1, true) : $head_international_new->slice(0,1, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
            <h2><a href="/<?php echo $top_category[$new['top_id']]; ?>/<?php echo $new['article_id']; ?>.html" title="<?php echo $new['title']; ?>" target="_blank"><span class="red-tip text-uppercase">国际</span><?php echo $new['title']; ?></a></h2>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <ul class="red-dl">
                <?php if(is_array($head_international_new) || $head_international_new instanceof \think\Collection || $head_international_new instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($head_international_new) ? array_slice($head_international_new,1,3, true) : $head_international_new->slice(1,3, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                <li><a href="/<?php echo $top_category[$new['top_id']]; ?>/<?php echo $new['article_id']; ?>.html" title="<?php echo $new['title']; ?>" target="_blank"><?php echo $new['title']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>

            <?php if(is_array($head_domestic_new) || $head_domestic_new instanceof \think\Collection || $head_domestic_new instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($head_domestic_new) ? array_slice($head_domestic_new,0,1, true) : $head_domestic_new->slice(0,1, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
            <h2><a href="/<?php echo $top_category[$new['top_id']]; ?>/<?php echo $new['article_id']; ?>.html" title="<?php echo $new['title']; ?>" target="_blank"><span class="red-tip text-uppercase">国内</span><?php echo $new['title']; ?></a></h2>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <ul class="red-dl">
                <?php if(is_array($head_domestic_new) || $head_domestic_new instanceof \think\Collection || $head_domestic_new instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($head_domestic_new) ? array_slice($head_domestic_new,1,3, true) : $head_domestic_new->slice(1,3, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                <li><a href="/<?php echo $top_category[$new['top_id']]; ?>/<?php echo $new['article_id']; ?>.html" title="<?php echo $new['title']; ?>" target="_blank"><?php echo $new['title']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>

            <?php if(is_array($head_basketball_new) || $head_basketball_new instanceof \think\Collection || $head_basketball_new instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($head_basketball_new) ? array_slice($head_basketball_new,0,1, true) : $head_basketball_new->slice(0,1, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
            <h2><a href="/<?php echo $top_category[$new['top_id']]; ?>/<?php echo $new['article_id']; ?>.html" title="<?php echo $new['title']; ?>" target="_blank"><span class="red-tip text-uppercase">篮球</span><?php echo $new['title']; ?></a></h2>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <ul class="red-dl">
                <?php if(is_array($head_domestic_new) || $head_domestic_new instanceof \think\Collection || $head_domestic_new instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($head_domestic_new) ? array_slice($head_domestic_new,1,3, true) : $head_domestic_new->slice(1,3, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                <li><a href="/<?php echo $top_category[$new['top_id']]; ?>/<?php echo $new['article_id']; ?>.html" title="<?php echo $new['title']; ?>" target="_blank"><?php echo $new['title']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <!-- focus-live -->
        <div class="pull-right focus-live live-game-div">
            <div class="pull-left typeArtLeft">
                <ul class="recUl noDashed">
                    <?php if(is_array($loops_right) || $loops_right instanceof \think\Collection || $loops_right instanceof \think\Paginator): $i = 0; $__LIST__ = $loops_right;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$right): $mod = ($i % 2 );++$i;?>
                    <li class="clearfix"> <a href="1.html" target="_blank" title="<?php echo $right['title']; ?>" class="pull-left recImg">
                        <img src="<?php echo $right['img']; ?>" width="100%" alt="<?php echo $right['title']; ?>"></a>
                        <div class="pull-left recArt">
                            <h3 class="text-hidden"><a href="/<?php echo $right['url']; ?>/<?php echo $right['article_id']; ?>.html" target="_blank" title="<?php echo $right['title']; ?>"><?php echo $right['title']; ?></a></h3>
                            <p><?php echo $right['content']; ?><a href="/<?php echo $right['url']; ?>/<?php echo $right['article_id']; ?>.html" target="_blank" title="<?php echo $right['title']; ?>">[详情]</a></p>
                        </div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <!-- focus-live -->
    </div>
    <!-- 新增节目表 -->
    <div class="part_one">
        <div class="p_left">
            <?php if(is_array($zhibo_show_lists) || $zhibo_show_lists instanceof \think\Collection || $zhibo_show_lists instanceof \think\Paginator): $i = 0; $__LIST__ = $zhibo_show_lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zhibo): $mod = ($i % 2 );++$i;?>
            <div class="box">
                <!--<?php echo $zhibo['time']; ?>-->
                <h2 onclick="display('<?php echo $zhibo['time']; ?>',0);" class="cp"><b class="h">今天</b>2<?php echo $zhibo['time']; ?>  节目表
                    <span id="list_<?php echo $zhibo['time']; ?>_span"></span>
                    <img id="<?php echo $zhibo['time']; ?>_img" src="/static/tiyu/images/show_no.gif" title="收起/展开" alt="收起/展开" />
                </h2>
                <ul id="list_<?php echo $zhibo['time']; ?>">
                    <?php if(is_array($zhibo['list']) || $zhibo['list'] instanceof \think\Collection || $zhibo['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $zhibo['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ll): $mod = ($i % 2 );++$i;?>
                    <li>
                        <div class='tit '><em><?php echo date("m:d",$ll['create_time']); ?></em><strong >
                            <a href="/<?php echo $ll['pinyin']; ?>/index.html" target="_blank" ><?php echo mb_substr($ll['category_name'],0,2); ?></a></strong> <a><?php echo $ll['zhudui']; ?></a><a>vs</a><a><?php echo $ll['kedui']; ?></a>
                        </div>
                        <div class="con"><a href="#" target="_blank">直播信号</a></div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <div class="c"></div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <!--<div class="box">-->
                <!--<h2 onclick="display('09月30日星期五',0);" class="cp"><b >明天</b>2022年09月30日星期五                    节目表<span id="list_09月30日星期五_span"></span><img id="list_09月30日星期五_img" src="/static/tiyu/images/show_no.gif" title="收起/展开" alt="收起/展开" /></h2>-->
                <!--<ul id="list_09月30日星期五">-->
                    <!--<li>-->
                        <!--<div class='tit '><em>17:27</em><strong ><a href="yczb.html" target="_blank" >瑞典超</a></strong> <a>赫根</a><a>vs</a><a>IFK瓦纳默</a></div>-->
                        <!--<div class="con"><a href="zbnry.html" target="_blank">直播信号</a></div>-->
                    <!--</li>-->
                    <!--<li>-->
                        <!--<div class='tit '><em>17:27</em><strong ><a href="yczb.html" target="_blank" >挪甲</a></strong> <a>腓特烈斯塔</a><a>vs</a><a>松达尔</a></div>-->
                        <!--<div class="con"><a href="zbnry.html" target="_blank">直播信号</a></div>-->
                    <!--</li>-->
                <!--</ul>-->
                <!--<div class="c"></div>-->
            <!--</div>-->
            <!--<div class="box">-->
                <!--<h2 onclick="display('10月01日星期六',0);" class="cp"><b >后天</b>2022年10月01日星期六                    节目表<span id="list_10月01日星期六_span"></span><img id="list_10月01日星期六_img" src="/static/tiyu/images/show_no.gif" title="收起/展开" alt="收起/展开" /></h2>-->
                <!--<ul id="list_10月01日星期六">-->
                <!--</ul>-->
                <!--<div class="c"></div>-->
            <!--</div>-->
            <!--<div class="box">-->
                <!--<h2 onclick="display('10月02日星期日',0);" class="cp"><b >大后天</b>2022年10月02日星期日                    节目表<span id="list_10月02日星期日_span"></span><img id="list_10月02日星期日_img" src="/static/tiyu/images/show_no.gif" title="收起/展开" alt="收起/展开" /></h2>-->
                <!--<ul id="list_10月02日星期日">-->
                <!--</ul>-->
                <!--<div class="c"></div>-->
            <!--</div>-->
            <!--<div class="box">-->
                <!--<h2 onclick="display('10月03日星期一',0);" class="cp"><b >五天后</b>2022年10月03日星期一                    节目表<span id="list_10月03日星期一_span"></span><img id="list_10月03日星期一_img" src="/static/tiyu/images/show_no.gif" title="收起/展开" alt="收起/展开" /></h2>-->
                <!--<ul id="list_10月03日星期一">-->
                <!--</ul>-->
                <!--<div class="c"></div>-->
            <!--</div>-->
            <!--<div class="box">-->
                <!--<h2 onclick="display('10月04日星期二',0);" class="cp"><b >六天后</b>2022年10月04日星期二                    节目表<span id="list_10月04日星期二_span"></span><img id="list_10月04日星期二_img" src="/static/tiyu/images/show_no.gif" title="收起/展开" alt="收起/展开" /></h2>-->
                <!--<ul id="list_10月04日星期二">-->
                <!--</ul>-->
                <!--<div class="c"></div>-->
            <!--</div>-->
            <!--<div class="box">-->
                <!--<h2 onclick="display('10月05日星期三',0);" class="cp"><b >七天后</b>2022年10月05日星期三                    节目表<span id="list_10月05日星期三_span"></span><img id="list_10月05日星期三_img" src="/static/tiyu/images/show_no.gif" title="收起/展开" alt="收起/展开" /></h2>-->
                <!--<ul id="list_10月05日星期三">-->
                <!--</ul>-->
                <!--<div class="c"></div>-->
            <!--</div>-->
        </div>
        <div class="p_right">
            <div class="right_slide">
                <h3>
                    <div class="tpleft"><strong>篮球录像</strong>
                        <?php if(is_array($basketball_team_tags) || $basketball_team_tags instanceof \think\Collection || $basketball_team_tags instanceof \think\Paginator): $i = 0; $__LIST__ = $basketball_team_tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$team_tag): $mod = ($i % 2 );++$i;?>
                        <a href="/tag/<?php echo $team_tag['tag_id']; ?>.html"><?php echo $team_tag['category_name']; ?></a>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <div class="tpright"><a href="/<?php echo $top_category[6]; ?>/index.html" target="_blank" class="more1">+更多</a></div></h3>

                <div class="slideVideo">
                    <div class="bd">
                        <ul><dl class="highlight ui-list ui-min-list">
                            <?php if(is_array($basketball_videos) || $basketball_videos instanceof \think\Collection || $basketball_videos instanceof \think\Paginator): $i = 0; $__LIST__ = $basketball_videos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): $mod = ($i % 2 );++$i;?>
                            <dd><?php echo date("m月d日",$video['create_time']); ?> <a href="/<?php echo $top_category[$video['top_id']]; ?>/<?php echo $video['id']; ?>.html"  target='_blank' title="<?php echo $video['title']; ?>"><font color=#000000><?php echo $video['title']; ?></font></a></dd>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </dl>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="right_slide">
                <h3>
                    <div class="tpleft"><strong><a href="">足球录像</a></strong>
                        <?php if(is_array($football_team_category) || $football_team_category instanceof \think\Collection || $football_team_category instanceof \think\Paginator): $i = 0; $__LIST__ = $football_team_category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fc): $mod = ($i % 2 );++$i;?>
                        <a href="/<?php echo $fc['pinyin']; ?>/index.html"><?php echo $fc['category_name']; ?></a>
                        <?php endforeach; endif; else: echo "" ;endif; ?>

                    </div>
                    <div class="tpright"><a href="/<?php echo $top_category[5]; ?>/index.html" target="_blank" class="more1">+更多</a></div></h3>
                <div class="slideVideo">
                    <div class="bd">
                        <ul>
                            <dl class="highlight ui-list ui-min-list">
                                <?php if(is_array($football_videos) || $football_videos instanceof \think\Collection || $football_videos instanceof \think\Paginator): $i = 0; $__LIST__ = $football_videos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): $mod = ($i % 2 );++$i;?>
                                <dd><?php echo date("m月d日",$video['create_time']); ?> <a href="/<?php echo $top_category[$video['top_id']]; ?>/<?php echo $video['id']; ?>.html"  target='_blank' title="<?php echo $video['title']; ?>"><font color=#000000><?php echo $video['title']; ?></font></a></dd>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </dl>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 专题栏目 -->
    <div class="clearfix"></div>
    <div class="pull-left topicLeft">
        <!-- FootballTopic -->
        <!-- fbTopic -->

        <div class="football ballTopic">
            <div class="pull-left leftTitle"><span>足球专栏</span></div>
            <ul class="pull-right rightNav clearfix">
                <?php if(is_array($football_column) || $football_column instanceof \think\Collection || $football_column instanceof \think\Paginator): $i = 0; $__LIST__ = $football_column;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$football): $mod = ($i % 2 );++$i;?>
                <li><a href="/<?php echo $football['pinyin']; ?>/index.html" target="_blank" title="<?php echo $football['category_name']; ?>"><?php echo $football['category_name']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <!-- fbTopic -->
        <div class="typeNav">
            <div class="pull-left typeTitle">
                <h2><span class="big">国际足球</span>  </h2>
            </div>
        </div>
        <div class="clearfix h-15"></div>
        <div class="pull-left typeArtLeft1">
            <nav class="typeArtNav clearfix"> <span class="pull-left">英超足球推荐</span>
                <ul class="pull-left clearfix">
                    <?php if(is_array($yingchao_support_teams) || $yingchao_support_teams instanceof \think\Collection || $yingchao_support_teams instanceof \think\Paginator): $i = 0; $__LIST__ = $yingchao_support_teams;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$team): $mod = ($i % 2 );++$i;?>
                    <li><a target="_blank" href="/tag/<?php echo $team['tag_id']; ?>.html" title="<?php echo $team['category_name']; ?>"><?php echo $team['category_name']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </nav>
            <ul class="typeArtUl ">
                <?php if(is_array($yingchao_news) || $yingchao_news instanceof \think\Collection || $yingchao_news instanceof \think\Paginator): $i = 0; $__LIST__ = $yingchao_news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                <li><a href="/<?php echo $new['pinyin']; ?>/<?php echo $new['article_id']; ?>.html" target="_blank" title="<?php echo $new['title']; ?>" class="text-hidden"><i></i><?php echo $new['title']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <nav class="typeArtNav clearfix"> <span class="pull-left">西甲足球推荐</span>
                <ul class="pull-left clearfix">
                    <?php if(is_array($xijia_support_teams) || $xijia_support_teams instanceof \think\Collection || $xijia_support_teams instanceof \think\Paginator): $i = 0; $__LIST__ = $xijia_support_teams;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$team): $mod = ($i % 2 );++$i;?>
                    <li><a target="_blank" href="/tag/<?php echo $team['tag_id']; ?>.html" title="<?php echo $team['category_name']; ?>"><?php echo $team['category_name']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </nav>
            <ul class="typeArtUl ">
                <?php if(is_array($xijia_news) || $xijia_news instanceof \think\Collection || $xijia_news instanceof \think\Paginator): $i = 0; $__LIST__ = $xijia_news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                <li><a href="/<?php echo $new['pinyin']; ?>/<?php echo $new['article_id']; ?>.html" target="_blank" title="<?php echo $new['title']; ?>" class="text-hidden"><i></i><?php echo $new['title']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <nav class="typeArtNav clearfix"> <span class="pull-left">德甲足球推荐</span>
                <ul class="pull-left clearfix">
                    <?php if(is_array($dejia_support_teams) || $dejia_support_teams instanceof \think\Collection || $dejia_support_teams instanceof \think\Paginator): $i = 0; $__LIST__ = $dejia_support_teams;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$team): $mod = ($i % 2 );++$i;?>
                    <li><a target="_blank" href="/tag/<?php echo $team['tag_id']; ?>.html" title="<?php echo $team['category_name']; ?>"><?php echo $team['category_name']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </nav>
            <ul class="typeArtUl noDashed">
                <?php if(is_array($dejia_news) || $dejia_news instanceof \think\Collection || $dejia_news instanceof \think\Paginator): $i = 0; $__LIST__ = $dejia_news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                <li><a href="/<?php echo $new['pinyin']; ?>/<?php echo $new['article_id']; ?>.html" target="_blank" title="<?php echo $new['title']; ?>" class="text-hidden"><i></i><?php echo $new['title']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="pull-left typeArtRight">
            <ul class="recUl">
                <?php if(is_array($international_football_news) || $international_football_news instanceof \think\Collection || $international_football_news instanceof \think\Paginator): $i = 0; $__LIST__ = $international_football_news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                <li class="clearfix"> <a href="/<?php echo $new['url']; ?>/<?php echo $new['article_id']; ?>.html" target="_blank" title="<?php echo $new['title']; ?>" class="pull-left recImg"><img src="<?php echo $new['img']; ?>" width="100%" alt="<?php echo $new['title']; ?>"></a>
                    <div class="pull-left recArt">
                        <h3 class="text-hidden"><a href="/<?php echo $new['url']; ?>/<?php echo $new['article_id']; ?>.html" target="_blank" title="<?php echo $new['title']; ?>"><?php echo $new['title']; ?></a></h3>
                        <p><?php echo $new['content']; ?><a href="/<?php echo $new['url']; ?>/<?php echo $new['article_id']; ?>.html" target="_blank" title="<?php echo $new['title']; ?>">[详情]</a></p>
                    </div>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="clearfix titAndm"> <span class="pull-left">每日视频集锦</span> <a href="/<?php echo $top_category['7']; ?>/index.html" target="_blank" class="f12 text-999 pull-right moreTit">更多<em class="rightIcon"><i class="glyphicon glyphicon-menu-right"></i></em></a> </div>
            <ul class="clearfix videoBoxUl">
                <?php if(is_array($perday_highlights) || $perday_highlights instanceof \think\Collection || $perday_highlights instanceof \think\Paginator): $i = 0; $__LIST__ = $perday_highlights;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$highlight): $mod = ($i % 2 );++$i;?>
                <li class="pull-left">
                    <a href="/<?php echo $highlight['pinyin']; ?>/<?php echo $highlight['id']; ?>.html" target="_blank" title="<?php echo $highlight['title']; ?>"  class="videoImg cmHover"><img src="<?php echo $highlight['img']; ?>" width="100%" alt="<?php echo $highlight['title']; ?>">
                        <i class="coverMask"></i>
                        <i class="playBtn"></i>
                    </a>
                    <a href="37.html" target="_blank" title="<?php echo $highlight['title']; ?>" class="row-2"><?php echo $highlight['title']; ?></a> </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="pull-right typeArtLeft1">
            <nav class="typeArtNav clearfix"> <span class="pull-left">意甲足球推荐</span>
                <ul class="pull-left clearfix">
                    <?php if(is_array($yijia_support_teams) || $yijia_support_teams instanceof \think\Collection || $yijia_support_teams instanceof \think\Paginator): $i = 0; $__LIST__ = $yijia_support_teams;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$team): $mod = ($i % 2 );++$i;?>
                    <li><a target="_blank" href="/tag/<?php echo $team['tag_id']; ?>.html" title="<?php echo $team['category_name']; ?>"><?php echo $team['category_name']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </nav>
            <ul class="typeArtUl ">
                <?php if(is_array($yijia_news) || $yijia_news instanceof \think\Collection || $yijia_news instanceof \think\Paginator): $i = 0; $__LIST__ = $yijia_news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                <li><a href="/<?php echo $new['pinyin']; ?>/<?php echo $new['article_id']; ?>.html" target="_blank" title="<?php echo $new['title']; ?>" class="text-hidden"><i></i><?php echo $new['title']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <nav class="typeArtNav clearfix"> <span class="pull-left">法甲足球推荐</span>
                <ul class="pull-left clearfix">
                    <?php if(is_array($fajia_support_teams) || $fajia_support_teams instanceof \think\Collection || $fajia_support_teams instanceof \think\Paginator): $i = 0; $__LIST__ = $fajia_support_teams;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$team): $mod = ($i % 2 );++$i;?>
                    <li><a target="_blank" href="/tag/<?php echo $team['tag_id']; ?>.html" title="<?php echo $team['category_name']; ?>"><?php echo $team['category_name']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </nav>
            <ul class="typeArtUl">
                <?php if(is_array($fajia_news) || $fajia_news instanceof \think\Collection || $fajia_news instanceof \think\Paginator): $i = 0; $__LIST__ = $fajia_news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                <li><a href="/<?php echo $new['pinyin']; ?>/<?php echo $new['article_id']; ?>.html" target="_blank" title="<?php echo $new['title']; ?>" class="text-hidden"><i></i><?php echo $new['title']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="clearfix titAndm"> <span class="pull-left">足球精彩图片</span> <a href="/zqtp/" target="_blank" class="f12 text-999 pull-right moreTit">更多<em class="rightIcon"><i class="glyphicon glyphicon-menu-right"></i></em></a> </div>
            <ul class="clearfix videoBoxUl">
                <li class="pull-left"> <a href="/photo/30.html" target="_blank" title="英雄联盟KDA女团"  class="videoImg cmHover"><img src="201912161124591402/1_240.jpg" width="100%" alt="英雄联盟KDA女团"></a> <a href="/photo/30.html" target="_blank" title="英雄联盟KDA女团" class="row-2">英雄联盟KDA女团</a> </li>
                <li class="pull-left"> <a href="/photo/29.html" target="_blank" title="欧冠小组赛 科斯塔绝杀 尤文2-1莫斯科火车头"  class="videoImg cmHover"><img src="201912161124201130/1_240.jpg" width="100%" alt="欧冠小组赛 科斯塔绝杀 尤文2-1莫斯科火车头"></a> <a href="/photo/29.html" target="_blank" title="欧冠小组赛 科斯塔绝杀 尤文2-1莫斯科火车头" class="row-2">欧冠小组赛 科斯塔绝杀 尤文2-1莫斯科火车头</a> </li>
                <li class="pull-left"> <a href="/photo/28.html" target="_blank" title="王者荣耀高清英雄原画"  class="videoImg cmHover"><img src="201912161124451356/1_240.jpg" width="100%" alt="王者荣耀高清英雄原画"></a> <a href="/photo/28.html" target="_blank" title="王者荣耀高清英雄原画" class="row-2">王者荣耀高清英雄原画</a> </li>
            </ul>
        </div>
        <div class="clearfix"></div>
        <!-- fbTopic -->
        <div class="typeNav">
            <div class="pull-left typeTitle">

                <h2><span class="big">国内足球</span>
                    <?php if(is_array($domestic_football_teams) || $domestic_football_teams instanceof \think\Collection || $domestic_football_teams instanceof \think\Paginator): $i = 0; $__LIST__ = $domestic_football_teams;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$team): $mod = ($i % 2 );++$i;?>
                    <span class="gry"><?php echo $team['category_name']; ?></span>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </h2>
            </div>
        </div>
        <!-- typeArtCon -->
        <div class="clearfix h-15"></div>
        <div class="clearfix h-15"></div>
        <div class="pull-left typeArtLeft1">
            <ul class="recUl noDashed">

                <?php if(is_array($domestic_football_img_news) || $domestic_football_img_news instanceof \think\Collection || $domestic_football_img_news instanceof \think\Paginator): $i = 0; $__LIST__ = $domestic_football_img_news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                <li class="clearfix">
                    <a href="/<?php echo $new['url']; ?>/<?php echo $new['article_id']; ?>.html" target="_blank" title="<?php echo $new['title']; ?>" class="pull-left recImg">
                        <img src="<?php echo $new['img']; ?>" width="100%" alt="<?php echo $new['title']; ?>">
                    </a>
                    <div class="pull-left recArt">
                        <h3 class="text-hidden"><a href="/<?php echo $new['url']; ?>/<?php echo $new['article_id']; ?>.html" target="_blank" title="<?php echo $new['title']; ?>"><?php echo $new['title']; ?></a></h3>
                        <p><?php echo $new['content']; ?><a href="/<?php echo $new['url']; ?>/<?php echo $new['article_id']; ?>.html" target="_blank" title="<?php echo $new['title']; ?>">[详情]</a></p>
                    </div>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>

            </ul>
        </div>
        <div class="pull-left typeArtRight">
            <ul class="typeArtUl noDashed noPadTop">
                <?php if(is_array($domestic_football_news) || $domestic_football_news instanceof \think\Collection || $domestic_football_news instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($domestic_football_news) ? array_slice($domestic_football_news,0,7, true) : $domestic_football_news->slice(0,7, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                <li><a href="/<?php echo $new['pinyin']; ?>/<?php echo $new['article_id']; ?>.html" target="_blank" title="<?php echo $new['title']; ?>" class="text-hidden"><i></i>中国足球  |  <?php echo $new['title']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>


            <div class="clearfix titAndm"> <span class="pull-left">每日视频集锦</span> <a href="/<?php echo $zhongchao_highlight_link['pinyin']; ?>/index.php" target="_blank" class="f12 text-999 pull-right moreTit">更多<em class="rightIcon"><i class="glyphicon glyphicon-menu-right"></i></em></a> </div>
            <ul class="clearfix videoBoxUl noPadBot noMarBot">
                <?php if(is_array($domestic_perday_highlights) || $domestic_perday_highlights instanceof \think\Collection || $domestic_perday_highlights instanceof \think\Paginator): $i = 0; $__LIST__ = $domestic_perday_highlights;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$highlight): $mod = ($i % 2 );++$i;?>
                <li class="pull-left">
                    <a href="/<?php echo $highlight['pinyin']; ?>/<?php echo $highlight['id']; ?>.html" target="_blank" title="<?php echo $highlight['title']; ?>"  class="videoImg cmHover">
                        <img src="<?php echo $highlight['img']; ?>" width="100%"  alt="<?php echo $highlight['title']; ?>">
                        <i class="coverMask"></i><i class="playBtn"></i>
                    </a>
                    <a href="/<?php echo $highlight['pinyin']; ?>/<?php echo $highlight['id']; ?>.html" target="_blank" title="<?php echo $highlight['title']; ?>" class="row-2"><?php echo $highlight['title']; ?></a> </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="pull-right typeArtLeft1 nbaType">
            <div class="typeArtBox">
                <ul class="typeArtUl noDashed" style=" padding:0;">
                    <?php if(is_array($domestic_football_news) || $domestic_football_news instanceof \think\Collection || $domestic_football_news instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($domestic_football_news) ? array_slice($domestic_football_news,7,11, true) : $domestic_football_news->slice(7,11, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                    <li><a href="/<?php echo $highlight['pinyin']; ?>/<?php echo $highlight['id']; ?>.html" target="_blank" title="<?php echo $highlight['title']; ?>" class="text-hidden"><i></i><?php echo $highlight['title']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="h-15 b-t"></div>
        <div class="basketball ballTopic">
            <div class="pull-left leftTitle"><span>篮球专栏</span></div>
            <ul class="pull-right rightNav clearfix">
                <?php if(is_array($basketball_column) || $basketball_column instanceof \think\Collection || $basketball_column instanceof \think\Paginator): $i = 0; $__LIST__ = $basketball_column;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$column): $mod = ($i % 2 );++$i;?>
                <li><a href="/<?php echo $column['pinyin']; ?>/index.html" target="_blank" title="<?php echo $column['category_name']; ?>"><?php echo $column['category_name']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="typeNav one">
            <div class="pull-left typeTitle">
                <h2><span class="big">NBA</span>  </h2>
            </div>
        </div>
        <div class="pull-left typeArtLeft1 one">
            <?php if(is_array($basketball_teams) || $basketball_teams instanceof \think\Collection || $basketball_teams instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($basketball_teams) ? array_slice($basketball_teams,0,3, true) : $basketball_teams->slice(0,3, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$team): $mod = ($i % 2 );++$i;?>
            <nav class="typeArtNav clearfix"> <span class="pull-left"><?php echo $team['category_name']; ?></span>
                <ul class="pull-left clearfix">
                    <?php if(is_array($team['players']) || $team['players'] instanceof \think\Collection || $team['players'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($team['players']) ? array_slice($team['players'],1,3, true) : $team['players']->slice(1,3, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$player): $mod = ($i % 2 );++$i;?>
                    <li><a target="_blank" href="/tag/<?php echo $player['new_tag_id']; ?>.html" title="<?php echo $player['tag_name']; ?>"><?php echo $player['tag_name']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </nav>
            <ul class="typeArtUl ">
                <?php if(is_array($team['news']) || $team['news'] instanceof \think\Collection || $team['news'] instanceof \think\Paginator): $i = 0; $__LIST__ = $team['news'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                <li><a href="/<?php echo $team['url']; ?>/<?php echo $new['article_id']; ?>.html" target="_blank" title="<?php echo $new['title']; ?>" class="text-hidden"><i></i><?php echo $new['title']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="pull-left typeArtLeft1 one">
            <?php if(is_array($basketball_teams) || $basketball_teams instanceof \think\Collection || $basketball_teams instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($basketball_teams) ? array_slice($basketball_teams,3,3, true) : $basketball_teams->slice(3,3, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$team): $mod = ($i % 2 );++$i;?>
            <nav class="typeArtNav clearfix"> <span class="pull-left"><?php echo $team['category_name']; ?></span>
                <ul class="pull-left clearfix">
                    <?php if(is_array($team['players']) || $team['players'] instanceof \think\Collection || $team['players'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($team['players']) ? array_slice($team['players'],1,3, true) : $team['players']->slice(1,3, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$player): $mod = ($i % 2 );++$i;?>
                    <li><a target="_blank" href="/tag/<?php echo $player['new_tag_id']; ?>.html" title="<?php echo $player['tag_name']; ?>"><?php echo $player['tag_name']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </nav>
            <ul class="typeArtUl ">
                <?php if(is_array($team['news']) || $team['news'] instanceof \think\Collection || $team['news'] instanceof \think\Paginator): $i = 0; $__LIST__ = $team['news'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                <li><a href="/<?php echo $team['url']; ?>/<?php echo $new['article_id']; ?>.html" target="_blank" title="<?php echo $new['title']; ?>" class="text-hidden"><i></i><?php echo $new['title']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="pull-left typeArtLeft1 one">
            <?php if(is_array($basketball_teams) || $basketball_teams instanceof \think\Collection || $basketball_teams instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($basketball_teams) ? array_slice($basketball_teams,6,3, true) : $basketball_teams->slice(6,3, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$team): $mod = ($i % 2 );++$i;?>
            <nav class="typeArtNav clearfix"> <span class="pull-left"><?php echo $team['category_name']; ?></span>
                <ul class="pull-left clearfix">
                    <?php if(is_array($team['players']) || $team['players'] instanceof \think\Collection || $team['players'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($team['players']) ? array_slice($team['players'],1,3, true) : $team['players']->slice(1,3, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$player): $mod = ($i % 2 );++$i;?>
                    <li><a target="_blank" href="/tag/<?php echo $player['new_tag_id']; ?>.html" title="<?php echo $player['tag_name']; ?>"><?php echo $player['tag_name']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </nav>
            <ul class="typeArtUl ">
                <?php if(is_array($team['news']) || $team['news'] instanceof \think\Collection || $team['news'] instanceof \think\Paginator): $i = 0; $__LIST__ = $team['news'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                <li><a href="/<?php echo $team['url']; ?>/<?php echo $new['article_id']; ?>.html" target="_blank" title="<?php echo $new['title']; ?>" class="text-hidden"><i></i><?php echo $new['title']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="clearfix"></div>
        <div class="h-15 b-t"></div>
        <div class="typeNav one">
            <div class="pull-left typeTitle">
                <h2><span class="big">CBA</span>
                    <?php if(is_array($cba_support_teams) || $cba_support_teams instanceof \think\Collection || $cba_support_teams instanceof \think\Paginator): $i = 0; $__LIST__ = $cba_support_teams;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$team): $mod = ($i % 2 );++$i;?>
                    <span class="gry"><?php echo $team['category_name']; ?></span>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </h2>
            </div>
        </div>
        <div class="clearfix h-15"></div>
        <div class="pull-left typeArtLeft1 cbaType">
            <ul class="recUl noDashed">
                <?php if(is_array($cba_left_news) || $cba_left_news instanceof \think\Collection || $cba_left_news instanceof \think\Paginator): $i = 0; $__LIST__ = $cba_left_news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                <li class="clearfix">
                    <a href="/<?php echo $new['url']; ?>/<?php echo $new['article_id']; ?>.html" target="_blank" title="<?php echo $new['title']; ?>" class="pull-left recImg">
                        <img src="<?php echo $new['img']; ?>" width="100%"  alt="<?php echo $new['title']; ?>">
                    </a>
                    <div class="pull-left recArt">
                        <h3 class="text-hidden"><a href="/<?php echo $new['url']; ?>/<?php echo $new['article_id']; ?>.html" target="_blank" title="<?php echo $new['title']; ?>"><?php echo $new['title']; ?></a></h3>
                        <p><?php echo $new['content']; ?><a href="/<?php echo $new['url']; ?>/<?php echo $new['article_id']; ?>.html" target="_blank" title="<?php echo $new['title']; ?>">[详情]</a></p>
                    </div>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="pull-left typeArtRight cbaType">
            <ul class="typeArtUl noDashed noPadTop">
                <?php if(is_array($cba_news) || $cba_news instanceof \think\Collection || $cba_news instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($cba_news) ? array_slice($cba_news,0,7, true) : $cba_news->slice(0,7, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                <li><a href="/<?php echo $new['pinyin']; ?>/<?php echo $new['article_id']; ?>.html" target="_blank" title="<?php echo $new['title']; ?>" class="text-hidden"><i></i>中国蓝球  |  <?php echo $new['title']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>

            <div class="clearfix titAndm"> <span class="pull-left">视频中心</span>
                <a href="/<?php echo $cba_video_link['pinyin']; ?>/index.html" target="_blank" class="f12 text-999 pull-right moreTit">更多<em class="rightIcon"><i class="glyphicon glyphicon-menu-right"></i></em></a>
            </div>
            <ul class="clearfix videoBoxUl noPadBot noMarBot">
                <?php if(is_array($cba_videos) || $cba_videos instanceof \think\Collection || $cba_videos instanceof \think\Paginator): $i = 0; $__LIST__ = $cba_videos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): $mod = ($i % 2 );++$i;?>
                <li class="pull-left">
                    <a href="/<?php echo $video['pinyin']; ?>/<?php echo $video['id']; ?>.html" target="_blank" title="<?php echo $video['title']; ?>"  class="videoImg cmHover">
                        <img src="<?php echo $video['img']; ?>" width="100%"  alt="<?php echo $video['title']; ?>">
                        <i class="coverMask"></i><i class="playBtn"></i>
                    </a>
                    <a href="29.html" target="_blank" title="<?php echo $video['title']; ?>" class="row-2"><?php echo $video['title']; ?></a> </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="pull-right typeArtLeft1 nbaType">
            <div class="typeArtBox">
                <ul class="typeArtUl noDashed" style=" padding:0;">
                    <?php if(is_array($cba_news) || $cba_news instanceof \think\Collection || $cba_news instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($cba_news) ? array_slice($cba_news,7,11, true) : $cba_news->slice(7,11, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                    <li>
                        <a href="/<?php echo $video['pinyin']; ?>/<?php echo $video['id']; ?>.html" target="_blank" title="<?php echo $new['title']; ?>" class="text-hidden">
                            <i></i><?php echo $new['title']; ?>
                        </a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
        <!--新增-->
        <div class="basketball ballTopic one">
            <div class="pull-left leftTitle"><span>体育软件
</span></div>
            <ul class="pull-right rightNav clearfix">
                <li><a href="/nba/" target="_blank" title="NBA">NBA</a></li>
                <li><a href="" target="_blank" title="CBA">CBA</a></li>
            </ul>
        </div>

        <div class="ctj_box">
            <div class="ctj_tab btnlist" rel=".tabcontent_1"> <a class="cur">直播app</a> <a>体育app</a></div>
            <div class="ctj_cont tabcontent_1">
                <ul class="sy_ul">
                    <li> <a href="https://www.yoyou.com/game/wzlm/" target="_blank" class="ico_80" title="王者荣耀"><img alt="王者荣耀" src="images/20151118113503849.jpg">
                        <p class="name">王者荣耀</p>
                    </a></li>
                    <li> <a href="https://www.yoyou.com/game/dwrg1/" target="_blank" class="ico_80" title="第五人格"><img alt="第五人格" src="images/20180403022556420.jpg">
                        <p class="name">第五人格</p>
                    </a></li>
                    <li> <a href="https://www.yoyou.com/game/kxxxl/" target="_blank" class="ico_80" title="开心消消乐"><img alt="开心消消乐" src="images/20151201050146642.png">
                        <p class="name">开心消消乐</p>
                    </a></li>
                    <li> <a href="https://www.yoyou.com/game/wdsj/" target="_blank" class="ico_80" title="我的世界"><img alt="我的世界" src="images/20190603031932506.jpg">
                        <p class="name">我的世界</p>
                    </a></li>
                    <li> <a href="https://www.yoyou.com/game/mhxy/" target="_blank" class="ico_80" title="梦幻西游"><img alt="梦幻西游" src="images/20200217110747527.png">
                        <p class="name">梦幻西游</p>
                    </a></li>
                    <li> <a href="https://www.yoyou.com/game/qjnn/" target="_blank" class="ico_80" title="奇迹暖暖"><img alt="奇迹暖暖" src="images/20150523102206838.jpg">
                        <p class="name">奇迹暖暖</p>
                    </a></li>
                    <li> <a href="https://www.yoyou.com/game/hpjy/" target="_blank" class="ico_80" title="和平精英"><img alt="和平精英" src="images/20190508085912608.png">
                        <p class="name">和平精英</p>
                    </a></li>
                    <li> <a href="https://www.yoyou.com/game/lyzzr/" target="_blank" class="ico_80" title="恋与制作人"><img alt="恋与制作人" src="images/20171226053753446.png">
                        <p class="name">恋与制作人</p>
                    </a></li>
                    <li> <a href="https://www.yoyou.com/game/mrzh1/" target="_blank" class="ico_80" title="明日之后"><img alt="明日之后" src="images/20180406041724889.png">
                        <p class="name">明日之后</p>
                    </a></li>
                    <li> <a href="https://www.yoyou.com/game/sdyxl/" target="_blank" class="ico_80" title="神都夜行录"><img alt="神都夜行录" src="images/20180926033047665.jpg">
                        <p class="name">神都夜行录</p>
                    </a></li>
                </ul>
                <ul class="sy_ul">
                    <li> <a href="zuiqiangwoniu_107132.html" target="_blank" class="ico_80" title="最强蜗牛"><img alt="最强蜗牛" src="images/20200623044406562.png">
                        <p class="name">最强蜗牛</p>
                    </a></li>
                    <li> <a href="yirenzhixia_103478.html" target="_blank" class="ico_80" title="一人之下"><img alt="一人之下" src="images/20200527024435243.png">
                        <p class="name">一人之下</p>
                    </a></li>
                    <li> <a href="lingyanjue_76050.html" target="_blank" class="ico_80" title="凌烟诀"><img alt="凌烟诀" src="images/20190723015238856.jpg">
                        <p class="name">凌烟诀</p>
                    </a></li>
                    <li> <a href="baoleiqianxianpo_69917.html" target="_blank" class="ico_80" title="堡垒前线破坏与创造"><img alt="堡垒前线破坏与创造" src="images/20190520014514268.jpg">
                        <p class="name">堡垒前线破坏与创造</p>
                    </a></li>
                    <li> <a href="hepingjingying_69055.html" target="_blank" class="ico_80" title="和平精英"><img alt="和平精英" src="images/20190508115400331.png">
                        <p class="name">和平精英</p>
                    </a></li>
                    <li> <a href="yiqilaizhuoyao_40840.html" target="_blank" class="ico_80" title="一起来捉妖手游"><img alt="一起来捉妖手游" src="images/20190419043320514.jpg">
                        <p class="name">一起来捉妖手游</p>
                    </a></li>
                    <li> <a href="mingrifangzhouguan_37463.html" target="_blank" class="ico_80" title="明日方舟"><img alt="明日方舟" src="images/20190515035322230.png">
                        <p class="name">明日方舟</p>
                    </a></li>
                    <li> <a href="hundouluoguilai_11360.html" target="_blank" class="ico_80" title="魂斗罗归来"><img alt="魂斗罗归来" src="images/20200614101805161.jpg">
                        <p class="name">魂斗罗归来</p>
                    </a></li>
                    <li> <a href="892.html" target="_blank" class="ico_80" title="部落冲突"><img alt="部落冲突" src="images/20190603113935853.png">
                        <p class="name">部落冲突</p>
                    </a></li>
                    <li> <a href="tianlongrongyaoban_75513.html" target="_blank" class="ico_80" title="天龙荣耀版"><img alt="天龙荣耀版" src="images/20190716114943530.png">
                        <p class="name">天龙荣耀版</p>
                    </a></li>
                </ul>

            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!-- main -->
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
<script type="text/javascript" src="js/index1.js"></script>
</body>
</html>