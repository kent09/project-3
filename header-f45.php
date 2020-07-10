<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
$custom_logo_id = get_theme_mod( 'custom_logo' );
$rand = rand( 1, 99999999999 );
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

<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800" rel="stylesheet">
<?php
if(is_page_template('page-templates/page-f45-order.php')){
?>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/css/custom-style-f45-order.css?=<?php echo $rand;?>" />
<?php } else {?>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/css/custom-style-f45.css?=<?php echo $rand;?>" />
<?php } ?>
<script src="https://code.jquery.com/jquery-1.11.0.js"></script>

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
    <div class="wrapper-fluid wrapper-navbar f45-header" id="wrapper-navbar">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" rel="home" href="https://f45challenge.com/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2018/07/challenge-logo-new.png" class="img-resposive"></a>
                <div class="f45-heading-timer"><span><?php echo get_field('f45_timer_text', 'option'); ?></span>
                    <?php echo do_shortcode(get_field('f45_timer_shortcode', 'option'));?>
                </div>
                <div class="f45-heading-right">
                    <a href="https://menu.chefgood.com.au/">
                        <span class="text-center text-underline">Login</span>
                    </a>
                    <span class="text-center">Approved Supplier:</span>

                    <a href="<?php echo get_site_url(); ?>">
                        <?php
                           if($custom_logo_id){
                               $cg_logo_attributes = wp_get_attachment_image_src($custom_logo_id, 'large');
                        ?>
                        <img class="mx-auto d-block img-fluid" width="91" src="<?php echo $cg_logo_attributes[0]; ?>">
                        <?php } ?>
                    </a>
                </div>
            </div><!-- .container -->
        </nav><!-- .site-navigation -->
    </div><!-- .wrapper-navbar end -->
    <?php
    global $post;
    $banner = get_field('banner_women', 'option');
    $banner_men = get_field('banner_men', 'option');
    $welcome_heading = get_field('welcome_heading', 'option');
    $welcome_text = get_field('welcome_text', 'option');
    $commitment_made_subtext = get_field('commit_made_subtext', 'option');
    ?>
    <div class="f45-banner" style="background-image:url('<?php echo $banner; ?>');background-size: cover;height:100%;background-repeat: no-repeat;background-position: center" data-women='<?php echo $banner; ?>' data-men='<?php echo $banner_men; ?>'>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2018/07/commitment-made-text.png">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="f45-commitment-sub f45-banner_text">
                        <?php echo $commitment_made_subtext;?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="f45-welcome-heading">
                        <?php echo $welcome_heading; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="f45-banner_text">
                        <?php echo $welcome_text; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
