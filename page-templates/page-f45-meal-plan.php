<?php
/**
 * Template Name: F45 Meal Plan
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */
get_header("f45");
$container = get_theme_mod( 'understrap_container_type' );
$singleMenuUrl = 'https://menu.chefgood.com.au/';

$hashurl = isset($_GET['ref_id']) && $_GET['ref_id'] != ""? "?hashid=".$_GET['ref_id']: "?hashid=f45challenge";
$passw = isset($_GET['f45_psw']) && $_GET['f45_psw'] != ""? "&f45_psw=".$_GET['f45_psw']: "";

$but_text = get_field('popup_button_text');
$d = 0;
if($but_text != "" && $d == 1000) { ?>

<div class="mealplan f45-mealplans" id="mealplans">
        <div class="container">
            <div class="row">
                <div class=" col-lg-12 popup">
                    <button  class="getnotified"><a href="<?php echo get_site_url(); ?>/f45-meal-plans-pre-order/" target="_blank"><?php the_field('popup_button_text'); ?></a></button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<div class="redstrip" id="mealplans">
    <div class="container">
        <div class=" col-lg-12">
            <p><?php the_field('red_strip_text'); ?></p>
        </div>
    </div>
</div>
<div class="challenge_winner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 img_wrap">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/C21_global_champ_ellie_parker.jpg" class="img_winner img-fluid"/>
            </div>
            <div class="col-xl-4 col-lg-6">
                <h1 class="text-center mb-2 winner_heading">GLOBAL<br />CHALLENGE<br />CHAMPION!</h1>
                <p class="text-white text-center" style="font-weight:600">A huge congratulations to Chefgood client and F45 Training Carrara superstar Ellie Parker, on being the Global Challenge Champion!</p>
                <p class="text-white text-center">We are so proud of you Ellie and are so happy to have powered you through with our chef-made meals. Well done!</p>
            </div>
        </div>
    </div>
</div>
<div class="mealplan f45-mealplans" id="mealplans">

    <div class="container">
        <div class="row">
            <div class=" col-lg-12 filter-group filter-group--compound js-toptitle">
                <a class="btn btnviewallone active" style="cursor:pointer;" href="javascript:void(0)">View All</a>
                <button id="genmen" class="btn genmen btncha btnleftcha" data-value="genmen">Male</button><button id="genwomen" class="btn genwomen btncha btnrightcha" data-value="genwomen">Female</button>
                <input type="hidden" name="hidn" class="hidvalb" value="" >
                <input type="hidden" name="hidndinr" class="hiddinner" value="" >
                <input type="hidden" name="hidndinrn" class="hidnewnu" value="" >
                <div class="js-filter-group filter-group--compound filter-options displayinlblo" style="padding:0">
                    <div id="nonvegetarian" class="displayinlblo dv nonvgtian commondiv btncha btnleftcha" data-group="nonvegetarian">Mainstream</div><div id="vegetarian" class="displayinlblo dv vgtian commondiv btncha btnrightcha" data-group="vegetarian">Vegetarian</div>
                </div>
                <div class="filter-group filter-group--compound js-btmfilter displayinlblo">
    	<span class="marbtnten" >
          <input class="radbtn fivedays btncha" type="radio" name="vegenonveg" value="fivedays" id="cb-circle"> <label class="test5 fivedaysb btncha btnleftcha" for="cb-circle">5 Days</label>
        </span><span class="marbtnten"  >
          <input class="radbtn sevendays btncha" type="radio" name="vegenonveg" value="sevendays" id="cb-circle2"> <label class="test5 sevendaysb btncha btnrightcha" for="cb-circle2">7 Days</label>
        </span>
                </div>
                <div id="breaklunchdinner" class="displayinlblo dv breaklunchdinner commondiv btncha btnleftcha" data-group="vegetarian"> BREKKIE / Lunch / Dinner</div><div id="lunchdinner" class="displayinlblo dv lunchdinner commondiv btncha btnrightcha" data-group="vegetarian">Lunch / Dinner</div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="message col-lg-12">If you see a button below, please click it and login to your Challenge account to view and order our plans.</div>
    </div>
</div>
<div id="ch-meals">

    <div class="mealplan mealcontent">
        <div class="container">
            <div class="row js-shuffle grid testing_f">
                <?php
                if( have_rows('meal_plans') ){
                    while ( have_rows('meal_plans') ) : the_row();
                        $imagesinew = wp_get_attachment_image_src(get_sub_field('plan_image'), 'medium');
                        ?>
                        <div class="col-lg-3 grid_brick custom_food <?php the_sub_field('genderprep'); ?> <?php the_sub_field('meals'); ?> <?php  the_sub_field('calories'); ?> <?php  the_sub_field('days'); ?> <?php  the_sub_field('vegnon-veg'); ?>">
                            <figure>
                                <a href="<?php echo $singleMenuUrl; ?>f45-menu/<?php  the_sub_field('product_id_from_infs'); ?><?php echo $hashurl.$passw;?>"  class="relblock">
                                    <img src="<?php echo $imagesinew[0]; ?>">
                                    <figcaption class="picture-item__title">
                                    <span class="f45-meal-genderprep">
                                    <?php
                                    if(get_sub_field('genderprep') == 'men' ){
                                        echo 'Men ';
                                    } else if(get_sub_field('genderprep') == 'women' ) {
                                        echo 'Women ';
                                    }

                                    if(get_sub_field('days')=="fivedays") {
                                        echo "- 5 Days";
                                    } else if(get_sub_field('days')=="sevendays") {
                                        echo "- 7 Days"; }

                                    if(get_sub_field('vegnon-veg')=="vegetarian") {
                                        echo " - Vegetarian";
                                    }

                                    ?>
                                    </span>
                                        <?php
                                        if(get_sub_field('meals')=="threemeals") {
                                            echo "<br/> Breakfast / Lunch / Dinner";
                                        } else if(get_sub_field('meals')=="nobreakfast") {
                                            echo "<br/> Lunch / Dinner"; }

                                        ?>
                                        <span class="f45-meal-price">$<?php  the_sub_field('plan_price'); ?></span>
                                    </figcaption>
                                </a>

                            </figure>
                        </div>
                    <?php endwhile;
                }
                ?>
            </div>

        </div>
    </div>
</div>
<div class="modal fade popup" id="challenge21_notif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center><h6 class="modal-title" id="exampleModalLabel">Enter your email and phone number below to get notified as soon as Challenge 21 meal plans are available</h6></center>
                <?php echo do_shortcode('[gravityform id=3 title=false description=false ajax=true]'); ?>
            </div>
        </div>
    </div>
</div>
<div class="bggrey faq-area">
    <div class="wrapper" id="full-width-page-wrapper">
        <div class="<?php echo esc_attr( $container ); ?>" id="content">
            <div class="row">
                <div class="col-md-12 content-area" id="primary">
                    <main class="site-main" id="main" role="main">

                        <h1 class="faqsheading">Frequently Asked Questions</h1>

                        <?php

                        // check for rows (parent repeater)
                        if( have_rows('faqs') ): ?>

                            <?php

                            // loop through rows (parent repeater)
                            $row = 1;
                            while( have_rows('faqs') ): the_row();
                                $qa_list_heading = str_replace(" ", "_",strtolower(get_sub_field('group_title')));
                                ?>
                                <div class="accordion" id="accordion_<?php echo $row; ?>" role="tablist" aria-multiselectable="false">
                                    <h4><?php the_sub_field('group_title'); ?></h4>
                                    <?php

                                    // check for rows (sub repeater)
                                    if( have_rows('faq') ): ?>
                                        <ul class="faqsul">
                                            <?php
                                            $j = 0;
                                            // loop through rows (sub repeater)
                                            while( have_rows('faq') ): the_row(); $j++;

                                                // display each item as a list - with a class of completed ( if completed )
                                                ?>
                                                <div class="card-header" role="tab"  id="heading_<?php echo $qa_list_heading;?>_<?php echo $j; ?>">
                                                    <a data-toggle="collapse" href="#collapse_<?php echo $qa_list_heading;?>_<?php echo $j; ?>" aria-expanded="true" aria-controls="collapsepro<?php echo $j; ?>"><h5 class="mb-0">
                                                            <?php the_sub_field('faq_title'); ?>
                                                        </h5></a>
                                                </div>
                                                <div id="collapse_<?php echo $qa_list_heading;?>_<?php echo $j; ?>" class="collapse" role="tabpanel" aria-labelledby="headingpro<?php echo $j; ?>"  data-parent="#accordion_<?php echo $row;?>">
                                                    <div class="card-block">
                                                        <?php the_sub_field('faq_content'); ?>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        </ul>
                                    <?php endif; //if( get_sub_field('faq') ): ?>
                                </div>

                                <?php $row++; endwhile; // while( has_sub_field('faqs') ): ?>

                        <?php endif; // if( get_field('faqs') ): ?>
                        <!--End of FAQ Content  -->
                    </main>
                    <!-- #main -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrapper" id="full-width-page-wrapper">
    <div class="<?php echo esc_attr( $container ); ?>" id="content">
        <div class="row">
            <div class="col-md-12 content-area have-a-question-area" id="primary">
                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info btn-lg have-a-question" onclick="window.location.href='/support'">Support Hub</button>
                <!-- Modal -->
                <?php get_template_part( 'page-section/content', 'feedbackmodal-partner' ); ?>
            </div>
        </div>
        <?php the_field('bottom_content'); ?>
    </div>
</div>
<script>
    jQuery(".btnviewallone").click(function(){
        //jQuery(".btncha").css("background","#fff");
        //jQuery(this).css("background","#151b4e");
        jQuery(this).addClass('active');
        jQuery(".btncha").removeClass("active");
        jQuery(".custom_food").show();
        genderval = "";
        daysval = "";
        bldval = "";
        vegeval = "";

        showthis = genderval+daysval+bldval+vegeval;
        jQuery(showthis).show();

    });


    /* Single Buttons */

    genderval = "";
    vegeval = "";
    daysval = "";
    bldval = "";

    jQuery(".nonvgtian").click(function(){
        jQuery(".vgtian, .btnviewallone").css("background","#fff");
        jQuery(this).css("background","#ededed");
        jQuery(".vgtian").removeClass("active");
        jQuery(".nonvgtian").addClass("active");
        jQuery(".custom_food").hide();

        if ( $( this ).hasClass( "active" ) ) {
            vegeval = ".nonvegetarian";
        }

        showthis = genderval+vegeval+daysval+bldval;
        jQuery(showthis).show();
        jQuery(".btnviewallone").removeClass('active');

    });

    jQuery(".vgtian").click(function(){
        jQuery(".nonvgtian, .btnviewallone").css("background","#fff");
        jQuery(this).css("background","#ededed");
        jQuery(".nonvgtian").removeClass("active");
        jQuery(".vgtian").addClass("active");
        jQuery(".custom_food").hide();

        if ( $( this ).hasClass( "active" ) ) {
            vegeval = ".vegetarian";
        }

        showthis = genderval+vegeval+daysval+bldval;
        jQuery(showthis).show();
        jQuery(".btnviewallone").removeClass('active');

    });


    jQuery(".fivedaysb").click(function(){
        jQuery(".sevendaysb, .btnviewallone").css("background","#fff");
        jQuery(this).css("background","#ededed");
        jQuery(".sevendaysb").removeClass("active");
        jQuery(".fivedaysb").addClass("active");
        jQuery(".custom_food").hide();

        if ( $( this ).hasClass( "active" ) ) {
            daysval = ".fivedays";
        }

        showthis = genderval+vegeval+daysval+bldval;
        jQuery(showthis).show();
        jQuery(".btnviewallone").removeClass('active');
    });

    jQuery(".sevendaysb").click(function(){
        jQuery(".fivedaysb, .btnviewallone").css("background","#fff");
        jQuery(this).css("background","#ededed");
        jQuery(".fivedaysb").removeClass("active");
        jQuery(".sevendaysb").addClass("active");
        jQuery(".sevendays").addClass("dayshow");
        jQuery(".custom_food").hide();

        if ( $( this ).hasClass( "active" ) ) {
            daysval = ".sevendays";
        }

        showthis = genderval+vegeval+daysval+bldval;
        jQuery(showthis).show();
        jQuery(".btnviewallone").removeClass('active');
    });


    jQuery(".breaklunchdinner").click(function(){
        jQuery(".lunchdinner, .btnviewallone").css("background","#fff");
        jQuery(this).css("background","#ededed");
        jQuery(".lunchdinner").removeClass("active");
        jQuery(".breaklunchdinner").addClass("active");
        jQuery(".custom_food").hide();

        if ( $( this ).hasClass( "active" ) ) {
            bldval = ".threemeals";
        }

        showthis = genderval+vegeval+daysval+bldval;
        jQuery(showthis).show();
        jQuery(".btnviewallone").removeClass('active');
    });


    jQuery(".lunchdinner").click(function(){
        jQuery(".breaklunchdinner, .btnviewallone").css("background","#fff");
        jQuery(this).css("background","#ededed");
        jQuery(".breaklunchdinner").removeClass("active");
        jQuery(".lunchdinner").addClass("active");
        jQuery(".custom_food").hide();

        if ( $( this ).hasClass( "active" ) ) {
            bldval = ".nobreakfast";
        }

        showthis = genderval+vegeval+daysval+bldval;
        jQuery(showthis).show();
        jQuery(".btnviewallone").removeClass('active');

    });


    jQuery(".genmen").click(function(){
        jQuery(".genwomen, .btnviewallone").css("background","#fff");
        jQuery(this).css("background","#ededed");
        jQuery(".genwomen").removeClass("active");
        jQuery(".genmen").addClass("active");
        jQuery(".custom_food").hide();

        if ( $( this ).hasClass( "active" ) ) {
            genderval = ".men";
        }

        $showthis = genderval+vegeval+daysval+bldval;
        jQuery($showthis).show();
        jQuery(".btnviewallone").removeClass('active');
    });

    jQuery(".genwomen").click(function(){
        jQuery(".genmen, .btnviewallone").css("background","#fff");
        jQuery(this).css("background","#ededed");
        jQuery(".genmen").removeClass("active");
        jQuery(".genwomen").addClass("active");
        jQuery(".custom_food").hide();

        if ( $( this ).hasClass( "active" ) ) {
            genderval = ".women";
        }

        showthis = genderval+vegeval+daysval+bldval;
        jQuery(showthis).show();
        jQuery(".btnviewallone").removeClass('active');
    });
</script>
<!--<script type="text/javascript" id="ch-meals-script" src="https://f45challenge.com/_get_ref/ch-auth.min.js"></script>-->
<?php get_footer("f45"); ?>
