<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800|Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/css/custom-style-vision.css" />
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/vision.js"></script>
    <!-- Start of LiveChat (www.livechatinc.com) code -->
    <script type="text/javascript">
        window.__lc = window.__lc || {};
        window.__lc.license = 9420100;
        (function() {
            var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
            lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
        })();
    </script>
    <!-- End of LiveChat code -->

    <script type="text/javascript">
        // adroll_adv_id = "NDRGWRHY6REWNNYDCO7JJB";
        // adroll_pix_id = "TMA4AP5C6BAVVNG4ILS352";
        /* OPTIONAL: provide email to improve user identification */
        /* adroll_email = "username@example.com"; */
        // (function () {
        //     var _onload = function(){
        //         if (document.readyState && !/loaded|complete/.test(document.readyState)){setTimeout(_onload, 10);return}
        //         if (!window.__adroll_loaded){__adroll_loaded=true;setTimeout(_onload, 50);return}
        //         var scr = document.createElement("script");
        //         var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
        //         scr.setAttribute('async', 'true');
        //         scr.type = "text/javascript";
        //         scr.src = host + "/j/roundtrip.js";
        //         ((document.getElementsByTagName('head') || [null])[0] ||
        //             document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
        //     };
        //     if (window.addEventListener) {window.addEventListener('load', _onload, false);}
        //     else {window.attachEvent('onload', _onload)}
        // }());
    </script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-942680394"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'AW-942680394');
    </script>
    
    <!-- Start of Chef Good Tag from Jon -->
    <script type="text/javascript">(function(){function f(){var e=document.createElement("script");e.type="text/javascript";e.async=true;e.src="//platform3.cloud-iq.com.au/cartrecovery/store.js?app_id=941";var t = document.getElementsByTagName('head')[0];t.appendChild(e);}f();})();</script>
    <!-- End Chef Good Tag from Jon -->
    <script type='text/javascript' src='https://chefgood.com.au/wp-content/plugins/intelly-countdown/assets/deps/moment/moment.js?v=1.1.0&#038;ver=4.9.8'></script>
    <script type='text/javascript' src='https://chefgood.com.au/wp-content/plugins/intelly-countdown/assets/js/icp.library.js?v=1.1.0&#038;ver=4.9.8'></script>
<body <?php body_class(); ?>>

<div class="hfeed site" id="page">
    <!-- ******************* The Navbar Area ******************* -->
    <div class="wrapper-fluid wrapper-navbar vision-header" id="wrapper-navbar">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" rel="home" href="https://www.visionpt.com.au/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                    <?php
                    $logo_image_id = get_field('logo');
                    $logo_image_attributes = wp_get_attachment_image_src($logo_image_id, 'large');
                    if($logo_image_attributes){
                        ?>
                        <img src="<?php echo $logo_image_attributes[0]; ?>" class="logo img-responsive">
                    <?php } ?>
                </a>
                <div class="vision-heading-timer">
                    <span>
                        <?php
                        if(date("Y-m-d H:i:s") > "2019-06-24 23:30:00"){
                        ?>
                        <?php the_field('vision_timer_text'); ?>
                        <?php
                        }
                        else{
                            echo "ORDER YOUR FIRST<br>MEAL PLAN IN";
                        }
                        ?>
                    </span>
                    <?php
                    $timer = get_field('countdown_timer_shortcode');
                    if($timer){
                        echo do_shortcode($timer, false);
                    }
                    ?>
                </div>
                <div class="vision-heading-right"><span>Powered by:</span>
                    <a href="<?php echo get_site_url(); ?>">
                        <?php
                        $clogo_image_id = get_field('chefgood_logo');
                        $clogo_image_attributes = wp_get_attachment_image_src($clogo_image_id, 'large');
                        if($clogo_image_attributes){
                            ?>
                            <img width="91" src="<?php echo $clogo_image_attributes[0]; ?>" class="img-responsive">
                        <?php } ?>
                    </a>
                </div>
            </div><!-- .container -->
        </nav><!-- .site-navigation -->
    </div><!-- .wrapper-navbar end -->
    <?php
    global $post;
    $banner_id = get_field('banner', $post->ID);
    $banner_image_ = wp_get_attachment_image_url($banner_id, 'full');
    $mobile_banner_id = get_field('mobile_banner', $post->ID);
    $mobile_banner = wp_get_attachment_image_url($mobile_banner_id, 'full');
    ?>
    <div class="vision-banner_full" data-full="<?php echo $banner_image_; ?>" data-mobile="<?php echo $mobile_banner; ?>">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-5">
                    <div class="vis_banner_cont">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/vision_bg_half.jpg" class="img-fluid" style="visibility: hidden"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
