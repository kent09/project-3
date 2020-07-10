<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>
<?php get_sidebar( 'footerpartnershipfull' ); ?>
<div class="wrapper" id="wrapper-footer">

    <div class="<?php echo esc_attr( $container ); ?>">

        <div class="row">

            <div class="col-md-12">

                <footer class="site-footer" id="colophon">

                    <div class="site-info">
                        <p>
                            &copy; Chefgood 2015-<?php echo date('Y'); ?>
                            <span class="pull-right">
                               Shop securely with
                               <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon_visa.jpg" width="50" height="20" class="attachment-medium size-medium visa" alt="" data-lazy-loaded="true">
                               <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon_mastercard.jpg" width="50" height="36" class="attachment-medium size-medium mastercard" alt="" data-lazy-loaded="true">
                           </span>
                        </p>
                    </div><!-- .site-info -->

                </footer><!-- #colophon -->

            </div><!--col end -->

        </div><!-- row end -->

    </div><!-- container end -->

</div><!-- wrapper end -->
<!-- wrapper end -->
</div><!-- #page we need this extra closing tag here -->
<?php wp_footer(); ?>
<?php if ( !is_page_template('contactpage.php') ) {  ?>
    <script src="<?php echo get_site_url(); ?>/wp-content/themes/understrap-child/js/jquery.isotope.min.js"></script>
    <script>
        jQuery(function(){

            var $container = jQuery('#container'),
                $checkboxes = jQuery('#filters input');

            $container.isotope({
                itemSelector: '.custom_food'
            });
            // get Isotope instance
            var isotope = $container.data('isotope');
            // add even classes to every other visible item, in current order
            function addEvenClasses() {
                isotope.$filteredAtoms.each( function( i, elem ) {
                    jQuery(elem)[ ( i % 2 ? 'addClass' : 'removeClass' ) ]('even')
                });
            }

            $checkboxes.change(function(){
                var filters = [];
                // get checked checkboxes values
                $checkboxes.filter(':checked').each(function(){
                    filters.push( this.value );
                });
                // ['.red', '.blue'] -> '.red, .blue'
                filters = filters.join(', ');
                $container.isotope({ filter: filters });
                addEvenClasses();
            });

            jQuery('#shuffle').click(function(){
                $container.isotope('shuffle');
                addEvenClasses();
            });

        });

    </script>
<?php } ?>
<?php include_once get_stylesheet_directory() . '/inc/delivery_check.php';?>
</body>
</html>

