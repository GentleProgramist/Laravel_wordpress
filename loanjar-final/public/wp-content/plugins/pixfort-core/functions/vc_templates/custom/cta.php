<?php




function pix_templates_cta(){
    $templates = array();

    // Startup

    $data = array(); // Create new array
    $data['name'] = __( 'Call to action Startup', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/startup-cta.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta'; // CSS class name
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row" pix_bg_grdient="bg-gradient-primary" pix_visibility="1" css=".vc_custom_1589669273862{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_column][pix_cta cta_style="default" title_color="white" content_color="dark-opacity-5" content_size="text-18" animation="fade-in-up" btn_text="Purchase Now" btn_color="dark-opacity-3" btn_size="lg" btn_effect="" btn_hover_effect="6" btn_add_hover_effect="" btn_icon_animation="yes" btn_animation="fade-in-up" style="" hover_effect="" add_hover_effect="" title="Essentials is Now Available" css=".vc_custom_1589673139140{border-radius: 10px !important;}" btn_icon="pixicon-bag-2" btn_link="https://pixfort.website/redirect?to=essentials"]Over 9 million digital products created by a global community.[/pix_cta][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // Software

    $data = array(); // Create new array
    $data['name'] = __( 'Scale image with CTA', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/software-content-cta.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template all content cta'; // CSS class name
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="1" css=".vc_custom_1589847565752{border-top-width: 1px !important;padding-top: 100px !important;padding-bottom: 200px !important;background-color: #ffffff !important;border-top-color: #e9ecef !important;border-top-style: solid !important;}"][vc_row css=".vc_custom_1559172088149{padding-bottom: 80px !important;}"][vc_column content_align="text-center"][pix_badge bold="font-weight-bold" secondary_font="secondary-font" text_color="white" bg_color="secondary" style="" hover_effect="" add_hover_effect="" animation="fade-in-up" padding="" text="Call to Action" css=".vc_custom_1589827206962{margin-bottom: 15px !important;padding-top: 9px !important;padding-right: 15px !important;padding-bottom: 8px !important;padding-left: 15px !important;}" delay="300"][heading title_color="heading-default" title_size="h2" animation="fade-in-up" content_color="body-default" title="Start doing great things!" delay="1000"][pix_text size="text-20" content_color="dark-opacity-4" animation="fade-in-up" delay="1200" css=".vc_custom_1559171195710{padding-top: 10px !important;}"]Combine seamlessly fitting layouts, customize everything you.[/pix_text][/vc_column][/vc_row][vc_row equal_height="yes" content_placement="bottom"][vc_column][content_box style="" hover_effect="" add_hover_effect="" rounded_box="rounded-10" animation="" css=".vc_custom_1589847647316{border-top-width: 2px !important;border-right-width: 2px !important;border-bottom-width: 2px !important;border-left-width: 2px !important;padding-top: 30px !important;padding-right: 30px !important;padding-bottom: 30px !important;padding-left: 30px !important;background-color: #f8f9fa !important;border-left-color: #e9ecef !important;border-left-style: solid !important;border-right-color: #e9ecef !important;border-right-style: solid !important;border-top-color: #e9ecef !important;border-top-style: solid !important;border-bottom-color: #e9ecef !important;border-bottom-style: solid !important;}"][vc_row_inner equal_height="yes" css=".vc_custom_1561688326102{margin-top: 40px !important;}"][vc_column_inner el_class="d-md-flex align-items-center" width="5/12" css=".vc_custom_1561569801865{padding-top: 40px !important;padding-right: 40px !important;padding-bottom: 40px !important;padding-left: 40px !important;}"][pix_badge bold="font-weight-bold" secondary_font="secondary-font" text_color="white" bg_color="red" style="" hover_effect="" add_hover_effect="" padding="" text="Create yours Now" css=".vc_custom_1589827179272{margin-bottom: 15px !important;padding-top: 9px !important;padding-right: 15px !important;padding-bottom: 8px !important;padding-left: 15px !important;}"][heading title_color="heading-default" title_size="h2" position="text-left" animation="fade-in-up" title="Make your own website today!" delay="800"][pix_text size="text-18" content_color="body-default" animation="fade-in-up" delay="900" css=".vc_custom_1589847694042{padding-top: 10px !important;padding-bottom: 10px !important;}"]Over 9 million digital products created by a global community of designers, developers.[/pix_text][pix_button btn_text="Watch the Video" btn_color="white" btn_text_color="body-default" btn_size="md" btn_rounded="btn-rounded" btn_effect="2" btn_hover_effect="2" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="yes" btn_animation="fade-in-up" btn_link="#" btn_icon="pixicon-angle-right" btn_anim_delay="800"][/vc_column_inner][vc_column_inner el_class="d-md-flex align-items-end" width="7/12" css=".vc_custom_1559172226880{margin-bottom: -10px !important;}"][pix_img align="text-center" pix_scroll_parallax="scroll_parallax" xaxis="50" animation="fade-in-left" pix_scale_in="pix-scale-in-sm" style="" hover_effect="" add_hover_effect="" image="https://essentials.pixfort.com/software/wp-content/uploads/sites/2/2019/06/cta-image-tiny.png" delay="800" css=".vc_custom_1589841426470{margin-bottom: -200px !important;}"][/vc_column_inner][/vc_row_inner][/content_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // saas

    $data = array(); // Create new array
    $data['name'] = __( 'Colorful CTA box', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/saas-cta-content-left.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template all content cta'; // CSS class name
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="1" css=".vc_custom_1590117379165{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row content_placement="middle" pix_over_visibility="2" bottom_divider_select="8" b_has_animation="true" b_1_color="#f8f9fa" b_2_is_gradient="true" b_2_color="#ff6c5f" b_2_color_2="#1274e7" b_2_animation="fade-in-up" b_3_is_gradient="true" b_3_color="rgba(255,255,255,0.1)" b_3_color_2="rgba(255,255,255,0.01)" b_3_animation="fade-in-up" css=".vc_custom_1590117388102{background-color: #343a40 !important;border-radius: 10px !important;}" b_2_delay="200" b_3_delay="300"][vc_column width="1/2" css=".vc_custom_1590022743741{padding-top: 30px !important;padding-right: 40px !important;padding-bottom: 30px !important;padding-left: 40px !important;}" offset="vc_col-lg-offset-1 vc_col-lg-5"][pix_badge bold="font-weight-bold" secondary_font="secondary-font" text_color="white" bg_color="gradient-primary" style="" hover_effect="" add_hover_effect="" padding="" text="Create yours Now" css=".vc_custom_1590022525883{margin-bottom: 15px !important;padding-top: 5px !important;padding-right: 9px !important;padding-bottom: 5px !important;padding-left: 9px !important;}"][heading title_color="white" title_size="h2" position="text-left" animation="fade-in-up" title="Make your own website today!" delay="800"][pix_text size="text-18" content_color="body-default" animation="fade-in-up" delay="900" css=".vc_custom_1590022563615{padding-top: 10px !important;padding-bottom: 10px !important;}" max_width="400px"]Over 9 million digital products created by a global community of designers, developers.[/pix_text][pix_button btn_text="Watch the Video" btn_color="green" btn_size="md" btn_effect="2" btn_hover_effect="2" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="yes" btn_animation="fade-in-up" btn_link="#" btn_icon="pixicon-angle-right" btn_anim_delay="800"][/vc_column][vc_column width="1/2" css=".vc_custom_1590022821749{padding-top: 40px !important;}"][pix_img align="text-center" pix_scroll_parallax="scroll_parallax" xaxis="50" animation="fade-in-left" pix_scale_in="pix-scale-in-lg" style="" hover_effect="" add_hover_effect="" image="https://essentials.pixfort.com/saas/wp-content/uploads/sites/3/2020/05/saas-cta-mockup.png" delay="800" width="100%" css=".vc_custom_1590083737827{margin-left: -80px !important;}"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array(); // Create new array
    $data['name'] = __( 'Colorful CTA box', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/saas-cta-content-right.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template all content cta'; // CSS class name
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="1" css=".vc_custom_1590117379165{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row content_placement="middle" pix_over_visibility="2" bottom_divider_select="8" b_has_animation="true" b_1_color="#f8f9fa" b_2_is_gradient="true" b_2_color="#ff6c5f" b_2_color_2="#1274e7" b_2_animation="fade-in-up" b_3_is_gradient="true" b_3_color="rgba(255,255,255,0.1)" b_3_color_2="rgba(255,255,255,0.01)" b_3_animation="fade-in-up" css=".vc_custom_1590117388102{background-color: #343a40 !important;border-radius: 10px !important;}" b_2_delay="200" b_3_delay="300"][vc_column width="1/2" css=".vc_custom_1590022821749{padding-top: 40px !important;}"][pix_img align="text-center" pix_scroll_parallax="scroll_parallax" xaxis="50" animation="fade-in-left" pix_scale_in="pix-scale-in-lg" style="" hover_effect="" add_hover_effect="" image="https://essentials.pixfort.com/saas/wp-content/uploads/sites/3/2020/05/saas-cta-mockup.png" delay="800" width="100%" css=".vc_custom_1590083737827{margin-left: -80px !important;}"][/vc_column][vc_column width="1/2" css=".vc_custom_1590117451251{padding-top: 30px !important;padding-right: 40px !important;padding-bottom: 30px !important;padding-left: 40px !important;}"][pix_badge bold="font-weight-bold" secondary_font="secondary-font" text_color="white" bg_color="gradient-primary" style="" hover_effect="" add_hover_effect="" padding="" text="Create yours Now" css=".vc_custom_1590022525883{margin-bottom: 15px !important;padding-top: 5px !important;padding-right: 9px !important;padding-bottom: 5px !important;padding-left: 9px !important;}"][heading title_color="white" title_size="h2" position="text-left" animation="fade-in-up" title="Make your own website today!" delay="800"][pix_text size="text-18" content_color="body-default" animation="fade-in-up" delay="900" css=".vc_custom_1590022563615{padding-top: 10px !important;padding-bottom: 10px !important;}" max_width="400px"]Over 9 million digital products created by a global community of designers, developers.[/pix_text][pix_button btn_text="Watch the Video" btn_color="green" btn_size="md" btn_effect="2" btn_hover_effect="2" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="yes" btn_animation="fade-in-up" btn_link="#" btn_icon="pixicon-angle-right" btn_anim_delay="800"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // crypto

    $data = array(); // Create new array
    $data['name'] = __( 'Gradient CTA Crypto', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/crypto-cta.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template all content cta'; // CSS class name
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_bg_grdient="bg-gradient-primary"][vc_row full_width="stretch_row" content_placement="middle" pix_bg_grdient="bg-gradient-primary" pix_visibility="1" css=".vc_custom_1590718531902{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_column width="1/4" content_align="text-center"][pix_img align="text-center" animation="fade-in-up" style="" hover_effect="" add_hover_effect="" image="https://essentials.pixfort.com/cryptocurrency/wp-content/uploads/sites/12/2020/05/cta-image.png" alt="Essentials Logo" height="200px"][/vc_column][vc_column width="3/4"][pix_cta cta_style="default" title_color="white" title_size="h3" content_color="light-opacity-7" content_size="text-18" animation="fade-in-up" btn_text="Purchase Now" btn_style="flat" btn_text_color="dark-opacity-5" btn_size="lg" btn_effect="3" btn_hover_effect="3" btn_add_hover_effect="" btn_icon_animation="yes" btn_animation="fade-in-up" style="" hover_effect="" add_hover_effect="" title="Essentials is Now Available" css=".vc_custom_1590718538585{border-radius: 10px !important;}" btn_icon="pixicon-bag-2" btn_link="https://pixfort.website/redirect?to=essentials"]Over 9 million digital products by a global community.[/pix_cta][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // services

    $data = array(); // Create new array
    $data['name'] = __( 'CTA box Services', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/services-cta.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template all content cta'; // CSS class name
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" top_divider_select="8" t_2_is_gradient="true" t_2_color="#1769ff" t_3_is_gradient="true" t_3_color_2="#ffcc2e" css=".vc_custom_1590626205370{padding-top: 80px !important;padding-bottom: 80px !important;}" el_id="pix_section_pricing"][vc_row full_width="stretch_row" content_placement="middle"][vc_column offset="vc_col-md-offset-1 vc_col-md-10"][content_box style="3" hover_effect="3" add_hover_effect="" rounded_box="rounded-10" animation="" css=".vc_custom_1590626145571{padding-top: 60px !important;padding-right: 40px !important;padding-bottom: 60px !important;padding-left: 40px !important;background-color: #ffffff !important;}"][vc_row_inner][vc_column_inner width="1/3"][pix_img align="text-center" animation="fade-in-left" style="" hover_effect="" add_hover_effect="1" image="https://essentials.pixfort.com/services/wp-content/uploads/sites/8/2020/05/cta-box-image.png"][/vc_column_inner][vc_column_inner width="2/3"][pix_feature title_size="h3" title_bold="font-weight-bold" content_size="text-18" content_color="body-default" padding_title="" animation="fade-in-up" title="Get Essentials and start building next-generation websites" delay="400" css=".vc_custom_1590626002551{margin-bottom: 30px !important;}"]Combine seamlessly fitting layouts, customize everything you want, switch components on the go using our bootstrap.[/pix_feature][pix_button btn_text="Purchase Essentials" btn_target="true" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="yes" btn_animation="fade-in-up" btn_link="https://pixfort.website/redirect?to=essentials" btn_icon="pixicon-angle-right" btn_anim_delay="800"][/vc_column_inner][/vc_row_inner][/content_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // event

    $data = array(); // Create new array
    $data['name'] = __( 'CTA Event', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/event-cta.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template all content cta'; // CSS class name
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" css=".vc_custom_1590465373410{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #f8f9fa !important;}"][vc_row full_width="stretch_row"][vc_column content_align="text-center" offset="vc_col-lg-offset-2 vc_col-lg-8"][pix_badge bold="font-weight-bold" secondary_font="" text_color="white" bg_color="secondary" text_size="custom" style="" hover_effect="" add_hover_effect="" animation="fade-in-up" padding="" text="Save the Date" css=".vc_custom_1590468355637{margin-bottom: 15px !important;padding-top: 9px !important;padding-right: 15px !important;padding-bottom: 8px !important;padding-left: 15px !important;}" delay="300" text_custom_size="14px"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="heading-default"]Get your Ticket Today![/sliding-text][pix_text size="text-18" content_color="body-default" position="text-center" animation="fade-in-up" delay="600" max_width="600px"]Combine seamlessly fitting layouts, customize everything you want, switch components on the go using our page builder.[/pix_text][pix_button btn_text="Reserve your seat" btn_color="white" btn_text_color="heading-default" btn_size="lg" btn_effect="2" btn_hover_effect="2" btn_add_hover_effect="" btn_icon_animation="yes" btn_animation="fade-in-up" btn_icon="pixicon-ticket-2" btn_anim_delay="800" css=".vc_custom_1590469405525{margin-top: 10px !important;}" btn_link="#pix_section_pricing"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // bold

    $data = array(); // Create new array
    $data['name'] = __( 'CTA Bold', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/bold-cta.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template all content cta'; // CSS class name
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592069971385{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}" fade_in_intro="https://essentials.pixfort.com/bold/wp-content/uploads/sites/13/2020/06/app-pages-intro-bg.png"][vc_row full_width="stretch_row" gap="30"][vc_column content_align="text-center" css=".vc_custom_1592058386703{margin-top: 0px !important;padding-top: 0px !important;border-radius: 10px !important;}" offset="vc_col-md-offset-1 vc_col-md-10"][content_box style="3" hover_effect="" add_hover_effect="2" rounded_box="rounded-10" animation="fade-in-up" sticky_top="sticky-top" pix_scale_in="pix-scale-in-sm" css=".vc_custom_1592071963805{padding-top: 60px !important;padding-right: 60px !important;padding-bottom: 60px !important;padding-left: 60px !important;background-color: #ffffff !important;border-radius: 10px !important;}"][pix_video_popup aspect="embed-responsive-16by9" animation="fade-in-up" embed_code="JTNDaWZyYW1lJTIwd2lkdGglM0QlMjI1NjAlMjIlMjBoZWlnaHQlM0QlMjIzMTUlMjIlMjBzcmMlM0QlMjJodHRwcyUzQSUyRiUyRnd3dy55b3V0dWJlLmNvbSUyRmVtYmVkJTJGdU00SW5ORUdIa00lMjIlMjBmcmFtZWJvcmRlciUzRCUyMjAlMjIlMjBhbGxvdyUzRCUyMmFjY2VsZXJvbWV0ZXIlM0IlMjBhdXRvcGxheSUzQiUyMGVuY3J5cHRlZC1tZWRpYSUzQiUyMGd5cm9zY29wZSUzQiUyMHBpY3R1cmUtaW4tcGljdHVyZSUyMiUyMGFsbG93ZnVsbHNjcmVlbiUyMGF1dG9wbGF5JTNEJTIyYXV0b3BsYXklMjIlM0UlM0MlMkZpZnJhbWUlM0U=" css=".vc_custom_1592058289693{padding-bottom: 30px !important;}"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="heading-default" css=".vc_custom_1592058368753{padding-top: 20px !important;padding-bottom: 10px !important;}" max_width="800px"]Get The Most Advanced WordPress Theme on Earth![/sliding-text][pix_button btn_text="Purchase a License" btn_target="true" btn_style="outline" btn_color="gray-2" btn_text_color="heading-default" btn_size="lg" btn_rounded="btn-rounded" btn_effect="" btn_hover_effect="3" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="yes" btn_animation="fade-in-up" btn_link="https://pixfort.website/redirect?to=essentials" btn_icon="pixicon-angle-right" btn_anim_delay="2000" css=".vc_custom_1592058488433{background-color: #ffffff !important;border-radius: 5px !important;}"][/content_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // creative

    $data = array(); // Create new array
    $data['name'] = __( 'CTA Video Clients', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/creative-cta-video-client.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template all content cta'; // CSS class name
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" bottom_divider_select="19" bottom_layers="1" b_1_color="#f8f9fa" css=".vc_custom_1592352079790{padding-top: 60px !important;padding-bottom: 60px !important;background-color: #ffffff !important;}"][vc_row][vc_column content_align="text-center" offset="vc_col-md-offset-2 vc_col-md-8"][content_box style="" hover_effect="" add_hover_effect="" rounded_box="rounded-10" animation="" css=".vc_custom_1592351962093{padding-top: 40px !important;padding-right: 30px !important;padding-bottom: 40px !important;padding-left: 30px !important;border-radius: 10px !important;}"][pix_video_popup aspect="embed-responsive-16by9" animation="fade-in-up" text_color="heading-default" embed_code="JTNDaWZyYW1lJTIwd2lkdGglM0QlMjI1NjAlMjIlMjBoZWlnaHQlM0QlMjIzMTUlMjIlMjBzcmMlM0QlMjJodHRwcyUzQSUyRiUyRnd3dy55b3V0dWJlLmNvbSUyRmVtYmVkJTJGdU00SW5ORUdIa00lMjIlMjBmcmFtZWJvcmRlciUzRCUyMjAlMjIlMjBhbGxvdyUzRCUyMmFjY2VsZXJvbWV0ZXIlM0IlMjBhdXRvcGxheSUzQiUyMGVuY3J5cHRlZC1tZWRpYSUzQiUyMGd5cm9zY29wZSUzQiUyMHBpY3R1cmUtaW4tcGljdHVyZSUyMiUyMGFsbG93ZnVsbHNjcmVlbiUyMGF1dG9wbGF5JTNEJTIyYXV0b3BsYXklMjIlM0UlM0MlMkZpZnJhbWUlM0U="][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="heading-default" css=".vc_custom_1590887231991{padding-top: 30px !important;}" max_width="600px"]Join the revolution[/sliding-text][pix_text size="text-20" content_color="body-default" animation="fade-in-up" delay="400" max_width="500px"]Creating stunning and professional websites has never been easier, today with Essentials you will be able to build awesome websites in no time![/pix_text][pix_button btn_text="Purchase Essentials" btn_secondary_font="secondary-font" btn_style="flat" btn_color="gradient-primary" btn_text_color="white" btn_size="md" btn_effect="6" btn_hover_effect="4" btn_add_hover_effect="7" btn_icon_position="after" btn_link="#" btn_icon="pixicon-angle-right"][clients clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/creative/wp-content/uploads/sites/14/2020/06/houzz.png%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/creative/wp-content/uploads/sites/14/2020/06/uber.png%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/creative/wp-content/uploads/sites/14/2020/06/eventbrite.png%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/creative/wp-content/uploads/sites/14/2020/06/stripe.png%22%7D%5D" add_hover_effect="" style="client" animation="fade-in-up" delay_items="yes" delay="1000" css=".vc_custom_1592351951704{padding-top: 40px !important;}"][/content_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'CTA Creative', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/creative-cta.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all content cta';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" bottom_divider_select="19" bottom_layers="1" b_1_color="#f8f9fa" css=".vc_custom_1592520012932{padding-top: 60px !important;padding-bottom: 60px !important;background-color: #ffffff !important;}"][vc_row][vc_column content_align="text-center" offset="vc_col-md-offset-2 vc_col-md-8"][content_box style="" hover_effect="" add_hover_effect="" rounded_box="rounded-10" animation="" css=".vc_custom_1592351962093{padding-top: 40px !important;padding-right: 30px !important;padding-bottom: 40px !important;padding-left: 30px !important;border-radius: 10px !important;}"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="heading-default" css=".vc_custom_1590887231991{padding-top: 30px !important;}" max_width="600px"]Join the revolution[/sliding-text][pix_text size="text-20" content_color="body-default" animation="fade-in-up" delay="400" max_width="500px"]Creating stunning and professional websites has never been easier, today with Essentials you will be able to build awesome websites in no time![/pix_text][pix_button btn_text="Purchase Essentials" btn_secondary_font="secondary-font" btn_style="flat" btn_color="gradient-primary" btn_text_color="white" btn_size="md" btn_effect="6" btn_hover_effect="4" btn_add_hover_effect="7" btn_icon_position="after" btn_link="#" btn_icon="pixicon-angle-right"][/content_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // restaurant

    $data = array();
    $data['name'] = __( 'Tiny CTA Restaurant', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/restaurant-footer-cta.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row" pix_bg_grdient="bg-gradient-primary" css=".vc_custom_1591054438907{padding-top: 40px !important;padding-bottom: 30px !important;background-color: #f8f9fa !important;}" fade_in_intro="https://essentials.pixfort.com/restaurant/wp-content/uploads/sites/17/2020/06/intro-bg.jpg"][vc_column][pix_button btn_text="Order your meal now" btn_target="true" btn_secondary_font="secondary-font" btn_color="gradient-primary" btn_text_color="white" btn_size="lg" btn_effect="2" btn_hover_effect="3" btn_add_hover_effect="" btn_icon_animation="yes" btn_div="text-center" btn_animation="fade-in-up" btn_link="https://essentials.pixfort.com/restaurant/shop" btn_icon="pixicon-bag-2"][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'CTA Restaurant', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/restaurant-cta.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592609020892{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row full_width="stretch_row"][vc_column content_align="text-center"][pix_icon media_type="duo_icon" pix_duo_icon="carrot" icon_color="gradient-primary" has_icon_bg="true" icon_bg_color="gradient-primary-light" icon_size="48" content_align="center" style="" hover_effect="" add_hover_effect="" animation="fade-in-up"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="gradient-primary" max_width="800px" css=".vc_custom_1592410440648{padding-top: 20px !important;}"]Start shopping now![/sliding-text][pix_text size="text-20" content_color="body-default" position="text-center" animation="fade-in-up" max_width="600px" delay="1000"]This is just a simple text made for this unique and awesome template, you can replace it with any text.[/pix_text][pix_button btn_text="Go to our store" btn_color="gradient-primary" btn_text_color="white" btn_size="lg" btn_effect="2" btn_hover_effect="2" btn_add_hover_effect="" btn_icon_animation="yes" btn_animation="fade-in-left" btn_icon="pixicon-bag-2" btn_link="https://essentials.pixfort.com/restaurant/shop" btn_anim_delay="1200"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // ecommerce

    $data = array();
    $data['name'] = __( 'CTA Ecommerce', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/ecommerce-cta.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta headings';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592614799462{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row full_width="stretch_row" content_placement="middle"][vc_column width="2/3" css=".vc_custom_1561772161711{margin-top: 20px !important;margin-bottom: 20px !important;}"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h3" text_color="heading-default"]Categories from Essentials[/sliding-text][pix_text size="text-18" content_color="body-default" animation="fade-in-up" delay="600"]Combine seamlessly fitting layouts, customize everything.[/pix_text][/vc_column][vc_column width="1/3" content_align="text-right" el_class="d-md-flex align-items-center"][pix_button btn_text="Check our shop" btn_color="primary-light" btn_size="md" btn_rounded="btn-rounded" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" btn_animation="fade-in-up" btn_link="https://essentials.pixfort.com/ecommerce/shop/" btn_icon="pixicon-cart-2" btn_anim_delay="800"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'CTA 2 Ecommerce', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/ecommerce-cta-2.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta';
    $data['content']  = <<<CONTENT
 [vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1591319646257{background-color: #ffffff !important;}"][vc_row content_placement="middle" css=".vc_custom_1592616227351{padding-top: 100px !important;padding-bottom: 100px !important;}"][vc_column content_align="text-center"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h3" text_color="heading-default" max_width="600px" css=".vc_custom_1592616176422{padding-top: 20px !important;}"]Looking for unique product? Check this category.[/sliding-text][pix_text size="text-18" content_color="body-default" position="text-center" animation="fade-in-up" max_width="500px" delay="1000" css=".vc_custom_1592616185354{padding-bottom: 10px !important;}"]Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum industry's standard.[/pix_text][pix_button btn_text="View all categories" btn_color="primary-light" btn_size="md" btn_rounded="btn-rounded" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" btn_animation="fade-in-up" btn_link="#" btn_icon="pixicon-eye-1" btn_anim_delay="800"][pix_button btn_text="Check our shop" btn_style="blink" btn_color="gray-2" btn_text_color="heading-default" btn_size="md" btn_rounded="btn-rounded" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" btn_animation="fade-in-up" btn_link="https://essentials.pixfort.com/ecommerce/shop/" btn_icon="pixicon-cart-2" btn_anim_delay="800" css=".vc_custom_1591317139404{background-color: rgba(0,0,0,0.05) !important;*background-color: rgb(0,0,0) !important;}"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'CTA box Ecommerce', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/ecommerce-cta-box.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta content video';
    $data['content']  = <<<CONTENT
 [vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592615162961{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #f8f9fa !important;}"][vc_row][vc_column offset="vc_col-md-offset-1 vc_col-md-10"][content_box style="3" hover_effect="" add_hover_effect="" animation="" css=".vc_custom_1591311114707{padding-top: 80px !important;padding-right: 40px !important;padding-bottom: 40px !important;padding-left: 40px !important;background-image: url(https://essentials.pixfort.com/ecommerce/wp-content/uploads/sites/18/2020/06/cat-8.jpg?id=79) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][pix_badge bold="font-weight-bold" secondary_font="secondary-font" text_color="white" bg_color="dark-opacity-2" style="" hover_effect="" add_hover_effect="" padding="" text="Create yours Now" css=".vc_custom_1591245257978{margin-bottom: 15px !important;padding-top: 5px !important;padding-right: 9px !important;padding-bottom: 5px !important;padding-left: 9px !important;}"][heading title_color="white" title_size="h3" position="text-left" animation="fade-in-up" title="Make your own website today!" delay="800"][pix_text size="text-18" content_color="light-opacity-5" animation="fade-in-up" delay="900" css=".vc_custom_1591245246427{padding-top: 10px !important;padding-bottom: 10px !important;}" max_width="400px"]Over 9 million digital products by a community.[/pix_text][pix_video_popup aspect="embed-responsive-16by9" animation="fade-in-up" size="50" css=".vc_custom_1592128375665{margin-right: 10px !important;margin-bottom: 10px !important;}" embed_code="JTNDaWZyYW1lJTIwd2lkdGglM0QlMjI1NjAlMjIlMjBoZWlnaHQlM0QlMjIzMTUlMjIlMjBzcmMlM0QlMjJodHRwcyUzQSUyRiUyRnd3dy55b3V0dWJlLmNvbSUyRmVtYmVkJTJGdU00SW5ORUdIa00lMjIlMjBmcmFtZWJvcmRlciUzRCUyMjAlMjIlMjBhbGxvdyUzRCUyMmFjY2VsZXJvbWV0ZXIlM0IlMjBhdXRvcGxheSUzQiUyMGVuY3J5cHRlZC1tZWRpYSUzQiUyMGd5cm9zY29wZSUzQiUyMHBpY3R1cmUtaW4tcGljdHVyZSUyMiUyMGFsbG93ZnVsbHNjcmVlbiUyMGF1dG9wbGF5JTNEJTIyYXV0b3BsYXklMjIlM0UlM0MlMkZpZnJhbWUlM0U=" delay="700"][pix_button btn_text="Visit our shop" btn_color="dark-opacity-2" btn_size="md" btn_rounded="btn-rounded" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" btn_animation="fade-in-up" btn_link="https://essentials.pixfort.com/ecommerce/shop/" btn_icon="pixicon-bag-2" btn_anim_delay="800"][/content_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'CTA circles Ecommerce', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/ecommerce-cta-circles.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta headings ';
    $data['content']  = <<<CONTENT
 [vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592614799462{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row full_width="stretch_row" content_placement="middle" css=".vc_custom_1591310874870{padding-top: 30px !important;padding-bottom: 30px !important;}"][vc_column width="1/3"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h3" text_color="heading-default"]Latest Products[/sliding-text][pix_text size="text-18" content_color="body-default" animation="fade-in-up" delay="600"]Combine seamlessly fitting layouts.[/pix_text][/vc_column][vc_column width="2/3" content_align="text-right" el_class="d-md-flex align-items-center"][circles circles="%5B%7B%22title%22%3A%22Online%20Shop%22%2C%22img%22%3A%22https://essentials.pixfort.com/ecommerce/wp-content/uploads/sites/18/2020/06/shipe-image-2.jpg%22%2C%22link%22%3A%22%23%22%2C%22color%22%3A%22pix-bg-custom%22%7D%2C%7B%22title%22%3A%22Secure%20Platform%22%2C%22img%22%3A%22https://essentials.pixfort.com/ecommerce/wp-content/uploads/sites/18/2020/06/shipe-image-4.jpg%22%2C%22link%22%3A%22%23%22%2C%22color%22%3A%22pix-bg-custom%22%7D%2C%7B%22title%22%3A%22Worldwide%22%2C%22img%22%3A%22https://essentials.pixfort.com/ecommerce/wp-content/uploads/sites/18/2020/04/shipe-image-1.jpg%22%2C%22link%22%3A%22%23%22%2C%22color%22%3A%22pix-bg-custom%22%7D%5D" effect="" circles_size="pix-md-circles" circles_align="justify-content-end" btn_text="Check all categories" btn_style="link" btn_color="gray-5" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="yes" btn_link="https://essentials.pixfort.com/ecommerce/shop/" btn_icon="pixicon-angle-right"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // construction

    $data = array();
    $data['name'] = __( 'CTA Construction', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/construction-cta.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta';
    $data['content']  = <<<CONTENT
 [vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1591149032271{padding-top: 60px !important;padding-bottom: 60px !important;background-color: #f8f9fa !important;}"][vc_row full_width="stretch_row" content_placement="middle" pix_visibility="1"][vc_column width="1/4"][content_box style="1" hover_effect="2" add_hover_effect="" rounded_box="rounded-10" animation="fade-in-up" content_align="text-center" css=".vc_custom_1591144431307{padding-top: 20px !important;padding-right: 20px !important;padding-bottom: 20px !important;padding-left: 20px !important;background-color: #ffffff !important;}"][pix_icon media_type="duo_icon" pix_duo_icon="hummer" icon_color="body-default" icon_bg_color="primary" content_align="inline" style="" hover_effect="" add_hover_effect="5" animation="fade-in-up" css=".vc_custom_1591146793980{padding-right: 5px !important;padding-left: 5px !important;}"][pix_icon media_type="duo_icon" pix_duo_icon="tools" icon_color="body-default" icon_bg_color="primary" content_align="inline" style="" hover_effect="" add_hover_effect="5" animation="fade-in-up" css=".vc_custom_1591146786424{padding-right: 5px !important;padding-left: 5px !important;}"][pix_icon media_type="duo_icon" pix_duo_icon="screwdriver" icon_color="body-default" icon_bg_color="primary" content_align="inline" style="" hover_effect="" add_hover_effect="5" animation="fade-in-up" css=".vc_custom_1591146780364{padding-right: 5px !important;padding-left: 5px !important;}"][/content_box][/vc_column][vc_column width="3/4"][pix_cta cta_style="default" content_size="text-18" animation="fade-in-up" btn_text="Purchase Now" btn_color="secondary" btn_size="lg" btn_effect="6" btn_hover_effect="6" btn_add_hover_effect="" btn_icon_animation="yes" btn_animation="fade-in-up" style="" hover_effect="" add_hover_effect="" title="Build your dream home today" css=".vc_custom_1592322380597{border-radius: 10px !important;}" btn_icon="pixicon-bag-2" btn_link="https://pixfort.website/redirect?to=essentials"]Over 9 million digital products created globally.[/pix_cta][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // business

    $data = array();
    $data['name'] = __( 'Small CTA Business', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/business-cta-small.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1592700239964{padding-top: 30px !important;padding-bottom: 30px !important;background-color: #ffffff !important;}"][vc_column][pix_cta cta_style="small" title_size="h5" btn_text="Purchase Essentials" btn_secondary_font="secondary-font" btn_color="primary-light" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" style="" hover_effect="" add_hover_effect="" title="Create Beautiful Sites in no Time" btn_link="https://pixfort.website/redirect?to=essentials" btn_icon="pixicon-bag-2"]It is a long established fact that a reader will be distracted.[/pix_cta][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'CTA Business', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/business-cta.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1592700571636{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_column content_align="text-center"][pix_icon media_type="duo_icon" pix_duo_icon="pantone" icon_size="36" content_align="inline" style="" hover_effect="" add_hover_effect=""][heading title_color="heading-default" title_size="h4" title="Some services from Essentials" css=".vc_custom_1592306363096{padding-top: 30px !important;padding-bottom: 10px !important;}"][pix_text size="text-18" content_color="body-default" position="text-center" css=".vc_custom_1592260657730{padding-bottom: 20px !important;}" max_width="600px"]It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.[/pix_text][pix_button btn_text="Check all services" btn_color="secondary" btn_size="lg" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" btn_link="https://pixfort.website/redirect?to=essentials" btn_icon="pixicon-bars-menu"][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // corporate

    $data = array();
    $data['name'] = __( 'CTA Corporate', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/corporate-cta.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1592700571636{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_column content_align="text-center"][pix_icon media_type="duo_icon" pix_duo_icon="pantone" icon_size="36" content_align="inline" style="" hover_effect="" add_hover_effect=""][heading title_color="heading-default" title_size="h4" title="Some services from Essentials" css=".vc_custom_1592306363096{padding-top: 30px [vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592707817263{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #f8f9fa !important;}"][vc_row][vc_column offset="vc_col-md-offset-2 vc_col-md-8"][content_box style="3" hover_effect="" add_hover_effect="" animation="" css=".vc_custom_1592230553035{padding: 30px !important;background-color: #ffffff !important;}"][pix_feature media_type="duo_icon" title_size="h4" title_bold="font-weight-bold" content_size="text-18" content_color="body-default" pix_duo_icon="group-chat" icon_color="secondary" has_icon_bg="true" icon_bg_color="secondary-light" icon_size="48" padding_title="" padding_content="10px" icon_position="left" animation="fade-in-up" title="Ask Us a Question" delay="800" css=".vc_custom_1592230889005{padding-top: 20px !important;padding-bottom: 40px !important;}"]This is just a simple text made for Essentials unique and awesome WordPress theme, you can replace it with any text you want.[/pix_feature][pix_button btn_text="Purchase a License" btn_target="true" btn_color="white" btn_text_color="heading-default" btn_size="lg" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" btn_full="true" btn_div="text-center" btn_animation="fade-in-up" btn_link="https://pixfort.website/redirect?to=essentials" btn_icon="pixicon-bag-2" btn_anim_delay="800" css=".vc_custom_1592230868342{background-color: rgba(10,10,10,0.03) !important;*background-color: rgb(10,10,10) !important;}"][/content_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // product

    $data = array();
    $data['name'] = __( 'CTA Product', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/product-cta.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta content';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_scale_in="pix-scale-in-sm" pix_over_visibility="" bottom_divider_select="5" top_divider_select="5" css=".vc_custom_1592760007417{padding-top: 160px !important;padding-bottom: 160px !important;background-color: #212529 !important;}"][vc_row][vc_column content_align="text-center" offset="vc_col-md-offset-1 vc_col-md-10"][pix_numbers numbers_style="numbers-stack" duration="1500" title_color="white" title_size="h1" title_display="display-1" content_position="text-center" text_before="+" number="15000" css=".vc_custom_1592759936655{padding-bottom: 20px !important;}"][/pix_numbers][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" text_color="gradient-primary" css=".vc_custom_1592759852764{padding-bottom: 30px !important;}"]Great companies and small business trust pixfort services[/sliding-text][heading title_color="light-opacity-7" title_size="h6" animation="fade-in-left" secondary_font="secondary-font" title="Trusted by over 2,000 of the world’s leading companies" delay="400" css=".vc_custom_1592759845643{padding-bottom: 50px !important;}"][pix_button btn_text="Create an account" btn_size="lg" btn_effect="1" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" btn_animation="fade-in-left" btn_icon="pixicon-user-3" btn_link="https://pixfort.website/redirect?to=essentials" btn_anim_delay="1000"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);


    // coronavirus

    $data = array();
    $data['name'] = __( 'CTA Coronavirus', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/coronavirus-cta.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" bottom_divider_select="8" bottom_layers="1" b_1_color="#f8f9fa" css=".vc_custom_1592218837873{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row][vc_column content_align="text-center" offset="vc_col-md-offset-2 vc_col-md-8"][content_box style="3" hover_effect="3" add_hover_effect="1" rounded_box="rounded-10" animation="" css=".vc_custom_1591495149844{padding-top: 50px !important;padding-right: 30px !important;padding-bottom: 50px !important;padding-left: 30px !important;background-color: #ffffff !important;}"][pix_icon media_type="duo_icon" pix_duo_icon="book-open" icon_color="secondary" has_icon_bg="true" icon_bg_color="secondary-light" content_align="inline" style="" hover_effect="" add_hover_effect=""][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h4" text_color="heading-default" max_width="400px" css=".vc_custom_1591494654789{padding-top: 20px !important;padding-bottom: 20px !important;}"]Have a question? check these answers.[/sliding-text][pix_button btn_text="Check our application" btn_style="flat" btn_size="md" btn_effect="3" btn_hover_effect="3" btn_add_hover_effect="" btn_icon_animation="yes" btn_animation="fade-in-left" btn_icon="pixicon-world-map-3" btn_link="https://pixfort.website/redirect?to=essentials" btn_anim_delay="1000"][/content_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'CTA advanced Coronavirus', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/coronavirus-cta-advanced.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta content';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592784198382{padding-top: 60px !important;padding-bottom: 60px !important;background-color: #ffffff !important;}"][vc_row][vc_column][content_box style="" hover_effect="" add_hover_effect="" rounded_box="rounded-10" animation="" css=".vc_custom_1591493105451{border-top-width: 2px !important;border-right-width: 2px !important;border-bottom-width: 2px !important;border-left-width: 2px !important;padding-top: 40px !important;padding-right: 30px !important;padding-bottom: 40px !important;padding-left: 30px !important;border-left-style: solid !important;border-right-style: solid !important;border-top-style: solid !important;border-bottom-style: solid !important;}"][vc_row_inner][vc_column_inner width="1/4"][pix_img rounded_img="rounded-lg" align="text-center" style="" hover_effect="" add_hover_effect="1" image="https://essentials.pixfort.com/coronavirus/wp-content/uploads/sites/24/2020/06/4.gif"][/vc_column_inner][vc_column_inner width="3/4"][pix_cta cta_style="default" title_size="h2" content_size="text-18" animation="fade-in-up" btn_text="Purchase Now" btn_style="flat" btn_color="secondary" btn_size="lg" btn_effect="3" btn_hover_effect="3" btn_add_hover_effect="" btn_icon_animation="yes" btn_animation="fade-in-up" style="" hover_effect="" add_hover_effect="" title="Get help today from our team" css=".vc_custom_1591492793812{border-radius: 10px !important;}" btn_icon="pixicon-headphones" btn_link="https://pixfort.website/redirect?to=essentials"]Create awesome and top-notch products using the most advanced WordPress theme ever made.[/pix_cta][/vc_column_inner][/vc_row_inner][/content_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // photography

    $data = array();
    $data['name'] = __( 'Content box Photography', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/photography-content-box.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta content';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" top_divider_select="8" t_2_is_gradient="true" t_2_color="#fc636b" t_3_is_gradient="true" t_3_color_2="#6a67ce" css=".vc_custom_1592141016516{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #f8f9fa !important;}"][vc_row full_width="stretch_row" content_placement="middle"][vc_column content_align="text-center" offset="vc_col-md-offset-1 vc_col-md-10"][content_box style="3" hover_effect="3" add_hover_effect="" rounded_box="rounded-10" animation="" pix_scale_in="pix-scale-in-sm" pix_overlay_color="gray-8" css=".vc_custom_1592140024299{padding-top: 80px !important;padding-right: 40px !important;padding-bottom: 80px !important;padding-left: 40px !important;background: #ffffff url(https://essentials.pixfort.com/photography/wp-content/uploads/sites/27/2020/06/image-cta.jpg?id=3549) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" pix_overlay_opacity="0.3"][pix_text size="text-18" bold="font-weight-bold" content_color="dark-opacity-7" animation="fade-in-up" remove_pb_padding="m-0" delay="200" max_width="600px"]+15.000 Happy customers trusted pixfort[/pix_text][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="white" css=".vc_custom_1592141966276{padding-top: 10px !important;}"]Get Essentials and start building next-generation websites[/sliding-text][pix_text size="text-20" content_color="light-opacity-7" position="text-center" animation="fade-in-up" delay="900" css=".vc_custom_1592140063280{padding-bottom: 10px !important;}" max_width="600px"]This is just a simple text made for this unique and awesome template, you can replace it with any text.[/pix_text][circles circles="%5B%7B%22title%22%3A%22Secure%20Platform%22%2C%22img%22%3A%22https://essentials.pixfort.com/photography/wp-content/uploads/sites/27/2020/05/p-1.jpg%22%2C%22link%22%3A%22%23%22%2C%22color%22%3A%22pix-bg-custom%22%7D%2C%7B%22title%22%3A%22Worldwide%22%2C%22img%22%3A%22https://essentials.pixfort.com/photography/wp-content/uploads/sites/27/2020/06/image-box-1.jpg%22%2C%22link%22%3A%22%23%22%2C%22color%22%3A%22pix-bg-custom%22%7D%2C%7B%22title%22%3A%22Online%20Shop%22%2C%22img%22%3A%22https://essentials.pixfort.com/photography/wp-content/uploads/sites/27/2020/05/p-5.jpg%22%2C%22link%22%3A%22%23%22%2C%22color%22%3A%22pix-bg-custom%22%7D%5D" effect="" circles_align="justify-content-center" btn_text="Check all categories" btn_style="flat" btn_color="gradient-primary" btn_text_color="white" btn_size="md" btn_effect="2" btn_hover_effect="2" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="yes" btn_link="#" btn_icon="pixicon-angle-right"][/content_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'CTA Photography', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/photography-cta.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" top_divider_select="8" t_2_is_gradient="true" t_2_color="rgba(252,99,107,0.1)" t_3_is_gradient="true" t_3_color_2="rgba(106,103,206,0.1)" css=".vc_custom_1592856925722{padding-top: 160px !important;padding-bottom: 160px !important;background-color: #f8f9fa !important;}"][vc_row][vc_column content_align="text-center"][pix_text size="text-18" bold="font-weight-bold" content_color="heading-default" position="text-center" animation="fade-in-up" remove_pb_padding="m-0" delay="200" max_width="600px"]Combine seamlessly fitting layouts[/pix_text][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" display="display-1" text_color="gradient-primary" css=".vc_custom_1592856980384{padding-top: 10px !important;}"]Strong Call to Action[/sliding-text][pix_text size="text-18" content_color="body-default" position="text-center" animation="fade-in-up" delay="600" css=".vc_custom_1591639047107{padding-top: 10px !important; padding-bottom: 20px !important;}" max_width="600px"]Combine seamlessly fitting layouts, customize everything you want, switch components on the go using our bootstrap.[/pix_text][pix_button btn_text="Purchase Essentials" btn_target="true" btn_style="flat" btn_color="gradient-primary" btn_text_color="white" btn_size="lg" btn_effect="3" btn_hover_effect="3" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="yes" btn_div="text-center" btn_animation="fade-in-up" btn_link="https://pixfort.website/redirect?to=essentials" btn_icon="pixicon-angle-right" btn_anim_delay="800"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // agency

    $data = array();
    $data['name'] = __( 'CTA left Agency', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/agency-cta-left.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1591760604137{padding-top: 100px !important;padding-bottom: 100px !important;background-color: #f8f9fa !important;}"][vc_row full_width="stretch_row" content_placement="middle"][vc_column width="2/3"][pix_feature title_size="h2" title_bold="font-weight-bold" content_size="text-20" content_color="body-default" padding_title="30px" animation="fade-in-up" title="Application of the day." delay="400" css=".vc_custom_1591757422745{margin-bottom: 30px !important;}"]Combine seamlessly fitting layouts, customize everything you want, switch components on the go using Essentials powerful WordPress theme by pixfort.[/pix_feature][pix_button btn_text="Purchase Essentials" btn_target="true" btn_color="secondary" btn_size="md" btn_effect="2" btn_hover_effect="2" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="yes" btn_animation="fade-in-up" btn_link="https://pixfort.website/redirect?to=essentials" btn_icon="pixicon-angle-right" btn_anim_delay="800"][/vc_column][vc_column width="1/3" content_align="text-center"][pix_img align="text-center" animation="fade-in-left" pix_infinite_animation="pix-bounce-sm" pix_infinite_speed="pix-duration-slow" style="" hover_effect="" add_hover_effect="" image="https://essentials.pixfort.com/agency/wp-content/uploads/sites/29/2020/06/watch-image.png" width="90%"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'CTA right Agency', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/agency-cta-right.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1591760604137{padding-top: 100px !important;padding-bottom: 100px !important;background-color: #f8f9fa !important;}"][vc_row full_width="stretch_row" content_placement="middle"][vc_column width="1/3" content_align="text-center"][pix_img align="text-center" animation="fade-in-left" pix_infinite_animation="pix-bounce-sm" pix_infinite_speed="pix-duration-slow" style="" hover_effect="" add_hover_effect="" image="https://essentials.pixfort.com/agency/wp-content/uploads/sites/29/2020/06/watch-image.png" width="90%"][/vc_column][vc_column width="2/3"][pix_feature title_size="h2" title_bold="font-weight-bold" content_size="text-20" content_color="body-default" padding_title="30px" animation="fade-in-up" title="Application of the day." delay="400" css=".vc_custom_1591757422745{margin-bottom: 30px !important;}"]Combine seamlessly fitting layouts, customize everything you want, switch components on the go using Essentials powerful WordPress theme by pixfort.[/pix_feature][pix_button btn_text="Purchase Essentials" btn_target="true" btn_color="secondary" btn_size="md" btn_effect="2" btn_hover_effect="2" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="yes" btn_animation="fade-in-up" btn_link="https://pixfort.website/redirect?to=essentials" btn_icon="pixicon-angle-right" btn_anim_delay="800"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // slides

    $data = array();
    $data['name'] = __( 'CTA Slides', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/slides-cta.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" full_height="yes" fade_in_opacity="pix-opacity-1" pix_over_visibility="" fade_in_intro="https://essentials.pixfort.com/slides/wp-content/uploads/sites/10/2020/05/slides-bg-2.jpg" css=".vc_custom_1590538113648{padding-top: 140px !important;padding-bottom: 140px !important;background-color: #f8d05a !important;}" section_name="Call to action"][vc_row css=".vc_custom_1589486885639{padding-top: 140px !important;padding-bottom: 80px !important;}"][vc_column offset="vc_col-md-offset-1 vc_col-md-10"][content_box style="" hover_effect="" add_hover_effect="" rounded_box="rounded-10" animation="" css=".vc_custom_1589493282658{padding: 80px !important;background-color: #f8d05a !important;}"][pix_badge bold="font-weight-bold" secondary_font="secondary-font" text_color="white" bg_color="dark-opacity-3" style="" hover_effect="" add_hover_effect="" animation="fade-in-up" element_div="text-center" padding="" text="Made with Love in France" css=".vc_custom_1589490173866{padding-top: 9px !important;padding-right: 15px !important;padding-bottom: 9px !important;padding-left: 15px !important;}"][heading title_color="white" title_size="h2" display="display-3" animation="fade-in-up" title="Start Creating Beautiful Sites Today" css=".vc_custom_1589493337419{padding-top: 20px !important;}"][pix_text size="text-20" content_color="light-opacity-7" position="text-center" animation="fade-in-up" delay="200" css=".vc_custom_1589490179379{padding-top: 10px !important;padding-bottom: 20px !important;}"]We design and develop world-class websites and applications.[/pix_text][circles circles="%5B%7B%22title%22%3A%22Speed%22%2C%22img%22%3A%22https://essentials.pixfort.com/slides/wp-content/uploads/sites/10/2020/05/story-3-1.jpg%22%2C%22color%22%3A%22pix-bg-custom%22%7D%2C%7B%22title%22%3A%22Chat%22%2C%22img%22%3A%22https://essentials.pixfort.com/slides/wp-content/uploads/sites/10/2020/05/story-2-1.jpg%22%2C%22color%22%3A%22pix-bg-custom%22%7D%2C%7B%22title%22%3A%22Apps%22%2C%22img%22%3A%22https://essentials.pixfort.com/slides/wp-content/uploads/sites/10/2020/05/story-1-1.jpg%22%2C%22color%22%3A%22pix-bg-custom%22%7D%5D" effect="2" hover_effect="2" circles_align="justify-content-center" btn_text="Get Essentials Today" btn_secondary_font="secondary-font" btn_style="blink" btn_color="white" btn_size="lg" btn_rounded="btn-rounded" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" btn_icon="pixicon-bag-2" c_css=".vc_custom_1590535992043{padding-bottom: 30px !important;}" css=".vc_custom_1590535992045{padding-top: 15px !important;padding-bottom: 15px !important;background-color: rgba(0,0,0,0.15) !important;*background-color: rgb(0,0,0) !important;}" btn_link="https://pixfort.website/redirect?to=essentials"][/content_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // kb

    $data = array();
    $data['name'] = __( 'CTA Knowledge base', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/kb-cta.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row" pix_bg_grdient="bg-gradient-primary" fade_in_parallax="no" pix_visibility="1" css=".vc_custom_1593019672752{padding-top: 40px !important;padding-bottom: 40px !important;background-image: url(https://essentials.pixfort.com/knowledge-base-demo/wp-content/uploads/sites/7/2020/06/cta-bg-green.png?id=3132) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" fade_in_intro="https://essentials.pixfort.com/knowledge-base-demo/wp-content/uploads/sites/7/2020/06/cta-bg-green.png"][vc_column][pix_cta cta_style="small" title_color="white" content_color="dark-opacity-7" content_size="text-18" animation="fade-in-up" btn_text="Purchase Now" btn_color="white" btn_text_color="primary" btn_size="lg" btn_effect="6" btn_hover_effect="6" btn_add_hover_effect="" btn_icon_animation="yes" btn_animation="fade-in-up" style="" hover_effect="" add_hover_effect="" title="Essentials is Now Available" css=".vc_custom_1593019624636{border-radius: 10px !important;}" btn_icon="pixicon-bag-2" btn_link="https://pixfort.website/redirect?to=essentials"]Over 9 million digital products created by a global community.[/pix_cta][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // original

    $data = array();
    $data['name'] = __( 'CTA Shop Main Original', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/original-main-shop-cta.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta content shop';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row" content_placement="middle" pix_visibility="1" css=".vc_custom_1593041894738{padding-top: 60px !important;padding-bottom: 60px !important;}"][vc_column width="7/12" css=".vc_custom_1577523513721{padding-top: 40px !important;padding-bottom: 20px !important;}"][pix_badge bold="font-weight-bold" secondary_font="secondary-font" text_color="heading-default" bg_color="gray-2" style="" hover_effect="" add_hover_effect="" animation="fade-in-up" text="Made by pixfort team" css=".vc_custom_1577524348521{margin-bottom: 10px !important;padding-top: 5px !important;padding-right: 9px !important;padding-bottom: 5px !important;padding-left: 9px !important;}"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h2" text_color="gradient-primary" css=".vc_custom_1577597066380{margin-top: 15px !important;}"]Build you own online store with Essentials theme.[/sliding-text][pix_text size="text-20" content_color="body-default" animation="fade-in-up" max_width="640px" delay="200"]It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.[/pix_text][pix_button btn_text="Check our new collection" btn_secondary_font="secondary-font" btn_style="underline" btn_color="gray-4" btn_text_color="heading-default" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="pix-hover-right" btn_animation="fade-in-up" btn_link="#" btn_icon="pixicon-angle-right" btn_anim_delay="400" css=".vc_custom_1577512002985{margin-right: 0px !important;margin-left: 0px !important;padding-right: 0px !important;padding-left: 0px !important;}"][/vc_column][vc_column width="5/12"][pix_img align="text-center" pix_tilt="tilt" pix_tilt_size="tilt_big" animation="fade-in" pix_infinite_animation="pix-bounce-sm" pix_infinite_speed="pix-duration-md" style="" hover_effect="" add_hover_effect="" image="https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2020/04/sport-shoes.jpg" width="80%"][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'CTA footer Original', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/original-footer-cta.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row" pix_over_visibility="2" css=".vc_custom_1593047806329{padding-top: 0px !important;padding-bottom: 0px !important;background-color: #ffffff !important;}"][vc_column pix_particles_check="1" pix_particles="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2019/12/cta-loop-points.png%22%2C%22h_position%22%3A%22right%22%2C%22horizontal%22%3A%22-15.10%25%22%2C%22v_position%22%3A%22top%22%2C%22vertical%22%3A%22-140%25%22%2C%22depth%22%3A%220.2%22%2C%22xaxis%22%3A%22100%22%2C%22yaxis%22%3A%220%22%2C%22rotation_speed%22%3A%22300%22%2C%22pix_inverse_rotation%22%3A%22scroll_inverse%22%2C%22img_width%22%3A%2253%25%22%2C%22pix_infinite_animation%22%3A%22pix-rotating-inverse%22%2C%22pix_infinite_speed%22%3A%22pix-duration-md%22%2C%22hide%22%3A%22true%22%7D%5D" css=".vc_custom_1593031488798{padding-top: 10px !important;padding-bottom: 10px !important;}"][pix_cta secondary_font="secondary-font" cta_style="default" btn_text="Get Essentials" btn_target="true" btn_secondary_font="secondary-font" btn_color="red" btn_size="lg" btn_effect="3" btn_hover_effect="3" btn_add_hover_effect="1" style="" hover_effect="" add_hover_effect="" title="Create Beautiful Sites in no Time!" btn_link="https://pixfort.website/redirect?to=essentials" btn_icon="pixicon-bag-2" css=".vc_custom_1593031561163{padding-right: 0px !important;padding-left: 0px !important;}"]Start building next-level websites for your clients using Essentials WordPress theme.[/pix_cta][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'CTA box right Features page', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/original-features-page-cta-right.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta content';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" top_divider_select="20" top_layers="1" t_1_color="#f8f9fa" pix_visibility="1" css=".vc_custom_1593050780184{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row full_width="stretch_row"][vc_column css=".vc_custom_1588804849684{padding-top: 20px !important;padding-bottom: 20px !important;}" offset="vc_col-md-offset-2 vc_col-md-8"][pix_highlight_box style="3" hover_effect="" add_hover_effect="" animation="fade-in-up" image="https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2020/03/slider-image-14.jpg" css=".vc_custom_1588804271093{background-color: #ffffff !important;border-radius: 10px !important;}"][pix_badge bold="font-weight-bold" secondary_font="secondary-font" text_color="heading-default" bg_color="gray-1" style="" hover_effect="3" add_hover_effect="" animation="fade-in-up" padding="" text="Unlimited Possibilities" css=".vc_custom_1588799314822{margin-top: 10px !important;margin-bottom: 10px !important;padding-top: 10px !important;padding-right: 15px !important;padding-bottom: 10px !important;padding-left: 15px !important;}"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h5" text_color="heading-default" css=".vc_custom_1588805003761{padding-top: 10px !important;}"]Join more than 18.000 satisfied clients[/sliding-text][pix_text content_color="body-default" animation="fade-in-up" delay="200" css=".vc_custom_1588805022856{padding-bottom: 10px !important;}"]Lorem ipsum dolor sit amet, consectetur adipiscing elit.[/pix_text][pix_button btn_text="Create your website" btn_secondary_font="secondary-font" btn_style="flat" btn_color="gradient-primary" btn_text_color="white" btn_size="md" btn_effect="6" btn_hover_effect="4" btn_add_hover_effect="7" btn_animation="fade-in-up" btn_icon="pixicon-world-map-3" btn_link="#" btn_anim_delay="400"][clients in_row="6" clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2019/12/carrefour.png%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2019/12/pixfort-1.png%22%7D%5D" add_hover_effect="" style="client" animation="fade-in-Img" delay_items="yes" css=".vc_custom_1593050772119{padding-top: 20px !important;}" delay="200"][/pix_highlight_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'CTA box left Features page', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/original-features-page-cta-left.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta content';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" top_divider_select="20" top_layers="1" t_1_color="#f8f9fa" pix_visibility="1" css=".vc_custom_1593050780184{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row full_width="stretch_row"][vc_column css=".vc_custom_1588804849684{padding-top: 20px !important;padding-bottom: 20px !important;}" offset="vc_col-md-offset-2 vc_col-md-8"][pix_highlight_box layout="wide_card_left" style="3" hover_effect="" add_hover_effect="" animation="fade-in-up" image="https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2020/03/story-3.jpg" css=".vc_custom_1593050844449{background-color: #ffffff !important;border-radius: 10px !important;}"][pix_badge bold="font-weight-bold" secondary_font="secondary-font" text_color="heading-default" bg_color="gray-1" style="" hover_effect="3" add_hover_effect="" animation="fade-in-up" padding="" text="Unlimited Possibilities" css=".vc_custom_1588799314822{margin-top: 10px !important;margin-bottom: 10px !important;padding-top: 10px !important;padding-right: 15px !important;padding-bottom: 10px !important;padding-left: 15px !important;}"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h5" text_color="heading-default" css=".vc_custom_1588805003761{padding-top: 10px !important;}"]Join more than 18.000 satisfied clients[/sliding-text][pix_text content_color="body-default" animation="fade-in-up" delay="200" css=".vc_custom_1588805022856{padding-bottom: 10px !important;}"]Lorem ipsum dolor sit amet, consectetur adipiscing elit.[/pix_text][pix_button btn_text="Create your website" btn_secondary_font="secondary-font" btn_style="flat" btn_color="gradient-primary" btn_text_color="white" btn_size="md" btn_effect="6" btn_hover_effect="4" btn_add_hover_effect="7" btn_animation="fade-in-up" btn_icon="pixicon-world-map-3" btn_link="#" btn_anim_delay="400"][clients in_row="6" clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2019/12/carrefour.png%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2019/12/pixfort-1.png%22%7D%5D" add_hover_effect="" style="client" animation="fade-in-Img" delay_items="yes" css=".vc_custom_1593050772119{padding-top: 20px !important;}" delay="200"][/pix_highlight_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'CTA box Portfolio item VIDEO', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/original-video-portfolio-cta.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta content';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1593128912739{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_column content_align="text-center" offset="vc_col-md-offset-1 vc_col-md-10"][content_box style="" hover_effect="" add_hover_effect="" animation="" css=".vc_custom_1588508899478{border-top-width: 2px !important;border-right-width: 2px !important;border-bottom-width: 2px !important;border-left-width: 2px !important;padding-top: 50px !important;padding-right: 30px !important;padding-bottom: 50px !important;padding-left: 30px !important;border-left-color: #e9ecef !important;border-left-style: solid !important;border-right-color: #e9ecef !important;border-right-style: solid !important;border-top-color: #e9ecef !important;border-top-style: solid !important;border-bottom-color: #e9ecef !important;border-bottom-style: solid !important;border-radius: 10px !important;}"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="heading-default" max_width="500px" css=".vc_custom_1588508869640{padding-top: 20px !important;}"]What are you waiting for?[/sliding-text][pix_text size="text-20" content_color="body-default" animation="fade-in-up" delay="400" max_width="500px"]Creating stunning and professional websites has never been easier, today with Essentials you will be able to build awesome websites in no time![/pix_text][pix_button btn_text="Purchase Essentials" btn_secondary_font="secondary-font" btn_color="gradient-primary" btn_text_color="white" btn_size="md" btn_effect="6" btn_hover_effect="4" btn_add_hover_effect="7" btn_icon_position="after" btn_link="#" btn_icon="pixicon-angle-right"][/content_box][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // elements

    $data = array();
    $data['name'] = __( 'CTA box with particles 1 ELEMENTS', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/elements-cta-box-particles-1.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta content';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1593136790755{margin-top: 60px !important;margin-bottom: 60px !important;padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_column][content_box style="3" hover_effect="3" add_hover_effect="" animation="" pix_particles_check="1" pix_particles="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2020/02/particle-semi-circle.png%22%2C%22h_position%22%3A%22left%22%2C%22horizontal%22%3A%22-7%25%22%2C%22v_position%22%3A%22top%22%2C%22vertical%22%3A%22-30%25%22%2C%22depth%22%3A%220.1%22%2C%22xaxis%22%3A%22100%22%2C%22yaxis%22%3A%220%22%2C%22rotation_speed%22%3A%22300%22%2C%22img_width%22%3A%2215%25%22%2C%22pix_infinite_animation%22%3A%22pix-rotating%22%2C%22pix_infinite_speed%22%3A%22pix-duration-fast%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2019/12/loop-3.png%22%2C%22h_position%22%3A%22right%22%2C%22horizontal%22%3A%22-30%25%22%2C%22v_position%22%3A%22top%22%2C%22vertical%22%3A%22-50%25%22%2C%22depth%22%3A%220.1%22%2C%22xaxis%22%3A%22100%22%2C%22yaxis%22%3A%220%22%2C%22rotation_speed%22%3A%22300%22%2C%22img_width%22%3A%2270%25%22%2C%22pix_infinite_animation%22%3A%22pix-rotating-inverse%22%2C%22pix_infinite_speed%22%3A%22pix-duration-md%22%7D%5D" overflow="overflow-hidden" content_align="text-center" css=".vc_custom_1582517163253{margin-top: 20px !important;margin-bottom: 20px !important;padding-top: 40px !important;padding-right: 40px !important;padding-bottom: 40px !important;padding-left: 40px !important;background-color: #f8f9fa !important;border-radius: 5px !important;}"][pix_cta cta_style="default" title_color="purple" title_size="h1" content_size="text-24" animation="fade-in" btn_text="Shop now" btn_secondary_font="secondary-font" btn_style="blink" btn_color="purple" btn_size="xl" btn_rounded="btn-rounded" btn_effect="3" btn_hover_effect="3" btn_add_hover_effect="" btn_icon_animation="pix-hover-right" btn_animation="fade-in-up" style="" hover_effect="" add_hover_effect="" title="Create stunning call to action for marketing!" btn_link="#" btn_icon="pixicon-bag-2" css=".vc_custom_1582516883461{border-radius: 5px !important;}"]Start building next-level websites using Essentials.[/pix_cta][/content_box][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'CTA box small 1 ELEMENTS', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/elements-cta-box-small-1.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1593136865058{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_column][pix_cta cta_style="small" title_size="h6" animation="fade-in" btn_text="Shop now" btn_secondary_font="secondary-font" btn_style="underline" btn_color="yellow" btn_text_color="heading-default" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="pix-hover-left" btn_animation="fade-in-up" style="" hover_effect="" add_hover_effect="" title="Building the future of websites!" btn_link="#" btn_icon="pixicon-bag-2" css=".vc_custom_1582516617423{margin-top: 20px !important;margin-bottom: 20px !important;border-left-width: 3px !important;padding-top: 30px !important;padding-right: 30px !important;padding-bottom: 30px !important;padding-left: 30px !important;background-color: #f8f9fa !important;border-left-color: #ffc168 !important;border-left-style: solid !important;}"]Start building next-level websites using Essentials.[/pix_cta][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'CTA box small 2 ELEMENTS', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/elements-cta-box-small-2.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1593136865058{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_column][pix_cta cta_style="small" title_size="h6" content_color="dark-opacity-5" animation="fade-in" btn_text="Shop now" btn_secondary_font="secondary-font" btn_style="line" btn_color="brown" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_animation="fade-in-up" style="" hover_effect="" add_hover_effect="" title="Say hello to small CTA" btn_link="#" btn_icon="pixicon-bag-2" css=".vc_custom_1582517489125{margin-top: 20px !important;margin-bottom: 20px !important;padding-top: 30px !important;padding-right: 30px !important;padding-bottom: 30px !important;padding-left: 30px !important;background-image: url(https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2019/12/menu-full-banner.jpg?id=650) !important;border-radius: 5px !important;}"]Start building next-level websites using Essentials.[/pix_cta][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'CTA box small 3 ELEMENTS', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/elements-cta-box-small-3.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1593136865058{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_column][pix_cta cta_style="small" title_color="white" title_size="h6" content_color="light-opacity-5" animation="fade-in" btn_text="Shop now" btn_secondary_font="secondary-font" btn_color="orange" btn_size="md" btn_effect="" btn_hover_effect="2" btn_add_hover_effect="" btn_icon_animation="pix-hover-left" btn_animation="fade-in-up" style="" hover_effect="" add_hover_effect="" title="Say hello to small CTA" btn_link="#" btn_icon="pixicon-bag-2" css=".vc_custom_1582516644092{margin-top: 20px !important;margin-bottom: 20px !important;padding-top: 30px !important;padding-right: 30px !important;padding-bottom: 30px !important;padding-left: 30px !important;background-color: #1274e7 !important;border-radius: 5px !important;}"]Start building next-level websites using Essentials.[/pix_cta][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // fast

    $data = array();
    $data['name'] = __( 'CTA Fast', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/fast-cta.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" pix_overlay_color="primary" pix_overlay_opacity="1" css=".vc_custom_1600559643655{padding-top: 60px !important;padding-bottom: 60px !important;}"][vc_row full_width="stretch_row" content_placement="middle" pix_particles_check="" pix_visibility="1" css=".vc_custom_1600559430630{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_column width="1/4" content_align="text-center"][pix_video_popup aspect="embed-responsive-16by9" animation="fade-in-up" text_color="heading-default" embed_code="JTNDaWZyYW1lJTIwd2lkdGglM0QlMjI1NjAlMjIlMjBoZWlnaHQlM0QlMjIzMTUlMjIlMjBzcmMlM0QlMjJodHRwcyUzQSUyRiUyRnd3dy55b3V0dWJlLmNvbSUyRmVtYmVkJTJGS21HYVYxMkExeDglMjIlMjBmcmFtZWJvcmRlciUzRCUyMjAlMjIlMjBhbGxvdyUzRCUyMmFjY2VsZXJvbWV0ZXIlM0IlMjBhdXRvcGxheSUzQiUyMGNsaXBib2FyZC13cml0ZSUzQiUyMGVuY3J5cHRlZC1tZWRpYSUzQiUyMGd5cm9zY29wZSUzQiUyMHBpY3R1cmUtaW4tcGljdHVyZSUyMiUyMGFsbG93ZnVsbHNjcmVlbiUzRSUzQyUyRmlmcmFtZSUzRQ=="][/vc_column][vc_column width="3/4"][pix_cta content_bold="font-weight-bold" cta_style="default" title_color="white" title_size="h3" content_color="light-opacity-7" content_size="text-18" animation="fade-in-up" btn_text="Purchase Now" btn_style="flat" btn_color="secondary" btn_size="lg" btn_effect="3" btn_hover_effect="3" btn_add_hover_effect="" btn_icon_animation="yes" btn_animation="fade-in-up" style="" hover_effect="" add_hover_effect="" title="Essentials is Now Available" css=".vc_custom_1600640802244{border-radius: 10px !important;}" btn_icon="pixicon-bag-2" btn_link="#"]Over 9 million digital products by a global community.[/pix_cta][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // modern

    $data = array();
    $data['name'] = __( 'CTA Modern', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/modern-cta.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_bg_grdient="bg-gradient-primary" fade_in_opacity="pix-opacity-1" pix_over_visibility="" responsive_css="{``pix_res_sm_pt``:``20``,``pix_res_sm_pb``:``20``,``pix_res_md_pt``:``40``,``pix_res_md_pb``:``40``}" css=".vc_custom_1613866973197{padding-top: 0px !important;background-color: #ffffff !important;}" el_id="pix_section_overview" section_name="Overview" fade_in_intro="https://essentials.pixfort.com/modern/wp-content/uploads/sites/45/2021/02/modern-intro-bg-4.jpg"][vc_row full_width="stretch_row" content_placement="middle" pix_particles_check="" pix_visibility="1" css=".vc_custom_1600559430630{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_column content_align="text-center"][pix_cta content_bold="font-weight-bold" cta_style="default" title_color="white" title_size="h2" content_color="light-opacity-7" content_size="text-20" animation="fade-in-up" btn_text="Purchase Now" btn_color="gray-8" btn_size="lg" btn_rounded="btn-rounded" btn_effect="3" btn_hover_effect="3" btn_add_hover_effect="" btn_icon_animation="yes" btn_animation="fade-in-up" style="" hover_effect="" add_hover_effect="" title="Essentials New WordPress Theme is Now Available." css=".vc_custom_1613437862492{border-radius: 10px !important;}" btn_icon="pixicon-bag-2" btn_link="#"]Over 9 million digital products by a global community.[/pix_cta][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // gallery

    $data = array();
    $data['name'] = __( 'CTA Gallery', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/gallery-cta.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1617667997837{padding-top: 60px !important;padding-bottom: 60px !important;background-color: #ffffff !important;}"][vc_row full_width="stretch_row" content_placement="middle" pix_particles_check=""][vc_column width="1/6" content_align="text-center"][pix_img rounded_img="rounded-lg" align="text-center" img_div="text-center" style="" hover_effect="" add_hover_effect="1" image="https://essentials.pixfort.com/gallery/wp-content/uploads/sites/46/2021/02/inner-cta-image.png"][/vc_column][vc_column width="5/6"][pix_cta cta_style="default" title_size="h3" content_size="text-20" btn_text="Go to gallery" btn_style="flat" btn_color="gradient-primary" btn_text_color="white" btn_size="lg" btn_rounded="btn-rounded" btn_effect="3" btn_hover_effect="3" btn_add_hover_effect="" btn_icon_animation="yes" style="" hover_effect="" add_hover_effect="" title="Visit our new gallery" css=".vc_custom_1614046929284{border-radius: 10px !important;}" btn_link="https://essentials.pixfort.com/gallery/gallery/" btn_icon="pixicon-slides-1"]Create awesome and top-notch products using the most advanced WordPress theme we have ever made.[/pix_cta][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // company

    $data = array();
    $data['name'] = __( 'CTA Company', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/company-home-cta.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1616974978100{padding-top: 60px !important;padding-bottom: 60px !important;background-color: #ffffff !important;}"][vc_row full_width="stretch_row" content_placement="middle" pix_particles_check="" css=".vc_custom_1607665707341{background-color: #ffffff !important;}"][vc_column width="1/2" responsive_css="{``pix_res_sm_pt``:``20``,``pix_res_sm_pr``:``20``,``pix_res_sm_pb``:``20``,``pix_res_sm_pl``:``20``,``pix_res_sm_mr``:``0``,``pix_res_sm_ml``:``0``,``pix_res_md_pt``:``20``,``pix_res_md_pr``:``20``,``pix_res_md_pb``:``20``,``pix_res_md_pl``:``20``,``pix_res_md_mr``:``0``,``pix_res_md_ml``:``0``}" css=".vc_custom_1610073539463{margin-left: 20px !important;border-top-width: 2px !important;border-right-width: 2px !important;border-bottom-width: 2px !important;border-left-width: 2px !important;padding-top: 10% !important;padding-right: 20% !important;padding-bottom: 10% !important;padding-left: 10% !important;border-left-color: rgba(0,0,0,0.1) !important;border-left-style: dashed !important;border-right-color: rgba(0,0,0,0.1) !important;border-right-style: dashed !important;border-top-color: rgba(0,0,0,0.1) !important;border-top-style: dashed !important;border-bottom-color: rgba(0,0,0,0.1) !important;border-bottom-style: dashed !important;border-radius: 10px !important;}"][pix_feature media_type="icon" title_size="h3" title_bold="font-weight-bold" content_size="text-20" content_color="body-default" icon_size="60" padding_content="15px" animation="fade-in-up" title="Say hello to the most advanced WordPress theme ever!" css=".vc_custom_1614127707906{padding-bottom: 30px !important;}" element_id="1609296259000-69b018b3-e64b" icon="pixicon-map-compass"]It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.[/pix_feature][pix_button btn_text="Get Essentials" btn_color="secondary" btn_size="lg" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" btn_link="https://1.envato.market/Essentials" btn_icon="pixicon-bag-2"][/vc_column][vc_column width="1/2" responsive_css="{``pix_res_sm_mr``:``0``,``pix_res_sm_ml``:``0``,``pix_res_md_mr``:``0``,``pix_res_md_ml``:``0``}" css=".vc_custom_1610079269902{margin-top: 40px !important;margin-left: -15% !important;}"][pix_img rounded_img="rounded-xl" align="text-center" style="6" hover_effect="6" add_hover_effect="7" image="https://essentials.pixfort.com/company/wp-content/uploads/sites/47/2021/02/cta-image.jpg" css=".vc_custom_1614127223620{margin-bottom: 30px !important;}"][pix_text bold="font-weight-bold" content_color="body-default" position="text-center"]Have a question or want more information?[/pix_text][pix_button btn_text="Start working on projects" btn_style="link" btn_color="secondary" btn_remove_padding="no-padding" btn_size="lg" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="yes" btn_div="text-center" btn_link="#" btn_icon="pixicon-angle-circle-right"][pix_img style="" hover_effect="" add_hover_effect=""][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'CTA FAQ page Company', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/cta/company-faq-page-cta.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all cta';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" responsive_css="{``pix_res_sm_pt``:``20``,``pix_res_sm_pb``:``20``,``pix_res_sm_mr``:``10``,``pix_res_sm_ml``:``10``,``pix_res_md_pt``:``20``,``pix_res_md_pb``:``20``}" css=".vc_custom_1613530962023{padding-top: 60px !important;padding-bottom: 60px !important;background-color: #ffffff !important;}"][vc_row content_placement="middle" pix_particles_check=""][vc_column css=".vc_custom_1613529976168{border-top-width: 2px !important;border-right-width: 2px !important;border-bottom-width: 2px !important;border-left-width: 2px !important;padding-top: 80px !important;padding-right: 20px !important;padding-bottom: 80px !important;padding-left: 20px !important;border-left-color: #e9ecef !important;border-left-style: solid !important;border-right-color: #e9ecef !important;border-right-style: solid !important;border-top-color: #e9ecef !important;border-top-style: solid !important;border-bottom-color: #e9ecef !important;border-bottom-style: solid !important;border-radius: 10px !important;}" offset="vc_col-md-offset-2 vc_col-md-8"][pix_feature media_type="icon" title_size="h4" title_bold="font-weight-bold" content_size="text-18" content_color="body-default" icon_color="gradient-primary" icon_size="64" padding_title="30px" padding_content="10px" content_align="center" title="Ask Us a Question" css=".vc_custom_1613530707396{padding-bottom: 30px !important;}" icon="pixicon-user-male-phone" element_id="1613529370954-3e9065e4-7351"]This is just a simple text made that you can replace it.[/pix_feature][pix_button btn_text="Get in touch today" btn_color="secondary" btn_size="lg" btn_effect="1" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" btn_div="text-center" btn_icon="pixicon-messages-2" btn_link="#"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    return $templates;
}




 ?>
