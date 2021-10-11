<?php


/* ---------------------------------------------------------------------------
 * Pricing Group [pix_pricing_group] [/pix_pricing_group]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_pricing_group' ) )
{
	function sc_pix_pricing_group( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'el_class' 		=> 'w-100',
			'css' 		=> '',

		), $attr));

		$output = "";

		$css_class = '';
if(function_exists('vc_shortcode_custom_css_class')){
    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
}



        $output .= '<div class="card-group w-100 d-sm-flex align-items-center row-cols-1 '.$el_class.' '.$css_class.'">';

			$output .= do_shortcode($content);

        $output .= '</div>';
        $output .= "\n";



	    return $output;
	}
}


add_shortcode( 'pix_pricing_group', 'sc_pix_pricing_group' );

 ?>
