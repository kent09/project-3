<?php
/**
 * Template Name: Sam Wood Meal Plan Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */
$container = get_theme_mod( 'understrap_container_type' );
$singleMenuUrl = 'https://menu.chefgood.com.au/';
get_header("sam-wood");
?>
<div class="mealplan sam-wood-mealplans" id="mealplans">
    <div class="container">
        <div class="row">
            <div class=" col-lg-12 filter-group filter-group--compound js-toptitle">
                <a class="btn btnviewallone active" style="cursor:pointer;" href="javascript:void(0)">View All</a>
            </div>
        </div>
        <div class="row">
            <div class=" col-lg-12 filter-group filter-group--compound js-toptitle">
                <button id="smaller_serve" class="btn smaller_serve btncha btnleftcha rounded-left" data-value="slimtrim">Regular Serve</button><button id="regular_serve" class="btn regular_serve btncha btnrightcha rounded-right" data-value="traintone">Larger Serve</button>
                <input type="hidden" name="hidn" class="hidvalb" value="" >
                <input type="hidden" name="hidndinr" class="hiddinner" value="" >
                <input type="hidden" name="hidndinrn" class="hidnewnu" value="" >
                <div class="js-filter-group filter-group--compound filter-options displayinlblo" style="padding:0">
                    <div id="nonvegetarian" class="displayinlblo dv nonvgtian commondiv btncha btnleftcha rounded-left" data-group="nonvegetarian">Non-Vegetarian</div><div id="vegetarian" class="displayinlblo dv vgtian commondiv btncha btnrightcha rounded-right" data-group="vegetarian">Vegetarian</div>
                </div>
                <div class="filter-group filter-group--compound js-btmfilter displayinlblo">
    	<span class="marbtnten" >
          <input class="radbtn fivedays btncha" type="radio" name="vegenonveg" value="fivedays" id="cb-circle"> <label class="test5 fivedaysb btncha btnleftcha rounded-left" for="cb-circle">5 Days</label>
        </span><span class="marbtnten rounded-right"  >
          <input class="radbtn sevendays btncha" type="radio" name="vegenonveg" value="sevendays" id="cb-circle2"> <label class="test5 sevendaysb btncha btnrightcha rounded-right" for="cb-circle2">7 Days</label>
        </span>
                </div>
                <div id="lunchdinner" class="displayinlblo dv lunchdinner commondiv btncha btnrightcha rounded">Dinners / Lunches Only</div>
            </div>
        </div>
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
                        <div class="col-lg-3 grid_brick custom_food <?php the_sub_field('servingprep'); ?> <?php the_sub_field('meals'); ?> <?php  the_sub_field('calories'); ?> <?php  the_sub_field('days'); ?> <?php  the_sub_field('vegnon-veg'); ?>">
                            <?php
                            if(date('Y-m-d H:i:s') > '2019-06-24 23:30:00'){
                                $url = $singleMenuUrl."menu/".get_sub_field('product_id_from_infs');
                                $dis = "";
                            } else {
                                $url = "#";
                                $dis = "disabled";
                            }

                            $serve = "";
                            if(get_sub_field('servingprep') == 'regular' ){
                               $serve = 'Larger Serve ';
                            } else if(get_sub_field('servingprep') == 'smaller' ) {
                                $serve = 'Regular Serve ';
                            }

                            ?>
                            <figure>
                                <a href="<?php echo $url; ?>"  class="relblock <?php echo $dis ;?>">
                                    <div class="meal_label">
                                        <span>
                                        <?php
                                        if(get_sub_field('vegnon-veg')=="vegetarian") {
                                            echo " Vego ";
                                        }
                                        echo $serve;
                                        ?>
                                        </span>
                                    </div>
                                    <img src="<?php echo $imagesinew[0]; ?>">
                                    <figcaption class="picture-item__title">
                                    <span class="sam-wood-meal-genderprep">
                                    <?php
                                    echo $serve;

                                    if(get_sub_field('days')=="fivedays") {
                                        echo " - 5 Days";
                                    } else if(get_sub_field('days')=="sevendays") {
                                        echo " - 7 Days"; }

                                    if(get_sub_field('vegnon-veg')=="vegetarian") {
                                        echo " - Vegetarian";
                                    }

                                    ?>
                                    </span>
                                        <?php
                                        if(get_sub_field('meals')=="threemeals") {
                                            echo "<br/> Breakfast / Lunch / Dinner";
                                        } else if(get_sub_field('meals')=="nobreakfast") {
                                            echo "<br/> Lunch / Dinner";
                                        } else if(get_sub_field('meals')=="dinnersonly"){
                                            echo "<br/> Dinners";
                                        }
                                        ?>
                                        <span class="sam-wood-meal-price">$<?php  the_sub_field('plan_price'); ?></span>
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
<div class="bggrey faq-area">
    <div class="wrapper" id="full-width-page-wrapper">
        <div class="<?php echo esc_attr( $container ); ?>" id="content">
            <div class="row">
                <div class="col-md-12 content-area" id="primary">
                    <main class="site-main" id="main" role="main">
                        <h1 class="faqsheading">Frequently Asked Questions</h1>
                        <?php get_template_part( 'page-section/content', 'faq-partner' ); ?>
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
    </div>
</div>
<script>
    jQuery(document).ready(function($){
        var serveval = "";
        var vegeval = "";
        var daysval = "";
        var bldval = "";

        jQuery(".btnviewallone").click(function(){
            //jQuery(".btncha").css("background","#fff");
            //jQuery(this).css("background","#151b4e");
            jQuery(this).addClass('active');
            jQuery(".btncha").removeClass("active");
            jQuery(".custom_food").show();
            serveval = "";
            daysval = "";
            bldval = "";
            vegeval = "";

            showthis = serveval+daysval+bldval+vegeval;
            jQuery(showthis).show();

        });


        jQuery(".nonvgtian").click(function(){
            jQuery(".vgtian, .btnviewallone").css("background","#fff");
            jQuery(this).css("background","#ededed");
            jQuery(".vgtian").removeClass("active");
            jQuery(".nonvgtian").addClass("active");
            jQuery(".custom_food").hide();

            if ( $( this ).hasClass( "active" ) ) {
                vegeval = ".nonvegetarian";
            }

            showthis = serveval+vegeval+daysval+bldval;
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

            showthis = serveval+vegeval+daysval+bldval;
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

            showthis = serveval+vegeval+daysval+bldval;
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

            showthis = serveval+vegeval+daysval+bldval;
            jQuery(showthis).show();

            jQuery(".btnviewallone").removeClass('active');
        });


        jQuery(".breaklunchdinner").click(function(){
            jQuery(".lunchdinner, .btnviewallone").css("background","#fff");
            jQuery(this).css("background","#ededed");
            jQuery(".lunchdinner").removeClass("active");
            jQuery(".dinnersonly").removeClass("active");
            jQuery(this).addClass("active");
            jQuery(".custom_food").hide();

            if ( $( this ).hasClass( "active" ) ) {
                bldval = ".threemeals";
            }

            showthis = serveval+vegeval+daysval+bldval;
            jQuery(showthis).show();

            jQuery(".btnviewallone").removeClass('active');
        });


        jQuery(".lunchdinner").click(function(){
            jQuery(".breaklunchdinner, .btnviewallone").css("background","#fff");
            jQuery(this).css("background","#ededed");
            jQuery(".breaklunchdinner").removeClass("active");
            jQuery(".dinnersonly").removeClass("active");
            jQuery(this).addClass("active");
            jQuery(".custom_food").hide();

            if ( $( this ).hasClass( "active" ) ) {
                bldval = ".nobreakfast";
            }

            showthis = serveval+vegeval+daysval+bldval;
            jQuery(showthis).show();

            jQuery(".btnviewallone").removeClass('active');

        });

        jQuery("#dinnersonly").click(function(){
            jQuery(".breaklunchdinner, .btnviewallone").css("background","#fff");
            jQuery(this).css("background","#ededed");
            jQuery(".breaklunchdinner").removeClass("active");
            jQuery(".lunchdinner").removeClass("active");
            jQuery(this).addClass("active");
            jQuery(".custom_food").hide();

            if ( $( this ).hasClass( "active" ) ) {
                bldval = ".dinnersonly";
            }

            showthis = serveval+vegeval+daysval+bldval;
            console.log(showthis);
            jQuery(showthis).show();

            jQuery(".btnviewallone").removeClass('active');

        });


        jQuery(".regular_serve").click(function(){
            jQuery(".smaller_serve, .btnviewallone").css("background","#fff");
            jQuery(this).css("background","#ededed");
            jQuery(".smaller_serve").removeClass("active");
            jQuery(".regular_serve").addClass("active");
            jQuery(".custom_food").hide();

            if ( $( this ).hasClass( "active" ) ) {
                serveval = ".regular";
            }

            showthis = serveval+vegeval+daysval+bldval;
            jQuery(showthis).show();

            jQuery(".btnviewallone").removeClass('active');
        });

        jQuery(".smaller_serve").click(function(){
            jQuery(".genmen, .btnviewallone").css("background","#fff");
            jQuery(this).css("background","#ededed");
            jQuery(".regular_serve").removeClass("active");
            jQuery(".smaller_serve").addClass("active");
            jQuery(".custom_food").hide();

            if ( $( this ).hasClass( "active" ) ) {
                serveval = ".smaller";
            }

            showthis = serveval+vegeval+daysval+bldval;
            jQuery(showthis).show();

            jQuery(".btnviewallone").removeClass('active');
        });

    });
</script>
<?php  get_footer('partnership'); ?>

