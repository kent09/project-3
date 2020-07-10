<?php
/**
 * Template Name: Page - Landing Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header('landing-page');

global $post;

$container = get_theme_mod( 'understrap_container_type' );
$timer_shortcode = get_field('timer_shortcode');
$timer_text = get_field('timer_text');
?>
<div class="landing-page">
    <?php if(get_field('banner')): ?>
        <div class="top-banner desktop">
            <?php echo wp_get_attachment_image( get_field('banner'), "full" ); ?>
        </div>
    <?php endif; ?>
    <?php if(get_field('mobile_banner')): ?>
        <div class="top-banner mobile">
            <?php echo wp_get_attachment_image( get_field('mobile_banner'), "full" ); ?>
        </div>
    <?php endif; ?>
    <?php if( have_rows('list') ): ?>
        <div class="week-discount">
            <div class="row">
                <?php while ( have_rows('list') ) : the_row(); ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="list-holder">
                            <?php echo empty(get_sub_field('link')) ? '' : '<a href="'.get_sub_field('link').'" target="_blank">'; ?>
                                <div class="img-holder">
                                    <?php echo wp_get_attachment_image( get_sub_field('img'), "full" ); ?>
                                </div>
                                <div class="discnt-value font-weight-bold text-white"><i><?php the_sub_field('value'); ?></i></div>
                                <div class="title text-center font-weight-bold text-uppercase"><?php the_sub_field('title'); ?></div>
                            <?php echo empty(get_sub_field('link')) ? '' : '</a>'; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="coupon-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php the_content(); ?>
                </div>
                <div class="col-md-6">
                    <div class="cpn-sec text-center">
                        <div class="cpn-box text-uppercase"><?php the_field('coupon'); ?></div>
                        <p><?php the_field('apply_code'); ?></p>
                        <div class="btn-holder">
                            <a class="btn btn-primary box-shadow font-weight-bold" href="<?php the_field('link'); ?>">
                                <?php the_field('btn_txt'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if($timer_shortcode): ?>
        <!--start timer -->
        <div class="wrapper timernew">
            <div class="container">
                <h3 class="font-weight-semi-bold"><?php echo $timer_text ;?></h3>
                <?php echo do_shortcode($timer_shortcode); ?>
            </div>
        </div>
    <!-- end timer -->
    <?php endif; ?>
    <!-- start of flexible content -->
    <div class="raf">
        <?php
        $show_review = get_field('show_reviews_section');
        if($show_review != false){
            get_template_part( 'page-section/content', 'review' );
        }
        ?>
        <?php get_template_part( 'page-section/content', 'about-us' ); ?>
        <?php get_template_part( 'page-section/content', 'how-it-works' ); ?>

    </div>
</div>
<!-- end of flexible content -->
<?php get_footer(); ?>