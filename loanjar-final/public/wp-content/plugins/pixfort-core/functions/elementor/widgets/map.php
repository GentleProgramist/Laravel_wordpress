<?php
namespace Elementor;

class Pix_Eor_Map extends Widget_Base {

	public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);

      wp_register_script( 'pix-map-handle', PIX_CORE_PLUGIN_URI.'functions/elementor/js/map.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );
   	}

	public function get_name() {
		return 'pix-map';
	}

	public function get_title() {
		return 'Map';
	}

	public function get_icon() {
		return 'eicon-google-maps';
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
			'address',
			[
				'label' => __( 'Map text (Address)', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '', 'essentials-core' ),
				'placeholder' => __( '', 'essentials-core' ),
			]
		);
		$this->add_control(
			'latitude',
			[
				'label' => __( 'Latitude', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '48.892506', 'essentials-core' ),
				'placeholder' => __( '', 'essentials-core' ),
			]
		);
		$this->add_control(
			'longitude',
			[
				'label' => __( 'Longitude', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '2.236413', 'essentials-core' ),
				'placeholder' => __( '', 'essentials-core' ),
			]
		);
		$this->add_control(
			'map_zoom',
			[
				'label' => __( 'Map zoom', 'essentials-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '14', 'essentials-core' ),
				'placeholder' => __( '', 'essentials-core' ),
			]
		);
		$this->add_control(
			'map_style',
			[
				'label' => __( 'Map style', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'silver',
				'options' => array_flip(array(
	                'Silver'		=> 'silver',
	                'Standard'		=> 'standard',
	                'Retro' 		=> 'retro',
	                'Dark' 		    => 'dark',
	                'Night' 		=> 'night',
	                'Aubergine'     => 'aubergine',
	                'Custom' 		=> 'custom'
	            )),
			]
		);

		$this->add_control(
			'custom_color',
			[
				'label' => __( 'Custom color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#1274E7',
				'condition' => [
					'map_style' => 'custom',
				],
			]
		);
		$this->add_control(
			'custom_saturation',
			[
				'label' => __( 'Custom saturation', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '-20',
				'condition' => [
					'map_style' => 'custom',
				],
			]
		);
		$this->add_control(
			'custom_brightness',
			[
				'label' => __( 'Custom brightness', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '5',
				'condition' => [
					'map_style' => 'custom',
				],
			]
		);
		$this->add_control(
			'marker',
			[
				'label' => __( 'Marker Image', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
				]
			]
		);
		$this->add_control(
			'map_height',
			[
				'label' => __( 'Map height', 'essentials-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
	                ""  => "Big",
	                "map-md" => "Medium",
	                "map-sm" => "Small",
	               "full-height"       => "Full height",
	           ),
			]
		);



		$this->end_controls_section();

		$this->start_controls_section(
			'advanced_section',
			[
				'label' => __( 'Advanced', 'pixfort-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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
		$this->add_control(
			'extra_classes',
			[
				'label' => __( 'Extra Classes', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( '', 'elementor' ),
				'default' => '',
			]
		);

		$this->end_controls_section();

			pix_get_elementor_effects($this);


	}

	protected function render() {
        $settings = $this->get_settings_for_display();
		echo sc_pix_map($settings);
	}



	public function get_script_depends() {
		if(is_user_logged_in()) return [ 'pix-global', 'pix-map-handle' ];
       	return [];
	  }


}
