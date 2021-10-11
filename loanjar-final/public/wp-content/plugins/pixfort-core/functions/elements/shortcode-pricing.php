<?php

// Pricing Item -------------------------------------------
$pricing_params = array (

    array (
        'param_name' 	=> 'table_style',
        'type' 			=> 'dropdown',
        'heading' 		=> __('Style', 'pixfort-core'),
        'description' 	=> __('Select the position of the text.', 'pixfort-core'),
        'admin_label'	=> false,
        'value'			=> array_flip(array(
            ''			=> 'Default',
            'top-box'		=> 'Top Box',
        )),
    ),

    array (
        'param_name' 	=> 'title',
        'type' 			=> 'textfield',
        'heading' 		=> __('Badge', 'pixfort-core'),
        'admin_label'	=> true,
    ),

    array (
        'param_name' 	=> 'price',
        'type' 			=> 'textfield',
        'heading' 		=> __('Price', 'pixfort-core'),
        'admin_label'	=> true,
    ),

    array (
        'param_name' 	=> 'currency',
        'type' 			=> 'textfield',
        'heading' 		=> __('Currency', 'pixfort-core'),
        'admin_label'	=> false,
    ),

    array (
        'param_name' 	=> 'period',
        'type' 			=> 'textfield',
        'heading' 		=> __('Period', 'pixfort-core'),
        'admin_label'	=> false,
    ),

    array (
        'param_name' 	=> 'subtitle',
        'type' 			=> 'textfield',
        'heading' 		=> __('Subtitle', 'pixfort-core'),
        'admin_label'	=> true,
    ),




    array (
        'param_name' 	=> 'box_color',
        'type' 			=> 'dropdown',
        'heading' 		=> __('Box color', 'pixfort-core'),
        'admin_label'	=> false,
        'value' 		=> $colors,
        'std'			=> 'transparent',
    ),

    array (
        'param_name' 	=> 'box_custom_color',
        'type' 			=> 'colorpicker',
        'heading' 		=> __('Custom box color', 'pixfort-core'),
        'admin_label'	=> false,
        "dependency" => array(
              "element" => "box_color",
              "value" => "custom"
          ),
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


);

$title_opts = array_merge(
    pix_get_text_format_params(array(
        'prefix' 		=> '',
        'name' 		=> 'Badge',
        'bold' 		=> true,
        'bold_value' 		=> 'font-weight-bold',
        'italic' 		=> true,
        'italic_value' 		=> '',
        'secondary_font' 		=> true,
        'secondary_font_value' 		=> '',
    )),
    array(

        array (
            'param_name' 	=> 'text_color',
            'type' 			=> 'dropdown',
            'heading' 		=> __('Text color', 'pixfort-core'),
            'admin_label'	=> false,
            'value' 		=> $colors,
            'std'           => 'primary'
        ),

        array (
            'param_name' 	=> 'text_custom_color',
            'type' 			=> 'colorpicker',
            'heading' 		=> __('Text custom color', 'pixfort-core'),
            'admin_label'	=> false,
            "dependency" => array(
                  "element" => "text_color",
                  "value" => "custom"
              ),
        ),

        array (
            'param_name' 	=> 'bg_color',
            'type' 			=> 'dropdown',
            'heading' 		=> __('Background color', 'pixfort-core'),
            'admin_label'	=> false,
            'value' 		=> $bg_colors,
            'std'			=> 'primary-light',
            "dependency" => array(
  		        "element" => "media_type",
  		        "value" => array("icon", "char")
  		    ),
        ),
        array (
            'param_name' 	=> 'custom_bg_color',
            'type' 			=> 'colorpicker',
            'heading' 		=> __('Custom Background Color', 'pixfort-core'),
            'admin_label'	=> false,
            "dependency" => array(
                  "element" => "bg_color",
                  "value" => "custom"
              ),
        ),

        array (
            'param_name' 	=> 'text_size',
            'type' 			=> 'dropdown',
            'heading' 		=> __('Text size', 'pixfort-core'),
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
            'std' => 'h5',
        ),

        array (
            'param_name' 	=> 'text_custom_size',
            'type' 			=> 'textfield',
            'heading' 		=> __('Text Size', 'pixfort-core'),
            'admin_label'	=> false,
            "dependency" => array(
                  "element" => "text_size",
                  "value" => "custom"
              ),
        )
    )
);

$price_opts = array_merge(
    pix_get_text_format_params(array(
        'prefix' 		=> 'price_',
        'name' 		=> 'Price',
        'bold' 		=> true,
        'bold_value' 		=> 'font-weight-bold',
        'italic' 		=> true,
        'italic_value' 		=> '',
        'secondary_font' 		=> true,
        'secondary_font_value' 		=> '',
        'color' 		=> true,
        'color_value' 		=> 'heading-default',
    )),
    array (
        array (
            'param_name' 	=> 'price_size',
            'type' 			=> 'dropdown',
            'heading' 		=> __('Price size', 'pixfort-core'),
            'admin_label'	=> false,
            'value' 		=> array(
                __('H1','pixfort-core') 	=> 'h1',
                __('H2','pixfort-core')	    => 'h2',
                __('H3','pixfort-core')	    => 'h3',
                __('H4','pixfort-core')	    => 'h4',
                __('H5','pixfort-core')	    => 'h5',
                __('H6','pixfort-core')	    => 'h6',
                // __('Custom','pixfort-core')	    => 'custom',
            ),
            'std' => 'h2',
        ),
    ),
    pix_get_text_format_params(array(
        'prefix' 		=> 'subtitle_',
        'name' 		=> 'Subtitle',
        'bold' 		=> true,
        'bold_value' 		=> '',
        'italic' 		=> true,
        'italic_value' 		=> '',
        'secondary_font' 		=> true,
        'secondary_font_value' 		=> '',
        'color' 		=> true,
        'color_value' 		=> 'body-default',
    ))
);

$more = array(

    array (
        'param_name' 	=> 'pricing_content_align',
        'type' 			=> 'dropdown',
        'heading' 		=> __('Content align', 'pixfort-core'),
        'admin_label'	=> false,
        'value'			=> array_flip(array(
            ''			=> 'Default',
            'text-left'			=> 'Left',
            'text-center'		=> 'Center',
            'text-right' 		=> 'Right',
        )),
    ),

                array(
                    'type' => 'css_editor',
                    'heading' => __( 'Css', 'essentials-core' ),
                    'param_name' => 'css',
                    'group' => __( 'Design options', 'essentials-core' ),
                ),
);
$final_pricing_params = array_merge($pricing_params, $effects_params,  pix_add_params_to_group($title_opts, "Badge"),pix_add_params_to_group($price_opts, "Price & Subtitle"),pix_add_params_to_group($features_list_params, "Features"), pix_add_params_to_group($button_params,"button"), $more);
vc_map( array (
    'base' 			=> 'pix_pricing',
    'name' 			=> __('Pricing Table', 'pixfort-core'),
    'category' 		=> __('pixfort', 'pixfort-core'),
    'class'         => 'pixfort_element',
    'icon' 			=> PIX_CORE_PLUGIN_URI . 'functions/images/elements/pricing.png',
    'description' 	=> __('Create custom pricing table', 'pixfort-core'),
    "weight"	=> "1000",
    'params' 		=> $final_pricing_params
));

 ?>
