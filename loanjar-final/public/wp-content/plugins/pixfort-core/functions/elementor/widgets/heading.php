<?php
namespace Elementor;

class Pix_Eor_Heading extends Widget_Base {

	public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);
   	}

	public function get_name() {
		return 'pix-heading';
	}

	public function get_title() {
		return 'Heading';
	}

	public function get_icon() {
		return 'eicon-heading';
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
				'placeholder' => __( '', 'elementor' ),
				'default' => '',
				'dynamic'     => array(
                    'active'  => true
                ),
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

		$this->end_controls_section();
		$this->start_controls_section(
			'title_section',
			[
				'label' => __( 'Title format', 'pixfort-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'bold',
			[
				'label' => __( 'Bold', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'font-weight-bold',
				'default' => 'font-weight-bold',
			]
		);
		$this->add_control(
			'italic',
			[
				'label' => __( 'Italic', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'font-italic',
				'default' => '',
			]
		);
		// $this->add_control(
		// 	'secondary_font',
		// 	[
		// 		'label' => __( 'Secondary font', 'essentials-core' ),
		// 		'type' => \Elementor\Controls_Manager::SWITCHER,
		// 		'label_on' => __( 'Yes', 'essentials-core' ),
		// 		'label_off' => __( 'No', 'essentials-core' ),
		// 		'return_value' => 'secondary-font',
		// 		'default' => '',
		// 	]
		// );
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
				// 'scheme' => [
				// 	'type' => \Elementor\Scheme_Color::get_type(),
				// 	'value' => \Elementor\Scheme_Color::COLOR_1,
				// ],
				'selectors' => [
					'{{WRAPPER}} .el-title_custom_color' => 'color: {{VALUE}};',
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
				'default' => 'h1',
			]
		);
		$this->add_responsive_control(
			'title_custom_size',
			[
				'label' => __( 'Custom Title size', 'elementor' ),
				'label_block' => false,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter custom title size', 'elementor' ),
				'default' => '',
				'condition' => [
					'title_size' => 'custom',
				],
				'selectors' => [
					'{{WRAPPER}} .heading-text' => 'font-size: {{value}} !important;',
				],
			]
		);

		$this->add_control(
			'display',
			[
				'label' => __( 'Bigger Text', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
	                ''		=> 'None',
	                'display-1'		=> 'Display 1',
	                'display-2'		=> 'Display 2',
	                'display-3'		=> 'Display 3',
	                'display-4'		=> 'Display 4',
	            ),
				'default' => '',
				'condition' => [
					'title_size' => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6')
				],
			]
		);
		$this->add_control(
			'position',
			[
				'label' => __( 'Position', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'text-center'		=> 'Center',
	                'text-left'			=> 'Left',
	                'text-right' 		=> 'Right',
	            ),
				'default' => 'text-center',
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Use image as text color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => '',
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

		$this->start_controls_section(
			'section_element_style',
			[
				'label' => __( 'Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'elementor' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pix-heading-el, {{WRAPPER}} .heading-text' => 'text-align: {{VALUE}} !important;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'bar_inner_typography',
				'selector' => '{{WRAPPER}} .heading-text, {{WRAPPER}} .heading-text span, {{WRAPPER}} .body-font, {{WRAPPER}} .secondary-font',
				// 'exclude' => [
				// 	'font_family',
				// 	'text_decoration',
				// ],
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}}',
			]
		);
		
		$this->end_controls_section();

	}

	protected function render() {
        $settings = $this->get_settings_for_display();
		echo sc_heading($settings);
	}



	public function get_script_depends() {
		if(is_user_logged_in()) return [ 'pix-global' ];
    	return [];
	  }


}
