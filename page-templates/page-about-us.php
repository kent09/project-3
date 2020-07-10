<?php
/**
 * Template Name: Page - About Us
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
$image_class = array("class"=>'mx-auto d-block img-fluid');
?>
<div class="wrapper about-us" id="page-wrapper">
    <!-- start of flexible content -->
<?php
if( get_field('about_contents') ){
    while ( has_sub_field('about_contents') ) {
        if( get_row_layout() == 'title_with_text' ){
            $bg_color =  get_sub_field('background_color');
        ?>
        <div id="chefgood-difference" style="background-color: <?php echo $bg_color; ?>">
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
        } else if (get_row_layout() == 'icon_with_text'){
            $bg_color =  get_sub_field('background_color');
            $contents =  get_sub_field('contents');
        ?>
        <div id="icons_list" class="pt-5 pb-5 mt-5" style="background-color: <?php echo $bg_color; ?>">
            <div class="<?php echo esc_attr( $container ); ?>" id="content">
                <div class="row justify-content-md-center">
                    <?php
                    if($contents){
                        foreach($contents as $content){
                            $img_id = $content['icon'];
                            $size = 'full';
                    ?>
                        <div class="col-lg-2 increase20 mb-4 mb-md-0">
                            <?php
                            if( $img_id) {
                                echo wp_get_attachment_image( $img_id, $size,"",$image_class);
                            }
                            ?>
                            <h6 class="font-weight-bold pt-1 pb-4 mb-0 h6_v2 text-center text-uppercase"><?php echo $content['text']; ?></h6>
                            <p class="text-center"><?php echo trim($content['description']); ?></p>
                        </div>
                    <?php } }?>
                </div>
            </div>
        </div>
        <?php
        } else if(get_row_layout() == 'our_team'){
            $bg_color =  get_sub_field('background_color');
            $team_contents = get_sub_field('team_contents');
        ?>
        <div id="our-team" class="mt-5" style="background-color: <?php echo $bg_color; ?>">
            <div class="<?php echo esc_attr( $container ); ?>" id="content">
                <div class="row justify-content-md-center mb-3">
                    <div class="col-lg-12 col-md-12">
                        <h1 class="text-center viva_beautiful_pro_b color-primary mt-3"><?php echo get_sub_field('title'); ?></h1>
                    </div>
                </div>

                    <?php
                    if($team_contents){
                        foreach($team_contents as $content){
                            $img_id = $content['image'];
                            $size = 'full';
                            $qa = $content['qa'];
                    ?>
                        <div class="row justify-content-md-center mb-5 team_member_info">
                            <div class="col-lg-3 col-md-3 col-sm-4">
                                <?php
                                if( $img_id) {
                                    echo wp_get_attachment_image( $img_id, $size,"",$image_class);
                                }
                                ?>
                            </div>
                            <div class="col-lg-7 col-md-9 col-sm-8 pl-md-3 pl-lg-3">
                                <h6 class="font-weight-bold h6_v2 text-left text-uppercase mt-4 mt-md-0 mb-0"><?php echo $content['name'];?></h6>
                                <h6 class="font-weight-bold h6_v2 text-left text-uppercase color-gray"><?php echo $content['position'];?></h6>
                                <p class="pt-3 font-weight-500"><?php echo $content['description'];?></p>
                                <?php
                                if($qa){
                                    foreach($qa as $item){
                                ?>
                                     <p class="color-primary font-weight-semi-bold question mb-0"><?php echo $item['question']; ?></p>
                                     <p class="mb-0 font-weight-500"><?php echo $item['answer']; ?></p>
                                <?php
                                    }
                                }
                                ?>

                            </div>
                       </div>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
        <?php
        }else if(get_row_layout() == 'suppliers'){
            $bg_color =  get_sub_field('background_color');
            $logos = get_sub_field('logos');
        ?>
            <div id="suppliers" style="background-color: <?php echo $bg_color; ?>">
                <div class="<?php echo esc_attr( $container ); ?>" id="content">
                    <div class="row justify-content-md-center">
                        <div class="col-lg-10 col-md-10">
                            <h1 class="text-center viva_beautiful_pro_b color-primary pt-5"><?php echo get_sub_field('title'); ?></h1>
                            <h6 class="text-center text-uppercase font-weight-bold"><?php echo get_sub_field('sub_title'); ?></h6>
                        </div>
                    </div>
                    <div class="row justify-content-center justify-content-md-center justify-content-sm-center supplier_logos mt-5">
                        <?php
                        if($logos){
                            foreach($logos as $logo){
                                $img_id = $logo['image'];
                                $size = 'large';
                        ?>
                                <div class="col-lg-2 col-md-3 col-sm-6 increase20 logo">
                                    <?php
                                    if( $img_id) {
                                        echo wp_get_attachment_image( $img_id, $size,"",$image_class);
                                    }
                                    ?>
                                </div>
                        <?php
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        <?php
        }
    }
}
?>
<!-- end of flexible content -->
</div>
<?php get_footer(); ?>