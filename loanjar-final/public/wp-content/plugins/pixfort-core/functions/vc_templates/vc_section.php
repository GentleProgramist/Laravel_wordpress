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
$el_class = $full_height = $parallax_speed_bg = $parallax_speed_video = $full_width = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = $css_animation = '';
$disable_element = '';
$top_moving_divider_color = '';
$responsive_css = '';
$output = $after_output = $pix_bg_grdient = $section_name = $top_divider_select = $bottom_divider_select = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

// wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

if(! empty($pix_over_visibility) && $pix_over_visibility == "2" ){
	$el_class .= ' overflow-hidden';
}elseif(! empty($pix_over_visibility) && $pix_over_visibility == "1" ){
	$el_class .= ' vc_row_visible overflow-hidden-clip';
}else{
	// $el_class .= ' overflow-hidden-clip';
	$el_class .= ' vc_section_visible';
}

if( !empty($fade_in_intro)){
	$el_class .= ' pix-intro-1 ';
}

$responsive_css_class = pix_responsive_css_class($responsive_css);
if( !empty($responsive_css_class) && $responsive_css_class){
	$el_class .= ' '.$responsive_css_class. ' ';
}

$css_classes = array(
	'vc_section',
	$el_class,
	vc_shortcode_custom_css_class( $css ),
);

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
	$css_classes[] = 'vc_section-has-fill';
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
		$css_classes[] = 'pix-el-full-width';
	}
	$after_output .= '<div class="vc_row-full-width vc_clearfix"></div>';
}

if ( ! empty( $full_height ) ) {
	$css_classes[] = 'vc_row-o-full-height';
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_section-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = 'vc_section-flex';
}
if ( ! empty( $pix_dark_mode ) ) {
	$css_classes[] = 'pix-dark';
}
if(!empty($pix_scale_in)){
	$css_classes[] = $pix_scale_in;
}
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


$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_speed = $parallax_speed_video;
	$parallax_image = $video_bg_url;
	$css_classes[] = 'vc_video-bg-container2 jarallax';
	// wp_enqueue_script( 'vc_youtube_iframe_api_js' );
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

$css_classes[] = $pix_bg_grdient;

$jar_attr = false;
if ( ! empty( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
		$wrapper_attributes[] = 'data-jarallax-video="' . esc_attr( $parallax_image_src ) . '"';
		$jar_attr = true;
		$wrapper_attributes[] = 'data-speed="0.4"';
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
	// $wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
	if(!$jar_attr) $wrapper_attributes[] = 'data-jarallax-video="' . esc_attr( $video_bg_url ) . '"';
}
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
$wrapper_attributes[] = 'data-section-name="' . esc_attr( $section_name ) . '"';

$output .= '<section ' . implode( ' ', $wrapper_attributes ) . '>';

if( !empty($fade_in_intro)){
	$pix_overlay_opacity = 1;
}
if(!empty($pix_overlay_color)){
	if($pix_overlay_color != ''){
		if($pix_overlay_color=='custom'){
			$output .= '<div class="pix_element_overlay" style="pointer-events:none;background:'.$pix_overlay_custom_color.';position:absolute;width:100%;height:100%;top:0;left:0;opacity:'.$pix_overlay_opacity.';"></div>';
		}else{
			$ol_class = '';
			$ol_op = '';
			$output .= '<div class="pix_element_overlay bg-'.$pix_overlay_color.'" style="pointer-events:none;;position:absolute;width:100%;height:100%;top:0;left:0;opacity:'.$pix_overlay_opacity.';"></div>';
		}
	}
}

if( !empty($fade_in_intro)){
	if(is_string($fade_in_intro)&&substr( $fade_in_intro, 0, 4 ) === "http"){
		$fade_in_intro_src = $fade_in_intro;
	}else{
		$fade_in_intro_id = preg_replace( '/[^\d]/', '', $fade_in_intro );
		if(is_string($fade_in_intro_id)&&substr( $fade_in_intro_id, 0, 4 ) === "http"){
			$fade_in_intro_src = $fade_in_intro_id;
		}else{
			$fade_in_intro_src = wp_get_attachment_image_src( $fade_in_intro_id, 'full' );
			if ( ! empty( $fade_in_intro_src[0] ) ) {
				$fade_in_intro_src = $fade_in_intro_src[0];
			}
		}

	}


	$output .= '<div class="fullpage-container">';
	$output .= '<div class="pix-intro-img jarallax" data-jarallax data-speed="0.8"><img loading="lazy" class="jarallax-img '.$fade_in_opacity.'"  src="'.$fade_in_intro_src.'" alt="" /></div>';
	$output .= '</div>';
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

$output .= wpb_js_remove_wpautop( $content );
$output .= '</section>';
$output .= $after_output;

echo $output;
