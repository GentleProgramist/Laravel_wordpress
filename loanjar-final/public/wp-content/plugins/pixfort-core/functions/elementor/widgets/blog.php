<?php
namespace Elementor;

class Pix_Eor_Blog extends Widget_Base {

	public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);

      wp_register_script( 'pix-blog-handle', PIX_CORE_PLUGIN_URI.'functions/elementor/js/blog.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );
   	}

	public function get_name() {
		return 'pix-blog';
	}

	public function get_title() {
		return 'Blog';
	}

	public function get_icon() {
		return 'eicon-posts-grid';
	}

	public function get_categories() {
		return [ 'pixfort' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'General', 'essentials-core' ),
			]
		);
		$this->add_control(
			'blog_style',
			[
				'label' => __( 'Style', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => array_flip(array(
					"Default (with dividers)" 	=> '',
                    "Default (with padding & dividers)" 	=> 'padding',
                    "Default (with post types)" 	=> 'default',
                    "Default (with padding & post types)" 	=> 'with-padding',
                    "Full image (with post types)" 	=> 'full-img',
					"Left image (with post types)" 	=> 'left-img',
                    "Right image (with post types)" 	=> 'right-img',
				)),
			]
		);
		$this->add_control(
			'blog_size',
			[
				'label' => __( 'Size', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'lg',
				'options' => array_flip(array(
					"Default (Extended)" 	=> 'lg',
                    "Medium" 	=> 'md',
                    "Small" 	=> 'sm',
				)),
				'condition' => [
					'blog_style' => array('', 'padding', 'default', 'with-padding'),
				],
			]
		);
		$this->add_control(
			'blog_style_box',
			[
				'label' => __( 'Add box style', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => true,
				'default' => false,
				// 'condition' => [
				// 	'blog_style' => array('', 'padding', 'default', 'with-padding'),
				// ],
			]
		);
		$this->add_control(
			'blog_dark_mode',
			[
				'label' => __( 'Use dark mode', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'pix-dark',
				'default' => '',
				'condition' => [
					'blog_style' => array('', 'padding', 'default', 'with-padding'),
				],
			]
		);



		$this->add_control(
			'count',
			[
				'label' => __( 'Posts count', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Number of posts to show', 'elementor' ),
				'default' => '9',
			]
		);
		$this->add_control(
			'items_count',
			[
				'label' => __( 'Items per Line', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 3,
				'options' => [
					"1" 	=> 1,
	                "2" 	=> 2,
	                "3" 	=> 3,
	                "4" 	=> 4,
	                "6" 	=> 6,
				],
			]
		);


		$this->add_control(
			'category',
			[
				'label' => __( 'Category', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => array_flip(pix_get_categories( 'category' )),
			]
		);
		$this->add_control(
			'category_multi',
			[
				'label' => __( 'Multiple Categories', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Categories Slugs separated with coma', 'elementor' ),
				'default' => '',
			]
		);

		$this->add_control(
			'orderby',
			[
				'label' => __( 'Order by', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array_flip(array(
                    __('Date','pix-opts') 	=> 'date',
                    __('Title','pix-opts')	    => 'title',
                    __('Random','pix-opts')	    => 'rand',
                    __('Number of comments','pix-opts')	    => 'comment_count',
                    __('Last modified','pix-opts')	    => 'modified',
                )),
			]
		);
		$this->add_control(
			'order',
			[
				'label' => __( 'Order', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array_flip(array(
					__('DESC','pix-opts') 	=> 'DESC',
                    __('ASC','pix-opts')	    => 'ASC',
                )),
			]
		);


		$this->add_control(
			'pagination',
			[
				'label' => __( 'Show Pagination', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => true,
				'default' => false,
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
			'style',
			[
				'label' => __( 'Shadow Style', 'pixfort-core' ),
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
				'label' => __( 'Shadow Hover Style', 'pixfort-core' ),
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
			'add_hover_effect',
			[
				'label' => __( 'Hover Animation', 'pixfort-core' ),
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
			'divider_section',
			[
				'label' => __( 'Divider', 'pixfort-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => [
					'blog_style' => array('', 'padding'),
				],
			]
		);
		$this->add_control(
			'bottom_divider_select',
			[
				'label' => __( 'Divider Style', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '0',
				'options' => array_flip(array(
					"Disabled" 	=> '0',
					"Dynamic" 	=> 'dynamic',
					"Style 2" 	=> '2',
					"Style 3" 	=> '3',
					"Style 4" 	=> '4',
					"Style 5" 	=> '5',
					"Style 6" 	=> '6',
					"Style 7" 	=> '7',
					"Style 8" 	=> '8',
					"Style 9" 	=> '9',
					"Style 10" 	=> '10',
					"Style 11" 	=> '11',
					"Style 12" 	=> '12',
					"Style 13" 	=> '13',
					"Style 14" 	=> '14',
					"Style 15" 	=> '15',
					"Style 16" 	=> '16',
					"Style 17" 	=> '17',
					"Style 18" 	=> '18',
					"Style 19" 	=> '19',
					"Style 20" 	=> '20',
					"Style 21" 	=> '21',
					"Style 22" 	=> '22',
					"Style 23" 	=> '23',
				)),
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
				'default' => ''
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
				'default' => '#f8f9fa'
			]
		);

		$this->add_control(
			'bottom_moving_divider_color',
			[
				'label' => __( 'Items', 'essentials-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'condition' => [
					'bottom_divider_select' => array('dynamic')
				]
			]

		);

		$this->add_control(
			'bottom_layers',
			[
				'label' => __( 'The number of Layers', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					"1"       => "1 Layer",
                    "2"       => "2 Layer",
                    "3"       => "3 Layer",
				],
				'condition' => [
					'bottom_divider_select' => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24")
				],
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
				'condition' => [
					'blog_style' => array('', 'padding')
				],
			]
		);
		$this->add_control(
			'b_custom_height',
			[
				'label' => __( 'Divider custom height (Optional)', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '', 'essentials-core' ),
				'placeholder' => __( 'Add custom height (with unit, e.g: 200px)', 'essentials-core' ),
			]
		);

		$this->end_controls_section();





	}

	protected function render() {
        $settings = $this->get_settings_for_display();
		echo sc_pix_blog($settings);
	}



	public function get_script_depends() {
		 if(is_user_logged_in()) return [ 'pix-global', 'pix-blog-handle' ];
  		return [];
	  }


}
