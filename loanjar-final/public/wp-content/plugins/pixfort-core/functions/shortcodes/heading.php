<?php


/* ---------------------------------------------------------------------------
 * Heading [heading] [/heading]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_heading' ) ){
	function sc_heading( $attr, $content = null ){
		extract(shortcode_atts(array(
			'title'		=> '',
			'bold'		=> 'font-weight-bold',
			'italic'		=> '',
			'secondary_font'		=> '',
			'title_color'		=> 'body-default',
			'title_custom_color'		=> '',
			'title_size'		=> 'h1',
			'display'		=> '',
			'title_custom_size'		=> '',
			'content_color'		=> 'dark-opacity-5',
			'content_custom_color'		=> '',
			'content_size'		=> '',
			'padding_title'			=> '',
            'padding_content'		=> '',
			'icon' 		=> '',
			'slogan' 	=> '',
			'position'  => 'text-center',
			'animation' 	=> '',
			'delay' 	=> '0',
			'image' 	=> '0',
			'heading_id' 	=> '',
			'max_width' 	=> '',
			'css' 	=> '0',
		), $attr));
		$classes = array();
		$css_class = '';
		if(function_exists('vc_shortcode_custom_css_class')){
		    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
		}

		if(empty($title)&&empty($content)){
			return '';
		}
		$t_custom_color = '';
		if(!empty($title_color)){
			if($title_color!='custom'){
				array_push($classes, 'text-'.$title_color );
			}else{
				$t_custom_color .= 'color:'.$title_custom_color.' !important;';
			}
		}
		$title = pix_unescape_vc($title);

		$imgSrc = '';
		if(!empty($image)){
			if(is_string($image)&&substr( $image, 0, 4 ) === "http"){
				$img = $image;
				$imgSrc = $img;
				array_push($classes, 'text-gradient-primary' );
			}else{
				if(is_array($image)){
					if(!empty($image['id'])){
					  $img = wp_get_attachment_image_src($image['id'], "full");
					  array_push($classes, 'text-gradient-primary' );
					  $imgSrc = $img[0];
					}
				}else{
				  $img = wp_get_attachment_image_src($image, "full");
				  array_push($classes, 'text-gradient-primary' );
				  $imgSrc = $img[0];
				}
			}
			if(!empty($imgSrc)){
				$t_custom_color .= 'background-image:url('.$imgSrc.') !important;';
			}
		}
		if(!empty($padding_title)){
			$t_custom_color .= 'padding-top:'.$padding_title.';';
		}

		if(!empty($bold)) array_push($classes, $bold );
		if(!empty($italic)) array_push($classes, $italic );
		if(!empty($secondary_font)) array_push($classes, $secondary_font );
		if(!empty($display)) array_push($classes, $display );

		$c_color = '';
		$c_custom_color = '';
		if(!empty($content_color)){
			if($content_color!='custom'){
				$c_color = 'text-'.$content_color;
			}else{
				$c_custom_color = 'color:'.$content_custom_color.';';
			}
		}
		if(!empty($padding_content)){
			$c_custom_color .= 'padding-top:'.$padding_content.';';
		}

		$title_tag = $title_size;
		$t_size_style = '';
		if($title_size == 'custom'){
			$title_tag = "div";
			$t_size_style = "font-size:". $title_custom_size .';';
		}
		if(!empty($animation)){
			array_push($classes, 'animate-in' );
		}
		$class_names = join( ' ', $classes );

		if(!empty($heading_id)) $heading_id = 'id="'.$heading_id.'"';

        $output = '<div '.$heading_id.' class="pix-heading-el '.$position.' '.$css_class.'">';
			if(!empty($max_width)) {
				$custom_style = 'style="max-width:'.$max_width.';"';
				$output .= '<div class="d-inline-block" '.$custom_style.'>';
			}
            $output .= '<div><div class="slide-in-container"><'.$title_tag.' class="'. $class_names .' heading-text el-title_custom_color mb-12" style="'.$t_custom_color. $t_size_style.'" data-anim-type="'. $animation .'" data-anim-delay="'.$delay.'">'. do_shortcode($title) .'</'.$title_tag.'></div></div>';
            if(!empty($content)){ $output .= '<div class="slide-in-container w-100"><div class="mb-0 '.$c_color.' '.$content_size.' animate-in" data-anim-type="'. $animation .'" data-anim-delay="'.$delay.'" style="'.$c_custom_color.'">'. do_shortcode( $content ) .'</div></div>'; }
			if(!empty($max_width)) {
				$output .= '</div>';
			}
        $output .= '</div>';

		return $output;
	}
}

add_shortcode( 'heading', 'sc_heading' );

 ?>
