<?php

/* ---------------------------------------------------------------------------
  * Fancy_box [fancy_box]
  * --------------------------------------------------------------------------- */
 if( ! function_exists( 'sc_fancy_box' ) )
 {
    function sc_fancy_box( $attr, $content = null )
    {
        extract(shortcode_atts(array(
            'title' 		=> '',
            'text' 		=> '',
            'link' 		=> '#',
            'target' 		=> '',
            'bg_img' 		=> '',
            'alt' 		=> '',
            'position'      => 'bottom',
            'bold'		=> 'font-weight-bold',
			'italic'		=> '',
			'secondary_font'		=> '',
			'title_color'		=> '',
			'title_custom_color'		=> '',
			'title_size'		=> 'h2',
			'title_custom_size'		=> '',
            'content_bold'		=> '',
            'content_color'		=> 'dark-opacity-5',
			'content_custom_color'		=> '',
			'content_size'		=> '',
			'overlay_color'		=> 'light-opacity-8',
			'overlay_custom_color'		=> '',
			'enable_blur'		=> '',
            'animation' 	=> '',
			'delay' 	=> '0',
            'style' 		=> '',
            'hover_effect' 		=> '',
            'add_hover_effect' 		=> '',
            'css'   => ''
        ), $attr));

        $classes = array();
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

         $el_classes = ' ';
         $el_classes .= esc_attr( $css_class ) . ' ';

         if($style){ $el_classes .= $style_arr[$style]. ' '; }
         if($hover_effect){ $el_classes .= $hover_effect_arr[$hover_effect]. ' '; }
         if($add_hover_effect){ $el_classes .= $add_hover_effect_arr[$add_hover_effect]. ' '; }

         $anim_type = '';
         $anim_delay = '';
         if(!empty($animation)){
             $anim_type = 'data-anim-type="'.$animation.'"';
             $anim_delay = 'data-anim-delay="'.$delay.'"';
             $el_classes .= ' animate-in';
         }



        $t_custom_color = '';
		if(!empty($title_color)){
			if($title_color!='custom'){
				array_push($classes, 'text-'.$title_color );
			}else{
				$t_custom_color = 'color:'.$title_custom_color.' !important;';
			}
		}

        if(!empty($bold)) array_push($classes, $bold );
		if(!empty($italic)) array_push($classes, $italic );
		if(!empty($secondary_font)) array_push($classes, $secondary_font );
        array_push($classes, 'mb-0' );

        $title_tag = $title_size;
		$t_size_style = '';
		if($title_size == 'custom'){
			$title_tag = "h2";
			$t_size_style = "font-size:". $title_custom_size .';';
		}

        $class_names = join( ' ', $classes );
        $linkTarget = '';
        if(!empty($target)){
            $linkTarget = 'target="_blank"';
        }

        $c_color = '';
        $c_custom_color = '';
        if(!empty($content_color)){
            if($content_color!='custom'){
                $c_color = 'text-'.$content_color;
            }else{
                $c_custom_color = 'color:'.$content_custom_color.' !important;';
            }
        }

        if( $bg_img ) {
            $imgSrcset = '';
			if(is_string($bg_img)&&substr( $bg_img, 0, 4 ) === "http"){
				$imgSrc = $bg_img;
			}else{
                if(!empty($bg_img['id'])){
                  $img = wp_get_attachment_image_src($bg_img['id'], "large");
                  $imgSrcset = wp_get_attachment_image_srcset($bg_img['id']);
                }else{
                  $img = wp_get_attachment_image_src($bg_img, "large");
                  $imgSrcset = wp_get_attachment_image_srcset($bg_img);
                }
                $imgSrc = $img[0];
            }
        }
        $output = '';
        $bottom_blur = '';

        $overlay_custom_style = '';
        if(!empty($overlay_color)&&$overlay_color=='custom'){
            $overlay_custom_style = 'style="background:'.$overlay_custom_color.';"';
        }


        $output .= '<div class="card mb-3 mb-sm-0 pix-info-card '.$el_classes.'" '.$anim_type.' '.$anim_delay.'>';
             $output .= '<div class="card-inner">';
                    $output .= '<a href="'.$link.'" '.$linkTarget.'>';
                        if($position=='top'){
                            $output .= '<img class="card-img animating fade-in-Img" src="'.$imgSrc.'" alt="'.$alt.'">';
                            $output .= '<div class="card-img-overlay p-0 animating fade-in-down">';
                        }else{
                            $bottom_blur = 'bottom-blur';
                            $output .= '<div class="card-img-overlay p-0 d-flex flex-column justify-content-end animating fade-in-up">';
                        }
                           $output .= '<div class="card-img-overlay-content card-content-box bg-'.$overlay_color.' pix-p-20" '.$overlay_custom_style.'>';
                                if(!empty($enable_blur)||$enable_blur=='yes'){ $output .= '<div class="card-img-blur '.$bottom_blur.'" style="background-image:url('.$imgSrc.');"></div>'; }
                               $output .= '<h6 class="card-text '.$content_bold.' '.$c_color.' '.$content_size.' animate-in" data-anim-type="fade-in" data-anim-delay="800" style="'.$c_custom_color.'">'.$text.'</h6>';
                               $output .= '<'.$title_tag.' class="'. $class_names .' animate-in" data-anim-type="fade-in" data-anim-delay="400" style="'.$t_custom_color. $t_size_style.'">'. $title .'</'.$title_tag.'>';
                           $output .= '</div>';
                        $output .= '</div>';
                        if($position!='top'){
                            $output .= '<img class="card-img-bottom animating fade-in-Img" src="'.$imgSrc.'" alt="'.$alt.'">';
                        }
                   $output .= '</a>';
               $output .= '</div>';
         $output .= '</div>';

        return $output;
    }
 }

 add_shortcode('fancy_box', 'sc_fancy_box');

 ?>
