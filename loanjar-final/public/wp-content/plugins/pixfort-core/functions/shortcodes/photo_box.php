<?php

/* ---------------------------------------------------------------------------
  * pix_photo_box [pix_photo_box]
  * --------------------------------------------------------------------------- */
 if( ! function_exists( 'sc_pix_photo_box' ) )
 {
    function sc_pix_photo_box( $attr, $content = null )
    {
        extract(shortcode_atts(array(
            'image'  => '',
			'title'  => '',
			'badge'  => '',
			'rounded_img'  => 'rounded-0',
			'pix_color_effect'  => '',
			'pix_title_effect'  => '',
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
			'height' 		=> '400px',
            'bold'		=> 'font-weight-bold',
			'italic'		=> '',
			'secondary_font'		=> '',
            'title_color'		=> 'heading-default',
			'title_custom_color'		=> '',
			'title_size'		=> 'h5',
			'title_custom_size'		=> '',
			'css' 		=> '',
        ), $attr));


        $css_class = '';
        if(function_exists('vc_shortcode_custom_css_class')){
            $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
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

        $output = '';
		$class_names = '';


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



            $title_classes = array();
            if(!empty($bold)) array_push($title_classes, $bold );
    		if(!empty($italic)) array_push($title_classes, $italic );
    		if(!empty($secondary_font)) array_push($title_classes, $secondary_font );

            $t_tag = 'h5';
            $t_custom = '';
            if(!empty($title_size)){
                if($title_size=='custom'){
                    $t_custom .= 'font-size:'.$title_custom_size.';';
                }else{
                    $t_tag = $title_size;
                }

            }
            $t_custom_color = '';
            if(!empty($title_color)){
               if($title_color=='custom'){
                   $t_custom .= 'color:'.$title_custom_color.' !important;';
               }
            }
            $t_custom = 'style="'.$t_custom.'"';


            $inline_style = 'style="'.$inline_style.'"';
            $class_names = join( ' ', $classes );
            $title_class_names = join( ' ', $title_classes );

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
        $color_effect = '';
        if(!empty($pix_color_effect)){
            $color_effect = 'pix-hover-colored';
        }
        $title_effect = '';
        if(!empty($pix_title_effect)){
            $title_effect = 'pix-fade-in';
        }


		$output .= '<div class="card w-100 h-100 bg-heading-default bg-transparent '.$class_names.' pix-hover-item rounded-lg position-relative overflow-hidden text-white '.$class_names.'" '.$anim_type.' '.$anim_delay.' '.$jarallax.'>';
        if(pix_plugin_get_option('pix-disable-lazy-images', false)){
            $output .= '<img srcset="'.$imgSrcset.'" src="'.$imgSrc.'" class="card-img pix-bg-image h-100 pix-img-scale pix-opacity-10 '.$color_effect.'" alt="'.$title.'">';
        }else{
            $output .= '<img src="'.PIX_IMG_PLACEHOLDER .'" data-srcset="'.$imgSrcset.'" data-src="'.$imgSrc.'" class="pix-lazy card-img pix-bg-image h-100 pix-img-scale pix-opacity-10 '.$color_effect.'" loading="lazy" alt="'.$title.'">';
        }
        if(!empty($link)) {
            $output .= '<a href="'.$link.'" '.$target_out.' class="card-img-overlay2 d-inline-block w-100 pix-img-overlay pix-p-10 d-flex align-items-end" '.$box_height.'>';
        }else{
            $output .= '<span class="card-img-overlay2 d-inline-block w-100 pix-img-overlay pix-p-10 d-flex align-items-end" '.$box_height.'>';
        }
        
            $output .= '<div class="w-100">';
		    if(!empty($title)){
                $output .= '<div class="card-content-box pix-p-20 rounded-lg w-100 shadow '.$title_effect.' bg-white d-flex justify-content-between align-items-center">';
                    $output .= '<'.$t_tag.' class="card-title '.$title_class_names.'  text-'.$title_color.' m-0 w-100" '.$t_custom.'>'.$title.'</'.$t_tag.'>';
                    $output .= '<'.$t_tag.' class="pixicon-angle-right text-'.$title_color.' font-weight-bold" '.$t_custom.'></'.$t_tag.'>';
                $output .= '</div>';
            }

			$output .= '</div>';
        if(!empty($link)) {
		  $output .= '</a>';
        } else {
            $output .= '</span>';
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

 add_shortcode('pix_photo_box', 'sc_pix_photo_box');

  ?>
