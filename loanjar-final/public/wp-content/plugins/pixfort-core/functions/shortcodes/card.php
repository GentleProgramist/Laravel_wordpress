<?php


/* ---------------------------------------------------------------------------
  * Card [sc_pix_card]
  * --------------------------------------------------------------------------- */
 if( ! function_exists( 'sc_pix_card' ) )
 {
 	function sc_pix_card( $attr, $content = null )
 	{
 		extract(shortcode_atts(array(
 			'title' 	=> '',
 			'text' 		=> '',
 			'image' 	=> '',
 			'link_text' 	=> '',
 			'link' 	=> '',
 			'target' 	=> '',
 			'layout' 	=> 'small',
 			'feature_image' 	=> '',
            'style' 		=> '',
            'hover_effect' 		=> '',
            'add_hover_effect' 		=> '',
            'animation' 	=> '',
			'delay' 	=> '0',
            'css' 		=> '',
            'bold'		=> 'font-weight-bold',
			'italic'		=> '',
			'secondary_font'		=> '',
			'color'		=> 'heading-default',
			'custom_color'		=> '',
            'title_size'		=> 'h6',
			'title_custom_size'		=> '',
			'text_bold'		=> '',
			'text_italic'		=> '',
			'text_secondary_font'		=> '',
			'text_color'		=> 'body-default',
			'text_custom_color'		=> '',
			'text_size'		=> '',
			'link_bold'		=> 'font-weight-bold',
			'link_italic'		=> '',
			'link_secondary_font'		=> '',
			'link_color'		=> 'heading-default',
			'link_custom_color'		=> '',
			'link_size'		=> '',
			'rounded_img'		=> 'rounded-lg',
			'explicit_width_height'		=> '',
			'extra_classes'		=> '',
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
        $css_class .= ' '.$extra_classes;
         $classes = ' ';
         $classes .= esc_attr( $css_class ) . ' ';
         $classes .= esc_attr( $rounded_img ) . ' ';
         $classes .= ' overflow-hidden ';

        $title_classes = pix_get_text_format_classes($bold, $italic, $secondary_font, $color);
        $icon_classes = pix_get_text_format_classes($bold, $italic, false, $color);
  		$text_classes = pix_get_text_format_classes($text_bold, $text_italic, $text_secondary_font, $text_color);
  		$link_classes = pix_get_text_format_classes($link_bold, $link_italic, $link_secondary_font, $link_color);

        $text_classes .= ' ' .$text_size ;
        $link_classes .= ' '.$link_size;

        $title_style = '';
		$text_style = '';
		$link_style = '';

        $linkTarget = '';
        if(!empty($target)){
            $linkTarget = 'target="_blank"';
        }
    if($color=='custom'){
			$title_style = 'color:'.$custom_color.';';
		}
		if($text_color=='custom'){
			$text_style = 'style="color:'.$text_custom_color.';"';
		}
		if($link_color=='custom'){
			$link_style = 'style="color:'.$link_custom_color.';"';
		}
    $title_tag = 'div';
		if(!empty($title_size)){
			if($title_size == 'custom'){
				$title_style .= 'font-size:'.$title_custom_size.';';
			}else{
				$title_tag = $title_size;
			}
		}
		$title_style = 'style="'.$title_style.'"';

         if($style){ $classes .= $style_arr[$style]. ' '; }
         if($hover_effect){ $classes .= $hover_effect_arr[$hover_effect]. ' '; }
         if($add_hover_effect){ $classes .= $add_hover_effect_arr[$add_hover_effect]. ' '; }

         $anim_attrs = '';
         if(!empty($animation)){
             $classes .= ' animate-in ';
             $anim_attrs = 'data-anim-delay="' . $delay .'" data-anim-type="'. $animation .'"';
         }


        $output = '';
        $heightVal = '';
        $widthVal = '';

        if($layout=='small'){
            $output .= '<a '.$linkTarget.' href="'.$link.'" class=" fly">';
                $output .= '<div class="card '.$classes.'" '.$anim_attrs.'>';
                if( !empty($image) ) {
                    $imgSrcset = '';
        			if(is_string($image)&&substr( $image, 0, 4 ) === "http"){
        				$img = $image;
        				$imgSrc = $img;
        			}else{
                        if(!empty($image['id'])){
                          $img = wp_get_attachment_image_src($image['id'], "full");
                          $imgSrcset = wp_get_attachment_image_srcset($image['id']);
                        }else{
                          $img = wp_get_attachment_image_src($image, "full");
                          $imgSrcset = wp_get_attachment_image_srcset($image);
                        }
                        // $img = wp_get_attachment_image_src($image, "full");
                        $imgSrcset = wp_get_attachment_image_srcset($image);
                        $imgSrc = $img[0];
                        if(!empty($explicit_width_height)){
                            $heightVal = 'height="'. $img[1] .'"';
                            $widthVal = 'width="'. $img[2] .'"';
                        }
                    }
                    if(pix_plugin_get_option('pix-disable-lazy-images', false)){
                        $output .= '<img '.$heightVal.' '.$widthVal.' srcset="'.$imgSrcset.'" src="'.$imgSrc.'" alt="'. $title .'">';
                    }else{
                        $output .= '<img src="'.PIX_IMG_PLACEHOLDER .'" '.$heightVal.' '.$widthVal.' data-srcset="'.$imgSrcset.'" data-src="'.$imgSrc.'" class="pix-lazy" loading="lazy" alt="'. $title .'">';
                    }
                    
                }
                $output .= '<div class="card-body">';
                    $output .= '<div class="d-flex justify-content-between align-items-center '.$title_classes.'">';
                        $output .= '<'.$title_tag.' '.$title_style.' class="card-title mb-0 '.$title_classes.'">'. $title .'</'.$title_tag.'>';
                        // $output .= '<'.$title_tag.'><i class="pixicon-angle-right "></i></'.$title_tag.'>';
                        $output .= '<'.$title_tag.' '.$title_style.' class="'.$icon_classes.' pixicon-angle-right"></'.$title_tag.'>';
                    $output .= '</div>';
                  $output .= '</div>';
                $output .= '</div>';
            $output .= '</a>';
        }

        if($layout=='big_padding'){
            $output .= '<div class="pix-content-box pix-card-element bg-white2 p-4 rounded-xl '.$classes.'" '.$anim_attrs.'>';
                if( !empty($image) ) {
                    $imgSrcset = '';

        			if(is_string($image)&&substr( $image, 0, 4 ) === "http"){
        				$img = $image;
        				$imgSrc = $img;
        			}else{
                        if(!empty($image['id'])){
                          $img = wp_get_attachment_image_src($image['id'], "full");
                          $imgSrcset = wp_get_attachment_image_srcset($image['id']);
                        }else{
                            $img = wp_get_attachment_image_src($image, "full");
                            $imgSrcset = wp_get_attachment_image_srcset($image);
                        }
                        $imgSrc = $img[0];
                        if(!empty($explicit_width_height)){
                            $heightVal = 'height="'. $img[1] .'"';
                            $widthVal = 'width="'. $img[2] .'"';
                        }
                    }
                    if(!empty($link)){
                        $output .= '<a '.$linkTarget.' href="'.$link.'">';
                    }
                    if(pix_plugin_get_option('pix-disable-lazy-images', false)){
                        $output .= '<img '.$heightVal.' '.$widthVal.' srcset="'.$imgSrcset.'" src="'.$imgSrc.'" class="img-fluid '.$rounded_img.'" alt="'. $title .'">';
                    }else{
                        $output .= '<img src="'.PIX_IMG_PLACEHOLDER .'" '.$heightVal.' '.$widthVal.' data-srcset="'.$imgSrcset.'" data-src="'.$imgSrc.'" class="pix-lazy img-fluid '.$rounded_img.'" loading="lazy" alt="'. $title .'">';
                    }
                    
                    if(!empty($link)){
                        $output .= '</a>';
                    }
                }
                  $output .= '<div class="py-3">';
                    $output .= '<'.$title_tag.' '.$title_style.' class="card-title '.$title_classes.'">'. $title .'</'.$title_tag.'>';
                    $output .= '<p class="card-text '.$text_classes.'">'. $text .'</p>';
                  $output .= '</div>';
                  $output .= '<div class="card-footer text-right">';
                    $output .= '<a '.$linkTarget.' href="'.$link.'" class="d-flex align-items-center justify-content-end '.$link_classes.'"><span class="d-inline-block">'.$link_text.'</span> <i class="pixicon-angle-right ml-2"></i></a>';
                  $output .= '</div>';
                $output .= '</div>';
        }
        if($layout=='big'){
            $output .= '<div class="card pix-content-box pix-card-element bg-white2 rounded-xl '.$classes.'" '.$anim_attrs.'>';
                if( !empty($image) ) {
                    $imgSrcset = '';
        			if(is_string($image)&&substr( $image, 0, 4 ) === "http"){
        				$img = $image;
        				$imgSrc = $img;
        			}else{
                        if(!empty($image['id'])){
                          $img = wp_get_attachment_image_src($image['id'], "full");
                          $imgSrcset = wp_get_attachment_image_srcset($image['id']);
                        }else{
                            $img = wp_get_attachment_image_src($image, "full");
                            $imgSrcset = wp_get_attachment_image_srcset($image);
                        }
                        $imgSrc = $img[0];
                        if(!empty($explicit_width_height)){
                            $heightVal = 'height="'. $img[1] .'"';
                            $widthVal = 'width="'. $img[2] .'"';
                        }
                    }
                    if(!empty($link)){
                        $output .= '<a '.$linkTarget.' href="'.$link.'">';
                    }
                    if(pix_plugin_get_option('pix-disable-lazy-images', false)){
                        $output .= '<img '.$heightVal.' '.$widthVal.' srcset="'.$imgSrcset.'" src="'.$imgSrc.'" alt="'. $title .'">';
                    }else{
                        $output .= '<img src="'.PIX_IMG_PLACEHOLDER .'" '.$heightVal.' '.$widthVal.' data-srcset="'.$imgSrcset.'" data-src="'.$imgSrc.'" class="pix-lazy" loading="lazy" alt="'. $title .'">';
                    }
                    if(!empty($link)){
                        $output .= '</a>';
                    }
                }
                  $output .= '<div class="card-body py-3">';
                    $output .= '<'.$title_tag.' '.$title_style.' class="card-title '.$title_classes.'">'. $title .'</'.$title_tag.'>';
                    $output .= '<p class="card-text '.$text_classes.'">'. $text .'</p>';
                  $output .= '</div>';
                  $output .= '<div class="card-footer text-right">';
                    $output .= '<a '.$linkTarget.' href="'.$link.'" class="d-flex align-items-center justify-content-end '.$link_classes.'"><span class="d-inline-block">'.$link_text.'</span><i class="pixicon-angle-right ml-2"></i></a>';
                  $output .= '</div>';
                $output .= '</div>';
        }



 		return $output;
 	}
 }

 add_shortcode( 'pix_card', 'sc_pix_card' );

  ?>
