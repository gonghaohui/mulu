<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"D:\gary\mulu\public/../application/admin\view\article\edit_article.html";i:1626349985;s:54:"D:\gary\mulu\application\admin\view\public\header.html";i:1628315520;s:54:"D:\gary\mulu\application\admin\view\public\footer.html";i:1628864820;}*/ ?>
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
        <div class="layui-card-body layui-form">
            <div class="layui-row layui-col-space10 layui-form-item ">
                <div class="layui-form-item layui-col-md-offset1 layui-col-md8">
                    <label class="layui-form-label">标题</label>
                    <div class="layui-input-block">
                        <input type="text" class="layui-input" name="title" lay-verify="required" placeholder="文章标题">
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
                    <input type="hidden" name="lay-img" id="lay-img">
                    <div class="layui-input-block">
                        <div id="lay-upload">上传图片</div>
                        <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                            预览图：
                            <div class="layui-upload-list" id="lay-list">
                                <img class="layui-append-img" src="http://p73q8jzf0.bkt.clouddn.com/88b9d56b955bf005f447e54712c00bb2.jpg" onerror="this.src='/static/admin/images/no_img.jpg'">
                            </div>
                        </blockquote>
                    </div>
                </div>
                <div class="layui-form-item layui-col-md-offset1 layui-col-md8">
                    <label class="layui-form-label">单图片上传</label>
                    <input type="hidden" name="lay-img" id="lay-img1">
                    <div class="layui-input-block">
                        <div id="lay-upload1">上传图片</div>
                        <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                            预览图：
                            <div class="layui-upload-list" id="lay-list1">
                            </div>
                        </blockquote>
                    </div>
                </div>
                <div class="layui-form-item layui-col-md-offset1 layui-col-md8">
                    <label class="layui-form-label">音频上传</label>
                    <input type="hidden" name="lay-music" id="lay-music">
                    <div class="layui-input-block">
                        <div id="lay-music-upload">上传音频</div>
                        <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                            预览音频：
                            <div class="layui-upload-list" id="lay-music-list">
                                <div id="layui-audio" style="margin: 0 10px 10px 0;" ></div>
                            </div>
                        </blockquote>
                    </div>
                </div>
                <div class="layui-form-item layui-col-md-offset1 layui-col-md8">
                    <label class="layui-form-label">音频上传</label>
                    <input type="hidden" name="lay-music" id="lay-music1">
                    <div class="layui-input-block">
                        <div id="lay-music-upload1">上传音频</div>
                        <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                            预览音频：
                            <div class="layui-upload-list" id="lay-music-list1">
                            </div>
                        </blockquote>
                    </div>
                </div>
                <div class="layui-form-item layui-col-md-offset1 layui-col-md8">
                    <label class="layui-form-label">上传视频</label>
                    <div class="layui-input-block">
                        <button type="button" class="layui-btn" id="lay-upload2">上传视频</button>
                        <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                            预览视频：
                            <div class="layui-upload-list" id="lay-video-list">
                                <div style="display: block;width: 80%;height: auto;" id="video" data-url="http://img.ksbbs.com/asset/Mon_1703/05cacb4e02f9d9e.mp4" ></div>
                                <!--<span id="lay-msg" style="display: none;">-->
                                    <!--<div class="layui-progress layui-progress-big" lay-showpercent="true" lay-filter="lay-video">-->
                                        <!--<div class="layui-progress-bar" lay-percent="0%"></div>-->
                                    <!--</div>-->
                                    <!--<p>正在上传... <i class="layui-icon layui-icon-loading-1 layui-icon layui-anim layui-anim-rotate layui-anim-loop"></i></p>-->
                                <!--</span>-->
                            </div>
                        </blockquote>
                    </div>
                </div>
                <div class="layui-form-item layui-col-md-offset1 layui-col-md10">
                    <label class="layui-form-label">多图片上传</label>
                    <div class="layui-input-block">
                        <input type="hidden" name="del" id="del" value="">
                        <input type="hidden" id="hid" value="<?php echo $article['photo']; ?>">
                        <input type="hidden" name="photo" id="photo" value="<?php echo $article['photo']; ?>">
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
                    <label class="layui-form-label">多图片上传</label>
                    <div class="layui-input-block">
                        <input type="hidden" name="del" id="del1" value="">
                        <input type="hidden" id="hid1" value="<?php echo $article['photo']; ?>">
                        <input type="hidden" name="photo" id="photo1" value="<?php echo $article['photo']; ?>">
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
                    <label class="layui-form-label">内容</label>
                    <div class="layui-input-block" id="LAY_editor">
                        <p><?php echo $article['content']; ?></p>
                    </div>
                </div>
                <div class="layui-form-item layui-col-md-offset1 layui-col-md8">
                    <label class="layui-form-label">浏览量</label>
                    <div class="layui-input-block">
                        <input type="text" class="layui-input " name="views" lay-verify="required" placeholder="文章浏览量">
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
                        <button class="layui-btn layui-btn-primary" onclick="wk.layer_close('close')">关闭</button>
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
<!--<script type="text/javascript" src="/static/admin/js/webupload/webuploader_update.js"></script>-->
<!--<script src="/static/admin/js/we.js"></script>-->
<script>
    var n = wk.uploads({num:8,type:'png,jpg,gif',status:'update'})
    var l = wk.uploads({num:8,type:'png,jpg,gif',attr:1,status:'update'})
    function imgDel(e,obj,hid,del){
        wk.update_del(e,obj,hid,del,n);
    }
    function imgDel1(e,obj,hid,del){
        wk.update_del(e,obj,hid,del,l);
    }
    var editor = wk.wang({elem:'#LAY_editor'});
    wk.lay_audio({elem:'#layui-audio',name:'b45030df9212d398a433610736ea8a51.mp3',src:'http://pi7sdygmd.bkt.clouddn.com/c38b5b14db26f742d782a09072a5edf2.mp3'});
    wk.uploadImg({size:2,type:'png',url:"<?php echo url('Upload/upload'); ?>"});
    wk.uploadImg({size:5,num:1,type:'jpg',url:"<?php echo url('Upload/upload'); ?>"});
    wk.uploadMusic({size:10,type:'mp3',url:"<?php echo url('Upload/upload'); ?>"});
    wk.uploadMusic({size:10,num:1,type:'mp3',url:"<?php echo url('Upload/upload'); ?>"});

    layui.config({
        base: '/src/' //静态资源所在路径
    }).extend({
         ckplayer: 'modules/ckplayer'
    }).use(['form','upload','ckplayer'], function() {
        var form = layui.form
            , upload = layui.upload
            , ckplayer = layui.ckplayer

        var vUrl = $('#video').data('url'),
            videoObject = {
                container: '#video',
                loop: false,
                autoplay: false,
                video: [
                    [vUrl, 'video/mp4']
                ]
            };
        var player = new ckplayer(videoObject);

        //普通图片上传
        // var uploadInst = upload.render({
        //     elem: '#lay-upload'
        //     ,url: '/admin/Upload/upload'
        //     ,accept: 'images' //上传文件类型images（图片）、file（所有文件）、video（视频）、audio（音频）
        //     ,acceptMime: '.png,.jpg' //筛选出指定文件类型
        //     ,exts: 'png|jpg' //允许上传的文件后缀,结合 accept 参数类设定
        //     ,auto: true //是否选完文件后自动上传
        //     ,size: 2*1024 //文件最大可允许上传的大小，单位 KB（0即不限制）
        //     ,field: 'file' //设定文件域的字段名
        //    ,progress : function(index, value) {
        //         element.progress('model' + index, value + '%');
        //     }
        //     ,before: function(obj){
        //         //预读本地文件示例，不支持ie8
        //         obj.preview(function(index, file, result){
        //             $('#lay-list').attr('src', result); //图片链接（base64）
        //         });
        //     }
        //     ,done: function(res){
        //         //上传成功
        //         if(res.code == 300){
        //             layer.msg('上传成功');
        //         }
        //     }
        //     ,error: function(){
        //         //重传
        //         var layMsg = $('#lay-msg');
        //         layMsg.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs lay-reload">重试</a>');
        //         layMsg.find('.lay-reload').on('click', function(){
        //             uploadInst.upload();
        //         });
        //     }
        // });
        form.verify({
            username:function(value,item){
                if(!/^[\S]{2,10}$/.test(value)){
                    return '名称必须2到10字符，且不能出现空格';
                }
                var checkResult = "";
                $.ajax({
                    url:"<?php echo url('User/checkName'); ?>",
                    type:'post',
                    data:"username="+value,
                    async: false,//必须同步
                    success:function(res){
                        if(res.code == 100){
                            checkResult = "该名称已存在";
                        }
                    }
                })
                return checkResult;
            },
            pass: [/^[\S]{6,12}$/,'密码必须6到12位，且不能出现空格'],
            // headCrop:[/^[\S]$/,'头像不能为空'],
            // headCrop:function(value,item){
            //     if(value == ""){
            //         return '头像不能为空';
            //     }
            // },
            realname:[/^[\S]{2,10}$/,'真实姓名必须2到10字符，且不能出现空格']

        });
        form.on('submit(component-form-element)', function (data) {
            $('.layui-btn').addClass('layui-disabled').attr('disabled','disabled');
            $.ajax({
                url:"<?php echo url('userAdd'); ?>",
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