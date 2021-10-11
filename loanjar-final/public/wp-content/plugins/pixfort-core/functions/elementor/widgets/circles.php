<?php
namespace Elementor;

class Pix_Eor_Circles extends Widget_Base {

	public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);

      // wp_register_script( 'pix-circles-handle', PIX_CORE_PLUGIN_URI.'functions/elementor/js/circles.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );
   	}

	public function get_name() {
		return 'pix-circles';
	}

	public function get_title() {
		return 'Circles';
	}

	public function get_icon() {
		return 'eicon-circle';
	}

	public function get_categories() {
		return [ 'pixfort' ];
	}

	protected function _register_controls() {
		$colors = array(
		    "Default"			=> "",
		    "Transparent"			=> "transparent",
		    "Primary"				=> "primary",
		    "Primary Gradient"		=> "gradient-primary",
		    "Secondary"				=> "secondary",
		    "Primary Gradient"		=> "gradient-primary",
		    "White"					=> "white",
		    "Green"					=> "green",
		    "Blue"					=> "blue",
		    "Red"					=> "red",
		    "Yellow"				=> "yellow",
		    "Brown"					=> "brown",
		    "Purple"				=> "purple",
		    "Orange"				=> "orange",
		    "Cyan"					=> "cyan",
		    "Gray 1"				=> "gray-1",
		    "Gray 2"				=> "gray-2",
		    "Gray 3"				=> "gray-3",
		    "Gray 4"				=> "gray-4",
		    "Gray 5"				=> "gray-5",
		    "Gray 6"				=> "gray-6",
		    "Gray 7"				=> "gray-7",
		    "Gray 8"				=> "gray-8",
		    "Gray 9"				=> "gray-9",
		    "Dark opacity 1"		=> "dark-opacity-1",
		    "Dark opacity 2"		=> "dark-opacity-2",
		    "Dark opacity 3"		=> "dark-opacity-3",
		    "Dark opacity 4"		=> "dark-opacity-4",
		    "Dark opacity 5"		=> "dark-opacity-5",
		    "Dark opacity 6"		=> "dark-opacity-6",
		    "Dark opacity 7"		=> "dark-opacity-7",
		    "Dark opacity 8"		=> "dark-opacity-8",
		    "Dark opacity 9"		=> "dark-opacity-9",
		    "Light opacity 1"		=> "light-opacity-1",
		    "Light opacity 2"		=> "light-opacity-2",
		    "Light opacity 3"		=> "light-opacity-3",
		    "Light opacity 4"		=> "light-opacity-4",
		    "Light opacity 5"		=> "light-opacity-5",
		    "Light opacity 6"		=> "light-opacity-6",
		    "Light opacity 7"		=> "light-opacity-7",
		    "Light opacity 8"		=> "light-opacity-8",
		    "Light opacity 9"		=> "light-opacity-9",
		    "Custom"				=> "custom"
		);

		$popup_posts = get_posts([
		  'post_type' => 'pixpopup',
		  'post_status' => 'publish',
		  'numberposts' => -1
		]);

		$popups = array();
		$popups[''] = "Disabled";
		foreach ($popup_posts as $key => $value) {
			$popups[$value->ID] = $value->post_title;
		}

		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'General', 'essentials-core' ),
			]
		);


		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'img', [
				'label' => __( 'Image', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'dynamic'     => array(
					'active'  => true
				),
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
		$repeater->add_control(
			'title', [
				'label' => __( 'Title', 'essentials-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '' , 'essentials-core' ),
				'dynamic'     => array(
					'active'  => true
				),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'link', [
				'label' => __( 'Link', 'essentials-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '' , 'essentials-core' ),
			]
		);
		$repeater->add_control(
			'target', [
				'label' => __( 'Open in a new tab', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
		$repeater->add_control(
			'color', [
				'label' => __( 'Color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					''			=> 'Primary Gradient',
					'pix-bg-custom'		=> 'None',
			   ),
				'default' => '',
			]
		);
		$this->add_control(
			'circles',
			[
				'label' => __( 'Circles', 'essentials-core' ),
				'type' => Controls_Manager::REPEATER,
				'title_field' => '{{{ title }}}',
				'fields' => $repeater->get_controls()
			]
		);


		// effects_params
		$this->add_control(
			'effect',
			[
				'label' => __( 'Circles Effect', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					"" => "Default",
					"1"       => "Small shadow",
					"2"       => "Medium shadow",
					"3"       => "Large shadow",
					"4"       => "Inverse Small shadow",
					"5"       => "Inverse Medium shadow",
					"6"       => "Inverse Large shadow",
				),
				'default' => '',
			]
		);
		$this->add_control(
			'hover_effect',
			[
				'label' => __( 'Circles Hover Style', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					""       => "None",
					"1"       => "Small hover shadow",
					"2"       => "Medium hover shadow",
					"3"       => "Large hover shadow",
					"4"       => "Inverse Small hover shadow",
					"5"       => "Inverse Medium hover shadow",
					"6"       => "Inverse Large hover shadow",
				),
				'default' => '',
			]
		);

		$this->add_control(
			'circles_size',
			[
				'label' => __( 'Circles Size', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					"pix-sm-circles"       => "Small (Default)",
	                "pix-md-circles"       => "Medium",
	                "pix-lg-circles"       => "Large",
				),
				'default' => 'pix-sm-circles',
			]
		);
		$this->add_control(
			'circles_align',
			[
				'label' => __( 'Circles Align', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					"justify-content-start"       => "Left (Default)",
	                "justify-content-center"       => "Center",
	                "justify-content-end"       => "Right",
				),
				'default' => 'justify-content-start',
			]
		);

		$this->add_control(
			'animation',
			[
				'label' => __( 'Animation', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'fade-in-left',
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
				'default' => __( '1000', 'essentials-core' ),
				'placeholder' => __( '', 'essentials-core' ),
				'condition' => [
					'animation!' => '',
				],
			]
		);



		$this->end_controls_section();

		pix_get_elementor_btn($this);



	}

	protected function render() {
        $settings = $this->get_settings_for_display();
		echo sc_circles($settings);
	}



	public function get_script_depends() {
		if(is_user_logged_in()) return [ 'pix-global' ];
  		return [];
	  }


}
