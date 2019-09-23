<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:92:"E:\phpstudy8\phpstudy_pro\WWW\slhl\public/../application/admin\view\product\product_add.html";i:1569060200;s:72:"E:\phpstudy8\phpstudy_pro\WWW\slhl\application\admin\view\Base\base.html";i:1567050636;}*/ ?>
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
    <!--编辑器 1-->
    <script type="text/javascript" charset="utf-8" src="http://www.testslhl.com/static/admin/Ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="http://www.testslhl.com/static/admin/Ueditor/ueditor.all.js"></script>
    <script type="text/javascript" charset="utf-8" src="http://www.testslhl.com/static/admin/Ueditor/lang/zh-cn/zh-cn.js"></script>
    <!--编辑器 2-->

    <style>
        .contact_mobile_div {
            position: relative;
        }

        .contact_mobile_div a {
            position: relative;
            top: -34px;
            left: 33%;
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
                    <h5><?php if(empty($cache) || (($cache instanceof \think\Collection || $cache instanceof \think\Paginator ) && $cache->isEmpty())): ?>添加<?php else: ?>修改<?php endif; ?>产品信息</h5>
                </div>
                <div class="ibox-content">
                    <form enctype="multipart/form-data" method="post" id="add_step" class="form-horizontal">


                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b style="color:red;">*</b>名称：</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control title" name="title" style="width:60%"
                                       value="<?php echo $cache['title']; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b style="color:red;">*</b>英文名称：</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control en_title" name="en_title" style="width:60%"
                                       value="<?php echo $cache['en_title']; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>



                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b style="color:red;">*</b>概述：</label>
                            <div class="col-sm-9">
                                <textarea name="describe" id="describe"><?php echo $cache['describe']; ?></textarea>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b style='color:red;'>*</b>主图：</label>
                            <div class="col-sm-9">
                                <div class="col-sm-9">
                                    <div class="info_heads">
                                        <input type="file"
                                               class="file xuanze"
                                               name="upload_pic"
                                               style="position: absolute;z-index: 999;opacity: 0;width: 80px;height: 80px;cursor: pointer;"
                                               accept="image/jpg,image/jpeg,image/png"
                                               data-name="pic"
                                               data-type="single">
                                        <img class='goods_logo' src="http://www.testslhl.com/static/admin/images/addimg.png"/>
                                        <div class="xuanze_showimge mgr10" data-nums='15' style="position:relative;">
                                            <?php if(!(empty($cache['pic']) || (($cache['pic'] instanceof \think\Collection || $cache['pic'] instanceof \think\Paginator ) && $cache['pic']->isEmpty()))): ?>
                                            <div style='float:left;position:relative;'>
                                                <img src="<?php echo $cache['pic']; ?>" class="mgr10 mgt10 ">
                                                <input type="hidden" name="pic" class="pic" value="<?php echo $cache['pic']; ?>">
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="xuanze_progress fl mgr15" style="display:none">
                                        <img src="http://www.testslhl.com/static/admin/images/loadings.gif" style="width: 30px;height: 30px;"/>
                                        <span class="xuanze_percent">80%</span>
                                    </div>
                                    <div style="clear: both;"></div>
<!--                                    <span class="help-block m-b-none" style="color:red">-->
<!--                                        宽：362 高：377-->
<!--                                    </span>-->
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b style='color:red;'>*</b>副图：</label>
                            <div class="col-sm-9">
                                <div class="col-sm-9">
                                    <div class="info_heads">
                                        <input type="file"
                                               class="file xuanze"
                                               name="upload_pic"
                                               style="position: absolute;z-index: 999;opacity: 0;width: 80px;height: 80px;cursor: pointer;"
                                               accept="image/jpg,image/jpeg,image/png"
                                               data-name="big_pic"
                                               data-type="single">
                                        <img class='goods_logo' src="http://www.testslhl.com/static/admin/images/addimg.png"/>
                                        <div class="xuanze_showimge mgr10" data-nums='15' style="position:relative;">
                                            <?php if(!(empty($cache['pic']) || (($cache['pic'] instanceof \think\Collection || $cache['pic'] instanceof \think\Paginator ) && $cache['pic']->isEmpty()))): ?>
                                            <div style='float:left;position:relative;'>
                                                <img src="<?php echo $cache['big_pic']; ?>" class="mgr10 mgt10 ">
                                                <input type="hidden" name="big_pic" class="big_pic"
                                                       value="<?php echo $cache['big_pic']; ?>">
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="xuanze_progress fl mgr15" style="display:none">
                                        <img src="http://www.testslhl.com/static/admin/images/loadings.gif" style="width: 30px;height: 30px;"/>
                                        <span class="xuanze_percent">80%</span>
                                    </div>
                                    <div style="clear: both;"></div>
<!--                                    <span class="help-block m-b-none" style="color:red">-->
<!--                                        宽：1920 高：785-->
<!--                                    </span>-->
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b style="color:red;">*</b>应用场景：</label>
                            <div class="col-sm-9">
                                <a href="javascript:void(0)" class="btn btn-primary" onclick="J_add_param(this)"
                                   type="scenes"><i class="fa fa-plus"></i>添加应用场景</a>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b style='color:red;'>*</b>
                                应用场景：
                            </label>

                            <div class="col-sm-9">
                                <table id="scenes" style='width: 80%;'>
                                    <tr>
                                        <th>
                                            <div class="col-sm-3">名称</div>
                                        </th>
                                        <th>
                                            <div class="col-sm-3">英文名称</div>
                                        </th>
                                        <th style='margin-left: 20px;'>
                                            <div class="col-sm-4">图片</div>
                                        </th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <?php if(empty($cache['scenes']) || (($cache['scenes'] instanceof \think\Collection || $cache['scenes'] instanceof \think\Paginator ) && $cache['scenes']->isEmpty())): ?>
                                    <tr id='scenes_list' v-if="list.package_banner==''">
                                        <td style='width: 25%;padding-top: 10px;'><input type="text"
                                                                                         class="form-control scenes_name"
                                                                                         name="scenes_name[]"
                                                                                         style="width: 90%" value=""/>
                                        </td>
                                        <td style='width: 25%;padding-top: 10px;'><input type="text"
                                                                                         class="form-control scenes_value"
                                                                                         name="scenes_value[]"
                                                                                         style="width: 90%" value=""/>
                                        </td>
                                        <td style='width: 20%;padding-top: 10px;'>
                                            <div class="info_head">
                                                <div class="xuanze_showimge mgr10" data-nums='15'
                                                     style="position:relative;">

                                                    <div style='float:left;position:relative;' data-name="scenes_pic[]"
                                                         data-type="single"
                                                         onclick="J_upload_img(this)">
                                                        <img src="http://www.testslhl.com/static/admin/images/addimg.png"
                                                             style="height:100px;width: 100px;" class="mgr10 mgt10 ">
                                                        <input type="hidden" class="scenes_pic" name="scenes_pic[]"
                                                               value="">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="xuanze_progress fl mgr15" style="display:none">
                                                <img src="http://www.testslhl.com/static/admin/images/loadings.gif"
                                                     style="width: 30px;height: 30px;"/>
                                                <span class="xuanze_percent">80%</span>
                                            </div>
                                            <div style="clear: both;"></div>
                                        </td>
                                        <td style='width: 2%;padding-top: 10px;'><span class="thisscenes gicon-remove"
                                                                                       onclick="J_del_param(this)"
                                                                                       title='删除'
                                                                                       style="padding-top:2px;cursor:pointer;margin-left: 80%;">×</span>
                                        </td>
                                        <td style='width: 2%;padding-top: 10px;'><span class="thisscenes gicon-arrow-up"
                                                                                       onclick="J_up_param(this)"
                                                                                       title='上移'
                                                                                       style="padding-top:2px;cursor:pointer;margin-left: 40%;">↑</span>
                                        </td>
                                        <td style='width: 2%;padding-top: 10px;'><span
                                                class="thisscenes gicon-arrow-down" onclick="J_down_param(this)"
                                                title='下移' style="padding-top:2px;cursor:pointer;">↓</span></td>
                                    </tr>
                                    <?php endif; if(is_array($cache['scenes']) || $cache['scenes'] instanceof \think\Collection || $cache['scenes'] instanceof \think\Paginator): if( count($cache['scenes'])==0 ) : echo "" ;else: foreach($cache['scenes'] as $key=>$vo): ?>
                                    <tr id='scenes_list'>
                                        <td style='width: 25%;padding-top: 10px;'><input type="text"
                                                                                         class="form-control scenes_name"
                                                                                         name="scenes_name[]"
                                                                                         style="width: 90%"
                                                                                         value="<?php echo $vo['name']; ?>"/></td>
                                        <td style='width: 25%;padding-top: 10px;'><input type="text"
                                                                                         class="form-control scenes_value"
                                                                                         name="scenes_value[]"
                                                                                         style="width: 90%"
                                                                                         value="<?php echo $vo['en_name']; ?>"/></td>
                                        <td style='width: 20%;padding-top: 10px;'>
                                            <div class="info_head">
                                                <div class="xuanze_showimge mgr10" data-nums='15'
                                                     style="position:relative;">

                                                    <div style='float:left;position:relative;' data-name="scenes_pic[]"
                                                         data-type="single"
                                                         onclick="J_upload_img(this)">
                                                        <img src="<?php echo (isset($vo['pic']) && ($vo['pic'] !== '')?$vo['pic']:'http://www.testslhl.com/static/admin/images/addimg.png'); ?>"
                                                             style="height:100px;width: 100px;" class="mgr10 mgt10 ">
                                                        <input type="hidden" class="scenes_pic" name="scenes_pic[]"
                                                               value="<?php echo $vo['pic']; ?>">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="xuanze_progress fl mgr15" style="display:none">
                                                <img src="http://www.testslhl.com/static/admin/images/loadings.gif"
                                                     style="width: 30px;height: 30px;"/>
                                                <span class="xuanze_percent">80%</span>
                                            </div>
                                            <div style="clear: both;"></div>

                                        </td>
                                        <td style='width: 2%;padding-top: 10px;'><span class="thisscenes gicon-remove"
                                                                                       onclick="J_del_param(this)"
                                                                                       title='删除'
                                                                                       style="padding-top:2px;cursor:pointer;margin-left: 80%;">×</span>
                                        </td>
                                        <td style='width: 2%;padding-top: 10px;'><span class="thisscenes gicon-arrow-up"
                                                                                       onclick="J_up_param(this)"
                                                                                       title='上移'
                                                                                       style="padding-top:2px;cursor:pointer;margin-left: 40%;">↑</span>
                                        </td>
                                        <td style='width: 2%;padding-top: 10px;'><span
                                                class="thisscenes gicon-arrow-down" onclick="J_down_param(this)"
                                                title='下移' style="padding-top:2px;cursor:pointer;">↓</span></td>
                                    </tr>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </table>
                            </div>

                            <!-- <div>
                                <a href="javascript:void(0)" class="btn btn-primary btn-mini" onclick="J_add_param(this)" title="添加"><i class="gicon-plus white"></i></a>
                            </div> -->
                        </div>
                        <div class="hr-line-dashed"></div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b style="color:red;">*</b>优点：</label>
                            <div class="col-sm-9">
                                <a href="javascript:void(0)" class="btn btn-primary" onclick="J_add_param(this)"
                                   type="advantage"><i class="fa fa-plus"></i>添加优点</a>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b style='color:red;'>*</b>
                                优点：
                            </label>

                            <div class="col-sm-9">
                                <table id="advantage" style='width: 80%;'>
                                    <tr>
                                        <th>
                                            <div class="col-sm-3">标题</div>
                                        </th>
                                        <th>
                                            <div class="col-sm-3">副标题</div>
                                        </th>

                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <?php if(empty($cache['advantage']) || (($cache['advantage'] instanceof \think\Collection || $cache['advantage'] instanceof \think\Paginator ) && $cache['advantage']->isEmpty())): ?>
                                    <tr id='advantage_list' v-if="list.package_banner==''">
                                        <td style='width: 25%;padding-top: 10px;'><input type="text"
                                                                                         class="form-control advantage_name"
                                                                                         name="advantage_name[]"
                                                                                         style="width: 90%" value=""/>
                                        </td>
                                        <td style='width: 25%;padding-top: 10px;'><input type="text"
                                                                                         class="form-control advantage_value"
                                                                                         name="advantage_value[]"
                                                                                         style="width: 90%" value=""/>
                                        </td>
                                        <td style='width: 2%;padding-top: 10px;'><span
                                                class="thisadvantage gicon-remove" onclick="J_del_param(this)"
                                                title='删除'
                                                style="padding-top:2px;cursor:pointer;margin-left: 80%;">×</span></td>
                                        <td style='width: 2%;padding-top: 10px;'><span
                                                class="thisadvantage gicon-arrow-up" onclick="J_up_param(this)"
                                                title='上移'
                                                style="padding-top:2px;cursor:pointer;margin-left: 40%;">↑</span></td>
                                        <td style='width: 2%;padding-top: 10px;'><span
                                                class="thisadvantage gicon-arrow-down" onclick="J_down_param(this)"
                                                title='下移' style="padding-top:2px;cursor:pointer;">↓</span></td>
                                    </tr>
                                    <?php endif; if(is_array($cache['advantage']) || $cache['advantage'] instanceof \think\Collection || $cache['advantage'] instanceof \think\Paginator): if( count($cache['advantage'])==0 ) : echo "" ;else: foreach($cache['advantage'] as $key=>$vo): ?>

                                    <tr id='advantage_list'>
                                        <td style='width: 25%;padding-top: 10px;'><input type="text"
                                                                                         class="form-control advantage_name"
                                                                                         name="advantage_name[]"
                                                                                         style="width: 90%"
                                                                                         value="<?php echo $vo['title']; ?>"/></td>
                                        <td style='width: 25%;padding-top: 10px;'><input type="text"
                                                                                         class="form-control advantage_value"
                                                                                         name="advantage_value[]"
                                                                                         style="width: 90%"
                                                                                         value="<?php echo $vo['sub_title']; ?>"/></td>
                                        <td style='width: 2%;padding-top: 10px;'><span
                                                class="thisadvantage gicon-remove" onclick="J_del_param(this)"
                                                title='删除'
                                                style="padding-top:2px;cursor:pointer;margin-left: 80%;">×</span></td>
                                        <td style='width: 2%;padding-top: 10px;'><span
                                                class="thisadvantage gicon-arrow-up" onclick="J_up_param(this)"
                                                title='上移'
                                                style="padding-top:2px;cursor:pointer;margin-left: 40%;">↑</span></td>
                                        <td style='width: 2%;padding-top: 10px;'><span
                                                class="thisadvantage gicon-arrow-down" onclick="J_down_param(this)"
                                                title='下移' style="padding-top:2px;cursor:pointer;">↓</span></td>
                                    </tr>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </table>
                            </div>

                            <!-- <div>
                                <a href="javascript:void(0)" class="btn btn-primary btn-mini" onclick="J_add_param(this)" title="添加"><i class="gicon-plus white"></i></a>
                            </div> -->
                        </div>
                        <div class="hr-line-dashed"></div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b style="color:red;">*</b>产品规格：</label>
                            <div class="col-sm-9">
                                <a href="javascript:void(0)" class="btn btn-primary" type="specification"
                                   onclick="J_add_param(this)"><i class="fa fa-plus"></i>添加规格</a>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b style='color:red;'>*</b>
                                产品规格：
                            </label>

                            <div class="col-sm-9">
                                <table id="specification" style='width: 80%;'>
                                    <tr>
                                        <th>
                                            <div class="col-sm-3">名称</div>
                                        </th>
                                        <th>
                                            <div class="col-sm-3">值</div>
                                        </th>

                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <?php if(empty($cache['specification']) || (($cache['specification'] instanceof \think\Collection || $cache['specification'] instanceof \think\Paginator ) && $cache['specification']->isEmpty())): ?>
                                    <tr id='specification_list' v-if="list.package_banner==''">
                                        <td style='width: 25%;padding-top: 10px;'><input type="text"
                                                                                         class="form-control specification_name"
                                                                                         name="specification_name[]"
                                                                                         style="width: 90%" value=""/>
                                        </td>
                                        <td style='width: 25%;padding-top: 10px;'><input type="text"
                                                                                         class="form-control specification_value"
                                                                                         name="specification_value[]"
                                                                                         style="width: 90%" value=""/>
                                        </td>
                                        <td style='width: 2%;padding-top: 10px;'><span
                                                class="thisspecification gicon-remove"
                                                onclick="J_del_param(this)"
                                                title='删除'
                                                style="padding-top:2px;cursor:pointer;margin-left: 80%;">×</span></td>
                                        <td style='width: 2%;padding-top: 10px;'><span
                                                class="thisspecification gicon-arrow-up"
                                                onclick="J_up_param(this)"
                                                title='上移'
                                                style="padding-top:2px;cursor:pointer;margin-left: 40%;">↑</span></td>
                                        <td style='width: 2%;padding-top: 10px;'><span
                                                class="thisspecification gicon-arrow-down"
                                                onclick="J_down_param(this)"
                                                title='下移' style="padding-top:2px;cursor:pointer;">↓</span></td>
                                    </tr>
                                    <?php endif; if(is_array($cache['specification']) || $cache['specification'] instanceof \think\Collection || $cache['specification'] instanceof \think\Paginator): if( count($cache['specification'])==0 ) : echo "" ;else: foreach($cache['specification'] as $key=>$vo): ?>
                                    <tr id='specification_list'>
                                        <td style='width: 25%;padding-top: 10px;'><input type="text"
                                                                                         class="form-control specification_name"
                                                                                         name="specification_name[]"
                                                                                         style="width: 90%"
                                                                                         value="<?php echo $vo['title']; ?>"/></td>
                                        <td style='width: 25%;padding-top: 10px;'><input type="text"
                                                                                         class="form-control specification_value"
                                                                                         name="specification_value[]"
                                                                                         style="width: 90%"
                                                                                         value="<?php echo $vo['sub_title']; ?>"/></td>
                                        <td style='width: 2%;padding-top: 10px;'><span
                                                class="thisspecification gicon-remove"
                                                onclick="J_del_param(this)"
                                                title='删除'
                                                style="padding-top:2px;cursor:pointer;margin-left: 80%;">×</span></td>
                                        <td style='width: 2%;padding-top: 10px;'><span
                                                class="thisspecification gicon-arrow-up"
                                                onclick="J_up_param(this)"
                                                title='上移'
                                                style="padding-top:2px;cursor:pointer;margin-left: 40%;">↑</span></td>
                                        <td style='width: 2%;padding-top: 10px;'><span
                                                class="thisspecification gicon-arrow-down"
                                                onclick="J_down_param(this)"
                                                title='下移' style="padding-top:2px;cursor:pointer;">↓</span></td>
                                    </tr>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </table>
                            </div>

                            <!-- <div>
                                <a href="javascript:void(0)" class="btn btn-primary btn-mini" onclick="J_add_param(this)" title="添加"><i class="gicon-plus white"></i></a>
                            </div> -->
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <input type="hidden" name="id" value="<?php echo $cache['id']; ?>">
                                <input type="hidden" name="sort" value="<?php echo (isset($cache['sort']) && ($cache['sort'] !== '')?$cache['sort']:0); ?>">
                                <a href="javascript:history.back();" class="btn btn-white" type="submit">返回</a>
                                <a class="btn btn-primary save" href="javascript:void(0)">保存</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="file" accept="image/jpg,image/jpeg,image/png" name="upload_pic" class="xuanze_hidden xuanze_hidden1"
       style="display: none">
<script src="http://www.testslhl.com/static/admin/js/jquery.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/bootstrap.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/plugins/peity/jquery.peity.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/content.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/plugins/iCheck/icheck.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/peity-demo.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/plugins/layer/laydate/laydate.js"></script>
<!--拖拽图片排序-->
<link rel="stylesheet" href="http://www.testslhl.com/static/admin/upload_img/uploadImg.css"/>
<link rel="stylesheet" href="http://www.testslhl.com/static/admin/upload_img/jquery.dad.css"/>
<script src="http://www.testslhl.com/static/admin/upload_img/jquery.dad.min.js"></script>
<script>
    $('#J_imageView_1').dad({
        draggable: 'img'//拖拽区域
    });
</script>
<script>
    var url = '';
    $('.save').click(function () {
        var post = $('#add_step').serializeArray();
        $.post("<?php echo url('product/productHandle'); ?>", post, function (data) {
            if (data.status) {
                dialog.showTips(data.msg, "", "<?php echo url('product/productList'); ?>");
            } else {
                alert(data.msg);
            }
        }, "json");
        return false;
    });


    var obj;

    function J_upload_img(o) {
        obj = $(o);
        $('.xuanze_hidden1').click();
    }

    $(".xuanze_hidden").wrap("<form class='myupload' action='<?php echo url('/Admin/Index/addImage'); ?>' method='post' enctype='multipart/form-data'></form>");
    $(".xuanze_hidden").change(function () { //选择文件
        var o = $(this);
        get_upload(obj, o)
    });

    function get_upload(obj, o) {
        var type = obj.attr('data-type'); // single 单图 multiple 多图
        var xuanze_progress = obj.parents('.xuanze_showimge').parent().next('.xuanze_progress');
        var xuanze_percent = obj.parents('.xuanze_showimge').parent().next('.xuanze_progress').find('.xuanze_percent');
        var xuanze_showimge = obj.parents('.xuanze_showimge');
        var name = obj.attr('data-name');
        o.parents('.myupload').ajaxSubmit({
            dataType: 'json', //数据格式为json
            beforeSend: function () { //开始上传
                xuanze_progress.show(); //显示进度条
                var percentVal = '0%';
                xuanze_percent.html(percentVal);
            },
            uploadProgress: function (event, position, total, percentComplete) {
                var percentVal = percentComplete + '%'; //获得进度
                xuanze_percent.html(percentVal); //显示上传进度百分比
            },
            success: function (g) { //成功
                if (type == 'multiple') { //多图
                    var img = '<div class="goods_imgs">' +
                        '<img src="' + g.info + '" height="80"  class="mgr10 mgt10 ">' +
                        '<input type="hidden"  class="' + name + '"  value="' + g.info + '">' +
                        '<em class="close" title="移除这张图片" onclick="delImgs(this)">×</em>' +
                        '</div>';
                    xuanze_showimge.append(img);
                } else { // 单图

                    console.log(name);
                    var img = '<img src="' + g.info + '" height="80" style="background: #2881e9">' +
                        '<input type="hidden"  class="' + name + '" name="' + name + '" value="' + g.info + '" >';
                    xuanze_showimge.html(img);
                }
                $('.xuanze_hidden1').val('');
                xuanze_progress.hide();
            },
            error: function (xhr) { //上传失败
                console.log(xhr.status)
            }
        });
    }

    /*添加商品参数 1*/
    function J_add_param(obj) {

        var type = $(obj).attr('type')
        var picname = type + '_pic[]';
        var namename = type + '_name[]';
        var valuename = type + '_value[]';
        var trid = type + '_list';
        var img = '<td style=\'width: 20%;padding-top: 10px;\'>\n' +
            '<div class="info_head">\n' +
            '<div class="xuanze_showimge mgr10" data-nums=\'15\' style="position:relative;" >\n' +
            '\n' +
            '<div style=\'float:left;position:relative;\' data-name=' + picname + '\n' +
            '                 data-type="single"\n' +
            '                 onclick="J_upload_img(this)">\n' +
            '<img src="http://www.testslhl.com/static/admin/images/addimg.png" style="height:100px;width: 100px;" class="mgr10 mgt10 ">\n' +
            '<input type="hidden"  class=' + picname + ' name=' + picname + ' value="">\n' +
            '</div>\n' +
            '\n' +
            '</div>\n' +
            '</div>\n' +
            '<div class="xuanze_progress fl mgr15" style="display:none">\n' +
            '<img src="http://www.testslhl.com/static/admin/images/loadings.gif" style="width: 30px;height: 30px;" />\n' +
            '<span class="xuanze_percent">80%</span>\n' +
            '</div>\n' +
            '<div style="clear: both;"></div>\n' +
            '</td>\n';
        var value = '<td style=\'width: 25%;padding-top: 10px;\'><input type="text" class="form-control"+' + valuename + ' name=' + valuename + ' style="width: 90%"  value=""/></td>\n';
        var tr = '<tr id=' + trid + ' >\n';
        var name = '<td style=\'width: 25%;padding-top: 10px;\'><input type="text" class="form-control"+' + namename + ' name=' + namename + '  style="width: 90%"  value=""/></td>\n';
        var caozuo = '<td style=\'width: 2%;padding-top: 10px;\'><span class="thisparam gicon-remove" onclick="J_del_param(this)" title=\'删除\' style="padding-top:2px;cursor:pointer;margin-left: 80%;">×</span></td>\n' +
            '<td style=\'width: 2%;padding-top: 10px;\'><span class="thisparam gicon-arrow-up" onclick="J_up_param(this)" title=\'上移\' style="padding-top:2px;cursor:pointer;margin-left: 40%;">↑</span></td>\n' +
            '<td style=\'width: 2%;padding-top: 10px;\'><span class="thisparam gicon-arrow-down" onclick="J_down_param(this)" title=\'下移\' style="padding-top:2px;cursor:pointer;">↓</span></td>\n' +
            '</tr>';
        if (type == 'scenes') {
            var html = tr + name + value + img + caozuo;
        } else if (type == 'advantage') {
            var html = tr + name + value + caozuo;
        }else if (type == 'specification'){
            var html = tr + name + value + caozuo;
        }
        $('#' + type).append(html);

    }

    /*添加商品参数 2*/

    /*删除参数 1*/
    function J_del_param(obj) {
        $(obj).parent().parent().remove();
    }

    /*删除参数 2*/

    /*上移参数 1*/
    function J_up_param(obj) {
        var _new = $(obj).parent().parent();
        if (_new.index() > 1) {
            _new.fadeOut().fadeIn();
            _new.prev().before(_new);
        }
        J_del_param();
    }

    /*上移参数 2*/

    /*下移参数 1*/
    function J_down_param(obj) {
        var _new = $(obj).parent().parent();
        if (_new.index() != 0) {
            _new.fadeOut().fadeIn();
            _new.next().after(_new);
        }
        J_del_param();
    }


    /*  var start = {
          elem: "#start",
          format: "YYYY-MM-DD",
          max: laydate.now(),
          min: "2000-01-01",
          istime: true,
          istoday: false,
          choose: function (datas) {
              end.start = datas
          }
      };
      laydate(start);*/
    /*编辑器 1*/

    var ue = UE.getEditor('describe', {
        toolbars: [[
            'fullscreen', 'source', '|', 'undo', 'redo', '|',
            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
            'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
            'directionalityltr', 'directionalityrtl', 'indent', '|',
            'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
            'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
            'simpleupload', 'insertimage', 'insertvideo', 'music', 'attachment', 'map', 'gmap', 'insertframe', 'pagebreak', 'template', 'background', '|',
            'horizontal', 'spechars', 'snapscreen', 'wordimage', '|',
            'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
            'preview', 'searchreplace',
        ]],
        elementPathEnabled: false,
        autoHeightEnabled: false,
        initialFrameHeight: 300,
    });
    /*编辑器 2*/

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
        $(".xuanze").change(function () { //选择文件

            var obj = $(this);
            var type = obj.attr('data-type'); // single 单图 multiple 多图
            var xuanze_progress = obj.parents('.form-group').find('.xuanze_progress');
            var xuanze_percent = obj.parents('.form-group').find('.xuanze_percent');
            var xuanze_showimge = obj.parents('.form-group').find('.xuanze_showimge');
            var name = obj.attr('data-name');
            obj.parents('.myupload').ajaxSubmit({
                dataType: 'json', //数据格式为json
                beforeSend: function () { //开始上传
                    xuanze_progress.show(); //显示进度条
                    var percentVal = '0%';
                    xuanze_percent.html(percentVal);
                },
                uploadProgress: function (event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%'; //获得进度
                    xuanze_percent.html(percentVal); //显示上传进度百分比
                },
                success: function (data) { //成功
                    if (type == 'multiple') { //多图
                        var img = '<div class="goods_imgs">' +
                            '<img src="' + data.info + '" height="80"  class="mgr10 mgt10 ">' +
                            '<input type="hidden" name="' + name + '" class="' + name + '"  value="' + data.info + '">' +
                            '<em class="close" title="删除这张图片" onclick="delImgs(this)">×</em>' +
                            '</div>';

                        xuanze_showimge.append(img);

                        $('.J_imageView_1').dad({
                            draggable: 'img'//拖拽区域
                        });
                    } else { // 单图
                        var img = '<img src="' + data.info + '" height="80">' +
                            '<input type="hidden" name="' + name + '" class="' + name + '" value="' + data.info + '">';
                        xuanze_showimge.html(img);
                    }

                    xuanze_progress.hide();
                },
                error: function (xhr) { //上传失败
                    console.log(xhr.status)
                }
            });
        });

    });

    function delImgs(obj) {
        dialog.showTips("删除这张图片？", "firm", function () {
            // $(obj).next("input").remove();
            $(obj).parents('.goods_imgs').remove();
        })
    }
</script>
</body>

</html>
