<?php
namespace Elementor;

class Pix_Eor_Alert extends Widget_Base {

	public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);

      // wp_register_script( 'pix-alert-handle', PIX_CORE_PLUGIN_URI.'functions/elementor/js/alert.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );
   	}

	public function get_name() {
		return 'pix-alert';
	}

	public function get_title() {
		return 'Alert';
	}

	public function get_icon() {
		return 'eicon-alert';
	}

	public function get_categories() {
		return [ 'pixfort' ];
	}

	protected function _register_controls() {

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
				'placeholder' => __( 'Enter your title', 'elementor' ),
				'default' => 'Alert title',
				'dynamic'     => array(
                    'active'  => true
                ),
			]
		);

		$this->add_control(
			'alert_type_1',
			[
				'label' => __( 'Alert Type', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::SELECT,
				'options' => [
					'success'		=> 'Success',
	                'secondary'		=> 'Secondary',
	                'primary' 		=> 'Primary',
	                'danger' 		=> 'Danger',
	                'warning' 		=> 'Warning',
	                'info' 		    => 'Info',
	                'light' 		=> 'Light',
	                'dark' 		    => 'Dark'
				],
				'default' => 'success',
			]
		);

		$this->add_control(
			'shadow',
			[
				'label' => __( 'Show shadow', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'1' => [
						'title' => __( 'Yes', 'pixfort-core' ),
						'icon' => 'fa fa-check',
					],
					'0' => [
						'title' => __( 'No', 'pixfort-core' ),
						'icon' => 'fa fa-times',
					]
				],
				'default' => '1',
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_element_style',
			[
				'label' => __( 'Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'alert_inner_typography',
				'selector' => '{{WRAPPER}}, {{WRAPPER}} .heading-text span, {{WRAPPER}} .body-font, {{WRAPPER}} .secondary-font',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}}',
			]
		);
		
		$this->end_controls_section();

	}

	protected function render() {
        $settings = $this->get_settings_for_display();
		echo pf_alertblock($settings);
	}



	public function get_script_depends() {
		if(is_user_logged_in()) return [ 'pix-global' ];
 		return [];
	  }


}
