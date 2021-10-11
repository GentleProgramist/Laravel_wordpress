<?php

/* ---------------------------------------------------------------------------
 * Clients [clients]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_clients' ) )
{
    function sc_clients( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'in_row' 	=> 3,
			'style' 	=> 'pix-box',
			'clients' 	=> '',
      'css' 		=> '',
      'add_hover_effect' 		=> '',
      'animation' 		=> 'fade-in-Img',
      'delay' 		=> '0',
      'delay_items' 		=> '',
		), $attr));



        $css_class = '';
        $classes = array();
        if(function_exists('vc_shortcode_custom_css_class')){
            $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
        }
        $el_style = '';
        if($style =='no-effect'){
            $el_style = $style;
        }elseif ($style =='pix-box'){
          $style = 'client shadow-hover-lg rounded-xl';
        }

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

       if($add_hover_effect){ array_push($classes, $add_hover_effect_arr[$add_hover_effect] ); }
       $class_names = join( ' ', $classes );

		if( ! intval( $in_row ) ) $in_row = 6;


        $elementor = false;
        $clients_arr = array();
		if(is_array($clients)){
			$clients_arr = $clients;
			$elementor = true;
		}else{
			if(function_exists('vc_param_group_parse_atts')){
				$clients_arr = vc_param_group_parse_atts( $clients );
			}
		}

        $output = '';
        if(!empty($clients_arr)){



        $output  .= '<div class="clients row '.$el_style.' '. $css_class .'">';

        if($in_row!=5){
            $in_row = (int) 12 / $in_row;
        }

        foreach ($clients_arr as $key => $value) {
            $divRes = $key % $in_row;
            if($key % $in_row == 0) {
                $output .= '<div class="clearfix w-100 col-12"></div>';
            }
            $output .= '<div class="col-md col-12 -'.$in_row.' '.$class_names.' text-center client2 d-inline-block2 d-inline-flex '.$style.'">';

            if( empty($value['title']) ){
                $value['title'] = '';
            }
            $target = '_self';
            if( !empty($value['target']) ){
                $target = '_blank';
            }
            if( !empty($value['link']) ){
                $output .= '<a target="'.$target.'" href="'. $value['link'] .'" class="client2 align-self-center py-3 d-inline-block w-100" title="'. $value['title'] .'">';
            }else{
                $title = '';
                if(!empty($value['title'])) {
                    $title = $value['title'];
                }
                $output .= '<div class="py-3 d-inline-block align-self-center w-100" title="'. $title .'">';
            }
            if( !empty($value['image']) ) {
                $imgSrcset = '';
                $imgSizes = '';
                $imgWidth = '';
                $imgHeight = '';
                if(is_string($value['image'])&&substr( $value['image'], 0, 4 ) === "http"){
                    $img = $value['image'];
                    $imgSrc = $img;
                }else{
                    if($elementor){
                        $img = wp_get_attachment_image_src($value['image']['id'], "full");
                        $imgSrcset = wp_get_attachment_image_srcset($value['image']['id']);
                        $imgSizes = wp_get_attachment_image_sizes($value['image']['id'], "full");
                    }else{
                        $img = wp_get_attachment_image_src($value['image'], "full");
                        $imgSrcset = wp_get_attachment_image_srcset($value['image']);
                        $imgSizes = wp_get_attachment_image_sizes($value['image'], "full");
                    }
                    if(!empty($img[1]) && !empty($img[2])){
                        $imgWidth = 'width="'.$img[1].'"';
                        $imgHeight = 'height="'.$img[2].'"';
                    }
                    $imgSrc = $img[0];
                }
                $title = '';
                if(!empty($value['title'])) {
                    $title = $value['title'];
                }
                if(empty($imgSrcset)){
                    $output .= '<img src="'.$imgSrc.'" '.$imgWidth.' '.$imgHeight.' class="animate-in" alt="'.$title.'" data-anim-type="'.$animation.'" data-anim-delay="'.$delay.'">';
                }else{
                    $output .= '<img src="'.$imgSrc.'" srcset="'.$imgSrcset.'" sizes="'.$imgSizes.'" '.$imgWidth.' '.$imgHeight.' class="animate-in" alt="'.$title.'" data-anim-type="'.$animation.'" data-anim-delay="'.$delay.'">';
                }

            }
            if( !empty($value['link']) ){
                $output .= '</a>';
            }else{
                $output .= '</div>';
            }
            $output .= '</div>';
            if(!empty($delay_items)){
                $delay += 200;
            }
        }
        $mod = $in_row - (count($clients_arr) % $in_row);
        if($mod>0 && $mod < $in_row ){
            for ($i=0; $i < $mod; $i++) {
                $output .= '<div class="col-md"></div>';
            }
        }

        $output .= '</div>'."\n";



        }


		return $output;
	}
}

add_shortcode( 'clients', 'sc_clients' );

 ?>
