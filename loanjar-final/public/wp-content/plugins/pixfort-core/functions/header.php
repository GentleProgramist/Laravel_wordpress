<?php
/**
 * pixheader custom meta fields.
 */

/* ---------------------------------------------------------------------------
 * Create new post type
 * --------------------------------------------------------------------------- */
function pix_pixheader_post_type(){
	//$pixheader_item_slug = pix_get_option( 'pixheader-slug', 'pixheader-item' );
	$pixheader_item_slug = "pixheader-item";

	$labels = array(
		'name' 					=> __('Headers','pix-opts'),
		'singular_name' 		=> __('Header item','pix-opts'),
		'add_new' 				=> __('Add New Header','pix-opts'),
		'add_new_item' 			=> __('Add New Header item','pix-opts'),
		'edit_item' 			=> __('Edit Header item','pix-opts'),
		'new_item' 				=> __('New Header item','pix-opts'),
		'view_item' 			=> __('View Header item','pix-opts'),
		'search_items' 			=> __('Search Header items','pix-opts'),
		'not_found' 			=> __('No Header items found','pix-opts'),
		'not_found_in_trash' 	=> __('No Header items found in Trash','pix-opts'),
		'parent_item_colon' 	=> ''
	  );

	$args = array(
		'labels' 				=> $labels,
		// 'menu_icon'				=> 'dashicons-images-alt2',
		'public' 				=> true,
		'menu_icon' 				=> PIX_CORE_PLUGIN_URI .'functions/images/admin/header-icon.svg',
		'publicly_queryable' 	=> true,
		// 'menu_position' 		=> 3,
		'show_ui' 				=> true,
		'query_var' 			=> true,
		'capability_type' 		=> 'post',
		'hierarchical' 			=> false,
		'menu_position' 		=> null,
		'exclude_from_search' 	=> true,
		'rewrite' 				=> array( 'slug' => $pixheader_item_slug, 'with_front' => true ),
		'supports' 				=> array( 'title', 'page-attributes' ),
		// 'supports' 				=> array( 'title', 'editor', 'author', 'page-attributes' ),
	);

	register_post_type( 'pixheader', $args );


}
add_action( 'init', 'pix_pixheader_post_type' );






function pix_header_meta_add(){
	global $pix_header_meta_box;

	// Layouts ----------------------------------
	$layouts = array( 0 => '-- Theme Options --' );

	// Custom menu ------------------------------
	$aMenus = array( 0 => '-- Default --' );
	$oMenus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );

	if( is_array($oMenus) ){
		foreach( $oMenus as $menu ){
			$aMenus[$menu->term_id] = $menu->name;
		}
	}

	$pix_header_meta_box = array(
		'id' 		=> 'pix-meta-page',
		'title' 	=> __('PixFort Header Options','pix-opts'),
		'page' 		=> 'pixheader',
		'post_types'	=> array('pixheader'),
		'context' 	=> 'normal',
		'priority' 	=> 'high',
		'fields'	=> array(

			array(
				'id' 		=> 'pix-header-drag',
				'type' 		=> 'header_drag',
				'title' 	=> __('Header builder', 'pix-opts'),
			),

			array(
				'id' 		=> 'pix-header-style',
				'type' 		=> 'select',
				'title' 	=> __('Header Style', 'pix-opts'),
				'sub_desc' 	=> __('Select Desktop header style.', 'pix-opts'),
				'options' 	=> array(
					''			=> "Default",
					'default-full'			=> "Default (Full width)",
					'transparent'			=> "Transparent",
					'transparent-full'			=> "Transparent (Full width)",
					'boxed'					=> "Boxed",
					'boxed-full'			=> "Boxed (Full width)"
				),
			),

			array(
				'id' 		=> 'pix-enable-sticky',
				'type' 		=> 'select',
				'title' 	=> __('Enable Desktop sticky header', 'pix-opts'),
				'options' 	=> array(
					'enable'			=> "Yes",
					'disable'			=> "No",
				),
				'std'		=> 'enable'
			),
			array(
				'id' 		=> 'pix-enable-mobile-sticky',
				'type' 		=> 'select',
				'title' 	=> __('Enable Mobile sticky header', 'pix-opts'),
				'options' 	=> array(
					'enable'			=> "Yes",
					'disable'			=> "No",
				),
				'std'		=> 'disable'
			),

			array(
				'id'		=> 'is_secondary_font',
				'type'		=> 'switch',
				'title'		=> __('Use secondary font', 'pix-opts'),
				'options'	=> array('1' => 'Yes', '0' => 'No'),
				'std'		=> '0'
			),


		),
	);


	add_meta_box($pix_header_meta_box['id'], $pix_header_meta_box['title'], 'pix_header_show_box', $pix_header_meta_box['page'], $pix_header_meta_box['context'], $pix_header_meta_box['priority']);
}
 add_action('admin_menu', 'pix_header_meta_add');

 function pix_header_show_box() {
	global $pix_header_meta_box, $post;

	// Use nonce for verification
	echo '<div id="pix-wrapper">';
		echo '<input type="hidden" name="pix_page_meta_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';



		echo '<table class="form-table">';
			echo '<tbody>';

				foreach ($pix_header_meta_box['fields'] as $field) {
					$meta = get_post_meta($post->ID, $field['id'], true);
					if( ! key_exists('std', $field) ) $field['std'] = false;
					$meta = ( $meta || $meta==='0' ) ? $meta : stripslashes(htmlspecialchars(($field['std']), ENT_QUOTES ));

					pix_meta_field_input( $field, $meta );

				}

			echo '</tbody>';
		echo '</table>';

	echo '</div>';
}

/*-----------------------------------------------------------------------------------*/
/*	Save data when page is edited
/*-----------------------------------------------------------------------------------*/
function pix_header_save_data($post_id) {
	global $pix_header_meta_box;

	// verify nonce
	if( key_exists( 'pix_page_meta_nonce',$_POST ) ) {
		if ( ! wp_verify_nonce( $_POST['pix_page_meta_nonce'], basename(__FILE__) ) ) {
			return $post_id;
		}
	}

	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	// check permissions
	if ( (key_exists('post_type', $_POST)) && ('page' == $_POST['post_type']) ) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}

	// if(function_exists('pix_update_menus')){
	// 	pix_update_menus();
	// }
	// $menus = get_transient( 'pixfort_cached_menus' );
    // if($menus){
    //     foreach( $menus as $menu ) {
    //         delete_transient( $menu );
    //     }
    // }

	// check and save fields ( $pix_header_meta_box['fields'] )
	if(!empty($pix_header_meta_box)){
		foreach ( (array)$pix_header_meta_box['fields'] as $field ) {
			$old = get_post_meta($post_id, $field['id'], true);
			if( key_exists($field['id'], $_POST) ) {
				$new = $_POST[$field['id']];
			} else {
	//			$new = ""; // problem with "quick edit"
				if($field['type']=='switch'){
					$new = '0';
				}else{
					continue;
				}
			}

			if ( isset($new) && $new != $old) {
				update_post_meta($post_id, $field['id'], $new);
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $field['id'], $old);
			}
		}
	}
}
add_action('save_post', 'pix_header_save_data');

/*-----------------------------------------------------------------------------------*/
/*	Styles & scripts
/*-----------------------------------------------------------------------------------*/

function pix_edit_form_after_editor() {
	wp_enqueue_style( 'pix-meta', PIX_CORE_PLUGIN_URI. 'functions/css/pixbuilder.css', false, PLUGIN_VERSION, 'all');
	wp_enqueue_style( 'pix-header-builder', PIX_CORE_PLUGIN_URI. 'functions/css/pixHeaderBuilder.css', false, PLUGIN_VERSION, 'all');
	wp_enqueue_style( 'pix-header-confirm', PIX_CORE_PLUGIN_URI. 'functions/css/jquery-confirm.min.css', false, PLUGIN_VERSION, 'all');
    wp_enqueue_style( 'pix-meta2', PIX_CORE_PLUGIN_URI. 'functions/pixbuilder.css', false, PLUGIN_VERSION, 'all');

	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'pix-admin-confirm', PIX_CORE_PLUGIN_URI . 'functions/js/jquery-confirm.min.js', array('jquery'), PLUGIN_VERSION, true );
	wp_enqueue_script( 'pix-admin-header', PIX_CORE_PLUGIN_URI . 'functions/js/pixHeaderBuilder.js', array('jquery','jquery-ui-droppable','jquery-ui-draggable', 'jquery-ui-sortable', 'wp-color-picker'), PLUGIN_VERSION, true );
	$icons = vc_iconpicker_type_pixicons( array() );
	wp_localize_script( 'pix-admin-header', 'plugin_header_object', array(
	    'PIX_CORE_PLUGIN_URI' => PIX_CORE_PLUGIN_URI,
	    'PIX_ICONS' => $icons,
	));
}
add_action('edit_form_after_editor', 'pix_edit_form_after_editor');

// Yoast SEO Plugin fix
function my_remove_wp_seo_meta_box() {
	remove_meta_box('wpseo_meta', 'pixheader', 'normal');
}
add_action('add_meta_boxes', 'my_remove_wp_seo_meta_box', 100);


?>
