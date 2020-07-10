<?php
/**
 * Template Name: Meal Plan Landing Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header();
global $post;
$container = get_theme_mod( 'understrap_container_type' );
$singleMenuUrl = 'https://menu.chefgood.com.au/';
$video_code =  get_field('video_code', $post->ID);
$image_class = array("class"=>'mx-auto d-block img-fluid');
$image_id = get_field('featured_image', $post->ID);
$class = !empty($image_id)? 'col-md-6': 'col-md-12';
$show_review = get_field('show_reviews_section', $post->ID);
?>
<div class="wrapper meal_plan_landing pb-0" id="page-wrapper">
    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
        <div class="row justify-content-md-center mt-4">
            <div class="<?php echo $class; ?>">
                <h1 class="text-center viva_beautiful_pro_b color-primary"><?php the_field('landing_page_title'); ?></h1>
                <h6 class="feat_subtitle text-uppercase font-weight-bold h6_v2"><?php the_field('landing_page_subtitle'); ?></h6>
                <div class="desc_list pt-1">
                    <ul class="pl-3 mb-0">
                        <?php
                        if( have_rows('description_lists') ){
                            while ( have_rows('description_lists') ) { the_row();
                                ?>
                                <li> <?php the_sub_field('text'); ?></li>
                            <?php
                            } }
                        ?>
                    </ul>
                </div>
            </div>
            <?php
               if($image_id != ""){
            ?>
            <div class="col-md-6">
                <div class="feat_img">
                    <?php
                    $size = 'full';
                    echo wp_get_attachment_image( $image_id, $size,"",$image_class);;
                    ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="row justify-content-md-center mt-5 pt-md-4">
            <div class="col-sm-12">
                <h3 class="text-center font-weight-bold text-uppercase text-center">Our <?php the_field('landing_page_title'); ?> Meal Plans</h3>
            </div>

        </div>
        <div class="row justify-content-md-center mb-3">
            <div class="col-sm-12">
                <h6 class="section_sub_title font-weight-bold text-uppercase text-center h6_v2"><?php echo get_field('plans_subtitle', $post->ID); ?></h6>
            </div>
        </div>
        <div class="row justify-content-md-center mealplan_contents">
                <?php
                while ( have_rows('plans') ) : the_row();
                    $plans = get_field_object('plans');
                    $class = count($plans['value']) > 1 ? 'col-lg-3 col-md-4' : 'col-lg-12';
                    $img_id = get_sub_field('plan_image');
                    $size = 'full';  // (thumbnail, medium, large, full or custom size)
                    ?>
                    <div class="<?php echo $class; ?> text-center pb-4">
                        <a href="<?php the_sub_field('plan_link'); ?>" class="meal_plan_link">
                            <figure class="figure">
                                <div class="img_text_container">
                                    <div class="img_text">
                                        <?php
                                        if( $img_id) {
                                            echo wp_get_attachment_image( $img_id, $size,"",$image_class);
                                        }
                                        ?>
                                        <p class="meal_summary text-center barlow_bold"><?php the_sub_field('meal_summary'); ?></p>
                                    </div>
                                    <h6 class="font-weight-bold pt-2 pb-2 mb-0 text-uppercase color-primary"> <?php the_sub_field('plan_name'); ?></h6>
                                </div>
                                <figcaption class="figure-caption text-center">
                                    <p class="mb-0 pb-1"><?php the_sub_field('description'); ?></p>
                                    <h6 class="font-weight-bold">$<?php the_sub_field('price'); ?></h6>
                                </figcaption>
                            </figure>
                        </a>
                    </div>
                <?php
                endwhile;
                ?>
        </div>
    </div>
    <?php
    if($show_review != false){
        if( have_rows('review')){
    ?>
            <div id="review" class="testimonial wrapper bg-blue">
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="owl-carousel owl-theme text-center">
                            <?php while ( have_rows('review') ) : the_row(); ?>
                                <div class="item">
                                    <?php $imgid = get_sub_field('photo'); ?>
                                    <div class="user-img">
                                        <?php echo wp_get_attachment_image( $imgid, $size,"",$image_class); ?>
                                    </div>
                                    <div class="title"><?php the_sub_field('title'); ?></div>
                                    <div class="content"><?php the_sub_field('content'); ?></div>
                                    <div class="name"><?php the_sub_field('name'); ?></div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <div class="row justify-content-md-center mt-1">
                        <div class="col-sm-12 text-center">
                            <div class="read-more text-center">
                                <div><?php the_field('review_bottom_text', 'option'); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-md-center mt-1">
                        <div class="col-sm-12 text-center">
                            <div class="btn-holder text-center">
                                <a href="<?php bloginfo('url') . the_field('review_link', 'option'); ?>" class="btn btn-primary box-shadow font-weight-bold"><?php the_field('review_btn_text', 'option'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php
         } else {
            get_template_part( 'page-section/content', 'review' );
        }
    }
    ?>
    <?php get_template_part( 'page-section/content', 'about-us' ); ?>
    <?php get_template_part( 'page-section/content', 'how-it-works' ); ?>
</div>
<?php get_footer(); ?>
