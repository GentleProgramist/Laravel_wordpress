<?php
namespace Elementor;

class Pix_Eor_Photo_Stack extends Widget_Base {

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);

		wp_register_script( 'pix-photo-stack-handle', PIX_CORE_PLUGIN_URI.'functions/elementor/js/photo-stack.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );
	}

	public function get_name() {
		return 'pix-photo-stack';
	}

	public function get_title() {
		return 'Photo Stack';
	}

	public function get_icon() {
		return 'eicon-photo-library';
	}

	public function get_categories() {
		return [ 'pixfort' ];
	}

	protected function _register_controls() {


		$infinite_animation = array(
			"None"                  => "",
			"Rotating"              => "pix-rotating",
			"Rotating inversed"     => "pix-rotating-inverse",
			"Fade"                  => "pix-fade",
			"Bounce Small"          => "pix-bounce-sm",
			"Bounce Medium" 		=> "pix-bounce-md",
			"Bounce Large" 			=> "pix-bounce-lg",
			"Scale Small"           => "pix-scale-sm",
			"Scale Medium"           => "pix-scale-md",
			"Scale Large"           => "pix-scale-lg",

		);
		$animation_speeds = array(
			"Fast" 			=> "pix-duration-fast",
			"Medium" 		=> "pix-duration-md",
			"Slow" 			=> "pix-duration-slow",
		);

		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Content', 'elementor' ),
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'image', [
				'label' => __( 'Image', 'essentials-core' ),
				'dynamic'     => array(
					'active'  => true
				),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
		$repeater->add_control(
			'alt', [
				'dynamic'     => array(
					'active'  => true
				),
				'label' => __( 'Image alternative text', 'essentials-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '' , 'essentials-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'images',
			[
				'label' => __( 'Items', 'essentials-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls()
			]
		);

		$this->add_control(
			'pix_tilt',
			[
				'label' => __( '3D Hover', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'tilt',
			]
		);
		$this->add_control(
			'pix_tilt_size',
			[
				'label' => __( '3d hover size', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'tilt',
				'options' => [
					'tilt'			=> 'Default',
					'tilt_big'		=> 'Big',
					'tilt_small' 		=> 'Small',
				],
				'condition' => [
					'pix_tilt!' => '',
				],
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
			'pix_infinite_animation',
			[
				'label' => __( 'Infinite Animation type', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => array_flip( $infinite_animation ),
			]
		);
		$this->add_control(
			'pix_infinite_speed',
			[
				'label' => __( 'Infinite Animation Speed', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => array_flip( $animation_speeds ),
			]
		);










		$this->end_controls_section();


		pix_get_elementor_effects($this);

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		echo sc_pix_photo_stack($settings);
	}

	// protected function _content_template() {

	// }

	public function get_script_depends() {
		if(is_user_logged_in()) return [ 'pix-global', 'pix-photo-stack-handle' ];
		return [];
	}


}
