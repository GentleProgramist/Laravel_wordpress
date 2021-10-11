<?php

/* ---------------------------------------------------------------------------
* badge [pix_badge] [/pix_badge]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_badge' ) ){

	function sc_pix_badge( $attr, $content = null ){

		extract(shortcode_atts(array(
			'text'		=> '',
			'text_color'		=> 'primary',
			'text_custom_color'		=> '',
			'text_size'		=> 'h6',
			'text_custom_size'		=> '',
			'bold'  => '',
			'italic'  => '',
			'secondary_font'  => '',
			'rounded'  => '',
			'bg_color'		=> 'primary-light',
			'custom_bg_color'		=> '',
			'style' 		=> '',
			'hover_effect' 		=> '',
			'add_hover_effect' 		=> '',
			'animation' 	=> '',
			'delay' 	=> '0',
			'link' 	=> '',
			'target' 	=> '',
			'element_div' 		=> '',
			'css' 		=> '',
			'extra_classes' 		=> '',
			'custom_css' 		=> '',
		), $attr));


		$css_class = '';
		if(function_exists('vc_shortcode_custom_css_class')){
		    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
		    $css_class .= ' '.apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $custom_css, ' ' ) );
		}
		$css_class .= ' '. $extra_classes;

		$style_arr = array(
		   "" => "",
		   "1"       => "shadow-sm",
		   "2"       => "shadow",
		   "3"       => "shadow-lg",
		   "4"       => "shadow-inverse-sm",
		   "5"       => "shadow-inverse",
		   "6"       => "shadow-inverse-lg",
		 );

		 $hover_effect_arr = array(
			""       => "",
			"1"       => "shadow-hover-sm",
			"2"       => "shadow-hover",
			"3"       => "shadow-hover-lg",
			"4"       => "shadow-inverse-hover-sm",
			"5"       => "shadow-inverse-hover",
			"6"       => "shadow-inverse-hover-lg",
		 );

		 $add_hover_effect_arr = array(
			""       => "",
			"1"       => "fly-sm",
			"2"       => "fly",
			"3"       => "fly-lg",
			"4"       => "scale-sm",
			"5"       => "scale",
			"6"       => "scale-lg",
			"7"       => "scale-inverse-sm",
			"8"       => "scale-inverse",
			"9"       => "scale-inverse-lg",
		 );


		$classes = array();
		$span_classes = array();
		if($bold!='font-weight-bold') $bold = 'font-weight-normal';
		if(!empty($bold)) array_push($classes, $bold );
		if(!empty($italic)) array_push($classes, $italic );
		if(!empty($secondary_font)) array_push($classes, $secondary_font );
		if(!empty($rounded)) array_push($classes, $rounded );

		if($style){ array_push($classes, $style_arr[$style] ); }
		if($hover_effect){ array_push($classes, $hover_effect_arr[$hover_effect] ); }
		if($add_hover_effect){ array_push($classes, $add_hover_effect_arr[$add_hover_effect] ); }

		$span_custom_style = '';

		if(!empty($text_color)){
			if($text_color!='custom'){
				array_push($span_classes, 'text-'.$text_color );
			}else{
				$span_custom_style = 'color:'.$text_custom_color.';';
			}
		}


		$t_custom_style = '';
		$text_tag = $text_size;
		if($text_size == 'custom'){
			$text_tag = "span";
			$t_custom_style = "font-size:". $text_custom_size .';';
		}

		if(!empty($bg_color)){
			if($bg_color!='custom'){
				array_push($classes, 'bg-'.$bg_color );
			}else{
				$t_custom_style .= 'background:'.$custom_bg_color.';';
			}
		}

		$anim_type = '';
		$anim_delay = '';
		$anim = '';
		if(!empty($animation)){
			$anim = 'animate-in';
			$anim_type = 'data-anim-type="'.$animation.'"';
			$anim_delay = 'data-anim-delay="'.$delay.'"';
		}

		$class_names = join( ' ', $classes );
		$span_class_names = join( ' ', $span_classes );

		$output = '';

		if(!empty($element_div)){
			$output .= '<div class="pix-element-div w-100 '.$element_div.'">';
		}
		if(empty($target)) $target = '_self';
		if(!empty($link)){ $output .= '<a href="'.$link.'" target="'.$target.'">'; }
		$output .= '<'.$text_tag.' class="d-inline-block mr-1 '.$anim.'" '.$anim_type.' '.$anim_delay.'>';
			$output .= '<span class="badge '.$class_names.' '.$css_class.'" style="'.$t_custom_style.' '.$custom_css.'">';
				$output .= '<span class="'.$span_class_names.'" style="'.$span_custom_style.'">';
					$output .= do_shortcode($text);
				$output .= '</span>';
			$output .= '</span>';
		$output .= '</'.$text_tag.'>';
		if(!empty($link)){ $output .= '</a>'; }
		if(!empty($element_div)){
			$output .= '</div>';
		}


		return $output;
	}
}


add_shortcode( 'pix_badge', 'sc_pix_badge' );

?>
