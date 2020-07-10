jQuery(function ($) {
    var $arrows = $('.arrows');
    var $next = $arrows.children(".slick-next");
    var $prev = $arrows.children(".slick-prev");
    var restricted  = [];

    var slick = $('.your-class').slick({
        appendArrows: $arrows,
        onBeforeChange: function(elem, currentSlide,  a){
            var restricted_slides = [];

            for(i=a; i < $(elem.$slides).length; i++){
                var slide = $(elem.$slides.get(i));
                var is_restricted =  slide.find('input[type="radio"]').data('restricted');
                var max_selected = slide.find('input[type="radio"]').data('max');
                var meal_id = slide.find('input[type="radio"]').val();

                if(is_restricted == 1){
                    var count_selected = checkSelectedMeal(slide.find('input[type="radio"]').val());

                    if(count_selected >= max_selected){
                        //$(elem.$slider).find('.meal_'+meal_id).removeClass('show');
                        //$(elem.$slider).find($('.slick-slide:not(.meal_'+meal_id+')')).addClass('show');
                        //$(elem.$slider).slickFilter('.show');

                        if(jQuery.inArray(meal_id, restricted ) < 0){
                            restricted.push(meal_id);
                        }
                    }
                }
            }


            if(restricted.length  >  0){
                $(elem.$slider).slickUnfilter();
                var classes = [];
                $.each(restricted, function(key, value){
                    $(elem.$slider).find('.meal_'+value).removeClass('show');
                    classes.push('.meal_'+value);
                });
                $(elem.$slider).find($('.slick-slide:not('+classes.join(', ')+')')).addClass('show');
                $(elem.$slider).slickFilter('.show');

            } else {
                $(elem.$slider).slickUnfilter();
            }

            //restricted_slides = $.grep(restricted_slides,function(n){ return n == 0 || n });

            /*$.each(restricted_slides, function(key, value){
             if(value != ""){
             $(elem.$slider).find('.meal_'+value).removeClass('show');
             $(elem.$slider).find($('.slick-slide:not(.meal_'+value+')')).addClass('show');
             $(elem.$slider).slickFilter('.show');

             if(jQuery.inArray(value, restricted ) < 0){
             restricted.push(value);
             }
             }
             });*/


        },
        onAfterChange: function(elem, a){

            elem.$slides.each(function(){
                $(this).find('input[type="radio"]').removeAttr('checked');
            });
            $(elem.$slides.get(a)).find('input[type="radio"]').attr('checked', true);

            //check restricted array and update
            //restricted = updateRestrictedArr();
            updateRestricted(elem,a);
            updateMacro(elem, a);
        }
    });

    $('.slick-next').on('click', function (e) {
        var i = $next.index( this );
        slick.eq(i).slickNext();
    });

    $('.slick-prev').on('click', function (e) {
        var i = $prev.index( this );
        slick.eq(i).slickPrev();
    });

    function checkSelectedMeal(mealID){
        var count_selected = 0;
        $( ".slick_container" ).each(function( index ) {
            var active_selected = $(this).find('.slick-slide.slick-active input.meal_'+mealID);
            if(active_selected.length > 0){
                count_selected++;
            }
        });

        return count_selected;
    }

    function updateRestrictedArr(){

        var active_selected_arr = {};

        $( ".slick_container" ).each(function( index ) {
            var active_selected = $(this).find('.slick-slide.slick-active input[data-restricted="1"]').val();
            if(active_selected){
                var count = active_selected_arr[active_selected] && active_selected_arr[active_selected].hasOwnProperty('selected') ? active_selected_arr[active_selected]['selected'] +1 : 1;
                var data = {
                    'selected':count,
                    'max': $(this).find('.slick-slide.slick-active input[data-restricted="1"]').data('max')
                };
                active_selected_arr[active_selected]= data;
            }
        });

        $.each(active_selected_arr, function(key, value){
            if(value.selected >= value.max && jQuery.inArray(key, restricted ) < 0){
                restricted.push(key);
            }
        });

        return restricted;
    }

    function updateRestricted(elem,a){
        var arr = restricted;
        if(restricted.length > 0){
            $.each(restricted, function(key, value){
                var selected = checkSelectedMeal(value);
                var max = 0;
                $( ".slick_container" ).each(function( index ) {
                    if($(this).find('.slick-slide input.meal_'+value).length > 0){
                        max = $(this).find('.slick-slide input.meal_'+value).data('max');
                        return false;
                    }
                });

                if(selected < max){

                    var prev = $(elem.$slides.get(a - 1)).find('input[type="radio"]').val();
                    if(prev != value){
                        $('div.meal_'+value).addClass('show');
                        $('div.meal_'+value).siblings().addClass('show');
                        //$(elem.$slider).slickFilter('.show');
                        arr.splice($.inArray(value, arr),1);
                    }
                }

            });

        }

        return arr;
    }

    function updateMacro(elem,a){
        var elem_ = $(elem.$slider).parent('#slick_container');
        // var elem_index = elem_.index();
        var elem_index = Math.floor(elem_.index() / 2);
        var macros = elem_.parent('.meals_data').next();
        var macro_elem = macros.find('.row:eq('+elem_index+')');
        var c = $(elem.$slides.get(a)).data('c');
        var p = $(elem.$slides.get(a)).data('p');
        var f = $(elem.$slides.get(a)).data('f');
        /* macro_elem.find('.gram_c').text(c+"g");
         macro_elem.find('.gram_p').text(p+"g");
         macro_elem.find('.gram_f').text(f+"g"); */
        elem_.find('.macros_data').find('.gram_c').text(c+"g");
        elem_.find('.macros_data').find('.gram_p').text(p+"g");
        elem_.find('.macros_data').find('.gram_f').text(f+"g");
        var ul = $('ul', macro_elem);

        var html = '';
        if(c != '') {
            html = '<span class="nutrient">C</span><span class="gram_c">' + c + 'g</span>';
        }
        $('li', ul).eq(0).html(html);

        var html = '';
        if(p != '') {
            html = '<span class="nutrient">P</span><span class="gram_p">' + p + 'g</span>';
        }
        $('li', ul).eq(1).html(html);

        var html = '';
        if(f != '') {
            html = '<span class="nutrient">F</span><span class="gram_f">' + f + 'g</span>';
        }
        $('li', ul).eq(2).html(html);
    }


});

jQuery(document).ready(function($){

    /*$('.slick-prev, .slick-next').on('click',function(){

     var prntEle = '.' + $(this).parent().parent().attr('class');

     $( prntEle + ' input[type="radio"]').each(function(){
     $(this).removeAttr('checked');
     });

     $(prntEle + ' .slick-slide.slick-active input[type="radio"]').attr('checked', true);
     });*/

    $('.supersnacks_chkbox').on("click", function(){
        var isChecked = $(this).attr('checked');
        var price=parseFloat($(".pricemenu").attr("data-price"));
        var total = $('.f45-totalmeals').data('totalmeals');
        $(".supersnacks_chkbox").each(function(){
            if($(this).attr('checked')){
                price = price + parseFloat($(this).attr('data-price'));
                if($('.f45-totalmeals').length > 0){
                    var parent = $(this).parent('.f45-snack-checkbox').siblings('.snacks_1row');
                    var total_elem= parent.find('.snacks_1opts #slick_container').length;
                    total  = total +total_elem;
                }
            }
        });
        $(".pricemenu").text("$"+price);
        if($('.f45-totalmeals').length > 0){
            $('.f45-totalmeals').text(total);
        }
    });


    var bfast = $('.breakfastrow').find('.breakfastopts #slick_container').length;
    var lunch = $('.lunchrow').find('.lunchopts #slick_container').length;
    var dinner = $('.dinnerrow').find('.dinneropts #slick_container').length;

    $('.f45-totalmeals').data('totalmeals', bfast+lunch+dinner);
    $('.f45-totalmeals').text(bfast+lunch+dinner);

    $(document).on('mouseenter','.slick-active .meal_image', function (event) {
        var w_width = $(window).width();
        adjustTooltipImage($(this));
        $(this).parents('.slick-list, #slick_container,#cg_menu_oto').addClass('show_overflow');
        $(this).find('.m_image').addClass('visible').removeClass('hidden');

    }).on('mouseleave','.slick-active .meal_image',  function(){
        var w_width = $(window).width();
        $(this).parents('.slick-list, #slick_container, #cg_menu_oto').removeClass('show_overflow');
        $(this).find('.m_image').removeClass('visible').addClass('hidden');
    });

    $('.slick-active .tooltip').hover(
        function() {
            $(this).parents('.slick-list, #slick_container, #cg_menu_oto').addClass('show_overflow');
        }, function() {
            $(this).parents('.slick-list, #slick_container, #cg_menu_oto').removeClass('show_overflow');
        }
    );

    $(window).on('resize', debounce(function() {
        var w_width = $(window).width();
        var active_image  = $('.slick-active .m_image.visible').parents('.meal_image');

        if(active_image.length > 0){
            adjustTooltipImage(active_image);
        }

        $(this).parents('.slick-list, #slick_container, #cg_menu_oto').addClass('show_overflow');

    }, 500));


    function adjustTooltipImage(active_image){
        var w_width = $(window).width();
        var icon_pos = active_image.position().left;

        var div_width = active_image.parents('.slick-active').width();
        var left_ = w_width > 420 ? (div_width - icon_pos) - 10 : (div_width - icon_pos) - 7;

        active_image.find('.m_image').css({
            "margin-left":"-"+left_+"px"
        });
    }

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