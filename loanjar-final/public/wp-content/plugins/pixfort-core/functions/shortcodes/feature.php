<?php


/* ---------------------------------------------------------------------------
 * Pix Feature [pix_feature] [/pix_feature]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_feature' ) )
{
	function sc_pix_feature( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title'					=> '',
			'title_bold'			=> '',
			'title_italic'			=> '',
			'title_secondary_font'			=> '',
			'title_color'			=> 'heading-default',
			'title_custom_color'	=> '',
			'title_size'			=> 'h5',
			'title_custom_size'		=> '',
			'content_color'			=> 'text-gray',
			'content_custom_color'	=> '',
			'content_size'			=> '',
			'content_bold'			=> '',
			'content_italic'		=> '',
			'content_secondary_font'		=> '',
			'media_type'			=> '',
			'padding_title'			=> '20px',
			'padding_content'		=> '20px',
			'char'			=> '1',
			'pix_duo_icon'			=> '',
			'icon'			=> 'pixicon-question-circle',
			'icon_color'	=> 'primary',
			'custom_icon_color'	=> '',
			'has_icon_bg'	=> '',
			'icon_bg_color'	=> 'primary-light',
			'icon_custom_bg_color'	=> '',
			'icon_size'		=> '30',
			'image'			=> '',
			'image_size'	=> '',
			'circle'		=> '',
			'icon_position'	=> 'top',
			'content_align'	=> 'left',
			'justify'		=> '',
			'link'			=> '',
			'target'		=> '',
			'animation'		=> '',
			'delay'		=> '',
			'class'			=> '',
			'element_id'			=> '',
            'css' => '',
		), $attr));

        $css_class = '';
		if(function_exists('vc_shortcode_custom_css_class')){
		    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
		}
        $css_class = esc_attr( $css_class );
		$title = pix_unescape_vc($title);
		// target
		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = '';
		}

		if(empty($element_id)){
			$element_id = 'duo-icon-'.rand(1,200000000);
		}

		$i_color = '';
		$i_custom_color = '';
		if(!empty($icon_color)){
			if($icon_color!='custom'){
				$i_color = 'text-'.$icon_color;
			}else{
				$i_custom_color .= 'color:'.$custom_icon_color.';';
				if($media_type == "duo_icon"){
					$customStyle = '#'. $element_id.' path, ';
					$customStyle .= '#'.$element_id.' rect, ';
					$customStyle .= '#'.$element_id.' circle, ';
					$customStyle .= '#'.$element_id.' polygon { fill: '.$custom_icon_color.' !important; }';
					wp_register_style( 'pix-duo-icons-handle', false );
			    	wp_enqueue_style( 'pix-duo-icons-handle' );
			    	wp_add_inline_style( 'pix-duo-icons-handle', $customStyle );
				}
			}
		}

		$i_bg_color = '';
		$i_bg_custom_color = '';
		if(!empty($icon_bg_color)){
			if($icon_bg_color!='custom'){
				$i_bg_color = 'bg-'.$icon_bg_color;
			}else{
				$i_bg_custom_color .= 'background:'.$icon_custom_bg_color.';';
			}
		}


		$anim_class = '';
		$anim_type = '';
		$anim_delay_icon = '';
		$anim_delay_title = '';
		$anim_delay_content = '';
		if(!empty($animation)){
			$anim_class = 'animate-in';
			$anim_type = 'data-anim-type="'.$animation.'"';
			$anim_delay_icon = 'data-anim-delay="'.$delay.'"';
			$t_delay = (int) $delay + 100;
			$anim_delay_title = 'data-anim-delay="'.$t_delay.'"';
			$c_delay = $t_delay + 100;
			$anim_delay_content = 'data-anim-delay="'.$c_delay.'"';
		}


		if(!empty($has_icon_bg) && $media_type == "char"){
			$icon_size_div = $icon_size*2;
		}else{
			$icon_size_div = $icon_size*1.8;
		}


        $classes = '';
        $classes .= 'text-'.$content_align;
        if(!empty($justify)){
            $justify = 'text-justify';
        }

        $size = 'large';
        $size_style = '';
        if(!empty($circle)){
            $size = "thumbnail";
            $circle = 'rounded-circle';
        }
        if(!empty($image_size)){
            $size = $image_size.'x'.$image_size;
            $size_style = 'width:'.$image_size.';height:auto;display:inline-block;position:relative;';
        }
		$imgSrc = '';
        if( $image ) {
			if(is_string($image)&&substr( $image, 0, 4 ) === "http"){
				$img = $image;
				$imgSrc = $img;
			}else{
				if(!empty($image['id'])){
				  $img = wp_get_attachment_image_src($image['id'], $size);
				}else{
				  $img = wp_get_attachment_image_src($image, $size);
				}
				$imgSrc = $img[0];
			}
            // if(empty($image_size)){
            //     $img = wp_get_attachment_image_src($image, $size);
            //     $imgSrc = $img[0];
            // }else{
            //     $img = wp_get_attachment_image_src($image, $size);
            //     $imgSrc = $img[0];
            // }
		}

		$title_style = '';
		if(!empty($padding_title)){
			$title_style .= 'padding-top:'.$padding_title.';';
		}

		$t_color = '';
		if(!empty($title_color)){
			if($title_color!='custom'){
				$t_color = 'text-'.$title_color;
			}else{
				$title_style .= 'color:'.$title_custom_color.' !important;';
			}
		}
		$title_tag = $title_size;
		if($title_size == 'custom'){
			$title_tag = "div";
			$title_style .= "font-size:". $title_custom_size .';';
		}

		$title_style = 'style="'.$title_style.'"';

		$c_color = '';
		$c_custom_style = '';
		if(!empty($content_color)){
			if($content_color!='custom'){
				$c_color = 'text-'.$content_color;
			}else{
				$c_custom_style .= 'color:'.$content_custom_color.';';
			}
		}
		if(!empty($padding_content)){
			$c_custom_style .= 'padding-top:'.$padding_content.';';
		}
		$c_custom_style = 'style="'.$c_custom_style.'"';



		$output = '';
        if(!empty($link)){ $output .= '<a href="'.$link.'" '.$target.'>'; }

        if($icon_position=="left"){
            $output .= '<div id="'.$element_id.'" class="media '.$css_class.'">';
                if($media_type == "icon") {
					if(!empty($has_icon_bg)){
						$output .= '<div class="rounded-circle d-inline-block mr-3 feature_img '.$i_bg_color.' '.$anim_class.'" '.$anim_type.' '.$anim_delay_icon.' style="'.$i_bg_custom_color.' width:'.$icon_size_div.'px;height:'.$icon_size_div.'px;position:relative;line-height:'.$icon_size_div.'px;text-align:center;"><i style="display:inline-block;font-size:'.$icon_size.'px;line-height:'.$icon_size.'px;'.$i_custom_color.'" class="'.$i_color.' align-middle '. $icon .'"></i></div>';
					}else{
						// $output .= '<div class="mr-3 feature_img '.$anim_class.'" '.$anim_type.' '.$anim_delay_icon.' style="width:'.$icon_size_div.'px;height:'.$icon_size_div.'px;position:relative;line-height:'.$icon_size_div.'px;text-align:center;"><i style="display:inline-block;font-size:'.$icon_size.'px;line-height:'.$icon_size.'px;'.$i_custom_color.'" class="'.$i_color.' align-middle '. $icon .'"></i></div>';
						$output .= '<div class="mr-3 feature_img '.$anim_class.'" '.$anim_type.' '.$anim_delay_icon.' style="position:relative;text-align:center;"><i style="display:inline-block;font-size:'.$icon_size.'px;min-width:'.$icon_size.'px;line-height:'.$icon_size.'px;'.$i_custom_color.'" class="'.$i_color.' align-middle '. $icon .'"></i></div>';
					}
				}else if($media_type == "image") {
					$output .= '<div class="feature_img  mr-3 '.$anim_class.'" '.$anim_type.' '.$anim_delay_icon.' style="'.$size_style.'"><img style="width:'.$image_size.';height:'.$image_size.';" class="img-fluid2 pix-fit-cover '.$circle.'" src="'.$imgSrc.'" alt="'. do_shortcode($title) .'"></div>';
				}else if($media_type == "char") {
					if(!empty($has_icon_bg)){
						$output .= '<div class="rounded-circle d-inline-block mr-3 feature_img '.$i_bg_color.' '.$anim_class.'" '.$anim_type.' '.$anim_delay_icon.' style="'.$i_bg_custom_color.' width:'.$icon_size_div.'px;height:'.$icon_size_div.'px;position:relative;line-height:'.$icon_size_div.'px;text-align:center;"><span style="display:inline-block;font-size:'.$icon_size.'px;line-height:'.$icon_size.'px;'.$i_custom_color.'" class="'.$i_color.' align-middle">'. $char .'</span></div>';
					}else{
						$output .= '<div class="d-inline-block mr-3 feature_img '.$anim_class.'" '.$anim_type.' '.$anim_delay_icon.' style="width:'.$icon_size_div.'px;height:'.$icon_size_div.'px;position:relative;line-height:'.$icon_size_div.'px;text-align:center;"><span style="display:inline-block;font-size:'.$icon_size.'px;line-height:'.$icon_size.'px;'.$i_custom_color.'" class="'.$i_color.' align-middle">'. $char .'</span></div>';
					}

				}else if($media_type == "duo_icon"){
					if(!empty($pix_duo_icon)){
						if(!empty($has_icon_bg)){
							$output .= '<div class="rounded-circle mr-3 d-inline-block2 d-inline-flex align-items-center justify-content-center line-height-0 '.$i_bg_color.' '.$anim_class.'" '.$anim_type.' '.$anim_delay_icon.' style="'.$i_bg_custom_color.' width:'.$icon_size_div.'px;height:'.$icon_size_div.'px;position:relative;text-align:center;">';
								$output .= '<div class="'.$i_color.'" style="display:inline-block;width:'.$icon_size.'px;height:'.$icon_size.'px;'.$i_custom_color.'font-size:'.$icon_size.'px;">';
									$output .= pix_load_inline_svg(PIX_CORE_PLUGIN_DIR.'/functions/images/icons/'.$pix_duo_icon.'.svg');
								$output .= '</div>';
							$output .= '</div>';
						}else{
							// $output .= '<div class="mr-3 '.$i_color.' '.$anim_class.'" '.$anim_type.' '.$anim_delay_icon.' style="width:'.$icon_size_div.'px;height:'.$icon_size_div.'px;position:relative;line-height:'.$icon_size_div.'px;text-align:center;"><span style="display:inline-block;font-size:'.$icon_size.'px;line-height:'.$icon_size.'px;">';
							$output .= '<div class="mr-3 '.$i_color.' '.$anim_class.'" '.$anim_type.' '.$anim_delay_icon.' style="width:'.$icon_size_div.'px;height:'.$icon_size_div.'px;position:relative;line-height:'.$icon_size_div.'px;text-align:center;">';
								$output .= pix_load_inline_svg(PIX_CORE_PLUGIN_DIR.'/functions/images/icons/'.$pix_duo_icon.'.svg');
							$output .= '</div>';
						}

					}
				}
                $output .= '<div class="media-body">';
                    $output .= '<'.$title_tag.' class="'.$title_bold.' '.$title_italic.' '.$title_secondary_font.' '.$t_color.' '.$anim_class.' " '.$title_style.' '.$anim_type.' '.$anim_delay_title.'>'. do_shortcode($title) .'</'.$title_tag.'>';
                    $output .= '<div class="'.$c_color.' '.$content_size.' '.$content_italic.' '.$content_secondary_font.' '.$content_bold.' '.$justify.' '.$anim_class.'" '.$c_custom_style.' '.$anim_type.' '.$anim_delay_content.'>'. do_shortcode($content) .'</div>';
                $output .= '</div>';
            $output .= '</div>';
        }else{
            $output .= '<div id="'.$element_id.'" class="pix-feature-el '.$classes.' '.$css_class.'">';
				if($media_type == "duo_icon"){
					if(!empty($pix_duo_icon)){
						if(!empty($has_icon_bg)){
							$output .= '<div class="rounded-circle d-inline-block2 d-inline-flex align-items-center justify-content-center line-height-0 '.$i_bg_color.' '.$anim_class.'" '.$anim_type.' '.$anim_delay_icon.' style="'.$i_bg_custom_color.' width:'.$icon_size_div.'px;height:'.$icon_size_div.'px;position:relative;text-align:center;">';
								$output .= '<div class="'.$i_color.'" style="display:inline-block;width:'.$icon_size.'px;height:'.$icon_size.'px;'.$i_custom_color.'font-size:'.$icon_size.'px;">';
									$output .= pix_load_inline_svg(PIX_CORE_PLUGIN_DIR.'/functions/images/icons/'.$pix_duo_icon.'.svg');
								$output .= '</div>';
							$output .= '</div>';
						}else{
							$output .= '<div class="d-inline-block '.$i_color.' '.$anim_class.'" '.$anim_type.' '.$anim_delay_icon.' style="width:'.$icon_size_div.'px;height:'.$icon_size_div.'px;position:relative;line-height:'.$icon_size_div.'px;text-align:center;"><span style="display:inline-block;font-size:'.$icon_size.'px;line-height:'.$icon_size.'px;">';
									$output .= pix_load_inline_svg(PIX_CORE_PLUGIN_DIR.'/functions/images/icons/'.$pix_duo_icon.'.svg');
								$output .= '</span>';
							$output .= '</div>';
						}

					}
				}
				if($media_type == "icon") {
					if(!empty($has_icon_bg)){
						$output .= '<div class="rounded-circle d-inline-block '.$i_bg_color.' '.$anim_class.'" '.$anim_type.' '.$anim_delay_icon.' style="'.$i_bg_custom_color.' width:'.$icon_size_div.'px;height:'.$icon_size_div.'px;position:relative;line-height:'.$icon_size_div.'px;text-align:center;"><i style="display:inline-block;font-size:'.$icon_size.'px;line-height:'.$icon_size.'px;'.$i_custom_color.'" class="'.$i_color.' align-middle '. $icon .'"></i></div>';
					}else{
						// $output .= '<div class="d-inline-block '.$anim_class.'" '.$anim_type.' '.$anim_delay_icon.' style="width:'.$icon_size_div.'px;position:relative;line-height:'.$icon_size_div.'px;text-align:center;"><i style="display:inline-block;font-size:'.$icon_size.'px;line-height:'.$icon_size.'px;'.$i_color.'" class="'.$i_color.' align-middle '. $icon .'"></i></div>';
						$output .= '<div class="d-inline-block '.$anim_class.'" '.$anim_type.' '.$anim_delay_icon.' style="position:relative;text-align:center;"><i style="display:inline-block;font-size:'.$icon_size.'px;line-height:'.$icon_size.'px;'.$i_custom_color.'" class="'.$i_color.' align-middle '. $icon .'"></i></div>';
					}
				}
                if($media_type == "image") { $output .= '<div class="feature_img '.$anim_class.'" '.$anim_type.' '.$anim_delay_icon.' style="'.$size_style.'"><img style="width:'.$image_size.';height:'.$image_size.';" class="img-fluid2 pix-fit-cover2 pix-fit-contain  '.$circle.'" src="'.$imgSrc.'" alt="'. do_shortcode($title) .'"></div>'; }
				if($media_type == "char") {
					if(!empty($has_icon_bg)){
						$output .= '<div class="rounded-circle d-inline-block feature_img '.$i_bg_color.' '.$anim_class.'" '.$anim_type.' '.$anim_delay_icon.' style="'.$i_bg_custom_color.' width:'.$icon_size_div.'px;height:'.$icon_size_div.'px;position:relative;line-height:'.$icon_size_div.'px;text-align:center;"><span style="display:inline-block;font-size:'.$icon_size.'px;line-height:'.$icon_size.'px;'.$i_custom_color.'" class="'.$i_color.' align-middle">'. $char .'</span></div>';
					}else{
						// $output .= '<div class="d-inline-block '.$anim_class.'" '.$anim_type.' '.$anim_delay_icon.' style="width:'.$icon_size_div.'px;height:'.$icon_size_div.'px;position:relative;line-height:'.$icon_size_div.'px;text-align:center;"><span style="display:inline-block;font-size:'.$icon_size.'px;line-height:'.$icon_size.'px;'.$i_color.'" class="'.$i_color.' align-middle">'. $char .'</span></div>';
						$output .= '<div class="d-inline-block '.$anim_class.'" '.$anim_type.' '.$anim_delay_icon.' style="position:relative;text-align:center;"><span style="display:inline-block;font-size:'.$icon_size.'px;line-height:'.$icon_size.'px;'.$i_custom_color.'" class="'.$i_color.' align-middle">'. $char .'</span></div>';
					}

				}
                $output .= '<'.$title_tag.' class="'.$title_bold.' '.$title_italic.' '.$title_secondary_font.' '.$t_color.' '.$anim_class.'" '.$title_style.' '.$anim_type.' '.$anim_delay_title.'>'. do_shortcode($title) .'</'.$title_tag.'>';
                $output .= '<div class="'.$c_color.' '.$content_size.' '.$content_italic.' '.$content_secondary_font.' '.$content_bold.' '.$justify.' '.$anim_class.'" '.$c_custom_style.' '.$anim_type.' '.$anim_delay_content.'>'. do_shortcode($content) .'</div>';
            $output .= '</div>';
        }

        if(!empty($link)){ $output .= '</a>'; }


		return $output;
	}
}


add_shortcode( 'pix_feature', 'sc_pix_feature' );

 ?>
