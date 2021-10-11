<?php


/* ---------------------------------------------------------------------------
 * Video [pix_video] [/pix_video]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_video' ) ){

	function sc_pix_video( $attr, $content = null ){
		extract(shortcode_atts(array(
			'embed_code'  => '',
			'is_elementor'  => false,
			'decode'  => '1',
			'image'  => '',
			'rounded_img'  => 'rounded-0',
			'aspect' 	=> 'embed-responsive-21by9',
			'pix_scroll_parallax' 	=> '',
			'pix_tilt' 	=> '',
			'pix_tilt_size' 	=> 'tilt',
			'xaxis' 	=> '',
			'yaxis' 	=> '',
			'animation' 	=> '',
			'delay' 	=> '0',
            'style' 		=> '',
            'hover_effect' 		=> '',
            'add_hover_effect' 		=> '',
            'pix_infinite_animation' 		=> '',
            'pix_infinite_speed' 		=> '',
			'text_color' 	=> 'primary',
			'custom_bg_color'		=> '',
			'bg_color'		=> 'white',
			'custom_bg_color'		=> '',
			'size'		=> '100',
			'icon_style'		=> 'due',
			'overlay_color'		=> 'black',
			'overlay_custom_color'		=> '',
			'overlay_opacity'		=> 'pix-opacity-8',
			'in_popup'		=> false,
			'extra_classes' 		=> '',
			'css' 		=> '',
		), $attr));

		$css_class = '';
		if(function_exists('vc_shortcode_custom_css_class')){
		    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
		}
		$css_class .= ' '.$extra_classes;
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

        $output = '';
		$imgSrc = '';
        if(!empty($image)){
			$imgSrcset = '';
			if(is_string($image)&&substr( $image, 0, 4 ) === "http"){
				$imgSrc = $image;
			}else{
				if(is_array($image)&&!empty($image['id'])){
					$img = wp_get_attachment_image_src($image['id'], "full");
					$imgSrcset = wp_get_attachment_image_srcset($image['id']);
				}else{
					$img = wp_get_attachment_image_src($image, "full");
					$imgSrcset = wp_get_attachment_image_srcset($image);
				}
				 $imgSrc = $img[0];
			}
		}
        $classes = array();
        $anim_type = '';
        $anim_delay = '';
        array_push($classes, esc_attr( $css_class ));

        if($style&&array_key_exists($style, $style_arr)){
            array_push($classes, $style_arr[$style]);
        }
        if($hover_effect&&array_key_exists($hover_effect, $hover_effect_arr)){
            array_push($classes, $hover_effect_arr[$hover_effect]);
        }
        if($add_hover_effect&&array_key_exists($add_hover_effect, $add_hover_effect_arr)){
            array_push($classes, $add_hover_effect_arr[$add_hover_effect]);
        }


		$span_classes = array();
		$icon_classes = array();
		$span_custom_style = '';
		$icon_custom_style = '';
		if(!empty($text_color)){
			if($text_color!='custom'){
				array_push($icon_classes, 'text-'.$text_color );
			}else{
				$icon_custom_style = 'color:'.$text_custom_color.';';
			}
		}
		$span_custom_style .= 'width:'.$size.'px;';
		$span_custom_style .= 'height:'.$size.'px;';
		if((int)$size){
			$fize = (int)$size/2;
			$icon_custom_style .= 'height:'.$fize.'px;';
			$icon_custom_style .= 'width:'.$fize.'px;';
		}
		if(!empty($bg_color)){
			if($text_color!='custom'){
				array_push($span_classes, 'bg-'.$bg_color );
			}else{
				$span_custom_style = 'color:'.$custom_bg_color.';';
			}
		}

		$span_custom_style = 'style="'.$span_custom_style.'"';
		$icon_custom_style = 'style="'.$icon_custom_style.'"';
		$span_classes_names = join( ' ', $span_classes );
		$icon_classes_names = join( ' ', $icon_classes );


        $class_names = join( ' ', $classes );

        $jarallax = '';
        if($pix_scroll_parallax){
			if(!empty($xaxis) || !empty($yaxis)){
				$jarallax = 'data-jarallax-element="'. $xaxis .' '. $yaxis .'"';
			}
        }

		if(!empty($pix_infinite_animation)){
			$output .= '<div class="'.$pix_infinite_animation.' '.$pix_infinite_speed.'">';
		}
		if(!empty($animation)){
            $anim_type = 'data-anim-type="'.$animation.'"';
            $anim_delay = 'data-anim-delay="'.$delay.'"';
			$output .= '<div class="animate-in d-inline-block2" '.$anim_type.' '.$anim_delay.'>';
        }
		if(!empty($pix_tilt)){
			$output .= '<div class="'.$pix_tilt_size.'">';
		}
		if($decode&&$decode=='1'){
			if(!$is_elementor) $embed_code = rawurldecode( base64_decode( $embed_code ));
		}
		$res = preg_replace("/[\`]/", "", html_entity_decode($embed_code));
		$custom_style = '';
		if($overlay_color=='custom'){
			$custom_style .= 'style="background:'.$overlay_custom_color.';"';
		}

		if(!empty($image)){

			$output .= '<div class="pix-video bg-'.$overlay_color.' '.$rounded_img.' '.$class_names.'" '.$jarallax.' '.$custom_style.'>';
	            $output .= '<img alt="Image" src="'.$imgSrc.'" class="video-bg '.$overlay_opacity.'" />';
				if($in_popup){
						$output .= '<div class="pix-video-popup video-play-btn d-flex align-items-center justify-content-center scale shadow-lg '.$span_classes_names.'" '.$span_custom_style.' data-aspect="'.$aspect.'" data-content="'.esc_attr( $res ).'" >';
							if($icon_style=='due'){
								$output .= '<span class="'.$icon_classes_names.'" '.$icon_custom_style.'>';
									$output .= pix_load_inline_svg(PIX_CORE_PLUGIN_DIR.'/functions/images/play_arrow.svg');
								$output .= '</span>';
							}else{
								$output .= '<span class="'.$icon_classes_names.'" '.$icon_custom_style.'>';
									$output .= pix_load_inline_svg(PIX_CORE_PLUGIN_DIR.'/functions/images/play_arrow_outline.svg');
								$output .= '</span>';
							}
						$output .= '</div>';
				}else{
					$output .= '<div class="video-play-btn video-play-btn-inline d-flex align-items-center justify-content-center scale shadow-lg '.$span_classes_names.'" '.$span_custom_style.'>';
						if($icon_style=='due'){
							$output .= '<span class="'.$icon_classes_names.'" '.$icon_custom_style.'>';
								$output .= pix_load_inline_svg(PIX_CORE_PLUGIN_DIR.'/functions/images/play_arrow.svg');
							$output .= '</span>';
						}else{
							$output .= '<span class="'.$icon_classes_names.'" '.$icon_custom_style.'>';
								$output .= pix_load_inline_svg(PIX_CORE_PLUGIN_DIR.'/functions/images/play_arrow_outline.svg');
							$output .= '</span>';
						}
					$output .= '</div>';
				}
	                $output .= '<div class="embed-responsive '.$aspect.'">';
						if(!$in_popup){
							$output .= $res;
						}

	            $output .= '</div>';
	        $output .= '</div>';
		}else{
			$res = preg_replace("/\ssrc=/", " data-src=", $res);
			$output .= '<div class="pix-video video-active '.$rounded_img.' '.$class_names.'" '.$jarallax.'>';
	            $output .= '<div class="embed-responsive '.$aspect.'">';
	                $output .= $res;
	            $output .= '</div>';
	        $output .= '</div>';
		}
		if(!empty($pix_tilt)){
			$output .= '</div>';
		}
		if(!empty($animation)){
			$output .= '</div>';
		}
		if(!empty($pix_infinite_animation)){
        	$output .= '</div>';
		}
		return $output;
	}
}


add_shortcode( 'pix_video', 'sc_pix_video' );

 ?>
