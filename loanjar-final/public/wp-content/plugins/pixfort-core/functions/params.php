<?php


add_action ( 'vc_before_init', 'pix_vc_params' );
    if( ! function_exists( 'pix_vc_params' ) ){
        function pix_vc_params(){
            function pix_param_icons_select( $settings, $value ) {
                require dirname( __FILE__ ) . '/images/icons_list.php';
                $opts_out = '';


                foreach ($pix_icons_list as $key) {

                    $opts_out .= '<div class="pix_param_icon" title="'.$key.'" data-val="'.$key.'"><img src="'.PIX_CORE_PLUGIN_URI.'functions/images/icons/'.$key.'.svg" /></div>';
                }

             return '<div class="pix_param_block pix_param_icon_out '.$settings['class'].'">'.
             '<div style="pading-bottom:5px;"><input type="text" class="pix_param_icons_search" placeholder="Search..." /></div>'.
             '<div class="pix_param_icon_container">'.
                $opts_out.
                '</div>'.
                 '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value pix_param_val wpb-textinput ' .
                 esc_attr( $settings['param_name'] ) . ' ' .
                 esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />'
                 .'</div>';
            }

            vc_add_shortcode_param('pix_icons_select', 'pix_param_icons_select', PIX_CORE_PLUGIN_URI .'/functions/js/params/icons.js');


            function pix_param_img_select( $settings, $value ) {

                $opts_out = '';
                for ($x = 1; $x <= 24; $x++) {
                    $opts_out .= '<div class="pix_param_img" data-val="'.$x.'"><img src="'.PIX_CORE_PLUGIN_URI.'functions/images/shapes/divider-'.$x.'.png" /></div>';
                }
             return '<div class="pix_param_block '.$settings['class'].'">'.
            '<div class="pix_param_img selected" data-val="0"><img src="'.PIX_CORE_PLUGIN_URI.'functions/images/shapes/none.png" /></div>'.
            '<div class="pix_param_img" data-val="dynamic"><img src="'.PIX_CORE_PLUGIN_URI.'functions/images/shapes/divider-dynamic.gif" /></div>'.
            $opts_out.

             '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value pix_param_val wpb-textinput ' .
             esc_attr( $settings['param_name'] ) . ' ' .
             esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />'
             .'</div>';
            }

            vc_add_shortcode_param('pix_img_select', 'pix_param_img_select', PIX_CORE_PLUGIN_URI .'/functions/js/params/shapes.js');



            function pix_param_title( $settings, $value ) {

             return '<div class="pix_param_block">'.

            esc_attr( $settings['param_name'] ).

             '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value pix_param_val wpb-textinput ' .
             esc_attr( $settings['param_name'] ) . ' ' .
             esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />'
             .'</div>';
            }

            vc_add_shortcode_param('pix_title', 'pix_param_title');


            function pix_param_globals( $settings, $value ) {

             return '<div class="pix_param_block">'.
             '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value pix_param_val wpb-textinput ' .
             esc_attr( $settings['param_name'] ) . ' ' .
             esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />'
             .'</div>';
            }

            vc_add_shortcode_param('pix_param_globals', 'pix_param_globals', PIX_CORE_PLUGIN_URI .'/functions/js/params/global.js');


            function pix_param_section( $settings, $value ) {

             return '<div class="pix_param_block">'.
             '<div class="pix_param_section"><hr /><h3><strong>'.$settings['pix_title'].'</strong></h3></div>'.

             '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value pix_param_val wpb-textinput ' .
             esc_attr( $settings['param_name'] ) . ' ' .
             esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />'
             .'</div>';
            }

            vc_add_shortcode_param('pix_param_section', 'pix_param_section');

            function pix_param_section_notice( $settings, $value ) {

             return '<div class="pix_param_block">'.
             '<div class="pix_param_section"><h4>'.$settings['pix_title'].'</h4></div>'.

             '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value pix_param_val wpb-textinput ' .
             esc_attr( $settings['param_name'] ) . ' ' .
             esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />'
             .'</div>';
            }

            vc_add_shortcode_param('pix_param_section_notice', 'pix_param_section_notice');



            function pix_responsive_css( $settings, $value ) {


                $props = array('pt', 'pr', 'pb', 'pl', 'mt', 'mr', 'mb', 'ml');

                $opts_out = '<form class="pix_responsive_css_param">';

                $opts_out .= '<div class="pix_responsive_nav">';
                    $opts_out .= '<a href="#" class="pix_responsive_nav_item is-active" data-link="#tablet-' . esc_attr( $settings['param_name'] ) . '">'.esc_attr__('Tablet', 'pixfort-core').'</a>';
                    $opts_out .= '<a href="#" class="pix_responsive_nav_item" data-link="#mobile-' . esc_attr( $settings['param_name'] ) . '">'.esc_attr__('Mobile', 'pixfort-core').'</a>';

                $opts_out .= '</div>';

                $opts_out .= '<div id="mobile-' . esc_attr( $settings['param_name'] ) . '" class="pix_responsive_tab ">';
                    // $opts_out .= '<h4>'.esc_attr__('Mobile', 'pixfort-core').'</h4>';
                    $opts_out .= '<div class="pix-responsive-layout-opts">';
                        $opts_out .= '<div class="pix_margin_square"><span>'.esc_attr__('Margin', 'pixfort-core').'</span></div>';
                        $opts_out .= '<div class="pix_padding_square"><span>'.esc_attr__('Padding', 'pixfort-core').'</span></div>';
                        foreach ($props as $prop) {
                            $opts_out .= '<div class="grid_item pix_res_'.$prop.'"><input type="text" placeholder="-" class="pix_responsive_css_field" name="pix_res_sm_'.$prop.'" /></div>';
                        }
                        // $opts_out .= '<div class="grid_item pix_res_pt"><input type="text" class="pix_responsive_css_field" name="pix_res_sm_pt" /></div>';
                        // $opts_out .= '<div class="grid_item pix_res_pr"><input type="text" class="pix_responsive_css_field" name="pix_res_sm_pr" /></div>';
                        // $opts_out .= '<div class="grid_item pix_res_pb"><input type="text" class="pix_responsive_css_field" name="pix_res_sm_pb" /></div>';
                        // $opts_out .= '<div class="grid_item pix_res_pl"><input type="text" class="pix_responsive_css_field" name="pix_res_sm_pl" /></div>';
                        //
                        // $opts_out .= '<div class="grid_item pix_res_mt"><input type="text" class="pix_responsive_css_field" name="pix_res_sm_mt" /></div>';
                        // $opts_out .= '<div class="grid_item pix_res_mr"><input type="text" class="pix_responsive_css_field" name="pix_res_sm_mr" /></div>';
                        // $opts_out .= '<div class="grid_item pix_res_mb"><input type="text" class="pix_responsive_css_field" name="pix_res_sm_mb" /></div>';
                        // $opts_out .= '<div class="grid_item pix_res_ml"><input type="text" class="pix_responsive_css_field" name="pix_res_sm_ml" /></div>';
                    $opts_out .= '</div>';
                $opts_out .= '</div>';

                $opts_out .= '<div id="tablet-' . esc_attr( $settings['param_name'] ) . '" class="pix_responsive_tab show">';
                    // $opts_out .= '<h4>'.esc_attr__('Tablet', 'pixfort-core').'</h4>';
                    $opts_out .= '<div class="pix-responsive-layout-opts">';
                        $opts_out .= '<div class="pix_margin_square"><span>'.esc_attr__('Margin', 'pixfort-core').'</span></div>';
                        $opts_out .= '<div class="pix_padding_square"><span>'.esc_attr__('Padding', 'pixfort-core').'</span></div>';
                        foreach ($props as $prop) {
                            $opts_out .= '<div class="grid_item pix_res_'.$prop.'"><input type="text" placeholder="-" class="pix_responsive_css_field" name="pix_res_md_'.$prop.'" /></div>';
                        }
                    $opts_out .= '</div>';
                $opts_out .= '</div>';

                $opts_out .= '</form>';


             return '<div class="pix_param_block '.$settings['class'].'">'.

            $opts_out.

             '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value pix_res_css_val ' .
             esc_attr( $settings['param_name'] ) . ' ' .
             esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />'
             .'</div>';

            }

            vc_add_shortcode_param('pix_responsive_css', 'pix_responsive_css', PIX_CORE_PLUGIN_URI .'/functions/js/params/responsive.js');


        }

    }


 ?>
