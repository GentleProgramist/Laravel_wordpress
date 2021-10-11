<?php

// Heading -----------------------------
vc_map( array (
    'base' 			=> 'sliding-text',
    'name' 			=> __('Sliding Text', 'pixfort-core'),
    'category' 		=> __('pixfort', 'pixfort-core'),
    "weight"	=> "1000",
    'class'         => 'pixfort_element',
    'icon' 			=> PIX_CORE_PLUGIN_URI . 'functions/images/elements/sliding-text.gif',
    'description' 	=> __('Add cool sliding text', 'pixfort-core'),
    'params' 		=> array (

        array (
            'param_name' 	=> 'content',
            'type' 			=> 'textarea',
            'heading' 		=> __('Text', 'pixfort-core'),
            'admin_label'	=> true,
            'value' 		=> __('This is Sliding Text', 'pixfort-core'),
            'save_always' => true,
        ),

        array(
              "type" => "checkbox",
              "heading" => __( "Title format", "pix-opts" ),
              "param_name" => "bold",
              "value" => array("Bold" => "font-weight-bold"),
              "std" => "font-weight-bold",
              'save_always' => true,
          ),
        array(
              "type" => "checkbox",
              "param_name" => "italic",
              "value" => array("Italic" => "font-italic",),
          ),
        array(
              "type" => "checkbox",
              "param_name" => "secondary_font",
              "value" => array("Secondary font" => "secondary-font",),
              "std" => "secondary-font",
              'save_always' => true,
          ),


        array (
            'param_name' 	=> 'position',
            'type' 			=> 'dropdown',
            'heading' 		=> __('Position', 'pixfort-core'),
            'description' 	=> __('Select the position of the heading.', 'pixfort-core'),
            'admin_label'	=> false,
            'value'			=> array_flip(array(
                'left'			=> 'Left',
                'center'		=> 'Center',
                'right' 		=> 'Right',
            )),
        ),

        array (
            'param_name' 	=> 'size',
            'type' 			=> 'dropdown',
            'heading' 		=> __('Font size', 'pixfort-core'),
            'description' 	=> __('Select the size of the font.', 'pixfort-core'),
            'admin_label'	=> false,
            'value'			=> array_flip(array(
                'h1'		=> 'H1',
                'h2'		=> 'H2',
                'h3' 		=> 'H3',
                'h4' 		=> 'H4',
                'h5' 		=> 'H5',
                'h6' 		=> 'H6',
                'p' 		=> 'p',
            )),
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
        ),

        array (
            'param_name' 	=> 'custom_font_size',
            'type' 			=> 'textfield',
            'heading' 		=> __('Custom font size (Optional)', 'pixfort-core'),
            'description' 	=> __('Input custom font size value (with unit, for example: 20px)', 'pixfort-core'),
            'admin_label'	=> false,
        ),

        array (
            'param_name' 	=> 'text_color',
            'type' 			=> 'dropdown',
            'heading' 		=> __('Title color', 'pixfort-core'),
            'admin_label'	=> false,
            'value' 		=> $colors,
            'save_always' => true,
            'std' => 'heading-default',
        ),

        array (
            'param_name' 	=> 'text_custom_color',
            'type' 			=> 'colorpicker',
            'heading' 		=> __('Custom text color', 'pixfort-core'),
            'admin_label'	=> false,
            'value'       => '#333',
            "dependency" => array(
                  "element" => "text_color",
                  "value" => "custom"
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
              "type" => "checkbox",
              "heading" => __( "Remove margin under the paragraph", "pix-opts" ),
              "param_name" => "remove_mb",
              "value" => array("Yes" => true),
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
