<?php
/**
* pixfort start page
*/

// Redirect to the dashboard after theme activation
if (is_admin() && isset($_GET['activated']) && $pagenow == "themes.php"){
    wp_redirect(admin_url('?page=pixfort-dashboard'));
}

function pixfort_el_args($getArgs){
	$key = get_option('envato_purchase_code_27889640');
	if(!$key){
		return $getArgs;
	}
	$getArgs['headers'] = array(
		'pix_domain' => site_url(),
		'purchase_key' => $key
	);
	return $getArgs;
}
add_filter( 'pixfort_el_remote_get_args', 'pixfort_el_args', 1);

/**
* Display notice to activate the theme
*/
function pixfort_activation_notice() {
    ?>
    <div class="notice pixfort-admin-notice notice-warning2 is-dismissible">
        <div class="notice-text"><strong><?php echo esc_attr__( 'Essenitals Theme:', 'essentials' ); ?></strong><?php echo esc_attr__( ' your copy of the theme is not verified yet! verify now from Essenitals dashboard to activate all the features and demo content.', 'essentials' ); ?></div>
        <a href="<?php echo esc_url( admin_url('?page=pixfort-dashboard') ); ?>" class="button button-primary">Go to Essentials Dashboard</a>
        <br />
    </div>
    <?php
}

$status = PixfortHub::checkValidation();
if(!$status){
	add_action( 'admin_notices', 'pixfort_activation_notice' );
}


/**
* Display notice to udapte pixfort-core plugin
*/
function pixfort_update_core_notice() {
    ?>
    <div class="pixfort-admin-notice pixfort-danger-notice  notice  notice-danger  is-dismissible2">
        <div class="notice-grid">
            <div class="grid-box box-1">
            <div>
                <h2><img class="alert-icon" src="<?php echo esc_url(get_template_directory_uri() . '/inc/assets/icons/warning-icon-white.svg'); ?>" />Important notice!</h2>
                <p class="notice-text"><strong><?php esc_html_e( 'It seems that you updated Essentials theme, please make sure to update "pixfort core" too from Essentials > Dashboard > Install plugins.', 'essentials' ); ?></strong></p>
                <a href="<?php echo esc_url( admin_url('?page=pixfort-dashboard') ); ?>" class="button-danger">Go to Essentials Dashboard</a>
            </div>
            </div>
            <div class="grid-box box-2">
                <video style="" width="320" height="240" autoplay muted loop>
                    <source src="https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/admin-panel/update-pixfort-core.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
    <?php
}

if(defined('PIXFORT_PLUGIN_VERSION')){
    if(PIXFORT_PLUGIN_VERSION<ESSENTIALS_THEME_VERSION){
        add_action( 'admin_notices', 'pixfort_update_core_notice' );
    }
    if(is_user_logged_in()){
        if(get_option('pix_essentials_style_url')){
            $upURL = get_site_url();
            $styleURL = get_option('pix_essentials_style_url');
            if(!empty(wp_upload_dir()['baseurl'])){
                $upURL = wp_upload_dir()['baseurl'];
            }
            if(pixStringStartWith(get_option('pix_essentials_style_url'), 'https://')){
                $protocols = array("http://", "https://");
                $styleURL = str_replace($protocols, "", $styleURL);
                $upURL = str_replace($protocols, "", $upURL);
            }
            if(!pixStringStartWith($styleURL, $upURL)){
        		add_action( 'admin_notices', 'pixfort_url_change_options_notice' );
        	}
        }
        // else {
        //     add_action( 'admin_notices', 'pixfort_save_theme_options_notice' );
        // }
    }
}

function pixStringStartWith($s1, $s2){
    return (substr( $s1, 0, strlen( $s2 ) ) === $s2);
}


function pixfort_url_change_options_notice() {
    ?>
    <div class="pixfort-admin-notice  notice  notice-warning  is-dismissible">
    		<p class="notice-text"><strong><?php esc_html_e( 'Important Note: ', 'essentials' ); ?></strong><?php esc_html_e( 'It seems that the website URL has been changed, please make sure to go to Essentials Theme options and click on the Save button to refresh the options URLs.', 'essentials' ); ?></p>
            <a href="<?php echo esc_url( admin_url('admin.php?page=pixfort') ); ?>" class="button">Go to Theme options</a>
    	</div>
    <?php
}
function pixfort_save_theme_options_notice() {
    ?>
    <div class="pixfort-admin-notice  notice  notice-warning  is-dismissible">
    		<p class="notice-text"><strong><?php esc_html_e( 'Important Note: ', 'essentials' ); ?></strong><?php esc_html_e( 'Please make sure to go to Essentials Theme options and click on the Save options button.', 'essentials' ); ?></p>
            <a href="<?php echo esc_url( admin_url('admin.php?page=pixfort') ); ?>" class="button">Go to Theme options</a>
    	</div>
    <?php
}


add_action('admin_init', 'pix_woocommerce_plugin_status');


function pix_woocommerce_plugin_status() {
    if ( class_exists( 'WooCommerce' ) ) {
        $woo_status = get_option('pix_woocommerce_active');
        if(!$woo_status){
            update_option('pix_woocommerce_active', 'true');
            if(function_exists('pix_update_style_url')){
                pix_update_style_url();
            }
        }
    }else{
        update_option('pix_woocommerce_active', '');
    }
}

add_action('admin_init', 'pix_theme_style_check');
function pix_theme_style_check() {
    $site_style_version = get_option('pixfort_site_style_version');
    if(!$site_style_version){
        update_option('pixfort_site_style_version', ESSENTIALS_THEME_VERSION);
        if(function_exists('pix_update_style_url')){
            pix_update_style_url();
        }
    }else{
        if($site_style_version!=ESSENTIALS_THEME_VERSION){
            update_option('pixfort_site_style_version', ESSENTIALS_THEME_VERSION);
            if(function_exists('pix_update_style_url')){
                pix_update_style_url();
            }
        }
    }
}

add_action( 'admin_menu', 'pix_admin_dashboard_menu' );
if(is_admin()) require get_template_directory() . '/inc/config/plugins.php';

function pix_admin_dashboard_menu() {
    $theme_params = pix_theme_params();
    add_menu_page( $theme_params['name'], $theme_params['name'], 'manage_options', 'pixfort-dashboard', 'pixfort_admin_page', get_template_directory_uri() . '/inc/config/img/pixfort-logo.svg', 1 );
    add_submenu_page( 'pixfort-dashboard', $theme_params['name'].' Dashboard', 'Dashboard', 'manage_options', 'pixfort-dashboard', 'pixfort_admin_page', 2  );
    if(class_exists('OCDI_Plugin')){
        add_submenu_page( 'pixfort-dashboard', 'Demo Import', 'Demo Import', 'import', 'pix-one-click-demo-import', 'pt-ocdi/plugin_page_setup', 9  );
    }
}
function pixfort_admin_page(){


    wp_enqueue_script( 'pixfort-dashboard', get_template_directory_uri() . '/inc/config/js/dashboard.js', array(
        'jquery'
    ) );
    $dashboardOpts = array(
        'AJAX_URL'	=> admin_url('admin-ajax.php')
    );
    $theme_params = pix_theme_params();
    //after wp_enqueue_script
    wp_localize_script( 'pixfort-dashboard', 'dashboard_object', $dashboardOpts );

    $isStart = true;
    $step = 1;
    $dashboard_options = get_option('pixfort_dashboard_options');
    if($dashboard_options){
        $isStart = $dashboard_options['is-start'];
        $step = $dashboard_options['step'];
    }else{
        $data = array(
            'is-start' => true,
            'step'     => 1
        );
        update_option('pixfort_dashboard_options', $data);
    }

    $dashClass= 'getting-started';
    if(!$isStart){
        $dashClass= 'animate-dashboard';
    }






    $server_status = pix_get_server_status();

    $pixfortHub = new PixfortHub();
    $token = $pixfortHub->getCsrfToken();
    $nonce = $pixfortHub->getVerifyNonce();
    $verify_action = $pixfortHub->getverifyAction();
    $verify_url = $pixfortHub->getVerifyUrl();

    $site_theme_url = get_option('pixfort_site_theme_url');


    if(!$site_theme_url){
        update_option('pixfort_site_theme_url', site_url());
    }else{
        $siteURL = site_url();
        if(substr( $siteURL, 0, 5 ) === "https"){
            $siteURL = substr($siteURL, 5);
        }elseif(substr( $siteURL, 0, 4 ) === "http"){
            $siteURL = substr($siteURL, 4);
        }

        if(substr( $site_theme_url, 0, 5 ) === "https"){
            $site_theme_url = substr($site_theme_url, 5);
        }elseif(substr( $site_theme_url, 0, 4 ) === "http"){
            $site_theme_url = substr($site_theme_url, 4);
        }
        if($site_theme_url!=$siteURL){
            $pixfortHub->disableActivation();
            update_option('pixfort_site_theme_url', site_url());
        }
    }

    // Returned from hub
    $validation = false;
    $validationResult = false;
    if(!empty($_GET['pixfortKey'])){
        $status = $pixfortHub->checkValidation();
        if(!$status){
            $validation = true;
            $validationResult = $pixfortHub->pix_theme_verify($_GET['pixfortKey']);
            if(!empty($validationResult) && !empty($validationResult['result']) ){
                if($validationResult['result']){
                    $data = array(
                        'is-start' => true,
                        'step'     => 2
                    );
                    $dashboard_options = get_option('pixfort_dashboard_options');
                    if($dashboard_options){
                        $data['is-start'] = $dashboard_options['is-start'];
                    }
                    update_option('pixfort_dashboard_options', $data);
                    wp_redirect(admin_url('?page=pixfort-dashboard'));
                }
            }

        }
    }

    if(!empty($_GET['pixfort_e'])){
        if(!empty($_GET['pixfort_e_ek'])){
            if(!empty($_GET['pixfort_e_pk'])){
                update_option('envato_purchase_code_27889640', $_GET['pixfort_e_ek']);
                update_option('pixfort_key', $_GET['pixfort_e_pk']);
            }
        }
    }
    if(!empty($_GET['pixfort_dis'])){
        if($_GET['pixfort_dis']==12){
            update_option('envato_purchase_code_27889640', '');
            update_option('pixfort_key', '');
        }
    }

    $opt_key = 'envato_purchase_code_' . PixfortHub::$item_id;
    $code = get_option($opt_key);
    $pixfortKey = get_option('pixfort_key');

    ?>



    <svg class="pix-dashboard-divider" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 1200 360" preserveAspectRatio="none">
        <g class="layer-3 pix-waiting animated" data-anim-type="fade-in-up" data-anim-delay="700">
            <polygon fill="url(#divider-80213-bottom-overlay-layer-3)" points="0 240 1200 0 1200 360 0 360"></polygon>
        </g>
        <g class="layer-2 pix-waiting animated" data-anim-type="fade-in-up" data-anim-delay="600">
            <polygon fill="url(#divider-80213-bottom-overlay-layer-2)" points="0 300 1200 60 1200 360 0 360"></polygon>
        </g>
        <polygon fill="#ffffff" points="0 360 1200 120 1200 360"></polygon>
        <defs>
            <linearGradient id="divider-80213-bottom-overlay-layer-3" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" stop-color="rgba(52,58,64,0.01)"></stop>
                <stop offset="100%" stop-color="rgba(255,255,255,0.15)"></stop>
            </linearGradient>
            <linearGradient id="divider-80213-bottom-overlay-layer-2" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" stop-color="#5c96f6"></stop>
                <stop offset="50%" stop-color="#c757be"></stop>
                <stop offset="100%" stop-color="#ea4157"></stop>
            </linearGradient>
        </defs>
    </svg>


    <div class="wrap">
        <div class="page-title"><?php echo esc_html($theme_params['name']); ?> Dashboard</div>


        <div class="dashboard-grid <?php echo esc_attr($dashClass); ?>">

            <?php
            $pluginsClass = 'is-active';
            if($isStart&&$step>1){
                $pluginsClass='';
            }
             ?>
            <div id="pix-plugins" class="pix-server-status pix-dashboard-box <?php echo esc_attr($pluginsClass); ?>">
                <div>
                    <div class="box-title text-center">Step 1</div>
                    <div class="box-subtitle text-center"><?php esc_html_e( 'Plugins Installation', 'essentials' ); ?></div>
                    <div class="text-center">
                        <img class="pix-plugins-img" src="<?php echo esc_url(get_template_directory_uri() . '/inc/config/img/required-plugins.png'); ?>"  />
                    </div>
                    <?php
                        $pluginSetup = new PixFort_Plugins_Setup();
                        $pluginSetup->envato_setup_default_plugins();
                    ?>
                    <div class="text-center useful-note">
                        <!-- <img class="pix-plugins-img" src="<?php echo esc_url(get_template_directory_uri() . '/inc/config/img/other-plugins.png'); ?>"  /> -->
                        <div>Note: The additional compatible plugins with Essentials can be installed from WordPress plugins page.</div>
                    </div>
                </div>
            </div>
            <?php
            $verifyClass = '';
            if($isStart&&$step>1){
                $verifyClass='is-active';
            }
             ?>
            <div id="pix-verification" class="pix-verification pix-dashboard-box text-center <?php echo esc_attr($verifyClass); ?>">
                <div>
                    <div class="box-title">Step 2</div>
                    <div class="box-subtitle"><?php esc_html_e( 'Theme activation', 'essentials' ); ?></div>
                    <?php

                    $status = $pixfortHub->checkValidation();
                        if($status){
                            ?>
                            <div class="dash-done-icon">


                            <div class="svg-box svg-dashboard-done">
                                <svg class="circular green-stroke">
                                    <circle class="path" cx="75" cy="75" r="50" fill="none" stroke-width="5" stroke-miterlimit="10"/>
                                </svg>
                                <svg class="svg-checkmark green-stroke">
                                    <g transform="matrix(0.79961,8.65821e-32,8.39584e-32,0.79961,-489.57,-205.679)">
                                        <path class="checkmark__check" fill="none" d="M616.306,283.025L634.087,300.805L673.361,261.53"/>
                                    </g>
                                </svg>
                            </div>

                            </div>
                            <p class="box-text pix-verify-status-text text-center">
                                Great news! your theme is activated! You are ready to go!
                            </p>
                            <div class="text-center">
                                <a href="#" class="pix-theme-deactivate">Deactivate theme</a>
                            </div>
                            <?php
                        }else{
                            ?>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/inc/config/img/activation.svg'); ?>"  />
                            <p class="box-text">
                                In order to use all the included features you need to verify the theme using your account on pixfort hub.
                            </p>
                            <form method="GET" target="_blank" action="<?php echo esc_url( $verify_url ); ?>">
                                <input type="hidden" name="_csrf" value="<?php echo esc_attr($token); ?>" />
                                <input type="hidden" name="theme_version" value="<?php echo esc_attr(ESSENTIALS_THEME_VERSION); ?>" />
                                <input type="hidden" name="theme" value="essentials" />
                                <input type="hidden" name="domain" value="<?php echo site_url(); ?>" />
                                <input type="hidden" name="nonce" value="<?php echo esc_attr($nonce); ?>" />
                                <input type="hidden" name="verify_action" value="<?php echo esc_attr($verify_action); ?>" />
                                <input type="hidden" name="return_url" value="<?php echo admin_url( 'admin.php?page=pixfort-dashboard&fi=ras'); ?>" />
                                <input type="submit" class="pix-btn btn-primary pixfort-active-theme" value="Activate theme"></input>
                            </form>
                            <?php
                        }
                        if(!empty($_GET['pixinfo'])){
                            echo '<br />Purchase code:<div>'. get_option('envato_purchase_code_27889640') . '</div>';
                            echo '<div>pixfort key: '. get_option('pixfort_key') . '</div>';
                            echo '<div>pixfort site URL: '. get_option('pixfort_site_theme_url') . '</div>';
                        }
                        if($isStart){
                            ?>
                            <br />
                            <a class="pixfort-skip pix-btn btn-link" href="#pix-info">Skip this step</a>
                        <?php } ?>
                        <div class="pix-dashboard-alert">
                            <strong>Important Note:</strong> if you want to activate this license later on a different domain you should deactivate it from here first <a href="https://essentials.pixfort.com/knowledge-base/deactivate-your-license/" target="_blank">Check this article</a>
                        </div>

                    </div>
                </div>
                <div id="pix-info" class="pix-server-status pix-dashboard-box">
                    <div>
                        <div class="box-title text-center">Step 3</div>
                        <div class="box-subtitle text-center"><?php esc_html_e( 'Useful Information', 'essentials' ); ?></div>
                        <div class="pix-useful-items">
                            <a href="<?php echo esc_url( admin_url('admin.php?page=pix-one-click-demo-import') ); ?>" class="useful-item">
                                <div class="useful-item-inner">
                                    <div class="useful-title">Import Demo Content</div>
                                    <div class="useful-text">Go to Demo import page</div>
                                </div>
                            </a>

                        </div>
                        <div class="pix-useful-items">
                            <a target="_blank" href="https://essentials.pixfort.com/knowledge-base/" class="useful-item">
                                <div class="useful-item-inner">
                                    <div class="useful-title">Knowledge base</div>
                                    <div class="useful-text">Check all the help articles</div>
                                </div>
                            </a>
                            <a target="_blank" href="https://essentials.pixfort.com/knowledge-base/videos/" class="useful-item">
                                <div class="useful-item-inner">
                                    <div class="useful-title">Videos</div>
                                    <div class="useful-text">Check the video tutorials</div>
                                </div>
                            </a>
                        </div>
                        <div class="pix-useful-items pix-changelog">
                            <a target="_blank" href="https://essentials.pixfort.com/knowledge-base/changelog/#pix_section_changelog" class="useful-item">
                                <div class="useful-item-inner">
                                    <div class="useful-title">Changelog v<?php echo esc_attr(ESSENTIALS_THEME_VERSION); ?></div>
                                    <div class="useful-text">Check latest theme updates</div>
                                </div>
                            </a>
                        </div>
                        <div class="pix-useful-items">
                            <a target="_blank" href="http://hub.pixfort.com/" class="useful-item">
                                <div class="useful-item-inner">
                                    <div class="useful-title">Support</div>
                                    <div class="useful-text">Get support and manage your licenses</div>
                                </div>
                            </a>
                            <div class="useful-item">
                                <div class="useful-item-inner">
                                    <div class="useful-title">Social</div>
                                    <div class="useful-text social-links">
                                        <a href="https://www.facebook.com/pixfort" target="_blank">Facebook</a>,
                                        <a href="https://www.instagram.com/pixfort" target="_blank">Instagram</a>,
                                        <a href="https://www.twitter.com/pixfort" target="_blank">Twitter</a>,
                                        <a href="https://www.linkedin.com/company/pixfort" target="_blank">Linkedin</a>,
                                        <a href="https://dribbble.com/PixFort" target="_blank">Dribbble</a>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <?php if($isStart){ ?>
                            <a class="pixfort-finish pix-btn btn-link" href="#">Finish</a>
                        <?php } ?>
                    </div>
                </div>
                <div class="pix-server-status pix-dashboard-box">
                    <div>
                        <div class="box-subtitle"><?php esc_html_e( 'Server status', 'essentials' ); ?></div>
                        <?php
                        if(current_user_can( 'switch_themes' )){
                            foreach ($server_status as $key => $value) {
                                ?>
                                <div class="pix-dash-status-item">
                                    <span class=item-text><?php echo esc_html($value['label']); ?></span>
                                    <?php

                                    if($value['status']){
                                        ?>
                                        <img src="<?php echo esc_url(get_template_directory_uri() . '/inc/config/img/check.svg'); ?>"  />
                                        <?php
                                    }else{
                                        if(!empty($value['help'])){
                                            ?>
                                            <a class="help-btn" target="_blank" href="<?php echo esc_url($value['help']); ?>"><img src="<?php echo esc_url(get_template_directory_uri() . '/inc/config/img/help.svg'); ?>"  /></a>
                                            <?php
                                        }
                                        ?>
                                        <img src="<?php echo esc_url(get_template_directory_uri() . '/inc/config/img/error.svg'); ?>"  />
                                        <?php
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                        }else{
                            ?>
                            <p>Please login as admin to view server status.</p>
                            <?php
                        }
                        ?>
                    </div>
                </div>



                <div class="pix-showcase pix-dashboard-box">
                    <div>
                        <a href="https://essentials.pixfort.com/essentials-showcase/" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri() . '/inc/config/img/dashboard-essentials-showcase.png'); ?>" title"Shocase" /></a>

                    </div>
                </div>

    </div>
</div>
<?php
}


/**
* Server status function
*/
function pix_get_server_status(){

    $result = array();
    $uploads_dir = wp_upload_dir();
    $is_writable = wp_is_writable($uploads_dir['basedir'].'/');

    array_push($result, array(
        'label'         => esc_attr__('Writable uploads directory', 'essentials'),
        'status'        => $is_writable,
        'help'          => 'https://pixfort.com'
    ));

    $memory_limit = ini_get('memory_limit');
    $memory_limit_byte = wp_convert_hr_to_bytes($memory_limit);
    $res_memory_limit = $memory_limit_byte >= 268435456;

    array_push($result, array(
        'label'         => esc_attr__('Memory limit (256MB)', 'essentials'),
        'status'        => $res_memory_limit,
        'help'          => 'https://essentials.pixfort.com/knowledge-base/setting-up-the-recommended-server-configuration/#pix_section_memory_limit'
    ));

    $upload_max_filesize_min = '64M';
    $upload_max_filesize = ini_get('upload_max_filesize');
    $upload_max_filesize_byte = wp_convert_hr_to_bytes($upload_max_filesize);
    $upload_max_filesize_status = $upload_max_filesize_byte >= 67108864;

    array_push($result, array(
        'label'         => esc_attr__('Upload max filesize (64MB)', 'essentials'),
        'status'        => $upload_max_filesize_status,
        'help'          => 'https://essentials.pixfort.com/knowledge-base/setting-up-the-recommended-server-configuration/#pix_section_upload_max_filesize'
    ));

    $post_max_size_min = '128M';
    $post_max_size = ini_get('post_max_size');
    $post_max_size_byte = wp_convert_hr_to_bytes($post_max_size);
    $post_max_size_status = ($post_max_size_byte >= 67108864);

    array_push($result, array(
        'label'         => esc_attr__('Post max size (64MB)', 'essentials'),
        'status'        => $post_max_size_status,
        'help'          => 'https://essentials.pixfort.com/knowledge-base/setting-up-the-recommended-server-configuration/#pix_section_post_max_size'
    ));

    $max_input_vars_min = 3000;
    $max_input_vars = ini_get('max_input_vars');
    $max_input_vars_status = $max_input_vars >= $max_input_vars_min;

    array_push($result, array(
        'label'         => esc_attr__('Max input vars (3000)', 'essentials'),
        'status'        => $max_input_vars_status,
        'help'          => 'https://essentials.pixfort.com/knowledge-base/setting-up-the-recommended-server-configuration/#pix_section_max_input_vars'
    ));

    $max_execution_time_min = 300;
    $max_execution_time = ini_get('max_execution_time');
    $max_execution_time_status = $max_execution_time >= $max_execution_time_min;

    array_push($result, array(
        'label'         => esc_attr__('Max execution time (300s)', 'essentials'),
        'status'        => $max_execution_time_status,
        'help'          => 'https://essentials.pixfort.com/knowledge-base/setting-up-the-recommended-server-configuration/#pix_section_max_execution_time'
    ));

    $xmlReady = false;
    if(class_exists('XMLReader')){
        $xmlReady = true;
    }elseif(function_exists('simplexml_load_file')){
        //simplexml available
        $xmlReady = true;
    }
    array_push($result, array(
        'label'         => esc_attr__('XML Reader', 'essentials'),
        'status'        => $xmlReady,
        // 'help'          => 'https://essentials.pixfort.com/knowledge-base/setting-up-the-recommended-server-configuration/#pix_section_max_execution_time'
    ));

    return $result;
}

/**
* One click demo import plugin configuration
*/
function ocdi_plugin_page_setup( $default_settings ) {
    $default_settings['parent_slug'] = 'themes.php';
    $default_settings['page_title']  = esc_html__( 'One Click Demo Import' , 'essentials' );
    $default_settings['menu_title']  = esc_html__( 'Import Demo Data' , 'essentials' );
    $default_settings['capability']  = 'import';
    $default_settings['menu_slug']   = 'pix-one-click-demo-import';

    return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'ocdi_plugin_page_setup' );
