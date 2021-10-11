<?php


/* ---------------------------------------------------------------------------
* Pix Icon [pix_icon] [/pix_icon]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_icon' ) ){
	function sc_pix_icon( $attr, $content = null ){
		extract(shortcode_atts(array(
			'media_type'			=> '',
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
			'content_align'	=> 'left',
			'link_type'			=> 'link',
			'link'			=> '',
			'icon_popup_id'			=> '',
			'target'		=> '',
			'embed_code'  => '',
			'aspect' 	=> 'embed-responsive-21by9',
			'style' 		=> '',
			'hover_effect' 		=> '',
			'add_hover_effect' 		=> '',
			'animation'		=> '',
			'delay'		=> '0',
			'class'			=> '',
			'el_id'			=> '',
			'css' => '',
		), $attr));


		$style_arr = array(
		   "" => "",
		   "1"       => "shadow-sm",
		   "2"       => "shadow",
		   "3"       => "shadow-lg",
		   "4"       => "shadow-inverse-sm",
		   "5"       => "shadow-inverse",
		   "6"       => "shadow-inverse-lg",
		 );

		 $hover_effect_arr = array(
			""       => "",
			"1"       => "shadow-hover-sm",
			"2"       => "shadow-hover",
			"3"       => "shadow-hover-lg",
			"4"       => "shadow-inverse-hover-sm",
			"5"       => "shadow-inverse-hover",
			"6"       => "shadow-inverse-hover-lg",
		 );

		 $add_hover_effect_arr = array(
			""       => "",
			"1"       => "fly-sm",
			"2"       => "fly",
			"3"       => "fly-lg",
			"4"       => "scale-sm",
			"5"       => "scale",
			"6"       => "scale-lg",
			"7"       => "scale-inverse-sm",
			"8"       => "scale-inverse",
			"9"       => "scale-inverse-lg",
		 );


		$css_class = '';
		if(function_exists('vc_shortcode_custom_css_class')){
			$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
		}
		$css_class = esc_attr( $css_class );

		// target
		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}
		if(empty($el_id)){
			$el_id = 'duo-icon-'.rand(1,200000000);
		}

		$i_color = '';
		$i_custom_color = '';
		if(!empty($icon_color)){
			if($icon_color!='custom'){
				$i_color = 'text-'.$icon_color;
			}else{
				$i_custom_color .= 'color:'.$custom_icon_color.';';
				if($media_type == "duo_icon"){
					$customStyle = '#'. $el_id.' path, ';
					$customStyle .= '#'.$el_id.' rect, ';
					$customStyle .= '#'.$el_id.' circle, ';
					$customStyle .= '#'.$el_id.' polygon { fill: '.$custom_icon_color.' !important; }';
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

		$classes = array();
		$anim_class = '';
		$anim_type = '';
		$anim_delay_icon = '';
		if(!empty($animation)){
			array_push($classes, 'animate-in' );
			$anim_type = 'data-anim-type="'.$animation.'"';
			$anim_delay_icon = 'data-anim-delay="'.$delay.'"';
		}

		if($style){ array_push($classes, $style_arr[$style] ); }
		if($hover_effect){ array_push($classes, $hover_effect_arr[$hover_effect] ); }
		if($add_hover_effect){ array_push($classes, $add_hover_effect_arr[$add_hover_effect] ); }

		$class_names = join( ' ', $classes );

		if(!empty($has_icon_bg) && $media_type == "char"){
			$icon_size_div = $icon_size*2;
		}else{
			$icon_size_div = $icon_size*1.8;
		}


		$classes = '';
		if($content_align=='inline'){
			$classes .= 'd-inline-block';
		}else{
			$classes .= 'text-'.$content_align;
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

		if( $image ) {
			if(empty($image_size)){
				$img = wp_get_attachment_image_src($image, $size);
				$imgSrc = $img[0];
			}else{
				$img = wp_get_attachment_image_src($image, $size);
				$imgSrc = $img[0];
			}
		}


		$link_data = '';
		  $output = '';
		  $link_classes = '';

		if($link_type=='popup'){
			if(!empty($icon_popup_id)){
				$link_classes .= ' pix-popup-link';
				$nonce = wp_create_nonce("popup_nonce");
				$link = admin_url('admin-ajax.php?action=pix_popup_content&id='.$icon_popup_id.'&nonce='.$nonce);
				$link_data = 'data-popup-link="'.$link.'"';
			}
		}elseif($link_type=='video'||$link_type=='embed'){
			$res = preg_replace("/[\`]/", "", $embed_code);
			$link_data = 'data-aspect="'.$aspect.'" data-content="'.htmlspecialchars($res).'"';
			$link = '#';
			$link_classes .= ' pix-video-popup';
		}



		$output = '';
		if(!empty($link)){ $output .= '<a class="'.$classes.' '.$link_classes.'" '.$link_data.' href="'.$link.'" target="'.$target.'">'; }


			$output .= '<div id="'.$el_id.'" class="pix-icon '.$classes.' '.$css_class.'">';
			if($media_type == "icon") {
				if(!empty($has_icon_bg)){
					$output .= '<div class="rounded-circle d-inline-block feature_img '.$class_names.' '.$i_bg_color.'" '.$anim_type.' '.$anim_delay_icon.' style="'.$i_bg_custom_color.' width:'.$icon_size_div.'px;height:'.$icon_size_div.'px;position:relative;line-height:'.$icon_size_div.'px;text-align:center;"><i style="display:inline-block;font-size:'.$icon_size.'px;line-height:'.$icon_size.'px;'.$i_custom_color.'" class="'.$i_color.' align-middle '. $icon .'"></i></div>';
				}else{
					$output .= '<div class="feature_img d-inline-block '.$class_names.' '.$anim_class.'" '.$anim_type.' '.$anim_delay_icon.' style="width:'.$icon_size_div.'px;height:'.$icon_size_div.'px;position:relative;line-height:'.$icon_size_div.'px;text-align:center;"><i style="display:inline-block;font-size:'.$icon_size.'px;line-height:'.$icon_size.'px;'.$i_custom_color.'" class="'.$i_color.' align-middle '. $icon .'"></i></div>';
				}
			}
			if($media_type == "image") { $output .= '<div class="feature_img '.$class_names.'" '.$anim_type.' '.$anim_delay_icon.' style="'.$size_style.'"><img style="width:'.$image_size.';height:'.$image_size.';" class="img-fluid2 pix-fit-cover '.$circle.'" src="'.$imgSrc.'" alt="'. do_shortcode($title) .'"></div>'; }
			if($media_type == "char") {
				if(!empty($has_icon_bg)){
					$output .= '<div class="rounded-circle d-inline-block feature_img '.$i_bg_color.' '.$class_names.'" '.$anim_type.' '.$anim_delay_icon.' style="'.$i_bg_custom_color.' width:'.$icon_size_div.'px;height:'.$icon_size_div.'px;position:relative;line-height:'.$icon_size_div.'px;text-align:center;"><span style="display:inline-block;font-size:'.$icon_size.'px;line-height:'.$icon_size.'px;'.$i_custom_color.'" class="'.$i_color.' align-middle">'. $char .'</span></div>';
				}else{
					$output .= '<div class="d-inline-block feature_img '.$class_names.'" '.$anim_type.' '.$anim_delay_icon.' style="width:'.$icon_size_div.'px;height:'.$icon_size_div.'px;position:relative;line-height:'.$icon_size_div.'px;text-align:center;"><span style="display:inline-block;font-size:'.$icon_size.'px;line-height:'.$icon_size.'px;'.$i_custom_color.'" class="'.$i_color.' align-middle">'. $char .'</span></div>';
				}

			}
			if($media_type == "duo_icon"){
				if(!empty($pix_duo_icon)){
					if(!empty($has_icon_bg)){
						$output .= '<div class="rounded-circle d-inline-block2 d-inline-flex align-items-center justify-content-center line-height-0 '.$i_bg_color.' '.$class_names.'" '.$anim_type.' '.$anim_delay_icon.' style="'.$i_bg_custom_color.' width:'.$icon_size_div.'px;height:'.$icon_size_div.'px;position:relative;text-align:center;">';
						$output .= '<div class="'.$i_color.'" style="display:inline-block;width:'.$icon_size.'px;height:'.$icon_size.'px;'.$i_custom_color.';font-size:'.$icon_size.'px;">';
						$output .= pix_load_inline_svg(PIX_CORE_PLUGIN_DIR.'/functions/images/icons/'.$pix_duo_icon.'.svg');
						$output .= '</div>';
						$output .= '</div>';
					}else{
						// $output .= '<div class="mr-3 '.$i_color.' '.$anim_class.'" '.$anim_type.' '.$anim_delay_icon.' style="width:'.$icon_size_div.'px;height:'.$icon_size_div.'px;position:relative;line-height:'.$icon_size_div.'px;text-align:center;"><span style="display:inline-block;font-size:'.$icon_size.'px;line-height:'.$icon_size.'px;">';
						$output .= '<div class="mr-32 d-inline-block '.$i_color.' '.$class_names.'" '.$anim_type.' '.$anim_delay_icon.' style="width:'.$icon_size_div.'px;height:'.$icon_size_div.'px;position:relative;line-height:'.$icon_size_div.'px;text-align:center;">';
						$output .= pix_load_inline_svg(PIX_CORE_PLUGIN_DIR.'/functions/images/icons/'.$pix_duo_icon.'.svg');
						$output .= '</div>';
					}

				}
			}

			$output .= '</div>';


		if(!empty($link)){ $output .= '</a>'; }


		return $output;
	}
}


add_shortcode( 'pix_icon', 'sc_pix_icon' );

?>
