<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:66:"D:\gary\mulu\public/../application/admin\view\caiji\data_list.html";i:1639681169;s:54:"D:\gary\mulu\application\admin\view\public\header.html";i:1628315520;s:54:"D:\gary\mulu\application\admin\view\public\footer.html";i:1628864820;}*/ ?>
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
<div class="layui-fluid">
    <div class="layui-card">
        <div class="layui-form layui-card-header layuiadmin-card-header-auto">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <div class="layui-input-inline" style="width: 100px;">
                        <input type="text" id="caiji_id" class="layui-input" name="caiji_id" placeholder="数据ID"/>
                    </div>
                </div>
                <div class="layui-inline">
                    <div class="layui-input-inline">
                        <input type="text" id="title_cn" class="layui-input" name="title_cn" placeholder="数据标题"/>
                    </div>
                </div>

                <div class="layui-inline">
                    <div class="layui-input-inline">
                        <select name="category" id="category" class="layui-input">
                            <option value="">全部分类</option>
                            <?php if(is_array($AllCategories) || $AllCategories instanceof \think\Collection || $AllCategories instanceof \think\Paginator): if( count($AllCategories)==0 ) : echo "" ;else: foreach($AllCategories as $key=>$vo): ?>
                            <option value="<?php echo $vo['category_id']; ?>" <?php if($cat_id == $vo['category_id']): ?> selected="selected" <?php endif; ?>><?php echo $vo['placeholder']; ?><?php echo $vo['category_name_cn']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <div class="layui-input-inline">
                        <select name="caiji_images" id="caiji_images" class="layui-input">
                            <option value="">是否已经下载图片</option>
                            <option value="0">未下载</option>
                            <option value="1">已下载</option>
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <div class="layui-input-inline" style="width: 100px;">
                        <select name="publish" id="publish" class="layui-input">
<!--                            <option value="">状态</option>-->
                            <option value="0" selected="selected">未发布</option>
                            <option value="1">已发布</option>
                            <option value="2">已删除</option>
                        </select>
                    </div>
                </div>


                <div class="layui-inline">
                    <div class="layui-input-inline">
                        <input type="hidden" name="action" value="search">
                        <button class="layui-btn" lay-submit="" lay-filter="LAY-search">立即搜索</button>
                        <button  class="layui-btn layui-btn-normal" id="empty"  lay-submit="" lay-filter="LAY-search">重置</button>
                    </div>
                </div>
            </div>
            <div>
                <button class="layui-btn" data-type="add" onclick="wk.href('<?php echo url('caiji_datas'); ?>')">
                    <i class="fa fa-plus"></i> 采集数据
                </button>
                <span class="layui-btn-dropdown" style="display:inline-block;">
                    <button class="layui-btn layui-btn-danger" data-toggle="dropdown"><i class="fa fa-wrench"></i> 批量操作 <i class="fa fa-caret-down"></i></button>
                    <ul class="layui-dropdown-menu layui-anim layui-anim-upbit">
                        <li><a href="javascript:;" class="layuiBtn" data-type="getCheckData"><i class="fa fa-trash-o"></i> 批量删除 </a></li>
                    </ul>
                </span>
            </div>
        </div>

        <div class="layui-card-body">
            <table id="LAY-table-manage" lay-filter="LAY-table-manage"></table>
            <!--类型模板-->

            <!--状态模板-->

            <!--操作模板-->
            <script type="text/html" id="opeBar">
                {{#if(d.caiji_images == 0 && d.publish != 2){ }}
                <a class="layui-btn layui-btn-normal layui-btn-xs" title="下载图片" onclick="download_images({{d.caiji_id}})"><i class="fa fa-download"></i></a>
                {{# } }}

                <a class="layui-btn layui-btn-xs" title="编辑" onclick="wk.href('<?php echo url('edit_caiji_data'); ?>?id={{d.caiji_id}}')"><i class="fa fa-pencil"></i></a>

                {{#if(d.publish == 0){ }}
                <a class="layui-btn layui-btn-danger layui-btn-xs" id="del_{{d.caiji_id}}" title="删除" onclick="del_caiji_data(this,{{d.caiji_id}})"><i class="fa fa-trash-o"></i></a>
                {{# } }}

                {{#if(d.publish == 2){ }}
                <a class="layui-btn layui-btn-danger layui-btn-xs" title="恢复数据" onclick="restore_caiji_data(this,{{d.caiji_id}})"><i class="fa fa-recycle"></i></a>
                {{# } }}

                {{#if(d.caiji_images == 1 && d.publish != 1 && d.title_jp != null && d.title_jp != ''){ }}
                <a class="layui-btn layui-btn-warm layui-btn-xs" style="background: purple;" title="加入到准备发布列表" onclick="ready_publish_article({{d.caiji_id}})"><i class="fa fa-share"></i></a>
                {{# } }}

                {{#if(d.caiji_images == 1 && d.publish != 1 && d.title_jp != null && d.title_jp != ''){ }}
                <a class="layui-btn layui-btn-info layui-btn-xs" title="发布" onclick="publish_article({{d.caiji_id}})"><i class="fa fa-paper-plane"></i></a>
                {{# } }}

            </script>
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
    layui.use(['index', 'table'], function () {
        var $ = layui.$
            , form = layui.form
            , table = layui.table

        //固定块
        // util.fixbar({
        //     css: {right: 20, bottom: 50}
        //     ,bgcolor: '#393D49'
        // });
        table.render({
            elem: '#LAY-table-manage'
            , url: '<?php echo url("caiji/data_list"); ?>'
            ,response: {
                statusCode: 220 //成功的状态码，默认：0
            }
            , page: true
            , even: false //开启隔行背景
            , size: 'lg' //sm小尺寸的表格 lg大尺寸
            // ,width:100
            , autoSort: false
            , cellMinWidth: 150
            , limits: [10, 20, 30, 40, 50]
            , limit: "50"
            // , height: "full-220"
            , loading: true
            , id: 'LAY-table'
            , cols: [[
                {type: 'checkbox', fixed: 'left'},
                {field:'caiji_id', width: 100, title: 'ID', align: 'center'},
                {field:'web_type', width: 100, title: '网站', align: 'center'},
                {field: 'first_category', width: 130 ,title: '一级分类', align: 'left'},
                {field: 'second_category', width: 130 ,title: '二级分类', align: 'left'},
                {field: 'web_url', width: 150 ,title: '目标网址', align: 'left',templet:function (a) {
                    return '<a style="color: #40b4f7;" href="'+a.web_whole_url+'" target="_blank">'+a.web_url+'</a>';
                    }},
                {field: 'title_cn', width: '' ,title: '标题', align: 'left'},
                {field: 'publish', width: 150 ,title: '状态', align: 'center',templet:function (d) {
                    if(d.publish == 0){
                        return '未发布('+ d.total +')';
                    }else if(d.publish == 1){
                        return '<em style="color: #009688;font-style: normal;">已发布</em>';
                    }else{
                        return '<em style="color: red;font-style: normal;">已删除</em>';
                    }

                    }},
                // {field: 'create_time', width: '', title: '采集时间', align: 'center',templet:"<div>{{layui.util.toDateString(d.create_time,'yyyy年MM月dd日')}}</div>"},
                {fixed: 'right', width: 160, title: '操作', align: 'center', toolbar: '#opeBar'}
            ]]
            ,done: function (res, curr, count) {
                $('th').children().prop('align','center');
            }
        });

        //事件
        var active = {
            getCheckData: function(){
                //批量删除
                wk.batchDel(getIds(),"<?php echo url('batchDelCaijiDatas'); ?>");
            }
        };
        $('.layuiBtn').on('click', function () {
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });
        var getIds = function () {
            var ids = [];
            var checkStatus = table.checkStatus('LAY-table')
                ,data = checkStatus.data;
            $.each(data,function(index,item){
                ids.push(item['caiji_id'])
            });
            return ids;
        }
    });


    /**
     * 恢复删除
     */
    function restore_caiji_data(obj,id){
        $.getJSON('<?php echo url("restore_caiji_data"); ?>', {'id' : id}, function(res){
            if(res.code == 200){
                wk.success(res.msg,"layui.table.reload('LAY-table');")
            }else if(res.code == 100){
                wk.error(res.msg,"layui.table.reload('LAY-table');");
            }
        });
    }

    /**
     * [ready_publish_article 把文章加入到准备发布列表里]
     */
    function ready_publish_article(id){
        $.getJSON('<?php echo url("ready_publish_article"); ?>', {'id' : id}, function(res){
            if(res.code == 200){
                wk.success(res.msg,"layui.table.reload('LAY-table');")
            }else if(res.code == 100){
                wk.error(res.msg,"layui.table.reload('LAY-table');");
            }
        });
    }

    /**
     * [publish_article 发布文章]
     */
    function publish_article(id){
        $.getJSON('<?php echo url("publish_article"); ?>', {'id' : id}, function(res){
            if(res.code == 200){
                wk.success(res.msg,"layui.table.reload('LAY-table');")
            }else if(res.code == 100){
                wk.error(res.msg,"layui.table.reload('LAY-table');");
            }
        });
    }

    /**
     * [download_images 下载图片]
     */
    function download_images(id){
        $.getJSON('<?php echo url("download_images"); ?>', {'id' : id}, function(res){
            if(res.code == 200){
                wk.success(res.msg,"layui.table.reload('LAY-table');")
            }else if(res.code == 100){
                wk.error(res.msg,"layui.table.reload('LAY-table');");
            }
        });
    }

    /**
     * [del_category 删除菜单]
     */
    function del_caiji_data(obj,id){
        // wk.confirm(id,'<?php echo url("del_rule"); ?>');
        layer.confirm('确认删除吗?', {icon: 7, title:'警告'}, function(index){
            //do something
            $.getJSON('<?php echo url("del_caiji_data"); ?>', {'id' : id}, function(res){
                if(res.code == 200){
                    // layer.msg(res.msg,{icon:1,time:1500,shade: 0.1},function(index){
                    //     layer.close(index);
                    //     var num = res.data.split(',');
                    //     $.each(num, function (index, item) {
                    //         $('#del_' + item).parents("tr").remove();
                    //     })
                    //     layui.table.reload('LAY-table');
                    // });
                    wk.success(res.msg,"layui.table.reload('LAY-table');")
                }else if(res.code == 100){
                    wk.error(res.msg,"layui.table.reload('LAY-table');");
                }
            });
            layer.close(index);
        })
    }
</script>
</body>
</html>