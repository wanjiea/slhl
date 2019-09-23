<?php if (!defined('THINK_PATH')) exit(); /*a:7:{s:84:"E:\phpstudy8\phpstudy_pro\WWW\slhl\public/../application/admin\view\index\index.html";i:1567050636;s:72:"E:\phpstudy8\phpstudy_pro\WWW\slhl\application\admin\view\Base\head.html";i:1567050636;s:72:"E:\phpstudy8\phpstudy_pro\WWW\slhl\application\admin\view\Base\left.html";i:1567050636;s:71:"E:\phpstudy8\phpstudy_pro\WWW\slhl\application\admin\view\Base\top.html";i:1567050636;s:71:"E:\phpstudy8\phpstudy_pro\WWW\slhl\application\admin\view\Base\nav.html";i:1567050636;s:72:"E:\phpstudy8\phpstudy_pro\WWW\slhl\application\admin\view\Base\foot.html";i:1567050636;s:73:"E:\phpstudy8\phpstudy_pro\WWW\slhl\application\admin\view\Base\right.html";i:1567050636;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <title><?php echo getSetting('system.title'); ?></title>

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html"/><![endif]-->
    <link href="http://www.testslhl.com/static/admin/css/bootstrap.min.css" tppabs="http://www.testslhl.com/static/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://www.testslhl.com/static/admin/css/font-awesome.css-v=4.4.0.css" tppabs="http://www.testslhl.com/static/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="http://www.testslhl.com/static/admin/css/style.min.css" tppabs="http://www.testslhl.com/static/admin/css/style.min.css" rel="stylesheet">

</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
<div id="wrapper">
    <!--左侧导航开始-->
    <!--左侧导航开始-->
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="nav-close"><i class="fa fa-times-circle"></i>
    </div>
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span><img alt="image" class="img-circle" src="<?php echo $manager['head_image']; ?>" width="64" height="64" /></span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                           <span class="block m-t-xs"><strong class="font-bold"><?php echo $manager['manager_name']; ?></strong></span>
                            <span class="text-muted text-xs block"><?php echo $manager['manager_cate_name']; ?><b class="caret"></b></span>
                            </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li>
                            <a class="J_menuItem" href="<?php echo url('admin/updatepwd'); ?>">修改密码</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo url('admin/logout'); ?>">安全退出</a>
                        </li>
                    </ul>
                </div>
                <div class="logo-element"><img src="<?php echo $manager['head_image']; ?>" width="40"/>
                </div>
            </li>
            <?php if(is_array($left_menu) || $left_menu instanceof \think\Collection || $left_menu instanceof \think\Paginator): if( count($left_menu)==0 ) : echo "" ;else: foreach($left_menu as $key=>$vo): ?>
            <li>
                <a <?php if(!(empty($vo['sub_menu']) || (($vo['sub_menu'] instanceof \think\Collection || $vo['sub_menu'] instanceof \think\Paginator ) && $vo['sub_menu']->isEmpty()))): ?> href="javascript:void(0);"
                   <?php else: ?>class="J_menuItem" href="<?php echo url($vo['control'].'/'.$vo['act']); ?>"
                <?php endif; ?>>
                <i class="fa <?php echo $vo['icon']; ?>"></i> <span class="nav-label"><?php echo $vo['name']; ?></span>
                <?php if(!(empty($vo['sub_menu']) || (($vo['sub_menu'] instanceof \think\Collection || $vo['sub_menu'] instanceof \think\Paginator ) && $vo['sub_menu']->isEmpty()))): ?>
                <span class="fa arrow"></span>
                <?php endif; ?>
                </a>
                <?php if(!(empty($vo['sub_menu']) || (($vo['sub_menu'] instanceof \think\Collection || $vo['sub_menu'] instanceof \think\Paginator ) && $vo['sub_menu']->isEmpty()))): ?>
                <ul class="nav nav-second-level">
                    <?php if(is_array($vo['sub_menu']) || $vo['sub_menu'] instanceof \think\Collection || $vo['sub_menu'] instanceof \think\Paginator): if( count($vo['sub_menu'])==0 ) : echo "" ;else: foreach($vo['sub_menu'] as $key=>$v): ?>
                    <li><a class="J_menuItem" href="http://www.testslhl.com/admin/<?php echo $v['control']; ?>/<?php echo $v['act']; ?>"><?php echo $v['name']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <?php endif; ?>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>
    </div>
</nav>
<!--左侧导航结束
    <!--左侧导航结束-->

    <!--右侧部分开始-->
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <!-- 顶部开始 -->
        <div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i>
            </a>
            <!-- <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="请输入您需要查找的内容 …" class="form-control" name="top-search" id="top-search">
                </div>
            </form>
            <a href="<?php echo url('admin/search'); ?>" tppabs="search_results.html" type="button" class="btn btn-outline btn-primary ind_search J_menuItem">搜索</a> -->
            
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <!-- <li class="dropdown">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-envelope"></i> <span class="label label-warning">16</span>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <li class="m-t-xs">
                        <div class="dropdown-messages-box">
                          
                            <a href="chat_view.html" tppabs="chat_view.html" class="index_mes J_menuItem">
                              <span class="J_menuItem_tit">消息回复</span>
                              
                              <span class="pull-left">
                                <img alt="image" class="img-circle" src="__IMAGES__/a7.jpg" tppabs="static/a7.jpg">
                              </span>
                              <div class="media-body">
                                  <strong>小四</strong>亲，在吗？请问单人凯威纯色团购活动需要预约吗？ <br>
                                  <small class="text-muted">1天前 2017.7.28</small>
                              </div>
                            </a>
                            
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <div class="dropdown-messages-box">
                          
                            <a href="chat_view.html" tppabs="chat_view.html" class="index_mes J_menuItem">
                              <span class="J_menuItem_tit">消息回复</span>
                              
                              <span class="pull-left">
                                  <img alt="image" class="img-circle" src="__IMAGES__/a4.jpg" tppabs="static/a4.jpg">
                              </span>
                              <div class="media-body ">
                                  
                                  <strong>国民岳飞</strong>老板，你家那个口红没货啦！快点给我补点货呗！ <br>
                                  <small class="text-muted">昨天</small>
                              </div>
                            </a>
                            
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <div class="text-center link-block">
                            <a href="javascript:void(0)">
                                <strong>忽略全部</strong>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a class="J_menuItem" href="mailbox.html" tppabs="mailbox.html">
                          <span class="J_menuItem_tit">消息中心</span>
                              
                            <div>
                                <i class="fa fa-envelope fa-fw"></i> 您有16条未读消息
                                <span class="pull-right text-muted small">4分钟前</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="J_menuItem" href="profile.html" tppabs="profile.html">
                          <span class="J_menuItem_tit">最新评论</span>
                              
                            <div>
                                <i class="fa fa-qq fa-fw"></i> 3条新评论 <span class="pull-right text-muted small">12分钟钱</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <div class="text-center link-block">
                            <a href="javascript:void(0)">
                              <span class="J_menuItem_tit">消息</span>
                              
                                <strong>忽略全部 </strong>
                            </a>
                        </div>
                    </li>
                </ul>
            </li> -->
            <!--<li class="dropdown hidden-xs">
                <a class="right-sidebar-toggle" aria-expanded="false">
                    <i class="fa fa-tasks"></i> 主题
                </a>
            </li>-->
        </ul>
    </nav>
</div>
        <!-- 顶部结束 -->

        <!-- 导航栏开始 -->
        <div class="row content-tabs">
    <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
    </button>
    <nav class="page-tabs J_menuTabs">
        <div class="page-tabs-content">
            <a href="javascript:;" class="active J_menuTab" data-id="index/main">首页</a>
        </div>
    </nav>
    <button class="roll-nav roll-right J_tabRight" style="right: 260px;"><i class="fa fa-forward"></i>
    </button>
    <div class="btn-group roll-nav roll-right" style="right: 180px;">
        <button class="dropdown J_tabClose" data-toggle="dropdown">关闭操作<span class="caret"></span>

        </button>
        <ul role="menu" class="dropdown-menu dropdown-menu-right">
            <li class="J_tabShowActive">
                <a>定位当前选项卡</a>
            </li>
            <li class="divider"></li>
            <li class="J_tabCloseAll">
                <a>关闭全部选项卡</a>
            </li>
            <li class="J_tabCloseOther">
                <a>关闭其他选项卡</a>
            </li>
        </ul>
    </div>
    <a href="javascript:history.back();" tppabs="javascript:history.back();" class="roll-nav roll-right J_tabBack" style="right: 120px;"><i class="fa fa-angle-double-left"></i> 返回</a>
    <a href="javascript:void(0);" class="roll-nav roll-right J_tabReload" style="right: 60px;width: 60px;background: #fff;"><i class="fa fa-refresh"></i> 刷新</a>
    <a href="<?php echo url('Admin/logout'); ?>" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a>
</div>
<script src="http://www.testslhl.com/static/admin/js/jquery.min.js"></script>
<script type="text/javascript">
    $('.J_tabReload').click(function(){

        $('.J_iframe:visible').attr('src', $('.J_iframe:visible').attr('src'));
    })
</script>
        <!-- 导航栏结束 -->

        <!-- 主题部分 -->
        <div class="row J_mainContent" id="content-main">
            <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="<?php echo url('Index/main'); ?>" frameborder="0" data-id="index/main" seamless></iframe>
        </div>

        <!-- 底部开始 -->
        <div class="footermain">
    <div class="footer_box">
        <div class="copy"> <?php echo getSetting('system.copyright'); ?> <?php echo getSetting('system.records'); ?></div>
    </div>
</div>

<script src="http://www.testslhl.com/static/admin/js/jquery.min.js" tppabs="http://www.testslhl.com/static/admin/js/jquery.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/bootstrap.min.js" tppabs="http://www.testslhl.com/static/admin/js/bootstrap.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/plugins/metisMenu/jquery.metisMenu.js" tppabs="http://www.testslhl.com/static/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="http://www.testslhl.com/static/admin/js/plugins/slimscroll/jquery.slimscroll.min.js" tppabs="http://www.testslhl.com/static/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/plugins/layer/layer.min.js" tppabs="http://www.testslhl.com/static/admin/js/plugins/layer/layer.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/hplus.min.js" tppabs="http://www.testslhl.com/static/admin/js/hplus.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/contabs.min.js" tppabs="http://www.testslhl.com/static/admin/js/contabs.min.js"></script>
<script src="http://www.testslhl.com/static/admin/js/plugins/pace/pace.min.js" tppabs="http://www.testslhl.com/static/admin/js/plugins/pace/pace.min.js"></script>
<script type="text/javascript">
	$("a.J_menuItem").click(function(){
        var hf=$(this).attr("href");
        // alert(hf);
        $("iframe.J_iframe[src='" +hf+ "']").attr('src', $("iframe.J_iframe[src='" +hf+ "']").attr('src'));
        // $('body').click();
        //$('.open>.dropdown-menu').hide();
    });
    $(".J_menuTabs").on("click", ".J_menuTab",function(){
        var hf=$(this).attr("data-id");
        $("iframe.J_iframe[src='" +hf+ "']").attr('src', $("iframe.J_iframe[src='" +hf+ "']").attr('src'));
    })

</script>
        <!-- 底部结束 -->

    </div>
    <!--右侧部分结束-->

    <!--右侧边栏开始-->
    <div id="right-sidebar">
    <div class="sidebar-container">
        <div class="tab-content">
            <div id="tab-1" class="tab-pane active">
                <div class="sidebar-title">
                    <h3><i class="fa fa-comments-o"></i> 主题设置</h3>
                    <small><i class="fa fa-tim"></i> 你可以从这里选择和预览主题的布局和样式，这些设置会被保存在本地，下次打开的时候会直接应用这些设置。</small>
                </div>
                <div class="skin-setttings">
                    <div class="title">主题设置</div>
                    <div class="setings-item">
                        <span>收起左侧菜单</span>
                        <div class="switch">
                            <div class="onoffswitch">
                                <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="collapsemenu">
                                <label class="onoffswitch-label" for="collapsemenu">
                                    <span class="onoffswitch-inner"></span> <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="setings-item">
                        <span>固定顶部</span>

                        <div class="switch">
                            <div class="onoffswitch">
                                <input type="checkbox" name="fixednavbar" class="onoffswitch-checkbox" id="fixednavbar">
                                <label class="onoffswitch-label" for="fixednavbar">
                                    <span class="onoffswitch-inner"></span> <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="setings-item">
                            <span>
                    固定宽度
                </span>

                        <div class="switch">
                            <div class="onoffswitch">
                                <input type="checkbox" name="boxedlayout" class="onoffswitch-checkbox" id="boxedlayout">
                                <label class="onoffswitch-label" for="boxedlayout">
                                    <span class="onoffswitch-inner"></span> <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="title">皮肤选择</div>
                    <div class="setings-item default-skin nb">
                            <span class="skin-name ">
                     <a href="#" class="s-skin-0">
                         默认皮肤
                     </a>
                </span>
                    </div>
                    <div class="setings-item blue-skin nb">
                            <span class="skin-name ">
                    <a href="#" class="s-skin-1">
                        蓝色主题
                    </a>
                </span>
                    </div>
                    <div class="setings-item yellow-skin nb">
                            <span class="skin-name ">
                    <a href="#" class="s-skin-3">
                        黄色/紫色主题
                    </a>
                </span>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
</div>
    <!--右侧边栏结束-->

</div>

</body>

</html>

