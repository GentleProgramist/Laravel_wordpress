<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $equal_height
 * @var $columns_placement
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $parallax_speed_bg
 * @var $parallax_speed_video
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */
$el_class = $pix_visibility = $full_height = $parallax_speed_bg = $parallax_speed_video = $full_width = $equal_height = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = $css_animation = '';
$disable_element = '';
$pix_bg_grdient = $top_divider_select = $top_divider_select = $bottom_divider_select = '';
$responsive_css = '';
// $pix_particles = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

// wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

if(!empty($pix_over_visibility) && $pix_over_visibility == "2" ){
	$el_class .= ' overflow-hidden';
}elseif(! empty($pix_over_visibility) && $pix_over_visibility == "1" ){
	$el_class .= ' vc_row_visible overflow-hidden-clip';
}else{
	$el_class .= ' vc_row_visible ';
}
if( !empty($fade_in_intro)){
	$el_class .= ' pix-intro-1 ';
}

$responsive_css_class = pix_responsive_css_class($responsive_css);
if( !empty($responsive_css_class) && $responsive_css_class){
	$el_class .= ' '.$responsive_css_class. ' ';
}

$css_classes = array(
	'vc_row',
	'wpb_row',
	//deprecated
	'vc_row-fluid',
	$el_class,
	vc_shortcode_custom_css_class( $css ),
);

if(!empty($pix_relative_elem)){
	$css_classes[] = 'position-relative';
}
if(!empty($pix_scale_in)){
	$css_classes[] = $pix_scale_in;
}





if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}

if ( vc_shortcode_custom_css_has_property( $css, array(
		'border',
		'background',
	) ) || $video_bg || $parallax
) {
	$css_classes[] = 'vc_row-has-fill';
}

if ( ! empty( $atts['gap'] ) ) {
	$css_classes[] = 'vc_column-gap-' . $atts['gap'];
}

if ( ! empty( $atts['rtl_reverse'] ) ) {
	$css_classes[] = 'vc_rtl-columns-reverse';
}

$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
if ( ! empty( $full_width ) ) {
	$wrapper_attributes[] = 'data-vc-full-width="true"';
	$wrapper_attributes[] = 'data-vc-full-width-init="false"';
	if ( 'stretch_row_content' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
	} elseif ( 'stretch_row_content_no_spaces' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
		$css_classes[] = 'vc_row-no-padding';
	}
	$after_output .= '<div class="vc_row-full-width vc_clearfix"></div>';
}


if ( ! empty( $full_height ) ) {
	$css_classes[] = 'vc_row-o-full-height';
	if ( ! empty( $columns_placement ) ) {
		$flex_row = true;
		$css_classes[] = 'vc_row-o-columns-' . $columns_placement;

		if ( 'stretch' === $columns_placement ) {
			$css_classes[] = 'vc_row-o-equal-height';
		}
	}
}

if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-equal-height';
}

$pix_content_placement= '';

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-content-' . $content_placement;
	switch ($content_placement) {
		case 'middle':
			$pix_content_placement= 'd-flex align-items-center';
			break;
		case 'top':
			$pix_content_placement= 'd-flex align-items-start';
			break;
		case 'bottom':
			$pix_content_placement= 'd-flex align-items-end';
			break;
	}

}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = 'vc_row-flex';
}

if ( ! empty( $pix_dark_mode ) ) {
	$css_classes[] = 'pix-dark';
}

$css_classes[] = $pix_bg_grdient;
$has_video_bg = false;
if( ! empty( $video_bg ) && ! empty( $video_bg_url ) ){
	if(vc_extract_youtube_id( $video_bg_url )){
		$has_video_bg = vc_extract_youtube_id( $video_bg_url );
	}else{
		$has_video_bg = $video_bg_url;
		if(pix_endsWith($video_bg_url, '.mp4')){
			$video_bg_url = 'mp4:'.$video_bg_url;
			$has_video_bg = $video_bg_url;
		}
	}
}
// $has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_speed = $parallax_speed_video;
	$parallax_image = $video_bg_url;
	$css_classes[] = 'vc_video-bg-container2 jarallax-video';
	// wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if(! empty( $divider ) && $divider !=''){
	$css_classes[] = 'p-relative';
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
		$wrapper_attributes[] = 'data-pix-bg-video="' . esc_attr( $parallax_image_src ) . '"';
		// $wrapper_attributes[] = 'data-speed="0.4"';
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
		$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
	}
}
if ( ! $parallax && $has_video_bg ) {
	// $wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
	// $wrapper_attributes[] = 'data-jarallax-video="' . esc_attr( $video_bg_url ) . '"';
}
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';



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
				$img = $value['image'];
				$imgSrc = $img;
			}else{
				$img = wp_get_attachment_image_src($value['image'], "full");
				$imgSrc = $img[0];
			}
			$w_style .= $value['v_position'].': '.$value['vertical'].';'.$value['h_position'].': '.$value['horizontal'].'; ';
			$w_style = 'style="'.$w_style.'"';



			if(!empty($value['pix_particles_type_2'])){
				$particles_out .= '<div data-depth="'.$value['depth'].'" data-relative-input="true" class="pix-scene-particle">';
			}else{
				$particles_out .= '<div data-depth="0" data-relative-input="true" class="pix-scene-particle">';
			}
				if(!empty($value['animation'])){
					$particles_out .= '<div class="particles-container animate-in" data-anim-type="'.$value['animation'].'" data-anim-delay="'.$value['delay'].'">';
				}else{
					$particles_out .= '<div class="particles-container">';
				}

				$extra_classes = '';
				$rotateClass = '';
				if(!empty($value['pix_infinite_animation'])){
					if( $value['pix_infinite_animation'] == "pix-rotating" || $value['pix_infinite_animation'] == "pix-rotating-inverse" ){
						$rotateClass .= $value['pix_infinite_animation'] .' '. $value['pix_infinite_speed'] . ' ';
					}else{
						// $extra_classes .= $value['pix_infinite_animation'] .' '. $value['pix_infinite_speed'];
						$rotateClass .= $value['pix_infinite_animation'] .' '. $value['pix_infinite_speed'];
					}
				}
				$speed = '';
				$jClasses = '';

				if(!empty($value['pix_particles_type_3'])){
					// $extra_classes .=  ' pix-rotate-scroll ';
					$rotateClass .=  ' pix-rotate-scroll ';
					// $jClasses .=  ' pix-rotate-scroll ';
					if(!empty($value['pix_inverse_rotation'])){
						$speed = 'data-speed="-'.$value['rotation_speed'].'"';
					}else{
						if(!empty($value['rotation_speed'])){
							$speed = 'data-speed="'.$value['rotation_speed'].'"';
						}
					}
				}
				if(!empty($value['hide'])){
					$jClasses .= ' pix-particle-sm-hide';
				}
				$scroll_parallax_data = '';

				if(!empty($value['pix_particles_type'])){
					$scroll_parallax_data = 'data-jarallax-element="'.$value['xaxis'] .' '. $value['yaxis'].'"';
					$jClasses .= '';
				}

				// "pix-rotating"
			    // "pix-rotating-inverse"

					$particles_out .= '<div  class="w-100 h-100 position-relative pix-scene-elm-res '.$jClasses.'" '.$scroll_parallax_data.'>';
						$particles_out .= '<div class="w-100 h-100 '.$extra_classes.' " >';

							if(!empty($value['pix_particles_type'])){
								// $particles_out .= '<img loading="lazy" '.$w_style.' src="'.$imgSrc.'" alt="Particle element" data-jarallax-element="'.$value['xaxis'] .' '. $value['yaxis'].'" class="img-fluid pix-scene-elm '.$extra_classes.'" '.$speed.'>';
								$particles_out .= '<img loading="lazy" '.$w_style.' src="'.$imgSrc.'" alt="Particle element" class="img-fluid w-1002 pix-scene-elm '.$rotateClass.'" '.$speed.'>';
							}else{
								$particles_out .= '<img loading="lazy" '.$w_style.' src="'.$imgSrc.'" alt="Particle element" class="img-fluid w-1002 pix-scene-elm '.$rotateClass.'" '.$speed.'>';
								// $particles_out .= '<img loading="lazy" '.$w_style.' src="'.$imgSrc.'" alt="Particle element" class="img-fluid pix-scene-elm '.$extra_classes.'" '.$speed.'>';
							}
						$particles_out .= '</div>';
					$particles_out .= '</div>';

				$particles_out .= '</div>';

			$particles_out .= '</div>';

		}


	}
}




$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

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


if( !empty($fade_in_intro)){
	if(is_string($fade_in_intro)&&substr( $fade_in_intro, 0, 4 ) === "http"){
		$fade_in_intro_src = $fade_in_intro;
	}else{
		$fade_in_intro_id = preg_replace( '/[^\d]/', '', $fade_in_intro );
		$fade_in_intro_src = wp_get_attachment_image_src( $fade_in_intro_id, 'full' );
		if ( ! empty( $fade_in_intro_src[0] ) ) {
			$fade_in_intro_src = $fade_in_intro_src[0];
		}
	}
	// $output .= '<div class="particles-wrapper">';
	$output .= '<div class="particles-container">';
	if(!empty($fade_in_parallax) && $fade_in_parallax=='no'){
		$output .= '<div class="pix-intro-img jarallax2" data-jarallax2 data-speed2="0.8"><img loading="lazy" class="jarallax-img2 '.$fade_in_opacity.'"  src="'.$fade_in_intro_src.'" alt="" /></div>';
	}else{
		$output .= '<div class="pix-intro-img jarallax" data-jarallax data-speed="0.8"><img loading="lazy" class="jarallax-img '.$fade_in_opacity.'"  src="'.$fade_in_intro_src.'" alt="" /></div>';
	}

	// <div class="pix-intro-img jarallax pb-5"  ><img class="jarallax-img pix-opacity-9" src="images/crypto/bg-1.png" /></div>
	$output .= '</div>';
	// $output .= '</div>';
}




if(empty($top_divider_color)){ $top_divider_color = "#fff";}
if(empty($bottom_divider_color)){ $bottom_divider_color = "#fff";}

if($top_divider_select && $top_divider_select!='' && $top_divider_select!='0' && $top_divider_select!='dynamic'){
	$t_divider_opts = array(
		'd_divider_select'			=> $top_divider_select,
		'd_layers'					=> $top_layers,
		'd_1_is_gradient'			=> $t_1_is_gradient,
		'd_1_color'					=> $t_1_color,
		'd_1_color_2'				=> $t_1_color_2,
		'd_1_animation'				=> $t_1_animation,
		'd_1_delay'					=> $t_1_delay,
		'd_2_is_gradient'			=> $t_2_is_gradient,
		'd_2_color'					=> $t_2_color,
		'd_2_color_2'				=> $t_2_color_2,
		'd_2_animation'				=> $t_2_animation,
		'd_2_delay'					=> $t_2_delay,
		'd_3_is_gradient'			=> $t_3_is_gradient,
		'd_3_color'					=> $t_3_color,
		'd_3_color_2'				=> $t_3_color_2,
		'd_3_animation'				=> $t_3_animation,
		'd_3_delay'					=> $t_3_delay,
		'd_high_index'				=> $t_divider_in_front,
		'd_flip_h'					=> $t_flip_h,
	);
	// $output .= pix_get_divider($top_divider, $top_divider_color, 'top', $el_id, $top_moving_divider_color);
	$c_height = false;
	if(!empty($t_custom_height)){ $c_height = $t_custom_height;}
	$output .= pix_get_divider($top_divider_select, $top_divider_color, 'top', $el_id, $top_moving_divider_color, $t_divider_opts, $c_height);
}

if($top_divider_select && $top_divider_select=='dynamic'){
	$t_divider_opts = array(
		'd_divider_select'			=> $top_divider_select,
		'd_high_index'				=> $t_divider_in_front,
		'd_flip_h'					=> $t_flip_h,
	);
	$output .= pix_get_divider($top_divider_select, $top_divider_color, 'top', $el_id, $top_moving_divider_color, $t_divider_opts);
}




if(!empty($pix_particles_check)){
	// $output .= '<div class="particles-wrapper " style="z-index:2;">';
		$isBehind = '';
		if(!empty($pix_particles_behind)){
			$isBehind = 'is-behind';
		}
        $output .= '<div class="pix-scene '.$isBehind.'">';
			$output .= $particles_out;
        $output .= '</div>';
}




	if (  empty( $equal_height ) && !empty($pix_particles_check) ) {
		$content_classes = '';
		// if ( ! empty( $flex_row ) ) {
		// 	$bs_contnet_align = '';
		// 	switch ($content_placement) {
		// 		case 'middle':
		// 			$bs_contnet_align = 'center';
		// 			break;
		// 		case 'top':
		// 			$bs_contnet_align = 'start';
		// 			break;
		// 		case 'bottom':
		// 			$bs_contnet_align = 'end';
		// 			break;
		// 	}
		// 	$content_classes = 'd-flex align-items-' . $bs_contnet_align;
		// }

		// $output .= '<div style="z-index:30;position:relative;" class="w-100 '.$pix_content_placement.' '.$content_classes.'">';
	}
		$output .= wpb_js_remove_wpautop( $content  );

	if (  empty( $equal_height ) && !empty($pix_particles_check) ) {
		// $output .= '</div>';
	}


	if(!empty($pix_particles_check)){
		// $output .= '</div>';
	}



	if($bottom_divider_select && $bottom_divider_select!='' && $bottom_divider_select!='0' && $bottom_divider_select!='dynamic'){
		$b_divider_opts = array(
			'd_divider_select'		=> $bottom_divider_select,
			'd_layers'				=> $bottom_layers,
			'd_1_is_gradient'			=> $b_1_is_gradient,
			'd_1_color'					=> $b_1_color,
			'd_1_color_2'				=> $b_1_color_2,
			'd_1_animation'				=> $b_1_animation,
			'd_1_delay'					=> $b_1_delay,
			'd_2_is_gradient'			=> $b_2_is_gradient,
			'd_2_color'					=> $b_2_color,
			'd_2_color_2'				=> $b_2_color_2,
			'd_2_animation'				=> $b_2_animation,
			'd_2_delay'					=> $b_2_delay,
			'd_3_is_gradient'			=> $b_3_is_gradient,
			'd_3_color'					=> $b_3_color,
			'd_3_color_2'				=> $b_3_color_2,
			'd_3_animation'				=> $b_3_animation,
			'd_3_delay'					=> $b_3_delay,
			'd_high_index'				=> $b_divider_in_front,
			'd_flip_h'					=> $b_flip_h,
		);
		$c_height = false;
		if(!empty($b_custom_height)){ $c_height = $b_custom_height;}
		$output .= pix_get_divider($bottom_divider_select, $bottom_divider_color, 'bottom', $el_id, $bottom_moving_divider_color, $b_divider_opts, $c_height);
		// $output2 = pix_get_divider($bottom_divider_select, $bottom_divider_color, 'bottom', $el_id, $bottom_moving_divider_color);
	}

	if($bottom_divider_select && $bottom_divider_select=='dynamic'){
		$b_divider_opts = array(
			'd_divider_select'			=> $bottom_divider_select,
			'd_high_index'				=> $b_divider_in_front,
			'd_flip_h'					=> $b_flip_h,
		);
		$output .= pix_get_divider($bottom_divider_select, $bottom_divider_color, 'bottom', $el_id, $bottom_moving_divider_color, $b_divider_opts);
	}


$output .= '</div>';




// $output .= '<div style="z-index:30;position:relative;" class="w-100">';
// $output .= $output2;
// $output .= '</div>';

$output .= $after_output;




echo $output;
