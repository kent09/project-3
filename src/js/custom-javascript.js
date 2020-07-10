jQuery(document).ready(function($){
    var window_width = $(window).width();
    show_hide_menu(window_width);
    var page_banner = $('.page_banner');
    var btn = $('#mealplan_back_top');
    var size_to_compare = 600;

    if($('.sam-wood-banner').length > 0){
        size_to_compare = 750;
    }

    if(page_banner.length > 0){
        change_banner(page_banner,window_width, size_to_compare);
    }

    if($('.with_back_top').length > 0 ){
        show_backto_top(window_width);
    }

    var resizeTimer;
    $(window).on('resize', function() {
        window_width = $(window).width();

        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {

            if(page_banner.length > 0) {
                change_banner(page_banner,window_width, size_to_compare);
            }

            var $owl_home = $('.home-slider .owl-carousel');
            if($owl_home.length > 0) {
                var active = $owl.find(".owl-item.active .item");
                change_banner(active,window_width, 620);
            }

            show_hide_menu(window_width);
            adjustPosition(window_width);

            if($('.with_back_top').length > 0 ){
                show_backto_top(window_width);
            }

            var active_image  = $('.m_image.visible').parents('.meal_image');
            if(active_image.length > 0){
                adjustTooltipImage(active_image);
            }

        }, 250);

    });

    $('.navbar-toggler').on('click', function(){
        var expanded = $(this).attr('aria-expanded');
        var win = $(window);
        var home_slider = $('.home-slider');
        var page_banner = $('.page_banner');
        var navbar = $('#wrapper-navbar');

        if(win.scrollTop() == 0){
            if(expanded == 'false'){
                home_slider.addClass('mt-0');
                page_banner.addClass('mt-0');
                if( navbar.hasClass('fixed-top')){
                    navbar.removeClass('fixed-top');
                }
            } else {
                if(!navbar.hasClass('fixed-top')){
                    navbar.addClass('fixed-top');
                }

               home_slider.removeClass('mt-0');
               page_banner.removeClass('mt-0');
            }
        } else {
            if(!navbar.hasClass('fixed-top')){
                navbar.addClass('fixed-top');
            }
        }

    });

    if($('.testimonial_contents').length > 0) {
        $('.testimonial_contents .owl-carousel, .testimonials .owl-carousel').owlCarousel({
            margin: 10,
            nav : true,
            dots: true,
            loop: false,
            responsiveClass:true,
            navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        });
    }

    if($('.testimonial').length > 0) {
        $('.testimonial .owl-carousel').owlCarousel({
            margin: 30,
            nav : true,
            dots: true,
            loop: false,
            navText:['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        });
    }

    if($('.order-page .meal-holder').length > 0) {
        $('.order-page .meal-holder .owl-carousel').owlCarousel({
            margin: 30,
            nav : false,
            dots: true,
            loop: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        });
    }

    if($('.home-slider .owl-carousel').length > 0) {
        var $owl = $('.home-slider .owl-carousel');

        $owl.on('changed.owl.carousel', function(event){
            var active = $owl.find(".owl-item.active .item");
            change_banner(active,window_width, 620);
        });

        $owl.owlCarousel({
            dots: false,
            loop: false,
            nav : true,
            // navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
            items: 1
        });
    }

    if($('.mobile .owl-carousel').length > 0) {
        $('.mobile .owl-carousel').owlCarousel({
            nav : false,
            dots: true,
            loop: false,
            items: 1
        });   
    }

    $('.view_all_meals').on('click', function(e){
        e.preventDefault();
        var selected  = $('input.meal_select:checkbox:checked');

        if(selected.length > 0){
            selected.each(function () {
                $(this).trigger('click');
            });
        }

        $('.mealplan_contents').show();

        scrollMealPlan($('.mealplan_contents:visible'), 120);

    });


    $('.img_heading_wrap').on('click',function(e){
        e.preventDefault();
        $(this).siblings('input.meal_select').trigger('click');

    });

    $('.meal_select').on('click',function(e){
        var selected  = $('input.meal_select:checkbox:checked');

        if(!$(this).is(':checked')){
            $(this).parents('.select_meal_opt').removeClass('selected');
            $(this).parents('.figure').removeClass('selected');
        }

        if(selected.length > 0){
            $('.mealplan_contents').hide();
            $('.meals').hide();
            selected.each(function () {
                var id = $(this).data('id');
                $('.meals.'+id).show();
                $('.meals.'+id).parents('.mealplan_contents').show();
                $(this).parents('.select_meal_opt').addClass('selected');
            });
        } else {
            $('.mealplan_contents').show();
            $('.meals').show();
        }

        scrollMealPlan($('.mealplan_contents:visible'), 120);

    });

    if(typeof filter != 'undefined' && filter != ""){
        //filter script
        $('.meal_select[data-id="'+filter+'"]').trigger('click');
    }

    $(document).on("keyup", 'li.full textarea', function(){
        var max = 500;
        var len = $(this).val().length;
        var char = max - len;
        $('#text_counter span').text(len + ' / ' + max);
    });

    $('span.socialshow').click(function(e) {
        jQuery(this).next().toggle();
    });

    $('.menu-item-has-children > a').on('click',function(e){
       $(this).loadURL();
    });

    var adjustPosition = function(window_width) {
        if(window_width < 768){
            var expanded = $('.navbar-toggler').attr('aria-expanded');
            if(expanded == 'true'){
                $('.navbar-toggler').trigger('click');
            }

            $('.navbar#main_nav').removeClass('fixed-top');
            $('#wrapper-navbar').addClass('fixed-top');
        } else {
            $('.navbar#main_nav').addClass('fixed-top');
            $('#wrapper-navbar').removeClass('fixed-top');
        }

        /*if (window.pageYOffset >= nav) {
            if(window.pageYOffset == 0){
                navbar.removeClass('fixed-top');
            } else {
                if(!navbar.hasClass('fixed-top')) {
                    navbar.addClass('fixed-top');
                }
            }

        } else {
            navbar.removeClass('fixed-top');
        }*/
    }

    function show_hide_menu(window_width){
        if(window_width >= 992){
            $('.menu_smaller_devices').hide();
            $('.menu_large_devices').show();
            $('.menu_large_devices').attr('id','navbarNavDropdown');
        } else {
            $('.menu_smaller_devices').find('.navbar-collapse').attr('id', 'navbarNavDropdown');
            $('.menu_smaller_devices').removeAttr('style');
            $('.menu_large_devices').hide();
            $('.menu_large_devices').removeAttr('id');
        }

        $(window).scroll(function() {
            adjustPosition($(window).width());
        });

    }

    function change_banner(page_banner, window_width, size_to_compare){
        if(window_width <= size_to_compare){
            var banner = page_banner.data('mobile');
            page_banner.css('background-image', "url("+banner+ ")");
        } else {
            var banner = page_banner.data('full');
            page_banner.css('background-image', "url("+banner+ ")");
        }
    }

    function show_backto_top(window_width){
        var banner = $('.page_banner').outerHeight();
        var timer = $('.timernew').outerHeight();
        var mealplan_selector = $('.mealplan_selector').outerHeight();
        var total_height_ = banner + timer + mealplan_selector;

        $(window).scroll(function() {
            if (window_width <= 767 && $(window).scrollTop() > total_height_) {
                btn.addClass('show');
            } else {
                btn.removeClass('show');
            }
        });
    }

    btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, 600);

        return false;
    });

    $('#slick_container .your-class > div').on('click', function(e) {
        var $this = $(this);
        var clicked = $(e.target);
        if (clicked.is('img.infoicon') == false && clicked.is('i.fa.fa-camera') == false) {
            var $first = $this.parent().children(':first-child');

            //remove first checked input
            $this.parent().find('input[type="radio"]').attr('checked', false);

            if($this.parent().children(':nth-child(2)').is(':visible')) {

                $this.find('input[type="radio"]').attr('checked', true);

                var $html = $this.html();
                var $swap = $this.parent().children(':first-child').html();

                $first.html($html);
                $this.html($swap);
                $this.parent().children().not(":first-child").slideUp();
                $first.removeClass('active');
            } else {
                $this.parent().children().slideDown();
                $first.addClass('active');
            }
        }
    });

    $(document).on('mouseenter','.meal_image', debounce(function (event) {
        var el = $(this);
        var imgEl = el.find('.m_image');
        var img_height = imgEl.outerHeight();
        adjustTooltipImage(el);
        imgEl.addClass('visible').removeClass('hidden');

        if(inViewport(imgEl) <img_height ){
                $('html, body').animate({
                    scrollTop: el.offset().top - (img_height + 100)
                }, 600);
        }

    },500)).on('mouseleave','.meal_image',  debounce(function () {
        $(this).find('.m_image').removeClass('visible').addClass('hidden');
    }, 500));

    $(document).on('mouseenter','.vertmidtext .tooltip', debounce(function (event) {
        var el = $(this);
        var tooltipEl = el.find('.tooltiptext');
        var tooltip_height = tooltipEl.outerHeight();
        el.addClass('highIndex');
        if(inViewport(tooltipEl) < tooltip_height ){
                $('html, body').animate({
                    scrollTop: el.offset().top - (tooltip_height + 100)
                }, 600);
        }

    },500)).on('mouseleave','.vertmidtext .tooltip',  debounce(function (event) {
        $(this).removeClass('highIndex');
    },500));

    function adjustTooltipImage(active_image){
        var icon_pos = active_image.position().left + 14;
        $('<style>span.meal_image .m_image:before,span.meal_image .m_image:after{left:'+icon_pos+'px}</style>').appendTo('head');
    }

    function inViewport($el) {
        var elH = $el.outerHeight(),
            H = $(window).height(),
            r = $el[0].getBoundingClientRect(), t=r.top, b=r.bottom;
        return Math.max(0, t>0? Math.min(elH, H-t) : Math.min(b, H));
    }

    $.fn.loadURL = function(){
        if($(window).width() > 992){
            var url = $(this).data('url');
            if(url != "" && url != "#"){
                window.location.href = url;
            }
        }
    }

    function scrollMealPlan($el, offset){
        $('html, body').animate({
            scrollTop: $el.offset().top - offset
        }, 1000);
    }

    function scrollAnimation($value) {
        if($(window).width() > 768 ) {
            if($($value).length > 0){
                $('html, body').animate({
                    scrollTop: $($value).offset().top - 160
                }, 600);
            }
        } else {
            if($($value).length > 0){
                $('html, body').animate({
                    scrollTop: $($value).offset().top - 130
                }, 600);
            }

        }
    }

    // $(window).load(function() {
    //     var hash = window.location.hash.split("#");
    //     var filtered = hash.filter(function (el) {
    //         return el;
    //     });

    //     if(filtered.length > 0){
    //         var section = filtered.length > 1 ? filtered[1] : filtered[0];

    //         if(section != "") {
    //             scrollAnimation("#"+section);
    //         }
    //     }
    // });

    $('#tab_list a').click(function() {
        $id = $(this).attr('href');
        scrollAnimation($id);
    });

    $(document).on('click','.toggle_faq',function(){
        $('.card.darker-grey').removeClass('darker-grey');
        if(!$(this).hasClass('collapsed')){
            $(this).parents('.card').addClass('darker-grey');
        } else {
            $(this).parents('.card').removeClass('darker-grey');
        }
    });

    $(document).on('click','#accordion .card-header',function(){
        $('.card.darker-grey').removeClass('darker-grey');
        if(!$(this).hasClass('collapsed')){
            $(this).parents('.card').addClass('darker-grey');
        } else {
            $(this).parents('.card').removeClass('darker-grey');
        }
    });
});

var debounce = function debounce(func, delay){
    var inDebounce;
    return function(){
        var context = this;
        var args = arguments;
        clearTimeout(inDebounce);
        inDebounce = setTimeout(function(){
            return func.apply(context, args)
        }, delay);
    }
}