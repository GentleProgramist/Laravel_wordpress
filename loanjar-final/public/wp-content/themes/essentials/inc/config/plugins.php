<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'PixFort_Plugins_Setup' ) ) {
	/**
	 * Envato_Theme_Setup_Wizard class
	 */
	class PixFort_Plugins_Setup {

        private static $instance = null;

        /**
		 * The class version number.
		 *
		 * @since 1.1.1
		 * @access private
		 *
		 * @var string
		 */
		protected $version = '1.0';

        /** @var string Current theme name, used as namespace in actions. */
		protected $theme_name = 'essentials';

        /**
		 * TGMPA instance storage
		 *
		 * @var object
		 */
		protected $tgmpa_instance;

		/**
		 * TGMPA Menu slug
		 *
		 * @var string
		 */
		protected $tgmpa_menu_slug = 'tgmpa-install-plugins';

		/**
		 * TGMPA Menu url
		 *
		 * @var string
		 */
		protected $tgmpa_url = 'themes.php?page=tgmpa-install-plugins';
        /**
		 * Relative plugin path
		 *
		 * @since 1.1.2
		 *
		 * @var string
		 */
		protected $plugin_path = '';

		/**
		 * Relative plugin url for this plugin folder, used when enquing scripts
		 *
		 * @since 1.1.2
		 *
		 * @var string
		 */
		protected $plugin_url = '';



        public static function get_instance() {
			if ( ! self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}

        public function __construct() {

            $this->init_globals();
            $this->init_actions();
		}


        public function init_globals() {

			//set relative plugin path url
			$this->plugin_path = trailingslashit( $this->cleanFilePath( dirname( __FILE__ ) ) );
			$relative_url      = str_replace( $this->cleanFilePath( get_template_directory() ), '', $this->plugin_path );
			$this->plugin_url  = trailingslashit( get_template_directory_uri() . $relative_url );
		}

        public function setup_wizard() {
            wp_enqueue_script( 'pixfort-plugins-setup', get_template_directory_uri() . '/inc/config/js/plugin-setup.js', array(
				'jquery'
			), $this->version );
            wp_localize_script( 'pixfort-plugins-setup', 'envato_setup_params', array(
				'tgm_plugin_nonce' => array(
					'update'  => wp_create_nonce( 'tgmpa-update' ),
					'install' => wp_create_nonce( 'tgmpa-install' ),
				),
				'tgm_bulk_url'     => admin_url( $this->tgmpa_url ),
				'ajaxurl'          => admin_url( 'admin-ajax.php' ),
				'wpnonce'          => wp_create_nonce( 'envato_setup_nonce' ),
				'verify_text'      => esc_attr__( '...verifying', 'essentials' ),
			) );
            ob_start();

        }

        public function init_actions() {
			if ( current_user_can( 'manage_options' ) ) {
				if ( class_exists( 'TGM_Plugin_Activation' ) && isset( $GLOBALS['tgmpa'] ) ) {
					add_action( 'init', array( $this, 'get_tgmpa_instanse' ), 30 );
					add_action( 'init', array( $this, 'set_tgmpa_url' ), 40 );
				}
				add_filter( 'tgmpa_load', array( $this, 'tgmpa_load' ), 10, 1 );
				add_action( 'wp_ajax_envato_setup_plugins', array( $this, 'ajax_plugins' ) );
			}
		}

        public function envato_setup_default_plugins() {
            tgmpa_load_bulk_installer();
			// install plugins with TGM.
			if ( ! class_exists( 'TGM_Plugin_Activation' ) || ! isset( $GLOBALS['tgmpa'] ) ) {
				die( 'Failed to find TGM' );
			}
			$url     = wp_nonce_url( add_query_arg( array( 'plugins' => 'go' ) ), 'envato-setup' );
			$plugins = $this->_get_plugins();

            $method = ''; // Leave blank so WP_Filesystem can populate it as necessary.
			$fields = array_keys( $_POST ); // Extra fields to pass to WP_Filesystem.

			if ( false === ( $creds = request_filesystem_credentials( esc_url_raw( $url ), $method, false, false, $fields ) ) ) {
				return true; // Stop the normal page form from displaying, credential request form will be shown.
			}

			// Now we have some credentials, setup WP_Filesystem.
			if ( ! WP_Filesystem( $creds ) ) {
				// Our credentials were no good, ask the user for them again.
				request_filesystem_credentials( esc_url_raw( $url ), $method, true, false, $fields );

				return true;
			}

            /* If we arrive here, we have the filesystem */
            $this->setup_wizard();
            wp_print_scripts( 'pixfort-plugins-setup' );
			?>

			<form method="post">

				<?php
				$plugins = $this->_get_plugins();
				$req_count = 0;
				$builders = array('js_composer', 'elementor');
				$builders_count = 0;
				foreach ( $plugins['all'] as $slug => $plugin ) {
					// if($plugin['required']){
					if(!empty($plugin['pix_dashboard']) && $plugin['pix_dashboard']){
						$req_count++;
					}
					if(in_array($slug, $builders)){
						$builders_count++;
					}
				}
				if ( $req_count>0 ) {
					?>
					<p class="box-text"><?php esc_html_e( 'Your website needs a few essential plugins. The following selected plugins will be installed or updated:', 'essentials' ); ?></p>
					<ul class="envato-wizard-plugins">

						<?php

						// Builders
						$have_active_builder = false;
						if($builders_count){
							if($builders_count==2){
								?><li class="pix-plugin-install-title-sm">Builder (Choose one)</li><?php
							}elseif($builders_count==1){
								$have_active_builder = true;
								?><li  class="pix-plugin-install-title-sm">Builder (You already have another active builder)</li><?php
							}


						foreach ( $plugins['all'] as $slug => $plugin ) {
							if(in_array($slug, $builders)){
							if(!empty($plugin['pix_dashboard']) && $plugin['pix_dashboard']){
							?>
							<li class="pix-plugin-item" data-slug="<?php echo esc_attr( $slug ); ?>">
								<?php
								$is_recommended = '';
								if(!empty($plugin['pix_recommended'])){
									if($plugin['pix_recommended']){
										$is_recommended = 'checked';
									}
								}
								if($have_active_builder){
									$is_recommended = '';
								}
								 ?>
								<input class="pix-plugin-check" type="checkbox" id="check_<?php echo esc_attr($slug); ?>" name="check_<?php echo esc_attr($slug); ?>" <?php echo esc_attr($is_recommended); ?> value="check_<?php echo esc_attr($slug); ?>">
								<label for="check_<?php echo esc_attr($slug); ?>" class="plugin-name"><?php echo esc_html( $plugin['name'] ); ?></label>
								<span class="plugin-install-status">
									<?php

								    $keys = array();
								    if ( isset( $plugins['install'][ $slug ] ) ) {
									    $keys[] = 'Not Installed';
								    }
								    if ( isset( $plugins['update'][ $slug ] ) ) {
									    $keys[] = 'Needs Update';
								    }
								    if ( isset( $plugins['activate'][ $slug ] ) ) {
									    $keys[] = 'Not Active';
								    }
								    // echo implode( ' and ', $keys ) . ' required';
								    echo implode( '', $keys );
								    ?>
    							</span>
								<div class="spinner"></div>
							</li>
						<?php
							}
							}
						}
						}


						?>
						<li  class="pix-plugin-install-title-sm">Other Plugins</li>
						<?php

						foreach ( $plugins['all'] as $slug => $plugin ) {
							// if($plugin['required']){
							if(!in_array($slug, $builders)){
							if(!empty($plugin['pix_dashboard']) && $plugin['pix_dashboard']){
							?>
							<li class="pix-plugin-item" data-slug="<?php echo esc_attr( $slug ); ?>">
								<?php
								$is_recommended = '';
								if(!empty($plugin['pix_recommended'])){
									if($plugin['pix_recommended']){
										$is_recommended = 'checked';
									}
								}
								 ?>
								<input class="pix-plugin-check" type="checkbox" id="check_<?php echo esc_attr($slug); ?>" name="check_<?php echo esc_attr($slug); ?>" <?php echo esc_attr($is_recommended); ?> value="check_<?php echo esc_attr($slug); ?>">
								<label for="check_<?php echo esc_attr($slug); ?>" class="plugin-name"><?php echo esc_html( $plugin['name'] ); ?></label>
								<span class="plugin-install-status">
    								<?php

								    $keys = array();
								    if ( isset( $plugins['install'][ $slug ] ) ) {
									    $keys[] = 'Not Installed';
								    }
								    if ( isset( $plugins['update'][ $slug ] ) ) {
									    $keys[] = 'Needs Update';
								    }
								    if ( isset( $plugins['activate'][ $slug ] ) ) {
									    $keys[] = 'Not Active';
								    }
								    // echo implode( ' and ', $keys ) . ' required';
								    echo implode( '', $keys );
								    ?>
    							</span>
								<div class="spinner"></div>
							</li>
						<?php
							}
							}
						}
						?>
					</ul>
                    <p class="box-text"><?php esc_html_e( 'You can add and remove plugins later on from within WordPress.', 'essentials' ); ?></p>
					<br />
                    <a class="pixfort-install-plugins pix-btn btn-primary" href="#">Install plugins</a>
                    <a class="pixfort-skip pixfort-install-plugins-skip pix-btn btn-link" href="#pix-verification">Skip this step</a>
					<?php
				} else {
					?>
					<p class="box-text text-center">
						<strong><?php echo esc_html_e( 'Good news!', 'essentials' ); ?></strong><br />
						<?php echo esc_html_e( 'All required plugins are already installed and up to date.', 'essentials' ); ?>
					</p>
					<a class="pixfort-skip pix-btn btn-link" href="#pix-verification">Next step</a>
					<?php
				} ?>



			</form>
			<?php

        }
        public function tgmpa_load( $status ) {
			return is_admin() || current_user_can( 'install_themes' );
		}

        /**
		 * Get configured TGMPA instance
		 *
		 * @access public
		 * @since 1.1.2
		 */
		public function get_tgmpa_instanse() {
			$this->tgmpa_instance = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );
		}

        /**
		 * Update $tgmpa_menu_slug and $tgmpa_parent_slug from TGMPA instance
		 *
		 * @access public
		 * @since 1.1.2
		 */
		public function set_tgmpa_url() {

			$this->tgmpa_menu_slug = ( property_exists( $this->tgmpa_instance, 'menu' ) ) ? $this->tgmpa_instance->menu : $this->tgmpa_menu_slug;
			$this->tgmpa_menu_slug = apply_filters( $this->theme_name . '_theme_setup_wizard_tgmpa_menu_slug', $this->tgmpa_menu_slug );

			$tgmpa_parent_slug = ( property_exists( $this->tgmpa_instance, 'parent_slug' ) && $this->tgmpa_instance->parent_slug !== 'themes.php' ) ? 'admin.php' : 'themes.php';

			$this->tgmpa_url = apply_filters( $this->theme_name . '_theme_setup_wizard_tgmpa_url', $tgmpa_parent_slug . '?page=' . $this->tgmpa_menu_slug );

		}

		private function pix_check_plugin_is_active($slug){
			switch ($slug) {
				case 'pixfort-core':
					if(function_exists('essentials_core_plugin')) return true;
					break;
				case 'one-click-demo-import-plugin':
					if(class_exists('OCDI_Plugin')) return true;
					break;
				case 'js_composer':
					if( function_exists('vc_set_as_theme') ) return true;
					break;
				case 'revslider':
					if(class_exists('RevSliderFront')) return true;
					break;
				case 'masterslider':
					if(function_exists('masterslider')) return true;
					break;
				case 'pixfort-likes':
					if(class_exists('PixFortLikes')) return true;
					break;
				case 'envato-market':
					if(function_exists('envato_market')) return true;
					break;
				case 'elementor':
					if(class_exists( '\Elementor\Plugin' )) return true;
					break;
				case 'contact-form-7':
					if(function_exists( 'wpcf7_plugin_path' )) return true;
					break;
			}
			return false;
		}

        private function _get_plugins() {
			$instance = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );
			$plugins  = array(
				'all'      => array(), // Meaning: all plugins which still have open actions.
				'install'  => array(),
				'update'   => array(),
				'activate' => array(),
			);

			foreach ( $instance->plugins as $slug => $plugin ) {
				if ( $this->pix_check_plugin_is_active( $slug ) && false === $instance->does_plugin_have_update( $slug ) ) {
					// No need to display plugins if they are installed, up-to-date and active.
					continue;
				} else {
					$plugins['all'][ $slug ] = $plugin;

					if ( ! $instance->is_plugin_installed( $slug ) ) {
						$plugins['install'][ $slug ] = $plugin;
					} else {
						if ( false !== $instance->does_plugin_have_update( $slug ) ) {
							$plugins['update'][ $slug ] = $plugin;
						}

						if ( $instance->can_plugin_activate( $slug ) ) {
							$plugins['activate'][ $slug ] = $plugin;
						}
					}
				}
			}


			return $plugins;
		}

        public function ajax_plugins() {
			if ( ! check_ajax_referer( 'envato_setup_nonce', 'wpnonce' ) || empty( $_POST['slug'] ) ) {
				wp_send_json_error( array( 'error' => 1, 'message' => esc_attr__( 'No Slug Found', 'essentials' ) ) );
			}
			$json = array();
			// send back some json we use to hit up TGM
			$plugins = $this->_get_plugins();
			// what are we doing with this plugin?
			foreach ( $plugins['activate'] as $slug => $plugin ) {
				if ( $_POST['slug'] == $slug ) {
					$json = array(
						'url'           => admin_url( $this->tgmpa_url ),
						'plugin'        => array( $slug ),
						'tgmpa-page'    => $this->tgmpa_menu_slug,
						'plugin_status' => 'all',
						'_wpnonce'      => wp_create_nonce( 'bulk-plugins' ),
						'action'        => 'tgmpa-bulk-activate',
						'action2'       => - 1,
						'message'       => esc_attr__( 'Activating Plugin', 'essentials' ),
					);
					break;
				}
			}
			foreach ( $plugins['update'] as $slug => $plugin ) {
				if ( $_POST['slug'] == $slug ) {
					$json = array(
						'url'           => admin_url( $this->tgmpa_url ),
						'plugin'        => array( $slug ),
						'tgmpa-page'    => $this->tgmpa_menu_slug,
						'plugin_status' => 'all',
						'_wpnonce'      => wp_create_nonce( 'bulk-plugins' ),
						'action'        => 'tgmpa-bulk-update',
						'action2'       => - 1,
						'message'       => esc_attr__( 'Updating Plugin', 'essentials' ),
					);
					break;
				}
			}
			foreach ( $plugins['install'] as $slug => $plugin ) {
				if ( $_POST['slug'] == $slug ) {
					$json = array(
						'url'           => admin_url( $this->tgmpa_url ),
						'plugin'        => array( $slug ),
						'tgmpa-page'    => $this->tgmpa_menu_slug,
						'plugin_status' => 'all',
						'_wpnonce'      => wp_create_nonce( 'bulk-plugins' ),
						'action'        => 'tgmpa-bulk-install',
						'action2'       => - 1,
						'message'       => esc_attr__( 'Installing Plugin', 'essentials' ),
					);
					break;
				}
			}

			if ( $json ) {
				$json['hash'] = md5( serialize( $json ) ); // used for checking if duplicates happen, move to next plugin
				wp_send_json( $json );
			} else {
				wp_send_json( array( 'done' => 1, 'message' => esc_attr__( 'Success', 'essentials' ) ) );
			}
			exit;

		}




        public static function cleanFilePath( $path ) {
			$path = str_replace( '', '', str_replace( array( '\\', '\\\\', '//' ), '/', $path ) );
			if ( $path[ strlen( $path ) - 1 ] === '/' ) {
				$path = rtrim( $path, '/' );
			}

			return $path;
		}
    }
}

add_action( 'after_setup_theme', 'pixfort_plugins_setup_wizard', 10 );
if ( ! function_exists( 'pixfort_plugins_setup_wizard' ) ) :
	function pixfort_plugins_setup_wizard() {
		PixFort_Plugins_Setup::get_instance();
	}
endif;


 ?>
