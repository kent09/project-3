<?php
/**
 * Template Name: Page - Review
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
$image_class = array("class"=>'mx-auto d-block img-fluid');
?>
<div class="wrapper review-page" id="page-wrapper">
    <!-- start of flexible content -->
    <?php
    if( get_field('review_carousel_feature') ){
        while ( has_sub_field('review_carousel_feature') ) {
            $bg_img =  get_sub_field('background_image'); ?>

            <div id="chefgood-difference" style="background-image: url(<?php echo $bg_img; ?>); ">
                <div class="<?php echo esc_attr( $container ); ?>" id="content">
                        <div class="row justify-content-md-center">
                            <div class="col-lg-10 col-md-10">
                                <h1 class="text-center viva_beautiful_pro_b color-primary mt-3"><?php echo get_sub_field('title'); ?></h1>
                                <p class="text-center">
                                    <?php echo get_sub_field('content'); ?>
                                </p>
                            </div>
                        </div>
                </div>
            </div>
        <?php
        } 
    } ?>

    <?php get_template_part( 'page-section/content', 'review' ); ?>
    <div class="container">
        <div class="productreviewwidget" data-listing-id="d047a64b-5679-3efd-85b7-607423e856fa" data-full-width="1" data-num-reviews="6" data-order="best" data-layout="horizontal" data-theme-id="light" data-version="1"></div>
    </div>

    <div class="review-text-buttom text-center">
        <h5><?php the_field('leave_us_text'); ?></h5>
        <div class="btn-holder">
            <a href="<?php the_field('review_link'); ?>" class="btn btn-primary box-shadow font-weight-bold">
                <?php the_field('review_text'); ?>
            </a>
        </div>
    </div>
<!-- end of flexible content -->
</div>

<script type="text/javascript">
    (function() {
      function async_load(){
          var s = document.createElement("script");
          s.type = "text/javascript";
          s.async = true;
          s.src = '//www.productreview.com.au/assets/js/widget/reviews-itemid.js';
          var x = document.getElementsByTagName("script")[0];
          x.parentNode.insertBefore(s, x);
      }
      if (window.attachEvent) {
          window.attachEvent("onload", async_load);
      } else {
          window.addEventListener("load", async_load, false);
      }
    })();
</script>
<?php get_footer(); ?>