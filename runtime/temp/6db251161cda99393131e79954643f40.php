<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:70:"D:\gary\mulu\public/../application/admin\view\article\add_article.html";i:1626349985;s:54:"D:\gary\mulu\application\admin\view\public\header.html";i:1628315520;s:54:"D:\gary\mulu\application\admin\view\public\footer.html";i:1628864820;}*/ ?>
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
<body class="gray-bg">
<div class="layui-fluid layui-col-md12">
    <div class="layui-card">
        <div class="layui-card-header">添加文章</div>
        <div class="layui-card-body layui-form">
            <div class="layui-row layui-col-space10 layui-form-item ">
                <div class="layui-form-item layui-col-md-offset1 layui-col-md8">
                    <label class="layui-form-label">TableSelect</label>
                    <div class="layui-input-block">
                        <input type="text" class="layui-input layui-hide" id="layTables" name="title" lay-verify="required" placeholder="文章标题" value="1,3,5,7,9,11,13,14" >
                    </div>
                </div>
                <div class="layui-form-item layui-col-md-offset1 layui-col-md8">
                    <label class="layui-form-label">一键粘贴</label>
                    <div class="layui-input-block">
                        <input type="text" class="layui-input layui-disabled" name="title" lay-verify="required" placeholder="文章标题" value="123123e214" readonly>
                        <div class="layui-copy" onclick="wk.lay_copy(this)" title="复制" alt="复制"><span><i class="fa fa-paste"></i></span></div>
                    </div>
                </div>
                <div class="layui-form-item layui-col-md-offset1 layui-col-md8">
                    <label class="layui-form-label">所属分类</label>
                    <div class="layui-input-block">
                        <select name="cate_id" lay-verify="required" lay-search="">
                            <option value="">请选择分类</option>
                            <?php if(!empty($cate)): if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): if( count($cate)==0 ) : echo "" ;else: foreach($cate as $key=>$vo): ?>
                                    <option value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item layui-col-md-offset1 layui-col-md8">
                    <label class="layui-form-label">三级联动</label>
                    <div class="layui-input-inline">
                        <select name="province" lay-search="" id="province" lay-filter="province">
                            <option value="">---- 请选择省 ----</option>
                            <?php if(is_array($province) || $province instanceof \think\Collection || $province instanceof \think\Paginator): if( count($province)==0 ) : echo "" ;else: foreach($province as $key=>$vo): ?>
                                <option value="<?php echo $vo['district_id']; ?>"><?php echo $vo['district']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                    <div class="layui-input-inline">
                        <select name="city" lay-search=""  id="city" lay-filter="city">
                            <option value="">---- 请选择市 ----</option>
                        </select>
                    </div>
                    <div class="layui-input-inline">
                        <select name="district" lay-search="" id="district" lay-filter="district">
                            <option value="">---- 请选择区 ----</option>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item layui-col-md-offset1 layui-col-md8">
                    <label class="layui-form-label">关键字</label>
                    <div class="layui-input-block">
                        <input type="text" class="layui-input " name="keyword" lay-verify="required" placeholder="文章关键字">
                    </div>
                </div>
                <div class="layui-form-item layui-col-md-offset1 layui-col-md8">
                    <label class="layui-form-label">描述</label>
                    <div class="layui-input-block">
                        <textarea name="remark" class="layui-textarea" lay-verify="required" placeholder="文章描述"></textarea>
                    </div>
                </div>
                <div class="layui-form-item layui-col-md-offset1 layui-col-md8">
                    <label class="layui-form-label">单图片上传</label>
                    <input type="hidden" name="lay-img" id="lay-img" lay-verify="image">
                    <div class="layui-input-block">
                        <div id="lay-upload">上传图片</div>
                        <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                            预览图：
                            <div class="layui-upload-list" id="lay-img-list">
                            </div>
                        </blockquote>
                    </div>
                </div>
                <div class="layui-form-item layui-col-md-offset1 layui-col-md8">
                    <label class="layui-form-label">单图片上传</label>
                    <input type="hidden" name="lay-img1" id="lay-img1" lay-verify="image">
                    <div class="layui-input-block">
                        <div id="lay-upload1">上传图片</div>
                        <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                            预览图：
                            <div class="layui-upload-list" id="lay-img-list1">
                            </div>
                        </blockquote>
                    </div>
                </div>
                <div class="layui-form-item layui-col-md-offset1 layui-col-md8">
                    <label class="layui-form-label">音频上传</label>
                    <input type="hidden" name="lay-music" id="lay-music" lay-verify="music">
                    <div class="layui-input-block">
                        <div id="lay-music-upload">上传音频</div>
                        <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                            预览音频：
                            <div class="layui-upload-list" id="lay-music-list">
                            </div>
                        </blockquote>
                    </div>
                </div>
                <div class="layui-form-item layui-col-md-offset1 layui-col-md8">
                    <label class="layui-form-label">音频上传</label>
                    <input type="hidden" name="lay-music" id="lay-music1" lay-verify="music">
                    <div class="layui-input-block">
                        <div id="lay-music-upload1">上传音频</div>
                        <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                            预览音频：
                            <div class="layui-upload-list" id="lay-music-list1">
                            </div>
                        </blockquote>
                    </div>
                </div>
                <!--<div class="layui-form-item layui-col-md-offset1 layui-col-md8">-->
                    <!--<label class="layui-form-label">上传视频：</label>-->
                    <!--<div class="layui-input-block">-->
                        <!--<button type="button" class="layui-btn" id="lay-upload2">上传视频</button>-->
                        <!--<blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">-->
                            <!--预览视频：-->
                            <!--<div class="layui-upload-list" id="lay-video-list">-->
                                <!--<span id="lay-msg" style="display: none;">-->
                                    <!--<div class="layui-progress layui-progress-big" lay-showpercent="true" lay-filter="lay-video">-->
                                        <!--<div class="layui-progress-bar" lay-percent="0%"></div>-->
                                    <!--</div>-->
                                    <!--<p>正在上传... <i class="layui-icon layui-icon-loading-1 layui-icon layui-anim layui-anim-rotate layui-anim-loop"></i></p>-->
                                <!--</span>-->
                            <!--</div>-->
                        <!--</blockquote>-->
                    <!--</div>-->
                <!--</div>-->
                <div class="layui-form-item layui-col-md-offset1 layui-col-md8">
                    <label class="layui-form-label">上传视频：</label>
                    <input type="hidden" name="lay-video" >
                    <div class="layui-input-block">
                        <div id="lay-upload2">上传视频</div>
                        <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                            预览视频：
                            <div class="layui-upload-list" id="lay-video-list">
                            </div>
                        </blockquote>
                    </div>
                </div>
                <div class="layui-form-item layui-col-md-offset1 layui-col-md10">
                    <label class="layui-form-label">多图片上传</label>
                    <div class="layui-input-block">
                        <input type="hidden" name="photo" id="photo" lay-verify="image">
                        <div id="uploader" class="container">
                            <div class="queueList">
                                <div class="placeholder">
                                    <div id="filePicker"></div>
                                    <p>或将照片拖到这里</p>
                                </div>
                            </div>
                            <div class="statusBar" style="display:none;">
                                <div class="layui-progress layui-progress-big active" lay-showpercent="true">
                                    <div class="layui-progress-bar layui-bg-blue" lay-percent="0%">
                                    </div>
                                    <span></span>
                                </div>
                                <div class="info"></div>
                                <div class="btns">
                                    <div id="goPicker" class="filePicker2"></div>
                                    <div class="uploadBtn">开始上传</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="layui-form-item layui-col-md-offset1 layui-col-md10">
                    <label class="layui-form-label">多图片上传1</label>
                    <div class="layui-input-block">
                        <input type="hidden" name="photo" id="photo1" lay-verify="image">
                        <div id="uploader1" class="container">
                            <div class="queueList">
                                <div class="placeholder">
                                    <div id="filePicker1"></div>
                                    <p>或将照片拖到这里</p>
                                </div>
                            </div>
                            <div class="statusBar" style="display:none;">
                                <div class="layui-progress layui-progress-big active" lay-showpercent="true">
                                    <div class="layui-progress-bar layui-bg-blue" lay-percent="0%">
                                    </div>
                                    <span></span>
                                </div>
                                <div class="info"></div>
                                <div class="btns">
                                    <div id="goPicker1" class="filePicker2"></div>
                                    <div class="uploadBtn">开始上传</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="layui-form-item layui-col-md-offset1 layui-col-md10">
                    <label class="layui-form-label">多图片上传2</label>
                    <div class="layui-input-block">
                        <input type="hidden" name="photo" id="photo2" lay-verify="image">
                        <div id="uploader2" class="container">
                            <div class="queueList">
                                <div class="placeholder">
                                    <div id="filePicker2"></div>
                                    <p>或将照片拖到这里</p>
                                </div>
                            </div>
                            <div class="statusBar" style="display:none;">
                                <div class="layui-progress layui-progress-big active" lay-showpercent="true">
                                    <div class="layui-progress-bar layui-bg-blue" lay-percent="0%">
                                    </div>
                                    <span></span>
                                </div>
                                <div class="info"></div>
                                <div class="btns">
                                    <div id="goPicker2" class="filePicker2"></div>
                                    <div class="uploadBtn">开始上传</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="layui-form-item layui-col-md-offset1 layui-col-md8">
                    <label class="layui-form-label">所属分类</label>
                    <div class="layui-input-block">
                        <select name="cate_id" lay-verify="required" lay-search="">
                            <option value="">请选择分类</option>
                            <?php if(!empty($cate)): if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): if( count($cate)==0 ) : echo "" ;else: foreach($cate as $key=>$vo): ?>
                            <option value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item layui-col-md-offset1 layui-col-md10">
                    <label class="layui-form-label">wangEditor编辑器</label>
                    <div class="layui-input-block" id="LAY_editor" lay-verify="editor">
                    </div>
                </div>
                <div class="layui-form-item layui-col-md-offset1 layui-col-md10">
                    <label class="layui-form-label">layEdit</label>
                    <div class="layui-input-block" >
                        <textarea class="layui-textarea" name="lay_content" id="LAY_editor1" placeholder="文章描述"></textarea>
                    </div>
                </div>
                <div class="layui-form-item layui-col-md-offset1 layui-col-md10">
                    <label class="layui-form-label">百度富文本：</label>
                    <div class="layui-input-block" >
                        <textarea name="lay_content" id="LAY_editor2" placeholder="文章描述"></textarea>
                    </div>
                </div>
                <div class="layui-form-item layui-col-md-offset1 layui-col-md8">
                    <label class="layui-form-label">浏览量</label>
                    <div class="layui-input-block">
                        <input type="text" class="layui-input " name="views" lay-verify="required" placeholder="文章浏览量" onkeyup="value=value.replace(/[^\d]/g,'')">
                    </div>
                </div>
                <div class="layui-form-item layui-col-md-offset1 layui-col-md8">
                    <label class="layui-form-label">作者</label>
                    <div class="layui-input-block">
                        <input type="text" class="layui-input " name="views" lay-verify="required" placeholder="文章作者">
                    </div>
                </div>
                <div class="layui-form-item layui-col-md-offset1 layui-col-md8">
                    <label class="layui-form-label">是否推荐</label>
                    <div class="layui-input-block">
                        <input type="radio" name="is_tui" value="1" title="是" checked>
                        <input type="radio" name="is_tui" value="2" title="否" >
                    </div>
                </div>
                <div class="layui-form-item layui-col-md-offset1 layui-col-md8">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit="" lay-filter="component-form-element">保存
                        </button>
                        <button class="layui-btn layui-btn-primary" onclick="history.back()">关闭</button>
                    </div>
                </div>
            </div>
        </div>
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
<script>

    //百度富文本编辑器
    var editor = UE.getEditor('LAY_editor2', {
        initialFrameHeight:450,
        autoHeight: false,
        autoHeightEnabled:false,
        autoFloatEnabled:false
    });
    //自定义上传接口
    UE.Editor.prototype._bkGetActionUrl = UE.Editor.prototype.getActionUrl;
    UE.Editor.prototype.getActionUrl = function(action) {
        if (action == 'uploadimage' || action == 'uploadscrawl') {
            return '/admin/upload/ueditorUpload';//这就是自定义的上传地址
        } else {
            return this._bkGetActionUrl.call(this, action);
        }
    }


    var n = wk.uploads({num:3,type:'png',url:"<?php echo url('admin/upload/uploadLocality'); ?>"});
    var n1 = wk.uploads({num:4,type:'jpg',attr:1});
    var n2 = wk.uploads({num:6,type:'jpg,png',attr:2});
    function imgDel(e,obj){
        wk.uploads_del(e,obj,n,"<?php echo url('admin/upload/deleteLocality'); ?>");
    }
    function imgDel1(e,obj){
        wk.uploads_del(e,obj,n1);
    }
    function imgDel2(e,obj){
        wk.uploads_del(e,obj,n2);
    }

    var editor = wk.wang({elem:'#LAY_editor'});
    var index = wk.layeditor('LAY_editor1');
    wk.uploadImg({size:2,type:'png',url:"<?php echo url('Upload/upload'); ?>",domain:"<?php echo config('qiniu.domain'); ?>"});
    wk.uploadImg({size:5,num:1,type:'jpg',url:"<?php echo url('Upload/upload'); ?>",domain:"<?php echo config('qiniu.domain'); ?>"});
    wk.uploadMusic({size:100,type:'mp3',url:"<?php echo url('Upload/upload'); ?>",domain:"<?php echo config('qiniu.domain'); ?>"});
    wk.uploadMusic({size:100,num:1,type:'mp3',url:"<?php echo url('Upload/upload'); ?>",domain:"<?php echo config('qiniu.domain'); ?>"});
    wk.tableSelect({elem:'#layTables',field:'id',name:'name',key:'keyword',splaceholder:'昵称',iplaceholder:'请选择数据',url:"<?php echo url('getUserData'); ?>",cols:[{type: 'checkbox'}, {field: 'id', width: '', title: 'ID', align: 'center'}, {field: 'name', width: '', title: '用户名', align: 'center'}]});

    var uploader = WebUploader.create({
        auto: true,// 选完文件后，是否自动上传。
        server: '/admin/Upload/video',// 文件接收服务端。
        duplicate :true,// 重复上传文件，true为可重复false为不可重复
        chunked: true,// 分片上传大文件
        pick: {
            id: "#lay-upload2",// 选择文件的按钮
            multiple: false,//true多文件上传 false单文件上传
            label: "选择视频"
        },
        fileSingleSizeLimit: 200*1024*1024, //限制上传单个文件大小，单位是B，1M=1024000B
        accept: {
            title: 'Video',
            extensions: 'mp4',
            mimeTypes: '.mp4'
        },
        //上传成功
        'onUploadSuccess': function(file, data, response) {
            layui.config({
                base: '/src/' //静态资源所在路径
            }).extend({
                ckplayer: 'modules/ckplayer'
            }).use(['ckplayer'], function() {
                var ckplayer = layui.ckplayer
                var videoObject = {
                    container: '#' + file.id,
                    loop: false,
                    autoplay: false,
                    video: [
                        [data._raw, 'video/mp4']
                    ]
                };
                var player = new ckplayer(videoObject);
            })
            $( '#'+file.id ).show();
            $( '#'+file.id ).next('div').hide();
            $( '#'+file.id ).next().next('p').html('<span style="color: #009688;">上传成功!</span>');
        },
        //上传失败
        'uploadError':function(file){
            $( '#'+file.id ).next('div').hide();
            $( '#'+file.id ).next().next('p').html('<span style="color: #FF5722;">上传失败!</span>');
        }
    });

    //上传进度
    uploader.on( 'uploadProgress' ,function(file,percentage){
        layui.element.progress('lay-video', Math.round(100 * percentage)+'%');
    });
    //视频加入队列
    uploader.on( 'fileQueued', function( file ) {
        $('#lay-video-list').html('<div id="' + file.id + '" style="width: 80%;height: auto;display:none;"></div><div class="layui-progress layui-progress-big" lay-showpercent="true" lay-filter="lay-video"><div class="layui-progress-bar" lay-percent="0%"></div></div><p id="lay-msg">正在上传... <i class="layui-icon layui-icon-loading-1 layui-icon layui-anim layui-anim-rotate layui-anim-loop"></i></p>')
    });


    //错误信息提示
    uploader.on('error', function (code) {
        switch (code) {
            case 'F_EXCEED_SIZE':
                layer.msg('视频大小不得超过'+  uploader.options.fileSingleSizeLimit/1024/1024 + 'MB',{icon:2,time:1500,shade:0.1});
                break;
            case 'Q_TYPE_DENIED':
                layer.msg('请上传正确的视频格式',{icon:2,time:1500,shade:0.1});
                break;
            default:
                layer.msg('上传错误，请刷新',{icon:2,time:1500,shade:0.1});
                break;
        }
    });
    layui.use(['form','upload','layedit','element'], function() {
        var form = layui.form
            , layedit = layui.layedit
            , upload = layui.upload
            , element = layui.element

        //layedit富文本
        layedit.set({
            uploadImage: {
                url: '/admin/Upload/layUpload',
                type: 'post'
            }
        });
        var index = layedit.build('LAY_editor1', {height: 400});


        form.verify({
            image:[/\S/,'请上传图片'],
            music:[/\S/,'请上传音频'],
            editor:function(value,item){
                if(editor.txt.html() == '<p><br></p>'){
                    return '请填写内容';
                }
            }
        });
        form.on('submit(component-form-element)', function (data) {
            $('.layui-btn').addClass('layui-disabled').attr('disabled','disabled');
            data.field.html = editor.txt.html();
            layedit.sync(index);
            // data.field.lay_content = layedit.getContent(index);
            $.ajax({
                url:"<?php echo url('add_article'); ?>",
                type:'post',
                dataType:'json',
                data:data.field,
                success:function(res){
                    if (res.code == 200) {
                        layer.msg(res.msg,{icon:1,time:1500,shade:0.1},function(index){
                            wk.layer_close();
                        })
                    } else {
                        $(".layui-btn").removeClass('layui-disabled').removeAttr('disabled');
                        wk.error(res.msg);
                        return false;
                    }
                }
            })
        });
    });
</script>
</body>
</html>