<?php
if ( ! class_exists( 'Redux' ) ) {
    return;
}

// This is your option name where all the Redux data is stored.
$opt_name = "pix_options";

if ( is_admin() ) {
    $theme = wp_get_theme(); // For use with some settings. Not necessary.
    $args = array(
        'opt_name' => $opt_name,
        'display_name' => 'Essentials',
        'display_version' => $theme->get('Version'),
        'page_slug' => 'pixfort',
        'page_title' => 'Theme Options',
        'update_notice' => FALSE,
        'admin_bar' => TRUE,
        'menu_type' => 'submenu',
        'menu_title' => 'Theme Options',
        'allow_sub_menu' => TRUE,
        'page_parent_post_type' => 'your_post_type',
        'page_parent'          => 'pixfort-dashboard',
        'page_priority' => TRUE,
        'customizer' => FALSE,
        'default_mark' => '*',
        'templates_path'    =>  PIX_CORE_PLUGIN_DIR . '/pixfort-redux/templates/panel/',
        'google_api_key' => 'AIzaSyAYj4cql4olnmb_c9U4Br0V5CMStgOwLTk',
        // 'google_update_weekly' => true,
        'class' => 'pixfort_options_container',
        'hints' => array(
            'icon_position' => 'right',
            'icon_color' => 'lightgray',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => TRUE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
        'use_cdn' => FALSE,
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pixfort',
        'title' => 'Like us on Facebook',
        'svg'  => PIX_CORE_PLUGIN_DIR.'/functions/images/options/social/fb.svg',
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.dribbble.com/pixfort',
        'title' => 'Follow us on Dribbble',
        'svg'  => PIX_CORE_PLUGIN_DIR.'/functions/images/options/social/dribbble.svg',
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.twitter.com/pixfort',
        'title' => 'Follow us on Twitter',
        'svg'  => PIX_CORE_PLUGIN_DIR.'/functions/images/options/social/twitter.svg',
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.behance.net/pixfort',
        'title' => 'Follow us on Behance',
        'svg'  => PIX_CORE_PLUGIN_DIR.'/functions/images/options/social/behance.svg',
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.instagram.com/pixfort',
        'title' => 'Follow us on Instagram',
        'svg'  => PIX_CORE_PLUGIN_DIR.'/functions/images/options/social/instagram.svg',
    );

    add_filter('redux/options/' . $opt_name . '/saved', 'pix_compiler_action', 10, 2);

    Redux::setArgs( $opt_name, $args );
    require_once dirname( __FILE__ ) . '/theme-options.php';
    function pix_compiler_action($options, $css) {
        update_option('pixfort_theme_options_notice', '');
        if(function_exists('pix_update_style_url')){
            pix_update_style_url();
        }
        pix_set_element_width($options);
    }

    function pix_customizer_update(){
        update_option('pixfort_theme_options_notice', '');
        if(function_exists('pix_update_style_url')){
            pix_update_style_url();
        }
    }

    function pix_set_element_width($options){
        if( !empty($options['pix-custom-container-width']) ){
            $site_custom_width = get_option('pixfort_custom_width'); 
            $new_width = (int)$options['pix-custom-container-width'];
            if(!$site_custom_width){
                update_option('pixfort_custom_width', $options['pix-custom-container-width']);
                if( class_exists( '\Elementor\Plugin' ) ) {
					$kit = \Elementor\Plugin::$instance->kits_manager->get_active_kit_for_frontend( );
					$kit->update_settings( [
					'container_width' => array(
					'size' => $new_width,
					),
					] );
					\Elementor\Plugin::$instance->files_manager->clear_cache();
				}
            }else{
                if($site_custom_width!=$options['pix-custom-container-width']){
                    update_option('pixfort_custom_width', $options['pix-custom-container-width']);
                    if( class_exists( '\Elementor\Plugin' ) ) {
                        $kit = \Elementor\Plugin::$instance->kits_manager->get_active_kit_for_frontend( );
                        $kit->update_settings( [
                        'container_width' => array(
                        'size' => $new_width,
                        ),
                        ] );
                        \Elementor\Plugin::$instance->files_manager->clear_cache();
                    }
                }
            }
        }else{
            $site_custom_width = get_option('pixfort_custom_width'); 
            if($site_custom_width && $site_custom_width!=1140){
                if( class_exists( '\Elementor\Plugin' ) ) {
                    $kit = \Elementor\Plugin::$instance->kits_manager->get_active_kit_for_frontend( );
                    $kit->update_settings( [
                    'container_width' => array(
                    'size' => 1140,
                    ),
                    ] );
                    \Elementor\Plugin::$instance->files_manager->clear_cache();
                }
            }
        }
    }
    add_action( 'customize_save', 'pix_customizer_update' );
    add_action( 'customize_save_after', 'pix_customizer_update', 99 );
    add_action( 'redux/customizer/live_preview	', 'pix_customizer_update' );
}
