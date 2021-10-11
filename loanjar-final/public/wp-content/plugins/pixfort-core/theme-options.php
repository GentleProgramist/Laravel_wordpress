<?php


add_action( 'redux/pix_options/panel/before', 'pixfort_theme_option_notice' );
function pixfort_theme_option_notice() {

    $theme_option_notice = get_option('pixfort_theme_options_notice');
    if($theme_option_notice){
        ?>
        <div class="notice pixfort-admin-notice notice-warning is-dismissible2">
            <div class="notice-text"><?php echo esc_attr__( 'There was an error while saving the theme options (Styling will not be applied until fixing the issue), please check the following error meesage:', 'essentials' ); ?></div>
                <div class="pix-theme-options-err-msg"><p><?php echo esc_attr($theme_option_notice); ?></p></div>
                <br />
            </div>
            <?php
        }

    }

    // $pixReduxFramework
    $pixReduxFramework = PIX_CORE_PLUGIN_URI . 'redux-framework/';

    $optionsIconType = 'svg';
    $optionsIcons = array(
        'general'       => PIX_CORE_PLUGIN_DIR.'/functions/images/options/home.svg',
        'layout'       => PIX_CORE_PLUGIN_DIR.'/functions/images/options/layout.svg',
        'blog_section'       => PIX_CORE_PLUGIN_DIR.'/functions/images/options/blog.svg',
        'portfolio_section'       => PIX_CORE_PLUGIN_DIR.'/functions/images/options/portfolio.svg',
        'pages_section'       => PIX_CORE_PLUGIN_DIR.'/functions/images/options/pages.svg',
        'typography'       => PIX_CORE_PLUGIN_DIR.'/functions/images/options/typography.svg',
        'shop'       => PIX_CORE_PLUGIN_DIR.'/functions/images/options/shop.svg',
    );
    if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
        $optionsIconType = 'icon';
        $optionsIcons = array(
            'general'       => 'el el-home',
            'layout'       => 'el el-adjust-alt',
            'blog_section'       => 'el el-paper-clip',
            'portfolio_section'       => 'el el-photo',
            'pages_section'       => 'el el-bookmark',
            'typography'       => 'el el-font',
            'shop'       => 'el el-shopping-cart',
        );
    }

    $colors = array(
        __("Primary", 'pixfort-core')				=> "primary",
        __("Primary Gradient", 'pixfort-core')		=> "gradient-primary",
        __("Secondary", 'pixfort-core')				=> "secondary",
        __("Primary Gradient", 'pixfort-core')		=> "gradient-primary",
        __("White", 'pixfort-core')					=> "white",
        __("Black", 'pixfort-core')					=> "black",
        __("Green", 'pixfort-core')					=> "green",
        __("Blue", 'pixfort-core')					=> "blue",
        __("Red", 'pixfort-core')					=> "red",
        __("Yellow", 'pixfort-core')				=> "yellow",
        __("Brown", 'pixfort-core')					=> "brown",
        __("Purple", 'pixfort-core')				=> "purple",
        __("Orange", 'pixfort-core')				=> "orange",
        __("Cyan", 'pixfort-core')					=> "cyan",
        __("Gray 1", 'pixfort-core')				=> "gray-1",
        __("Gray 2", 'pixfort-core')				=> "gray-2",
        __("Gray 3", 'pixfort-core')				=> "gray-3",
        __("Gray 4", 'pixfort-core')				=> "gray-4",
        __("Gray 5", 'pixfort-core')				=> "gray-5",
        __("Gray 6", 'pixfort-core')				=> "gray-6",
        __("Gray 7", 'pixfort-core')				=> "gray-7",
        __("Gray 8", 'pixfort-core')				=> "gray-8",
        __("Gray 9", 'pixfort-core')				=> "gray-9",
        __("Dark opacity 1", 'pixfort-core')		=> "dark-opacity-1",
        __("Dark opacity 2", 'pixfort-core')		=> "dark-opacity-2",
        __("Dark opacity 3", 'pixfort-core')		=> "dark-opacity-3",
        __("Dark opacity 4", 'pixfort-core')		=> "dark-opacity-4",
        __("Dark opacity 5", 'pixfort-core')		=> "dark-opacity-5",
        __("Dark opacity 6", 'pixfort-core')		=> "dark-opacity-6",
        __("Dark opacity 7", 'pixfort-core')		=> "dark-opacity-7",
        __("Dark opacity 8", 'pixfort-core')		=> "dark-opacity-8",
        __("Dark opacity 9", 'pixfort-core')		=> "dark-opacity-9",
        __("Light opacity 1", 'pixfort-core')		=> "light-opacity-1",
        __("Light opacity 2", 'pixfort-core')		=> "light-opacity-2",
        __("Light opacity 3", 'pixfort-core')		=> "light-opacity-3",
        __("Light opacity 4", 'pixfort-core')		=> "light-opacity-4",
        __("Light opacity 5", 'pixfort-core')		=> "light-opacity-5",
        __("Light opacity 6", 'pixfort-core')		=> "light-opacity-6",
        __("Light opacity 7", 'pixfort-core')		=> "light-opacity-7",
        __("Light opacity 8", 'pixfort-core')		=> "light-opacity-8",
        __("Light opacity 9", 'pixfort-core')		=> "light-opacity-9",
        __("Custom", 'pixfort-core')				=> "custom"
    );

    $main_colors = array(
        __("Primary", 'pixfort-core')				=> "primary",
        __("Secondary", 'pixfort-core')				=> "secondary",
        __("White", 'pixfort-core')					=> "white",
        __("Black", 'pixfort-core')					=> "black",
        __("Green", 'pixfort-core')					=> "green",
        __("Blue", 'pixfort-core')					=> "blue",
        __("Red", 'pixfort-core')					=> "red",
        __("Yellow", 'pixfort-core')				=> "yellow",
        __("Brown", 'pixfort-core')					=> "brown",
        __("Purple", 'pixfort-core')				=> "purple",
        __("Orange", 'pixfort-core')				=> "orange",
        __("Cyan", 'pixfort-core')					=> "cyan",
        __("Gray 1", 'pixfort-core')				=> "gray-1",
        __("Gray 2", 'pixfort-core')				=> "gray-2",
        __("Gray 3", 'pixfort-core')				=> "gray-3",
        __("Gray 4", 'pixfort-core')				=> "gray-4",
        __("Gray 5", 'pixfort-core')				=> "gray-5",
        __("Gray 6", 'pixfort-core')				=> "gray-6",
        __("Gray 7", 'pixfort-core')				=> "gray-7",
        __("Gray 8", 'pixfort-core')				=> "gray-8",
        __("Gray 9", 'pixfort-core')				=> "gray-9",
        __("Dark opacity 1", 'pixfort-core')		=> "dark-opacity-1",
        __("Dark opacity 2", 'pixfort-core')		=> "dark-opacity-2",
        __("Dark opacity 3", 'pixfort-core')		=> "dark-opacity-3",
        __("Dark opacity 4", 'pixfort-core')		=> "dark-opacity-4",
        __("Dark opacity 5", 'pixfort-core')		=> "dark-opacity-5",
        __("Dark opacity 6", 'pixfort-core')		=> "dark-opacity-6",
        __("Dark opacity 7", 'pixfort-core')		=> "dark-opacity-7",
        __("Dark opacity 8", 'pixfort-core')		=> "dark-opacity-8",
        __("Dark opacity 9", 'pixfort-core')		=> "dark-opacity-9",
        __("Light opacity 1", 'pixfort-core')		=> "light-opacity-1",
        __("Light opacity 2", 'pixfort-core')		=> "light-opacity-2",
        __("Light opacity 3", 'pixfort-core')		=> "light-opacity-3",
        __("Light opacity 4", 'pixfort-core')		=> "light-opacity-4",
        __("Light opacity 5", 'pixfort-core')		=> "light-opacity-5",
        __("Light opacity 6", 'pixfort-core')		=> "light-opacity-6",
        __("Light opacity 7", 'pixfort-core')		=> "light-opacity-7",
        __("Light opacity 8", 'pixfort-core')		=> "light-opacity-8",
        __("Light opacity 9", 'pixfort-core')		=> "light-opacity-9",
        __("Custom", 'pixfort-core')				=> "custom"
    );


    $bg_colors_no_custom = array(
        __("Transparent", 'pixfort-core')			=> "transparent",
        __("Primary", 'pixfort-core')				=> "primary",
        __("Primary Light", 'pixfort-core')			=> "primary-light",
        __("Primary Gradient", 'pixfort-core')		=> "gradient-primary",
        __("Primary Gradient Light", 'pixfort-core')		=> "gradient-primary-light",
        __("Secondary", 'pixfort-core')				=> "secondary",
        __("Secondary Light", 'pixfort-core')		=> "secondary-light",
        __("White", 'pixfort-core')					=> "white",
        __("Black", 'pixfort-core')					=> "black",
        __("Green", 'pixfort-core')					=> "green",
        __("Green Light", 'pixfort-core')			=> "green-light",
        __("Blue", 'pixfort-core')					=> "blue",
        __("Blue Light", 'pixfort-core')			=> "blue-light",
        __("Red", 'pixfort-core')					=> "red",
        __("Red Light", 'pixfort-core')				=> "red-light",
        __("Yellow", 'pixfort-core')				=> "yellow",
        __("Yellow Light", 'pixfort-core')			=> "yellow-light",
        __("Brown", 'pixfort-core')					=> "brown",
        __("Brown Light", 'pixfort-core')			=> "brown-light",
        __("Purple", 'pixfort-core')				=> "purple",
        __("Purple Light", 'pixfort-core')			=> "purple-light",
        __("Orange", 'pixfort-core')				=> "orange",
        __("Orange Light", 'pixfort-core')			=> "orange-light",
        __("Cyan", 'pixfort-core')					=> "cyan",
        __("Cyan Light", 'pixfort-core')			=> "cyan-light",
        __("Gray 1", 'pixfort-core')				=> "gray-1",
        __("Gray 2", 'pixfort-core')				=> "gray-2",
        __("Gray 3", 'pixfort-core')				=> "gray-3",
        __("Gray 4", 'pixfort-core')				=> "gray-4",
        __("Gray 5", 'pixfort-core')				=> "gray-5",
        __("Gray 6", 'pixfort-core')				=> "gray-6",
        __("Gray 7", 'pixfort-core')				=> "gray-7",
        __("Gray 8", 'pixfort-core')				=> "gray-8",
        __("Gray 9", 'pixfort-core')				=> "gray-9",
        __("Dark opacity 1", 'pixfort-core')		=> "dark-opacity-1",
        __("Dark opacity 2", 'pixfort-core')		=> "dark-opacity-2",
        __("Dark opacity 3", 'pixfort-core')		=> "dark-opacity-3",
        __("Dark opacity 4", 'pixfort-core')		=> "dark-opacity-4",
        __("Dark opacity 5", 'pixfort-core')		=> "dark-opacity-5",
        __("Dark opacity 6", 'pixfort-core')		=> "dark-opacity-6",
        __("Dark opacity 7", 'pixfort-core')		=> "dark-opacity-7",
        __("Dark opacity 8", 'pixfort-core')		=> "dark-opacity-8",
        __("Dark opacity 9", 'pixfort-core')		=> "dark-opacity-9",
        __("Light opacity 1", 'pixfort-core')		=> "light-opacity-1",
        __("Light opacity 2", 'pixfort-core')		=> "light-opacity-2",
        __("Light opacity 3", 'pixfort-core')		=> "light-opacity-3",
        __("Light opacity 4", 'pixfort-core')		=> "light-opacity-4",
        __("Light opacity 5", 'pixfort-core')		=> "light-opacity-5",
        __("Light opacity 6", 'pixfort-core')		=> "light-opacity-6",
        __("Light opacity 7", 'pixfort-core')		=> "light-opacity-7",
        __("Light opacity 8", 'pixfort-core')		=> "light-opacity-8",
        __("Light opacity 9", 'pixfort-core')		=> "light-opacity-9"
    );

    $bg_colors = $bg_colors_no_custom;
    $bg_colors['Custom'] = "custom";


    $footer_posts = get_posts([
        'post_type' => 'pixfooter',
        'post_status' => array('publish', 'private'),
        'numberposts' => -1
    ]);

    $footers = array();
    $footers[''] = "Disabled";
    foreach ($footer_posts as $key => $value) {
        if(empty($value->post_title)){
            $footers[$value->ID] = __('No name', 'pixfort-core');
        }else{
            $footers[$value->ID] = $value->post_title;
        }
    }

    $popup_posts = get_posts([
        'post_type' => 'pixpopup',
        'post_status' => array('publish', 'private'),
        'numberposts' => -1
    ]);

    $popups = array();
    $popups[''] = "Disabled";
    foreach ($popup_posts as $key => $value) {
        if(empty($value->post_title)){
            $popups[$value->ID] = __('No name', 'pixfort-core');
        }else{
            $popups[$value->ID] = $value->post_title;
        }

    }

    $pages_posts = get_posts([
        'post_type' => 'page',
        'post_status' => array('publish', 'private'),
        'numberposts' => -1
    ]);

    $pages = array();
    $pages[''] = "Disabled";
    foreach ($pages_posts as $key => $value) {
        if(empty($value->post_title)){
            $pages[$value->ID] = __('No name', 'pixfort-core');
        }else{
            $pages[$value->ID] = $value->post_title;
        }

    }

    $header_posts = get_posts([
        'post_type' => 'pixheader',
        'post_status' => array('publish', 'private'),
        'numberposts' => -1
    ]);


    $headers = array();

    $headers['default'] = "Default";
    $headers[''] = "Disable";
    foreach ($header_posts as $key => $value) {
        if(empty($value->post_title)){
            $headers[$value->ID] = __('No name', 'pixfort-core');
        }else{
            $headers[$value->ID] = $value->post_title;
        }

    }

    $sidebars = array();
    $sidebars['sidebar-1'] = 'Main Sidebar';
    if(!empty(pix_plugin_get_option('pix_sidebars'))){
        foreach (pix_plugin_get_option('pix_sidebars') as $key => $value) {
            $sidebars['sidebar-'.str_replace(' ', '', $value)] = $value;
        }
    }

    Redux::setSection( $opt_name, array(
        'title' => __( 'General Settings', 'pixfort-core' ),
        'id'    => 'general',
        'desc'  => __( 'Basic fields as subsections.', 'pixfort-core' ),
        'icon'  => $optionsIcons['general'],
        'icon_type'  => $optionsIconType
    ) );

    $logos_arr = array(
        array(
            'id'       => 'logo-img',
            'type'     => 'media',
            'url'      => true,
            'title'    => __('Custom Logo', 'pixfort-core'),
            'desc'     => __('You can customize the Logo height from the Header builder.<br />To display the logo image as retina we recommend that the uploaded image have at least double the height of the logo set in the Header builder.', 'pixfort-core'),
        ),
    );
    if(!empty(pix_plugin_get_option('retina-logo-img')) && !empty(pix_plugin_get_option('retina-logo-img')['url']) ){
        $logos_arr = array(
            array(
                'id'       => 'logo-img',
                'type'     => 'media',
                'url'      => true,
                'title'    => __('Custom Logo', 'pixfort-core'),
            ),
            array(
                'id'       => 'retina-logo-img',
                'type'     => 'media',
                'url'      => true,
                'title'    => __('Retina Logo', 'pixfort-core'),
                'desc'     => __('Retina Logo should be 2x larger than Custom Logo (field is optional).', 'pixfort-core'),
            ),
        );
    }

    $favicon_arr = array();
    if(!empty(pix_plugin_get_option('favicon-img')) && !empty(pix_plugin_get_option('favicon-img')['url']) ){
        $favicon_arr = array(
            array(
                'id'       => 'favicon-img',
                'type'     => 'media',
                'url'      => true,
                'title'    => __('Custom Favicon', 'pixfort-core'),
                'desc'     => __('Add a small image to be displayed in browser tabs.', 'pixfort-core'),
                'subtitle' => __('Site favicon', 'pixfort-core'),
            ),
        );
    }

    Redux::setSection( $opt_name, array(
        'title'      => __( 'General', 'pixfort-core' ),
        'id'         => 'general-settings',
        'subsection' => true,
        'fields'     => array_merge(
            $logos_arr,
            array(

                array(
                    'id'       => 'scroll-logo-img',
                    'type'     => 'media',
                    'url'      => true,
                    'title'    => __('Scroll Logo', 'pixfort-core'),
                    'desc'     => __('Scroll Logo replaces the default logo when scrolling with the transparent header.', 'pixfort-core'),
                ),

                array(
                    'id'       => 'mobile-logo-img',
                    'type'     => 'media',
                    'url'      => true,
                    'title'    => __('Mobile Logo', 'pixfort-core'),
                    'desc'     => __('Mobile Logo is display in mobile devices only.', 'pixfort-core'),
                ),
            ),
            $favicon_arr,
            array(

                array(
                    'id'       => 'pix-body-padding',
                    'type'     => 'select',
                    'title'    => __('Page padding (experimental feature)', 'pixfort-core'),
                    'desc'     => __('Add padding around the page.<br />Please note that this option may disable the css sticky option in some browsers.<br />Please note that this effect may slow down the website if the page includes heavy content, if you experince any performance issues in some browsers please disable this option.', 'pixfort-core'),
                    'options'  => array(
                        ''             => __('None', 'pixfort-core'),
                        'pix-p-5'         => __('5px', 'pixfort-core'),
                        'pix-p-10'         => __('10px', 'pixfort-core'),
                        'pix-p-15'         => __('15px', 'pixfort-core'),
                        'pix-p-20'         => __('20px', 'pixfort-core'),
                        'pix-p-25'         => __('25px', 'pixfort-core'),
                        'pix-p-30'         => __('30px', 'pixfort-core'),
                        'pix-p-35'         => __('35px', 'pixfort-core'),
                        'pix-p-40'         => __('40px', 'pixfort-core'),
                        'pix-p-45'         => __('45px', 'pixfort-core'),
                        'pix-p-50'         => __('50px', 'pixfort-core'),
                        'pix-px-5'         => __('5px (Horizontal only)', 'pixfort-core'),
                        'pix-px-10'         => __('10px (Horizontal only)', 'pixfort-core'),
                        'pix-px-20'         => __('20px (Horizontal only)', 'pixfort-core'),
                        'pix-px-30'         => __('30px (Horizontal only)', 'pixfort-core'),
                        'pix-px-40'         => __('40px (Horizontal only)', 'pixfort-core'),
                        'pix-px-50'         => __('50px (Horizontal only)', 'pixfort-core'),
                        'pix-px-60'         => __('60px (Horizontal only)', 'pixfort-core'),
                        'pix-px-70'         => __('70px (Horizontal only)', 'pixfort-core'),
                        'pix-px-80'         => __('80px (Horizontal only)', 'pixfort-core'),
                        'pix-px-90'         => __('90px (Horizontal only)', 'pixfort-core'),
                        'pix-px-100'         => __('100px (Horizontal only)', 'pixfort-core'),
                    ),
                    'default'  => '',
                ),

                array(
                    'id'       => 'pix-use-clip-path',
                    'type'     => 'switch',
                    'title'    => __('Enable Clip path', 'pixfort-core'),
                    'desc'     => __('This option will enable the css sticky while using the page padding option, however, this may slow down the page performance when used with heavy elements.<br />Please note that this effect may slow down the website if the page includes heavy content, if you experince any performance issues in some browsers please disable this option.', 'pixfort-core'),
                    'default'  => false,
                    'required' => array('pix-body-padding','!=',''),
                ),

                array(
                    'id'       => 'pix-body-bg-color',
                    'type'     => 'select',
                    'title'    => __('Background color', 'pixfort-core'),
                    'options'  => array_flip($bg_colors),
                    // 'required' => array('pix-body-padding','!=',''),
                ),
                array(
                    'id'       => 'custom-body-bg-color',
                    'type'     => 'color',
                    'title'    => __('Custom background Color', 'pixfort-core'),
                    'transparent' => false,
                    'default'  => '#FFFFFF',
                    'required' => array('pix-body-bg-color','equals','custom'),
                    'validate' => 'color',
                ),


                array(
                    'id'       => 'website-preview',
                    'type'     => 'media',
                    'url'      => true,
                    'title'    => __('Website image preview', 'pixfort-core'),
                    'desc'     => __('Use a custom image to display when the website is shared on social media.', 'pixfort-core'),
                ),


                array(
                    'id'       => 'back-to-top',
                    'type'     => 'select',
                    'title'    => __('Back to top button', 'pixfort-core'),
                    'default'   => 'default',
                    'options'  => array(
                        "default"            => "Default (bottom right)",
                        "is-left"        => "Bottom left",
                        "disable"        => "Disable"
                    ),
                ),


            )
        )

    ) );


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Popups', 'pixfort-core' ),
        'id'         => 'exit_popup',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'pix-exit-popup',
                'type'     => 'select',
                'title'    => __('Exit popup', 'pixfort-core'),
                'desc' => __('The popup will show when the mouse leave the browser tab.', 'pixfort-core'),
                'options'  => $popups,
            ),
            array(
                'id'       => 'pix-exit-popup-id',
                'type'     => 'text',
                'title'    => __( 'Exit popup ID', 'pixfort-core' ),
                'desc' => __('Changing the ID will reset the closed state for all users (all users will start to see the popup again).', 'pixfort-core'),
                'default'  => 'exit-popup-1',
                'required' => array('pix-exit-popup','!=',false),
            ),

            array(
                'id'       => 'pix-automatic-popup',
                'type'     => 'select',
                'title'    => __('Automatic popup', 'pixfort-core'),
                'desc' => __('The popup will show after a specified amount of time.', 'pixfort-core'),
                'options'  => $popups,
            ),

            array(
                'id'       => 'pix-automatic-popup-id',
                'type'     => 'text',
                'title'    => __( 'automatic popup ID', 'pixfort-core' ),
                'desc' => __('Changing the ID will reset the closed state for all users (all users will start to see the popup again).', 'pixfort-core'),
                'default'  => 'automatic-popup-1',
                'required' => array('pix-automatic-popup','!=',false),
            ),

            array(
                'id'       => 'pix-automatic-popup-time',
                'type'     => 'text',
                'title'    => __( 'Automatic popup time', 'pixfort-core' ),
                'desc' => __('The time before opening the popup (in seconds).', 'pixfort-core'),
                'default'  => '5',
                'required' => array('pix-automatic-popup','!=',''),
            ),
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Sidebars', 'pixfort-core' ),
        'id'         => 'sidebars',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'=>'pix_sidebars',
                'type' => 'multi_text',
                'title' => __('Sidebars', 'pixfort-core'),
                'subtitle' => __('Manage custom sidebars', 'pixfort-core'),
                'desc' => __('Sidebars can be used on pages, blog, portfolio,...etc.', 'pixfort-core')
            ),
        )
    ) );


    $opts_dividers = array();
    $opts_dividers[0] = array(
        'img'   => PIX_CORE_PLUGIN_URI.'functions/images/shapes/none.png'
    );
    for ($x = 1; $x <= 23; $x++) {
        $opts_dividers[$x] = array(
            'img'   => PIX_CORE_PLUGIN_URI.'functions/images/shapes/divider-'.$x.'.png'
        );
    }








    Redux::setSection( $opt_name, array(
        'title'      => __( 'API Keys', 'pixfort-core' ),
        'id'         => 'api_keys',
        'desc'       => __( 'For detailed information about setting up Google maps check this article from our knowledge base: ', 'pixfort-core' ) . '<a target="_blank" href="https://essentials.pixfort.com/knowledge-base/using-advanced-google-maps-styles/" target="_blank">https://essentials.pixfort.com/knowledge-base/using-advanced-google-maps-styles/</a>',
            'subsection' => true,
            'fields'     => array(

                array(
                    'id'       => 'google-api-key',
                    'type'     => 'text',
                    'title'    => __( 'Google API Key', 'pixfort-core' ),
                    'desc'  => __( 'Google API Key is required for Google Maps elements.', 'pixfort-core' ),
                ),

            )
        ) );





        Redux::setSection( $opt_name, array(
            'title'      => __( 'Cookies consent', 'pixfort-core' ),
            'id'         => 'cookies_consent',
            'subsection' => true,
            'fields'     => array(
                array(
                    'id'       => 'pix-enable-cookies',
                    'type'     => 'switch',
                    'title'    => __('Enable Cookies banner', 'pixfort-core'),
                    'desc' => __('Add Cookies consent bar at the bottom of the page.', 'pixfort-core'),
                    'default'  => false,
                ),

                array(
                    'id'       => 'pix-cookies-id',
                    'type'     => 'text',
                    'title'    => __( 'Cookies ID', 'pixfort-core' ),
                    'desc' => __('Changing the ID will reset the closed state for all users (all users will start to see the banner again).', 'pixfort-core'),
                    'default'  => 'Cookies-1',
                    'required' => array('pix-enable-cookies','!=',false),
                ),
                array(
                    'id'       => 'pix-cookies-text',
                    'type'     => 'text',
                    'title'    => __( 'Banner text', 'pixfort-core' ),
                    'default'    => __('By using this website, you agree to our', 'pixfort-core'),
                    'required' => array('pix-enable-cookies','=',true),
                ),
                array(
                    'id'       => 'pix-cookies-btn',
                    'type'     => 'text',
                    'title'    => __( 'Banner Button text', 'pixfort-core' ),
                    'default'  => 'cookie policy.',
                    'required' => array('pix-enable-cookies','=',true),
                ),
                array(
                    'id'       => 'pix-cookies-page',
                    'type'     => 'select',
                    'title'    => __('Cookie policy page', 'pixfort-core'),
                    'options'  => $pages,
                    'required' => array('pix-enable-cookies','=',true),
                ),
                array(
                    'id'       => 'pix-cookies-url',
                    'type'     => 'text',
                    'title'    => __( 'Cookies policy URL', 'pixfort-core' ),
                    'desc'  => __( 'Show the policy in a link (optional).', 'pixfort-core' ),
                ),

                array(
                    'id'       => 'pix-cookies-target',
                    'type'     => 'switch',
                    'required' => array('pix-cookies-url','!=',''),
                    'title'    => __('Open in a new tab', 'pixfort-core'),
                    'default'  => true,
                ),

                array(
                    'id'       => 'pix-cookies-popup',
                    'type'     => 'select',
                    'title'    => __('Cookie policy popup', 'pixfort-core'),
                    'options'  => $popups,
                    'required' => array('pix-enable-cookies','=',true),
                    'desc' => __('Show the policy in a popup instead of redirecting the user to a page.', 'pixfort-core'),
                ),

                array(
                    'id'       => 'cookie-img',
                    'type'     => 'media',
                    'url'      => true,
                    'title'    => __('Cookie banner image', 'pixfort-core'),
                    'desc'     => __('Image will be displayed at 30 pixels size.', 'pixfort-core'),
                    'subtitle' => __('Leave empty to display the deafult image icon', 'pixfort-core'),
                ),
            )
        ) );


        Redux::setSection( $opt_name, array(
            'title'      => __( 'Page Transition', 'pixfort-core' ),
            'id'         => 'page_transition',
            'subsection' => true,
            'fields'     => array(
                array(
                    'id'       => 'site-page-transition',
                    'type'     => 'select',
                    'title'    => __('Page transition', 'pixfort-core'),
                    'subtitle' => __('The transition when entering/leaving the page.', 'pixfort-core'),
                    'default'   => 'default',
                    'options'  => array(
                        "default"            => __("Default (Slide)", 'pixfort-core'),
                        "fade-page-transition"        => __("Fade", 'pixfort-core'),
                        "disable-page-transition"        => __("Disable", 'pixfort-core')
                    ),
                ),
                array(
                    'id'       => 'site-page-transition-color',
                    'type'     => 'color',
                    'title'    => __('Page transition background', 'pixfort-core'),
                    'transparent' => false,
                    'default'  => '#FFFFFF',
                    'required' => array('site-page-transition','!=','disable-page-transition'),
                    'validate' => 'color',
                ),

                array(
                    'id'       => 'site-disable-loading-icon',
                    'type'     => 'switch',
                    'title'    => __('Disable loading transition', 'pixfort-core'),
                    'default'  => false,
                ),


                array(
                    'id'       => 'site-disable-loading-bar',
                    'type'     => 'switch',
                    'title'    => __('Disable top loading bar', 'pixfort-core'),
                    'default'  => false,
                    'desc' => __('Note: the bar color is the website gradient color set in Theme options > Layout > Colors.', 'pixfort-core'),
                ),


            )
        ) );



        Redux::setSection( $opt_name, array(
            'title'      => __( '404 Page', 'pixfort-core' ),
            'id'         => 'page_404',
            'subsection' => true,
            'fields'     => array(
                array(
                    'id'       => 'pix-enable-custom-404',
                    'type'     => 'switch',
                    'title'    => __('Enable custom 404 page', 'pixfort-core'),
                    'default'  => false,
                ),
                array(
                    'id'       => 'pix-custom-404-page',
                    'type'     => 'select',
                    'title'    => __('Custom 404 page', 'pixfort-core'),
                    'options'  => $pages,
                    'required' => array('pix-enable-custom-404','=',true),
                ),
            )
        ) );

        Redux::setSection( $opt_name, array(
            'title'      => __( 'Elementor', 'pixfort-core' ),
            'id'         => 'pix_elementor',
            'subsection' => true,
            'fields'     => array(
                array(
                    'id'       => 'pix-disable-elementor-demo',
                    'type'     => 'switch',
                    'title'    => __('Disable pixfort demo blocks', 'pixfort-core'),
                    'desc' => __('If you disable pixfort demo block from Elementor library you will see the default Elementor blocks instead.', 'pixfort-core'),
                    'default'  => false,
                ),
                array(
                    'id'       => 'pix-add-default-container',
                    'type'     => 'switch',
                    'title'    => __('Add default page container in Elementor', 'pixfort-core'),
                    // 'desc' => __('If you disable pixfort demo block from Elementor library you will see the default Elementor blocks instead.', 'pixfort-core'),
                    'default'  => false,
                ),
            )
        ) );

        Redux::setSection( $opt_name, array(
            'title'      => __( 'Advanced', 'pixfort-core' ),
            'id'         => 'pix_advanced_opts',
            'subsection' => true,
            'fields'     => array(
                array(
                    'id'       => 'pix-enable-cf7-css',
                    'type'     => 'switch',
                    'title'    => __('Enqueue Contact form 7 styling inside the theme', 'pixfort-core'),
                    'desc' => __('Enabling this option will enqueue Contact form 7 css styling inside the theme styling file instead of a standalone file which may improve pages loading speed.', 'pixfort-core'),
                    'default'  => false,
                ),
                array(
                    'id'       => 'pix-enable-popup-enqueue',
                    'type'     => 'switch',
                    'title'    => __('Enqueue scripts and styling in Popups', 'pixfort-core'),
                    'desc' => __('Enabling this option will enqueue the scripts and css files required in the popup dynamically if they are not already loaded in the page.', 'pixfort-core'),
                    'default'  => true,
                ),

                array(
                    'id'       => 'pix-disable-lazy-images',
                    'type'     => 'switch',
                    'title'    => __('Disable Image Lazy Loading', 'pixfort-core'),
                    'desc' => __('Lazy loading will delay the loading of some images until they are needed in the page which improves the page performance.<br>Please note that if you also have another lazy loading function in a different third party plugin then you should disable one of them.', 'pixfort-core'),
                    'default'  => false,
                ),

            )
        ) );






        Redux::setSection( $opt_name, array(
            'title' => __( 'Layout', 'pixfort-core' ),
            'id'    => 'layout',
            'desc'  => __( 'Basic fields as subsections.', 'pixfort-core' ),
            'icon'  => $optionsIcons['layout'],
            'icon_type'  => $optionsIconType
        ) );


        Redux::setSection( $opt_name, array(
            'title'      => __( 'Header', 'pixfort-core' ),
            'id'         => 'headers',
            'subsection' => true,
            'desc'       => __( 'For detailed information about setting up the header check this article from our knowledge base: ', 'pixfort-core' ) . '<a target="_blank" href="https://essentials.pixfort.com/knowledge-base/creating-website-header" target="_blank">https://essentials.pixfort.com/knowledge-base/creating-website-header</a>',
                'fields'     => array(


                    array(
                        'id'       => 'pix-header',
                        'type'     => 'select',
                        'title'    => __('Website header', 'pixfort-core'),
                        'default'   => 'default',
                        'options'  => $headers,
                    ),

                )
            ) );


            Redux::setSection( $opt_name, array(
                'title'      => __( 'Footer', 'pixfort-core' ),
                'id'         => 'footers',
                'subsection' => true,
                'desc'       => __( 'For detailed information about setting up the footer check this article from our knowledge base: ', 'pixfort-core' ) . '<a target="_blank" href="https://essentials.pixfort.com/knowledge-base/creating-website-footer" target="_blank">https://essentials.pixfort.com/knowledge-base/creating-website-footer</a>',
                    'fields'     => array(


                        array(
                            'id'       => 'pix-footer',
                            'type'     => 'select',
                            'title'    => __('Footer', 'pixfort-core'),
                            'options'  => $footers,
                        ),

                        array(
                            'id'       => 'pix-sticky-footer',
                            'type'     => 'switch',
                            'title'    => __('Enable sticky footer', 'pixfort-core'),
                            'default'  => false,
                        ),

                        array(
                            'id'       => 'sticky-footer-bg-color',
                            'type'     => 'select',
                            'title'    => __('Sticky footer fade color', 'pixfort-core'),
                            'options'  => array_flip($bg_colors),
                            'default'  => 'gradient-primary',
                        ),
                        array(
                            'id'       => 'custom-sticky-footer-bg-color',
                            'type'     => 'color',
                            'title'    => __('Custom Sticky footer fade color', 'pixfort-core'),
                            'transparent' => false,
                            'default'  => '#FFFFFF',
                            'required' => array('sticky-footer-bg-color','equals','custom'),
                            'validate' => 'color',
                        ),
                    )
                ) );


                Redux::setSection( $opt_name, array(
                    'title'      => __( 'Banner', 'pixfort-core' ),
                    'id'         => 'layout-banner',
                    'subsection' => true,
                    'fields'     => array(
                        array(
                            'id'       => 'show-banner',
                            'type'     => 'switch',
                            'title'    => __('Show Banner', 'pixfort-core'),
                            'desc' => __('Show the banner on top of the page', 'pixfort-core'),
                            'default'  => false,
                        ),

                        array(
                            'id'       => 'banner-id',
                            'type'     => 'text',
                            'title'    => __( 'Banner ID', 'pixfort-core' ),
                            'desc' => __('Changing the ID will reset the closed state for all users (all users will start to see the banner again).', 'pixfort-core'),
                            'default'  => 'Banner-1',
                            'required' => array('show-banner','!=',false),
                        ),
                        array(
                            'id'       => 'banner-text',
                            'type'     => 'text',
                            'title'    => __( 'Banner Text', 'pixfort-core' ),
                            'default'  => '',
                            'required' => array('show-banner','!=',false),
                        ),

                        array(
                            'id'       => 'banner-bg',
                            'type'     => 'select',
                            'title'    => __('Background color', 'pixfort-core'),
                            'options'  => array_flip($bg_colors),
                            'required' => array('show-banner','!=',false),
                        ),

                        array(
                            'id'       => 'custom-banner-bg',
                            'type'     => 'color',
                            'title'    => __('Custom banner Color', 'pixfort-core'),
                            'transparent' => false,
                            'default'  => '#FFFFFF',
                            'required' => array('top-bar-bg','equals','custom'),
                            'validate' => 'color',
                        ),

                        array(
                            'id'       => 'banner-bg-img',
                            'type'     => 'media',
                            'url'      => true,
                            'title'    => __('background image', 'pixfort-core'),
                            'required' => array('show-banner','!=',false),
                        ),

                        array(
                            'id'       => 'bold-banner-text',
                            'type'     => 'switch',
                            'title'    => __('Bold banner text', 'pixfort-core'),
                            'default'  => true,
                            'required' => array('show-banner','!=',false),
                        ),
                        array(
                            'id'       => 'secondary-banner-text',
                            'type'     => 'switch',
                            'title'    => __('Use secondary font for Topbar text', 'pixfort-core'),
                            'default'  => false,
                            'required' => array('show-banner','!=',false),
                        ),

                        array(
                            'id'       => 'banner-text-color',
                            'type'     => 'select',
                            'title'    => __('Text Color', 'pixfort-core'),
                            'subtitle' => __('Pick the text color.', 'pixfort-core'),
                            'options'  => array_flip($colors),
                            'default'  => 'gray-9',
                            'required' => array('show-banner','!=',false),

                        ),

                        array(
                            'id'       => 'banner-custom-text-color',
                            'type'     => 'color',
                            'title'    => __('Custom banner text color', 'pixfort-core'),
                            'default'  => '#212529',
                            'transparent' => false,
                            'validate' => 'color',
                            'required' => array('banner-text-color','=','custom'),
                        ),


                        array(
                            'id'       => 'show-banner-btn',
                            'type'     => 'switch',
                            'title'    => __('Show Banner button', 'pixfort-core'),
                            'default'  => false,
                            'required' => array('show-banner','!=',false),
                        ),


                        array(
                            'id'       => 'banner-btn-text',
                            'type'     => 'text',
                            'title'    => __( 'Banner Text', 'pixfort-core' ),
                            'default'  => 'Check it Now',
                            'required' => array('show-banner-btn','!=',false),
                        ),
                        array(
                            'id'       => 'banner-btn-link',
                            'type'     => 'text',
                            'title'    => __( 'Banner Link', 'pixfort-core' ),
                            'default'  => '#',
                            'required' => array('show-banner-btn','!=',false),
                        ),

                        array(
                            'id'       => 'show-banner-target',
                            'type'     => 'switch',
                            'required' => array('show-banner-btn','!=',false),
                            'title'    => __('Open in a new tab', 'pixfort-core'),
                            'default'  => true,
                        ),


                        array(
                            'id'       => 'banner-btn-style',
                            'type'     => 'select',
                            'title'    => __('Button style', 'pixfort-core'),
                            'default'   => '',
                            'required' => array('show-banner-btn','!=',false),
                            'options'  => array(
                                ""            => __("Default", 'pixfort-core'),
                                "flat"        => __("Flat", 'pixfort-core'),
                                "line"        => __("Line", 'pixfort-core'),
                                "outline"     => __("Outline", 'pixfort-core'),
                                "underline"     => __("Underline", 'pixfort-core'),
                                "blink"     => __("Blink", 'pixfort-core')
                            ),
                        ),

                        array(
                            'id'       => 'banner-btn-color',
                            'type'     => 'select',
                            'required' => array('show-banner-btn','!=',false),
                            'title'    => __('Button color', 'pixfort-core'),
                            'default'   => 'primary',
                            'options'  => array(
                                'primary' 		=> __('Primary', 'pixfort-core'),
                                'primary-light' 		=> __('Primary Light', 'pixfort-core'),
                                'secondary'		=> __('Secondary', 'pixfort-core'),
                                'light' 		=> __('Light', 'pixfort-core'),
                                'dark' 		    => __('Dark', 'pixfort-core'),
                                'black' 		=> __('Black', 'pixfort-core'),
                                'link' 		    => __('Link', 'pixfort-core'),
                                'white' 		=> __('White', 'pixfort-core'),
                                'blue' 		    => __('Blue', 'pixfort-core'),
                                'red' 		    => __('Red', 'pixfort-core'),
                                'cyan' 		    => __('Cyan', 'pixfort-core'),
                                'orange' 		    => __('Orange', 'pixfort-core'),
                                'green' 		    => __('Green', 'pixfort-core'),
                                'purple' 		    => __('Purple', 'pixfort-core'),
                                'brown' 		    => __('Brown', 'pixfort-core'),
                                'yellow' 		    => __('Yellow', 'pixfort-core'),
                                'bg-gradient-primary' 		    => __('Primary gradient', 'pixfort-core'),
                                "gray-1" => __('Gray 1', 'pixfort-core'),
                                "gray-2" => __('Gray 2', 'pixfort-core'),
                                "gray-3" => __('Gray 3', 'pixfort-core'),
                                "gray-4" => __('Gray 4', 'pixfort-core'),
                                "gray-5" => __('Gray 5', 'pixfort-core'),
                                "gray-6" => __('Gray 6', 'pixfort-core'),
                                "gray-7" => __('Gray 7', 'pixfort-core'),
                                "gray-8" => __('Gray 8', 'pixfort-core'),
                                "gray-9" => __('Gray 9', 'pixfort-core'),
                                "bg-dark-opacity-1" => __('Dark opacity 1', 'pixfort-core'),
                                "bg-dark-opacity-2" => __('Dark opacity 2', 'pixfort-core'),
                                "bg-dark-opacity-3" => __('Dark opacity 3', 'pixfort-core'),
                                "bg-dark-opacity-4" => __('Dark opacity 4', 'pixfort-core'),
                                "bg-dark-opacity-5" => __('Dark opacity 5', 'pixfort-core'),
                                "bg-dark-opacity-6" => __('Dark opacity 6', 'pixfort-core'),
                                "bg-dark-opacity-7" => __('Dark opacity 7', 'pixfort-core'),
                                "bg-dark-opacity-8" => __('Dark opacity 8', 'pixfort-core'),
                                "bg-dark-opacity-9" => __('Dark opacity 9', 'pixfort-core'),
                                "bg-light-opacity-1" => __('Light opacity 1', 'pixfort-core'),
                                "bg-light-opacity-2" => __('Light opacity 2', 'pixfort-core'),
                                "bg-light-opacity-3" => __('Light opacity 3', 'pixfort-core'),
                                "bg-light-opacity-4" => __('Light opacity 4', 'pixfort-core'),
                                "bg-light-opacity-5" => __('Light opacity 5', 'pixfort-core'),
                                "bg-light-opacity-6" => __('Light opacity 6', 'pixfort-core'),
                                "bg-light-opacity-7" => __('Light opacity 7', 'pixfort-core'),
                                "bg-light-opacity-8" => __('Light opacity 8', 'pixfort-core'),
                                "bg-light-opacity-9" => __('Light opacity 9', 'pixfort-core')

                            ),

                        ),


                        array(
                            'id'       => 'banner-btn-text-color',
                            'type'     => 'select',
                            'required' => array('show-banner-btn','!=',false),
                            'title'    => __('Text Color', 'pixfort-core'),
                            'subtitle' => __('Pick the text color.', 'pixfort-core'),
                            'options'  => array_flip($colors),
                            'default'  => '',

                        ),

                        array(
                            'id'       => 'banner-btn-custom-text-color',
                            'type'     => 'color',
                            'title'    => __('Custom banner text color', 'pixfort-core'),
                            'default'  => '#212529',
                            'transparent' => false,
                            'validate' => 'color',
                            'required' => array('banner-btn-text-color','=','custom'),
                        ),

                        array(
                            'id'       => 'show-banner-countdown',
                            'type'     => 'switch',
                            'required' => array('show-banner','!=',false),
                            'title'    => __('Show countdown', 'pixfort-core'),
                            'default'  => false,
                        ),

                        array(
                            'id'       => 'banner-date',
                            'type'     => 'text',
                            'title'    => __( 'Banner Countdown Date', 'pixfort-core' ),
                            'default'  => '2020/10/10 00:48',
                            'required' => array('show-banner-countdown','!=',false),
                            'desc' => __('Example: 2021/12/30 12:00', 'pixfort-core'),
                        ),

                        array(
                            'id'       => 'banner-padding',
                            'type'     => 'select',
                            'title'    => __('Banner padding', 'pixfort-core'),
                            'default'   => '',
                            'options'  => array(
                                ""            => __('Default', 'pixfort-core'),
                                "pix-py-5"        => __('5px', 'pixfort-core'),
                                "pix-py-10"        => __('10px', 'pixfort-core'),
                                "pix-py-20"        => __('20px', 'pixfort-core'),
                            ),
                            'required' => array('show-banner','!=',false),
                        ),

                    )
                ) );


                Redux::setSection( $opt_name, array(
                    'title'      => __( 'Search', 'pixfort-core' ),
                    'id'         => 'layout-search',
                    'subsection' => true,
                    'fields'     => array(


                        array(
                            'id'       => 'search-style',
                            'type'     => 'button_set',
                            'title'    => __('Search overlay style', 'pixfort-core'),
                            'options' => array(
                                '1' => __('ZigZag', 'pixfort-core'),
                                '2' => __('Default Waves', 'pixfort-core'),
                                '3' => __('Paper Slides', 'pixfort-core'),
                                '4' => __('Horizontal Waves', 'pixfort-core'),
                                '5' => __('Time Machine', 'pixfort-core'),
                                '6' => __('Silly Waves', 'pixfort-core'),
                            ),
                            'default' => '2'
                        ),

                        array(
                            'id'        => 'opt-slider-label',
                            'type'      => 'slider',
                            'title'     => __('Layers', 'pixfort-core'),
                            'subtitle'  => __('Choose the number of the animation layers.', 'pixfort-core'),
                            "default"   => 3,
                            "min"       => 1,
                            "step"      => 1,
                            "max"       => 4,
                            'display_value' => 'label'
                        ),

                        array(
                            'id' => 'overlay-section-start',
                            'type' => 'section',
                            'title' => __('Layers colors', 'pixfort-core'),
                            'indent' => false
                        ),


                        array(
                            'id'       => 'overlay-color-1-primary',
                            'type'     => 'switch',
                            'title'    => __('Use Primary gradient color for layer 1', 'pixfort-core'),
                            'desc' => __('You can edit the primary gradient color in the colors section (left menu)', 'pixfort-core'),
                            'default'  => true,
                        ),

                        array(
                            'id'       => 'overlay-color-1',
                            'type'     => 'color_gradient',
                            'title'    => __('layer 1 Color', 'pixfort-core'),
                            'validate' => 'color',
                            'transparent' => false,
                            'default'  => array(
                                'from' => '#7d8dff',
                                'to'   => '#ff4f81',
                            ),
                            'required' => array('overlay-color-1-primary','equals',false),
                        ),
                        array(
                            'id'     => 'overlay-section-end',
                            'type'   => 'section',
                            'indent' => false,
                        ),

                        array(
                            'id'       => 'overlay-color-2',
                            'type'     => 'color_gradient',
                            'title'    => __('layer 2 Color', 'pixfort-core'),
                            'validate' => 'color',
                            'transparent' => false,
                            'default'  => array(
                                'from' => '#ff4f81',
                                'to'   => '#ff4f81',
                            ),
                            'required' => array('opt-slider-label','>=',2),
                        ),
                        array(
                            'id'       => 'overlay-color-3',
                            'type'     => 'color_gradient',
                            'title'    => __('layer 3 Color', 'pixfort-core'),
                            'validate' => 'color',
                            'transparent' => false,
                            'default'  => array(
                                'from' => '#7d8dff',
                                'to'   => '#7d8dff',
                            ),
                            'required' => array('opt-slider-label','>=',3),
                        ),
                        array(
                            'id'       => 'overlay-color-4',
                            'type'     => 'color_gradient',
                            'title'    => __('Layer 4 Color', 'pixfort-core'),
                            'validate' => 'color',
                            'transparent' => false,
                            'default'  => array(
                                'from' => '#7d8dff',
                                'to'   => '#ff4f81',
                            ),
                            'required' => array('opt-slider-label','>=',4),
                        ),




                    )
                ) );


                Redux::setSection( $opt_name, array(
                    'title'      => __( 'Social Icons', 'pixfort-core' ),
                    'id'         => 'social',
                    'subsection' => true,
                    'fields'     => array(

                        array(
                            'id'       => 'social-target-blank',
                            'type'     => 'switch',
                            'title'    => __('Open links in new tab', 'pixfort-core'),
                            'default'  => false,
                        ),


                        array(
                            'id'       => 'social-skype',
                            'type'     => 'text',
                            'title'    => __( 'Skype', 'pixfort-core' ),
                            'subtitle' => __( 'Type your Skype username here', 'pixfort-core' ),
                            'desc'     => __( 'You can use <strong>callto:</strong> or <strong>skype:</strong> prefix', 'pixfort-core' ),
                            'default'  => '',
                        ),
                        array(
                            'id'       => 'social-facebook',
                            'type'     => 'text',
                            'title'    => __( 'Facebook', 'pixfort-core' ),
                            'subtitle' => __( 'Type your Facebook link here', 'pixfort-core' ),
                            'desc'     => __( 'Icon won`t show if you leave this field blank', 'pixfort-core' ),
                            'default'  => '',
                        ),
                        array(
                            'id'       => 'social-google',
                            'type'     => 'text',
                            'title'    => __( 'Google', 'pixfort-core' ),
                            'subtitle' => __( 'Type your Google link here', 'pixfort-core' ),
                            'desc'     => __( 'Icon won`t show if you leave this field blank', 'pixfort-core' ),
                            'default'  => '',
                        ),
                        array(
                            'id'       => 'social-twitter',
                            'type'     => 'text',
                            'title'    => __( 'Twitter', 'pixfort-core' ),
                            'subtitle' => __( 'Type your Twitter link here', 'pixfort-core' ),
                            'desc'     => __( 'Icon won`t show if you leave this field blank', 'pixfort-core' ),
                            'default'  => '',
                        ),
                        array(
                            'id'       => 'social-vimeo',
                            'type'     => 'text',
                            'title'    => __( 'Vimeo', 'pixfort-core' ),
                            'subtitle' => __( 'Type your Vimeo link here', 'pixfort-core' ),
                            'desc'     => __( 'Icon won`t show if you leave this field blank', 'pixfort-core' ),
                            'default'  => '',
                        ),
                        array(
                            'id'       => 'social-youtube',
                            'type'     => 'text',
                            'title'    => __( 'YouTube', 'pixfort-core' ),
                            'subtitle' => __( 'Type your YouTube link here', 'pixfort-core' ),
                            'desc'     => __( 'Icon won`t show if you leave this field blank', 'pixfort-core' ),
                            'default'  => '',
                        ),
                        array(
                            'id'       => 'social-flickr',
                            'type'     => 'text',
                            'title'    => __( 'Flickr', 'pixfort-core' ),
                            'subtitle' => __( 'Type your Flickr link here', 'pixfort-core' ),
                            'desc'     => __( 'Icon won`t show if you leave this field blank', 'pixfort-core' ),
                            'default'  => '',
                        ),
                        array(
                            'id'       => 'social-linkedin',
                            'type'     => 'text',
                            'title'    => __( 'LinkedIn', 'pixfort-core' ),
                            'subtitle' => __( 'Type your LinkedIn link here', 'pixfort-core' ),
                            'desc'     => __( 'Icon won`t show if you leave this field blank', 'pixfort-core' ),
                            'default'  => '',
                        ),
                        array(
                            'id'       => 'social-pinterest',
                            'type'     => 'text',
                            'title'    => __( 'Pinterest', 'pixfort-core' ),
                            'subtitle' => __( 'Type your YouTube link here', 'pixfort-core' ),
                            'desc'     => __( 'Icon won`t show if you leave this field blank', 'pixfort-core' ),
                            'default'  => '',
                        ),
                        array(
                            'id'       => 'social-dribbble',
                            'type'     => 'text',
                            'title'    => __( 'Dribbble', 'pixfort-core' ),
                            'subtitle' => __( 'Type your Dribbble link here', 'pixfort-core' ),
                            'desc'     => __( 'Icon won`t show if you leave this field blank', 'pixfort-core' ),
                            'default'  => '',
                        ),
                        array(
                            'id'       => 'social-instagram',
                            'type'     => 'text',
                            'title'    => __( 'Instagram', 'pixfort-core' ),
                            'subtitle' => __( 'Type your Instagram link here', 'pixfort-core' ),
                            'desc'     => __( 'Icon won`t show if you leave this field blank', 'pixfort-core' ),
                            'default'  => '',
                        ),
                        array(
                            'id'       => 'social-snapchat',
                            'type'     => 'text',
                            'title'    => __( 'Snapchat', 'pixfort-core' ),
                            'subtitle' => __( 'Type your Snapchat link here', 'pixfort-core' ),
                            'desc'     => __( 'Icon won`t show if you leave this field blank', 'pixfort-core' ),
                            'default'  => '',
                        ),
                        array(
                            'id'       => 'social-telegram',
                            'type'     => 'text',
                            'title'    => __( 'Telegram', 'pixfort-core' ),
                            'subtitle' => __( 'Type your Telegram link here', 'pixfort-core' ),
                            'desc'     => __( 'Icon won`t show if you leave this field blank', 'pixfort-core' ),
                            'default'  => '',
                        ),
                        array(
                            'id'       => 'social-googleplay',
                            'type'     => 'text',
                            'title'    => __( 'Google play', 'pixfort-core' ),
                            'subtitle' => __( 'Type your Google play link here', 'pixfort-core' ),
                            'desc'     => __( 'Icon won`t show if you leave this field blank', 'pixfort-core' ),
                            'default'  => '',
                        ),
                        array(
                            'id'       => 'social-appstore',
                            'type'     => 'text',
                            'title'    => __( 'App store', 'pixfort-core' ),
                            'subtitle' => __( 'Type your App store link here', 'pixfort-core' ),
                            'desc'     => __( 'Icon won`t show if you leave this field blank', 'pixfort-core' ),
                            'default'  => '',
                        ),
                        array(
                            'id'       => 'social-whatsapp',
                            'type'     => 'text',
                            'title'    => __( 'Whatsapp', 'pixfort-core' ),
                            'subtitle' => __( 'Type your whatsapp link here', 'pixfort-core' ),
                            'desc'     => __( 'Icon won`t show if you leave this field blank', 'pixfort-core' ),
                            'default'  => '',
                        ),
                        array(
                            'id'       => 'social-flipboard',
                            'type'     => 'text',
                            'title'    => __( 'Flipboard', 'pixfort-core' ),
                            'subtitle' => __( 'Type your flipboard link here', 'pixfort-core' ),
                            'desc'     => __( 'Icon won`t show if you leave this field blank', 'pixfort-core' ),
                            'default'  => '',
                        ),
                        array(
                            'id'       => 'social-vk',
                            'type'     => 'text',
                            'title'    => __( 'VK', 'pixfort-core' ),
                            'subtitle' => __( 'Type your VK link here', 'pixfort-core' ),
                            'desc'     => __( 'Icon won`t show if you leave this field blank', 'pixfort-core' ),
                            'default'  => '',
                        ),
                        array(
                            'id'       => 'social-discord',
                            'type'     => 'text',
                            'title'    => __( 'Discord', 'pixfort-core' ),
                            'subtitle' => __( 'Type your Discord link here', 'pixfort-core' ),
                            'desc'     => __( 'Icon won`t show if you leave this field blank', 'pixfort-core' ),
                            'default'  => '',
                        ),
                        array(
                            'id'       => 'social-tik-tok',
                            'type'     => 'text',
                            'title'    => __( 'tik-tok', 'pixfort-core' ),
                            'subtitle' => __( 'Type your tik-tok link here', 'pixfort-core' ),
                            'desc'     => __( 'Icon won`t show if you leave this field blank', 'pixfort-core' ),
                            'default'  => '',
                        ),
                        array(
                            'id'       => 'social-twitch',
                            'type'     => 'text',
                            'title'    => __( 'twitch', 'pixfort-core' ),
                            'subtitle' => __( 'Type your twitch link here', 'pixfort-core' ),
                            'desc'     => __( 'Icon won`t show if you leave this field blank', 'pixfort-core' ),
                            'default'  => '',
                        ),
                        array(
                            'id'       => 'social-behance',
                            'type'     => 'text',
                            'title'    => __( 'behance', 'pixfort-core' ),
                            'subtitle' => __( 'Type your behance link here', 'pixfort-core' ),
                            'desc'     => __( 'Icon won`t show if you leave this field blank', 'pixfort-core' ),
                            'default'  => '',
                        ),
                        array(
                            'id'       => 'social-yelp',
                            'type'     => 'text',
                            'title'    => __( 'yelp', 'pixfort-core' ),
                            'subtitle' => __( 'Type your yelp link here', 'pixfort-core' ),
                            'desc'     => __( 'Icon won`t show if you leave this field blank', 'pixfort-core' ),
                            'default'  => '',
                        ),
                        array(
                            'id'       => 'social-soundcloud',
                            'type'     => 'text',
                            'title'    => __( 'soundcloud', 'pixfort-core' ),
                            'subtitle' => __( 'Type your soundcloud link here', 'pixfort-core' ),
                            'desc'     => __( 'Icon won`t show if you leave this field blank', 'pixfort-core' ),
                            'default'  => '',
                        ),
                        array(
                            'id'       => 'social-tripadvisor',
                            'type'     => 'text',
                            'title'    => __( 'tripadvisor', 'pixfort-core' ),
                            'subtitle' => __( 'Type your tripadvisor link here', 'pixfort-core' ),
                            'desc'     => __( 'Icon won`t show if you leave this field blank', 'pixfort-core' ),
                            'default'  => '',
                        ),

                    )
                ) );


                Redux::setSection( $opt_name, array(
                    'title'      => __( 'Colors', 'pixfort-core' ),
                    'id'         => 'layout-colors',
                    'subsection' => true,
                    'desc'       => __( 'For detailed information about theme colors please check this article from our knowledge base: ', 'pixfort-core' ) . '<a target="_blank" href="https://essentials.pixfort.com/knowledge-base/essentials-color-system" target="_blank">https://essentials.pixfort.com/knowledge-base/essentials-color-system</a>',
                        'fields'     => array(
                            array(
                                'id'       => 'opt-primary-color',
                                'type'     => 'color',
                                'title'    => __('Primary Color', 'pixfort-core'),
                                'subtitle' => __('Pick the primary color for the theme.', 'pixfort-core'),
                                'default'  => '#7d8dff',
                                'transparent' => false,
                                'validate' => 'color',
                            ),

                            array(
                                'id'       => 'opt-secondary-color',
                                'type'     => 'color',
                                'title'    => __('Secondary Color', 'pixfort-core'),
                                'subtitle' => __('Pick the secondary color for the theme.', 'pixfort-core'),
                                'default'  => '#ff4f81',
                                'transparent' => false,
                                'validate' => 'color',
                            ),



                            array(
                                'id'       => 'opt-link-color',
                                'type'     => 'color',
                                'title'    => __('Link Color', 'pixfort-core'),
                                'subtitle' => __('Pick the link color for the theme.', 'pixfort-core'),
                                'default'  => '#333333',
                                'transparent' => false,
                                'validate' => 'color',
                            ),

                            array(
                                'id' => 'section-primary-start',
                                'type' => 'section',
                                'title' => __('Primary Gradient color', 'pixfort-core'),
                                'indent' => false
                            ),
                            array(
                                'id'       => 'opt-primary-gradient-switch',
                                'type'     => 'switch',
                                'title'    => __('Use 3 colors gradient', 'pixfort-core'),
                                'default'  => false,
                            ),
                            array(
                                'id'       => 'opt-color-gradient-primary-1',
                                'type'     => 'color',
                                'title'    => __('Gradient start (Left)', 'pixfort-core'),
                                'default'  => '#7d8dff',
                                'transparent' => false,
                                'validate' => 'color',
                            ),
                            array(
                                'id'       => 'opt-color-gradient-primary-middle',
                                'type'     => 'color',
                                'title'    => __('Middle Color', 'pixfort-core'),
                                'default'  => '#4ED199',
                                'transparent' => false,
                                'required' => array('opt-primary-gradient-switch','equals',true),
                                'validate' => 'color',
                            ),
                            array(
                                'id'       => 'opt-color-gradient-primary-2',
                                'type'     => 'color',
                                'title'    => __('Gradient end (Right)', 'pixfort-core'),
                                'default'  => '#ff4f81',
                                'transparent' => false,
                                'validate' => 'color',
                            ),

                            array(
                                'id'       => 'opt-primary-gradient-dir',
                                'type'     => 'select',
                                'title'    => __('Gradient direction', 'pixfort-core'),
                                'default'   => "to right",
                                'options'  => array(
                                    "to right"            => __('Left to right', 'pixfort-core'),
                                    "to top"        => __('Bottom to top', 'pixfort-core'),
                                    "to top right"        => __('Bottom left to top right', 'pixfort-core'),
                                    "to bottom right"        => __('Top left to bottom right', 'pixfort-core'),
                                )
                            ),
                            array(
                                'id'       => 'disable-fixed-gradient',
                                'type'     => 'switch',
                                'title'    => __('Disable fixed gradients', 'pixfort-core'),
                                'desc' => __('Fixed gradient colors slow down the website in some browser, please disable the fixed gradient if it\' affecting website performance.', 'pixfort-core'),
                                'default'  => false,
                            ),



                            array(
                                'id' => 'section-main-colors-start',
                                'type' => 'section',
                                'title' => __('Main colors', 'pixfort-core'),
                                'indent' => false
                            ),

                            array(
                                'id'       => 'opt-color-blue',
                                'type'     => 'color',
                                'title'    => __('Blue Color', 'pixfort-core'),
                                'subtitle' => __('Pick the blue color for the theme.', 'pixfort-core'),
                                'default'  => '#1274E7',
                                'transparent' => false,
                                'validate' => 'color',
                            ),
                            array(
                                'id'       => 'opt-color-green',
                                'type'     => 'color',
                                'title'    => __('Green Color', 'pixfort-core'),
                                'subtitle' => __('Pick the green color for the theme.', 'pixfort-core'),
                                'default'  => '#4ED199',
                                'transparent' => false,
                                'validate' => 'color',
                            ),
                            array(
                                'id'       => 'opt-color-cyan',
                                'type'     => 'color',
                                'title'    => __('Cyan Color', 'pixfort-core'),
                                'subtitle' => __('Pick the cyan color for the theme.', 'pixfort-core'),
                                'default'  => '#0dd3ff',
                                'transparent' => false,
                                'validate' => 'color',
                            ),
                            array(
                                'id'       => 'opt-color-yellow',
                                'type'     => 'color',
                                'title'    => __('Yellow Color', 'pixfort-core'),
                                'subtitle' => __('Pick the yellow color for the theme.', 'pixfort-core'),
                                'default'  => '#ffc168',
                                'transparent' => false,
                                'validate' => 'color',
                            ),
                            array(
                                'id'       => 'opt-color-orange',
                                'type'     => 'color',
                                'title'    => __('Orange Color', 'pixfort-core'),
                                'subtitle' => __('Pick the orange color for the theme.', 'pixfort-core'),
                                'default'  => '#ff9900',
                                'transparent' => false,
                                'validate' => 'color',
                            ),
                            array(
                                'id'       => 'opt-color-red',
                                'type'     => 'color',
                                'title'    => __('Red Color', 'pixfort-core'),
                                'subtitle' => __('Pick the red color for the theme.', 'pixfort-core'),
                                'default'  => '#ff6c5f',
                                'transparent' => false,
                                'validate' => 'color',
                            ),
                            array(
                                'id'       => 'opt-color-brown',
                                'type'     => 'color',
                                'title'    => __('Brown Color', 'pixfort-core'),
                                'subtitle' => __('Pick the brown color for the theme.', 'pixfort-core'),
                                'default'  => '#b4a996',
                                'transparent' => false,
                                'validate' => 'color',
                            ),
                            array(
                                'id'       => 'opt-color-purple',
                                'type'     => 'color',
                                'title'    => __('Purple Color', 'pixfort-core'),
                                'subtitle' => __('Pick the purple color for the theme.', 'pixfort-core'),
                                'default'  => '#4b19f7',
                                'transparent' => false,
                                'validate' => 'color',
                            ),


                            array(
                                'id'     => 'section-main-colors-end',
                                'type'   => 'section',
                                'indent' => false,
                            ),

                        )
                    ) );







                    Redux::setSection( $opt_name, array(
                        'title'      => __( 'Advanced', 'pixfort-core' ),
                        'id'         => 'layout-advanced',
                        'subsection' => true,
                        'fields'     => array(

                            array(
                                'id'       => 'pic-custom-css',
                                'type'     => 'ace_editor',
                                'title'    => __('Custom CSS', 'pixfort-core'),
                                'mode'     => 'css',
                                'theme'    => 'monokai',
                                'desc'     => __('Add custom CSS to your website.', 'pixfort-core'),
                                'default'  => ""
                            ),
                            array(
                                'id'       => 'pix-custom-js-header',
                                'type'     => 'ace_editor',
                                'title'    => __('Custom JS (in header)', 'pixfort-core'),
                                'mode'     => 'javascript',
                                'theme'    => 'monokai',
                                'desc'     => __('Add custom JS code to your website header.', 'pixfort-core'),
                                'default'  => ""
                            ),
                            array(
                                'id'       => 'pix-custom-js-footer',
                                'type'     => 'ace_editor',
                                'title'    => __('Custom JS (in footer)', 'pixfort-core'),
                                'mode'     => 'javascript',
                                'theme'    => 'monokai',
                                'desc'     => __('Add custom JS code to your website footer.', 'pixfort-core'),
                                'default'  => ""
                            ),

                            array(
                                'id'       => 'pix-custom-header-includes',
                                'type'     => 'ace_editor',
                                'title'    => __('Custom header tags include', 'pixfort-core'),
                                'mode'     => 'html',
                                'theme'    => 'monokai',
                                'desc'     => __('Add custom code to your website header (for example external tags and scripts).', 'pixfort-core'),
                                'default'  => ""
                            ),


                            // pix-boxed-layout
                            // array(
                            //     'id'       => 'pix-boxed-layout',
                            //     'type'     => 'switch',
                            //     'title'    => __('Enable Boxed Layout (Beta)', 'pixfort-core'),
                            //     'desc' => __('Boxed layout display the content inside website width instead of full page width.', 'pixfort-core'),
                            //     'default'  => false,
                            // ),

                            array(
                                'id'       => 'pix-custom-container-width',
                                'type'     => 'text',
                                'title'    => __( 'Custom website width', 'pixfort-core' ),
                                'desc' => __('Input a custom website content width (with unit) to change the default width (the default is 1140px).', 'pixfort-core'),
                                'default'  => '',
                            ),
                            
                            array(
                                'id'       => 'pix-mobile-breakpoint',
                                'type'     => 'text',
                                'title'    => __( 'Custom Mobile Breakpoint', 'pixfort-core' ),
                                'desc' => __('Input a custom screen width in pixels to change the default breakpoint in which the mobile elements (for example the Mobile Header) will be displayed (the default is 992px).', 'pixfort-core'),
                                'default'  => '',
                            ),

                            // array(
                            //     'id'       => 'pix-custom-boxed',
                            //     'type'     => 'select',
                            //     'title'    => __('Boxed layout', 'pixfort-core'),
                            //     'options'  => array(
                            //         ''             => 'Disabled',
                            //         '100'             => '100',
                            //         '200'         => '200'
                            //     ),
                            //     'default'  => '',
                            // ),

                        )
                    ) );



                    Redux::setSection( $opt_name, array(
                        'title' => __( 'Blog', 'pixfort-core' ),
                        'id'    => 'blog_section',
                        'icon'  => $optionsIcons['blog_section'],
                        'icon_type'  => $optionsIconType
                    ) );


                    Redux::setSection( $opt_name, array(
                        'title'      => __( 'General', 'pixfort-core' ),
                        'id'         => 'blog',
                        'subsection' => true,
                        'fields'     => array(
                            array(
                                'id'       => 'blog-posts',
                                'type'     => 'text',
                                'title'    => __( 'Items per page', 'pixfort-core' ),
                                'default'  => '8',
                            ),


                            array(
                                'id'       => 'blog-page-layout',
                                'type'     => 'image_select',
                                'width'     => '150px',
                                'height'     => '100px',
                                'title'    => __('Blog page layout', 'pixfort-core'),
                                'subtitle' => __('Layout for blog posts', 'pixfort-core'),
                                'options'  => array(
                                    'default'      => array(
                                        'title'   => __('Default', 'pixfort-core'),
                                        'img'   => $pixReduxFramework.'assets/img/options/default-blog-page.jpg'
                                    ),
                                    'grid'      => array(
                                        'title'   => __('Normal Grid', 'pixfort-core'),
                                        'img'   => $pixReduxFramework.'assets/img/options/grid-blog-page.jpg'
                                    ),
                                    'masonry'      => array(
                                        'title'   => __('Masonry grid', 'pixfort-core'),
                                        'img'   => $pixReduxFramework.'assets/img/options/masonry-blog-page.jpg'
                                    ),
                                ),
                                'default' => 'default',
                            ),

                            array(
                                'id'       => 'blog-grid-count',
                                'type'     => 'select',
                                'title'    => __('Grid post count per line', 'pixfort-core'),
                                'options'  => array(
                                    '6'             => '2',
                                    '4'             => '3',
                                    '3'         => '4',
                                ),
                                'default'  => '4',
                                'required' => array('blog-page-layout','=','grid'),
                            ),
                            array(
                                'id'       => 'blog-masonry-count',
                                'type'     => 'select',
                                'title'    => __('Masonry post count per line', 'pixfort-core'),
                                'options'  => array(
                                    '2'             => '2',
                                    '3'             => '3',
                                    '4'         => '4',
                                    '5'         => '5',
                                ),
                                'default'  => '3',
                                'required' => array('blog-page-layout','=','masonry'),
                            ),

                            array(
                                'id'       => 'blog-page-template',
                                'type'     => 'image_select',
                                'width'     => '150px',
                                'height'     => '100px',
                                'title'    => __('Blog layout', 'pixfort-core'),
                                'subtitle' => __('Layout for blog, archive, search, author,..etc pages.', 'pixfort-core'),
                                'options'  => array(
                                    'with-offset'      => array(
                                        'title'   => __('With Offset', 'pixfort-core'),
                                        'img'   => $pixReduxFramework.'assets/img/options/default-layout.jpg'
                                    ),
                                    'full-width'      => array(
                                        'title'   => __('Full width', 'pixfort-core'),
                                        'img'   => $pixReduxFramework.'assets/img/options/default-layout-normal.jpg'
                                    ),
                                    'right-sidebar'      => array(
                                        'title'   => __('Right sidebar', 'pixfort-core'),
                                        'img'   => $pixReduxFramework.'assets/img/options/sidebar-right.jpg'
                                    ),
                                    'left-sidebar'      => array(
                                        'title'   => __('Left Sidebar', 'pixfort-core'),
                                        'img'   => $pixReduxFramework.'assets/img/options/sidebar-left.jpg'
                                    ),
                                ),
                                'default' => 'right-sidebar',
                            ),



                            array(
                                'id'       => 'blog-style',
                                'type'     => 'image_select',
                                'width'     => '150px',
                                'height'     => '100px',
                                'title'    => __('Posts Style', 'pixfort-core'),
                                'options'  => array(
                                    'default'      => array(
                                        'title'   => __('Default', 'pixfort-core'),
                                        'img'   => $pixReduxFramework.'assets/img/options/style-default.jpg'
                                    ),
                                    'with-padding'      => array(
                                        'title'   => __('With Padding', 'pixfort-core'),
                                        'img'   => $pixReduxFramework.'assets/img/options/style-with-padding.jpg'
                                    ),
                                    'left-img'      => array(
                                        'title'   => __('Left image', 'pixfort-core'),
                                        'img'   => $pixReduxFramework.'assets/img/options/style-left-image.jpg'
                                    ),
                                    'right-img'      => array(
                                        'title'   => __('Right image', 'pixfort-core'),
                                        'img'   => $pixReduxFramework.'assets/img/options/style-right-image.jpg'
                                    ),
                                    'full-img'      => array(
                                        'title'   => __('Full Image', 'pixfort-core'),
                                        'img'   => $pixReduxFramework.'assets/img/options/style-full-image.jpg'
                                    ),
                                ),
                                'default' => 'default',
                            ),


                            array(
                                'id'       => 'blog-layout',
                                'type'     => 'image_select',
                                'width'     => '150px',
                                'height'     => '100px',
                                'title'    => __('Post layout', 'pixfort-core'),
                                'subtitle' => __('Layout for blog posts', 'pixfort-core'),
                                'options'  => array(
                                    'default'      => array(
                                        'title'   => __('Default', 'pixfort-core'),
                                        'img'   => $pixReduxFramework.'assets/img/options/default-layout.jpg'
                                    ),
                                    'default-normal'      => array(
                                        'title'   => __('Normal width', 'pixfort-core'),
                                        'img'   => $pixReduxFramework.'assets/img/options/default-layout-normal.jpg'
                                    ),
                                    'right-sidebar'      => array(
                                        'title'   => __('Right sidebar', 'pixfort-core'),
                                        'img'   => $pixReduxFramework.'assets/img/options/sidebar-right.jpg'
                                    ),
                                    'left-sidebar'      => array(
                                        'title'   => __('Left Sidebar', 'pixfort-core'),
                                        'img'   => $pixReduxFramework.'assets/img/options/sidebar-left.jpg'
                                    ),
                                ),
                                'default' => 'default',
                            ),

                            array(
                                'id'       => 'blog-full-width-layout',
                                'type'     => 'switch',
                                'title'    => __('Post full width layout', 'pixfort-core'),
                                // 'desc' => __('Add white box for each post.', 'pixfort-core'),
                                'default'  => false,
                            ),
                            array(
                                'id'       => 'blog-style-box',
                                'type'     => 'switch',
                                'title'    => __('Add box style', 'pixfort-core'),
                                'desc' => __('Add white box for each post.', 'pixfort-core'),
                                'default'  => true,
                                'required' => array('blog-style','!=','full-img'),
                            ),

                            array(
                                'id'       => 'blog-bg-color',
                                'type'     => 'select',
                                'title'    => __('Background color', 'pixfort-core'),
                                'options'  => array_flip($bg_colors),
                                'default'  => 'gray-1',
                            ),
                            array(
                                'id'       => 'custom-blog-bg-color',
                                'type'     => 'color',
                                'title'    => __('Custom background Color', 'pixfort-core'),
                                'transparent' => false,
                                'default'  => '#FFFFFF',
                                'required' => array('blog-bg-color','equals','custom'),
                                'validate' => 'color',
                            ),


                            array(
                                'id'       => 'sidebar-blog',
                                'type'     => 'select',
                                'title'    => __('Blog sidebar', 'pixfort-core'),
                                'default'  => 'sidebar-1',
                                'options'  => $sidebars
                            ),

                            array(
                                'id'       => 'blog-box-rounded',
                                'type'     => 'select',
                                'title'    => __('Post rounded corners', 'pixfort-core'),
                                'default'  => 'rounded-lg',
                                'options'  => array(
                                    'rounded-0'    => __('No', 'pixfort-core'),
                                    'rounded'      => __('Rounded', 'pixfort-core'),
                                    'rounded-lg'   => __('Rounded Large', 'pixfort-core'),
                                    'rounded-xl'   => __('Rounded 5px', 'pixfort-core'),
                                    'rounded-10'   => __('Rounded 10px', 'pixfort-core')
                                )
                            ),
                            array(
                                'id'       => 'blog-box-style',
                                'type'     => 'select',
                                'title'    => __('Post shadow Style', 'pixfort-core'),
                                'default'  => '1',
                                'options'  => array(
                                    ""        => __('Default', 'pixfort-core'),
                                    "1"       => __('Small shadow', 'pixfort-core'),
                                    "2"       => __('Medium shadow', 'pixfort-core'),
                                    "3"       => __('Large shadow', 'pixfort-core'),
                                    "4"       => __('Inverse Small shadow', 'pixfort-core'),
                                    "5"       => __('Inverse Medium shadow', 'pixfort-core'),
                                    "6"       => __('Inverse Large shadow', 'pixfort-core'),
                                )
                            ),
                            array(
                                'id'       => 'blog-box-hover-effect',
                                'type'     => 'select',
                                'title'    => __('Post Shadow Hover Style', 'pixfort-core'),
                                'default'  => '1',
                                'options'  => array(
                                    ""       => __('None', 'pixfort-core'),
                                    "1"       => __('Small hover shadow', 'pixfort-core'),
                                    "2"       => __('Medium hover shadow', 'pixfort-core'),
                                    "3"       => __('Large hover shadow', 'pixfort-core'),
                                    "4"       => __('Inverse Small hover shadow', 'pixfort-core'),
                                    "5"       => __('Inverse Medium hover shadow', 'pixfort-core'),
                                    "6"       => __('Inverse Large hover shadow', 'pixfort-core'),
                                )
                            ),
                            array(
                                'id'       => 'blog-box-add-hover-effect',
                                'type'     => 'select',
                                'title'    => __('Post Hover Animation', 'pixfort-core'),
                                'default'  => '1',
                                'options'  => array(
                                    ""       => __('None', 'pixfort-core'),
                                    "1"       => __('Fly Small', 'pixfort-core'),
                                    "2"       => __('Fly Medium', 'pixfort-core'),
                                    "3"       => __('Fly Large', 'pixfort-core'),
                                    "4"       => __('Scale Small', 'pixfort-core'),
                                    "5"       => __('Scale Medium', 'pixfort-core'),
                                    "6"       => __('Scale Large', 'pixfort-core'),
                                    "7"       => __('Scale Inverse Small', 'pixfort-core'),
                                    "8"       => __('Scale Inverse Medium', 'pixfort-core'),
                                    "9"       => __('Scale Inverse Large', 'pixfort-core'),
                                )
                            ),


                        )
                    ) );
                    Redux::setSection( $opt_name, array(
                        'title'      => __( 'Intro', 'pixfort-core' ),
                        'id'         => 'blog_intro',
                        'subsection' => true,
                        'fields'     => array(
                            array(
                                'id'       => 'post-with-intro',
                                'type'     => 'switch',
                                'title'    => __('Enable post intro', 'pixfort-core'),
                                'desc' => __('Add intro section at the beginning of the post.', 'pixfort-core'),
                                'default'  => true,
                            ),


                            array(
                                'id'       => 'blog-divider-style',
                                'type'     => 'image_select',
                                'class'    => 'pix-opts-dividers',
                                'title'    => __('Divider style', 'pixfort-core'),
                                'options'  => $opts_dividers,
                                'default' => '0',
                                'required' => array('post-with-intro','!=',false),
                            ),

                            array(
                                'id'       => 'blog-divider-height',
                                'type'     => 'text',
                                'title'    => __( 'Custom Divider height (Optional)', 'pixfort-core' ),
                                'desc' => __('Leave empty to use the default height for each divider.', 'pixfort-core'),
                                'default'  => '',
                                'required' => array('post-with-intro','!=',false),
                            ),

                            array(
                                'id'       => 'blog-intro-img',
                                'type'     => 'media',
                                'url'      => true,
                                'title'    => __('Intro background image', 'pixfort-core'),
                                'required' => array('post-with-intro','!=',false),
                            ),
                            array(
                                'id'       => 'blog-intro-light',
                                'type'     => 'switch',
                                'title'    => __('Enable light intro text', 'pixfort-core'),
                                'desc' => __('Disable to display dark text in the intro.', 'pixfort-core'),
                                'default'  => true,
                                'required' => array('post-with-intro','!=',false),
                            ),

                            array(
                                'id'       => 'blog-intro-align',
                                'type'     => 'select',
                                'title'    => __('Intro text align', 'pixfort-core'),
                                'default'  => 'text-center',
                                'required' => array('post-with-intro','!=',false),
                                'options'  => array(
                                    'text-left'   => __('Left', 'pixfort-core'),
                                    'text-center'   => __('Center', 'pixfort-core'),
                                    'text-right'   => __('Right', 'pixfort-core')
                                )
                            ),


                            array(
                                'id'       => 'blog-intr-bg-color',
                                'type'     => 'select',
                                'title'    => __('Intro overlay color', 'pixfort-core'),
                                'default'  => 'primary',
                                'options'  => array_flip($bg_colors_no_custom),
                                'required' => array('post-with-intro','!=',false),
                            ),
                            array(
                                'id'       => 'blog-intro-opacity',
                                'type'     => 'select',
                                'title'    => __('Intro overlay opacity', 'pixfort-core'),
                                'default'  => 'pix-opacity-2',
                                'options'  => array(
                                    'pix-opacity-10'   => "0%",
                                    'pix-opacity-9'   => "10%",
                                    'pix-opacity-8'   => "20%",
                                    'pix-opacity-7'   => "30%",
                                    'pix-opacity-6'   => "40%",
                                    'pix-opacity-5'   => "50%",
                                    'pix-opacity-4'   => "60%",
                                    'pix-opacity-3'   => "70%",
                                    'pix-opacity-2'   => "80%",
                                    'pix-opacity-1'   => "90%",
                                    'pix-opacity-0'   => "100%",
                                ),
                                'required' => array('post-with-intro','!=',false),
                            ),

                            array(
                                'id'       => 'blog-disable-title-animation',
                                'type'     => 'switch',
                                'title'    => __('Disable Title animation', 'pixfort-core'),
                                'default'  => false,
                            ),
                            array(
                                'id'       => 'blog-disable-intro-title',
                                'type'     => 'switch',
                                'title'    => __('Disable Title', 'pixfort-core'),
                                'default'  => false,
                            ),
                            array(
                                'id'       => 'blog-disable-intro-breadcrumbs',
                                'type'     => 'switch',
                                'title'    => __('Disable Breadcrumbs', 'pixfort-core'),
                                'default'  => false,
                            ),
                            array(
                                'id'       => 'blog-disable-intro-parallax',
                                'type'     => 'switch',
                                'title'    => __('Disable Intro Parallax effect', 'pixfort-core'),
                                'default'  => false,
                            ),

                            array(
                                'id'       => 'blog-intro-top-height',
                                'type'     => 'text',
                                'title'    => __( 'Custom top padding (Optional)', 'pixfort-core' ),
                                'desc' => __('Leave empty to use the default top padding for the intro.', 'pixfort-core'),
                                'default'  => '',
                                'required' => array('post-with-intro','!=',false),
                            ),
                            array(
                                'id'       => 'blog-intro-bottom-height',
                                'type'     => 'text',
                                'title'    => __( 'Custom bottom padding (Optional)', 'pixfort-core' ),
                                'desc' => __('Leave empty to use the default bottom padding for the intro.', 'pixfort-core'),
                                'default'  => '',
                                'required' => array('post-with-intro','!=',false),
                            ),

                            array(
                                'id'       => 'blog-mobile-intro-top-height',
                                'type'     => 'text',
                                'title'    => __( 'Custom Mobile top padding (Optional)', 'pixfort-core' ),
                                'desc'     => __('Leave empty to use the default top padding for the intro.', 'pixfort-core'),
                                'default'  => '',
                                'required' => array('post-with-intro','!=',false),
                            ),
                            array(
                                'id'       => 'blog-mobile-intro-bottom-height',
                                'type'     => 'text',
                                'title'    => __( 'Custom Mobile bottom padding (Optional)', 'pixfort-core' ),
                                'desc'     => __('Leave empty to use the default bottom padding for the intro.', 'pixfort-core'),
                                'default'  => '',
                                'required' => array('post-with-intro','!=',false),
                            )

                        )
                    ) );



                    Redux::setSection( $opt_name, array(
                        'title'      => __( 'Advanced', 'pixfort-core' ),
                        'id'         => 'blog_advanced',
                        'subsection' => true,
                        'fields'     => array(
                            array(
                                'id'       => 'pix-disable-blog-author-box',
                                'type'     => 'switch',
                                'title'    => __('Disable post author box', 'pixfort-core'),
                                'default'  => false,
                            ),
                            array(
                                'id'       => 'pix-disable-blog-social',
                                'type'     => 'switch',
                                'title'    => __('Disable post social share buttons', 'pixfort-core'),
                                'default'  => false,
                            ),
                            array(
                                'id'       => 'pix-disable-blog-related',
                                'type'     => 'switch',
                                'title'    => __('Disable related posts', 'pixfort-core'),
                                'default'  => false,
                            ),
                            array(
                                'id'       => 'pix-blog-related-count',
                                'type'     => 'select',
                                'title'    => __('Number of related posts', 'pixfort-core'),
                                'default'  => '4',
                                'options'  => array(
                                    '2'   => "2",
                                    '3'   => "3",
                                    '4'   => __('4 (default)', 'pixfort-core')
                                ),
                                'required' => array('pix-disable-blog-related','!=',true),
                            ),


                            array(
                                'id'       => 'pix-enable-blog-line-breaks',
                                'type'     => 'switch',
                                'title'    => __('Enable default posts line breaks', 'pixfort-core'),
                                'default'  => false,
                            ),

                        )
                    ) );

                    Redux::setSection( $opt_name, array(
                        'title' => __( 'Portfolio', 'pixfort-core' ),
                        'id'    => 'portfolio_section',
                        'icon'  => $optionsIcons['portfolio_section'],
                        'icon_type'  => $optionsIconType
                    ) );


                    Redux::setSection( $opt_name, array(
                        'title'      => __( 'General', 'pixfort-core' ),
                        'id'         => 'portfolio',
                        'subsection' => true,
                        'fields'     => array(
                            array(
                                'id'       => 'portfolio-posts',
                                'type'     => 'text',
                                'title'    => __( 'Items per page', 'pixfort-core' ),
                                'default'  => '8',
                            ),
                            array(
                                'id'       => 'portfolio-page-style',
                                'type'     => 'image_select',
                                'width'     => '150px',
                                'height'     => '100px',
                                'title'    => __('Layout', 'pixfort-core'),
                                'subtitle' => __('Layout for portfolio items list', 'pixfort-core'),
                                'options'  => array(
                                    'default'      => array(
                                        'title'   => __('Default', 'pixfort-core'),
                                        'img'   => $pixReduxFramework.'assets/img/options/portfolio/portfolio-default.png'
                                    ),
                                    'mini'      => array(
                                        'title'   => __('Mini', 'pixfort-core'),
                                        'img'   => $pixReduxFramework.'assets/img/options/portfolio/portfolio-mini.png'
                                    ),
                                    'transparent'      => array(
                                        'title'   => __('Transparent', 'pixfort-core'),
                                        'img'   => $pixReduxFramework.'assets/img/options/portfolio/portfolio-transparent.png'
                                    ),
                                    '3d'      => array(
                                        'title'   => __('3D', 'pixfort-core'),
                                        'img'   => $pixReduxFramework.'assets/img/options/portfolio/portfolio-3d.png'
                                    )
                                ),
                                'default' => 'default',
                            ),



                            array(
                                'id'       => 'portfolio-masonry-count',
                                'type'     => 'select',
                                'title'    => __('Masonry portfolio count per line', 'pixfort-core'),
                                'options'  => array(
                                    '6'             => '2',
                                    '4'             => '3',
                                    '3'         => '4',
                                    '2'         => '6',
                                ),
                                'default'  => '4',
                            ),

                            array(
                                'id'       => 'portfolio-layout',
                                'type'     => 'select',
                                'title'    => __('Portfolio item layout', 'pixfort-core'),
                                'options'  => array(
                                    'default'        => __('Default', 'pixfort-core'),
                                    'sidebar'        => __('With Sidebar', 'pixfort-core'),
                                    'sidebar-full'   => __('With Sidebar (Full width)', 'pixfort-core'),
                                    'box'            => __('Intro box', 'pixfort-core')
                                ),
                                'default'  => 'default',
                            ),

                            array(
                                'id'       => 'portfolio-order',
                                'type'     => 'select',
                                'title'    => __('Order', 'pixfort-core'),
                                'subtitle' => __('Portfolio items order', 'pixfort-core'),
                                'options'  => array(
                                    'ASC'   => __('Ascending', 'pixfort-core'),
                                    'DESC'  => __('Descending', 'pixfort-core')
                                ),
                                'default'  => 'DESC',
                            ),
                            array(
                                'id'       => 'portfolio-navigation',
                                'type'     => 'switch',
                                'title'    => __('Enable Navigation between projects', 'pixfort-core'),
                                'default'  => true,
                            ),
                            array(
                                'id'       => 'portfolio-in-same-term',
                                'type'     => 'switch',
                                'title'    => __('In same category', 'pixfort-core'),
                                'desc'     => __('Navigation arrows refer to projects in the same category', 'pixfort-core'),
                                'default'  => false,
                            ),
                            array(
                                'id'       => 'portfolio-post-info',
                                'type'     => 'switch',
                                'title'    => __('Show date and author info', 'pixfort-core'),
                                'default'  => false,
                            ),

                            array(
                                'id'       => 'portfolio-related',
                                'type'     => 'switch',
                                'title'    => __('Related Projects', 'pixfort-core'),
                                'desc'     => __('Show Related Projects', 'pixfort-core'),
                                'default'  => true,
                            ),
                            array(
                                'id'       => 'portfolio-isotope',
                                'type'     => 'switch',
                                'title'    => __('Enable Filters', 'pixfort-core'),
                                // 'desc' => __('', 'pixfort-core'),
                                'default'  => true,
                            ),
                            array(
                                'id'       => 'portfolio-display-full',
                                'type'     => 'switch',
                                'title'    => __('Display full size images', 'pixfort-core'),
                                'desc' => __('Display the portfolio images in full size without cropping.', 'pixfort-core'),
                                'default'  => false,
                            ),
                            array(
                                'id'       => 'portfolio-slug',
                                'type'     => 'text',
                                'title'    => __( 'Single item slug', 'pixfort-core' ),
                                'desc' => __('<b>Important:</b> Do not use characters not allowed in links. <br /><br />Must be different from the Portfolio site title chosen above, eg. "portfolio-item". After change please go to "Settings > Permalinks" and click "Save changes" button.', 'pixfort-core'),
                                'subtitle' => __('Link to single item', 'pixfort-core'),
                                'default'  => 'portfolio-item',
                            ),



                            array(
                                'id'       => 'portfolio-bg-color',
                                'type'     => 'select',
                                'title'    => __('Background color', 'pixfort-core'),
                                'options'  => array_flip($bg_colors),
                                'default'  => 'gray-1',
                            ),
                            array(
                                'id'       => 'custom-portfolio-bg-color',
                                'type'     => 'color',
                                'title'    => __('Custom background Color', 'pixfort-core'),
                                'transparent' => false,
                                'default'  => '#FFFFFF',
                                'required' => array('portfolio-bg-color','equals','custom'),
                                'validate' => 'color',
                            ),

                            array(
                                'id'       => 'sidebar-portfolio',
                                'type'     => 'select',
                                'title'    => __('Portfolio sidebar', 'pixfort-core'),
                                'default'  => 'sidebar-1',
                                'options'  => $sidebars
                            ),

                            array(
                                'id'       => 'portfolio-orderby',
                                'type'     => 'select',
                                'title'    => __('Order by', 'pixfort-core'),
                                'subtitle' => __('Portfolio items order by column', 'pixfort-core'),
                                'options'  => array(
                                    'date'          => __('Date', 'pixfort-core'),
                                    'menu_order'    => __('Menu order', 'pixfort-core'),
                                    'title'         => __('Title', 'pixfort-core'),
                                    'rand'          => __('Random', 'pixfort-core'),
                                ),
                                'default'  => 'date',
                            ),

                        )
                    ) );

                    Redux::setSection( $opt_name, array(
                        'title'      => __( 'Intro', 'pixfort-core' ),
                        'id'         => 'portfolio_intro',
                        'subsection' => true,
                        'fields'     => array(


                            array(
                                'id'       => 'portfolio-with-intro',
                                'type'     => 'switch',
                                'title'    => __('Enable portfolio intro', 'pixfort-core'),
                                'desc' => __('Add intro section at the beginning of the portfolio.', 'pixfort-core'),
                                'default'  => true,
                            ),
                            array(
                                'id'       => 'portfolio-divider-style',
                                'type'     => 'image_select',
                                'class'    => 'pix-opts-dividers',
                                'title'    => __('Divider style', 'pixfort-core'),
                                'options'  => $opts_dividers,
                                'default' => '0',
                            ),

                            array(
                                'id'       => 'portfolio-divider-height',
                                'type'     => 'text',
                                'title'    => __( 'Custom Divider height (Optional)', 'pixfort-core' ),
                                'desc' => __('Leave empty to use the default height for each divider.', 'pixfort-core'),
                                'default'  => '',
                            ),

                            array(
                                'id'       => 'portfolio-intro-img',
                                'type'     => 'media',
                                'url'      => true,
                                'title'    => __('Intro background image', 'pixfort-core'),
                            ),
                            array(
                                'id'       => 'portfolio-intro-light',
                                'type'     => 'switch',
                                'title'    => __('Enable light intro text', 'pixfort-core'),
                                'desc' => __('Disable to display dark text in the intro.', 'pixfort-core'),
                                'default'  => true,
                            ),

                            array(
                                'id'       => 'portfolio-intro-align',
                                'type'     => 'select',
                                'title'    => __('Intro text align', 'pixfort-core'),
                                'default'  => 'text-center',
                                'options'  => array(
                                    'text-left'   => __('Left', 'pixfort-core'),
                                    'text-center'   => __('Center', 'pixfort-core'),
                                    'text-right'   => __('Right', 'pixfort-core')
                                )
                            ),


                            array(
                                'id'       => 'portfolio-intr-bg-color',
                                'type'     => 'select',
                                'title'    => __('Intro overlay color', 'pixfort-core'),
                                'default'  => 'primary',
                                'options'  => array_flip($bg_colors_no_custom),
                            ),
                            array(
                                'id'       => 'portfolio-intro-opacity',
                                'type'     => 'select',
                                'title'    => __('Intro overlay opacity', 'pixfort-core'),
                                'default'  => 'pix-opacity-2',
                                'options'  => array(
                                    'pix-opacity-10'   => "0%",
                                    'pix-opacity-9'   => "10%",
                                    'pix-opacity-8'   => "20%",
                                    'pix-opacity-7'   => "30%",
                                    'pix-opacity-6'   => "40%",
                                    'pix-opacity-5'   => "50%",
                                    'pix-opacity-4'   => "60%",
                                    'pix-opacity-3'   => "70%",
                                    'pix-opacity-2'   => "80%",
                                    'pix-opacity-1'   => "90%",
                                    'pix-opacity-0'   => "100%",
                                )
                            ),


                            array(
                                'id'       => 'portfolio-disable-title-animation',
                                'type'     => 'switch',
                                'title'    => __('Disable Title animation', 'pixfort-core'),
                                'default'  => false,
                            ),
                            array(
                                'id'       => 'portfolio-disable-intro-title',
                                'type'     => 'switch',
                                'title'    => __('Disable Title', 'pixfort-core'),
                                'default'  => false,
                            ),
                            array(
                                'id'       => 'portfolio-disable-intro-breadcrumbs',
                                'type'     => 'switch',
                                'title'    => __('Disable Breadcrumbs', 'pixfort-core'),
                                'default'  => false,
                            ),
                            array(
                                'id'       => 'portfolio-disable-intro-parallax',
                                'type'     => 'switch',
                                'title'    => __('Disable Intro Parallax effect', 'pixfort-core'),
                                'default'  => false,
                            ),

                            array(
                                'id'       => 'portfolio-intro-top-height',
                                'type'     => 'text',
                                'title'    => __( 'Custom top padding (Optional)', 'pixfort-core' ),
                                'desc' => __('Leave empty to use the default top padding for the intro.', 'pixfort-core'),
                                'default'  => '',
                                'required' => array('portfolio-with-intro','!=',false),
                            ),
                            array(
                                'id'       => 'portfolio-intro-bottom-height',
                                'type'     => 'text',
                                'title'    => __( 'Custom bottom padding (Optional)', 'pixfort-core' ),
                                'desc' => __('Leave empty to use the default bottom padding for the intro.', 'pixfort-core'),
                                'default'  => '',
                                'required' => array('portfolio-with-intro','!=',false),
                            ),
                            array(
                                'id'       => 'portfolio-mobile-intro-top-height',
                                'type'     => 'text',
                                'title'    => __( 'Custom Mobile top padding (Optional)', 'pixfort-core' ),
                                'desc' => __('Leave empty to use the default top padding for the intro.', 'pixfort-core'),
                                'default'  => '',
                                'required' => array('portfolio-with-intro','!=',false),
                            ),
                            array(
                                'id'       => 'portfolio-mobile-intro-bottom-height',
                                'type'     => 'text',
                                'title'    => __( 'Custom Mobile bottom padding (Optional)', 'pixfort-core' ),
                                'desc' => __('Leave empty to use the default bottom padding for the intro.', 'pixfort-core'),
                                'default'  => '',
                                'required' => array('portfolio-with-intro','!=',false),
                            )

                        )
                    ) );





                    Redux::setSection( $opt_name, array(
                        'title' => __( 'Pages', 'pixfort-core' ),
                        'id'    => 'pages_section',
                        'icon'  => $optionsIcons['pages_section'],
                        'icon_type'  => $optionsIconType
                    ) );

                    Redux::setSection( $opt_name, array(
                        'title'      => __( 'General', 'pixfort-core' ),
                        'id'         => 'pages',
                        'subsection' => true,
                        'fields'     => array(




                            array(
                                'id'       => 'pages-bg-color',
                                'type'     => 'select',
                                'title'    => __('Page background color', 'pixfort-core'),
                                'options'  => array_flip($bg_colors),
                                'default'  => 'gray-1',
                            ),
                            array(
                                'id'       => 'custom-pages-bg-color',
                                'type'     => 'color',
                                'title'    => __('Custom background Color', 'pixfort-core'),
                                'transparent' => false,
                                'default'  => '#FFFFFF',
                                'required' => array('pages-bg-color','equals','custom'),
                                'validate' => 'color',
                            ),

                            array(
                                'id'       => 'sidebar-page',
                                'type'     => 'select',
                                'title'    => __('Pages sidebar', 'pixfort-core'),
                                'default'  => 'sidebar-1',
                                'options'  => $sidebars
                            ),

                            array(
                                'id'       => 'sidebar-page-sticky',
                                'type'     => 'select',
                                'title'    => __('Sidebar Sticky', 'pixfort-core'),
                                'default'  => 'sticky-bottom',
                                'options'  => array(
                                    'sticky-bottom'   => __('Sticky bottom', 'pixfort-core'),
                                    'sticky-top'   => __('Sticky Top', 'pixfort-core'),
                                    'sticky-disabled'   => __('Disable Sticky', 'pixfort-core')
                                )
                            ),

                            array(
                                'id'       => 'pix-enable-page-line-breaks',
                                'type'     => 'switch',
                                'title'    => __('Enable default Pages line breaks', 'pixfort-core'),
                                'default'  => false,
                                'desc' => __('Note: this is an advanced option and depending on your WordPress or server configuration WordPress may add line break tags incorrectly in some areas or in the used External third party plugins.', 'pixfort-core'),
                            ),

                        )
                    ) );


                    Redux::setSection( $opt_name, array(
                        'title'      => __( 'Intro', 'pixfort-core' ),
                        'id'         => 'pages_intro',
                        'subsection' => true,
                        'fields'     => array(

                            array(
                                'id'       => 'pages-with-intro',
                                'type'     => 'switch',
                                'title'    => __('Enable pages intro', 'pixfort-core'),
                                'desc' => __('Add intro section at the beginning of the pages.', 'pixfort-core'),
                                'default'  => true,
                            ),

                            array(
                                'id'       => 'pages-divider-style',
                                'type'     => 'image_select',
                                'class'    => 'pix-opts-dividers',
                                'title'    => __('Divider style', 'pixfort-core'),
                                'options'  => $opts_dividers,
                                'default' => '0',
                            ),

                            array(
                                'id'       => 'pages-divider-height',
                                'type'     => 'text',
                                'title'    => __( 'Custom Divider height (Optional)', 'pixfort-core' ),
                                'desc' => __('Leave empty to use the default height for each divider.', 'pixfort-core'),
                                'default'  => '',
                                'required' => array('pages-divider-style','!=','0'),
                            ),

                            array(
                                'id'       => 'pages-intro-img',
                                'type'     => 'media',
                                'url'      => true,
                                'title'    => __('Intro background image', 'pixfort-core'),
                            ),
                            array(
                                'id'       => 'pages-intro-light',
                                'type'     => 'switch',
                                'title'    => __('Enable light intro text', 'pixfort-core'),
                                'desc' => __('Disable to display dark text in the intro.', 'pixfort-core'),
                                'default'  => true,
                            ),
                            array(
                                'id'       => 'pages-intro-align',
                                'type'     => 'select',
                                'title'    => __('Intro text align', 'pixfort-core'),
                                'default'  => 'text-center',
                                'options'  => array(
                                    'text-left'   => __('Left', 'pixfort-core'),
                                    'text-center'   => __('Center', 'pixfort-core'),
                                    'text-right'   => __('Right', 'pixfort-core')
                                )
                            ),
                            array(
                                'id'       => 'pages-intr-bg-color',
                                'type'     => 'select',
                                'title'    => __('Intro overlay color', 'pixfort-core'),
                                'default'  => 'primary',
                                'options'  => array_flip($bg_colors),
                            ),
                            array(
                                'id'       => 'pages-intro-opacity',
                                'type'     => 'select',
                                'title'    => __('Intro overlay opacity', 'pixfort-core'),
                                'default'  => 'pix-opacity-2',
                                'options'  => array(
                                    'pix-opacity-10'   => "0%",
                                    'pix-opacity-9'   => "10%",
                                    'pix-opacity-8'   => "20%",
                                    'pix-opacity-7'   => "30%",
                                    'pix-opacity-6'   => "40%",
                                    'pix-opacity-5'   => "50%",
                                    'pix-opacity-4'   => "60%",
                                    'pix-opacity-3'   => "70%",
                                    'pix-opacity-2'   => "80%",
                                    'pix-opacity-1'   => "90%",
                                    'pix-opacity-0'   => "100%",
                                )
                            ),


                            array(
                                'id'       => 'pages-disable-title-animation',
                                'type'     => 'switch',
                                'title'    => __('Disable Title animation', 'pixfort-core'),
                                'default'  => false,
                            ),
                            array(
                                'id'       => 'pages-disable-intro-title',
                                'type'     => 'switch',
                                'title'    => __('Disable Title', 'pixfort-core'),
                                'default'  => false,
                            ),
                            array(
                                'id'       => 'pages-disable-intro-breadcrumbs',
                                'type'     => 'switch',
                                'title'    => __('Disable Breadcrumbs', 'pixfort-core'),
                                'default'  => false,
                            ),
                            array(
                                'id'       => 'pages-disable-intro-parallax',
                                'type'     => 'switch',
                                'title'    => __('Disable Intro Parallax effect', 'pixfort-core'),
                                'default'  => false,
                            ),

                            array(
                                'id'       => 'pages-intro-top-height',
                                'type'     => 'text',
                                'title'    => __( 'Custom top padding (Optional)', 'pixfort-core' ),
                                'desc' => __('Leave empty to use the default top padding for the intro.', 'pixfort-core'),
                                'default'  => '',
                                'required' => array('pages-with-intro','!=',false),
                            ),
                            array(
                                'id'       => 'pages-intro-bottom-height',
                                'type'     => 'text',
                                'title'    => __( 'Custom bottom padding (Optional)', 'pixfort-core' ),
                                'desc' => __('Leave empty to use the default bottom padding for the intro.', 'pixfort-core'),
                                'default'  => '',
                                'required' => array('pages-with-intro','!=',false),
                            ),
                            array(
                                'id'       => 'pages-mobile-intro-top-height',
                                'type'     => 'text',
                                'title'    => __( 'Custom Mobile top padding (Optional)', 'pixfort-core' ),
                                'desc' => __('Leave empty to use the default top padding for the intro.', 'pixfort-core'),
                                'default'  => '',
                                'required' => array('pages-with-intro','!=',false),
                            ),
                            array(
                                'id'       => 'pages-mobile-intro-bottom-height',
                                'type'     => 'text',
                                'title'    => __( 'Custom Mobile bottom padding (Optional)', 'pixfort-core' ),
                                'desc' => __('Leave empty to use the default bottom padding for the intro.', 'pixfort-core'),
                                'default'  => '',
                                'required' => array('pages-with-intro','!=',false),
                            )


                        )
                    ) );



                    Redux::setSection( $opt_name, array(
                        'title' => __( 'Typography', 'pixfort-core' ),
                        'id'    => 'typography',
                        'desc'  => __( 'Basic fields as subsections.', 'pixfort-core' ),
                        'icon'  => $optionsIcons['typography'],
                        'icon_type'  => $optionsIconType

                    ) );




                    $pix_fonts = array(
                        "Arial, Helvetica, sans-serif" => "Arial, Helvetica, sans-serif",
                        "'Arial Black', Gadget, sans-serif" => "'Arial Black', Gadget, sans-serif",
                        "'Bookman Old Style', serif" => "'Bookman Old Style', serif",
                        "'Comic Sans MS', cursive" => "'Comic Sans MS', cursive",
                        "Courier, monospace" => "Courier, monospace",
                        "Garamond, serif" => "Garamond, serif",
                        "Georgia, serif" => "Georgia, serif",
                        "Impact, Charcoal, sans-serif" => "Impact, Charcoal, sans-serif",
                        "'Lucida Console', Monaco, monospace" => "'Lucida Console', Monaco, monospace",
                        "'Lucida Sans Unicode', 'Lucida Grande', sans-serif" => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
                        "'MS Sans Serif', Geneva, sans-serif" => "'MS Sans Serif', Geneva, sans-serif",
                        "'MS Serif', 'New York', sans-serif" =>"'MS Serif', 'New York', sans-serif",
                        "'Palatino Linotype', 'Book Antiqua', Palatino, serif" => "'Palatino Linotype', 'Book Antiqua', Palatino, serif",
                        "Tahoma, Geneva, sans-serif" =>"Tahoma, Geneva, sans-serif",
                        "'Times New Roman', Times, serif" => "'Times New Roman', Times, serif",
                        "'Trebuchet MS', Helvetica, sans-serif" => "'Trebuchet MS', Helvetica, sans-serif",
                        "Verdana, Geneva, sans-serif" => "Verdana, Geneva, sans-serif",
                    );

                    if(!empty(pix_plugin_get_option('opt-external-font-1-name'))){
                        $pix_fonts[pix_plugin_get_option('opt-external-font-1-name')] = 'pix-'.pix_plugin_get_option('opt-external-font-1-name');
                    }
                    if(!empty(pix_plugin_get_option('opt-external-font-2-name'))){
                        $pix_fonts[pix_plugin_get_option('opt-external-font-2-name')] = 'pix-'.pix_plugin_get_option('opt-external-font-2-name');
                    }
                    // if( class_exists( '\Elementor\Plugin' ) ) {
                    //     $ttt = \Elementor\Fonts::get_fonts_by_groups();
                    //     // $additional_fonts = apply_filters( 'elementor/fonts/additional_fonts' );
                    //     var_dump($ttt);
                    //     die();
                    // }


                    Redux::setSection( $opt_name, array(
                        'title'      => __( 'General', 'pixfort-core' ),
                        'id'         => 'typography-general',
                        'subsection' => true,
                        'fields'     => array(
                            array(
                                'id'          => 'opt-primary-font',
                                'type'        => 'typography',
                                'title'       => __('Body font', 'pixfort-core'),
                                'google'      => true,
                                'font-backup' => true,
                                // 'fonts' => array('verdana,san-serif,helvatica' => 'Verdana'),
                                // 'output'      => array('body'),
                                'output'      => false,
                                'fonts' => $pix_fonts,
                                'units'       =>'px',
                                'color'       => false,
                                'font-style'  => false,
                                'font-size'   => false,
                                'line-height' => false,
                                'text-align' => false,
                                // 'word-spacing' => true,
                                // 'letter-spacing' => true,
                                // 'font-weight' => '400,700,900',
                                'font-weight' => false,
                                'subsets' => false,
                                'desc'    => __('The font family for body texts and paragraphs.', 'pixfort-core'),
                                'default'     => array(
                                    'font-family' => 'Manrope',
                                    'google'      => true,
                                    // 'letter-spacing' => '-0.1'
                                ),
                            ),
                            array(
                                'id'       => 'opt-primary-font-spacing',
                                'type'     => 'text',
                                'title'    => __( 'Primary font spacing', 'pixfort-core' ),
                                // 'subtitle' => __( 'Type your LinkedIn link here', 'pixfort-core' ),
                                'desc'     => __( 'Specify the spacing between the letters (for example: -0.01em)', 'pixfort-core' ),
                                'default'  => '-0.01em',
                            ),
                            array(
                                'id'          => 'opt-secondary-font',
                                'type'        => 'typography',
                                'title'       => __('Heading font', 'pixfort-core'),
                                'subtitle' => __( 'Secondary font for headings', 'pixfort-core' ),
                                'google'      => true,
                                'font-backup' => true,
                                // 'output'      => array('.secondary-font'),
                                'output'      => false,
                                'units'       =>'px',
                                'color'       => false,
                                'fonts'       => $pix_fonts,
                                'font-style'  => false,
                                'font-size'   => false,
                                'line-height' => false,
                                'text-align' => false,
                                'font-weight' => false,
                                // 'letter-spacing' => true,
                                'subsets' => false,
                                'desc'    => __('The font family for headings (H1, H2, H3, H4, H5, H6).', 'pixfort-core'),
                                'default'     => array(
                                    'font-family' => 'Manrope',
                                    'google'      => true,
                                    // 'letter-spacing' => '-0.1'
                                ),
                            ),
                            array(
                                'id'       => 'opt-secondary-font-spacing',
                                'type'     => 'text',
                                'title'    => __( 'Heading font spacing', 'pixfort-core' ),
                                // 'subtitle' => __( 'Type your LinkedIn link here', 'pixfort-core' ),
                                'desc'     => __( 'Specify the spacing between the letters (for example: -0.01em)', 'pixfort-core' ),
                                'default'  => '-0.01em',
                            ),



                            array(
                                'id'       => 'opt-body-color',
                                'type'     => 'select',
                                'title'    => __('Body Color', 'pixfort-core'),
                                'subtitle' => __('Pick the body text color for light backgrounds.', 'pixfort-core'),
                                // 'subtitle' => __('No validation can be done on this field type', 'pixfort-core'),
                                // 'desc'     => __('This is the description field, again good for additional info.', 'pixfort-core'),
                                // Must provide key => value pairs for select options
                                'options'  => array_flip($main_colors),
                                'default'  => 'gray-5',

                            ),

                            array(
                                'id'       => 'opt-custom-body-color',
                                'type'     => 'color',
                                'title'    => __('Custom Body Color', 'pixfort-core'),
                                'default'  => '#212529',
                                'transparent' => false,
                                'validate' => 'color',
                                'required' => array('opt-body-color','=','custom'),
                            ),

                            array(
                                'id'       => 'opt-dark-body-color',
                                'type'     => 'select',
                                'title'    => __('Dark Body Color', 'pixfort-core'),
                                'subtitle' => __('Pick the body text color for dark backgrounds.', 'pixfort-core'),
                                // 'subtitle' => __('No validation can be done on this field type', 'pixfort-core'),
                                // 'desc'     => __('This is the description field, again good for additional info.', 'pixfort-core'),
                                // Must provide key => value pairs for select options
                                'options'  => array_flip($main_colors),
                                'default'  => 'light-opacity-7',

                            ),

                            array(
                                'id'       => 'opt-custom-dark-body-color',
                                'type'     => 'color',
                                'title'    => __('Custom Dark Body Color', 'pixfort-core'),
                                'default'  => '#eee',
                                'transparent' => false,
                                'validate' => 'color',
                                'required' => array('opt-dark-body-color','=','custom'),
                            ),



                            array(
                                'id'       => 'opt-heading-color',
                                'type'     => 'select',
                                'title'    => __('Heading Color', 'pixfort-core'),
                                'subtitle' => __('Pick the heading text color for light backgrounds.', 'pixfort-core'),
                                'options'  => array_flip($main_colors),
                                'default'  => 'gray-7',

                            ),

                            array(
                                'id'       => 'opt-custom-heading-color',
                                'type'     => 'color',
                                'title'    => __('Custom Heading Color', 'pixfort-core'),
                                'default'  => '#495057',
                                'transparent' => false,
                                'validate' => 'color',
                                'required' => array('opt-heading-color','=','custom'),
                            ),
                            array(
                                'id'       => 'opt-dark-heading-color',
                                'type'     => 'select',
                                'title'    => __('Dark Heading Color', 'pixfort-core'),
                                'subtitle' => __('Pick the heading text color for dark backgrounds.', 'pixfort-core'),
                                'options'  => array_flip($main_colors),
                                'default'  => 'white',

                            ),

                            array(
                                'id'       => 'opt-custom-dark-heading-color',
                                'type'     => 'color',
                                'title'    => __('Custom Dark Heading Color', 'pixfort-core'),
                                'default'  => '#fff',
                                'transparent' => false,
                                'validate' => 'color',
                                'required' => array('opt-dark-heading-color','=','custom'),
                            ),

                            array(
                                'id'       => 'opt-regular-font-weight',
                                'type'     => 'text',
                                'title'    => __( 'Normal text font weight', 'pixfort-core' ),
                                'desc'     => __( 'default regualr font weight is 400', 'pixfort-core' ),
                                'default'   => ''
                            ),
                            array(
                                'id'       => 'opt-bold-font-weight',
                                'type'     => 'text',
                                'title'    => __( 'Bold font weight', 'pixfort-core' ),
                                'desc'     => __( 'default bold font weight is 700', 'pixfort-core' ),
                                'default'   => ''
                            ),

                        )
                    )
                );

                Redux::setSection( $opt_name, array(
                    'title'      => __( 'Advanced', 'pixfort-core' ),
                    'desc'       => __( 'For detailed information about using external font please check this article from our knowledge base: ', 'pixfort-core' ) . '<a target="_blank" href="https://essentials.pixfort.com/knowledge-base/how-to-use-external-fonts/" target="_blank">https://essentials.pixfort.com/knowledge-base/how-to-use-external-fonts/</a>',
                        'id'         => 'opt-textarea-subsection',
                        'subsection' => true,
                        'fields'     => array(
                            array(
                                'id'       => 'opt-external-font-1-url',
                                'type'     => 'text',
                                'title'    => __( 'External font 1 link', 'pixfort-core' ),
                                'desc'     => __( 'Add the link of the external font', 'pixfort-core' ),
                            ),
                            array(
                                'id'       => 'opt-external-font-1-name',
                                'type'     => 'text',
                                'title'    => __( 'External font 1 Name', 'pixfort-core' ),
                                'desc'     => __( 'Add the name of the external font', 'pixfort-core' ),
                            ),
                            array(
                                'id'       => 'opt-external-font-2-url',
                                'type'     => 'text',
                                'title'    => __( 'External font 2 link', 'pixfort-core' ),
                                'desc'     => __( 'Add the link of the external font', 'pixfort-core' ),
                            ),
                            array(
                                'id'       => 'opt-external-font-2-name',
                                'type'     => 'text',
                                'title'    => __( 'External font 2 Name', 'pixfort-core' ),
                                'desc'     => __( 'Add the name of the external font', 'pixfort-core' ),
                            ),

                            array(
                                'id' => 'section-font-size',
                                'type' => 'section',
                                'title' => __('Font sizes', 'pixfort-core'),
                                // 'subtitle' => __('With the "section" field you can create indent option sections.', 'pixfort-core'),
                                'indent' => false
                            ),
                            array(
                                'id'       => 'opt-font-size-base',
                                'type'     => 'text',
                                'default'   => '1rem',
                                'title'    => __( 'The base font size of the theme', 'pixfort-core' ),
                                'desc'     => __( 'By default 1rem which assumes the browser default, typically 16px.<br />This option will affect all theme font sizes, if you want to change a single element font size do so from element settings in the page builder.<br /><strong>Note: make sure that this a valid font size value (with the rem unit).</strong>', 'pixfort-core' ),
                            ),
                            // array(
                            //     'id'       => 'opt-line-height-base',
                            //     'type'     => 'text',
                            //     'default'   => '',
                            //     'subtitle' => __('Leave empty to use theme default.', 'pixfort-core'),
                            //     'title'    => __( 'The base Line height of the theme', 'pixfort-core' ),
                            //     // 'desc'     => __( 'By default the base line height is set relatively to the <strong>base line height of the theme</strong> set in the field above.<br /><strong>Note: make sure that this a valid font size value (with the unit).</strong>', 'pixfort-core' ),
                            // ),

                            array(
                                'id'       => 'opt-font-size-h1',
                                'type'     => 'text',
                                'default'   => '',
                                'subtitle' => __('Leave empty to use theme default.', 'pixfort-core'),
                                'title'    => __( 'H1 font size of the theme', 'pixfort-core' ),
                                'desc'     => __( 'By default the Heading font size is set relatively to the <strong>base font size of the theme</strong> set in the field above.<br /><strong>Note: make sure that this a valid font size value (with the unit).</strong>', 'pixfort-core' ),
                            ),
                            array(
                                'id'       => 'opt-line-height-h1',
                                'type'     => 'text',
                                'default'   => '',
                                'subtitle' => __('Leave empty to use theme default.', 'pixfort-core'),
                                'title'    => __( 'H1 Line height of the theme', 'pixfort-core' ),
                                // 'desc'     => __( 'By default the Heading line height is set relatively to the <strong>base line height of the theme</strong> set in the field above.<br /><strong>Note: make sure that this a valid font size value (with the unit).</strong>', 'pixfort-core' ),
                            ),

                            array(
                                'id'       => 'opt-font-size-h2',
                                'type'     => 'text',
                                'default'   => '',
                                'subtitle' => __('Leave empty to use theme default.', 'pixfort-core'),
                                'title'    => __( 'H2 font size of the theme', 'pixfort-core' ),
                                'desc'     => __( 'By default the Heading font size is set relatively to the <strong>base font size of the theme</strong> set in the field above.<br /><strong>Note: make sure that this a valid font size value (with the unit).</strong>', 'pixfort-core' ),
                            ),
                            array(
                                'id'       => 'opt-line-height-h2',
                                'type'     => 'text',
                                'default'   => '',
                                'subtitle' => __('Leave empty to use theme default.', 'pixfort-core'),
                                'title'    => __( 'H2 Line height of the theme', 'pixfort-core' ),
                                // 'desc'     => __( 'By default the Heading line height is set relatively to the <strong>base line height of the theme</strong> set in the field above.<br /><strong>Note: make sure that this a valid font size value (with the unit).</strong>', 'pixfort-core' ),
                            ),

                            array(
                                'id'       => 'opt-font-size-h3',
                                'type'     => 'text',
                                'default'   => '',
                                'subtitle' => __('Leave empty to use theme default.', 'pixfort-core'),
                                'title'    => __( 'H3 font size of the theme', 'pixfort-core' ),
                                'desc'     => __( 'By default the Heading font size is set relatively to the <strong>base font size of the theme</strong> set in the field above.<br /><strong>Note: make sure that this a valid font size value (with the unit).</strong>', 'pixfort-core' ),
                            ),
                            array(
                                'id'       => 'opt-line-height-h3',
                                'type'     => 'text',
                                'default'   => '',
                                'subtitle' => __('Leave empty to use theme default.', 'pixfort-core'),
                                'title'    => __( 'H3 Line height of the theme', 'pixfort-core' ),
                                // 'desc'     => __( 'By default the Heading line height is set relatively to the <strong>base line height of the theme</strong> set in the field above.<br /><strong>Note: make sure that this a valid font size value (with the unit).</strong>', 'pixfort-core' ),
                            ),

                            array(
                                'id'       => 'opt-font-size-h4',
                                'type'     => 'text',
                                'default'   => '',
                                'subtitle' => __('Leave empty to use theme default.', 'pixfort-core'),
                                'title'    => __( 'H4 font size of the theme', 'pixfort-core' ),
                                'desc'     => __( 'By default the Heading font size is set relatively to the <strong>base font size of the theme</strong> set in the field above.<br /><strong>Note: make sure that this a valid font size value (with the unit).</strong>', 'pixfort-core' ),
                            ),
                            array(
                                'id'       => 'opt-line-height-h4',
                                'type'     => 'text',
                                'default'   => '',
                                'subtitle' => __('Leave empty to use theme default.', 'pixfort-core'),
                                'title'    => __( 'H4 Line height of the theme', 'pixfort-core' ),
                                // 'desc'     => __( 'By default the Heading line height is set relatively to the <strong>base line height of the theme</strong> set in the field above.<br /><strong>Note: make sure that this a valid font size value (with the unit).</strong>', 'pixfort-core' ),
                            ),

                            array(
                                'id'       => 'opt-font-size-h5',
                                'type'     => 'text',
                                'default'   => '',
                                'subtitle' => __('Leave empty to use theme default.', 'pixfort-core'),
                                'title'    => __( 'H5 font size of the theme', 'pixfort-core' ),
                                'desc'     => __( 'By default the Heading font size is set relatively to the <strong>base font size of the theme</strong> set in the field above.<br /><strong>Note: make sure that this a valid font size value (with the unit).</strong>', 'pixfort-core' ),
                            ),
                            array(
                                'id'       => 'opt-line-height-h5',
                                'type'     => 'text',
                                'default'   => '',
                                'subtitle' => __('Leave empty to use theme default.', 'pixfort-core'),
                                'title'    => __( 'H5 Line height of the theme', 'pixfort-core' ),
                                // 'desc'     => __( 'By default the Heading line height is set relatively to the <strong>base line height of the theme</strong> set in the field above.<br /><strong>Note: make sure that this a valid font size value (with the unit).</strong>', 'pixfort-core' ),
                            ),

                            array(
                                'id'       => 'opt-font-size-h6',
                                'type'     => 'text',
                                'default'   => '',
                                'subtitle' => __('Leave empty to use theme default.', 'pixfort-core'),
                                'title'    => __( 'H6 font size of the theme', 'pixfort-core' ),
                                'desc'     => __( 'By default the Heading font size is set relatively to the <strong>base font size of the theme</strong> set in the field above.<br /><strong>Note: make sure that this a valid font size value (with the unit).</strong>', 'pixfort-core' ),
                            ),
                            array(
                                'id'       => 'opt-line-height-h6',
                                'type'     => 'text',
                                'default'   => '',
                                'subtitle' => __('Leave empty to use theme default.', 'pixfort-core'),
                                'title'    => __( 'H6 Line height of the theme', 'pixfort-core' ),
                                // 'desc'     => __( 'By default the Heading line height is set relatively to the <strong>base line height of the theme</strong> set in the field above.<br /><strong>Note: make sure that this a valid font size value (with the unit).</strong>', 'pixfort-core' ),
                            ),

                            array(
                                'id'     => 'section-font-size-end',
                                'type'   => 'section',
                                'indent' => false,
                            ),
                        )
                    ) );




                    Redux::setSection( $opt_name, array(
                        'title'      => __( 'Icons', 'pixfort-core' ),
                        'id'         => 'typography-icons',
                        'subsection' => true,
                        'fields'     => array(

                            array(
                                'id'       => 'opt-ions-library',
                                'type'     => 'select',
                                'title'    => __('Font icons Library', 'pixfort-core'),
                                'subtitle' => __('Pick the website font library.', 'pixfort-core'),
                                // 'subtitle' => __('No validation can be done on this field type', 'pixfort-core'),
                                'desc'     => __('For performance optimization you can reduce the number of font icons in the website.<br /><strong style="color:#333;">*Important Note:</strong> if you reduced the icons number some icons used in your website may dissapear if they are from a bigger library.', 'pixfort-core'),
                                // Must provide key => value pairs for select options
                                'options'  => array(
                                    'main'   => __('Main Library (All icons ~1750)', 'pixfort-core'),
                                    'light'   => __('Light Library (~300 icons)', 'pixfort-core'),
                                    'basic'   => __('Only basic icons (~100 icons)', 'pixfort-core'),
                                ),
                                'default'  => 'main',

                            ),


                        )
                    )
                );




                Redux::setSection( $opt_name, array(
                    'title' => __( 'Shop', 'pixfort-core' ),
                    'id'    => 'shop',
                    'desc'  => __( 'Woocommerce shop settings.', 'pixfort-core' ),
                    'icon'  => $optionsIcons['shop'],
                    'icon_type'  => $optionsIconType
                ) );


                Redux::setSection( $opt_name, array(
                    'title'      => __( 'General', 'pixfort-core' ),
                    // 'desc'       => __( 'For full documentation on this field, visit: ', 'pixfort-core' ) . '<a href="http://docs.reduxframework.com/core/fields/textarea/" target="_blank">http://docs.reduxframework.com/core/fields/textarea/</a>',
                    'id'         => 'opt-shop-advanced',
                    'subsection' => true,
                    'fields'     => array(

                        array(
                            'id'       => 'shop-layout',
                            'type'     => 'select',
                            'title'    => __('Shop page layout', 'pixfort-core'),
                            'default'  => 'right-sidebar',
                            'options'  => array(
                                'right-sidebar'   => __('Right sidebar', 'pixfort-core'),
                                'left-sidebar'   => __('Left sidebar', 'pixfort-core'),
                                'no-sidebar'   => __('No sidebar', 'pixfort-core'),
                            )
                        ),

                        array(
                            'id'       => 'shop-item-style',
                            'type'     => 'image_select',
                            'width'     => '150px',
                            'height'     => '100px',
                            'title'    => __('Shop item style', 'pixfort-core'),
                            // 'subtitle' => __('Layout for blog posts', 'pixfort-core'),
                            'options'  => array(
                                'default'      => array(
                                    'title'   => __('Default', 'pixfort-core'),
                                    'img'   => $pixReduxFramework.'assets/img/options/shop/shop-default.png'
                                ),
                                'default-no-padding'      => array(
                                    'title'   => __('Default no padding', 'pixfort-core'),
                                    'img'   => $pixReduxFramework.'assets/img/options/shop/shop-default-no-padding.png'
                                ),
                                'top-img'      => array(
                                    'title'   => __('Top image', 'pixfort-core'),
                                    'img'   => $pixReduxFramework.'assets/img/options/shop/shop-top-image.png'
                                ),
                                'top-img-no-padding'      => array(
                                    'title'   => __('Top image no padding', 'pixfort-core'),
                                    'img'   => $pixReduxFramework.'assets/img/options/shop/shop-top-image-no-padding.png'
                                ),
                                'full-img'      => array(
                                    'title'   => __('Full image', 'pixfort-core'),
                                    'img'   => $pixReduxFramework.'assets/img/options/shop/shop-full-image.png'
                                ),
                            ),
                            'default' => 'default',
                        ),

                        array(
                            'id'       => 'shop-col-count',
                            'type'     => 'select',
                            'title'    => __('Number of columns in shop page', 'pixfort-core'),
                            'default'  => '3',
                            'options'  => array(
                                '2'		=> __('2', 'pixfort-core'),
                                '3'		=> __('3 (Default)', 'pixfort-core'),
                                '4'		=> __('4', 'pixfort-core'),
                                '5'		=> __('5', 'pixfort-core'),
                            )
                        ),


                        array(
                            'id'       => 'shop-tabs-style',
                            'type'     => 'select',
                            'title'    => __('Shop tabs style', 'pixfort-core'),
                            'default'  => 'pix-pills-1',
                            'options'  => array(
                                'pix-pills-1'		=> __('Default (Gradient)', 'pixfort-core'),
                                'pix-pills-solid'			=> __('Solid', 'pixfort-core'),
                                'pix-pills-light'			=> __('Light', 'pixfort-core'),
                                'pix-pills-outline'			=> __('Outline', 'pixfort-core'),
                                'pix-pills-line'			=> __('Line', 'pixfort-core'),
                                'pix-pills-round'			=> __('Round', 'pixfort-core'),
                            )
                        ),


                        array(
                            'id'       => 'shop-single-layout',
                            'type'     => 'select',
                            'title'    => __('Product page layout', 'pixfort-core'),
                            'default'  => 'default',
                            'options'  => array(
                                'default'		=> __('Default (Gallery)', 'pixfort-core'),
                                'pix-boxed-2'		=> __('Gallery - Boxed description', 'pixfort-core'),
                                'layout-2'			=> __('Full', 'pixfort-core'),
                                'layout-3'			=> __('Full - Boxed description', 'pixfort-core'),
                            )
                        ),
                        array(
                            'id'       => 'shop-single-sidebar',
                            'type'     => 'switch',
                            'title'    => __('Enable sidebar in product page', 'pixfort-core'),
                            // 'desc' => __('Disable to display dark text in the intro.', 'pixfort-core'),
                            'default'  => false,
                        ),


                        array(
                            'id'       => 'shop-bg-color',
                            'type'     => 'select',
                            'title'    => __('Background color', 'pixfort-core'),
                            // 'subtitle' => __('No validation can be done on this field type', 'pixfort-core'),
                            // 'desc'     => __('This is the description field, again good for additional info.', 'pixfort-core'),
                            // Must provide key => value pairs for select options
                            'options'  => array_flip($bg_colors),
                            'default'  => 'gray-1',
                        ),



                        array(
                            'id'       => 'custom-shop-bg-color',
                            'type'     => 'color',
                            'title'    => __('Custom background Color', 'pixfort-core'),
                            // 'subtitle' => __('Pick a background color for the theme (default: #fff).', 'pixfort-core'),
                            'transparent' => false,
                            'default'  => '#FFFFFF',
                            'required' => array('shop-bg-color','equals','custom'),
                            'validate' => 'color',
                        ),


                        array(
                            'id'       => 'sidebar-shop',
                            'type'     => 'select',
                            'title'    => __('Shop sidebar', 'pixfort-core'),
                            // 'desc' => __('Disable to display dark text in the intro.', 'pixfort-core'),
                            'default'  => 'sidebar-1',
                            'options'  => $sidebars
                        ),



                        array(
                            'id'       => 'shop-products-count',
                            'type'     => 'text',
                            'title'    => __( 'Shop products count', 'pixfort-core' ),
                            'desc' => __('Default is 12.', 'pixfort-core'),
                            'default'  => '12',
                        ),



                    )
                ) );

                Redux::setSection( $opt_name, array(
                    'title'      => __( 'Intro', 'pixfort-core' ),
                    'id'         => 'shop-general',
                    'subsection' => true,
                    'fields'     => array(

                        array(
                            'id'       => 'shop-with-intro',
                            'type'     => 'switch',
                            'title'    => __('Enable shop intro', 'pixfort-core'),
                            'desc' => __('Add intro section at the beginning of the shop.', 'pixfort-core'),
                            'default'  => true,
                        ),

                        array(
                            'id'       => 'shop-divider-style',
                            'type'     => 'image_select',
                            'class'    => 'pix-opts-dividers',
                            'title'    => __('Divider style', 'pixfort-core'),
                            // 'subtitle' => __('Layout for portfolio items list', 'pixfort-core'),
                            //'desc' => __('This option can <strong>not</strong> be overriden and it is usefull for people who already have many posts and want to standardize their appearance.', 'pixfort-core'),
                            'options'  => $opts_dividers,
                            'default' => '0',
                        ),

                        array(
                            'id'       => 'shop-divider-height',
                            'type'     => 'text',
                            'title'    => __( 'Custom Divider height (Optional)', 'pixfort-core' ),
                            'desc' => __('Leave empty to use the default height for each divider.', 'pixfort-core'),
                            // 'subtitle' => __('Link to single item', 'pixfort-core'),
                            'default'  => '',
                        ),

                        array(
                            'id'       => 'shop-intro-img',
                            'type'     => 'media',
                            'url'      => true,
                            'title'    => __('Intro background image', 'pixfort-core'),
                        ),
                        array(
                            'id'       => 'shop-intro-light',
                            'type'     => 'switch',
                            'title'    => __('Enable light intro text', 'pixfort-core'),
                            'desc' => __('Disable to display dark text in the intro.', 'pixfort-core'),
                            'default'  => true,
                        ),

                        array(
                            'id'       => 'shop-intro-align',
                            'type'     => 'select',
                            'title'    => __('Intro text align', 'pixfort-core'),
                            // 'desc' => __('Disable to display dark text in the intro.', 'pixfort-core'),
                            'default'  => 'text-center',
                            'options'  => array(
                                'text-left'   => __('Left', 'pixfort-core'),
                                'text-center'   => __('Center', 'pixfort-core'),
                                'text-right'   => __('Right', 'pixfort-core')
                            )
                        ),

                        array(
                            'id'       => 'shop-intr-bg-color',
                            'type'     => 'select',
                            'title'    => __('Intro overlay color', 'pixfort-core'),
                            'default'  => 'primary',
                            'options'  => array_flip($bg_colors_no_custom),
                        ),
                        array(
                            'id'       => 'shop-intro-opacity',
                            'type'     => 'select',
                            'title'    => __('Intro overlay opacity', 'pixfort-core'),
                            'default'  => 'pix-opacity-2',
                            'options'  => array(
                                'pix-opacity-10'   => "0%",
                                'pix-opacity-9'   => "10%",
                                'pix-opacity-8'   => "20%",
                                'pix-opacity-7'   => "30%",
                                'pix-opacity-6'   => "40%",
                                'pix-opacity-5'   => "50%",
                                'pix-opacity-4'   => "60%",
                                'pix-opacity-3'   => "70%",
                                'pix-opacity-2'   => "80%",
                                'pix-opacity-1'   => "90%",
                                'pix-opacity-0'   => "100%",
                            )
                        ),

                        array(
                            'id'       => 'shop-disable-title-animation',
                            'type'     => 'switch',
                            'title'    => __('Disable Title animation', 'pixfort-core'),
                            'default'  => false,
                        ),
                        array(
                            'id'       => 'shop-disable-intro-title',
                            'type'     => 'switch',
                            'title'    => __('Disable Title', 'pixfort-core'),
                            'default'  => false,
                        ),
                        array(
                            'id'       => 'shop-disable-intro-breadcrumbs',
                            'type'     => 'switch',
                            'title'    => __('Disable Breadcrumbs', 'pixfort-core'),
                            'default'  => false,
                        ),
                        array(
                            'id'       => 'shop-disable-intro-parallax',
                            'type'     => 'switch',
                            'title'    => __('Disable Intro Parallax effect', 'pixfort-core'),
                            'default'  => false,
                        ),

                        array(
                            'id'       => 'shop-intro-top-height',
                            'type'     => 'text',
                            'title'    => __( 'Custom top padding (Optional)', 'pixfort-core' ),
                            'desc' => __('Leave empty to use the default top padding for the intro.', 'pixfort-core'),
                            'default'  => '',
                            'required' => array('shop-with-intro','!=',false),
                        ),
                        array(
                            'id'       => 'shop-intro-bottom-height',
                            'type'     => 'text',
                            'title'    => __( 'Custom bottom padding (Optional)', 'pixfort-core' ),
                            'desc' => __('Leave empty to use the default bottom padding for the intro.', 'pixfort-core'),
                            'default'  => '',
                            'required' => array('shop-with-intro','!=',false),
                        ),
                        array(
                            'id'       => 'shop-mobile-intro-top-height',
                            'type'     => 'text',
                            'title'    => __( 'Custom Mobile top padding (Optional)', 'pixfort-core' ),
                            'desc' => __('Leave empty to use the default top padding for the intro.', 'pixfort-core'),
                            'default'  => '',
                            'required' => array('shop-with-intro','!=',false),
                        ),
                        array(
                            'id'       => 'shop-mobile-intro-bottom-height',
                            'type'     => 'text',
                            'title'    => __( 'Custom Mobile bottom padding (Optional)', 'pixfort-core' ),
                            'desc' => __('Leave empty to use the default bottom padding for the intro.', 'pixfort-core'),
                            'default'  => '',
                            'required' => array('shop-with-intro','!=',false),
                        )
                    )
                )
            );

            Redux::setSection( $opt_name, array(
                'title'      => __( 'Advanced', 'pixfort-core' ),
                'id'         => 'opt-shop-advanced-2',
                'subsection' => true,
                'fields'     => array(
                    array(
                        'id'       => 'shop-default-add-cart',
                        'type'     => 'switch',
                        'title'    => __('Show default add to cart button', 'pixfort-core'),
                        'default'  => false,
                    ),
                    array(
                        'id'       => 'pix-disable-shop-social',
                        'type'     => 'switch',
                        'title'    => __('Disable shop social share buttons', 'pixfort-core'),
                        'default'  => false,
                    ),
                    array(
                        'id'       => 'pix-disable-shop-preview',
                        'type'     => 'switch',
                        'title'    => __('Disable shop Preview popup', 'pixfort-core'),
                        'default'  => false,
                    ),
                    array(
                        'id'       => 'pix-disable-add-cart-icon',
                        'type'     => 'switch',
                        'title'    => __('Disable add to cart Icon Button', 'pixfort-core'),
                        'default'  => false,
                    ),
                )
            )
        );

        /**
        * Add Font Group
        */
        add_filter( 'elementor/fonts/groups', function( $font_groups ) {
            $font_groups['theme_fonts'] = __( 'pixfort Fonts' );
            return $font_groups;
        } );
        /**
        * Add Group Fonts
        */
        add_filter( 'elementor/fonts/additional_fonts', function( $additional_fonts ) {
            $body_font = pix_plugin_get_option('opt-primary-font');
            $heading_font = pix_plugin_get_option('opt-secondary-font');
            if($body_font){
                if(!empty($body_font['font-family'])){
                    $additional_fonts[$body_font['font-family']] = 'theme_fonts';
                }
            }
            if($heading_font){
                if(!empty($heading_font['font-family'])){
                    $additional_fonts[$heading_font['font-family']] = 'theme_fonts';
                }
            }
            return $additional_fonts;
        } );


        function addAndOverridePanelCSS() {
            // wp_dequeue_style( 'redux-admin-css' );
            wp_register_style(
                'redux-custom-css',
                PIX_CORE_PLUGIN_URI.'functions/css/admin-panel.css',
                array( 'farbtastic' ), // Notice redux-admin-css is removed and the wordpress standard farbtastic is included instead
                time(),
                'all'
            );
            wp_enqueue_style('redux-custom-css');
        }
        // This example assumes your opt_name is set to redux_demo, replace with your opt_name value
        add_action( 'redux/page/pix_options/enqueue', 'addAndOverridePanelCSS' );


        ?>
