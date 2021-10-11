<?php


/* ---------------------------------------------------------------------------
 * FAQ [pix_faq] [/pix_faq]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_faq' ) )
{
	function sc_pix_faq( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title'		=> '',
			'title_color'		=> 'heading-default',
			'title_custom_color'		=> '',
			'title_bold'		=> '',
			'title_secondary'		=> '',
			'title_size'		=> 'h1',
			'title_custom_size'		=> '',
			'content_bold'		=> '',
			'content_secondary'		=> '',
			'content_size'		=> '',
			'content_color'		=> 'body-default',
			'content_custom_color'		=> '',
			'h1'		=> '',
			'media_type' 		=> 'icon',
            'pix_duo_icon' 		=> '',
			'icon'		=> 'pixicon-question-circle',
			'icon_has_color' 		=> '',
			'icon_color' 		=> 'heading-default',
			'icon_custom_color' 		=> 'heading-default',
			'slogan' 	=> '',
			'style' 	=> '',	// icon, line, arrows
			'position'  => 'center',
			'animation' 	=> '',
			'delay' 	=> '0',
			'content_animation' 	=> '',
			'content_delay' 	=> '0',
			'css' 		=> '',
		), $attr));

		$css_class = '';
		if(function_exists('vc_shortcode_custom_css_class')){
		    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
		}

		$t_color = '';
		$t_color = '';
		$t_custom_color = '';
		if(!empty($title_color)){
			if($title_color!='custom'){
				$t_color = 'text-'.$title_color;
			}else{
				$t_custom_color = 'color:'.$title_custom_color.' !important;';
			}
		}
		if(!empty($title_bold)){
			$t_color .= ' '.$title_bold;
		}
		if(!empty($title_secondary)){
			$t_color .= ' '.$title_secondary;
		}

		$c_classes = '';
		$c_custom_color = '';
		if(!empty($content_color)){
			if($content_color!='custom'){
				$c_classes = 'text-'.$content_color;
			}else{
				$c_custom_color = 'color:'.$content_custom_color.' !important;';
			}
		}

		if(!empty($content_bold)){
			$c_classes .= ' '.$content_bold;
		}
		if(!empty($content_secondary)){
			$c_classes .= ' '.$content_secondary;
		}


		$title_tag = $title_size;
		$t_size_style = '';
		if($title_size == 'custom'){
			$title_tag = "h1";
			$t_size_style = "font-size:". $title_custom_size .';';
		}

		$icon_class = $t_color;
		$icon_style = $t_custom_color;

		if(!empty($icon_color)&&!empty($icon_has_color)){
			if($icon_color!='custom'){
				$icon_class = 'text-'.$icon_color .' svg-'.$icon_color;
			}else{
				$icon_style = 'color:'.$icon_custom_color.' !important;';
			}
		}else{
			$icon_class = 'text-'.$title_color .' svg-'.$title_color;
			$icon_style = $t_custom_color;

		}

		$titleClasses = '';
		$contentClasses = '';
		if(!empty($animation)) {
			$titleClasses = 'animate-in';
		}
		if(!empty($content_animation)) {
			$contentClasses = 'animate-in';
		}
        $output = '<div class="pix-faq '.$position.' '.$css_class.'">';
            // if( $icon && $style == 'icon' ) $output .= '<h6 class="text-black-50 display-3 text-gradient-primary text-center"><i class="'. $icon .'"></i></h6>';
            // if( $slogan && $style == 'line' ) $output .= '<div><div class="slide-in-container"><h6 class=" animate-in" data-anim-type="'. $animation .'"><small>'. $slogan .'</small></h6></div></div>';
            $output .= '<div><div class="slide-in-container"><'.$title_tag.' class="d-flex align-items-center mb-3 '.$titleClasses.'" style="'.$t_custom_color. $t_size_style.'" data-anim-type="'. $animation .'" data-anim-delay="'.$delay.'">';

			if(!empty($media_type)){
	            if($media_type=='duo_icon'){
	                if(!empty($pix_duo_icon)){
	                    $output .= '<span class="d-inline-block svg-242 pix-mr-10 '.$icon_class.'" style="'.$icon_style.'">';
	                    	$output .= pix_load_inline_svg(PIX_CORE_PLUGIN_DIR.'/functions/images/icons/'.$pix_duo_icon.'.svg');
	                    $output .= '</span>';
	                }
	            }
	            if($media_type=='icon'){
	                if(!empty($icon)){
	                    // $icon_out = '<i class="'.$icon.' text-20 pix-mr-5"></i> ';
						$output .= '<i class="pix-faq-icon '.$icon.' pix-mr-10 '.$icon_class.' align-baseline" style="'.$icon_style.'"></i>';
	                }
	            }

	        }

				// if(!empty($icon)||true) { $output .= '<i class="pix-faq-icon '.$icon.' pix-mr-10 '.$icon_class.' align-baseline" style="'.$icon_style.'"></i>'; }
				$output .= '<span class="'. $t_color .'">'. $title .'</span>';
			$output .='</'.$title_tag.'></div></div>';

            if(!empty($content)){ $output .= '<div class="slide-in-container d-inline-block w-100"><div class="'.$c_classes.' '.$content_size.' '.$contentClasses.'" data-anim-type="'. $content_animation .'" data-anim-delay="'.$content_delay.'" style="'.$c_custom_color.'">'. do_shortcode( $content ) .'</div></div>'; }


			// $output .= '<h6 class="pb-3 secondary-font animate-in font-weight-bold text-dark-opacity-5" data-anim-delay="600" data-anim-type="fade-in">';
			// 	 if(!empty($icon)||true) { $output .= '<i class="pixicon-question-circle mr-2 text-primary align-baseline"></i>'; }
			// 	 $output .= 'What happens if I don’t renew my license?';
			//  $output .= '</h6>';
			//  $output .= '<p class="pb-1 text-18 animate-in" data-anim-type="fade-in" data-anim-delay="900">';
			// 	 $output .= 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.';
			//  $output .= '</p>';



        $output .= '</div>';


		return $output;
	}
}


add_shortcode( 'pix_faq', 'sc_pix_faq' );




 ?>
