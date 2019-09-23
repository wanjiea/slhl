<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:84:"E:\phpstudy8\phpstudy_pro\WWW\slhl\public/../application/admin\view\admin\login.html";i:1567050636;s:72:"E:\phpstudy8\phpstudy_pro\WWW\slhl\application\admin\view\Base\base.html";i:1567050636;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="__ICO__/logo.ico"/>
	<title><?php echo getSetting('system.title'); ?> - 登录</title>
	<link href="http://www.testslhl.com/static/admin/css/bootstrap.min.css" tppabs="http://www.testslhl.com/static/admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="http://www.testslhl.com/static/admin/css/font-awesome.css-v=4.4.0.css" tppabs="http://www.testslhl.com/static/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">
	<link href="http://www.testslhl.com/static/admin/css/iCheck/custom.css" tppabs="http://www.testslhl.com/static/admin/css/iCheck/custom.css" rel="stylesheet">
	<link href="http://www.testslhl.com/static/admin/css/style.min.css" tppabs="http://www.testslhl.com/static/admin/css/style.min.css" rel="stylesheet">

	<script>if (window.top !== window.self) {
		window.top.location = window.location;
	}</script>

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
<style>
	.middle-box {
		max-width: 400px;
		z-index: 100;
		margin: 0 auto;
		padding-top: 235px;
	}
</style>
<body class="gray-bg">

<div class="login_bg">
	<canvas id="canvas"></canvas>
</div>

<div class="middle-box text-center loginscreen  animated fadeInDown">
	<div>
		<div>

			<div class="login_logo">
				<img src="<?php echo getSetting('system.header_logo'); ?>" style="width:120px"/>
			</div>

		</div>
		<h3>欢迎使用 <?php echo getSetting('system.title'); ?></h3>

		<div class="form-group">
			<input type="text" class="form-control" placeholder="请输入手机号" required="" id="telephone" value="" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength="11">
		</div>
		<div class="form-group">
			<input type="password" id="password" class="form-control" placeholder="请输入密码" required="">
		</div>
		<button type="button" id="btn_login" class="btn btn-primary block full-width m-b">登 录</button>

		<!-- <div class="radio i-checks admin_info_sex text-left">

            <label>
                <input type="checkbox" value="option1" name="b" checked="checked">
                <i></i> 记住密码
            </label>
        </div>  -->

		<p class="text-muted text-center">
			<!--<a href="<?php echo url('admin/retrievepwd'); ?>">
				<small>忘记密码了？</small>
			</a>-->
			<!--                |-->
			<!--                <a href="<?php echo url('admin/register'); ?>">注册一个新账号</a>-->
		</p>
		<!--<p class="text-muted text-center">
            <small>忘记密码了？</small>
            <a href="<?php echo url('/Store/admin/retrievepwd'); ?>">找回密码</a>
        </p>-->


		<!-- </form> -->
	</div>
</div>
<script src="http://www.testslhl.com/static/admin/js/jquery.min.js" tppabs="http://www.testslhl.com/static/admin/js/jquery.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/bootstrap.min.js" tppabs="http://www.testslhl.com/static/admin/js/bootstrap.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/plugins/iCheck/icheck.min.js" tppabs="http://www.testslhl.com/static/admin/js/plugins/iCheck/icheck.min.js"></script>
</body>

<script>

</script>
<script type="text/javascript">
	$("#btn_login").click(function () {
		var username = $('#telephone').val();
		var password = $('#password').val();

		if (username == '') {
			alert("请填写登陆手机号！");
			$('#telephone').focus();
			return false;
		}
		if (password == "") {
			alert('密码必填');
			$('#password').focus();
			return false;
		}

		$.ajax({
			url: "<?php echo url('Admin/checkloginajax'); ?>",
			type: "post",
			dataType: "json",
			data: {
				telephone: username,
				password: password
			}
		}).done(function (g) {
			if (g.status == 1) {
				window.location.href = "<?php echo url('Index/index'); ?>";
			} else {
				alert(g.msg);
			}

		})
	});
</script>

</html>
