<?php


/* ---------------------------------------------------------------------------
 * Image [pix_img] [/pix_img]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_auto_video' ) ){

	function sc_pix_auto_video( $attr, $content = null ){
		extract(shortcode_atts(array(
			'mp4_video'  => '',
			'poster'  => '',
			'loop'  => '',
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
            'img_div' 		=> '',
            'pix_scale_in' 		=> '',
            'el_class' 		=> '',
			'css' 		=> '',
		), $attr));

		$css_class = '';
		if(function_exists('vc_shortcode_custom_css_class')){
		    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
		}
		$css_class .= ' '.$el_class;

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
		// $el_attributes = array();
		// $el_attributes = implode( ' ', $el_attributes );
		// $loop_attr = '';
		// if(!empty($loop)) $loop_attr = 'loop';
		$width_style = '';
		$width_attr = 'width="100%"';
		$height_style = '';
		$height_attr = '';
		$inline_style = '';
		if(!empty($mp4_video)) $mp4_video = esc_url( $mp4_video );
		if(!empty($width)){
			$width_attr = 'width="100%"';
			$inline_style .= 'max-width:100%;width:'.esc_attr( $width ).';';
			if(empty($height)){
				$height_attr = 'height="auto"';
			}
		}
		if(!empty($height)){
			$height_attr = 'height="100%"';
			$inline_style .= 'height:'.esc_attr( $height ).';';
			if(empty($width)){
				$width_attr = 'width="auto"';
			}
		}

        if(!empty($mp4_video)){
				$poster_tag = '';
				if(!empty($poster)){
					$img = wp_get_attachment_image_src($poster, "full");
					if(!empty($img[0])){
						$imgSrc = $img[0];
						$poster_tag = 'poster="'.$imgSrc.'"';
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

				if(!empty($img_div)){
					$output .= '<div class="pix-img-div '.$img_div.'">';
				}else{
					$output .= '<div class="d-inline-block w-100 pix-h-auto '.$pix_scale_in.'">';
				}
	            if($link){
	                $ntab = '';
	                if(!empty($target)){
	                    $ntab = 'target="_blank"';
	                }
					if(!empty($pix_infinite_animation)){
						$output .= '<div  '.$inline_style.' class="'.$pix_infinite_animation.' '.$pix_infinite_speed.'">';
					}
					if(!empty($animation)){
		                $anim_type = 'data-anim-type="'.$animation.'"';
		                $anim_delay = 'data-anim-delay="'.$delay.'"';
						$output .= '<div  '.$inline_style.' class="animate-in d-inline-block" '.$anim_type.' '.$anim_delay.'>';
		            }
					if(!empty($pix_tilt)){
						$output .= '<div  '.$inline_style.' class="w-100 pix-h-auto '.$pix_tilt_size.'">';
					}
	                $output .= '<a  '.$inline_style.' href="'.$link.'" '.$ntab.' class="'.$class_names.' '.$rounded_img.'" '.$anim_type.' '.$anim_delay.' '.$jarallax.'>';

	                // $output .= '<img class="card-img '.$rounded_img.' h-100" src="'.$imgSrc.'" alt="'. $alt .'" '.$inline_style.'/>';
					$output .= '<video class="pix-video-bg-element d-block '.$rounded_img.' bg-video" '.$width_attr.' '.$height_attr.' preload="metadata" '.$loop.' '.$poster_tag.' muted playsinline>
							<source src="' . $mp4_video . '" type="video/mp4" />
							</video>';

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
						$output .= '<div  '.$inline_style.' class="'.$pix_infinite_animation.' '.$pix_infinite_speed.'">';
					}
					if(!empty($animation)){
		                $anim_type = 'data-anim-type="'.$animation.'"';
		                $anim_delay = 'data-anim-delay="'.$delay.'"';
						$output .= '<div  '.$inline_style.' class="animate-in w-100 pix-h-auto d-inline-block" '.$anim_type.' '.$anim_delay.'>';
		            }
					if(!empty($pix_tilt)){
						$output .= '<div  '.$inline_style.' class="d-inline-block w-100 pix-h-auto '.$pix_tilt_size.'">';
					}

	                $output .= '<div  '.$inline_style.' class="'.$class_names.' '.$rounded_img.'"  '.$jarallax.'>';
	                // $output .= '<img class="card-img2 '.$rounded_img.' h-1002" src="'.$imgSrc.'" data-action="zoom" alt="'. $alt .'" '.$inline_style.'/>';


	                // $output .= $embed;
	                // $output .= wp_video_shortcode(array(
					// 	'src'		=> $mp4_video,
					// 	'autoplay'		=> 'autoplay',
					// 	'loop'		=> 'loop',
					// 	'class'		=> 'wp-video-shortcode bg-video2 ',
					// )); autoplay="autoplay"
					$output .= '<video class="pix-video-bg-element d-block pix-bg-image2 '.$rounded_img.' bg-video" '.$width_attr.' '.$height_attr.' preload="metadata" '.$loop.' '.$poster_tag.' muted playsinline>
							<source src="' . $mp4_video . '" type="video/mp4" />
							</video>';
	                // $output .= '<div class="jarallax pix-video-bg-element2" data-imgSize="contain" data-speed="0" data-jarallax-video="'.$mp4_video.'">';
					// 	// $output .= '<div class="embed-responsive element-holder">';
					// 		// $output .= '<div class="element-holder w-100">test test</div>';
					//
					// 	// $output .= '</div>';
					// $output .= '</div>';

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
				// if(!empty($img_div)){
					$output .= '</div>';
				// }
			// }
        }else{
			$output = '<div class="pix-p-20">No Selectd Video!</div>';
		}
		return $output;
	}
}

add_shortcode( 'pix_auto_video', 'sc_pix_auto_video' );

?>
