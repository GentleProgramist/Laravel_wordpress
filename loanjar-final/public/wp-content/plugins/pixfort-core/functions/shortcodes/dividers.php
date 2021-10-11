<?php


/* ---------------------------------------------------------------------------
  * Dividers [sc_pix_dividers]
  * --------------------------------------------------------------------------- */
 if( ! function_exists( 'sc_pix_dividers' ) )
 {
 	function sc_pix_dividers( $attr, $content = null )
 	{
 		extract(shortcode_atts(array(
            'top_divider_color' => '#fff',
            'bottom_divider_color' => '#fff',
            'top_divider_select' => '0',
            'top_layers' => '3',
            't_1_is_gradient' => false,
            't_1_color' => '#ffffff',
            't_1_color_2' => '#ffffff',
            't_1_animation' => '',
            't_1_delay' => '',
            't_2_is_gradient' => false,
            't_2_color' => 'rgba(255,255,255,0.6)',
            't_2_color_2' => '#ffffff',
            't_2_animation' => '',
            't_2_delay' => '',
            't_3_is_gradient' => false,
            't_3_color' => 'rgba(255,255,255,0.3)',
            't_3_color_2' => '#ffffff',
            't_3_animation' => '',
            't_3_delay' => '',
            't_divider_in_front' => false,
            't_flip_h' => false,
            'top_moving_divider_color' => '',
            't_custom_height' => '',

            'bottom_divider_color' => '#fff',
            'bottom_divider_color' => '#fff',
            'bottom_divider_select' => '0',
            'bottom_layers' => '3',
            'b_1_is_gradient' => false,
            'b_1_color' => '#ffffff',
            'b_1_color_2' => '#ffffff',
            'b_1_animation' => '',
            'b_1_delay' => '',
            'b_2_is_gradient' => false,
            'b_2_color' => 'rgba(255,255,255,0.6)',
            'b_2_color_2' => '#ffffff',
            'b_2_animation' => '',
            'b_2_delay' => '',
            'b_3_is_gradient' => false,
            'b_3_color' => 'rgba(255,255,255,0.3)',
            'b_3_color_2' => '#ffffff',
            'b_3_animation' => '',
            'b_3_delay' => '',
            'b_divider_in_front' => false,
            'b_flip_h' => false,
            'bottom_moving_divider_color' => '',
            'b_custom_height' => '',

 		), $attr));

        $el_id = 'pix-accordion-'.rand(1, 1000000);

        // if(empty($top_divider_color)){ $top_divider_color = "#fff";}
        // if(empty($bottom_divider_color)){ $bottom_divider_color = "#fff";}
        $output = '';
        if($top_divider_select && $top_divider_select!='' && $top_divider_select!='0' && $top_divider_select!='dynamic'){
        	$t_divider_opts = array(
        		'd_divider_select'			=> $top_divider_select,
        		'd_layers'					=> $top_layers,
        		'd_1_is_gradient'			=> $t_1_is_gradient,
        		'd_1_color'					=> $t_1_color,
        		'd_1_color_2'				=> $t_1_color_2,
        		'd_1_animation'				=> $t_1_animation,
        		'd_1_delay'					=> $t_1_delay,
        		'd_2_is_gradient'			=> $t_2_is_gradient,
        		'd_2_color'					=> $t_2_color,
        		'd_2_color_2'				=> $t_2_color_2,
        		'd_2_animation'				=> $t_2_animation,
        		'd_2_delay'					=> $t_2_delay,
        		'd_3_is_gradient'			=> $t_3_is_gradient,
        		'd_3_color'					=> $t_3_color,
        		'd_3_color_2'				=> $t_3_color_2,
        		'd_3_animation'				=> $t_3_animation,
        		'd_3_delay'					=> $t_3_delay,
        		'd_high_index'				=> $t_divider_in_front,
        		'd_flip_h'					=> $t_flip_h,
        		'is_element'					=> true,
        	);
        	$c_height = false;
        	if(!empty($t_custom_height)){ $c_height = $t_custom_height;}
        	// $output .= pix_get_divider($top_divider, $top_divider_color, 'top', $el_id, $top_moving_divider_color);
        	$output .= pix_get_divider($top_divider_select, $top_divider_color, 'top', $el_id, $top_moving_divider_color, $t_divider_opts, $c_height);
        }

        if($top_divider_select && $top_divider_select=='dynamic'){
        	$t_divider_opts = array(
        		'd_divider_select'			=> $top_divider_select,
        		'd_high_index'				=> $t_divider_in_front,
        		'd_flip_h'					=> $t_flip_h,
                'is_element'					=> true,
        	);
        	$output .= pix_get_divider($top_divider_select, $top_divider_color, 'top', $el_id, $top_moving_divider_color, $t_divider_opts);
        }

        if($bottom_divider_select && $bottom_divider_select!='' && $bottom_divider_select!='0' && $bottom_divider_select!='dynamic'){
        	$b_divider_opts = array(
        		'd_divider_select'		=> $bottom_divider_select,
        		'd_layers'				=> $bottom_layers,
        		'd_1_is_gradient'			=> $b_1_is_gradient,
        		'd_1_color'					=> $b_1_color,
        		'd_1_color_2'				=> $b_1_color_2,
        		'd_1_animation'				=> $b_1_animation,
        		'd_1_delay'					=> $b_1_delay,
        		'd_2_is_gradient'			=> $b_2_is_gradient,
        		'd_2_color'					=> $b_2_color,
        		'd_2_color_2'				=> $b_2_color_2,
        		'd_2_animation'				=> $b_2_animation,
        		'd_2_delay'					=> $b_2_delay,
        		'd_3_is_gradient'			=> $b_3_is_gradient,
        		'd_3_color'					=> $b_3_color,
        		'd_3_color_2'				=> $b_3_color_2,
        		'd_3_animation'				=> $b_3_animation,
        		'd_3_delay'					=> $b_3_delay,
        		'd_high_index'				=> $b_divider_in_front,
        		'd_flip_h'					=> $b_flip_h,
                'is_element'					=> true,
        	);
            $c_height = false;
        	if(!empty($b_custom_height)){ $c_height = $b_custom_height;}
        	$output .= pix_get_divider($bottom_divider_select, $bottom_divider_color, 'bottom', $el_id, $bottom_moving_divider_color, $b_divider_opts, $c_height);
        	// $output2 = pix_get_divider($bottom_divider_select, $bottom_divider_color, 'bottom', $el_id, $bottom_moving_divider_color);
        }

        if($bottom_divider_select && $bottom_divider_select=='dynamic'){
        	$b_divider_opts = array(
        		'd_divider_select'			=> $bottom_divider_select,
        		'd_high_index'				=> $b_divider_in_front,
        		'd_flip_h'					=> $b_flip_h,
                'is_element'					=> true,
        	);
        	$output .= pix_get_divider($bottom_divider_select, $bottom_divider_color, 'bottom', $el_id, $bottom_moving_divider_color, $b_divider_opts);
        }



 		// $output = '<div class="pix-dividers-box pix-divider-bottom2 pix-full-width-elm2">
        //     <svg class="pix-shape-dividers" viewBox="0 0 100 100" preserveAspectRatio="none">
		// 		<defs>
		// 			<linearGradient id="pix-gradient-'.$el_id.'-3" x1="0%" y1="0%" x2="0%" y2="100%">
		// 				<stop offset="0%"   stop-color="#eee"/>
		// 				<stop offset="100%" stop-color="#fff"/>
		// 			</linearGradient>
		// 			<linearGradient id="pix-gradient-'.$el_id.'-2" x1="0%" y1="0%" x2="100%" y2="0%">
		// 				<stop offset="0%"   stop-color="#ffd392"/>
		// 				<stop offset="100%" stop-color="#ff3898"/>
		// 			</linearGradient>
		// 			<linearGradient id="pix-gradient-'.$el_id.'-1" x1="0%" y1="0%" x2="100%" y2="0%">
		// 				<!-- <stop offset="0%"   stop-color="#110046"/>
		// 				<stop offset="100%" stop-color="#32004a"/> -->
        //                 <stop offset="0%"   stop-color="#00c99b"/>
        //                 <stop offset="100%" stop-color="#ff0ea1"/>
		// 			</linearGradient>
		// 		</defs>
		// 		<path class="" fill="url(#pix-gradient-'.$el_id.'-1)"></path>
		// 		<path class="" fill="url(#pix-gradient-'.$el_id.'-2)"></path>
		// 		<path class="" fill="url(#pix-gradient-'.$el_id.'-3)"></path>
		// 	</svg>
        // </div>';


 		return $output;
 	}
 }

 add_shortcode( 'pix_dividers', 'sc_pix_dividers' );

  ?>
