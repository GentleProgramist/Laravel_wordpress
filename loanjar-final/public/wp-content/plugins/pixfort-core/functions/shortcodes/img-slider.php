<?php


/* ---------------------------------------------------------------------------
 * Image [pix_img_slider] [/pix_img_slider]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_img_slider' ) ){

	function sc_pix_img_slider( $attr, $content = null ){
		extract(shortcode_atts(array(
			'items'  => '',
			'rounded_img'  => 'rounded-lg',
			'align'  => 'text-left',
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
			'dots_style' 	=> '',


			'slider_num'  => '1',
			'dots_style' 	=> '',
			'slider_style' 	=> 'pix-style-standard',
			'slider_effect' 	=> 'pix-effect-standard',
			'autoplay' 	=> false,
			'autoplay_time' 	=> '1500',
			'freescroll' 	=> false,
			'prevnextbuttons' 	=> true,
			'adaptiveheight' 	=> false,
			'pagedots' 	=> true,
			'dots_align' 	=> '',
			'cellalign' 	=> 'center',
			'slider_scale' 	=> '',
			'cellpadding' 	=> 'pix-p-10',
			'slider_wrap' 	=> false,
			'righttoleft' 	=> false,
			'visible_y' 	=> '',
			'visible_overflow' 	=> '',


			'css' 		=> '',
		), $attr));

		$css_class = '';
		if(function_exists('vc_shortcode_custom_css_class')){
		    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
		}

		$elementor = false;
		if(is_array($items)){
			$slides_arr = $items;
			$elementor = true;
		}else{
			$slides_arr = vc_param_group_parse_atts( $items );
		}
		// $slides_arr = vc_param_group_parse_atts( $items );

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

		array_push($classes, 'd-inline-block');


		$inline_style = 'style="'.$inline_style.'"';
		$class_names = join( ' ', $classes );

		$jarallax = '';
		if($pix_scroll_parallax){
			if(!empty($xaxis) || !empty($yaxis)){
				$jarallax = 'data-jarallax-element="'. $xaxis .' '. $yaxis .'"';
			}
		}




		if(!filter_var($autoplay, FILTER_VALIDATE_BOOLEAN)){
			$autoplay_time = false;
		}else{
			$autoplay_time = (int)$autoplay_time;
		}
		$slider_data = '';
		$pix_id = "pix-slider-".rand(1,200000000);
		$slider_opts = array(
			"autoPlay"			=> $autoplay_time,
			"freeScroll"		=> filter_var($freescroll, FILTER_VALIDATE_BOOLEAN),
			"prevNextButtons"	=> filter_var($prevnextbuttons, FILTER_VALIDATE_BOOLEAN),
			"wrapAround"		=> filter_var($slider_wrap, FILTER_VALIDATE_BOOLEAN),
			"pageDots"			=> filter_var($pagedots, FILTER_VALIDATE_BOOLEAN),
			"adaptiveHeight"	=> filter_var($adaptiveheight, FILTER_VALIDATE_BOOLEAN),
			"rightToLeft"		=> filter_var($righttoleft, FILTER_VALIDATE_BOOLEAN),
			"cellAlign" 		=> $cellalign,
			"contain"			=> true,
			"slider_effect"			=> $slider_effect,
			"pix_id"			=>  '#'.$pix_id,
		);
		$slider_data = json_encode($slider_opts);
		$slider_data = 'data-flickity=\''. $slider_data .'\'';



		if(!empty($slides_arr)){
			// $output  .= '<div class="main-carousel2 pix-slider2 pix-main-slider pix-slider-1 pix-fix-x pix-slider-dots '.$dots_style.'" '.$slider_data.'>';
			$output  .= '<div id="'.$pix_id.'" class="pix-main-slider pix-fix-x '.$visible_overflow.' '.$slider_style.' '.$slider_effect.' '.$slider_scale.' '.$visible_y.' pix-slider-'.$slider_num.' pix-slider-dots '.$dots_style.' '.$dots_align.'" '.$slider_data.'>';
			foreach ($slides_arr as $key => $value) {


				if(!empty($value['image'])){
					$imgSrcset = '';
					$imgSizes = '';
					if(is_string($value['image'])&&substr( $value['image'], 0, 4 ) === "http"){
						$imgSrc = $value['image'];
					}else{
						if($elementor){
							$img = wp_get_attachment_image_src($value['image']['id'], "full");
							// $imgSrcset = wp_get_attachment_image_srcset($value['image']['id']);
							// $imgSizes = wp_get_attachment_image_sizes($value['image']['id'], "full");
						}else{
							$img = wp_get_attachment_image_src($value['image'], "full");
							// $imgSrcset = wp_get_attachment_image_srcset($value['image']);
							// $imgSizes = wp_get_attachment_image_sizes($value['image'], "full");
						}
			            // $img = wp_get_attachment_image_src($value['image'], "full");
			            $imgSrc = $img[0];
					}
					$output .= '<div class="carousel-cell">';
					$output .= '<div class="slide-inner '.$cellpadding.'">';
					$output .= '<div class="pix-slider-effects">';

					if(empty($value['alt'])) $value['alt'] = '';
		            if(!empty($value['link'])){
		                $ntab = '';
		                if(!empty($value['target'])){
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
		                $output .= '<a href="'.$value['link'].'" '.$ntab.' class="'.$class_names.' '.$rounded_img.'" '.$anim_type.' '.$anim_delay.' '.$jarallax.'>';
		                $output .= '<img class="card-img '.$rounded_img.' h-100" src="'.$imgSrc.'" alt="'. $value['alt'] .'" '.$inline_style.'/>';
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
		                $output .= '<img class="card-img '.$rounded_img.' h-100" src="'.$imgSrc.'" alt="'. $value['alt'] .'" '.$inline_style.'/>';
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
					$output .= '</div>';
					$output .= '</div>';
					$output .= '</div>';
		        }
				// $delay += 100;

			}
			$output .= '</div>';
		}



		return $output;
	}
}


add_shortcode( 'pix_img_slider', 'sc_pix_img_slider' );

 ?>
