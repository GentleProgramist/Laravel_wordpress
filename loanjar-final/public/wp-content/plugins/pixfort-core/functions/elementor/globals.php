<?php

namespace Elementor;

use Elementor\Controls_Manager;

function pix_get_elementor_btn($that){


    $colors = array(
        "Body default"			=> "body-default",
        "Heading default"		=> "heading-default",
        "Primary"				=> "primary",
        "Primary Gradient"		=> "gradient-primary",
        "Secondary"				=> "secondary",
        "Secondary Light"	    => "secondary-light",
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

    $popup_posts = get_posts([
      'post_type' => 'pixpopup',
      'post_status' => 'publish',
      'numberposts' => -1
    ]);

    $popups = array();
    $popups[''] = "Disabled";
    foreach ($popup_posts as $key => $value) {
        $popups[$value->ID] = $value->post_title;
    }




    $that->start_controls_section(
        'section_button',
        [
            'label' => __( 'Button Settings', 'elementor' ),
        ]
    );

    $that->add_control(
        'is_elementor',
        [
            'label' => __( 'elementor button', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::HIDDEN,
            'default' => 'true',
        ]
    );

    $that->add_control(
        'btn_text',
        [
            'label' => __( 'Button Text', 'elementor' ),
            'label_block' => true,
            'type' => Controls_Manager::TEXT,
            'placeholder' => __( 'Button text', 'elementor' ),
            'default' => 'Click here',
            'dynamic'     => array(
                'active'  => true
            ),
        ]
    );
    $that->add_control(
        'btn_link',
        [
            'label' => __( 'Button Link', 'elementor' ),
            'label_block' => true,
            'type' => Controls_Manager::TEXT,
            'placeholder' => __( 'Button Link', 'elementor' ),
            'default' => '',
        ]
    );
    $that->add_control(
        'btn_target',
        [
            'label' => __( 'Open in a new tab', 'essentials-core' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'essentials-core' ),
            'label_off' => __( 'No', 'essentials-core' ),
            'return_value' => 'true',
            'default' => '',
            'condition' => [
                'btn_link!' => ''
            ],
        ]
    );
    $that->add_control(
        'btn_popup_id',
        [
            'label' => __( 'Open Popup instead of link', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => $popups,
            'default' => '',
        ]
    );

    $that->add_control(
        'btn_title_bold',
        [
            'label' => __( 'Bold', 'essentials-core' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'essentials-core' ),
            'label_off' => __( 'No', 'essentials-core' ),
            'return_value' => 'font-weight-bold',
            'default' => 'font-weight-bold',
        ]
    );
    $that->add_control(
        'btn_italic',
        [
            'label' => __( 'Italic', 'essentials-core' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'essentials-core' ),
            'label_off' => __( 'No', 'essentials-core' ),
            'return_value' => 'font-italic',
            'default' => '',
        ]
    );
    $that->add_control(
        'btn_secondary_font',
        [
            'label' => __( 'Secondary font', 'essentials-core' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'essentials-core' ),
            'label_off' => __( 'No', 'essentials-core' ),
            'return_value' => 'secondary-font',
            'default' => '',
        ]
    );
    $that->add_control(
        'btn_style',
        [
            'label' => __( 'Button Style', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => array(
               ""            => "Default",
               "flat"        => "Flat",
               "line"        => "Line",
               "outline"     => "Outline",
               "underline"     => "Underline",
               "link"        => "Link",
               "blink"     => "Blink"
           ),
            'default' => '',
        ]
    );
    $that->add_control(
        'btn_color',
        [
            'label' => __( 'Button Color', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'primary' 		=> 'Primary',
                'primary-light' 		=> 'Primary Light',
                // 'success'		=> 'Success',
                'secondary'		=> 'Secondary',
                'gray-1' 		=> 'Light',
                'gray-5' 		    => 'Dark',
                'black' 		=> 'Black',
                // 'link' 		    => 'Link',
                'white' 		=> 'White',
                'blue' 		    => 'Blue',
                'red' 		    => 'Red',
                'cyan' 		    => 'Cyan',
                'orange' 		    => 'Orange',
                'green' 		    => 'Green',
                'purple' 		    => 'Purple',
                'brown' 		    => 'Brown',
                'yellow' 		    => 'Yellow',
                'gradient-primary' 		    => 'Primary gradient',
                "gray-1" => 'Gray 1',
                "gray-2" => 'Gray 2',
                "gray-3" => 'Gray 3',
                "gray-4" => 'Gray 4',
                "gray-5" => 'Gray 5',
                "gray-6" => 'Gray 6',
                "gray-7" => 'Gray 7',
                "gray-8" => 'Gray 8',
                "gray-9" => 'Gray 9',
                "dark-opacity-1" => 'Dark opacity 1',
                "dark-opacity-2" => 'Dark opacity 2',
                "dark-opacity-3" => 'Dark opacity 3',
                "dark-opacity-4" => 'Dark opacity 4',
                "dark-opacity-5" => 'Dark opacity 5',
                "dark-opacity-6" => 'Dark opacity 6',
                "dark-opacity-7" => 'Dark opacity 7',
                "dark-opacity-8" => 'Dark opacity 8',
                "dark-opacity-9" => 'Dark opacity 9',
                "light-opacity-1" => 'Light opacity 1',
                "light-opacity-2" => 'Light opacity 2',
                "light-opacity-3" => 'Light opacity 3',
                "light-opacity-4" => 'Light opacity 4',
                "light-opacity-5" => 'Light opacity 5',
                "light-opacity-6" => 'Light opacity 6',
                "light-opacity-7" => 'Light opacity 7',
                "light-opacity-8" => 'Light opacity 8',
                "light-opacity-9" => 'Light opacity 9'

            ),
            'default' => 'primary',
        ]
    );

    $that->add_control(
        'btn_remove_padding',
        [
            'label' => __( 'Remove padding', 'essentials-core' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'essentials-core' ),
            'label_off' => __( 'No', 'essentials-core' ),
            'return_value' => 'no-padding',
            'default' => '',
            'condition' => [
                'btn_style' => array("link", "underline")
            ],
        ]
    );
    $that->add_control(
        'btn_text_color',
        [
            'label' => __( 'Text color', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => array_flip(array_merge(array("Default" => "",), $colors)),
            'default' => '',
        ]
    );
    $that->add_control(
        'btn_text_custom_color',
        [
            'label' => __( 'Text custom color', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'condition' => [
                'btn_text_color' => 'custom',
            ],
        ]
    );
    $that->add_control(
        'btn_size',
        [
            'label' => __( 'Button Size', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => array(
               "sm"       => "Small",
               "normal"       => "Normal",
               "md"       => "Medium",
               "lg"       => "Large",
               "xl"       => "XLarge "
           ),
            'default' => 'md',
        ]
    );
    $that->add_control(
        'btn_rounded',
        [
            'label' => __( 'Rounded corners button', 'essentials-core' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'essentials-core' ),
            'label_off' => __( 'No', 'essentials-core' ),
            'return_value' => 'btn-rounded',
            'default' => '',
        ]
    );
    $that->add_control(
        'btn_effect',
        [
            'label' => __( 'Button shadow', 'pixfort-core' ),
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
    $that->add_control(
        'btn_hover_effect',
        [
            'label' => __( 'Button Shadow Hover Style', 'pixfort-core' ),
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
    $that->add_control(
        'btn_add_hover_effect',
        [
            'label' => __( 'Button Hover Animation', 'pixfort-core' ),
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
    $that->add_control(
        'btn_icon',
        [
            'label' => esc_html__('Button Icon', 'text-domain'),
            'type' => \Elementor\CustomControl\FonticonSelector_Control::FonticonSelector,
            'options'	=> $fontiocns_opts,
            'default' => '',
        ]
    );
    // require PIX_CORE_PLUGIN_DIR.'/functions/images/icons_list.php';
    // $due_opts = array();
    // foreach ($pix_icons_list as $key) {
    //     $due_opts[$key] = array(
    //         'title'	=> $key,
    //         'url'	=> PIX_CORE_PLUGIN_URI.'functions/images/icons/'.$key.'.svg'
    //     );
    // }
    // $that->add_control(
    //     'pix_duo_icon',
    //     [
    //         'label' => esc_html__('Icon', 'text-domain'),
    //         'type' => \Elementor\CustomControl\IconSelector_Control::IconSelector,
    //         'options'	=> $due_opts,
    //         'default' => '',
    //         'condition' => [
    //             'media_type' => 'duo_icon',
    //         ],
    //     ]
    // );

    $that->add_control(
        'btn_icon_position',
        [
            'label' => __( 'Icon position', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                ""            => "Before text (left)",
                "after"        => "After text (right)"
            ),
            'default' => '',
            'conditions' => [
                'terms' => [
                       [
                           'name' => 'btn_icon',
                           'operator' => '!=',
                           'value' => ''
                       ]
                   ]
            ],
        ]
    );
    $that->add_control(
        'btn_icon_animation',
        [
            'label' => __( 'Icon animation', 'essentials-core' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'essentials-core' ),
            'label_off' => __( 'No', 'essentials-core' ),
            'return_value' => 'yes',
            'default' => '',
            'conditions' => [
                'terms' => [
                       [
                           'name' => 'btn_icon',
                           'operator' => '!=',
                           'value' => ''
                       ]
                   ]
            ],
        ]
    );
    $that->add_control(
        'btn_full',
        [
            'label' => __( 'Full width Button', 'essentials-core' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'essentials-core' ),
            'label_off' => __( 'No', 'essentials-core' ),
            'return_value' => 'yes',
            'default' => '',
        ]
    );
    $that->add_control(
        'btn_text_align',
        [
            'label' => __( 'Button Text Align', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'text-center' 		=> 'Center',
                'text-left' 		=> 'Left',
                'text-right' 		=> 'Right',
            ),
            'default' => '',
            'conditions' => [
                'terms' => [
                       [
                           'name' => 'btn_full',
                           'operator' => '!=',
                           'value' => ''
                       ]
                   ]
            ],
        ]
    );
    $that->add_control(
        'btn_div',
        [
            'label' => __( 'Button inside a container', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                '' 		=> 'Disabled',
                'text-center' 		=> 'Center align',
                'text-left' 		=> 'Left align',
                'text-right' 		=> 'Right align',
            ),
            'default' => '',
        ]
    );




    $that->add_control(
        'btn_animation',
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
    $that->add_control(
        'btn_anim_delay',
        [
            'label' => __( 'Animation delay (in miliseconds)', 'essentials-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( '0', 'essentials-core' ),
            'placeholder' => __( '', 'essentials-core' ),
            'condition' => [
                'btn_animation!' => '',
            ],
        ]
    );

    $that->add_control(
        'btn_extra_classes',
        [
            'label' => __( 'Extra Classes', 'elementor' ),
            'label_block' => true,
            'type' => Controls_Manager::TEXT,
            'placeholder' => __( '', 'elementor' ),
            'default' => '',
        ]
    );


    $that->end_controls_section();


}


function pix_get_elementor_effects( $that ){


        $that->start_controls_section(
            'section_pix_effects',
            [
                'label' => __( 'Effects Settings', 'elementor' ),
            ]
        );

    $that->add_control(
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
    $that->add_control(
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
    $that->add_control(
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





        $that->end_controls_section();
}
