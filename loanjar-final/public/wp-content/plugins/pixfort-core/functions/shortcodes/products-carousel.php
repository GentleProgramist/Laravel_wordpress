<?php


/* ---------------------------------------------------------------------------
* Image [pix_products_carousel] [/pix_products_carousel]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_products_carousel' ) ){

	function sc_pix_products_carousel( $attr, $content = null ){
		extract(shortcode_atts(array(
			'product_style'  => '',

			'count'  => 6,
			'category'  => '',
			'category_multi'  => '',
			'orderby'  => 'title',
			'order'  => 'ASC',

			'rounded_img' 		=> 'rounded-lg',
			'style' 		=> '',
			'hover_effect' 		=> '',
			'add_hover_effect' 		=> '',


			'align'  => 'text-left',
			'slider_num'  => '3',
			'pix_scroll_parallax' 	=> '',
			'pix_tilt' 	=> '',
			'pix_tilt_size' 	=> 'tilt',
			'xaxis' 	=> '',
			'yaxis' 	=> '',
			'animation' 	=> '',
			'delay' 	=> '0',
			'style' 		=> '',
			'hover_effect' 		=> '',
			'add_hover_effect' 		=> '',
			'pix_infinite_animation' 		=> '',
			'pix_infinite_speed' 		=> '',
			// 'dots_style' 	=> '',

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


			'css' 		=> '',
		), $attr));

		if(!class_exists('WC_Product_Query')) return '';
		$css_class = '';
		if(function_exists('vc_shortcode_custom_css_class')){
			$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
		}

		$output = '';
		$classes = array();
		$anim_type = '';
		$anim_delay = '';
		// array_push($classes, esc_attr( $css_class ));
		if(!empty($align)){
			array_push($classes, $align);
			array_push($classes, "w-100");
		}
		array_push($classes, 'd-inline-block');
		$class_names = join( ' ', $classes );

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
			"slider_style"			=> $slider_style,
			"pix_id"			=>  '#'.$pix_id,
		);
		$slider_data = json_encode($slider_opts);
		$slider_data = 'data-flickity=\''. $slider_data .'\'';
		if($visible_overflow=='pix-overflow-all-visible') $visible_y = '';



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


		$extra_classes = array();
		if($style){ array_push($extra_classes, $style_arr[$style] ); }
		if($hover_effect){ array_push($extra_classes, $hover_effect_arr[$hover_effect] ); }
		if($add_hover_effect){ array_push($extra_classes, $add_hover_effect_arr[$add_hover_effect] ); }
		$extra_classes = join( ' ', $extra_classes );
		$extra_classes .= ' '.$rounded_img;

		// $output  .= '<div class="pix-shop-carousel main-carousel pix-overflow-p-visible pix-fix-x pix-slider-left pix-opacity-slider-1 pix-overflow-y-visible2 pix-slider-'.$slider_num.' pix-slider-dots '.$dots_style.'">';
		$output  .= '<div class="'.$css_class.'">';
		$output  .= '<div id="'.$pix_id.'" class="pix-main-slider pix-shop-carousel pix-fix-x2 '.$visible_overflow.' '.$slider_style.' '.$slider_effect.' '.$slider_scale.' '.$visible_y.' pix-slider-'.$slider_num.' pix-slider-dots '.$dots_style.' '.$dots_align.'" '.$slider_data.'>';

		$args = array(
			// 'sku' => $groupSku,
			'post_type' => 'product',
			'orderby' => $orderby,
			'order' => $order,
			'posts_per_page' => $count,
			// 'orderby' => $ordered_by,
			// 'exclude' => array($product->get_id())
		);
		// categories
		if( $category_multi ){
			$args['category'] = explode(',', trim( $category_multi ) );
		} elseif( $category ){
			$args['category'] = $category;
		}
		$query = new WC_Product_Query($args);
		$sku_products = $query->get_products();
		//print_r($products);

		if ($sku_products) :
			foreach ($sku_products as $sku_product) :
				$output .= '<div class="carousel-cell">';
				$output .= '<div class="slide-inner '.$cellpadding.'">';
				$output .= '<div class="pix-slider-effects">';

				global $item_style;
				global $item_extra_classes;
				$item_style = $product_style;
				$item_extra_classes = $extra_classes;
				// $post_object = get_post($sku_product->get_id());
				// setup_postdata($GLOBALS['post'] =& $post_object);
				// wc_get_template_part('content', 'product');
				// $output .= get_template_part( 'woocommerce/pixfort/product-top-img' );

				$output .= do_shortcode('[products test6="asd" ids="'.$sku_product->get_id().'"]');
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';

			endforeach;


		endif;
		wp_reset_postdata();




		$output .= '</div>';
		$output .= '</div>';




		return $output;
	}
}


add_shortcode( 'pix_products_carousel', 'sc_pix_products_carousel' );

?>
