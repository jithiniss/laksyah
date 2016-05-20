// JavaScript Document
$(window).scroll(function () {
        "use strict";
        var c_scrollTop = $(window).scrollTop();
        if (c_scrollTop > 700) {
                $('.backto_top').fadeIn();
        } else {
                $('.backto_top').fadeOut();
        }
        //// Cart Scrolling
        if ($('.fixed_scroller').length) {
                var documentWidth = $(window).width();
                if (documentWidth > 992) {
                        var fixed_top = $('.fixed_scroller').offset().top;
                        var fixed_bottom = $('.fixed_scroller').outerHeight(true) + fixed_top;
                        var element_height = $('.fixed_scroller').outerHeight();

                        var normal_top = $('.related_element').offset().top;
                        var normal_bottom = $('.related_element').outerHeight(true) + normal_top;
                        var normal_height = $('.related_element').outerHeight(true);
                        if (normal_bottom < fixed_bottom)
                        {
                                $('.fixed_scroller').css({'position': 'absolute', 'top': (normal_height - element_height)});
                        }
                        if ((c_scrollTop > (normal_top - 20)) && (normal_bottom > fixed_bottom)) {
                                $('.fixed_scroller').css({'position': 'fixed', 'top': 20});

                        }
                        if (c_scrollTop < (normal_top)) {
                                $('.fixed_scroller').css({'position': 'static', 'top': 20});
                        }
                } else {
                        $('.fixed_scroller').css({'position': 'static', 'top': 20});
                }
        }
        ////------------------------------------

});
$(document).ready(function () {
        "use strict";
        //Top Drop Down
        //-----------------------------
        $('.has_dropdown').hover(function () {
                $(this).find('.laksyah_dropdown').fadeIn(500);
        }, function () {
                $(this).find('.laksyah_dropdown').fadeOut(10);
                $(this).find('.laksyah_dropdown').removeClass('active');
        }

        );

        ////////////////////////////////////////////////////

        if ($('.laksyah_dropdown').hasClass('active')) {
                $('.laksyah_dropdown').click(function (e) { //button click class name is myDiv
                        e.stopPropagation();
                });

                $(function () {
                        $(document).click(function () {
                                $('.laksyah_dropdown').hide(); //hide the button

                        });
                });
        }

        ////////////////////////////////////////////////////

        $('.currency_drop a').click(function (e) {
                e.preventDefault();
                $('.currency_drop li').removeClass('active');
                $(this).parent('li').addClass('active');
                var selectedCurrency = $(this).html();
                $('.active_currency').html(selectedCurrency + ' <i class="fa fa-angle-down"></i>');
        });
        //--------------------------------------------------
        // Sidebar Menu
        $('.catmenu > li > a').click(function (e) {
                e.preventDefault();
                $(this).siblings('ul').slideToggle();
                $(this).parent('li').toggleClass('open');
                $(this).children('i').toggleClass('fa-angle-down');
                $(this).children('i').toggleClass('fa-angle-up');
        });
        /////
        // Size Selector
        $('.size_selector label').click(function () {
                $('.size_selector label').removeClass('active');
                $(this).addClass('active');
        });
        ///
        //Popup
        $('.close_popup').click(function () {
                $('.popup').hide();
                $('.overlay').fadeOut();
        });
        ////
        // Gift
        $('.open_popup').click(function (e) {
                $('.popup').show();
                $('.overlay').fadeIn();
        });
        // mobile search
        $('.mobile_search_btn').click(function (e) {
                e.preventDefault();
                $('.searc_box_mobile').slideToggle(200);
        });
        //--------------
        if ($('.laksyah_slider').length) {
                $('.laksyah_slider').slick();
        }
        /////
        //Videos
        if ($('.laksyah_video').length) {
                $(".laksyah_video").fancybox({
                        maxWidth: 800,
                        maxHeight: 600,
                        fitToView: false,
                        width: '70%',
                        height: '70%',
                        autoSize: false,
                        closeClick: false,
                        openEffect: 'none',
                        closeEffect: 'none'
                });
        }
        ///////
        if ($('.related_list_slider').length) {
                $('.related_list_slider').slick({
                        speed: 300,
                        slidesToShow: 6,
                        slidesToScroll: 1,
                        responsive: [
                                {
                                        breakpoint: 1024,
                                        settings: {
                                                slidesToShow: 4,
                                                slidesToScroll: 1,
                                        }
                                },
                                {
                                        breakpoint: 600,
                                        settings: {
                                                slidesToShow: 3,
                                                slidesToScroll: 2
                                        }
                                },
                                {
                                        breakpoint: 480,
                                        settings: {
                                                slidesToShow: 2,
                                                slidesToScroll: 1
                                        }
                                }
                                // You can unslick at a given breakpoint now by adding:
                                // settings: "unslick"
                                // instead of a settings object
                        ]
                });
        }

        // Custom Radio
        $('.radio_group').click(function () {
                $('.radio_group').removeClass('active');
                $(this).addClass('active');
                $(this).find('input').attr('checked', true);
        });
        // Custom Check
        $('.custom_check').click(function () {
                if ($(this).find('input').attr('checked')) {
                        $('.custom_check').removeClass('true');
                        $(this).find('input').attr('checked', false);
                } else {
                        $(this).addClass('true');
                        $(this).find('input').attr('checked', 'true');
                }
        });
        /////////////////////////////
        ////////////////////////////////////////////
        var c_scrollTop = $(window).scrollTop();
        if (c_scrollTop > 700) {
                $('.backto_top').fadeIn();
        } else {
                $('.backto_top').fadeOut();
        }
        //// Cart Scrolling
        if ($('.fixed_scroller').length) {
                var documentWidth = $(window).width();
                if (documentWidth > 992) {
                        var fixed_top = $('.fixed_scroller').offset().top;
                        var fixed_bottom = $('.fixed_scroller').outerHeight(true) + fixed_top;
                        var element_height = $('.fixed_scroller').outerHeight();

                        var normal_top = $('.related_element').offset().top;
                        var normal_bottom = $('.related_element').outerHeight(true) + normal_top;
                        var normal_height = $('.related_element').outerHeight(true);
                        if (normal_bottom < fixed_bottom)
                        {
                                $('.fixed_scroller').css({'position': 'absolute', 'top': (normal_height - element_height)});
                        }
                        if ((c_scrollTop > (normal_top - 20)) && (normal_bottom > fixed_bottom)) {
                                $('.fixed_scroller').css({'position': 'fixed', 'top': 20});

                        }
                        if (c_scrollTop < (normal_top)) {
                                $('.fixed_scroller').css({'position': 'static', 'top': 20});
                        }
                } else {
                        $('.fixed_scroller').css({'position': 'static', 'top': 20});
                }
        }

        ////


});
// Range Slider
///----------------------
$(function () {
        $("#slider-range").slider({
                range: true,
                min: 100,
                max: 50000,
                values: [10000, 25000],
                slide: function (event, ui) {
                        $("#amount").val("$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ]);
                        $(".min_value").html("<i class='fa fa-rupee'></i> " + ui.values[ 0 ]);
                        $(".max_value").html("<i class='fa fa-rupee'></i> " + ui.values[ 1 ]);
                }
        });
        $("#amount").val("$" + $("#slider-range").slider("values", 0) +
                " - $" + $("#slider-range").slider("values", 1));
        $(".min_value").html("<i class='fa fa-rupee'></i> " + $("#slider-range").slider("values", 0));
        $(".max_value").html("<i class='fa fa-rupee'></i> " + $("#slider-range").slider("values", 1));
});

//// Zoom
if ($('#laksyah_zoom').length) {
        $('#laksyah_zoom').elevateZoom({
                gallery: 'gal1', cursor: 'pointer', galleryActiveClass: 'active', imageCrossfade: true,
        });

        $("#laksyah_zoom").bind("click", function (e) {
                var ez = $('#laksyah_zoom').data('elevateZoom');
                $.fancybox(ez.getGalleryList());
                return false;
        });
}