<?php

// Highlighted Text -----------------------------
vc_map( array (
    'base' 			=> 'pix_highlighted_text',
    'name' 			=> __('Highlighted Text', 'pixfort-core'),
    'category' 		=> __('pixfort', 'pixfort-core'),
    "weight"	=> "1000",
    'class'         => 'pixfort_element',
    'icon' 			=> PIX_CORE_PLUGIN_URI . 'functions/images/elements/highlighted-text.png',
    'description' 	=> __('Add highlighted text element', 'pixfort-core'),
    'params' 		=> array (


        array(
            'type' => 'param_group',
            'value' => '',
            'param_name' => 'items',
            'heading' 		=> __('Text', 'pixfort-core'),
            'description' 	=> __('Add each phrase in the desired order.', 'pixfort-core'),
            'params' => array(
                array (
                    'param_name' 	=> 'text',
                    'type' 			=> 'textfield',
                    'heading' 		=> __('Text', 'pixfort-core'),
                    'admin_label'	=> true,
                ),
                array(
                    "type" => "checkbox",
                    "heading" => __( "Highlighted", "pix-opts" ),
                    "param_name" => "is_highlighted",
                    "value" => __( "Yes", "pix-opts" ),
                ),

                array (
                    'param_name' 	=> 'highlight_color',
                    'type' 			=> 'colorpicker',
                    'heading' 		=> __('Highlight color', 'pixfort-core'),
                    "std" => "#ffd900",
                    "dependency" => array(
                        "element" => "is_highlighted",
                        "not_empty" => true
                    ),
                ),
                array (
                    'param_name' 	=> 'custom_height',
                    'type' 			=> 'textfield',
                    'heading' 		=> __('Custom height', 'pixfort-core'),
                    'admin_label'	=> true,
                    'description' 	=> __('Input a number between 0 and 100 (default is 30).', 'pixfort-core'),
                    "dependency" => array(
                        "element" => "is_highlighted",
                        "not_empty" => true
                    ),
                ),

                array(
                    "type" => "checkbox",
                    "heading" => __( "Title format", "pix-opts" ),
                    "param_name" => "bold",
                    "value" => array("Bold" => "font-weight-bold"),
                    // "std" => "font-weight-bold"
                ),
                array(
                    "type" => "checkbox",
                    "param_name" => "italic",
                    "value" => array("Italic" => "font-italic",),
                ),
                array(
                    "type" => "checkbox",
                    "param_name" => "heading_font",
                    "std" => "heading-font",
                    "value" => array("Heading font" => "heading-font",),
                ),

                array(
                    "type" => "checkbox",
                    "heading" => __( "Add new line after this element", "pix-opts" ),
                    "param_name" => "new_line",
                    "value" => __( "Yes", "pix-opts" ),
                ),




            )
        ),



        array (
            'param_name' 	=> 'title_color',
            'type' 			=> 'dropdown',
            'heading' 		=> __('Title color', 'pixfort-core'),
            'admin_label'	=> false,
            'value' 		=> $colors,
            'std'			=> 'heading-default',
        ),

        array (
            'param_name' 	=> 'title_custom_color',
            'type' 			=> 'colorpicker',
            'heading' 		=> __('Title color', 'pixfort-core'),
            'admin_label'	=> false,
            "dependency" => array(
                "element" => "title_color",
                "value" => "custom"
            ),
        ),

        array (
            'param_name' 	=> 'title_size',
            'type' 			=> 'dropdown',
            'heading' 		=> __('Title size', 'pixfort-core'),
            'description' 	=> __('Wrap title into H1 instead of H2', 'pixfort-core'),
            'admin_label'	=> false,
            'value' 		=> array(
                __('H1','pixfort-core') 	=> 'h1',
                __('H2','pixfort-core')	    => 'h2',
                __('H3','pixfort-core')	    => 'h3',
                __('H4','pixfort-core')	    => 'h4',
                __('H5','pixfort-core')	    => 'h5',
                __('H6','pixfort-core')	    => 'h6',
                __('Custom','pixfort-core')	    => 'custom',
            ),
        ),

        array (
            'param_name' 	=> 'display',
            'type' 			=> 'dropdown',
            'heading' 		=> __('Bigger Text', 'pixfort-core'),
            'description' 	=> __('Larger heading text size to stand out.', 'pixfort-core'),
            'admin_label'	=> false,
            'value'			=> array_flip(array(
                ''		=> 'None',
                'display-1'		=> 'Display 1',
                'display-2'		=> 'Display 2',
                'display-3'		=> 'Display 3',
                'display-4'		=> 'Display 4',
            )),
            "dependency" => array(
                "element" => "title_size",
                "value" => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6')
            ),
        ),

        array (
            'param_name' 	=> 'title_custom_size',
            'type' 			=> 'textfield',
            'heading' 		=> __('Title Size', 'pixfort-core'),
            'admin_label'	=> false,
            "dependency" => array(
                "element" => "title_size",
                "value" => "custom"
            ),
        ),

        array (
            'param_name' 	=> 'position',
            'type' 			=> 'dropdown',
            'heading' 		=> __('Position', 'pixfort-core'),
            'description' 	=> __('Select the position of the heading.', 'pixfort-core'),
            'admin_label'	=> false,
            'value'			=> array_flip(array(
                'text-center'		=> 'Center',
                'text-left'			=> 'Left',
                'text-right' 		=> 'Right',
            )),
        ),

        array (
            'param_name' 	=> 'animation',
            'type' 			=> 'dropdown',
            'heading' 		=> __('Animation', 'pixfort-core'),
            'description' 	=> __('Select the animation of the heading.', 'pixfort-core'),
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


        array (
            'param_name' 	=> 'heading_id',
            'type' 			=> 'el_id',
            'heading' 		=> __('Heading ID', 'pixfort-core'),
            'group'         => "Advanced",
            'settings' => array(
                'auto_generate' => true,
            ),
        ),

        array (
            'param_name' 	=> 'max_width',
            'type' 			=> 'textfield',
            'heading' 		=> __('Text max width (Optional)', 'pixfort-core'),
            'description' 	=> __('Input text width limit (with unit, for example 400px) instead of filling the width of the container.', 'pixfort-core'),
            'admin_label'	=> true,
        ),


        array(
          'type' => 'css_editor',
          'heading' => __( 'Css', 'essentials-core' ),
          'param_name' => 'css',
          'group' => __( 'Design options', 'essentials-core' ),
          ),



    )
));

 ?>
