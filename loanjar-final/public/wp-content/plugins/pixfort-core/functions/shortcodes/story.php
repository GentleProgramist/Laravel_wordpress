<?php


/* ---------------------------------------------------------------------------
 * Image [pix_story] [/pix_story]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_story' ) ){

	function sc_pix_story( $attr, $content = null ){
		extract(shortcode_atts(array(
			'image'  => '',
			'alt'  => '',
			'align'  => 'text-left',
			'width' 	=> '',

			'title'  => '',
			'text_size'  => '',
			'bold'		=> '',
			'italic'		=> '',
			'secondary_font'		=> '',
			'content_color'		=> '',
			'content_custom_color'		=> '',
			'position'  => 'text-center',

			'color' 	=> "gradient-primary",
			'outer_custom_color' 	=> "",
			'outer_border' 	=> '',
			'inner_border' 	=> '',
			// 'height' 	=> '',
			'pix_scroll_parallax' 	=> '',
			'pix_tilt' 	=> '',
			'pix_tilt_size' 	=> 'tilt',
			'xaxis' 	=> '100',
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
            'stories' 		=> '',
			'css' 		=> '',
		), $attr));

		$css_class = '';
		if(function_exists('vc_shortcode_custom_css_class')){
		    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
		}
		$elementor = false;
		$images = [];
		if(is_array($stories)){
			$images = $stories;
			$elementor = true;
		}else{
			if(function_exists('vc_param_group_parse_atts')){
				$images = vc_param_group_parse_atts( $stories );
			}
		}
		// $images = vc_param_group_parse_atts( $stories );
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

		 $imgs_arr = array();

		 $popup_class = '';
		if(!empty($images)){
			$popup_class = 'pix-story-popup';
			foreach ($images as $key => $value) {
				if(!empty($value['img'])){

					$img = '';
					if(is_string($value['img'])&&substr( $value['img'], 0, 4 ) === "http"){
						$img = $value['img'];
					}else{
						if(is_array($value['img'])&&!empty($value['img']['id'])){
							$img = wp_get_attachment_image_src($value['img']['id'], "full");
							// $imgSrcset = wp_get_attachment_image_srcset($image['id']);
						}else{
							$img = wp_get_attachment_image_src($value['img'], "full");
							// $imgSrcset = wp_get_attachment_image_srcset($image);
						}
						 $img = $img[0];
					}

					// $img = wp_get_attachment_image_src($value['img'], "full");
					// $img = $img[0];
					array_push($imgs_arr, $img);
				}
			}
			$link = '#';

		}
        $output = '';
        if(!empty($image)){

			// $imgSrcset = '';
			// if(is_string($image)&&substr( $image, 0, 4 ) === "http"){
			// 	$imgSrc = $image;
			// }else{
			// 	if(is_array($image)&&!empty($image)){
			// 		$img = wp_get_attachment_image_src($image['id'], "full");
			// 		$imgSrcset = wp_get_attachment_image_srcset($image['id']);
			// 	}else{
			// 		$img = wp_get_attachment_image_src($image, "full");
			// 		$imgSrcset = wp_get_attachment_image_srcset($image);
			// 	}
			// 	 $imgSrc = $img[0];
			// }

            // $img = wp_get_attachment_image_src($image, "full");
            // $imgSrc = $img[0];





            $classes = array();
            $anim_type = '';
            $anim_delay = '';
            // array_push($classes, esc_attr( $css_class ));

            if($style){
                array_push($classes, $style_arr[$style]);
            }
            if($hover_effect){
                array_push($classes, $hover_effect_arr[$hover_effect]);
            }
            if($add_hover_effect){
                array_push($classes, $add_hover_effect_arr[$add_hover_effect]);
            }

			if(empty($outer_border)){
				array_push($classes, 'pix-no-bg');
			}else{
				if($color=='transparent'){
					array_push($classes, 'pix-no-bg');
				}else{
					array_push($classes, 'bg-'.$color);
				}
			}
            if(!empty($align)){
                array_push($classes, $align);
				// array_push($classes, "w-100");
            }
			$custom_outer_style = '';
			if(!empty($outer_border)){
				if($color=='custom'){
					$custom_outer_style = 'style="background:'.$outer_custom_color.';"';
				}
			}

            $inline_style = '';
            if(!empty($width)){
                // $inline_style .= 'max-width:'.$width.'px;';
				// $inline_style .= 'max-height:'.$width.'px;';
                $inline_style .= 'width:'.$width.'px;';
				$inline_style .= 'height:'.$width.'px;';
            }else{
                $inline_style .= 'width:auto;';
                $inline_style .= 'height:auto;';
            }
            // if(!empty($height)){
            //     $inline_style .= 'max-height:'.$width.';';
            // }else{
            //     $inline_style .= 'height:auto;';
            // }
            array_push($classes, 'd-inline-block');

			$text_classes = pix_get_text_format_classes($bold, $italic, $secondary_font);
			$c_color = '';
			$c_custom_color = '';
			if(!empty($content_color)){
				if($content_color!='custom'){
					$c_color = 'text-'.$content_color;
				}else{
					$c_custom_color = 'style="color:'.$content_custom_color.';"';
				}
			}


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
					$output .= '<div class="'.$pix_tilt_size.' d-inline-block">';
				}
                $output .= '<a href="'.$link.'" '.$ntab.' class="'.$popup_class.'" data-stories="'.htmlspecialchars(json_encode($imgs_arr)).'" '.$jarallax.'>';
					$output .= '<div class="pix-story d-inline-block '.$css_class.'">';
					$output .= '<div class="story-img pix-bg-attachment-scroll pix-bg-custom  '.$class_names.'" '.$custom_outer_style.' '.$anim_type.' '.$anim_delay.'>';

					$size_num = 'full';
					$size = $size_num;


					$full_image = '';
					if(is_string($image)&&substr( $image, 0, 4 ) === "http"){
						$full_image = '<img class="rounded-circle bg-white pix-fit-cover img-fluid hover-effect '.$inner_border.'" style="'.$inline_style.'" alt="'.$alt.'" src="'.$image.'"  />';
					}else{
						$attrs = array(
							'class'	=> 'rounded-circle bg-white pix-fit-cover img-fluid hover-effect '.$inner_border,
							'style'	=> $inline_style,
							'alt'	=> $alt
						);
						if(is_array($image)&&!empty($image)){
							$full_image = wp_get_attachment_image( $image['id'], $size, false, $attrs );
						}else{
							$full_image = wp_get_attachment_image( $image, $size, false, $attrs );
						}
					}

	                	// $output .= '<img class="rounded-circle bg-white pix-fit-cover '.$inner_border.' img-fluid hover-effect" src="'.$imgSrc.'" alt="'. $alt .'" '.$inline_style.'/>';
	                	$output .= $full_image;
	                $output .= '</div>';
					if(!empty($title)) $output .= '<div class="pix-px-5 '. $text_size .' '.$c_color.' '.$position.' '.$text_classes.'" '.$c_custom_color.'>'.  $title  .'</div>';
	                $output .= '</div>';

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

				if(!empty($animation)){
	                $anim_type = 'data-anim-type="'.$animation.'"';
	                $anim_delay = 'data-anim-delay="'.$delay.'"';
					$output .= '<div class="animate-in d-inline-block" '.$anim_type.' '.$anim_delay.'>';
	            }
				if(!empty($pix_tilt)){
					$output .= '<div class="'.$pix_tilt_size.' d-inline-block">';
				}

				if(!empty($pix_infinite_animation)){
					$output .= '<div class="'.$pix_infinite_animation.' '.$pix_infinite_speed.'">';
				}

				$size_num = (int)$width;
				$size = array($size_num,$size_num);
				// $attrs = array(
				// 	'class'	=> 'rounded-circle bg-white pix-fit-cover img-fluid hover-effect '.$inner_border,
				// 	'style'	=> $inline_style,
				// 	'alt'	=> $alt
				// );
				// $full_image = wp_get_attachment_image( $image, $size, false, $attrs );
				$full_image = '';
				if(is_string($image)&&substr( $image, 0, 4 ) === "http"){
					$full_image = '<img class="rounded-circle bg-white pix-fit-cover img-fluid hover-effect '.$inner_border.'" style="'.$inline_style.'" alt="'.$alt.'" src="'.$image.'"  />';
				}else{
					$attrs = array(
						'class'	=> 'rounded-circle bg-white pix-fit-cover img-fluid hover-effect '.$inner_border,
						'style'	=> $inline_style,
						'alt'	=> $alt
					);
					if(is_array($image)&&!empty($image)){
						$full_image = wp_get_attachment_image( $image['id'], $size, false, $attrs );
					}else{
						$full_image = wp_get_attachment_image( $image, $size, false, $attrs );
					}
				}



                $output .= '<div class="pix-story d-inline-block '.$css_class.'"  '.$jarallax.'>';
					$output .= '<div class="story-img pix-bg-attachment-scroll pix-bg-custom '.$class_names.'" '.$custom_outer_style.'>';
	                	$output .= $full_image;
	                $output .= '</div>';
					if(!empty($title)) $output .= '<div class="pix-px-5 '. $text_size .' '.$c_color.' '.$position.' '.$text_classes.'" '.$c_custom_color.'>'.  $title  .'</div>';
                $output .= '</div>';



				if(!empty($pix_infinite_animation)){
					$output .= '</div>';
				}
				if(!empty($pix_tilt)){
					$output .= '</div>';
				}
				if(!empty($animation)){
					$output .= '</div>';
				}


            }


        }



		return $output;
	}
}


add_shortcode( 'pix_story', 'sc_pix_story' );

 ?>
