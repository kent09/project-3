<?php
/**
 * Template Name: Page - SEO
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header();
global $post;
$container = get_theme_mod( 'understrap_container_type' );
$singleMenuUrl = 'https://menu.chefgood.com.au/';
$image_class = array("class"=>'mx-auto d-block img-fluid');

?>
<!-- start of flexible content -->
<div class="seo-page with_back_top">
    <div class="seo_wrap">
        <div class="container">
            <div class="row top-content content-wrapper pt-3 pt-md-5">
                <div class="col-md-7">
                    <h1 class="text-center viva_beautiful_pro_b"><?php the_title(); ?></h1>
                    <div class="text">
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="col-md-5">
                    <?php if( have_rows('side_image') ): ?>
                        <div class="feature-img">
                            <?php while ( have_rows('side_image') ) : the_row(); ?>

                                <?php
                                $imgid = get_sub_field('image');
                                $hide_mobile = get_sub_field('hide_on_mobile') == true ? 'd-none d-md-block' : '';
                                ?>

                                <div class="<?php echo $hide_mobile;?>"><?php echo wp_get_attachment_image( $imgid, $size,"",$image_class); ?></div>
            
                            <?php endwhile; ?>
                        </div>
                <?php endif; ?>
                </div>
            </div>
        </div>

        <?php if(get_field('veg_cities')): ?>
            <div class="veg-plan text-center">
                <div class="container">
                    <?php if(get_field('veg_title')): ?>
                        <div class="title"><?php the_field('veg_title'); ?></div>
                    <?php endif; ?>
                    <?php if(get_field('veg_plan_subtitle')): ?>
                        <div class="subtitle"><?php the_field('veg_plan_subtitle'); ?></div>
                    <?php endif; ?>

                    <div class="row mealplan_contents">
                        <?php if( have_rows('veg_food_list') ): ?>
                            <?php while ( have_rows('veg_food_list') ) : the_row(); ?>
                                <div class="col-lg-3 col-md-6 text-center">
                                    <a href="<?php echo get_bloginfo('url') . get_sub_field('link_food'); ?>">
                                        <figure class="figure">
                                            <div class="img_text_container">
                                                <?php $imgid = get_sub_field('image'); ?>
                                                <div class="img_text">
                                                    <?php echo wp_get_attachment_image( $imgid, $size,"",$image_class); ?>
                                                </div>
                                                <p class="meal_summary text-center barlow_bold">
                                                    <?php the_sub_field('serving'); ?>
                                                </p>
                                            </div>
                                            <figcaption class="figure-caption text-center">
                                                <h6 class="font-weight-bold pt-2 pb-2 mb-0 text-uppercase color-primary">
                                                    <?php the_sub_field('days'); ?>
                                                </h6>
                                                <p class="mb-0 pb-1"><?php the_sub_field('content'); ?></p>
                                                <h6 class="font-weight-bold"><?php the_sub_field('price'); ?></h6>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <?php get_template_part( 'page-section/content', 'top-mealplans' ); ?>
        <?php endif; ?>
        <div class="back-top-btn">        
          <a id="mealplan_back_top" href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/back_to_top.png"></a>
        </div>
    </div>
    <?php
    $show_review = get_field('show_reviews_section');
    if($show_review != false){
        get_template_part( 'page-section/content', 'review' );
    }
    ?>
    <?php get_template_part( 'page-section/content', 'about-us' ); ?>
    <?php get_template_part( 'page-section/content', 'how-it-works' ); ?>

</div>
<!-- end of flexible content -->
<?php get_footer(); ?>