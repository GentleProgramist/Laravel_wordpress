<?php
namespace Elementor;

class Pix_Eor_Horizontal_Tabs extends Widget_Base {

	public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);

      wp_register_script( 'pix-text-tabs-handle', PIX_CORE_PLUGIN_URI.'functions/elementor/js/tabs.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );
   	}

	public function get_name() {
		return 'pix-horizontal-tabs';
	}

	public function get_title() {
		return 'Horizontal Tabs';
	}

	public function get_icon() {
		return 'eicon-tabs';
	}

	public function get_categories() {
		return [ 'pixfort' ];
	}

	protected function _register_controls() {




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
			'is_fill',
			[
				'label' => __( 'Full width buttons', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'essentials-core' ),
				'label_off' => __( 'No', 'essentials-core' ),
				'return_value' => 'nav-fill',
				'default' => '',
			]
		);



		$this->add_control(
			'position',
			[
				'label' => __( 'Position', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
                    'justify-content-center'		=> 'Center',
                    'justify-content-start'			=> 'Left',
                    'justify-content-end' 		=> 'Right',
                ),
				'default' => 'justify-content-center',
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



		$this->add_control(
			'tabs_icon_position',
			[
				'label' => __( 'Icons position', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
                       ""           => "Before text",
                       "top"        => "Top"
                   ),
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
		echo sc_pix_h_text_tabs($settings);
	}



	public function get_script_depends() {
		if(is_user_logged_in()) return [ 'pix-global', 'pix-text-tabs-handle' ];
     	return [];
	  }


}
