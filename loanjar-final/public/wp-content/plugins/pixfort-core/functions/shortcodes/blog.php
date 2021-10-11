<?php


/* ---------------------------------------------------------------------------
 * Blog [pix_blog][/pix_blog]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_blog' ) ){

	function sc_pix_blog( $attr, $content = null ){
		extract(shortcode_atts(array(
			'blog_style'				=> '',
			'blog_size'				=> 'lg',
			'title'				=> '',
			'count'				=> 5,
			'items_count'				=> 3,
			'category'			=> '',
			'category_multi'	=> '',
			// 'more'				=> '',
			'blog_style_box'				=> false,
			'blog_dark_mode'				=> '',
			'pagination'				=> false,
			'orderby'				=> 'date',
			'order'				=> 'DESC',


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
			'b_custom_height'				=> '50px',

			'animation' 	=> '',
			'delay' 	=> '0',

			'css' 	=> '',
		), $attr));

		// $translate['readmore'] 		= pix_get_option('translate') ? pix_get_option('translate-readmore','Read more') : __('Read more','pixfort');

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

		$css_class = '';
		if(function_exists('vc_shortcode_custom_css_class')){
		    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
		}

		// if(is_front_page()) {
		//     $paged = (get_query_var('page')) ? get_query_var('page') : 1;
		// }else {
		//     $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		// }
		// $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : ( ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1 );

		$args = array(
			'posts_per_page'		=> intval($count),
			// 'no_found_rows'			=> 1,
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1,
			'ignore_sticky_posts'	=> 1,
			'orderby'				=> $orderby,
			'order'				=> $order,
			'paged' => $paged
		);

		// categories
		if( $category_multi ){
			$args['category_name'] = trim( $category_multi );
		} elseif( $category ){
			$args['category_name'] = $category;
		}
		$output = '';
		$query_blog = new WP_Query( $args );

		$col = 12 / $items_count;
		// $output .= '<div class="pix-slider-effect-1 pix-slider-dots  pix-slider-3 '.$css_class.'" data-anim-type="fade-in-up" data-anim-delay="800">';
		$output .= '<div class="row '.$css_class.' '.$blog_dark_mode.'">';

		// // TODO Add vc front masonry init js
		// $output .= '<div class="pix_masonry pix_masonry_3">';
		// 	$output .= '<div class="grid-sizer"></div>';
		// 	$output .= '<div class="gutter-sizer"></div>';
		// 	while ( $query_blog->have_posts() ) :
		// 		$output .= '<div class="grid-item pix-mb-40">';
		// 		$output .= pix_blog_item($query_blog, $attr, $divider_out);
		// 		$output .= '</div>';
		// 	endwhile; // End of the loop.
		// $output .= '</div>';

				while ( $query_blog->have_posts() ){
					$output .= '<div class="col-xs-12 col-md-'.$col.' pix-mb-40">';
                    	$output .= pix_blog_item($query_blog, $attr, $divider_out);
                    $output .= '</div>';
				}
				if($pagination){
					$output .=  '<div class="pix-pagination d-sm-flex pix-mt-20 w-100 justify-content-center align-items-center">';
				        $output .=  paginate_links( array(
				           'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
				           // 'base'         => get_pagenum_link(1) . '%_%',
				           'total'        => $query_blog->max_num_pages,
				           'current'      => max( 1, $paged ),
				           'format'       => '?paged=%#%',
				           // 'format'       => '',
				           // 'format'       => 'paged/%#%',
				           'show_all'     => false,
				           'type'         => 'plain',
				           'end_size'     => 2,
				           'mid_size'     => 1,
				           'prev_next'    => true,
				           'prev_text'    => '<span class="d-sm-flex justify-content-center align-items-center"><i class="pixicon-angle-left align-self-center"></i></span>',
				           'next_text'    => '<span class="d-sm-flex justify-content-center align-items-center"><i class="pixicon-angle-right align-self-center"></i></span>',
				           'add_args'     => false,
				           'add_fragment' => '',
				       ) );
				   // $output .=  paginate_links(array(
			       //          'base' => get_pagenum_link(1) . '%_%',
			       //          'format' => '/page/%#%',
			       //          'current' => max(1, get_query_var('page')),
			       //          'total' => $query_blog->max_num_pages,
			       //          'prev_text'    => __('prev'),
			       //          'next_text'    => __('next'),
			       //      ));
				   $output .=  '</div>';
				}




		$output .= '</div>'."\n";


		wp_reset_postdata();




		return $output;
	}
}


add_shortcode( 'pix_blog', 'sc_pix_blog' );






function pix_blog_item($query_blog, $attr, $divider_out = ''){
	extract(shortcode_atts(array(
		'blog_style'				=> '',
		'blog_size'				=> 'lg',
		'title'				=> '',
		'count'				=> 5,
		'items_count'				=> 3,
		'category'			=> '',
		'category_multi'	=> '',
		'more'				=> '',
		'blog_style_box'				=> false,
		'css'				=> '',

		'rounded_img'  => 'rounded-lg',
		'style' 		=> '',
		'hover_effect' 		=> '',
		'add_hover_effect' 		=> '',

		'animation' 	=> '',
		'delay' 	=> '0',

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
	), $attr));

	$output = '';
	if ( $query_blog && $query_blog->have_posts() ){

		$query_blog->the_post();

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
		 $classes = array();

		 array_push($classes, $rounded_img);
		 if($style){
 			array_push($classes, $style_arr[$style]);
 		}
 		if($hover_effect){
 			array_push($classes, $hover_effect_arr[$hover_effect]);
 		}
 		if($add_hover_effect){
 			array_push($classes, $add_hover_effect_arr[$add_hover_effect]);
 		}

		$class_names = join( ' ', $classes );

		$theme_blog_layouts = array('transparent', 'with-padding', 'full-img', 'default', 'left-img', 'right-img');
		if(in_array($blog_style, $theme_blog_layouts)){
			$output = essentials_get_post_excerpt_template(array(
				'blog_layout'	=> $blog_style,
				'blog_type'	=> 'masonry',
				'blog_style_box'	=> $blog_style_box,
				'rounded_img'  => $rounded_img,
				'style' 		=> $style,
				'hover_effect' 		=> $hover_effect,
				'add_hover_effect' 		=> $add_hover_effect,
				'padding_bottom' 		=> 'pix-pb-0',
				'blog_size'				=> $blog_size,
				'animation' 	=> $animation,
			    'delay' 	=> $delay,
			));
		}else{
			$size = array(1244,800);
			$round = '';
			if($blog_style=='padding'){$round = $rounded_img ;}
			$attrs = array(
				'class'	=> 'img-fluid '.$round.' card-img-top pix-fit-cover2',
				'style'	=> 'height:200px;width:100%;object-fit: cover;',
				'loading' => 'lazy',
				'alt'	=> get_the_title()
			);

			$full_image_url = wp_get_attachment_image( get_post_thumbnail_id(), 'pix-blog-small', false, $attrs );
			$img_src = $full_image_url;

			$cat_args = array( 'fields' => 'all' );
			$cats = wp_get_post_categories(get_the_ID(), $cat_args);

			$cats_str = '';
			// sc_pix_badge
			foreach ($cats as $key => $value) {

				$badge_attrs = array(
					'text'	=> $value->name,
					'text_size'	=> 'custom',
					'text_custom_size'		=> '12px',
					'bold'  => 'font-weight-bold',
					'secondary-font'  => 'secondary-font',
					'custom_css'	=> 'padding:5px 10px;line-height:12px;margin-right:3px;',
					'link'      => get_category_link($value->term_id)
				);
				$cats_str .= sc_pix_badge($badge_attrs);
			}


			$img_classes = '';
			$content_classes = 'pix-p-20';
			$footer_classes = '';
			$thumb_classes = '';
			if($blog_style=='padding'){
				$img_classes = 'pix-px-20 pix-pt-20';
				// $content_classes = 'py-3 px-4';
				$thumb_classes = $rounded_img;
				$footer_classes .= ' pix-m-20 pix-p-20 '.$rounded_img;
			}

			$box_classes = '';

			if($blog_style_box){
				$box_classes = 'shadow-hover-sm2 shadow-sm2 bg-white ';
			}else{
				$footer_classes .= ' '.$rounded_img;
				$thumb_classes = $rounded_img;
			}


			$anim_type = '';
			$anim_delay = '';
			$anim = '';
			if(!empty($animation)){
				$anim = 'animate-in';
				$anim_type = 'data-anim-type="'.$animation.'"';
				$anim_delay = 'data-anim-delay="'.$delay.'"';
			}

			$output .= '<div class="pix-content-box pix-post-meta-element pix-post-meta-basic fly-sm2 d-flex align-content-between flex-wrap align-self-stretch '.$class_names.' overflow-hidden w-100 '.$anim.' '. implode(' ',get_post_class($box_classes)).'" '.$anim_type.' '.$anim_delay.'>
				<div class="d-flex align-items-start w-100">
					<div class="w-100">';
						if(!empty($img_src)){
							$output .= '<div class="d-block '.$img_classes.'">';
							$output .= '<a href="'. get_permalink() .'">';
							$output .= '<div class="'.$thumb_classes.' overflow-hidden position-relative d-block pix-fit-cover" style="height:200px;width:100%;">';
								$output .= $img_src;
								// if($bottom_divider_select && $bottom_divider_select!='' && $bottom_divider_select!='0' && $bottom_divider_select!='dynamic'){
								// 	$output .= pix_get_divider($bottom_divider_select, '#fff', 'bottom', false, $bottom_moving_divider_color, $b_divider_opts, 50);
								// }
								// if($bottom_divider_select && $bottom_divider_select=='dynamic'){
								// 	$b_divider_opts = array(
								// 		'd_divider_select'			=> $bottom_divider_select,
								// 		'd_high_index'				=> $b_divider_in_front,
								// 		'd_flip_h'					=> $b_flip_h,
								// 	);
								// 	$output .= pix_get_divider($bottom_divider_select, '#fff', 'bottom', false, $bottom_moving_divider_color, $b_divider_opts);
								// }
								$output .= $divider_out;
							$output .= '</div>';
							$output .= '</a>';
							$output .= '</div>';


						}else{

							$output .= '<div class="d-block '.$img_classes.'">';
							$output .= '<a href="'. get_permalink() .'">';
							$output .= '<div class="'.$thumb_classes.' overflow-hidden position-relative d-block pix-fit-cover" style="height:200px !important;width:100%;">';
								$output .= '<div class="d-inline-block w-100 h-100 bg-primary" style="min-height:200px;"></div>';
								$output .= $divider_out;
							$output .= '</div>';
							$output .= '</a>';
							$output .= '</div>';
						}

						$output .= '<div class="d-block '.$content_classes.' position-relative">
							<span class="pix-post-meta-categories d-inline-block text-sm pb-1 mb-1">'.$cats_str.'</span>
							<a class="text-heading-default" href="'. get_permalink() .'"><h5 class="card-title mb-2 secondary-font font-weight-bold">'. get_the_title() .'</h5></a>';


							$output .= '<a class="pix-post-meta-date text-sm mb-0 d-inline-block text-body-default svg-body-default" href="'. get_permalink() .'">';
								// $output .= '<img class="pr-2 align-middle2" src="'.PIX_CORE_PLUGIN_URI.'functions/images/blog/blog-post-date-icon.svg"/>';
								$output .= '<span class="pr-1">
								'.pix_load_inline_svg(PIX_CORE_PLUGIN_DIR.'/functions/images/blog/blog-post-date-icon.svg').'
								</span>';
								$output .= '<span class="text-body-default">'. get_the_date() .'</span>';
							$output .= '</a>';
							if($blog_size=='lg'){
								$output .= '<p class="card-text pix-pt-10 text-body-default">'.get_the_excerpt().'</p>';
							}

						$output .= '</div>
					</div>
				</div>';

				$comment_link = get_comments_link();
				$comment_count = get_comments_number();
				$author = get_the_author();
				$author_img = pix_load_inline_svg(PIX_CORE_PLUGIN_DIR.'/functions/images/blog/blog-post-author-icon.svg');
				$avatar = get_avatar_url(get_the_author_meta('ID'), array('size'=>36));
				if($avatar !== FALSE){
					$author_img = '<img class="pix_blog_sm_avatar" src="'.esc_url($avatar).'" alt="">';
				}

				$likes = '';
				if( function_exists('get_pixfort_likes') ){
					$likes .= get_pixfort_likes();
				}

				if($blog_size=='lg'||$blog_size=='md'){




					$output .= '<div class="card-footer2 bg-gray-1 text-right d-flex align-items-center align-items-end2 w-100 pix-p-20 '.$footer_classes.'" style="line-height:0;">
									<div class="flex-fill2 pix-post-meta-author text-left pr-1">
										<span class="text-sm pr-2" data-toggle="tooltip" data-placement="right" title="'.esc_attr__('By', 'pixfort-core').' '.$author.'">
											<span class="pr-1">
											'.$author_img.'
											</span>
										</span>
									</div>';
									if(comments_open()){
										$output .= '<div class="pix-post-meta-comments flex-fill2 text-left pr-1">';
											$output .= '<a href="'.$comment_link.'" class="text-xs pr-2 text-body-default svg-body-default">
												<span class="pr-1">
												'.pix_load_inline_svg(PIX_CORE_PLUGIN_DIR.'/functions/images/blog/blog-post-comments-icon.svg').'
												</span>
												<span class="align-middle font-weight-bold">'.$comment_count.'</span>
											</a>
										</div>';
									}
									$output .= $likes.'
									<div class="flex-fill text-right">
										<a href="'. get_permalink() .'" class="btn btn-sm p-0 btn-link text-body-default svg-body-default font-weight-bold pix-hover-item">
											<span class="d-flex align-items-center">
												<span class="align-bottom">'.esc_attr__('Read more', 'pixfort-core').'</span>
												<span class="ml-1 align-middle pix-hover-right">
												'.pix_load_inline_svg(PIX_CORE_PLUGIN_DIR.'/functions/images/blog/blog-post-read-more-icon.svg').'
												</span>
											</span>
										</a>
									</div>
								</div>';
				}
			$output .= '</div>';
		}




	}
	return $output;
}
 ?>
