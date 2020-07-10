<?php
/**
 * Template Name: One Time Order Template
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header();
global $post;
$container = get_theme_mod( 'understrap_container_type' );
$singleMenuUrl = 'https://menu.chefgood.com.au/';

$home_post_id = get_option('page_on_front');
$banner = get_field('banner', $post->ID);
$heading = get_field('heading', $post->ID);
$f45_branding = get_field('f45_branding_elements', $home_post_id);
$the_gc_title = get_field('the_good_crew_title', $home_post_id);

?>

<div class="hp_bg one-time-header" style="background-image:url('<?php echo $banner; ?>');background-size: cover;height:100%;background-repeat: no-repeat;background-position: center;min-height:200px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="new_hp_heading">
                    <?php echo $heading; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrapper meals-title-cover">
    <div class="container">
        <h2 class="meals-title text-center">NOT ALL PREPARED MEALS ARE THE SAME</h2>
    </div>
</div>

<div class="top3_plans">
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <?php

                        if( have_rows('images') ) :

                            ?>
                            <div class="row masonry-grid">
                                <?php
                                while ( have_rows('images') ) : the_row();

                                    $image_id = get_sub_field('image');
                                    $image_attributes = wp_get_attachment_image_src($image_id, 'large');

                                    if (get_sub_field('feature')) {

                                        ?>
                                        <div class="col-md-12 col-lg-12 masonry-column">
                                            <div>
                                                <a><img src="<?php echo $image_attributes[0]; ?>" width="100%"></a>
                                            </div>
                                        </div>
                                    <?php }else{ ?>
                                        <div class="col-md-6 col-lg-6 masonry-column">
                                            <div>
                                                <a><img src="<?php echo $image_attributes[0]; ?>" width="100%"></a>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                endwhile;
                                ?>
                            </div>

                        <?php
                        else : endif;
                        ?>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <h1 class="f45-menuheading viva_beautiful_pro_b color-primary"><?php the_field('title'); ?></h1>
                        <p class="one-time-sub-heading"><?php the_field('sub_title'); ?></p>
                        <div id="cg_menu_oto">
                            <?php the_field('shortcode'); ?>
                        </div>
                        <?php echo do_shortcode('[get_delivery_days]') ;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function($){

        $('#cg_menu_oto .breakfastrow .breakfastopts #slick_container:nth-child(1) .slick-slide.slick-active .tooltip, #cg_menu_oto .breakfastrow .breakfastopts #slick_container:nth-child(2) .slick-slide.slick-active .tooltip').hover(function() {
            $('#cg_menu_oto').css('overflow', 'visible');
        }, function() {
            // on mouseout, reset the background colour
            $('#cg_menu_oto').css('overflow', '');
        });

        $("#videoModal").on("hidden.bs.modal",function(){
            $("#iframeYoutube").remove();
        });

        $('.play_video').click(function(e){

            var code = $(this).data('code');
            e.preventDefault();
            $('#vid_content').html('here');
            $('#vid_content').html('<iframe width="100%" height="350"  id="iframeYoutube" src="https://www.youtube.com/embed/'+code+'?autoplay=1" frameborder="0" allowfullscreen></iframe>');
            $("#videoModal").modal("show");

        });

    });
</script>
<?php get_footer(); ?>
