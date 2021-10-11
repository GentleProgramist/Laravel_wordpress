<?php

if( !defined( 'ABSPATH' ) ) exit;
use Elementor\Controls_Manager;

class PixSection {

  public function __construct(){
    add_action('elementor/frontend/section/before_render', array($this, 'before_render'), 1);
    add_action('elementor/element/section/section_layout/after_section_end',array($this,'register_controls'), 1 );
  }

  public function register_controls($element)
  {
    $element->start_controls_section('pix_drop_animation_section',
      [
        'label' => __('<div style="float: right"></div> PIX Animation', 'pixfort-core'),
        'tab' => Controls_Manager::TAB_LAYOUT
      ]
    );

    $element->add_control('pix_enable_drop_animation',
      [
        'label' => esc_html__('Enable Drops Animation', 'pixfort-core'),
        'type' => Controls_Manager::SWITCHER,
      ]
    );

    $element->add_control(
      'pix_drop_animation_types',
      [
        'label' => esc_html__('Shape Type', 'pixfort-core'),
        'type' => Controls_Manager::SELECT,
        'default' => 'dotWithLine',
        'options' => [
          'dotWithLine' => esc_html__('Dot With Line', 'pixfort-core'),
          'onlyLine' => esc_html__('Only Line', 'pixfort-core'),
          'onlyDot' => esc_html__('Only Dot', 'pixfort-core'),
          'candleShape' => esc_html__('Candle Shape', 'pixfort-core')
        ],
        'condition' => [
          'pix_enable_drop_animation' => 'yes'
        ]
      ]
    );

    $element->add_control(
      'pix_drop_animation_line_color',
      [
        'label' => esc_html__('Line Color First', 'pixfort-core'),
        'type' => Controls_Manager::COLOR,
        'default' => '#3f87b1',
        'condition' => [
          'pix_enable_drop_animation' => 'yes',
          'pix_drop_animation_types!' => 'onlyDot',
        ]
      ]
    );

    $element->add_control(
      'pix_drop_animation_line_color_second',
      [
        'label' => esc_html__('Line Color Second', 'pixfort-core'),
        'type' => Controls_Manager::COLOR,
        'default' => '#dedede',
        'condition' => [
          'pix_enable_drop_animation' => 'yes',
          'pix_drop_animation_types!' => 'onlyDot',
        ]
      ]
    );

    $element->add_control(
      'pix_drop_animation_drop_dot_color',
      [
        'label' => esc_html__('Dot Color', 'pixfort-core'),
        'type' => Controls_Manager::COLOR,
        'default' => '#0851ff',
        'condition' => [
          'pix_enable_drop_animation' => 'yes',
          'pix_drop_animation_types!' => 'onlyLine'
        ]
      ]
    );

    $element->add_control(
      'pix_drop_animation_drop_dot_size',
      [
        'label' => esc_html__('Dot Size', 'pixfort-core'),
        'type' => Controls_Manager::NUMBER,
        'default' => 0.9,
        'min' => 0,
        'max' => 2,
        'step' => 0.1,
        'condition' => [
          'pix_enable_drop_animation' => 'yes',
          'pix_drop_animation_types!' => ['onlyLine','candleShape']
        ]
      ]
    );

    $element->add_control(
      'pix_drop_animation_drop_speed',
      [
        'label' => esc_html__('Speed', 'pixfort-core'),
        'type' => Controls_Manager::NUMBER,
        'default' => 4,
        'min' => 1,
        'max' => 10,
        'step' => 1,
        'condition' => [
          'pix_enable_drop_animation' => 'yes'
        ]
      ]
    );

    $element->end_controls_section();

  }

  public function before_render($element) {
    $settings = $element->get_settings();

    if ($settings['pix_enable_drop_animation'] === 'yes') {
      $element->add_render_attribute(
        '_wrapper',
        [
          'data-pix_enable_drop_animation' => 'true',
          'data-pix_drop_animation_types' => $settings['pix_drop_animation_types'],
          'data-pix_drop_animation_line_color' => $settings['pix_drop_animation_line_color'],
          'data-pix_drop_animation_line_color_second' => $settings['pix_drop_animation_line_color_second'],
          'data-pix_drop_animation_drop_dot_color' => $settings['pix_drop_animation_drop_dot_color'],
          'data-pix_drop_animation_drop_dot_size' => $settings['pix_drop_animation_drop_dot_size'],
          'data-pix_drop_animation_drop_speed' => $settings['pix_drop_animation_drop_speed'],
        ]
      );
    } else {
      $element->add_render_attribute('_wrapper', 'data-pix_enable_drop_animation', 'false');
    }
  }
}
