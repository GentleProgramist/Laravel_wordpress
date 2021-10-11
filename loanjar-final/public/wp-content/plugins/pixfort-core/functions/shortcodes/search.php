<?php


/* ---------------------------------------------------------------------------
 * Alert [pix_search] [/pix_search]
 * --------------------------------------------------------------------------- */

if( ! function_exists( 'sc_pix_search' ) ){
	function sc_pix_search( $attr, $content = null ){
		extract(shortcode_atts(array(
			'animation' 	=> '',
			'delay' 	=> '0',
			'search_div' 	=> '',
			'max_width' 	=> '',
			'css' 	=> '',
		), $attr));

		$classes = array();
		if(function_exists('vc_shortcode_custom_css_class')){
			$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
			array_push($classes, $css_class );
		}


		$c_style= '';
		if(!empty($max_width)){
			$c_style = 'style="max-width:100%;width: '.$max_width.' !important;"';
			array_push($classes, 'd-inline-block' );
		}else{
			array_push($classes, 'pix-search-div' );
		}
		$anim_type = '';
		$anim_delay_icon = '';
		if(!empty($animation)){
			array_push($classes, 'animate-in' );
			$anim_type = 'data-anim-type="'.$animation.'"';
			$anim_delay_icon = 'data-anim-delay="'.$delay.'"';
		}


		$nonce = wp_create_nonce("search_nonce");
        $link = admin_url('admin-ajax.php?action=pix_ajax_searcht&nonce='.$nonce);
        $search_data = 'data-search-link="'.$link.'"';

		$output  = '';
		if(!empty($search_div)){
			$output  .= '<div class="pix-search-div '.$search_div.'">';
		}else{
			array_push($classes, 'w-100' );
		}
		$class_names = join( ' ', $classes );
		$placeholder = esc_attr__('Search for something', 'pixfort-core');
		$output  .= '<form class="pix-small-search pix-ajax-search-container position-relative bg-white shadow-sm rounded-lg pix-small-search '.$class_names.'" '.$c_style.' '.$anim_type.' '.$anim_delay_icon.' method="get" action="'.esc_url( home_url( '/' ) ).'">
                <div class="input-group input-group-lg2 ">
                    <input type="text" class="form-control pix-ajax-search form-control-lg shadow-0 font-weight-bold text-body-default" name="s" autocomplete="off" placeholder="'.$placeholder.'" aria-label="Search" '.$search_data.'>
                    <div class="input-group-append">
                        <button class="btn btn-lg2 btn-white m-0 text-body-default" type="submit">'.pix_load_inline_svg(PIX_CORE_PLUGIN_DIR.'/functions/images/search.svg').'</button>
                    </div>
                </div>
            </form>';
		if(!empty($search_div)){
			$output  .= '</div>';
		}

		return $output;
	}
}

add_shortcode( 'pix_search', 'sc_pix_search' );

 ?>
