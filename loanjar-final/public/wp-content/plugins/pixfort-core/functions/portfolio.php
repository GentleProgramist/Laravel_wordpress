<?php
/**
 * Portfolio custom meta fields.
 */

/* ---------------------------------------------------------------------------
 * Create new post type
 * --------------------------------------------------------------------------- */
function pix_portfolio_post_type()
{
	//$portfolio_item_slug = pix_get_option( 'portfolio-slug', 'portfolio-item' );
	// portfolio-slug
	$portfolio_item_slug = "portfolio-item";
	if(function_exists('pix_plugin_get_option')){
		if(!empty(pix_plugin_get_option('portfolio-slug'))){
			$portfolio_item_slug = pix_plugin_get_option('portfolio-slug');
		}
	}


	$labels = array(
		'name' 					=> __('Portfolio','pixfort-core'),
		'singular_name' 		=> __('Portfolio item','pixfort-core'),
		'add_new' 				=> __('Add New','pixfort-core'),
		'add_new_item' 			=> __('Add New Portfolio item','pixfort-core'),
		'edit_item' 			=> __('Edit Portfolio item','pixfort-core'),
		'new_item' 				=> __('New Portfolio item','pixfort-core'),
		'view_item' 			=> __('View Portfolio item','pixfort-core'),
		'search_items' 			=> __('Search Portfolio items','pixfort-core'),
		'not_found' 			=> __('No portfolio items found','pixfort-core'),
		'not_found_in_trash' 	=> __('No portfolio items found in Trash','pixfort-core'),
		'parent_item_colon' 	=> ''
	  );

	$args = array(
		'labels' 				=> $labels,
		'menu_icon'				=> 'dashicons-images-alt2',
		'public' 				=> true,
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,
		'can_export' 				=> true,
		'query_var' 			=> true,
		'capability_type' 		=> 'post',
		'hierarchical' 			=> false,
		'menu_position' 		=> null,
		'show_in_menu' 			=> true,
		'show_in_rest' 			=> true,
		'rewrite' 				=> array( 'slug' => $portfolio_item_slug, 'with_front' => true ),
		'supports' 				=> array( 'title', 'editor', 'author', 'excerpt', 'thumbnail', 'revisions', 'page-attributes' ),
	);

	register_post_type( 'portfolio', $args );

	register_taxonomy( 'portfolio-types', 'portfolio', array(
		'hierarchical' 			=> true,
		'label' 				=>  __( 'Portfolio categories', 'pixfort-core' ),
		'singular_label' 		=>  __( 'Portfolio category', 'pixfort-core' ),
		'rewrite'				=> true,
		// 'rewrite' => array('slug' => 'projects', 'with_front' => true),
		// 'rewrite' => array('slug' => ''),
		'query_var' 			=> true,
		'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
		'show_in_rest' => true,

	));


}
add_action( 'init', 'pix_portfolio_post_type' );


/* ---------------------------------------------------------------------------
 * Edit columns
 * --------------------------------------------------------------------------- */
function pix_portfolio_edit_columns($columns)
{
	$newcolumns = array(
		"cb" 					=> "<input type=\"checkbox\" />",
		"portfolio_thumbnail" 	=> __('Thumbnail','pixfort-core'),
		"title" 				=> 'Title',
		"portfolio_types" 		=> __('Categories','pixfort-core'),
		"portfolio_order" 		=> __('Order','pixfort-core'),
	);
	$columns = array_merge($newcolumns, $columns);

	return $columns;
}
add_filter("manage_edit-portfolio_columns", "pix_portfolio_edit_columns");


/* ---------------------------------------------------------------------------
 * Custom columns
 * --------------------------------------------------------------------------- */
function pix_portfolio_custom_columns($column)
{
	global $post;
	switch ($column)
	{
		case "portfolio_thumbnail":
			if ( has_post_thumbnail() ) { the_post_thumbnail('thumbnail'); }
			break;
		case "portfolio_types":
			echo get_the_term_list($post->ID, 'portfolio-types', '', ', ','');
			break;
		case "portfolio_order":
			echo $post->menu_order;
			break;
	}
}
add_action("manage_posts_custom_column",  "pix_portfolio_custom_columns");






function pix_portfolio_meta_add(){
	global $pix_page_meta_box;


	// Layouts ----------------------------------
	$layouts = array(
		0 => '-- Theme Options --' ,
		'default'        => 'Default',
		'sidebar'        => 'With Sidebar',
		'sidebar-full'        => 'With Sidebar (Full width)',
		'box'        => 'Intro box'
	);

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


	$pix_page_meta_box = array(
		'id' 		=> 'pix-meta-page',
		'title' 	=> __('PixFort Options','pixfort-core'),
		'page' 		=> 'portfolio',
		'post_types'	=> array('portfolio'),
		'context' 	=> 'normal',
		'priority' 	=> 'high',
		'fields'	=> array(

			array(
			    'id'               => 'portfolio-text',
			    'type'             => 'tinymce',
			    'title'            => __('Portfolio Text', 'redux-framework-demo'),
			    'default'          => 'Essentials by PixFort.',
			    'rows'          => 12,
		    ),

			array(
				'id'		=> 'pix-post-hide-content',
				'type'		=> 'switch',
				'title'		=> __('Hide The Content', 'pixfort-core'),
				'sub_desc'	=> __('Hide the content from the WordPress editor.', 'pixfort-core'),
				'desc'		=> __('<strong>Turn it ON if you build content using Content Builder</strong>. Use the Content item if you want to display the Content from editor within the Content Builder.', 'pixfort-core'),
				'options'	=> array('1' => 'On', '0' => 'Off'),
				'std'		=> '0'
			),


			array(
				'id'		=> 'pix-custom-intro-bg',
				'type'		=> 'media',
				'title'		=> __('Page intro background image', 'pixfort-core'),
				'sub_desc'	=> __('Select an image to override the default intro background image.', 'pixfort-core'),
			),
			array(
				'id'		=> 'pix-highlights',
				'type'		=> 'multifields',
				'title'		=> __('Highlights', 'pixfort-core'),
			),

			array(
				'id' 		=> 'pix-post-custom-layout',
				'type' 		=> 'select',
				'title' 	=> __('Custom Layout', 'pixfort-core'),
				'desc' 		=> __('Custom Layout overwrites Theme Options', 'pixfort-core'),
				'options' 	=> $layouts,
			),
			array(
				'id'		=> 'pix-hide-top-padding',
				'type'		=> 'select',
				'title'		=> __('Hide Top Padding', 'pixfort-core'),
				'sub_desc'	=> __('Hide the padding before page content (under the header).', 'pixfort-core'),
				'options'	=> array('1' => 'Yes', '0' => 'No'),
				'std'		=> '0'
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

		),
	);

	add_meta_box($pix_page_meta_box['id'], $pix_page_meta_box['title'], 'pix_portfolio_show_box', $pix_page_meta_box['page'], $pix_page_meta_box['context'], $pix_page_meta_box['priority']);
}
 add_action('admin_menu', 'pix_portfolio_meta_add');



 function pix_portfolio_show_box() {
	global $pix_page_meta_box, $post;

	// Use nonce for verification
	echo '<div id="pix-wrapper">';
		echo '<input type="hidden" name="pix_page_meta_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';



		echo '<table class="form-table">';
			echo '<tbody>';

				foreach ($pix_page_meta_box['fields'] as $field) {
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
function pix_portfolio_save_data($post_id) {
	global $pix_page_meta_box;

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



	// check and save fields ( $pix_page_meta_box['fields'] )
	if(!empty($pix_page_meta_box)){
		foreach ( (array)$pix_page_meta_box['fields'] as $field ) {
			$old = get_post_meta($post_id, $field['id'], true);
			if( key_exists($field['id'], $_POST) ) {
				$new = $_POST[$field['id']];
			} else {
	//			$new = ""; // problem with "quick edit"
				continue;
			}

			if ( isset($new) && $new != $old) {
				update_post_meta($post_id, $field['id'], $new);
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $field['id'], $old);
			}
		}
	}
}
add_action('save_post', 'pix_portfolio_save_data');


/*-----------------------------------------------------------------------------------*/
/*	Styles & scripts
 /*-----------------------------------------------------------------------------------*/
function pix_portfolio_admin_styles() {
	wp_enqueue_style( 'pix-meta', PIX_CORE_PLUGIN_URI. '/functions/css/pixbuilder.css', false, time(), 'all');
    wp_enqueue_style( 'pix-meta2', PIX_CORE_PLUGIN_URI. '/functions/pixbuilder.css', false, time(), 'all');
}
add_action('admin_print_styles', 'pix_portfolio_admin_styles');

function pix_portfolio_admin_scripts() {
//	wp_enqueue_script( 'jquery.pixbuilder', FUNC_URI. '/js/pixbuilder.js', false, time(), true );
}
add_action('admin_print_scripts', 'pix_portfolio_admin_scripts');

?>
