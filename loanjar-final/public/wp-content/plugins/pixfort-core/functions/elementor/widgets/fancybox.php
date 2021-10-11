<?php
namespace Elementor;

class Pix_Eor_Fancybox extends Widget_Base {

	public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);
   	}

	public function get_name() {
		return 'pix-fancybox';
	}

	public function get_title() {
		return 'Fancy box';
	}

	public function get_icon() {
		return 'eicon-info-box';
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
			'text',
			[
				'label' => __( 'Text', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Content text', 'elementor' ),
				'default' => 'Insert your content here',
				'dynamic'     => array(
                    'active'  => true
                ),
			]
		);

		$this->add_control(
			'bg_img',
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
			'alt',
			[
				'label' => __( 'Image alternative text', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'dynamic'     => array(
                    'active'  => true
                ),
				'placeholder' => __( '', 'elementor' ),
				'default' => '',
			]
		);

		$this->add_control(
			'position',
			[
				'label' => __( 'Text position', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'bottom',
				'options' => [
					'bottom'		=> 'Bottom',
                    'top'			=> 'Top',
				],
			]
		);
		$this->add_control(
			'link',
			[
				'label' => __( 'Box link', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Box link', 'elementor' ),
				'default' => '',
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
				'default' => 'h6',
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
					'text_size' => 'custom',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content format', 'pixfort-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
		);
		$this->add_control(
			'content_bold',
			[
				'label' => __( 'Content Bold', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'font-weight-bold',
				'default' => '',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => __( 'Content color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors),
				'default' => 'dark-opacity-5',
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

		$this->add_control(
			'overlay_color',
			[
				'label' => __( 'Hover overlay color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors),
				'default' => 'light-opacity-8',
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
			'enable_blur',
			[
				'label' => __( 'Enable blur', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'yes',
			]
		);

		$this->end_controls_section();
		pix_get_elementor_effects($this);

	}

	protected function render() {
        $settings = $this->get_settings_for_display();
		echo sc_fancy_box($settings);
	}



	public function get_script_depends() {
		if(is_user_logged_in()) return [ 'pix-global' ];
 		return [];
	  }


}
