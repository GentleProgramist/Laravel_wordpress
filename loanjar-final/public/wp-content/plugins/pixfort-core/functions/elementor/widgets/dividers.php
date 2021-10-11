<?php
namespace Elementor;

class Pix_Eor_Dividers extends Widget_Base {

	public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);

      wp_register_script( 'pix-dividers-handle', PIX_CORE_PLUGIN_URI.'functions/elementor/js/dividers.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );
   	}

	public function get_name() {
		return 'pix-dividers';
	}

	public function get_title() {
		return 'Dividers';
	}

	public function get_icon() {
		return 'eicon-divider-shape';
	}

	public function get_categories() {
		return [ 'pixfort' ];
	}

	protected function _register_controls() {




		// ===========================================
        // Bottom Dividers
        // ===========================================
		$this->start_controls_section(
			'section_bottom_dividers',
			[
				'label' => __( 'Bottom dividers', 'elementor' ),
			]
		);



		$fontiocns_opts = array();
	    $fontiocns_opts['0'] = array('title' => 'None', 'url' => PIX_CORE_PLUGIN_URI.'functions/images/shapes/none.png' );
	    $fontiocns_opts['dynamic'] = array('title' => 'Dynamic', 'url' => PIX_CORE_PLUGIN_URI.'functions/images/shapes/divider-dynamic.gif' );
		for ($x = 1; $x <= 23; $x++) {
			$fontiocns_opts[$x] = array('title' => 'Style '.$x, 'url' => PIX_CORE_PLUGIN_URI.'functions/images/shapes/divider-'.$x.'.png' );
		}

	    $this->add_control(
	        'bottom_divider_select',
	        [
	            'label' => esc_html__('Icon', 'text-domain'),
	            'type' => \Elementor\CustomControl\ImgSelector_Control::ImgSelector,
	            'options'	=> $fontiocns_opts,
	            'default' => '0',
	            'class' => 'firas',

	        ]
	    );

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'd_gradient', [
				'label' => __( 'Use Gradient', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => '1',
				'default' => '',
			]
		);
		$repeater->add_control(
			'd_color_1', [
				'label' => __( 'Layer color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#f8f9fa',
			]
		);
		$repeater->add_control(
			'd_color_2', [
				'label' => __( 'Layer color 2', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#f8f9fa',
				'condition' => [
					'd_gradient!' => '',
				],
			]
		);

		$this->add_control(
			'bottom_moving_divider_color',
			[
				'label' => __( 'Bottom Dividers', 'essentials-core' ),
				'type' => Controls_Manager::REPEATER,
				'default'	=> [
					['d_gradient'	=> ''],
					[]
				],
				'fields' => $repeater->get_controls(),
				// 'fields' => [
				// 	[
				// 		'name' => 'd_gradient',
				// 		'label' => __( 'Use Gradient', 'essentials-core' ),
				// 		'type' => \Elementor\Controls_Manager::SWITCHER,
				// 		'label_on' => __( 'Yes', 'essentials-core' ),
				// 		'label_off' => __( 'No', 'essentials-core' ),
				// 		'return_value' => '1',
				// 		'default' => '',
				// 	],
				// 	[
				// 		'name' => 'd_color_1',
				// 		'label' => __( 'Layer color', 'pixfort-core' ),
				// 		'type' => \Elementor\Controls_Manager::COLOR,
				// 		'default' => '#f8f9fa',
				// 	],
				// 	[
				// 		'name' => 'd_color_2',
				// 		'label' => __( 'Layer color 2', 'pixfort-core' ),
				// 		'type' => \Elementor\Controls_Manager::COLOR,
				// 		'default' => '#f8f9fa',
				// 		'condition' => [
				// 			'd_gradient!' => '',
				// 		],
				// 	]
				//
				//
				//
				// ],
				'condition' => [
					'bottom_divider_select' => 'dynamic',
				],
			]
		);



		$this->add_control(
			'bottom_layers',
			[
				'label' => __( 'The number of Layers', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '3',
				'options' => array(
	                "1"       => "1 Layer",
	                "2"       => "2 Layer",
	                "3"       => "3 Layer",
	            ),
				'condition' => [
					'bottom_divider_select' => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24")
				],
			]
		);

		$this->add_control(
			'b_has_animation',
			[
				'label' => __( 'Enable animations for layers', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'font-weight-bold',
				'default' => false,
				'condition' => [
					'bottom_layers!' => '',
				],
			]
		);


		$this->add_control(
			'b_divider_in_front',
			[
				'label' => __( 'Bring the divider in front of the content', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => true,
				'default' => false,
			]
		);
		$this->add_control(
			'b_flip_h',
			[
				'label' => __( 'Flip the divider', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => true,
				'default' => false,
			]
		);
		$this->add_control(
			'b_custom_height',
			[
				'label' => __( 'Divider custom height (Optional)', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '0', 'essentials-core' ),
				'placeholder' => __( 'Height with unit, e.g: 200px', 'essentials-core' ),
				// 'condition' => [
				// 	'b_2_animation!' => '',
				// ],
			]
		);


		$this->end_controls_section();








		$this->start_controls_section(
			'section_bottom_dividers_1',
			[
				'label' => __( 'Bottom First Layer', 'elementor' ),
				'condition' => [
					'bottom_divider_select' => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24")
				],
			]
		);

		$this->add_control(
			'b_1_is_gradient',
			[
				'label' => __( 'Use gradient for the first layer', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => true,
				'default' => false,
				// 'condition' => [
				// 	'bottom_layers!' => '',
				// ],
			]
		);
		$this->add_control(
			'b_1_color',
			[
				'label' => __( 'Layer 1 color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				// 'condition' => [
				// 	'icon_color' => 'custom',
				// ],
			]
		);
		$this->add_control(
			'b_1_color_2',
			[
				'label' => __( 'Layer 1 second gradient color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'condition' => [
					'b_1_is_gradient!' => '',
				],
			]
		);
		$this->add_control(
			'b_1_animation',
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
				'condition' => [
					'b_has_animation!' => '',
				],
			]
		);
		$this->add_control(
			'b_1_delay',
			[
				'label' => __( 'Animation delay (in miliseconds)', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '0', 'essentials-core' ),
				'placeholder' => __( '', 'essentials-core' ),
				'condition' => [
					'b_1_animation!' => '',
				],
			]
		);

		$this->end_controls_section();











		$this->start_controls_section(
			'section_bottom_dividers_2',
			[
				'label' => __( 'Bottom Second Layer', 'elementor' ),
				'condition' => [
					'bottom_divider_select' => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24")
				],
			]
		);

		$this->add_control(
			'b_2_is_gradient',
			[
				'label' => __( 'Use gradient for the second layer', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => true,
				'default' => false,
				// 'condition' => [
				// 	'bottom_layers!' => '',
				// ],
			]
		);
		$this->add_control(
			'b_2_color',
			[
				'label' => __( 'Layer 2 color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,0.6)',
				// 'condition' => [
				// 	'icon_color' => 'custom',
				// ],
			]
		);
		$this->add_control(
			'b_2_color_2',
			[
				'label' => __( 'Layer 2 second gradient color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'condition' => [
					'b_2_is_gradient!' => '',
				],
			]
		);
		$this->add_control(
			'b_2_animation',
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
				'condition' => [
					'b_has_animation!' => '',
				],
			]
		);
		$this->add_control(
			'b_2_delay',
			[
				'label' => __( 'Animation delay (in miliseconds)', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '0', 'essentials-core' ),
				'placeholder' => __( '', 'essentials-core' ),
				'condition' => [
					'b_2_animation!' => '',
				],
			]
		);

		$this->end_controls_section();








		$this->start_controls_section(
			'section_bottom_dividers_3',
			[
				'label' => __( 'Bottom Third Layer', 'elementor' ),
				'condition' => [
					'bottom_divider_select' => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24")
				],
			]
		);

		$this->add_control(
			'b_3_is_gradient',
			[
				'label' => __( 'Use gradient for the third layer', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => true,
				'default' => false,
			]
		);
		$this->add_control(
			'b_3_color',
			[
				'label' => __( 'Layer 3 color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,0.3)',
				// 'condition' => [
				// 	'icon_color' => 'custom',
				// ],
			]
		);
		$this->add_control(
			'b_3_color_2',
			[
				'label' => __( 'Layer 3 second gradient color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'condition' => [
					'b_3_is_gradient!' => '',
				],
			]
		);
		$this->add_control(
			'b_3_animation',
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
				'condition' => [
					'b_has_animation!' => '',
				],
			]
		);
		$this->add_control(
			'b_3_delay',
			[
				'label' => __( 'Animation delay (in miliseconds)', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '0', 'essentials-core' ),
				'placeholder' => __( '', 'essentials-core' ),
				'condition' => [
					'b_3_animation!' => '',
				],
			]
		);

		$this->end_controls_section();































		// ===========================================
		// top Dividers
		// ===========================================
		$this->start_controls_section(
		    'section_top_dividers',
		    [
		        'label' => __( 'top dividers', 'elementor' ),
		    ]
		);



		$fontiocns_opts = array();
		$fontiocns_opts['0'] = array('title' => 'None', 'url' => PIX_CORE_PLUGIN_URI.'functions/images/shapes/none.png' );
		$fontiocns_opts['dynamic'] = array('title' => 'Dynamic', 'url' => PIX_CORE_PLUGIN_URI.'functions/images/shapes/divider-dynamic.gif' );
		for ($x = 1; $x <= 23; $x++) {
		    $fontiocns_opts[$x] = array('title' => 'Style '.$x, 'url' => PIX_CORE_PLUGIN_URI.'functions/images/shapes/divider-'.$x.'.png' );
		}

		$this->add_control(
		    'top_divider_select',
		    [
		        'label' => esc_html__('Icon', 'text-domain'),
		        'type' => \Elementor\CustomControl\ImgSelector_Control::ImgSelector,
		        'options'	=> $fontiocns_opts,
		        'default' => '0',
				'class' => 'pix-top-dividers-select',
		    ]
		);


		$this->add_control(
		    'top_moving_divider_color',
		    [
		        'label' => __( 'top Dividers', 'essentials-core' ),
		        'type' => Controls_Manager::REPEATER,
		        'default'	=> [
		            ['d_gradient'	=> ''],
		            []
		        ],
				'fields' => $repeater->get_controls(),
		        // 'fields' => [
		        //     [
		        //         'name' => 'd_gradient',
		        //         'label' => __( 'Use Gradient', 'essentials-core' ),
		        //         'type' => \Elementor\Controls_Manager::SWITCHER,
		        //         'label_on' => __( 'Yes', 'essentials-core' ),
		        //         'label_off' => __( 'No', 'essentials-core' ),
		        //         'return_value' => '1',
		        //         'default' => '',
		        //     ],
		        //     [
		        //         'name' => 'd_color_1',
		        //         'label' => __( 'Layer color', 'pixfort-core' ),
		        //         'type' => \Elementor\Controls_Manager::COLOR,
		        //         'default' => '#f8f9fa',
		        //     ],
		        //     [
		        //         'name' => 'd_color_2',
		        //         'label' => __( 'Layer color 2', 'pixfort-core' ),
		        //         'type' => \Elementor\Controls_Manager::COLOR,
		        //         'default' => '#f8f9fa',
		        //         'condition' => [
		        //             'd_gradient!' => '',
		        //         ],
		        //     ]
				//
				//
				//
		        // ],
		        'condition' => [
		            'top_divider_select' => 'dynamic',
		        ],
		    ]
		);



		$this->add_control(
		    'top_layers',
		    [
		        'label' => __( 'The number of Layers', 'essentials-core' ),
		        'type' => Controls_Manager::SELECT,
		        'default' => '3',
		        'options' => array(
		            "1"       => "1 Layer",
		            "2"       => "2 Layer",
		            "3"       => "3 Layer",
		        ),
		        'condition' => [
		            'top_divider_select' => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24")
		        ],
		    ]
		);

		$this->add_control(
		    't_has_animation',
		    [
		        'label' => __( 'Enable animations for layers', 'essentials-core' ),
		        'type' => \Elementor\Controls_Manager::SWITCHER,
		        'label_on' => __( 'Yes', 'essentials-core' ),
		        'label_off' => __( 'No', 'essentials-core' ),
		        'return_value' => 'font-weight-bold',
		        'default' => false,
		        'condition' => [
		            'top_layers!' => '',
		        ],
		    ]
		);


		$this->add_control(
		    't_divider_in_front',
		    [
		        'label' => __( 'Bring the divider in front of the content', 'essentials-core' ),
		        'type' => \Elementor\Controls_Manager::SWITCHER,
		        'label_on' => __( 'Yes', 'essentials-core' ),
		        'label_off' => __( 'No', 'essentials-core' ),
		        'return_value' => true,
		        'default' => false,
		    ]
		);
		$this->add_control(
		    't_flip_h',
		    [
		        'label' => __( 'Flip the divider', 'essentials-core' ),
		        'type' => \Elementor\Controls_Manager::SWITCHER,
		        'label_on' => __( 'Yes', 'essentials-core' ),
		        'label_off' => __( 'No', 'essentials-core' ),
		        'return_value' => true,
		        'default' => false,
		    ]
		);
		$this->add_control(
		    't_custom_height',
		    [
		        'label' => __( 'Divider custom height (Optional)', 'essentials-core' ),
		        'type' => \Elementor\Controls_Manager::TEXT,
		        'default' => __( '0', 'essentials-core' ),
		        'placeholder' => __( 'Height with unit, e.g: 200px', 'essentials-core' ),
		        // 'condition' => [
		        // 	't_2_animation!' => '',
		        // ],
		    ]
		);


		$this->end_controls_section();








		$this->start_controls_section(
		    'section_top_dividers_1',
		    [
		        'label' => __( 'Top First Layer', 'elementor' ),
		        'condition' => [
		            'top_divider_select' => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24")
		        ],
		    ]
		);

		$this->add_control(
		    't_1_is_gradient',
		    [
		        'label' => __( 'Use gradient for the first layer', 'essentials-core' ),
		        'type' => \Elementor\Controls_Manager::SWITCHER,
		        'label_on' => __( 'Yes', 'essentials-core' ),
		        'label_off' => __( 'No', 'essentials-core' ),
		        'return_value' => true,
		        'default' => false,
		        // 'condition' => [
		        // 	'top_layers!' => '',
		        // ],
		    ]
		);
		$this->add_control(
		    't_1_color',
		    [
		        'label' => __( 'Layer 1 color', 'pixfort-core' ),
		        'type' => \Elementor\Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        // 'condition' => [
		        // 	'icon_color' => 'custom',
		        // ],
		    ]
		);
		$this->add_control(
		    't_1_color_2',
		    [
		        'label' => __( 'Layer 1 second gradient color', 'pixfort-core' ),
		        'type' => \Elementor\Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'condition' => [
		            't_1_is_gradient!' => '',
		        ],
		    ]
		);
		$this->add_control(
		    't_1_animation',
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
		        'condition' => [
		            't_has_animation!' => '',
		        ],
		    ]
		);
		$this->add_control(
		    't_1_delay',
		    [
		        'label' => __( 'Animation delay (in miliseconds)', 'essentials-core' ),
		        'type' => \Elementor\Controls_Manager::TEXT,
		        'default' => __( '0', 'essentials-core' ),
		        'placeholder' => __( '', 'essentials-core' ),
		        'condition' => [
		            't_1_animation!' => '',
		        ],
		    ]
		);

		$this->end_controls_section();











		$this->start_controls_section(
		    'section_top_dividers_2',
		    [
		        'label' => __( 'Top Second Layer', 'elementor' ),
		        'condition' => [
		            'top_divider_select' => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24")
		        ],
		    ]
		);

		$this->add_control(
		    't_2_is_gradient',
		    [
		        'label' => __( 'Use gradient for the second layer', 'essentials-core' ),
		        'type' => \Elementor\Controls_Manager::SWITCHER,
		        'label_on' => __( 'Yes', 'essentials-core' ),
		        'label_off' => __( 'No', 'essentials-core' ),
		        'return_value' => true,
		        'default' => false,
		        // 'condition' => [
		        // 	'top_layers!' => '',
		        // ],
		    ]
		);
		$this->add_control(
		    't_2_color',
		    [
		        'label' => __( 'Layer 2 color', 'pixfort-core' ),
		        'type' => \Elementor\Controls_Manager::COLOR,
		        'default' => 'rgba(255,255,255,0.6)',
		        // 'condition' => [
		        // 	'icon_color' => 'custom',
		        // ],
		    ]
		);
		$this->add_control(
		    't_2_color_2',
		    [
		        'label' => __( 'Layer 2 second gradient color', 'pixfort-core' ),
		        'type' => \Elementor\Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'condition' => [
		            't_2_is_gradient!' => '',
		        ],
		    ]
		);
		$this->add_control(
		    't_2_animation',
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
		        'condition' => [
		            't_has_animation!' => '',
		        ],
		    ]
		);
		$this->add_control(
		    't_2_delay',
		    [
		        'label' => __( 'Animation delay (in miliseconds)', 'essentials-core' ),
		        'type' => \Elementor\Controls_Manager::TEXT,
		        'default' => __( '0', 'essentials-core' ),
		        'placeholder' => __( '', 'essentials-core' ),
		        'condition' => [
		            't_2_animation!' => '',
		        ],
		    ]
		);

		$this->end_controls_section();








		$this->start_controls_section(
		    'section_top_dividers_3',
		    [
		        'label' => __( 'Top Third Layer', 'elementor' ),
		        'condition' => [
		            'top_divider_select' => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24")
		        ],
		    ]
		);

		$this->add_control(
		    't_3_is_gradient',
		    [
		        'label' => __( 'Use gradient for the third layer', 'essentials-core' ),
		        'type' => \Elementor\Controls_Manager::SWITCHER,
		        'label_on' => __( 'Yes', 'essentials-core' ),
		        'label_off' => __( 'No', 'essentials-core' ),
		        'return_value' => true,
		        'default' => false,
		    ]
		);
		$this->add_control(
		    't_3_color',
		    [
		        'label' => __( 'Layer 3 color', 'pixfort-core' ),
		        'type' => \Elementor\Controls_Manager::COLOR,
		        'default' => 'rgba(255,255,255,0.3)',
		        // 'condition' => [
		        // 	'icon_color' => 'custom',
		        // ],
		    ]
		);
		$this->add_control(
		    't_3_color_2',
		    [
		        'label' => __( 'Layer 3 second gradient color', 'pixfort-core' ),
		        'type' => \Elementor\Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'condition' => [
		            't_3_is_gradient!' => '',
		        ],
		    ]
		);
		$this->add_control(
		    't_3_animation',
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
		        'condition' => [
		            't_has_animation!' => '',
		        ],
		    ]
		);
		$this->add_control(
		    't_3_delay',
		    [
		        'label' => __( 'Animation delay (in miliseconds)', 'essentials-core' ),
		        'type' => \Elementor\Controls_Manager::TEXT,
		        'default' => __( '0', 'essentials-core' ),
		        'placeholder' => __( '', 'essentials-core' ),
		        'condition' => [
		            't_3_animation!' => '',
		        ],
		    ]
		);

		$this->end_controls_section();

















	}

	protected function render() {
        $settings = $this->get_settings_for_display();
		echo sc_pix_dividers($settings);
	}



	public function get_script_depends() {
		if(is_user_logged_in()) return [ 'pix-global', 'pix-dividers-handle' ];
  		return [];
	  }


}
