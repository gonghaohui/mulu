<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"D:\gary\mulu\public/../application/admin\view\seo\search_engine.html";i:1638973710;s:54:"D:\gary\mulu\application\admin\view\public\header.html";i:1628315520;s:54:"D:\gary\mulu\application\admin\view\public\footer.html";i:1628864820;}*/ ?>
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
<body>
<style>
    .layui-btn{
        margin-bottom: 20px !important;
    }
    .layui-btn+.layui-btn{
        margin-left: 0px !important;
        /*margin-right: 15px !important;*/
    }
    .layui-btn .layui-btn{
        margin-right: 15px !important;
    }
</style>
<div class="layui-fluid">
    <div class="layui-card">
        <div class="layui-form layui-card-header layuiadmin-card-header-auto">

            <div>
                <button class="layui-btn" data-type="add" onclick="send_bing()">
                    <i class="fa fa-plus"></i> 推送当天更新到bing
                </button>

                <a href="/seo/get_today_update" target="_blank"><button class="layui-btn layui-btn-info">
                    获取今天更新的文章网址
                </button>
                </a>
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
    function send_bing(){
        alert('未用得');
        return;
        $.ajax({
            type: 'post',
            url: '<?php echo url("send_bing"); ?>',
            data: {},
            dataType: 'json',
            success: function (data) {
                if(data.code == 200){
                    wk.success(data.msg)
                }else if(data.code == 100){
                    wk.error(data.msg);
                }
            }
        });
    }
</script>
</body>
</html>