<?php

/* ---------------------------------------------------------------------------
* 3d_box [pix_3d_box]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_3d_box' ) ){
  function sc_pix_3d_box( $attr, $content = null ){
    extract(shortcode_atts(array(
      'title' 		=> '',
      'bold'		=> 'font-weight-bold',
      'italic'		=> '',
      'secondary_font'		=> '',
      'title_color'		=> '',
      'title_custom_color'		=> '',
      'title_size'		=> 'h2',
      'title_custom_size'		=> '',
      'content_color'		=> 'light-opacity-5',
      'content_custom_color'		=> '',
      'content_classes'		=> '',
      'content_size'		=> '',
      'rounded_img'		=> 'rounded-0',
      'overlay_color'		=> 'black',
	  'custom_overlay_color'		=> '',
      'overlay_opacity'		=> 'pix-opacity-3',
      'hover_overlay_opacity'		=> 'pix-hover-opacity-7',
      'text' 		=> '',
      'btn_link' 		=> '',
      'item_link' 		=> false,
      'content_align' 		=> 'left',
      'bg_img' 		=> '',
      'btn_text' 		=> '',
      'item_css' 		=> '',
      'animation'		=> '',
	  'delay'		=> '0',
	  'extra_classes'		=> '',
      'css' 		=> '',
    ), $attr));

    $classes = array();
    $css_class = '';
    if(function_exists('vc_shortcode_custom_css_class')){
      $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $item_css, ' ' ) );
    }

    $css_class .= ' '. $extra_classes;
    $t_custom_color = '';
    if(!empty($title_color)){
      if($title_color!='custom'){
        array_push($classes, 'text-'.$title_color );
      }else{
        $t_custom_color = 'color:'.$title_custom_color.' !important;';
      }
    }

    if(!empty($bold)&&$bold!='0') array_push($classes, $bold );
    if(!empty($italic)&&$italic!='0') array_push($classes, $italic );
    if(!empty($secondary_font)&&$secondary_font!='0') array_push($classes, $secondary_font );
    array_push($classes, 'mb-0' );

    $title_tag = $title_size;
    $t_size_style = '';
    if($title_size == 'custom'){
      $title_tag = "h2";
      $t_size_style = "font-size:". $title_custom_size .';';
    }

    $class_names = join( ' ', $classes );


    $c_color = '';
    $c_custom_color = '';
    if(!empty($content_color)){
      if($content_color!='custom'){
        $c_color = 'text-'.$content_color;
      }else{
        $c_custom_color = 'color:'.$content_custom_color.';';
      }
    }

    $imgSrc = '';
    $imgSrcset = '';

    if( $bg_img ) {
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

    $anim_class = '';
		$anim_type = '';
		$anim_delay_icon = '';
		if(!empty($animation)){
			$anim_class = 'animate-in';
			$anim_type = 'data-anim-type="'.$animation.'"';
			$anim_delay_icon = 'data-anim-delay="'.$delay.'"';
		}

    $custom_overlay_style = '';
    if(!empty($overlay_color)){
			if($overlay_color=='custom'){
				$custom_overlay_style .= 'style="background:'.$custom_overlay_color.';"';
			}
		}



    $output = '<div class=" mb-3 mb-md-0 '.$anim_class.'" '.$anim_type.' '.$anim_delay_icon.'>';


    $output .= '<div class="card w-100 h-100 bg-'.$overlay_color.' '.$css_class.' pix-hover-item '.$rounded_img.' position-relative overflow-hidden2 text-white tilt fancy_card" '.$custom_overlay_style.'>';
        if($bg_img){
          if(pix_plugin_get_option('pix-disable-lazy-images', false)){
            $output .= '<img srcset="'.$imgSrcset.'" src="'.$imgSrc.'" class="card-img pix-bg-image '.$rounded_img.' h-100 '.$overlay_opacity.' '.$hover_overlay_opacity.'" alt="">';
          }else{
            $output .= '<img src="'.PIX_IMG_PLACEHOLDER .'" data-srcset="'.$imgSrcset.'" data-src="'.$imgSrc.'" class="pix-lazy card-img pix-bg-image '.$rounded_img.' h-100 '.$overlay_opacity.' '.$hover_overlay_opacity.'" loading="lazy" alt="">';
          }
        }
        if($item_link){
            $output .= '<a href="'.$btn_link.'" class="card-img-overlay overflow-visible d-inline-block w-100 pix-img-overlay pix-p-20 d-flex align-items-end text-'.$content_align.'">';
        }else{
            $output .= '<div class="card-img-overlay overflow-visible d-inline-block w-100 pix-img-overlay pix-p-30 d-flex align-items-end text-'.$content_align.'">';
        }
            $output .= '<div class="w-100 '.$content_classes.'">';
                $output .= '<'.$title_tag.' class="card-title  '. $class_names .' animate-in" style="'.$t_custom_color. $t_size_style.'">'. $title .'</'.$title_tag.'>';
                $output .= '<p class="card-text pix-pt-10 '.$c_color.' '.$content_size.'" style="'.$c_custom_color.'">'.strip_shortcodes( $text ).'</p>';
                if(!empty($btn_text)){
                    $output .= '<div class="mt-4 d-inline-block w-100">';
                        $output .= sc_pix_button($attr);
                    $output .= '</div>';
                }
            $output .= '</div>';
        if($item_link){
            $output .= '</a>';
        }else{
            $output .= '</div>';
        }
    $output .= '</div>';
    $output .= '</div>';
    return $output;
  }
}

add_shortcode('pix_3d_box', 'sc_pix_3d_box');

?>
