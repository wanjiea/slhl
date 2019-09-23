<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:94:"E:\phpstudy8\phpstudy_pro\WWW\slhl\public/../application/admin\view\Base\add_edit_content.html";i:1569066805;s:72:"E:\phpstudy8\phpstudy_pro\WWW\slhl\application\admin\view\Base\base.html";i:1567050636;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo getSetting('system.title'); ?> </title>

    <link href="http://www.testslhl.com/static/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://www.testslhl.com/static/admin/css/font-awesome.css-v=4.4.0.css" rel="stylesheet">
    <link href="http://www.testslhl.com/static/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="http://www.testslhl.com/static/admin/css/style.min.css" rel="stylesheet">
    <style>
        .contact_mobile_div {
            position: relative;
        }
        .contact_mobile_div a {
            position: relative;top: -34px;left: 33%;
        }
    </style>
</head>
<style>

    /*********10.27**********/
    .wap_tanc{
        width:100%;
        height:100%;
        position:fixed; top:0; left:0;
        z-index:99999;
        display:none;
    }
    .wap_tanc_bg{
        width:100%;
        height:100%;
        position:absolute; top:0; left:0;
        z-index:-1;
        background:#000;
        opacity:0.4;
        filter:alpha(opacity=40);
        -moz-opacity:0.4;
        -khtml-opacity:0.4;
        -webkit-opacity:0.4;
    }

    .wap_tanc_con{
        width:300px;
        padding: 16px;
        padding-bottom: 0;
        background-color: rgba(255,255,255,0.96);
        border-radius:15px;
        position:absolute; left:50%; top:50%;
        margin-top:-55px;
        margin-left:-125px;
        display:none;
    }
    .wap_tanc_con h5{
        margin:0;
        padding-bottom: 16px;
        line-height:30px;
        text-align:center;
        font-size:14px;
        font-weight:600 !important;
        letter-spacing:1px;
        border-bottom:1px solid #EBEBEB;

    }

    .wap_tanc_btn a{
        display:inline-block;
        width:50%;
        float:left;
        line-height:50px;
        text-align:center;
        letter-spacing:1px;
        font-size:14px;
        color:#006fff;
    }


    .wap_tanc_con1{
        width:500px;
        height:250px;
        margin-top:-125px;
        margin-left:-250px;
        padding:50px;
    }
    .wap_tanc_con1 h5{
        border-bottom:none;
        text-align:left;
        line-height:40px;
        font-weight:normal !important;
    }
    .wap_tanc_con1 h5 img{
        display:inline-block;
        vertical-align:top;
        margin-right:10px;
    }
    .wap_tanc_con1 h5 p{
        display:inline-block;
        vertical-align:top;
        font-size:30px;
    }
    .wap_tanc_con1 h5 p span{
        color:#ea5404;
        margin:0 3px;
    }

    .wap_tanc_con1 a{
        font-size:14px;
        display:inline-block;
        padding-left:95px;
        margin-top:20px;
        color:#ea5404;
        letter-spacing:1px;
    }
    .wap_tanc_con1>p{
        font-size:24px;
        color:#999;
        position:absolute; top:10px; right:20px;
        cursor:pointer;
    }
    /*********10.27**********/
</style>

<script>
    window.alert = function (msg){
        dialog.showTips(msg, "warn");
    }
    var dialog = {
        /*
         type为firm时，url传回调参数
         */
        showTips : function (msg,type,url){

            var htmlCon="";

            if(type=='warn'){

                htmlCon='<div class="wap_tanc" style="display: block;">'+
                    '<div class="wap_tanc_bg"></div>'+
                    '<div class="wap_tanc_con" style="display: block;">'+
                    '<h5>'+msg+'</h5>'+
                    '<div class="wap_tanc_btn clearfix">'+
                    '<a href="javascript:void(0)" style="width:100%;" class="close1">确定</a>'+
                    '</div>'+
                    '</div>'+
                    '</div>';

            }else if(type=="firm"){

                htmlCon='<div class="wap_tanc" style="display: block;">'+
                    '<div class="wap_tanc_bg"></div>'+
                    '<div class="wap_tanc_con" style="display: block;">'+
                    '<h5>'+msg+'</h5>'+
                    '<div class="wap_tanc_btn clearfix">'+
                    '<a href="javascript:void(0)" class="close1" style="border-right:1px solid #f1f1f1;color:#666;">取消</a>'+
                    '<a href="javascript:void(0)" class="continue" >确定</a>'+
                    '</div>'+
                    '</div>'+
                    '</div>';

            }else{

                if(url!=""){

                    if(url=="1"){
                        htmlCon='<div class="wap_tanc" style="display: block;">'+
                            '<div class="wap_tanc_bg"></div>'+
                            '<div class="wap_tanc_con" style="display: block;">'+
                            '<h5>'+msg+'</h5>'+
                            '<div class="wap_tanc_btn clearfix">'+
                            '<a href="javascript:void(0)" style="width:100%;" class="reload">确定</a>'+
                            '</div>'+
                            '</div>'+
                            '</div>';

                    }else{

                        htmlCon='<div class="wap_tanc" style="display: block;">'+
                            '<div class="wap_tanc_bg"></div>'+
                            '<div class="wap_tanc_con" style="display: block;">'+
                            '<h5>'+msg+'</h5>'+
                            '<div class="wap_tanc_btn clearfix">'+
                            '<a href="'+url+'" style="width:100%;">确定</a>'+
                            '</div>'+
                            '</div>'+
                            '</div>';
                    }



                }else{

                    htmlCon='<div class="wap_tanc" style="display: block;">'+
                        '<div class="wap_tanc_bg"></div>'+
                        '<div class="wap_tanc_con" style="display: block;">'+
                        '<h5>'+msg+'</h5>'+
                        '<div class="wap_tanc_btn clearfix">'+
                        '<a href="javascript:void(0);" style="border-right:1px solid #f1f1f1;">取消</a>'+
                        '<a href="javascript:void(0);">确定</a>'+
                        '</div>'+
                        '</div>'+
                        '</div>';

                }

            }
            $('.wap_tanc').remove();
            $('body').append(htmlCon);
            var url_function = url;
            //$('body').prepend("pllp");

            $('.close1').click(function(){
                $('.wap_tanc').stop(true).fadeOut(300);
                $('.wap_tanc_con').stop(true).fadeOut(300);
                if(typeof url == "function" && type=='warn'){url_function();}
                return false;
            });

            $(".reload").click(function(){

                location.reload();

            });

            $(".continue").click(function (){
                url();
                $('.close1').trigger("click");
            })
        }
    }
</script>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php if(empty($cache) || (($cache instanceof \think\Collection || $cache instanceof \think\Paginator ) && $cache->isEmpty())): ?>添加<?php else: ?>修改<?php endif; ?>内容</h5>
                </div>
                <div class="ibox-content">
                    <form enctype="multipart/form-data" method="post" id="add_step" class="form-horizontal">


                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b style="color:red;">*</b>标题：</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control title" name="title" style="width:60%" value="<?php echo $cache['title']; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <?php if(in_array(($class_id), explode(',',""))): ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b style="color:red;">*</b>标题英：</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control en_title" name="en_title" style="width:60%" value="<?php echo $cache['en_title']; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <?php endif; if(in_array(($class_id), explode(',',"3"))): ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b style="color:red;">*</b>副标题：</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control title" name="sub_title" style="width:60%" value="<?php echo $cache['sub_title']; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <?php if(in_array(($class_id), explode(',',""))): ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b style="color:red;">*</b>副标题英：</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control en_title" name="en_sub_title" style="width:60%" value="<?php echo $cache['en_sub_title']; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <?php endif; endif; if(in_array(($class_id), explode(',',"1,4"))): ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b style="color:red;">*</b>概述：</label>
                            <div class="col-sm-9">
                                <textarea class="form-control describe" name="describe" maxlength="500" cols="100" rows="4" style="width:60%;text-align: left;resize:none"><?php echo $cache['describe']; ?></textarea>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <?php endif; if(in_array(($class_id), explode(',',""))): ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b style="color:red;">*</b>概述英：</label>
                            <div class="col-sm-9">
                                <textarea class="form-control en_describe" name="en_describe" maxlength="500" cols="100" rows="4" style="width:60%;text-align: left;resize:none"><?php echo $cache['en_describe']; ?></textarea>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <?php endif; if(in_array(($class_id), explode(',',"2"))): ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b style="color:red;">*</b>内容：</label>
                            <div class="col-sm-9">
                                <textarea class="form-control content" name="content" maxlength="500" cols="100" rows="4" style="width:60%;text-align: left;resize:none"><?php echo $cache['content']; ?></textarea>
                            </div>
                        </div>


                        <div class="hr-line-dashed"></div>
                        <?php endif; if(in_array(($class_id), explode(',',""))): ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b style="color:red;">*</b>内容英：</label>
                            <div class="col-sm-9">
                                <textarea class="form-control en_content" name="en_content" maxlength="500" cols="100" rows="4" style="width:60%;text-align: left;resize:none"><?php echo $cache['en_content']; ?></textarea>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <?php endif; if(in_array(($class_id), explode(',',""))): ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b style="color:red;">*</b>链接：</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control link" name="link" style="width:60%" value="<?php echo $cache['link']; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <?php endif; if(in_array(($class_id), explode(',',"1,3,4"))): ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b style='color:red;'>*</b>上传图片：</label>
                            <div class="col-sm-9">
                                <div class="col-sm-9">
                                    <div class="info_heads">
                                        <input type="file"
                                               class="file xuanze"
                                               name="upload_pic"
                                               style="position: absolute;z-index: 999;opacity: 0;width: 80px;height: 80px;cursor: pointer;"
                                               accept="image/jpg,image/jpeg,image/png"
                                               data-name="pic"
                                               data-type="single" >
                                        <img  class='goods_logo' src="http://www.testslhl.com/static/admin/images/addimg.png" />
                                        <div class="xuanze_showimge mgr10" data-nums='15' style="position:relative;" >
                                            <?php if(!(empty($cache['pic']) || (($cache['pic'] instanceof \think\Collection || $cache['pic'] instanceof \think\Paginator ) && $cache['pic']->isEmpty()))): ?>
                                            <div style='float:left;position:relative;'>
                                                <img src="<?php echo $cache['pic']; ?>" class="mgr10 mgt10 ">
                                                <input type="hidden" name="pic" class="pic" value="<?php echo $cache['pic']; ?>">
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="xuanze_progress fl mgr15" style="display:none">
                                        <img src="http://www.testslhl.com/static/admin/images/loadings.gif" style="width: 30px;height: 30px;" />
                                        <span class="xuanze_percent">80%</span>
                                    </div>
                                    <div style="clear: both;"></div>
                                    <span class="help-block m-b-none" style="color:red">
                                        <?php switch($class_id): case "1": break; case "2": ?>宽：540 高：565<?php break; case "3": ?>宽：599 高：408<?php break; case "4": ?>宽：1920 高：348<?php break; case "6": ?>宽：87 高：87<?php break; case "11": ?> 高：368<?php break; case "21": ?> 宽：390 高：175<?php break; case "31": ?> 宽：601 高：452<?php break; endswitch; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <?php endif; ?>

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <input type="hidden" name="id"  value="<?php echo $cache['id']; ?>">
                                <input type="hidden" name="class_id"  value="<?php echo $class_id; ?>">
                                <input type="hidden" name="sort"  value="<?php echo (isset($cache['sort']) && ($cache['sort'] !== '')?$cache['sort']:0); ?>">
                                <a href="javascript:history.back();" class="btn btn-white" type="submit">返回</a>
                                <a class="btn btn-primary save" href="javascript:void(0)" >保存</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="http://www.testslhl.com/static/admin/js/jquery.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/bootstrap.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/plugins/peity/jquery.peity.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/content.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/plugins/iCheck/icheck.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/peity-demo.min.js"></script>

<script>
    var class_id = $("input[name='class_id']").val();
   $('.save').click(function(){
       var post = $('#add_step').serializeArray();
       $.post("<?php echo url('About/addEditHandle'); ?>",post, function(data){
           if(data.status){
               dialog.showTips(data.msg,"","http://www.testslhl.com/admin/<?php echo $controller_name; ?>/<?php echo $action_name; ?>");
           }else{
               alert(data.msg);
           }
       }, "json");
       return false;
   });
</script>

<!--拖拽图片排序-->
<!--
<div class="xuanze_showimge fl  multi-img-details input-group multi-img-details ui-sortable dad-active dad-container"  id="J_imageView_1">
    <foreach name="cache.package_banner" item="v">
        <div class="goods_imgs">
            <img src="" height="80"  class="mgr10 mgt10 ">
            <input type="hidden" name="package_banner" class="package_banner"  value="">
            <em class="close" title="删除这张图片" onclick="delImgs(this)">×</em>
        </div>
</foreach>
</div>
<link rel="stylesheet" href="http://www.testslhl.com/static/admin/upload_img/uploadImg.css"/>
<link rel="stylesheet" href="http://www.testslhl.com/static/admin/upload_img/jquery.dad.css"/>
<script src="http://www.testslhl.com/static/admin/upload_img/jquery.dad.min.js"></script>
<script language="javascript">
    $('.J_imageView_1').dad({
        draggable: 'img'//拖拽区域
    });
</script>-->
<!--拖拽图片排序-->

<script type="text/javascript" src="http://www.testslhl.com/static/admin/js/jquery.js"></script>
<script type="text/javascript" src="http://www.testslhl.com/static/admin/js/jquery-form.js"></script>
<script type="text/javascript">


    $(function () {

        /*图片上传*/
        $(".xuanze").wrap("<form class='myupload' action='<?php echo url('Index/addImage'); ?>' method='post' enctype='multipart/form-data'></form>");
        $(".xuanze").change(function(){ //选择文件

            var obj = $(this);
            var type = obj.attr('data-type'); // single 单图 multiple 多图
            var xuanze_progress = obj.parents('.form-group').find('.xuanze_progress');
            var xuanze_percent = obj.parents('.form-group').find('.xuanze_percent');
            var xuanze_showimge = obj.parents('.form-group').find('.xuanze_showimge');
            var name = obj.attr('data-name');
            obj.parents('.myupload').ajaxSubmit({
                dataType:  'json', //数据格式为json
                beforeSend: function() { //开始上传
                    xuanze_progress.show(); //显示进度条
                    var percentVal = '0%';
                    xuanze_percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%'; //获得进度
                    xuanze_percent.html(percentVal); //显示上传进度百分比
                },
                success: function(data) { //成功
                    if (type == 'multiple') { //多图
                        var img = '<div class="goods_imgs">' +
                            '<img src="'+ data.info +'" height="80"  class="mgr10 mgt10 ">' +
                            '<input type="hidden" name="'+ name +'" class="'+ name +'"  value="'+ data.info +'">' +
                            '<em class="close" title="删除这张图片" onclick="delImgs(this)">×</em>' +
                            '</div>';

                        xuanze_showimge.append(img);

                        $('.J_imageView_1').dad({
                            draggable: 'img'//拖拽区域
                        });
                    } else { // 单图
                        var img = '<img src="'+ data.info +'" height="80">' +
                            '<input type="hidden" name="'+ name +'" class="'+name+'" value="'+ data.info +'">';
                        xuanze_showimge.html(img);
                    }

                    xuanze_progress.hide();
                },
                error:function(xhr){ //上传失败
                    console.log(xhr.status)
                }
            });
        });

    });

    function delImgs(obj){
        dialog.showTips("删除这张图片？","firm",function (){
            $(obj).next("input").remove();
            $(obj).remove();
        })
    }
</script>
</body>

</html>
