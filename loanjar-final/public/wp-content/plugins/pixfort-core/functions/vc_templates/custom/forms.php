<?php




function pix_templates_forms(){
    $templates = array();

    // saas

    $data = array(); // Create new array
    $data['name'] = __( 'Newsletter subscription', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/forms/saas-newsletter-gradient.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template all forms'; // CSS class name
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row" content_placement="middle" pix_bg_grdient="bg-gradient-primary" css=".vc_custom_1590027399640{padding-top: 40px !important;padding-bottom: 40px !important;background-color: #f8f9fa !important;}"][vc_column width="1/3"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h5" text_color="white"]Subscribe to Newsletter[/sliding-text][pix_text size="text-18" content_color="light-opacity-7" animation="fade-in-up" delay="200"]Get Essentials theme latest updates and news directly to your inbox, for free.[/pix_text][/vc_column][vc_column width="2/3"][contact-form-7 id="313"][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // medical

    $data = array(); // Create new array
    $data['name'] = __( 'Contact form left Medical', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/forms/medical-contact-form-left.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template all forms'; // CSS class name
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" b_flip_h="true" top_divider_select="7" top_layers="1" t_1_color="#f8f9fa" b_custom_height="400px" css=".vc_custom_1590804252903{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row full_width="stretch_row" css=".vc_custom_1590553263474{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_column][pix_highlight_box style="3" hover_effect="3" add_hover_effect="" animation="fade-in-up" image="https://essentials.pixfort.com/medical/wp-content/uploads/sites/11/2020/05/medical-content-stack.jpg" css=".vc_custom_1590553377962{background-color: #ffffff !important;border-radius: 10px !important;}"][pix_badge bold="font-weight-bold" secondary_font="secondary-font" text_color="secondary" bg_color="secondary-light" style="" hover_effect="" add_hover_effect="" animation="fade-in-up" padding="" text="Best Seller Theme" css=".vc_custom_1589596371661{margin-bottom: 10px !important;}"][heading title_color="heading-default" title_size="h4" position="text-left" animation="fade-in-up" content_color="body-default" title="Book an appointment" css=".vc_custom_1590551965143{padding-bottom: 0px !important;}"][vc_separator css=".vc_custom_1590552440213{margin-top: 10px !important;margin-bottom: 0px !important;padding-bottom: 20px !important;}"][contact-form-7 id="2939"][/pix_highlight_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array(); // Create new array
    $data['name'] = __( 'Contact form right Medical', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/forms/medical-contact-form-right.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template all forms'; // CSS class name
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" b_flip_h="true" top_divider_select="7" top_layers="1" t_1_color="#f8f9fa" b_custom_height="400px" css=".vc_custom_1590806184214{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row full_width="stretch_row" css=".vc_custom_1590553263474{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_column][pix_highlight_box layout="wide_card_left" style="3" hover_effect="3" add_hover_effect="" animation="fade-in-up" image="https://essentials.pixfort.com/medical/wp-content/uploads/sites/11/2020/05/medical-content-stack.jpg" css=".vc_custom_1590806165755{background-color: #ffffff !important;border-radius: 10px !important;}"][pix_badge bold="font-weight-bold" secondary_font="secondary-font" text_color="secondary" bg_color="secondary-light" style="" hover_effect="" add_hover_effect="" animation="fade-in-up" padding="" text="Best Seller Theme" css=".vc_custom_1589596371661{margin-bottom: 10px !important;}"][heading title_color="heading-default" title_size="h4" position="text-left" animation="fade-in-up" content_color="body-default" title="Book an appointment" css=".vc_custom_1590551965143{padding-bottom: 0px !important;}"][vc_separator css=".vc_custom_1590552440213{margin-top: 10px !important;margin-bottom: 0px !important;padding-bottom: 20px !important;}"][contact-form-7 id="2939"][/pix_highlight_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // marketing

    $data = array(); // Create new array
    $data['name'] = __( 'Contact left Marketing', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/forms/marketing-contact-form-left.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template all forms'; // CSS class name
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" top_divider_select="19" top_layers="1" css=".vc_custom_1592491332153{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #f8f9fa !important;}" el_id="pix_section_contact"][vc_row][vc_column][pix_highlight_box style="3" hover_effect="" add_hover_effect="" image="https://essentials.pixfort.com/marketing/wp-content/uploads/sites/6/2020/05/marketing-contact-highlight-image.jpg" css=".vc_custom_1590187754547{background-color: #ffffff !important;}"][pix_feature media_type="duo_icon" title_size="h2" title_bold="font-weight-bold" content_color="body-default" pix_duo_icon="chat-4" icon_color="gradient-primary" has_icon_bg="true" icon_size="36" title="Get in Touch with our Friendly Team." css=".vc_custom_1590187440478{padding-bottom: 30px !important;}"]It is a long established fact that a reader will be distracted by the readable content of the page.[/pix_feature][contact-form-7 id="1566"][/pix_highlight_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array(); // Create new array
    $data['name'] = __( 'Contact right Marketing', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/forms/marketing-contact-form-right.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template all forms'; // CSS class name
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" top_divider_select="19" top_layers="1" css=".vc_custom_1592491332153{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #f8f9fa !important;}" el_id="pix_section_contact"][vc_row][vc_column][pix_highlight_box layout="wide_card_left" style="3" hover_effect="" add_hover_effect="" image="https://essentials.pixfort.com/marketing/wp-content/uploads/sites/6/2020/05/marketing-contact-highlight-image.jpg" css=".vc_custom_1592492817324{background-color: #ffffff !important;}"][pix_feature media_type="duo_icon" title_size="h2" title_bold="font-weight-bold" content_color="body-default" pix_duo_icon="chat-4" icon_color="gradient-primary" has_icon_bg="true" icon_size="36" title="Get in Touch with our Friendly Team." css=".vc_custom_1590187440478{padding-bottom: 30px !important;}"]It is a long established fact that a reader will be distracted by the readable content of the page.[/pix_feature][contact-form-7 id="1566"][/pix_highlight_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // ebook

    $data = array();
    $data['name'] = __( 'Form Ebook', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/forms/ebook-form.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all forms';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" video_bg="yes" video_bg_url="https://www.youtube.com/watch?v=BJ_dPY23dbg&feature=youtu.be" pix_over_visibility="" pix_overlay_color="gradient-primary" pix_overlay_opacity="0.9" css=".vc_custom_1590975961217{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_row full_width="stretch_row" content_placement="middle" pix_visibility="1" css=".vc_custom_1590975174250{padding-top: 100px !important;padding-bottom: 100px !important;}"][vc_column width="1/2"][pix_img pix_scroll_parallax="scroll_parallax" yaxis="150" style="" hover_effect="" add_hover_effect="" image="https://essentials.pixfort.com/ebook/wp-content/uploads/sites/15/2020/06/cover-2.png"][/vc_column][vc_column width="1/2" css=".vc_custom_1589829246651{padding-top: 2px !important;padding-bottom: 40px !important;}"][content_box style="3" hover_effect="3" add_hover_effect="" rounded_box="rounded-xl" animation="" css=".vc_custom_1590975580413{padding-top: 60px !important;padding-right: 40px !important;padding-bottom: 30px !important;padding-left: 40px !important;background-color: #ffffff !important;}"][pix_img rounded_img="rounded-xl" style="" hover_effect="" add_hover_effect="" image="https://essentials.pixfort.com/ebook/wp-content/uploads/sites/15/2020/05/red-favicon.png" height="45px" css=".vc_custom_1590975480523{padding-bottom: 30px !important;}"][heading title_color="heading-default" title_size="h2" position="text-left" animation="fade-in-up" title="Subscribe Now"][pix_text size="text-20" content_color="body-default" animation="fade-in-up" delay="200" css=".vc_custom_1590975382107{padding-top: 10px !important;padding-bottom: 30px !important;}" max_width="500px"]Be ready to use the next generation of WordPress themes. Be ready to met Essentials by pixfort.[/pix_text][contact-form-7 id="2939"][clients_slider clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/ebook/wp-content/uploads/sites/15/2020/06/google.png%22%2C%22title%22%3A%22google%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/ebook/wp-content/uploads/sites/15/2020/06/apple.png%22%2C%22title%22%3A%22apple%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/ebook/wp-content/uploads/sites/15/2020/06/pixfort.png%22%2C%22title%22%3A%22pixfort%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/ebook/wp-content/uploads/sites/15/2020/06/nike.png%22%2C%22title%22%3A%22nike%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/ebook/wp-content/uploads/sites/15/2020/06/spotify.png%22%2C%22title%22%3A%22spotify%22%7D%5D" add_hover_effect="1" style="client" slider_num="3" slider_style="pix-style-standard" slider_effect="pix-circular-slider" prevnextbuttons="" pagedots="" freescroll="" cellalign="left" slider_scale="" autoplay="" adaptiveheight="true" righttoleft="" slider_wrap="true" visible_y="" visible_overflow="" css=".vc_custom_1592399522815{padding-top: 10px !important;}"][/content_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // foundation

    $data = array();
    $data['name'] = __( 'Subscribe form Foundation', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/forms/foundation-subscribe.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all forms';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592345122698{padding-top: 100px !important;padding-bottom: 100px !important;background-color: #f8f9fa !important;}"][vc_row content_placement="middle"][vc_column content_align="text-center" css=".vc_custom_1592341094138{padding-right: 30px !important;padding-left: 30px !important;}" offset="vc_col-md-offset-2 vc_col-md-8"][pix_badge bold="font-weight-bold" secondary_font="" text_color="white" bg_color="secondary" style="" hover_effect="" add_hover_effect="" animation="fade-in-up" element_div="text-center" padding="" text="Exclusive Daily News" css=".vc_custom_1592348631180{padding-top: 7px !important;padding-right: 12px !important;padding-bottom: 7px !important;padding-left: 12px !important;}"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="heading-default" css=".vc_custom_1591079586168{padding-top: 20px !important;}"]Subscribe[/sliding-text][pix_text size="text-20" content_color="body-default" position="text-center" animation="fade-in-up" delay="900" css=".vc_custom_1590551250261{padding-bottom: 10px !important;}" max_width="600px"]This is just a simple text made for this unique and awesome template, you can replace it with any text.[/pix_text][contact-form-7 id="313"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // construction

    $data = array();
    $data['name'] = __( 'Form and map construction', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/forms/construction-form.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all forms maps contact';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592344824196{padding-top: 100px !important;padding-bottom: 100px !important;background-color: #ffffff !important;}" el_id="pix_section_contact"][vc_row equal_height="yes"][vc_column width="1/2" content_align="text-center"][pix_map address="La Défense, Paris, France" animation="fade-in-up" style="" hover_effect="" add_hover_effect="" map_height="full-height" marker="https://essentials.pixfort.com/construction/wp-content/uploads/sites/20/2020/06/map-pin.png" css=".vc_custom_1592322620317{border-radius: 5px !important;}" delay="200"][/vc_column][vc_column width="1/2" css=".vc_custom_1592323090921{padding-top: 20px !important;padding-bottom: 20px !important;}"][pix_badge bold="font-weight-bold" secondary_font="" text_color="white" bg_color="primary" style="" hover_effect="" add_hover_effect="" animation="fade-in-up" element_div="text-left" padding="" text="24/7 Online Support" css=".vc_custom_1592344891028{padding-top: 7px !important;padding-right: 12px !important;padding-bottom: 7px !important;padding-left: 12px !important;}"][heading title_color="heading-default" title_size="h3" position="text-left" animation="fade-in-up" content_color="body-default" title="Book an appointment" css=".vc_custom_1592322092252{padding-top: 20px !important;padding-bottom: 10px !important;}"][pix_text size="text-20" content_color="body-default" animation="fade-in-up" max_width="600px" delay="1000" css=".vc_custom_1590713697728{padding-bottom: 10px !important;}"]Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum industry's standard.[/pix_text][contact-form-7 id="1566"][pix-social-icons items="%5B%7B%22icon%22%3A%22pixicon-facebook3%22%2C%22item_link%22%3A%22%23%22%2C%22item_color%22%3A%22heading-default%22%2C%22item_custom_color%22%3A%22%23333333%22%7D%2C%7B%22icon%22%3A%22pixicon-twitter%22%2C%22item_link%22%3A%22%23%22%2C%22item_color%22%3A%22heading-default%22%2C%22item_custom_color%22%3A%22%23333333%22%7D%2C%7B%22icon%22%3A%22pixicon-instagram2%22%2C%22item_link%22%3A%22%23%22%2C%22item_color%22%3A%22heading-default%22%2C%22item_custom_color%22%3A%22%23333333%22%7D%2C%7B%22icon%22%3A%22pixicon-dribbble%22%2C%22item_link%22%3A%22%23%22%2C%22item_color%22%3A%22heading-default%22%2C%22item_custom_color%22%3A%22%23333333%22%7D%5D" item_size="custom" items_style="fly-sm" position="text-center" item_padding="px-3" animation="fade-in-up" delay="400" css=".vc_custom_1592322188629{padding-top: 40px !important;}" item_custom_size="32px"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // influencer

    $data = array();
    $data['name'] = __( 'Subscribe form Influencer', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/forms/influencer-subscribe.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all forms';
    $data['content']  = <<<CONTENT
[vc_section pix_over_visibility="" pix_visibility="1" css=".vc_custom_1592839174052{margin-top: 80px !important;margin-bottom: 80px !important;border-top-width: 4px !important;border-right-width: 4px !important;border-bottom-width: 4px !important;border-left-width: 4px !important;padding-top: 60px !important;padding-bottom: 60px !important;background-color: #ffffff !important;border-left-color: rgba(0,0,0,0.08) !important;border-left-style: dotted !important;border-right-color: rgba(0,0,0,0.08) !important;border-right-style: dotted !important;border-top-color: rgba(0,0,0,0.08) !important;border-top-style: dotted !important;border-bottom-color: rgba(0,0,0,0.08) !important;border-bottom-style: dotted !important;border-radius: 10px !important;}"][vc_row full_width="stretch_row" css=".vc_custom_1591576435300{padding-bottom: 20px !important;}"][vc_column content_align="text-center" offset="vc_col-lg-offset-2 vc_col-lg-8"][pix_icon media_type="char" char="👏🏻" has_icon_bg="true" icon_bg_color="gradient-primary-light" icon_size="48" content_align="center" style="" hover_effect="" add_hover_effect=""][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="gradient-primary" css=".vc_custom_1591576700331{padding-top: 20px !important;}"]Subscribe to newsletter[/sliding-text][pix_text size="text-20" content_color="body-default" animation="fade-in-up" delay="600" css=".vc_custom_1591576866924{padding-bottom: 20px !important;}"]Combine seamlessly fitting layouts, customize everything you want.[/pix_text][contact-form-7 id="313"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // agency

    $data = array();
    $data['name'] = __( 'Contact form Agency', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/forms/agency-contact.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all forms contact';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" full_height="yes" content_placement="middle" video_bg="yes" video_bg_url="https://www.youtube.com/watch?v=rXXSoMphtBk&feature=youtu.be" pix_over_visibility="" pix_overlay_color="gray-9" pix_visibility="1" css=".vc_custom_1591764929248{padding-top: 100px !important;padding-bottom: 100px !important;background-color: #ffffff !important;}" b_custom_height="100px" pix_overlay_opacity="0.85" el_id="pix_section_contact"][vc_row content_placement="middle"][vc_column width="1/2"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h2" text_color="white" css=".vc_custom_1591761821392{padding-top: 20px !important;}"]Contact us[/sliding-text][pix_text size="text-18" content_color="light-opacity-7" animation="fade-in-up" delay="900" css=".vc_custom_1591761814316{padding-bottom: 20px !important;}" max_width="500px"]This is just a simple text made for this unique and awesome template, you can replace it with any text.[/pix_text][contact-form-7 id="1566"][/vc_column][vc_column width="1/2" css=".vc_custom_1591761246251{padding-right: 30px !important;padding-left: 30px !important;}"][pix_feature media_type="duo_icon" title_color="white" title_bold="font-weight-bold" title_secondary_font="secondary-font" content_size="text-18" content_color="light-opacity-5" pix_duo_icon="thunder-move" icon_color="gradient-primary" has_icon_bg="true" icon_bg_color="white" icon_size="36" padding_title="0px" padding_content="10px" icon_position="left" animation="fade-in-up" title="Unlimited Possibilities" delay="200" css=".vc_custom_1591761225532{padding-top: 20px !important;padding-bottom: 20px !important;}"]Combine seamlessly fitting layouts and components.[/pix_feature][pix_feature media_type="duo_icon" title_color="white" title_bold="font-weight-bold" title_secondary_font="secondary-font" content_size="text-18" content_color="light-opacity-5" pix_duo_icon="tie" icon_color="gradient-primary" has_icon_bg="true" icon_bg_color="white" icon_size="36" padding_title="0px" padding_content="10px" icon_position="left" animation="fade-in-up" title="Made in France" delay="400" css=".vc_custom_1591758951045{padding-top: 20px !important;padding-bottom: 20px !important;}"]Combine seamlessly fitting layouts and components.[/pix_feature][pix_feature media_type="duo_icon" title_color="white" title_bold="font-weight-bold" title_secondary_font="secondary-font" content_size="text-18" content_color="light-opacity-5" pix_duo_icon="chart-pie" icon_color="gradient-primary" has_icon_bg="true" icon_bg_color="white" icon_size="36" padding_title="0px" padding_content="10px" icon_position="left" animation="fade-in-up" title="World-class Design" delay="600" css=".vc_custom_1591758999563{padding-top: 20px !important;padding-bottom: 20px !important;}"]Combine seamlessly fitting layouts and components.[/pix_feature][pix_button btn_text="Contact us for pricing" btn_target="true" btn_color="white" btn_text_color="heading-default" btn_size="md" btn_effect="2" btn_hover_effect="2" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="yes" btn_animation="fade-in-up" btn_link="#pix_section_pricing" btn_icon="pixicon-angle-right" btn_anim_delay="800" css=".vc_custom_1591761353463{margin-top: 40px !important;}"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'Contact center Agency', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/forms/agency-contact-center.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all forms contact';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" full_height="yes" content_placement="middle" video_bg="yes" video_bg_url="https://www.youtube.com/watch?v=rXXSoMphtBk&feature=youtu.be" pix_over_visibility="" pix_overlay_color="gray-9" pix_visibility="1" css=".vc_custom_1591764929248{padding-top: 100px !important;padding-bottom: 100px !important;background-color: #ffffff !important;}" b_custom_height="100px" pix_overlay_opacity="0.85" el_id="pix_section_contact"][vc_row content_placement="middle"][vc_column width="1/2" offset="vc_col-md-offset-3"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h2" text_color="white" css=".vc_custom_1591761821392{padding-top: 20px !important;}"]Contact us[/sliding-text][pix_text size="text-18" content_color="light-opacity-7" animation="fade-in-up" delay="900" css=".vc_custom_1591761814316{padding-bottom: 20px !important;}" max_width="500px"]This is just a simple text made for this unique and awesome template, you can replace it with any text.[/pix_text][contact-form-7 id="1566"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // original

    $data = array();
    $data['name'] = __( 'Contact simple page', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/forms/original-contact-simple-page-form.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all forms pages contact';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1593055661755{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_row css=".vc_custom_1588778387749{padding-bottom: 60px !important;}"][vc_column width="1/3"][content_box style="1" hover_effect="2" add_hover_effect="1" rounded_box="rounded-10" animation="fade-in-up" css=".vc_custom_1588770510770{padding: 20px !important;background-color: #ffffff !important;}"][pix_feature media_type="duo_icon" title_size="h6" title_bold="font-weight-bold" title_secondary_font="secondary-font" content_size="text-18" content_color="body-default" pix_duo_icon="active-call" has_icon_bg="true" icon_size="36" padding_title="10px" padding_content="" icon_position="left" animation="fade-in-up" title="Call us today" link="#"]+1 (811) 86 45 92[/pix_feature][/content_box][/vc_column][vc_column width="1/3"][content_box style="1" hover_effect="2" add_hover_effect="1" rounded_box="rounded-10" animation="fade-in-up" css=".vc_custom_1588770501226{padding: 20px !important;background-color: #ffffff !important;}"][pix_feature media_type="duo_icon" title_size="h6" title_bold="font-weight-bold" title_secondary_font="secondary-font" content_size="text-18" content_color="body-default" pix_duo_icon="mail-notification" has_icon_bg="true" icon_size="36" padding_title="10px" padding_content="" icon_position="left" animation="fade-in-up" title="Send an Email" link="#"]essentials@pixfort.com[/pix_feature][/content_box][/vc_column][vc_column width="1/3"][content_box style="1" hover_effect="2" add_hover_effect="1" rounded_box="rounded-10" animation="fade-in-up" css=".vc_custom_1588770501226{padding: 20px !important;background-color: #ffffff !important;}"][pix_feature media_type="duo_icon" title_size="h6" title_bold="font-weight-bold" title_secondary_font="secondary-font" content_size="text-18" content_color="body-default" pix_duo_icon="earth" has_icon_bg="true" icon_size="36" padding_title="10px" padding_content="" icon_position="left" animation="fade-in-up" title="Visit our HQ" link="#"]La Défense, Paris[/pix_feature][/content_box][/vc_column][/vc_row][vc_row][vc_column][pix_content_stack content_padding="pix-p-20" rounded_box="rounded-10" style="" hover_effect="" add_hover_effect="" img_style="" img_hover_effect="" img_add_hover_effect="" animation="fade-in-up" image="https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2020/05/contact-simple-image.jpg" css=".vc_custom_1589506617452{margin-left: -20px !important;}" delay="200"][content_box style="3" hover_effect="3" add_hover_effect="1" rounded_box="rounded-10" animation="fade-in-up" css=".vc_custom_1588771106043{padding-top: 40px !important;padding-right: 40px !important;padding-bottom: 40px !important;padding-left: 40px !important;background-color: #ffffff !important;}"][heading title_color="heading-default" title_size="h5" position="text-left" title="Send us a message" css=".vc_custom_1588766350964{padding-bottom: 10px !important;}"][pix_text content_color="body-default" css=".vc_custom_1588765929256{padding-bottom: 20px !important;}"]Contact us today using this form and our support team will reach out as soon as possible.[/pix_text][contact-form-7 id="2898"][/content_box][/pix_content_stack][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'Contact with map Contact extended page', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/forms/original-contact-extended-contact.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all forms contact';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" bottom_divider_select="8" b_1_is_gradient="true" b_1_color="#e9ecef" b_2_is_gradient="true" b_2_color="#f8f9fa" b_2_color_2="#f8f9fa" b_3_is_gradient="true" b_3_color="#eaecf7" css=".vc_custom_1593057898851{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;border-radius: 10px !important;}"][vc_row equal_height="yes"][vc_column width="7/12" css=".vc_custom_1588774172995{padding-top: 30px !important;}"][pix_badge bold="font-weight-bold" secondary_font="secondary-font" text_color="heading-default" bg_color="gray-1" style="" hover_effect="" add_hover_effect="" padding="" text="Made by pixfort team" css=".vc_custom_1588693505050{margin-bottom: 20px !important;padding-top: 9px !important;padding-right: 15px !important;padding-bottom: 9px !important;padding-left: 15px !important;}"][heading title_color="gradient-primary" title_size="h4" position="text-left" animation="slide-in-up" title="Meet our Friendly Support Team" css=".vc_custom_1588775662381{padding-bottom: 10px !important;}"][pix_text size="text-18" content_color="body-default" animation="fade-in-up" delay="400"]Get Essentials today and start building next-generation websites, create awesome pages with unlimited possibilities.[/pix_text][vc_row_inner css=".vc_custom_1588775874447{padding-top: 15px !important;padding-bottom: 30px !important;}"][vc_column_inner width="1/2"][pix_feature_list content_size="text-18" content_color="heading-default" icon_color="gradient-primary" features="%5B%7B%22text%22%3A%22Unlimited%20Possibilities%22%2C%22media_type%22%3A%22duo_icon%22%2C%22pix_duo_icon%22%3A%22thunder-move%22%7D%2C%7B%22text%22%3A%22wooCommerce%20Integration%22%2C%22media_type%22%3A%22duo_icon%22%2C%22pix_duo_icon%22%3A%22cart-1%22%7D%2C%7B%22text%22%3A%22Worldwide%20Services%22%2C%22media_type%22%3A%22duo_icon%22%2C%22pix_duo_icon%22%3A%22earth%22%7D%5D" flist_bold="font-weight-bold"][/vc_column_inner][vc_column_inner width="1/2"][pix_feature_list content_size="text-18" content_color="heading-default" icon_color="gradient-primary" features="%5B%7B%22text%22%3A%22pixfort%20Support%22%2C%22media_type%22%3A%22duo_icon%22%2C%22pix_duo_icon%22%3A%22chat-5%22%7D%2C%7B%22text%22%3A%22wooCommerce%20Integration%22%2C%22media_type%22%3A%22duo_icon%22%2C%22pix_duo_icon%22%3A%22smile%22%7D%2C%7B%22text%22%3A%22Worldwide%20Services%22%2C%22media_type%22%3A%22duo_icon%22%2C%22pix_duo_icon%22%3A%22shield-thunder%22%7D%5D" flist_bold="font-weight-bold"][/vc_column_inner][/vc_row_inner][pix_map map_zoom="15" animation="fade-in-up" style="3" hover_effect="" add_hover_effect="" map_height="map-md" marker="https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2020/02/marker-2.png" css=".vc_custom_1588775127795{border-radius: 10px !important;}"][/vc_column][vc_column width="5/12"][content_box style="3" hover_effect="" add_hover_effect="" rounded_box="rounded-10" animation="fade-in-up" css=".vc_custom_1588773345952{padding: 30px !important;background-color: #ffffff !important;}"][heading title_color="gradient-primary" title_size="h4" position="text-left" animation="slide-in-up" title="Send us a message" css=".vc_custom_1588774148725{padding-bottom: 10px !important;}"][pix_text size="text-18" content_color="body-default" css=".vc_custom_1588774243587{padding-bottom: 30px !important;}"]Contact us today and our friendly support team will reach out as soon as possible.[/pix_text][contact-form-7 id="2939"][/content_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // seo

    $data = array();
    $data['name'] = __( 'Contact form SEO', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/forms/seo-contact-page-contact-form.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all forms contact';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" responsive_css="{``pix_res_sm_pt``:``20``,``pix_res_sm_pb``:``20``,``pix_res_md_pt``:``40``,``pix_res_md_pb``:``40``}" css=".vc_custom_1604715535677{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}" el_id="pix_section_contact"][vc_row full_width="stretch_row" pix_particles_check="" css=".vc_custom_1604715416895{background-color: #ffffff !important;}"][vc_column width="1/3"][content_box style="" hover_effect="" add_hover_effect="" rounded_box="rounded-10" animation="" el_class="" css=".vc_custom_1604715294192{margin-bottom: 20px !important;border-top-width: 2px !important;border-right-width: 2px !important;border-bottom-width: 2px !important;border-left-width: 2px !important;padding-top: 50px !important;padding-right: 30px !important;padding-bottom: 50px !important;padding-left: 30px !important;border-left-style: solid !important;border-right-style: solid !important;border-top-style: solid !important;border-bottom-style: solid !important;}"][pix_feature media_type="duo_icon" title_bold="font-weight-bold" content_size="text-18" content_color="body-default" pix_duo_icon="marker-1" has_icon_bg="true" padding_content="10px" content_align="center" title="Address" element_id="1604460577044-faf42c53-487f"]La Défense, Paris, France[/pix_feature][/content_box][/vc_column][vc_column width="1/3"][content_box style="" hover_effect="" add_hover_effect="" rounded_box="rounded-10" animation="" el_class="" css=".vc_custom_1604715312657{margin-bottom: 20px !important;border-top-width: 2px !important;border-right-width: 2px !important;border-bottom-width: 2px !important;border-left-width: 2px !important;padding-top: 50px !important;padding-right: 30px !important;padding-bottom: 50px !important;padding-left: 30px !important;border-left-style: solid !important;border-right-style: solid !important;border-top-style: solid !important;border-bottom-style: solid !important;}"][pix_feature media_type="duo_icon" title_bold="font-weight-bold" content_size="text-18" content_color="body-default" pix_duo_icon="mail-@" has_icon_bg="true" padding_content="10px" content_align="center" title="Email" element_id="1604460577161-a75b8ffd-8478"]covid19@website.com[/pix_feature][/content_box][/vc_column][vc_column width="1/3"][content_box style="" hover_effect="" add_hover_effect="" rounded_box="rounded-10" animation="" el_class="" css=".vc_custom_1604715449221{margin-bottom: 20px !important;border-top-width: 2px !important;border-right-width: 2px !important;border-bottom-width: 2px !important;border-left-width: 2px !important;padding-top: 50px !important;padding-right: 30px !important;padding-bottom: 50px !important;padding-left: 30px !important;border-left-style: solid !important;border-right-style: solid !important;border-top-style: solid !important;border-bottom-style: solid !important;}"][pix_feature media_type="duo_icon" title_bold="font-weight-bold" content_size="text-18" content_color="body-default" pix_duo_icon="active-call" has_icon_bg="true" padding_content="10px" content_align="center" title="Phone" element_id="1604460577274-f605cd73-e5f3"]+06 48 48 87 40[/pix_feature][/content_box][/vc_column][/vc_row][vc_row equal_height="yes" pix_particles_check="" css=".vc_custom_1604461320159{padding-top: 40px !important;}"][vc_column width="1/2" css=".vc_custom_1604461408957{padding-top: 50px !important;}"][pix_highlighted_text items="%5B%7B%22text%22%3A%22Frequently%22%2C%22is_highlighted%22%3A%22true%22%2C%22highlight_color%22%3A%22%23ffd900%22%2C%22heading_font%22%3A%22heading-font%22%7D%2C%7B%22text%22%3A%22%20Asked%20Questions%22%2C%22highlight_color%22%3A%22%23ffd900%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%7D%5D" title_size="h3" position="text-left" heading_id="1604460791559-ae77a250-7e25" css=".vc_custom_1604461232311{padding-top: 20px !important;padding-bottom: 20px !important;}"][pix_text size="text-20" content_color="body-default" animation="fade-in-up" max_width="600px" delay="100" css=".vc_custom_1604461271271{padding-bottom: 20px !important;}"]Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum industry's standard.[/pix_text][pix_accordion accordion_id="1590709472675-f4008e87-9d5b"][pix_accordion_tab title="How long does my license/seats last for?" bold="font-weight-bold" media_type="duo_icon" pix_duo_icon="clipboard-check" icon_color="gradient-primary" is_open="yes" tab_id="1590709472686-eb19bb6a-ed3f"][pix_text content_color="body-default" animation="fade-in-up" max_width="600px" delay="1000"]Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard.[/pix_text][/pix_accordion_tab][pix_accordion_tab title="Can I build one page website?" bold="font-weight-bold" media_type="duo_icon" pix_duo_icon="chart-pie" icon_color="gradient-primary" is_open="" tab_id="1590709577267-a3f17367-0562"][pix_text content_color="body-default" animation="fade-in-up" max_width="600px" delay="1000"]Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard.[/pix_text][/pix_accordion_tab][pix_accordion_tab title="Is there free WordPress support?" bold="font-weight-bold" media_type="duo_icon" pix_duo_icon="group-chat" icon_color="gradient-primary" is_open="" tab_id="1590709628460-e48f739e-ddc8"][pix_text content_color="body-default" animation="fade-in-up" max_width="600px" delay="1000"]Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard.[/pix_text][/pix_accordion_tab][pix_accordion_tab title="How does it cost for support?" bold="font-weight-bold" media_type="duo_icon" pix_duo_icon="group-chat" icon_color="gradient-primary" is_open="" tab_id="1591491380104-40aa8227-780e"][pix_text content_color="body-default" animation="fade-in-up" max_width="600px" delay="1000"]Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard.[/pix_text][/pix_accordion_tab][/pix_accordion][/vc_column][vc_column width="1/2" css=".vc_custom_1592323090921{padding-top: 20px !important;padding-bottom: 20px !important;}"][pix_badge bold="font-weight-bold" secondary_font="" text_color="white" bg_color="primary" style="" hover_effect="" add_hover_effect="" animation="fade-in-up" element_div="text-left" padding="" text="24/7 Online Support" css=".vc_custom_1592344891028{padding-top: 7px !important;padding-right: 12px !important;padding-bottom: 7px !important;padding-left: 12px !important;}"][heading title_color="heading-default" title_size="h3" position="text-left" animation="fade-in-up" content_color="body-default" title="Book an appointment" css=".vc_custom_1604461424267{padding-top: 20px !important;padding-bottom: 20px !important;}"][contact-form-7 id="2939"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // company

    $data = array();
    $data['name'] = __( 'Contact form with map Company', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/forms/company-contact-page-form.jpg', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all forms contact';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" content_placement="middle" pix_over_visibility="" top_divider_select="8" top_layers="1" responsive_css="{``pix_res_sm_pt``:``20``,``pix_res_sm_pb``:``20``,``pix_res_md_pt``:``40``,``pix_res_md_pb``:``40``}" css=".vc_custom_1617584888473{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;border-radius: 20px !important;}" el_id="pix_section_about" section_name="About"][vc_row content_placement="middle" pix_particles_check=""][vc_column width="1/2"][heading title_color="heading-default" title_size="h3" position="text-left" content_color="body-default" title="Book an appointment" css=".vc_custom_1613618646389{padding-top: 20px !important;padding-bottom: 10px !important;}"][pix_text size="text-20" content_color="body-default" max_width="600px" css=".vc_custom_1613516449778{padding-bottom: 20px !important;}"]Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum industry's standard.[/pix_text][contact-form-7 id="1566"][/vc_column][vc_column width="1/2" responsive_css="{``pix_res_sm_pt``:``30``,``pix_res_md_pt``:``30``}"][content_box style="1" hover_effect="2" add_hover_effect="1" rounded_box="rounded-10" animation="" pix_particles_check="1" pix_particles="%5B%7B%22h_position%22%3A%22right%22%2C%22horizontal%22%3A%22-20px%22%2C%22v_position%22%3A%22top%22%2C%22vertical%22%3A%22-10px%22%2C%22pix_particles_type%22%3A%22scroll_parallax%22%2C%22pix_particles_type_2%22%3A%22mouse_parallax%22%2C%22pix_particles_type_3%22%3A%22scroll_rotate%22%2C%22depth%22%3A%220.2%22%2C%22xaxis%22%3A%22-10%22%2C%22yaxis%22%3A%220%22%2C%22rotation_speed%22%3A%22300%22%2C%22pix_inverse_rotation%22%3A%22scroll_inverse%22%2C%22img_width%22%3A%22160px%22%2C%22animation%22%3A%22fade-in-left%22%2C%22delay%22%3A%22400%22%2C%22pix_infinite_speed%22%3A%22pix-duration-fast%22%2C%22hide%22%3A%22true%22%7D%5D" overflow="overflow-hidden" css=".vc_custom_1613618133533{margin-bottom: 30px !important;background-color: #ffffff !important;}"][vc_gmaps link="#E-8_JTNDaWZyYW1lJTIwc3JjJTNEJTIyaHR0cHMlM0ElMkYlMkZ3d3cuZ29vZ2xlLmNvbSUyRm1hcHMlMkZlbWJlZCUzRnBiJTNEJTIxMW0xOCUyMTFtMTIlMjExbTMlMjExZDgzMjMuMjE4NjgxNjM1OTY4JTIxMmQyLjI5MDA5MTQwNjQ1MDA2MTUlMjEzZDQ4Ljg2NDMwNTYwNTIwNzg3JTIxMm0zJTIxMWYwJTIxMmYwJTIxM2YwJTIxM20yJTIxMWkxMDI0JTIxMmk3NjglMjE0ZjEzLjElMjEzbTMlMjExbTIlMjExczB4NDdlNjZmZmIyMmFmZDRhNyUyNTNBMHhkYTZiMDM5NTEwYTM1YjU2JTIxMnNDaGFpbGxvdCUyNTJDJTI1MjBQYXJpcyUyMTVlMCUyMTNtMiUyMTFzZW4lMjEyc2ZyJTIxNHYxNjEzNjE3OTYyNTI2JTIxNW0yJTIxMXNlbiUyMTJzZnIlMjIlMjB3aWR0aCUzRCUyMjgwMCUyMiUyMGhlaWdodCUzRCUyMjYwMCUyMiUyMGZyYW1lYm9yZGVyJTNEJTIyMCUyMiUyMHN0eWxlJTNEJTIyYm9yZGVyJTNBMCUzQiUyMiUyMGFsbG93ZnVsbHNjcmVlbiUzRCUyMiUyMiUyMGFyaWEtaGlkZGVuJTNEJTIyZmFsc2UlMjIlMjB0YWJpbmRleCUzRCUyMjAlMjIlM0UlM0MlMkZpZnJhbWUlM0U=" css=".vc_custom_1614219480881{margin-bottom: 0px !important;}"][/content_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);


    return $templates;
}




 ?>
