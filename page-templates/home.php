<?php
/**
 * Template Name: Homepage
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
<?php
get_template_part( 'page-section/content', 'top-mealplans' );
if( get_field('home_fields_v2') ){
    while ( has_sub_field('home_fields_v2') ) {
        if( get_row_layout() == 'featured_contents' ){
            $bg_color =  get_sub_field('section_background_color');
            $contents =  get_sub_field('contents');
?>
            <div class="three_cols_featured pb-5" style="background-color: <?php echo $bg_color; ?>">
                <div class="<?php echo esc_attr( $container ); ?>" id="content">
                    <div class="row justify-content-md-center">
                        <div class="col-lg-12 col-md-12">
                            <h1 class="text-center viva_beautiful_pro_b pt-5"><?php the_sub_field('main_heading'); ?></h1>
                            <h6 class="text-center pb-2 font-weight-bold"><?php the_sub_field('sub_heading'); ?></h6>
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <?php
                            if($contents){
                                foreach($contents as $content){
                                    $img_id = $content['image'];
                                    $size = 'full';
                                    $link = $content['content_link'];
                        ?>
                                <div class="col-lg-4 col-md-4 text-center">
                                    <?php if(!empty($link)){ ?><a href="<?php echo $link; ?>"><?php } ?>
                                        <figure class="figure">
                                            <?php
                                            if( $img_id) {
                                                echo wp_get_attachment_image( $img_id, $size,"",$image_class);
                                            }
                                            ?>
                                            <figcaption class="figure-caption text-center">
                                                <h6 style="color:<?php echo $content['title_color'] ;?>" class=" pt-3 pb-2 mb-0 font-weight-bold"><?php echo $content['title']; ?></h6>
                                                <p class="mb-0 pb-1"><?php echo $content['description']; ?></p>
                                                <?php if(!empty($content['price'])){ ?><h7 class="font-weight-bold">FROM <?php echo $content['price']; ?></h7><?php } ?>
                                            </figcaption>
                                        </figure>
                                    <?php if(!empty($link)){ ?></a><?php } ?>
                                </div>
                        <?php
                                }
                            }
                        ?>
                    </div>
                    <div class="row justify-content-md-center mt-4">
                        <div class="col-sm-12 text-center">
                            <a class="btn btn-primary box-shadow font-weight-bold" href="<?php echo get_sub_field('button_link'); ?>" role="button"><?php echo get_sub_field('button_text'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
<?php
        } else if(get_row_layout() == 'testimonials'){
            $contents =  get_sub_field('testimonial_contents');
?>
            <div class="testimonials pb-5">
                <div class="<?php echo esc_attr( $container ); ?>" id="content">
                    <div class="row justify-content-md-center">
                        <div class="owl-carousel owl-theme owl-carousel-testimonials">
                        <?php
                        if($contents){
                            foreach($contents as $content){?>
                                <div class="item text-center mb-3">
                                  <div class="testimonial_contents">
                                      <h6 class="text-uppercase font-weight-bold"><?php echo $content['testimonial_title']; ?></h6>
                                      <p class="mb-0"><small><?php echo $content['description']; ?></small></p>
                                      <small class="font-italic">-<?php echo $content['name_of_person']; ?>-</small>
                                  </div>

                                </div>
                            <?php
                            }
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
<?php
        } else if(get_row_layout() == 'banner_with_featured_images'){
?>
            <div class="banner_with_images pb-5">
                <div class="<?php echo esc_attr( $container ); ?>" id="content">
                    <div class="row justify-content-md-center">
                        <h6 class="d-block w-100 text-center font-weight-bold"><?php echo get_sub_field('heading');?></h6>
                        <div class="logos d-block w-100 text-center pt-3">
                            <?php
                            $images  = get_sub_field('images');
                            if(!empty($images)){
                                foreach($images as $image ){
                                    if( $image['image']) { ?>

                                        <a href="<?php echo $image['image_link']; ?>" target="_blank">
                                <?php     echo wp_get_attachment_image( $image['image'], 'large',"",array("class"=>'mx-auto d-inline-block img-fluid d-inline')); ?>
                                        </a>
                            <?php   }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
<?php
        }
    }
}
?>
<!-- end of flexible content -->
<?php get_footer(); ?>