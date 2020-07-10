<?php
if ( ! function_exists( 'understrap_child_v2_widgets_init' ) ) {
    /**
     * Initializes themes widgets.
     */
    function understrap_child_v2_widgets_init() {

        register_sidebar( array(
            'name'          => __( 'Footer Partnership Full ', 'understrap' ),
            'id'            => 'footerpartnershipfull',
            'description'   => 'Widget area below main content and above footer',
            'before_widget'  => '<div id="%1$s" class="footer-widget %2$s '. understrap_slbd_count_widgets( 'footerpartnershipfull' ) .'">',
            'after_widget'   => '</div><!-- .footer-widget -->',
            'before_title'   => '<h3 class="widget-title">',
            'after_title'    => '</h3>',
        ) );

        register_sidebar( array(
            'id'            => 'footer-privacy',
            'name'          => __( 'Footer Term and Privacy Menu' ),
            'description'   => __( 'Appears in the footer section of the site.' ),
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
            'before_widget'  => '<div id="%1$s" class="footer-widget %2$s '. understrap_slbd_count_widgets( 'footerpartnershipfull' ) .'">',
            'after_widget'  => '</div>',
        ) );
    }
} // endif function_exists( 'understrap_widgets_init' ).
add_action( 'widgets_init', 'understrap_child_v2_widgets_init' );