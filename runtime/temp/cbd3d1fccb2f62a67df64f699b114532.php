<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:65:"D:\gary\mulu\public/../application/tiyu\view\third\highlight.html";i:1672909447;s:53:"D:\gary\mulu\application\tiyu\view\public\header.html";i:1671309968;s:53:"D:\gary\mulu\application\tiyu\view\public\footer.html";i:1670883333;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" />
    <title><?php echo $third['category_name']; ?></title>
    <meta content="<?php echo $third['description']; ?>" name="description" />
    <meta content="<?php echo $third['keywords']; ?>" name="keywords" />
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" href="/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"  />
    <link rel="stylesheet" href="/static/tiyu/css/reset.css" />
    <link rel="stylesheet" href="/static/tiyu/css/index.css">
    <link rel="stylesheet" href="/static/tiyu/css/style.css" />
    <link rel="stylesheet" href="/static/tiyu/css/sy-footer.css">
    <link rel="stylesheet" href="/static/tiyu/css/hot_news.css" />
    <script type="text/javascript"  src="/static/tiyu/js/jquery.min.js"></script>
    <script type="text/javascript" src="/static/tiyu/js/biebuzhu.js"></script></head>

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

<div class="topic_subnav_box">
    <div class="topic_subnav">
        <ul>
            <li> <a href="" class="hover"><?php echo $third['highlight_name']; ?>集锦首页</a> </li>

            <?php if($zhibo_category['pinyin'] != null): ?>
            <li> <a href="/<?php echo $zhibo_category['pinyin']; ?>/index.html" class=""><?php echo $third['highlight_name']; ?>直播</a> </li>
            <?php endif; if($video_category['pinyin'] != null): ?>
            <li> <a href="/<?php echo $video_category['pinyin']; ?>/index.html" class=""><?php echo $third['highlight_name']; ?>录像</a> </li>
            <?php endif; if($new_category['pinyin'] != null): ?>
            <li> <a href="/<?php echo $new_category['pinyin']; ?>/index.html" class=""><?php echo $third['highlight_name']; ?>新闻</a> </li>
            <?php endif; ?>

        </ul>
    </div>
</div>

<div class="content_box">
    <div class="local"><span class="one">当前位置：</span><a href="/index.html">首页</a> > <span><a href="/<?php echo $third['p_pinyin']; ?>/index.html"><?php echo $third['p_category_name']; ?></a></span>  > <?php echo $third['category_name']; ?></div>

    <div class="part_o">

        <div class="toc_left_w850">

            <?php if(is_array($teams) || $teams instanceof \think\Collection || $teams instanceof \think\Paginator): $k = 0; $__LIST__ = $teams;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$team): $mod = ($k % 2 );++$k;?>
            <div class="topic_name_video_box">
                <div class="tocname_tag_title">
                    <div class="tpleft"><img class="lazy" src="<?php echo $team['img']; ?>" data-original="" />
                        <h1><a href="/<?php echo $team['pinyin']; ?>/index.html"><?php echo $team['category_name']; ?></a></h1>
                    </div>
                    <a href="/<?php echo $team['pinyin']; ?>/index.html" class="gd" target="_blank">更多></a>
                    <ul class="btnlist" rel=".tabcontent_<?php echo $k; ?>">
                        <?php if(is_array($team['players']) || $team['players'] instanceof \think\Collection || $team['players'] instanceof \think\Paginator): $i = 0; $__LIST__ = $team['players'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$player): $mod = ($i % 2 );++$i;?>
                        <li data-value="<?php echo $player['tag_name']; ?>" class="team-tag"> <a href="javascript:"  class="active"><?php echo $player['tag_name']; ?></a> </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>


                <div class="tabcontent_<?php echo $k; ?>">
                    <?php if(is_array($team['players']) || $team['players'] instanceof \think\Collection || $team['players'] instanceof \think\Paginator): $i = 0; $__LIST__ = $team['players'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$player): $mod = ($i % 2 );++$i;?>
                    <div class="ta_show">
                        <div class="tocname_list">
                            <ul>
                                <?php if(is_array($player['news']) || $player['news'] instanceof \think\Collection || $player['news'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($player['news']) ? array_slice($player['news'],0,5, true) : $player['news']->slice(0,5, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                                <li> <a href="/<?php echo $f_url; ?>/<?php echo $new['article_id']; ?>.html" title="<?php echo $new['title']; ?>" target="_blank"><?php echo $new['title']; ?></a> </li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                            <ul>
                                <?php if(is_array($player['news']) || $player['news'] instanceof \think\Collection || $player['news'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($player['news']) ? array_slice($player['news'],5,5, true) : $player['news']->slice(5,5, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                                <li> <a href="/<?php echo $f_url; ?>/<?php echo $new['article_id']; ?>.html" title="<?php echo $new['title']; ?>" target="_blank"><?php echo $new['title']; ?></a> </li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>


                </div>
                <div class="tocname_score_box clearfix"> </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>









        </div>


        <div class="toc_right_w340">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">推荐<?php echo $third['highlight_name']; ?>集锦视频</div>
                </div>
                <ul class="list-group">
                    <?php if(is_array($hot_highlight) || $hot_highlight instanceof \think\Collection || $hot_highlight instanceof \think\Paginator): $i = 0; $__LIST__ = $hot_highlight;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$highlight): $mod = ($i % 2 );++$i;?>
                    <li>
                        <a href="/<?php echo $top_category[$highlight['top_id']]; ?>/<?php echo $highlight['id']; ?>.html" title="<?php echo $highlight['title']; ?>">
                            <b><?php echo $highlight['title']; ?></b>
                        </a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>

            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">最新<?php echo $third['highlight_name']; ?>集锦视频</div>
                </div>
                <ul class="list-group">
                    <?php if(is_array($latest_highlight) || $latest_highlight instanceof \think\Collection || $latest_highlight instanceof \think\Paginator): $i = 0; $__LIST__ = $latest_highlight;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$highlight): $mod = ($i % 2 );++$i;?>
                    <li>
                        <a href="/<?php echo $top_category[$highlight['top_id']]; ?>/<?php echo $highlight['id']; ?>.html" title="<?php echo $highlight['title']; ?>">
                            <b><?php echo $highlight['title']; ?></b>
                        </a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--底部-->
<div class="footer">
    <div class="copyright">
        <div class="link"> <a target="_blank" href="/about.html" rel="nofollow">网站地图</a> | <a target="_blank" href="/law.html" rel="nofollow">联系我们</a> | <a target="_blank" href="/view.html" rel="nofollow">免责声明</a> </div>
        <p>Copyright © 2019-2029球迷网 版权所 备案：<a href="http://www.beian.miit.gov.cn" target="_blank;" rel="nofollow">闽ICP备19013775号-2</a> <a target="_blank" style="padding-left:10px;" href="https://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44010602001489" rel="nofollow"><img src="images/ghs.png"/>粤公网安备 44xxxxxxxxx号</a> </p>
        <p>球迷网是一个体育导航，所有直播和视频链接均由网友提供，并链接到其他网站播放，如有异议请与我们取得联系。</p>
    </div>
</div>


<script type="text/javascript">
    $('.tocr_block_taggle li').on("mouseover", function () {
        var _index = $(this).index();
        $(this).addClass("active").siblings().removeClass();
        $(this).parents('.tocr_block_taggle').siblings('.ranking_taggle').children('div').eq(_index).show().siblings().hide();
    })
</script>
<script>
    $(".btnlist").each(function(idx,item){
        $(item).children().eq(0).addClass("cur");
        if(!!$(this).attr("rel"))
        {
            $($(this).attr("rel")).children().eq(0).addClass("cur");
        }
    });
    $(".btnlist").children().bind("click",function(){
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

</body>
</html>