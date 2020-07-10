<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */
global $post;
$page_id = !is_front_page() && is_home() ? get_option( 'page_for_posts' ) : $post->ID;
$container = get_theme_mod( 'understrap_container_type' );
$banner_id = get_field('banner_image', $page_id);
$banner_image_ = wp_get_attachment_image_url($banner_id, 'full');
$mobile_banner_id = get_field('banner_mobile', $page_id);
$mobile_banner = wp_get_attachment_image_url($mobile_banner_id, 'full');
$timer_text = get_field('timer_text', 'option');
$timer_shortcode = get_field('timer_shortcode', 'option');
$show_timer = get_field('show_timer', $page_id);
$banner_same_hp = get_field('banner_same_as_the_homepage', $page_id);
$title = get_field('banner_title', $page_id);
$content = get_field('banner_content', $page_id);
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
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,600,700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
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
    <script type='text/javascript' src='https://chefgood.com.au/wp-content/plugins/intelly-countdown/assets/deps/moment/moment.js?v=1.1.0&#038;ver=4.9.8'></script>
    <script type='text/javascript' src='https://chefgood.com.au/wp-content/plugins/intelly-countdown/assets/js/icp.library.js?v=1.1.0&#038;ver=4.9.8'></script>

    <script type="text/javascript">
         // adroll_adv_id = "NDRGWRHY6REWNNYDCO7JJB";
         // adroll_pix_id = "TMA4AP5C6BAVVNG4ILS352";
         /* OPTIONAL: provide email to improve user identification */
         /* adroll_email = "username@example.com"; */
        //  (function () {
        //      var _onload = function(){
        //          if (document.readyState && !/loaded|complete/.test(document.readyState)){setTimeout(_onload, 10);return}
        //          if (!window.__adroll_loaded){__adroll_loaded=true;setTimeout(_onload, 50);return}
        //          var scr = document.createElement("script");
        //          var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
        //          scr.setAttribute('async', 'true');
        //          scr.type = "text/javascript";
        //          scr.src = host + "/j/roundtrip.js";
        //          ((document.getElementsByTagName('head') || [null])[0] ||
        //              document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
        //      };
        //      if (window.addEventListener) {window.addEventListener('load', _onload, false);}
        //      else {window.attachEvent('onload', _onload)}
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
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">

    <!-- ******************* The Navbar Area ******************* -->
    <div class="wrapper-fluid wrapper-navbar <?php if(wp_is_mobile()){echo "fixed-top"; }?> cg_navbar" id="wrapper-navbar">

        <a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content',
                'understrap' ); ?></a>

        <nav class="navbar navbar-expand-md navbar-light bg-light <?php if(!wp_is_mobile()){echo "fixed-top"; }?>" id="main_nav">

            <?php if ( 'container' == $container ) : ?>
            <div class="container">
                <?php endif; ?>
            <div class="col-sm-2 order-2 order-md-1 logo_wrap">
                <!-- Your site title as branding in the menu -->
                <?php if ( ! has_custom_logo() ) { ?>

                <?php if ( is_front_page() && is_home() ) : ?>

                    <h1 class="navbar-brand mb-0 pull-right"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>

                <?php else : ?>

                    <a class="navbar-brand pull-right" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>

                <?php endif; ?>


                <?php } else {
                    the_custom_logo();
                } ?><!-- end custom logo -->
            </div>
            <div class="col-sm-8 order-1 menu_main_wrap">
                <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- The WordPress Menu goes here -->
                <?php wp_nav_menu(
                    array(
                        'theme_location'  => 'primary',
                        'container_class' => 'collapse navbar-collapse menu_large_devices',
                        'container_id'    => 'navbarNavDropdown',
                        'menu_class'      => 'navbar-nav',
                        'fallback_cb'     => '',
                        'menu_id'         => 'main-menu',
                        'walker'          => new understrap_WP_Bootstrap_Navwalker_child(),
                    )
                ); ?>
            </div>
            <div class="col-sm-2 order-2 login_link_wrap">
                <div class="loginaccount"><a href="<?php the_field('my_account_link','option');?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon_person.png"><span class="login_text">Log In</span></a></div>
            </div>
                <?php if ( 'container' == $container ) : ?>
            </div><!-- .container -->
        <?php endif; ?>

        </nav><!-- .site-navigation -->
        <!-- The WordPress Menu goes here -->
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <?php wp_nav_menu(
            array(
                'theme_location'  => 'primary',
                'container_class' => 'collapse navbar-collapse menu_smaller_devices',
                'container_id'    => 'navbarNavDropdown',
                'menu_class'      => 'navbar-nav',
                'fallback_cb'     => '',
                'menu_id'         => 'main-menu',
                'walker'          => new understrap_WP_Bootstrap_Navwalker_child(),
            )
        ); ?>
        </nav>
    </div><!-- .wrapper-navbar end -->
    


    


