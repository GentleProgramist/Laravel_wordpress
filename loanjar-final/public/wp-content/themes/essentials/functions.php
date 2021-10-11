<?php
/**
 * essentials functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package essentials
 */

use App\Models\ApiCaller;
use App\Models\CurlHelper;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use UPing\Application;

define('ESSENTIALS_THEME_VERSION', '2.0.6');


if (!function_exists('essentials_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function essentials_setup()
    {
        /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on essentials, use a find and replace
        * to change 'essentials' to the name of your theme in all the template files.
        */
        load_theme_textdomain('essentials', get_template_directory() . '/languages');


        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        add_theme_support('post-formats', array('quote', 'video', 'audio', 'link'));

        /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
        add_theme_support('title-tag');

        /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_attr__('Primary', 'essentials'),
        ));

        /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('essentials_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));

        /**
         * Add support for wide alignment.
         *
         * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#wide-alignment
         */
        add_theme_support('align-wide');

        // EditURI link
        remove_action('wp_head', 'rsd_link');
        // windows live writer
        remove_action('wp_head', 'wlwmanifest_link');
        // links for adjacent posts
        remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
        // WP version
        remove_action('wp_head', 'wp_generator');

    }
endif;
add_action('after_setup_theme', 'essentials_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function essentials_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('essentials_content_width', 640);
}

add_action('after_setup_theme', 'essentials_content_width', 0);

if (!function_exists('vc_custom_css')) {
    function vc_custom_css($id)
    {
        $shortcodes_custom_css = get_post_meta($id, '_wpb_shortcodes_custom_css', true);
        if (!empty($shortcodes_custom_css)) {
            return esc_attr($shortcodes_custom_css);
        }
    }
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function essentials_widgets_init()
{
    register_sidebar(array(
        'name' => esc_attr__('Main Sidebar', 'essentials'),
        'id' => 'sidebar-1',
        'description' => esc_attr__('Add widgets here.', 'essentials'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h5 class="font-weight-bold text-heading-default widget-title2 pix-mb-10">',
        'after_title' => '</h5>',
    ));

    if (pix_get_option('pix_sidebars')) {
        if (!empty(pix_get_option('pix_sidebars'))) {
            $sidebars = pix_get_option('pix_sidebars');
            foreach ($sidebars as $key => $value) {
                if ($value != '') {
                    $sideID = str_replace(' ', '', strtolower($value));
                    $sideID = preg_replace('/[^A-Za-z0-9\-]/', '', $sideID);
                    $sideID = sanitize_title($sideID);
                    $sideID = 'sidebar-' . $sideID;
                    register_sidebar(array(
                        'name' => $value,
                        'id' => $sideID,
                        'description' => esc_attr__('Add widgets here.', 'essentials'),
                        'before_widget' => '<section id="%1$s" class="widget %2$s">',
                        'after_widget' => '</section>',
                        'before_title' => '<h5 class="font-weight-bold text-heading-default pix-mb-10">',
                        'after_title' => '</h5>',
                    ));
                }
            }
        }
    }
}

add_action('widgets_init', 'essentials_widgets_init');

// if(function_exists('allow_url_fopen')){
// 	var_dump("YES");
// }else{
// 	var_dump("NO");
// }
/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Functions which enhance the theme posts by hooking into WordPress.
 */
require get_template_directory() . '/inc/post-functions.php';
require get_template_directory() . '/inc/portfolio-functions.php';
require get_template_directory() . '/inc/header-functions.php';

/**
 * Enqueue scripts and styles.
 */
function essentials_scripts()
{


    $pageTransition = 'default';
    if (!empty(pix_get_option('site-page-transition'))) {
        $pageTransitionVal = pix_get_option('site-page-transition');
        if ($pageTransitionVal == 'fade-page-transition') {
            $pageTransition = 'fade';
        } elseif ($pageTransitionVal == 'disable-page-transition') {
            $pageTransition = 'disable';
        }
    }
    $introStyle = '
	 body:not(.render) .pix-overlay-item {
		 opacity: 0 !important;
	 }
	 body:not(.pix-loaded) .pix-wpml-header-btn {
		 opacity: 0;
	 }';

    $pageTransitionColor = '#ffffff';
    if (!empty(pix_get_option('site-page-transition-color'))) {
        $pageTransitionColor = pix_get_option('site-page-transition-color');
    }
    if ($pageTransition == 'fade') {
        $introStyle .= '
		 html:not(.render) {
			 background: ' . $pageTransitionColor . '  !important;
		 }
		 .pix-page-loading-bg:after {
			 content: " ";
			 position: fixed;
			 top: 0;
			 left: 0;
			 width: 100vw;
			 height: 100vh;
			 display: block;
			 pointer-events: none;
			 transition: opacity .16s ease-in-out;
			 z-index: 99999999999999999999;
			 opacity: 1;
			 background: ' . $pageTransitionColor . ' !important;
		 }
		 body.render .pix-page-loading-bg:after {
			 opacity: 0;
		 }
	 	 ';
    } elseif ($pageTransition == 'default') {
        $introStyle .= '
		 html:not(.render) {
			 background: ' . $pageTransitionColor . '  !important;
		 }
 		 .pix-page-loading-bg:after {
 			 content: " ";
 			 position: fixed;
 			 top: 0;
 			 left: 0;
 			 width: 100vw;
 			 height: 100vh;
 			 display: block;
 			 background: ' . $pageTransitionColor . ' !important;
 			 pointer-events: none;
 			 transform: scaleX(1);
 			 // transition: transform .2s ease-in-out;
 			 transition: transform .2s cubic-bezier(.27,.76,.38,.87);
 			 transform-origin: right center;
 			 z-index: 99999999999999999999;
 		 }
 		 body.render .pix-page-loading-bg:after {
 			 transform: scaleX(0);
 			 transform-origin: left center;
 		 }';
    }


    $footer = false;
    if (!empty(pix_get_option('pix-footer'))) {
        $footer = pix_get_option('pix-footer');
    }
    $pagePostTypes = array('page', 'post', 'portfolio');
    $pagePostTypes = apply_filters('pixfort_page_options_post_types', $pagePostTypes);
    if (in_array(get_post_type(), $pagePostTypes)) {
        if (get_post_meta(get_the_ID(), 'pix-disable-wp-block-library', true)) {
            wp_dequeue_style('wp-block-library');
            wp_dequeue_style('wp-block-library-theme');
            wp_dequeue_style('wc-block-style'); // Remove WooCommerce block CSS
        }
        if (get_post_meta(get_the_ID(), 'pix-page-footer', true)) {
            $footer = get_post_meta(get_the_ID(), 'pix-page-footer', true);
        }
    }


    if ($footer) {
        $post = get_post($footer);


        if (defined('WPB_VC_VERSION')) {
            // WP Bakery
            $introStyle .= vc_custom_css($footer);
        }
        wp_reset_postdata();
    }

    wp_register_style('pix-intro-handle', false);
    wp_enqueue_style('pix-intro-handle');
    wp_add_inline_style('pix-intro-handle', $introStyle);


    // wp_enqueue_script( 'pix-lightbox', get_template_directory_uri() . '/js/build/jquery.fancybox.min', array('jquery'), ESSENTIALS_THEME_VERSION, true );
    wp_enqueue_script('pix-popper-js', get_template_directory_uri() . '/js/build/popper.min.js', array('jquery'), ESSENTIALS_THEME_VERSION, true);
    wp_enqueue_script('pix-bootstrap-js', get_template_directory_uri() . '/js/build/bootstrap.min.js', array('jquery', 'pix-popper-js'), ESSENTIALS_THEME_VERSION, true);
    wp_enqueue_script('pix-bootstrap-select-js', get_template_directory_uri() . '/js/build/bootstrap-select.min.js', array('jquery'), ESSENTIALS_THEME_VERSION, true);
    wp_enqueue_script('pix-flickity-js', get_template_directory_uri() . '/js/build/flickity.pkgd.min.js', false, ESSENTIALS_THEME_VERSION, true);
    wp_enqueue_script('pix-main-essentials', get_template_directory_uri() . '/js/essentials.min.js', array('jquery', 'jquery-ui-core', 'pix-bootstrap-js', 'pix-flickity-js'), ESSENTIALS_THEME_VERSION, true);
    if (class_exists('WooCommerce')) {
        wp_enqueue_script('pix-woo-essentials', get_template_directory_uri() . '/js/modules/woo.min.js', array('jquery'), ESSENTIALS_THEME_VERSION, true);
    }


    $main_values = array();
    $main_values['name'] = 'mainVals';
    if (pix_get_option('pix-exit-popup')) {
        if (pix_show_exit_popup()) {
            $nonce = wp_create_nonce("popup_nonce");
            $exit_link = admin_url('admin-ajax.php?action=pix_popup_content&id=' . pix_get_option('pix-exit-popup') . '&nonce=' . $nonce . '&exitpopup=true');
            $main_values['dataExitPopup'] = $exit_link;
        }
    }
    if (pix_get_option('pix-automatic-popup')) {
        if (pix_show_automatic_popup()) {
            $nonce = wp_create_nonce("popup_nonce");
            $link = admin_url('admin-ajax.php?action=pix_popup_content&id=' . pix_get_option('pix-automatic-popup') . '&nonce=' . $nonce . '&autopopup=true');
            $exit_data = pix_get_option('pix-automatic-popup-time');
            $main_values['dataAutoPopup'] = $link;
            $main_values['dataAutoPopupTime'] = $exit_data;

        }
    }
    $main_values['dataPopupBase'] = admin_url('admin-ajax.php?action=pix_popup_content');

    $pix_overlay = 'pix-overlay-2';
    if (pix_get_option('search-style')) {
        $pix_overlay = 'pix-overlay-' . pix_get_option('search-style');
    }
    $main_values['dataPixOverlay'] = $pix_overlay;
    $check_nonce = wp_create_nonce("popup_nonce");
    $popup_check_link = admin_url('admin-ajax.php?action=pix_check_popup_status&nonce=' . $check_nonce);
    $main_values['dataPopupCheckLink'] = $popup_check_link;
    if (class_exists('WooCommerce')) {
        $woo_msg = esc_attr__('The item has been added to your shopping cart!', 'essentials');
        $main_values['dataAddCartMsg'] = $woo_msg;
    }
    if (pix_get_option('pix-body-bg-color')) {
        if (pix_get_option('pix-body-bg-color') == 'custom') {
            $main_values['dataBodyBg'] = pix_get_option('custom-body-bg-color');
        }
    }
    if (pix_get_option('pix-enable-cookies')) {
        if (pix_get_option('pix-cookies-id')) {
            $main_values['datacookiesId'] = pix_get_option('pix-cookies-id');
        }
    }
    if (pix_get_option('pix-mobile-breakpoint')) {
        if (pix_get_option('pix-mobile-breakpoint')) {
            $main_values['dataBreakpoint'] = (int)pix_get_option('pix-mobile-breakpoint');
        }
    }

    if (!empty(pix_get_option('google-api-key'))) {
        $main_values['googleMapsUrl'] = '//maps.googleapis.com/maps/api/js?key=' . pix_get_option('google-api-key');
        if (function_exists('get_rocket_cdn_url')) {
            $main_values['googleMapsScript'] = get_rocket_cdn_url(get_template_directory_uri() . '/js/build/pix-map.js');
        } else {
            $main_values['googleMapsScript'] = get_template_directory_uri() . '/js/build/pix-map.js';
        }

    }
    if (function_exists('get_rocket_cdn_url')) {
        $main_values['lightboxUrl'] = get_rocket_cdn_url(get_template_directory_uri() . '/js/build/jquery.fancybox.min.js');
        $main_values['isotopeUrl'] = get_rocket_cdn_url(get_template_directory_uri() . '/js/build/isotope.pkgd.min.js');
        // $main_values['sliderUrl'] = get_rocket_cdn_url(get_template_directory_uri() .'/js/build/flickity.pkgd.min.js');
        $main_values['searchUrl'] = get_rocket_cdn_url(get_template_directory_uri() . '/js/build/bootstrap-autocomplete.min.js');
    } else {
        $main_values['lightboxUrl'] = get_template_directory_uri() . '/js/build/jquery.fancybox.min.js';
        $main_values['isotopeUrl'] = get_template_directory_uri() . '/js/build/isotope.pkgd.min.js';
        // $main_values['sliderUrl'] = get_template_directory_uri() .'/js/build/flickity.pkgd.min.js' ;
        $main_values['searchUrl'] = get_template_directory_uri() . '/js/build/bootstrap-autocomplete.min.js';
    }

    wp_localize_script('pix-main-essentials', 'pixfort_main_object', $main_values);

    // wp_dequeue_style( 'fontawesome' );
    // wp_deregister_style( 'fontawesome' );
    wp_dequeue_style('yith-wcwl-font-awesome');
    wp_deregister_style('yith-wcwl-font-awesome');


    if (!empty(pix_get_option('pix-enable-cf7-css'))) {
        wp_dequeue_style('contact-form-7');
        wp_deregister_style('contact-form-7');
    }

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    if (!empty(pix_get_option('pix-custom-js-header'))) {
        wp_register_script('essentials-options-script-header', false, false, ESSENTIALS_THEME_VERSION);
        wp_enqueue_script('essentials-options-script-header');
        wp_add_inline_script('essentials-options-script-header', pix_get_option('pix-custom-js-header'));
    }
    // Bootstrap
    wp_enqueue_style('essentials-bootstrap', get_template_directory_uri() . '/inc/scss/bootstrap.min.css');
    wp_register_style('pix-lightbox-css', get_template_directory_uri() . '/css/build/jquery.fancybox.min.css');
//    wp_enqueue_style( 'fontawesome' );
}

add_action('wp_enqueue_scripts', 'essentials_scripts', 10);

// function wpd_testimonials_query( $query ){
//     if( $query->is_main_query() ){
//             $query->set( 'posts_per_page', 2 );
//     }
// }
// add_action( 'pre_get_posts', 'wpd_testimonials_query' );

function pix_get_icons_url()
{
    $iconsLibrary = 'main';
    if (!empty(pix_get_option('opt-ions-library'))) {
        $iconsLibrary = pix_get_option('opt-ions-library');
    }
    switch ($iconsLibrary) {
        case 'basic':
            return get_template_directory_uri() . '/css/build/pixicon-basic/style.min.css';
            break;
        case 'light':
            return get_template_directory_uri() . '/css/build/pixicon-light/style.min.css';
            break;
    }
    return get_template_directory_uri() . '/css/build/pixicon-main/style.min.css';
}

function essentials_add_styles()
{
    if (!function_exists('essentials_core_plugin')) {
        wp_enqueue_style('essentials-default-style', get_template_directory_uri() . '/css/pix-essentials-style.css');
        wp_enqueue_style('pix-external-font-1', 'https://fonts.googleapis.com/css2?family=Manrope&family=Poppins&display=swap', false);
    }
    wp_enqueue_style('pix-flickity-style', get_template_directory_uri() . '/css/build/flickity.min.css', false, ESSENTIALS_THEME_VERSION, 'all');
    // wp_enqueue_style( 'essentials-pixicon-font', get_template_directory_uri() .'/css/build/style.css', false, ESSENTIALS_THEME_VERSION, 'all' );
    $iconsLibrary = 'main';
    if (!empty(pix_get_option('opt-ions-library'))) {
        $iconsLibrary = pix_get_option('opt-ions-library');
    }
    switch ($iconsLibrary) {
        case 'basic':
            wp_enqueue_style('essentials-pixicon-font-basic', get_template_directory_uri() . '/css/build/pixicon-basic/style.min.css', false, ESSENTIALS_THEME_VERSION, 'all');
            break;
        case 'light':
            wp_enqueue_style('essentials-pixicon-font-light', get_template_directory_uri() . '/css/build/pixicon-light/style.min.css', false, ESSENTIALS_THEME_VERSION, 'all');
            break;
        default:
            wp_enqueue_style('essentials-pixicon-font', get_template_directory_uri() . '/css/build/pixicon-main/style.min.css', false, ESSENTIALS_THEME_VERSION, 'all');
            break;
    }
    // wp_enqueue_style( 'essentials-pixicon-font', get_template_directory_uri() .'/css/build/pixicon-basic/style.min.css', false, ESSENTIALS_THEME_VERSION, 'all' );
    wp_enqueue_style('pix-popups-style', get_template_directory_uri() . '/css/jquery-confirm.min.css', false, ESSENTIALS_THEME_VERSION, 'all');
    wp_enqueue_style('essentials-select-css', get_template_directory_uri() . '/css/build/bootstrap-select.min.css', false, ESSENTIALS_THEME_VERSION, 'all');

    if (is_user_logged_in()) wp_enqueue_style('pix-theme-admin-style', get_template_directory_uri() . '/css/pix-admin.css');
}

// $pageTransition = 'default';
// if(!empty(pix_get_option('site-page-transition'))){
// 	$pageTransitionVal = pix_get_option('site-page-transition');
// 	if($pageTransitionVal=='fade-page-transition'){
// 		$pageTransition = 'fade';
// 	}elseif ($pageTransitionVal=='disable-page-transition') {
// 		$pageTransition = 'disable';
// 	}
// }
// if($pageTransition=='disable' || true){
add_action('wp_enqueue_scripts', 'essentials_add_styles', 11);
// }else{
// 	add_action( 'wp_footer', 'essentials_add_styles', 10 );
// }

function pix_theme_footer_extras()
{
    if (defined('DOING_AJAX') && DOING_AJAX) {
        return false;
    }
    echo essentials_search_overlay();
    essentials_footer_extras();
    if (pix_get_option('pix-enable-cookies')) {
        if (pix_show_cookies()) {
            get_template_part('template-parts/cookies');
        }
    }
}

add_action('wp_footer', 'pix_theme_footer_extras', 10);


function pix_theme_params()
{
    return array(
        'name' => 'Essentials',
        'slug' => 'essentials',
    );
}


function pix_add_footer_styles()
{

    if (!empty(pix_get_option('pix-custom-js-footer'))) {
        wp_register_script('essentials-options-script-footer', false, false, ESSENTIALS_THEME_VERSION);
        wp_enqueue_script('essentials-options-script-footer');
        wp_add_inline_script('essentials-options-script-footer', pix_get_option('pix-custom-js-footer'));
    }

}

add_action('wp_footer', 'pix_add_footer_styles', 10);
function pix_add_footer_custom_styles()
{
    if (defined('DOING_AJAX') && DOING_AJAX) {
        return false;
    }
    if (!empty(pix_get_option('pic-custom-css'))) {
        wp_register_style('pix-custom-css', false);
        wp_enqueue_style('pix-custom-css');
        wp_add_inline_style('pix-custom-css', pix_get_option('pic-custom-css'));
    }
}

add_action('wp_footer', 'pix_add_footer_custom_styles', 12);


// Register Admin Script
function pix_theme_admin_scripts()
{
    wp_enqueue_script('media-upload');
    wp_enqueue_media();
    wp_enqueue_style('pix-header-confirm', get_template_directory_uri() . '/css/jquery-confirm.min.css', false, ESSENTIALS_THEME_VERSION, 'all');

    wp_enqueue_script('pix-admin-confirm', get_template_directory_uri() . '/js/jquery-confirm.min.js', array('jquery'), ESSENTIALS_THEME_VERSION, true);
    wp_enqueue_script('pix-admin-script', get_template_directory_uri() . '/js/pix-admin.min.js', array(), ESSENTIALS_THEME_VERSION, true);
    $icons_admin = pix_admin_icons();
    $icons = [];
    if (function_exists('vc_iconpicker_type_pixicons')) {
        $icons = vc_iconpicker_type_pixicons(array());
    }
    wp_localize_script('pix-admin-script', 'pix_admin_opts_object', array(
        'PIX_ICONS' => $icons,
        'PIX_ICONS_ADMIN' => $icons_admin,
    ));

}


// Hook into the 'admin_enqueue_scripts' action
add_action('admin_enqueue_scripts', 'pix_theme_admin_scripts');

function pix_redux_admin_scripts()
{
    wp_enqueue_style('pix-theme-admin-style', get_template_directory_uri() . '/css/pix-admin.css', false, ESSENTIALS_THEME_VERSION);
}

add_action('redux/page/pix_options/enqueue', 'pix_redux_admin_scripts');
add_action('admin_menu', 'pix_redux_admin_scripts');

require get_template_directory() . '/inc/config/hub-connect.php';

function pix_get_languages()
{
    $languages = apply_filters('wpml_active_languages', NULL, array('skip_missing' => 0));
    return $languages;
}

add_action('wp', 'pix_get_languages');

function pix_add_cpt_support()
{
    $cpt_support = get_option('elementor_cpt_support');
    if (!$cpt_support) {
        $cpt_support = ['page', 'post', 'pixfooter', 'pixpopup', 'portfolio'];
        update_option('elementor_cpt_support', $cpt_support);
    } else {
        if (!in_array('pixfooter', $cpt_support)) {
            $cpt_support[] = 'pixfooter';
            update_option('elementor_cpt_support', $cpt_support);
        }
        if (!in_array('pixpopup', $cpt_support)) {
            $cpt_support[] = 'pixpopup';
            update_option('elementor_cpt_support', $cpt_support);
        }
        if (!in_array('portfolio', $cpt_support)) {
            $cpt_support[] = 'portfolio';
            update_option('elementor_cpt_support', $cpt_support);
        }
    }
}

add_action('after_switch_theme', 'pix_add_cpt_support');


add_action('init', function () {
    if (function_exists('pll_register_string')) {
        if (pix_get_option('banner-text')) {
            pll_register_string('essentials-banner-text', pix_get_option('banner-text'));
        }
        if (pix_get_option('banner-btn-text')) {
            pll_register_string('essentials-banner-btn-text', pix_get_option('banner-btn-text'));
        }
        if (pix_get_option('pix-cookies-text')) {
            pll_register_string('essentials-cookies-text', pix_get_option('pix-cookies-text'));
        }
        if (pix_get_option('pix-cookies-btn')) {
            pll_register_string('essentials-cookies-btn', pix_get_option('pix-cookies-btn'));
        }
    } elseif (function_exists('icl_register_string')) {
        if (pix_get_option('banner-text')) {
            icl_register_string('Theme', 'essentials-banner-text', pix_get_option('banner-text'));
        }
        if (pix_get_option('banner-btn-text')) {
            icl_register_string('Theme', 'essentials-banner-btn-text', pix_get_option('banner-btn-text'));
        }
        if (pix_get_option('pix-cookies-text')) {
            icl_register_string('Theme', 'essentials-cookies-text', pix_get_option('pix-cookies-text'));
        }
        if (pix_get_option('pix-cookies-btn')) {
            icl_register_string('Theme', 'essentials-cookies-btn', pix_get_option('pix-cookies-btn'));
        }

    }

});

function pix_pll__($string = '')
{
    if (function_exists('pll__')) {
        return pll__($string);
    } else {
        return esc_attr($string);
    }
}

function theme_prefix_register_elementor_locations($elementor_theme_manager)
{
    $elementor_theme_manager->register_location('header');
    $elementor_theme_manager->register_location('footer');
}

add_action('elementor/theme/register_locations', 'theme_prefix_register_elementor_locations');


/**
 * WPML
 */
add_filter('wpml_pb_shortcode_encode', 'wpml_pb_shortcode_encode_urlencoded_json', 10, 3);
function wpml_pb_shortcode_encode_urlencoded_json($string, $encoding, $original_string)
{
    if ('urlencoded_json' === $encoding) {
        $output = array();
        foreach ($original_string as $combined_key => $value) {
            $parts = explode('_', $combined_key);
            $i = array_pop($parts);
            $key = implode('_', $parts);
            $output[$i][$key] = $value;
        }
        $string = urlencode(json_encode($output));
    }
    return $string;
}

add_filter('wpml_pb_shortcode_decode', 'wpml_pb_shortcode_decode_urlencoded_json', 10, 3);
function wpml_pb_shortcode_decode_urlencoded_json($string, $encoding, $original_string)
{
    if ('urlencoded_json' === $encoding) {
        $rows = json_decode(urldecode($original_string), true);
        $string = array();
        foreach ($rows as $i => $row) {
            foreach ($row as $key => $value) {
                $string[$key . '_' . $i] = array('value' => $value, 'translate' => true);
                // if ( in_array( $key, array( 'text', 'title', 'features', 'substring', 'btn_text', 'label', 'value', 'y_values' ) ) ) {
                //     $string[ $key . '_' . $i ] = array( 'value' => $value, 'translate' => true );
                // } else {
                //     $string[ $key . '_' . $i ] = array( 'value' => $value, 'translate' => false );
                // }
            }
        }
    }
    return $string;
}


/**
 * Dashboard
 */
if (is_admin()) require get_template_directory() . '/inc/dashboard.php';

/**
 * Media
 */
require get_template_directory() . '/inc/media.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load Bootstrap Navwalker.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

/**
 * Load required plugins
 */
if (is_admin()) require get_template_directory() . '/inc/plugins.php';

/**
 * Load demo content
 */

if (class_exists('OCDI_Plugin')) {
    if (is_admin()) require get_template_directory() . '/inc/demo.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
}

//require_once('../../../Helper/PostHelper.php');


function add_lead_log()
{
    $query = DB::table('lead_logs')->insertGetId([
        'vid' => $_REQUEST['vid'],
        'oid' => $_REQUEST['oid'],
        'transaction_id' => $_REQUEST['transaction_id'],
        'country_code' => 'us',
        'data' => json_encode($_REQUEST),
        'response' => ''
    ]);
    var_dump('HERE');

    $leadlogid = $query;

    return $leadlogid;
}



add_action('wp_ajax_process_us', 'handle_ajax_form_submit_request');
add_action('wp_ajax_nopriv_process_us', 'handle_ajax_form_submit_request');
function handle_ajax_form_submit_request()
{

    $obj = require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/essentials/UPing/UPing/PostHelper.php';

    $lender_response = $obj->returnresponse();
    var_dump($lender_response);
    die();


//        $this->response['application_response'] = (array)$application_status;
//        $this->response['validated'] = true;
//        $this->response['post_url'] = ($client_detail->status == '0') ? $client_detail->post_url_test : $client_detail->post_url_live;
//    }


    var_dump('HERE2');

//    return $response;
    var_dump('HERE3');
}

//function prep_data() {
//
//    $post = (object)[];
//    // Test mode parameter
//    $post->istest = $_POST['istest');
//    if($post->istest === null || trim($post->istest) === '') {
//        $post->istest = false;
//    }
//
//    // Facebook Pixel ID
//    $post->fbpix = $_POST['fbpix');
//    if($post->fbpix === null || trim($post->fbpix) === '') {
//        $post->fbpix = '';
//    }
//
//    // VID
//    $post->vid = $_POST['vid');
//    if($post->vid === null || trim($post->vid) === '') {
//        $post->vid = 'AFF_1';
//    }
//
//    // OID
//    $post->oid = $_POST['oid');
//    if($post->oid === null || trim($post->oid) === '') {
//        $post->oid = '1';
//    }
//    // Source
//    $post->transaction_id = $_POST['transaction_id') ?? 'DIRECT';
//    $post->aff_sub = $_POST['aff_sub') ?? null;
//    $post->aff_sub2 = $_POST['aff_sub2') ?? null;
//    $post->aff_sub3 = $_POST['aff_sub3') ?? null;
//    $post->aff_sub4 = $_POST['aff_sub4') ?? null;
//    $post->aff_sub5 = $_POST['aff_sub5') ?? null;
//
//    // Tier
//    $post->tier = '0';
//
//    $post->nameTitle = $_POST['nameTitle');
//    $post->incomeCycle = $_POST['incomeCycle');
////        dd($post->incomeCycle);
//
//    // DOB
//    $dateOfBirth = strtotime($_POST['dateOfBirth'));
//    $dateOfBirthDay = date('d', $dateOfBirth);
//    $dateOfBirthMonth = date('m', $dateOfBirth);
//    $dateOfBirthYear = date('Y', $dateOfBirth);
//
//    $post->dateOfBirthDay = $dateOfBirthDay;
//    $post->dateOfBirthMonth = $dateOfBirthMonth;
//    $post->dateOfBirthYear = $dateOfBirthYear;
////        dd($post->dateOfBirthDay']);
//
//    // Employer name
//    switch($_POST['incomeSource')) {
//        case 'SelfEmployed':
//        case 'Pension':
//        case 'DisabilityBenefits':
//        case 'Benefits':
//            $post->employerName = 'unemployed';
//            break;
//    }
//
//    // Employment industry
//    switch($_POST['incomeSource')) {
//        case 'Pension':
//        case 'DisabilityBenefits':
//        case 'Benefits':
//            $post->employerIndustry = 'None';
//            break;
//    }
//
//    // Job title
//    $post->jobTitle = $request->jobTitle ?? 'Not Available';
//
//    switch($_POST['incomeSource')) {
//        case 'Pension':
//        case 'DisabilityBenefits':
//        case 'Benefits':
//            $post->jobTitle = '';
//            break;
//    }
//
//    // nextPayDate
//    $nextPayDate = strtotime($_POST['nextPayDate1'));
//    $npd_day = date('d', $nextPayDate);
//    $npd_month = date('m', $nextPayDate);
//    $npd_year = date('Y', $nextPayDate);
//
//    $post->nextPayDateDay = $npd_day;
//    $post->nextPayDateMonth = $npd_month;
//    $post->nextPayDateYear = $npd_year;
//
//    // followingPayDate
//    $followingPayDate = strtotime($_POST['nextPayDate2'));
//    $fpd_day = date('d', $followingPayDate);
//    $fpd_month = date('m', $followingPayDate);
//    $fpd_year = date('Y', $followingPayDate);
//
//    $post->followingPayDateDay = $fpd_day;
//    $post->followingPayDateMonth = $fpd_month;
//    $post->followingPayDateYear = $fpd_year;
//
//    // Time at address
//    $post->monthsAtAddress = $_POST['monthsAtAddress');
////        dd($post->monthsAtAddress);
//    // Time in work
//    $post->monthsAtEmployer = $_POST['employmentMonth');
//
//    // HTTP Referrer
//    $post->userAgent = $request->header('user-agent');
//    $post->ipAddress = $request->ip();
//    $post->creationUrl = $request->url();
//    $post->referringUrl = $request->headers->get('referer');
//
//    // Address2
//    if($_POST['city') === null) {
//        $post->city = '';
//    }
//
//    // Terms
//    if($_POST['consentFinancial') === null) {
//        $post->consentFinancial = false;
//    } else {
//        $post->consentFinancial = true;
//    }
//    if($_POST['consentThirdPartyEmails') === null) {
//        $post->consentThirdPartyEmails = false;
//    } else {
//        $post->consentThirdPartyEmails = true;
//    }
//    if($_POST['consentThirdPartyPhone') === null) {
//        $post->consentThirdPartyPhone = false;
//    } else {
//        $post->consentThirdPartyPhone = true;
//    }
//    if($_POST['consentThirdPartySMS') === null) {
//        $post->consentThirdPartySMS = false;
//    } else {
//        $post->consentThirdPartySMS = true;
//    }
//
//    // SSN
//    $post->ssn = $_POST['ssn1') . $_POST['ssn2') . $_POST['ssn3');
//    $bankMonth = $_POST['bankMonth');
//    $bankYear = $_POST['bankYear');
//    $post->bankAccountLength = floor($bankYear * 12 + $bankMonth);
//    $post->incomePaymentType = $_POST['bankDirectDeposit');
//
//    return $post;
//}
//
//
//function map_data($post, $transaction_id) {
//
////        dd($transaction_id);
//    $this->mapped_data = (object)[];
//    $this->mapped_data->istest = false;
//    $this->mapped_data->vid = $post->vid;
//    $this->mapped_data->oid = $post->oid;
//    $this->mapped_data->transaction_id = $transaction_id;
//    $this->mapped_data->aff_sub = $post->aff_sub ?? '';
//    $this->mapped_data->aff_sub2 = $post->aff_sub2 ?? '';
//    $this->mapped_data->aff_sub3 = $post->aff_sub3 ?? '';
//    $this->mapped_data->aff_sub4 = $post->aff_sub4 ?? '';
//    $this->mapped_data->aff_sub5 = $post->aff_sub5 ?? '';
//    $this->mapped_data->subid = $post->subid ?? '';
//    $this->mapped_data->tier = $post->tier ?? '0';
//    $this->mapped_data->timeout = $post->timeout ?? '120';
//    $this->mapped_data->minCommissionAmount = '';
//    $this->mapped_data->maxCommissionAmount = '';
//    $this->mapped_data->response_type = 'xml';
//
//    $this->mapped_data->source = (object)[];
//    $this->mapped_data->source->ipAddress = $post->ipAddress;
//    $this->mapped_data->source->creationUrl = $post->creationUrl;
//    $this->mapped_data->source->referringUrl = $post->referringUrl;
//    $this->mapped_data->source->userAgent = $post->userAgent;
//
//    $this->mapped_data->loan = (object)[];
//    $this->mapped_data->loan->loanAmount = $_POST['loanAmount');
////            $this->mapped_data->loan->loanPurpose = $_POST['loanPurpose');
//    $this->mapped_data->loan->loanTerms = $_POST['loanTerms');
//
//    $this->mapped_data->applicant = (object)[];
//    $this->mapped_data->applicant->nameTitle = $_POST['nameTitle');
//    $this->mapped_data->applicant->firstName = $_POST['firstName');
//    $this->mapped_data->applicant->lastName = $_POST['lastName');
//    $this->mapped_data->applicant->drivingLicenseNumber = $_POST['licenseNumber');
//    $this->mapped_data->applicant->drivingLicenseState = $_POST['licenseState');
//    $this->mapped_data->applicant->ssn = $post->ssn;
//    $this->mapped_data->applicant->dateOfBirthDay = $post->dateOfBirthDay;
//    $this->mapped_data->applicant->dateOfBirthMonth = $post->dateOfBirthMonth;
//    $this->mapped_data->applicant->dateOfBirthYear = $post->dateOfBirthYear;
//    $this->mapped_data->applicant->email = $_POST['email');
//    $this->mapped_data->applicant->homePhoneNumber = $_POST['homePhoneNumber');
//    $this->mapped_data->applicant->cellPhoneNumber = $_POST['cellPhoneNumber');
//    $this->mapped_data->applicant->workPhoneNumber = $_POST['workPhoneNumber');
//    $this->mapped_data->applicant->inMilitary = $_POST['inMilitary');
//
//    $this->mapped_data->residence = (object)[];
//    $this->mapped_data->residence->state = $_POST['state');
//    $this->mapped_data->residence->city = $_POST['city');
//    $this->mapped_data->residence->zip = $_POST['zip');
//    $this->mapped_data->residence->addressStreet1 = $_POST['addressStreet1');
//    $this->mapped_data->residence->residentialStatus = $_POST['residentialStatus');
//    $this->mapped_data->residence->monthsAtAddress = $post->monthsAtAddress;
//
//    $this->mapped_data->employer = (object)[];
//    $this->mapped_data->employer->employerName = $_POST['employerName');
//    $this->mapped_data->employer->jobTitle = $post->jobTitle;
//    $this->mapped_data->employer->incomeSource = $_POST['incomeSource');
//    $this->mapped_data->employer->monthlyIncome = $_POST['monthlyIncome');
//    $this->mapped_data->employer->monthsAtEmployer = $post->monthsAtEmployer;
//    $this->mapped_data->employer->nextPayDateDay = $post->nextPayDateDay;
//    $this->mapped_data->employer->nextPayDateMonth = $post->nextPayDateMonth;
//    $this->mapped_data->employer->nextPayDateYear = $post->nextPayDateYear;
//    $this->mapped_data->employer->followingPayDateDay = $post->followingPayDateDay;
//    $this->mapped_data->employer->followingPayDateMonth = $post->followingPayDateMonth;
//    $this->mapped_data->employer->followingPayDateYear = $post->followingPayDateYear;
//    $this->mapped_data->employer->incomeCycle = $post->incomeCycle;
//    $this->mapped_data->employer->incomePaymentType = $post->incomePaymentType;
//
//    $this->mapped_data->bank = (object)[];
//    $this->mapped_data->bank->bankName = $_POST['bankName');
//    $this->mapped_data->bank->bankAccountLength = $post->bankAccountLength;
//    $this->mapped_data->bank->bankRoutingNumber = $_POST['bankRoutingNumber');
//    $this->mapped_data->bank->bankAccountNumber = $_POST['bankAccountNumber');
//    $this->mapped_data->bank->bankAccountType = $_POST['bankAccountType');
//
//    $this->mapped_data->consent = (object)[];
//    $this->mapped_data->consent->consentFinancial =  $post->consentFinancial;
//    $this->mapped_data->consent->consentThirdPartyEmails =  $post->consentThirdPartyEmails ?? false;
//    $this->mapped_data->consent->consentThirdPartyPhone =  $post->consentThirdPartyPhone  ?? false;
//    $this->mapped_data->consent->consentThirdPartySMS =  $post->consentThirdPartySMS ?? false;
//
////            dd($this->mapped_data);
//    // Total monthly household income
//    if($_POST['maritalStatus') == 'Married') {
//        $this->mapped_data->applicant->combinedMonthlyHouseholdIncome = $_POST['CombinedMonthlyHouseholdIncome');
//    }
//
//    // Add timestamps
////        $this->mapped_data['request_client_issued_at'] = $_POST['submit_timestamp');
////        $this->mapped_data['request_affiliate_received_at'] = $_POST['request_affiliate_received_at');
////        $this->mapped_data['request_affiliate_issued_at'] = Carbon::now()->microsecond;
//}



add_action('wp_ajax_check_status', 'handle_ajax_check_status_request');
add_action('wp_ajax_nopriv_check_status', 'handle_ajax_check_status_request');
function handle_ajax_check_status_request()
{
    $response = array();
    $response['message'] = "Successful Request";
//    (new App\Http\Controllers\FormController)->CheckStatusNew(\Illuminate\Http\Request $_REQUEST, $country_code = 'us');
//    echo json_encode($response);
    exit;
}


//function prep_data() {
//
//    $post = (object)[];
//    // Test mode parameter
//    $post->istest = $_REQUEST['istest'];
//    if($post->istest === null || trim($post->istest) === '') {
//        $post->istest = false;
//    }
//
//    // Facebook Pixel ID
//    $post->fbpix = $_REQUEST['fbpix'];
//    if($post->fbpix === null || trim($post->fbpix) === '') {
//        $post->fbpix = '';
//    }
//
//    // VID
//    $post->vid = $_REQUEST['vid'];
//    if($post->vid === null || trim($post->vid) === '') {
//        $post->vid = 'AFF_1';
//    }
//
//    // OID
//    $post->oid = $_REQUEST['oid'];
//    if($post->oid === null || trim($post->oid) === '') {
//        $post->oid = '1';
//    }
//    // Source
//    $post->transaction_id = $_REQUEST['transaction_id'] ?? 'DIRECT';
//    $post->aff_sub = $_REQUEST['aff_sub'] ?? null;
//    $post->aff_sub2 = $_REQUEST['aff_sub2'] ?? null;
//    $post->aff_sub3 = $_REQUEST['aff_sub3'] ?? null;
//    $post->aff_sub4 = $_REQUEST['aff_sub4'] ?? null;
//    $post->aff_sub5 = $_REQUEST['aff_sub5'] ?? null;
//
//
//    $post->loanAmount = $_REQUEST['loanAmount'] ?? '100';
//
//    // Tier
//    $post->tier = '0';
//
//    $post->nameTitle = $_REQUEST['nameTitle'];
//    $post->incomeCycle = $_REQUEST['incomeCycle'];
////        dd($post->incomeCycle]
//
//    // DOB
//    $dateOfBirth = strtotime($_REQUEST['dateOfBirth']);
//    $dateOfBirthDay = date('d', $dateOfBirth);
//    $dateOfBirthMonth = date('m', $dateOfBirth);
//    $dateOfBirthYear = date('Y', $dateOfBirth);
//
//    $post->dateOfBirthDay = $dateOfBirthDay;
//    $post->dateOfBirthMonth = $dateOfBirthMonth;
//    $post->dateOfBirthYear = $dateOfBirthYear;
////        dd($post->dateOfBirthDay']]
//
//    // Employer name
//    switch($_REQUEST['incomeSource']) {
//        case 'SelfEmployed':
//        case 'Pension':
//        case 'DisabilityBenefits':
//        case 'Benefits':
//            $post->employerName = 'unemployed';
//            break;
//    }
//
//    // Employment industry
//    switch($_REQUEST['incomeSource']) {
//        case 'Pension':
//        case 'DisabilityBenefits':
//        case 'Benefits':
//            $post->employerIndustry = 'None';
//            break;
//    }
//
//    // Job title
//    $post->jobTitle = $_REQUEST->jobTitle ?? 'Not Available';
//
//    switch($_REQUEST['incomeSource']) {
//        case 'Pension':
//        case 'DisabilityBenefits':
//        case 'Benefits':
//            $post->jobTitle = '';
//            break;
//    }
//
//    // nextPayDate
//    $nextPayDate = strtotime($_REQUEST['nextPayDate1']);
//    $npd_day = date('d', $nextPayDate);
//    $npd_month = date('m', $nextPayDate);
//    $npd_year = date('Y', $nextPayDate);
//
//    $post->nextPayDateDay = $npd_day;
//    $post->nextPayDateMonth = $npd_month;
//    $post->nextPayDateYear = $npd_year;
//
//    // followingPayDate
//    $followingPayDate = strtotime($_REQUEST['nextPayDate2']);
//    $fpd_day = date('d', $followingPayDate);
//    $fpd_month = date('m', $followingPayDate);
//    $fpd_year = date('Y', $followingPayDate);
//
//    $post->followingPayDateDay = $fpd_day;
//    $post->followingPayDateMonth = $fpd_month;
//    $post->followingPayDateYear = $fpd_year;
//
//    // Time at address
//    $post->monthsAtAddress = $_REQUEST['monthsAtAddress'];
////        dd($post->monthsAtAddress]
//    // Time in work
//    $post->monthsAtEmployer = $_REQUEST['employmentMonth'];
//
//    // HTTP Referrer
//    $post->userAgent = $_SERVER['HTTP_USER_AGENT'];
//    $post->ipAddress = $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['REMOTE_ADDR'];
//    $post->creationUrl = $_REQUEST['REQUEST_URI'] ?? $_SERVER['HTTPS'];
//    $post->referringUrl = $_SERVER['HTTP_REFERER'];
//
//    // Address2
//    if($_REQUEST['city'] === null) {
//        $post->city = '';
//    }
//
//    // Terms
//    if($_REQUEST['consentFinancial'] === null) {
//        $post->consentFinancial = false;
//    } else {
//        $post->consentFinancial = true;
//    }
//    if($_REQUEST['consentThirdPartyEmails'] === null) {
//        $post->consentThirdPartyEmails = false;
//    } else {
//        $post->consentThirdPartyEmails = true;
//    }
//    if($_REQUEST['consentThirdPartyPhone'] === null) {
//        $post->consentThirdPartyPhone = false;
//    } else {
//        $post->consentThirdPartyPhone = true;
//    }
//    if($_REQUEST['consentThirdPartySMS'] === null) {
//        $post->consentThirdPartySMS = false;
//    } else {
//        $post->consentThirdPartySMS = true;
//    }
//
//    // SSN
//    $post->ssn = $_REQUEST['ssn1'] . $_REQUEST['ssn2'] . $_REQUEST['ssn3'];
//    $bankMonth = $_REQUEST['bankMonth'];
//    $bankYear = $_REQUEST['bankYear'];
//    $post->bankAccountLength = floor($bankYear * 12 + $bankMonth);
//    $post->incomePaymentType = $_REQUEST['bankDirectDeposit'];
//
//    return $post;
//}
//
//function map_data($post) {
//
////        dd($transaction_id
//    $mapped_data = (object)[];
//    $mapped_data->istest = false;
//    $mapped_data->vid = $post->vid;
//    $mapped_data->oid = $post->oid;
////    $mapped_data->transaction_id = $transaction_id;
//    $mapped_data->aff_sub = $post->aff_sub ?? '';
//    $mapped_data->aff_sub2 = $post->aff_sub2 ?? '';
//    $mapped_data->aff_sub3 = $post->aff_sub3 ?? '';
//    $mapped_data->aff_sub4 = $post->aff_sub4 ?? '';
//    $mapped_data->aff_sub5 = $post->aff_sub5 ?? '';
//    $mapped_data->subid = $post->subid ?? '';
//    $mapped_data->tier = $post->tier ?? '0';
//    $mapped_data->timeout = $post->timeout ?? '120';
//    $mapped_data->minCommissionAmount = '';
//    $mapped_data->maxCommissionAmount = '';
//    $mapped_data->response_type = 'xml';
//
//    $mapped_data->source = (object)[];
//    $mapped_data->source->ipAddress = $post->ipAddress;
//    $mapped_data->source->creationUrl = $post->creationUrl;
//    $mapped_data->source->referringUrl = $post->referringUrl;
//    $mapped_data->source->userAgent = $post->userAgent;
//
//    $mapped_data->loan = (object)[];
//    $mapped_data->loan->loanAmount = $post->loanAmount;
//    $mapped_data->loan->loanTerms = $_REQUEST['loanTerms'];
//
//    $mapped_data->applicant = (object)[];
//    $mapped_data->applicant->nameTitle = $_REQUEST['nameTitle'];
//    $mapped_data->applicant->firstName = $_REQUEST['firstName'];
//    $mapped_data->applicant->lastName = $_REQUEST['lastName'];
//    $mapped_data->applicant->drivingLicenseNumber = $_REQUEST['licenseNumber'];
//    $mapped_data->applicant->drivingLicenseState = $_REQUEST['licenseState'];
//    $mapped_data->applicant->ssn = $post->ssn;
//    $mapped_data->applicant->dateOfBirthDay = $post->dateOfBirthDay;
//    $mapped_data->applicant->dateOfBirthMonth = $post->dateOfBirthMonth;
//    $mapped_data->applicant->dateOfBirthYear = $post->dateOfBirthYear;
//    $mapped_data->applicant->email = $_REQUEST['email'];
//    $mapped_data->applicant->homePhoneNumber = $_REQUEST['homePhoneNumber'];
//    $mapped_data->applicant->cellPhoneNumber = $_REQUEST['cellPhoneNumber'];
//    $mapped_data->applicant->workPhoneNumber = $_REQUEST['workPhoneNumber'];
//    $mapped_data->applicant->inMilitary = $_REQUEST['inMilitary'];
//
//    $mapped_data->residence = (object)[];
//    $mapped_data->residence->state = $_REQUEST['state'];
//    $mapped_data->residence->city = $_REQUEST['city'];
//    $mapped_data->residence->zip = $_REQUEST['zip'];
//    $mapped_data->residence->addressStreet1 = $_REQUEST['addressStreet1'];
//    $mapped_data->residence->residentialStatus = $_REQUEST['residentialStatus'];
//    $mapped_data->residence->monthsAtAddress = $post->monthsAtAddress;
//
//    $mapped_data->employer = (object)[];
//    $mapped_data->employer->employerName = $_REQUEST['employerName'];
//    $mapped_data->employer->jobTitle = $post->jobTitle;
//    $mapped_data->employer->incomeSource = $_REQUEST['incomeSource'];
//    $mapped_data->employer->monthlyIncome = $_REQUEST['monthlyIncome'];
//    $mapped_data->employer->monthsAtEmployer = $post->monthsAtEmployer;
//    $mapped_data->employer->nextPayDateDay = $post->nextPayDateDay;
//    $mapped_data->employer->nextPayDateMonth = $post->nextPayDateMonth;
//    $mapped_data->employer->nextPayDateYear = $post->nextPayDateYear;
//    $mapped_data->employer->followingPayDateDay = $post->followingPayDateDay;
//    $mapped_data->employer->followingPayDateMonth = $post->followingPayDateMonth;
//    $mapped_data->employer->followingPayDateYear = $post->followingPayDateYear;
//    $mapped_data->employer->incomeCycle = $post->incomeCycle;
//    $mapped_data->employer->incomePaymentType = $post->incomePaymentType;
//
//    $mapped_data->bank = (object)[];
//    $mapped_data->bank->bankName = $_REQUEST['bankName'];
//    $mapped_data->bank->bankAccountLength = $post->bankAccountLength;
//    $mapped_data->bank->bankRoutingNumber = $_REQUEST['bankRoutingNumber'];
//    $mapped_data->bank->bankAccountNumber = $_REQUEST['bankAccountNumber'];
//    $mapped_data->bank->bankAccountType = $_REQUEST['bankAccountType'];
//
//    $mapped_data->consent = (object)[];
//    $mapped_data->consent->consentFinancial =  $post->consentFinancial;
//    $mapped_data->consent->consentThirdPartyEmails =  $post->consentThirdPartyEmails ?? false;
//    $mapped_data->consent->consentThirdPartyPhone =  $post->consentThirdPartyPhone  ?? false;
//    $mapped_data->consent->consentThirdPartySMS =  $post->consentThirdPartySMS ?? false;
//
////            dd($mapped_data);
//    // Total monthly household income
//    if($_REQUEST['maritalStatus'] == 'Married') {
//        $mapped_data->applicant->combinedMonthlyHouseholdIncome = $_REQUEST['CombinedMonthlyHouseholdIncome'];
//    }
//
//    return $mapped_data;
//}
//
//function post_data($mapped_data)
//{
//    $url = 'https://portal.uping.co.uk/leads/application/usa/post';
//
//    $uping_response = curl_post($url, $mapped_data);
//    var_dump($uping_response);
////    die();
//
//    $response_affiliate_received_at = Carbon::now()->microsecond;
//
//    libxml_use_internal_errors(true);
//
//    $doc = simplexml_load_string($uping_response['res']);
//
//    $url_uping = '';
//    $postback_response['res'] = '';
//
//    if (!$doc) {
//
//        $data['status'] = 'error';
//        $data['error'] = 'Invalid XML response from u-ping';
//        $data['response'] = $uping_response['res'];
//        $data['model_type'] = $uping_response['res'][0];
//
//    } else {
//
//        // Check for validation errors from U-PING
//        if (preg_match('/<Errors>(.*?)<\/Errors>/', (string)$uping_response['res'], $Errors) === 1) {
//            $data['status'] = 'buyer-error';
//            $data['error'] = $Errors;
//            $data['response'] = $uping_response['res'];
//        } else {
//
//            // Extract data from XML
//            preg_match('/<Price>(.*?)<\/Price>/', (string)$uping_response['res'], $price);
//            preg_match('/<Response>(.*?)<\/Response>/', (string)$uping_response['res'], $status);
//            preg_match('/<Leadid>(.*?)<\/Leadid>/', (string)$uping_response['res'], $pingid);
//            preg_match('/<RedirectURL>(.*?)<\/RedirectURL>/', (string)$uping_response['res'], $RedirectURL);
//            preg_match('/<Thresold>(.*?)<\/Thresold>/', (string)$uping_response['res'], $Thresold);
//            preg_match('/<model_type>(.*?)<\/model_type>/', (string)$uping_response['res'], $ModelType);
//            preg_match('/<ThresoldAmount>(.*?)<\/ThresoldAmount>/', (string)$uping_response['res'], $ThresoldAmount);
//            preg_match('/<Descriptions>(.*?)<\/Descriptions>/', (string)$uping_response['res'], $Descriptions);
//            preg_match('/<CheckStatusID>(.*?)<\/CheckStatusID>/', (string)$uping_response['res'], $CheckStatusID);
//            preg_match('/<CheckStatus>(.*?)<\/CheckStatus>/', (string)$uping_response['res'], $CheckStatus);
//
//            $check_status_id = $CheckStatusID[1];
//            $transaction_id = $mapped_data->transaction_id;
//
////            $lead_log = $update_check_status_id($transaction_id, $check_status_id);
//
//
//            $params = [];
//            $params['transaction_id'] = $mapped_data->transaction_id ?? null;
//            $params['offer_id'] = $mapped_data->oid;
//            $params['partner_id'] = $mapped_data->vid;
//            $params['aff_sub'] = $mapped_data->aff_sub ?? null;
//            $params['aff_sub2'] = $mapped_data->aff_sub2 ?? null;
//            $params['aff_sub3'] = $mapped_data->aff_sub3 ?? null;
//            $params['aff_sub4'] = $mapped_data->aff_sub4 ?? null;
//            $params['aff_sub5'] = $mapped_data->aff_sub5 ?? null;
//            $params['amount'] = $price[1] ?? '0.00';
//            $params['lead_id'] = $pingid[1] ?? '';
//
//            $url_uping = '';
//            $header = '';
//
//
//
//            if (isset($status[1]) && $status[1] == 'LenderFound' && !empty($transaction_id)) {
//                logger('here');
//
//                // CPS
//                if (!empty($ModelType[1]) && $ModelType[1] === 'CPS') {
//                    $url_uping = config('constants.UPING_POSTBACK_URL');
//                    $postback_response = (new CurlHelper)->curl_postback($url_uping, $params, $header);
//                    logger('PB RES::', (array) $postback_response);
//                    // CPA/ CPL -> Accumulator
//                } elseif ($Thresold[1] == 'true') {
//                    $url_uping = config('constants.UPING_POSTBACK_URL');
//                    $postback_response = (new CurlHelper)->curl_postback($url_uping, $params, $header);
//                    logger('PB RES::', (array) $postback_response);
//                }
//
//            }
//
//            if (isset($status[1]) && $status[1] == 'LenderFound') {
//
//                $data = array(
//                    'status' => 'success',
//                    'RedirectURL' => $RedirectURL[1],
//                    'Leadid' => $pingid[1]);
//            }
//
//            if (isset($status[1]) && $status[1] == 'NoLenderFound') {
//
//                $data = array(
//                    'status' => 'rejected',
//                    'message' => 'No Lender Found',
////                            'field_errors' => $Descriptions[1],
//                );
//            }
//
//            if (isset($Descriptions[1]) && !empty($Descriptions[1])) {
//
//                $data = array(
//                    'status' => 'form_validation_errors',
//                    'message' => 'Please correct the form validation errors',
//                    'field_errors' => $Descriptions[1],
//                );
//            }
//
//
//            $data = [
//                'status' => 'pending',
//                'message' => 'processing',
//                'uping_response' => $uping_response,
//                'RedirectURL' => ''
//            ];
//
//
//
////                dd($data);
//            $data['check_status_id'] = $CheckStatusID[1];
//            $data['check_status'] = $CheckStatus[1];
//            $data['response_affiliate_received_at'] = $response_affiliate_received_at;
//
//
//        }
//    }
//
//    // Check if a valid lead ID was returned from U-PING
//    $invalid_lead_id = false;
//    if (!isset($data['Leadid'])) {
//        $invalid_lead_id = 'NULL';
//        logger('DEBUG: INVALID LEAD ID: NULL');
//    } else if (trim($data['Leadid']) == '' || !is_numeric($data['Leadid'])) {
//        $invalid_lead_id = print_r($data['Leadid'], true);
//        logger('DEBUG: INVALID LEAD ID: ' . $invalid_lead_id);
//    }
//
//    // Send an alert email
//    if ($invalid_lead_id !== false) {
//        $message = 'An application at Loan-Pal returned an invalid lead ID from UPING. Please find the details below.';
//        $message .= "\n\n" . "\n\n" . 'POST DATA';
//        $message .= "\n\n" . json_encode($mapped_data, JSON_PRETTY_PRINT);
//        $message .= "\n\n" . "\n\n" . 'UPING RESPONSE (' . $url_uping . ')';
//        $message .= "\n\n" . json_encode($uping_response, JSON_PRETTY_PRINT);
//        @mail("tom@uping.co.uk", "Loan-Pal: Invalid Lead ID: " . $invalid_lead_id, $message);
//    }
//
//    return $data;
//}

function curl_post(
    $url,
    $fields_string,
    $headers = [
        'Authorization: Bearer 8|F8Jtq8jCprvIBjPRTelPUkRIqeViSMGi367JYwhl',
        'Accept: application/json, text/javascript, *.*',
        'Content-type: application/json; charset=utf-8',
        'Expect:'
    ],
    $t1 = 210,
    $userpwd = '',
    $postDataFormat = 'json'
)
{

    $response = array();
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);


    // POST or GET request
    if (!empty($fields_string)) {
        curl_setopt($ch, CURLOPT_POST, 1);
    } else {
        sleep(1);
        curl_setopt($ch, CURLOPT_POST, 0);
    }

    // Parameters
    if (is_object($fields_string)) {
        if ($postDataFormat === 'json') {
            $fields_string = json_encode($fields_string);
        } else {
            $fields_string = http_build_query($fields_string);
        }
    } else {
        $fields_string = trim($fields_string);
    }
    if (!empty($fields_string)) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    }

    var_dump('CURL');

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, $t1);
    if (!empty($headers)) curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    if (!empty($userpwd)) curl_setopt($ch, CURLOPT_USERPWD, $userpwd);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
    $result = curl_exec($ch);
    var_dump($result);


    $p_time = curl_getinfo($ch);
//    logger('DEBUG: CURL request details: ');
//    logger('DEBUG: CURL payload details: ');

    if (curl_errno($ch)) {
        $result = "CURL ERROR: " . curl_error($ch);
    } else if (empty($result)) {
        $result = "Time out - ($t1 secs)"; // Timeout in $t1 secs
    }
    curl_close($ch);
    var_dump($ch);

//    logger('DEBUG: CURL response details: ' .$result);

    $response['res'] = $result;
    $response['post_time'] = $p_time['total_time'];


    return $response;
}

