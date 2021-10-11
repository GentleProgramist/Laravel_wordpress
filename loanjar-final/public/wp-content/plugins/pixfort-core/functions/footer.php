<?php
/**
 * pixfooter custom meta fields.
 */




/* ---------------------------------------------------------------------------
 * Create new post type
 * --------------------------------------------------------------------------- */
function pix_pixfooter_post_type(){
	//$pixfooter_item_slug = pix_get_option( 'pixfooter-slug', 'pixfooter-item' );
	$pixfooter_item_slug = "pixfooter-item";

	$labels = array(
		'name' 					=> __('Footers','pix-opts'),
		'singular_name' 		=> __('Footer item','pix-opts'),
		'add_new' 				=> __('Add New Footer','pix-opts'),
		'add_new_item' 			=> __('Add New Footer item','pix-opts'),
		'edit_item' 			=> __('Edit Footer item','pix-opts'),
		'new_item' 				=> __('New Footer item','pix-opts'),
		'view_item' 			=> __('View Footer item','pix-opts'),
		'search_items' 			=> __('Search Footer items','pix-opts'),
		'not_found' 			=> __('No Footer items found','pix-opts'),
		'not_found_in_trash' 	=> __('No Footer items found in Trash','pix-opts'),
		'parent_item_colon' 	=> ''
	  );

	$args = array(
		'labels' 				=> $labels,
		// 'menu_icon'				=> 'dashicons-images-alt2',
		'menu_icon' 				=> PIX_CORE_PLUGIN_URI .'functions/images/admin/footer-icon.svg',
		'public' 				=> true,
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,
		'query_var' 			=> true,
		'capability_type' 		=> 'post',
		'hierarchical' 			=> false,
		'menu_position' 		=> null,
		'exclude_from_search' 	=> true,
		'rewrite' 				=> array( 'slug' => $pixfooter_item_slug, 'with_front' => true ),
		'supports' 				=> array( 'title', 'editor', 'author', 'excerpt', 'thumbnail', 'page-attributes' ),
	);

	register_post_type( 'pixfooter', $args );

	register_taxonomy( 'pixfooter-types', 'pixfooter', array(
		'hierarchical' 			=> true,
		'label' 				=>  __( 'pixfooter categories', 'pix-opts' ),
		'singular_label' 		=>  __( 'pixfooter category', 'pix-opts' ),
		'rewrite'				=> true,
		'query_var' 			=> true
	));

	
}
add_action( 'init', 'pix_pixfooter_post_type' );





// Yoast SEO Plugin fix
function my_remove_wp_seo_pixfooter_meta_box() {
	remove_meta_box('wpseo_meta', 'pixfooter', 'normal');
}
add_action('add_meta_boxes', 'my_remove_wp_seo_pixfooter_meta_box', 100);



/*-----------------------------------------------------------------------------------*/
/*	Styles & scripts
 /*-----------------------------------------------------------------------------------*/
function pix_pixfooter_admin_styles() {
	wp_enqueue_style( 'pix-meta', PIX_CORE_PLUGIN_URI. '/functions/css/pixbuilder.css', false, PLUGIN_VERSION, 'all');
    wp_enqueue_style( 'pix-meta2', PIX_CORE_PLUGIN_URI. '/functions/pixbuilder.css', false, PLUGIN_VERSION, 'all');
}
add_action('admin_print_styles', 'pix_pixfooter_admin_styles');

?>
