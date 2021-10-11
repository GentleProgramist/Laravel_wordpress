<?php


/* ---------------------------------------------------------------------------
 * Image [pix_fancy_mockup] [/pix_fancy_mockup]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_fancy_mockup' ) ){

	function sc_pix_fancy_mockup( $attr, $content = null ){
		extract(shortcode_atts(array(
			'image'  => '',
			'rounded_img'  => 'rounded-0',
			'alt'  => '',
			'align'  => 'text-left',
			'width' 	=> '',
			'height' 	=> '',
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
        if(!empty($image)){
			$imgSrcset = '';
			$imgSizes = '';
			if(is_string($image)&&substr( $image, 0, 4 ) === "http"){
				$img = $image;
				$imgSrc = $img;
			}else{
				if(!empty($image['id'])){
		          $img = wp_get_attachment_image_src($image['id'], "full");
		          $imgSrcset = wp_get_attachment_image_srcset($image['id']);
				  $imgSizes = wp_get_attachment_image_sizes($image['id'], "full");
		        }else{
		          $img = wp_get_attachment_image_src($image, "full");
		          $imgSrcset = wp_get_attachment_image_srcset($image);
				  $imgSizes = wp_get_attachment_image_sizes($image, "full");
		        }
				$imgSrc = $img[0];
			}

            $classes = array();
            $anim_type = '';
            $anim_delay = '';
            array_push($classes, esc_attr( $css_class ));

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
                if(!empty($xaxis) || !empty($yaxis)){
                    $jarallax = 'data-jarallax-element="'. $xaxis .' '. $yaxis .'"';
                }
            }

            if($link){
                $ntab = '';
                if(!empty($target)){
                    $ntab = 'target="_blank"';
                }
				if(!empty($pix_infinite_animation)){
					$output .= '<div class="'.$pix_infinite_animation.' '.$pix_infinite_speed.'">';
				}
				if(!empty($animation)){
	                $anim_type = 'data-anim-type="'.$animation.'"';
	                $anim_delay = 'data-anim-delay="'.$delay.'"';
					$output .= '<div class="animate-in d-inline-block" '.$anim_type.' '.$anim_delay.'>';
	            }
				if(!empty($pix_tilt)){
					$output .= '<div class="'.$pix_tilt_size.'">';
				}
                $output .= '<a href="'.$link.'" '.$ntab.' class="'.$class_names.' '.$rounded_img.'" '.$anim_type.' '.$anim_delay.' '.$jarallax.'>';
                $output .= '<img class="card-img '.$rounded_img.' h-100" src="'.$imgSrc.'" alt="'. $alt .'" '.$inline_style.'/>';
                $output .= '</a>';
				if(!empty($pix_tilt)){
					$output .= '</div>';
				}
				if(!empty($animation)){
					$output .= '</div>';
				}
				if(!empty($pix_infinite_animation)){
                	$output .= '</div>';
				}
            }else{
				if(!empty($pix_infinite_animation)){
					$output .= '<div class="'.$pix_infinite_animation.' '.$pix_infinite_speed.'">';
				}
				if(!empty($animation)){
	                $anim_type = 'data-anim-type="'.$animation.'"';
	                $anim_delay = 'data-anim-delay="'.$delay.'"';
					$output .= '<div class="animate-in d-inline-block" '.$anim_type.' '.$anim_delay.'>';
	            }
				if(!empty($pix_tilt)){
					$output .= '<div class="'.$pix_tilt_size.'">';
				}

                $output .= '<div class="'.$class_names.' '.$rounded_img.'"  '.$jarallax.'>';
                $output .= '<img class="card-img '.$rounded_img.' h-100" src="'.$imgSrc.'" alt="'. $alt .'" '.$inline_style.'/>';
                $output .= '</div>';



				if(!empty($pix_tilt)){
					$output .= '</div>';
				}
				if(!empty($animation)){
					$output .= '</div>';
				}
				if(!empty($pix_infinite_animation)){
                	$output .= '</div>';
				}

            }
            $output = '';
            if(!empty($link)){
                if(!empty($target)){
                    $ntab = 'target="_blank"';
                    $output .= '<a href="'.$link.'" '.$ntab.' title="'.$alt.'">';
                }
            }
            $output .= '<div class="pix-fancy-mockup">';
                
            
                $output .= '<div class="pix-fancy-content">';
                    $output .= '<img class="" src="'.$imgSrc.'" alt="'.$alt.'">';
					// if(empty($imgSrcset)){
					// 	$output .= '<img class="" src="'.$imgSrc.'" alt="'.$alt.'">';	
					// }else{
					// 	$output .= '<img class="" src="'.$imgSrc.'" srcset="'.$imgSrcset.'" sizes="'.$imgSizes.'" alt="'.$alt.'">';
					// }

                $output .= '</div>
                    <img class="pix-fancy-device-img" src="'.PIX_CORE_PLUGIN_URI.'functions/images/ipad.png" alt="'.$alt.'">';
                
            $output .= '</div>';
            if(!empty($link)){
                $output .= '</a>';
            }


        }

		return $output;
	}
}


add_shortcode( 'pix_fancy_mockup', 'sc_pix_fancy_mockup' );

 ?>
