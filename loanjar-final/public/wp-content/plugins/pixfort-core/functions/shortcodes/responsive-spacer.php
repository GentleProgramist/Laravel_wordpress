<?php

/* ---------------------------------------------------------------------------
* Responsive spacer [pix_responsive_spacer] [/pix_responsive_spacer]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_responsive_spacer' ) ){
    function sc_pix_responsive_spacer( $attr, $content = null ){
        extract(shortcode_atts(array(
            'height'  => '',
            'height_tablet'  => '',
            'height_mobile'  => '',
            'el_id'  => '',
            'el_class'  => '',
            'css' 		=> '',
        ), $attr));
        $css_class = 'w-100 d-block ';
        if(function_exists('vc_shortcode_custom_css_class')){
            $css_class .= apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
        }
        if(empty($el_id)){
            $el_id = 'spacer-'.rand(1,200000000);
        }
        $style = '';
        if(!empty($height)){
            $style .= '#'. $el_id . ' { height: '.$height.' !important; } ';
        }
        if(!empty($height_tablet)){
            $style .= '@media (max-width: 920px) {';
            $style .= '#'. $el_id . ' { height: '.$height_tablet.' !important; }';
            $style .= '}';
        }
        if(!empty($height_mobile)){
            $style .= '@media (max-width: 576px) {';
            $style .= '#'. $el_id . ' { height: '.$height_mobile.' !important; }';
            $style .= '}';
        }
        wp_register_style( 'pix-spacer-handle', false );
    	wp_enqueue_style( 'pix-spacer-handle' );
    	wp_add_inline_style( 'pix-spacer-handle', $style );
        $output = '<div id="'.$el_id.'" class="'.$css_class.'"></div>';

        return $output;
    }
}


add_shortcode('pix_responsive_spacer', 'sc_pix_responsive_spacer');

?>
