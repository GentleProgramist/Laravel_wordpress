<?php
namespace Elementor;

class Pix_Eor_Search extends Widget_Base {

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);

		// wp_register_script( 'pix-search-handle', PIX_CORE_PLUGIN_URI.'functions/elementor/js/search.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );
	}

	public function get_name() {
		return 'pix-search';
	}

	public function get_title() {
		return 'Search';
	}

	public function get_icon() {
		return 'eicon-search';
	}

	public function get_categories() {
		return [ 'pixfort' ];
	}

	protected function _register_controls() {



		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'General', 'essentials-core' ),
			]
		);

		$this->add_control(
			'animation',
			[
				'label' => __( 'Animation', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => array_flip(array(
					"None" 				=> "",
					"Fade in" 			=> "fade-in",
					'fade-in-down'		=> 'fade-in-down',
					'fade-in-left'		=> 'fade-in-left',
					'fade-in-right'		=> 'fade-in-right',
					'fade-in-up'		=> 'fade-in-up',
					'fade-in-up-big'	=> 'fade-in-up-big',
					'fade-in-right-big'	=> 'fade-in-right-big',
					'fade-in-left-big'	=> 'fade-in-left-big',
					"Slide in up"		=> "slide-in-up",
					"Fade in & Scale"		=> "fade-in-Img",
				)),
			]
		);
		$this->add_control(
			'delay',
			[
				'label' => __( 'Animation delay (in miliseconds)', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '0', 'essentials-core' ),
				'placeholder' => __( '', 'essentials-core' ),
				'condition' => [
					'animation!' => '',
				],
			]
		);

		$this->add_control(
			'search_div',
			[
				'label' => __( 'Field inside a container', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' 		=> 'Disabled',
					'text-center' 		=> 'Center align',
					'text-left' 		=> 'Left align',
					'text-right' 		=> 'Right align',
				],
			]
		);


		$this->add_control(
			'max_width',
			[
				'label' => __( 'Field max width', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '', 'essentials-core' ),
				'placeholder' => __( 'Input the width with the unit (eg. 300px)', 'essentials-core' ),
			]
		);

		$this->end_controls_section();


	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		echo sc_pix_search($settings);
	}

	// protected function _content_template() {

	// }

	public function get_script_depends() {
		if(is_user_logged_in()) return [ 'pix-global' ];
		return [];
	}


}
