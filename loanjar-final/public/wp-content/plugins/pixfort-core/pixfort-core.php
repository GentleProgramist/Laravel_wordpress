<?php
   /*
   Plugin Name: pixfort Core
   Plugin URI: https://themeforest.net/user/PixFort
   description: pixfort Theme Core Plugin.
   Version: 2.0.6
   Author: pixfort
   Author URI: https://pixfort.com
   License: Envato Marketplaces Split License
   Text Domain: pixfort-core
   Domain Path: /languages
   */

   // don't load directly
    if ( ! defined( 'ABSPATH' ) ) {
    	die( '-1' );
    }
   define( 'PIXFORT_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
   define( 'PIXFORT_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
   define( 'PIXFORT_PLUGIN_VERSION', '2.0.6' );

   require PIXFORT_PLUGIN_DIR . 'admin-init.php';
?>
