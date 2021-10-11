<?php


/* ---------------------------------------------------------------------------
  * Highlight Box [pix_highlight_box]
  * --------------------------------------------------------------------------- */
 if( ! function_exists( 'sc_pix_highlight_box' ) )
 {
 	function sc_pix_highlight_box( $attr, $content = null )
 	{
 		extract(shortcode_atts(array(
 			'image' 	=> '',
 			'layout' 	=> 'wide_card_right',
            'style' 		=> '',
            'pix_infinite_animation' 		=> '',
            'pix_infinite_speed' 		=> 'pix-duration-fast',
            'hover_effect' 		=> '',
            'add_hover_effect' 		=> '',
            'rounded_img' 	=> '',
            'animation' 	=> '',
			'delay' 	=> '0',
            'content_area_css' 		=> '',
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
         $content_css_class = '';
        if(function_exists('vc_shortcode_custom_css_class')){
            $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
            $content_css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $content_area_css, ' ' ) );
        }

         $classes = ' ';
         $classes .= esc_attr( $css_class ) . ' ';

         if($style){ $classes .= $style_arr[$style]. ' '; }
         if($hover_effect){ $classes .= $hover_effect_arr[$hover_effect]. ' '; }
         if($add_hover_effect){ $classes .= $add_hover_effect_arr[$add_hover_effect]. ' '; }

         $anim_attrs = '';
         if(!empty($animation)){
             $classes .= ' animate-in ';
             $anim_attrs = 'data-anim-delay="' . $delay .'" data-anim-type="'. $animation .'"';
         }


        $output = '';
        if($layout=='wide_card_left' || $layout=='wide_card_right'){

            $output = '<div class="card '.$rounded_img.' overflow-hidden row no-gutters flex-column flex-md-row flex-md-row-reverse '.$classes.'" '.$anim_attrs.'>';
                $out_img = '';
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
                    }
                    $out_img .= '<div class="flex-column d-inline-flex position-relative col-md-6">';
                    if(empty($pix_infinite_animation)||$pix_infinite_animation==''){
                        if(pix_plugin_get_option('pix-disable-lazy-images', false)){
                            $out_img .= '<img class="card-img pix-fit-cover rounded-0 flex-grow-1 h-100" srcset="'.$imgSrcset.'" src="'.$imgSrc.'" alt="" />';
                        }else{
                            $out_img .= '<img class="pix-lazy card-img pix-fit-cover rounded-0 flex-grow-1 h-100" src="'.PIX_IMG_PLACEHOLDER .'" data-srcset="'.$imgSrcset.'" data-src="'.$imgSrc.'" loading="lazy" alt="" />';
                        }
                    }else{
                        $out_img .= '<div class="'.$pix_infinite_animation.' '.$pix_infinite_speed.' w-100 h-100" style="background-image:url('.$imgSrc.');">';
                            if(pix_plugin_get_option('pix-disable-lazy-images', false)){
                                $out_img .= '<img style="opacity:0;" class="card-img pix-fit-cover rounded-0 flex-grow-1 h-100" srcset="'.$imgSrcset.'" src="'.$imgSrc.'" alt="" />';
                            }else{
                                $out_img .= '<img style="opacity:0;" class="pix-lazy card-img pix-fit-cover rounded-0 flex-grow-1 h-100" src="'.PIX_IMG_PLACEHOLDER .'" data-srcset="'.$imgSrcset.'" data-src="'.$imgSrc.'" loading="lazy" alt="" />';
                            }
                        $out_img .= '</div>';
                    }

                    $out_img .= '</div>';
                }

                $out_body = '';
                $out_body .= '<div class="card-body d-flex2 align-content-between flex-wrap col-md-6 p-lg-5 p-md-5 p-4 '.$content_css_class.'">';
                    $out_body .= do_shortcode($content);
                $out_body .= '</div>';

                if($layout=='wide_card_left'){
                    $output .= $out_body;
                    $output .= $out_img;
                }else{
                    $output .= $out_img;
                    $output .= $out_body;
                }

     		$output .= '</div>'."\n";
        }





 		return $output;
 	}
 }

 add_shortcode( 'pix_highlight_box', 'sc_pix_highlight_box' );

  ?>
