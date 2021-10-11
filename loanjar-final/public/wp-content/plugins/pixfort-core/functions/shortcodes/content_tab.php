<?php

/* ---------------------------------------------------------------------------
 * Content tab [pix_content_tab]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_content_tab' ) ){
   function sc_pix_content_tab( $attr, $content = null ){
       extract(shortcode_atts(array(
           'title' 		       => '',
           'bold' 		       => '',
           'italic' 		   => '',
           'secondary_font'    => '',
           'icon' 		       => '',
           'transition' 	   => '',
           'el_class' 		   => '',
           'tab_id' 		   => '',
           'css'               => '',
       ), $attr));
       $css_class = '';
        if(function_exists('vc_shortcode_custom_css_class')){
            $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
        }
        // role="tab"
        $output = '<div class="tab-pane '.$transition.' show '.$el_class.' '.$css_class.'" role="tabpanel" data-toggle2="tab" id="pix-tab-'.$tab_id.'" data-bold="'.$bold.'" data-italic="'.$italic.'" data-secondary="'.$secondary_font.'" data-id="'.$tab_id.'" data-icon="'.$icon.'" data-title="'.$title.'" aria-labelledby="pix-tab-'.$tab_id.'">';
            $output .= do_shortcode($content);
        $output .= '</div>';
        return $output;
   }
}
add_shortcode('pix_content_tab', 'sc_pix_content_tab');
 ?>
