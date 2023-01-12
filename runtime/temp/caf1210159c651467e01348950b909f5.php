<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:62:"D:\gary\mulu\public/../application/tiyu\view\fourth\zhibo.html";i:1672820948;s:53:"D:\gary\mulu\application\tiyu\view\public\header.html";i:1671309968;s:53:"D:\gary\mulu\application\tiyu\view\public\footer.html";i:1670883333;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" />
    <meta name="copyright" content="https://www.24zbw.com" />
    <title><?php echo $fourth['category_name']; ?></title>
    <meta content="<?php echo $fourth['description']; ?>" name="description" />
    <meta content="<?php echo $fourth['keywords']; ?>" name="keywords" />
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
<div class="content_box1">
    <div class="local">
        <a href="/index.html">首页</a> >
        <a href="/<?php echo $top_category[$fourth['top_id']]; ?>/index.html"><span><?php echo $type_name; ?>直播</span></a> >
        <a href="/<?php echo $fourth['p_pinyin']; ?>/index.html"><span><?php echo $fourth['p_category_name']; ?></span></a> > <?php echo $fourth['category_name']; ?>
    </div>
</div>
<div class="content_box">

    <div class="content_match_fixed">
        <?php if(is_array($zhiboData) || $zhiboData instanceof \think\Collection || $zhiboData instanceof \think\Paginator): $i = 0; $__LIST__ = $zhiboData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
        <a href="#<?php echo $item['day']; ?>" class='<?php if($item['is_today'] == 1): ?>today<?php else: ?>after-today<?php endif; ?>'>
            <i class="tagLine"></i>
            <?php if($item['show_day'] == 1): ?>
            <div><?php echo $item['day']; ?></div>
            <?php endif; ?>
            <div><?php echo $item['week']; ?></div>
        </a>
        <?php endforeach; endif; else: echo "" ;endif; if(is_array($videoData) || $videoData instanceof \think\Collection || $videoData instanceof \think\Paginator): $i = 0; $__LIST__ = $videoData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;if($item['is_today'] != 1): ?>
        <a href="#<?php echo $item['day']; ?>" class="before-today">
            <i class="tagLine"></i>
            <?php if($item['show_day'] == 1): ?>
            <div><?php echo $item['day']; ?></div>
            <?php endif; ?>
            <div><?php echo $item['week']; ?></div>
        </a>
        <?php endif; endforeach; endif; else: echo "" ;endif; ?>

        <a class="to-top">顶部</a>
    </div>
    <div class="content_left">
        <div class="content_match_tab">
            <div id="liveList">
                <li class="no-complete-match active"><a class="active">未完赛比赛</a></li>
                <li class="complete-match"><a>近期完赛视频</a></li>
            </div>
        </div>
        <div class="content_match_sheng">
            <p>本站所有比赛和视频链接均由网友提供，并链接到其他网站播放。</p>
        </div>
        <div class="content_match">
            <div class="content_match_not" style="position: relative;">
                <time class="time_show">更新时间：<?php echo $now; ?></time>

                <?php if(is_array($zhiboData) || $zhiboData instanceof \think\Collection || $zhiboData instanceof \think\Paginator): $i = 0; $__LIST__ = $zhiboData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                <div class="content_match_text" id="contentZ">
                    <h6 id="<?php echo $item['day']; ?>">
                        <time><?php echo $item['day']; ?> <?php echo $item['week']; ?></time>
                    </h6>

                    <?php if(is_array($item['list']) || $item['list'] instanceof \think\Collection || $item['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $item['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                    <li id="<?php echo $data['id']; ?>" data-id="<?php echo $data['id']; ?>" data-type="lanqiu" data-name="<?php echo $data['category_name']; ?>" class="matchItem">
                        <div class="scoreLeft">
                            <time><?php echo date("m:d",$data['create_time']); ?></time>
                            <p class="bout text-ignore"><a href="/<?php echo $data['pinyin']; ?>/index.html"><?php echo $data['category_name']; ?></a></p>
                        </div>
                        <div class="scoreMiddle">
                            <div class="scoreM scoreMiddle_top">
                                <img class="lazy" src='/images/default_img_60x60.png' />
                                <div class="scoreM_team"><?php echo $data['zhudui']; ?></div>
                                <div>0</div>
                            </div>
                            <div class="scoreM scoreMiddle_bot">
                                <img class="lazy" src='/images/default_img_60x60.png' />
                                <div class="scoreM_team"><?php echo $data['kedui']; ?></div>
                                <div>0</div>
                            </div>
                        </div>
                        <div class="scoreRight">
                            <a id="contentAnalyse" class="scoreRight_active" href="/<?php echo $top_category[$fourth['top_id']]; ?>/<?php echo $data['id']; ?>.html" target="_blank">直播信号</a>
                        </div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>

            </div>

            <div class="content_match_with" style="display: none; position: relative;">
                <time class="time_show">更新时间：<?php echo $now; ?></time>

                <!--<div class="content_match_text">-->

                <!--</div>-->

                <?php if(is_array($videoData) || $videoData instanceof \think\Collection || $videoData instanceof \think\Paginator): $i = 0; $__LIST__ = $videoData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                <div class="content_match_text one">
                    <h6 id="<?php echo $item['day']; ?>">
                        <time><?php echo $item['day']; ?> <?php echo $item['week']; ?></time>
                    </h6>
                    <ul>
                        <?php if(is_array($item['list']) || $item['list'] instanceof \think\Collection || $item['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $item['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                        <li>
                            <a href="/<?php echo $top_category[$data['top_id']]; ?>/<?php echo $data['id']; ?>.html"><?php echo $data['title']; ?></a> [<a href="/<?php echo $data['pinyin']; ?>/index.html"><?php echo $data['category_name']; ?></a>]
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>


                <!--<div class="content_match_text one">-->
                <!--<h6 id="2021-07-27">-->
                <!--<time>2021-07-27 周日</time>-->
                <!--</h6>-->
                <!--<ul>-->
                <!--<li>-->
                <!--12月2日 世界杯小组赛E组第3轮 哥斯达黎加vs德国 全场录像回放和集锦 [英超录像][曼联]-->

                <!--</li>-->
                <!--<li>12月2日 世界杯小组赛E组第3轮 哥斯达黎加vs德国 全场录像回放和集锦  [英超录像][曼联]-->
                <!--</li>-->

                <!--</ul>-->
                <!--</div>-->

            </div>
        </div>
    </div>

    <div style="width: 100%;height:20px;background: #f1f1f1"></div>
    <div class="nav_exp">
        <p class="nav_exp_P">直播网提供最新足球直播在線免費觀看，足球賽程，足球積分榜，射手榜，助攻榜，足球免費直播，足球在線觀看免費高清直播，轉播，視頻集錦，視頻回放，新聞資訊，陣容，實時比分 賽前分析，足球直播以及足球視頻回放鏈接均由網友提供，足球直播跳轉鏈接到其他網站觀看播放。</p>
    </div> <div style="width: 100%;height:20px;background: #f1f1f1"></div>
    <div class="nav_explain1">
        <p>本站所有比赛和视频链接均由网友提供，并链接到其他网站播放。</p>
    </div>
</div>
<div class="sliderCon">
    <div class="appCode" style="display: none;">
        <div class="appCodeLi">
            <div class="appCodeTitle">24直播手机客户端</div>
            <div class="appCodeImg">
                <div id="qrcode"></div>
            </div>
            <div class="appCodeScan">
                <p>扫码下载</p>
            </div>
        </div>
    </div>
    <div class="advertisingLocation adverBan" style="display: none;">
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


<script>$(".no-complete-match").on("click",function() {$(".after-today").show();$(".before-today").hide();$(".content_match_fixed a").removeClass("active");$(".today").addClass("active");});$(".complete-match").on("click",function() {$(".after-today").hide();$(".before-today").show();$(".content_match_fixed a").removeClass("active");$(".today").addClass("active");});$('.to-top').on("click",function() {$('body,html').animate({scrollTop:0
},500);$(this).removeClass("active");})
$(window).scroll(function() {var scrollTop =$(this).scrollTop();var scrollHeight =$(document).height();var windowHeight =$(this).height();var headH =$(".live_logo").height() + $(".subnav_box").height() + 20;var footH =$(".bottom_box").height();var dateH =$(".content_match_fixed").height();if(windowHeight < footH + dateH){if(scrollTop >=headH){if(scrollHeight>=footH + dateH){if (scrollHeight - scrollTop - windowHeight <=150) {$('.content_box .content_match_fixed').css({"position":"absolute","bottom":"0","left":"auto"
});$('.content_box .content_match_fixed').css("top","");}else{$('.content_box .content_match_fixed').css({"position":"fixed","top":"0","left":"auto"
});$('.content_box .content_match_fixed').css("bottom","");}
}else{$('.content_box .content_match_fixed').css({"position":"absolute","bottom":"0","left":"auto"
});$('.content_box .content_match_fixed').css("top","");}
}else{$('.content_box .content_match_fixed').css({"position":"absolute","top":"0","left":"auto"
});$('.content_box .content_match_fixed').css("bottom","");}
}else{if(scrollTop >=headH){$('.content_box .content_match_fixed').css({"position":"fixed","top":"0","left":"auto"
});$('.content_box .content_match_fixed').css("bottom","");}else{$('.content_box .content_match_fixed').css({"position":"absolute","top":"0","left":"auto"
});$('.content_box .content_match_fixed').css("bottom","");}
}
})
</script>

<script type="text/javascript">var livePage ="";var matchType ="zuqiu";
var urlN =window.location.href.split("#");if (urlN[1] ==1) {$("#liveList li a").removeClass("active");$(".content_match").children("div").css("display","none");$("#liveList .complete-qiu a").addClass("active");$(".content_match .content_qiu").css("display","block");}
</script>
<script>$(".after-today").show();$(".before-today").hide();$(".content_match_fixed a").removeClass("active");$(".today").addClass("active");$('.to-top').on("click",function() {$('body,html').animate({scrollTop:0
},500);$(this).removeClass("active");})
$('#liveList li').on("click",function(){
    var index=$(this).index();
    $(this).find('a').addClass('active');
    $(this).siblings().find('a').removeClass('active');
    $(".content_match>div").eq(index).css("display","block").siblings().css("display","none");
});
</script>


</html>