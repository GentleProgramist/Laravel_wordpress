<?php
namespace Elementor;

class Pix_Eor_Menu extends Widget_Base {

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);

		// wp_register_script( 'pix-alert-handle', PIX_CORE_PLUGIN_URI.'functions/elementor/js/alert.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );
	}

	public function get_name() {
		return 'pix-menu';
	}

	public function get_title() {
		return 'Menu';
	}

	public function get_icon() {
		return 'fa fa-paragraph';
	}

	public function get_categories() {
		return [ 'pixfort' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Content', 'elementor' ),
			]
		);
		$menus = wp_get_nav_menus();
		// var_dump($menus);
        $menusList = array();
        foreach ($menus as $key => $value) {
            $menusList[$value->slug] = $value->name;
        }

		$this->add_control(
			'menu',
			[
				'label' => __( 'Style', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => $menusList,
			]
		);
		$this->end_controls_section();
		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		echo sc_pix_menu($settings);
	}

	// protected function _content_template() {

	// }

	public function get_script_depends() {
		if(is_user_logged_in()) return [ 'pix-global' ];
		return [];
	}


}
