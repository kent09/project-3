<?php
/**
 * Template Name: Page - FAQ THM
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */
global $post;
$page_id = !is_front_page() && is_home() ? get_option( 'page_for_posts' ) : $post->ID;

$banner_id = get_field('banner_image', $page_id);
$banner_image_ = wp_get_attachment_image_url($banner_id, 'full');
$mobile_banner_id = get_field('banner_mobile', $page_id);
$mobile_banner = wp_get_attachment_image_url($mobile_banner_id, 'full');

$title = get_field('banner_title', $page_id);
$content = get_field('banner_content', $page_id);
get_header('health-mummy');
$container = get_theme_mod( 'understrap_container_type' );
$image_class = array("class"=>'d-inline-block img-fluid');

?>  
    <div class="page_banner default_cg_banner" data-full="<?php echo $banner_image_; ?>" data-mobile="<?php echo $mobile_banner; ?>">
        <div class="container">
            <div class="content">
                <?php if($title): ?>
                    <div class="title"><?php echo $title; ?></div>
                <?php endif; ?>
                <?php if($content): ?>
                    <div class="description"><?php echo $content; ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="wrapper faq" id="page-wrapper">
        <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
            <div class="row justify-content-md-center">
                <div class="col-sm-12">
                    <h1 class="text-center viva_beautiful_pro_b color-primary mt-3">Frequently Asked Questions</h1>
                </div>
            </div>
        </div>
        <!-- start of flexible content -->
        <?php
        if( get_field('faq_fields') ){
            while ( has_sub_field('faq_fields') ) {
                if( get_row_layout() == 'faq_contents' ){
                    $bg_color =  get_sub_field('content_background_color');
                    $contents =  get_sub_field('qa_lists');
                    ?>
                    <div class="faq_lists" style="background-color: <?php echo $bg_color; ?>" id="faq">
                        <div class="<?php echo esc_attr( $container ); ?>" id="content">
                            <div id="tab_list" class="mt-4 mb-5">
                                <div class="row justify-content-md-center">
                                    <div class="col-lg-10 col-md-10">
                                        <ul class="list-inline text-center">
                                            <?php
                                            if($contents){
                                                foreach($contents as $lists){
                                                    $s_heading = str_replace("&", "",strtolower($lists['qa_heading']));
                                                    $qa_list_heading = str_replace(" ", "-",$s_heading);
                                                    ?>
                                                    <li class="list-inline-item"><h5><a href="#qa-<?php echo $qa_list_heading;?>" class="orange"><?php echo $lists['qa_heading']; ?></a></h5></li>
                                                <?php
                                                }
                                            }
                                            ?>
                                    </div>
                                </div>
                            </div>
                            <div id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="row justify-content-md-center">
                                    <div class="col-lg-11 col-md-11">
                                        <?php
                                        if($contents){
                                            foreach($contents as $lists){
                                                $qa_head = str_replace("&", "",strtolower($lists['qa_heading']));
                                                $qa_list_heading = str_replace(" ", "-",$qa_head);
                                                ?>
                                                <div id="qa-<?php echo $qa_list_heading;?>" class="mb-5 qa_section_items">
                                                    <h3 class="text-uppercase font-weight-bold mb-3"><?php echo $lists['qa_heading']; ?></h3>
                                                    <?php
                                                    if($lists['qa']){
                                                        $i = 0;
                                                        foreach($lists['qa'] as $qa){
                                                            $class = $i % 2 == 0 ? "even" : "odd";
                                                            ?>
                                                            <div class="card rouned-0 <?php echo $class; ?>">
                                                                <div class="card-header" role="tab" id="heading_<?php echo $qa_list_heading;?>_<?php echo $i;?>" data-toggle="collapse"  href="#collapse_<?php echo $qa_list_heading;?>_<?php echo $i;?>" aria-expanded="true" aria-controls="collapse_<?php echo $qa_list_heading;?>_<?php echo $i;?>" style="cursor: pointer">
                                                                    <h5 class="mb-0 font-weight-semi-bold black">
                                                                        <a  class="black toggle_faq" href="#collapse_<?php echo $qa_list_heading;?>_<?php echo $i;?>" data-toggle="collapse"><?php echo $qa['question'];?></a></h5>
                                                                </div>
                                                                <div class="collapse" id="collapse_<?php echo $qa_list_heading;?>_<?php echo $i;?>" role="tabpanel" arealabelledby="heading_<?php echo $qa_list_heading;?>_<?php echo $i;?>" data-parent="#qa-<?php echo $qa_list_heading;?>">
                                                                    <div class="card-block p-3">
                                                                        <p><?php echo $qa['answer']; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                            $i++;}
                                                    }
                                                    ?>
                                                </div>
                                            <?php
                                            } }
                                        ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } else if(get_row_layout() == 'contact_us' ){  $bg_color =  get_sub_field('content_background_color');?>
                    <div id="contact-us" style="background-color: <?php echo $bg_color; ?>" class="pb-5">
                        <div class="<?php echo esc_attr( $container ); ?>" id="content">
                            <div class="row justify-content-md-center">
                                <div class="col-md-11">
                                    <h1 class="text-center viva_beautiful_pro_b color-primary pt-5">Contact Us</h1>
                                    <p class="text-center"><?php echo get_sub_field('description'); ?></p>
                                </div>
                            </div>
                            <div class="row mt-4 pl-md-5 pr-md-5">
                               <!--  <div class="col-lg-4 customer_service">
                                </div> -->
                                <div class="col-lg-12 customer_service">
                                    <h6 class="font-weight-bold text-uppercase mb-0">Customer Service:</h6>
                                    <ul class="list-unstyled pt-2 pr-0 pb-0 pl-0 mb-5" id="chat_list">
                                        <?php
                                        $chat = get_field('chat');

                                        if($chat){
                                            $c= 0;
                                            foreach($chat as $chat_){
                                                $img_id = $chat_['chat_icon'];
                                                $size = 'full';
                                                $target = $c == 0 ? "" : 'target="_blank"';
                                                $id =  $c == 0 ? "live_chat" : 'fb_message';
                                                $click = isset($chat_['onclick']) ? $chat_['onclick']: "";
                                                $onclick = !empty($click) ? 'onclick="'.$click.'"' : "";
                                                ?>
                                                <li class="mb-1">
                                                    <a id="<?php echo $id; ?>" class="black text-decoration-none" href="<?php echo $chat_['url'];?>" <?php echo $target; ?> <?php echo $onclick; ?>>
                                                        <?php
                                                        if( $img_id) {
                                                            echo wp_get_attachment_image( $img_id, $size,"",$image_class);
                                                        }
                                                        ?>
                                                        <h6 class="mb-0 d-inline-block"><?php echo $chat_['label'];?></h6>
                                                    </a>
                                                </li>
                                                <?php
                                                $i++;}
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <!-- <div class="col-lg-4 customer_service">
                                </div> -->
                                <?php /*
                                <div class="col-lg-4 col-md-6 business_hours">
                                    <h6 class="font-weight-bold text-uppercase mb-0">Address:</h6>
                                    <p><?php echo get_field('address', 'option'); ?></p>
                                </div>
                                <div class="col-lg-4 col-md-6 enquiry_text">
                                    <p><?php echo get_field('enquiry_text', 'option'); ?></p>
                                </div>


                                <div class="col-md-6">
                                    <div class="contact_form_wrap">
                                        <?php
                                //echo do_shortcode(get_sub_field('contact_form_shortcode'));
                                ?>
                                    </div>
                                </div> */ ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php
            }
        }
        ?>
        <!-- end of flexible content -->
    </div>
<?php get_footer('partnership'); ?>