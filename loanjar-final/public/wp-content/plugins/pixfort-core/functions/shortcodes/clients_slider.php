<?php

/* ---------------------------------------------------------------------------
 * Clients slider [clients_slider]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_clients_slider' ) )
{
	function sc_clients_slider( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' 	=> '',
			'style' 	=> 'pix-box',
			'clients' 	=> '',
			'slider_num' 	=> 4,
			'css' 		=> '',
			'add_hover_effect' 		=> '',
			'animation' 		=> 'fade-in-Img',
			'delay' 		=> '0',

			'slider_num'  => '3',
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


			'delay_items' 		=> '',
		), $attr));

		$css_class = '';
		$classes = array();
		if(function_exists('vc_shortcode_custom_css_class')){
			$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
		}
		$el_style = '';
		if($style=='no-effect'){
			$el_style = 'no-effect';
		}

		if($style =='pix-box'){
			$style = 'client shadow-hover-lg rounded-xl';
		}

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

	 if($add_hover_effect){ array_push($classes, $add_hover_effect_arr[$add_hover_effect] ); }
	 $class_names = join( ' ', $classes );

		// style
		// if( $style ){
		// 	$style = 'nobox';
		// } else {
		// 	$style = false;
		// }
		if($style =='pix-box'){
			$style = 'client shadow-hover-lg rounded-xl';
		}

		$elementor = false;
		$clients_arr = array();
		if(is_array($clients)){
			$clients_arr = $clients;
			$elementor = true;
		}else{
			if(function_exists('vc_param_group_parse_atts')){
				$clients_arr = vc_param_group_parse_atts( $clients );
			}
		}


		$output  = '';
		if(!empty($clients_arr)){

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

			$cellClasses = '';
			if(!$adaptiveheight){
				$cellClasses = 'd-flex align-items-center min-100';
			}
			// $output  .= '<div class="pix-slider-left clients pix-carousel-clients-12 pix-slider-effect-12 pix-slider-dots '.$slider_dots.' pix-slider-'.$slider_num.' py-52">';
			$output  .= '<div class="'.$css_class.'">';
			$output  .= '<div id="'.$pix_id.'" class="pix-main-slider clients pix-fix-x2 '.$el_style.' '.$visible_overflow.' '.$slider_style.' '.$slider_effect.' '.$slider_scale.' '.$visible_y.' pix-slider-'.$slider_num.' pix-slider-dots '.$dots_style.' '.$dots_align.'" '.$slider_data.'>';
			foreach ($clients_arr as $key => $value) {
				if(empty($value['title'])) {
						$value['title'] = '';
				}
				$output .= '<div class="carousel-cell '.$cellClasses.'">';
				$output .= '<div class="slide-inner '.$cellpadding.'">';
				$output .= '<div class="pix-slider-effects">';
					$output .= '<div class="text-center client">';
						$target = '_self';
						if( !empty($value['target']) ){
							$target = '_blank';
						}
						if( !empty($value['link']) ){
							$output .= '<a class="'.$class_names.' d-inline-block pix-p-20  '.$style.'" target="'.$target.'" href="'. $value['link'] .'" title="'. $value['title'] .'">';
						}else{
							$output .= '<div class="'.$class_names.' d-inline-block pix-p-20 '.$style.'" title="'. $value['title'] .'">';
						}

						if( !empty($value['image']) ) {
							$imgSrcset = '';
							$imgSizes = '';
							if(is_string($value['image'])&&substr( $value['image'], 0, 4 ) === "http"){
								$imgSrc = $value['image'];
							}else{
								if($elementor){
									$img = wp_get_attachment_image_src($value['image']['id'], "full");
									$imgSrcset = wp_get_attachment_image_srcset($value['image']['id']);
									$imgSizes = wp_get_attachment_image_sizes($value['image']['id'], "full");
								}else{
									$img = wp_get_attachment_image_src($value['image'], "full");
									$imgSrcset = wp_get_attachment_image_srcset($value['image']);
									$imgSizes = wp_get_attachment_image_sizes($value['image'], "full");
								}
				                $imgSrc = $img[0];
							}
							$title = '';
							if(!empty($value['title'])) $title = $value['title'];
			                $output .= '<span class="d-inline-block">';
								if(empty($imgSrcset)){
									$output .= '<img src="'.$imgSrc.'" class="scale-with-grid animate-in" alt="'.$title.'" data-anim-type="'.$animation.'" data-anim-delay="'.$delay.'">';
								}else{
									$output .= '<img src="'.$imgSrc.'" srcset="'.$imgSrcset.'" sizes="'.$imgSizes.'" class="scale-with-grid animate-in" alt="'.$title.'" data-anim-type="'.$animation.'" data-anim-delay="'.$delay.'">';
								}
							$output .= '</span>';
			            }
						if( !empty($value['link']) ){
							$output .= '</a>';
						}else{
							$output .= '</div>';
						}
					$output .= '</div>';
					if(!empty($delay_items)){
							$delay += 200;
					}
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';
			}
			$output .= '</div>';
			$output .= '</div>';
		}

		return $output;
	}
}

add_shortcode( 'clients_slider', 'sc_clients_slider' );

?>
