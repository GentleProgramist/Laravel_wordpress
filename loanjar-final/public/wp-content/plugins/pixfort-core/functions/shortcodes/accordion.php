<?php


 /* ---------------------------------------------------------------------------
  * Content box [content_box]
  * --------------------------------------------------------------------------- */
  if( ! function_exists( 'sc_pix_accordion' ) )
  {
     function sc_pix_accordion( $attr, $content = null )
     {
         extract(shortcode_atts(array(
             'title' 	=> '',
			'tabs' 		=> '',
			'open1st' 	=> '',
			'style' 	=> '',

            'accordion_id' 		=> '',

            'animation'	=> '',
            'delay'	=> '0',
            'el_class'	=> '',
            'css'	=> '',

         ), $attr));

        $css_class = '';
        if(function_exists('vc_shortcode_custom_css_class')){
            $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
        }

        $output = '';
         $output .= '<div class="accordion w-100 accordion-card bg-white2 rounded-lg2 '.$css_class.'" id="accordion-'.$accordion_id.'">';
                 $output .= do_shortcode($content);
         $output .= '</div>';


         return $output;
     }
  }

 add_shortcode('pix_accordion', 'sc_pix_accordion');









  ?>
