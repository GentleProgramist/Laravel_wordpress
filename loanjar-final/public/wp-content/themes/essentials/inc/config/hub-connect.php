<?php

Class PixfortHub  {
    public $hub_url;
    public static $item_name = 'essentials';
    public static $item_id = '27889640';

	public function __construct() {

		$this->hub_url = 'https://hub.pixfort.com/';

        add_action('wp_ajax_pix_theme_verify', array($this, 'pix_theme_verify'));
        add_action('wp_ajax_nopriv_pix_theme_verify', array($this, 'pix_theme_verify'));

        add_action('wp_ajax_pix_deactivate_theme', array($this, 'pix_deactivate_theme'));
        add_action('wp_ajax_nopriv_pix_deactivate_theme', array($this, 'pix_deactivate_theme'));

        add_action('wp_ajax_pix_finish_dashboard', array($this, 'pix_finish_dashboard'));
        add_action('wp_ajax_nopriv_pix_finish_dashboard', array($this, 'pix_finish_dashboard'));

        add_action('rest_api_init', function () {
          register_rest_route( 'pixfort', 'verification',array(
                    'methods'  => 'POST',
                    'callback' => 'pix_theme_verify',
                    'permission_callback' => '__return_true',
          ));
          register_rest_route( 'pixfort', 'verification',array(
                        'methods'  => 'GET',
                        'callback' => 'pix_theme_verify',
                        'permission_callback' => '__return_true',
          ));
        });

	}

    public function getHubUrl(){
        return $this->hub_url;
    }
    public function getVerifyUrl(){
        return $this->hub_url . 'theme-verification/start';
    }
    public function getFinalVerifyUrl(){
        return $this->hub_url . 'theme-verification/verify';
    }
    public function getDeactuvateUrl(){
        return $this->hub_url . 'theme-verification/deactivate';
    }
    public static function getverifyAction(){
        return esc_url(home_url('wp-json/pixfort/theme-verification'));
        return esc_url_raw( rest_url('pixfort/theme-verification') );
    }

    public function disableActivation(){
        $opt_key = 'envato_purchase_code_' . self::$item_id;
        update_option($opt_key, '');
        update_option('pixfort_key', '');
    }

    public static function getCsrfToken(){
        return false;
    }

    public function getVerifyNonce(){
        return wp_create_nonce('wp_rest');
    }



    public function theme_activate($envato_key, $pixfort_key){
        $opt_key = 'envato_purchase_code_' . self::$item_id;
        update_option($opt_key, $envato_key);
        update_option('pixfort_key', $pixfort_key);
    }

    function pix_theme_verify($key){
        $result = array();
        $res['result'] = false;
        $res['message'] = '';
        if( !$this->checkValidation() ){
            $url = $this->getFinalVerifyUrl();
            $url .= '?pixfort_key='. $key;
            $url .= '&domain='. site_url();
            $validation = wp_remote_get($url);
            if ( is_wp_error( $validation ) ) {
               echo '<div class="notice pixfort-notice notice-error is-dismissible">
                     <p><strong>Error:</strong>The server is unable to connect with the external websites.</p>
                     <p>We recommend to contact your hosting provider to check and solve the connection issue:
                        <ul>
                        <li>Ask your host if there is some limitation with wp-cron, or if loopback is disabled.</li>
                        <li>Ask your host if there a firewall or security modules (e.g. mod_security ) that could block the outgoing cURL requests.</li>
                        </ul>
                    </p>
                    </div>';
            } else {
                if(!empty($validation['body'])){
                    $res = $validation['body'];
                    $data = json_decode($res, true);
                    if(!empty($data['purchase_key']) && strlen($data['purchase_key'])>2 ){
                        $this->theme_activate($data['purchase_key'], $key);
                        $result['result'] = true;
                    }
                    if(!empty($data['message']) ){
                        $result['message'] = $data['message'];
                    }
                }
            }
        }
        return $result;

   }

   public static function checkValidation(){
       $opt_key = 'envato_purchase_code_' . self::$item_id;
       $code = get_option($opt_key);
       if($code){
           return true;
       }
       return false;

   }

   function pix_finish_dashboard(){
       $dashboard_options = get_option('pixfort_dashboard_options');
       if($dashboard_options){
           $dashboard_options['is-start'] = false;
       }else{
           $dashboard_options = array(
               'is-start' => false,
               'step'     => 1
           );
       }
       update_option('pixfort_dashboard_options', $dashboard_options);
       return true;
   }

   function pix_deactivate_theme(){

        if( $this->checkValidation() ){
            $opt_key = 'envato_purchase_code_' . self::$item_id;
            $code = get_option($opt_key);
            $pixfortKey = get_option('pixfort_key');
            $domain = site_url();

            $url = $this->getDeactuvateUrl();
            $url .= '?purchase_key='. $code;
            $url .= '&pixfort_key='. $pixfortKey;
            $url .= '&domain='. site_url();
            $deactivation = wp_remote_get($url);
            if(!empty($deactivation['body'])){
                $res = $deactivation['body'];
                $data = json_decode($res, true);
                if( !empty($data['result']) && $data['result'] ){
                    update_option($opt_key, '');
                    update_option('pixfort_key', '');
                    $result = array(
                        'result'    => true,
                        'message'    => 'The theme has been deactivated successfully!'
                    );
                    echo json_encode($result);
                    wp_die();
                }
            }
            $result = array(
                'result'    => false,
                'code'    => $code,
                'pixfortKey'    => $pixfortKey,
                'site_url'    => site_url(),
                'message'    => 'Error, couldn\'t deactivate the theme!'
            );
            echo json_encode($result);
            wp_die();
        }
        $result = array(
            'result'    => false,
            'message'    => 'Error, couldn\'t deactivate the theme!'
        );
        echo json_encode($result);
        wp_die();
   }
}

$pixfortHub = new PixfortHub();



 ?>
