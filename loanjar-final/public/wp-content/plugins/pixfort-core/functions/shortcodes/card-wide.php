<?php


/* ---------------------------------------------------------------------------
  * Card wide [sc_pix_card_wide]
  * --------------------------------------------------------------------------- */
 if( ! function_exists( 'sc_pix_card_wide' ) )
 {
 	function sc_pix_card_wide( $attr, $content = null )
 	{
 		extract(shortcode_atts(array(
 			'title' 	=> '',
 			'text' 		=> '',
 			'image' 	=> '',
 			'link_text' 	=> '',
 			'link' 	=> '',
 			'layout' 	=> 'wide_card_rightt',
 			'feature_image' 	=> '',
 			'feature_image_width' 	=> '',
      'style' 		=> '',
      'hover_effect' 		=> '',
      'add_hover_effect' 		=> '',

      'bold'		=> 'font-weight-bold',
      'italic'		=> '',
      'secondary_font'		=> '',
      'color'		=> 'heading-default',
      'custom_color'		=> '',
      'title_size'		=> 'h5',
      'title_custom_size'		=> '',
      'text_bold'		=> 'font-weight-bold',
      'text_italic'		=> '',
      'text_secondary_font'		=> '',
      'text_color'		=> 'body-default',
      'text_custom_color'		=> '',
      'text_size'		=> '',

      'animation' 	=> '',
			'delay' 	=> '0',
      'extra_classes' 		=> '',
      'css' 		=> '',
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

         if($style){ $classes .= $style_arr[$style]. ' '; }
         if($hover_effect){ $classes .= $hover_effect_arr[$hover_effect]. ' '; }
         if($add_hover_effect){ $classes .= $add_hover_effect_arr[$add_hover_effect]. ' '; }

         $title_classes = pix_get_text_format_classes($bold, $italic, $secondary_font, $color);
   		   $text_classes = pix_get_text_format_classes($text_bold, $text_italic, $text_secondary_font, $text_color);

          $text_classes .= ' ' .$text_size ;

         $title_style = '';
         $text_style = '';
         if($color=='custom'){
     			$title_style = 'color:'.$custom_color.';';
     		}
     		if($text_color=='custom'){
     			$text_style = 'style="color:'.$text_custom_color.';"';
     		}

        $title_tag = 'h6';
    		if(!empty($title_size)){
    			if($title_size == 'custom'){
    				$title_style .= 'font-size:'.$title_custom_size.';';
    			}else{
    				$title_tag = $title_size;
    			}
    		}
        	$title_style = 'style="'.$title_style.'"';

            $title = str_replace("``","\"",$title);
            $text = str_replace("``","\"",$text);

         $anim_attrs = '';
         if(!empty($animation)){
             $classes .= ' animate-in ';
             $anim_attrs = 'data-anim-delay="' . $delay .'" data-anim-type="'. $animation .'"';
         }

        $output = '';

        $output = '<div class="card overflow-hidden row no-gutters flex-column flex-md-row flex-md-row-reverse '.$classes.'" '.$anim_attrs.'>';
            $out_img = '';
            if( !empty($image) ) {
                $imgSrcset = '';
                $imgSrc = '';
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
                    if(!empty($img[0])){
                        $imgSrc = $img[0];
                    }
                }
                $out_img .= '<div class="flex-column col-md-6">';
                    $out_img .= '<img class="card-img rounded-0 pix-fit-cover flex-grow-1 h-100" src="'.$imgSrc.'" alt="'. $title .'" />';
                $out_img .= '</div>';
            }

            $out_body = '';
            $out_body .= '<div class="card-body d-flex align-content-between flex-wrap col-md-6 p-lg-5 p-md-5 p-4">';
                $out_body .= '<div class="d-flex align-items-start">';
                    $out_body .= '<div>';
                        if( !empty($feature_image) ) {
                            $imgSrc = '';
                            if(is_string($feature_image)&&substr( $feature_image, 0, 4 ) === "http"){
                				$imgSrc = $feature_image;
                			}else{
                                if(!empty($feature_image['id'])){
                                  $img = wp_get_attachment_image_src($feature_image['id'], "full");
                                  $imgSrcset = wp_get_attachment_image_srcset($feature_image['id']);
                                }else{
                                  $img = wp_get_attachment_image_src($feature_image, "full");
                                  $imgSrcset = wp_get_attachment_image_srcset($feature_image);
                                }
                                // $img = wp_get_attachment_image_src($feature_image, "full");
                                if(!empty($img[0])){
                                    $imgSrc = $img[0];
                                }
                            }
                            $fmaxwidth = '';
                            $fwidth = '';
                            if($feature_image_width){
                                $fwidth = 'max-width:'.$feature_image_width.';';
                            }
                            if(!empty($imgSrc)){
                                $out_body .= '<img class="mb-3" src="'.$imgSrc.'" alt=""  style="width:auto;'.$fwidth.'" />';    
                            }

                        }
                        $out_body .= '<'.$title_tag.' '.$title_style.' class="'.$title_classes.' mb-3">'. $title .'</'.$title_tag.'>';
                    $out_body .= '</div>';
                $out_body .= '</div>';
                $out_body .= '<div class="d-flex align-items-end">';
                    $out_body .= '<div>';
                        $out_body .= '<p class="'.$text_classes.' text-left mb-0" '.$text_style.'>'. $text .'</p>';
                    $out_body .= '</div>';
                $out_body .= '</div>';
            $out_body .= '</div>';

            if($layout=='wide_card_left'){
                $output .= $out_body;
                $output .= $out_img;
            }else{
                $output .= $out_img;
                $output .= $out_body;
            }

 		$output .= '</div>'."\n";




 		return $output;
 	}
 }

 add_shortcode( 'pix_card_wide', 'sc_pix_card_wide' );

  ?>
