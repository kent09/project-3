<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

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
	<link rel="stylesheet" href="https://use.typekit.net/zkw8exn.css">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
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

    <?php if(is_page_template('page-templates/page-health-mummy.php')):?>
    <!-- Facebook Pixel Code -->

	<script>

		!function(f,b,e,v,n,t,s)

		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?

		n.callMethod.apply(n,arguments):n.queue.push(arguments)};

		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';

		n.queue=[];t=b.createElement(e);t.async=!0;

		t.src=v;s=b.getElementsByTagName(e)[0];

		s.parentNode.insertBefore(t,s)}(window, document,'script',

		'https://connect.facebook.net/en_US/fbevents.js');

		fbq('init', '614902635286696');

		fbq('track', 'PageView');

	</script>

	<noscript><img height="1" width="1" style="display:none"

	src="https://www.facebook.com/tr?id=614902635286696&ev=PageView&noscript=1"

	/></noscript>

	<!-- End Facebook Pixel Code -->
	<?php endif; ?>


    <!-- Start of Chef Good Tag from Jon -->
    <script type="text/javascript">(function(){function f(){var e=document.createElement("script");e.type="text/javascript";e.async=true;e.src="//platform3.cloud-iq.com.au/cartrecovery/store.js?app_id=941";var t = document.getElementsByTagName('head')[0];t.appendChild(e);}f();})();</script>
    <!-- End Chef Good Tag from Jon -->
    <script type='text/javascript' src='https://chefgood.com.au/wp-content/plugins/intelly-countdown/assets/deps/moment/moment.js?v=1.1.0&#038;ver=4.9.8'></script>
    <script type='text/javascript' src='https://chefgood.com.au/wp-content/plugins/intelly-countdown/assets/js/icp.library.js?v=1.1.0&#038;ver=4.9.8'></script>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbars" itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<?php if ( 'container' == $container ) : ?>
			<div class="container">
		<?php endif; ?>
				<div class="row align-items-center">
					<div class="thm-top-logo">
				
						<?php if(get_field('hm_logo', 'option')): ?>
							<a href="<?php the_field('hm_link', 'option'); ?>" class="navbar-brand custom-logo-link">
								<?php echo wp_get_attachment_image( get_field('hm_logo', 'option'), 'full' ); ?>
							</a>
						<?php endif; ?>
						
					</div>
					<div class="user-wrapper">
						<div class="user">
							<a href="<?php the_field('hm_lg_link', 'option'); ?>" class="login d-flex align-items-center">
								<i class="user-icon" aria-hidden="true"></i>
								<div class="montserrat font-semi">
									Log In
								</div>
							</a>
						</div>
					</div>
					<?php /* if(!is_page_template('page-health-mummy.php')):?>
					<div class="handcarf-wrapper">
						<div class="handcarf d-flex justify-content-end">
							<div>
								<div class="open-sans">
									<?php 
									$text = empty(get_field('top_handcraft', 'option')) ? 'HANDCRAFTED BY' : get_field('top_handcraft', 'option'); 
									?>
								<?php echo $text; ?>:</div>
								<?php if(get_field('top_cg_logo', 'option')): ?>
									<div class="cg-logo">
										<a href="<?php the_field('cg_link', 'option'); ?>">
											<?php echo wp_get_attachment_image( get_field('top_cg_logo', 'option'), 'full' ); ?>
										</a>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<?php endif; */ ?>
				</div>
			<?php if ( 'container' == $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

	</div><!-- #wrapper-navbar end -->