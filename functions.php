<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

require get_stylesheet_directory() . '/inc/custom-comments.php';
require get_stylesheet_directory() . '/inc/custom-footer.php';
require get_stylesheet_directory() . '/inc/bootstrap-wp-navwalker-child.php';
require get_stylesheet_directory() . '/inc/custom-functions.php';

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

    // Get the theme data
    $the_theme = wp_get_theme();
    wp_enqueue_script( 'jquery');

    if(is_front_page() || is_page()){
        wp_enqueue_style('owl-carousel-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', [], $the_theme->get('Version'));
        wp_enqueue_style('owl-carousel-css-theme-default', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css', [], $the_theme->get('Version'));
        wp_enqueue_script('owl-carousel-js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', [], $the_theme->get('Version'), true);
    }
    wp_enqueue_style( 'child-v2-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'child-v2-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    if(is_page_template('page-templates/page-one-time-order.php') || is_page_template('page-templates/page-f45-order.php')){
        wp_enqueue_style( 'child-understrap-one-time-order-menu-styles', get_stylesheet_directory_uri() . '/assets/menu-single/style.css', array(), $the_theme->get( 'Version' ) );
        wp_enqueue_script( 'child-understrap-one-time-order-menu-script', get_stylesheet_directory_uri() . '/assets/menu-single/script.js', array(), $the_theme->get( 'Version' ));


        wp_enqueue_style( 'child-understrap-one-time-order-styles', get_stylesheet_directory_uri() . '/assets/slick-slider/slick.css', array(), $the_theme->get( 'Version' ) );
        wp_enqueue_script( 'child-understrap-one-time-order-script', get_stylesheet_directory_uri() . '/assets/slick-slider/slick.min.js', array(), $the_theme->get( 'Version' ));
    }

    if(is_page_template('page-templates/page-health-mummy.php')){

        wp_enqueue_style( 'child-understrap-health-mummy-styles', get_stylesheet_directory_uri() . '/css/custom-style-health-mummy.css', array(), $the_theme->get( 'Version' ) );

        wp_enqueue_script( 'child-understrap-health-mummy-script', get_stylesheet_directory_uri() . '/js/health-mummy.js', array(), $the_theme->get( 'Version' ), true);
    }

    if(is_page_template('page-templates/page-faq_v3.php')){

        wp_enqueue_style( 'child-understrap-faq-v3-styles', get_stylesheet_directory_uri() . '/css/custom-style-faq_v3.css', array(), $the_theme->get( 'Version' ) );

    }
    if(is_page_template('page-templates/page-landing.php')){

        wp_enqueue_style( 'child-understrap-landing-styles', get_stylesheet_directory_uri() . '/css/custom-style-landing.css', array(), $the_theme->get( 'Version' ) );

    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

if( function_exists('acf_add_options_page') ) {

    $option_page = acf_add_options_page(array(
        'page_title' 	=> 'Sitewide Settings',
        'menu_title' 	=> 'Sitewide Settings',
        'menu_slug' 	=> 'sitewide_settings',
        'capability' 	=> 'edit_posts',
        'redirect' 	=> false
    ));
    acf_add_options_sub_page('F45 Header Settings');
    acf_add_options_sub_page('Review Section');
    acf_add_options_sub_page('About Us Section');
    acf_add_options_sub_page('How it Works Section');
    acf_add_options_sub_page('Order Modal Info');
    acf_add_options_sub_page('The Good Crew');
    acf_add_options_sub_page('Top Meal Plans Section');
}

function get_cg_menu( $atts ) {
    $atts = shortcode_atts( array(
        'product_id' => 0,
        'one_time' => 0,
        'force_coupon' => '',
        'force_preorder' => 0,
        'force_prepay' => 0,
        'hide_pricing' => 0,
        'pre_order_type' => ''
    ), $atts, 'get_menu' );

    $output = 'Menu Not Currently Available!';
    if( $atts['product_id'] > 0){
        $response = wp_remote_get('https://menu.chefgood.com.au/wp-admin/admin-ajax.php?action=pullmenu&key=nf23o8rfnkvw8yf4inw38&product_id=' .  $atts['product_id'].'&one_time='.$atts['one_time'].'&force_coupon='.$atts['force_coupon'].'&force_preorder='.$atts['force_preorder'].'&hide_pricing='.$atts['hide_pricing'].'&force_prepay='.$atts['force_prepay'].'&pre_order_type='.$atts['pre_order_type']);
        if ( is_array( $response ) ) {
            $response = json_decode($response['body'], true);
            if(isset($response['status']) && $response['status'] == 'success') {

                $output = html_entity_decode($response['html']);

            }
        }
    }
    //print_r($output);
    return $output; die;

}
add_shortcode( 'get_menu', 'get_cg_menu' );

function get_cg_delivery_days() {
    $output = '';

    $response = wp_remote_get('https://menu.chefgood.com.au/wp-admin/admin-ajax.php?action=pulldelivery_days&key=nf23o8rfnkvw8yf4inw38');
    $response = json_decode($response['body'], true);
    $output = "";
    if(isset($response['success']) && $response['success'] == true) {
        $output = $response['html'];
    }

    return $output;

}
add_shortcode( 'get_delivery_days', 'get_cg_delivery_days' );
add_action( 'wp_ajax_pstcdchk', 'is_delivery_provided_area' );
add_action( 'wp_ajax_nopriv_pstcdchk', 'is_delivery_provided_area' );
function is_delivery_provided_area(){
    $page_url = get_permalink(sanitize_text_field($_POST['post_id']));
    $remote_url = get_remote_url($page_url, '/api/v1/delivery-zone-by-postcode/');

    $output = array('status' => 'fail', 'delivery_day' => '', 'msg' => 'Error!', 'remote_ur'=>$remote_url, 'page_url'=>$page_url);
    if(isset($_POST['postcode']) && $_POST['postcode'] != ''){
        $response = wp_remote_get($remote_url . $_POST['postcode']);
        if ( is_array( $response ) ) {
			$response_arr = json_decode($response['body'], true);
			
			if(count($response_arr['success']['data']) > 0) {
				$output['status'] = "success";
				$output['delivery_day'] = "";
				$output['msg'] = "Congratulations! We deliver to your area on ";
				foreach($response_arr['success']['data'] as $area) {
					foreach($area as $time) {
						if($output['delivery_day'] != "") {
							$output['delivery_day'] .= ", ";
							$output['msg'] .= " and ";
						}
						$output['delivery_day'] .= ($time['time_label'] != '') ? $time['time_label'] : $time['delivery_day'];
						$output['msg'] .= $time['time_label'];
					}
				}
			}
			
			$output = json_encode($output);
        }
    }else{
        $output = json_encode($output);
    }
    echo $output; die;
}

add_action( 'wp_ajax_pstcdchk_signup', 'do_delivery_check_sign_up' );
function do_delivery_check_sign_up(){
    $page_url = get_permalink(sanitize_text_field($_POST['post_id']));
    $remote_url = get_remote_url($page_url, '/api/v1/customer/subscribe/');

    $output = array('status' => 'fail', 'msg' => 'Error!', 'remote_ur'=>$remote_url, 'page_url'=>$page_url);
    if (isset($_POST['postcodecheckemail']) && filter_var($_POST['postcodecheckemail'], FILTER_VALIDATE_EMAIL)) {
        $data = [
            'email' => $_POST['postcodecheckemail'], 
            'firstname' => $_POST['postcodecheckname'],
            'rel' => 'delivery-check',
        ];

        $options = [
            'body'        => $data,
        ];
        $response = wp_remote_get($remote_url, $options);
        if ( is_array( $response ) ) {
            $response_arr = json_decode($response['body'], true);
            
            if($response_arr['success']) {
                $output['status'] = "success";
                $output['msg'] = $response_arr['message'];
            }
            
            $output = json_encode($output);
        }
    }else{
        $output = json_encode($output);
    }
    echo $output; die;
}

function get_remote_url($page_url, $endpoint) {
    if(strpos($page_url, 'thm') !== false || strpos($page_url, 'healthy-mummy') !== false){
        $remote_url = 'https://healthymummy.chefgood.com.au' . $endpoint;
    }
    elseif(strpos($page_url, 'f45') !== false) {
        $remote_url = 'https://f45challenge.chefgood.com.au' . $endpoint;
    }
    elseif(strpos($page_url, 'vision') !== false) {
        $remote_url = 'https://visionreadymeals.chefgood.com.au' . $endpoint;
    }
    elseif(strpos($page_url, 'samwood') !== false || strpos($page_url, 'sam-wood') !== false) {
        $remote_url = 'https://samwood.chefgood.com.au' . $endpoint;
    }
    else {
        $remote_url = 'https://system2.chefgood.com.au' . $endpoint;
    }

    return $remote_url;
}

function opt_in_popup() {
    global $post;
    $on = get_field('turn_on_popup', 'option');
    $excluded_pages  = get_field('exclude_popup', 'option');
    $ex_pages_arr = [];

    if(!empty($excluded_pages)){
        foreach($excluded_pages as $ex_page){
            $ex_pages_arr[] = $ex_page->ID;
            //children
            $args = array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'post_parent'    => $ex_page->ID,
                'order'          => 'ASC',
                'orderby'        => 'menu_order'
            );

            $children = new WP_Query( $args );

            if(!empty($children)){
                foreach($children->posts as $child){
                    $ex_pages_arr[] = $child->ID;
                }
            }
        }
    }

    if($on === true && (empty($excluded_pages) || (!empty($excluded_pages) && !in_array($post->ID, $ex_pages_arr)))){
        $timing = get_field('timing', 'option') != "" ? (int)get_field('timing', 'option') * 1000 : 20000;
        $rest_period = get_field('rest_period', 'option') != "" ? get_field('rest_period', 'option'): 12;
        $form_id = get_field('form_id', 'option');
        $centered  = !wp_is_mobile() ? 'modal-dialog-centered' : "";
        $banner_img_id = get_field('header_image', 'option');
        $bottom_text = get_field('bottom_text', 'option');

        ob_start();
        ?>
        <div class="modal" tabindex="-1" role="dialog" id="opt_in_popup">
            <div class="modal-dialog <?php echo $centered; ?>" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 p-1">
                                <div class="feat_img">
                                    <a href="#" class="close_popup"></a>
                                    <?php
                                    if( $banner_img_id) {
                                        echo wp_get_attachment_image( $banner_img_id,'large');
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-1 text-center">
                                <p class="mb-0 font-weight-bold text-heading">Enter your details below for a chance to win:</p>
                            </div>
                        </div>
                        <?php echo do_shortcode('[gravityform id='.$form_id.' title=false description=false ajax=true]'); ?>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a href="#" class="text-underline black no_thanks">No Thanks</a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 text-center">
                                <?php echo $bottom_text; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            jQuery(document).ready(function($){

                var win_week_no = getCookie('win_week_no');
                var win_week_yes = getCookie('win_week_yes');
                var form_id = '<?php echo $form_id;?>';

                setTimeout(function(){
                    if(win_week_no != 'yes' && win_week_yes != 'yes'){
                        $('#opt_in_popup').modal({backdrop: 'static', keyboard: false});
                    }
                },<?php echo $timing; ?>);

                $('.close_popup, .no_thanks').on('click', function(e){
                    e.preventDefault();
                    createCookie("win_week_no", 'yes', <?php echo $rest_period; ?>);
                    $('#opt_in_popup').modal('hide');
                });

                $(document).bind('gform_confirmation_loaded', function(event, form_id){
                    if(form_id == form_id ){
                        createCookie("win_week_yes", 'yes', 8760);
                        $('#opt_in_popup').modal('hide');
                    }
                });

                function getCookie(cname) {
                    var name = cname + "=";
                    var ca = document.cookie.split(';');
                    for(var i = 0; i < ca.length; i++) {
                        var c = ca[i];
                        while (c.charAt(0) == ' ') {
                            c = c.substring(1);
                        }
                        if (c.indexOf(name) == 0) {
                            return c.substring(name.length, c.length);
                        }
                    }
                    return "";
                }

                function createCookie(name, value, hours){
                    var date = new Date();
                    date.setTime(date.getTime()+(hours*60*60*1000));
                    var expires = "expires="+date.toUTCString();
                    document.cookie = name + "=" + value + ";" + expires + ";path=/";
                }
            });
        </script>
        <?php
        $data = ob_get_contents();
        ob_end_clean();
        echo $data;
    }
}
add_action( 'wp_footer', 'opt_in_popup' );