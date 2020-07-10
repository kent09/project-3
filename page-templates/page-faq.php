<?php
/**
 * Template Name: Page - FAQ
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
$image_class = array("class"=>'d-inline-block img-fluid');
?>
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
                    <div class="faq_lists" style="background-color: <?php echo $bg_color; ?>">
                        <div class="<?php echo esc_attr( $container ); ?>" id="content">
                            <div id="tab_list" class="mt-4 mb-5">
                                <div class="row justify-content-md-center">
                                    <div class="col-lg-10 col-md-10">
                                        <ul class="list-inline text-center">
                                            <?php
                                            if($contents){
                                                foreach($contents as $lists){
                                                    $s_heading = str_replace("&", "",strtolower($lists['qa_heading']));
                                                    $qa_list_heading = str_replace(" ", "_",$s_heading);
                                                    ?>
                                                    <li class="list-inline-item"><h5><a href="#qa_section_<?php echo $qa_list_heading;?>" class="black"><?php echo $lists['qa_heading']; ?></a></h5></li>
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
                                                $qa_list_heading = str_replace(" ", "_",$qa_head);
                                                ?>
                                                <div id="qa_section_<?php echo $qa_list_heading;?>" class="mb-5 qa_section_items">
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
                                                                <div class="collapse" id="collapse_<?php echo $qa_list_heading;?>_<?php echo $i;?>" role="tabpanel" arealabelledby="heading_<?php echo $qa_list_heading;?>_<?php echo $i;?>" data-parent="#qa_section_<?php echo $qa_list_heading;?>">
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
                    <div id="contact_us" style="background-color: <?php echo $bg_color; ?>" class="pb-5">
                        <div class="<?php echo esc_attr( $container ); ?>" id="content">
                            <div class="row justify-content-md-center">
                                <div class="col-md-10">
                                    <h1 class="text-center viva_beautiful_pro_b color-primary pt-5">Contact Us</h1>
                                    <p><?php echo get_sub_field('description'); ?></p>
                                </div>
                            </div>
                            <div class="row justify-content-md-center mt-4">
                                <div class="col-md-4">
                                    <ul class="list-unstyled p-0 mb-5" id="contact_details_list">
                                        <li>
                                            <h6 class="font-weight-bold text-uppercase mb-0">Contact Hours:</h6>
                                            <p><?php echo get_field('contact_hours', 'option'); ?></p>
                                        </li>
                                        <li>
                                            <h6 class="font-weight-bold text-uppercase mb-0">Email:</h6>
                                            <p><?php echo get_field('email', 'option'); ?></p>
                                        </li>
                                        <li>
                                            <h6 class="font-weight-bold text-uppercase mb-0">Phone:</h6>
                                            <p><?php echo get_field('phone', 'option'); ?></p>
                                        </li>
                                        <li>
                                            <h6 class="font-weight-bold text-uppercase mb-0">Address:</h6>
                                            <p><?php echo get_field('address', 'option'); ?></p>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled p-0 mb-5" id="chat_list">
                                        <?php
                                        $chat = get_field('chat', 'option');
                                        if($chat){
                                            $c= 0;
                                            foreach($chat as $chat_){
                                                $img_id = $chat_['chat_icon'];
                                                $size = 'full';
                                                $target = $c == 0 ? "" : 'target="_blank"';
                                                $id =  $c == 0 ? "live_chat" : 'fb_message';
                                                $click = $chat_['onclick'];
                                                $onclick = !empty($click) ? 'onclick="'.$click.'"' : "";
                                                ?>
                                                <li class="mb-1">
                                                    <a id="<?php echo $id; ?>" class="black" href="<?php echo $chat_['url'];?>" <?php echo $target; ?> <?php echo $onclick; ?>>
                                                        <?php
                                                        if( $img_id) {
                                                            echo wp_get_attachment_image( $img_id, $size,"",$image_class);
                                                        }
                                                        ?>
                                                        <h6 class="font-weight-bold mb-0 d-inline-block"><?php echo $chat_['label'];?></h6>
                                                    </a>
                                                </li>
                                                <?php
                                                $i++;}
                                        }
                                        ?>

                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact_form_wrap">
                                        <?php
                                        echo do_shortcode(get_sub_field('contact_form_shortcode'));
                                        ?>
                                    </div>
                                </div>
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
<?php get_footer(); ?>