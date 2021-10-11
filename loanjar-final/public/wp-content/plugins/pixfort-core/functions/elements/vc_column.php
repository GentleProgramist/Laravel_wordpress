<?php

vc_add_params('vc_column', array(


    array(
        "type" => "checkbox",
        "heading" => __( "Enable dark mode (Beta)", "pix-opts" ),
        "param_name" => "pix_dark_mode",
        "std" => "",
        "value" => array_flip(array(
            "yes" 			=> "Yes"
        )),
    ),
    array (
        'param_name' 	=> 'content_align',
        'type' 			=> 'dropdown',
        'heading' 		=> __('Content align', 'pixfort-core'),
        // 'description' 	=> __('Select the position of the image.', 'pixfort-core'),
        'admin_label'	=> false,
        'value'			=> array_flip(array(
            'text-left'			=> 'Left',
            'text-center'		=> 'Center',
            'text-right' 		=> 'Right',
        )),
    ),

    array(
        "type" => "checkbox",
        "heading" => __( "Enable Particles", "pix-opts" ),
        "param_name" => "pix_particles_check",
        "group"	=> "Particles",
        // "std" => "",
        "value" => array(
            "Yes" => "1"
        ),
        "description" => __( "Enable animated images in the background.", "pix-opts" )
    ),
    array(
        'type' => 'param_group',
        'value' => '',
        'param_name' => 'pix_particles',
        "group"	=> "Particles",
        'heading' 		=> __('Particles', 'pixfort-core'),
        // 'description' 	=> __('Add parallax floating images in the background of the section.', 'pixfort-core'),
        "dependency" => array(
            "element" => "pix_particles_check",
            "value" => "1"
        ),
        // Note params is mapped inside param-group:
        'params' => array(
            array (
                'param_name' 	=> 'image',
                'type' 			=> 'attach_image',
                'heading' 		=> __('Image', 'pixfort-core'),
                'admin_label'	=> false,
            ),

            array(
                "type" => "dropdown",
                "heading" => __("Horizontal Position", "pix-opts"),
                "param_name" => "h_position",
                "value" => array_flip(array(
                    "left" 			=> "Left",
                    "right"       => "Right"
                )),
                "description" => __( "Please select the horizontal origin of the alignment.", "pix-opts")
            ),
            array (
                'param_name' 	=> 'horizontal',
                'type' 			=> 'textfield',
                'heading' 		=> __('Horizontal value', 'pixfort-core'),
                "description" => __( "Please input the value (with the unit: %, px,.. etc).", "pix-opts"),
                'admin_label'	=> false,
                'value'		=> '0',
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Vertical Position", "pix-opts"),
                "param_name" => "v_position",
                "value" => array_flip(array(
                    "top" 			=> "Top",
                    "bottom"       => "Bottom"
                )),
                "description" => __( "Please select the horizontal origin of the alignment.", "pix-opts")
            ),
            array (
                'param_name' 	=> 'vertical',
                'type' 			=> 'textfield',
                'heading' 		=> __('Vertical value', 'pixfort-core'),
                "description" => __( "Please input the value (with the unit: %, px,.. etc).", "pix-opts"),
                'admin_label'	=> false,
                'value'		=> '0',
            ),
            array(
                "type" => "checkbox",
                "heading" => __( "Animation type", "pix-opts" ),
                "param_name" => "pix_particles_type",
                "std" => "",
                "value" => array_flip(array(
                    "scroll_parallax"       => "Scroll Parallax",
                    // "mouse_parallax" 			=> "Mouse Parallax"
                )),
            ),
            array(
                "type" => "checkbox",
                "std" => "",
                // "heading" => __( "Animation type", "pix-opts" ),
                "param_name" => "pix_particles_type_2",
                "value" => array_flip(array(
                    // "scroll_parallax"       => "Scroll Parallax",
                    "mouse_parallax" 			=> "Mouse Parallax"
                )),
            ),
            array(
                "type" => "checkbox",
                "std" => "",
                "param_name" => "pix_particles_type_3",
                "value" => array_flip(array(
                    "scroll_rotate" 			=> "Scroll rotate"
                )),
            ),





            array (
                'param_name' 	=> 'depth',
                'type' 			=> 'textfield',
                'heading' 		=> __('Parallax Depth', 'pixfort-core'),
                'admin_label'	=> false,
                'std'			=> '0.2',
                "description" => __( "Depth value is between 0 and 1.", "pix-opts" ),
                "dependency" => array(
                    "element" => "pix_particles_type_2",
                    "value" => "mouse_parallax"
                ),
            ),

            array (
                'param_name' 	=> 'xaxis',
                'type' 			=> 'textfield',
                'heading' 		=> __('X axis', 'pixfort-core'),
                'admin_label'	=> false,
                'value'			=> '100',
                "dependency" => array(
                    "element" => "pix_particles_type",
                    "value" => "scroll_parallax"
                ),
            ),
            array (
                'param_name' 	=> 'yaxis',
                'type' 			=> 'textfield',
                'heading' 		=> __('Y axis', 'pixfort-core'),
                'admin_label'	=> false,
                'std'			=> '0',
                "dependency" => array(
                    "element" => "pix_particles_type",
                    "value" => "scroll_parallax"
                ),
            ),

            array (
                'param_name' 	=> 'rotation_speed',
                'type' 			=> 'textfield',
                'heading' 		=> __('Roatation speed', 'pixfort-core'),
                'admin_label'	=> false,
                'std'			=> '300',
                "description" => __( "A bigger number is a slower speed.", "pix-opts" ),
                "dependency" => array(
                    "element" => "pix_particles_type_3",
                    "value" => "scroll_rotate"
                ),
            ),

            array(
                "type" => "checkbox",
                "std" => "",
                "heading" => __( "Inverse rotation direction", "pix-opts" ),
                "param_name" => "pix_inverse_rotation",
                "value" => array_flip(array(
                    "scroll_inverse"       => "Yes",
                )),
                "dependency" => array(
                    "element" => "pix_particles_type_3",
                    "value" => "scroll_rotate"
                ),
            ),


            array (
                'param_name' 	=> 'img_width',
                'type' 			=> 'textfield',
                'heading' 		=> __('Image width', 'pixfort-core'),
                'admin_label'	=> false,
            ),



            array (
                'param_name' 	=> 'animation',
                'type' 			=> 'dropdown',
                'heading' 		=> __('Start Animation', 'pixfort-core'),
                // 'description' 	=> __('Select the animation of the heading.', 'pixfort-core'),
                'admin_label'	=> false,
                'value'			=> $animations,
            ),
            array (
                'param_name' 	=> 'delay',
                'type' 			=> 'textfield',
                'heading' 		=> __('Animation delay (in miliseconds)', 'pixfort-core'),
                'admin_label'	=> true,
                "dependency" => array(
                    "element" => "animation",
                    "not_empty" => true
                ),
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Infinite Animation type", "pix-opts" ),
                "param_name" => "pix_infinite_animation",
                "value" => $infinite_animation,
                'admin_label'	=> false,
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Infinite Animation Speed", "pix-opts" ),
                "param_name" => "pix_infinite_speed",
                "value" => $animation_speeds,
                'admin_label'	=> false,
                "dependency" => array(
                    "element" => "pix_infinite_animation",
                    "not_empty" => true
                ),
            ),


            array(
                "type" => "checkbox",
                "std" => "",
                "heading" => __( "Hide on mobile", "pix-opts" ),
                "param_name" => "hide",
                "value" => __( "1", "pix-opts" ),
                "description" => __( "Hide the element on mobile devices.", "pix-opts" )
            ),

        )
    ),


    array (
        'param_name' 	=> 'pix_overlay_color',
        'type' 			=> 'dropdown',
        'heading' 		=> __('Overlay color', 'pixfort-core'),
        'admin_label'	=> false,
        "group"	=> "Design Options",
        'value' 		=> array_merge(
            array("None" => ''),
            $colors
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
        'heading' 		=> __( 'Overlay opacity', 'pixfort-core'),
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
