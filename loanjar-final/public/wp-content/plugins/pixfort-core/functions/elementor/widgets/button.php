<?php
namespace Elementor;

use Elementor\Controls_Manager;

class Pix_Eor_Button extends Widget_Base {

	public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);

      // wp_register_script( 'pix-button-handle', PIX_CORE_PLUGIN_URI.'functions/elementor/js/badge.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );
   	}

	public function get_name() {
		return 'pix-button';
	}

	public function get_title() {
		return 'Button';
	}

	public function get_icon() {
		return 'eicon-button';
	}

	public function get_categories() {
		return [ 'pixfort' ];
	}

	protected function _register_controls() {
		pix_get_elementor_btn($this);

		$this->start_controls_section(
			'section_element_adv_style',
			[
				'label' => __( 'Advanced Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'elementor' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}} !important;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'heading_inner_typography',
				'selector' => '{{WRAPPER}} .btn, {{WRAPPER}} .btn span, {{WRAPPER}} .btn  .font-weight-bold',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .btn',
			]
		);

		$this->add_responsive_control(
			'badge_padding',
			[
				'label' => __( 'Inner Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);
		
		$this->end_controls_section();


	}

	protected function render() {
        $settings = $this->get_settings_for_display();
		echo sc_pix_button($settings);
	}



	public function get_script_depends() { 
		if(is_user_logged_in()) return [ 'pix-global' ];
  		return [];
	  }


}
