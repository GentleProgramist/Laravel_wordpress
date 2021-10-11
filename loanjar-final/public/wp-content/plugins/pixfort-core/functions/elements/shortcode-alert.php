<?php

// Alert -----------------------------
vc_map( array (
    'base' 			=> 'alertblock',
    'name' 			=> __('Alert', 'pixfort-core'),
    'category' 		=> __('pixfort', 'pixfort-core'),
    'class'         => 'pixfort_element',
    "weight"	=> "1000",
    'icon' 			=> PIX_CORE_PLUGIN_URI . 'functions/images/elements/alert.png',
    'description' 	=> __('Add clean alert box', 'pixfort-core'),
    'params' 		=> array (
        array (
            'param_name' 	=> 'title',
            'type' 			=> 'textfield',
            'heading' 		=> __('Title', 'pixfort-core'),
            'admin_label'	=> true,
        ),

        array(
            "type" => "checkbox",
            "heading" => __( "Title format", "pix-opts" ),
            "param_name" => "bold",
            "value" => array("Bold" => "font-weight-bold"),
            "std" => "font-weight-bold"
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
        ),



        array (
            'param_name' 	=> 'alert_type_1',
            'type' 			=> 'dropdown',
            'heading' 		=> __('Alert Type', 'pixfort-core'),
            'admin_label'	=> true,
            'value'			=> array_flip(array(
                'success'		=> 'Success',
                'secondary'		=> 'Secondary',
                'primary' 		=> 'Primary',
                'danger' 		=> 'Danger',
                'warning' 		=> 'Warning',
                'info' 		    => 'Info',
                'light' 		=> 'Light',
                'dark' 		    => 'Dark',
            )),
        ),
        array(
            "type" => "checkbox",
            "class" => "",
            "heading" => __( "Show shadow", "pix-opts" ),
            "param_name" => "shadow",
            "value" => __( "1", "pix-opts" ),
            "description" => __( "Add shadow to the alert element.", "pix-opts" )
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


        array(
            'type' => 'css_editor',
            'heading' => __( 'Css', 'essentials-core' ),
            'param_name' => 'css',
            'group' => __( 'Design options', 'essentials-core' ),
        ),

    )
));

?>
