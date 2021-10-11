<?php
/**
 * pixpopup custom meta fields.
 */

/* ---------------------------------------------------------------------------
 * Create new post type
 * --------------------------------------------------------------------------- */
function pix_pixpopup_post_type()
{
	//$pixpopup_item_slug = pix_get_option( 'pixpopup-slug', 'pixpopup-item' );
	$pixpopup_item_slug = "pixpopup-item";

	$labels = array(
		'name' 					=> __('Popups','pix-opts'),
		'singular_name' 		=> __('Popup item','pix-opts'),
		'add_new' 				=> __('Add New Popup','pix-opts'),
		'add_new_item' 			=> __('Add New Popup item','pix-opts'),
		'edit_item' 			=> __('Edit Popup item','pix-opts'),
		'new_item' 				=> __('New Popup item','pix-opts'),
		'view_item' 			=> __('View Popup item','pix-opts'),
		'search_items' 			=> __('Search Popup items','pix-opts'),
		'not_found' 			=> __('No Popup items found','pix-opts'),
		'not_found_in_trash' 	=> __('No Popup items found in Trash','pix-opts'),
		'parent_item_colon' 	=> ''
	  );

	$args = array(
		'labels' 				=> $labels,
		// 'menu_icon'				=> 'dashicons-images-alt2',
		'menu_icon' 				=> PIX_CORE_PLUGIN_URI .'functions/images/admin/popups.svg',
		'public' 				=> true,
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,
		'query_var' 			=> true,
		'capability_type' 		=> 'post',
		'hierarchical' 			=> false,
		'menu_position' 		=> null,
		'exclude_from_search' => true,
		'rewrite' 				=> array( 'slug' => $pixpopup_item_slug, 'with_front' => true ),
		'supports' 				=> array( 'title', 'editor', 'author', 'excerpt', 'thumbnail', 'page-attributes' ),
	);

	register_post_type( 'pixpopup', $args );

	register_taxonomy( 'pixpopup-types', 'pixpopup', array(
		'hierarchical' 			=> true,
		'label' 				=>  __( 'pixpopup categories', 'pix-opts' ),
		'singular_label' 		=>  __( 'pixpopup category', 'pix-opts' ),
		'rewrite'				=> true,
		'query_var' 			=> true
	));


}
add_action( 'init', 'pix_pixpopup_post_type' );



add_filter( 'manage_posts_columns', 'revealid_add_id_column', 5 );
add_action( 'manage_posts_custom_column', 'revealid_id_column_content', 5, 2 );



function revealid_add_id_column( $columns ) {
	$post_type = get_post_type();
    if ( $post_type == 'pixpopup' ) {
	   $columns['revealid_id'] = esc_html__( 'Popup Link', 'pixfort-core' );
	}
   return $columns;
}

function revealid_id_column_content( $column, $id ) {
	$post_type = get_post_type();
    if ( $post_type == 'pixpopup' ) {
	  if( 'revealid_id' == $column ) {
	    ?>
		<input onfocus="this.select();" type="text" value="#pix_popup_<?php echo esc_attr($id); ?>" readonly>
		<?php
	  }
  }
}











function pix_pixpopup_meta_add(){
	global $pix_pixpopup_meta_box;


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

	$pix_pixpopup_meta_box = array(
		'id' 		=> 'pix-meta-page',
		'title' 	=> __('PixFort Options','pix-opts'),
		'page' 		=> 'pixpopup',
		'post_types'	=> array('pixheader'),
		'context' 	=> 'normal',
		'priority' 	=> 'high',
		'fields'	=> array(

			array(
				'id' 		=> 'pix-popup-size',
				'type' 		=> 'select',
				'title' 	=> __('Popup size', 'pix-opts'),
				'sub_desc' 	=> __('Select the width of the popup.', 'pix-opts'),
				'options' 	=> array(
					// 'col-12 col-sm-4 offset-sm-4'			=> "Extra small",
					// 'col-12 col-sm-6 offset-sm-3'			=> "Small",
					// 'col-12 col-sm-8 offset-sm-2'			=> "Medium",
					// 'col-12 col-sm-10 offset-sm-1'			=> "Big",
					'col-12 col-sm-4'			=> "Extra small (4 Columns)",
					'col-12 col-sm-6'			=> "Small (6 Columns)",
					'col-12 col-sm-8'			=> "Medium (8 Columns)",
					'col-12 col-sm-10'			=> "Big (10 Columns)",
					'col-12'					=> "Full width (12 Columns)",
					// 'custom'					=> "Custom (Percentage)"
				),
				'std'		=> 'col-12 col-sm-6'
			),

			// array(
			// 	'id'		=> 'pix-popup-width',
			// 	'type'		=> 'text',
			// 	'title'		=> __('Custom width', 'pix-opts'),
			// 	'sub_desc' 	=> __('Enter width percentage (for example: 50%).', 'pix-opts'),
			// 	'desc' 	=> __('*Only works when Popup size above is set to custom.', 'pix-opts'),
			// 	// 'options'	=> array('1' => 'Yes', '0' => 'No'),
			// 	'std'		=> ''
			// ),
			// array(
			// 	'id'		=> 'pix-popup-dismiss',
			// 	'type'		=> 'switch',
			// 	'title'		=> __('Enable background dismiss', 'pix-opts'),
			// 	'sub_desc' 	=> __('Close the popup when clicking outside the popup.', 'pix-opts'),
			// 	'options'	=> array('1' => 'Yes', '0' => 'No'),
			// 	'std'		=> '1'
			// ),


		),
	);

	add_meta_box($pix_pixpopup_meta_box['id'], $pix_pixpopup_meta_box['title'], 'pix_pixpopup_show_box', $pix_pixpopup_meta_box['page'], $pix_pixpopup_meta_box['context'], $pix_pixpopup_meta_box['priority']);
}
 add_action('admin_menu', 'pix_pixpopup_meta_add');



 function pix_pixpopup_show_box() {
	global $pix_pixpopup_meta_box, $post;

	// Use nonce for verification
	echo '<div id="pix-wrapper">';
		echo '<input type="hidden" name="pix_page_meta_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';



		echo '<table class="form-table">';
			echo '<tbody>';

				foreach ($pix_pixpopup_meta_box['fields'] as $field) {
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
function pix_pixpopup_save_data($post_id) {
	global $pix_pixpopup_meta_box;

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



	// check and save fields ( $pix_pixpopup_meta_box['fields'] )
	if(!empty($pix_pixpopup_meta_box)){
		foreach ( (array)$pix_pixpopup_meta_box['fields'] as $field ) {
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
add_action('save_post', 'pix_pixpopup_save_data');





/*-----------------------------------------------------------------------------------*/
/*	Styles & scripts
 /*-----------------------------------------------------------------------------------*/
function pix_pixpopup_admin_styles() {
	wp_enqueue_style( 'pix-meta', PIX_CORE_PLUGIN_URI. '/functions/css/pixbuilder.css', false, time(), 'all');
    wp_enqueue_style( 'pix-meta2', PIX_CORE_PLUGIN_URI. '/functions/pixbuilder.css', false, time(), 'all');
}
add_action('admin_print_styles', 'pix_pixpopup_admin_styles');

?>
