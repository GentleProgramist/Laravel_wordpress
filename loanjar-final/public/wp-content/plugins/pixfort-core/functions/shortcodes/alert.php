<?php


/* ---------------------------------------------------------------------------
 * Alert [alert] [/alert]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_alert' ) )
{
	function sc_alert( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'bold'		=> 'font-weight-bold',
			'italic'		=> '',
			'secondary_font'		=> '',
			'style'		=> 'warning',
			'animate' 		=> '',
			'shadow_class' 		=> '',
			'css' 	=> '',

		), $attr));



		switch( $style ){
			case 'error':
				$icon = 'icon-outlined-iconset-62';
				break;
			case 'notice':
				$icon = 'icon-bulb';
				break;
			case 'success':
				$icon = 'icon-outlined-iconset-145';
				break;
			default:
				$icon = 'icon-megaphone';
				break;
		}





        $output = '<div class="alert mb-0 alert-'. $style .' '.$shadow_class.' '.$class_names.' animate-in" role="alert" data-anim-type="fade-in">';
              $output .= do_shortcode( $content );
              $output .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>';
        $output .= '</div>';

		return $output;
	}
}

/* ---------------------------------------------------------------------------
 * Alert Block [alertblock]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'pf_alertblock' ) )
{
	function pf_alertblock( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' 	=> ' ',
			'bold'		=> 'font-weight-bold',
			'italic'		=> '',
			'secondary_font'		=> '',
			'alert_type_1' 	=> 'success',
      'shadow' 	=> '',
			'animation' 	=> '',
			'delay' 	=> '0',
			'css' 	=> '',
		), $attr));

		$output  = '';
        $shadow_class = '';

		$classes = array();
		$css_class = '';
		if(function_exists('vc_shortcode_custom_css_class')){
		    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
		}
		array_push($classes, $css_class );

        if($shadow && $shadow != ''){
			array_push($classes, 'shadow' );
		}
		if(!empty($bold)) array_push($classes, $bold );
		if(!empty($italic)) array_push($classes, $italic );
		if(!empty($secondary_font)) array_push($classes, $secondary_font );

		switch( $alert_type_1 ){
			case 'error':
				$icon = 'icon-outlined-iconset-62';
				break;
			case 'notice':
				$icon = 'icon-bulb';
				break;
			case 'success':
				$icon = 'icon-outlined-iconset-145';
				break;
			default:
				$icon = 'icon-megaphone';
				break;
		}
		$anim_attrs = '';
		if(!empty($animation)){
			array_push($classes, 'animate-in');
			$anim_attrs = 'data-anim-delay="' . $delay .'" data-anim-type="'. $animation .'"';
		}

		$class_names = join( ' ', $classes );

		$output = '<div class="alert d-flex justify-content-between align-items-center alert-'. $alert_type_1 .' '.$shadow_class.' '.$class_names.'" role="alert" '.$anim_attrs.'>';
              $output .= do_shortcode( $title );
              $output .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>';
        $output .= '</div>';
		return $output;
	}
}

add_shortcode( 'alertblock', 'pf_alertblock' );
add_shortcode( 'alert', 'pf_alertblock' );

 ?>
