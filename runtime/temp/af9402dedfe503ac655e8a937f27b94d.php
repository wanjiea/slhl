<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:83:"E:\phpstudy8\phpstudy_pro\WWW\slhl\public/../application/admin\view\index\main.html";i:1567050636;s:72:"E:\phpstudy8\phpstudy_pro\WWW\slhl\application\admin\view\Base\base.html";i:1567050636;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo getSetting('system.title'); ?></title>

    <link href="http://www.testslhl.com/static/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://www.testslhl.com/static/admin/css/font-awesome.css-v=4.4.0.css" rel="stylesheet">

    <!-- Morris -->
    <link href="http://www.testslhl.com/static/admin/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="http://www.testslhl.com/static/admin/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="http://www.testslhl.com/static/admin/css/style.min.css" rel="stylesheet">
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
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <!--<div class="ibox-title">
                    <h5>首页</h5>
                    <div class="pull-right">
                    </div>
                </div>-->
                <div class="ibox-content" style="">
                    <div style="text-align: center;height: 200px;line-height: 200px;">欢迎您，<?php echo $manager['manager_name']; ?></div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://www.testslhl.com/static/admin/js/jquery.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/bootstrap.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/plugins/flot/jquery.flot.js"></script>
<script src="http://www.testslhl.com/static/admin/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/plugins/flot/jquery.flot.spline.js"></script>
<script src="http://www.testslhl.com/static/admin/js/plugins/flot/jquery.flot.resize.js"></script>
<script src="http://www.testslhl.com/static/admin/js/plugins/flot/jquery.flot.pie.js"></script>
<script src="http://www.testslhl.com/static/admin/js/plugins/flot/jquery.flot.symbol.js"></script>
<script src="http://www.testslhl.com/static/admin/js/plugins/peity/jquery.peity.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/peity-demo.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/content.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="http://www.testslhl.com/static/admin/js/plugins/easypiechart/jquery.easypiechart.js"></script>
<script src="http://www.testslhl.com/static/admin/js/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/sparkline-demo.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/contabs.min.js"></script>

</body>

</html>
