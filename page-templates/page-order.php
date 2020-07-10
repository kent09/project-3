<?php
/**
 * Template Name: Page - Order
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
$meal_title = get_field('title');
$content = get_the_content();
?>
<!-- start of flexible content -->
<div class="order-page">
    <div class="container meal-holder">
        <?php if( have_rows('feature_image') ): ?>
            <div class="owl-carousel owl-theme top-content content-wrapper">
                <?php while ( have_rows('feature_image') ) : the_row(); ?>
                    <?php
                    $imgid = get_sub_field('image');
                    ?>
                    <div class="item">
                        <?php echo wp_get_attachment_image( $imgid, $size,"",$image_class); ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <div class="one-time-order-contents">
            <div class="title viva_beautiful_pro_b color-primary text-center"><?php if(empty($meal_title)){ the_title(); } else { echo $meal_title; } ?></div>
            <div class="subtitle text-center"><?php the_field('meals'); ?></div>
            <?php if ( !empty($content) ): ?>
                <div class="description text-center">
                    <?php the_content(); ?>
                </div>
            <?php endif; ?>
            <?php if('short_code'): ?>
                <div id="cg_menu_oto">
                    <?php the_field('short_code'); ?>
                    <div class="cg_delivery_days_wrap">
                        <?php echo do_shortcode('[get_delivery_days]') ;?>
                    </div>
                </div>
            <?php endif; ?>
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

<div class="modal fade" id="delivery-info" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h6 class="modal-title" id="modalLabel">Delivery Dates</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <?php the_field('order_modal_text', 'option'); ?>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- end of flexible content -->
<?php get_footer(); ?>