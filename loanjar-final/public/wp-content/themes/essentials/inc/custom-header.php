<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
 *	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package essentials
 */


/**
 * Set up the WordPress core custom header feature.
 *
 * @uses essentials_header_style()
 */
function essentials_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'essentials_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'essentials_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'essentials_custom_header_setup' );




if ( ! function_exists( 'essentials_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see essentials_custom_header_setup().
	 */
	function essentials_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
		// If the user has set a custom color for the text use that.
		else :
			?>
			.site-title a {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;







// Create fields
// Show columns
// Save/Update fields
// Update the Walker nav
function fields_list() {
	$fields = array(
		'pix_megamenu_section' => array(
			'pix_is_megamenu'		=> array(
					'label' => esc_attr__( 'Enable Megamenu ', 'essentials' ),
					'element' => 'checkbox',
					'classes'	=> 'pix-mega-opt'
			),
		),
		'pix_column_section'		=> array(
			'pix_is_column_item'		=> array(
					'label' => esc_attr__( 'Convert to column item ', 'essentials' ),
					'element' => 'checkbox',
					'classes'	=> 'pix-dropdown-opt pix-column-opt'
			),
			'pix_hide_column_label'		=> array(
					'label' => esc_attr__( 'Hide the label ', 'essentials' ),
					'element' => 'checkbox',
					'classes'	=> 'pix-dropdown-opt pix-column-opt'
			),
			// 'pix_is_column_padding'		=> array(
			// 		'label' => esc_attr__( 'Use padding style ', 'essentials' ),
			// 		'element' => 'checkbox',
			// 		'classes'	=> 'pix-dropdown-opt pix-column-opt'
			// ),
			'pix_is_column_padding'		=> array(
					'label' => esc_attr__( 'Use padding style ', 'essentials' ),
					'element' => 'select',
					'options' => array(
						'0' => esc_attr__( 'No', 'essentials' ),
						'1' => esc_attr__( 'Normal', 'essentials' ),
						'2' => esc_attr__( 'Small', 'essentials' ),
					),
					'classes'	=> 'pix-dropdown-opt pix-column-opt'
			),
			'pix_columns_number'		=> array(
					'label' => esc_attr__( 'Width', 'essentials' ),
					'element' => 'select',
					'options' => array(
						'2' => esc_attr__( '2 Columns (~16% of Mega menu)', 'essentials' ),
						'3' => esc_attr__( '3 Columns (25% of Mega menu)', 'essentials' ),
						'4' => esc_attr__( '4 Columns (~33% of Mega menu)', 'essentials' ),
						'6' => esc_attr__( '6 Columns (50% of Mega menu)', 'essentials' ),
						'12' => esc_attr__( '12 Columns (100% of Mega menu)', 'essentials' ),
					),
					'classes'	=> 'pix-dropdown-opt pix-column-opt'
			),
			'pix_columns_line'		=> array(
					'label' => esc_attr__( 'Add column line ', 'essentials' ),
					'element' => 'select',
					'options' => array(
						'none' => esc_attr__( 'Disabled', 'essentials' ),
						'pix-menu-line-right' => esc_attr__( 'Right', 'essentials' ),
						'pix-menu-line-top' => esc_attr__( 'Top', 'essentials' ),
						'pix-menu-line-right-top' => esc_attr__( 'Right & Top', 'essentials' ),
					),
					'classes'	=> 'pix-dropdown-opt pix-column-opt'
			),
		),
		'pix_box_section'		=> array(
			'pix_is_image_item'		=> array(
					'label' => esc_attr__( 'Convert to Box item ', 'essentials' ),
					'element' => 'checkbox',
					'classes'	=> 'pix-dropdown-opt pix-box-opt'
			),
			'pix_box_title'		=> array(
					'label' => esc_attr__( 'Title', 'essentials' ),
					'element' => 'text',
					'classes'	=> 'pix-dropdown-opt pix-box-opt'
			),
			'pix_box_text'		=> array(
					'label' => esc_attr__( 'Text', 'essentials' ),
					'element' => 'text',
					'classes'	=> 'pix-dropdown-opt pix-box-opt'
			),
			'pix_bg_image'		=> array(
					'label' => esc_attr__( 'Background image ', 'essentials' ),
					'element' => 'media',
					'classes'	=> 'pix-dropdown-opt pix-box-opt upload_image_button'
			),
			'pix_box_style'		=> array(
					'label' => esc_attr__( 'Box style ', 'essentials' ),
					'element' => 'select',
					'options' => array(
						'default' => esc_attr__( 'Default', 'essentials' ),
						'padding' => esc_attr__( 'With padding', 'essentials' ),
						'padding-no-top' => esc_attr__( 'With padding (No padding top)', 'essentials' ),
					),
					'classes'	=> 'pix-dropdown-opt pix-box-opt'
			),
			'pix_is_full_height'		=> array(
					'label' => esc_attr__( 'Make the box full column height ', 'essentials' ),
					'element' => 'checkbox',
					'classes'	=> 'pix-dropdown-opt pix-box-opt'
			),
			'pix_is_box_dark'		=> array(
					'label' => esc_attr__( 'Use light text colors ', 'essentials' ),
					'element' => 'checkbox',
					'classes'	=> 'pix-dropdown-opt pix-box-opt'
			),
		),
		// pix_beta
		// 'pix_menu_advanced' => array(
		// 	'pix_menu_opts'		=> array(
		// 			'label' => esc_attr__( 'Advanced ', 'essentials' ),
		// 			'element' => 'advanced',
		// 			'classes'	=> 'pix-test'
		// 	),
		// ),
	);
	// if(defined('PIX_DEV')){
		$fields['pix_menu_advanced'] = array(
			'pix_menu_opts'		=> array(
					'label' => esc_attr__( 'Advanced ', 'essentials' ),
					'element' => 'advanced',
					'classes'	=> 'pix-test'
			)
		);
	// }
	return $fields;
}


function pix_create_checkbox_field($id, $item, $key, $name, $value, $class, $field){
	$html = '';
	$classes = '';
	if(!empty($field['classes'])){
		$classes = $field['classes'];
	}
	$classes .= ' '.$class;
	?>
	<p class="description description-wide <?php echo esc_attr( $classes ); ?>">
		<label for="<?php esc_attr( $id ); ?>">
			<?php if( $value == 1 ){ ?>
				<input type="checkbox" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>" value="1" checked="checked" /><?php echo esc_attr( $field['label'] ); ?>
			<?php }else{ ?>
				<input type="checkbox" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>" value="1" /><?php echo esc_attr( $field['label'] ); ?>
			<?php } ?>
		</label>
	<?php
}
function pix_create_text_field($id, $item, $key, $name, $value, $class, $field){
	$html = '';
	$classes = '';
	if(!empty($field['classes'])){
		$classes = $field['classes'];
	}
	$classes .= ' '.$class;
	?>
	<p class="description description-wide <?php echo esc_attr( $classes ); ?>">
		<label for="<?php echo esc_attr( $id ); ?>">
			<?php echo esc_attr( $field['label'] ); ?>
			<input class="pix-menu-input-field" type="text" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $value ); ?>" />
		</label>
	<?php
}
function pix_create_media_field($id, $item, $key, $name, $value, $class, $field){
	$html = '';
	$classes = '';
	if(!empty($field['classes'])){
		$classes = $field['classes'];
	}
	$classes .= ' '.$class;
	?>
	<p class="description description-wide <?php echo esc_attr( $classes ); ?>">
		<label for="<?php echo esc_attr( $id ); ?>">
			<?php echo esc_attr( $field['label'] ); ?>
			<input class="widefat" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>" type="text" value="<?php echo esc_attr( $value ); ?>" />
      <button class="upload_image_button button button-primary">Upload Image</button>
		</label>
	<?php
}
function pix_create_select_field($id, $item, $key, $name, $value, $class, $field){
	$html = '';
	$classes = '';
	if(!empty($field['classes'])){
		$classes = $field['classes'];
	}
	$classes .= ' '.$class;
	?>
	<p class="description description-wide <?php esc_attr( $classes ); ?>">
		<label for="<?php echo esc_attr( $id ); ?>">
			<?php echo esc_attr( $field['label'] ); ?>
			<select id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>"  >
				<?php foreach ( $field['options'] as $k => $n ) {
					if( $value == $k ){ ?>
						<option selected="selected" value="<?php echo esc_attr($k); ?>"><?php echo esc_attr( $n ); ?></option>
					<?php }else{ ?>
						<option value="<?php echo esc_attr($k); ?>"><?php echo esc_attr( $n ); ?></option>
					<?php }
				} ?>
			</select>
		</label>
	<?php
}

function pix_create_advanced_field($id, $item, $key, $name, $value, $class, $field){
	$html = '';
	$classes = '';
	if(!empty($field['classes'])){
		$classes = $field['classes'];
	}
	$classes .= ' '.$class;
	?>
	<p class="description description-wide <?php echo esc_attr( $classes ); ?>">
		<label for="<?php echo esc_attr( $id ); ?>">
			<input class="pix-menu-item-res-data" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>" type="hidden" value="<?php echo esc_attr( $value ); ?>" />
      		<button class="pix_menu_item_btn button button-primary"><?php echo esc_attr__('Advanced menu item Options', 'essentials'); ?></button>
		</label>
	<?php
}

// Setup fields
function pix_megamenu_fields( $id, $item, $depth, $args ) {
	$sections = fields_list();
	?>
	<div class="pix-menu-item-opts">
		<a target="_blank" href="https://essentials.pixfort.com/knowledge-base/how-to-create-menus/" class="pix-menu-mega-badge">Mega Menu</a>
	<?php
	foreach ( $sections as $skey => $sval ) :
		?>
		<div class="<?php echo esc_attr($skey); ?>">
		<?php
		foreach ( $sval as $_key => $field ) :
			$key   = sprintf( 'menu-item-%s', $_key );
			$id    = sprintf( 'edit-%s-%s', $key, $item->ID );
			$name  = sprintf( '%s[%s]', $key, $item->ID );
			$value = get_post_meta( $item->ID, $key, true );
			$class = sprintf( 'field-%s', $_key );
			$element = $field['element'];

			if($element=='checkbox'){
				pix_create_checkbox_field($id, $item, $key, $name, $value, $class, $field);
			}
			if($element=='select'){
				pix_create_select_field($id, $item, $key, $name, $value, $class, $field);
			}
			if($element=='text'){
				pix_create_text_field($id, $item, $key, $name, $value, $class, $field);
			}
			if($element=='media'){
				pix_create_media_field($id, $item, $key, $name, $value, $class, $field);
			}
			if($element=='advanced'){
				pix_create_advanced_field($id, $item, $key, $name, $value, $class, $field);
			}

		endforeach;
		?>
		</div>
		<?php
	endforeach;
	?>
	</div>
	<?php
}
add_action( 'wp_nav_menu_item_custom_fields', 'pix_megamenu_fields', 10, 4 );
// Create Columns
function pix_megamenu_columns( $columns ) {
	$sections = fields_list();
	foreach ( $sections as $key => $fields ) {
		$columns = array_merge( $columns, $fields );
	}
	return $columns;
}
// add_filter( 'manage_nav-menus_columns', 'pix_megamenu_columns', 99 );
// Save fields
function pix_megamenu_save( $menu_id, $menu_item_db_id, $menu_item_args ) {
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		return;
	}
	// check_admin_referer( 'update-nav_menu', 'update-nav-menu-nonce' );
	$sections = fields_list();
	foreach ( $sections as $skey => $fields ) {
		foreach ( $fields as $_key => $label ) {
			$key = sprintf( 'menu-item-%s', $_key );
			// Sanitize.
			if ( ! empty( $_POST[ $key ][ $menu_item_db_id ] ) ) {
				// Do some checks here...
				$value = $_POST[ $key ][ $menu_item_db_id ];
			} else {
				if ( ! empty( $_REQUEST[ $key ][ $menu_item_db_id ] ) ) {
					// Do some checks here...
					$value = $_REQUEST[ $key ][ $menu_item_db_id ];
				} else {
					$value = null;
				}
			}

			// Update.
			if ( ! is_null( $value ) ) {
				update_post_meta( $menu_item_db_id, $key, $value );
			} else {
				// update_post_meta( $menu_item_db_id, $key, $value );
				delete_post_meta( $menu_item_db_id, $key );
			}
		}
	}
}
add_action( 'wp_update_nav_menu_item', 'pix_megamenu_save', 10, 3 );
function pix_megamenu_filter_walker( $walker ) {
    $walker = 'MegaMenu_Walker_Edit';
    if ( ! class_exists( $walker ) ) {
        require_once dirname( __FILE__ ) . '/walker-nav-menu-edit.php';
    }
    return $walker;
}
add_filter( 'wp_edit_nav_menu_walker', 'pix_megamenu_filter_walker', 99 );
