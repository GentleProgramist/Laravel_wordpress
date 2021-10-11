<?php

/* ---------------------------------------------------------------------------
 * Content box [content_box]
 * --------------------------------------------------------------------------- */
 if( ! function_exists( 'sc_pix_h_text_tabs' ) )
 {
    function sc_pix_h_text_tabs( $attr, $content = null )
    {
        extract(shortcode_atts(array(
            'items'	=> '',
            'is_fill'	=> '',
            'position'	=> 'justify-content-center',
            'tabs_style'	=> 'pix-pills-1',
            'tabs_content_align'  => '',

            'el_class'	=> '',
            'tabs_icon_position' 		=> '',
            'bold' 		       => '',
            'italic' 		   => '',
            'secondary_font'    => '',
            'title_color'    => '',
            'title_custom_color'    => '',
            'css'	=> '',
        ), $attr));

        $css_class = '';
        if(function_exists('vc_shortcode_custom_css_class')){
            $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
        }

        $output = '';




        $tabs_id = wp_rand(0,10000000);
        $menu = '';
        $tabs = '';
        $lines_class = '';
        if($tabs_style=='pix-pills-lines'){
           $lines_class = 'd-flex';
        }
        $menu .= '<div class="nav '.$lines_class.' nav-pills pix_tabs_btns '.$position.' '.$is_fill.' '.$tabs_style.' mb-4 animate-in" data-anim-type="fade-in-up" role="tablist" data-anim-delay="1100" id="v-pills-tab"  aria-orientation="vertical">';

        if($tabs_style=='pix-pills-lines'){
            $menu .= '<div class="nav-item2 d-none d-sm-block flex-fill align-self-center pix-mr-20">';
               $menu .= '<span class="w-100 pix-tabs-line"></span>';
            $menu .= '</div>';
        }


        $tabs .= '<div class="pix_tabs_content animate-in" data-anim-type="fade-in-right" data-anim-delay="1200">';
            $tabs .= '<div class="tab-content '.$tabs_content_align.'">';
        foreach ($items as $item) {
            extract(shortcode_atts(array(
                'title' 	=> '',
                'icon' 	=> '',
                'content' 		=> '',
                'transition' 	   => '',
                'el_class' 		   => '',
            ), $item));


            $tab_id = wp_rand(0,10000000);
            $icon_html = '';
            if(!empty($icon)){
                if($tabs_icon_position=='top'){
                    $icon_html = '<i class="w-100 '.$icon.' d-block text-center mt-2"></i> ';
                }else{
                    $icon_html = '<i class="'.$icon.' mr-2"></i> ';
                }
            }
            $menu .= '<div class="nav-item">';
               $menu .= '<a class="nav-link pix-tabs-btn text-24 pix-px-25 py-2 my-2 '.$bold.' '.$italic.' '.$secondary_font.'" data-id="'. $tab_id .'" role="tab" id="pix-tab-btn-'. $tab_id .'" data-toggle="pill" href="#pix-tab-'. $tab_id .'"  aria-controls="pix-tab-'. $tab_id .'"><strong>'.$icon_html. $title .'</strong></a>';
            $menu .= '</div>';




            $tabs .= '<div class="tab-pane '.$transition.' show '.$el_class.'" role="tabpanel" data-toggle2="tab" id="pix-tab-'.$tab_id.'" data-bold="'.$bold.'" data-italic="'.$italic.'" data-secondary="'.$secondary_font.'" data-id="'.$tab_id.'" data-icon="'.$icon.'" data-title="'.$title.'" aria-labelledby="pix-tab-'.$tab_id.'">';
                $tabs .= do_shortcode($content);
            $tabs .= '</div>';


        }
        if($tabs_style=='pix-pills-lines'){
            $menu .= '<div class="nav-item2 d-none d-sm-block pix-tab-line flex-fill align-self-center pix-ml-20">';
               $menu .= '<span class="w-100 pix-tabs-line"></span>';
            $menu .= '</div>';
        }
        $menu .= '</div>';


            $tabs .= '</div>';
        $tabs .= '</div>';


        // Final output
        $output .= '<div class=" '.$css_class.'">';
            $output .= '<div class="pix_tabs_container pix-waiting" data-icons-pos="'.$tabs_icon_position.'">';
                $output .= $menu;
                $output .= $tabs;
            $output .= '</div>';
        $output .= '</div>';








    return $output;
    }
 }


add_shortcode('pix_h_text_tabs', 'sc_pix_h_text_tabs');


 ?>
