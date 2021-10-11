<?php
namespace Elementor;

class Pix_Eor_Sliding_Text extends Widget_Base {

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);

		wp_register_script( 'pix-sliding-text-handle', PIX_CORE_PLUGIN_URI.'functions/elementor/js/sliding-text.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );
	}

	public function get_name() {
		return 'pix-sliding-text';
	}

	public function get_title() {
		return 'Sliding Text';
	}

	public function get_icon() {
		return 'eicon-arrow-up';
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
			'content',
			[
				'label' => __( 'Text', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => __( '', 'elementor' ),
				'dynamic'     => array(
					'active'  => true
				),
				'default' => '',
			]
		);

		$this->add_control(
			'position',
			[
				'label' => __( 'Position', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'center'		=> 'Center',
					'left'			=> 'Left',
					'right' 		=> 'Right',
				),
				'default' => 'center',
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

		// $this->add_responsive_control(
		// 	'secondary_font2',
		// 	[
		// 		'label' => __( 'Secondary font', 'elementor' ),
		// 		'type' => Controls_Manager::CHOOSE,
		// 		'options' => [
		// 			'' => [
		// 				'title' => __( 'Default', 'elementor' ),
		// 				'icon' => 'eicon-undo',
		// 			],
		// 			'--pix-body-font' => [
		// 				'title' => __( 'Body Font', 'elementor' ),
		// 				'icon' => 'eicon-text',
		// 			],
		// 			'--pix-heading-font' => [
		// 				'title' => __( 'Heading (Secondary)', 'elementor' ),
		// 				'icon' => 'eicon-heading',
		// 			]
		// 		],
		// 		'selectors' => [
		// 			'{{WRAPPER}} .pix-sliding-headline, {{WRAPPER}} .pix-sliding-headline span' => 'font-family: var({{VALUE}}) !important;',
		// 		],
		// 	]
		// );

		$this->add_control(
			'secondary_font',
			[
				'label' => __( 'Secondary font', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'secondary-font',
				'default' => '',
			]
		);
		$this->add_control(
			'size',
			[
				'label' => __( 'Font size', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'h1'		=> 'H1',
					'h2'		=> 'H2',
					'h3' 		=> 'H3',
					'h4' 		=> 'H4',
					'h5' 		=> 'H5',
					'h6' 		=> 'H6',
					'p' 		=> 'p',
				],
				'default' => 'h1',
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
					'size' => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6')
				],
			]
		);
		$this->add_control(
			'text_color',
			[
				'label' => __( 'Title color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors),
				'default' => 'heading-default',
			]
		);
		$this->add_control(
			'text_custom_color',
			[
				'label' => __( 'Custom Title color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'text_color' => 'custom',
				],
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
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'bar_inner_typography',
				'selector' => '{{WRAPPER}} .pix-sliding-headline, {{WRAPPER}} .pix-sliding-headline span, {{WRAPPER}} .body-font, {{WRAPPER}} .heading-font',
				'exclude' => [
					// 'font_family',
					'text_decoration',
				],
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
		echo sc_sliding_text($settings, $settings['content']);
	}

	// protected function _content_template() {

	// }

	public function get_script_depends() {
		if(is_user_logged_in()) return [ 'pix-global', 'pix-sliding-text-handle' ];
		return [];
	}

}
