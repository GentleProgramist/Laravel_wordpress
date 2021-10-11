<?php
namespace Elementor;

class Pix_Eor_Gallery extends Widget_Base {

	public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);

      wp_register_script( 'pix-gallery-handle', PIX_CORE_PLUGIN_URI.'functions/elementor/js/gallery.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );
   	}

	public function get_name() {
		return 'pix-gallery';
	}

	public function get_title() {
		return 'Gallery';
	}

	public function get_icon() {
		return 'eicon-gallery-justified';
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
			'title', [
				'label' => __( 'Title', 'essentials-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '' , 'essentials-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'desc', [
				'label' => __( 'Image Description', 'essentials-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '' , 'essentials-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'enable_link', [
				'label' => __( 'Use link instead of Lightbox', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
		$repeater->add_control(
			'link', [
				'label' => __( 'Link', 'elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'Link', 'elementor' ),
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => true,
				],
				'placeholder'   => 'http://your-link.com',
				'dynamic'     => array(
					'active'  => true
				),
			]
		);
		$repeater->add_control(
			'pix_color_effect', [
				'label' => __( 'Hover color effect', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'pix-hover-colored',
				'default' => '',
			]
		);
		$repeater->add_control(
			'pix_title_effect', [
				'label' => __( 'Hover title fade in', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'pix-hover-title',
				'default' => '',
			]
		);
		$repeater->add_control(
			'grid_size', [
				'label' => __( 'Item width', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'grid-item',
				'options' => [
					'grid-item' => __( 'Default', 'essentials-core' ),
					'grid-item grid-item--width2' => __( 'Wide', 'essentials-core' )
				]
			]
		);
		$repeater->add_control(
			'gallery_height', [
				'label' => __( 'Item Height', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'pix-gallery-sm',
				'options' => [
					'pix-gallery-sm'		=> 'Default',
					'pix-gallery-lg'		=> 'Tall'
				],
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
			'pix_columns',
			[
				'label' => __( 'Grid columns', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'pix-3-columns',
				'options' => array_flip(array(
                    '3 Columns'		=> 'pix-3-columns',
                    '4 Columns'		=> 'pix-4-columns'
                )),
			]
		);
		$this->add_control(
			'pix_style',
			[
				'label' => __( 'Grid style', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => array_flip(array(
                    'Default (with paddings)'		=> '',
                    'Without paddings'		=> 'gutter-0'
                )),
			]
		);

		$this->add_control(
			'full_size_img',
			[
				'label' => __( 'Enable full size images', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'no',
				'options' => array_flip(array(
                    'No'		=> 'no',
                    'Yes'		=> 'Yes'
                )),
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



		$this->end_controls_section();




		pix_get_elementor_effects($this);



		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Advanced', 'essentials-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
					'title_size' => 'custom',
				],
			]
		);
		$this->add_control(
			'gallery_id',
			[
				'label' => __( 'Gallery ID', 'elementor' ),
				'label_block' => false,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter unique gallery ID', 'elementor' ),
				'default' => 'gallery',
			]
		);

		// $this->add_control(
		// 	'visible_overflow',
		// 	[
		// 		'label' => __( 'Visible overflow', 'essentials-core' ),
		// 		'type' => \Elementor\Controls_Manager::SWITCHER,
		// 		'label_on' => __( 'Yes', 'essentials-core' ),
		// 		'label_off' => __( 'No', 'essentials-core' ),
		// 		'return_value' => 'pix-overflow-all-visible',
		// 		'default' => false,
		// 	]
		// );

		$this->end_controls_section();


	}

	protected function render() {
        $settings = $this->get_settings_for_display();
        // if(!empty($settings['items'])&&is_array($settings['items'])){
        //     foreach ($settings['items'] as $k => $value) {
        //         if(!empty($settings['items'][$k]['link'])&&is_array($settings['items'][$k]['link'])){
        //             if(!empty($settings['items'][$k]['link']['is_external'])){
        //                 $settings['items'][$k]['target'] = $settings['items'][$k]['link']['is_external'];
        //             }
        //             if(!empty($settings['items'][$k]['link']['custom_attributes'])){
        //                 $settings['items'][$k]['link_atts'] = $settings['items'][$k]['link']['custom_attributes'];
        //             }
        //             $settings['items'][$k]['link'] = $settings['items'][$k]['link']['url'];
        //         }
        //     }
        // }

		echo sc_pix_gallery($settings);
	}



	public function get_script_depends() {
		if(is_user_logged_in()) return [ 'pix-global', 'pix-gallery-handle' ];
   		return [];
	  }


}
