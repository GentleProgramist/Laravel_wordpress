<?php
namespace Elementor;

class Pix_Eor_Fancy_Mockup extends Widget_Base {

	public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);

      wp_register_script( 'pix-fancy-mockup-handle', PIX_CORE_PLUGIN_URI.'functions/elementor/js/fancy-mockup.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );
   	}

	public function get_name() {
		return 'pix-fancy-mockup';
	}

	public function get_title() {
		return 'Fancy Mockup';
	}

	public function get_icon() {
		return 'eicon-device-tablet';
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


		$this->add_control(
			'image',
			[
				'label' => __( 'Image', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'dynamic'     => array(
                    'active'  => true
                ),
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
		$this->add_control(
			'rounded_img',
			[
				'label' => __( 'Rounded corners', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'rounded-0',
				'options' => [
					'rounded-0' => __( 'No', 'essentials-core' ),
					'rounded' => __( 'Rounded', 'essentials-core' ),
					'rounded-lg' => __( 'Rounded Large', 'essentials-core' ),
					'rounded-xl' => __( 'Rounded 5px', 'essentials-core' ),
					'rounded-10' => __( 'Rounded 10px', 'essentials-core' ),
				],
			]
		);
		$this->add_control(
			'alt',
			[
				'label' => __( 'Image alternative text', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'dynamic'     => array(
                    'active'  => true
                ),
				'placeholder' => __( 'Image alternative text', 'elementor' ),
			]
		);
		$this->add_control(
			'align',
			[
				'label' => __( 'Image alignment', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'text-left',
				'options' => [
					'text-left'			=> 'Left',
					'text-center'		=> 'Center',
					'text-right' 		=> 'Right',
				],
			]
		);
		$this->add_control(
			'width',
			[
				'label' => __( 'Width (Optional)', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'input the value (with the unit: %, px,.. etc).', 'elementor' ),
			]
		);
		$this->add_control(
			'height',
			[
				'label' => __( 'Height (Optional)', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'input the value (with the unit: %, px,.. etc).', 'elementor' ),
			]
		);
		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( '', 'elementor' ),
			]
		);
		$this->add_control(
			'target',
			[
				'label' => __( 'Open in a new tab', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'Yes',
				'condition' => [
					'link!' => '',
				],
			]
		);
		$this->add_control(
			'pix_scroll_parallax',
			[
				'label' => __( 'Scroll Parallax', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'scroll_parallax',
			]
		);
		$this->add_control(
			'xaxis',
			[
				'label' => __( 'X axis', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( '', 'elementor' ),
				'default'	=> '0'
			]
		);
		$this->add_control(
			'yaxis',
			[
				'label' => __( 'Y axis', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( '', 'elementor' ),
				'default'	=> '0'
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
					'pix_tilt!' => [],
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
				'options' => $infinite_animation,
			]
		);
		$this->add_control(
			'pix_infinite_speed',
			[
				'label' => __( 'Infinite Animation Speed', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => $animation_speeds,
			]
		);
	$this->end_controls_section();
		pix_get_elementor_effects($this);






	}

	protected function render() {
        $settings = $this->get_settings_for_display();
		echo sc_pix_fancy_mockup($settings);
	}



	public function get_script_depends() {
		if(is_user_logged_in()) return [ 'pix-global', 'pix-fancy-mockup-handle' ];
		return [];
	  }


}
