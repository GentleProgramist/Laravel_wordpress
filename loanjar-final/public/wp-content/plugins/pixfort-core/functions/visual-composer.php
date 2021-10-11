<?php
/**
* Visual Composer functions
*
* @package pixfort-core
* @author PixFort
* @link http://pixfort.com
*/


function pix_set_vc_as_theme() {

	//vc_set_as_theme($disable_updater = true);
	// Setup VC to be part of a theme
	if( function_exists('vc_set_as_theme') ){
		vc_set_as_theme( true );
	}

	$child_dir = plugin_dir_path(dirname(__FILE__)) . 'functions/vc_templates';
	// $parent_dir = $template_directory . '/functions/pix-vc/vc_templates';

	// vc_set_shortcodes_templates_dir($parent_dir);
	// Link your VC elements's folder
	if( function_exists('vc_set_shortcodes_templates_dir') ){
		vc_set_shortcodes_templates_dir( $child_dir );
	}

	// Disable Instructional/Help Pointers
	if( function_exists('vc_pointer_load') ){
		remove_action( 'admin_enqueue_scripts', 'vc_pointer_load' );
	}

}

add_action('vc_before_init', 'pix_set_vc_as_theme');

// Prevent WP from adding <p> tags on all post types
function disable_wp_auto_p( $content ) {
	$removeAutop = true;
	$postTypes = array('product');

	if(!empty(pix_plugin_get_option('pix-enable-blog-line-breaks'))&&pix_plugin_get_option('pix-enable-blog-line-breaks')){
		array_push($postTypes,'post');
	}
	if(!empty(pix_plugin_get_option('pix-enable-page-line-breaks'))&&pix_plugin_get_option('pix-enable-page-line-breaks')){
		array_push($postTypes,'page');
	}
	if(in_array(get_post_type(), $postTypes) ){
		$removeAutop = false;
	}
	if($removeAutop){
		remove_filter( 'the_content', 'wpautop' );
		remove_filter( 'the_excerpt', 'wpautop' );
	}
  return $content;
}
add_filter( 'the_content', 'disable_wp_auto_p', 0 );

// After VC Init
add_action( 'vc_after_init', 'vc_after_init_actions' );

function vc_after_init_actions() {

	// Enable VC by default on a list of Post Types
	if( function_exists('vc_set_default_editor_post_types') ){

		$list = array(
			'page',
			'post',
			'pixfooter',
			'portfolio',
			'pixpopup',
			'client', // add here your custom post types slug
		);

		vc_set_default_editor_post_types( $list );

	}

	// Disable AdminBar VC edit link
	// if( function_exists('vc_frontend_editor') ){
	//     remove_action( 'admin_bar_menu', array( vc_frontend_editor(), 'adminBarEditLink' ), 1000 );
	// }

	// Disable Frontend VC links
	// if( function_exists('vc_disable_frontend') ){
	//     vc_disable_frontend();
	// }

}

function pix_add_params_to_group($params, $group){
	if(!empty($group)){
		$res = array();
		foreach ($params as $key => $value) {
			$value['group'] = $group;
			array_push($res,$value);
		}
		return $res;
	}
	return $params;
}


/* ---------------------------------------------------------------------------
* Shortcodes | Image compatibility
* --------------------------------------------------------------------------- */
if( ! function_exists( 'pix_vc_image' ) )
{
	function pix_vc_image( $image = false ){
		if( $image && is_numeric( $image ) ){
			$image = wp_get_attachment_image_src( $image, 'full' );
			$image = $image[0];
		}
		return $image;
	}
}


/* ---------------------------------------------------------------------------
* Shortcodes | Visual Composer Map:
* --------------------------------------------------------------------------- */

require_once( 'vc_templates/custom/main.php' );


if(class_exists('PixfortHub')){
	$status = PixfortHub::checkValidation();
	if($status){
		add_action ( 'vc_before_init_vc', 'pix_vc_integration' );
	}
}

if( ! function_exists( 'pix_vc_integration' ) ){

	function pix_vc_integration() {


		$parent_tag = vc_post_param( 'parent_tag', '' );
		$include_icon_params = ( ('vc_tta_pageable' !== $parent_tag) && 'tabs22' !== $parent_tag );

		if ( $include_icon_params ) {
			require_once vc_path_dir( 'CONFIG_DIR', 'content/vc-icon-element.php' );
			$icon_params = array(
				array(
					'type' => 'checkbox',
					'param_name' => 'add_icon',
					'heading' => __( 'Add icon?'.$parent_tag, 'pixfort-core' ),
					'description' => __( 'Add icon next to section title.', 'pixfort-core' ),
				),
				array(
					'type' => 'dropdown',
					'param_name' => 'i_position',
					'value' => array(
						__( 'Before title', 'pixfort-core' ) => 'left',
						__( 'After title', 'pixfort-core' ) => 'right',
					),
					'dependency' => array(
						'element' => 'add_icon',
						'value' => 'true',
					),
					'heading' => __( 'Icon position', 'pixfort-core' ),
					'description' => __( 'Select icon position.', 'pixfort-core' ),
				),
				array (
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'pixfort-core' ),
					'param_name' => 'icon',
					'settings' => array(
						'emptyIcon' => true, // default true, display an "EMPTY" icon?
						'type' => 'pix-icons',
						'iconsPerPage' => 200, // default 100, how many icons per/page to display
					),
					'description' => __( 'Select icon from library.', 'pixfort-core' ),
				),
			);
			// $icon_params = array_merge( $icon_params, (array) vc_map_integrate_shortcode( vc_icon_element_params(), 'i_', '', array(
			// 		// we need only type, icon_fontawesome, icon_.., NOT color and etc
			// 		'include_only_regex' => '/^(type|ssicon_\w*)/',
			// 	), array(
			// 		'element' => 'add_icon',
			// 		'value' => 'true',
			// 	) ) );
		} else {
			$icon_params = array();
		}


		$animations = array(
			"None" 				=> "",
			"Fade in" 			=> "fade-in",
			'fade-in-down'		=> 'fade-in-down',
			'fade-in-left'		=> 'fade-in-left',
			'fade-in-right'		=> 'fade-in-right',
			'fade-in-up'		=> 'fade-in-up',
			'fade-in-up-big'	=> 'fade-in-up-big',
			'fade-in-right-big'	=> 'fade-in-right-big',
			'fade-in-left-big'	=> 'fade-in-left-big',
			"Slide in up"		=> "slide-in-up",
		);
		$animations_inv = array(
			"None" 				=> "",
			"Fade in" 			=> "fade-in",
			'fade-in-up'		=> 'fade-in-down',
			'fade-in-right'		=> 'fade-in-left',
			'fade-in-left'		=> 'fade-in-right',
			'fade-in-down'		=> 'fade-in-up',
			'fade-in-down-big'	=> 'fade-in-up-big',
			'fade-in-left-big'	=> 'fade-in-right-big',
			'fade-in-right-big'	=> 'fade-in-left-big',
			"Slide in down"		=> "slide-in-up"
		);


		$colors = array(
			"Body default"			=> "body-default",
			"Heading default"		=> "heading-default",
			"Primary"				=> "primary",
			"Primary Gradient"		=> "gradient-primary",
			"Secondary"				=> "secondary",
			"White"					=> "white",
			"Black"					=> "black",
			"Green"					=> "green",
			"Blue"					=> "blue",
			"Red"					=> "red",
			"Yellow"				=> "yellow",
			"Brown"					=> "brown",
			"Purple"				=> "purple",
			"Orange"				=> "orange",
			"Cyan"					=> "cyan",
			// "Transparent"					=> "transparent",
			"Gray 1"				=> "gray-1",
			"Gray 2"				=> "gray-2",
			"Gray 3"				=> "gray-3",
			"Gray 4"				=> "gray-4",
			"Gray 5"				=> "gray-5",
			"Gray 6"				=> "gray-6",
			"Gray 7"				=> "gray-7",
			"Gray 8"				=> "gray-8",
			"Gray 9"				=> "gray-9",
			"Dark opacity 1"		=> "dark-opacity-1",
			"Dark opacity 2"		=> "dark-opacity-2",
			"Dark opacity 3"		=> "dark-opacity-3",
			"Dark opacity 4"		=> "dark-opacity-4",
			"Dark opacity 5"		=> "dark-opacity-5",
			"Dark opacity 6"		=> "dark-opacity-6",
			"Dark opacity 7"		=> "dark-opacity-7",
			"Dark opacity 8"		=> "dark-opacity-8",
			"Dark opacity 9"		=> "dark-opacity-9",
			"Light opacity 1"		=> "light-opacity-1",
			"Light opacity 2"		=> "light-opacity-2",
			"Light opacity 3"		=> "light-opacity-3",
			"Light opacity 4"		=> "light-opacity-4",
			"Light opacity 5"		=> "light-opacity-5",
			"Light opacity 6"		=> "light-opacity-6",
			"Light opacity 7"		=> "light-opacity-7",
			"Light opacity 8"		=> "light-opacity-8",
			"Light opacity 9"		=> "light-opacity-9",
			"Custom"				=> "custom"
		);

		$colors_with_transparent = $colors = array(
			"Body default"			=> "body-default",
			"Heading default"		=> "heading-default",
			"Primary"				=> "primary",
			"Primary Gradient"		=> "gradient-primary",
			"Secondary"				=> "secondary",
			"White"					=> "white",
			"Black"					=> "black",
			"Green"					=> "green",
			"Blue"					=> "blue",
			"Red"					=> "red",
			"Yellow"				=> "yellow",
			"Brown"					=> "brown",
			"Purple"				=> "purple",
			"Orange"				=> "orange",
			"Cyan"					=> "cyan",
			"Transparent"					=> "transparent",
			"Gray 1"				=> "gray-1",
			"Gray 2"				=> "gray-2",
			"Gray 3"				=> "gray-3",
			"Gray 4"				=> "gray-4",
			"Gray 5"				=> "gray-5",
			"Gray 6"				=> "gray-6",
			"Gray 7"				=> "gray-7",
			"Gray 8"				=> "gray-8",
			"Gray 9"				=> "gray-9",
			"Dark opacity 1"		=> "dark-opacity-1",
			"Dark opacity 2"		=> "dark-opacity-2",
			"Dark opacity 3"		=> "dark-opacity-3",
			"Dark opacity 4"		=> "dark-opacity-4",
			"Dark opacity 5"		=> "dark-opacity-5",
			"Dark opacity 6"		=> "dark-opacity-6",
			"Dark opacity 7"		=> "dark-opacity-7",
			"Dark opacity 8"		=> "dark-opacity-8",
			"Dark opacity 9"		=> "dark-opacity-9",
			"Light opacity 1"		=> "light-opacity-1",
			"Light opacity 2"		=> "light-opacity-2",
			"Light opacity 3"		=> "light-opacity-3",
			"Light opacity 4"		=> "light-opacity-4",
			"Light opacity 5"		=> "light-opacity-5",
			"Light opacity 6"		=> "light-opacity-6",
			"Light opacity 7"		=> "light-opacity-7",
			"Light opacity 8"		=> "light-opacity-8",
			"Light opacity 9"		=> "light-opacity-9",
			"Custom"				=> "custom"
		);
	
		$colors_no_custom = $colors;
		unset($colors_no_custom['Custom']);

		$bg_colors = array(
			"Primary"				=> "primary",
			"Primary Light"			=> "primary-light",
			"Primary Gradient"		=> "gradient-primary",
			"Primary Gradient Light"		=> "gradient-primary-light",
			"Secondary"				=> "secondary",
			"Secondary Light"		=> "secondary-light",
			"Heading default"		=> "heading-default",
			"Body default"		=> "body-default",
			"White"					=> "white",
			"Black"					=> "black",
			"Green"					=> "green",
			"Green Light"			=> "green-light",
			"Blue"					=> "blue",
			"Blue Light"			=> "blue-light",
			"Red"					=> "red",
			"Red Light"				=> "red-light",
			"Yellow"				=> "yellow",
			"Yellow Light"			=> "yellow-light",
			"Brown"					=> "brown",
			"Brown Light"			=> "brown-light",
			"Purple"				=> "purple",
			"Purple Light"			=> "purple-light",
			"Orange"				=> "orange",
			"Orange Light"			=> "orange-light",
			"Cyan"					=> "cyan",
			"Cyan Light"			=> "cyan-light",
			"Transparent"			=> "transparent",
			"Gray 1"				=> "gray-1",
			"Gray 2"				=> "gray-2",
			"Gray 3"				=> "gray-3",
			"Gray 4"				=> "gray-4",
			"Gray 5"				=> "gray-5",
			"Gray 6"				=> "gray-6",
			"Gray 7"				=> "gray-7",
			"Gray 8"				=> "gray-8",
			"Gray 9"				=> "gray-9",
			"Dark opacity 1"		=> "dark-opacity-1",
			"Dark opacity 2"		=> "dark-opacity-2",
			"Dark opacity 3"		=> "dark-opacity-3",
			"Dark opacity 4"		=> "dark-opacity-4",
			"Dark opacity 5"		=> "dark-opacity-5",
			"Dark opacity 6"		=> "dark-opacity-6",
			"Dark opacity 7"		=> "dark-opacity-7",
			"Dark opacity 8"		=> "dark-opacity-8",
			"Dark opacity 9"		=> "dark-opacity-9",
			"Light opacity 1"		=> "light-opacity-1",
			"Light opacity 2"		=> "light-opacity-2",
			"Light opacity 3"		=> "light-opacity-3",
			"Light opacity 4"		=> "light-opacity-4",
			"Light opacity 5"		=> "light-opacity-5",
			"Light opacity 6"		=> "light-opacity-6",
			"Light opacity 7"		=> "light-opacity-7",
			"Light opacity 8"		=> "light-opacity-8",
			"Light opacity 9"		=> "light-opacity-9",
			"Custom"				=> "custom"
		);

		require_once( 'elements/global-params.php' );

		require_once( 'elements/shortcode-accordion.php' );
		require_once( 'elements/shortcode-animated-heading.php' );
		require_once( 'elements/shortcode-alert.php' );
		require_once( 'elements/shortcode-auto-video.php' );
		require_once( 'elements/shortcode-badge.php' );
		require_once( 'elements/shortcode-button.php' );
		require_once( 'elements/shortcode-blog.php' );
		require_once( 'elements/shortcode-blog-slider.php' );
		require_once( 'elements/shortcode-card.php' );
		// require_once( 'elements/shortcode-card-group.php' );
		require_once( 'elements/shortcode-card-wide.php' );
		require_once( 'elements/shortcode-circles.php' );

		// pix_beta
		// if(defined('PIX_DEV')){
			require_once( 'elements/shortcode-comparison-table.php' );
		// }

		require_once( 'elements/shortcode-content-box.php' );
		require_once( 'elements/shortcode-content-stack.php' );
		require_once( 'elements/shortcode-content-tabs.php' );
		require_once( 'elements/shortcode-countdown.php' );
		require_once( 'elements/shortcode-chart.php' );
		require_once( 'elements/shortcode-clients.php' );
		require_once( 'elements/shortcode-clients-slider.php' );
		require_once( 'elements/shortcode-cta.php' );
		require_once( 'elements/shortcode-event.php' );
		require_once( 'elements/shortcode-3d-box.php' );
		require_once( 'elements/shortcode-fancybox.php' );
		require_once( 'elements/shortcode-fancy-mockup.php' );
		require_once( 'elements/shortcode-faq.php' );
		require_once( 'elements/shortcode-feature.php' );
		require_once( 'elements/shortcode-feature-list.php' );
		// pix_beta
		// if(defined('PIX_DEV')){
			require_once( 'elements/shortcode-gallery.php' );
		// }

		require_once( 'elements/shortcode-heading.php' );
		require_once( 'elements/shortcode-highlight-box.php' );
		require_once( 'elements/shortcode-highlighted-text.php' );
		require_once( 'elements/shortcode-icon.php' );
		require_once( 'elements/shortcode-img.php' );
		require_once( 'elements/shortcode-img-carousel.php' );
		require_once( 'elements/shortcode-img-box.php' );
		require_once( 'elements/shortcode-img-slider.php' );
		require_once( 'elements/shortcode-levels.php' );
		require_once( 'elements/shortcode-map.php' );
		require_once( 'elements/shortcode-dividers.php' );
		require_once( 'elements/shortcode-numbers.php' );
		require_once( 'elements/shortcode-testimonial.php' );
		require_once( 'elements/shortcode-testimonial-masonry.php' );
		require_once( 'elements/shortcode-testimonials-slider.php' );
		require_once( 'elements/shortcode-promo-box.php' );
		require_once( 'elements/shortcode-photo-box.php' );
		require_once( 'elements/shortcode-photo-stack.php' );
		require_once( 'elements/shortcode-pricing.php' );
		require_once( 'elements/shortcode-pricing-group.php' );
		require_once( 'elements/shortcode-products-carousel.php' );
		require_once( 'elements/shortcode-progress-bars.php' );
		require_once( 'elements/shortcode-portfolio.php' );
		require_once( 'elements/shortcode-portfolio-slider.php' );
		require_once( 'elements/shortcode-review.php' );
		require_once( 'elements/shortcode-reviews-slider.php' );
		require_once( 'elements/shortcode-search.php' );
		require_once( 'elements/shortcode-shop-category.php' );
		require_once( 'elements/shortcode-slider.php' );
		require_once( 'elements/shortcode-sliding-text.php' );
		require_once( 'elements/shortcode-social-icons.php' );
		require_once( 'elements/shortcode-story.php' );
		// require_once( 'elements/shortcode-tabs.php' ); OLD version
		require_once( 'elements/shortcode-team-member.php' );
		require_once( 'elements/shortcode-team-member-circle.php' );
		require_once( 'elements/shortcode-text.php' );
		require_once( 'elements/shortcode-video.php' );
		require_once( 'elements/shortcode-video-popup.php' );
		require_once( 'elements/shortcode-video-slider.php' );
		require_once( 'elements/shortcode-responsive-spacer.php' );

		vc_add_params('vc_column_inner', array(
			array (
				'param_name' 	=> 'content_align',
				'type' 			=> 'dropdown',
				'heading' 		=> __('Content align', 'pix-opts'),
				'admin_label'	=> false,
				'value'			=> array_flip(array(
					'text-left'			=> 'Left',
					'text-center'		=> 'Center',
					'text-right' 		=> 'Right',
				)),
			),
		));

		require_once( 'elements/vc_row.php' );
		require_once( 'elements/vc_section.php' );
		require_once( 'elements/vc_column.php' );

		vc_remove_param( "vc_separator", "css_animation" );
		vc_add_params('vc_separator', array(
			array (
				'param_name' 	=> 'animation',
				'type' 			=> 'dropdown',
				'heading' 		=> __('Animation', 'pix-opts'),
				'description' 	=> __('Select the animation style.', 'pix-opts'),
				'admin_label'	=> false,
				'value'			=> $animations,
			),
			array (
				'param_name' 	=> 'delay',
				'type' 			=> 'textfield',
				'heading' 		=> __('Animation delay (in miliseconds)', 'pix-opts'),
				'admin_label'	=> true,
				"dependency" => array(
					"element" => "animation",
					"not_empty" => true
				),
			),
		)
	);

	vc_map_update( 'icon', 'pix-icons' );
	}

}


function pix_vc_scripts_front() {
	wp_enqueue_script( 'pixfort-admin-custom2', PIX_CORE_PLUGIN_URI . 'functions/js/essentials_vc.min.js', array('jquery'), PLUGIN_VERSION , true );
	$icons_admin = pix_admin_icons();
	$templates = pix_get_templates_thumbs();
	$translation_array = array(
		'PIX_CORE_PLUGIN_URI' => PIX_CORE_PLUGIN_URI,
		'PIX_ICONS_ADMIN' => $icons_admin,
		'TEMPLATES_ARR'	=> $templates
	);
	//after wp_enqueue_script
	wp_localize_script( 'pixfort-admin-custom2', 'plugin_object', $translation_array );
	// wp_deregister_script( 'wp-embed' );
	wp_deregister_script( 'pix-meta' );
	wp_deregister_script( 'pix-meta2' );
	wp_deregister_script( 'pix-header-builder' );
}
add_action( 'vc_frontend_editor_render', 'pix_vc_scripts_front' );

function pix_vc_scripts_back() {
	wp_enqueue_script( 'pixfort-admin-custom2', PIX_CORE_PLUGIN_URI . 'functions/js/essentials_vc.min.js', array('jquery'), PLUGIN_VERSION , true );
	$icons_admin = pix_admin_icons();
	$templates = pix_get_templates_thumbs();
	$translation_array = array(
		'PIX_CORE_PLUGIN_URI' => PIX_CORE_PLUGIN_URI,
		'PIX_ICONS_ADMIN' => $icons_admin,
		'TEMPLATES_ARR'	=> $templates
	);

	//after wp_enqueue_script
	wp_localize_script( 'pixfort-admin-custom2', 'plugin_object', $translation_array );
}
add_action( 'vc_backend_editor_render', 'pix_vc_scripts_back' );

?>
