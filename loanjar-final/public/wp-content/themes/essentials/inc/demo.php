<?php

if(defined( 'PIXFORT_DEMO_VERSION' )){
	add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );
}else{
	add_action( 'admin_notices', 'pixfort_demo_plugin_update_notice' );
}

function pixfort_demo_plugin_update_notice() {
    ?>
    <div class="notice pixfort-admin-notice is-big pix-important notice-danger is-dismissible">
        <h2 class="notice-title"><?php echo esc_attr__( 'Please update "One Click Demo Import" plugin to the latest version.', 'essentials' ); ?></h2>
        <div class="notice-text"><?php echo esc_attr__( 'In order to use the demo importer you need to update "One Click Demo Import" plugin from WordPress admin panel > Essentials dashboard > Install plugins.', 'essentials' ); ?></div>
        <a href="<?php echo esc_url( admin_url('?page=pixfort-dashboard') ); ?>" class="button button-primary">Go to Essentials Dashboard</a>
        <br />
    </div>
    <?php
}

function ocdi_import_files() {


	if(class_exists('PixfortHub')){
		$status = PixfortHub::checkValidation();
		if($status){
			require_once( 'demo-content/popups.php' );
			require_once( 'demo-content/demos.php' );
			require_once( 'demo-content/misc.php' );
			require_once( 'demo-content/forms.php' );
			require_once( 'demo-content/headers.php' );

			$data = array();

			$data = array_merge( $data, pixfort_demo_sites() );
			$data = array_merge( $data, pixfort_demo_headers() );
			$data = array_merge( $data, pixfort_demo_elementor_popups() );
			$data = array_merge( $data, pixfort_demo_misc() );
			$data = array_merge( $data, pixfort_demo_forms() );
			return $data;
		}
	}
	return [];
}


add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

function pixfort_demo_args($getArgs){
	$key = get_option('envato_purchase_code_27889640');
	if(!$key){
		return $getArgs;
	}
	return array(
		'timeout' => apply_filters( 'pt-ocdi/timeout_for_downloading_import_file', 20 ),
		'headers' => array(
			'pix_domain' => site_url(),
			'purchase_key' => $key
		)
	);
}
add_filter( 'pixfort_one_click_demo_args', 'pixfort_demo_args', 1);



function pix_company_elementor_container_width() {
	// Elementor
	if( class_exists( '\Elementor\Plugin' ) ) {
		// $kit1 = \Elementor\Plugin::$instance->kits_manager->get_current_settings( 'container_width' );
		$kit = \Elementor\Plugin::$instance->kits_manager->get_active_kit_for_frontend( );
		$kit->update_settings( [
		'container_width' => array(
		'size' => 1240,
		),
		] );
		\Elementor\Plugin::$instance->files_manager->clear_cache();
	}
}

function pixfort_after_import( $selected_import, $import_files, $selected_index ) {
	if( !empty($selected_import['content']) && $selected_import['content']!=''){
		$import = $import_files[$selected_index];
		if ( !empty($import['import_file_name']) ) {
			$name = $import['import_file_name'];
			$front_page_id = false;
			if($name==='Knowledge base'){
				$front_page_id = get_page_by_title( 'homepage' );
			}
			if($name==='Services WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Services' );
			}
			if($name==='Services Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Services Elementor' );
			}

			if($name==='Software WPBakery'){
				$front_page_id = get_page_by_title( 'Software Homepage' );
			}
			if($name==='Software Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Software Elementor' );
			}

			if($name==='SaaS WPBakery'){
				$front_page_id = get_page_by_title( 'SaaS Homepage' );
			}
			if($name==='SaaS Elementor'){
				$front_page_id = get_page_by_title( 'Homepage SaaS Elementor' );
			}

			if($name==='Startup WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Startup' );
			}
			if($name==='Startup Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Startup Elementor' );
			}

			if($name==='Marketing WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Marketing' );
			}
			if($name==='Marketing Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Marketing Elementor' );
			}

			if($name==='Knowledge Base WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Knowledge Base' );
			}
			if($name==='Knowledge Base Elementor'){
				$front_page_id = get_page_by_title( 'Homepage knowledge base Elementor' );
			}

			if($name==='Event WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Event' );
			}
			if($name==='Event Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Event Elementor' );
			}

			if($name==='Slides WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Event' );
			}
			if($name==='Slides Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Slides Elementor' );
			}

			if($name==='Medical WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Medical' );
			}
			if($name==='Medical Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Medical Elementor' );
			}

			if($name==='Cryptocurrency WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Cryptocurrency' );
			}
			if($name==='Cryptocurrency Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Cryptocurrency Elementor' );
			}

			if($name==='Bold WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Bold' );
			}
			if($name==='Bold Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Bold Elementor' );
			}

			if($name==='Creative WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Creative' );
			}
			if($name==='Creative Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Creative Elementor' );
			}

			if($name==='Ebook WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Ebook' );
			}
			if($name==='Ebook Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Ebook Elementor' );
			}

			if($name==='Landing WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Landing' );
			}
			if($name==='Landing Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Landing Elementor' );
			}

			if($name==='Restaurant WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Restaurant' );
			}
			if($name==='Restaurant Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Restaurant Elementor' );
			}

			if($name==='Ecommerce WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Ecommerce' );
			}
			if($name==='Ecommerce Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Ecommerce Elementor' );
			}

			if($name==='Foundation WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Foundation' );
			}
			if($name==='Foundation Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Foundation Elementor' );
			}

			if($name==='Construction WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Construction' );
			}
			if($name==='Construction Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Construction Elementor' );
			}

			if($name==='Business WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Business' );
			}
			if($name==='Business Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Business Elementor' );
			}

			if($name==='Corporate WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Corporate' );
			}
			if($name==='Corporate Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Corporate Elementor' );
			}

			if($name==='Product WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Product' );
			}
			if($name==='Product Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Product Elementor' );
			}

			if($name==='Coronavirus WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Coronavirus' );
			}
			if($name==='Coronavirus Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Coronavirus Elementor' );
			}

			if($name==='Personal WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Personal' );
			}
			if($name==='Personal Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Personal Elementor' );
			}

			if($name==='Influencer WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Influencer' );
			}
			if($name==='Influencer Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Influencer Elementor' );
			}

			if($name==='Photography WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Photography' );
			}
			if($name==='Photography Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Photography Elementor' );
			}

			if($name==='App WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage App' );
			}
			if($name==='App Elementor'){
				$front_page_id = get_page_by_title( 'Homepage App Elementor' );
			}

			if($name==='Agency WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Agency' );
			}
			if($name==='Agency Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Agency Elementor' );
			}

			if($name==='Beauty WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Beauty' );
			}
			if($name==='Beauty Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Beauty Elementor' );
			}

			if($name==='Blogger WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Blogger' );
			}
			if($name==='Blogger Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Blogger Elementor' );
			}

			if($name==='Original WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Original' );
			}
			if($name==='Original Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Original Elementor' );
			}
			if($name==='Fast WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage' );
			}
			if($name==='Onepage WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Onepage' );
			}
			if($name==='Finance WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage Finance' );
			}
			if($name==='Fast Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Fast elementor' );
			}
			if($name==='Onepage Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Onepage elementor' );
			}
			if($name==='Finance Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Finance elementor' );
			}
			if($name==='SEO WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage SEO' );
			}
			if($name==='SEO Elementor'){
				$front_page_id = get_page_by_title( 'Homepage SEO elementor' );
			}
			if($name==='Company WPBakery'){
				$front_page_id = get_page_by_title( 'Company Homepage WPBakery' );
			}
			if($name==='Company Elementor'){
				$front_page_id = get_page_by_title( 'Company Homepage Elementor' );
				if( class_exists( '\Elementor\Plugin' ) ) {
					$kit = \Elementor\Plugin::$instance->kits_manager->get_active_kit_for_frontend( );
					$kit->update_settings( [
					'container_width' => array(
					'size' => 1240,
					),
					] );
					\Elementor\Plugin::$instance->files_manager->clear_cache();
				}
				// add_action ('wp_loaded', 'pix_company_elementor_container_width');
			}
			if($name==='Gallery WPBakery'){
				$front_page_id = get_page_by_title( 'Gallery Homepage WPBakery' );
			}
			if($name==='Gallery Elementor'){
				$front_page_id = get_page_by_title( 'Gallery Homepage Elementor' );
			}
			if($name==='Modern WPBakery'){
				$front_page_id = get_page_by_title( 'Homepage-wpbakery' );
			}
			if($name==='Modern Elementor'){
				$front_page_id = get_page_by_title( 'Homepage Modern Elementor' );
			}

			if($front_page_id){
				update_option( 'show_on_front', 'page' );
				update_option( 'page_on_front', $front_page_id->ID );
			}
		}
	}
	if(function_exists('pix_update_style_url')){
        pix_update_style_url();
    }
}
add_action( 'pt-ocdi/after_all_import_execution', 'pixfort_after_import', 10 ,3 );

 ?>
