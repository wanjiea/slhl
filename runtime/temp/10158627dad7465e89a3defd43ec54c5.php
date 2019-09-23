<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:83:"E:\phpstudy8\phpstudy_pro\WWW\slhl\public/../application/index\view\join\index.html";i:1568863877;s:72:"E:\phpstudy8\phpstudy_pro\WWW\slhl\application\index\view\Base\base.html";i:1568864073;s:71:"E:\phpstudy8\phpstudy_pro\WWW\slhl\application\index\view\Base\fot.html";i:1568859134;}*/ ?>
<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>首页</title>
    <link rel="stylesheet" type="text/css" href="/static/index/css/swiper.min.css" />
    <link rel="stylesheet" href="/static/index/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/static/index/css/jquery.fullpage.css" />
    <link rel="stylesheet" href="/static/index/css/common.css">
    <link rel="stylesheet" href="/static/index/css/style.css" />
    <link rel="stylesheet" href="/static/index/css/index.css" />
    <link rel="stylesheet" href="/static/index/css/media.css" />
    <!-- <link rel="stylesheet" href="/static/index/css/animate-tool.css" /> -->




</head>
<body>

<header class="header">
    <div class="container clearfix">
        <div class="fl left">
            <a href="javascript:void(0)"><img src="/static/index/images/nav_logo.png" alt="" class="img1" /></a>

        </div>
        <div class="fr nav">
            <ul class="navbar_nav" data-in="fadeInDown" data-out="fadeOutUp">
                <li class="active">
                    <a href="/index/Index.html">首页</a>
                </li>
                <li>
                    <a href="/product/index.html">
                        产品介绍
                    </a>

                </li>
                <li>
                    <a href="/News/index.html">新闻资讯</a>
                </li>
                <li class="dropdown">
                    <a href="/join/index.html">代理加盟</a>
                    <div class="dropdown_menu">
                        <a href="/join/income.html">投资者收益</a>

                    </div>
                </li>
                <li>
                    <a href="javascript:void (0);">加入我们</a>
                </li>
            </ul>
        </div>
        <a href="javascript:void(0)" id="navToggle">
            <span></span>
        </a>
    </div>
</header>
<div class="m_nav visible-xs" style="opacity:0">
    <div class="top clearfix">
        <img src="/static/index/images/closed.png" alt="" class="closed" />
    </div>
    <div class="logo">
        <img src="/static/index/images/nav_logo.png" alt="" />
    </div>
    <ul class="ul" data-in="fadeInDown" data-out="fadeOutUp">
        <li class="active">
            <a href="Index.html">首页</a>
        </li>
        <li class="dropdown">
            <a href="product.html">
                产品介绍
            </a>
        </li>
        <li class="dropdown">
            <a href="News.html">新闻资讯</a>

        </li>
        <li>
            <a href="joinus.html">代理加盟</a>
            <div class="dropdown_menu">
                <a href="InvestorReturns.html">投资者收益</a>

            </div>
        </li>
        <li>
            <a href="javascript:void (0);">加入我们</a>
        </li>
    </ul>
</div>


<div id="joins" class="joins">
    <div class="joins_header">
        <div class="joins_header_advice" id="index_advice_title">
            <h3>深蓝互联·未来已来</h3>
            <h2>桌面广告招商加盟中</h2>
            <p>Desktop Advertising Business Invitation</p>
            <a href="javascript:void (0);">立即加入</a>
        </div>
    </div>
    <div class="Businessinfo" id="showDiv">
        <div class="container">
            <div class="joins_two_title">
                <h3>我们的优势</h3>
                <p>Our Advantages</p>
            </div>

            <div class="Advantages_msg clearfix">
                <!-- <div class="msg_header clearfix">
                    <p class="msg_content">杭州深蓝互联拥有强大的研发实力和人才优势，拥有一支多年从事于服务互联网软件研发的团队，积累了相当丰厚的
                        产品技术研发基础，使得公司在新产品、新技术开发等方面具有很强的竞争优势。</p>
                </div>
                <div class="msg_item">
                    <img src="/static/index/images/Advantages_icon1.png" height="74" width="74" alt="">
                    <h3> 具备优秀的人才储备 </h3>
                </div>
                <div class="msg_item">
                    <img src="/static/index/images/Advantages_icon2.png" height="72" width="86" alt="">
                    <h3>顺应公司发展战略</h3>
                </div>
                <div class="msg_item">
                    <img src="/static/index/images/Advantages_icon3.png" height="67" width="42" alt="">
                    <h3>项目投资的抗风险能力较强 </h3>
                </div> -->
                <div class="msg_item" style="width: 34.3%;">
                    <div class="msg_header clearfix">
                        <p class="msg_content">杭州深蓝互联拥有强大的研发实力和人才优势，拥有一支多年从事于服务互联网软件研发的团队，积累了相当丰厚的
                            产品技术研发基础，使得公司在新产品、新技术开发等方面具有很强的竞争优势。</p>
                    </div>
                    <div class="Ad_item" style="display: none">
                        <img src="/static/index/images/Advantages_icon1.png" height="74" width="74" alt="">
                        <h3> 具备优秀的人才储备 </h3>
                    </div>
                </div>
                <div class="msg_item">
                    <div class="msg_header clearfix" style="display: none">
                        <p class="msg_content">杭州深蓝互联拥有强大的研发实力和人才优势，拥有一支多年从事于服务互联网软件研发的团队，积累了相当丰厚的
                            产品技术研发基础，使得公司在新产品、新技术开发等方面具有很强的竞争优势。</p>
                    </div>
                    <div class="Ad_item">
                        <img src="/static/index/images/Advantages_icon1.png" height="74" width="74" alt="">
                        <h3> 具备优秀的人才储备 </h3>
                    </div>
                </div>
                <div class="msg_item">
                    <div class="msg_header clearfix" style="display: none">
                        <p class="msg_content">杭州深蓝互联拥有强大的研发实力和人才优势，拥有一支多年从事于服务互联网软件研发的团队，积累了相当丰厚的
                            产品技术研发基础，使得公司在新产品、新技术开发等方面具有很强的竞争优势。</p>
                    </div>
                    <div class="Ad_item">
                        <img src="/static/index/images/Advantages_icon2.png" height="72" width="86" alt="">
                        <h3>顺应公司发展战略</h3>
                    </div>
                </div>
                <div class="msg_item">
                    <div class="msg_header clearfix" style="display: none">
                        <p class="msg_content">杭州深蓝互联拥有强大的研发实力和人才优势，拥有一支多年从事于服务互联网软件研发的团队，积累了相当丰厚的
                            产品技术研发基础，使得公司在新产品、新技术开发等方面具有很强的竞争优势。</p>
                    </div>
                    <div class="Ad_item">
                        <img src="/static/index/images/Advantages_icon3.png" height="67" width="42" alt="">
                        <h3>项目投资的抗风险能力较强 </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="Businessinfo">
        <div class="container">
            <div id="showDiv1">
                <div class="joins_two_title">
                    <h3>收益预估及分配</h3>
                    <p>Revenue Estimation and Distribution</p>
                </div>
                <div class="Revenue_header ">
                    <div class="Revenue_header_item">
                        <img class="img1" src="/static/index/images/electricity.png" height="80" width="80" alt="">
                        <p>充电费</p>
                    </div>
                    <div class="Revenue_header_item">
                        <img src="/static/index/images/advertising.png" height="79" width="83" alt="">
                        <p>霸屏费</p>
                    </div>
                </div>
            </div>
            <div id="showDiv4">
                <div class="Revenue_content">
                    <div class="Revenue_content_header clearfix">
                        <p>收益</p>
                        <p>单价</p>
                        <p>利润分配</p>
                        <p>预期单日量</p>
                        <p>日收益</p>
                        <p style="border:0">年收益</p>
                    </div>
                    <div class="Revenue_content_header advertising_msg clearfix">
                        <p>霸屏收益</p>
                        <p>3-5元/分钟</p>
                        <p>100%</p>
                        <p>10分钟</p>
                        <p>30元</p>
                        <p style="border:0">10950元</p>
                    </div>
                    <div class="Revenue_content_header addline clearfix">
                        <p>充电收益</p>
                        <p>2元/次</p>
                        <p>100%</p>
                        <p>6次</p>
                        <p>12元</p>
                        <p style="border:0">4380元</p>
                    </div>
                    <div class="Revenue_content_header clearfix">
                        <p>总计</p>
                        <p>-</p>
                        <p>-</p>
                        <p>-</p>
                        <p>42元</p>
                        <p style="border:0">15330元</p>
                    </div>
                </div>
                <h5 class="Revenue_content_foot">充电和霸屏收益全部分配给投资者和市场</h5>
            </div>
        </div>
    </div>

    <div class="Businessinfo" id="showDiv2">
        <div class="container">
            <div class="joins_two_title">
                <h3>招商流程</h3>
                <p>Business invitation process</p>
            </div>
            <div class="Business_content">
                <div class="Business_content_item">
                    <div class="itemimg">
                        <img src="/static/index/images/shenqing.png" alt="">
                        <div class="content_line"></div>
                    </div>
                    <h6>第一步</h6>
                    <p>提交申请</p>
                </div>
                <div class="Business_content_item">
                    <div class="itemimg" style="position: relative">
                        <img src="/static/index/images/cellphone.png" alt="">
                        <div class="content_line"></div>
                    </div>
                    <h6>第二步</h6>
                    <p>电话商谈</p>
                </div>
                <div class="Business_content_item">
                    <div class="itemimg">
                        <img src="/static/index/images/meet.png" alt="">
                        <div class="content_line"></div>
                    </div>
                    <h6>第三步</h6>
                    <p>见面详谈</p>
                </div>
                <div class="Business_content_item">
                    <div class="itemimg">
                        <img src="/static/index/images/contract.png" alt="">
                    </div>
                    <h6>第四步</h6>
                    <p>签署合同</p>
                </div>
            </div>
        </div>
    </div>

    <div class="Businessinfo" id="showDiv3">
        <div class="container">
            <div class="joins_two_title">
                <h3>联系我们</h3>
                <p>contact us</p>
            </div>
            <div class="contact_content">
                <div class="contact_content_left">
                    <div class="contact_content_left_one">
                        <div class="contact_content_left_one_erweima">
                            <img src="/static/index/images/Qr_code.png" alt="">
                        </div>
                        <p>扫描二维码关注公众号</p>
                    </div>
                    <div class="contact_content_left_msg">
                        <img src="/static/index/images/phone.png" height="30" width="30" alt="">
                        <p>招商电话：400-888-8888</p>
                    </div>
                    <div class="contact_content_left_msg">
                        <img src="/static/index/images/address.png" height="35" width="27" alt="">
                        <p>联系地址：浙江省杭州市西湖区</p>
                    </div>
                </div>
                <div class="contact_content_right">
                    <input type="text" placeholder="请输入您的名字">
                    <input type="text" placeholder="请输入您的手机号码">
                    <input type="text" placeholder="请输入您的省份">
                    <p>申请招商入驻</p>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="food_content food_hide section section6">
    <div class="container">
        <div class="food_content_nav">
            <ul>
                <li><a class="foot_title" href="">深蓝互联</a> </li>
                <li><a href="">公司简介</a> </li>
            </ul>
            <ul>
                <li><a class="foot_title" href="">代理加盟</a> </li>
                <li><a href="">成功案例</a> </li>
                <li><a href="">申请代理</a> </li>
                <li><a href="">申请进度</a> </li>
            </ul>
            <ul>
                <li><a class="foot_title" href="">联系我们</a> </li>
                <li><a href="">联系方式</a> </li>
            </ul>
        </div>
        <div class="foot_content_meass">
            <div><img src="/static/index/images/foot_icon01.png" /></div>
            <div> <img src="/static/index/images/foot_icon02.png" /></div>
        </div>
    </div>
</div>


<script src="/static/index/js/jquery.min.js"></script>
<script src="/static/index/js/bootstrap.min.js"></script>
<script src="/static/index/js/jquery.fullpage.min.js"></script>
<script src="/static/index/js/index_slick.js"></script>
<script src="/static/index/js/swiper.min.js"></script>
<script src="/static/index/js/index.js"></script>

</body>


</html>

<script>
    $(document).ready(function () {
        $('.itemimg img').hover(function () {
            var _index = $(this).index();
            if (!$(this).hasClass('active')) {
                $(this).addClass('active');
            } else {
                $(this).removeClass('active');
            }
        });

        var selectindex = 0

        $('.msg_item').hover(function () {
            var _index = $(this).index();
            console.log(selectindex)
            if (selectindex != _index) {
                var item3 = $(".msg_item .msg_header").eq(selectindex)
                var item4 = $(".msg_item .Ad_item").eq(selectindex)
                console.log(item3, item4)

                actionOut(item3, 'action_rotateYOut', 0.3, "");
                setTimeout(function () {
                    $(".msg_item").eq(selectindex).css("width", "21.9%")
                    actionIn(item4, 'action_rotateY', 0.3, "linear");
                }, 300)


                var item = $(".msg_item .msg_header").eq(_index)
                var item2 = $(".msg_item .Ad_item").eq(_index)

                console.log(_index, item, item2, selectindex)
                actionOut(item2, 'action_rotateYOut', 0.3, "");
                setTimeout(function () {
                    $(".msg_item").eq(_index).css("width", "34.3%")
                    selectindex = _index
                    actionIn(item, 'action_rotateY', 0.3, "linear");
                }, 300)
            }
        })
        var boo = 0;
        var canUse = document.getElementsByTagName("body")[0].style;
        if (typeof canUse.animation != "undefined" || typeof canUse.WebkitAnimation != "undefined") {
            console.log(1)
            boo = 1;/*支持动画*/
        } else {
            console.log(2)
            boo = 0;/*不支持动画*/
        }
        actionIn("#index_advice_title", 'index_advice_title', 1.5, "");
        function actionIn(obj, actionName, time, speed) {
            $(obj).show();
            if (boo == 1) $(obj).css({ "animation": actionName + " " + time + "s" + " " + speed, "animation-fill-mode": "forwards" });
        }
        function actionOut(obj, actionName, time, speed) {
            if (boo == 1) {
                $(obj).css({ "animation": actionName + " " + time + "s" + " " + speed });
                var setInt_obj = setInterval(function () {
                    $(obj).hide();
                    clearInterval(setInt_obj);
                }, time * 1000);
            } else $(obj).hide();
        }
    });
    function showDiv() {
        var showId = document.getElementById('showDiv');
        var clients = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
        var divTop = showId.getBoundingClientRect().top;
        if (divTop <= clients) {

            showId.classList.add('action_scale');
        }
        var showId1 = document.getElementById('showDiv1');
        var clients1 = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
        var divTop1 = showId1.getBoundingClientRect().top;
        if (divTop1 <= clients1) {

            showId1.classList.add('action_scale');
        }
        var showId2 = document.getElementById('showDiv2');
        var clients2 = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
        var divTop2 = showId2.getBoundingClientRect().top;
        if (divTop2 <= clients2) {

            showId2.classList.add('action_scale');
        }
        var showId3 = document.getElementById('showDiv3');
        var clients3 = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
        var divTop3 = showId3.getBoundingClientRect().top;
        if (divTop3 <= clients3) {

            showId3.classList.add('action_scale');
        }
        var showId4 = document.getElementById('showDiv4');
        var clients4 = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
        var divTop4 = showId4.getBoundingClientRect().top;
        if (divTop4 <= clients4) {

            showId4.classList.add('action_scale');
        }
    }
    window.onscroll = showDiv;

</script>
<style>
    .active {
        transform: scale(1.2);
    }

    @keyframes index_advice_title {
        0% {
            transform: translateY(100px);
            opacity: 0;
        }

        100% {
            transform: translateY(0px);
            opacity: 1;
        }
    }

    @-webkit-keyframes action_scale {
        0% {
            transform: translateY(250px);
            opacity: 0;
        }

        100% {
            transform: translateY(0px);
            opacity: 1;
        }
    }

    .action_scale {
        animation-name: action_scale;
        -webkit-animation-name: action_scale;
        animation-duration: 2s;
        -webkit-animation-duration: 2s;
    }

    .joins .Businessinfo .Advantages_msg .msg_item .msg_header {
        width: 100%;
        background: linear-gradient(0deg, rgba(0, 63, 192, 1), rgba(61, 158, 230, 1));
        box-shadow: 0 0 12px rgba(0, 63, 192, 1);
        padding: 28px;
    }

    .joins .Businessinfo .Advantages_msg .msg_item .msg_header .msg_content {
        font-size: 18px;
        font-family: Microsoft YaHei;
        font-weight: 400;
        color: rgba(255, 255, 255, 1);
        line-height: 28px;

    }

    @keyframes action_rotateYOut {
        0% {
            transform: rotateY(0deg);
            opacity: 1;
        }

        100% {
            transform: rotateY(-90deg);
            opacity: 0;
        }
    }

    @keyframes action_rotateY {
        0% {
            transform: rotateY(-90deg);
            opacity: 0;
        }

        100% {
            transform: rotateY(0deg);
            opacity: 1;
        }
    }
</style>

