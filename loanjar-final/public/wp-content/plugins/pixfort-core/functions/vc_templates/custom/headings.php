<?php




function pix_templates_headings(){
    $templates = array();

    // Startup

    $data = array();
    $data['name'] = __( 'Heading Startup', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/headings/startup-heading.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all headings';
    $data['content']  = <<<CONTENT
[vc_row css=".vc_custom_1589753614403{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_column][pix_badge bold="font-weight-bold" secondary_font="" style="" hover_effect="" add_hover_effect="" animation="fade-in-up" element_div="text-center" padding="" text="First Time on Themeforest" css=".vc_custom_1589677887111{padding-top: 7px !important;padding-right: 12px !important;padding-bottom: 7px !important;padding-left: 12px !important;}"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h3" text_color="dark-opacity-8" css=".vc_custom_1589672914961{padding-top: 20px !important;}"]Read from the blog[/sliding-text][pix_text size="text-20" content_color="body-default" position="text-center" animation="fade-in-up" max_width="600px" css=".vc_custom_1589677893908{padding-bottom: 20px !important;}" delay="200"]Here’s what you need to know about your pixfort, based on the questions we get asked the most.[/pix_text][pix_button btn_text="Get Essentials today" btn_style="underline" btn_remove_padding="no-padding" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" btn_div="text-center" btn_animation="fade-in-up" btn_link="https://pixfort.website/redirect?to=essentials" btn_icon="pixicon-bag-2" btn_anim_delay="400"][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // Software

    $data = array();
    $data['name'] = __( 'Heading Software', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/headings/software-heading.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all headings';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1589907814219{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_column content_align="text-center" offset="vc_col-lg-offset-2 vc_col-lg-8"][pix_badge bold="font-weight-bold" secondary_font="secondary-font" text_color="white" bg_color="secondary" style="" hover_effect="" add_hover_effect="" animation="fade-in-up" padding="" text="Create. Share. Enjoy." css=".vc_custom_1589827036824{margin-bottom: 15px !important;padding-top: 9px !important;padding-right: 15px !important;padding-bottom: 8px !important;padding-left: 15px !important;}" delay="300"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="heading-default"]The most powerful Elements![/sliding-text][pix_text size="text-20" content_color="dark-opacity-4" animation="fade-in-up" delay="600" css=".vc_custom_1561393502908{padding-top: 10px !important;}"]Combine seamlessly fitting layouts, customize everything you want, switch components on the go using our page builder.[/pix_text][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // saas

    $data = array();
    $data['name'] = __( 'Heading SaaS', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/headings/saas-heading.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all headings';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1590116391712{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_column][pix_badge bold="font-weight-bold" secondary_font="" text_color="white" bg_color="gray-4" style="" hover_effect="" add_hover_effect="" animation="fade-in-left" element_div="text-center" padding="" text="FIRST TIME ON THEMEFOREST" css=".vc_custom_1589995779473{border-top-width: 2px !important;border-right-width: 2px !important;border-bottom-width: 2px !important;border-left-width: 2px !important;padding-top: 7px !important;padding-right: 12px !important;padding-bottom: 7px !important;padding-left: 12px !important;border-left-color: #e9ecef !important;border-right-color: #e9ecef !important;border-top-color: #e9ecef !important;border-bottom-color: #e9ecef !important;}" delay="600"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h3" text_color="gradient-primary" max_width="600px" css=".vc_custom_1589956002416{padding-top: 20px !important;}"]Create a website that is perfect for sales and marketing.[/sliding-text][pix_text size="text-18" content_color="body-default" position="text-center" animation="fade-in-up" max_width="500px" delay="1000"]This is just a simple text made for this unique and awesome template, you can replace it with any text.[/pix_text][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'Heading SaaS dark', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/headings/saas-heading-dark.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all headings';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1590116756579{padding-top: 40px !important;padding-bottom: 40px !important;background-color: #343a40 !important;}"][vc_column][pix_badge bold="font-weight-bold" secondary_font="" text_color="white" bg_color="dark-opacity-3" style="" hover_effect="" add_hover_effect="" animation="fade-in-left" element_div="text-center" padding="" text="LIMITED TIME DISCOUNT" css=".vc_custom_1590017533874{border-top-width: 2px !important;border-right-width: 2px !important;border-bottom-width: 2px !important;border-left-width: 2px !important;padding-top: 7px !important;padding-right: 12px !important;padding-bottom: 7px !important;padding-left: 12px !important;border-left-color: #e9ecef !important;border-right-color: #e9ecef !important;border-top-color: #e9ecef !important;border-bottom-color: #e9ecef !important;}" delay="600"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h3" text_color="white" max_width="600px" css=".vc_custom_1590017490577{padding-top: 20px !important;}"]Build a business with affordable prices for everyone.[/sliding-text][pix_text size="text-18" content_color="body-default" position="text-center" animation="fade-in-up" max_width="500px" delay="1000"]This is just a simple text made for this unique and awesome template, you can replace it with any text.[/pix_text][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // crypto

    $data = array();
    $data['name'] = __( 'Heading Crypto', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/headings/crypto-heading.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all headings';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1590796101175{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_column][pix_badge bold="font-weight-bold" secondary_font="" text_color="dark-opacity-5" bg_color="primary" style="" hover_effect="" add_hover_effect="" animation="fade-in-left" element_div="text-center" padding="" text="FIRST TIME ON THEMEFOREST" css=".vc_custom_1590708172413{border-top-width: 2px !important;border-right-width: 2px !important;border-bottom-width: 2px !important;border-left-width: 2px !important;padding-top: 7px !important;padding-right: 12px !important;padding-bottom: 7px !important;padding-left: 12px !important;border-left-color: #e9ecef !important;border-right-color: #e9ecef !important;border-top-color: #e9ecef !important;border-bottom-color: #e9ecef !important;}" delay="600"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="gradient-primary" max_width="800px" css=".vc_custom_1590706607203{padding-top: 20px !important;}"]Create a website that is perfect for sales and marketing.[/sliding-text][pix_text size="text-20" content_color="body-default" position="text-center" animation="fade-in-up" max_width="600px" delay="1000"]This is just a simple text made for this unique and awesome template, you can replace it with any text.[/pix_text][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // services

    $data = array();
    $data['name'] = __( 'Heading Services', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/headings/services-heading.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all headings';
    $data['content']  = <<<CONTENT
[vc_row css=".vc_custom_1590803606994{padding-top: 60px !important;padding-bottom: 60px !important;}"][vc_column content_align="text-center" offset="vc_col-lg-offset-2 vc_col-lg-8"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h3" text_color="heading-default"]Pricing for Everyone.[/sliding-text][pix_text size="text-18" content_color="body-default" position="text-center" animation="fade-in-up" delay="1200" css=".vc_custom_1590635781498{padding-top: 10px !important;}" max_width="600px"]Combine seamlessly fitting layouts, customize everything you want, switch components on the go using our bootstrap.[/pix_text][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // medical

    $data = array();
    $data['name'] = __( 'Heading Medical', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/headings/medical-heading.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all headings';
    $data['content']  = <<<CONTENT
[vc_row content_placement="middle" css=".vc_custom_1590803574976{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_column content_align="text-center" css=".vc_custom_1590551193189{padding-right: 30px !important;padding-left: 30px !important;}"][pix_badge bold="font-weight-bold" secondary_font="" text_color="white" bg_color="secondary" style="" hover_effect="" add_hover_effect="" animation="fade-in-up" element_div="text-center" padding="" text="Best Doctors in Europe" css=".vc_custom_1590551245072{padding-top: 7px !important;padding-right: 12px !important;padding-bottom: 7px !important;padding-left: 12px !important;}"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="heading-default" css=".vc_custom_1590551202801{padding-top: 20px !important;}"]Meet the Staff[/sliding-text][pix_text size="text-20" content_color="body-default" position="text-center" animation="fade-in-up" delay="900" css=".vc_custom_1590551250261{padding-bottom: 10px !important;}" max_width="600px"]This is just a simple text made for this unique and awesome template, you can replace it with any text.[/pix_text][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // marketing

    $data = array();
    $data['name'] = __( 'Heading Marketing', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/headings/marketing-heading.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all headings';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1592517587040{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_column content_align="text-center" offset="vc_col-lg-offset-2 vc_col-lg-8"][pix_icon media_type="duo_icon" pix_duo_icon="dollar" icon_color="gradient-primary" has_icon_bg="true" icon_size="36" content_align="center" style="" hover_effect="" add_hover_effect=""][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="heading-default" css=".vc_custom_1590184589582{padding-top: 10px !important;}"]Pricing for Everyone.[/sliding-text][pix_text size="text-18" content_color="dark-opacity-4" animation="fade-in-up" delay="1200" css=".vc_custom_1590184749366{padding-top: 10px !important;}" max_width="600px"]Combine seamlessly fitting layouts, customize everything you want, switch components on the go using our bootstrap.[/pix_text][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // creative

    $data = array();
    $data['name'] = __( 'Heading Creative', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/headings/creative-heading.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all headings';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592352444542{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row content_placement="middle"][vc_column width="1/2"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h3" text_color="heading-default" max_width="500px"]Say Hello to the Most Advanced WordPress Theme Ever Made on themeforest.[/sliding-text][/vc_column][vc_column width="1/2"][pix_text size="text-20" content_color="body-default" animation="fade-in-up" delay="400"]Creating stunning and professional websites has never been easier, today with Essentials you will be able to build awesome websites in no time![/pix_text][pix_button btn_text="View Case Study" btn_secondary_font="secondary-font" btn_style="underline" btn_color="gray-7" btn_remove_padding="no-padding" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" btn_link="#" btn_icon="pixicon-arrow-right2"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'Heading Simple Creative', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/headings/creative-heading-simple.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all headings';
    $data['content']  = <<<CONTENT
 [vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592352444542{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row content_placement="middle"][vc_column width="1/2"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h3" text_color="heading-default" max_width="500px"]Say Hello to the Most Advanced WordPress Theme Ever Made on themeforest.[/sliding-text][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // ebook

    $data = array();
    $data['name'] = __( 'Heading Ebook', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/headings/ebook-heading.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all headings';
    $data['content']  = <<<CONTENT
 [vc_row full_width="stretch_row" css=".vc_custom_1590971261828{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_column][pix_badge bold="font-weight-bold" secondary_font="" text_color="body-default" bg_color="gray-1" text_size="custom" style="" hover_effect="" add_hover_effect="" animation="fade-in-left" element_div="text-center" padding="" text="Best Seller Theme" css=".vc_custom_1590972544984{border-top-width: 2px !important;border-right-width: 2px !important;border-bottom-width: 2px !important;border-left-width: 2px !important;padding-top: 7px !important;padding-right: 12px !important;padding-bottom: 7px !important;padding-left: 12px !important;border-left-color: #e9ecef !important;border-right-color: #e9ecef !important;border-top-color: #e9ecef !important;border-bottom-color: #e9ecef !important;}" delay="600" text_custom_size="14px"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="heading-default" max_width="800px" css=".vc_custom_1590970234200{padding-top: 20px !important;}"]Create a website that is perfect for sales and marketing.[/sliding-text][pix_text size="text-20" content_color="body-default" position="text-center" animation="fade-in-up" max_width="600px" delay="1000"]This is just a simple text made for this unique and awesome template, you can replace it with any text.[/pix_text][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // restaurant

    $data = array();
    $data['name'] = __( 'Heading Ebook', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/headings/restaurant-heading.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all headings';
    $data['content']  = <<<CONTENT
 [vc_row full_width="stretch_row" css=".vc_custom_1592608393647{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_column][pix_icon media_type="duo_icon" pix_duo_icon="knife&fork-2" icon_color="gradient-primary" has_icon_bg="true" icon_bg_color="gradient-primary-light" icon_size="48" content_align="center" style="" hover_effect="" add_hover_effect="" animation="fade-in-up"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="gradient-primary" max_width="800px" css=".vc_custom_1591053962906{padding-top: 20px !important;}"]Essentials® Premium Menus[/sliding-text][pix_text size="text-20" content_color="body-default" position="text-center" animation="fade-in-up" max_width="600px" delay="1000"]This is just a simple text made for this unique and awesome template, you can replace it with any text.[/pix_text][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // business

    $data = array();
    $data['name'] = __( 'Heading Business', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/headings/business-heading.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all headings';
    $data['content']  = <<<CONTENT
 [vc_row css=".vc_custom_1592700136831{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_column content_align="text-center"][pix_icon media_type="duo_icon" pix_duo_icon="diagnostics" icon_size="36" content_align="inline" style="" hover_effect="" add_hover_effect=""][heading title_color="heading-default" title_size="h4" title="Some statistics from Essentials" css=".vc_custom_1592257096550{padding-top: 30px !important;padding-bottom: 10px !important;}"][pix_text size="text-18" content_color="body-default" position="text-center" css=".vc_custom_1592246081258{padding-bottom: 30px !important;}" max_width="600px"]It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.[/pix_text][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // product

    $data = array();
    $data['name'] = __( 'Heading with circles product', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/headings/product-heading-circles.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all headings';
    $data['content']  = <<<CONTENT
 [vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592759149575{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_row full_width="stretch_row" css=".vc_custom_1591419221485{padding-top: 40px !important;}"][vc_column content_align="text-center" offset="vc_col-lg-offset-1 vc_col-lg-10"][pix_badge bold="font-weight-bold" secondary_font="secondary-font" text_color="body-default" bg_color="gray-2" style="" hover_effect="" add_hover_effect="" animation="fade-in-up" padding="" text="Create. Share. Enjoy." css=".vc_custom_1591419354085{margin-bottom: 15px !important;padding-top: 9px !important;padding-right: 15px !important;padding-bottom: 8px !important;padding-left: 15px !important;}" delay="300"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="gradient-primary"]Combination of features makes it the world’s most advanced mobile display.[/sliding-text][pix_text size="text-20" content_color="body-default" animation="fade-in-up" delay="1400" css=".vc_custom_1591436878586{padding-top: 10px !important;}"]The edge-to-edge Liquid Retina display is not only gorgeous and immersive, but also features incredibly advanced technologies. Like ProMotion, True Tone, and industry‑leading color accuracy, which make everything feel responsive and look stunning.[/pix_text][circles circles="%5B%7B%22title%22%3A%22Secure%20Platform%22%2C%22img%22%3A%22https://essentials.pixfort.com/product/wp-content/uploads/sites/23/2020/06/shipe-image-2.jpg%22%2C%22link%22%3A%22%23%22%2C%22color%22%3A%22pix-bg-custom%22%7D%2C%7B%22title%22%3A%22Worldwide%22%2C%22img%22%3A%22https://essentials.pixfort.com/product/wp-content/uploads/sites/23/2020/06/shipe-image-4.jpg%22%2C%22link%22%3A%22%23%22%2C%22color%22%3A%22pix-bg-custom%22%7D%2C%7B%22title%22%3A%22Online%20Shop%22%2C%22img%22%3A%22https://essentials.pixfort.com/product/wp-content/uploads/sites/23/2020/04/shipe-image-1.jpg%22%2C%22link%22%3A%22%23%22%2C%22color%22%3A%22pix-bg-custom%22%7D%5D" effect="" circles_size="pix-md-circles" circles_align="justify-content-center" btn_text="Check all categories" btn_style="underline" btn_color="gray-8" btn_text_color="heading-default" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="yes" btn_link="#" btn_icon="pixicon-angle-right" c_css=".vc_custom_1591431402998{padding-top: 40px !important;padding-bottom: 40px !important;}"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // coronavirus

    $data = array();
    $data['name'] = __( 'Heading with circles Coronavirus', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/headings/coronavirus-heading-circles.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all headings';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1592784095154{padding-top: 60px !important;padding-bottom: 60px !important;background-color: #ffffff !important;}"][vc_column content_align="text-center"][pix_icon media_type="duo_icon" pix_duo_icon="bullet-list" icon_color="secondary" has_icon_bg="true" icon_bg_color="secondary-light" icon_size="36" content_align="inline" style="" hover_effect="" add_hover_effect=""][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h3" text_color="heading-default" max_width="500px" css=".vc_custom_1592220185465{padding-top: 20px !important;padding-bottom: 20px !important;}"]Information to get in touch with our team today.[/sliding-text][circles circles="%5B%7B%22title%22%3A%22Easy%20contact%22%2C%22img%22%3A%22https://essentials.pixfort.com/coronavirus/wp-content/uploads/sites/24/2020/02/blog-4.jpg%22%2C%22link%22%3A%22%23%22%2C%22color%22%3A%22pix-bg-custom%22%7D%2C%7B%22title%22%3A%22Heath%20care%22%2C%22img%22%3A%22https://essentials.pixfort.com/coronavirus/wp-content/uploads/sites/24/2020/02/blog-2.jpg%22%2C%22link%22%3A%22%23%22%2C%22color%22%3A%22pix-bg-custom%22%7D%2C%7B%22title%22%3A%22Worldwide%22%2C%22img%22%3A%22https://essentials.pixfort.com/coronavirus/wp-content/uploads/sites/24/2020/02/blog-3.jpg%22%2C%22link%22%3A%22%23%22%2C%22color%22%3A%22pix-bg-custom%22%7D%5D" effect="" circles_align="justify-content-center" btn_text="Contact us" btn_style="link" btn_color="gray-5" btn_remove_padding="no-padding" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="yes" btn_link="#" btn_icon="pixicon-angle-right" c_css=".vc_custom_1592220192620{padding-bottom: 20px !important;}"][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // influencer

    $data = array();
    $data['name'] = __( 'Heading with emoji Influencer', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/headings/influencer-heading.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all headings';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1592838860323{padding-top: 40px !important;padding-bottom: 40px !important;background-color: #ffffff !important;}"][vc_column content_align="text-center" offset="vc_col-lg-offset-2 vc_col-lg-8"][pix_icon media_type="char" char="🙋🏼‍♀️" has_icon_bg="true" icon_bg_color="gradient-primary-light" icon_size="48" content_align="center" style="" hover_effect="" add_hover_effect=""][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="gradient-primary" css=".vc_custom_1591577654196{padding-top: 20px !important;}"]Discover and learn more about me and what I do![/sliding-text][pix_text size="text-20" content_color="body-default" animation="fade-in-up" delay="600" css=".vc_custom_1591573822455{padding-top: 10px !important;}"]Combine seamlessly fitting layouts, customize everything you want, switch components on the go using our page builder.[/pix_text][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // photography

    $data = array();
    $data['name'] = __( 'Heading Photography', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/headings/photography-heading.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all headings';
    $data['content']  = <<<CONTENT
[vc_row content_placement="middle" css=".vc_custom_1592856759859{padding-top: 60px !important;padding-bottom: 60px !important;}"][vc_column content_align="text-center" css=".vc_custom_1592137735614{padding-right: 30px !important;padding-left: 30px !important;}"][pix_text size="text-18" bold="font-weight-bold" content_color="heading-default" animation="fade-in-up" remove_pb_padding="m-0" delay="200" max_width="600px"]+15.000 Happy customers trusted pixfort[/pix_text][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="gradient-primary" css=".vc_custom_1592141952869{padding-top: 10px !important;}"]Words from Customers[/sliding-text][pix_text size="text-18" content_color="body-default" animation="fade-in-up" delay="900" css=".vc_custom_1592138473880{padding-bottom: 10px !important;}" max_width="600px"]This is just a simple text made for this unique and awesome template, you can replace it with any text.[/pix_text][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // beauty

    $data = array();
    $data['name'] = __( 'Heading Beauty', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/headings/beauty-heading.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all headings';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1592954569232{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_column][pix_text size="text-20" bold="font-weight-bold" content_color="heading-default" position="text-center" animation="fade-in-up" max_width="500px" delay="1000"]Make Stunning Websites in Minutes![/pix_text][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="gradient-primary" max_width="650px"]Start Building Websites using Essentials Theme[/sliding-text][pix_text size="text-20" content_color="body-default" position="text-center" animation="fade-in-up" max_width="650px" delay="1000"]This is just a simple text made for Essentials awesome template.[/pix_text][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // original

    $data = array();
    $data['name'] = __( 'Heading Original', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/headings/original-main-heading.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all headings';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1593041239591{padding-top: 40px !important;padding-bottom: 40px !important;background-color: #ffffff !important;}"][vc_column content_align="text-center"][pix_badge bold="font-weight-bold" secondary_font="secondary-font" text_color="heading-default" bg_color="gray-2" style="" hover_effect="" add_hover_effect="" animation="fade-in-up" text="First Time on themeforest" css=".vc_custom_1578839385486{padding-top: 5px !important;padding-right: 9px !important;padding-bottom: 5px !important;padding-left: 9px !important;}"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="gradient-primary" css=".vc_custom_1577069264108{margin-top: 15px !important;}"]Say Hello to Essentials[/sliding-text][pix_text size="text-20" content_color="body-default" position="text-center" animation="fade-in-up" max_width="660" delay="200"]Design better and spend less time without restricting creative freedom.[/pix_text][pix_button btn_text="Join our community" btn_secondary_font="secondary-font" btn_style="underline" btn_color="gray-4" btn_text_color="heading-default" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="pix-hover-right" btn_animation="fade-in-up" btn_link="#" btn_icon="pixicon-angle-right" btn_anim_delay="400"][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // seo

    $data = array();
    $data['name'] = __( 'Heading Half SEO', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/headings/seo-heading-half.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all headings';
    $data['content']  = <<<CONTENT
[vc_row content_placement="middle" pix_particles_check="" responsive_css="{``pix_res_sm_pt``:``20``,``pix_res_sm_pb``:``20``,``pix_res_md_pt``:``40``,``pix_res_md_pb``:``40``}" css=".vc_custom_1605824467231{padding-top: 60px !important;padding-bottom: 60px !important;}"][vc_column width="1/2"][pix_highlighted_text items="%5B%7B%22text%22%3A%22We%20provide%20%22%2C%22highlight_color%22%3A%22%23ffd900%22%2C%22heading_font%22%3A%22heading-font%22%7D%2C%7B%22text%22%3A%22high%20quality%20%26%20premium%22%2C%22is_highlighted%22%3A%22true%22%2C%22highlight_color%22%3A%22%23ffd900%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%7D%2C%7B%22text%22%3A%22%20web%20services%22%2C%22highlight_color%22%3A%22%23ffd900%22%2C%22heading_font%22%3A%22heading-font%22%7D%5D" title_size="h2" position="text-left" heading_id="1604781013506-03511be0-2d48" css=".vc_custom_1604781603592{padding-top: 20px !important;padding-bottom: 20px !important;}"][/vc_column][vc_column width="1/2"][pix_text size="text-20" content_color="body-default" css=".vc_custom_1604782267502{padding-top: 20px !important;}"]It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.[/pix_text][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'Heading SEO', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/headings/seo-heading-center.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all headings';
    $data['content']  = <<<CONTENT
[vc_row pix_particles_check=""][vc_column][pix_highlighted_text items="%5B%7B%22text%22%3A%22It%E2%80%99s%20a%20%22%2C%22highlight_color%22%3A%22%23ffd900%22%2C%22heading_font%22%3A%22heading-font%22%7D%2C%7B%22text%22%3A%22magical%20piece%22%2C%22is_highlighted%22%3A%22true%22%2C%22highlight_color%22%3A%22%23ffd900%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%7D%2C%7B%22text%22%3A%22%20of%20glass.%22%2C%22highlight_color%22%3A%22%23ffd900%22%2C%22heading_font%22%3A%22heading-font%22%2C%22new_line%22%3A%22true%22%7D%2C%7B%22text%22%3A%22It%E2%80%99s%20so%20fast%20most%20PC%20laptops%20can%E2%80%99t%20catch%20up.%22%2C%22highlight_color%22%3A%22%23ffd900%22%2C%22heading_font%22%3A%22heading-font%22%7D%5D" title_size="h2" heading_id="1603929442425-3fadc875-548d"][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // modern

    $data = array();
    $data['name'] = __( 'Heading Modern', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/headings/modern-heading.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all headings';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1617666623544{padding-top: 60px !important;padding-bottom: 60px !important;background-color: #ffffff !important;}"][vc_row full_width="stretch_row" pix_particles_check=""][vc_column][pix_text size="text-18" bold="font-weight-bold" secondary_font="secondary-font" content_color="heading-default" animation="fade-in-up" remove_pb_padding="m-0" delay="200" max_width="600px" css=".vc_custom_1607291160375{padding-bottom: 10px !important;}"]Combine seamlessly fitting layouts[/pix_text][heading title_color="gradient-primary" position="text-left" title="We strongly believe that everyone should own stunning website!"][pix_text size="text-20" content_color="body-default" css=".vc_custom_1613434809082{padding-top: 10px !important;}" max_width="600px"]Combine seamlessly fitting layouts, customize everything you want, switch components on the go using Essentials theme.[/pix_text][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // company

    $data = array();
    $data['name'] = __( 'Heading Company', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/headings/company-heading.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all headings';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1616974507464{padding-top: 40px !important;padding-bottom: 40px !important;background-color: #ffffff !important;}" b_custom_height="300px"][vc_row full_width="stretch_row" content_placement="middle" pix_particles_check=""][vc_column width="1/2"][pix_badge bold="font-weight-bold" secondary_font="secondary-font" text_color="gradient-primary" bg_color="gradient-primary-light" style="" hover_effect="" add_hover_effect="" padding="" text="Made by pixfort team" css=".vc_custom_1607663850506{margin-bottom: 20px !important;padding-top: 9px !important;padding-right: 15px !important;padding-bottom: 9px !important;padding-left: 15px !important;}"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h3" text_color="heading-default" max_width="400px"]Reinventing the Way you Create Websites.[/sliding-text][/vc_column][vc_column width="1/2"][circles circles="%5B%7B%22title%22%3A%22Online%20Shop%22%2C%22img%22%3A%22https://essentials.pixfort.com/company/wp-content/uploads/sites/47/2021/02/story-3.png%22%2C%22color%22%3A%22pix-bg-custom%22%7D%2C%7B%22title%22%3A%22Worldwide%22%2C%22img%22%3A%22https://essentials.pixfort.com/company/wp-content/uploads/sites/47/2021/02/story-2.png%22%2C%22color%22%3A%22pix-bg-custom%22%7D%2C%7B%22title%22%3A%22Secure%20Platform%22%2C%22img%22%3A%22https://essentials.pixfort.com/company/wp-content/uploads/sites/47/2021/02/story-1.png%22%2C%22color%22%3A%22pix-bg-custom%22%7D%5D" effect="1" hover_effect="1" circles_align="justify-content-end" animation="fade-in-right" delay="300" btn_text="Learn about us" btn_secondary_font="secondary-font" btn_style="underline" btn_text_color="heading-default" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="yes" btn_link="https://essentials.pixfort.com/company/about/" btn_icon="pixicon-angle-right"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'Heading Inner pages Company', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/headings/company-inner-pages-heading.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all headings';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" responsive_css="{``pix_res_sm_pb``:``20``,``pix_res_md_pb``:``20``}" css=".vc_custom_1616975228192{padding-top: 40px !important;padding-bottom: 40px !important;background-color: #ffffff !important;border-radius: 10px !important;}"][vc_row pix_particles_check="" responsive_css="{``pix_res_sm_pb``:``40``,``pix_res_md_pb``:``40``}"][vc_column][pix_badge bold="font-weight-bold" secondary_font="secondary-font" text_color="heading-default" bg_color="gray-2" style="" hover_effect="" add_hover_effect="" animation="fade-in-up" element_div="text-center" padding="" text="Most have theme" css=".vc_custom_1613522030466{padding-top: 9px !important;padding-right: 15px !important;padding-bottom: 9px !important;padding-left: 15px !important;}"][pix_highlighted_text items="%5B%7B%22text%22%3A%22Check%20below%20the%20%22%2C%22highlight_color%22%3A%22%23ffd900%22%2C%22heading_font%22%3A%22heading-font%22%7D%2C%7B%22text%22%3A%22most%20popular%22%2C%22is_highlighted%22%3A%22true%22%2C%22highlight_color%22%3A%22%23ffd900%22%2C%22custom_height%22%3A%2210%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%7D%2C%7B%22text%22%3A%22%20services%22%2C%22highlight_color%22%3A%22%23ffd900%22%2C%22heading_font%22%3A%22heading-font%22%7D%5D" title_size="h2" heading_id="1616975201558-74e5598e-c583" css=".vc_custom_1613524119632{padding-top: 20px !important;}" max_width="600px"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // gallery

    $data = array();
    $data['name'] = __( 'Heading Gallery', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/headings/gallery-heading.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all headings';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1617667952137{padding-top: 60px !important;padding-bottom: 60px !important;}" el_id="pix_section_gallery"][vc_row pix_particles_check="" css=".vc_custom_1609294871564{padding-bottom: 40px !important;}"][vc_column content_align="text-center" offset="vc_col-lg-offset-2 vc_col-lg-8"][pix_badge bold="font-weight-bold" secondary_font="secondary-font" text_color="body-default" bg_color="gray-1" text_size="custom" style="" hover_effect="" add_hover_effect="" padding="" text="Unlimited Possibilities" css=".vc_custom_1613701195286{padding-top: 10px !important;padding-right: 15px !important;padding-bottom: 10px !important;padding-left: 15px !important;}" text_custom_size="14px"][pix_highlighted_text items="%5B%7B%22text%22%3A%22Add%20a%20%22%2C%22highlight_color%22%3A%22%23ffd900%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%7D%2C%7B%22text%22%3A%22Super%20Clean%20Gallery%22%2C%22is_highlighted%22%3A%22true%22%2C%22highlight_color%22%3A%22%23ffd900%22%2C%22custom_height%22%3A%2210%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%7D%2C%7B%22text%22%3A%22%20to%20your%20website%22%2C%22highlight_color%22%3A%22%23ffd900%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%7D%5D" title_size="h2" heading_id="1609292819644-5e128699-7b78" css=".vc_custom_1613701081570{padding-top: 25px !important;padding-bottom: 25px !important;}" max_width="600px"][pix_text size="text-20" content_color="body-default" position="text-center" animation="fade-in-up" delay="200" css=".vc_custom_1609040709385{padding-top: 10px !important;padding-bottom: 20px !important;}" max_width="600px"]Combine seamlessly fitting layouts, customize everything you want, switch components on the go using our bootstrap.[/pix_text][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'Heading Gallery page Gallery', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/headings/gallery-gallery-page-heading.jpg', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all headings';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1617668216623{padding-top: 40px !important;padding-bottom: 40px !important;}" el_id="pix_section_gallery"][vc_row full_width="stretch_row" top_divider_select="dynamic" top_moving_divider_color="%5B%7B%22d_gradient%22%3A%221%22%2C%22d_color_1%22%3A%22rgba(255%2C185%2C150%2C0.7)%22%2C%22d_color_2%22%3A%22rgba(253%2C121%2C132%2C0.6)%22%7D%2C%7B%22d_gradient%22%3A%221%22%2C%22d_color_1%22%3A%22%2301ddfe%22%2C%22d_color_2%22%3A%22rgba(1%2C221%2C254%2C0.4)%22%7D%2C%7B%22d_color_1%22%3A%22%23ffffff%22%2C%22d_color_2%22%3A%22%23f8f9fa%22%7D%5D" pix_particles_check="" css=".vc_custom_1617668210691{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_column content_align="text-center"][pix_badge bold="font-weight-bold" secondary_font="" text_color="heading-default" bg_color="white" text_size="custom" style="3" hover_effect="" add_hover_effect="" padding="" text="Unlimited Possibilities" css=".vc_custom_1614046362713{padding-top: 9px !important;padding-right: 15px !important;padding-bottom: 9px !important;padding-left: 15px !important;}" text_custom_size="14px"][pix_highlighted_text items="%5B%7B%22text%22%3A%22Add%20a%20%22%2C%22highlight_color%22%3A%22%23ffd900%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%7D%2C%7B%22text%22%3A%22Super%20Clean%20Gallery%22%2C%22is_highlighted%22%3A%22true%22%2C%22highlight_color%22%3A%22%23ffd900%22%2C%22custom_height%22%3A%2210%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%7D%2C%7B%22text%22%3A%22%20to%20your%20website%22%2C%22highlight_color%22%3A%22%23ffd900%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%7D%5D" title_size="h2" heading_id="1609292819644-5e128699-7b78" css=".vc_custom_1613701081570{padding-top: 25px !important;padding-bottom: 25px !important;}" max_width="600px"][pix_text size="text-20" content_color="body-default" animation="fade-in-up" max_width="560px" delay="100" css=".vc_custom_1608938416720{padding-top: 10px !important;padding-bottom: 10px !important;}"]Be ready to use the next generation of WordPress themes. Be ready to met Essentials by pixfort.[/pix_text][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);


    return $templates;
}




 ?>
