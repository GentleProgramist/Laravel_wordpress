<?php


// Search -----------------------------
vc_map( array (
    'base' 			=> 'pix_search',
    'name' 			=> __('Search', 'pixfort-core'),
    'category' 		=> __('pixfort', 'pixfort-core'),
    'class'         => 'pixfort_element',
    "weight"	=> "1000",
    'icon' 			=> PIX_CORE_PLUGIN_URI . 'functions/images/elements/search.png',
    'description' 	=> __('Add custom Search element', 'pixfort-core'),
    // "front_enqueue_js" => PIX_CORE_PLUGIN_URI . 'functions/js/views/search.js',
    'params' 		=> array (



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
          'param_name' 	=> 'search_div',
          'type' 			=> 'dropdown',
          'heading' 		=> __('Field inside a container', 'pixfort-core'),
          "description" => __( "if enabled, other elements won't show on the same line.", "js_composer"),
          'admin_label'	=> false,
          'value'			=> array_flip(array(
              '' 		=> 'Disabled',
              'text-center' 		=> 'Center align',
              'text-left' 		=> 'Left align',
              'text-right' 		=> 'Right align',
          )),
      ),

      array (
          'param_name' 	=> 'max_width',
          'type' 			=> 'textfield',
          'heading' 		=> __('Field max width', 'pixfort-core'),
          'description'     => "Input the width with the unit (eg. 300px)"
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
