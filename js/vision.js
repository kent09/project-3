jQuery(document).ready(function($){

    var window_width = $(window).width();
    if(window_width <= 576){
       var banner = $('.vision-banner_full').data('mobile');
       $('.vision-banner_full').css('background', "url("+banner+ ")");
    } else {
        var banner = $('.vision-banner_full').data('full');
        $('.vision-banner_full').css('background', "url("+banner+ ")");
    }

    $(window).on('resize', function() {
        window_width = $(window).width();
        if(window_width <= 576){
            banner = $('.vision-banner_full').data('mobile');
            $('.vision-banner_full').css('background', "url("+banner+ ")");
        } else {
            banner = $('.vision-banner_full').data('full');
            $('.vision-banner_full').css('background', "url("+banner+ ")");
        }

    });


});