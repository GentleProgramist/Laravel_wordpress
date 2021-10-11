<?php


/* ---------------------------------------------------------------------------
 * Map [pix_map] [/pix_map]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_map' ) ){

	function sc_pix_map( $attr, $content = null ){

		extract(shortcode_atts(array(
			'address'		=> '',
			'latitude'		=> '48.892506',
			'longitude' 	=> '2.236413',
			'map_zoom' 		=> '14',
			'map_style' 	=> 'silver',
			'custom_color' 	=> '#1274E7',
			'saturation' 	=> '-20',
			'brightness' 	=> '5',
			'marker' 		=> '',
			'style' 		=> '',
			'hover_effect' 		=> '',
			'add_hover_effect' 		=> '',
			'animation' 	=> '',
			'delay' 	=> '0',
			'map_height' 	=> '',
			'extra_classes' 			=> '',
			'css' 			=> '',
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

		$classes = array();
		if($style){ array_push($classes, $style_arr[$style] ); }
		if($hover_effect){ array_push($classes, $hover_effect_arr[$hover_effect] ); }
		if($add_hover_effect){ array_push($classes, $add_hover_effect_arr[$add_hover_effect] ); }
		$class_names = join( ' ', $classes );

		$imgSrc = PIX_CORE_PLUGIN_URI.'functions/images/map/pix-icon-location.svg';
		if(!empty($marker)){
			$imgSrcset = '';
			if(is_string($marker)&&substr( $marker, 0, 4 ) === "http"){
				$imgSrc = $marker;
			}else{
				if(!empty($image['id'])){
					$img = wp_get_attachment_image_src($marker['id'], "full");
					if(!empty($img[0])){
                        $imgSrc = $img[0];
                    }
                    if(!$img&&$marker['url']){
                        $imgSrc = $marker['url'];
                    }
				}else{
					$img = wp_get_attachment_image_src($marker, "full");
					$imgSrc = $img[0];
				}

			}

		}

		$anim_attrs = '';
		if(!empty($animation)){
			$css_class = $css_class . ' animate-in';
			$anim_attrs = 'data-anim-delay="' . $delay .'" data-anim-type="'. $animation .'"';
		}


        $output = '';
		if(!empty(pix_plugin_get_option('google-api-key'))){
	        $output .= '<div class="overflow-hidden pix-map-out mb-2 mb-sm-0 '.$extra_classes.' '.$map_height.' '.$class_names.' '.$css_class.'" '.$anim_attrs.'>';
	        	$output .= '<section class="pix-google-map w-100" data-style="'.$map_style.'" data-color="'.$custom_color.'" data-saturation="'.$saturation.'" data-brightness="'.$brightness.'" data-latitude="'.$latitude.'" data-longitude="'.$longitude.'" data-map-zoom="'.$map_zoom.'" data-marker="'.$imgSrc.'">
	                	<div class="google-container"></div>
	                	<div class="pix-zoom-in bg-white shadow rounded"><i class="pixicon-plus-circle text-dark-opacity-8 font-weight-bold"></i></div>
	                	<div class="pix-zoom-out bg-white mt-1 shadow rounded"><i class="pixicon-minus-circle text-dark-opacity-8 font-weight-bold"></i></div>';
					if(!empty($address)){
						$output .= '<address class="bg-white rounded-lg text-body-default font-weight-bold shadow-inverse">'.$address.'</address>';
					}
	            $output .= '</section>';
			$output .= '</div>';
		}else{
			$output .= '<div class="overflow-hidden pix-map-out mb-2 mb-sm-0 '.$extra_classes.' '.$map_height.' '.$class_names.' '.$css_class.'" '.$anim_attrs.'>';
	        	$output .= '<section class="pix-google-map w-100" data-style="'.$map_style.'" data-color="'.$custom_color.'" data-saturation="'.$saturation.'" data-brightness="'.$brightness.'" data-latitude="'.$latitude.'" data-longitude="'.$longitude.'" data-map-zoom="'.$map_zoom.'" data-marker="'.$imgSrc.'">
	                	<div class="google-container"></div>
	                	<div class="pix-zoom-in bg-white shadow rounded"><i class="pixicon-plus-circle text-dark-opacity-8 font-weight-bold"></i></div>
	                	<div class="pix-zoom-out bg-white mt-1 shadow rounded"><i class="pixicon-minus-circle text-dark-opacity-8 font-weight-bold"></i></div>';
						$output .= '<address class="bg-white rounded-lg text-body-default font-weight-bold shadow-inverse">Google Maps API key is not configured in theme options!</address>';
	            $output .= '</section>';
			$output .= '</div>';
		}

		return $output;
	}
}

add_shortcode( 'pix_map', 'sc_pix_map' );

 ?>
