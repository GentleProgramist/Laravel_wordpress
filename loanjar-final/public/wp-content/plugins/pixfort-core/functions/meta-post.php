<?php
/**
 * Post custom meta fields.
 */


function pix_post_meta_add(){

	global $pix_post_meta_box_3;


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


	$header_posts = get_posts([
		'post_type' => 'pixheader',
		'post_status' => array('publish', 'private'),
		'numberposts' => -1
		// 'order'    => 'ASC'
	]);

	$headers = array();

	$headers[''] = "Theme Default";
	$headers['disable'] = "Disable";
	foreach ($header_posts as $key => $value) {
		$headers[$value->ID] = $value->post_title;
	}

	$footer_posts = get_posts([
		'post_type' => 'pixfooter',
		'post_status' => array('publish', 'private'),
		'numberposts' => -1
		// 'order'    => 'ASC'
	]);

	$footers = array();
	$footers[''] = "Theme Default";
	$footers['disable'] = "Disabled";
	foreach ($footer_posts as $key => $value) {
		$footers[$value->ID] = $value->post_title;
	}


	$pix_post_meta_box_3 = array(
		'id' 		=> 'pix-meta-post',
		'title' 	=> __('PixFort Post Options','pix-opts'),
		'page' 		=> 'post',
		'post_types'	=> array('post'),
		'context' 	=> 'normal',
		'priority' 	=> 'default',
		'fields'	=> array(


			array(
				'id'		=> 'pix-post-video',
				'type'		=> 'textarea',
				'title'		=> __('Post video', 'pix-opts'),
				'desc'	=> __('Input the embed video if the post format is "Video", leave empty to use the first video in the page.', 'pix-opts'),
			),
			array(
				'id'		=> 'pix-post-audio',
				'type'		=> 'textarea',
				'title'		=> __('Post audio', 'pix-opts'),
				'desc'	=> __('Input the embed audio if the post format is "Audio", leave empty to use the first audio in the page.', 'pix-opts'),
			),
			array(
				'id'		=> 'pix-post-link',
				'type'		=> 'text',
				'title'		=> __('Post link', 'pix-opts'),
				'desc'	=> __('Input the link if the post format is "Link".', 'pix-opts'),
			),
			array(
				'id'		=> 'pix-post-quote',
				'type'		=> 'textarea',
				'title'		=> __('Post Quote', 'pix-opts'),
				'desc'	=> __('Input the quote if the post format is "Quote".', 'pix-opts'),
			),
			array(
				'id'		=> 'pix-post-quote-citation',
				'type'		=> 'text',
				'title'		=> __('Post quote citation', 'pix-opts'),
				'desc'	=> __('Input the citation of the quote.', 'pix-opts'),
			),

			array(
				'id' 		=> 'pix-page-header',
				'type' 		=> 'select',
				'title' 	=> __('Custom Header', 'pixfort-core'),
				'options' 	=> $headers,
			),
			array(
				'id' 		=> 'pix-page-footer',
				'type' 		=> 'select',
				'title' 	=> __('Custom Footer', 'pixfort-core'),
				'options' 	=> $footers,
			),

			array(
				'id'		=> 'pix-custom-intro-bg',
				'type'		=> 'media',
				'title'		=> __('Page intro background image', 'pix-opts'),
				'sub_desc'	=> __('Select an image to override the default intro background image.', 'pix-opts'),
			),


		),
	);
	add_meta_box($pix_post_meta_box_3['id'], $pix_post_meta_box_3['title'], 'pix_post_show_box', $pix_post_meta_box_3['page'], $pix_post_meta_box_3['context'], $pix_post_meta_box_3['priority']);
}

 add_action('admin_menu', 'pix_post_meta_add');


 function pix_post_show_box() {
	global $pix_post_meta_box_3, $post;

	// Use nonce for verification
	echo '<div id="pix-wrapper">';
		echo '<input type="hidden" name="pix_post_meta_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';



		echo '<table class="form-table">';
			echo '<tbody>';

				foreach ($pix_post_meta_box_3['fields'] as $field) {
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
/*	Save data when post is edited
/*-----------------------------------------------------------------------------------*/
function pix_post_save_data($post_id) {
	global $pix_post_meta_box_3;

	// verify nonce
	if( key_exists( 'pix_post_meta_nonce',$_POST ) ) {
		if ( ! wp_verify_nonce( $_POST['pix_post_meta_nonce'], basename(__FILE__) ) ) {
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




	if(!empty($pix_post_meta_box_3)){
		foreach ( (array)$pix_post_meta_box_3['fields'] as $field ) {
			$old = get_post_meta($post_id, $field['id'], true);
			if( key_exists($field['id'], $_POST) ) {
				$new = $_POST[$field['id']];
			} else {
				$new = ""; // problem with "quick edit"
				//continue;
			}

			if( isset($new) && $new != $old) {
				update_post_meta($post_id, $field['id'], $new);
			}elseif('' == $new && $old) {
			    delete_post_meta($post_id, $field['id'], $old);
			}
			// if( isset($new) && $new != $old) {
			// 	if($field['type']=="switch"){
			// 		if( isset( $_POST[$field['id']] ) ) {
			//             update_post_meta($post_id, $field['id'], 'no');
			//         } else {
			//             update_post_meta($post_id, $field['id'], 'no');
			//         }
			// 	}else{
			// 		update_post_meta($post_id, $field['id'], $new);
			// 	}
			// }elseif('' == $new && $old) {
			// 	if($field['type']=="switch"){
			// 		if( isset( $_POST[$field['id']] ) ) {
			//             update_post_meta($post_id, $field['id'], 'no');
			//         } else {
			//             update_post_meta($post_id, $field['id'], 'no');
			//         }
			//     }else{
			//     	delete_post_meta($post_id, $field['id'], $old);
			//     }
			// }else{
			// 	if($field['type']=="switch"){
			// 		if( isset( $_POST[$field['id']] ) ) {
			//             update_post_meta($post_id, $field['id'], 'no');
			//         } else {
			//             update_post_meta($post_id, $field['id'], 'no');
			//         }
			// 	}else{
			// 		update_post_meta($post_id, $field['id'], $new);
			// 	}
			// }
		}
	}
}
add_action('save_post', 'pix_post_save_data');







/*-----------------------------------------------------------------------------------*/
/*	Styles & scripts
/*-----------------------------------------------------------------------------------*/
function pix_post_admin_styles() {
	wp_enqueue_style( 'pix-meta', PIX_CORE_PLUGIN_URI. 'functions/css/pixbuilder.css', false, time(), 'all');
    wp_enqueue_style( 'pix-meta2', PIX_CORE_PLUGIN_URI. 'functions/pixbuilder.css', false, time(), 'all');
}
add_action('admin_print_styles', 'pix_post_admin_styles');

function pix_post_admin_scripts() {
	// wp_enqueue_script( 'pix-admin-piximations', PIX_CORE_PLUGIN_URI . 'functions/js/piximations.js');
	// wp_enqueue_script( 'pix-admin-custom', PIX_CORE_PLUGIN_URI . 'functions/js/custom.js', array('jquery'));
	// wp_localize_script( 'pix-admin-custom', 'plugin_object', array(
	//     'PIX_CORE_PLUGIN_URI' => PIX_CORE_PLUGIN_URI,
	// ));
}
add_action('admin_print_scripts', 'pix_post_admin_scripts');

?>
