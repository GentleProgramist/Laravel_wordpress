<?php


/* ---------------------------------------------------------------------------
 * Highlighted Text [pix_highlighted_text] [/pix_highlighted_text]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_highlighted_text' ) )
{
	function sc_pix_highlighted_text( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'items' 		=> '',
            'title_color'		=> 'heading-default',
			'title_custom_color'		=> '',
			'title_size'		=> 'h1',
			'display'		=> '',
			'title_custom_size'		=> '',
            'position'  => 'text-center',
			'animation' 	=> '',
			'delay' 	=> '0',
            'heading_id' 	=> '',
			'max_width' 	=> '',
			'css' 		=> '',
		), $attr));
        $css_class = '';
        $classes = array();
		if(function_exists('vc_shortcode_custom_css_class')){
		    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );

		}

        $texts = array();
		if(is_array($items)){
			$texts = $items;
		}else{
			if(function_exists('vc_param_group_parse_atts')){
				$texts = vc_param_group_parse_atts( $items );
			}
		}
		$output = '';
        if($texts){

            $t_custom_color = '';
    		if(!empty($title_color)){
    			if($title_color!='custom'){
    				array_push($classes, 'text-'.$title_color );
    			}else{
    				$t_custom_color .= 'color:'.$title_custom_color.' !important;';
    			}
    		}

            if(!empty($display)) array_push($classes, $display );

            $title_tag = $title_size;
    		$t_size_style = '';
    		if($title_size == 'custom'){
    			$title_tag = "div";
    			$t_size_style = "font-size:". $title_custom_size .';';
    		}
    		if(!empty($animation)){
    			array_push($classes, 'animate-in' );
    		}
    		$class_names = join( ' ', $classes );

            if(empty($el_id)) {
                $el_id = 'highlighted-text-'.rand(1,200000000);
            }


            
            $output .= '<div id="'.$el_id.'" class="'.$position.' '.$css_class.'">';
            if(!empty($max_width)) {
				$custom_style = 'style="max-width:'.$max_width.';"';
				$output .= '<div class="d-inline-block" '.$custom_style.'>';
			}
            $output .= '<'.$title_tag.' class="'.$class_names.'" '.$t_size_style.' data-anim-type="'. $animation .'" data-anim-delay="'.$delay.'">';
			foreach ($texts as $key => $value) {
                $classes = 'font-weight-normal ';
                if(!empty($value['bold'])){
                    $classes .= ' '.$value['bold'];
                }
                if(!empty($value['heading_font'])){
                    $classes .= ' '.$value['heading_font'];
                }else{
                    $classes .= ' body-font';
                }
                if(!empty($value['italic'])){
                    $classes .= ' '.$value['italic'];
                }
                if(!empty($value['_id'])){
                    $classes .= ' elementor-repeater-item-'.$value['_id'];
                }
				$item_id = $el_id.'-'.$key;
                if(!empty($value['is_highlighted'])){
					$customStyle = '';
					$css_color = '';
                    if(!empty($value['highlight_color'])){
						if(!empty($value['__globals__'])){
							if(!empty($value['__globals__']['highlight_color'])){
								$value['highlight_color'] = str_replace('globals/colors?id=', "", $value['__globals__']['highlight_color']);
								$value['highlight_color'] = 'var(--e-global-color-' . $value['highlight_color'] . ')';
							}
						}
                        if($value['highlight_color']!='#ffd900'){
                            $customStyle .= '.'.$item_id.' { background-image: linear-gradient('.$value['highlight_color'].', '.$value['highlight_color'].') !important; }';
                        }
                    }
                    if(!empty($value['custom_height'])){
                        $custom_height = $value['custom_height'];
						$customStyle .= '.'.$item_id.'.pix-highlighted-text { background-size: 0% '.$custom_height.'%; }';
						$customStyle .= '.'.$item_id.'.animated, .'.$item_id.'.highlight-grow { background-size: 100% '.$custom_height.'% !important; }';
                    }


					if(!empty($customStyle)){
						$classes .= ' '.$item_id;
						wp_register_style( 'pix-highlighted-text-handle', false );
						wp_enqueue_style( 'pix-highlighted-text-handle' );
						wp_add_inline_style( 'pix-highlighted-text-handle', $customStyle );
					}
                    $output .= '<span class="pix-highlighted-text  '.$classes.' animate-in" data-anim-type="highlight-grow" data-anim-delay="200">'. do_shortcode($value['text']) .'</span>';
                }else{
                    $output .= '<span class="'.$classes.'">'. do_shortcode($value['text']) .'</span>';
                }
                if(!empty($value['new_line'])){
                    $output .= '</br>';
                }
            }
            $output .= '</'.$title_tag.'>';
            if(!empty($max_width)) {
				$output .= '</div>';
			}
            $output .= '</div>';
        }



		return $output;
	}
}


add_shortcode( 'pix_highlighted_text', 'sc_pix_highlighted_text' );

 ?>
