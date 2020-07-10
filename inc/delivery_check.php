<script>
    jQuery(document).ready(function(){
        jQuery("#flip").click(function(){
            jQuery("#panel, .plusicon, .minusicon").slideToggle("fast");
            jQuery("#panelFree, .arrow-down-icon").fadeOut("fast");
            jQuery("#flipFree, .arrow-up-icon").fadeIn("fast");

            if (jQuery(".deliverycheck #panel").css('display') == 'block') {
                jQuery('.win-a-free-weeks-of-meal').css({'z-index': 0});
            }else{
                jQuery('.win-a-free-weeks-of-meal').css({'z-index': 99999});
            }

        });
        jQuery(".backbtn").click(function(){
            jQuery(".nodeliverarea, .yesdeliverarea").hide();
            jQuery(".checkpostform").show();
        });

        jQuery(".backbtn_free").click(function(){
            jQuery('.error_email, .success_email').fadeOut('slow', function(){
                jQuery('.wafwom-form').fadeIn('slow');
            });

        });
    });
</script>
<?php
global $post;
?>
<div class="deliverycheck">
    <div id="flip">Delivery Check &nbsp;&nbsp;&nbsp;&nbsp;<span class="plusicon"> + </span><span class="minusicon" style="display:none;"> &#8211; </span></div>
    <div id="panel" style="display:none;">
        <h4 class="checkpostform">Delivery Check</h4>
        <p class="checkpostform">Enter Your Postcode To See If We Deliver To Your Area!</p>
        <form name="delivery_check_form" class="checkpostform">
            <input type="hidden" name="post_id" value="<?php echo $post->ID; ?>">
            <p><input name="postcode" type="text" placeholder="Postcode" id="postcode" maxlength="4" required/></p>
            <p><input name="action" type="hidden" value="pstcdchk" required/></p>
            <p><input type="submit" id="postcodefind" value="Check Now" /></p>
        </form>

        <div class="nodeliverarea" style="display: none;">
            <!-- <span class="crossmark"></span>
            <p><strong>How Unfortunate!</strong><br/>We don't deliver to your area right now</p>
            <p><strong class="backbtn" style="cursor:pointer;">&laquo; Back</strong></p> -->
            <form name="delivery_check_signup_form" class="signupform">
                <input type="hidden" name="action" value="pstcdchk_signup" required/>
                <input type="hidden" name="post_id" value="<?php echo $post->ID; ?>">
                <h4><strong>We're Sorry!</strong><br><span style="font-size: 14px;">We don't deliver to your area right now</span></h4>
                <p style="font-size: 11px;">We might delivery to your area soon, be the first to know if we do!</p>
                <p><input name="postcodecheckname" type="text" placeholder="First Name" required="true"></p>
                <p><input name="postcodecheckemail" type="text" placeholder="Email" required="true"></p>
                <p><input type="submit" class="notify-btn" id="notifyme" value="Notify Me" style="margin-bottom: 10px;"></p>
                <p><strong class="backbtn" style="cursor:pointer;">« Back</strong></p>
            </form>
        </div>

        <div class="yesdeliverarea" style="display:none;">
            <span class="checkmark"></span>
            <p><strong>Congratulations!</strong><br/>We deliver to your area on <span id="day_name"></span>!</p>
            <p><strong class="backbtn" style="cursor:pointer;">&laquo; Back</strong></p>
        </div>

        <div class="signupsuccess" style="display: none;">
            <span class="checkmark"></span>
            <h4><strong>Thank you!</strong></h4>
            <p>We will let you know as soon as the delivery will be available in your area.</p>
            <p><strong class="backbtn" style="cursor:pointer;">&laquo; Back</strong></p>
        </div>

        <div id="pstcdchk_processing" style="display: none; background: url('<?php echo get_stylesheet_directory_uri(); ?>/img/loading130x98.gif') no-repeat 50% 50% #cfcfcf; position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: .5;"></div>

        <script>

            jQuery(document).ready(function(){
                jQuery('form.checkpostform').on('submit', function(e){
                    e.preventDefault();
                    var data = jQuery(this).serialize();
                    jQuery.ajax({
                        url: '<?php echo admin_url('admin-ajax.php'); ?>',
                        data: data,
                        type: 'POST',
                        beforeSend: function(){
                            jQuery('.yesdeliverarea, .nodeliverarea').fadeOut('slow', function(){
                                jQuery('#pstcdchk_processing').fadeIn('slow');
                            });
                        },
                        success: function(result){
                            jQuery('#pstcdchk_processing').fadeOut('slow');
                            var output = jQuery.parseJSON(result);
                            if(output.status == 'success'){
                                jQuery('#day_name').html(output.delivery_day);
                                jQuery('.checkpostform').fadeOut('slow', function(){
                                    jQuery('.yesdeliverarea').fadeIn('slow');
                                });

                            }else{
                                jQuery('.checkpostform').fadeOut('slow', function(){
                                    jQuery('.nodeliverarea').fadeIn('slow');
                                });
                            }
                        }
                    });
                });

                jQuery('form.signupform').on('submit', function(e){
                    e.preventDefault();
                    var data = jQuery(this).serialize();
                    jQuery.ajax({
                        url: '<?php echo admin_url('admin-ajax.php'); ?>',
                        data: data,
                        type: 'POST',
                        beforeSend: function(){
                            jQuery('.yesdeliverarea, .nodeliverarea').fadeOut('slow', function(){
                                jQuery('#pstcdchk_processing').fadeIn('slow');
                            });
                        },
                        success: function(result){
                            jQuery('#pstcdchk_processing').fadeOut('slow');
                            var output = jQuery.parseJSON(result);
                            if(output.status == 'success'){
                                jQuery('.signupsuccess').fadeIn('slow');
                            }
                        }
                    });
                });

                jQuery('.deliverycheck .backbtn').on('click', function(){
                    jQuery('.yesdeliverarea, .nodeliverarea, .signupsuccess').fadeOut('slow', function(){
                        jQuery('.checkpostform').fadeIn('slow');
                    });
                });
            });

            function postcode_validate(){
                var postcode = document.getElementById("postcode").value;
                var regPostcode = /^(0[289][0-9]{2})|([1345689][0-9]{3})|(2[0-8][0-9]{2})|(290[0-9])|(291[0-4])|(7[0-4][0-9]{2})|(7[8-9][0-9]{2})$/;
                if(regPostcode.test(postcode) == false){
                    jQuery(".checkpostform").css("display", "none");  // To hide
                    jQuery(".nodeliverarea").css("display", "");  // To unhide
                }

                if(regPostcode.test(postcode) == true){
                    jQuery(".checkpostform").css("display", "none");  // To hide
                    jQuery(".yesdeliverarea").css("display", "");  // To unhide
                }
            }
        </script>
    </div>
</div>