<?php


/* ---------------------------------------------------------------------------
* Image [pix_img_box] [/pix_img_box]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_img_box' ) ){

	function sc_pix_img_box( $attr, $content = null ){
		extract(shortcode_atts(array(
			'image'  => '',
			'title'  => '',
			'rounded_img'  => 'rounded-lg',
			'alt'  => '',
			'align'  => 'text-left',
			'width' 	=> '',
			'height' 	=> '',
			'pix_scroll_parallax' 	=> '',
			'pix_tilt' 	=> '',
			'pix_tilt_size' 	=> 'tilt',
			'xaxis' 	=> '',
			'yaxis' 	=> '',
			'link' 	=> '',
			'target' 	=> '',
			'animation' 	=> '',
			'delay' 	=> '0',
			'extra_classes' 	=> '',
			'style' 		=> '',
			'hover_effect' 		=> '',
			'add_hover_effect' 		=> '',
			'pix_infinite_animation' 		=> '',
			'pix_infinite_speed' 		=> '',
			'bold'		=> 'font-weight-bold',
			'italic'		=> '',
			'secondary_font'		=> '',
			'color'		=> 'white',
			'custom_color'		=> '',
			'title_size'		=> 'h4',
			'title_custom_size'		=> '',
			'text_bold'		=> '',
			'text_italic'		=> '',
			'text_secondary_font'		=> '',
			'text_color'		=> 'light-opacity-6',
			'text_custom_color'		=> '',
			'text'		=> '',
			'content_size'		=> '',
			'overlay_color'		=> 'black',
			'overlay_custom_color'		=> '',
			'overlay_opacity'		=> 'pix-hover-opacity-7',
			'css' 		=> '',
		), $attr));

		$css_class = '';
		if(function_exists('vc_shortcode_custom_css_class')){
			$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
		}
		if(!$content && !empty($text)) {
			$content = $text;
		}
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

		$title_classes = pix_get_text_format_classes($bold, $italic, $secondary_font, $color);
		$text_classes = pix_get_text_format_classes($text_bold, $text_italic, $text_secondary_font, $text_color);
		$text_classes .= ' '.$content_size;

		$title_style = '';
		$text_style = '';
		$el_style = '';
		if($color=='custom'){
			$title_style = 'color:'.$custom_color.';';
		}
		if($text_color=='custom'){
			$text_style = 'style="color:'.$text_custom_color.';"';
		}
		if($overlay_color=='custom'){
			$el_style = 'style="background:'.$overlay_custom_color.';"';
		}
		$output = '';
		if(!empty($image)){
			$imgSrcset = '';
			if(is_string($image)&&substr( $image, 0, 4 ) === "http"){
				$imgSrc = $image;
			}else{
				if(!empty($image['id'])){
				  $img = wp_get_attachment_image_src($image['id'], "full");
				  $imgSrcset = wp_get_attachment_image_srcset($image['id']);
				}else{
				  $img = wp_get_attachment_image_src($image, "full");
				  $imgSrcset = wp_get_attachment_image_srcset($image);
				}
				// $img = wp_get_attachment_image_src($image, "full");
				$imgSrc = $img[0];
			}
			$classes = array();
			$anim_type = '';
			$anim_delay = '';
			// array_push($classes, esc_attr( $css_class ));
			array_push($classes, esc_attr( $extra_classes ));

			if($style){
				array_push($classes, $style_arr[$style]);
			}
			if($hover_effect){
				array_push($classes, $hover_effect_arr[$hover_effect]);
			}
			if($add_hover_effect){
				array_push($classes, $add_hover_effect_arr[$add_hover_effect]);
			}

			if(!empty($align)){
				array_push($classes, $align);
				array_push($classes, "w-100");
			}
			$inline_style = '';
			if(!empty($width)){
				$inline_style .= 'max-width:'.$width.';';
			}else{
				if(!empty($height)){
					$inline_style .= 'width:auto;';
				}
			}
			if(!empty($height)){
				$inline_style .= 'max-height:'.$height.';';
			}else{
				$inline_style .= 'height:auto;';
			}
			array_push($classes, 'd-inline-block');



			$inline_style = 'style="'.$inline_style.'"';
			$class_names = join( ' ', $classes );

			$jarallax = '';
			if($pix_scroll_parallax){
				if(!empty($xaxis) || !empty($yaxis)){
					$jarallax = 'data-jarallax-element="'. $xaxis .' '. $yaxis .'"';
				}
			}

			if(!empty($animation)){
				$anim_type = 'data-anim-type="'.$animation.'"';
				$anim_delay = 'data-anim-delay="'.$delay.'"';
				array_push($classes, 'animate-in');
			}

			if($link){
				$ntab = '';
				if(!empty($target)){
					$ntab = 'target="_blank"';
				}
				if(!empty($pix_infinite_animation)){
					$output .= '<div class="'.$pix_infinite_animation.' '.$pix_infinite_speed.'">';
				}
				if(!empty($animation)){
					$anim_type = 'data-anim-type="'.$animation.'"';
					$anim_delay = 'data-anim-delay="'.$delay.'"';
					$output .= '<div class="animate-in d-inline-block" '.$anim_type.' '.$anim_delay.'>';
				}
				if(!empty($pix_tilt)){
					$output .= '<div class="'.$pix_tilt_size.'">';
				}
				$output .= '<a href="'.$link.'" '.$ntab.' class="'.$class_names.' '.$rounded_img.'" '.$anim_type.' '.$anim_delay.' '.$jarallax.'>';
				$output .= '<img class="card-img '.$rounded_img.' h-100" src="'.$imgSrc.'" alt="'. $alt .'" '.$inline_style.'/>';
				$output .= '</a>';
				if(!empty($pix_tilt)){
					$output .= '</div>';
				}
				if(!empty($animation)){
					$output .= '</div>';
				}
				if(!empty($pix_infinite_animation)){
					$output .= '</div>';
				}
			}else{
				if(!empty($pix_infinite_animation)){
					$output .= '<div class="'.$pix_infinite_animation.' '.$pix_infinite_speed.'">';
				}
				if(!empty($animation)){
					$anim_type = 'data-anim-type="'.$animation.'"';
					$anim_delay = 'data-anim-delay="'.$delay.'"';
					array_push($classes, 'animate-in');
					$output .= '<div class="animate-in d-inline-block" '.$anim_type.' '.$anim_delay.'>';
				}
				if(!empty($pix_tilt)){
					$output .= '<div class="'.$pix_tilt_size.'">';
				}


				if(!empty($pix_tilt)){
					$output .= '</div>';
				}
				if(!empty($animation)){
					$output .= '</div>';
				}
				if(!empty($pix_infinite_animation)){
					$output .= '</div>';
				}

			}


		}


		$title_tag = $title_size;
		$t_size_style = '';
		if($title_size == 'custom'){
			$title_tag = "h4";
			$title_style .= "font-size:". $title_custom_size .';';
		}
		$title_style = 'style="'.$title_style.'"';

		$class_names = '';
		if(is_array($classes)){
			$class_names = join( ' ', $classes );
		}

		$output = '';
		if(!empty($pix_tilt)){
			$output .= '<div class="position-relative '.$pix_tilt_size.'">';
		}

		if(!empty($link)){
			$output .= '<a href="'.$link.'" '.$ntab.' '.$jarallax.'>';

		}


		$output .= '<div class="item-inner pix-img-box '.$class_names.' '.$css_class.' w-100 h-1002 bg-'.$overlay_color.' shadow2 pix-hover-item mb-32  '.$rounded_img.' position-relative overflow-hidden" '.$el_style.' '.$anim_type.' '.$anim_delay.'>
		<img class="pix-bg-image pix-img-scale '.$overlay_opacity.'" src="'.$imgSrc.'" alt="">

		<div class="pix-img-overlay pix-p-30 w-100">
		<div class="slide-in-container d-inline-block "><'.$title_tag.' class="'.$title_classes.' pix-slide-up" '.$title_style.'>'.$title.'</'.$title_tag.'></div>
		<div class="slide-in-container d-inline-block w-100"><p class="'.$text_classes.' mb-0 pix-fade-in" '.$text_style.'>'.$content.'</p></div>
		</div>
		</div>';
		if(!empty($link)){
			$output .= '</a>';
		}
		if(!empty($pix_tilt)){
			$output .= '</div>';
		}
		return $output;
	}
}


add_shortcode( 'pix_img_box', 'sc_pix_img_box' );

?>
