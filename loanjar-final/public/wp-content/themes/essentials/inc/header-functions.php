<?php
/**
* Functions which enhance the header builder by hooking into WordPress
*
* @package essentials
*/

/**
* Main Header parsing function
*/
function pix_get_header_elem($area, $data, $extra = false){
    $output = '';
    $opts = array();
    $opts['area']=$area;
    if(!empty($data->val)){
        foreach ($data->val as $i => $v) {
            if(!empty($v->val)){
                $opts[$v->name] = $v->val;
            }
        }
    }
    if(!empty($extra)){
        $opts = array_merge($opts, $extra);
    }
    $type = $data->name;

    if(!empty($opts['permissions'])){
        $is_logged = is_user_logged_in();
        if( ($opts['permissions']=='logged-in' && !$is_logged) || ($opts['permissions']=='logged-out' && $is_logged)){
            return '';
        }
    }

    switch ($type) {
        case 'text':
        $output = pix_get_header_text($opts);
        break;
        case 'link':
        $output = pix_get_header_link($opts);
        break;
        case 'phone':
        $output = pix_get_header_phone($opts);
        break;
        case 'address':
        $output = pix_get_header_address($opts);
        break;
        case 'space':
        $output = pix_get_header_space($opts);
        break;
        case 'divider':
        $output = pix_get_header_divider($opts);
        break;
        case 'social':
        $output = pix_get_header_social($opts);
        break;
        case 'search':
        $output = pix_get_header_search($opts);
        break;
        case 'logo':
        $output = pix_get_header_logo($opts);
        break;
        case 'menu':
        $output = pix_get_header_menu($opts);
        break;
        case 'cart':
        $output = pix_get_header_cart($opts);
        break;
        case 'wishlist':
        $output = pix_get_header_wishlist($opts);
        break;
        case 'language':
        $output = pix_get_header_language($opts);
        break;
        case 'btn':
        $output = pix_get_header_button($opts);
        break;
    }

    return $output;
}

/**
* Header Text element
*/
if( !function_exists('pix_get_header_link') ){
    function pix_get_header_text($opts){
        extract(shortcode_atts(array(
            'text' 		=> esc_attr__('Default Text', 'essentials'),
            'bold' 		=> '',
            'icon' 		=> '',
            'is_secondary_font' 		=> '',
            'color' 		=> 'body-default',
            'custom_color' 		=> '',
            'animation' 		=> 'disabled',
        ), $opts));
        $classes = '';
        $classes .= 'text-'.$color;

        if(!empty($bold)){
            $classes .= ' font-weight-bold';
        }
        if(!empty($is_secondary_font)){
            $classes .= ' secondary-font';
        }
        if($animation!='disabled'){
            $classes .= ' animate-in';
        }
        ?>
        <div data-anim-type="<?php echo esc_attr($animation); ?>" class="d-inline-flex line-height-1 align-items-center text-sm pix-header-text pix-py-5 <?php echo esc_attr( $classes ); ?> mb-0">
            <?php if(!empty($icon)){ ?>
                <i class="<?php echo esc_attr($icon); ?> text-18 pix-mr-5 pix-header-icon-style"></i>
            <?php } ?>
            <span class="line-height-1"><?php echo do_shortcode($text); ?></span>
        </div>
        <?php
    }
}

/**
* Header Link element
*/
if( !function_exists('pix_get_header_link') ){
    function pix_get_header_link($opts){
        extract(shortcode_atts(array(
            'text' 		=> '',
            'url' 		=> '',
            'target' 		=> '',
            'bold' 		=> '',
            'icon' 		=> '',
            'is_secondary_font' 		=> '',
            'arrow' 		=> '',
            'color' 		=> 'body-default',
            'custom_color' 		=> '',
            'animation' 		=> 'disabled',
        ), $opts));
        $classes = '';
        $classes .= 'text-'.$color;
        if(!empty($bold)){
            $classes .= ' font-weight-bold';
        }
        if(!empty($is_secondary_font)){
            $classes .= ' secondary-font';
        }
        if($animation!='disabled'){
            $classes .= ' animate-in';
        }
        $arrow_html = '';

        $custom = '';
        if(!empty($color)&&$color=='custom'){
            if(!empty($custom_color)){
                $custom = '"color:'.$custom_color.';';
            }
        }
        $target_out = '';
        if(!empty($target)&&$target){
            $target_out = 'target="_blank"';
        }
        ?>
        <div class="d-inline-flex align-items-center2 line-height-1 pix-py-5 pix-hover-item mb-0">
            <a data-anim-type="<?php echo esc_attr($animation); ?>" class="<?php echo esc_attr($classes); ?> btn btn-link p-0 line-height-1 pix-header-text text-sm  d-inline-flex2 align-items-center2" href="<?php echo esc_url($url); ?>" <?php echo esc_attr( $target_out) . ' style="' . esc_attr( $custom ); ?>" >
                <?php if(!empty($icon)){ ?>
                    <i class="<?php echo esc_attr($icon); ?> pix-header-icon-format pix-mr-5 pix-header-icon-style"></i>
                <span><?php } ?><?php echo do_shortcode($text); ?></span>
                <?php if($arrow){ ?><i class="font-weight-bold pixicon-angle-right pix-header-icon-format pix-hover-right ml-2"></i><?php } ?>
            </a></div>
            <?php
    }
}

/**
* Header Button element
*/
if( !function_exists('pix_get_header_button') ){
    function pix_get_header_button($opts){
        extract(shortcode_atts(array(
            'text' 		=> esc_attr__('Default Text', 'essentials'),
            'url' 		=> '',
            'btn_popup_id' 		=> '',
            'area' 		=> '',
            'target' 		=> '',
            'bold' 		=> '',
            'is_secondary_font' 		=> '',
            'arrow' 		=> '',
            'color' 		=> 'body-default',
            'btn_style' 		=> '',
            'btn_color' 		=> 'light',
            'btn_text_color' 		=> '',
            'btn_rounded' 		=> '',
            'custom_btn_color' 		=> '#333',
            'custom_btn_text_color' 		=> '#fff',
            'btn_icon' 		=> '',
            'btn_icon_position' 		=> '',
            'animation' 		=> 'disabled',
            'permissions' 		=> '',
        ), $opts));

        $classes = '';
        $custom = '';
        if($btn_style=='line'){
           $classes .= 'btn-line-'.$btn_color;
       }elseif ($btn_style=='outline') {
            $classes .= 'btn-outline-'.$btn_color;
        }elseif ($btn_style=='underline') {
            if (strpos($btn_color, 'dark-') === 0||strpos($btn_color, 'light-') === 0) {
                $classes .= ' btn-underline-primary ';
            }else{
             $classes .= 'btn-underline-'.$btn_color;
           }
         }elseif ($btn_style=='blink') {
              $classes .= 'btn-blink-'.$btn_color;

         }elseif ($btn_style=='link') {
              $classes .= 'btn-link text-'.$btn_color;
          }else{
            if (strpos($btn_color, 'dark-') === 0||strpos($btn_color, 'light-') === 0) {
                $classes .= ' bg-'.$btn_color;
                $classes .= ' btn-primary btn-custom-bg ';
            }else{
                $classes .= 'btn-'.$btn_color;
            }

        }
        if($btn_style=='flat'){
           $classes .= ' btn-flat';
       }
       if($animation!='disabled'){
           $classes .= ' animate-in';
       }
       if(!empty($btn_rounded)){
        $classes .= ' btn-rounded';
       }
       if(!empty($btn_text_color)){
        $classes .= ' text-'.$btn_text_color;
       }
       if($area!='header'){
           $classes .= ' btn-sm pix-py-10';
       }
       $popup_data = '';
       if(!empty($btn_popup_id)){
    		$classes .= ' pix-popup-link';
    		$nonce = wp_create_nonce("popup_nonce");
    		$link = admin_url('admin-ajax.php?action=pix_popup_content&id='.$btn_popup_id.'&nonce='.$nonce);
    		$popup_data = $link;
    	}

        if($btn_color=='body-default'||$btn_color=='heading-default'||$btn_color=='gradient-primary'){
            $classes .= ' bg-'.$btn_color;
            if(!empty($custom_btn_text_color)){
                $custom .= 'color:#fff;';
            }
        }
        if(!empty($bold)){
            $classes .= ' font-weight-bold';
        }
        if(!empty($is_secondary_font)){
            $classes .= ' secondary-font';
        }
        if(!empty($btn_color)&&$btn_color=='custom'){
            if(!empty($custom_btn_color)){
                $custom .= 'background:'.$custom_btn_color.';';
            }

        }
        if(!empty($custom_btn_text_color)&&$btn_color=='custom'){
            $custom .= 'color:'.$custom_btn_text_color.';';
        }
        $target_out = '';
        if(!empty($target)&&$target){
            $target_out = 'target="_blank"';
        }
        ?>
        <div class="d-inline-flex align-items-center d-inline-block2 text-sm mb-0">
            <a data-anim-type="<?php echo esc_attr($animation); ?>" class="btn <?php echo esc_attr( $classes ); ?> d-flex align-items-center mr-0" href="<?php echo esc_url( $url ); ?>" <?php echo esc_attr( $target_out) . ' style="' . esc_attr( $custom ); ?>" data-popup-link="<?php echo esc_attr($popup_data);?>" >
            <?php 
                if (  !empty( $btn_icon ) && empty($btn_icon_position) ) { ?>
                    <i class="<?php echo esc_attr($btn_icon); ?> mr-1"></i>
            <?php } ?>
                <span><?php echo do_shortcode($text); ?></span>
            <?php 
                if (  !empty( $btn_icon ) && !empty($btn_icon_position) ) { ?>
                    <i class="<?php echo esc_attr($btn_icon); ?> ml-1"></i>
            <?php } ?>
            </a>
        </div>
        <?php
    }
}

/**
* Header Phone element
*/
if( !function_exists('pix_get_header_phone') ){
    function pix_get_header_phone($opts){
        extract(shortcode_atts(array(
            'text' 		=> '',
            'bold' 		=> '',
            'is_secondary_font' 		=> '',
            'color'     => 'body-default',
            'custom_color' 	            	=> '',
            'animation' 		=> 'disabled',
        ), $opts));
        $classes = '';
        $classes .= 'text-'.$color;
        if(!empty($bold)){
            $classes .= ' font-weight-bold';
        }
        if(!empty($is_secondary_font)){
            $classes .= ' secondary-font';
        }
        if($animation!='disabled'){
            $classes .= ' animate-in';
        }
        $custom = '';
        if(!empty($color)&&$color=='custom'){
            if(!empty($custom_color)){
                $custom = 'color:'.$custom_color.';';
            }
        }
        $tel = str_replace(' ', '', $text);
        ?>
        <a data-anim-type="<?php echo esc_attr($animation); ?>" href="tel:<?php echo esc_attr($tel);?>" class="pix-header-phone text-sm d-inline-block2 pix-header-text d-inline-flex align-items-center pix-py-5 <?php echo esc_attr( $classes ); ?> mb-0" style="<?php echo esc_attr( $custom ); ?>" ><i class="pixicon-phone text-18 pix-mr-5 pix-header-icon-style"></i> <?php echo esc_html($text);?></a>
        <?php
    }
}

/**
* Header Address element
*/
if( !function_exists('pix_get_header_address') ){
    function pix_get_header_address($opts){
        extract(shortcode_atts(array(
            'text' 		=> '',
            'bold' 		=> '',
            'is_secondary_font' 		=> '',
            'color'     => 'body-default',
            'custom_color' 	            	=> '',
            'animation' 		=> 'disabled',
        ), $opts));
        $classes = '';
        $classes .= 'text-'.$color;
        if(!empty($bold)){
            $classes .= ' font-weight-bold';
        }
        if(!empty($is_secondary_font)){
            $classes .= ' secondary-font';
        }
        if($animation!='disabled'){
            $classes .= ' animate-in';
        }
        $custom = '';
        if(!empty($color)&&$color=='custom'){
            if(!empty($custom_color)){
                $custom = 'color:'.$custom_color.';';
            }
        }
        if(empty($opts['text'])) $opts['text'] = '';
        ?>
        <div data-anim-type="<?php echo esc_attr($animation); ?>" class="d-inline-block2 d-inline-flex align-items-center line-height-1 pix-header-text pix-py-5 text-sm <?php echo esc_attr( $classes ); ?> mb-0" style="<?php echo esc_attr( $custom ); ?>" ><i class="pixicon-map-pin-1-circle text-18 pix-mr-5 pix-header-icon-style"></i> <?php echo esc_html($text);?></div>
        <?php
    }
}

/**
* Header Space element
*/
if( !function_exists('pix_get_header_space') ){
    function pix_get_header_space($opts){
        extract(shortcode_atts(array(
            'size' 		=> 'mx-2',
        ), $opts));
        ?>
        <span class="<?php echo esc_attr( $size ); ?>"></span>
        <?php
    }
}

/**
* Header Divider element
*/
if( !function_exists('pix_get_header_divider') ){
    function pix_get_header_divider($opts){
        extract(shortcode_atts(array(
            'divider_size' 		=> 'mx-2',
            'divider_color' 		=> 'body-default',
            'divider_color_scroll' 		=> '',
            'divider_custom_color' 		=> '',
            'divider_height' 		=> '',
        ), $opts));
        $scroll = false;
        $main_class = '';
        if( $divider_color_scroll != ''){
            $main_class = 'is-main-divider';
            $scroll = true;
        }
        ?>
        <div class="d-inline-flex pix-px-5 <?php echo esc_attr( $divider_size ); ?>">
            <div class="bg-<?php echo esc_attr( $divider_color ); ?> pix-header-divider <?php echo esc_attr( $main_class ); ?>  <?php echo esc_attr( $divider_height ); ?>" data-color="<?php echo esc_attr( $divider_color ); ?>" data-scroll-color="<?php echo esc_attr( $divider_color_scroll ); ?>"></div>
            <?php if($scroll){ ?>
                <div class="bg-<?php echo esc_attr( $divider_color_scroll ); ?> pix-header-divider is-scroll-divider <?php echo esc_attr( $divider_height ); ?>"></div>
            <?php } ?>
        </div>
        <?php
    }
}

/**
* Header Search element
*/
if( !function_exists('pix_get_header_search') ){
    function pix_get_header_search($opts){
        extract(shortcode_atts(array(
            'size' 		=> 'mx-2',
            'color'     => 'dark-opacity-4',
            'custom_color' 	            	=> '',
            'animation' 	            	=> 'fade-in-left',
            'search_style' 	            	=> '',
            'search_bar_direction' 	            	=> '',
        ), $opts));
        $custom = '';
        if(!empty($color)&&$color=='custom'){
            if(!empty($custom_color)){
                $custom = 'style="color:'.$custom_color.';"';
            }
        }
        $animation_class = 'animate-in';
        if($animation=='disabled'){
            $animation_class = '';
        }
        $style = false;
        if($search_style=='floating-sm'){
            ?>
            <div data-anim-type="<?php echo esc_attr($animation); ?>" href="#" class="btn is-opened2 pix-header-btn btn-link p-0 pix-search-sm-btn pix-toggle-overlay m-0 <?php echo esc_attr($animation_class); ?> d-inline-flex align-items-center text-<?php echo esc_attr( $color ); ?>" <?php echo esc_attr( $custom ); ?>>
                <span class="pix-search-toggle">
                        <i class="pixicon-zoom p-0 pix-mx-15 text-18 pix-header-text font-weight-bold"></i>
                        <i class="pixicon-close-circle p-0 pix-mx-15 text-18 pix-header-text font-weight-bold"></i>
                </span>
            <?php
            $nonce = wp_create_nonce("search_nonce");
            $link = admin_url('admin-ajax.php?action=pix_ajax_searcht&nonce='.$nonce);
            $search_data = $link;
            $placeholder = esc_attr__('Search for something', 'essentials');
            ?>
            <div class="pix-header-floating-search <?php echo esc_attr($search_bar_direction); ?>"><form class="pix-small-search pix-ajax-search-container position-relative bg-white shadow-lg rounded-lg pix-small-search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="input-group input-group-lg2 ">
                        <input type="text" class="form-control pix-ajax-search form-control-lg shadow-0 font-weight-bold text-body-default" name="s" autocomplete="off" placeholder="<?php echo esc_attr($placeholder); ?>" aria-label="Search" data-search-link="<?php echo esc_url($search_data); ?>" >
                        <div class="input-group-append">
                            <button class="btn btn-lg2 btn-white m-0 text-body-default" type="submit"><?php echo pix_load_inline_svg(PIX_CORE_PLUGIN_DIR.'/functions/images/search.svg'); ?></button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
            <?php
        }else{
            ?>
                <a data-anim-type="<?php echo esc_attr($animation); ?>" href="#" class="btn pix-header-btn btn-link p-0 pix-px-15 pix-search-btn pix-toggle-overlay m-0 <?php echo esc_attr($animation_class); ?> d-inline-flex align-items-center text-<?php echo esc_attr( $color ); ?>" <?php echo esc_attr( $custom ); ?>><span class="screen-reader-text sr-only"><?php echo esc_attr__( 'Search', 'essentials' ); ?></span><i class="pixicon-zoom text-18 pix-header-text font-weight-bold"></i></a>
            <?php
        }

    }
}

/**
* Header Cart element
*/
if( !function_exists('pix_get_header_cart') ){
    function pix_get_header_cart($opts){
        extract(shortcode_atts(array(
            'size' 		=> 'mx-2',
            'color'     => 'dark-opacity-4',
            'custom_color' 	            	=> '',
            'animation' 	            	=> 'fade-in-left',
        ), $opts));
        $custom = '';
        if(!empty($color)&&$color=='custom'){
            if(!empty($custom_color)){
                $custom = 'style="color:'.$custom_color.';"';
            }
        }
        $i_count = 0;
        if ( function_exists( 'essentials_woocommerce_cart_count' ) ) {
            $i_count = essentials_woocommerce_cart_count();
        }
        $animation_class = 'animate-in';
        if($animation=='disabled'){
            $animation_class = '';
        }
        ?>
        <a data-anim-type="<?php echo esc_attr($animation); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>cart" class="btn pix-header-btn btn-link m-0 p-0 pix-header-text pix-px-15 fly-sm2 pix-cart-btn pix-open-sidebar text-<?php echo esc_attr( $color ); ?> d-inline-flex align-items-center <?php echo esc_attr($animation_class); ?>"><i class="pixicon-bag-2 text-18 scale2 position-relative font-weight-bold" <?php echo esc_attr( $custom ); ?>></i><span class="cart-count woo-cart-count badge-pill bg-primary"><?php echo esc_attr( $i_count ); ?></span></a>
        <?php
    }
}

/**
* Header Wishlist element
*/
function pix_get_header_wishlist($opts){
    extract(shortcode_atts(array(
        'size' 		           => 'mx-2',
        'color'                => 'dark-opacity-4',
        'custom_color' 	       => '',
        'animation' 		=> 'fade-in-left',
    ), $opts));
    $custom = '';
    if(!empty($color)&&$color=='custom'){
        if(!empty($custom_color)){
            $custom = 'style="color:'.$custom_color.';"';
        }
    }
    $animation_class = 'animate-in';
    if($animation=='disabled'){
        $animation_class = '';
    }
    if ( function_exists( 'yith_wcwl_count_products' ) ) {
        if ( function_exists( 'yith_wcwl_is_wishlist_page' ) ) {
            $wishlist_page_id = yith_wcwl_object_id( get_option( 'yith_wcwl_wishlist_page_id' ) );
            if(!empty($wishlist_page_id)){
                $i_count = yith_wcwl_count_products();
                ?>
                <a data-anim-type="<?php echo esc_attr($animation); ?>" href="<?php echo get_page_link($wishlist_page_id); ?>" class="btn pix-header-btn pix-header-wishlist btn-link m-0 p-0 pix-px-15 fly-sm2 pix-header-text pix-cart-btn text-<?php echo esc_attr( $color ); ?> <?php echo esc_attr($animation_class); ?>"><i class="pixicon-heart text-18 position-relative font-weight-bold" <?php echo esc_attr( $custom ); ?>></i><span class="cart-count badge-pill bg-primary"><?php echo esc_attr( $i_count ); ?></span></a>
                <?php
            }
        }
    }
}

/**
* Header Language element
*/
function pix_get_header_language($opts){
    extract(shortcode_atts(array(
        'size' 		              => 'mx-2',
        'color' 		          => 'dark-opacity-4',
        'is_secondary_font' 	  => '',
        'custom_color' 		      => '',
        'area' 		              => ''
    ), $opts));
    $classes = '';
    $classes .= 'text-'.$color;
    if($area=='header'){
        $classes .= ' text-header-area';
    }
    if(!empty($is_secondary_font)){
        $classes .= ' secondary-font';
    }
    $custom = '';
    if($color=='custom'){
        if(!empty($custom_color)){
            $custom = 'color:'.$custom_color.';';
        }
    }

    if(defined('PIX_DEMO')){
        ?>
        <div class="dropdown pix-wpml-header-btn d-inline-block px-0" style="z-index:99999999999999;">
            <a href="#" class="pix-current-language pix-header-text text-sm font-weight-bold d-inline-block d-flex align-items-center <?php echo esc_attr( $classes ); ?>" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="<?php echo esc_attr( $custom ); ?>" >
                <i class="pixicon-world-map-3 pix-mr-5 text-18"></i><span>English</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <div class="submenu-box shadow">
                    <a class="dropdown-item font-weight-bold text-sm" href="#">French</a>
                    <a class="dropdown-item font-weight-bold text-sm" href="#">German</a>
                </div>
            </div>
        </div>
        <?php
    }else{
        if(function_exists('icl_get_languages')) {
            $languages = pix_get_languages();

            $current = '';
            $items = '';

            if(!empty($languages)){
                ?>
                <div class="dropdown pix-wpml-header-btn d-inline-block" style="z-index:99999999999;">
                    <?php
                    foreach($languages as $l){
                        if($l['active']){ ?>
                            <a href="#" class="pix-current-language font-weight-bold pix-header-text d-inline-block d-flex align-items-center <?php echo esc_attr( $classes ); ?>" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" <?php echo esc_attr( $custom ); ?>>
                                <i class="pixicon-world-map-3 pix-mr-5"></i><span> <?php echo esc_attr( $l['native_name'] ); ?></span>
                            </a>
                            <?php
                            break;
                        }
                    }
                    ?>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="submenu-box shadow">
                            <?php
                            foreach($languages as $l){
                                if(!$l['active']){
                                    if(!empty($l['translated_name'])){
                                        ?>
                                        <a class="dropdown-item font-weight-bold text-sm" href="<?php echo esc_url( $l['url'] ); ?>"><?php echo esc_attr( $l['translated_name'] ); ?></a>
                                        <?php
                                    }else{
                                        ?>
                                        <a class="dropdown-item font-weight-bold text-sm" href="<?php echo esc_url( $l['url'] ); ?>"><?php echo esc_attr( $l['native_name'] ); ?></a>
                                        <?php
                                    }

                                }
                            }

                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
    }
}

/**
* Header Menu element
*/
function pix_get_header_menu($opts){
    extract(shortcode_atts(array(
        'size' 		=> 'mx-2',
        'color'     => 'dark-opacity-4',
        'is_right_float' 	            	=> '',
        'custom_color' 	            	=> '',
        'scroll_color' 	            	=> '',
        'menu' 	            	=> 'menu-1',
        'area' 	            	=> '',
        'menu_style' 	            	=> '',
        'drop_bg' 	            	=> 'white',
        'dark_mode' 	            	=> '',
        'nav_line_color' 	            	=> '',
        'nav_scroll_line_color' 	            	=> '',
        'active_line' 	            	=> '',
        'dropdown_angle' 	            	=> '',
        'is_bold' 	            	=> '',
    ), $opts));
        if($area!='header'&&$area!='m_header'){
        ?>
        <nav class="navbar navbar-hover-drop navbar-expand-lg navbar-light p-0">
            <?php
        }
        if(defined('PIX_DEMO')){
            $nav_id = 'pixfort-'.$area.'-'.$menu.'-'.$drop_bg;
        }else{
            $nav_id = rand(10,1000);
        }

        $desktop_areas = array('topbar', 'header', 'stack');
        if(!in_array($area, $desktop_areas)){
            ?>
            <button class="navbar-toggler hamburger--spin hamburger small-menu-toggle" type="button" data-toggle="collapse" data-target="#navbarNav-<?php echo esc_attr( $nav_id ); ?>" aria-controls="navbarNav-<?php echo esc_attr( $nav_id ); ?>" aria-expanded="false" aria-label="Toggle navigation">
                <span class="hamburger-box">

                    <span class="hamburger-inner bg-<?php echo esc_attr($color); ?>">
                        <span class="hamburger-inner-before bg-<?php echo esc_attr($color); ?>"></span>
                        <span class="hamburger-inner-after bg-<?php echo esc_attr($color); ?>"></span>
                    </span>

                </span>
            </button>
            <?php
        }
        $menu_classes = '';

        if(!empty($dropdown_angle)){
            $angleColor = '';
            if(!empty($color)){
                if($color=='custom'){
                    $angleColor = 'color: '.$custom_color.';';
                }else{
                    $angleColor = 'color: var(--text-'.$color.');';
                }
            }
            $menuDropdownIcon = '#navbarNav-'.$nav_id.' > ul > li > .pix-nav-link.dropdown-toggle > span:before {
                '.$angleColor.'
            }';
            if(!empty($scroll_color)){
                $menuDropdownIcon .= '.is-scroll #navbarNav-'.$nav_id.' > ul > li > .pix-nav-link.dropdown-toggle > span:before {
                    color: var(--text-'.$scroll_color.') !important;
                }';
            }
            $menu_classes .= 'pix-nav-dropdown-angle' . ' ';
            wp_register_style( 'pix-header-menu-handle', false );
            wp_enqueue_style( 'pix-header-menu-handle' );
            wp_add_inline_style( 'pix-header-menu-handle', $menuDropdownIcon );
        }




        if(!empty($nav_scroll_line_color)){
            // echo $nav_scroll_line_color;
            // $custom_under_scroll_line = '.is-scroll #navbarNav-'.$nav_id.' .nav-style-megamenu>li.nav-item .nav-link span:after { background: '.$nav_scroll_line_color.' !important; }';
            // wp_register_style( 'pix-header-menu-handle', false );
        	// wp_enqueue_style( 'pix-header-menu-handle' );
        	// wp_add_inline_style( 'pix-header-menu-handle', $custom_under_scroll_line );
            $menu_classes .= $nav_scroll_line_color . ' ';
        }
        $menu_classes .= $nav_line_color . ' ';
        $menu_classes .= $active_line . ' ';
        if(!empty($is_right_float)){
            if($is_right_float===true){
                $menu_classes .= 'justify-content-end ';
            }else{
                $menu_classes .= 'justify-content-'.$is_right_float.' ';
            }

        }

        $menuArgs = array(
            'depth'             => 4,
            'container_class' => 'collapse navbar-collapse align-self-stretch '.$menu_classes,
            'container_id' => 'navbarNav-'.$nav_id,
            'menu_class' => 'navbar-nav nav-style-megamenu align-self-stretch align-items-center ',
            'fallback_cb' => '',
            'echo' => true,
            'menu' => $menu,
            'walker' => new wp_bootstrap_navwalker($opts)
        );
        if(in_array($area, $desktop_areas)){
            if($menu_style=='hidden'){
                $menuBtn = '<a class="hamburger--spin hamburger normal-menu-toggle d-flex" href="#" data-target="#navbarNav-'. esc_attr( $nav_id ).'">
                    <span class="hamburger-box">
                        <span class="hamburger-inner bg-'. esc_attr($color).'">
                            <span class="hamburger-inner-before bg-'. esc_attr($color).'"></span>
                            <span class="hamburger-inner-after bg-'. esc_attr($color).'"></span>
                        </span>
                    </span>
                </a>';
                if($is_right_float==='end'){
                    $menuArgs['items_wrap'] = '<ul id="%1$s" class="%2$s pix-menu-toggle-style">%3$s '.$menuBtn.'</ul>';
                }else{
                    $menuArgs['items_wrap'] = '<ul id="%1$s" class="%2$s pix-menu-toggle-style">'.$menuBtn.'%3$s</ul>';
                }

            }
        }
        wp_nav_menu(
            $menuArgs
        );



        if($area!='header'&&$area!='m_header'){
            ?>
        </nav>
        <?php
    }
}

/**
* Header Logo element
*/
function pix_get_header_logo($opts){
    extract(shortcode_atts(array(
        'height' 		=> '',
        'width' 		=> '',
        'width' 		=> '',
        'color' 		=> 'body-default',
        'custom_color' 		=> '',
        'area'             => '',
        'animation'             => 'slide-in-up',
        'logo_img'             => '',
        'logo_scroll_img'             => '',
        'custom_url'             => '',
        'target'             => '',
    ), $opts));
    $max = '';
    $classes = '';
    $themeDefault = false;
    if(!empty($target)) $target = '_blank';
    if(!function_exists('essentials_core_plugin')){
        $classes .= 'text-heading-default';
        $themeDefault = true;
    }else{
        $classes .= 'text-'.$color;
    }
    $link = home_url( '/' );
    if(!empty($custom_url)){
        $link = $custom_url;
    }
    $custom_logo_url = false;
    $mobileLogo = '';
    $scroll_logo_url = false;
    $logo_class = '';

    $imgWidth = '';
    $imgHeight = '';
    $imgWidthScroll = '';
    $imgHeightScroll = '';
    $imgWidthMobile = '';
    $imgHeightMobile = '';

    $custom_logo_img = false;

    if(pix_get_option('scroll-logo-img')&&pix_get_option('scroll-logo-img')['url']){
        $custom_logo_img_scroll = pix_get_option( 'scroll-logo-img' );
        $scroll_logo_url = $custom_logo_img_scroll['url'];
        $logo_class = 'pix-logo';
        if(!empty($custom_logo_img_scroll['height'])){
            $imgHeightScroll = $custom_logo_img_scroll['height'];
        }
        if(!empty($custom_logo_img_scroll['width'])){
            $imgWidthScroll = $custom_logo_img_scroll['width'];
        }
    }
    if(!empty($logo_scroll_img)&&$logo_scroll_img!=''){
        $scroll_logo_url = $logo_scroll_img;
        $logo_class = 'pix-logo';
    }

    if(pix_get_option('retina-logo-img')&&pix_get_option('retina-logo-img')['url']){
        $custom_logo_img = pix_get_option( 'retina-logo-img' );
        $custom_logo_url = $custom_logo_img['url'];
    }elseif(pix_get_option('logo-img')&&pix_get_option('logo-img')['url']){
        $custom_logo_img = pix_get_option('logo-img');
        $custom_logo_url = $custom_logo_img['url'];
    }
    if(!empty($custom_logo_img['height'])){
        $imgHeight = $custom_logo_img['height'];
    }
    if(!empty($custom_logo_img['width'])){
        $imgWidth = $custom_logo_img['width'];
    }


    if( !empty($area) && ($area == 'm_header' || $area == 'm_stack' || $area == 'm_topbar') && pix_get_option('mobile-logo-img')['url']  ){
        $custom_logo_img_mobile = pix_get_option( 'mobile-logo-img' );
        $custom_logo_url = $custom_logo_img_mobile['url'];
        if(!empty($custom_logo_img_mobile['height'])){
            $imgHeightMobile = $custom_logo_img_mobile['height'];
        }
        if(!empty($custom_logo_img_mobile['width'])){
            $imgWidthMobile = $custom_logo_img_mobile['width'];
        }
    }
    if(!empty($logo_img)){
        $custom_logo_url = $logo_img;
    }

    if(empty($height)) $max = 'max-width:180px;';
    $animation_class = 'animate-in';
    $animation_div_class = '';
    if($animation=='disabled'){
        $animation_class = '';
    }elseif ($animation=='slide-in-up') {
        $animation_class .= ' slide-in-container';
        $animation_div_class = 'slide-in-container';
    }

    ?>
    <div class="<?php echo esc_attr($animation_div_class);?> d-flex align-items-center">
        <div class="d-inline-block <?php echo esc_attr($animation_class);?>" data-anim-type="<?php echo esc_attr($animation);?>" style="<?php echo esc_attr( $max ); ?>">
            <?php
            $img_style = '';
            $heightVal = '';
            $widthVal = '';
            if(!empty($height)&&$height!=''){
                $img_style = 'height:'.$height.';width:auto;';
                $heightVal = preg_replace("/[^0-9]/", "", $height );
            }
            if(!empty($width)&&$width!=''){
                $widthVal = preg_replace("/[^0-9]/", "", $width );
            }
            if($themeDefault){
                ?>
                <h3 class="site-title"><strong><a class="navbar-brand pix-header-text font-weight-bold text-24 pix-mr-20 <?php echo esc_attr($classes); ?>" href="<?php echo esc_url($link); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></strong></h3>
                <?php
            }else{
                if( !empty($area) && ($area == 'm_header' || $area == 'm_stack' || $area == 'm_topbar') && pix_get_option('mobile-logo-img')['url']  ){
                    ?>
                    <a class="navbar-brand" href="<?php echo esc_url( $link ); ?>" target="<?php echo esc_attr($target); ?>" rel="home">
                        <img src="<?php echo esc_url( $custom_logo_url ); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" style="<?php echo esc_attr( $img_style ); ?>">
                    </a>
                    <?php
                }else{
                    if($custom_logo_url&&!empty($custom_logo_url)){

                        ?>
                        <a class="navbar-brand" href="<?php echo esc_url( $link ); ?>" target="<?php echo esc_attr($target); ?>" rel="home">
                            <img class="<?php echo esc_attr( $logo_class ); ?>" height="<?php echo esc_attr($heightVal); ?>" width="<?php echo esc_attr($widthVal); ?>" src="<?php echo esc_url( $custom_logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?>" style="<?php echo esc_attr( $img_style ); ?>" >
                            <?php
                            if($scroll_logo_url && $area=='header'){
                                ?>
                                <img class="pix-logo-scroll" src="<?php echo esc_url( $scroll_logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?>" style="<?php echo esc_attr( $img_style ); ?>">
                                <?php
                            }
                             ?>
                        </a>
                        <?php
                    }else{
                        ?>
                        <h3 class="site-title"><strong><a class="navbar-brand pix-header-text font-weight-bold text-24 pix-mr-20 <?php echo esc_attr($classes); ?>" href="<?php echo esc_url( $link ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></strong></h3>
                        <?php
                    }
                }
            }

            ?>
        </div>
    </div>
    <?php
}

/**
* Header Social element
*/
function pix_get_header_social($opts){
    extract(shortcode_atts(array(
        'bold' 		=> '',
        'color' 		=> 'body-default',
        'custom_color' 		=> '',
        'animation' 		=> 'disabled',
    ), $opts));
    $classes = '';
    $classes .= 'pix-header-text text-'.$color;
    $animation_classes = '';
    $custom = '';
    if($animation!='disabled'){
        $animation_classes = ' animate-in';
    }
    $targetVal = '_self';
    if( pix_get_option('social-target-blank') ){
        $targetVal = '_blank';
    }
    if(!empty($color)&&$color=='custom'){
        if(!empty($custom_color)){
            $custom = 'style="color:'.$custom_color.';"';
        }
    }
    ?>
    <div class="pix-px-5 d-inline-block2 d-inline-flex align-items-between pix-social text-18 <?php echo esc_attr($animation_classes); ?>" data-anim-type="<?php echo esc_attr($animation); ?>">
        <?php
        if( pix_get_option('social-skype') ){
            ?>
            <a class="d-flex align-items-center <?php echo esc_attr( $classes ); ?>" target="<?php echo esc_attr($targetVal); ?>" <?php echo esc_attr( $custom ); ?> href="<?php echo esc_url( pix_get_option('social-skype') ); ?>" title="Skype"><i class="pixicon-skype px-2" ></i></a>
            <?php
        }
        if( pix_get_option('social-facebook') ){
            ?>
            <a class="d-flex align-items-center <?php echo esc_attr( $classes ); ?>" target="<?php echo esc_attr($targetVal); ?>" <?php echo esc_attr( $custom ); ?> href="<?php echo esc_url( pix_get_option('social-facebook') ); ?>" title="Facebook"><i class="pixicon-facebook3 px-2" ></i></a>
            <?php
        }
        if( pix_get_option('social-google') ){
            ?>
            <a class="d-flex align-items-center <?php echo esc_attr( $classes ); ?>" target="<?php echo esc_attr($targetVal); ?>" <?php echo esc_attr( $custom ); ?> href="<?php echo esc_url( pix_get_option('social-google') ); ?>" title="Google"><i class="pixicon-google px-2" ></i></a>
            <?php
        }
        if( pix_get_option('social-twitter') ){
            ?>
            <a class="d-flex align-items-center <?php echo esc_attr( $classes ); ?>" target="<?php echo esc_attr($targetVal); ?>" <?php echo esc_attr( $custom ); ?> href="<?php echo esc_url( pix_get_option('social-twitter') ); ?>" title="twitter"><i class="pixicon-twitter px-2" ></i></a>
            <?php
        }
        if( pix_get_option('social-vimeo') ){
            ?>
            <a class="d-flex align-items-center <?php echo esc_attr( $classes ); ?>" target="<?php echo esc_attr($targetVal); ?>" <?php echo esc_attr( $custom ); ?> href="<?php echo esc_url( pix_get_option('social-vimeo') ); ?>" title="vimeo"><i class="pixicon-vimeo px-2" ></i></a>
            <?php
        }
        if( pix_get_option('social-youtube') ){
            ?>
            <a class="d-flex align-items-center <?php echo esc_attr( $classes ); ?>" target="<?php echo esc_attr($targetVal); ?>" <?php echo esc_attr( $custom ); ?> href="<?php echo esc_url( pix_get_option('social-youtube') ); ?>" title="youtube"><i class="pixicon-youtube3 px-2" ></i></a>
            <?php
        }
        if( pix_get_option('social-flickr') ){
            ?>
            <a class="d-flex align-items-center <?php echo esc_attr( $classes ); ?>" target="<?php echo esc_attr($targetVal); ?>" <?php echo esc_attr( $custom ); ?> href="<?php echo esc_url( pix_get_option('social-flickr') ); ?>" title="flickr"><i class="pixicon-flickr px-2" ></i></a>
            <?php
        }
        if( pix_get_option('social-linkedin') ){
            ?>
            <a class="d-flex align-items-center <?php echo esc_attr( $classes ); ?>" target="<?php echo esc_attr($targetVal); ?>" <?php echo esc_attr( $custom ); ?> href="<?php echo esc_url( pix_get_option('social-linkedin') ); ?>" title="linkedin"><i class="pixicon-linkedin px-2" ></i></a>
            <?php
        }
        if( pix_get_option('social-pinterest') ){
            ?>
            <a class="d-flex align-items-center <?php echo esc_attr( $classes ); ?>" target="<?php echo esc_attr($targetVal); ?>" <?php echo esc_attr( $custom ); ?> href="<?php echo esc_url( pix_get_option('social-pinterest') ); ?>" title="pinterest"><i class="pixicon-pinterest px-2" ></i></a>
            <?php
        }
        if( pix_get_option('social-instagram') ){
            ?>
            <a class="d-flex align-items-center <?php echo esc_attr( $classes ); ?>" target="<?php echo esc_attr($targetVal); ?>" <?php echo esc_attr( $custom ); ?> href="<?php echo esc_url( pix_get_option('social-instagram') ); ?>" title="instagram"><i class="pixicon-instagram2 px-2" ></i></a>
            <?php
        }
        if( pix_get_option('social-dribbble') ){
            ?>
            <a class="d-flex align-items-center <?php echo esc_attr( $classes ); ?>" target="<?php echo esc_attr($targetVal); ?>" <?php echo esc_attr( $custom ); ?> href="<?php echo esc_url( pix_get_option('social-dribbble') ); ?>" title="dribbble"><i class="pixicon-dribbble px-2" ></i></a>
            <?php
        }
        if( pix_get_option('social-snapchat') ){
            ?>
            <a class="d-flex align-items-center <?php echo esc_attr( $classes ); ?>" target="<?php echo esc_attr($targetVal); ?>" <?php echo esc_attr( $custom ); ?> href="<?php echo esc_url( pix_get_option('social-snapchat') ); ?>" title="snapchat"><i class="pixicon-snapchat px-2" ></i></a>
            <?php
        }
        if( pix_get_option('social-telegram') ){
            ?>
            <a class="d-flex align-items-center <?php echo esc_attr( $classes ); ?>" target="<?php echo esc_attr($targetVal); ?>" <?php echo esc_attr( $custom ); ?> href="<?php echo esc_url( pix_get_option('social-telegram') ); ?>" title="telegram"><i class="pixicon-telegram px-2" ></i></a>
            <?php
        }
        if( pix_get_option('social-googleplay') ){
            ?>
            <a class="d-flex align-items-center <?php echo esc_attr( $classes ); ?>" target="<?php echo esc_attr($targetVal); ?>" <?php echo esc_attr( $custom ); ?> href="<?php echo esc_url( pix_get_option('social-googleplay') ); ?>" title="GooglePlay"><i class="pixicon-play2 px-2" ></i></a>
            <?php
        }
        if( pix_get_option('social-appstore') ){
            ?>
            <a class="d-flex align-items-center <?php echo esc_attr( $classes ); ?>" target="<?php echo esc_attr($targetVal); ?>" <?php echo esc_attr( $custom ); ?> href="<?php echo esc_url( pix_get_option('social-appstore') ); ?>" title="AppStore"><i class="pixicon-appstore px-2" ></i></a>
            <?php
        }
        if( pix_get_option('social-whatsapp') ){
            ?>
            <a class="d-flex align-items-center <?php echo esc_attr( $classes ); ?>" target="<?php echo esc_attr($targetVal); ?>" <?php echo esc_attr( $custom ); ?> href="<?php echo esc_url( pix_get_option('social-whatsapp') ); ?>" title="WhatsApp"><i class="pixicon-whatsapp2 px-2" ></i></a>
            <?php
        }
        if( pix_get_option('social-flipboard') ){
            ?>
            <a class="d-flex align-items-center <?php echo esc_attr( $classes ); ?>" target="<?php echo esc_attr($targetVal); ?>" <?php echo esc_attr( $custom ); ?> href="<?php echo esc_url( pix_get_option('social-flipboard') ); ?>" title="Flipboard"><i class="pixicon-flipboard px-2" ></i></a>
            <?php
        }
        if( pix_get_option('social-vk') ){
            ?>
            <a class="d-flex align-items-center <?php echo esc_attr( $classes ); ?>" target="<?php echo esc_attr($targetVal); ?>" <?php echo esc_attr( $custom ); ?> href="<?php echo esc_url( pix_get_option('social-vk') ); ?>" title="VK"><i class="pixicon-vk px-2" ></i></a>
            <?php
        }
        if( pix_get_option('social-discord') ){
            ?>
            <a class="d-flex align-items-center <?php echo esc_attr( $classes ); ?>" target="<?php echo esc_attr($targetVal); ?>" <?php echo esc_attr( $custom ); ?> href="<?php echo esc_url( pix_get_option('social-discord') ); ?>" title="Discord"><i class="pixicon-discord px-2" ></i></a>
            <?php
        }
        if( pix_get_option('social-tik-tok') ){
            ?>
            <a class="d-flex align-items-center <?php echo esc_attr( $classes ); ?>" target="<?php echo esc_attr($targetVal); ?>" <?php echo esc_attr( $custom ); ?> href="<?php echo esc_url( pix_get_option('social-tik-tok') ); ?>" title="tik-tok"><i class="pixicon-tik-tok px-2" ></i></a>
            <?php
        }
        if( pix_get_option('social-twitch') ){
            ?>
            <a class="d-flex align-items-center <?php echo esc_attr( $classes ); ?>" target="<?php echo esc_attr($targetVal); ?>" <?php echo esc_attr( $custom ); ?> href="<?php echo esc_url( pix_get_option('social-twitch') ); ?>" title="twitch"><i class="pixicon-twitch px-2" ></i></a>
            <?php
        }
        if( pix_get_option('social-behance') ){
            ?>
            <a class="d-flex align-items-center <?php echo esc_attr( $classes ); ?>" target="<?php echo esc_attr($targetVal); ?>" <?php echo esc_attr( $custom ); ?> href="<?php echo esc_url( pix_get_option('social-behance') ); ?>" title="twitch"><i class="pixicon-behance px-2" ></i></a>
            <?php
        }
        if( pix_get_option('social-yelp') ){
            ?>
            <a class="d-flex align-items-center <?php echo esc_attr( $classes ); ?>" target="<?php echo esc_attr($targetVal); ?>" <?php echo esc_attr( $custom ); ?> href="<?php echo esc_url( pix_get_option('social-yelp') ); ?>" title="yelp"><i class="pixicon-yelp2 px-2" ></i></a>
            <?php
        }
        if( pix_get_option('social-soundcloud') ){
            ?>
            <a class="d-flex align-items-center <?php echo esc_attr( $classes ); ?>" target="<?php echo esc_attr($targetVal); ?>" <?php echo esc_attr( $custom ); ?> href="<?php echo esc_url( pix_get_option('social-soundcloud') ); ?>" title="soundcloud"><i class="pixicon-soundcloud px-2" ></i></a>
            <?php
        }
        if( pix_get_option('social-tripadvisor') ){
            ?>
            <a class="d-flex align-items-center <?php echo esc_attr( $classes ); ?>" target="<?php echo esc_attr($targetVal); ?>" <?php echo esc_attr( $custom ); ?> href="<?php echo esc_url( pix_get_option('social-tripadvisor') ); ?>" title="tripadvisor"><i class="pixicon-tripadvisor px-2" ></i></a>
            <?php
        }
        ?>
    </div>
    <?php
}
