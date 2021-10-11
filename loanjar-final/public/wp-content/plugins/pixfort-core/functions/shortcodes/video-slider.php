<?php


/* ---------------------------------------------------------------------------
 * Video [pix_video_slider] [/pix_video_slider]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_video_slider' ) ){

	function sc_pix_video_slider( $attr, $content = null ){
		extract(shortcode_atts(array(
			'items'  => '',
			'rounded_img'  => 'rounded-0',
			'aspect' 	=> 'embed-responsive-21by9',
			'is_elementor'  => false,
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
			'extra_classes' 		=> '',
			'css' 		=> '',
		), $attr));

		$css_class = '';
		if(function_exists('vc_shortcode_custom_css_class')){
		    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
		}
		$slides_arr = [];
		if(is_array($items)){
			$slides_arr = $items;
		}else{
			if(function_exists('vc_param_group_parse_atts')){
				$slides_arr = vc_param_group_parse_atts( $items );
			}
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
        $class_names = join( ' ', $classes );
        $jarallax = '';
        if($pix_scroll_parallax){
			if(!empty($xaxis) || !empty($yaxis)){
				$jarallax = 'data-jarallax-element="'. $xaxis .' '. $yaxis .'"';
			}
        }

		if(!empty($slides_arr)){

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

			$output  .= '<div id="'.$pix_id.'" class="pix-main-slider pix-fix-x2 '.$visible_overflow.' '.$slider_style.' '.$slider_effect.' '.$slider_scale.' '.$visible_y.' pix-slider-'.$slider_num.' pix-slider-dots '.$dots_style.' '.$dots_align.'" '.$slider_data.'>';
			foreach ($slides_arr as $key => $value) {
				$output .= '<div class="carousel-cell">';
					$output .= '<div class="slide-inner '.$cellpadding.'">';
						$output .= '<div class="pix-slider-effects">';
							$output .= sc_pix_video(array_merge(
														$value,
														$attr,
														array(
															'in_popup'	=> true,
															'decode'	=> '0',
														)
													));
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</div>';
			}
			$output .= '</div>';
		}
		return $output;
	}
}

add_shortcode( 'pix_video_slider', 'sc_pix_video_slider' );

 ?>
