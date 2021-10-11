<?php

// function pix_endsWith($haystack, $needle){
//     $length = strlen($needle);
//     if ($length == 0) {
//         return true;
//     }
//
//     return (substr($haystack, -$length) === $needle);
// }
/* ---------------------------------------------------------------------------
 * Image [pix_img] [/pix_img]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_img' ) ){

	function sc_pix_img( $attr, $content = null ){
		extract(shortcode_atts(array(
			'image'  => '',
			'rounded_img'  => 'rounded-0',
			'alt'  => '',
			'align'  => 'text-left',
			'width' 	=> '',
			'height' 	=> '',
			'pix_scroll_parallax' 	=> '',
			'pix_tilt' 	=> false,
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
            'img_div' 		=> '',
            'pix_scale_in' 		=> '',
			'el_class' 		=> '',
			'css' 		=> '',
			'responsive_css' 		=> '',
		), $attr));

		$css_class = '';
		if(function_exists('vc_shortcode_custom_css_class')){
		    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
		}

		$css_class .= ' '. pix_responsive_css_class($responsive_css) .' ';

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
            // $img = wp_get_attachment_image_src($image, "full");
            // $imgSrcset = wp_get_attachment_image_srcset($image);
			$imgSrcset = '';
			$imgSizes = '';
            $imgWidth = '';
            $imgHeight = '';
			if(is_string($image)&&substr( $image, 0, 4 ) === "http"){
				$img = $image;
				$imgSrc = $img;
			}else{
				if(!empty($image['id'])){
				  $img = wp_get_attachment_image_src($image['id'], "full");
				  $imgSrcset = wp_get_attachment_image_srcset($image['id'], "full");
				  $imgSizes = wp_get_attachment_image_sizes($image['id'], "full");
                  if(!empty($img[0])){
                      if(!empty($img[1]) && !empty($img[2])){
                          $imgWidth = 'width="'.$img[1].'"';
                          $imgHeight = 'height="'.$img[2].'"';
                      }
                      $imgSrc = $img[0];
                  }
                  if(!$img&&$image['url']){
                      $imgSrc = $image['url'];
                  }
				}else{
				  $img = wp_get_attachment_image_src($image, "full");
				  $imgSrcset = wp_get_attachment_image_srcset($image, "full");
                  $imgSizes = wp_get_attachment_image_sizes($image, "full");
                  if(!empty($img[1]) && !empty($img[2])){
                      $imgWidth = 'width="'.$img[1].'"';
                      $imgHeight = 'height="'.$img[2].'"';
                  }
                  if(!empty($img[0])){
                    $imgSrc = $img[0];
                  }
				}

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
				// array_push($classes, "w-100");
            }
            $inline_style = '';
			$div_inline_style = '';
			$div_size_class = '';
			$main_width = 'w-100';
            if(!empty($width)){
                // $inline_style .= 'max-width:100%;width:'.$width.';';
				if( pix_endsWith($width, '%') ){
					// $inline_style .= '';
					$div_inline_style = 'style="width:'.$width.';"';
                    // $inline_style .= 'max-width:'.$width.';';
                    $inline_style .= 'width:'.$width.';';
					$div_size_class = 'w-100';
					// array_push($classes, 'w-100');
				}else{
					// $inline_style .= 'max-width:'.$width.';';
					$inline_style .= 'width:'.$width.';';
                    $main_width = '';
				}
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
            array_push($classes, $el_class);


            $inline_style = 'style="'.$inline_style.'"';
            $class_names = join( ' ', $classes );

            $jarallax = '';
            if($pix_scroll_parallax){
                if(!empty($xaxis) || !empty($yaxis)){
                    $jarallax = 'data-jarallax-element="'. $xaxis .' '. $yaxis .'"';
                }   
            }

			if(!empty($img_div)){
				$output .= '<div class="pix-img-div '.$pix_scale_in.' '.$img_div.'">';
			}else{
				$output .= '<div class="d-inline-block '.$pix_scale_in.'" '.$div_inline_style.'>';
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
				if(!empty($pix_tilt) && $pix_tilt){
					$output .= '<div class="'.$pix_tilt_size.'">';
				}
                $output .= '<a href="'.$link.'" '.$ntab.' class="pix-img-el '.$class_names.' '.$rounded_img.'" '.$anim_type.' '.$anim_delay.' '.$jarallax.'>';
                // $output .= '<img class="pix-lazy card-img '.$rounded_img.' h-100"  src="'.PIX_IMG_PLACEHOLDER .'" data-src="'.$imgSrc.'" data-srcset="'.$imgSrcset.'" alt="'. $alt .'" '.$inline_style.'/>';
				if(!empty($imgSrcset)){
					$output .= '<img class="pix-lazy2 card-img2 '.$rounded_img.' h-1002" src="'.$imgSrc.'" srcset="'.$imgSrcset.'" alt="'. $alt .'" '.$inline_style.'/>';
				}else{
					$output .= '<img class="pix-lazy2 card-img2 '.$rounded_img.' h-1002" src="'.$imgSrc.'" alt="'. $alt .'" '.$inline_style.'/>';
				}

                $output .= '</a>';
				if(!empty($pix_tilt) && $pix_tilt){
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
					$output .= '<div class="animate-in '.$div_size_class.' d-inline-block" '.$anim_type.' '.$anim_delay.'>';
	            }
				if(!empty($pix_tilt) && $pix_tilt){
					$output .= '<div class="'.$pix_tilt_size.'">';
				}

                $output .= '<div class="pix-img-el '.$class_names.' '.$main_width.' '.$rounded_img.'"  '.$jarallax.'>';
                	// $output .= '<img class="pix-lazy card-img2 '.$rounded_img.' h-1002" loading="lazy" src="'.PIX_IMG_PLACEHOLDER .'" data-srcset="'.$imgSrcset.'" data-src="'.$imgSrc.'" alt="'. $alt .'" '.$inline_style.'/>';
                    if(!empty($imgSrc)){
                        if(empty($imgSrcset)){
                            $output .= '<img class="card-img2 pix-img-elem '.$rounded_img.'  h-1002" '.$inline_style.' '.$imgWidth.' '.$imgHeight.' src="'.$imgSrc.'" alt="'. $alt .'" />';
                        }else{
                            $output .= '<img class="card-img2 pix-img-elem '.$rounded_img.'  h-1002" '.$inline_style.' '.$imgWidth.' '.$imgHeight.' srcset="'.$imgSrcset.'" sizes="'.$imgSizes.'" src="'.$imgSrc.'" alt="'. $alt .'" />';
                        }
                    }

                	// $output .= '<img class="card-img2 '.$rounded_img.' h-1002" src="'.$imgSrc.'" alt="'. $alt .'" '.$inline_style.'/>';
                $output .= '</div>';



				if(!empty($pix_tilt) && $pix_tilt){
					$output .= '</div>';
				}
				if(!empty($animation)){
					$output .= '</div>';
				}
				if(!empty($pix_infinite_animation)){
                	$output .= '</div>';
				}

            }
			// if(!empty($img_div)){
				$output .= '</div>';
			// }


        }

		return $output;
	}
}


add_shortcode( 'pix_img', 'sc_pix_img' );

 ?>
