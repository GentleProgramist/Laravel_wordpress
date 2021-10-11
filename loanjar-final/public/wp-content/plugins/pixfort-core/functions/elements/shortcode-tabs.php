<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}






vc_map(

	array(
'name' => esc_html__( 'Pix Tabs', 'pixfort-core' ),
'base' => 'pix_tabs',
'icon' => 'icon-wpb-ui-tab-content',
'is_container' => true,
"content_element" => true,
'show_settings_on_create' => false,
'as_parent' => array(
	'only' => 'vc_tta_section',
),
'category' => esc_html__( 'Content', 'pixfort-core' ),
'description' => esc_html__( 'Tabbed content', 'pixfort-core' ),
'params' => array(
	array(
		'type' => 'textfield',
		'param_name' => 'title',
		'heading' => esc_html__( 'Widget title', 'pixfort-core' ),
		'description' => esc_html__( 'Enter text used as widget title (Note: located above content element).', 'pixfort-core' ),
	),

),
'js_view' => 'VcColumnView',
)

);



if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
  class WPBakeryShortCode_Pix_Tabs extends WPBakeryShortCodesContainer {
  }
}


 ?>
