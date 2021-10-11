<?php
namespace Elementor;

class Pix_Eor_Testimonial_Masonry extends Widget_Base {

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);

		wp_register_script( 'pix-testimonial-masonry-handle', PIX_CORE_PLUGIN_URI.'functions/elementor/js/testimonial-masonry.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );
	}

	public function get_name() {
		return 'pix-testimonial-masonry';
	}

	public function get_title() {
		return 'Testimonial masonry';
	}

	public function get_icon() {
		return 'eicon-posts-masonry';
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
			'grid_size', [
				'label' => __( 'Testimonial Size', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'grid-item'		=> 'Default',
					'grid-item grid-item--width2'		=> 'Wide'
				],
				'default' => 'grid-item',
			]
		);
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
			'img_style', [
				'label' => __( 'Image style', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip(array(
					__('Standard','pix-opts')	    => 'standard',
					__('Circle Bottom','pix-opts') 	=> 'circle_bottom',
					__('Circle Top','pix-opts') 	=> 'circle_top',
				)),
				'default' => 'standard',
			]
		);
		$repeater->add_control(
			'width', [
				'label' => __( 'Max Width of the image (Optional)', 'essentials-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '' , 'essentials-core' ),
				'placeholder' => __( 'For example 200' , 'essentials-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'height', [
				'label' => __( 'Max height of the image (Optional)', 'essentials-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '' , 'essentials-core' ),
				'placeholder' => __( 'For example 200' , 'essentials-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'name', [
				'label' => __( 'Name', 'essentials-core' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'title', [
				'label' => __( 'Title', 'essentials-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Simply amazing!',
			]
		);
		$repeater->add_control(
			'text', [
				'label' => __( 'textarea', 'essentials-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => '"Some quick example text to build on the testimonial text and make up the bulk of the testimonial content."',
			]
		);
		$repeater->add_control(
			'link', [
				'label' => __( 'Link', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Link', 'elementor' ),
				'default' => '',
			]
		);
		$repeater->add_control(
			'target', [
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
			'items',
			[
				'label' => __( 'Items', 'essentials-core' ),
				'type' => Controls_Manager::REPEATER,
				'title_field' => '{{{ name }}}',
				'fields' => $repeater->get_controls()
			]
		);







		$this->add_control(
			'items_bg_color',
			[
				'label' => __( 'Background color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors),
				'default' => 'light-opacity-5',

			]
		);
		$this->add_control(
			'items_custom_bg_color',
			[
				'label' => __( 'Custom Background Color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'items_bg_color' => 'custom',
				],
			]
		);

		$this->add_control(
			'circle_color',
			[
				'label' => __( 'Circle color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip(array_merge(
					array("None"    => 'pix-bg-custom'),
					$bg_colors
				)),
				'default' => 'gradient-primary',

			]
		);


		$this->add_control(
			'rounded_box',
			[
				'label' => __( 'Rounded corners', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'rounded-lg',
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
			'pix_section_name',
			[
				'label' => __( 'Name format', 'pixfort-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'name_bold',
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
			'name_italic',
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
			'name_secondary_font',
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
			'name_color',
			[
				'label' => __( 'Name color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors),
				'default' => 'dark-opacity-4',
			]
		);
		$this->add_control(
			'name_custom_color',
			[
				'label' => __( 'Custom Name color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'name_color' => 'custom',
				],
			]
		);
		$this->add_control(
			'name_size',
			[
				'label' => __( 'Name size', 'pixfort-core' ),
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
				'default' => 'h6',
			]
		);
		$this->add_control(
			'name_custom_size',
			[
				'label' => __( 'Custom Name size', 'elementor' ),
				'label_block' => false,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter custom Name size', 'elementor' ),
				'default' => '',
				'condition' => [
					'name_size' => 'custom',
				],
			]
		);

		$this->end_controls_section();






		$this->start_controls_section(
			'pix_section_title',
			[
				'label' => __( 'Title format', 'pixfort-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'title_bold',
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
			'title_italic',
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
			'title_secondary_font',
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
				'default' => 'primary',
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





		$this->start_controls_section(
			'pix_section_text',
			[
				'label' => __( 'Text format', 'pixfort-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				// 'condition' => [
				// 	'description!' => '',
				// ],
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' => __( 'Text color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors),
				'default' => 'body-default',

			]
		);
		$this->add_control(
			'text_custom_color',
			[
				'label' => __( 'Text Title color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'text_color' => 'custom',
				],
			]
		);
		$this->add_control(
			'text_size',
			[
				'label' => __( 'Text font size', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					''			=> 'Default (16px)',
					'text-xs'		=> '12px',
					'text-sm'		=> '14px',
					'text-sm'		=> '14px',
					'text-18' 		=> '18px',
					'text-20' 		=> '20px',
					'text-24' 		=> '24px',
				],
				'default' => '',
			]
		);
		$this->end_controls_section();


		pix_get_elementor_effects($this);

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		echo sc_pix_testimonial_masonry($settings);
	}

	// protected function _content_template() {

	// }

	public function get_script_depends() {
		if(is_user_logged_in()) return [ 'pix-global', 'pix-testimonial-masonry-hamdle' ];
		return [];
	}


}
