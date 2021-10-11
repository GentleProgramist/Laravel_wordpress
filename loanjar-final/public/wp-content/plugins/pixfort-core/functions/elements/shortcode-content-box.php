<?php
$content_box_params = array(
    array (
        'param_name' 	=> 'rounded_box',
        'type' 			=> 'dropdown',
        'heading' 		=> __('Rounded corners', 'pixfort-core'),
        'admin_label'	=> false,
        'std'	=> 'rounded-lg',
        'value' 		=> array(
            __('No','pixfort-core') 	=> 'rounded-0',
            __('Rounded Small','pixfort-core')	    => 'rounded',
            __('Rounded Large','pixfort-core')	    => 'rounded-lg',
            __('Rounded 5px','pixfort-core')	    => 'rounded-xl',
            __('Rounded 10px','pixfort-core')	    => 'rounded-10',
            __('Custom (from Design options tab)','pixfort-core')	    => 'rounded-custom',
        )
    ),
);

vc_map( array(
    "name" => __("Content Box", "js_composer"),
    "base" => "content_box",
    "as_parent" => array('except' => 'content_box'),
    "content_element" => true,
    "show_settings_on_create" => false,
    'category' 		=> __('pixfort', 'pixfort-core'),
    "weight"	=> "1000",
    'class'         => 'pixfort_element',
    'icon' 			=> PIX_CORE_PLUGIN_URI . 'functions/images/elements/content-box.png',
    'description' 	=> __('A container for a group of elements', 'pixfort-core'),
    "is_container" => true,
    "params" => array_merge(
        $effects_params,
        $content_box_params,
        $animation_params,
        array(


            array(
                "type" => "checkbox",
                "heading" => __( "Gradient Background on hover", "pix-opts" ),
                "param_name" => "pix_bg_gradient_hover",
                "value" => array(
                    "Yes" => "1"
                ),
            ),


            array(
                "type" => "checkbox",
                "heading" => __( "Enable Particles", "pix-opts" ),
                "param_name" => "pix_particles_check",
                "group"	=> "Particles",
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
                "dependency" => array(
                    "element" => "pix_particles_check",
                    "value" => "1"
                ),
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
                        'save_always' => true,
                        'value'           => '0',
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
                        'value'           => '0',
                        'save_always' => true,
                        "description" => __( "Please input the value (with the unit: %, px,.. etc).", "pix-opts"),
                        'admin_label'	=> false,
                    ),
                    array(
                        "type" => "checkbox",
                        "heading" => __( "Animation type", "pix-opts" ),
                        "param_name" => "pix_particles_type",
                        "value" => array_flip(array(
                            "scroll_parallax"       => "Scroll Parallax",
                        )),
                    ),
                    array(
                        "type" => "checkbox",
                        "param_name" => "pix_particles_type_2",
                        "value" => array_flip(array(
                            "mouse_parallax" 			=> "Mouse Parallax"
                        )),
                    ),
                    array(
                        "type" => "checkbox",
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
                        'description' 	=> __('Please add the unit (for example: px or %).', 'pixfort-core'),
                        'admin_label'	=> false,
                    ),

                    array (
                        'param_name' 	=> 'animation',
                        'type' 			=> 'dropdown',
                        'heading' 		=> __('Start Animation', 'pixfort-core'),
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
                        "heading" => __( "Hide on mobile", "pix-opts" ),
                        "param_name" => "hide",
                        "value" => __( "1", "pix-opts" ),
                        "description" => __( "Hide the element on mobile devices.", "pix-opts" )
                    ),

                )
            ),

            array(
                "type" => "checkbox",
                "group"	=> "Particles",
                "heading" => __( "Show Particles on top of the content", "pix-opts" ),
                "param_name" => "particles_top_index",
                "value" => array("Yes" => "overflow-hidden",),
                "dependency" => array(
                    "element" => "pix_particles_check",
                    "value" => "1"
                ),
            ),

            array(
                "type" => "checkbox",
                "heading" => __( "Hide content outside the box", "pix-opts" ),
                "param_name" => "overflow",
                "value" => array("Yes" => "overflow-hidden")
            ),
            array(
                "type" => "checkbox",
                "heading" => __( "Full height box", "pix-opts" ),
                "param_name" => "full_height",
                "value" => array("Yes" => "full-height")
            ),
            array(
                "type" => "checkbox",
                "heading" => __( "Stick box on the top", "pix-opts" ),
                "param_name" => "sticky_top",
                "value" => array("Yes" => "sticky-top"),
                "description" => __("The parent row should enable equal columns option.", "essentials"),
            ),

            array (
                'param_name' 	        => 'content_align',
                'type' 			    => 'dropdown',
                'heading' 		    => __('Content align', 'pixfort-core'),
                'admin_label'	        => false,
                'value'			    => array_flip(array(
                    ''			    => 'Default',
                    'text-left'		=> 'Left',
                    'text-center'		=> 'Center',
                    'text-right' 		=> 'Right',
                ))
            ),

            array(
                "type" => "checkbox",
                "heading" => __( "Inline box size", "pix-opts" ),
                "param_name" => "content_inline",
                "value" => array("Yes" => "1"),
                "description" => __("Make the box match content size (not full width).", "essentials"),
            ),

            array (
                'param_name' 	=> 'pix_scale_in',
                'type' 			=> 'dropdown',
                'heading' 		=> __('Image Scale In effect', 'pixfort-core'),
                "description" => __( "Scale the image down to the default size when scrolling.", "js_composer"),
                'admin_label'	=> false,
                'value'			=> array_flip(array(
                    '' 		=> 'Disabled',
                    'pix-scale-in-sm' 		=> 'Small scale',
                    'pix-scale-in' 		=> 'Normal scale',
                    'pix-scale-in-lg' 		=> 'Large scale',
                )),
            ),

            array(
                "type" => "textfield",
                "heading" => __("Extra class name", "essentials"),
                "param_name" => "el_class",
                "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "essentials"),
                'value'       => 'mb-2',
            ),

            array(
                'type' => 'css_editor',
                'heading' => __( 'Css', 'essentials-core' ),
                'param_name' => 'css',
                'group' => __( 'Design options', 'essentials-core' ),
            ),
            array(
              'type' => 'pix_responsive_css',
              'heading' => __( 'Responsive options', 'essentials-core' ),
              'param_name' => 'responsive_css',
              'group' => __( 'Design options', 'essentials-core' ),
              "description" => __( "Input responsive values to override Desktop settings.<br />Note: Tablet landscape preview in WPBakery uses the Desktop values.", "essentials-core" ),
              'value'   => '{}'
              ),



            array (
                'param_name' 	=> 'pix_overlay_color',
                'type' 			=> 'dropdown',
                'heading' 		=> __('Overlay color', 'pixfort-core'),
                'admin_label'	=> false,
                "group"	=> "Design options",
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
                "group"	=> "Design options",
            ),

            array (
                'param_name' 	=> 'pix_overlay_opacity',
                'type' 			=> 'textfield',
                'heading' 		=> __('Overlay opacity', 'pixfort-core'),
                "description" => __( "The opacity value should be between 0 and 1.", "pix-opts" ),
                'admin_label'	=> false,
                "group"	=> "Design options",
                "dependency" => array(
                    "element" => "pix_overlay_color",
                    "not_empty" => true
                ),
            ),
        )),
        "js_view" => 'VcColumnView'
    )
);

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_content_box extends WPBakeryShortCodesContainer {
    }
}
?>
