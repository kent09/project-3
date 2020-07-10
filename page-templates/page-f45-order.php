<?php
/**
 * Template Name: Page - F45 Order
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header("f45");
global $post;
$container = get_theme_mod( 'understrap_container_type' );
$singleMenuUrl = 'https://menu.chefgood.com.au/';
$image_class = array("class"=>'mx-auto d-block img-fluid');
$meal_title = get_field('title');
?>
<div class="redstrip">&nbsp;</div>
<div class="f45-contentareabg">
    <div class="top3_plans">
        <div class="container">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <?php

                            if( have_rows('feature_image') ) :

                                ?>
                                <div class="row masonry-grid">
                                    <?php
                                    while ( have_rows('feature_image') ) : the_row();

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
                            <h2 class="f45-menuheading one-time-order tk-caflisch-script-pro"><?php the_field('title'); ?></h2>
                            <p class="one-time-sub-heading"><?php the_field('meals'); ?></p>
                            <?php if(get_field('meal_price') != '') { ?>
                                <p class="f45-one-time-price"><?php the_field('meal_price'); ?></p>
                            <?php } ?>
                            <div id="cg_menu_oto_f45">
                                <?php the_field('shortcode'); ?>
                                <div class="delivery_wrap_f45">
                                    <?php echo do_shortcode('[get_delivery_days]') ;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_template_part( 'page-section/content', 'good-crew' ); ?>
<?php get_template_part( 'page-section/content', 'happy-challengers' ); ?>
<?php get_footer("f45"); ?>