<?php
/**
 * Template part for displaying page intro
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package essentials
 */

$hide_top_area = false;
$post_type = get_post_type();
$pagePostTypes = array('page');
$pagePostTypes = apply_filters( 'pixfort_page_options_post_types', $pagePostTypes );

if(get_post_meta( get_the_ID(), 'pix-hide-top-area', true )){
    if(get_post_meta( get_the_ID(), 'pix-hide-top-area', true )==='1'){
        $hide_top_area = true;
    }
    if(in_array(get_post_type(), $pagePostTypes) ){
        if(empty(pix_get_option('pages-with-intro'))||!pix_get_option('pages-with-intro')){
            $hide_top_area = true;
        }
    }
}
if(!$hide_top_area){

    $divider_style = false;
    $divider_height = false;
    $is_class_color = false;
    $d_color = '#fff';

    $text_class = 'text-heading-default';
    $intro_dark = '';
    $intro_align = 'text-center';
    $intro_bred_align = 'justify-content-center';
    $intro_bg = 'bg-gray-2';
    $intro_style = '';
    $intro_opacity = 'pix-opacity-5';
    $disableTitle = false;
    $customTopPadding = false;
    $customBottomPadding = false;
    $title_sliding = 'pix-sliding-headline';
    $intro_parallax = 'data-jarallax';
    $show_breadcrumbs = true;

    if ( function_exists( 'is_woocommerce_activated' ) ) {
        global $woocommerce;
    }

    $type_prefix = 'blog';
    $is_shop_post = false;

    if(get_post_type()=='portfolio' || is_page_template('templates/template-portfolio-full-width.php')
        || is_page_template('templates/template-portfolio-default.php') ){
        $type_prefix = 'portfolio';
    }elseif(
        get_post_type()=='product'
        || is_page_template('templates/template-shop.php')
    ){
        $type_prefix = 'shop';
        if ( class_exists( 'WooCommerce' ) ) {
            $is_shop_post = true;
        }
    }elseif(get_post_type()=='post'
        || is_page_template('templates/template-blog-full-width.php')
        || is_page_template('templates/template-blog-with-offset.php')
        || is_page_template('templates/template-blog-without-sidebar.php')
        || is_page_template('templates/template-blog-left-sidebar.php')
        || is_page_template('templates/template-blog-right-sidebar.php')
        || is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag() || is_search()
    ){
        $type_prefix = 'blog';
    }elseif( in_array(get_post_type(), $pagePostTypes) || is_404() ){
        $type_prefix = 'pages';
        if ( class_exists( 'WooCommerce' ) ) {
            if ( is_cart() ) {
                $type_prefix = 'shop';
                $is_shop_post = true;
            }
        }
    }



    if(!empty(pix_get_option($type_prefix.'-divider-style'))) $divider_style = pix_get_option($type_prefix.'-divider-style');
    if(!empty(pix_get_option($type_prefix.'-divider-height'))) $divider_height = pix_get_option($type_prefix.'-divider-height');
    if(!empty(pix_get_option($type_prefix.'-intro-light'))) $intro_dark = 'pix-dark';
    if(!empty(pix_get_option($type_prefix.'-intro-align'))){
        $intro_align = pix_get_option($type_prefix.'-intro-align');
        if($intro_align=='text-left') $intro_bred_align = 'justify-content-start';
        if($intro_align=='text-right') $intro_bred_align = 'justify-content-end';
    }
    if(!empty(pix_get_option($type_prefix.'-intr-bg-color'))){
        $intro_bg = 'bg-'. pix_get_option($type_prefix.'-intr-bg-color');
    }
    if(!empty(pix_get_option($type_prefix.'-intro-opacity'))){
        $intro_opacity = pix_get_option($type_prefix.'-intro-opacity');
    }
    if(!empty(pix_get_option($type_prefix.'-bg-color'))){
        if(pix_get_option($type_prefix.'-bg-color')=='custom'){
            $d_color = pix_get_option('custom-'.$type_prefix.'-bg-color');
            $is_class_color = false;
        }else{
            $d_color = 'bg-'.pix_get_option($type_prefix.'-bg-color');
            $is_class_color = true;
        }
     }


     // Intro custom options
     if( !empty(pix_get_option($type_prefix.'-intro-top-height')) ){
         $customTopPadding = (int) pix_get_option($type_prefix.'-intro-top-height');
     }
     if( !empty(pix_get_option($type_prefix.'-intro-bottom-height')) ){
         $customBottomPadding = (int) pix_get_option($type_prefix.'-intro-bottom-height');
     }

     if( !empty(pix_get_option($type_prefix.'-disable-title-animation')) ){
         if(pix_get_option($type_prefix.'-disable-title-animation')){
             $title_sliding = '';
         }
     }
     if( !empty(pix_get_option($type_prefix.'-disable-intro-parallax')) ){
         if(pix_get_option($type_prefix.'-disable-intro-parallax')){
             $intro_parallax = '';
         }
     }
     if( !empty(pix_get_option($type_prefix.'-disable-intro-title')) ){
         if(pix_get_option($type_prefix.'-disable-intro-title')){
             $disableTitle = true;
         }
     }
     if( !empty(pix_get_option($type_prefix.'-disable-intro-breadcrumbs')) ){
         if(pix_get_option($type_prefix.'-disable-intro-breadcrumbs')){
             $show_breadcrumbs = false;
         }
     }



    // Default size for each divider
    $dividers_default_size = array(100, 250, 250, 150, 100, 200, 100,
                                   150, 250, 200, 150, 150, 140, 130,
                                   150, 130, 300, 300, 300, 300, 300,
                                   150, 250, 300);

        if(!$divider_height){
            $divider_height = $dividers_default_size[$divider_style];
        }
        // $containerpadding = 150;
        // $container_style = 'padding-top:'.$containerpadding.'px;padding-bottom:'.$containerpadding.'px;';
        // Padding amplification factor for each divider
        $dividers_padding_size = array(0.2, 0, 0, 0.4, 0.8, 0.2, 0.8,
                                       0.4, 0.1, 0.1, 0.4, 0.4, 0.8, 0.8,
                                       0.2, 0.2, 0.1, 0, 0, 0, 0,
                                       0.3, 0.3, 0.2);

        // Get extra padding depending on each divider
        $extra_padding = $divider_height * $dividers_padding_size[$divider_style];

        // Top divider padding
        if($customTopPadding!==false){
            $intro_padding_top = $customTopPadding;
        }else{
            $intro_padding_top = $divider_height * 0.5 + $extra_padding;
        }

        // Bottom divider padding
        if($customBottomPadding!==false){
            $intro_padding_bottom = $customBottomPadding;
        }else{
            if(!$divider_style){
                $intro_padding_bottom = $divider_height * 0.35 + $extra_padding;
            }else{
                $intro_padding_bottom = $divider_height * 0.6 + $extra_padding;
            }
        }


        // Padding CSS
        $container_style = 'padding-top:'.$intro_padding_top.'px;padding-bottom:'.$intro_padding_bottom.'px;';

        $customStyle = '';
        $customStyle .= '.pix-intro-container { '.$container_style.' }';

        if( !empty(pix_get_option($type_prefix.'-mobile-intro-top-height')) ){
            $customMobileTopPadding = (int) pix_get_option($type_prefix.'-mobile-intro-top-height');
            $customStyle .= '@media (max-width: 991px) { .pix-main-intro .pix-intro-container { padding-top:'.$customMobileTopPadding.'px !important; }}';
        }
        if( !empty(pix_get_option($type_prefix.'-mobile-intro-bottom-height')) ){
            $customMobileBottomPadding = (int) pix_get_option($type_prefix.'-mobile-intro-bottom-height');
            $customStyle .= '@media (max-width: 991px) { .pix-main-intro .pix-intro-container { padding-bottom:'.$customMobileBottomPadding.'px !important; }}';
        }

        wp_register_style( 'pix-intro-area-handle', false );
		wp_enqueue_style( 'pix-intro-area-handle' );
		wp_add_inline_style( 'pix-intro-area-handle', $customStyle );

    ?>


    <div class="pix-main-intro pix-intro-1 <?php echo esc_attr( $intro_bg ); ?>">
        <div class="pix-intro-img jarallax" <?php echo esc_attr($intro_parallax); ?> data-speed="0.5" >
    		<?php
            $get_default = true;
            if(is_category()){
                $term_id = get_queried_object()->term_id;

                $customIntroImg = get_term_meta( $term_id, 'category_intro_img', true );
                if($customIntroImg){
                    echo wp_get_attachment_image( $customIntroImg, 'pix-xxl', false, array('class' => 'jarallax-img '.$intro_opacity) );
                    $get_default = false;
                }
            }
            if($get_default){
                if(is_tax('portfolio-types')){
                    if(!empty(pix_get_option($type_prefix.'-intro-img'))){
                        echo wp_get_attachment_image( pix_get_option($type_prefix.'-intro-img')['id'], 'pix-xxl', false, array('class' => 'jarallax-img '.$intro_opacity) );
                    }
                }else{
                    if(!get_post_meta( get_the_ID(), 'pix-custom-intro-bg', true ) || get_post_meta( get_the_ID(), 'pix-custom-intro-bg', true )==''){
                        if(!empty(pix_get_option($type_prefix.'-intro-img'))){
                            echo wp_get_attachment_image( pix_get_option($type_prefix.'-intro-img')['id'], 'pix-xxl', false, array('class' => 'jarallax-img '.$intro_opacity) );

                        }
                    }else{
                        echo wp_get_attachment_image( get_post_meta( get_the_ID(), 'pix-custom-intro-bg', true ), 'pix-xxl', false, array('class' => 'jarallax-img '.$intro_opacity) );
                    }
                }
            }

             ?>
    	</div>

        <div class="container pix-intro-container <?php echo esc_attr( $intro_dark ); ?>">
            <div class="pix-main-intro-placeholder"></div>

            <div class="row d-flex h-100 justify-content-center">


                <div class="col-xs-12 col-lg-12">
                    <div class="<?php echo esc_attr( $intro_align ); ?> my-2">
    					<?php
                        $is_shop = false;
                        $is_product = false;
                        if ( class_exists( 'WooCommerce' ) ) {
                            $is_shop = is_shop() || is_product_category() || (get_post_type()=='product');
                            if(get_post_type()=='product' && !is_shop() ){
                                $is_product = true;
                            }

                        }


                            if( ( !is_404() && !is_search() && !is_archive() && !is_author()) || $is_shop ){
                                if(!$disableTitle){
                                    if($is_shop_post || $is_shop){
                                        if($is_product && !is_archive()){
    									?>
                                        <h1 class="<?php echo esc_attr($title_sliding); ?> h3  <?php echo esc_attr( $text_class ); ?> font-weight-bold" data-class="<?php echo esc_attr( $text_class ); ?>"><?php echo esc_attr( the_title() ); ?></h1>
                                        <?php
    									}else{
                                        ?>
                                        <h1 class="<?php echo esc_attr($title_sliding); ?> h3  <?php echo esc_attr( $text_class ); ?> font-weight-bold" data-class="<?php echo esc_attr( $text_class ); ?>"><?php echo esc_attr( woocommerce_page_title(false) ); ?></h1>
                                        <?php
    									}
                                    }else{
                                        ?>
                                        <h1 class="<?php echo esc_attr($title_sliding); ?> h3 <?php echo esc_attr($text_class);?> font-weight-bold" data-class="<?php echo esc_attr($text_class);?>"><?php single_post_title('', true); ?></h1>
                                        <?php
                                    }

                                }
                                ?>
                                <div>
                                <?php
                                    if($show_breadcrumbs) pix_get_breadcrumb('dark', $intro_bred_align);
                                ?>
                                </div>
                                <?php
                            }elseif( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag() ){
                                the_archive_title( '<h1 class="'.esc_attr($title_sliding).' h3 '.esc_attr($text_class).' font-weight-bold" data-class="'.esc_attr($text_class).'">', '</h1>' );
                                if($show_breadcrumbs) pix_get_breadcrumb('dark', $intro_bred_align);
                            }elseif( is_search() ) {
                                ?>
                                <h1 class="<?php echo esc_attr($title_sliding); ?> h3 <?php echo esc_attr($text_class);?> font-weight-bold" data-class="<?php echo esc_attr($text_class);?>"><?php
                                printf( esc_attr__( 'Search Results for: %s', 'essentials' ), '<span>' . get_search_query() . '</span>' );
                                ?></h1>
                                <?php
                            }
    					?>
                    </div>
                </div>


            </div>
        </div>
        <div class="">
    	<?php

            if(!empty($divider_style)){
            	if( function_exists('pix_get_divider') ){
            		$b_divider_opts = array(
            			'd_divider_select'		=> $divider_style,
            			'd_layers'				=> '3',
            			'd_1_is_gradient'			=> '',
            			'd_1_color'					=> $d_color,
            			'is_class_color'					=> $is_class_color,
            			'd_2_is_gradient'			=> '',
            			'd_2_animation'				=> 'fade-in-up',
            			'd_2_delay'					=> '500',
            			'd_3_is_gradient'			=> '',
            			'd_3_color_2'				=> '',
            			'd_3_animation'				=> 'fade-in-up',
            			'd_3_delay'					=> '700',
            			'd_high_index'				=> '',
            			'd_flip_h'					=> '',
            			'extra_classes'					=> '',
            		);

                    if($divider_height){
                        echo pix_get_divider($divider_style, '#fff', 'bottom', false, '#fff', $b_divider_opts, $divider_height);
                    }else{
                        echo pix_get_divider($divider_style, '#fff', 'bottom', false, '#fff', $b_divider_opts);
                    }

            	}
        	}
    	?>
        </div>
    </div>



<?php

}
 ?>
