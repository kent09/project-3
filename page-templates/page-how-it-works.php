<?php
/**
 * Template Name: Page - How it works
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header();
global $post;
$container = get_theme_mod( 'understrap_container_type' );
$pageID = get_option('page_on_front');
$image_class = array("class"=>'mx-auto d-block img-fluid');
?>
<div class="wrapper how-it-works_wrap" id="page-wrapper">
    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
        <div class="row justify-content-md-center mt-4 mb-4">
            <div class="col-sm-12 text-center">
                <?php while ( have_posts() ) : the_post();
                    the_content();
                ?>
                <?php endwhile; // end of the loop. ?>
            </div>
        </div>
    </div>
<?php
$hp_fields = get_field('home_fields_v2',$pageID);
if( $hp_fields){
    while ( has_sub_field('home_fields_v2',$pageID) ) {
        if( get_row_layout() == 'featured_contents' ){
            $bg_color =  $hp_fields[0]['section_background_color'];
            $contents =  $hp_fields[0]['contents'];
?>
            <div class="three_cols_featured pb-5" style="background-color: <?php echo $bg_color; ?>">
                <div class="<?php echo esc_attr( $container ); ?>" id="content">
                    <div class="row justify-content-md-center pt-4">
                        <?php
                        if($contents){
                            foreach($contents as $content){
                                $img_id = $content['image'];
                                $size = 'full';
                                $link = $content['content_link'];
                                ?>
                                <div class="col-lg-4 col-md-4 text-center">
                                    <?php if(!empty($link)){ ?><a href=""><?php } ?>
                                        <figure class="figure">
                                            <?php
                                            if( $img_id) {
                                                echo wp_get_attachment_image( $img_id, $size,"",$image_class);
                                            }
                                            ?>
                                            <figcaption class="figure-caption text-center">
                                                <h6 style="color:<?php echo $content['title_color'] ;?>" class="font-weight-bold pt-3 pb-2 mb-0"><?php echo $content['title']; ?></h6>
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
                            <a class="btn btn-primary font-weight-bold box-shadow" href="<?php echo get_field('get_started_button_url'); ?>" role="button"><?php echo get_field('get_started_button'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
<?php break; }  } }

$info_heading = get_field('infographics_description');
?>
<div id="how-it-works-info">
    <div class="<?php echo esc_attr( $container ); ?>" id="content">
        <div class="row justify-content-md-center mt-5 info_graphics_img_mobile">
            <div class="<?php echo esc_attr( $container ); ?>" id="content">
                <div class="col-sm-12 text-center">
                    <?php $w++;
                    $img_id_i = get_field('infographics_image');
                    $size = 'full';
                    ?>
                    <div class="img_wrap">
                            <?php
                            if( $img_id_i) {
                                echo wp_get_attachment_image( $img_id_i, $size,"",$image_class);
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center mt-5 mb-5">
            <div class="infographics_description col-sm-12 text-center">
                <h6 class="font-weight-bold h6_v2 text-uppercase"><?php echo $info_heading; ?></h6>
            </div>
        </div>
        <?php
        $weekdays_info = get_field('weekday_info');
        if($weekdays_info){
            $total_info = count($weekdays_info);
        ?>
        <div class="row justify-content-md-left">
            <?php
                $w = 0;
                foreach($weekdays_info as $info){
                    $no_after = $w == 3 ? "no-after": "";
            ?>
            <div class="col-lg-3 col-md-3 text-center pb-4 info_week <?php echo $no_after; ?>">
                <div class="week_heading barlow_regular mb-4"><h5 class="color-primary text-uppercase d-inline barlow_bold">Week <?php echo $info['week']; ?>:</h5>&nbsp;<?php echo $info['day']; ?></div>
                <?php
                if($info['content_list']){
                    foreach($info['content_list'] as $list){
                        ?>
                        <div class="desc_list text-center">
                            <h6 class="mb-3 pt-3 font-weight-bold"><?php echo $list['heading']; ?></h6>
                            <p><?php echo $list['description']; ?></p>
                        </div>
                <?php } }?>
             </div>
            <?php $w++;}
            $img_id_i = get_field('infographics_image');
            $size = 'full';
            ?>
            <div class="col-lg-6 col-md-6 text-right">
                <div class="info_graphics_img_desktop">
                    <?php
                    if( $img_id_i) {
                        echo wp_get_attachment_image( $img_id_i, $size,"",$image_class);
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="<?php echo esc_attr( $container ); ?>" id="content">
                <div class="col-sm-12 text-center">
                    <a class="btn btn-primary font-weight-semi-bold box-shadow" href="<?php echo get_field('button_url'); ?>" role="button"><?php echo get_field('button_text'); ?></a>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center mt-5 info_graphics_img_mobile">
                <div class="<?php echo esc_attr( $container ); ?>" id="content">
                    <div class="col-sm-12 text-center">
                        <?php $w++;
                        $img_id_i = get_field('bottom_image_mobile');
                        $size = 'full';
                        ?>
                        <div class="img_wrap">
                            <?php
                            if( $img_id_i) {
                                echo wp_get_attachment_image( $img_id_i, $size,"",$image_class);
                            }
                            ?>
                        </div>
                    </div>
                </div>
        </div>
        <div class="row justify-content-md-center mt-5">
            <div class="<?php echo esc_attr( $container ); ?>" id="content">
                <div class="infographics_description col-sm-12 text-center">
                    <h6 class="text-uppercase font-weight-bold h6_v2"><?php echo get_field('bottom_text'); ?></h6>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
 </div>
<?php get_footer(); ?>