<?php
namespace Elementor;

class Pix_Eor_3d_Box extends Widget_Base {

	public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);

      wp_register_script( 'pix-3d-box-handle', PIX_CORE_PLUGIN_URI.'functions/elementor/js/3d-box.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );
   	}

	public function get_name() {
		return 'pix-3d-box';
	}

	public function get_title() {
		return '3d Box';
	}

	public function get_icon() {
		return 'eicon-lightbox';
	}

	public function get_categories() {
		return [ 'pixfort' ];
	}

	protected function _register_controls() {



		$colors = array(
			"Body default"			=> "body-default",
			"Heading default"		=> "heading-default",
			"Primary"				=> "primary",
			"Primary Gradient"		=> "gradient-primary",
			"Secondary"				=> "secondary",
			"White"					=> "white",
			"Black"					=> "black",
			"Green"					=> "green",
			"Blue"					=> "blue",
			"Red"					=> "red",
			"Yellow"				=> "yellow",
			"Brown"					=> "brown",
			"Purple"				=> "purple",
			"Orange"				=> "orange",
			"Cyan"					=> "cyan",
			// "Transparent"					=> "transparent",
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


		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Content', 'elementor' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'elementor' ),
				'default' => '3d Box Title',
			]
		);
		$this->add_control(
			'text',
			[
				'label' => __( 'Text', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your text', 'elementor' ),
			]
		);

		$this->add_control(
			'bg_img',
			[
				'label' => __( 'Choose Image', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);


		$this->add_control(
			'content_align',
			[
				'label' => __( 'Content align', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
	                'left'	=> 'Left',
	                'center'	=> 'Center',
	                'right'	=> 'Right',
	            ),
				'default' => 'left',
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
			'overlay_color',
			[
				'label' => __( 'Hover overlay color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors),
				'default' => 'black',
			]
		);
		$this->add_control(
			'overlay_custom_color',
			[
				'label' => __( 'content_custom_color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'overlay_color' => 'custom',
				],
			]
		);
		$this->add_control(
			'overlay_opacity',
			[
				'label' => __( 'Overlay opacity', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'pix-opacity-10'   => "0%",
 				   'pix-opacity-9'   => "10%",
 				   'pix-opacity-8'   => "20%",
 				   'pix-opacity-7'   => "30%",
 				   'pix-opacity-6'   => "40%",
 				   'pix-opacity-5'   => "50%",
 				   'pix-opacity-4'   => "60%",
 				   'pix-opacity-3'   => "70%",
 				   'pix-opacity-2'   => "80%",
 				   'pix-opacity-1'   => "90%",
	           ),
				'default' => 'pix-opacity-3',
			]
		);
		$this->add_control(
			'hover_overlay_opacity',
			[
				'label' => __( 'Hover overlay opacity', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					"pix-hover-opacity-0" 			=> "100%",
	  	              "pix-hover-opacity-2" 			=> "80%",
	  	              "pix-hover-opacity-4" 			=> "60%",
	  	              "pix-hover-opacity-6" 			=> "40%",
	  	              "pix-hover-opacity-7" 			=> "30%",
	  	              "pix-hover-opacity-8" 			=> "20%",
	  	              "pix-hover-opacity-9" 			=> "10%",
	  	              "pix-hover-opacity-10" 			=> "Disable",

	           ),
				'default' => 'pix-hover-opacity-7',
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
			'extra_classes',
			[
				'label' => __( 'Extra Classes', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( '', 'elementor' ),
				'default' => '',
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'section_advanced',
			[
				'label' => __( 'Advanced', 'elementor' ),
			]
		);
		$this->add_control(
			'bold',
			[
				'label' => __( 'Bold', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'font-weight-bold' => [
						'title' => __( 'Yes', 'pixfort-core' ),
						'icon' => 'fa fa-check',
					],
					'0' => [
						'title' => __( 'No', 'pixfort-core' ),
						'icon' => 'fa fa-times',
					]
				],
				'default' => 'font-weight-bold',
			]
		);
		$this->add_control(
			'italic',
			[
				'label' => __( 'Italic', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'font-italic' => [
						'title' => __( 'Yes', 'pixfort-core' ),
						'icon' => 'fa fa-check',
					],
					'0' => [
						'title' => __( 'No', 'pixfort-core' ),
						'icon' => 'fa fa-times',
					]
				],
				'default' => '0',
			]
		);
		$this->add_control(
			'secondary_font',
			[
				'label' => __( 'Secondary font', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'secondary-font' => [
						'title' => __( 'Yes', 'pixfort-core' ),
						'icon' => 'fa fa-check',
					],
					'0' => [
						'title' => __( 'No', 'pixfort-core' ),
						'icon' => 'fa fa-times',
					]
				],
				'default' => '0',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Title color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors),
				'default' => '',
			]
		);
		$this->add_control(
			'title_custom_color',
			[
				'label' => __( 'Custom Title color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'title_color' => 'custom',
				],
			]
		);

		$this->add_control(
			'title_size',
			[
				'label' => __( 'Title size', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip(array(
                    __('H1','pix-opts') 	=> 'h1',
                    __('H2','pix-opts')	    => 'h2',
                    __('H3','pix-opts')	    => 'h3',
                    __('H4','pix-opts')	    => 'h4',
                    __('H5','pix-opts')	    => 'h5',
                    __('H6','pix-opts')	    => 'h6',
                    __('Custom','pix-opts')	    => 'custom',
                )),
				'default' => 'h2',
			]
		);
		$this->add_control(
			'title_custom_size',
			[
				'label' => __( 'Custom title size', 'elementor' ),
				'label_block' => false,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter custom title size', 'elementor' ),
				'default' => '',
				'condition' => [
					'title_size' => 'custom',
				],
			]
		);


		$this->add_control(
			'content_color',
			[
				'label' => __( 'Content color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors),
				'default' => 'light-opacity-5',
			]
		);
		$this->add_control(
			'content_custom_color',
			[
				'label' => __( 'content_custom_color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'content_color' => 'custom',
				],
			]
		);
		$this->add_control(
			'content_size',
			[
				'label' => __( 'Text size', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
                    ''			=> 'Default (16px)',
                    'text-xs'		=> '12px',
                    'text-sm'		=> '14px',
                    'text-sm'		=> '14px',
                    'text-18' 		=> '18px',
                    'text-20' 		=> '20px',
                    'text-24' 		=> '24px',
                ),
				'default' => '',
			]
		);

		$this->end_controls_section();

		pix_get_elementor_btn($this);
	}

	protected function render() {
        $settings = $this->get_settings_for_display();
		echo sc_pix_3d_box($settings);
	}

	// protected function _content_template() {

    // }

	public function get_script_depends() {
		if(is_user_logged_in()) return [ 'pix-global', 'pix-3d-box-handle' ];
		return [];
	  }


}
