<?php
namespace Elementor;

class Pix_Eor_Feature_List extends Widget_Base {

	public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);

      // wp_register_script( 'pix-feature-list-handle', PIX_CORE_PLUGIN_URI.'functions/elementor/js/feature-list.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );
   	}

	public function get_name() {
		return 'pix-feature-list';
	}

	public function get_title() {
		return 'Features List';
	}

	public function get_icon() {
		return 'eicon-post-list';
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
			'icon_color',
			[
				'label' => __( 'Icon color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors),
				'default' => 'primary',
			]
		);
		$this->add_control(
			'custom_icon_color',
			[
				'label' => __( 'Custom Icon Color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'icon_color' => 'custom',
				],
			]
		);
		require PIX_CORE_PLUGIN_DIR.'/functions/images/icons_list.php';
		$due_opts = array();
		foreach ($pix_icons_list as $key) {
			$due_opts[$key] = array(
				'title'	=> $key,
				'url'	=> PIX_CORE_PLUGIN_URI.'functions/images/icons/'.$key.'.svg'
			);
		}

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


		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'text', [
				'label' => __( 'Text', 'essentials-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '' , 'essentials-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'link',
			[
				'label' => __( 'Link (Optional)', 'elementor' ),
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
                )
			]
		);
		$repeater->add_control(
			'media_type', [
				'label' => __( 'Icon type', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'icon',
				'options' => array_flip(array(
					"Icon" => "icon",
					"Duo tone icon" => "duo_icon",
				)),
			]
		);
		$repeater->add_control(
			'pix_duo_icon', [
				'label' => esc_html__('Icon', 'text-domain'),
				'type' => \Elementor\CustomControl\IconSelector_Control::IconSelector,
				'options'	=> $due_opts,
				'default' => '',
				'condition' => [
					'media_type' => 'duo_icon',
				],
			]
		);
		$repeater->add_control(
			'icon', [
				'label' => esc_html__('Icon', 'text-domain'),
				'type' => \Elementor\CustomControl\FonticonSelector_Control::FonticonSelector,
				'options'	=> $fontiocns_opts,
				'default' => '',
				'condition' => [
					'media_type' => 'icon',
				],
			]
		);

		$this->add_control(
			'features',
			[
				'label' => __( 'Events', 'essentials-core' ),
				'type' => Controls_Manager::REPEATER,
				'title_field' => '{{{ text }}}',
				'fields' => $repeater->get_controls()
			]
		);



		$this->add_control(
			'features_content_align',
			[
				'label' => __( 'Content align', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					''			=> 'Default',
					'text-left'			=> 'Left',
					'text-center'		=> 'Center',
					'text-right' 		=> 'Right',
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
				'label' => __( 'Text format', 'pixfort-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
			'flist_bold',
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
			'flist_italic',
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
			'flist_secondary_font',
			[
				'label' => __( 'Secondary font', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'secondary-font',
				'default' => '',
			]
		);


		$this->end_controls_section();








	}

	protected function render() {
        $settings = $this->get_settings_for_display();
		echo sc_pix_feature_list($settings);
	}



	public function get_script_depends() {
		if(is_user_logged_in()) return [ 'pix-global' ];
   		return [];
	  }


}
