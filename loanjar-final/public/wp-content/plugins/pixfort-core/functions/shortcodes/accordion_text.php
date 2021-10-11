<?php


/* ---------------------------------------------------------------------------
* Content box [content_box]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_accordion_text' ) ) {
    function sc_pix_accordion_text( $attr, $content = null ) {
        extract(shortcode_atts(array(
            'items' 		=> '',
            'accordion_id' 		=> '',
            'bold' 		=> '',
            'italic' 		=> '',
            'secondary_font' 		=> '',
            'title_color' 		=> 'heading-default',
            'title_custom_color' 		=> '',
            'icon_color' 		=> 'primary',
            'custom_icon_color' 		=> '',
            'transition' 		=> '',
            'bg_color' 		=> 'white',
            'custom_bg_color' 		=> '',
            'animation'	=> '',
            'delay'	=> '0'

        ), $attr));

        $output = '';
        $title_classes = pix_get_text_format_classes($bold, $italic, $secondary_font);
        $title_classes .= ' text-'.$title_color;
        $title_style = '';
        if(!empty($title_custom_color)){
            $title_style = 'style="color:'.$title_custom_color.'"';
        }
        $tab_title_style = '';
        if($bg_color=='custom'&&!empty($custom_bg_color)){
            $tab_title_style = 'style="background:'.$custom_bg_color.'"';
        }

        $accordion_id = wp_rand(0,10000000);
        $output .= '<div class="accordion w-100 accordion-card bg-white2 rounded-lg2" id="accordion-'.$accordion_id.'">';
        foreach ($items as $item) {
            extract(shortcode_atts(array(
                'title' 	=> '',
                'media_type' 		=> '',
                'pix_duo_icon' 	=> '',
                'icon' 	=> '',
                'content' 		=> '',
                'is_open'	=> '',
                'tab_id' 		=> '',
            ), $item));

            if(empty($tab_id)) $tab_id = "pix-tab-".wp_rand(0,10000000);
            $icon_out = '';
            if(!empty($media_type)){
                if($media_type=='duo_icon'){
                    if(!empty($pix_duo_icon)){
                        $icon_out = '<span class="d-inline-block text-'.$icon_color.' svg-20 pix-mr-10">';
                        $icon_out .= pix_load_inline_svg(PIX_CORE_PLUGIN_DIR.'/functions/images/icons/'.$pix_duo_icon.'.svg');
                        $icon_out .= '</span>';
                    }
                }
                if($media_type=='icon'){
                    if(!empty($icon)){
                        $icon_style = '';
                        if(!empty($custom_icon_color)){
                            $icon_style = 'style="color:'.$custom_icon_color.';"';
                        }
                        $icon_out = '<i class="'.$icon.' text-'.$icon_color.' text-20 pix-mr-10" '.$icon_style.'></i> ';
                    }
                }
            }

            $show = '';
            if(!empty($is_open)){
                $show = 'show';
            }

            $output .= '<div class="card">
               <div class="card-header pix-mb-10 shadow-sm rounded-lg bg-'.$bg_color.'" id="heading'. $tab_id .'" '.$tab_title_style.'>
                   <button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapse'. $tab_id .'" aria-expanded="true" aria-controls="collapse'. $tab_id .'">'.$icon_out. '<span class="'.$title_classes.'" '.$title_style.'>'. $title.'</span></button>
               </div>

               <div id="collapse'. $tab_id .'" class="collapse '.$show.'" aria-labelledby="heading'. $tab_id .'">
                 <div class="card-body">
                     '. do_shortcode($content) .'
                 </div>
               </div>
             </div>';



            // $output .= do_shortcode($content);
        }
        $output .= '</div>';
        return $output;
    }
}

add_shortcode('pix_accordion_text', 'sc_pix_accordion_text');









?>
