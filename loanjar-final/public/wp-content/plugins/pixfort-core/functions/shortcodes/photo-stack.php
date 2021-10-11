<?php

/* ---------------------------------------------------------------------------
 * Photo Stack [pix_photo_stack] [/pix_photo_stack]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_photo_stack' ) ){

	function sc_pix_photo_stack( $attr, $content = null ){
		extract(shortcode_atts(array(
			'images'  => '',
			'pix_scroll_parallax' 	=> '',
			'pix_tilt' 	=> '',
			'pix_tilt_size' 	=> 'tilt',
			'xaxis' 	=> '',
			'yaxis' 	=> '',
			'link' 	=> '',
			'target' 	=> '',
			'animation' 	=> '',
			'delay' 	=> '0',
            'style' 		=> '',
            'hover_effect' 		=> '',
            'add_hover_effect' 		=> '',
            'pix_infinite_animation' 		=> '',
            'pix_infinite_speed' 		=> '',
			'css' 		=> '',
		), $attr));

		$css_class = '';
		if(function_exists('vc_shortcode_custom_css_class')){
		    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
		}

		$elementor = false;
		if(is_array($images)){
			$items = $images;
			$elementor = true;
		}else{
			if(function_exists('vc_param_group_parse_atts')){
				$items = vc_param_group_parse_atts( $images );
			}
		}
		// $items = vc_param_group_parse_atts( $images );

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
		$class_names = '';

            $classes = array();
            $anim_type = '';
            $anim_delay = '';

            if($style){
                array_push($classes, $style_arr[$style]);
            }
            if($hover_effect){
                array_push($classes, $hover_effect_arr[$hover_effect]);
            }
            if($add_hover_effect){
                array_push($classes, $add_hover_effect_arr[$add_hover_effect]);
            }

            if(!empty($align)){
                array_push($classes, $align);
				array_push($classes, "w-100");
            }
            $inline_style = '';
            if(!empty($width)){
                $inline_style .= 'max-width:'.$width.';';
            }else{
                if(!empty($height)){
                    $inline_style .= 'width:auto;';
                }
            }
            if(!empty($height)){
                $inline_style .= 'max-height:'.$height.';';
            }else{
                $inline_style .= 'height:auto;';
            }
            array_push($classes, 'd-inline-block');

            $inline_style = 'style="'.$inline_style.'"';
            $class_names = join( ' ', $classes );

            $jarallax = '';
            if($pix_scroll_parallax){
                $jarallax = 'data-jarallax-element="'. $xaxis .' '. $yaxis .'"';
            }
		$output = '';


		if(!empty($items)){
			$stack_class="";
			if(count($items)==2){
				$stack_class="pix-img-2";
			}elseif(count($items)>2) {
				$stack_class="pix-img-n";
			}
			$output .= '<div class="pix-photo-stack '.$stack_class.' '.$css_class.'">';
			foreach ($items as $key => $value) {
				if(!empty($value['image'])){
					$imgSrcset = '';
					$imgWidth = '';
	                $imgHeight = '';
					if(is_string($value['image'])&&substr( $value['image'], 0, 4 ) === "http"){
						$img = $value['image'];
						$imgSrc = $img;
					}else{
						if($elementor){
							$img = wp_get_attachment_image_src($value['image']['id'], "full");
							$imgSrcset = wp_get_attachment_image_srcset($value['image']['id']);
						}else{
							$img = wp_get_attachment_image_src($value['image'], "full");
							$imgSrcset = wp_get_attachment_image_srcset($value['image']);
						}
						if(!empty($img[0])){
							$imgSrc = $img[0];
						}
					}
					if(!empty($img[1]) && !empty($img[2])){
					    $imgWidth = 'width="'.$img[1].'"';
					    $imgHeight = 'height="'.$img[2].'"';
					}

					$alt = '';
					if(!empty($value['alt'])){ $alt = $value['alt']; }
					$output .= '<div class="img-el" >';

							if(!empty($pix_infinite_animation)){
								$output .= '<div class="w-100 '.$pix_infinite_animation.' '.$pix_infinite_speed.'">';
							}
							if(!empty($animation)){
					            $anim_type = 'data-anim-type="'.$animation.'"';
					            $anim_delay = 'data-anim-delay="'.$delay.'"';
								$output .= '<div class="animate-in d-inline-block w-100" '.$anim_type.' '.$anim_delay.'>';
								$delay += 100;
					        }
							if(!empty($pix_tilt)){
								$output .= '<div class="'.$pix_tilt_size.'">';
							}
					if(pix_plugin_get_option('pix-disable-lazy-images', false)){
						$output .= '<img '.$imgWidth.' '.$imgHeight.' class="rounded-lg '.$class_names.'" srcset="'.$imgSrcset.'" src="'.$imgSrc.'" alt="'. $alt .'" />';
					}else{
						$output .= '<img '.$imgWidth.' '.$imgHeight.' class="pix-lazy rounded-lg '.$class_names.'" loading="lazy" data-srcset="'.$imgSrcset.'" src="'.PIX_IMG_PLACEHOLDER .'" data-src="'.$imgSrc.'" alt="'. $alt .'" />';
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
					$output .= '</div>';
				}
			}
			$output .= '</div>';
		}
		return $output;
	}
}

add_shortcode( 'pix_photo_stack', 'sc_pix_photo_stack' );

 ?>
