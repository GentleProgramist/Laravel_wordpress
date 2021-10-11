<?php

/* ---------------------------------------------------------------------------
* Testimonials slider [testimonials_slider]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_testimonials_slider' ) )
{
	function sc_testimonials_slider( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' 	=> '',
			'style' 	=> '',
			'testimonials' 	=> '',
			'img_style' 	=> 'circle_bottom',
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
			'css' 	=> '',
		), $attr));

		$css_class = '';
        if(function_exists('vc_shortcode_custom_css_class')){
            $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
        }
		$testimonials_arr = [];
		if(is_array($testimonials)){
			$testimonials_arr = $testimonials;
		}else{
			if(function_exists('vc_param_group_parse_atts')){
				$testimonials_arr = vc_param_group_parse_atts( $testimonials );
			}
		}
		$output  = '';
		if(!empty($testimonials_arr)){

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
			if($visible_overflow=='pix-overflow-all-visible') $visible_y = '';

			$output  .= '<div class="'.$css_class.'">';
			$output  .= '<div id="'.$pix_id.'" class="pix-main-slider pix-fix-x2 '.$visible_overflow.' '.$slider_style.' '.$slider_effect.' '.$slider_scale.' '.$visible_y.' pix-slider-'.$slider_num.' pix-slider-dots '.$dots_style.' '.$dots_align.'" '.$slider_data.'>';
			foreach ($testimonials_arr as $key => $value) {
				$output .= '<div class="carousel-cell">';
				$output .= '<div class="slide-inner '.$cellpadding.'">';
				$output .= '<div class="pix-slider-effects">';
					$output .= '<div class="card">';
							$t_attrs = $attr;
							$t_attrs['css'] = '';
							if(!empty($value['image'])) $t_attrs['image'] = $value['image'];
							if(!empty($value['name'])) $t_attrs['name'] = $value['name'];
							if(!empty($value['title'])) $t_attrs['title'] = $value['title'];
							if(!empty($value['text'])) $t_attrs['text'] = $value['text'];
							if(!empty($value['link'])) $t_attrs['link'] = $value['link'];
							if(!empty($value['target'])) $t_attrs['target'] = $value['target'];
							$output .= sc_pix_testimonial($t_attrs);
					$output .= '</div>';
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

add_shortcode( 'testimonials_slider', 'sc_testimonials_slider' );

?>
