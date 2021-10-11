<?php

if (!isset($single_header)) {
    $single_header = null;
    if(pix_get_option('pix-header')){
        $single_header = pix_get_option('pix-header');
        if(!get_post( $single_header )){
            $single_header = false;
        }else{
            if(get_post_type( $single_header )!='pixheader'){
                $single_header = false;
            }
        }
    }
}


if(empty($single_header) || !$single_header){
    $footer_posts = get_posts([
      'post_type' => 'pixheader',
      'post_status' => 'publish',
      'numberposts' => -1
    ]);
    if(!empty($footer_posts)){
        $single_header = $footer_posts[0]->ID;
    }
}

$pagePostTypes = array('page', 'post', 'portfolio');
$pagePostTypes = apply_filters( 'pixfort_page_options_post_types', $pagePostTypes );

if(in_array(get_post_type(), $pagePostTypes) && get_post_meta( get_the_ID(), 'pix-page-header', true )){
    $single_header = get_post_meta( get_the_ID(), 'pix-page-header', true );
}

if(is_404()){
    if(!empty(pix_get_option('pix-enable-custom-404')) && !empty(pix_get_option('pix-custom-404-page'))){
        $custom404 = pix_get_option('pix-custom-404-page');
        if(function_exists('icl_get_languages')) {
            $custom404 = apply_filters( 'wpml_object_id', $custom404, 'page', true );
        }
        if($custom404&&get_post_meta( $custom404, 'pix-page-header', true )){
            $single_header = get_post_meta( $custom404, 'pix-page-header', true );
        }
    }
}


$is_default_header = false;
if(empty($single_header) && $single_header!= 'disable'){
    include( 'default.php' );
    if(!empty($default_header)){
        $single_header = $default_header;
        $is_default_header = true;
    }
}

if(!empty($single_header) && $single_header!= 'disable'){
    if($is_default_header){
        $data = $single_header;
    }else{
        if(function_exists('icl_get_languages')) {
            $correct_id = apply_filters( 'wpml_object_id', $single_header, 'pixheader', true );
            $post = get_post( $correct_id );
        }else{
            $post = get_post( $single_header );
        }
        $data = get_post_field('pix-header-drag', $post);
    }


    $data = json_decode(wp_specialchars_decode($data));

    $header_style = '';
    if(!empty(get_post_field('pix-header-style', $post))){
        $header_style = get_post_field('pix-header-style', $post);
    }

    $header_sticky = 'pix-is-sticky-header';
    if(!empty(get_post_field('pix-enable-sticky', $post))){
        if(get_post_field('pix-enable-sticky', $post)=='disable'){
            $header_sticky = '';
        }
    }

    $is_secondary_font = false;
    if(!empty(get_post_field('is_secondary_font', $post))){
        $is_secondary_font = get_post_field('is_secondary_font', $post);
    }

    if($header_style == "transparent" || $header_style == "transparent-full"){
        // Transparent
        ?>
        <div class="pix-header-transparent <?php echo esc_attr($header_sticky); ?> pix-header-transparent-parent sticky-top2 position-relative">
            <div class="position-absolute w-100 ">
                <?php
                // Desktop header
                if(!empty($data->topbar)){
                    $topbar_data = $data->topbar;
                    include( 'topbar.php' );
                }
                ?>
                <div class="pix-header-placeholder position-relative d-block w-100">
                <?php
                if(!empty($data->header)){
                    $header_data = $data->header;
                        include( 'header_transparent.php' );
                }
                ?>
                </div>
                <?php
                if(!empty($data->stack)){
                    $stack_data = $data->stack;
                    include( 'stack.php' );
                }
                ?>
            </div>
        </div>
        <?php
    }elseif($header_style == "boxed" || $header_style == "boxed-full"){
        // Transparent
        ?>
        <div class="pix-header-boxed <?php echo esc_attr($header_sticky); ?> position-relative">
            <div class="position-absolute w-100 ">
                <?php
                // Desktop header
                if(!empty($data->topbar)){
                    $topbar_data = $data->topbar;
                    include( 'topbar.php' );
                }
                ?>
                <div class="pix-header-placeholder position-relative d-block w-100">
                <?php
                if(!empty($data->header)){
                    $header_data = $data->header;
                    $stack_data = null;
                    if(!empty($data->stack)){
                        $stack_data = $data->stack;
                    }
                    include( 'header_boxed.php' );
                }
                ?>
                </div>
            </div>
        </div>
        <?php
    }else{
        // Default
        // Desktop header
        if(!empty($data->topbar)){
            $topbar_data = $data->topbar;
            include( 'topbar.php' );
        }
        if(!empty($data->header)){
            $header_data = $data->header;
                include( 'header.php' );
        }
        if(!empty($data->stack)){
            $stack_data = $data->stack;
            include( 'stack.php' );
        }
    }

    // Mobile header
    if(!empty($data->m_topbar)){
        $m_topbar_data = $data->m_topbar;
        include( 'm_topbar.php' );
    }
    if(!empty($data->m_header)){
        $m_header_data = $data->m_header;
        include( 'm_header.php' );
    }
    if(!empty($data->m_stack)){
        $m_stack_data = $data->m_stack;
        include( 'm_stack.php' );
    }

    if(!$is_default_header){
        if ( class_exists( '\Elementor\Plugin' ) && Elementor\Plugin::instance()->db->is_built_with_elementor( $single_header ) ) {
            setup_postdata($single_header);
            the_content();
        }elseif (defined( 'WPB_VC_VERSION' )) {
            if ( $post && preg_match( '/vc_row/', $post->post_content ) ) {
                setup_postdata($post);
                the_content();
                $headerStyle = vc_custom_css($post->ID);
                wp_register_style( 'pix-header-handle', false );
                wp_enqueue_style( 'pix-header-handle' );
                wp_add_inline_style( 'pix-header-handle', $headerStyle );                
            }
        }
    }

    wp_reset_postdata();
}
