<?php
namespace Elementor;

class Pix_Eor_Img_Slider extends Widget_Base {

	public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);

      wp_register_script( 'pix-img-slider-handle', PIX_CORE_PLUGIN_URI.'functions/elementor/js/img-slider.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );
   	}

	public function get_name() {
		return 'pix-img-slider';
	}

	public function get_title() {
		return 'Image Slider';
	}

	public function get_icon() {
		return 'eicon-slides';
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
				'label' => __( 'General', 'essentials-core' ),
			]
		);

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

		$this->add_control(
			'items',
			[
				'label' => __( 'Items', 'essentials-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls()
			]
		);

		$this->add_control(
			'rounded_img',
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
			'pix_scroll_parallax',
			[
				'label' => __( 'Scroll Parallax', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Enable', 'essentials-core' ),
				'label_off' => __( 'Disable', 'essentials-core' ),
				'return_value' => 'scroll_parallax',
				'default' => 'no',
			]
		);

		$this->add_control(
			'xaxis',
			[
				'label' => __( 'X axis', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '0', 'essentials-core' ),
				'placeholder' => __( 'Type your title here', 'essentials-core' ),
				'condition' => [
					'pix_scroll_parallax' => 'scroll_parallax',
				],
			]
		);
		$this->add_control(
			'yaxis',
			[
				'label' => __( 'Y axis', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '0', 'essentials-core' ),
				'placeholder' => __( 'Type your title here', 'essentials-core' ),
				'condition' => [
					'pix_scroll_parallax' => 'scroll_parallax',
				],
			]
		);

		$this->add_control(
			'pix_tilt',
			[
				'label' => __( '3D Hover', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Enable', 'essentials-core' ),
				'label_off' => __( 'Disable', 'essentials-core' ),
				'return_value' => 'tilt',
				'default' => 'no',

			]
		);

		$this->add_control(
			'pix_tilt_size',
			[
				'label' => __( '3d hover size', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'tilt',
				'options' => [
					'tilt' => __( 'Default', 'essentials-core' ),
					'tilt_big' => __( 'Big', 'essentials-core' ),
					'tilt_small' => __( 'Small', 'essentials-core' ),
				],
				'condition' => [
					'pix_tilt' => 'tilt',
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

		$this->start_controls_section(
			'section_advanced',
			[
				'label' => __( 'Advanced', 'essentials-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);


		// $this->add_control(
		// 	'slider_num',
		// 	[
		// 		'label' => __( 'Slides per page', 'essentials-core' ),
		// 		'type' => Controls_Manager::SELECT,
		// 		'default' => 3,
		// 		'options' => [
		// 			1 	=> "1",
        //             2 	=> "2",
        //             3 	=> "3",
        //             4 	=> "4",
        //             5 	=> "5",
        //             6 	=> "6",
		// 		],
		// 	]
		// );
		// $this->add_control(
		// 	'slider_style',
		// 	[
		// 		'label' => __( 'Slides style', 'essentials-core' ),
		// 		'type' => Controls_Manager::SELECT,
		// 		'default' => 'pix-style-standard',
		// 		'options' => [
		// 			'pix-style-standard'        => __('Standard','essentials-core'),
        //             'pix-one-active'         	=> __('One active item','essentials-core'),
        //             'pix-opacity-slider'        => __('Faded items','essentials-core'),
		// 		],
		// 	]
		// );
		$this->add_control(
			'slider_effect',
			[
				'label' => __( 'Slides effect', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'pix-effect-standard',
				'options' => array_flip(
					array(
	                    __('Standard','pix-opts') 	                => 'pix-effect-standard',
	                    // __('Circular effect','pix-opts') 	        => 'pix-circular-slider',
	                    // __('Circular Left only','pix-opts') 	        => 'pix-circular-left',
	                    // __('Circular Right only','pix-opts') 	    => 'pix-circular-right',
	                     __('Fade out','pix-opts') 	                => 'pix-fade-out-effect',
	                )
				),
			]
		);

		$this->add_control(
			'prevnextbuttons',
			[
				'label' => __( 'Show navigation buttons', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => true,
				'default' => true,

			]
		);
		$this->add_control(
			'pagedots',
			[
				'label' => __( 'Dots', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => true,
				'default' => true,

			]
		);
		$this->add_control(
			'dots_style',
			[
				'label' => __( 'Dots style', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					''			=> 'Default',
					'light-dots' 	=> 'Light',
				],
				'condition' => [
					'pagedots' => true,
				],
			]
		);
		$this->add_control(
			'dots_align',
			[
				'label' => __( 'Dots style', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					''			=> 'Center',
					'pix-dots-left' 	=> 'Left',
					'pix-dots-right' 	=> 'Right',
				],
				'condition' => [
					'pagedots' => true,
				],
			]
		);
		$this->add_control(
			'freescroll',
			[
				'label' => __( 'Free Scroll', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => true,
				'default' => false,

			]
		);
		// $this->add_control(
		// 	'cellalign',
		// 	[
		// 		'label' => __( 'Main cell Align', 'essentials-core' ),
		// 		'type' => Controls_Manager::SELECT,
		// 		'default' => 'center',
		// 		'options' => [
		// 			'center'			=> 'Center',
		// 			'left' 	=> 'Left',
		// 			'right' 	=> 'Right',
		// 		],
		// 	]
		// );
		// $this->add_control(
		// 	'slider_scale',
		// 	[
		// 		'label' => __( 'Scale main item', 'essentials-core' ),
		// 		'type' => \Elementor\Controls_Manager::SWITCHER,
		// 		'label_on' => __( 'Yes', 'essentials-core' ),
		// 		'label_off' => __( 'No', 'essentials-core' ),
		// 		'return_value' => 'pix-slider-scale',
		// 		'default' => false,
		// 	]
		// );
		$this->add_control(
			'cellpadding',
			[
				'label' => __( 'Cells padding', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'pix-p-10',
				'options' => [
					'p-0'				=> '0px',
					'pix-p-5'			=> '5px',
					'pix-p-10'			=> '10px',
					'pix-p-15'			=> '15px',
					'pix-p-20'			=> '20px',
					'pix-p-25'			=> '25px',
					'pix-p-30'			=> '30px',
					'pix-p-35'			=> '35px',
					'pix-p-40'			=> '40px',
					'pix-p-45'			=> '45px',
					'pix-p-50'			=> '50px',
				],
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
				'default' => __( '1500', 'essentials-core' ),
				'placeholder' => __( 'Type your title here', 'essentials-core' ),
				// 'condition' => [
				// 	'autoplay' => true,
				// ],
			]
		);
		$this->add_control(
			'adaptiveheight',
			[
				'label' => __( 'Adaptive height', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => true,
				'default' => false,
			]
		);
		$this->add_control(
			'righttoleft',
			[
				'label' => __( 'Right to Left', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => true,
				'default' => false,
			]
		);
		$this->add_control(
			'slider_wrap',
			[
				'label' => __( 'Wrap slides', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => true,
				'default' => true,
			]
		);
		$this->add_control(
			'visible_y',
			[
				'label' => __( 'Increase vertical view', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'pix-overflow-y-visible',
				'default' => false,
			]
		);
		$this->add_control(
			'visible_overflow',
			[
				'label' => __( 'Visible overflow', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'pix-overflow-all-visible',
				'default' => false,
			]
		);

		$this->end_controls_section();
		pix_get_elementor_effects($this);


	}

	protected function render() {
        $settings = $this->get_settings_for_display();
		echo sc_pix_img_slider($settings);
	}



	public function get_script_depends() {
		if(is_user_logged_in()) return [ 'pix-global', 'pix-img-slider-handle' ];
		return [];

	  }


}
