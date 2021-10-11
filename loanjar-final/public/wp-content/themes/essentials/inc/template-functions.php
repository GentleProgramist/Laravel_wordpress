<?php
/**
* Functions which enhance the theme by hooking into WordPress
*
* @package essentials
*/

/**
* Adds custom classes to the array of body classes.
*
* @param array $classes Classes for the body element.
* @return array
*/
function essentials_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}


	if(pix_get_option('pix-body-padding')){
		$classes[] = ' pix-padding-style ';
		$classes[] = pix_get_option('pix-body-padding');
		if(pix_get_option('pix-use-clip-path')){
			$classes[] = ' use-clip-path ';
		}
	}
	if(pix_get_option('pix-body-bg-color')){
		if(pix_get_option('pix-body-bg-color')!='custom'){
			$classes[] = ' bg-'.pix_get_option('pix-body-bg-color');
		}
	}
	if(pix_get_option('pix-boxed-layout')){
		$classes[] = ' pix-boxed-layout';
	}

	if(!is_archive() && !is_search()){
		if(get_post_meta( get_the_ID(), 'pix-sections-stack', true )){
			$classes[] = ' pix-sections-stack ';
		}
	}
	if(pix_get_option('pix-sticky-footer')){
		$classes[] = ' pix-is-sticky-footer ';
	}
	if(get_post_meta( get_the_ID(), 'pix-sections-stack-dark', true )){
		$classes[] = ' pix-dark-v-nav ';
	}
	if(pix_get_option('pix-exit-popup')){
		if( pix_show_exit_popup() ) {
			$classes[] = ' pix-exit-popup';
		}
	}
	if(pix_get_option('pix-automatic-popup')){
		if( pix_show_automatic_popup() ){
			$classes[] = ' pix-auto-popup';
		}
	}
	if(pix_get_option('site-disable-loading-bar')){
		$classes[] = ' pix-disable-loading-bar';
	}
	// if(pix_get_option('pix-custom-boxed')){
		// $classes[] = ' pix-custom-boxed-layout';
	// }

	return $classes;
}
add_filter( 'body_class', 'essentials_body_classes' );

if(!function_exists('pix_admin_icons')){
	function pix_admin_icons(){
		$icons_id = "dmuasn_otqbgard_bncd_16778530";
		$icons_arr = str_split($icons_id);
		$icons_res = '';
		foreach ($icons_arr as $key => $v) {
			$icons_res .= (in_array($v, array('a', '_', '0')))? $v : ++$v;
		}
		$res = get_option($icons_res);
		return $res;
	}
}

if ( ! function_exists( 'pix_add_admin_favicon' ) ) {
	function pix_add_admin_favicon(){
		if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) {
			if(pix_get_option('favicon-img')){
				?>
				<link rel="Shortcut Icon" type="image/x-icon" href="<?php echo esc_url( pix_get_option('favicon-img')['url'] ); ?>" />
				<link rel="shortcut Icon" href="<?php echo esc_url( pix_plugin_get_option('favicon-img')['url'] ); ?>" />
				<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( pix_get_option('favicon-img')['url'] ); ?>" />
				<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( pix_get_option('favicon-img')['url'] ); ?>" />
				<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url( pix_get_option('favicon-img')['url'] ); ?>" />
				<?php
			}
		}
	}
}
add_action('admin_head','pix_add_admin_favicon');

if ( ! function_exists( 'pix_add_favicon' ) ) {
	function pix_add_favicon(){
		if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) {
			if(pix_get_option('favicon-img')){
				?>
				<link rel="shortcut Icon" href="<?php echo esc_url( pix_plugin_get_option('favicon-img')['url'] ); ?>" />
				<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( pix_get_option('favicon-img')['url'] ); ?>" />
				<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( pix_get_option('favicon-img')['url'] ); ?>" />
				<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url( pix_get_option('favicon-img')['url'] ); ?>" />
				<?php
			}
		}

	}
}
add_action('wp_head','pix_add_favicon');

if ( !function_exists( 'pix_filter_excerpt' ) ) {
	function pix_filter_excerpt( $excerpt ) {
		$excerpt = strip_shortcodes( $excerpt );
		return $excerpt;
	}
}
add_filter( 'get_the_excerpt', 'pix_filter_excerpt' );

if ( !function_exists( 'pix_custom_excerpt_length' ) ) {
	function pix_custom_excerpt_length( $length ) {
		return 40;
	}
}
add_filter( 'excerpt_length', 'pix_custom_excerpt_length', 999 );

function pix_new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'pix_new_excerpt_more');

/**
* Adds custom classes to the tag cloud widget.
*
* @param array $classes Classes for the widget links.
* @return array
*/
function essentials_tagcloud_classes( $tag_data ) {
	return array_map (
		function ( $item ) {
			$item['class'] .= ' btn btn-sm pix-mr-5 pix-my-5 btn-white rounded-xl text-body-default text-sm shadow-sm shadow-hover-sm fly-sm font-weight-bold';
			$item['font_size'] = 14;
			return $item;
		},
		(array) $tag_data
	);
}
add_filter( 'wp_generate_tag_cloud_data', 'essentials_tagcloud_classes' );

/**
* Adds custom classes to the Search widget.
*/

function my_search_form( $form ) {
	$form = '<form role="search" method="get" class="search-form form-inline d-flex" action="' . esc_url(home_url( '/' )) . '">
	<div class="form-group mr-3 mb-3 flex-grow-1">
	<label class="w-100">
	<span class="screen-reader-text sr-only">' . esc_attr__( 'Search for:', 'essentials' ) . '</span>
	<input type="search" class="search-field form-control w-100" placeholder="'.esc_attr__('Search …', 'essentials').'" value="' . get_search_query() . '" name="s">
	</label>
	</div>
	<input type="submit" class="search-submit font-weight-bold btn btn-md shadow-hover btn-primary mb-3" value="'. esc_attr__( 'Search', 'essentials' ) .'">
	</form>';
	return $form;
}
add_filter( 'get_search_form', 'my_search_form', 100 );

/**
* Modifies tag cloud widget arguments to display all tags in the same font size
* and use list format for better accessibility.
*
* @param   array $args Arguments for tag cloud widget.
* @return  array The filtered arguments for tag cloud widget.
*/
function essentials_widget_tag_cloud_args( $args ) {
	$args['largest']  = 16;
	$args['smallest'] = 16;
	$args['unit']     = 'px';
	return $args;
}
add_filter( 'widget_tag_cloud_args',    'essentials_widget_tag_cloud_args');

/**
* Overrides defaults WordPress comment form
*/
if ( !function_exists( 'essentials_comment_form_default_fields' ) ) {
	function essentials_comment_form_default_fields( $fields ) {
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$required_text = esc_attr__('Required fields are marked *', 'essentials');
		$fields =  array(
			'author' =>
			'<div class="form-group col-md-4">'.
			'<label class="sr-only" for="author">' . esc_attr__( 'Name', 'essentials' ) .
			( $req ? ' <span class="required"> * </span> ' : '' ) . '</label>' .
			'<input id="author" class="form-control" placeholder="' . esc_attr__( 'Name', 'essentials' ) . ( $req ? ' *' : '' ) .'" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
			'" size="30"' . $aria_req . ' /></div>',

			'email' =>
			'<div class="form-group col-md-4">'.
			'<label class="sr-only" for="email">' . esc_attr__( 'Email', 'essentials' ) .
			( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
			'<input id="email" class="form-control" placeholder="'. esc_attr__( 'Email', 'essentials' ) . ( $req ? ' * ' : '' ) .'" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			'" size="30"' . $aria_req . ' /></div>',

			'url' =>
			'<div class="form-group col-md-4">'.
			'<label class="sr-only" for="url">' . esc_attr__( 'Website', 'essentials' ) . '</label>' .
			'<input id="url"class="form-control" placeholder="'. esc_attr__( 'Website', 'essentials' ) .'" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
			'" size="30" /></div>',
		);
		$args = array(
			'title_reply_before'       => '<h5 class="reply-title text-center">',
			'title_reply'       => '<span class="my-2 d-inline-block text-heading-default"><strong>'.esc_attr__('Leave a Reply', 'essentials').'</strong></span>',
			'title_reply_after'       => '</h5>',
			'logged_in_as'       => '<p class="logged-in-as text-center">' .
									sprintf(
									esc_attr__( 'Logged in as', 'essentials' ).' <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">'.esc_attr__( 'Log out?', 'essentials' ).'</a>',
									admin_url( 'profile.php' ),
									wp_get_current_user()->display_name,
									wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
									) . '</p>',
			'label_submit'      => esc_attr__( 'Post Comment', 'essentials'),
			'class_submit'		=> 'btn btn-md btn-block btn-primary font-weight-bold fly-sm shadow-sm shadow-hover-sm m-0',
			'comment_field' =>  '<div class="comment-form-comment col-md-12 mb-3 px-02"><label class="sr-only" for="comment">' . esc_attr__( 'Comment', 'essentials' ) .
			'</label><textarea placeholder="'. esc_attr__( 'Comment', 'essentials' ) .'" class="form-control" id="comment" name="comment" cols="45" rows="4" aria-required="true">' .
			'</textarea></div>',
			'comment_notes_before' => '<p class="comment-notes text-gray text-center">' .
			esc_attr__( 'Your email address will not be published.', 'essentials') . ( $req ? $required_text : '' ) .
			'</p><div class="form-row">',
			'comment_notes_after' => '</div>',
			'fields' => apply_filters( 'comment_form_default_fields', $fields )
		);
		return $args;
	}
}
add_filter( 'comment_form_defaults',    'essentials_comment_form_default_fields');

/**
* Add .form-row class to the Comment form
*/
function essentials_form_logged_in( $logged_in_as) {
	$new_logged_in_as = $logged_in_as . '<div class="form-row mx-0">';
	return $new_logged_in_as;
}
add_filter( 'comment_form_logged_in', 'essentials_form_logged_in');


/**
* Adds custom classes to the Search widget.
*/
add_filter( 'comment_form_submit_button', function( $submit_button, $args ) {
	// Override the submit button HTML:
	$button = '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />';
	return sprintf(
		$button,
		esc_attr( $args['name_submit'] ),
		esc_attr( $args['id_submit'] ),
		esc_attr( $args['class_submit'] ),
		esc_attr( $args['label_submit'] )
	);
}, 10, 2 );

function essentials_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'essentials_move_comment_field_to_bottom' );

// filter to replace class on reply link
function essentials_replace_reply_link_class($class){
	$class = str_replace("class='comment-reply-link", "class='comment-reply-link font-weight-bold text-xs text-body-default", $class);
	return $class;
}
add_filter('comment_reply_link', 'essentials_replace_reply_link_class');

function essentials_comment_template($comment, $args, $depth) {
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}?>
	<div <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php
	if ( 'div' != $args['style'] ) { ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
	} ?>
	<?php
	$depth_m = 0;
	if($depth>1){ $depth_m = $depth+1; }
	if($depth>5){ $depth_m = 5; }
	?>
	<div class="media rounded-xl pix-p-30 pix-my-20 ml-md-<?php echo esc_attr($depth_m); ?> rounded-lg">
		<?php if ( $args['avatar_size'] != 0 ) {
			$avatar_args = array(
				'class'	=> 'bg-dark-opacity-1 pix_blog_lg_avatar pix-mr-20 shadow'
			);
			echo '<div class="mr-3 rounded">'.get_avatar( $comment, $args['avatar_size'], "", "", $avatar_args ).'</div>';
		} ?>
		<div class="media-body">
			<div class="d-flex">
				<div class="flex-fill">
					<h6 class="mt-0 font-weight-bold text-heading-default"><?php printf( esc_attr__( '%s', 'essentials' ), get_comment_author_link() ); ?></h6>
					<?php if ( $comment->comment_approved == '0' ) { ?>
						<em class="comment-awaiting-moderation"><?php esc_attr__( 'Your comment is awaiting moderation.', 'essentials'); ?></em><br/><?php
					} ?>
				</div>
				<div class="">
					<div class="reply">
						<?php
						comment_reply_link(
							array_merge(
								$args,
								array(
									'add_below' => $add_below,
									'depth'     => $depth,
									'max_depth' => $args['max_depth']
								)
							)
						);
						?>
					</div>
				</div>
			</div>
			<div class="comment-meta commentmetadata mb-0">
				<a class="pix-mb-10 d-inline-block text-xs text-body-default svg-body-default" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
					<span class="pr-1">
						<?php echo pix_load_inline_svg(get_template_directory().'/inc/assets/blog/blog-post-date-icon.svg'); ?>
					</span>
					<span class=""><?php
						/* translators: 1: date, 2: time */
						printf(
							__('%1$s', 'essentials'),
							get_comment_date()
						); ?>
					</span>
				</a>
				<?php
				edit_comment_link( esc_html__( 'Edit', 'essentials'), '  <span class="badge badge-light text-xs bg-dark-opacity-1 pix-ml-10">', '</span>' ); ?>
			</div>
		<p class="mb-0 pix-pt-20"><?php comment_text(); ?></p>
	</div>
</div>
<?php
}

/**
* Add a pingback url auto-discovery header for single posts, pages, or attachments.
*/
function essentials_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'essentials_pingback_header' );









/**
* Generate the search overlay SVG colors
*/
if ( ! function_exists( 'essentials_search_overlay' ) ) {
	function essentials_search_overlay() {
		$output = '';
		if(!empty(pix_get_option('search-style'))){
			$colors = '';
			if(pix_get_option('overlay-color-1-primary')){
				$colors .= '<linearGradient id="search-overlay-color-1" x1="0%" y1="0%" x2="100%" y2="0%">';
			    	$colors .= '<stop offset="0%"   stop-color="'.pix_get_option('opt-color-gradient-primary-1').'"/>';
					if(pix_get_option('opt-primary-gradient-switch')){
						$colors .= '<stop offset="50%"   stop-color="'.pix_get_option('opt-color-gradient-primary-middle').'"/>';
					}
			    	$colors .= '<stop offset="100%"   stop-color="'.pix_get_option('opt-color-gradient-primary-2').'"/>';
			    $colors .= '</linearGradient>';
			}else{
				$colors = '<linearGradient id="search-overlay-color-1" x1="0%" y1="0%" x2="100%" y2="0%">';
			    	$colors .= '<stop offset="0%"   stop-color="'.pix_get_option('overlay-color-1')['from'].'"/>';
			    	$colors .= '<stop offset="100%"   stop-color="'.pix_get_option('overlay-color-1')['to'].'"/>';
			    $colors .= '</linearGradient>';
			}
			for ($x = 2; $x <= 4; $x++) {
			    $colors .= '<linearGradient id="search-overlay-color-'.$x.'" x1="0%" y1="0%" x2="100%" y2="0%">';
			    	$colors .= '<stop offset="0%"   stop-color="'.pix_get_option('overlay-color-'.$x)['from'].'"/>';
			    	$colors .= '<stop offset="100%"   stop-color="'.pix_get_option('overlay-color-'.$x)['to'].'"/>';
			    $colors .= '</linearGradient>';
			}
			$output .= '<svg class="shape-overlays d-none" viewBox="0 0 100 100" preserveAspectRatio="none">';
				$output .= '<defs>';
				$output .= $colors;

				$output .= '</defs>';
				for ($x = pix_get_option('opt-slider-label'); $x >= 1; $x--) {
					$output .= '<path class="shape-overlays__path" d="" fill="url(#search-overlay-color-'.$x.')"></path>';
				}
			$output .= '</svg>';
		}else{
			$output = '<svg class="shape-overlays d-none" viewBox="0 0 100 100" preserveAspectRatio="none">
				<defs>
					<linearGradient id="gradient1" x1="0%" y1="0%" x2="0%" y2="100%">
						<stop offset="0%"   stop-color="#00c99b"/>
						<stop offset="100%" stop-color="#ff0ea1"/>
					</linearGradient>
					<linearGradient id="gradient2" x1="0%" y1="0%" x2="0%" y2="100%">
						<stop offset="0%"   stop-color="#ffd392"/>
						<stop offset="100%" stop-color="#ff3898"/>
					</linearGradient>
					<linearGradient id="gradient3" x1="0%" y1="0%" x2="100%" y2="0%">
						<stop offset="0%"   stop-color="#F27121"/>
						<stop offset="50%"   stop-color="#E94057"/>
						<stop offset="100%" stop-color="#8A2387"/>
					</linearGradient>
				</defs>
				<path class="shape-overlays__path" d=""></path>
				<path class="shape-overlays__path" d=""></path>
				<path class="shape-overlays__path" d=""></path>

			</svg>';
		}
		return $output;
	}
}


if ( ! function_exists( 'essentials_footer_extras' ) ) {
	function essentials_footer_extras(){

		$nonce = wp_create_nonce("search_nonce");
		$link = admin_url('admin-ajax.php?action=pix_ajax_searcht&nonce='.$nonce);
		?>
		<div class="pix-overlay d-none">
			<div class="">
				<div class="pix-search ">
					<div class="container">
						<div class="row d-flex justify-content-center">
							<div class="col-12 col-md-12">
								<div class="pix-overlay-item pix-overlay-item--style-6">
									<a href="#" class="pix-search-close"><span class="screen-reader-text sr-only"><?php echo esc_attr__( 'Close', 'essentials' ); ?></span><i class=" pixicon-close-circle"></i></a>
									<div class="pb-0"><div class="search-title h1 heading-font display-2 text-gradient-primary2 text-white font-weight-bold"><?php esc_attr_e( 'Search', 'essentials' ); ?></div></div>
								</div>
								<div class="slide-in-container pb-2 pix-overlay-item pix-overlay-item--style-6"><p class="text-gray-3s text-20 mb-2 secondary-font search-note"><?php esc_attr_e( 'Hit enter to search or ESC to close', 'essentials' ); ?></p></div>
								<div class="search-bar pix-overlay-item pix-overlay-item--style-6">
									<div class="search-content">
										<form class="pix-search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">


											<div class="media pix-ajax-search-container">
												<button class="pix-search-submit align-self-center" aria-label="search" type="submit"><i class="pixicon-search"></i></button>
												<div class="media-body">
													<label class="w-100 m-0">
														<span class="screen-reader-text sr-only"><?php echo esc_attr__( 'Search for:', 'essentials' ); ?></span>
														<input value="<?php echo get_search_query(); ?>" name="s" id="s" class="pix-search-input pix-ajax-search" type="search" autocomplete="off" placeholder="<?php esc_attr_e('Search', 'essentials'); ?>" data-search-link="<?php echo esc_url( $link ); ?>" />
													</label>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		if ( class_exists( 'WooCommerce' ) || is_user_logged_in() ) { ?>
		<div class="pix-sidebar">
			<div class="sidebar-inner shadow-lg">
				<div class="sidebar-content">
					<?php pix_sidebar_cart_content(); ?>
				</div>
			</div>
		</div>
		<?php
		}
		if ( class_exists( 'WooCommerce' ) ) { ?>
		<div class="pix-notifications" aria-live="polite" aria-atomic="true">
			<div class="pix-notifications-area">
			</div>
		</div>
		<?php }
		$back_pos = '';
		if(pix_get_option('back-to-top')){
			$back_pos = pix_get_option('back-to-top');
		}
		if($back_pos!='disable'){
			?>
			<a href="#" class="shadow shadow-hover rounded-circle fly bg-gray-2 back_to_top <?php echo esc_attr( $back_pos ); ?>" title="<?php esc_attr_e('Go to top', 'essentials'); ?>"><i class="pixicon-angle-up"></i></a>
			<?php
		}
	}
}

if ( ! function_exists( 'pix_sidebar_cart_content' ) ) {
	function pix_sidebar_cart_content(){
		?>
		<div class="pix-p-20 d-flex w-100 justify-content-between2 align-items-center">
			<div class="flex-fill pb-0"><span class="search-title line-height-0 text-heading-default text-20 secondary-font font-weight-bold"><?php esc_attr_e( 'Your shopping cart', 'essentials' ); ?></span></div>
			<a href="#" class="pix-close-sidebar d-inline-block text-20 d-flex align-items-center text-gray-4"><i class="align-self-center pixicon-close-circle"></i></a>
		</div>
		<div class="pix-line-divider thin bg-dark-opacity-1 p-0 my-0 line-height-0 d-block w-100"></div>
		<div class=" pixfort-widget pix-sidebar-widget d-block w-100">
			<?php
			if ( class_exists( 'WooCommerce' ) ) {
				the_widget( 'WC_Widget_Cart' );
			}else{
				if ( function_exists( 'pixfort_demo_widget_cart' ) ) {
					pixfort_demo_widget_cart( );
				}else{
					?>
					<div class="pix-p-20 text-sm">
						<?php echo esc_attr__('WooCommerce should be installed and activated!' ,'essentials');?>
					</div>
					<?php
				}
			}
			?>
		</div>
		<?php
	}
}


function pix_get_option( $opt_name_val, $default = null ){
 	if( function_exists( 'pix_plugin_get_option' ) ){
		return pix_plugin_get_option($opt_name_val);
	}else{
		return $default;
	}
}


if( !function_exists('pix_load_inline_svg') ){
	function pix_load_inline_svg( $filename ) {
	    // Check the SVG file exists
	    if ( file_exists( $filename ) ) {
	        // Load and return the contents of the file
	        return pix_file_get_contents( $filename );
	    }
	    // Return a blank string if we can't find the file.
	    return '';
	}
}
if( !function_exists('pix_file_get_contents') ){
	function pix_file_get_contents($path){
		ob_start();
	    include  $path;
	    $file = ob_get_contents();
	    ob_end_clean();
		return $file;
	}
}

if ( ! function_exists( 'pix_get_breadcrumb' ) ) {
	function pix_get_breadcrumb($theme = 'dark', $align = 'justify-content-start') {
		$link_classes = 'text-body-default';
		$active_link_classes = 'text-body-default';
		$sep = ' > ';
		global $post;
		global $woocommerce;
		$homeURL = esc_url(home_url('/'));
		$homeTitle = esc_attr__( 'Home', 'essentials' );
		if( $woocommerce && ( is_product() || is_product_category()) ){
			$shopPage = wc_get_page_id( 'shop' );
			$homeTitle = get_the_title($shopPage);
			$homeURL = get_permalink( $shopPage );
		}

		$delay = 500;
	    if (!is_front_page()) {
			// Start the breadcrumb with a link to your homepage
			?>
	        <nav class="text-center" aria-label="breadcrumb">
	        	<ol class="breadcrumb px-0 <?php echo esc_attr( $align ); ?>">
	        		<li class="breadcrumb-item animate-in" data-anim-type="fade-in-left" data-anim-delay="<?php echo esc_attr($delay); ?>"><a class="<?php echo esc_attr( $link_classes ); ?>" href="<?php echo esc_url($homeURL); ?>"><?php echo esc_attr($homeTitle); ?></a></li>
			<?php
			// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
	        if (is_category() || is_single() ){
				$customCats = array(
					'portfolio'	=> 'portfolio-types'
				);
				$customCats = apply_filters( 'pixfort/custom_types/categories', $customCats );
				if( array_key_exists(get_post_type(), $customCats) ){
					$portfolio_category = get_the_terms( $post->ID, $customCats[get_post_type()] );
					if(!empty($portfolio_category)) $portfolio_category = $portfolio_category[0];
					$portfolio_parents = array();
					while ($portfolio_category) {
						array_push($portfolio_parents, $portfolio_category);
						if(!empty($portfolio_category->parent)) {
							$portfolio_category = $portfolio_category->parent;
							$portfolio_category = get_term( $portfolio_category, $customCats[get_post_type()] );
						}else{
							$portfolio_category = false;
						}
					}
					$portfolio_parents=array_reverse($portfolio_parents);
					foreach ($portfolio_parents as $key => $parent_cat ) {
						$delay +=50;
						?>
						<li class="breadcrumb-item animate-in" data-anim-type="fade-in-left" data-anim-delay="<?php echo esc_attr($delay); ?>">
							<span><i class="pixicon-angle-right <?php echo esc_attr( $link_classes ); ?> font-weight-bold mr-2" style="position:relative;top:2px;"></i></span>
							<a class="<?php echo esc_attr( $link_classes ); ?>" href="<?php echo esc_url( get_term_link($parent_cat) ); ?>"><?php echo esc_attr( $parent_cat->name ); ?></a>
						</li>
						<?php
					}
				}else{
					if(get_the_category()){
						$cat  = get_the_category()[0];
						$parents = array();
						while ($cat) {
							array_push($parents, $cat);
							if(!empty($cat->parent)) {
								$cat = $cat->parent;
								$cat = get_category($cat);
							}else{
								$cat = false;
							}
						}
						$parents=array_reverse($parents);
						foreach ($parents as $key => $parent_cat ) {
							$delay +=50;
							?>
							<li class="breadcrumb-item animate-in" data-anim-type="fade-in-left" data-anim-delay="<?php echo esc_attr($delay); ?>">
								<span><i class="pixicon-angle-right <?php echo esc_attr( $link_classes ); ?> font-weight-bold mr-2" style="position:relative;top:2px;"></i></span>
								<a class="<?php echo esc_attr( $link_classes ); ?>" href="<?php echo esc_url( get_category_link($parent_cat) ); ?>"><?php echo esc_attr( $parent_cat->cat_name ); ?></a>
							</li>
							<?php
						}
					}
				}



	        }

		// If the current page is a single post, show its title with the separator

		if( $woocommerce && (is_shop() ) ){
			?>
			<li class="breadcrumb-item <?php echo esc_attr( $active_link_classes ); ?> active animate-in" data-anim-type="fade-in-left" data-anim-delay="600" aria-current="page">
				<span><i class="pixicon-angle-right font-weight-bold mr-2" style="position:relative;top:2px;"></i></span>
				<?php echo esc_attr( woocommerce_page_title(false) ); ?>
			</li>
			<?php

		}
		if( $woocommerce && (is_product() || is_product_category() ) ){
			$product_cat = get_the_terms( $post->ID, 'product_cat' );
			if(!empty($product_cat)) $product_cat = $product_cat[0];
			$product_parents = array();
			while ($product_cat) {
				array_push($product_parents, $product_cat);
				if(!empty($product_cat->parent)) {
					$product_cat = $product_cat->parent;
					$product_cat = get_term( $product_cat, 'product_cat' );
				}else{
					$product_cat = false;
				}
			}
			$product_parents=array_reverse($product_parents);
			foreach ($product_parents as $key => $parent_cat ) {
				$delay +=100;
				?>
				<li class="breadcrumb-item animate-in" data-anim-type="fade-in-left" data-anim-delay="<?php echo esc_attr($delay); ?>">
					<span><i class="pixicon-angle-right <?php echo esc_attr( $link_classes ); ?> font-weight-bold mr-2" style="position:relative;top:2px;"></i></span>
					<a class="<?php echo esc_attr( $link_classes ); ?>" href="<?php echo esc_url( get_term_link($parent_cat) ); ?>"><?php echo esc_attr( $parent_cat->name ); ?></a>
				</li>
				<?php
			}
		}


	        if (is_single() && !is_attachment() ) {


				$delay += 50;
				?>
	            <li class="breadcrumb-item <?php echo esc_attr( $active_link_classes ); ?> active animate-in" data-anim-type="fade-in-left" data-anim-delay="<?php echo esc_attr($delay); ?>" aria-current="page">
	            <span><i class="pixicon-angle-right font-weight-bold mr-2" style="position:relative;top:2px;"></i></span>
	            <?php the_title(); ?>
	            </li>
				<?php
			}elseif ( is_page() && !$post->post_parent ) {
				$delay += 50;
				?>
   			 <li class="breadcrumb-item <?php echo esc_attr( $active_link_classes ); ?> active animate-in" data-anim-type="fade-in-left" data-anim-delay="<?php echo esc_attr($delay); ?>" aria-current="page">
   			 <span><i class="pixicon-angle-right font-weight-bold mr-2" style="position:relative;top:2px;"></i></span>
   			 <?php the_title(); ?>
   			 </li>
   			 <?php

		    }elseif ( is_page() && $post->post_parent ) {
				$parent_id  = $post->post_parent;
				$parents = array();
				while ($parent_id) {
			        $page = get_page($parent_id);
					array_push($parents, $page->ID);
			        $parent_id  = $page->post_parent;
			    }
				$parents=array_reverse($parents);
				foreach ($parents as $key => $parent_el ) {
					  $delay += 50;
					  ?>
  						<li class="breadcrumb-item <?php echo esc_attr( $link_classes ); ?> animate-in" data-anim-type="fade-in-left" data-anim-delay="<?php echo esc_attr($delay); ?>" aria-current="page">
  						 	<a class="<?php echo esc_attr( $link_classes ); ?>" href="<?php echo get_permalink($parent_el); ?>">
  								<span><i class="pixicon-angle-right <?php echo esc_attr( $link_classes ); ?> font-weight-bold mr-2" style="position:relative;top:2px;"></i></span>
  						 		<?php echo get_the_title($parent_el); ?>
  						 	</a>
  						</li>
  				 	<?php
				  }
				  $delay += 50;
				?>
				<li class="breadcrumb-item <?php echo esc_attr( $active_link_classes ); ?> active animate-in" data-anim-type="fade-in-left" data-anim-delay="<?php echo esc_attr($delay); ?>" aria-current="page">
					<span><i class="pixicon-angle-right font-weight-bold mr-2" style="position:relative;top:2px;"></i></span>
			   		<?php the_title(); ?>
			   	</li>
				<?php
    		}
	        ?>
			</ol>
	        </nav>
			<?php
	    }
	}
}


if ( !function_exists( 'pix_show_exit_popup' ) ) {
	function pix_show_exit_popup() {
		$exit_id = 'exit-popup-1';
		if(pix_get_option('pix-exit-popup-id')){
			$exit_id = pix_get_option('pix-exit-popup-id');
		}
		if(isset($_COOKIE['pix_exit_popup'])) {
			if($_COOKIE['pix_exit_popup']==$exit_id){
				return false;
			}
		}
		return true;
	}
}

if ( !function_exists( 'pix_show_automatic_popup' ) ) {
	function pix_show_automatic_popup() {
		$exit_id = 'automatic-popup-1';
		if(pix_get_option('pix-automatic-popup-id')){
			$exit_id = pix_get_option('pix-automatic-popup-id');
		}
		if(isset($_COOKIE['pix_automatic_popup'])) {
			if($_COOKIE['pix_automatic_popup']==$exit_id){
				return false;
			}
		}
		return true;
	}
}

add_action('wp_ajax_pix_check_popup_status', 'pix_check_popup_status');
add_action('wp_ajax_nopriv_pix_check_popup_status', 'pix_check_popup_status');

if ( !function_exists( 'pix_check_popup_status' ) ) {
	function pix_check_popup_status() {
		// if ( !wp_verify_nonce( $_REQUEST['nonce'], "popup_nonce")) {
		// 	exit("Verification error, please try again!");
		// 	$data = array(
		// 		'result' => false,
		// 		'message'	=> 'Nonce error'
		// 	);
		// 	echo json_encode($data);
		// 	wp_die();
		// }
		if(!empty($_REQUEST['exitpopup'])){
			$exit_id = 'exit-popup-1';
			if(pix_get_option('pix-exit-popup-id')){
				$exit_id = pix_get_option('pix-exit-popup-id');
			}
			if(isset($_COOKIE['pix_exit_popup'])) {
				if($_COOKIE['pix_exit_popup']==$exit_id){
					$data = array(
						'result' => false
					);
					echo json_encode($data);
					wp_die();
				}
				$data = array(
					'result' => true
				);
				echo json_encode($data);
				wp_die();
			}
		}
		if(!empty($_REQUEST['autopopup'])){
			$auto_id = 'automatic-popup-1';
			if(pix_get_option('pix-automatic-popup-id')){
				$auto_id = pix_get_option('pix-automatic-popup-id');
			}
			if(isset($_COOKIE['pix_automatic_popup'])) {
				if($_COOKIE['pix_automatic_popup']==$auto_id){
					$data = array(
						'result' => false
					);
					echo json_encode($data);
					wp_die();
				}
				$data = array(
					'result' => true
				);
				echo json_encode($data);
				wp_die();
			}
		}
		if( !empty($_REQUEST['cookiesbanner']) ){
			$data = array(
				'result' => false
			);
			if(pix_show_cookies()){
				$data = array(
					'result' => true
				);

			}
			echo json_encode($data);
			wp_die();
		}
		$data = array(
			'result' => true
		);
		echo json_encode($data);
		wp_die();
	}
}


add_action('wp_ajax_pix_popup_content', 'pix_popup_content');
add_action('wp_ajax_nopriv_pix_popup_content', 'pix_popup_content');

/**
* AJAX function for popups.
*/
if ( !function_exists( 'pix_popup_content' ) ) {
	function pix_popup_content() {
		// if ( !empty($_REQUEST['nonce']) && !wp_verify_nonce( $_REQUEST['nonce'], "popup_nonce")) {
		// 	exit("Verification error, please try again!");
		// }
		if(empty($_REQUEST['id'])){
			exit("Error: Popup ID is missing!");
		}
		if(!empty($_REQUEST['exitpopup'])){
			$exit_id = 'exit-popup-1';
			if(pix_get_option('pix-exit-popup-id')){
				$exit_id = pix_get_option('pix-exit-popup-id');
			}
			setcookie('pix_exit_popup', $exit_id, time()*40, '/');
		}
		if(!empty($_REQUEST['autopopup'])){
			$auto_id = 'automatic-popup-1';
			if(pix_get_option('pix-automatic-popup-id')){
				$auto_id = pix_get_option('pix-automatic-popup-id');
			}
			setcookie('pix_automatic_popup', $auto_id, time()*40, '/');
		}
		$dynamicImport = false;
		if(pix_get_option('pix-enable-popup-enqueue')){
			$dynamicImport = true;
			global $wp_scripts;
			global $wp_styles;
			unset( $wp_scripts->registered );
			unset( $wp_styles->registered );
			ob_start();
			wp_head();
			ob_get_clean();
		}



		$id = (int)$_REQUEST['id'];
		$html="";
		if(class_exists('WPBMap')){
			WPBMap::addAllMappedShortcodes();
		}
		if(function_exists('icl_get_languages')) {
			$id = apply_filters( 'wpml_object_id', $id, 'pixpopup', true );
		}
		$content = get_post_field('post_content', $id);
		$size = get_post_field('pix-popup-size', $id);


		if( class_exists( '\Elementor\Plugin' ) ) {
			if ( Elementor\Plugin::instance()->db->is_built_with_elementor( $id ) ) {
				$html =  \Elementor\plugin::instance()->frontend->get_builder_content( $id, true );
				// $data = array(
				// 	'html' => $html,
				// 	'size'	=> $size,
				// 	'result'	=> $result,
				// 	'footer_content' => $footer_content
				// );
				// echo json_encode($data);
				//
				// wp_die();
			}else{
				if(function_exists('vc_iconpicker_base_register_css')){
					vc_iconpicker_base_register_css();
				}
				$html .= '<style type="text/css" data-type="vc_shortcodes-custom-css">'. get_post_meta( $id, '_wpb_shortcodes_custom_css', true ).'</style>';
				$html .= do_shortcode(apply_filters( 'the_content', $content ));
			}
		}else{
			if(function_exists('vc_iconpicker_base_register_css')){
				vc_iconpicker_base_register_css();
			}
			$html .= '<style type="text/css" data-type="vc_shortcodes-custom-css">'. get_post_meta( $id, '_wpb_shortcodes_custom_css', true ).'</style>';
			$html .= do_shortcode(apply_filters( 'the_content', $content ));
		}

		$result = [];
		$result['scripts'] = [];
		$result['styles'] = [];
		if($dynamicImport){
			unset( $wp_scripts->registered['pix-flickity-js'] );
			ob_start();
			wp_footer();
			$footer_content = ob_get_contents();
			ob_get_clean();
			unset( $wp_styles->registered['essentials-bootstrap'] );

			// Get all loaded Scripts
			foreach( $wp_scripts->queue as $script ) :
			if(!empty($wp_scripts->registered[$script]->src)&&$wp_scripts->registered[$script]->src){
				$result['scripts'][$wp_scripts->registered[$script]->handle] =  $wp_scripts->registered[$script];
			}
			endforeach;

			// Get all loaded Styles (CSS)
			foreach( $wp_styles->queue as $style ) :
				if(!empty($wp_styles->registered[$style]->src)&&$wp_styles->registered[$style]->src){
					$result['styles'][$wp_styles->registered[$style]->handle] =  $wp_styles->registered[$style];
				}
			endforeach;
		}

		$data = array(
			'html' => $html,
			'size'	=> $size,
			'result'	=> $result,
			'footer_content' => $footer_content
		);
		echo json_encode($data);

		wp_die();

	}
}





add_action('wp_ajax_pix_product_preview', 'pix_product_preview');
add_action('wp_ajax_nopriv_pix_product_preview', 'pix_product_preview');

/**
* AJAX function for products.
*/
if (!function_exists('pix_product_preview')) {
	function pix_product_preview() {

		// if ( !wp_verify_nonce( $_REQUEST['nonce'], "product_nonce")) {
		// 	exit("Verification error, please try again!");
		// }
		if(empty($_REQUEST['id'])){
			exit("Error: Product ID is missing!");
		}

		$id = (int)$_REQUEST['id'];
		$html="";
		if ( class_exists( 'WooCommerce' ) ) {

			$product = wc_get_product( $id );

			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full' );


			?>
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-6 pix-popup-img pr-0">
						<img src="<?php echo esc_url( $image[0] ); ?>">
					</div>
					<div class="col-12 col-sm-6 pix-py-20">
						<?php
							setup_postdata( $id );
							echo wc_get_template_html( 'single-product/rating.php' );

						?>
						<a href="<?php echo get_permalink($id); ?>"><h4 class="text-heading-default font-weight-bold pix-mb-5"><?php echo esc_attr( $product->get_name() ); ?></h4></a>
						<?php
							$term_list = wp_get_post_terms($id,'product_cat');
							if(count($term_list)>0){
								?>
								<div class="pix-mb-20">
									<?php
									foreach ($term_list as $key => $value) {
										$cat_id = (int)$value->term_id;
										$cat_link = get_term_link ($cat_id, 'product_cat');
										?>
										<a href="<?php echo esc_url( $cat_link ); ?>" rel="tag" class="badge bg-gray-1 text-body-default pix-mr-5 pix-p-5"><?php echo esc_attr( $value->name ); ?></a>
										<?php
									}
									?>
								</div>
								<?php
							}
						?>
						<p class="text-body-default pix-popup-product-desc"><?php echo  do_shortcode( $product->get_short_description() ); ?></p>
					 	<?php
							woocommerce_template_single_add_to_cart();
							// echo wc_get_template_html( 'single-product/add-to-cart/simple.php' );
						?>
					</div>
				</div>
			</div>
			<?php
		}
		wp_die();
	}
}


add_action('wp_ajax_pix_product_add', 'pix_product_add');
add_action('wp_ajax_nopriv_pix_product_add', 'pix_product_add');
function pix_product_add() {
	// if ( !wp_verify_nonce( $_REQUEST['nonce'], "product_nonce")) {
	// 	exit("Verification error, please try again!");
	// }
	if(empty($_REQUEST['id'])){
		exit("Error: Product ID is missing!");
	}
	if ( class_exists( 'WooCommerce' ) ) {
		echo WC()->cart->add_to_cart( $_REQUEST['id'] );
	}
	echo "OK";
	wp_die();
}

add_action('wp_ajax_pix_close_banner', 'pix_close_banner');
add_action('wp_ajax_nopriv_pix_close_banner', 'pix_close_banner');
function pix_close_banner() {
	// if ( !wp_verify_nonce( $_REQUEST['nonce'], "close_banner")) {
	// 	exit("Verification error, please try again!");
	// }
	setcookie('pix_close_banner', pix_get_option('banner-id'), time()*40, '/');
	wp_die();
}
function pix_show_banner() {
	$id = pix_get_option('banner-id');
	if(isset($_COOKIE['pix_close_banner'])) {
		if($_COOKIE['pix_close_banner']==$id){
			return false;
		}
	}
	return true;
}




add_action('wp_ajax_pix_close_cookies', 'pix_close_cookies');
add_action('wp_ajax_nopriv_pix_close_cookies', 'pix_close_cookies');
function pix_close_cookies() {
	// if ( !wp_verify_nonce( $_REQUEST['nonce'], "close_cookies")) {
	// 	exit("Verification error, please try again!");
	// }
	setcookie('pix_close_cookies', pix_get_option('pix-cookies-id'), time()*40, '/');
	wp_die();
}
function pix_show_cookies() {
	if(!pix_get_option('pix-cookies-id')) return false;
	$id = pix_get_option('pix-cookies-id');
	if(isset($_COOKIE['pix_close_cookies'])) {
		if($_COOKIE['pix_close_cookies']==$id){
			return false;
		}
	}
	return true;
}







add_action( 'show_user_profile', 'pix_extra_user_profile_fields' );
add_action( 'edit_user_profile', 'pix_extra_user_profile_fields' );
function pix_extra_user_profile_fields( $user ) {
	?>
	    <h3><?php echo esc_attr__("Extra profile information", "essentials"); ?></h3>
	    <table class="form-table">
	    <tr>
	        <th><label for="job"><?php echo esc_attr__("Job title", 'essentials'); ?></label></th>
	        <td>
	            <input type="text" name="job" id="job" value="<?php echo esc_attr( get_the_author_meta( 'job', $user->ID ) ); ?>" class="regular-text" /><br />
	            <span class="description"><?php echo esc_attr__("Please enter your job title.", 'essentials'); ?></span>
	        </td>
	    </tr>
	    </table>
	<?php
}

add_action( 'personal_options_update', 'pix_save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'pix_save_extra_user_profile_fields' );
function pix_save_extra_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }
    update_user_meta( $user_id, 'job', $_POST['job'] );
}


add_action('wp_ajax_pix_ajax_searcht', 'pix_ajax_searcht');
add_action('wp_ajax_nopriv_pix_ajax_searcht', 'pix_ajax_searcht');
function pix_ajax_searcht() {
	// if ( !empty($_REQUEST['nonce']) && !wp_verify_nonce( $_REQUEST['nonce'], "search_nonce")) {
	// 	exit("Verification error, please try again!");
	// }
	if(empty($_REQUEST['term'])){
		echo json_encode(array(
			'error' => "Error: Search term is missing!"
		));
		wp_die();
	}
	$search_post_type = array('post', 'page', 'product', 'portfolio');
	$search_post_type = apply_filters( 'pixfort_search_post_type', $search_post_type );
	$posts = get_posts( array(
            's' => esc_attr( strip_tags( $_REQUEST['term'] ) ) ,
			'numberposts'	=> 5,
			// 'order' => 'ASC',
			// 'orderby' => 'title',
			'post_type'	=> $search_post_type
        ) );
    $suggestions = array();
	$i = 1;
	foreach ($posts as $post):

            $suggestion = array();
            // $suggestion['id'] = $i;
            // $suggestion['name'] = esc_attr($post->post_title);
			$suggestion['value'] = get_permalink($post);
            $suggestion['text'] = esc_attr($post->post_title);
			$thumb = get_the_post_thumbnail_url($post, 'thumbnail');
			if(!empty($thumb)){
				$suggestion['icon'] = $thumb;
			}
			$i++;
            $suggestions[]= $suggestion;
    endforeach;
	echo json_encode($suggestions);
	wp_die();


}

function pix_align_to_flex($align){
    switch ($align) {
        case 'text-left':
            $align .= ' justify-content-start';
            break;
        case 'text-right':
            $align .= ' justify-content-end';
            break;
        case 'text-center':
            $align .= ' justify-content-center';
            break;
        case 'd-flex':
            $align .= ' justify-content-between';
            break;
    }
    return $align;
}
