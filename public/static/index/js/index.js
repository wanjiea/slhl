$('.index_banner').slick({
    autoplay: true,
    arrows: false,
    dots: false,
    infinite: true,
    speed: 500,
    autoplaySpeed: 5000,
    pauseOnHover: false,
    fade: true,
    responsive: [{breakpoint: 992, settings: {dots: true}}]
});
$('.index_banner').init(function (slick) {
    $('.index_banner .item.slick-current').addClass('active').siblings().removeClass('active')
})
$('.index_banner').on('afterChange', function (slick, currentSlide) {
    $('.index_banner .item.slick-current').addClass('active').siblings().removeClass('active');
    var _index = $('.index_banner').slick('slickCurrentSlide')
    $('.section1 .number span').eq(_index).addClass('active').siblings().removeClass('active')
})
$('.section1 .number span').click(function () {
    var _index = $(this).index();
    $('.index_banner').slick('slickGoTo', _index);
    $(this).addClass("active").siblings().removeClass("active")
});
$('.section1 .prev').click(function () {
    $('.index_banner').slick('slickPrev')
})
$('.section1 .next').click(function () {
    $('.index_banner').slick('slickNext');
});
var nav = $("header");
var win = $(window);
var sc = $(document);
win.scroll(function () {
    if (sc.scrollTop() >= 100) {
        nav.addClass("on");
    } else {
        nav.removeClass("on");
    }
})
$('#navToggle').on('click', function () {
    console.log("okko")
    $(".m_nav").css("opacity","1")
    $('.m_nav').addClass('open');
})
$('.m_nav .top .closed').on('click', function () {
    $(".m_nav").css("opacity","0")
    $('.m_nav').removeClass('open');
})
$(".m_nav .ul li").click(function () {
    $(this).children("div.dropdown_menu").slideToggle('slow')
    $(this).siblings('li').children('.dropdown_menu').slideUp('slow');
});
$('#index_main').fullpage({
    'navigation': true,
    slidesNavigation: true,
    controlArrows: false,
    continuousHorizontal: true,
    scrollingSpeed: 1000,
    showActiveTooltip: true,
    anchors: ['hero', 'one', 'two', 'three','lastScreen'],
    loopHorizontal: true,
    // afterLoad(anchorLink, index) {
    //     if (index == 5) {
    //         // 当页面滚动到倒数第二屏时，改变页面滚动方式
    //         $.fn.fullpage.setAutoScrolling(false);
    //         // 记录页面开始滚动的位置
    //         let start = $(document).scrollTop();
    //         let last = 0;
    //         $(document).scroll(function () {
    //             // 获得页面实时滚动的位置
    //             let end = $(document).scrollTop();
    //             // 如滚动的位置小于0，则代表页面在倒数第二屏向上滚，这个时候再改变页面的滚动方式
    //             if (end - start < 0) {
    //                 $.fn.fullpage.setAutoScrolling(true);
    //             }
    //         })
    //
    //     }
    // }

    afterLoad: function (anchorLink, index) {
       if (index == 1) {
           var video = document.getElementById("startvideo");
           video.play();
        }
        if (index == 4) {
            console.log(12)
            var video = document.getElementById("startvideo2");
            video.play();
         }
        // if (index == 1) {
        //     $('header').removeClass('on');
        // }
        // if (index == 2) {
        //     $('header').addClass('on');
        //     $('.section2 h3').addClass('animated fadeInUp').css('animation-delay', '.1s');
        // }
        // if (index == 3) {
        //     $('header').addClass('on');
        //     $('.section3 h3').addClass('animated fadeInUp').css('animation-delay', '.1s');
        // }
        // if (index == 4) {
        //     $('header').addClass('on');
        //     $('.section4 h3').addClass('animated fadeInUp').css('animation-delay', '.1s');
        // }
    },
    // onLeave: function (index, direction) {
    // }
})