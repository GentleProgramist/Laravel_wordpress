<?php
namespace Elementor;

class Pix_Eor_Vertical_Tabs extends Widget_Base {

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);

		wp_register_script( 'pix-text-tabs-handle', PIX_CORE_PLUGIN_URI.'functions/elementor/js/tabs.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );
	}

	public function get_name() {
		return 'pix-vertical-tabs';
	}

	public function get_title() {
		return 'Vertical Tabs';
	}

	public function get_icon() {
		return 'eicon-thumbnails-right';
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







		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Content', 'elementor' ),
			]
		);


		$this->add_control(
			'badge_text',
			[
				'label' => __( 'Badge text', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Badge text', 'elementor' ),
				'default' => '',
				'dynamic'     => array(
					'active'  => true
				),
			]
		);
		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Title text', 'elementor' ),
				'default' => '',
				'dynamic'     => array(
					'active'  => true
				),
			]
		);

		$this->add_control(
			'text_content',
			[
				'label' => __( 'Content', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => __( '', 'elementor' ),
				'default' => '',
				'dynamic'     => array(
					'active'  => true
				),
			]
		);


		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'title', [
				'label' => __( 'Title', 'essentials-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '' , 'essentials-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'media_type', [
				'label' => __( 'Use Icon', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'icon',
				'default' => '',
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
		$repeater->add_control(
			'content', [
				'label' => __( 'Content', 'essentials-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => __( '' , 'essentials-core' ),
			]
		);
		$repeater->add_control(
			'transition', [
				'label' => __( 'Transition', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					''			=> 'None',
					'fade'			=> 'Fade',
					'fade-left'			=> 'Fade Left',
					'fade-right'		=> 'Fade Right',
					'fade-up' 		=> 'Fade Up',
					'fade-down' 		=> 'Fade Down',
				),
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
			'is_sticky',
			[
				'label' => __( 'Sticky content', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'sticky-top',
				'default' => '',
			]
		);
		$this->add_control(
			'menu_position',
			[
				'label' => __( 'Menu Position', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip(array(
					__('Left','pix-opts') 	=> 'left',
					__('Right','pix-opts')	    => 'right'
				)),
				'default' => 'left',
			]
		);





		$this->add_control(
			'tabs_style',
			[
				'label' => __( 'Style', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'pix-pills-1'		=> 'Default (Gradient)',
					'pix-pills-solid'			=> 'Solid',
					'pix-pills-light'			=> 'Light',
					'pix-pills-outline'			=> 'Outline',
					'pix-pills-line'			=> 'Line',
					'pix-pills-round'			=> 'Round',
					'pix-pills-lines'			=> 'Lines',
				),
				'default' => 'pix-pills-1',
			]
		);
		$this->add_control(
			'padding_menu',
			[
				'label' => __( 'Padding before menu', 'elementor' ),
				'label_block' => false,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Please input the value (with the unit: px,.. etc).', 'elementor' ),
				'default' => '',
			]
		);

		$this->add_control(
			'tabs_content_align',
			[
				'label' => __( 'Content align', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					''		=> 'Default (inherit from parent element)',
					'text-left'			=> 'Left',
					'text-center'			=> 'Center',
					'text-right'			=> 'Right',
				),
				'default' => '',
			]
		);



		$this->add_control(
			'el_class',
			[
				'label' => __( 'Extra class names', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( '', 'elementor' ),
				'default' => '',
			]
		);



		$this->end_controls_section();





		$this->start_controls_section(
			'section_badge',
			[
				'label' => __( 'Badge Style', 'elementor' ),
			]
		);


		$this->add_control(
			'badge_bold',
			[
				'label' => __( 'Bold', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'font-weight-bold',
				'default' => '',
			]
		);
		$this->add_control(
			'badge_italic',
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
			'badge_secondary_font',
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
			'badge_text_color',
			[
				'label' => __( 'Text color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors),
				'default' => 'primary',
			]
		);
		$this->add_control(
			'badge_text_custom_color',
			[
				'label' => __( 'Custom Text color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'text_color' => 'custom',
				],
			]
		);
		$this->add_control(
			'badge_bg_color',
			[
				'label' => __( 'Background color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($bg_colors),
				'default' => 'primary-light',
			]
		);
		$this->add_control(
			'badge_custom_bg_color',
			[
				'label' => __( 'Custom Background color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'bg_color' => 'custom',
				],
			]
		);
		$this->add_control(
			'badge_text_size',
			[
				'label' => __( 'Text size', 'pixfort-core' ),
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
				'default' => 'h5',
			]
		);
		$this->add_control(
			'badge_text_custom_size',
			[
				'label' => __( 'Custom Text size', 'elementor' ),
				'label_block' => false,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter custom title size', 'elementor' ),
				'default' => '',
				'condition' => [
					'badge_text_size' => 'custom',
				],
			]
		);


		$this->end_controls_section();


		$this->start_controls_section(
			'section_tabs_title_text',
			[
				'label' => __( 'Title Style', 'elementor' ),
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
				'default' => '',
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
				'default' => 'primary',
			]
		);
		$this->add_control(
			'title_custom_color',
			[
				'label' => __( 'Custom Text color', 'pixfort-core' ),
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
				'default' => 'h4',
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
			'padding_title',
			[
				'label' => __( 'Padding before title', 'elementor' ),
				'label_block' => false,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Please input the value (with the unit: px,.. etc).', 'elementor' ),
				'default' => '',
			]
		);


		$this->end_controls_section();




		$this->start_controls_section(
			'section_tabs_content_text',
			[
				'label' => __( 'Content Style', 'elementor' ),
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
				'label' => __( 'Custom Content color', 'pixfort-core' ),
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
				'default' => '',
			]
		);
		$this->add_control(
			'position',
			[
				'label' => __( 'Position', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'text-left'			=> 'Left',
					'text-center'		=> 'Center',
					'text-right' 		=> 'Right',
				),
				'default' => 'text-left',
			]
		);

		$this->add_control(
			'padding_content',
			[
				'label' => __( 'Padding before Content', 'elementor' ),
				'label_block' => false,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Please input the value (with the unit: px,.. etc).', 'elementor' ),
				'default' => '',
			]
		);


		$this->end_controls_section();




		$this->start_controls_section(
			'section_tabs_title',
			[
				'label' => __( 'Tabs Title', 'elementor' ),
			]
		);

		// Title format
		$this->add_control(
			'tabs_bold',
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
			'tabs_italic',
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
			'tabs_secondary_font',
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





		$this->start_controls_section(
			'section_element_style',
			[
				'label' => __( 'Inactive Items Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'tabs_text_typography',
				'selector' => '{{WRAPPER}} .nav-item a:not(.active)',
			]
		);

		$this->add_responsive_control(
			'tabs_custom_colors',
			[
				'label' => __( 'Custom Text color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .nav-item a:not(.active)' => 'color: {{VALUE}};',
				],
				'dynamic'     => array(
                    'active'  => true
                ),
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'tabs_text_shadow',
				'selector' => '{{WRAPPER}} .nav-item a:not(.active)',
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_element_active_style',
			[
				'label' => __( 'Active Item Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'tabs_active_typography',
				'selector' => '{{WRAPPER}} .nav-item a.active',
			]
		);

		$this->add_responsive_control(
			'tabs_active_custom_colors',
			[
				'label' => __( 'Custom Text color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .nav-item a.active' => 'color: {{VALUE}};',
				],
				'dynamic'     => array(
                    'active'  => true
                ),
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'tabs_active_shadow',
				'selector' => '{{WRAPPER}} .nav-item a.active',
			]
		);
		
		$this->add_responsive_control(
			'tabs_active_custom_bg',
			[
				'label' => __( 'Custom Background color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .nav-item a.active' => 'background: {{VALUE}};',
				],
				'dynamic'     => array(
                    'active'  => true
                ),
			]
		);


		$this->end_controls_section();





	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		echo sc_pix_v_text_tabs($settings);
	}

	// protected function _content_template() {

	// }

	public function get_script_depends() {
		if(is_user_logged_in()) return [ 'pix-global', 'pix-text-tabs-handle' ];
		return [];
	}


}
