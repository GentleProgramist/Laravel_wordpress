<?php

/* ---------------------------------------------------------------------------
 * Content box [content_box]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_content_box' ) ){

   function sc_content_box( $attr, $content = null ){

       extract(shortcode_atts(array(
           'style' 		=> '',
           'hover_effect' 		=> '',
           'add_hover_effect' 		=> '',
           'text_color' 		=> '',
           'rounded_box' 		=> 'rounded-lg',
           'pix_bg_gradient_hover' 		=> '',
           'pix_particles_check' => '',
           'pix_particles' => '',
           'particles_top_index' => '',
           'animation'		=> '',
           'delay'		=> '0',
           'css' => '',
           'responsive_css' => '',
           'overflow' 		=> '',
           'full_height' 		=> '',
           'sticky_top' 		=> '',
           'content_align' 		=> '',
           'content_inline' 		=> '',
           'el_class' 		=> '',
           'items_bg_color' 		=> '',
           'items_custom_bg_color' 		=> '',
           'pix_scale_in' 		=> '',
           'pix_overlay_color' 		=> '',
           'pix_overlay_custom_color' 		=> '',
           'pix_overlay_opacity' 		=> '',
       ), $attr));


       $css_class = '';
        if(function_exists('vc_shortcode_custom_css_class')){
            $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
        }
        $css_class .= ' '. pix_responsive_css_class($responsive_css) .' ';


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


       $box_class = 'pix-box';
       if($style=="inverse"){
           $box_class = 'pix-box-inverse';
       }

       $classes = ' ';
       $classes .= esc_attr( $css_class ) . ' ';
       $classes .= $text_color . ' ';
       $classes .= $rounded_box . ' ';

       if($style){ $classes .= $style_arr[$style]. ' '; }
       if($hover_effect){ $classes .= $hover_effect_arr[$hover_effect]. ' '; }
       if($add_hover_effect){ $classes .= $add_hover_effect_arr[$add_hover_effect]. ' '; }
       if($pix_bg_gradient_hover){ $classes .= 'pix-hover-item pix-dark-hover '; }

       $anim_type = '';
       $anim_delay = '';
       if(!empty($animation)){
           $classes .= 'animate-in ';
           $anim_type = 'data-anim-type="'.$animation.'"';
           $anim_delay = 'data-anim-delay="'.$delay.'"';
       }

       $classes .= 'bg-'.$items_bg_color;
       $el_style = '';
       if($items_bg_color=='custom'){
           $el_style = 'style="background:'.$items_custom_bg_color.'"';
       }

       if(!empty($content_align)){
           $classes .= ' '.$content_align .' ';
       }
       $box_size = 'w-100';
       $box_inner = '';
       if($content_inline){
           $box_size = ' d-sm-inline-flex';
           $box_inner = 'd-sm-inline-flex';
       }

       $particles_out = '';
       $p_mouse = '';
       $p_scroll = '';
       $p_fixed = '';
       if(!empty($pix_particles_check)){
           $particles = [];
           if(function_exists('vc_param_group_parse_atts')){
               $particles = vc_param_group_parse_atts( $pix_particles );
           }

       	foreach ($particles as $key => $value) {

       		if( !empty($value['image']) ) {
       			$w_style = '';
       			if( !empty($value['img_width']) ) {
       				$w_style .= 'width:'.$value['img_width'].';height:auto;';
       			}

                $imgSrc = '';
    			if(is_string($value['image'])&&substr($value['image'], 0, 4 ) === "http"){
    				$imgSrc = $value['image'];
    			}else{
                    $img = wp_get_attachment_image_src($value['image'], "full");
           			$imgSrc = $img[0];
                }

       			$w_style .= $value['v_position'].': '.$value['vertical'].';'.$value['h_position'].': '.$value['horizontal'].'; ';
       			$w_style = 'style="'.$w_style.'"';



       			if(!empty($value['pix_particles_type_2'])){
       				$particles_out .= '<div data-depth="'.$value['depth'].'" data-relative-input="true" class="pix-scene-particle">';
       			}else{
       				$particles_out .= '<div class="pix-scene-particle">';
       			}
       				if(!empty($value['animation'])){
       					$particles_out .= '<div class="animate-in" data-anim-type="'.$value['animation'].'" data-anim-delay="'.$value['delay'].'">';
       				}else{
       					$particles_out .= '<div class="">';
       				}

                    $mobile_res = '';
        			if(!empty($value['hide'])){
        				$mobile_res .= ' pix-particle-sm-hide';
        			}
       					$particles_out .= '<div class="pix-scene-elm-res '.$mobile_res.'">';
       						$extra_classes = '';
       						if(!empty($value['pix_infinite_animation'])){
       							$extra_classes .= $value['pix_infinite_animation'] .' '. $value['pix_infinite_speed'];
       						}
                            $speed = '';
       						if(!empty($value['pix_particles_type_3'])){
       							$extra_classes .=  ' pix-rotate-scroll ';
                                if(!empty($value['pix_inverse_rotation'])){
                                    $speed = 'data-speed="-'.$value['rotation_speed'].'"';
                                }else{
                                    if(!empty($value['rotation_speed'])){
                                        $speed = 'data-speed="'.$value['rotation_speed'].'"';
                                    }
                                }
       						}
       						if(!empty($value['pix_particles_type'])){
       							$particles_out .= '<img '.$w_style.' alt="Particle element" src="'.$imgSrc.'" data-jarallax-element="'.$value['xaxis'] .' '. $value['yaxis'].'" class="img-fluid pix-scene-elm '.$extra_classes.'" '.$speed.'>';
       						}else{
       							$particles_out .= '<img '.$w_style.' alt="Particle element" src="'.$imgSrc.'" class="img-fluid pix-scene-elm '.$extra_classes.'" '.$speed.'>';
       						}
       					$particles_out .= '</div>';

       				$particles_out .= '</div>';

       			$particles_out .= '</div>';

       		}

       	}
       }
       if(!empty($sticky_top)) $sticky_top .= ' pix-sticky-top-adjust';

       $output = '<div class="pix-content-box card '.$pix_scale_in.' '.$full_height.' '.$sticky_top.' '. $classes .' '.$box_size.' '.$overflow.' '.$el_class.'" '.$el_style.' '.$anim_type.' '.$anim_delay.'>';
            if($pix_bg_gradient_hover){
                $output .= '<div class="pix-hover-gradient-primary w-100 h-100 position-absolute d-inline-block" style="z-index:0;top:0;left:0;"></div>';
            }
            if(!empty($pix_overlay_color)){
            	if($pix_overlay_color != ''){
            		if($pix_overlay_color=='custom'){
            			$output .= '<div class="pix_element_overlay '.$rounded_box.'" style="pointer-events:none;background:'.$pix_overlay_custom_color.';position:absolute;width:100%;height:100%;top:0;left:0;opacity:'.$pix_overlay_opacity.';"></div>';
            		}else{
            			$output .= '<div class="pix_element_overlay '.$rounded_box.' bg-'.$pix_overlay_color.'" style="pointer-events:none;;position:absolute;width:100%;height:100%;top:0;left:0;opacity:'.$pix_overlay_opacity.';"></div>';
            		}
            	}
            }
            if(!empty($particles)){
                $output .= '<div class="scene scene-over">';
                     $output .= $particles_out;
                $output .= '</div>';
            }
            $c_index = 'style="z-index:30;position:relative;"';
            if(!empty($particles_top_index)){
               $c_index = 'style="z-index:0;"';
            }
           // $output .= '<div class="'.$content_float.'" '.$c_index.'>';
           $output .= '<div class="'.$box_inner.'" '.$c_index.'>';
           $output .= do_shortcode($content);
           $output .= '</div>';
       $output .= '</div>';

       return $output;
   }
}

add_shortcode('content_box', 'sc_content_box');

 ?>
