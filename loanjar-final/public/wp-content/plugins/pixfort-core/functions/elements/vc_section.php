<?php
vc_add_params('vc_section', array(
    // array(
    //   "type" => "checkbox",
    //   "heading" => __( "Show top divider", "pix-opts" ),
    //   "param_name" => "divider",
    //   "value" => __( "1", "pix-opts" ),
    //   "description" => __( "Add divider style to the top of the section.", "pix-opts" )
    // ),


    array (
        'param_name' 	=> 'section_name',
        'type' 			=> 'textfield',
        'heading' 		=> __('Section name', 'pixfort-core'),
        'admin_label'	=> true,
    ),


    array(
        "type" => "dropdown",
        "heading" => __("Gradient background", "pix-opts"),
        "param_name" => "pix_bg_grdient",
        "value" => array_flip(array(
            "" 			=> "No",
            "bg-gradient-primary" 			=> "Primary gradient",
            "bg-gradient-dark" 			=> "Dark gradient",
        )),
    ),
    array (
        'param_name' 	=> 'fade_in_intro',
        'type' 			=> 'attach_image',
        'heading' 		=> __('Fade in Background Image', 'pixfort-core'),
        'admin_label'	=> false,
        "description" => __( "The overlay color should be added from the Design options tab.", "pix-opts")
    ),

    array(
        "type" => "dropdown",
        "heading" => __("Image opacity", "pix-opts"),
        "param_name" => "fade_in_opacity",
        "value" => array_flip(array(
            "pix-opacity-10" 			=> "100%",
            "pix-opacity-9" 			=> "90%",
            "pix-opacity-8" 			=> "80%",
            "pix-opacity-7" 			=> "70%",
            "pix-opacity-6" 			=> "60%",
            "pix-opacity-5" 			=> "50%",
            "pix-opacity-4" 			=> "40%",
            "pix-opacity-3" 			=> "30%",
            "pix-opacity-2" 			=> "20%",
            "pix-opacity-1" 			=> "10%",

        )),
        // "description" => __( "Please select the style you wish for the top divider to display in.", "pix-opts"),
        "dependency" => array(
            "element" => "fade_in_intro",
            "not_empty" => true
        ),
    ),

    array (
        'param_name' 	=> 'pix_scale_in',
        'type' 			=> 'dropdown',
        'heading' 		=> __('Section Scale In effect', 'pixfort-core'),
        "description" => __( "Scale the section down to the default size when scrolling.", "js_composer"),
        'admin_label'	=> false,
        'value'			=> array_flip(array(
            '' 		=> 'Disabled',
            'pix-scale-in-xs' 		=> 'Extra Small scale',
            'pix-scale-in-sm' 		=> 'Small scale',
            'pix-scale-in' 		=> 'Normal scale',
            'pix-scale-in-lg' 		=> 'Large scale',
        )),
    ),


    array(
        "type" => "checkbox",
        "heading" => __( "Elements are hidden outside the section", "pix-opts" ),
        "param_name" => "pix_over_visibility",
        'save_always' => true,
        "value" => array(
            "Yes (Normal)" => "1",
            "Force hidding everythimg (sticky elements won't work)"    => "2"
        )
    ),




    array(
        "type" => "checkbox",
        "heading" => __( "Enable dark mode (Beta)", "pix-opts" ),
        "param_name" => "pix_dark_mode",
        "value" => array_flip(array(
            "yes" 			=> "Yes"
        )),
    ),

    // ===========================================
    // Bottom Dividers
    // ===========================================
    array(
        'type'        => 'pix_img_select',
        'heading'  => 'Shapes Builder',
        'param_name'  => 'bottom_divider_select',
        "class" => "my_param_field",
        'value'       => '0',
        "group"	=> "Bottom Dividers",
    ),

    array(
        'type'        => 'pix_param_globals',
        'param_name'  => 'pix_param_globals2',
    ),


    array (
        'type' => 'param_group',
        'value' => '',
        'param_name' => 'bottom_moving_divider_color',
        "group"	=> "Bottom Dividers",
        'save_always' => true,
        'params' => array(
            array(
                "type" => "checkbox",
                "heading" => __( "Use Gradient", "pix-opts" ),
                "param_name" => "d_gradient",
                "std" => "",
                "value" => array(
                    "Yes" => "1"
                ),
            ),
            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__('Layer color', 'pixfort-core'),
                'param_name'  => 'd_color_1',
                'value'       => '#f8f9fa',
            ),
            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__('Layer color 2', 'pixfort-core'),
                'param_name'  => 'd_color_2',
                'value'       => '#f8f9fa',
                "dependency" => array(
                    "element" => "d_gradient",
                    "value" => array("1")
                ),
            ),

        ),
        "dependency" => array(
            "element" => "bottom_divider_select",
            "value" => array("dynamic")
        ),
    ),

    array(
        "type" => "dropdown",
        "heading" => __("The number of Layers", "pix-opts"),
        "group"	=> "Bottom Dividers",
        "param_name" => "bottom_layers",
        "class" => "pix_param_50",
        "std"		=> '3',
        "dependency" => array(
            "element" => "bottom_divider_select",
            "value" => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24")
        ),
        "value" => array_flip(array(
            "1"       => "1 Layer",
            "2"       => "2 Layer",
            "3"       => "3 Layer",
        )),
    ),


    array(
        "type" => "checkbox",
        "heading" => __( "Enable animations for layers", "pix-opts" ),
        "param_name" => "b_has_animation",
        "value" => false,
        "group"	=> "Bottom Dividers",
        "dependency" => array(
            "element" => "bottom_layers",
            "not_empty" => true
        ),
    ),


    array(
        'type'        => 'pix_param_section',
        'param_name'  => 'pix_param_section_1',
        'pix_title'	=> 'First Layer',
        "group"	=> "Bottom Dividers",
        "dependency" => array(
            "element" => "bottom_layers",
            "not_empty" => true
        ),
    ),

    array(
        "type" => "checkbox",
        "heading" => __( "Use gradient for the first layer", "pix-opts" ),
        "param_name" => "b_1_is_gradient",
        "class" => "pix_param_50",
        "value" => false,
        "group"	=> "Bottom Dividers",
        "dependency" => array(
            "element" => "bottom_layers",
            "not_empty" => true
        ),
    ),

    array(
        'type'        => 'colorpicker',
        'heading'     => esc_html__('Layer 1 color', 'pixfort-core'),
        'param_name'  => 'b_1_color',
        'value'       => '#ffffff',
        "group"	=> "Bottom Dividers",
        "dependency" => array(
            "element" => "bottom_layers",
            "not_empty" => true
        ),
    ),

    array(
        'type'        => 'colorpicker',
        'heading'     => esc_html__('Layer 1 second gradient color', 'pixfort-core'),
        'param_name'  => 'b_1_color_2',
        'value'       => '#ffffff',
        "group"	=> "Bottom Dividers",
        "dependency" => array(
            "element" => "b_1_is_gradient",
            "not_empty" => true
        ),
    ),

    array (
        'param_name' 	=> 'b_1_animation',
        'type' 			=> 'dropdown',
        'heading' 		=> __('Animation', 'pixfort-core'),
        'description' 	=> __('Select the animation of the layer.', 'pixfort-core'),
        'admin_label'	=> false,
        'value'			=> $animations,
        "group"	=> "Bottom Dividers",
        "dependency" => array(
            "element" => "b_has_animation",
            "not_empty" => true
        ),
    ),

    array (
        'param_name' 	=> 'b_1_delay',
        'type' 			=> 'textfield',
        'heading' 		=> __('Animation delay (in miliseconds)', 'pixfort-core'),
        'admin_label'	=> true,
        "dependency" => array(
            "element" => "b_1_animation",
            "not_empty" => true
        ),
        "group"	=> "Bottom Dividers",
    ),


    array(
        'type'        => 'pix_param_section',
        'param_name'  => 'pix_param_section_2',
        'pix_title'	=> 'Second Layer',
        "group"	=> "Bottom Dividers",
        "dependency" => array(
            "element" => "bottom_layers",
            "value" => array("2", "3")
        ),
    ),
    array(
        "type" => "checkbox",
        "heading" => __( "Use gradient for the second layer", "pix-opts" ),
        "param_name" => "b_2_is_gradient",
        "value" => false,
        "group"	=> "Bottom Dividers",
        "dependency" => array(
            "element" => "bottom_layers",
            "value" => array("2", "3")
        ),
    ),
    array(
        'type'        => 'colorpicker',
        'heading'     => esc_html__('Layer 2 color', 'pixfort-core'),
        'param_name'  => 'b_2_color',
        'value'       => 'rgba(255,255,255,0.6)',
        "group"	=> "Bottom Dividers",
        "dependency" => array(
            "element" => "bottom_layers",
            "value" => array("2", "3")
        ),
    ),

    array(
        'type'        => 'colorpicker',
        'heading'     => esc_html__('Layer 2 second gradient color', 'pixfort-core'),
        'param_name'  => 'b_2_color_2',
        'value'       => '#ffffff',
        "group"	=> "Bottom Dividers",
        "dependency" => array(
            "element" => "b_2_is_gradient",
            "not_empty" => true
        ),
    ),


    array (
        'param_name' 	=> 'b_2_animation',
        'type' 			=> 'dropdown',
        'heading' 		=> __('Animation', 'pixfort-core'),
        'description' 	=> __('Select the animation of the layer.', 'pixfort-core'),
        'admin_label'	=> false,
        'value'			=> $animations,
        "group"	=> "Bottom Dividers",
        "dependency" => array(
            "element" => "bottom_layers",
            "value" => array("2", "3")
        ),
    ),

    array (
        'param_name' 	=> 'b_2_delay',
        'type' 			=> 'textfield',
        'heading' 		=> __('Animation delay (in miliseconds)', 'pixfort-core'),
        'admin_label'	=> true,
        "dependency" => array(
            "element" => "b_2_animation",
            "not_empty" => true
        ),
        "group"	=> "Bottom Dividers",
    ),


    array(
        'type'        => 'pix_param_section',
        'param_name'  => 'pix_param_section_3',
        'pix_title'	=> 'Third Layer',
        "group"	=> "Bottom Dividers",
        "dependency" => array(
            "element" => "bottom_layers",
            "value" => array("3")
        ),
    ),
    array(
        "type" => "checkbox",
        "heading" => __( "Use gradient for the third layer", "pix-opts" ),
        "param_name" => "b_3_is_gradient",
        "value" => false,
        "group"	=> "Bottom Dividers",
        "dependency" => array(
            "element" => "bottom_layers",
            "value" => array("3")
        ),
    ),
    array(
        'type'        => 'colorpicker',
        'heading'     => esc_html__('Layer 3 color', 'pixfort-core'),
        'param_name'  => 'b_3_color',
        'value'       => 'rgba(255,255,255,0.3)',
        "group"	=> "Bottom Dividers",
        "dependency" => array(
            "element" => "bottom_layers",
            "value" => array("3")
        ),
    ),

    array(
        'type'        => 'colorpicker',
        'heading'     => esc_html__('Layer 3 second gradient color', 'pixfort-core'),
        'param_name'  => 'b_3_color_2',
        'value'       => '#ffffff',
        "group"	=> "Bottom Dividers",
        "dependency" => array(
            "element" => "b_3_is_gradient",
            "not_empty" => true
        ),
    ),

    array (
        'param_name' 	=> 'b_3_animation',
        'type' 			=> 'dropdown',
        'heading' 		=> __('Animation', 'pixfort-core'),
        'description' 	=> __('Select the animation of the layer.', 'pixfort-core'),
        'admin_label'	=> false,
        'value'			=> $animations,
        "group"	=> "Bottom Dividers",
        "dependency" => array(
            "element" => "bottom_layers",
            "value" => array("3")
        ),
    ),

    array (
        'param_name' 	=> 'b_3_delay',
        'type' 			=> 'textfield',
        'heading' 		=> __('Animation delay (in miliseconds)', 'pixfort-core'),
        'admin_label'	=> true,
        "dependency" => array(
            "element" => "b_3_animation",
            "not_empty" => true
        ),
        "group"	=> "Bottom Dividers",
    ),

    array(
        'type'        => 'pix_param_section',
        'param_name'  => 'pix_param_section_4',
        'pix_title'	=> 'Advanced Options',
        "group"	=> "Bottom Dividers",
    ),
    array(
        "type" => "checkbox",
        "heading" => __( "Bring the divider in front of the content", "pix-opts" ),
        "description"	=> __( "The divider will cover the row elements below it.", "pix-opts" ),
        "param_name" => "b_divider_in_front",
        "value" => false,
        "group"	=> "Bottom Dividers",
    ),
    array(
        "type" => "checkbox",
        "heading" => __( "Flip the divider", "pix-opts" ),
        "param_name" => "b_flip_h",
        "value" => false,
        "group"	=> "Bottom Dividers",
    ),

    array (
        'param_name' 	=> 'b_custom_height',
        'type' 			=> 'textfield',
        'heading' 		=> __('Divider custom height (Optional)', 'pixfort-core'),
        "description"	=> __( "Leave empty to use default height or add custom height (with unit, e.g: 200px).", "pix-opts" ),
        'admin_label'	=> true,
        "group"	=> "Bottom Dividers",
    ),







    // ===========================================
    // Top Dividers
    // ===========================================
    array(
        'type'        => 'pix_img_select',
        'heading'  => 'Shapes Builder',
        'param_name'  => 'top_divider_select',
        "class" => "pix_dividers_top_select",
        'value'       => '0',
        "group"	=> "Top Dividers",
    ),

    array(
        'type'        => 'pix_param_globals',
        'param_name'  => 'pix_param_globals1',
    ),


    array (
        'type' => 'param_group',
        'value' => '',
        'param_name' => 'top_moving_divider_color',
        "group"	=> "Top Dividers",
        'save_always' => true,
        'params' => array(
            array(
                "type" => "checkbox",
                "heading" => __( "Use Gradient", "pix-opts" ),
                "param_name" => "d_gradient",
                "std" => "",
                'save_always' => true,
                "value" => array(
                    "Yes" => "1"
                ),
            ),
            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__('Layer color', 'pixfort-core'),
                'param_name'  => 'd_color_1',
                'value'       => '#f8f9fa',
            ),
            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__('Layer color 2', 'pixfort-core'),
                'param_name'  => 'd_color_2',
                'value'       => '#f8f9fa',
                "dependency" => array(
                    "element" => "d_gradient",
                    "value" => array("1")
                ),
            ),

        ),
        "dependency" => array(
            "element" => "top_divider_select",
            "value" => array("dynamic")
        ),
    ),

    array(
        "type" => "dropdown",
        "heading" => __("The number of Layers", "pix-opts"),
        "group"	=> "Top Dividers",
        "param_name" => "top_layers",
        "class" => "pix_param_50",
        "std"		=> '3',
        "dependency" => array(
            "element" => "top_divider_select",
            "value" => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24")
        ),
        "value" => array_flip(array(
            "1"       => "1 Layer",
            "2"       => "2 Layer",
            "3"       => "3 Layer",
        )),
    ),


    array(
        "type" => "checkbox",
        "heading" => __( "Enable animations for layers", "pix-opts" ),
        "param_name" => "t_has_animation",
        "value" => false,
        "group"	=> "Top Dividers",
        "dependency" => array(
            "element" => "top_layers",
            "not_empty" => true
        ),
    ),


    array(
        'type'        => 'pix_param_section',
        'param_name'  => 'pix_top_section_1',
        'pix_title'	=> 'First Layer',
        "group"	=> "Top Dividers",
        "dependency" => array(
            "element" => "top_layers",
            "not_empty" => true
        ),
    ),

    array(
        "type" => "checkbox",
        "heading" => __( "Use gradient for the first layer", "pix-opts" ),
        "param_name" => "t_1_is_gradient",
        "class" => "pix_param_50",
        "value" => false,
        "group"	=> "Top Dividers",
        "dependency" => array(
            "element" => "top_layers",
            "not_empty" => true
        ),
    ),

    array(
        'type'        => 'colorpicker',
        'heading'     => esc_html__('Layer 1 color', 'pixfort-core'),
        'param_name'  => 't_1_color',
        'value'       => '#ffffff',
        "group"	=> "Top Dividers",
        "dependency" => array(
            "element" => "top_layers",
            "not_empty" => true
        ),
    ),

    array(
        'type'        => 'colorpicker',
        'heading'     => esc_html__('Layer 1 second gradient color', 'pixfort-core'),
        'param_name'  => 't_1_color_2',
        'value'       => '#ffffff',
        "group"	=> "Top Dividers",
        "dependency" => array(
            "element" => "t_1_is_gradient",
            "not_empty" => true
        ),
    ),

    array (
        'param_name' 	=> 't_1_animation',
        'type' 			=> 'dropdown',
        'heading' 		=> __('Animation', 'pixfort-core'),
        'description' 	=> __('Select the animation of the layer.', 'pixfort-core'),
        'admin_label'	=> false,
        'value'			=> $animations,
        "group"	=> "Top Dividers",
        "dependency" => array(
            "element" => "t_has_animation",
            "not_empty" => true
        ),
    ),

    array (
        'param_name' 	=> 't_1_delay',
        'type' 			=> 'textfield',
        'heading' 		=> __('Animation delay (in miliseconds)', 'pixfort-core'),
        'admin_label'	=> true,
        "dependency" => array(
            "element" => "t_1_animation",
            "not_empty" => true
        ),
        "group"	=> "Top Dividers",
    ),


    array(
        'type'        => 'pix_param_section',
        'param_name'  => 'pix_top_section_2',
        'pix_title'	=> 'Second Layer',
        "group"	=> "Top Dividers",
        "dependency" => array(
            "element" => "top_layers",
            "value" => array("2", "3")
        ),
    ),
    array(
        "type" => "checkbox",
        "heading" => __( "Use gradient for the second layer", "pix-opts" ),
        "param_name" => "t_2_is_gradient",
        "value" => false,
        "group"	=> "Top Dividers",
        "dependency" => array(
            "element" => "top_layers",
            "value" => array("2", "3")
        ),
    ),
    array(
        'type'        => 'colorpicker',
        'heading'     => esc_html__('Layer 2 color', 'pixfort-core'),
        'param_name'  => 't_2_color',
        'value'       => 'rgba(255,255,255,0.6)',
        "group"	=> "Top Dividers",
        "dependency" => array(
            "element" => "top_layers",
            "value" => array("2", "3")
        ),
    ),

    array(
        'type'        => 'colorpicker',
        'heading'     => esc_html__('Layer 2 second gradient color', 'pixfort-core'),
        'param_name'  => 't_2_color_2',
        'value'       => '#ffffff',
        "group"	=> "Top Dividers",
        "dependency" => array(
            "element" => "t_2_is_gradient",
            "not_empty" => true
        ),
    ),


    array (
        'param_name' 	=> 't_2_animation',
        'type' 			=> 'dropdown',
        'heading' 		=> __('Animation', 'pixfort-core'),
        'description' 	=> __('Select the animation of the layer.', 'pixfort-core'),
        'admin_label'	=> false,
        'value'			=> $animations,
        "group"	=> "Top Dividers",
        "dependency" => array(
            "element" => "top_layers",
            "value" => array("2", "3")
        ),
    ),

    array (
        'param_name' 	=> 't_2_delay',
        'type' 			=> 'textfield',
        'heading' 		=> __('Animation delay (in miliseconds)', 'pixfort-core'),
        'admin_label'	=> true,
        "dependency" => array(
            "element" => "t_2_animation",
            "not_empty" => true
        ),
        "group"	=> "Top Dividers",
    ),


    array(
        'type'        => 'pix_param_section',
        'param_name'  => 'pix_top_section_3',
        'pix_title'	=> 'Third Layer',
        "group"	=> "Top Dividers",
        "dependency" => array(
            "element" => "top_layers",
            "value" => array("3")
        ),
    ),
    array(
        "type" => "checkbox",
        "heading" => __( "Use gradient for the third layer", "pix-opts" ),
        "param_name" => "t_3_is_gradient",
        "value" => false,
        "group"	=> "Top Dividers",
        "dependency" => array(
            "element" => "top_layers",
            "value" => array("3")
        ),
    ),
    array(
        'type'        => 'colorpicker',
        'heading'     => esc_html__('Layer 3 color', 'pixfort-core'),
        'param_name'  => 't_3_color',
        'value'       => 'rgba(255,255,255,0.3)',
        "group"	=> "Top Dividers",
        "dependency" => array(
            "element" => "top_layers",
            "value" => array("3")
        ),
    ),

    array(
        'type'        => 'colorpicker',
        'heading'     => esc_html__('Layer 3 second gradient color', 'pixfort-core'),
        'param_name'  => 't_3_color_2',
        'value'       => '#ffffff',
        "group"	=> "Top Dividers",
        "dependency" => array(
            "element" => "t_3_is_gradient",
            "not_empty" => true
        ),
    ),

    array (
        'param_name' 	=> 't_3_animation',
        'type' 			=> 'dropdown',
        'heading' 		=> __('Animation', 'pixfort-core'),
        'description' 	=> __('Select the animation of the layer.', 'pixfort-core'),
        'admin_label'	=> false,
        'value'			=> $animations,
        "group"	=> "Top Dividers",
        "dependency" => array(
            "element" => "top_layers",
            "value" => array("3")
        ),
    ),

    array (
        'param_name' 	=> 't_3_delay',
        'type' 			=> 'textfield',
        'heading' 		=> __('Animation delay (in miliseconds)', 'pixfort-core'),
        'admin_label'	=> true,
        "dependency" => array(
            "element" => "t_3_animation",
            "not_empty" => true
        ),
        "group"	=> "Top Dividers",
    ),

    array(
        'type'        => 'pix_param_section',
        'param_name'  => 'pix_top_section_4',
        'pix_title'	=> 'Advanced Options',
        "group"	=> "Top Dividers",
    ),
    array(
        "type" => "checkbox",
        "heading" => __( "Bring the divider in front of the content", "pix-opts" ),
        "description"	=> __( "The divider will cover the row elements below it.", "pix-opts" ),
        "param_name" => "t_divider_in_front",
        "value" => false,
        "group"	=> "Top Dividers",
    ),
    array(
        "type" => "checkbox",
        "heading" => __( "Flip the divider", "pix-opts" ),
        "param_name" => "t_flip_h",
        "value" => false,
        "group"	=> "Top Dividers",
    ),

    array (
        'param_name' 	=> 't_custom_height',
        'type' 			=> 'textfield',
        'heading' 		=> __('Divider custom height (Optional)', 'pixfort-core'),
        "description"	=> __( "Leave empty to use default height or add custom height (with unit, e.g: 200px).", "pix-opts" ),
        'admin_label'	=> true,
        "group"	=> "Top Dividers",
    ),

    array (
        'param_name' 	=> 'pix_overlay_color',
        'type' 			=> 'dropdown',
        'heading' 		=> __('Background Image Overlay color', 'pixfort-core'),
        "description"	=> __( "Note: the section background color (in the options above) will not work if overlay is added.", "pix-opts" ),
        'admin_label'	=> false,
        "group"	=> "Design Options",
        'value' 		=> array_merge(
            array("None" => ''),
            $bg_colors
        ),
    ),

    array(
        'type'        => 'colorpicker',
        'heading'     => esc_html__('Custom overlay color', 'pixfort-core'),
        'param_name'  => 'pix_overlay_custom_color',
        'value'       => '#ffffff',
        "dependency" => array(
            "element" => "pix_overlay_color",
            "value" => 'custom'
        ),
        "group"	=> "Design Options",
    ),

    array (
        'param_name' 	=> 'pix_overlay_opacity',
        'type' 			=> 'textfield',
        'heading' 		=> __('Overlay opacity', 'pixfort-core'),
        "description" => __( "The opacity value should be between 0 and 1.", "pix-opts" ),
        'admin_label'	=> false,
        "group"	=> "Design Options",
        "dependency" => array(
            "element" => "pix_overlay_color",
            "not_empty" => true
        ),
    ),
    array(
      'type' => 'pix_responsive_css',
      'heading' => __( 'Responsive options', 'essentials-core' ),
      'param_name' => 'responsive_css',
      'group' => __( 'Design Options', 'essentials-core' ),
      "description" => __( "Input responsive values to override Desktop settings.<br />Note: Tablet landscape preview in WPBakery uses the Desktop values.", "essentials-core" ),
      'value'   => '{}'
      ),


));
?>
