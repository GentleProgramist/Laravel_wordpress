<?php


/* ---------------------------------------------------------------------------
 * Countdown [pix_countdown] [/pix_countdown]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_countdown' ) )
{
	function sc_pix_countdown( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'date'  => '',
			'numbers_color'  => 'primary',
			'numbers_custom_color'  => '',
			'content_color'  => 'dark-opacity-2',
			'content_custom_color'  => '',
			'bold'  => '',
			'italic'  => '',
			'secondary_font'  => 'body-font',
			'numbers_size'  => 'h1',
			'display'  => 'display-4',
			'numbers_custom_size'  => '',
			'link'		=> '',
			'animation' 	=> '',
			'delay' 	=> '0',
			'css' 		=> '',
		), $attr));

		$css_class = '';
		if(function_exists('vc_shortcode_custom_css_class')){
		    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
		}
		if($secondary_font!='secondary-font'){$secondary_font= 'body-font';}
		$numbers_classes = pix_get_text_format_classes($bold, $italic, $secondary_font);

		$n_color = '';
		$n_custom_style = '';
		if(!empty($numbers_color)){
			if($numbers_color!='custom'){
				$n_color = 'text-'.$numbers_color;
			}else{
				$n_custom_style .= 'color:'.$numbers_custom_color.' !important;';
			}
		}


		$n_color .= ' '.$numbers_classes;
		$c_color = '';
		$c_custom_color = '';
		if(!empty($content_color)){
			if($content_color!='custom'){
				$c_color = 'text-'.$content_color;
			}else{
				$c_custom_color = 'style="color:'.$content_custom_color.' !important;"';
			}
		}

        // $output = '<div class="slide-in-container w-100 '.$position.' '. esc_attr( $css_class ) .'" >';
		// if(empty($animation)){
		// 	$output .= '<p class="'. $size .' '.$c_color.' '.$position.'" '.$c_custom_color.'><span class="">'. do_shortcode( $content ) .'</span></p>';
		// }else{
		// 	$output .= '<p class="'. $size .' '.$c_color.' '.$position.'" '.$c_custom_color.'><span class="animate-in d-inline-block" data-anim-delay="' . $delay .'" data-anim-type="'. $animation .'">'. do_shortcode( $content ) .'</span></p>';
		// }
        // $output .= '</div>';

		$numbers_tag = 'div';
		if($numbers_tag!='custom'){
			$numbers_tag = $numbers_size;
		}else{
			$n_custom_style .= 'font-size:'.$numbers_custom_size.';';
		}
		$n_custom_style = 'style="'.$n_custom_style.';"';

        $url = '';
        if(!empty($link)){
            $url = 'data-redirect="'.$link.'"';
        }

        $classes = '';
        $classes .= $css_class . ' ';
        $anim_type = '';
        $anim_delay = '';
        if(!empty($animation)){
            $classes .= 'animate-in ';
            $anim_type = 'data-anim-type="'.$animation.'"';
            $anim_delay = 'data-anim-delay="'.$delay.'"';
        }
		$days = esc_attr__('Days', 'pixfort-core');
		$hours = esc_attr__('Hours', 'pixfort-core');
		$minutes = esc_attr__('Minutes', 'pixfort-core');
		$seconds = esc_attr__('Seconds', 'pixfort-core');
        $output = '<div class="pix-countdown w-100 text-center '.$classes.'" data-date="'.$date.'" '.$anim_type.' '.$anim_delay.' '.$url.'>
            <div class="row">
                <div class="col-12 col-sm py-3">
                    <'.$numbers_tag.' class="'.$display.' mb-3"><span class="pix-count-days '.$n_color.'" '.$n_custom_style.'>0</span></'.$numbers_tag.'>
                    <h6 class="'.$c_color.'" '.$c_custom_color.'><strong>'.$days.'</strong></h6>
                </div>
                <div class="col-12 col-sm py-3">
                    <'.$numbers_tag.' class="'.$display.' mb-3"><span class="pix-count-hours '.$n_color.'" '.$n_custom_style.'>0</span></'.$numbers_tag.'>
                    <h6 class="'.$c_color.'" '.$c_custom_color.'><strong>'.$hours.'</strong></h6>
                </div>
                <div class="col-12 col-sm py-3">
                    <'.$numbers_tag.' class="'.$display.' mb-3"><span class="pix-count-min '.$n_color.'" '.$n_custom_style.'>0</span></'.$numbers_tag.'>
                    <h6 class="'.$c_color.'" '.$c_custom_color.'><strong>'.$minutes.'</strong></h6>
                </div>
                <div class="col-12 col-sm py-3">
                    <'.$numbers_tag.' class="'.$display.' mb-3"><span class="pix-count-sec '.$n_color.'" '.$n_custom_style.'>0</span></'.$numbers_tag.'>
                    <h6 class="'.$c_color.'" '.$c_custom_color.'><strong>'.$seconds.'</strong></h6>
                </div>
            </div>
        </div>';


		return $output;
	}
}


add_shortcode( 'pix_countdown', 'sc_pix_countdown' );

 ?>
