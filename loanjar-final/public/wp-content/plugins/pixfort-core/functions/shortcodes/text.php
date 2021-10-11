<?php


/* ---------------------------------------------------------------------------
 * Text [pix_text] [/pix_text]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_text' ) ){
	function sc_pix_text( $attr, $content = null ){
		extract(shortcode_atts(array(
			'size'  => '',
			'bold'		=> '',
			'italic'		=> '',
			'secondary_font'		=> '',
			'content_color'		=> '',
			'content_custom_color'		=> '',
			'position'  => '',
			'max_width'  => '',
			'animation' 	=> '',
			'delay' 	=> '0',
			'remove_pb_padding' 	=> '',
			'css' 		=> '',
		), $attr));

		$css_class = '';
		if(function_exists('vc_shortcode_custom_css_class')){
		    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
		}

		$text_classes = pix_get_text_format_classes($bold, $italic, $secondary_font);

		$c_color = '';
		$c_custom_color = '';
		if(!empty($content_color)){
			if($content_color!='custom'){
				$c_color = 'text-'.$content_color;
			}else{
				$c_color = 'el-content_custom_color';
				$c_custom_color = 'style="color:'.$content_custom_color.';"';
			}
		}

        $output = '<div class="pix-el-text slide-in-container w-100 '.$position.' '. esc_attr( $css_class ) .'" >';
		if(!empty($max_width)){
			if(is_numeric($max_width)) $max_width = $max_width.'px';
			$output .= '<div class="d-inline-block" style="max-width:'.$max_width.';">';
		}
		if(empty($animation)){
			$output .= '<p class="'. $size .' '.$remove_pb_padding.' '.$c_color.' '.$position.' '.$text_classes.'" '.$c_custom_color.'>'.  do_shortcode( $content )  .'</p>';
		}else{
			$output .= '<p class="'. $size .' '.$remove_pb_padding.' '.$c_color.' '.$position.' '.$text_classes.'" '.$c_custom_color.'><span class="animate-in d-inline-block" data-anim-delay="' . $delay .'" data-anim-type="'. $animation .'">'. do_shortcode( $content ) .'</span></p>';
		}
		if(!empty($max_width)){
			$output .= '</div>';
		}
        $output .= '</div>';


		return $output;
	}
}


add_shortcode( 'pix_text', 'sc_pix_text' );




if( ! function_exists( 'sc_pix_br' ) ){
	function sc_pix_br( $attr, $content = null ){
		return '<br />';
	}
}


add_shortcode( 'pix_br', 'sc_pix_br' );

 ?>
