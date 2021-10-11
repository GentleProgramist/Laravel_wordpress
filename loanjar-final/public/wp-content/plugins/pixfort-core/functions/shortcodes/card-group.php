<?php


/* ---------------------------------------------------------------------------
 * card Group [pix_card_group] [/pix_card_group]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_card_group' ) )
{
	function sc_pix_card_group( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'pix_rounded' 		=> '',
			'el_class' 		=> 'w-100',
			'css' 		=> '',

		), $attr));

		$output = "";

		$css_class = '';
if(function_exists('vc_shortcode_custom_css_class')){
    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
}



        $output .= '<div class="card-group w-100 d-sm-flex align-items-center row-cols-1 pix-card-group '.$pix_rounded.' '.$el_class.' '.$css_class.'">';

			$output .= do_shortcode($content);

        $output .= '</div>';
        $output .= "\n";



	    return $output;
	}
}


add_shortcode( 'pix_card_group', 'sc_pix_card_group' );

 ?>
