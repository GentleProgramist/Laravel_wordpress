<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package essentials
 */

get_header();


$classes = '';
$styles = '';
if(!empty(pix_get_option('pages-bg-color'))){
 	  if(pix_get_option('pages-bg-color')=='custom'){
 		  $styles = 'background:'.pix_get_option('custom-pages-bg-color').';';
 	  }else{
 		  $classes = 'bg-'.pix_get_option('pages-bg-color'). ' ';
 	  }
}

$page = false;
$pageID = false;
if(!empty(pix_get_option('pix-enable-custom-404')) && !empty(pix_get_option('pix-custom-404-page'))){
	$page = pix_get_option('pix-custom-404-page');
	if(function_exists('icl_get_languages')) {
		$correct_id = apply_filters( 'wpml_object_id', $page, 'page', true );
		$post = get_post( $correct_id );
	}else{
		$post = get_post( $page );
	}
    $hide_top_area = false;
    if($post&&!empty($post->ID)){
        $pageID = $post->ID;
        if(get_post_meta( $pageID, 'pix-hide-top-area', true )){
            if(get_post_meta( $pageID, 'pix-hide-top-area', true )==='1'){
                $hide_top_area = true;
            }
        }
        if(!get_post_meta( $pageID, 'pix-hide-top-padding', true )){
            $classes .= 'pt-5';
        }
    }

    if(!$hide_top_area) get_template_part( 'template-parts/intro' );
}else{
	$classes .= ' text-center pix-py-100';
	$hide_top_area = false;
	if(get_post_meta( get_the_ID(), 'pix-hide-top-area', true )){
	    if(get_post_meta( get_the_ID(), 'pix-hide-top-area', true )==='1'){
	        $hide_top_area = true;
	    }
	    if(get_post_type()=='page' ){
	        if(empty(pix_get_option('pages-with-intro'))||!pix_get_option('pages-with-intro')){
	            $hide_top_area = true;
	        }
	    }
	}

	if($hide_top_area){
		?>
		<div class="pix-main-intro-placeholder"></div>
		<?php
	}else{

		if(pix_get_option('pix-header')){
		    $single_header = pix_get_option('pix-header');
			if(!empty($single_header)){
				$post = get_post( $single_header );
				if(!empty(get_post_field('pix-header-style', $post))){
			        $header_style = get_post_field('pix-header-style', $post);
					if(!empty($header_style)){
						if(
							$header_style=='boxed'
							|| $header_style=='boxed-full'
							|| $header_style=='transparent'
							|| $header_style=='transparent-full'
						){
							get_template_part( 'template-parts/intro' );
						}
					}
			    }
			}
		}
	}
}


$containerClass = 'container';
if( class_exists( '\Elementor\Plugin' ) ) {
    if ( Elementor\Plugin::instance()->db->is_built_with_elementor( get_the_ID() ) ) {
        $containerClass = 'container-fluid px-0';
    }
}

?>

<div id="content" class="site-content <?php echo esc_attr( $classes ); ?> error-404 not-found" style="<?php echo esc_attr( $styles ); ?>" >
	<div class="<?php echo esc_attr($containerClass); ?>">
		<div class="row">
			<?php


			if($page){
				?>
				<div class="col-12 my-0 py-0">
				<?php

					$wbp_page_default = true;
					if( class_exists( '\Elementor\Plugin' ) ) {
						if ( Elementor\Plugin::instance()->db->is_built_with_elementor( $page ) ) {
							$wbp_page_default = false;
						}
					}
					if ( defined( 'WPB_VC_VERSION' ) && $wbp_page_default) {
						// WP Bakery
						if(is_user_logged_in()){
							echo do_shortcode(get_post_field('post_content', $post));
						}else{
							echo apply_filters('the_content', do_shortcode(get_post_field('post_content', $post)) );
						}
					}else{
						// Elementor
						if ( get_post_status( $page ) ) {
							setup_postdata($page);
							the_content();
						}
					}

					wp_reset_postdata();


					$custom404Style = '';
			   		if(!function_exists('vc_custom_css')){
			   			function vc_custom_css($id) {
			   		 		$shortcodes_custom_css = get_post_meta( $id, '_wpb_shortcodes_custom_css', true );
			   		 		if ( ! empty( $shortcodes_custom_css ) ) {
			   		 			return esc_attr($shortcodes_custom_css);
			   		 		}
			   		 	}
			   		}

			   	 	if ( defined( 'WPB_VC_VERSION' ) ) {
			   	 		// WP Bakery
			   	 		$custom404Style .= vc_custom_css($pageID);
			   	 	}
					if(!empty($custom404Style)){
						wp_register_style( 'pix-custom-404-handle', false );
					   	wp_enqueue_style( 'pix-custom-404-handle' );
					   	wp_add_inline_style( 'pix-custom-404-handle', $custom404Style );
					}



					// $cpost = the_post();
					?>
				</div>
				<?php



			}else{

			?>
				<header class="page-header w-100">
					<div class="w-100">
					<img src="<?php echo get_template_directory_uri(). '/inc/images/404.svg'; ?>" />
					<h4 class="page-title2 pix-mt-10 pix-sliding-headline font-weight-bold"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'essentials' ); ?></h4>
					</div>
				</header><!-- .page-header -->

				<div class="page-content text-center w-100 pix-pt-20">
					<?php
						if(function_exists('sc_pix_search')){
							?>
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'essentials' ); ?></p>
							<?php
							echo sc_pix_search(array(
								'max_width'		=> '600px'
							));
						}
					?>
				</div>

			<?php } ?>
		</div>
	</div>
</div>
<?php
get_footer();
