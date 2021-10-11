<?php
namespace Elementor;

class Pix_Eor_Slider extends Widget_Base {

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);

		wp_register_script( 'pix-slider-handle', PIX_CORE_PLUGIN_URI.'functions/elementor/js/slider.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );
	}

	public function get_name() {
		return 'pix-slider';
	}

	public function get_title() {
		return 'Slider';
	}

	public function get_icon() {
		return 'eicon-slides';
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
		$bg_colors = array(
			"Primary"				=> "primary",
			"Primary Light"			=> "primary-light",
			"Primary Gradient"		=> "gradient-primary",
			"Primary Gradient Light"		=> "gradient-primary-light",
			"Secondary"				=> "secondary",
			"Secondary Light"		=> "secondary-light",
			"White"					=> "white",
			"Black"					=> "black",
			"Green"					=> "green",
			"Green Light"			=> "green-light",
			"Blue"					=> "blue",
			"Blue Light"			=> "blue-light",
			"Red"					=> "red",
			"Red Light"				=> "red-light",
			"Yellow"				=> "yellow",
			"Yellow Light"			=> "yellow-light",
			"Brown"					=> "brown",
			"Brown Light"			=> "brown-light",
			"Purple"				=> "purple",
			"Purple Light"			=> "purple-light",
			"Orange"				=> "orange",
			"Orange Light"			=> "orange-light",
			"Cyan"					=> "cyan",
			"Cyan Light"			=> "cyan-light",
			"Transparent"			=> "transparent",
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
				'label' => __( 'General', 'essentials-core' ),
			]
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


		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'image', [
				'label' => __( 'Image', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
		$repeater->add_control(
			'alt', [
				'label' => __( 'Image alternative text', 'essentials-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '' , 'essentials-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'title', [
				'label' => __( 'Title', 'essentials-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '' , 'essentials-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'text', [
				'label' => __( 'Text', 'essentials-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '' , 'essentials-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'btn_text', [
				'label' => __( 'Button text', 'essentials-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '' , 'essentials-core' ),
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
				'default' => 'yes',
			]
		);
		$repeater->add_control(
			'btn_popup_id', [
				'label' => __( 'Open Popup instead of link', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => $popups,
				'default' => '',
			]
		);
		$this->add_control(
			'items',
			[
				'label' => __( 'Items', 'essentials-core' ),
				'type' => Controls_Manager::REPEATER,
				'title_field' => '{{{ title }}}',
				'fields' => $repeater->get_controls()
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
			'align',
			[
				'label' => __( 'Text alignment', 'essentials-core' ),
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
			'nav_style',
			[
				'label' => __( 'Navigation style', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default'			=> 'Default',
					'circles'		    => 'Circles',
				],
			]
		);
		$this->add_control(
			'nav_align',
			[
				'label' => __( 'Circles align', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'center',
				'options' => [
					'center'		=> 'Center',
					'left'			=> 'Left',
					'right' 		=> 'Right',
				],
				'condition' => [
					'nav_style' => 'circles',
				],
			]
		);
		$this->add_control(
			'circles_color',
			[
				'label' => __( 'Circles color', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'gradient-primary',
				'options' => array_flip($bg_colors),
				'condition' => [
					'nav_style' => 'circles',
				],
			]
		);


		$this->add_control(
			'overlay_color',
			[
				'label' => __( 'Overlay color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors),
				'default' => 'black',
			]
		);
		$this->add_control(
			'overlay_custom_color',
			[
				'label' => __( 'Custom overlay color', 'pixfort-core' ),
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
				'label' => __( 'Hover overlay opacity', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					"pix-opacity-0" 			=> "100%",
					"pix-opacity-1" 			=> "90%",
					"pix-opacity-2" 			=> "80%",
					"pix-opacity-3" 			=> "70%",
					"pix-opacity-4" 			=> "60%",
					"pix-opacity-5" 			=> "50%",
					"pix-opacity-6" 			=> "40%",
					"pix-opacity-7" 			=> "30%",
					"pix-opacity-8" 			=> "20%",
					"pix-opacity-9" 			=> "10%",
					"pix-opacity-10" 			=> "Disable",
				),
				'default' => 'pix-opacity-7',
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label' => __( 'Autoplay', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => true,
				'default' => false,
			]
		);
		$this->add_control(
			'autoplay_time',
			[
				'label' => __( 'Autoplay time', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '2500', 'essentials-core' ),
				'placeholder' => __( 'Type your title here', 'essentials-core' ),
				// 'condition' => [
				// 	'autoplay' => true,
				// ],
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
			'top_placholder',
			[
				'label' => __( 'Extra top padding (with transparent header)', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'true',
				'default' => '',
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
			'title_color',
			[
				'label' => __( 'Title color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors),
				'default' => 'heading-default',
			]
		);
		$this->add_control(
			'title_custom_color',
			[
				'label' => __( 'Custom Title color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'text_color' => 'custom',
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
				'label' => __( 'Custom Title size', 'elementor' ),
				'label_block' => false,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter custom title size', 'elementor' ),
				'default' => '',
				'condition' => [
					'title_size' => 'custom',
				],
			]
		);



		$this->end_controls_section();




		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content format', 'pixfort-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => __( 'Content color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors),
				'default' => 'body-default',
			]
		);
		$this->add_control(
			'content_custom_color',
			[
				'label' => __( 'Content Text color', 'pixfort-core' ),
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
				'label' => __( 'Content size', 'pixfort-core' ),
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
				'default' => 'text-24',
			]
		);
		$this->end_controls_section();





















		$this->start_controls_section(
			'section_button',
			[
				'label' => __( 'Button Settings', 'elementor' ),
			]
		);



		$this->add_control(
			'btn_title_bold',
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
			'btn_italic',
			[
				'label' => __( 'Italic', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'font-italic',
				'default' => '',
			]
		);
		$this->add_control(
			'btn_secondary_font',
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
			'btn_style',
			[
				'label' => __( 'Button Style', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					""            => "Default",
					"flat"        => "Flat",
					"line"        => "Line",
					"outline"     => "Outline",
					"underline"     => "Underline",
					"link"        => "Link",
					"blink"     => "Blink"
				),
				'default' => '',
			]
		);
		$this->add_control(
			'btn_color',
			[
				'label' => __( 'Button Color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'primary' 		=> 'Primary',
					'primary-light' 		=> 'Primary Light',
					// 'success'		=> 'Success',
					'secondary'		=> 'Secondary',
					'gray-1' 		=> 'Light',
					'gray-5' 		    => 'Dark',
					'black' 		=> 'Black',
					// 'link' 		    => 'Link',
					'white' 		=> 'White',
					'blue' 		    => 'Blue',
					'red' 		    => 'Red',
					'cyan' 		    => 'Cyan',
					'orange' 		    => 'Orange',
					'green' 		    => 'Green',
					'purple' 		    => 'Purple',
					'brown' 		    => 'Brown',
					'yellow' 		    => 'Yellow',
					'gradient-primary' 		    => 'Primary gradient',
					"gray-1" => 'Gray 1',
					"gray-2" => 'Gray 2',
					"gray-3" => 'Gray 3',
					"gray-4" => 'Gray 4',
					"gray-5" => 'Gray 5',
					"gray-6" => 'Gray 6',
					"gray-7" => 'Gray 7',
					"gray-8" => 'Gray 8',
					"gray-9" => 'Gray 9',
					"dark-opacity-1" => 'Dark opacity 1',
					"dark-opacity-2" => 'Dark opacity 2',
					"dark-opacity-3" => 'Dark opacity 3',
					"dark-opacity-4" => 'Dark opacity 4',
					"dark-opacity-5" => 'Dark opacity 5',
					"dark-opacity-6" => 'Dark opacity 6',
					"dark-opacity-7" => 'Dark opacity 7',
					"dark-opacity-8" => 'Dark opacity 8',
					"dark-opacity-9" => 'Dark opacity 9',
					"light-opacity-1" => 'Light opacity 1',
					"light-opacity-2" => 'Light opacity 2',
					"light-opacity-3" => 'Light opacity 3',
					"light-opacity-4" => 'Light opacity 4',
					"light-opacity-5" => 'Light opacity 5',
					"light-opacity-6" => 'Light opacity 6',
					"light-opacity-7" => 'Light opacity 7',
					"light-opacity-8" => 'Light opacity 8',
					"light-opacity-9" => 'Light opacity 9'

				),
				'default' => 'primary',
			]
		);

		$this->add_control(
			'btn_remove_padding',
			[
				'label' => __( 'Remove padding', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'no-padding',
				'default' => '',
				'condition' => [
					'btn_style' => array("link", "underline")
				],
			]
		);
		$this->add_control(
			'btn_text_color',
			[
				'label' => __( 'Text color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip(array_merge(array("Default" => "",), $colors)),
				'default' => '',
			]
		);
		$this->add_control(
			'btn_text_custom_color',
			[
				'label' => __( 'Text custom color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'btn_text_color' => 'custom',
				],
			]
		);
		$this->add_control(
			'btn_size',
			[
				'label' => __( 'Button Size', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					"sm"       => "Small",
					"normal"       => "Normal",
					"md"       => "Medium",
					"lg"       => "Large",
					"xl"       => "XLarge "
				),
				'default' => 'md',
			]
		);
		$this->add_control(
			'btn_rounded',
			[
				'label' => __( 'Rounded corners button', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'btn-rounded',
				'default' => '',
			]
		);
		$this->add_control(
			'btn_effect',
			[
				'label' => __( 'Button Size', 'pixfort-core' ),
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
			'btn_hover_effect',
			[
				'label' => __( 'Button Shadow Hover Style', 'pixfort-core' ),
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
			'btn_add_hover_effect',
			[
				'label' => __( 'Button Hover Animation', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					""       => "None",
					"1"       => "Fly Small",
					"2"       => "Fly Medium",
					"3"       => "Fly Large",
					"4"       => "Scale Small",
					"5"       => "Scale Medium",
					"6"       => "Scale Large",
					"7"       => "Scale Inverse Small",
					"8"       => "Scale Inverse Medium",
					"9"       => "Scale Inverse Large",
				),
				'default' => '',
			]
		);


		$fontiocns_opts = array();
		$fontiocns_opts[''] = array('title' => 'None', 'url' => '' );
		$pixicons = vc_iconpicker_type_pixicons( array() );
		foreach ($pixicons as $key) {
			// echo '<br />';
			$fontiocns_opts[array_keys($key)[0]] = array(
				'title'	=> array_keys($key)[0],
				'url'	=> array_keys($key)[0]
			);
		}
		$this->add_control(
			'btn_icon',
			[
				'label' => esc_html__('Icon', 'text-domain'),
				'type' => \Elementor\CustomControl\FonticonSelector_Control::FonticonSelector,
				'options'	=> $fontiocns_opts,
				'default' => '',
			]
		);

		$this->add_control(
			'btn_icon_position',
			[
				'label' => __( 'Icon position', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					""            => "Before text (left)",
					"after"        => "After text (right)"
				),
				'default' => '',
				'conditions' => [
					'terms' => [
						[
							'name' => 'btn_icon',
							'operator' => '!=',
							'value' => ''
						]
					]
				],
			]
		);
		$this->add_control(
			'btn_icon_animation',
			[
				'label' => __( 'Icon animation', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'yes',
				'default' => '',
				'conditions' => [
					'terms' => [
						[
							'name' => 'btn_icon',
							'operator' => '!=',
							'value' => ''
						]
					]
				],
			]
		);
		$this->add_control(
			'btn_full',
			[
				'label' => __( 'Full width Button', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
		$this->add_control(
			'btn_text_align',
			[
				'label' => __( 'Button Text Align', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'text-center' 		=> 'Center',
					'text-left' 		=> 'Left',
					'text-right' 		=> 'Right',
				),
				'default' => '',
				'conditions' => [
					'terms' => [
						[
							'name' => 'btn_full',
							'operator' => '!=',
							'value' => ''
						]
					]
				],
			]
		);
		$this->add_control(
			'btn_div',
			[
				'label' => __( 'Button inside a container', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' 		=> 'Disabled',
					'text-center' 		=> 'Center align',
					'text-left' 		=> 'Left align',
					'text-right' 		=> 'Right align',
				),
				'default' => '',
			]
		);


		$this->add_control(
			'btn_animation',
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
			'btn_anim_delay',
			[
				'label' => __( 'Animation delay (in miliseconds)', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '0', 'essentials-core' ),
				'placeholder' => __( '', 'essentials-core' ),
				'condition' => [
					'btn_animation!' => '',
				],
			]
		);


		$this->end_controls_section();


		pix_get_elementor_effects($this);


	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		echo sc_pix_slider($settings);
	}

	// protected function _content_template() {

	// }

	public function get_script_depends() {
		if(is_user_logged_in()) return [ 'pix-global', 'pix-slider-handle' ];
		return [];
	}


}
