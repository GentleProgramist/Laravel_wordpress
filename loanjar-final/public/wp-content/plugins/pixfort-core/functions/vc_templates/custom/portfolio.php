<?php




function pix_templates_portfolio(){
    $templates = array();

    // services

    $data = array(); // Create new array
    $data['name'] = __( 'Portfolio carousel Services', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/portfolio/services-portfolio-carousel.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template all portfolio'; // CSS class name
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" css=".vc_custom_1590800688839{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row full_width="stretch_row" equal_height="yes" content_placement="middle"][vc_column width="1/3"][pix_img animation="fade-in-left" style="" hover_effect="" add_hover_effect="1" image="https://essentials.pixfort.com/services/wp-content/uploads/sites/8/2020/05/portfolio-image.png" width="50%" css=".vc_custom_1590636806330{margin-bottom: 20px !important;}"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h3" text_color="heading-default"]Check our Services.[/sliding-text][pix_text size="text-18" content_color="body-default" animation="fade-in-up" delay="1200" css=".vc_custom_1590635877723{padding-bottom: 10px !important;}" max_width="600px"]Start your own business using our free and premium high quality templates.[/pix_text][pix_button btn_text="Check all services" btn_target="true" btn_color="gray-1" btn_text_color="body-default" btn_size="normal" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="yes" btn_animation="fade-in-up" btn_link="https://pixfort.website/redirect?to=essentials" btn_icon="pixicon-angle-right" btn_anim_delay="800"][/vc_column][vc_column width="2/3"][pix_portfolio_slider count="4" portfolio_style="transparent" rounded_img="rounded-10" slider_num="2" slider_style="pix-style-standard" slider_effect="pix-circular-slider" prevnextbuttons="" pagedots="1" freescroll="" cellalign="left" slider_scale="" autoplay="" adaptiveheight="true" righttoleft="true" slider_wrap="true" visible_y="pix-overflow-y-visible" visible_overflow=""][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // construction

    $data = array(); // Create new array
    $data['name'] = __( 'Portfolio Construction', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/portfolio/construction-portfolio.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template all portfolio'; // CSS class name
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592312190141{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #f8f9fa !important;}"][vc_row full_width="stretch_row" equal_height="yes"][vc_column width="1/3" css=".vc_custom_1592323055270{padding-top: 20px !important;padding-bottom: 20px !important;}"][content_box style="" hover_effect="" add_hover_effect="" animation="" sticky_top="sticky-top"][pix_badge bold="font-weight-bold" secondary_font="" text_color="white" bg_color="primary" style="" hover_effect="" add_hover_effect="" animation="fade-in-up" element_div="text-left" padding="" text="Unlimited Possibilities" css=".vc_custom_1592344693532{padding-top: 7px !important;padding-right: 12px !important;padding-bottom: 7px !important;padding-left: 12px !important;}"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h3" text_color="heading-default" css=".vc_custom_1592344709957{padding-top: 20px !important;}"]Showcase your works using Essentials portfolio[/sliding-text][pix_text size="text-20" content_color="body-default" animation="fade-in-up" delay="900" css=".vc_custom_1590548147650{padding-bottom: 10px !important;}"]This is just a simple text made for this unique and awesome template, you can replace it with any text.[/pix_text][pix_button btn_text="Check our portfolio" btn_target="true" btn_color="secondary" btn_size="md" btn_effect="2" btn_hover_effect="2" btn_add_hover_effect="" btn_icon_animation="yes" btn_animation="fade-in-up" btn_link="https://essentials.pixfort.com/construction/portfolio/" btn_icon="pixicon-layers-1" btn_anim_delay="800"][/content_box][/vc_column][vc_column width="2/3" content_align="text-center"][pix_portfolio count="4" line_count="6" filters="1" filters_align="left"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // personal

    $data = array();
    $data['name'] = __( 'Portfolio carousel Personal', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/portfolio/personal-portfolio.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all portfolio';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592215658102{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row full_width="stretch_row" css=".vc_custom_1591624777985{padding-bottom: 20px !important;}"][vc_column][pix_badge bold="font-weight-bold" secondary_font="" text_color="white" bg_color="gray-4" style="" hover_effect="" add_hover_effect="" animation="fade-in-left" element_div="text-center" padding="" text="Showcase your works" css=".vc_custom_1591622897948{border-top-width: 2px !important;border-right-width: 2px !important;border-bottom-width: 2px !important;border-left-width: 2px !important;padding-top: 7px !important;padding-right: 12px !important;padding-bottom: 7px !important;padding-left: 12px !important;border-left-color: #e9ecef !important;border-right-color: #e9ecef !important;border-top-color: #e9ecef !important;border-bottom-color: #e9ecef !important;}" delay="600"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h3" text_color="gradient-primary" max_width="500px" css=".vc_custom_1592146248336{padding-top: 20px !important;}"]Check my works[/sliding-text][pix_text size="text-18" content_color="body-default" position="text-center" animation="fade-in-up" max_width="500px" delay="1000"]Be ready to use the next generation of WordPress themes. Be ready to met Essentials by pixfort.[/pix_text][/vc_column][/vc_row][vc_row full_width="stretch_row" equal_height="yes" content_placement="middle"][vc_column][pix_portfolio_slider count="5" portfolio_style="mini" orderby="menu_order" rounded_img="rounded-10" slider_num="3" slider_style="pix-style-standard" slider_effect="pix-circular-slider" prevnextbuttons="1" pagedots="1" freescroll="" cellalign="left" slider_scale="" autoplay="" adaptiveheight="true" righttoleft="" slider_wrap="true" visible_y="pix-overflow-y-visible" visible_overflow="pix-overflow-all-visible"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // photography

    $data = array();
    $data['name'] = __( 'Portfolio Photography', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/portfolio/photography-portfolio.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all portfolio';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592136190469{padding-top: 100px !important;padding-bottom: 100px !important;background-color: #212529 !important;}"][vc_row css=".vc_custom_1591637951128{padding-bottom: 60px !important;}"][vc_column content_align="text-center" offset="vc_col-lg-offset-2 vc_col-lg-8"][pix_text size="text-18" bold="font-weight-bold" content_color="white" position="text-center" animation="fade-in-up" remove_pb_padding="m-0" delay="200" max_width="600px"]Combine seamlessly fitting layouts[/pix_text][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="gradient-primary" css=".vc_custom_1592141941510{padding-top: 10px !important;}"]Check our Recent photos from Essentials Portfolio[/sliding-text][pix_text size="text-18" content_color="light-opacity-5" position="text-center" animation="fade-in-up" delay="600" css=".vc_custom_1591639011307{padding-top: 10px !important;}" max_width="600px"]Combine seamlessly fitting layouts, customize everything you want, switch components on the go using our bootstrap.[/pix_text][/vc_column][/vc_row][vc_row][vc_column][pix_portfolio count="6" filters="1" filter_light="is-dark" rounded_img="rounded-xl"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // agency

    $data = array();
    $data['name'] = __( 'Portfolio carousel 3 Agency', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/portfolio/agency-portfolio-3.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all portfolio';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1590800688839{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row content_placement="middle"][vc_column content_align="text-center" css=".vc_custom_1590551193189{padding-right: 30px !important;padding-left: 30px !important;}"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="heading-default" css=".vc_custom_1591771035090{padding-top: 20px !important;}"]Recent Works[/sliding-text][pix_text size="text-18" content_color="body-default" position="text-center" animation="fade-in-up" delay="900" css=".vc_custom_1591757124339{padding-bottom: 10px !important;}" max_width="500px"]This is just a simple text made for this unique and awesome template, you can replace it with any text.[/pix_text][pix_button btn_text="Check all works" btn_target="true" btn_color="dark-opacity-1" btn_text_color="body-default" btn_size="normal" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="yes" btn_animation="fade-in-up" btn_link="https://pixfort.website/redirect?to=essentials" btn_icon="pixicon-angle-right" btn_anim_delay="800"][/vc_column][/vc_row][vc_row full_width="stretch_row" equal_height="yes" content_placement="middle" css=".vc_custom_1591825464668{padding-top: 40px !important;padding-bottom: 20px !important;}"][vc_column][pix_portfolio_slider count="4" portfolio_style="3d" title_color="white" rounded_img="rounded-xl" overlay_color="gradient-primary" slider_num="3" slider_style="pix-style-standard" slider_effect="pix-circular-slider" prevnextbuttons="" pagedots="1" freescroll="" cellalign="left" slider_scale="" autoplay="" adaptiveheight="true" righttoleft="true" slider_wrap="true" visible_y="pix-overflow-y-visible" visible_overflow="pix-overflow-all-visible"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'Portfolio carousel 2 Agency', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/portfolio/agency-portfolio-2.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all portfolio';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1590800688839{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row content_placement="middle"][vc_column content_align="text-center" css=".vc_custom_1590551193189{padding-right: 30px !important;padding-left: 30px !important;}"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="heading-default" css=".vc_custom_1591771035090{padding-top: 20px !important;}"]Recent Works[/sliding-text][pix_text size="text-18" content_color="body-default" position="text-center" animation="fade-in-up" delay="900" css=".vc_custom_1591757124339{padding-bottom: 10px !important;}" max_width="500px"]This is just a simple text made for this unique and awesome template, you can replace it with any text.[/pix_text][pix_button btn_text="Check all works" btn_target="true" btn_color="dark-opacity-1" btn_text_color="body-default" btn_size="normal" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="yes" btn_animation="fade-in-up" btn_link="https://pixfort.website/redirect?to=essentials" btn_icon="pixicon-angle-right" btn_anim_delay="800"][/vc_column][/vc_row][vc_row full_width="stretch_row" equal_height="yes" content_placement="middle" css=".vc_custom_1591825464668{padding-top: 40px !important;padding-bottom: 20px !important;}"][vc_column offset="vc_col-md-offset-2 vc_col-md-8"][pix_portfolio_slider count="4" portfolio_style="3d" title_color="white" rounded_img="rounded-xl" overlay_color="gradient-primary" slider_num="2" slider_style="pix-style-standard" slider_effect="pix-circular-slider" prevnextbuttons="" pagedots="1" freescroll="" cellalign="left" slider_scale="" autoplay="" adaptiveheight="true" righttoleft="true" slider_wrap="true" visible_y="pix-overflow-y-visible" visible_overflow="pix-overflow-all-visible"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // slides

    $data = array();
    $data['name'] = __( 'Portfolio Slides', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/portfolio/slides-portfolio.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all portfolio slides';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" full_height="yes" fade_in_opacity="pix-opacity-1" pix_over_visibility="" fade_in_intro="https://essentials.pixfort.com/slides/wp-content/uploads/sites/10/2020/05/slides-bg-2.jpg" css=".vc_custom_1590538700364{padding-top: 140px !important;padding-bottom: 140px !important;background-color: #ff6557 !important;}" section_name="Features"][vc_row css=".vc_custom_1589486885639{padding-top: 140px !important;padding-bottom: 80px !important;}"][vc_column][pix_badge bold="font-weight-bold" secondary_font="secondary-font" text_color="white" bg_color="dark-opacity-3" style="" hover_effect="" add_hover_effect="" animation="fade-in-up" element_div="text-center" padding="" text="Made by Top Designers" css=".vc_custom_1589488462036{padding-top: 9px !important;padding-right: 15px !important;padding-bottom: 9px !important;padding-left: 15px !important;}"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" display="display-3" text_color="white" css=".vc_custom_1590538811852{padding-top: 10px !important;}" max_width="800px"]Check our best worldwide projects[/sliding-text][pix_text size="text-20" content_color="light-opacity-7" position="text-center" animation="fade-in-up" delay="200" css=".vc_custom_1589488355694{padding-bottom: 20px !important;}"]We design and develop world-class websites and applications.[/pix_text][pix_button btn_text="Get Essentials Today" btn_secondary_font="secondary-font" btn_style="blink" btn_color="white" btn_size="lg" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" btn_div="text-center" btn_animation="fade-in-up" btn_link="https://pixfort.website/redirect?to=essentials" btn_icon="pixicon-map-pin-2-circle" css=".vc_custom_1589490229475{padding-top: 15px !important;padding-bottom: 15px !important;background-color: rgba(0,0,0,0.15) !important;*background-color: rgb(0,0,0) !important;border-radius: 35px !important;}" btn_anim_delay="400"][/vc_column][/vc_row][vc_row css=".vc_custom_1590538790521{padding-top: 20px !important;padding-bottom: 40px !important;}"][vc_column][pix_portfolio count="6" filters="1" filter_light="is-dark"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // original

    $data = array();
    $data['name'] = __( 'Portfolio Main Original', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/portfolio/original-main-portfolio.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all portfolio';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1593042175878{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row full_width="stretch_row" css=".vc_custom_1577117954152{margin-top: 0px !important;margin-bottom: 0px !important;}"][vc_column width="1/2"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h2" text_color="gradient-primary"]Showcase your Stunning Projects[/sliding-text][/vc_column][vc_column width="1/2" css=".vc_custom_1587618446428{padding-top: 20px !important;}"][pix_text size="text-20" content_color="body-default" animation="fade-in-up" max_width="540px" delay="200"]Each week our editors add new content to our blog, you can find useful topics, exclusive for Essentials owners.[/pix_text][pix_button btn_text="Check our works" btn_secondary_font="secondary-font" btn_style="underline" btn_color="gray-4" btn_text_color="heading-default" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="pix-hover-right" btn_animation="fade-in-up" btn_link="#" btn_icon="pixicon-angle-right" btn_anim_delay="400" css=".vc_custom_1577503226625{margin-right: 0px !important;margin-left: 0px !important;padding-right: 0px !important;padding-left: 0px !important;}"][/vc_column][/vc_row][vc_row css=".vc_custom_1593042182097{padding-top: 40px !important;}"][vc_column][pix_portfolio count="6" filters="0" filters_align="left"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    return $templates;
}




 ?>
