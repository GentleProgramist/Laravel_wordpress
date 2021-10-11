<?php
namespace Elementor;

class Pix_Eor_Portfolio extends Widget_Base {

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);

		wp_register_script( 'pix-portfolio-handle', PIX_CORE_PLUGIN_URI.'functions/elementor/js/portfolio.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );
	}

	public function get_name() {
		return 'pix-portfolio';
	}

	public function get_title() {
		return 'Portfolio';
	}

	public function get_icon() {
		return 'eicon-gallery-masonry';
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

		$this->add_control(
			'portfolio_style',
			[
				'label' => __( 'Style', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => array_flip(array(
					"Default" 	    => '',
					"Mini" 	        => 'mini',
					"Transparent" 	=> 'transparent',
					"3D"        	=> '3d',
				)),
			]
		);

		$this->add_control(
			'count',
			[
				'label' => __( 'Count', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Number of posts to show', 'elementor' ),
				'default' => '6',
			]
		);


		$this->add_control(
			'line_count',
			[
				'label' => __( 'Items per line', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '4',
				'options' => [
					"6" 	    => "2 items",
					"4" 	    => "3 items",
					"3" 	    => "4 items",
					"2"        	=> "6 items",
				],
			]
		);
		$this->add_control(
			'category',
			[
				'label' => __( 'Category', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Portfolio Category slug', 'elementor' ),
				'default' => '',
			]
		);

		// $this->add_control(
		// 	'style',
		// 	[
		// 		'label' => __( 'Style', 'essentials-core' ),
		// 		'type' => Controls_Manager::SELECT,
		// 		'default' => 'normal',
		// 		'options' => [
		// 			'normal'			=> 'Normal',
		// 			'flat'			=> 'Flat',
		// 			'flatbox'			=> 'FlatBox',
		// 			'masonry-normal'		=> 'Masonry Normal',
		// 			'masonry-flat'	=> 'Masonry Flat',
		// 			'masonry-flatbox'	=> 'Masonry FlatBox',
		// 		],
		// 	]
		// );


		// $this->add_control(
		// 	'category',
		// 	[
		// 		'label' => __( 'Category', 'essentials-core' ),
		// 		'type' => Controls_Manager::SELECT,
		// 		'default' => 'rounded-0',
		// 		'options' => array_flip(pix_get_categories( 'category' )),
		// 	]
		// );
		// $this->add_control(
		// 	'category_multi',
		// 	[
		// 		'label' => __( 'Multiple Categories', 'elementor' ),
		// 		'label_block' => true,
		// 		'type' => Controls_Manager::TEXT,
		// 		'placeholder' => __( 'Categories Slugs separated with coma', 'elementor' ),
		// 		'default' => '',
		// 	]
		// );


		$this->add_control(
			'orderby',
			[
				'label' => __( 'Order by', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'date'			=> 'Date',
					'menu_order' 	=> 'Menu order',
					'title'			=> 'Title',
					'rand'			=> 'Random',
				],
			]
		);
		$this->add_control(
			'order',
			[
				'label' => __( 'Order', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'DESC' 	=> 'Descending',
					'ASC' 	=> 'Ascending',
				],
			]
		);

		$this->add_control(
			'filters',
			[
				'label' => __( 'Show Filters', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 1,
				'default' => 1,

			]
		);
		$this->add_control(
			'filter_light',
			[
				'label' => __( 'Light filter buttons color', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'is-dark',
				'default' => '',

			]
		);
		$this->add_control(
			'filters_align',
			[
				'label' => __( 'Filters Align', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'center',
				'options' => [
					'center'			=> 'Center',
					'left'			=> 'Left',
					'right'			=> 'Right',
				],
			]
		);
		$this->add_control(
			'full_size_img',
			[
				'label' => __( 'Display full size images', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'yes',
				'default' => '',

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
			'pagination',
			[
				'label' => __( 'Show Pagination', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 1,
				'default' => 0,

			]
		);



		// Styling
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Title color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors),
				'default' => 'heading-default',
				'condition' => [
					'portfolio_style' => array('transparent', "3d")
				],
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
			'overlay_color',
			[
				'label' => __( 'Overlay color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($bg_colors),
				'default' => 'black',
				'condition' => [
					'portfolio_style' => '3d',
				],
			]
		);
		$this->add_control(
			'custom_overlay_color',
			[
				'label' => __( 'content_custom_color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'overlay_color' => 'custom',
				],
			]
		);




		$this->end_controls_section();






	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		echo sc_pix_portfolio($settings);
	}

	// protected function _content_template() {

	// }

	public function get_script_depends() {

		if(is_user_logged_in()) return [ 'pix-global', 'pix-portfolio-handle' ];
		return [];
	}


}
