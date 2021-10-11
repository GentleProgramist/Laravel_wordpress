<?php


/* ---------------------------------------------------------------------------
 * Image [pix_slider] [/pix_slider]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_slider' ) ){

	function sc_pix_slider( $attr, $content = null ){
		extract(shortcode_atts(array(
			'items'  => '',
			'rounded_img'  => 'rounded-0',
			'align'  => 'text-left',
			'nav_style'  => 'default',
			'nav_align'  => 'center',
			'circles_color'  => 'gradient-primary',
			// 'pix_scroll_parallax' 	=> '',
			// 'pix_tilt' 	=> '',
			// 'pix_tilt_size' 	=> 'tilt',
			// 'xaxis' 	=> '',
			// 'yaxis' 	=> '',
			'bold'		=> 'font-weight-bold',
			'italic'		=> '',
			'secondary_font'		=> '',
			'title_color'		=> 'heading-default',
			'title_custom_color'		=> '',
			'title_size'		=> 'h2',
			'title_custom_size'		=> '',
            'content_color'		=> 'body-default',
			'content_custom_color'		=> '',
			'content_size'		=> 'text-24',

			'overlay_color'		=> 'black',
			'overlay_custom_color'		=> '',
			'overlay_opacity'		=> 'pix-opacity-7',


			'slider_num'  => '1',
			'dots_style' 	=> '',
			'slider_style' 	=> 'pix-style-standard',
			'autoplay' 	=> false,
			'autoplay_time' 	=> '2500',
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


			'animation' 	=> '',
			'delay' 	=> '0',
            'style' 		=> '',
            'hover_effect' 		=> '',
            'add_hover_effect' 		=> '',
            'pix_infinite_animation' 		=> '',
            'pix_infinite_speed' 		=> '',
            'top_placholder' 		=> '',
			'css' 		=> '',
		), $attr));

		$css_class = '';
		if(function_exists('vc_shortcode_custom_css_class')){
		    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
		}

		$elementor = false;
		$slides_arr = array();
		if(is_array($items)){
			$slides_arr = $items;
			$elementor = true;
		}else{
			if(function_exists('vc_param_group_parse_atts')){
				$slides_arr = vc_param_group_parse_atts( $items );
			}
		}


		$slider_header_placeholder = '';
		if(!empty($top_placholder)){
			$slider_header_placeholder = '<div class="pix-main-intro-placeholder"></div>';
		}


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

        $output = '';
		$classes = array();
		$effect_classes = array();
		$anim_type = '';
		$anim_delay = '';

		array_push($classes, esc_attr( $css_class ));

		if($style){
			array_push($effect_classes, $style_arr[$style]);
		}
		if($hover_effect){
			array_push($effect_classes, $hover_effect_arr[$hover_effect]);
		}
		if($add_hover_effect){
			array_push($effect_classes, $add_hover_effect_arr[$add_hover_effect]);
		}

		$t_classes = array();
		$t_custom_color = '';
		if(!empty($title_color)){
			if($title_color!='custom'){
				array_push($t_classes, 'text-'.$title_color );
			}else{
				$t_custom_color = 'color:'.$title_custom_color.';';
			}
		}

        if(!empty($bold)) array_push($t_classes, $bold );
		if(!empty($italic)) array_push($t_classes, $italic );
		if(!empty($secondary_font)) array_push($t_classes, $secondary_font );
        array_push($t_classes, 'mb-0' );

        $title_tag = $title_size;
		$t_size_style = '';
		if($title_size == 'custom'){
			$title_tag = "h2";
			$t_size_style = "font-size:". $title_custom_size .';';
		}

        $t_class_names = join( ' ', $t_classes );


        $c_color = '';
        $c_custom_color = '';
        if(!empty($content_color)){
            if($content_color!='custom'){
                $c_color = 'text-'.$content_color;
            }else{
                $c_custom_color = 'color:'.$content_custom_color.';';
            }
        }


		// if(!empty($align)){
		// 	array_push($classes, $align);
		// 	array_push($classes, "w-100");
		// }
		$inline_style = '';
		// if(!empty($width)){
		// 	$inline_style .= 'max-width:'.$width.';';
		// }else{
		// 	if(!empty($height)){
		// 		$inline_style .= 'width:auto;';
		// 	}
		// }
		// if(!empty($height)){
		// 	$inline_style .= 'max-height:'.$height.';';
		// }else{
		// 	$inline_style .= 'height:auto;';
		// }
		// array_push($classes, 'd-inline-block');
		$anim_type = '';
		$anim_delay = '';
		if(!empty($animation)){
			$anim_type = 'data-anim-type="'.$animation.'"';
			$anim_delay = 'data-anim-delay="'.$delay.'"';
			array_push($classes, 'animate-in');
		}


		$inline_style = 'style="'.$inline_style.'"';
		$class_names = join( ' ', $classes );
		$effect_class_names = join( ' ', $effect_classes );

		// $jarallax = '';
		// if($pix_scroll_parallax){
		// 	$jarallax = 'data-jarallax-element="'. $xaxis .' '. $yaxis .'"';
		// }

		$el_style = '';
		if($overlay_color=='custom'){
			$el_style = 'style="background:'.$overlay_custom_color.';"';
		}

		$nav_class = 'bg-black';
		$out_class = $rounded_img;
		$top_class = '';
		if($nav_style=='circles'){
			$nav_class = 'pix-style-2';
			$top_class = $rounded_img . ' overflow-hidden '.$effect_class_names;
			if($circles_color=='transparent'){
				$circles_color .= ' p-0';
			}
		}else{
			$nav_class = 'bg-'.$overlay_color;
			$out_class = $effect_class_names . ' '.$rounded_img . ' overflow-hidden';
		}

		$navigation = '';

		$slider_id = "pix-slider-".wp_rand(0,10000000);



		$columns_align_size = 'col-md-8 offset-md-2';
		if($align=='text-left'){
			$columns_align_size = 'col-md-8';
		}elseif ($align=='text-right') {
			$columns_align_size = 'col-md-8 offset-md-4';
		}
		if(!empty($slides_arr)){

			if(!filter_var($autoplay, FILTER_VALIDATE_BOOLEAN)){
				$autoplay_time = false;
			}else{
				$autoplay_time = (int)$autoplay_time;
			}
			$slider_data = '';
			$pix_id = "pix-slider-".rand(1,200000000);
			$slider_opts = array(
				"autoPlay"			=> $autoplay_time,
				"wrapAround"			=> true,
				// "freeScroll"		=> filter_var($freescroll, FILTER_VALIDATE_BOOLEAN),
				// "prevNextButtons"	=> filter_var($prevnextbuttons, FILTER_VALIDATE_BOOLEAN),
				// "prevNextButtons"	=> false,
				// "wrapAround"		=> filter_var($slider_wrap, FILTER_VALIDATE_BOOLEAN),
				// "pageDots"			=> false,
				// "adaptiveHeight"	=> filter_var($adaptiveheight, FILTER_VALIDATE_BOOLEAN),
				// "rightToLeft"		=> filter_var($righttoleft, FILTER_VALIDATE_BOOLEAN),
				// "cellAlign" 		=> $cellalign,
				// "contain"			=> true,
				// "imagesLoaded"			=> true,
				// "pix_id"			=>  '#'.$pix_id,
			);
			$slider_data = json_encode($slider_opts);
			$slider_data = 'data-flickity=\''. $slider_data .'\'';


			$output .= '<div class="pix-slider-div '.$class_names.' '.$out_class.'" '.$anim_type.' '.$anim_delay.' >';
				$output .= '<div id="'.$pix_id.'" class="pix-slider '.$top_class.' bg-'.$overlay_color.' pix-slider-full no-dots" '.$el_style.' '.$slider_data.'>';
				// $output  .= '<div id="'.$pix_id.'" class="pix-main-slider '.$top_class.' pix-fix-x pix-with-nav bg-'.$overlay_color.' '.$visible_overflow.' '.$visible_y.' pix-slider-full no-dots " '.$el_style.' '.$slider_data.'>';

				$c_delay = 400;
				foreach ($slides_arr as $key => $value) {


					if(!empty($value['image'])){

						$imgSrcset = '';
						$img_sm = '';
						$imgSrc = '';
						if(is_string($value['image'])&&substr( $value['image'], 0, 4 ) === "http"){
							$imgSrc = $value['image'];
							$img_sm = $value['image'];
						}else{
							if(is_array($value['image'])&&!empty($value['image']['id'])){
								$img = wp_get_attachment_image_src($value['image']['id'], "full");
								$imgSrcset = wp_get_attachment_image_srcset($value['image']['id']);
								$img_sm = wp_get_attachment_image_src($value['image']['id'], "full");
							}else{
								$img = wp_get_attachment_image_src($value['image'], "full");
								$imgSrcset = wp_get_attachment_image_srcset($value['image']);
								$img_sm = wp_get_attachment_image_src($value['image'], "full");
							}
							if(!empty($img[0])){
								$imgSrc = $img[0];
							}
							if(!empty($img_sm[0])){
								$img_sm = $img_sm[0];
							}
						}


			            // $img = wp_get_attachment_image_src($value['image'], "full");
						// $imgSrcset = wp_get_attachment_image_srcset($value['image']);
			            // $imgSrc = $img[0];

						$output .= '<div class="carousel-cell p-0">
							            <div class="pix-intro-1 d-inline-block w-100" >
							                <div class="pix-intro-img jarallax-slider2 w-100" data-jarallax2 data-speed="0.4" ><img class="jarallax-img2 '.$overlay_opacity.' pix-fit-cover w-100" src="'.$imgSrc.'" data-srcset="'.$imgSrcset.'" alt="" /></div>
							                <div class="container">
							                    <div class="row row-eq-height align-items-center pix-py-200" >
													'.$slider_header_placeholder.'
							                        <div class="col-12 '.$columns_align_size.' pix-py-50 pix-px-40 d-md-flex">
							                            <div class="w-100 '.$align.'">';
														if(!empty($value['link']) && empty($value['btn_text'])){
															$target = '';
															if(!empty($value['target'])) $target = 'target="_blank"';
															$output .= '<a href="'.$value['link'].'" '.$target.'>';
														}
							                            if(!empty($value['title'])) $output .= '<'.$title_tag.' class="pix-sliding-headline '.$t_class_names.' animate-in" data-anim-type="fade-in-up" data-anim-delay="1000" style="'.$t_custom_color. $t_size_style.'">'.do_shortcode($value['title']).'</'.$title_tag.'>';
							                            if(!empty($value['text'])) {
															$output .= '<p class="'.$content_size.' pix-mt-10 '.$c_color.' '.$content_size.' animate-in" data-anim-type="fade-in" data-anim-delay="1300" style="'.$c_custom_color.'">';
								                                $output .= do_shortcode($value['text']);
								                            $output .= '</p>';
														}
														if(!empty($value['btn_text'])){
															$attr['btn_text'] = $value['btn_text'];
															$attr['btn_link'] = $value['link'];
															if(!empty($value['btn_popup_id'])) {
																$attr['btn_popup_id'] = $value['btn_popup_id'];
															}else{
																$attr['btn_popup_id'] = false;
															}
															$attr['css'] = '';
															if(!empty($value['target'])) $attr['btn_target'] = $value['target'];
															$output .= '<div class="pix-pt-10">'. sc_pix_button($attr) .'</div>';
														}
														if(!empty($value['link']) && empty($value['btn_text'])){
															$output .= '</a>';
														}
							                            $output .= '</div>
							                        </div>
							                    </div>
							                </div>
							            </div>
							        </div>';




						if($nav_style=='circles'){
							$navigation .= '<div class="carousel-cell">
								<div class="dot-img-container bg-'.$circles_color.' shadow-lg shadow-hover-lg fly-sm  animate-in"  data-anim-type="fade-in-right" data-anim-delay="'.$c_delay.'">
								<div class="dot-img-container-inner">
					            <img class="img-fluid" src="'.$img_sm.'" alt="" />
								</div>
								</div>
					        </div>';
							$c_delay += 100;
						}else{
							$navigation .= '<div class="carousel-cell">
								<div class="dot-img-container">
								<div class="dot-img-container-inner">
					            <img class="img-fluid" src="'.$img_sm.'" alt="" />
								</div>
								</div>
					        </div>';
						}
			        }

				}
				$output .= '</div>';
				if($nav_style=='circles'){
					$output .= '<div class="container"><div class="row"><div class="col-12 px-0">';
				}

				$output .= '<div class="pix-slider-nav-full '.$nav_class.'  bg-gradient-primary2 animate-in" data-anim-type="fade-in" data-anim-delay="200" data-nav-align="'.$nav_align.'" data-slider="#'.$pix_id.'" '.$el_style.'>';
					$output .= $navigation;
				$output .= '</div>';

				if($nav_style=='circles'){
					$output .= '</div>';
					$output .= '</div>';
					$output .= '</div>';
				}

			$output .= '</div>';
		}




		return $output;
	}
}


add_shortcode( 'pix_slider', 'sc_pix_slider' );

 ?>
