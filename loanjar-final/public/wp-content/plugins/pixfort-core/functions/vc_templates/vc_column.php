<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_id
 * @var $el_class
 * @var $width
 * @var $css
 * @var $offset
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column
 */
$el_class = $el_id = $width = $parallax_speed_bg = $parallax_speed_video = $parallax = $parallax_image = $video_bg = $video_bg_url = $video_bg_parallax = $css = $offset = $css_animation = '';
$output = '';
$responsive_css = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

// wp_enqueue_script( 'wpb_composer_front_js' );

$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );


$responsive_css_class = pix_responsive_css_class($responsive_css);



$css_classes = array(
	$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
	'wpb_column',
	'vc_column_container',
	$width,
);

if ( vc_shortcode_custom_css_has_property( $css, array(
		'border',
		'background',
	) ) || $video_bg || $parallax
) {
	$css_classes[] = 'vc_col-has-fill';
}

$wrapper_attributes = array();

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_speed = $parallax_speed_video;
	$parallax_image = $video_bg_url;
	$css_classes[] = 'vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $pix_dark_mode ) ) {
	$css_classes[] = 'pix-dark';
}

if ( ! empty( $parallax ) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
	if ( false !== strpos( $parallax, 'fade' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fade';
		$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
	} elseif ( false !== strpos( $parallax, 'fixed' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fixed';
	}
}

if ( ! empty( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}


$particles_out = '';
$p_mouse = '';
$p_scroll = '';
$p_fixed = '';
if(!empty($pix_particles_check)){
	$particles = array();
	if(function_exists('vc_param_group_parse_atts')){
		$particles = vc_param_group_parse_atts( $pix_particles );
	}

	foreach ($particles as $key => $value) {

		if( !empty($value['image']) ) {
			$w_style = '';
			if( !empty($value['img_width']) ) {
				$w_style .= 'width:'.$value['img_width'].';height:auto;';
			}

			if(is_string($value['image'])&&substr( $value['image'], 0, 4 ) === "http"){
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
						$particles_out .= '<img '.$w_style.' src="'.$imgSrc.'" alt="Particle element" data-jarallax-element="'.$value['xaxis'] .' '. $value['yaxis'].'" class="img-fluid pix-scene-elm '.$extra_classes.'" '.$speed.'>';
					}else{
						$particles_out .= '<img '.$w_style.' src="'.$imgSrc.'" alt="Particle element" class="img-fluid pix-scene-elm '.$extra_classes.'" '.$speed.'>';
					}
				$particles_out .= '</div>';

			$particles_out .= '</div>';

		$particles_out .= '</div>';

		}


		// switch ($value['pix_particles_type']) {
		// 	case 'mouse_parallax':
		// 		if( !empty($value['image']) ) {
		// 			$w_style = '';
		// 			if( !empty($value['img_width']) ) {
		// 				$w_style = 'style="width:'.$value['img_width'].';height:auto;"';
		// 			}
		// 			$img = wp_get_attachment_image_src($value['image'], "full");
		// 			$imgSrc = $img[0];
		// 			// $p_mouse .= ' <div data-depth="'.$value['depth'].'" style="position:relative:width:100%;height:100%;" ><img style="'.$value['v_position'].': '.$value['vertical'].';'.$value['h_position'].': '.$value['horizontal'].';position:absolute;display:block;" src="'.$imgSrc.'" /></div>';
		// 			$p_mouse .= ' <div data-depth="'.$value['depth'].'" style="position:absolute:width:100%;height:100%;" ><img style="'.$value['v_position'].': '.$value['vertical'].';'.$value['h_position'].': '.$value['horizontal'].';position:absolute;display:block;" src="'.$imgSrc.'" /></div>';
		// 			// $p_mouse .= ' <img data-depth="0.2" style="'.$value['v_position'].': '.$value['vertical'].';'.$value['h_position'].': '.$value['horizontal'].';position:absolute;display:block;" src="'.$imgSrc.'" />';
		// 		}
		// 		break;
		// 	case 'scroll_parallax':
		// 		if( !empty($value['image']) ) {
		// 			$w_style = '';
		// 			if( !empty($value['img_width']) ) {
		// 				$w_style = 'style="width:'.$value['img_width'].';height:auto;"';
		// 				// $w_style = 'style="width:'.$value['img_width'].';height:auto;display:block;margin:0;padding:0; "';
		// 				// $w_style = 'style=""';
		// 			}
		// 			$img = wp_get_attachment_image_src($value['image'], "full");
		// 			$imgSrc = $img[0];
		// 			$div_style = $value['v_position'].': '.$value['vertical'].';'.$value['h_position'].': '.$value['horizontal'].';position:absolute;display: block; ';
		// 			$p_scroll .= ' <div class="jarallax-elm jarallax-elm-slow" data-jarallax-element="'.$value['xaxis'] .' '. $value['yaxis'].'" style="'.$div_style.'"><img '.$w_style.' src="'.$imgSrc.'" /></div>';
		// 			// $p_scroll .= '<img '.$w_style.' data-jarallax-element="'.$value['xaxis'] .' '. $value['yaxis'].'" src="'.$imgSrc.'" />';
		// 			// $p_scroll .= '<div data-jarallax-element="'.$value['xaxis'] .' '. $value['yaxis'].'" style="position:absolute;'.$value['v_position'].': '.$value['vertical'].';'.$value['h_position'].': '.$value['horizontal'].';width:'.$value['img_width'].';height:auto;"> <div class="position:relative;display:inline-block;"> <img '.$w_style.' src="'.$imgSrc.'" /></div></div>';
		// 		}
		// 		break;
		//
		// 	default:
		// 		// code...
		// 		break;
		// }

	}
}





$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
if(!empty($content_align)){ $css_class .= ' '.$content_align; }
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';





if(!empty($pix_particles_check)){
	$output .= '<div class="particles-wrapper2">';
        $output .= '<div class="particles-container2">';
			$output .= '<div class="scene">';
				$output .= $particles_out;
			$output .= '</div>';
			// $output .= $p_scroll;

        $output .= '</div>';
    $output .= '</div>';
}



$innerColumnClass = 'vc_column-inner ' . esc_attr( trim($responsive_css_class)) .' '. esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) );
$output .= '<div class="' . trim( $innerColumnClass ) . '">';

if(!empty($pix_overlay_color)){
	if($pix_overlay_color != ''){
		if($pix_overlay_color=='custom'){
			$output .= '<div class="pix_element_overlay" style="pointer-events:none;background:'.$pix_overlay_custom_color.';position:absolute;width:100%;height:100%;top:0;left:0;opacity:'.$pix_overlay_opacity.';"></div>';
		}else{
			$ol_class = '';
			$ol_op = '';
			$output .= '<div class="pix_element_overlay bg-'.$pix_overlay_color.'" style="pointer-events:none;position:absolute;width:100%;height:100%;top:0;left:0;opacity:'.$pix_overlay_opacity.';"></div>';
		}
	}
}


$output .= '<div class="wpb_wrapper">';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';

echo $output;
