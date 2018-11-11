$(document).ready(function () {
    $(".banner-slide").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        fade: false,
        autoplay: true,
        infinite: true,
    });

    AOS.init({
        once: true,
        offset: 0,
        easing: 'ease-in-out-cubic',
        duration: "300",
    });

    if ($(this).scrollTop() >= 42) {
        $(".header-nav").addClass("scrolled");
    } else {
        $(".header-nav").removeClass("scrolled");
    }
    $(window).on("load", function () {
        if ($(this).scrollTop() >= 42) {
            $(".header-nav").addClass("scrolled");


        } else {
            $(".header-nav").removeClass("scrolled");

        }
    });
    $(document).scroll(function () {
        if ($(this).scrollTop() >= $("#main").offset().top) {
            $(".back-top").addClass("active");
            //            $(".banner-mouse").addClass("deactive");

        } else {
            $(".back-top").removeClass("active");
            //            $(".banner-mouse").removeClass("deactive");

        }
        if ($(this).scrollTop() >= 42) {
            $("#header").addClass("scrolled");


        } else {
            $("#header").removeClass("scrolled");

        }
    });

    //    $(".banner-mouse").click(function () {
    //        $("html, body").animate({
    //            scrollTop: $("#main").offset().top
    //        }, 1000);
    //    })

    $(".back-top").on("click", function () {
        $(".back-top").removeClass("active");
        $("html, body").animate({
            scrollTop: 0
        }, 1000);
    });
});
