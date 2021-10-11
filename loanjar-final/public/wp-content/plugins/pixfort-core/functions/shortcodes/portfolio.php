<?php


/* ---------------------------------------------------------------------------
 * Portfolio [portfolio]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_portfolio' ) )
{
	function sc_pix_portfolio( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'portfolio_style'   => '',
			'line_count' 		=> '4',
			'count' 			=> '6',
			'category' 			=> '',
			'style'				=> 'one',
			'category_multi'	=> '',
			'orderby' 			=> 'date',
			'order' 			=> 'DESC',
			'filters' 			=> 0,
			'filters_align' 			=> 'center',

			'rounded_img' 			=> 'rounded-lg',
			'pagination'		=> '',
			'post_type'		=> 'portfolio',
			'css'		=> '',
		), $attr));

		if(!is_array($post_type)) {
			$post_type = str_replace(' ', '', $post_type);
			$post_type = explode(',', $post_type);
		}
		
		$css_class = '';
		if(function_exists('vc_shortcode_custom_css_class')){
		    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
		}

		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : ( ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1 );
		$args = array(
			'post_type' 			=> $post_type,
			'posts_per_page' 		=> $count,
			'paged' 				=> $paged,
			'orderby' 				=> $orderby,
			'order' 				=> $order,
			'ignore_sticky_posts' 	=> 1,
		);
		$customCats = array(
			'portfolio'	=> 'portfolio-types',
			'product'	=> 'product_cat',
		);
		$customCats = apply_filters( 'pixfort/custom_types/categories', $customCats );
		$taxonomies = array();
		foreach ($post_type as $value) {
			if(!empty($customCats[$value])){
					array_push($taxonomies, $customCats[$value]);
			}else{
				array_push($taxonomies, 'category');
			}
		}
		
		$attr['customCats'] = $customCats;
		$attr['taxonomies'] = $taxonomies;
		if( !empty($category) ){
			$category = trim( $category );
			$category = str_replace(' ', '', $category);
			$category_arr = explode(',', $category);
			

			$args['tax_query'] = array(
						    array(
						    'taxonomy' => 'portfolio-types',
						    'field' => 'slug',
						    'terms' => $category_arr
						     )
						 );
		}

		$query_portfolio = new WP_Query( $args );
		$output = '';
		$output = '<div class="'.$css_class.'">';
			$output .= pix_content_portfolio($query_portfolio, $attr);
		$output .= '</div>';

		return $output;
	}
}


add_shortcode( 'pix_portfolio', 'sc_pix_portfolio' );










function pix_content_portfolio( $query = false, $attr = false  ){
	$output = '';
	if( ! $query ) {
		global $wp_query;
		$query = $wp_query;
	}
	extract(shortcode_atts(array(
			'line_count' 		=> '4',
			'count' 			=> '9',
			'category' 			=> '',
			'style'				=> 'one',
			'category_multi'	=> '',
			'orderby' 			=> 'date',
			'order' 			=> 'DESC',
			'filters' 			=> 0,
			'filters_align' 			=> 'center',
			'filter_light' 			=> '',
			'rounded_img' 			=> 'rounded-lg',
			'pagination'		=> '',
			'portfolio_style'   => '',
			'taxonomies'   => '',
		), $attr));

	$isotope_class = 'portfolio_grid';
    $output .= '<div class="pix-portfolio">';
		if($filters){
			$output .= pix_portfolio_nav($filters_align, $filter_light, $category, $taxonomies);
		}

    	if ( $query->have_posts() ){
            $output .= '<div class=" '.$isotope_class.'" style="width:100%">';
    		    while ( $query->have_posts() ){
					switch ($portfolio_style) {
					    case 'mini':
					        $output .= pix_portfolio_style_mini($query, true, $attr);
					        break;
					    case 'transparent':
					        $output .= pix_portfolio_style_transparent($query,true, $attr);
					        break;
					    case '3d':
					        $output .= pix_portfolio_style_3d($query, true,$attr);
					        break;
					    default:
					        $output .= pix_portfolio_style_default($query, true,$attr);
					}
    			}
    		$output .= '</div>';
    		if($pagination){ $output .= pix_pagination( $query ); }
    	}
    $output .= '</div>';
	wp_reset_postdata();

	return $output;
};







function pix_portfolio_nav($filters_align, $filter_light, $category, $taxonomies){
	$category_arr = false;
	if( !empty($category) ){
		$category = trim( $category );
		$category = str_replace(' ', '', $category);
		$category_arr = explode(',', $category);
	}
	$all = esc_attr__('All', 'pixfort-core');
	$output = '<div class="col-12 pix-pb-50 text-'.$filters_align.' '.$filter_light.' pix-portfolio-nav">';
		$output .= '<a href="#" data-category="*" class="portfolio_filter is-checked btn btn-link btn-colored-shadow"><strong>'.$all.'</strong></a>';
		$termArgs = array();
		$termArgs = apply_filters( 'pixfort_custom_portfolio_nav_args', $termArgs );
		foreach ($taxonomies as $value) {
			if( $portfolio_categories = get_terms($value, $termArgs) ){
				foreach( $portfolio_categories as $category ){
					if($category_arr){
						if(in_array($category->slug, $category_arr)){
							$output .= '<a href="#" data-category=".category-'. $category->slug .'" class="portfolio_filter btn btn-link btn-colored-shadow"><strong>'. $category->name .'</strong></a>';
						}
					}else{
						$output .= '<a href="#" data-category=".category-'. $category->slug .'" class="portfolio_filter btn btn-link btn-colored-shadow"><strong>'. $category->name .'</strong></a>';
					}
	
				}
			}	
		}
		
	$output .= '</div>';
	return $output;
}


function pix_pagination($the_query){
	// if(!$the_query) $the_query = get_queried_object();

	$output = '';
	 $output .= '<div class="pix-pagination d-sm-flex justify-content-center align-items-center">';
        $output .= paginate_links( array(
           'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
           'total'        => $the_query->max_num_pages,
           'current'      => max( 1, get_query_var( 'paged' ) ),
           'format'       => '?paged=%#%',
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
   $output .= '</div>';

   $output .= '<div class="pix-mb-40">';
    $output .= get_the_posts_navigation();
    $output .= '</div>';
	return $output;
}





function pix_portfolio_style_3d($query=false, $is_col = false, $attr = array()){
	extract(shortcode_atts(array(
		'line_count' 		=> '4',
		'rounded_img' 		=> 'rounded-lg',
		'overlay_color'		=> 'black',
	  	'custom_overlay_color'		=> '',
		'title_color'		=> 'heading-default',
		'title_custom_color'		=> '',
		'customCats' 		=> ''
	), $attr));
	$output = '';
	if ( $query && $query->have_posts() ){
		$query->the_post();

		$item_class = array();
		// $item_text_class = array();
		// $categories = '';
		//
		if(is_array($customCats) && array_key_exists(get_post_type(), $customCats) ){
			$terms = get_the_terms(get_the_ID(), $customCats[get_post_type()] );
		}else{
			$terms = get_the_terms(get_the_ID(),'category');
		}
		if( is_array( $terms ) ){
			foreach( $terms as $term ){
				$item_class[] = 'category-'. $term->slug;
		// 		$item_text_class[] = $term->slug;
		// 		$categories .= '<a href="'. site_url() .'/?portfolio-types='. $term->slug .'">'. $term->name .'</a>, ';
			}
		// 	$categories = substr( $categories , 0, -2 );
		}
			$item_class[] = get_post_meta( get_the_ID(), 'pix-post-size', true );
			$item_class[] = ' col-md-6 col-lg-'.$line_count;
			$item_class = implode(' ', $item_class);
		// 	$item_text_class = implode(' ', $item_text_class);

		if($is_col) $output .='<div class="col-12 pb-4 grid-item '. $item_class .'" data-category="transition">';
			$args = array(
				'title' 		=> get_the_title(),
				// 'text' 		=> get_the_excerpt(),
				'bg_img' 		=> get_post_thumbnail_id( get_the_ID() ),
				// 'title_color'		=> 'white',
				'title_color'		=> $title_color,
				'title_custom_color'		=> $title_custom_color,
				'content_color'		=> 'light-opacity-8',
				'rounded_img'		=> $rounded_img,
				'overlay_color'		=> $overlay_color,
				'custom_overlay_color'		=> $custom_overlay_color,
				'content_classes'		=> 'pix-px-20 pix-py-40',
				'content_align' 		=> 'center',
				'title_size'		=> 'h3',
				'title_size'		=> 'h3',
				'item_link'		=> true,
				'btn_link'		=> get_permalink(),
			);
			$output .= sc_pix_3d_box($args);
		if($is_col) $output .='</div>';
	}
	return $output;
}



function pix_portfolio_style_transparent($query=false, $is_col = false, $attr = array()){
	$output = '';
	extract(shortcode_atts(array(
		'line_count' 		=> '4',
		'rounded_img' 		=> 'rounded-lg',
		'title_color'		=> 'heading-default',
		'title_custom_color'		=> '',
		'full_size_img' 		=> '',
		'customCats' 		=> ''
	), $attr));

	if ( $query && $query->have_posts() ){
		$query->the_post();

		$item_class = array();
		$item_text_class = array();
		$categories = '';
		$cats_str = '';
		if(is_array($customCats) && array_key_exists(get_post_type(), $customCats) ){
			$terms = get_the_terms(get_the_ID(), $customCats[get_post_type()] );
		}else{
			$terms = get_the_terms(get_the_ID(),'category');
		}
		if( is_array( $terms ) ){
			foreach( $terms as $term ){
				$item_class[] = 'category-'. $term->slug;
				$item_text_class[] = $term->slug;
				$categories .= '<a href="'. get_term_link($term, get_post_type()) .'">'. $term->name .'</a>, ';
				$badge_attrs = array(
					'text'	=> $term->name,
					'text_size'	=> 'custom',
					'text_custom_size'		=> '14px',
					'bold'  => 'font-weight-bold',
					'custom_css'	=> 'padding:5px 10px;line-height:14px;'
				);
				$cats_str .= '<a href="'. get_term_link($term, get_post_type()) .'">';
				$cats_str .= sc_pix_badge($badge_attrs);
				$cats_str .= '</a>';
			}
			$categories = substr( $categories , 0, -2 );
		}
		$item_class[] = get_post_meta( get_the_ID(), 'pix-post-size', true );
		$item_class[] = ' col-md-6 col-lg-'.$line_count;
		$item_class = implode(' ', $item_class);
		$item_text_class = implode(' ', $item_text_class);

		$t_custom_color = '';
	    if(!empty($title_color)){
	      if($title_color =='custom'){
	        $t_custom_color = 'style="color:'.$title_custom_color.';"';
	      }
	    }

		if($is_col) $output .='<div class="col-12 pb-4 grid-item '. $item_class .'" data-category="transition">';
			$output .='<div class="card w-100">';

				$attrs = array(
					'class'	=> 'card-img img-fluid rounded-lg card-img-top overflow-hidden shadow-sm '. $rounded_img,
					'loading' => 'lazy',
					'alt'	=> get_the_title()
				);

				$imgSize = 'full';
				if(empty($full_size_img)){
					$attrs['style']	= 'height:225px !important;width:100%;object-fit: cover;';
					$imgSize = 'pix-portfolio-small';
				}

				$full_image_url = wp_get_attachment_image( get_post_thumbnail_id(), $full_size_img, false, $attrs );
				$img_src = $full_image_url;

				$output .='<a href="'. get_permalink() .'">';
					$output .= $img_src;
				$output .='</a>';
				$output .='<div class="d-flex">';
					$output .='<div class="align-self-center card-content-box">';
						$output .='<a class="text-'.$title_color.'" '.$t_custom_color.' href="'. get_permalink() .'">';
							$output .='<h6 class="card-title text-'.$title_color.' mb-2 mt-3 secondary-font"><strong>'. get_the_title() .'</strong></h6>';
						$output .='</a>';
					$output .='</div>';
				$output .='</div>';


				$output .= '<div class="card-footer text-right d-flex align-items-end2 px-0 py-1 w-100 bg-transparent" style="line-height:0;">';
					$output .= '<div class="flex-fill text-left">';
						$output .= $cats_str;
					$output .= '</div>';
					if( function_exists('get_pixfort_likes') ){
						$output .= '<div class="flex-fill justify-content-end d-flex align-items-center text-right">';
							$output .= get_pixfort_likes();
						$output .= '</div>';
					}
				$output .= '</div>';


			$output .='</div>';
		if($is_col) $output .='</div>';
	}
	return $output;
}


function pix_portfolio_style_mini($query=false, $is_col = false, $attr = array() ){
	$output = '';
	extract(shortcode_atts(array(
		'line_count' 		=> '4',
		'rounded_img' 		=> 'rounded-lg',
		'full_size_img' 		=> '',
		'customCats' 		=> ''
	), $attr));

	if ( $query && $query->have_posts() ){
		$query->the_post();

		$item_class = array();
		$item_text_class = array();
		$categories = '';

		if(is_array($customCats) && array_key_exists(get_post_type(), $customCats) ){
			$terms = get_the_terms(get_the_ID(), $customCats[get_post_type()] );
		}else{
			$terms = get_the_terms(get_the_ID(),'category');
		}
		if( is_array( $terms ) ){

			$cats_str = '';
			foreach( $terms as $term ){
				$item_class[] = 'category-'. $term->slug;
				$item_text_class[] = $term->slug;
				$categories .= '<a href="'. site_url() .'/?portfolio-types='. $term->slug .'">'. $term->name .'</a>, ';

				$badge_attrs = array(
					'text'	=> $term->name,
					'text_size'	=> 'custom',
					'text_custom_size'		=> '14px',
					'bold'  => 'font-weight-bold',
					'custom_css'	=> 'padding:5px 10px;line-height:14px;'
				);
				$cats_str .= '<a href="'. site_url() .'/?portfolio-types='. $term->slug .'">';
				$cats_str .= sc_pix_badge($badge_attrs);
				$cats_str .= '</a>';

			}
			$categories = substr( $categories , 0, -2 );

		}
			$item_class[] = get_post_meta( get_the_ID(), 'pix-post-size', true );
			$item_class[] = ' col-md-6 col-lg-'.$line_count;
			$item_class = implode(' ', $item_class);
			$item_text_class = implode(' ', $item_text_class);


			$attrs = array(
				'class'	=> 'card-img-top img-fluid',
				'loading' => 'lazy',
				'alt'	=> get_the_title()
			);
			$imgSize = 'full';
			if(empty($full_size_img)){
				$attrs['style']	= 'height:225px !important;width:100%;object-fit: cover;';
				$imgSize = 'pix-portfolio-small';
			}

			$full_image_url = wp_get_attachment_image( get_post_thumbnail_id(), $full_size_img, false, $attrs );
			$img_src = $full_image_url;
		if($is_col) $output .='<div class="col-12 pb-4 grid-item '. $item_class .'" data-category="transition">';
			$output .='<a href="'. get_permalink() .'" class=" fly-sm">';
				$output .='<div class="card bg-white '.$rounded_img.' overflow-hidden fly-sm shadow shadow-hover pix-mb-302 animate-in" data-anim-type="fade-in" data-anim-delay="200">';
				  $output .= $img_src;
				  $output .='<div class="card-body">';
					  $output .='<div class="d-flex justify-content-between align-items-center">';
						$output .='<h6 class="card-title mb-0 text-heading-default"><strong>'. get_the_title() .'</strong></h6>';
						$output .='<i class="pixicon-angle-right text-heading-default font-weight-bold"></i>';
					$output .='</div>';
				  $output .='</div>';
				$output .='</div>';
			$output .='</a>';

		if($is_col) $output .='</div>';
	}
	return $output;
}


function pix_portfolio_style_default($query=false, $is_col = false, $attr = array()){
	extract(shortcode_atts(array(
		'line_count' 		=> '4',
		'rounded_img' 		=> 'rounded-lg',
		'full_size_img' 		=> '',
		'customCats' 		=> ''
	), $attr));
	$output = '';
	
	if ( $query && $query->have_posts() ){
		$query->the_post();
		$item_class = array();
		$item_text_class = array();
		$categories = '';
		$cats_str = '';

		if(is_array($customCats) && array_key_exists(get_post_type(), $customCats) ){
			$terms = get_the_terms(get_the_ID(), $customCats[get_post_type()] );
		}else{
			$terms = get_the_terms(get_the_ID(),'category');
		}
		
		
		if( is_array( $terms ) ){
			foreach( $terms as $term ){
				$item_class[] = 'category-'. $term->slug;
				$item_text_class[] = $term->slug;
				$categories .= '<a href="'. get_term_link($term, get_post_type()) .'">'. $term->name .'</a>, ';
				$badge_attrs = array(
					'text'	=> $term->name,
					'text_size'	=> 'custom',
					'text_custom_size'		=> '14px',
					'bold'  => 'font-weight-bold',
					'custom_css'	=> 'padding:5px 10px;line-height:14px;'
				);
				$cats_str .= '<a class="mb-1 d-inline-block" href="'. get_term_link($term, get_post_type()) .'">';
				$cats_str .= sc_pix_badge($badge_attrs);
				$cats_str .= '</a>';
			}
			$categories = substr( $categories , 0, -2 );
		}
		$item_class[] = get_post_meta( get_the_ID(), 'pix-post-size', true );
		$item_class[] = ' col-md-6 col-lg-'.$line_count;

		$item_class = implode(' ', $item_class);
		$item_text_class = implode(' ', $item_text_class);

		if($is_col) $output .='<div class="col-12 pb-4 grid-item '. $item_class .'" data-category="transition">';
			$output .='<div class="card bg-white '.$rounded_img.' overflow-hidden fly-sm shadow w-100 animate-in" data-anim-type="fade-in" data-anim-delay="200">';
				$attrs = array(
					'class'	=> 'card-img img-fluid card-img-top rounded-0',
					// 'style'	=> 'height:225px !important;width:100%;object-fit: cover;',
					'loading' => 'lazy',
					'alt'	=> get_the_title()
				);
				$imgSize = 'full';
				if(empty($full_size_img)){
					$attrs['style']	= 'height:225px !important;width:100%;object-fit: cover;';
					$imgSize = 'pix-portfolio-small';
				}

				$full_image_url = wp_get_attachment_image( get_post_thumbnail_id(), $imgSize, false, $attrs );
				$output .='<a href="'. get_permalink() .'">';
					$img_src = $full_image_url;
					$output .= $full_image_url;
				$output .='</a>';
				$output .='<div class="pix-p-20">';
					$output .='<div class="d-flex">';
						$output .='<div class="align-self-center card-content-box">';
							$output .='<a class="text-heading-default" href="'. get_permalink() .'">';
								$output .='<h6 class="card-title mb-1 secondary-font"><strong>'. get_the_title() .'</strong></h6>';
							$output .='</a>';
						$output .='</div>';
					$output .='</div>';
					$output .= '<div class="card-footer text-right d-flex align-items-end2 px-0 py-1 w-100 bg-transparent" style="line-height:0;">';
						$output .= '<div class="flex-fill text-left">';
							$output .= $cats_str;
						$output .= '</div>';
						if( function_exists('get_pixfort_likes') ){
							$output .= '<div class="flex-fill justify-content-end d-flex align-items-center text-right">';
								$output .= get_pixfort_likes();
							$output .= '</div>';
						}
					$output .= '</div>';
				$output .= '</div>';
			$output .='</div>';
		if($is_col) $output .='</div>';
	}
	return $output;
}
