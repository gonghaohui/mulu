<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:59:"D:\gary\mulu\public/../application/tiyu\view\third\new.html";i:1673434250;s:53:"D:\gary\mulu\application\tiyu\view\public\header.html";i:1671309968;s:53:"D:\gary\mulu\application\tiyu\view\public\footer.html";i:1670883333;}*/ ?>
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

<div class="topic_subnav_box">
    <div class="topic_subnav">
        <ul>
            <li> <a href=""
                    class="hover">英超首页</a> </li>
            <li> <a href="zhibo.html"
                    class="">英超直播</a> </li>
            <li> <a href="jijing.html"
                    class="">英超集锦</a> </li>
            <li> <a href="erji.html"
                    class="">英超新闻</a> </li>
        </ul>
    </div>
</div>
<div class="content_box">
    <div class="local"><span class="one">当前位置：</span><a href="/index.html">首页</a> >
        <span><a href="/<?php echo $third['p_pinyin']; ?>/index.html"><?php echo $third['p_category_name']; ?></a></span>  >
        <span><?php echo $third['category_name']; ?></span></div>
    <div class="part_o">
        <div class="toc_left_w665">
            <div class=" toc_articles_box ">
                <div class="topic_articles">
                    <?php if(is_array($top_right) || $top_right instanceof \think\Collection || $top_right instanceof \think\Paginator): $i = 0; $__LIST__ = $top_right;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$right): $mod = ($i % 2 );++$i;?>
                    <h1> <i class="tag"><?php echo $right['category_name']; ?></i>
                        <?php if(is_array($right['news']) || $right['news'] instanceof \think\Collection || $right['news'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($right['news']) ? array_slice($right['news'],0,1, true) : $right['news']->slice(0,1, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                        <a href="/<?php echo $f_url; ?>/<?php echo $new['article_id']; ?>.html" target="_blank" title="<?php echo $new['title']; ?>"><?php echo $new['title']; ?></a> </h1>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    <ul>
                        <?php if(is_array($right['news']) || $right['news'] instanceof \think\Collection || $right['news'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($right['news']) ? array_slice($right['news'],1,4, true) : $right['news']->slice(1,4, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                        <li> <a href="/<?php echo $f_url; ?>/<?php echo $new['article_id']; ?>.html" target="_blank" title="<?php echo $new['title']; ?>" class=""> <?php echo $new['title']; ?> </a> </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <div class="hot_textimg_box">
                <div class="hot_textimg clearfix">
                    <ul>
                        <li> <a href="/lqnews/885.html" target="_blank"> <img src="img/294ACB13-96C4-4A88-96C3-75235EF1EDCD.png" alt=""/> <span>名记：史蒂夫-库里将与勇士完成4年2.15亿美元的提前续约</span> <strong>英超最Top</strong> </a> </li>
                        <li> <a href="/lqnews/883.html" target="_blank"> <img src="img/1EF9CC84-9AF2-4B42-8C1B-5BD2E5EDC01F.png" alt=""/> <span>名记：小卡跳出合同预计将和快船重签一份相对短的合约</span> <strong>英超万花筒</strong> </a> </li>
                        <li> <a href="/lqnews/893.html" target="_blank"> <img src="img/3C445F7C-34B1-4A14-B227-E3CCA901753B.png" alt=""/> <span>篮网GM：丁威迪有能力试水自由市场，去哪打球取决于自己</span> <strong>英超麻辣烫</strong> </a> </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="toc_right_w525">
            <div class="topic_match_box">
                <div class="topic_tag_title">
                    <h1>热门比赛</h1>
                    <i>|</i> <a href="/<?php echo $all_games_url['pinyin']; ?>/index.html">全部比赛 <s>&gt;</s></a> </div>
                <div class="topic_match_list">
                    <?php if(is_array($hot_games) || $hot_games instanceof \think\Collection || $hot_games instanceof \think\Paginator): $i = 0; $__LIST__ = $hot_games;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$game): $mod = ($i % 2 );++$i;?>
                    <div class="list_block">
                        <a href="/<?php echo $top_category[$game['top_id']]; ?>/<?php echo $game['id']; ?>.html" target="_blank">
                            <div class="state gray">
                                <?php if($game['create_time'] + 7200 < $time): ?>
                                已结束
                                <?php else: ?>
                                未开始
                                <?php endif; ?>
                            </div>
                            <time class="time"><?php echo date("m-d H:i",$game['create_time']); ?></time>
                            <div class="type text-ignore"><?php echo $game['saishi']; ?></div>
                            <div class="match_name">
                                <span class="text_left text-ignore"><?php echo $game['zhudui']; ?></span>
                                <!--<img class="lazy" src="img/20180117154321.jpg" data-original="img/20180117154321.jpg">-->
                                <strong style="padding: 0 10px;"><?php echo $game['bifen']; ?></strong>
                                <!--<div class="shape"></div>-->
                                <!--<strong>112</strong>-->
                                <!--<img class="lazy" src="img/20180117153007.png" data-original="img/20180117153007.png">-->
                                <span class="text_right text-ignore"><?php echo $game['kedui']; ?></span> </div>
                            <!--<div class="resource green">集锦</div>-->
                        </a>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                </div>
            </div>

        </div>
    </div>
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
            <div style="margin-top: 10px;"></div>
            <div class="topic_right_block">
                <div class="tocr_block_title">
                    <h1>排行榜</h1>
                    <a href="/jifen/nba/">完整排行</a> </div>
                <div class="tocr_block_taggle">
                    <ul>
                        <li class="active" style="width: 50%">英超排行榜<s></s></li>

                    </ul>
                </div>
                <div class="ranking_taggle">
                    <div class="tocr_block_table" style="">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <th style="width: 10%;">排名</th>
                                <th colspan="2" style="width: 50%;">球队</th>
                                <th style="width: 20%">胜负</th>
                                <th style="width: 20%;">积分</th>
                            </tr>
                            <tr>
                                <td><span class="red">1</span></td>
                                <td><img class="lazy" width="35px" src="img/20180117152851.png"  /></td>
                                <td style="text-align: left;">76人</td>
                                <td>49/23</td>
                                <td>0.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">2</span></td>
                                <td><img class="lazy" width="35px" src="img/20120821112729.jpg"  /></td>
                                <td style="text-align: left;">篮网</td>
                                <td>48/24</td>
                                <td>1.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">3</span></td>
                                <td><img class="lazy" width="35px" src="img/20180117154321.jpg"  /></td>
                                <td style="text-align: left;">雄鹿</td>
                                <td>46/26</td>
                                <td>3.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">4</span></td>
                                <td><img class="lazy" width="35px" src="img/20120112165918.jpg"  /></td>
                                <td style="text-align: left;">尼克斯</td>
                                <td>41/31</td>
                                <td>8.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">5</span></td>
                                <td><img class="lazy" width="35px" src="img/20180117153007.png"  /></td>
                                <td style="text-align: left;">老鹰</td>
                                <td>41/31</td>
                                <td>8.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">6</span></td>
                                <td><img class="lazy" width="35px" src="img/20120112154051.jpg"  /></td>
                                <td style="text-align: left;">热火</td>
                                <td>40/32</td>
                                <td>9.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">7</span></td>
                                <td><img class="lazy" width="35px" src="img/20120112150854.jpg"  /></td>
                                <td style="text-align: left;">凯尔特人</td>
                                <td>36/36</td>
                                <td>13.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">8</span></td>
                                <td><img class="lazy" width="35px" src="img/20180117153230.png"  /></td>
                                <td style="text-align: left;">奇才</td>
                                <td>34/38</td>
                                <td>15.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">9</span></td>
                                <td><img class="lazy" width="35px" src="img/20180117154046.png"  /></td>
                                <td style="text-align: left;">步行者</td>
                                <td>34/38</td>
                                <td>15.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">10</span></td>
                                <td><img class="lazy" width="35px" src="img/20140521143018.jpg"  /></td>
                                <td style="text-align: left;">黄蜂</td>
                                <td>33/39</td>
                                <td>16.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">11</span></td>
                                <td><img class="lazy" width="35px" src="img/20120112161112.jpg"  /></td>
                                <td style="text-align: left;">公牛</td>
                                <td>31/41</td>
                                <td>18.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">12</span></td>
                                <td><img class="lazy" width="35px" src="img/20180117152618.png"  /></td>
                                <td style="text-align: left;">猛龙</td>
                                <td>27/45</td>
                                <td>22.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">13</span></td>
                                <td><img class="lazy" width="35px" src="img/20180117153527.png"  /></td>
                                <td style="text-align: left;">骑士</td>
                                <td>22/50</td>
                                <td>27.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">14</span></td>
                                <td><img class="lazy" width="35px" src="img/20120112171211.jpg"  /></td>
                                <td style="text-align: left;">魔术</td>
                                <td>21/51</td>
                                <td>28.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">15</span></td>
                                <td><img class="lazy" width="35px" src="img/20180117153734.png"  /></td>
                                <td style="text-align: left;">活塞</td>
                                <td>20/52</td>
                                <td>29.0</td>
                            </tr>
                        </table>
                    </div>

                </div>
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