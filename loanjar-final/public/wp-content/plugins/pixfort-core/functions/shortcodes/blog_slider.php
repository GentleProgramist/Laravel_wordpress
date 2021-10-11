<?php


/* ---------------------------------------------------------------------------
 * Blog Slider [pix_bblog_slider][/pix_bblog_slider]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_blog_slider' ) )
{
	function sc_pix_blog_slider( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title'				=> '',
			'count'				=> 5,
			'category'			=> '',
			'category_multi'	=> '',
			'blog_style'				=> '',
			'blog_size'				=> 'lg',
			'more'				=> '',
			'blog_slider_overflow'				=> true,
			'blog_style_box'				=> false,
			'blog_dark_mode'				=> '',
			'css'				=> '',
			'orderby'				=> 'date',
			'order'				=> 'DESC',

			// 'rounded_img'  => 'rounded-lg',
			// 'style' 		=> '',
			// 'hover_effect' 		=> '',
			// 'add_hover_effect' 		=> '',

			'bottom_divider_select'				=> '',
			'bottom_moving_divider_color'				=> '',
			'bottom_layers'				=> '3',
			'pix_param_section_1'				=> '',
			// 'b_1_is_gradient'				=> '',
			'b_1_color'				=> '#fff',
			// 'b_1_color_2'				=> '',
			// 'b_1_animation'				=> 'fade-in-up',
			// 'b_1_delay'				=> '200',
			// 'b_2_is_gradient'				=> '',
			'b_2_color'				=> 'rgba(255,255,255,0.8)',
			// 'b_2_color_2'				=> '',
			'b_2_animation'				=> 'fade-in-up',
			'b_2_delay'				=> '300',
			// 'b_3_is_gradient'				=> '',
			// 'b_3_color'				=> '',
			// 'b_3_color_2'				=> '',
			'b_3_animation'				=> 'fade-in-up',
			'b_3_delay'				=> '400',
			'b_divider_in_front'				=> 'true',
			'b_flip_h'				=> '',


			'slider_num'  => '3',
			'dots_style' 	=> '',
			'slider_style' 	=> 'pix-style-standard',
			'slider_effect' 	=> 'pix-effect-standard',
			'autoplay' 	=> false,
			'autoplay_time' 	=> '1500',
			'freescroll' 	=> false,
			'prevnextbuttons' 	=> true,
			'adaptiveheight' 	=> false,
			'pagedots' 	=> true,
			'dots_align' 	=> '',
			'cellalign' 	=> 'center',
			'slider_scale' 	=> '',
			'cellpadding' 	=> 'pix-p-10',
			'slider_wrap' 	=> false,
			'righttoleft' 	=> false,
			'visible_y' 	=> '',
			'visible_overflow' 	=> '',
			'b_custom_height' 	=> '50px',

		), $attr));

		$css_class = '';
		if(function_exists('vc_shortcode_custom_css_class')){
		    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
		}


		$divider_out = '';
		if($bottom_divider_select && $bottom_divider_select!='' && $bottom_divider_select!='0' && $bottom_divider_select!='dynamic'){
			$b_divider_opts = array(
				'd_divider_select'		=> $bottom_divider_select,
				'd_layers'				=> $bottom_layers,
				'd_1_is_gradient'			=> '',
				'd_1_color'					=> $b_1_color,
				// 'd_1_color_2'				=> $b_1_color_2,
				// 'd_1_animation'				=> $b_1_animation,
				// 'd_1_delay'					=> $b_1_delay,
				'd_2_is_gradient'			=> '',
				'd_2_color'					=> $b_2_color,
				// 'd_2_color_2'				=> $b_2_color_2,
				'd_2_animation'				=> $b_2_animation,
				'd_2_delay'					=> $b_2_delay,
				'd_3_is_gradient'			=> '',
				'd_3_color'					=> '',
				'd_3_color_2'				=> '',
				'd_3_animation'				=> $b_3_animation,
				'd_3_delay'					=> $b_3_delay,
				'd_high_index'				=> $b_divider_in_front,
				'd_flip_h'					=> $b_flip_h,
			);

		}


		if($bottom_divider_select && $bottom_divider_select!='' && $bottom_divider_select!='0' && $bottom_divider_select!='dynamic'){
			$divider_out .= pix_get_divider($bottom_divider_select, '#fff', 'bottom', false, $bottom_moving_divider_color, $b_divider_opts, $b_custom_height);
		}
		if($bottom_divider_select && $bottom_divider_select=='dynamic'){
			$b_divider_opts = array(
				'd_divider_select'			=> $bottom_divider_select,
				'd_high_index'				=> $b_divider_in_front,
				'd_flip_h'					=> $b_flip_h,
			);
			$divider_out .= pix_get_divider($bottom_divider_select, '#fff', 'bottom', false, $bottom_moving_divider_color, $b_divider_opts, $b_custom_height);
		}


		$args = array(
			'posts_per_page'		=> intval($count),
			'no_found_rows'			=> 1,
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1,
			'orderby'				=> $orderby,
			'order'				=> $order
		);

		// categories
		if( $category_multi ){
			$args['category_name'] = trim( $category_multi );
		} elseif( !empty($category) && $category!='' ){
			$args['category_name'] = $category;
		}

		$output = '';
		$query_blog = new WP_Query( $args );

		$blog_overflow = '';
		if(!empty($blog_slider_overflow)&&$blog_slider_overflow){
			$blog_overflow = 'pix-blog-overflow-visible';
		}

		if(!filter_var($autoplay, FILTER_VALIDATE_BOOLEAN)){
			$autoplay_time = false;
		}else{
			$autoplay_time = (int)$autoplay_time;
		}
		$slider_data = '';
		$pix_id = "pix-slider-".rand(1,200000000);
		$slider_opts = array(
			"autoPlay"			=> $autoplay_time,
			"freeScroll"		=> filter_var($freescroll, FILTER_VALIDATE_BOOLEAN),
			"prevNextButtons"	=> filter_var($prevnextbuttons, FILTER_VALIDATE_BOOLEAN),
			"wrapAround"		=> filter_var($slider_wrap, FILTER_VALIDATE_BOOLEAN),
			"pageDots"			=> filter_var($pagedots, FILTER_VALIDATE_BOOLEAN),
			"adaptiveHeight"	=> filter_var($adaptiveheight, FILTER_VALIDATE_BOOLEAN),
			"rightToLeft"		=> filter_var($righttoleft, FILTER_VALIDATE_BOOLEAN),
			"cellAlign" 		=> $cellalign,
			"contain"			=> true,
			"slider_effect"			=> $slider_effect,
			"pix_id"			=>  '#'.$pix_id,
		);
		$slider_data = json_encode($slider_opts);
		$slider_data = 'data-flickity=\''. $slider_data .'\'';
		if($visible_overflow=='pix-overflow-all-visible') $visible_y = '';


		// $output .= '<div class="pix-slider-effect-1 pix-slider-dots  pix-slider-'.$slider_num.' '.$css_class.' '.$blog_overflow.'" data-anim-type="fade-in-up" data-anim-delay="800">';
		// $output .= '<div class="pix-slider-effect-1 pix-slider-dots  pix-slider-'.$slider_num.' '.$css_class.' '.$blog_overflow.'" data-anim-type="fade-in-up" data-anim-delay="800">';
		$output  .= '<div class="'.$css_class.' '.$blog_dark_mode.'">';
		$output  .= '<div id="'.$pix_id.'" class="pix-main-slider pix-fix-x2 '.$visible_overflow.' '.$slider_style.' '.$slider_effect.' '.$slider_scale.' '.$visible_y.' pix-slider-'.$slider_num.' pix-slider-dots '.$dots_style.' '.$dots_align.'" '.$slider_data.'>';
				while ( $query_blog->have_posts() ){
					// $output .= '<div class="carousel-cell d-flex">';
					// $output .= '<div class="slide-inner">';
					$output .= '<div class="carousel-cell">';
					$output .= '<div class="slide-inner '.$cellpadding.'">';
					$output .= '<div class="pix-slider-effects">';
						$output .= pix_blog_item($query_blog, $attr, $divider_out);
					$output .= '</div>';
					$output .= '</div>';
					$output .= '</div>';


				}
				wp_reset_postdata();


		$output .= '</div>';
		$output .= '</div>'."\n";

		wp_reset_postdata();





		return $output;
	}
}


add_shortcode( 'pix_blog_slider', 'sc_pix_blog_slider' );




 ?>
