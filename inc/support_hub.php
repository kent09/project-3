<div id="contact-us" style="background-color: <?php echo $bg_color; ?>" class="pb-5">
    <div class="<?php echo esc_attr( $container ); ?>" id="content">
        <div class="row justify-content-md-center">
            <div class="col-md-11">
                <h1 class="text-center viva_beautiful_pro_b color-primary pt-5">Contact Us</h1>
                <p class="text-center"><?php echo get_sub_field('description'); ?></p>
            </div>
        </div>
        <div class="row justify-content-md-center mt-4 pl-md-5 pr-md-5">
            <div class="col-lg-4 customer_service">
                <h6 class="font-weight-bold text-uppercase mb-0">Customer Service:</h6>
                <ul class="list-unstyled pt-2 pr-0 pb-0 pl-0 mb-5" id="chat_list">
                    <?php
                    $chat = get_field('chat', 'option');
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
            <div class="col-lg-4 col-md-6 business_hours">
                <h6 class="font-weight-bold text-uppercase mb-0">Business Hours:</h6>
                <p><?php echo get_field('contact_hours', 'option'); ?></p>
                <h6 class="font-weight-bold text-uppercase mb-0">Address:</h6>
                <p><?php echo get_field('address', 'option'); ?></p>
            </div>
            <div class="col-lg-4 col-md-6 enquiry_text">
                <p><?php echo get_field('enquiry_text', 'option'); ?></p>
            </div>


            <!--<div class="col-md-6">
                                    <div class="contact_form_wrap">
                                        <?php
            //echo do_shortcode(get_sub_field('contact_form_shortcode'));
            ?>
                                    </div>
                                </div>-->
        </div>
    </div>
</div>