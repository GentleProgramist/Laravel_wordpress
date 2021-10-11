<?php

/* ---------------------------------------------------------------------------
 * Content box [content_box]
 * --------------------------------------------------------------------------- */
 if( ! function_exists( 'sc_pix_v_text_tabs' ) )
 {
    function sc_pix_v_text_tabs( $attr, $content = null )
    {
        extract(shortcode_atts(array(
            'items'	=> '',

            'badge_text' 		=> '',
            'badge_bold' 		=> 'font-weight-normal',
            'badge_italic' 		=> '',
            'badge_secondary_font' 		=> '',
            'badge_text_color' 		=> 'primary',
            'badge_text_custom_color' 		=> '',
            'badge_bg_color' 		=> 'primary-light',
            'badge_custom_bg_color' 		=> '',
            'badge_text_size' 		=> 'h5',
            'badge_text_custom_size' 		=> '',
            'badge_css' 		=> '',


            'title'		=> '',
            'bold'		=> 'font-weight-bold',
            'italic'		=> '',
            'secondary_font'		=> '',
            'title_color'		=> '',
            'title_custom_color'		=> '',
            'title_size'		=> 'h1',
            'title_custom_size'		=> '',
            'text_content'		=> '',
            'content_color'		=> 'primary',
            'content_custom_color'		=> '',
            'content_size'		=> '',
            'h1'		=> '',
            'icon' 		=> '',
            'slogan' 	=> '',
            'style' 	=> '',	// icon, line, arrows
            'position'  => 'text-left',
            'padding_title'			=> '',
            'padding_content'		=> '',
            'padding_menu'		=> '20px',


            'is_sticky'  => '',
            'menu_position'  => 'left',
            'tabs_style'  => 'pix-pills-1',
            'tabs_content_align'  => '',



            'style' 		=> '',

            'hover_effect' 		=> '',
            'add_hover_effect' 		=> '',
            'text_color' 		=> '',
            'rounded_box' 		=> '',
            'pix_particles_check' => '',
            'pix_particles' => '',
            'particles_top_index' => '',
            'animation'		=> '',
            'delay'		=> '0',
            'css' => '',
            'overflow' 		=> '',

            'el_class' 		=> '',



            'tabs_title'		=> '',
            'tabs_bold'		=> '',
            'tabs_italic'		=> '',
            'tabs_secondary_font'		=> '',


            'is_fill'	=> '',
            'position'	=> 'justify-content-center',
            'tabs_style'	=> 'pix-pills-1',
            'tabs_content_align'  => '',
            'menu_position'  => '',

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



        $badge_attr = array(
         'text'		=> $badge_text,
         'bold'  => $badge_bold,
         'italic'  => $badge_italic,
         'secondary_font'  => $badge_secondary_font,
         'text_color'		=> $badge_text_color,
         'text_custom_color'		=> $badge_text_custom_color,
         'text_size'		=> $badge_text_size,
         'text_custom_size'		=> $badge_text_custom_size,
         'css'		=> $badge_css,


         'bg_color'		=> $badge_bg_color,
         'custom_bg_color'		=> $badge_custom_bg_color,
         'animation' 	=> '',
         'delay' 	=> '0',
     );
        $heading_attr = array_merge(
            $attr,
            array(
                'content'		=> $text_content,
            )
        );



        $tabs_id = wp_rand(0,10000000);
        $menu = '';
        $tabs = '';
        $lines_class = '';
        if($tabs_style=='pix-pills-lines'){
           $lines_class = 'd-flex';
        }

        $menu .= '<div class="col-12 col-md-4 d-inline-block">';
            $menu .= '<div class="'.$is_sticky.'" style="top:110px;">';
            if(!empty($badge_text)){
                $menu .= '<div class="'.$position.'">';
                $menu .= sc_pix_badge($badge_attr);
                $menu .= '</div>';
            }
            // if(!empty($text_content)){
                $menu .= sc_heading($heading_attr, $text_content);
            // }

            $padding = '';
            if(!empty($padding_menu)){
                $padding = 'style="padding-top:'.$padding_menu.';"';
            }
            $menu .= '<div class="nav pix_tabs_btns '.$position.' flex-column nav-pills '.$tabs_style.' animate-in" data-anim-type="fade-in-up" data-anim-delay="1100" role="tablist" id="v-pills-tab"  aria-orientation="vertical" '.$padding.'>';


        if($tabs_style=='pix-pills-lines'){
            $menu .= '<div class="nav-item2 d-none d-sm-block flex-fill align-self-center pix-mr-20">';
               $menu .= '<span class="w-100 pix-tabs-line"></span>';
            $menu .= '</div>';
        }




        $tabs .= '<div class="col-12 col-md-8 d-inline-block">';
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
               $menu .= '<a class="nav-link pix-tabs-btn text-24 pix-px-25 py-2 my-2 '.$tabs_bold.' '.$tabs_italic.' '.$tabs_secondary_font.'" data-id="'. $tab_id .'" role="tab" id="pix-tab-btn-'. $tab_id .'" data-toggle="pill" href="#pix-tab-'. $tab_id .'"  aria-controls="pix-tab-'. $tab_id .'"><strong>'.$icon_html. $title .'</strong></a>';
            $menu .= '</div>';




            $tabs .= '<div class="tab-pane '.$transition.' show '.$el_class.'" role="tabpanel" data-toggle2="tab" id="pix-tab-'.$tab_id.'" data-bold="'.$bold.'" data-italic="'.$italic.'" data-secondary="'.$secondary_font.'" data-id="'.$tab_id.'" data-icon="'.$icon.'" data-title="'.$title.'" aria-labelledby="pix-tab-'.$tab_id.'">';
                $tabs .= do_shortcode($content);
            $tabs .= '</div>';


        }
                $menu .= '</div>';
            $menu .= '</div>';
        $menu .= '</div>';


                $tabs .= '</div>';
            $tabs .= '</div>';
        $tabs .= '</div>';




        // Final output
        $output .= '<div class="'.$css_class.'">';
            $output .= '<div class="row pix-waiting pix_tabs_container">';
                if($menu_position=='left'){
                    $output .= $menu;
                    $output .= $tabs;
                }else{
                    $output .= $tabs;
                    $output .= $menu;
                }
            $output .= '</div>';
        $output .= '</div>';





    return $output;
    }
 }


add_shortcode('pix_v_text_tabs', 'sc_pix_v_text_tabs');


 ?>
