<?php




function pix_templates_countdown(){
    $templates = array();

    // event

    $data = array(); // Create new array
    $data['name'] = __( 'Countdown Event', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/countdown/event-countdown.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all content countdown'; // CSS class name
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" css=".vc_custom_1590469521780{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #f8f9fa !important;}"][vc_row full_width="stretch_row"][vc_column content_align="text-center" offset="vc_col-lg-offset-2 vc_col-lg-8"][pix_badge bold="font-weight-bold" secondary_font="" text_color="white" bg_color="secondary" text_size="custom" style="" hover_effect="" add_hover_effect="" animation="fade-in-up" padding="" text="Save the Date" css=".vc_custom_1590468318398{margin-bottom: 15px !important;padding-top: 9px !important;padding-right: 15px !important;padding-bottom: 8px !important;padding-left: 15px !important;}" delay="300" text_custom_size="14px"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="heading-default"]Essentials is coming soon![/sliding-text][pix_text size="text-18" content_color="body-default" position="text-center" animation="fade-in-up" delay="600" max_width="600px"]Combine seamlessly fitting layouts, customize everything you want, switch components on the go using our page builder.[/pix_text][pix_countdown date="12/30/2021 12:00:00" animation="fade-in-up" bold="font-weight-bold" secondary_font="secondary-font" content_color="heading-default" css=".vc_custom_1590474369065{padding-bottom: 20px !important;}" delay="600"][pix_button btn_text="Reserve your seat" btn_color="white" btn_text_color="heading-default" btn_size="md" btn_effect="2" btn_hover_effect="2" btn_add_hover_effect="" btn_icon_animation="yes" btn_animation="fade-in-up" btn_icon="pixicon-ticket-2" btn_anim_delay="800" css=".vc_custom_1590461570528{margin-top: 10px !important;}" btn_link="#"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    return $templates;
}




 ?>
