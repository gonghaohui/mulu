<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:56:"D:\gary\mulu\public/../application/admin\view\index.html";i:1638973710;s:54:"D:\gary\mulu\application\admin\view\public\header.html";i:1628315520;s:54:"D:\gary\mulu\application\admin\view\public\footer.html";i:1628864820;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo config('WEB_SITE_TITLE'); ?></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/static/admin/js/layui/css/layui.css" >
    <link rel="stylesheet" href="/static/admin/css/admin.css?ver=1.01" >
    <link rel="stylesheet" href="/static/admin/css/plugins/viewer/viewer.css"><!--viewer图片查看器-->
    <link rel="stylesheet" href="/static/admin/css/font-awesome.min.css"><!--fontAwesome图标库-->
    <link rel="stylesheet" href="/static/admin/css/plugins/cropper/ImgCropping.css" ><!--图片裁剪组件-->
    <link rel="stylesheet" href="/static/admin/css/plugins/cropper/cropper.min.css" ><!--图片裁剪组件-->
    <!--<link rel="stylesheet" href="/static/admin/css/plugins/animate/animate.min.css" >-->
    <link rel="stylesheet" href="/static/admin/js/plugins/zTree/zTreeStyle.css" ><!--zTree组件-->
    <link rel="stylesheet" href="/static/admin/css/plugins/formSelects/formSelects-v4.css" ><!--select多选组件-->
    <link rel="stylesheet" href="/static/admin/js/plugins/webuploader/webuploader.css" ><!--webUploader上传组件-->
    <link rel="stylesheet" href="/static/admin/js/plugins/webuploader/style.css" ><!--webUploader上传组件-->
    <link rel="stylesheet" href="/static/admin/js/plugins/wx-audio/wx-audio.css" ><!--音频播放器组件-->
    <link rel="stylesheet" href="/static/admin/css/plugins/toastr/toastr.css" ><!--toastr通知组件-->
    <style>
        /*layui滚动条自适应*/
        /*.layui-body{overflow-y: scroll;}*/
        /*body{overflow-y: scroll;}*/
        /*灯箱图片*/
        /*.closeP{width:60px;height:60px;text-align: center;line-height: 70px;border-radius:30px;background:rgba(0,0,0,0.5);font-size: 25px;position: fixed;top:-23px;right:-20px;color: #ccc;cursor: pointer;}*/
        /*.cha{position:relative;top:1px;right:8px;}*/
        /*.closeP:hover{color: white}*/
        /*.showP{width: 100%;height: 100vh;background: rgba(0,0,0,0.5);text-align: center;position: fixed;top: 0;left: 0;z-index: 1000;}*/
        /*图标*/
        /*#chooseicon {margin:20px;}*/
        /*#chooseicon ul { margin:5px 0 0 0;}*/
        /*#chooseicon ul li{width:41px;height:41px;line-height:41px;border:1px solid #e7e7e7;padding:1px;margin:1px;text-align: center;font-size:18px;float: left;}*/
        /*#chooseicon ul li:hover{border:1px solid #2c3e50;cursor:pointer;}*/

        /* 输入框添加蓝色边框效果，阴影边框效果  */
        /*.layui-input:focus,*/
        /*.layui-textarea:focus {*/
            /*border-color: rgba(91, 192, 222, 0.8) !important;*/
            /*-webkit-box-shadow: 0 0 5px rgba(91, 192, 222, .5);*/
            /*-moz-box-shadow: 0 0 5px rgba(91, 192, 222, .5);*/
            /*box-shadow: 0 0 5px rgba(91, 192, 222, .5);*/
        /*}*/

        /*.layui-input:hover,*/
        /*.layui-textarea:hover {*/
            /*border-color: rgba(91, 192, 222, 0.8) !important;*/
            /*-webkit-box-shadow: 0 0 5px rgba(91, 192, 222, .5);*/
            /*-moz-box-shadow: 0 0 5px rgba(91, 192, 222, .5);*/
            /*box-shadow: 0 0 5px rgba(91, 192, 222, .5);*/
        /*}*/

        /*!* 表单验证失败红色边框效果，阴影效果 *!*/
        /*.layui-form-danger, .layui-form-danger:focus, .layui-form-danger:hover{*/
            /*border-color: rgba(255,87,34, .8) !important;*/
            /*-webkit-box-shadow: 0 0 5px rgba(255,87,34, .5);*/
            /*-moz-box-shadow: 0 0 5px rgba(255,87,34, .5);*/
            /*box-shadow: 0 0 5px rgba(255,87,34, .5);*/
        /*}*/
    </style>
</head>
<body class="layui-layout-body">
<div id="LAY_app">
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
            <!-- 头部区域 -->
            <ul class="layui-nav layui-layout-left">
                <li class="layui-nav-item layadmin-flexible" lay-unselect="">
                    <a href="javascript:;" layadmin-event="flexible" title="侧边伸缩">
                        <i class="layui-icon layui-icon-shrink-right" id="LAY_app_flexible"></i>
                    </a>
                </li>
                <!-- <li class="layui-nav-item layui-hide-xs" lay-unselect="">
                    <a href="http://www.layui.com/admin/" target="_blank" title="前台">
                        <i class="layui-icon layui-icon-website"></i>
                    </a>
                </li> -->
                <li class="layui-nav-item" lay-unselect="">
                    <a href="javascript:;" layadmin-event="refresh" title="刷新">
                        <i class="layui-icon layui-icon-refresh-3"></i>
                    </a>
                </li>
                <!-- <li class="layui-nav-item layui-hide-xs" lay-unselect="">
                    <input type="text" placeholder="搜索..." autocomplete="off" class="layui-input layui-input-search"
                           layadmin-event="serach" lay-action="template/search.html?keywords=">
                </li> -->
            </ul>
            <ul class="layui-nav layui-layout-right" lay-filter="layadmin-layout-right" id="view">

                <!-- <li class="layui-nav-item" lay-unselect="">
                    <a lay-href="../src/views/app/message/index.html" layadmin-event="message" lay-text="消息中心">
                        <i class="layui-icon layui-icon-notice"></i> -->

                <!-- 如果有新消息，则显示小圆点 -->
                <!--    <span class="layui-badge-dot"></span>
               </a>
           </li> -->
                <li class="layui-nav-item layui-hide-xs" lay-unselect="">
                    <a href="javascript:;" layadmin-event="note" title="便签">
                        <i class="layui-icon layui-icon-note"></i>
                    </a>
                </li>
                <li class="layui-nav-item layui-hide-xs" lay-unselect="">
                    <a href="javascript:;" layadmin-event="fullscreen" title="全屏">
                        <i class="layui-icon layui-icon-screen-full"></i>
                    </a>
                </li>
                <li class="layui-nav-item" lay-unselect="" >
                    <img src="<?php echo $portrait; ?>" data-original="<?php echo $portrait; ?>" class="layui-circle layui-table-img" onerror="this.src='/static/admin/images/head_default.gif'" alt="<?php echo session('rolename'); ?>" title="<?php echo session('rolename'); ?>" >
                </li>
                <li class="layui-nav-item" lay-unselect="">
                    <a href="javascript:;">
                        <cite><?php echo $username; ?></cite>
                        <span class="layui-nav-more"></span></a>
                    <dl class="layui-nav-child">
                        <!--<dd><a href="../src/views/set/user/info.html"><i class="fa fa-user-circle"></i> 基本资料</a></dd>-->
                        <dd><a href="javascript:;" onclick="wk.layer_show1('基本资料',$('#pInfo'),550,405)"><i class="fa fa-user-circle-o"></i> 基本资料</a></dd>
                        <dd><a href="javascript:;" onclick="wk.layer_show1('修改头像',$('#headCrop'),700,570)"><i class="fa fa-crop"></i> 修改头像</a></dd>
                        <dd><a href="javascript:;" onclick="wk.layer_show1('修改密码',$('#changePwd'),500,320);"><i class="fa fa-unlock-alt"></i> 修改密码</a></dd>
                        <dd><a href="javascript:;" onclick="cache()"><i class="fa fa-history"></i> 清除缓存</a></dd>
                        <hr>
                        <dd  style="text-align: center;"><a  href="javascript:;" onclick="loginOut()"><i class="fa fa-sign-out"></i> 退出</a></dd>
                    </dl>
                </li>

                <li class="layui-nav-item layui-hide-xs" lay-unselect="">
                    <a href="javascript:;" layadmin-event="theme" title="皮肤">
                        <i class="layui-icon layui-icon-theme"></i>
                    </a>
                </li>
                <!--<li class="layui-nav-item layui-hide-xs" lay-unselect="">-->
                    <!--<a href="javascript:;" layadmin-event="about"><i-->
                            <!--class="layui-icon layui-icon-more-vertical"></i></a>-->
                <!--</li>-->
                <li class="layui-nav-item layui-show-xs-inline-block layui-hide-sm" lay-unselect="">
                    <a href="javascript:;" layadmin-event="more"><i class="layui-icon layui-icon-more-vertical"></i></a>
                </li>
            </ul>
        </div>

        <!--侧边菜单-->
        <div class="layui-side layui-side-menu">
            <div class="layui-side-scroll">
                <div class="layui-logo">
                    <span>Eleven</span>
                </div>
                <ul class="layui-nav layui-nav-tree " id="LAY-system-side-menu"  lay-filter="layadmin-system-side-menu" lay-shrink="all">
                    <?php if(!empty($menu)): if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): if( count($menu)==0 ) : echo "" ;else: foreach($menu as $key=>$vo): ?>
                            <li data-name="home" class="layui-nav-item">
                                <?php if($vo['name'] == '#'): ?>
                                    <a href="javascript:;" lay-tips="<?php echo $vo['title']; ?>" lay-direction="2">
                                        <i class="<?php echo $vo['css']; ?> layui-font"></i>
                                        <cite><?php echo $vo['title']; ?></cite>
                                        <span class="layui-nav-more"></span>
                                    </a>
                                <?php else: ?>
                                    <a href="javascript:;" lay-href="<?php echo $vo['href']; ?>" lay-tips="<?php echo $vo['title']; ?>"
                                       lay-direction="2">
                                        <i class="<?php echo $vo['css']; ?> layui-font"></i>
                                        <cite><?php echo $vo['title']; ?></cite>
                                    </a>
                                <?php endif; if($vo['name'] == '#'): ?>
                                    <dl class="layui-nav-child">
                                        <?php if(!empty($vo['child'])): if(is_array($vo['child']) || $vo['child'] instanceof \think\Collection || $vo['child'] instanceof \think\Paginator): if( count($vo['child'])==0 ) : echo "" ;else: foreach($vo['child'] as $key=>$v): if($v['name'] != '##'): ?>
                                                    <dd data-name="console">
                                                        <a lay-href="<?php echo $v['href']; ?>"><?php echo $v['title']; ?></a>
                                                    </dd>
                                                <?php else: ?>
                                                    <dd data-name="grid">
                                                        <a href="javascript:;"><?php echo $v['title']; ?><span class="layui-nav-more"></span></a>
                                                        <dl class="layui-nav-child">
                                                            <?php if(!empty($v['child'])): if(is_array($v['child']) || $v['child'] instanceof \think\Collection || $v['child'] instanceof \think\Paginator): if( count($v['child'])==0 ) : echo "" ;else: foreach($v['child'] as $key=>$z): ?>
                                                                    <dd data-name="list"><a lay-href="<?php echo $z['href']; ?>"><?php echo $z['title']; ?></a></dd>
                                                                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                                        </dl>
                                                    </dd>
                                                <?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
                                    </dl>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </ul>
            </div>
        </div>
        <!-- 页面标签 -->
        <div class="layadmin-pagetabs" id="LAY_app_tabs">
            <div class="layui-icon layadmin-tabs-control layui-icon-prev" layadmin-event="leftPage"></div>
            <div class="layui-icon layadmin-tabs-control layui-icon-next" layadmin-event="rightPage"></div>
            <div class="layui-icon layadmin-tabs-control layui-icon-down">
                <ul class="layui-nav layadmin-tabs-select" lay-filter="layadmin-pagetabs-nav">
                    <li class="layui-nav-item" lay-unselect="">
                        <a href="javascript:;"><span class="layui-nav-more"></span></a>
                        <dl class="layui-nav-child layui-anim-fadein">
                            <dd layadmin-event="closeThisTabs"><a href="javascript:;">关闭当前标签页</a></dd>
                            <dd layadmin-event="closeOtherTabs"><a href="javascript:;">关闭其它标签页</a></dd>
                            <dd layadmin-event="closeAllTabs"><a href="javascript:;">关闭全部标签页</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
            <div class="layui-tab" lay-unauto="" lay-allowclose="true" lay-filter="layadmin-layout-tabs">
                <ul class="layui-tab-title" id="LAY_app_tabsheader">
                    <li lay-id="../src/views/home/console.html" lay-attr="../src/views/home/console.html" class="layui-this"><i class="layui-icon layui-icon-home"></i> 首页<i class="layui-icon layui-unselect layui-tab-close">ဆ</i>
                    </li>
                </ul>
            </div>
        </div>


        <!-- 主体内容 -->
        <div class="layui-body" id="LAY_app_body">
            <div class="layadmin-tabsbody-item layui-show">
                <iframe src="<?php echo url('Index/indexPage'); ?>" frameborder="0" class="layadmin-iframe"></iframe>
            </div>
        </div>

        <!-- 辅助元素，一般用于移动设备下遮罩 -->
        <div class="layadmin-body-shade" layadmin-event="shade"></div>
    </div>
</div>
<div id="headCrop" style="display:none">
    <div class="tailoring-content-one">
        <label title="选择图片" for="chooseImg" class="layui-btn">
            <input type="file" accept="image/jpg,image/jpeg,image/png" name="file" id="chooseImg" class="hidden" onchange="selectImg(this)"><i class="fa fa-cloud-upload"></i>
            选择图片
        </label>
    </div>
    <div class="ibox-content">
        <div class="tailoring-content">
            <div class="tailoring-content-two">
                <div class="tailoring-box-parcel" style="text-align: center">
                    <img id="tailoringImg">
                    <span class="word" style="position:relative;top:50%;font-size:14px;color: #c2c2c2">仅支持JPG、JPEG、PNG格式的图片文件</span><br>
                    <!--<span class="size" style="position:relative;top:50%;font-size:16px">文件不能大于2MB</span>-->
                </div>
                <div class="preview-box-parcel">
                    <!--<p>图片预览：</p>-->
                    <div class="square previewImg"></div>
                    <div class="circular previewImg"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <span class="layui-btn cropper-reset-btn" style="float:left">复位</span>
        <span class="layui-btn zoomIn" style="float:left">放大</span>
        <span class="layui-btn zoomOut" style="float:left">缩小</span>
        <span class="layui-btn cropper-rotate-btn" style="float:left">旋转</span>
        <span class="layui-btn cropper-scaleX-btn" style="float:left">换向</span>
        <span class="layui-btn " id="sureCut"><i class="fa fa-save"></i> 保存</span>
        <span class="layui-btn layui-btn-primary" onclick="layer.closeAll()"><i class="fa fa-close"></i> 关闭</span>
    </div>
</div>
<script src="/static/admin/js/jquery.min.js"></script>
<script src="/static/admin/js/layui/layui.js"></script>
<script src="/static/admin/js/plugins/viewer/viewer.js"></script><!--viewer图片查看器-->
<script src="/static/admin/js/Icon.js"></script><!--fontAwesome图标库-->
<script src="/static/admin/js/wk.js"></script><!--封装方法-->
<script src="/static/admin/js/common.js"></script><!--全局监听ajax-->
<script src="/static/admin/js/plugins/cropper/cropper.min.js"></script><!--图片裁剪组件-->
<script src="/static/admin/js/plugins/zTree/jquery.ztree.core-3.5.js"></script><!--zTree组件-->
<script src="/static/admin/js/plugins/zTree/jquery.ztree.excheck-3.5.js"></script><!--zTree选择组件-->
<!--<script src="/static/admin/js/plugins/zTree/jquery.ztree.exedit-3.5.js"></script>--><!--zTree编辑组件-->
<script src="/static/admin/js/plugins/webuploader/webuploader.js"></script><!--webUploader上传组件-->
<script src="/static/admin/js/plugins/wangEditor-3.1.1/release/wangEditor.js" ></script><!--wangEditor编辑器-->
<script src="/static/admin/js/plugins/wx-audio/wx-audio.js" ></script><!--音频播放器组件-->
<script src="/static/admin/js/plugins/clipboard/clipboard.js" ></script><!--粘贴板组件-->
<script src="/static/admin/js/plugins/jqprint/jQuery.print.js" ></script><!--打印组件-->
<script src="/static/admin/js/plugins/toastr/toastr.js" ></script><!--toastr通知组件-->
<script src="/static/admin/js/plugins/ueditor/ueditor.config.js?ver=1.01" ></script><!--百度富文本-->
<script src="/static/admin/js/plugins/ueditor/ueditor.all.js" ></script><!--百度富文本-->
<script>
    layui.config({
        base: '/src/' //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
        , formSelects: 'formSelects-v4'
        , dropdown: 'dropdown'
    }).use(['index','dropdown','formSelects']),function(){
        var formSelects = layui.formSelects
    };
</script>
<script>
   toastr.options = {
        "newestOnTop": false, //新的toastr会显示在旧的toastr前面
        "preventDuplicates": false, //重复内容的提示框只出现一次
        "target": "body", // 默认为'body', 设置toastr的目标容器
        "closeButton": true,//关闭按钮
        "debug": false,//调试模式
        "progressBar": true,//进度条
        "closeOnHover": true,//hover关闭
        "positionClass": "toast-bottom-right",//toastr显示位置
        "showDuration": "400",//显示的时间
        "hideDuration": "100",//消失的时间
        "timeOut": "7000",//停留的时间
        "extendedTimeOut": "100",//控制时间
        "showEasing": "swing",//显示时的动画缓冲方式
        "hideEasing": "linear",//消失时的动画缓冲方式
        "showMethod": "layui-anim layui-anim-up",//显示时的动画方式
        "hideMethod": "layui-anim layui-anim-fadeout",//消失时的动画方式
    }
    //view初始化查看图片
    $(function(){
        $('.layui-append-img,.layui-circle').viewer({
            url: 'data-original',
        });
    })

    //关闭自动填充
    $('input').attr('autocomplete',"off");

    // //图片灯箱
    // function imgDisplay(obj) {
    //     var src = $(obj).attr("src");
    //     var imgHtml = '<div class="showP"><img src=' + src + ' style="margin-top: 120px;height:50%;margin-bottom:120px;"  /><p class="closeP"  onclick="closePicture(this)"><span class="cha">×</span></p></div>'
    //     $('body').append(imgHtml);
    // }
    //
    // //关闭图片灯箱
    // function closePicture(obj) {
    //     $(obj).parent("div").remove();
    // }

    //tips框
    $('#offAll').on('mouseover', function(){
        var that = this;
        layer.tips('<span style="color:#686B6D;"><i class="fa fa-info-circle"></i> 若未勾选默认禁用全部</span>', that,{tips: [2, '#F2F2F2'],time: 10000});
    });
    //tips框
    $('#onAll').on('mouseover', function(){
        var that = this;
        layer.tips('<span style="color:#686B6D;"><i class="fa fa-info-circle"></i> 若未勾选默认启用全部</span>', that,{tips: [2, '#F2F2F2',''],time: 10000});
    });
    //tips框
    $('#excel').on('mouseover', function(){
        var that = this;
        layer.tips('<span style="color:#686B6D;"><i class="fa fa-info-circle"></i> 导出筛选完成数据</span>', that,{tips: [2, '#F2F2F2',''],time: 10000});
    });
    //关闭tips框
    $('#offAll,#onAll,#export,#excel').on('mouseout', function(){
        layer.closeAll('tips');
    });

    //layui公共操作
    layui.use(['form','table'], function() {
        var form = layui.form
            ,table = layui.table
        //重置搜索框
        $('#empty').on('click', function () {
            $('.layui-input').val('');
            // $(".search").trigger("chosen:updated");
            $('select').each(function (i, j) {
                $(j).find("option:selected").attr("selected", false);
                form.render('select')
            })
        });
        //表格排序
        table.on('sort(LAY-table-manage)', function(obj){
            table.reload('LAY-table', {
                initSort: obj //记录初始排序，如果不设的话，将无法标记表头的排序状态
                ,where: { //请求参数
                    field: obj.field //排序字段
                    ,order: obj.type //排序方式
                }
            });
        });
        //监听搜索
        form.on('submit(LAY-search)', function (data) {
            //执行重载
            table.reload('LAY-table', {
                page: {
                    curr: 1 //重新从第 1 页开始
                }
                ,where: data.field
            });
        });
        //地区三级联动
        form.on('select(province)', function(data){
            getArea("province",data.value);
        });
        form.on('select(city)', function(data){
            getArea("city",data.value);
        });
        function getArea(type,id){
            $.ajax({
                url:"<?php echo url('admin/Base/place'); ?>",
                dataType:"json",
                data:'id='+id,
                type:'post',
                success:function(res){
                    var opt = null;
                    $.each(res.msg,function(key,vo){
                        opt = opt+"<option value="+vo.district_id+">"+vo.district+"</option>";
                    })
                    if(type=="province"){
                        $("#city").empty();
                        $("#city").append('<option value="">---- 请选择市 ----</option>');
                        $("#district").empty();
                        $("#district").append('<option value="">---- 请选择区 ----</option>');
                        $("#city").append(opt);
                    }else if(type == "city"){
                        $("#district").empty();
                        $("#district").append('<option value="">---- 请选择区 ----</option>');
                        $("#district").append(opt);
                    }
                    form.render('select');
                }
            })
        }
    });
</script>
<!--修改密码-->
<div id="changePwd" style="display:none;">
    <div class="layui-fluid layui-col-xs12">
        <div class="layui-card-body layui-form layui-form-pane">
            <div class="layui-row layui-form-item ">
                <div class="layui-form-item">
                    <label class="layui-form-label">当前密码</label>
                    <div class="layui-input-block">
                        <input type="password" name="old_pwd"  placeholder="输入当前密码" lay-verify="required|oldpwd" class="layui-input" autocomplete="off"/>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">新密码</label>
                    <div class="layui-input-block">
                        <input type="password" name="new_pwd"  placeholder="输入新密码" lay-verify="required|newpwd" class="layui-input" autocomplete="off"/>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">确认密码</label>
                    <div class="layui-input-block">
                        <input type="password" name="r_pwd"  placeholder="输入确认密码" lay-verify="required|rpwd" class="layui-input" autocomplete="off"/>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit="" lay-filter="component-form-element">确认修改
                        </button>
                        <button class="layui-btn layui-btn-primary" onclick="layer.closeAll()">关闭</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--个人信息-->
<div id="pInfo" style="display:none;">
    <div class="layui-fluid layui-col-xs12">
        <div class="layui-card-body layui-form layui-form-pane">
            <div class="layui-row layui-form-item ">
                <div class="layui-form-item">
                    <label class="layui-form-label">用户名</label>
                    <div class="layui-input-block">
                        <input type="text" class="layui-input" style="cursor:not-allowed;" value="<?php echo session('username'); ?>" disabled/>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">角&nbsp;&nbsp;&nbsp;&nbsp;色</label>
                    <div class="layui-input-block">
                        <input type="text" class="layui-input" style="cursor:not-allowed;"  value="<?php echo session('rolename'); ?>" disabled/>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">手机号</label>
                    <div class="layui-input-block">
                        <input type="text" class="layui-input" style="cursor:not-allowed;" value="<?php echo session('phone'); ?>" disabled/>
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">描&nbsp;&nbsp;&nbsp;&nbsp;述</label>
                    <div class="layui-input-block">
                        <textarea class="layui-textarea"style="cursor:not-allowed;resize:none" disabled><?php echo session('describe'); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/static/admin/js/plugins/cropper/Crop.js"></script>
<script>
    //裁剪后的处理
    $("#sureCut").on("click",function () {
        if ($("#tailoringImg").attr("src") == null ){
            layer.msg('请先选择头像',{anim:6})
        }else{
            var cas = $('#tailoringImg').cropper('getCroppedCanvas');//获取被裁剪后的canvas
            var base64url = cas.toDataURL('image/png'); //转换为base64地址形式
            //关闭裁剪框
            layer.closeAll();
            $.ajax({
                url : "<?php echo url('Upload/updateFace'); ?>",
                type : "post",
                dataType : "json",
                data:"base64url="+base64url+"&id=<?php echo session('uid'); ?>",
                success : function(data) {
                    if(data.code == 200){
                        wk.success(data.msg,'window.location.reload()')
                    }else if(data.code == 100){
                        wk.error(data.msg);
                    }
                }
            });
        }
    });

    layui.use(['form'], function() {
        var form = layui.form;
        form.verify({
            oldpwd:function(value,item){
                var checkResult = "";
                $.ajax({
                    url:"<?php echo url('User/editPwd'); ?>",
                    type:'post',
                    data:"old_pwd="+value +"&type=checkPassword",
                    async: false,//必须同步
                    success:function(res){
                        if(res.code == 100){
                            checkResult = "当前密码错误";
                        }
                    }
                })
                return checkResult;
            },
            newpwd: [/^[\S]{6,16}$/,'密码必须6到16位，且不能出现空格'],
            rpwd:function(value,item){
                if(!/^[\S]{6,16}$/.test(value)){
                    return '密码必须6到16位，且不能出现空格';
                }
                var newpwd = $('input[name=new_pwd]').val();
                if(newpwd != value){
                    return "两次输入密码不一致";
                }
            }

        });
        form.on('submit(component-form-element)', function (data) {
            $('.layui-btn').addClass('layui-disabled').attr('disabled','disabled');
            $.ajax({
                url:"<?php echo url('User/editPwd'); ?>",
                type:'post',
                dataType:'json',
                data:data.field,
                success:function(res){
                    if (res.code == 200) {
                        wk.success(res.msg,'',"<?php echo url('admin/Login/loginOut'); ?>");
                    } else {
                        wk.error(res.msg,'$(".layui-btn").removeClass(\'layui-disabled\').removeAttr(\'disabled\')');
                    }
                }
            })
        });
    });

    var loginOut = function(){
        layer.confirm('你确定要退出吗？', {icon: 3,title:'提示'}, function(index){
            layer.close(index);
            window.location.href="<?php echo url('admin/login/loginOut'); ?>";
        });
    }
    //清除缓存
    var cache = function(){
        layer.confirm('你确定要清除缓存吗？', {icon: 3, title:'提示'}, function(index){
            $.getJSON("<?php echo url('admin/index/clear'); ?>",function(res){
                if(res.code == 200){
                    wk.success(res.msg);
                }else if(res.code == 100){
                    wk.error(res.msg);
                }
            });
        })
    }
</script>
</body>
</html>