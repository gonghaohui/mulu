<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:60:"D:\gary\mulu\public/../application/tiyu\view\second\new.html";i:1671377312;s:53:"D:\gary\mulu\application\tiyu\view\public\header.html";i:1671309968;s:53:"D:\gary\mulu\application\tiyu\view\public\footer.html";i:1670883333;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" />
    <title><?php echo $second['category_name']; ?></title>
    <meta content="<?php echo $second['description']; ?>" name="description" />
    <meta content="<?php echo $second['keywords']; ?>" name="keywords" />
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

<div class="content_box">
    <div class="local">
        <span class="one">当前位置：</span><a href="/index.html">首页</a> >

        <span><?php echo $second['category_name']; ?></span></div>
    <div class="part_o">
        <div class="toc_left_w665">
            <div class="topic_match_box">
                <div class="topic_tag_title">
                    <h1>热门比赛</h1>
                    <i>|</i> <a href="">英超比赛 <s>&gt;</s></a>
                    <i>|</i> <a href="">意甲比赛 <s>&gt;</s></a>
                    <i>|</i> <a href="">法甲比赛 <s>&gt;</s></a>

                    <i>|</i> <a href="">全部比赛 <s>&gt;</s></a>
                </div>
                <div class="topic_match_list">
                    <div class="list_block"> <a href="/live/lanqiu/25.html" target="_blank">
                        <div class="state gray">已结束</div>
                        <time class="time">07-02 08:30</time>
                        <div class="type text-ignore">NBA</div>
                        <div class="match_name"> <span class="text_left text-ignore">雄鹿</span> <img class="lazy" src="img/20180117154321.jpg" data-original="img/20180117154321.jpg"> <strong>123</strong>
                            <div class="shape"></div>
                            <strong>112</strong> <img class="lazy" src="img/20180117153007.png" data-original="img/20180117153007.png"> <span class="text_right text-ignore">老鹰</span> </div>
                        <div class="resource green">集锦</div>
                    </a> </div>
                    <div class="list_block"> <a href="/live/lanqiu/8.html" target="_blank">
                        <div class="state gray">已结束</div>
                        <time class="time">07-04 08:30</time>
                        <div class="type text-ignore">NBA</div>
                        <div class="match_name"> <span class="text_left text-ignore">老鹰</span> <img class="lazy" src="img/20180117153007.png" data-original="img/20180117153007.png"> <strong>107</strong>
                            <div class="shape"></div>
                            <strong>118</strong> <img class="lazy" src="img/20180117154321.jpg" data-original="img/20180117154321.jpg"> <span class="text_right text-ignore">雄鹿</span> </div>
                        <div class="resource green">集锦</div>
                    </a> </div>
                    <div class="list_block"> <a href="/live/lanqiu/18.html" target="_blank">
                        <div class="state gray">已结束</div>
                        <time class="time">07-07 09:00</time>
                        <div class="type text-ignore">NBA</div>
                        <div class="match_name"> <span class="text_left text-ignore">太阳</span> <img class="lazy" src="img/20181110015009.jpg" data-original="img/20181110015009.jpg"> <strong>0</strong>
                            <div class="shape"></div>
                            <strong>0</strong> <img class="lazy" src="img/20180117154321.jpg" data-original="img/20180117154321.jpg"> <span class="text_right text-ignore">雄鹿</span> </div>
                        <div class="resource green">集锦</div>
                    </a> </div>
                    <div class="list_block"> <a href="/live/lanqiu/21.html" target="_blank">
                        <div class="state gray">已结束</div>
                        <time class="time">07-09 09:00</time>
                        <div class="type text-ignore">NBA</div>
                        <div class="match_name"> <span class="text_left text-ignore">太阳</span> <img class="lazy" src="img/20181110015009.jpg" data-original="img/20181110015009.jpg"> <strong>0</strong>
                            <div class="shape"></div>
                            <strong>0</strong> <img class="lazy" src="img/20180117154321.jpg" data-original="img/20180117154321.jpg"> <span class="text_right text-ignore">雄鹿</span> </div>
                        <div class="resource green">集锦</div>
                    </a> </div>
                    <div class="list_block"> <a href="/live/lanqiu/24.html" target="_blank">
                        <div class="state gray">已结束</div>
                        <time class="time">07-11 09:00</time>
                        <div class="type text-ignore">NBA</div>
                        <div class="match_name"> <span class="text_left text-ignore">雄鹿</span> <img class="lazy" src="img/20180117154321.jpg" data-original="img/20180117154321.jpg"> <strong>0</strong>
                            <div class="shape"></div>
                            <strong>0</strong> <img class="lazy" src="img/20181110015009.jpg" data-original="img/20181110015009.jpg"> <span class="text_right text-ignore">太阳</span> </div>
                        <div class="resource green">集锦</div>
                    </a> </div>
                    <div class="list_block"> <a href="/live/lanqiu/281.html" target="_blank">
                        <div class="state gray">已结束</div>
                        <time class="time">07-12 08:00</time>
                        <div class="type text-ignore">NBA</div>
                        <div class="match_name"> <span class="text_left text-ignore">雄鹿</span> <img class="lazy" src="img/20180117154321.jpg" data-original="img/20180117154321.jpg"> <strong>0</strong>
                            <div class="shape"></div>
                            <strong>0</strong> <img class="lazy" src="img/20181110015009.jpg" data-original="img/20181110015009.jpg"> <span class="text_right text-ignore">太阳</span> </div>
                        <div class="resource green">集锦</div>
                    </a> </div>
                    <div class="list_block"> <a href="/live/lanqiu/27.html" target="_blank">
                        <div class="state gray">已结束</div>
                        <time class="time">07-13 09:00</time>
                        <div class="type text-ignore">NBA</div>
                        <div class="match_name"> <span class="text_left text-ignore">雄鹿</span> <img class="lazy" src="img/20180117154321.jpg" data-original="img/20180117154321.jpg"> <strong>0</strong>
                            <div class="shape"></div>
                            <strong>0</strong> <img class="lazy" src="img/20181110015009.jpg" data-original="img/20181110015009.jpg"> <span class="text_right text-ignore">太阳</span> </div>
                        <div class="resource green">集锦</div>
                    </a> </div>
                    <div class="list_block"> <a href="/live/lanqiu/282.html" target="_blank">
                        <div class="state gray">已结束</div>
                        <time class="time">07-15 09:00</time>
                        <div class="type text-ignore">NBA</div>
                        <div class="match_name"> <span class="text_left text-ignore">雄鹿</span> <img class="lazy" src="img/20180117154321.jpg" data-original="img/20180117154321.jpg"> <strong>0</strong>
                            <div class="shape"></div>
                            <strong>0</strong> <img class="lazy" src="img/20181110015009.jpg" data-original="img/20181110015009.jpg"> <span class="text_right text-ignore">太阳</span> </div>
                        <div class="resource green">集锦</div>
                    </a> </div>
                    <div class="list_block"> <a href="/live/lanqiu/282.html" target="_blank">
                        <div class="state gray">已结束</div>
                        <time class="time">07-15 09:00</time>
                        <div class="type text-ignore">NBA</div>
                        <div class="match_name"> <span class="text_left text-ignore">雄鹿</span> <img class="lazy" src="img/20180117154321.jpg" data-original="img/20180117154321.jpg"> <strong>0</strong>
                            <div class="shape"></div>
                            <strong>0</strong> <img class="lazy" src="img/20181110015009.jpg" data-original="img/20181110015009.jpg"> <span class="text_right text-ignore">太阳</span> </div>
                        <div class="resource green">集锦</div>
                    </a> </div>
                    <div class="list_block"> <a href="/live/lanqiu/282.html" target="_blank">
                        <div class="state gray">已结束</div>
                        <time class="time">07-15 09:00</time>
                        <div class="type text-ignore">NBA</div>
                        <div class="match_name"> <span class="text_left text-ignore">雄鹿</span> <img class="lazy" src="img/20180117154321.jpg" data-original="img/20180117154321.jpg"> <strong>0</strong>
                            <div class="shape"></div>
                            <strong>0</strong> <img class="lazy" src="img/20181110015009.jpg" data-original="img/20181110015009.jpg"> <span class="text_right text-ignore">太阳</span> </div>
                        <div class="resource green">集锦</div>
                    </a> </div>
                </div>
            </div>
            <div class="hot_textimg_box">
                <div class="hot_textimg clearfix">
                    <ul>
                        <li> <a href="/lqnews/885.html" target="_blank"> <img src="img/294ACB13-96C4-4A88-96C3-75235EF1EDCD.png" alt=""/> <span>名记：史蒂夫-库里将与勇士完成4年2.15亿美元的提前续约</span> <strong>NBA最Top</strong> </a> </li>
                        <li> <a href="/lqnews/883.html" target="_blank"> <img src="img/1EF9CC84-9AF2-4B42-8C1B-5BD2E5EDC01F.png" alt=""/> <span>名记：小卡跳出合同预计将和快船重签一份相对短的合约</span> <strong>NBA万花筒</strong> </a> </li>
                        <li> <a href="/lqnews/893.html" target="_blank"> <img src="img/3C445F7C-34B1-4A14-B227-E3CCA901753B.png" alt=""/> <span>篮网GM：丁威迪有能力试水自由市场，去哪打球取决于自己</span> <strong>NBA麻辣烫</strong> </a> </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="toc_right_w525">
            <div class=" toc_articles_box ">
                <div class="topic_articles">
                    <?php if(is_array($top_right) || $top_right instanceof \think\Collection || $top_right instanceof \think\Paginator): $i = 0; $__LIST__ = $top_right;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$right): $mod = ($i % 2 );++$i;?>
                    <h1> <i class="tag"><?php echo $right['category_name']; ?></i>
                        <?php if(is_array($right['news']) || $right['news'] instanceof \think\Collection || $right['news'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($right['news']) ? array_slice($right['news'],0,1, true) : $right['news']->slice(0,1, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                        <a href="/<?php echo $url; ?>/<?php echo $new['article_id']; ?>.html" target="_blank" title="<?php echo $new['title']; ?>"><?php echo $new['title']; ?></a>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </h1>
                    <ul>
                        <?php if(is_array($right['news']) || $right['news'] instanceof \think\Collection || $right['news'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($right['news']) ? array_slice($right['news'],1,4, true) : $right['news']->slice(1,4, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                        <li> <a href="/<?php echo $url; ?>/<?php echo $new['article_id']; ?>.html" target="_blank" title="<?php echo $new['title']; ?>" class=""> <?php echo $new['title']; ?> </a> </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="part_o">
        <div class="toc_left_w850">

            <?php if(is_array($leagues) || $leagues instanceof \think\Collection || $leagues instanceof \think\Paginator): $k = 0; $__LIST__ = $leagues;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$league): $mod = ($k % 2 );++$k;?>
            <div class="topic_name_video_box">
                <div class="tocname_tag_title">
                    <div class="tpleft"><img class="lazy" src="<?php echo $league['img']; ?>" data-original="" />
                        <h1><a href="/<?php echo $league['pinyin']; ?>/index.html"><?php echo $league['category_name']; ?></a></h1>
                    </div>
                    <a href="/<?php echo $league['pinyin']; ?>/index.html" class="gd" target="_blank">更多></a>
                    <ul class="btnlist" rel=".tabcontent_<?php echo $k; ?>">
                        <?php if(is_array($league['teams']) || $league['teams'] instanceof \think\Collection || $league['teams'] instanceof \think\Paginator): $i = 0; $__LIST__ = $league['teams'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$team): $mod = ($i % 2 );++$i;?>
                        <li data-value="<?php echo $team['category_name']; ?>" class="team-tag"> <a href="javascript:"  class="active"><?php echo $team['category_name']; ?></a> </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>

                <div class="tabcontent_<?php echo $k; ?>">
                    <?php if(is_array($league['teams']) || $league['teams'] instanceof \think\Collection || $league['teams'] instanceof \think\Paginator): $i = 0; $__LIST__ = $league['teams'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$team): $mod = ($i % 2 );++$i;?>
                    <div class="ta_show">
                        <div class="tocname_list clearfix">
                            <ul>
                                <?php if(is_array($team['news']) || $team['news'] instanceof \think\Collection || $team['news'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($team['news']) ? array_slice($team['news'],0,5, true) : $team['news']->slice(0,5, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                                <li> <a href="/<?php echo $url; ?>/<?php echo $new['article_id']; ?>.html" title="<?php echo $new['title']; ?>" target="_blank"><?php echo $new['title']; ?></a> </li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>

                            </ul>
                            <ul>
                                <?php if(is_array($team['news']) || $team['news'] instanceof \think\Collection || $team['news'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($team['news']) ? array_slice($team['news'],5,5, true) : $team['news']->slice(5,5, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                                <li> <a href="/<?php echo $url; ?>/<?php echo $new['article_id']; ?>.html" title="<?php echo $new['title']; ?>" target="_blank"><?php echo $new['title']; ?></a> </li>
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
                    <h1>五大联赛</h1>
                    <a href="/jifen/nba/">完整排行</a> </div>
                <div class="tocr_block_taggle">
                    <ul>
                        <li class="active" style="width: 20%">英超<s></s></li>
                        <li class="" style="width: 20%">西甲<s></s></li>
                        <li class="" style="width: 20%">德甲<s></s></li>
                        <li class="" style="width: 20%">法甲<s></s></li>
                        <li class="" style="width: 20%">意甲<s></s></li>

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
                    <div class="tocr_block_table" style="display: none;">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <th style="width: 10%;">排名</th>
                                <th colspan="2" style="width: 50%;">球队</th>
                                <th style="width: 20%">胜负</th>
                                <th style="width: 20%;">胜场差</th>
                            </tr>
                            <tr>
                                <td><span class="red">1</span></td>
                                <td><img class="lazy" width="35px" src="img/20180117160235.jpg"  /></td>
                                <td style="text-align: left;">爵士</td>
                                <td>52/20</td>
                                <td>0.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">2</span></td>
                                <td><img class="lazy" width="35px" src="img/20181110015009.jpg"  /></td>
                                <td style="text-align: left;">太阳</td>
                                <td>51/21</td>
                                <td>1.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">3</span></td>
                                <td><img class="lazy" width="35px" src="img/20181110015501.jpg"  /></td>
                                <td style="text-align: left;">掘金</td>
                                <td>47/25</td>
                                <td>5.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">4</span></td>
                                <td><img class="lazy" width="35px" src="img/20181127002318.jpg"  /></td>
                                <td style="text-align: left;">快船</td>
                                <td>47/25</td>
                                <td>5.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">5</span></td>
                                <td><img class="lazy" width="35px" src="img/20120112153816.jpg"  /></td>
                                <td style="text-align: left;">独行侠</td>
                                <td>42/30</td>
                                <td>10.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">6</span></td>
                                <td><img class="lazy" width="35px" src="img/20180117155150.jpg"  /></td>
                                <td style="text-align: left;">开拓者</td>
                                <td>42/30</td>
                                <td>10.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">7</span></td>
                                <td><img class="lazy" width="35px" src="img/20120112163535.jpg"  /></td>
                                <td style="text-align: left;">湖人</td>
                                <td>42/30</td>
                                <td>10.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">8</span></td>
                                <td><img class="lazy" width="35px" src="img/20120112154418.jpg"  /></td>
                                <td style="text-align: left;">灰熊</td>
                                <td>38/34</td>
                                <td>14.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">9</span></td>
                                <td><img class="lazy" width="35px" src="img/20120112150506.jpg"  /></td>
                                <td style="text-align: left;">勇士</td>
                                <td>39/33</td>
                                <td>13.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">10</span></td>
                                <td><img class="lazy" width="35px" src="img/20200413151531.jpg"  /></td>
                                <td style="text-align: left;">马刺</td>
                                <td>33/39</td>
                                <td>19.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">11</span></td>
                                <td><img class="lazy" width="35px" src="img/20130419172910.jpg"  /></td>
                                <td style="text-align: left;">鹈鹕</td>
                                <td>31/41</td>
                                <td>21.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">12</span></td>
                                <td><img class="lazy" width="35px" src="img/20160428142101.jpg"  /></td>
                                <td style="text-align: left;">国王</td>
                                <td>31/41</td>
                                <td>21.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">13</span></td>
                                <td><img class="lazy" width="35px" src="img/20180117154934.jpg"  /></td>
                                <td style="text-align: left;">森林狼</td>
                                <td>23/49</td>
                                <td>29.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">14</span></td>
                                <td><img class="lazy" width="35px" src="img/20120112162143.jpg"  /></td>
                                <td style="text-align: left;">雷霆</td>
                                <td>22/50</td>
                                <td>30.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">15</span></td>
                                <td><img class="lazy" width="35px" src="img/20210508101842.png"  /></td>
                                <td style="text-align: left;">火箭</td>
                                <td>17/55</td>
                                <td>35.0</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>



            <div class="topic_right_block">
                <div class="tocr_block_title">
                    <h1>其它比赛</h1>
                    <a href="/jifen/nba/">完整排行</a> </div>
                <div class="tocr_block_taggle">
                    <ul>
                        <li class="active" style="width: 20%">中超<s></s></li>
                        <li class="" style="width: 20%">中甲<s></s></li>


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
                    <div class="tocr_block_table" style="display: none;">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <th style="width: 10%;">排名</th>
                                <th colspan="2" style="width: 50%;">球队</th>
                                <th style="width: 20%">胜负</th>
                                <th style="width: 20%;">胜场差</th>
                            </tr>
                            <tr>
                                <td><span class="red">1</span></td>
                                <td><img class="lazy" width="35px" src="img/20180117160235.jpg"  /></td>
                                <td style="text-align: left;">爵士</td>
                                <td>52/20</td>
                                <td>0.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">2</span></td>
                                <td><img class="lazy" width="35px" src="img/20181110015009.jpg"  /></td>
                                <td style="text-align: left;">太阳</td>
                                <td>51/21</td>
                                <td>1.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">3</span></td>
                                <td><img class="lazy" width="35px" src="img/20181110015501.jpg"  /></td>
                                <td style="text-align: left;">掘金</td>
                                <td>47/25</td>
                                <td>5.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">4</span></td>
                                <td><img class="lazy" width="35px" src="img/20181127002318.jpg"  /></td>
                                <td style="text-align: left;">快船</td>
                                <td>47/25</td>
                                <td>5.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">5</span></td>
                                <td><img class="lazy" width="35px" src="img/20120112153816.jpg"  /></td>
                                <td style="text-align: left;">独行侠</td>
                                <td>42/30</td>
                                <td>10.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">6</span></td>
                                <td><img class="lazy" width="35px" src="img/20180117155150.jpg"  /></td>
                                <td style="text-align: left;">开拓者</td>
                                <td>42/30</td>
                                <td>10.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">7</span></td>
                                <td><img class="lazy" width="35px" src="img/20120112163535.jpg"  /></td>
                                <td style="text-align: left;">湖人</td>
                                <td>42/30</td>
                                <td>10.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">8</span></td>
                                <td><img class="lazy" width="35px" src="img/20120112154418.jpg"  /></td>
                                <td style="text-align: left;">灰熊</td>
                                <td>38/34</td>
                                <td>14.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">9</span></td>
                                <td><img class="lazy" width="35px" src="img/20120112150506.jpg"  /></td>
                                <td style="text-align: left;">勇士</td>
                                <td>39/33</td>
                                <td>13.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">10</span></td>
                                <td><img class="lazy" width="35px" src="img/20200413151531.jpg"  /></td>
                                <td style="text-align: left;">马刺</td>
                                <td>33/39</td>
                                <td>19.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">11</span></td>
                                <td><img class="lazy" width="35px" src="img/20130419172910.jpg"  /></td>
                                <td style="text-align: left;">鹈鹕</td>
                                <td>31/41</td>
                                <td>21.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">12</span></td>
                                <td><img class="lazy" width="35px" src="img/20160428142101.jpg"  /></td>
                                <td style="text-align: left;">国王</td>
                                <td>31/41</td>
                                <td>21.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">13</span></td>
                                <td><img class="lazy" width="35px" src="img/20180117154934.jpg"  /></td>
                                <td style="text-align: left;">森林狼</td>
                                <td>23/49</td>
                                <td>29.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">14</span></td>
                                <td><img class="lazy" width="35px" src="img/20120112162143.jpg"  /></td>
                                <td style="text-align: left;">雷霆</td>
                                <td>22/50</td>
                                <td>30.0</td>
                            </tr>
                            <tr>
                                <td><span class="red">15</span></td>
                                <td><img class="lazy" width="35px" src="img/20210508101842.png"  /></td>
                                <td style="text-align: left;">火箭</td>
                                <td>17/55</td>
                                <td>35.0</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>


        <div class="toc_right_w340">
            <div style="margin-top: 10px;"></div>
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