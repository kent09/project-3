<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */
global $post;
$container = get_theme_mod( 'understrap_container_type' );
$image_class = array("class"=>'mx-auto d-block img-fluid');
$logo_id = get_field('sam_woods_logo', $post->ID);
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
    <link href="https://fonts.googleapis.com/css?family=Asap+Condensed:600,700|Muli:400,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/css/custom-style-samwoods.css" />

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
</head>

<body <?php body_class(); ?>>
<div class="hfeed site" id="page">
    <!-- ******************* The Navbar Area ******************* -->
    <div class="wrapper-fluid wrapper-navbar sam-wood-header" id="wrapper-navbar">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                 <a class="navbar-brand pt-4 pt-md-0" rel="home" href="<?php echo get_field('logo_url', $post->ID);?> " title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                        <?php
                        if( $logo_id) {
                            echo wp_get_attachment_image($logo_id, 'full',"",$image_class);
                        }
                        ?>
                 </a>
                <div class="col-sm-12 col-md-6 timer_wrap large_devices text-center">
                    <div class="sam-wood-heading-timer">
                        <h4 style="color: #3c3c3b;font-weight:700; "><?php the_field('timer_text'); ?></h4>
                        <?php echo do_shortcode(get_field('timer_shortcode'));?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 pl-0 chefgood_logo text-center">
                    <p class="gray" style="margin-bottom: 0.1rem;line-height:1rem"><?php echo get_field('meal_delivery_text', $post->ID);?> </p>
                    <?php
                    $cg_logo_id = get_field('chefgood_logo');
                    $cg_logo_attributes = wp_get_attachment_image_src($cg_logo_id, 'large');
                    if($cg_logo_attributes){
                        ?>
                        <a href="<?php echo get_site_url(); ?>">
                            <img width="80" src="<?php echo $cg_logo_attributes[0]; ?>" class="img-responsive d-block img-fluid mx-auto">
                        </a>
                    <?php } ?>
                </div>
            </div><!-- .container -->
        </nav><!-- .site-navigation -->
        <div class="timer_wrap smaller_devices">
            <div class="<?php echo esc_attr( $container ); ?>" id="content">
                <div class="row justify-content-md-center">
                    <div class="col-sm-12 col-md-6">
                        <div class="sam-wood-heading-timer">
                            <h4 style="color: #3c3c3b;font-weight:700; "><?php the_field('timer_text'); ?></h4>
                            <?php echo do_shortcode(get_field('timer_shortcode'));?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .wrapper-navbar end -->
    <?php
    global $post;
    $banner_id = get_field('banner_desktop', $post->ID);
    $banner_image = wp_get_attachment_image_url($banner_id, 'full');
    $banner_mobile_id = get_field('banner_mobile', $post->ID);
    $banner_mobile = wp_get_attachment_image_url($banner_mobile_id, 'full');
    ?>
    <div class="banner_text smaller_devices">
        <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
            <div class="row justify-content-md-center">
                <div class="col-sm-12 text-center">
                    <div class="sam-wood-banner_text">
                        <h1><?php echo  get_field('banner_heading', $post->ID);?></h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-sm-12 text-center">
                    <div class="sam-wood-banner-sub-heading pt-2 pb-2">
                        <h4 class="font-weight-bold"><?php echo  get_field('banner_sub_description', $post->ID);?></h4>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-sm-12 text-center">
                    <div class="sam-wood-banner-sub-desc pt-3">
                        <h4 class="font-weight-bold"><?php echo  get_field('banner_description', $post->ID);?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sam-wood-banner page_banner" style="background-image:url('<?php echo $banner_image; ?>');" data-full="<?php echo $banner_image; ?>" data-mobile="<?php echo $banner_mobile; ?>">
        <div class="container banner_text large_devices">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sam-wood-banner_text">
                        <h1><?php echo  get_field('banner_heading', $post->ID);?></h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="sam-wood-banner-sub-heading pt-2">
                        <h4 class="font-weight-bold"><?php echo  get_field('banner_sub_description', $post->ID);?></h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="sam-wood-banner-sub-desc pt-3">
                        <h4 class="font-weight-bold"><?php echo  get_field('banner_description', $post->ID);?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
