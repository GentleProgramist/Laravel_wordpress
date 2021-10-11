<?php

/* ---------------------------------------------------------------------------
* Testimonial [pix_testimonial][/pix_testimonial]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_testimonial' ) ){

	function sc_pix_testimonial( $attr, $content = null ){

		extract(shortcode_atts(array(
			'image' 	=> '',
			'img_style' 	=> 'standard',
			'width' 	=> '',
			'height' 	=> '',
			'title' 	=> 'Simply amazing!',
			'title_bold' 	=> 'font-weight-bold',
			'title_italic' 	=> '',
			'title_secondary_font' 	=> '',
			'title_color' 	=> 'primary',
			'title_custom_color' 	=> '',
			'title_size' 	=> '',
			'name' 	=> '',
			'name_bold' 	=> 'font-weight-bold',
			'name_italic' 	=> '',
			'name_secondary_font' 	=> '',
			'name_color' 	=> 'dark-opacity-4',
			'name_custom_color' 	=> '',
			'name_size' 	=> 'h6',
			'name_custom_size' 	=> '',
			'text' 	=> '"Some quick example text to build on the testimonial text and make up the bulk of the testimonial content."',
			'text_bold' 	=> '',
			'text_italic' 	=> 'font-italic',
			'text_secondary_font' 	=> '',
			'text_color' 	=> 'body-default',
			'text_custom_color' 	=> '',
			'text_size' 	=> '',
			'link' 	=> '',
			'items_bg_color' 		=> 'light-opacity-5',
			'items_custom_bg_color' 		=> '',
			'circle_color' 		=> 'gradient-primary',
			'circle_custom_color' 		=> '',
			'rounded_box' 		=> 'rounded-lg',
			'target' 	=> '',
			'css' 		=> '',
		), $attr));

		$css_class = '';
        if(function_exists('vc_shortcode_custom_css_class')){
            $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
        }

		$img_attrs = array(
			'class'	=> 'img-fluid mb-3',
			'alt'	=> $title
		);
		$size = 'full';
		if(empty($width)&&!empty($height)){
			$width = 2000;
		}
		if(!empty($width)&&empty($height)){
			$height = 2000;
		}
		if(!empty($width)||!empty($height)){
			$size = array((int)$width,(int)$height);
		}
		$circle_style = '';
		if($circle_color=='custom'){
			$circle_style = 'style="background:'.$circle_custom_color.';"';
		}

		$image_html = '';
		if($img_style=='standard'){
			if(is_string($image)&&substr( $image, 0, 4 ) === "http"){
				$image_html = '<img class="img-fluid mb-3" src="'. $image . '" alt="'.$title.'"  />';
			}else{
				if(!empty($image['id'])){
				  $image_html = wp_get_attachment_image( $image['id'], $size, false, $img_attrs );
				}else{
				  $image_html = wp_get_attachment_image( $image, $size, false, $img_attrs );
				}
			}

		}else{
			$img_attrs2 = array(
				'class'	=> 'img-fluid rounded-circle',
				'style'	=> '',
				'alt'	=> $title
			);
			if(!empty($width)&&!empty($height)){
				$img_attrs2['style'] = 'max-width:'.$width.'px';
			}
			if(empty($width)&&!empty($height)){
				$img_attrs2['style'] = 'max-width:'.$height.'px';
			}
			if(is_string($image)&&substr( $image, 0, 4 ) === "http"){
				$image_html2 = '<img class="img-fluid mb-3" style="'.$img_attrs2['style'].'" src="'. $image . '" alt="'.$title.'"  />';
			}else{
				if(!empty($image['id'])){
				  $image_html2 = wp_get_attachment_image( $image['id'], 'pix-square-sm', false, $img_attrs2 );
				}else{
				  $image_html2 = wp_get_attachment_image( $image, 'pix-square-sm', false, $img_attrs2 );
				}
			}

			$image_html .= '<span class="align-self-center pix-circle pix-bg-custom bg-'.$circle_color.' circle-482 animate-in shadow-sm" '.$circle_style.' data-anim-type="fade-in-left" data-anim-delay="200">'.$image_html2.'</span>';
		}
		$img_attrs3 = array(
			'class'	=> 'img-fluid rounded-circle',
			'alt'	=> $title
		);
		if(is_string($image)&&substr( $image, 0, 4 ) === "http"){
			$image_html3 = $image;
		}else{
			if(!empty($image['id'])){
			  $image_html3 = wp_get_attachment_image_src( $image['id'], 'pix-square-sm', false, $img_attrs3 );
			}else{
			  $image_html3 = wp_get_attachment_image_src( $image, 'pix-square-sm', false, $img_attrs3 );
			}
			$image_html3 = $image_html3[0];
		}




		$title_text_color = pix_get_text_color_values($title_color, $title_custom_color);
		$text_text_color = pix_get_text_color_values($text_color, $text_custom_color);
		$name_text_color = pix_get_text_color_values($name_color, $name_custom_color);

		$title_classes = pix_get_text_format_classes($title_bold, $title_italic, $title_secondary_font). ' ' . $title_text_color['class'];
		$text_classes = pix_get_text_format_classes($text_bold, $text_italic, $text_secondary_font). ' ' . $text_text_color['class']. ' ' .$text_size;
		$name_classes = pix_get_text_format_classes($name_bold, $name_italic, $name_secondary_font). ' ' . $name_text_color['class'];

		$title_style = $title_text_color['style'];
		$text_style = $text_text_color['style'];
		$name_style = $name_text_color['style'];

		$name_tag = $name_size;
		if(empty($name_size)||$name_size=='custom'){
			$name_tag = 'h6';
			if(!empty($name_custom_size)){
				$name_style .= 'font-size:'.$name_custom_size.';';
			}
		}

		if(!empty($title_style)){
			$title_style = 'style="'.$title_style.'"';
		}
		if(!empty($text_style)){
			$text_style = 'style="'.$text_style.'"';
		}
		if(!empty($name_style)){
			$name_style = 'style="'.$name_style.'"';
		}
		$testimonial = '';
		$c_style = '';
		if($items_bg_color=='custom' && !empty($items_custom_bg_color)){
			$c_style = 'style="background:'.$items_custom_bg_color.'"';
		}

		if($img_style=='standard'||$img_style=='circle_top'){
			if(!empty($animation)) $testimonial  .= '<div class="animate-in" data-anim-type="'.$animation.'" data-anim-delay="'.$delay.'">';
			if(!empty($link)) $testimonial  .= '<a href="'.$link.'" target="'.$target.'">';
				$testimonial  .= '<div class="card-body '.$rounded_box.' bg-'.$items_bg_color.'" '.$c_style.'>';
					$testimonial  .= $image_html;

					if(!empty($text)) $testimonial  .= '<p class="card-text '.$text_classes.'" '.$text_style.'>'. do_shortcode($text).'</p>';
					if(!empty($name)) $testimonial  .= '<'.$name_tag.' class="card-title mb-1 '.$name_classes.'" '.$name_style.'>'.$name.'</'.$name_tag.'>';
					if(!empty($title)) $testimonial  .= '<div class="card-title '.$title_size.' '.$title_classes.'" '.$title_style.'>'.$title.'</div>';
				$testimonial  .= '</div>';
			if(!empty($link)) $testimonial  .= '</a>';
			if(!empty($animation)) $testimonial  .= '</div>';
		}else{
			$testimonial .= '<div class="card pix-p-10 '.$rounded_box.'">';
				if(!empty($link)) $testimonial  .= '<a href="'.$link.'" target="'.$target.'">';
					$testimonial .= '<div class="card-body">';
						if(!empty($text)) $testimonial  .= '<p class="card-text '.$text_classes.'" '.$text_style.'>'. do_shortcode($text).'</p>';
						$testimonial .= '<div class="d-flex">';
							if($image_html3){
								$testimonial .= '<span class="align-self-center pix-circle pix-bg-custom bg-'.$circle_color.' circle-48 animate-in shadow-sm" '.$circle_style.' data-anim-type="fade-in-left" data-anim-delay="200"><img src="'. $image_html3 .'" class="rounded-circle" alt="" /></span>';
							}
							$testimonial .= '<div class="align-self-center">';
							if(!empty($name)) $testimonial  .= '<'.$name_tag.' class="card-title mb-0 pix-mx-20 '.$name_classes.'" '.$name_style.'>'.$name.'</'.$name_tag.'>';
							if(!empty($title)) $testimonial  .= '<div class="card-title '.$title_size.' mb-0 pix-mx-20 '.$title_classes.'" '.$title_style.'>'.$title.'</div>';
							$testimonial .= '</div>';
						$testimonial .= '</div>';
					$testimonial .= '</div>';
				if(!empty($link)) $testimonial  .= '</a>';
			$testimonial .= '</div>';
		}

		$output = sc_content_box($attr, $testimonial);

		return $output;
	}
}

add_shortcode( 'pix_testimonial', 'sc_pix_testimonial' );

?>
