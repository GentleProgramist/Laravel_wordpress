<?php

/* ---------------------------------------------------------------------------
 * Promo box [pix_promo_box] [/pix_promo_box]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_promo_box' ) ){

	function sc_pix_promo_box( $attr, $content = null ){
		extract(shortcode_atts(array(
			'image'  => '',
			'link_text'  => 'Check it out',
			'title'  => '',
			'badge'  => '',
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
            'style' 		=> '',
            'hover_effect' 		=> '',
            'add_hover_effect' 		=> '',
            'pix_infinite_animation' 		=> '',
            'pix_infinite_speed' 		=> '',
            'height' 		=> '300px',

			'bold'		=> 'font-weight-bold',
			'italic'		=> '',
			'secondary_font'		=> '',
			'color'		=> 'white',
			'custom_color'		=> '',
			'title_size'		=> 'h5',
			'title_custom_size'		=> '',
			'link_bold'		=> 'font-weight-bold',
			'link_italic'		=> '',
			'link_secondary_font'		=> '',
			'link_color'		=> 'light-opacity-6',
			'link_custom_color'		=> '',
			'link_size'		=> '',
			'overlay_color'		=> 'heading-default',
			'overlay_custom_color'		=> '',
			'overlay_opacity'		=> 'pix-opacity-4',
			'hover_overlay_opacity'		=> 'pix-hover-opacity-6',


			'badge_text_color'		=> 'primary',
			'badge_text_custom_color'		=> '',
			'badge_text_size'		=> 'custom',
			'badge_text_custom_size'		=> '12px',
			'badge_bold'  => 'font-weight-bold',
			'badge_italic'  => '',
			'badge_secondary_font'  => '',
			'badge_bg_color'		=> 'white',
			'badge_custom_bg_color'		=> '',
			'custom_css'	=> 'padding:5px 10px;margin-right:3px;line-height:12px;',

			'extra_classes' 		=> '',
			'css' 		=> '',
		), $attr));

		$css_class = '';
		if(function_exists('vc_shortcode_custom_css_class')){
		    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
		}
		$css_class .= ' '. $extra_classes;

		$title_classes = pix_get_text_format_classes($bold, $italic, $secondary_font, $color);
		$link_classes = pix_get_text_format_classes($link_bold, $link_italic, $link_secondary_font, $link_color);

		$link_classes .= ' '.$link_size;

		$title_style = '';
		$link_style = '';
		$el_style = '';
        if($color=='custom'){
			$title_style = 'color:'.$custom_color.' !important;';
		}
		if($link_color=='custom'){
			$link_style = 'style="color:'.$link_custom_color.' !important;"';
		}
		$title_tag = 'span';
		if(!empty($title_size)){
			if($title_size == 'custom'){
				$title_style .= 'font-size:'.$title_custom_size.';';
			}else{
				$title_tag = $title_size;
			}
		}
		$title_style = 'style="'.$title_style.'"';
		if($overlay_color=='custom'){
			$el_style = 'style="background:'.$overlay_custom_color.';"';
		}


		$badge_attrs = array(
			'text'	=> $badge,
			'text_color'		=> $badge_text_color,
			'text_custom_color'		=> $badge_text_custom_color,
			'text_size'		=> $badge_text_size,
			'text_custom_size'		=> $badge_text_custom_size,
			'bold'  => $badge_bold,
			'italic'  => $badge_italic,
			'secondary_font'  => $badge_secondary_font,
			'bg_color'		=> $badge_bg_color,
			'custom_bg_color'		=> $badge_custom_bg_color,
			'custom_css'		=> $custom_css,
		);

		$badge_out = sc_pix_badge($badge_attrs);

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

        $output = '';
		$class_names = '';


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
	            $imgSrc = $img[0];
			}
            $classes = array();
            $anim_type = '';
            $anim_delay = '';
            array_push($classes, esc_attr( $css_class ));

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
				if($align=='text-center'){
					$link_classes .= ' justify-content-center';
				}
				if($align=='text-right'){
					$link_classes .= ' justify-content-end';
				}
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
            array_push($classes, 'd-block');



            $inline_style = 'style="'.$inline_style.'"';
            $class_names = join( ' ', $classes );

            $jarallax = '';
            if($pix_scroll_parallax){
				if(!empty($xaxis) || !empty($yaxis)){
					$jarallax = 'data-jarallax-element="'. $xaxis .' '. $yaxis .'"';
				}
            }

		$output = '';

		if(!empty($pix_infinite_animation)){
			$output .= '<div class="w-100 '.$pix_infinite_animation.' '.$pix_infinite_speed.'">';
		}
		if(!empty($animation)){
            $anim_type = 'data-anim-type="'.$animation.'"';
            $anim_delay = 'data-anim-delay="'.$delay.'"';
			$output .= '<div class="animate-in d-inline-block w-100" '.$anim_type.' '.$anim_delay.'>';
        }
		if(!empty($pix_tilt)){
			$output .= '<div class="'.$pix_tilt_size.'">';
		}

		$target_out = '';
		if(!empty($target)){
			$target_out = 'target="_blank"';
		}
		$box_height = '';
		if(!empty($height)){
			$box_height = 'style="min-height:'.$height.';"';
		}

		$output .= '<div class="card w-100 h-100 bg-'.$overlay_color.'  pix-hover-item '.$rounded_img.' position-relative overflow-hidden text-white '.$class_names.'" '.$el_style.' '.$jarallax.'>
		  <img src="'.$imgSrc.'" class="card-img pix-bg-image pix-img-scale h-100 '.$rounded_img.' '.$overlay_opacity.' '.$hover_overlay_opacity.'" alt="'.$title.'">';
		  if(!empty($link)) {
			  $output .= '<a href="'.$link.'" '.$target_out.' class="card-img-overlay2 d-inline-block w-100 pix-img-overlay pix-p-20 d-flex align-items-end" '.$box_height.'>';
		  }else{
			  $output .= '<div class="card-img-overlay2 d-inline-block w-100 pix-img-overlay pix-p-20 d-flex align-items-end" '.$box_height.'>';
		  }
		  	$output .= '<div class="w-100">';
			if(!empty($badge)){ $output .= '<div class="">'.$badge_out.'</div>'; }
		    if(!empty($title)){ $output .= '<'.$title_tag.' class="card-title '.$title_classes.' pix-my-10" '.$title_style.'>'.$title.'</'.$title_tag.'>'; }
			if(!empty($link_text)){ $output .= '<span class="d-flex align-items-center '.$link_classes.'" '.$link_style.'><span>'.$link_text.'</span><i class="pixicon-angle-right pix-hover-right pix-hover-item pix-ml-10 font-weight-bold text-20"></i></span>'; }
			$output .= '</div>';
			if(!empty($link)) {
		  		$output .= '</a>';
			}else{
				$output .= '</div>';
			}
		$output .= '</div>';

		if(!empty($pix_tilt)){
			$output .= '</div>';
		}
		if(!empty($animation)){
			$output .= '</div>';
		}
		if(!empty($pix_infinite_animation)){
			$output .= '</div>';
		}

		return $output;
	}
}


add_shortcode( 'pix_promo_box', 'sc_pix_promo_box' );

 ?>
