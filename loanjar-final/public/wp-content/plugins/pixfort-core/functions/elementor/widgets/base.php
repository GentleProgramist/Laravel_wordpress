<?php
namespace Elementor;

class Pix_Eor_Alert extends Widget_Base {

	public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);

      wp_register_script( 'pix-alert-handle', PIX_CORE_PLUGIN_URI.'functions/elementor/js/alert.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );
   	}

	public function get_name() {
		return 'pix-alert';
	}

	public function get_title() {
		return 'Alert';
	}

	public function get_icon() {
		return 'fa fa-exclamation-triangle';
	}

	public function get_categories() {
		return [ 'pixfort' ];
	}

	protected function _register_controls() {

		// $this->start_controls_section(
		// 	'section_title',
		// 	[
		// 		'label' => __( 'Content', 'elementor' ),
		// 	]
		// );
		//
		//
		//
		// $this->end_controls_section();
		//
		// $this->start_controls_section(
		// 	'style_section',
		// 	[
		// 		'label' => __( 'Style', 'pixfort-core' ),
		// 		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		// 	]
		// );


	}

	protected function render() {
        $settings = $this->get_settings_for_display();
		echo pf_alertblock($settings);
	}



	public function get_script_depends() {
		if(is_user_logged_in())  return [ 'pix-global', 'pix-alert-handle' ];
 		return [];
	  }


}
