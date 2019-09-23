<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:87:"E:\phpstudy8\phpstudy_pro\WWW\slhl\public/../application/admin\view\join\advantage.html";i:1568871136;s:72:"E:\phpstudy8\phpstudy_pro\WWW\slhl\application\admin\view\Base\base.html";i:1567050636;}*/ ?>
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
		.banner_myupload  {
			opacity: 0;
			display:none;
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
			<div class="ibox">
				<div class="tabs-container">

					<div class="tab-content">
						<div id="tab-1" class="tab-pane active">
							<div class="panel-body">

								<div class="ibox-content-del">

									<div class="row">
										<!-- <form method="get" action="<?php echo url('Manage/admin/status'); ?>"> -->
										<form method="get" action="">

											<div class="col-sm-3">
												<div class="input-group">
													<input type="text" name="keyword" placeholder="标题" class="input-sm form-control" value="<?php echo $keyword; ?>">
													<span class="input-group-btn">
			                                        <button type="submit" class="btn btn-sm btn-primary"> 搜索</button> </span>

												</div>
											</div>
										</form>
										<?php if($is_del == '1'): ?>
										<a href="http://www.testslhl.com/admin/<?php echo $controller_name; ?>/addEdit<?php echo $a_action_name; ?>" class="btn btn-sm btn-primary">添加内容</a>
										<?php endif; ?>
									</div>

									<div class="table-responsive">
										<table class="table table-hover products_table">
											<colgroup>
												<col width="5%">
												<col width="20%">
												<col width="20%">
												<col width="20%">
												<!--<col width="20%">-->
											</colgroup>
											<thead>
											<tr >
												<th></th>
												<th>标题</th>
												<th>图片</th>
												<th>排序</th>
												<th>操作</th>
											</tr>
											</thead>
											<tbody>
											<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$vo): ?>
											<tr >

												<td>
													<?php if($is_del == '1'): ?>
													<input type="checkbox" class="i-checks checkbox" name="input" value="<?php echo $vo['id']; ?>">
													<?php endif; ?>
												</td>

												<td><?php echo $vo['title']; ?></td>
												<td><a href="<?php echo $vo['pic']; ?>" target="_blank"><img src="<?php echo $vo['pic']; ?>" height="60"/></a></td>
												<td><?php echo $vo['sort']; ?></td>
												<td>
													<a href="http://www.testslhl.com/admin/<?php echo $controller_name; ?>/addEdit<?php echo $a_action_name; ?>/id/<?php echo $vo['id']; ?>" class="btn btn-xs btn-warning">编辑</a>
													<?php if($is_del == '1'): ?>
													<a href="javaScript:;" data-id="<?php echo $vo['id']; ?>" class="btn btn-xs btn-warning updown" data-num="-1" data-class_id="<?php echo $vo['class_id']; ?>" title="上移">上移</a>
													<a href="javaScript:;" data-id="<?php echo $vo['id']; ?>" class="btn btn-xs btn-warning updown" data-num="1" data-class_id="<?php echo $vo['class_id']; ?>"  title="下移">下移</a>
													<a href="javascript:void(0);" class="btn btn-xs btn-warning btn_del" data-id="<?php echo $vo['id']; ?>">删除</a>
													<?php endif; ?>
												</td>
											</tr>
											<?php endforeach; endif; else: echo "" ;endif; if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?>
											<tr><td style='text-align:center' colspan='10'>暂无数据</td></tr>
											<?php endif; if($is_del == '1'): ?>
											<tr>
												<td colspan="12" class="pro_lasttd">
													<label ><input type="checkbox" class="i-checks all"  name="inputs"><span>全选</span></label>
													<div class="pro_table_contro">
														<a href="javascript:void(0);" class="btn btn-xs btn-warning btn_del" data-id="">删除</a>
													</div>
												</td>
											</tr>
											<?php endif; ?>
											</tbody>
										</table>

										<div class="text-center">
											<div class="page">
												<?php echo $list->render(); ?>
											</div>
										</div>

									</div>

								</div>


							</div>
						</div>
					</div>
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
<script src="http://www.testslhl.com/static/admin/js/plugins/layer/laydate/laydate.js"></script>
<script type="text/javascript">


	$('td.pro_lasttd input').on('ifChecked', function(event){
		$('input').iCheck('check');
	});
	$('td.pro_lasttd input').on('ifUnchecked', function(event){
		$('input').iCheck('uncheck');
	});

	$('.btn_del').click(function () {
		var id = $(this).attr('data-id');
		if(!id){
			$(".checkbox").each(function(){
				if(true == $(this).is(':checked')){
					id += id?"-"+$(this).val():$(this).val();
				}
			});

			if(!id){
				alert('请选择要删除的数据');
				return false;
			}
		}
		dialog.showTips('确定要删除吗？', "firm", function(){

			$.ajax({
				url: "<?php echo url('About/delHandle'); ?>",
				type: "post",
				dataType: "json",
				data: {
					id: id,
				}
			}).done(function (res) {
				if (res.status == 1) {
					dialog.showTips(res.msg,"", 1);
				} else {
					alert(res.msg);
				}

			})
		})
	});

	//上下移
	$(".updown").click(function() {
		var id = $(this).attr("data-id");
		var post = {id: id};
		var keyword = $.trim($('input[name="keyword"]').val());
		post.num = $(this).attr("data-num");
		post.search = {};
		if (keyword != '') {
			post.search['keyword'] = keyword;
		}
		post.search['class_id'] = $(this).attr("data-class_id");

		$.ajax({
			url: "http://www.testslhl.com/admin/About/upDown",
			type: "post",
			dataType: "json",
			data: post,
		}).done(function (res) {
			if (res.status == 1) {
				dialog.showTips(res.msg, "", 1);
			} else {
				alert(res.msg);
			}
		})
	});
</script>
<script>
	var start = {
		elem: "#start",
		format: "YYYY-MM-DD",
		max: laydate.now(),
		min: "2000-01-01",
		istime: true,
		istoday: false,
		choose: function (datas) {
			end.min = datas;
			end.start = datas
		}
	};
	var end = {
		elem: "#end",
		format: "YYYY-MM-DD",
		max: laydate.now(),
		min: "2000-01-01",
		istime: true,
		istoday: false,
		choose: function (datas) {
			start.min = datas
		}
	};
	laydate(start);
	laydate(end);



</script>
<script>
	$(document).ready(function () {
		$(".i-checks").iCheck({checkboxClass: "icheckbox_square-green", radioClass: "iradio_square-green",})
	});

	$("li").click(function(){
		$a=$(this).find("a").attr("href");
		// alert($a);
		if ($a) { window.location=$a; }
	})
</script>

</body>

</html>
