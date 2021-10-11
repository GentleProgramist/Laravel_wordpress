<?php
/* ---------------------------------------------------------------------------
 * Testimonial masonry [pix_testimonial_masonry] [/pix_testimonial_masonry]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_testimonial_masonry' ) ){

	function sc_pix_testimonial_masonry( $attr, $content = null ){

		extract(shortcode_atts(array(
			'items' 		=> '',
			'css' 		=> '',
		), $attr));

		if(is_array($items)){
			$testimonials = $items;
		}else{
			$testimonials = vc_param_group_parse_atts( $items );
		}
		$output = '';
		if(!empty($testimonials)){
			$output .= '<div class="pix_masonry" data-jarallax-element2="-50">';
				$output .= '<div class="grid-sizer"></div>';
				$output .= '<div class="gutter-sizer"></div>';
				foreach ($testimonials as $key => $value) {
					$output .= '<div class="'.$value['grid_size'].' pix-mb-20">';
						$output .= sc_pix_testimonial(array_merge($value, $attr));
					$output .= '</div>';
				}
			$output .= '</div>';
		}
		return $output;
	}
}

add_shortcode( 'pix_testimonial_masonry', 'sc_pix_testimonial_masonry' );

 ?>
