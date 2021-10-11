<?php




function pix_templates_clients(){
    $templates = array();

    // Startup

    $data = array();
    $data['name'] = __( 'Clients Startup', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/clients/startup-clients.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all clients';
    $data['content']  = <<<CONTENT
[vc_row css=".vc_custom_1589753640945{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_column offset="vc_col-md-offset-2 vc_col-md-8"][pix_text size="text-sm" bold="font-weight-bold" content_color="body-default" position="text-center" animation="fade-in-up" delay="1200"]Join over +15,000 happy clients![/pix_text][clients in_row="2" clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/startup/wp-content/uploads/sites/5/2019/05/intercom.png%22%2C%22title%22%3A%22Paypal%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/startup/wp-content/uploads/sites/5/2019/05/pixfort.png%22%2C%22title%22%3A%22Paypal%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/startup/wp-content/uploads/sites/5/2019/05/netflix.png%22%2C%22title%22%3A%22Paypal%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/startup/wp-content/uploads/sites/5/2019/05/square.png%22%2C%22title%22%3A%22Paypal%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/startup/wp-content/uploads/sites/5/2019/05/paypal.png%22%2C%22title%22%3A%22Paypal%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/startup/wp-content/uploads/sites/5/2019/05/mailchimp.png%22%2C%22title%22%3A%22Paypal%22%2C%22link%22%3A%22%23%22%7D%5D" add_hover_effect="1" style="client" animation="fade-in-up" delay_items="yes" css=".vc_custom_1589595549802{padding-top: 10px !important;padding-bottom: 30px !important;}"][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // Software

    $data = array();
    $data['name'] = __( 'Clients Software', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/clients/software-clients.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all clients';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_visibility="1" css=".vc_custom_1589908179048{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_row content_placement="middle"][vc_column content_align="text-center"][heading title_color="body-default" title_size="h6" animation="fade-in-left" secondary_font="secondary-font" title="Trusted by over 2,000 of the world’s leading companies" delay="400" css=".vc_custom_1561773924250{padding-bottom: 30px !important;}"][content_box style="" hover_effect="" add_hover_effect="" rounded_box="rounded-10" animation="fade-in-up" css=".vc_custom_1589839877849{border-top-width: 1px !important;border-right-width: 1px !important;border-bottom-width: 1px !important;border-left-width: 1px !important;padding-top: 20px !important;padding-right: 40px !important;padding-bottom: 20px !important;padding-left: 40px !important;background-color: #ffffff !important;border-left-color: #e9ecef !important;border-left-style: solid !important;border-right-color: #e9ecef !important;border-right-style: solid !important;border-top-color: #e9ecef !important;border-top-style: solid !important;border-bottom-color: #e9ecef !important;border-bottom-style: solid !important;}"][clients clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/software/wp-content/uploads/sites/2/2019/06/slack-colored.png%22%2C%22title%22%3A%22Slack%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/software/wp-content/uploads/sites/2/2019/06/netflix-colored.png%22%2C%22title%22%3A%22Netflix%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/software/wp-content/uploads/sites/2/2019/06/spotify-colored.png%22%2C%22title%22%3A%22Spotify%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/software/wp-content/uploads/sites/2/2019/06/booking-colored.png%22%2C%22title%22%3A%22Booking%22%2C%22link%22%3A%22%23%22%7D%5D" add_hover_effect="1" style="client" animation="fade-in" delay_items="yes" css=".vc_custom_1589829293829{margin-bottom: 0px !important;}"][/content_box][/vc_column][/vc_row][/vc_section]
CONTENT;

        array_push($templates, $data);

    // crypto

    $data = array();
    $data['name'] = __( 'Clients carousel Crypto', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/clients/crypto-clients-carousel.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all clients';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" css=".vc_custom_1590712187075{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row css=".vc_custom_1590719860766{padding-bottom: 20px !important;}"][vc_column][pix_badge bold="font-weight-bold" secondary_font="" text_color="heading-default" bg_color="gray-1" style="" hover_effect="" add_hover_effect="" animation="fade-in-left" element_div="text-center" padding="" text="+15.000 Companies Trusted Essentials" css=".vc_custom_1590714960118{border-top-width: 2px !important;border-right-width: 2px !important;border-bottom-width: 2px !important;border-left-width: 2px !important;padding-top: 7px !important;padding-right: 12px !important;padding-bottom: 7px !important;padding-left: 12px !important;border-left-color: #e9ecef !important;border-right-color: #e9ecef !important;border-top-color: #e9ecef !important;border-bottom-color: #e9ecef !important;}" delay="600"][/vc_column][/vc_row][vc_row css=".vc_custom_1590719794005{padding-bottom: 20px !important;}"][vc_column][clients_slider clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/cryptocurrency/wp-content/uploads/sites/12/2020/05/google.png%22%2C%22title%22%3A%22google%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/cryptocurrency/wp-content/uploads/sites/12/2020/05/apple.png%22%2C%22title%22%3A%22apple%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/cryptocurrency/wp-content/uploads/sites/12/2020/05/pixfort.png%22%2C%22title%22%3A%22pixfort%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/cryptocurrency/wp-content/uploads/sites/12/2020/05/nike.png%22%2C%22title%22%3A%22nike%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/cryptocurrency/wp-content/uploads/sites/12/2020/05/spotify.png%22%2C%22title%22%3A%22spotify%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/cryptocurrency/wp-content/uploads/sites/12/2020/05/sncf.png%22%2C%22title%22%3A%22sncf%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/cryptocurrency/wp-content/uploads/sites/12/2020/05/twitter.png%22%2C%22title%22%3A%22twitter%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/cryptocurrency/wp-content/uploads/sites/12/2020/05/dior.png%22%2C%22title%22%3A%22dior%22%7D%5D" add_hover_effect="1" slider_num="5" slider_style="pix-style-standard" slider_effect="pix-effect-standard" prevnextbuttons="1" pagedots="1" freescroll="" cellalign="left" slider_scale="" autoplay="" adaptiveheight="true" righttoleft="" slider_wrap="true" visible_y="pix-overflow-y-visible" visible_overflow="pix-overflow-all-visible"][/vc_column][/vc_row][/vc_section]
CONTENT;

        array_push($templates, $data);

    // event

    $data = array();
    $data['name'] = __( 'Clients right Event', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/clients/event-clients-right.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all clients';
    $data['content']  = <<<CONTENT
[vc_row content_placement="middle" css=".vc_custom_1590811762023{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_column width="1/3"][pix_text size="text-24" bold="font-weight-bold" secondary_font="secondary-font" content_color="heading-default" animation="fade-in-up" css=".vc_custom_1590461484591{padding-top: 10px !important;}"]Join over +15,000 clients![/pix_text][pix_text size="text-18" content_color="body-default" animation="fade-in-up" delay="200"]Combine seamlessly fitting layouts, customize everything you want.[/pix_text][pix_button btn_text="Join the event" btn_style="underline" btn_remove_padding="no-padding" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="yes" btn_animation="fade-in-up" btn_icon="pixicon-angle-right" btn_anim_delay="400" css=".vc_custom_1590469271654{margin-top: 10px !important;}" btn_link="#pix_section_pricing"][/vc_column][vc_column width="2/3"][clients in_row="4" clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/event/wp-content/uploads/sites/9/2020/05/dior.png%22%2C%22title%22%3A%22dior%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/event/wp-content/uploads/sites/9/2020/05/apple.png%22%2C%22title%22%3A%22apple%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/event/wp-content/uploads/sites/9/2020/05/google.png%22%2C%22title%22%3A%22google%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/event/wp-content/uploads/sites/9/2020/05/pixfort.png%22%2C%22title%22%3A%22pixfort%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/event/wp-content/uploads/sites/9/2020/05/sncf.png%22%2C%22title%22%3A%22sncf%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/event/wp-content/uploads/sites/9/2020/05/spotify.png%22%2C%22title%22%3A%22spotify%22%2C%22link%22%3A%22%23%22%7D%5D" add_hover_effect="1" style="client" animation="fade-in-up" delay_items="yes" css=".vc_custom_1590460288834{padding-top: 10px !important;padding-bottom: 30px !important;}"][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'Clients left Event', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/clients/event-clients-left.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all clients';
    $data['content']  = <<<CONTENT
[vc_row content_placement="middle" css=".vc_custom_1590811762023{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_column width="2/3"][clients in_row="4" clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/event/wp-content/uploads/sites/9/2020/05/dior.png%22%2C%22title%22%3A%22dior%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/event/wp-content/uploads/sites/9/2020/05/apple.png%22%2C%22title%22%3A%22apple%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/event/wp-content/uploads/sites/9/2020/05/google.png%22%2C%22title%22%3A%22google%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/event/wp-content/uploads/sites/9/2020/05/pixfort.png%22%2C%22title%22%3A%22pixfort%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/event/wp-content/uploads/sites/9/2020/05/sncf.png%22%2C%22title%22%3A%22sncf%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/event/wp-content/uploads/sites/9/2020/05/spotify.png%22%2C%22title%22%3A%22spotify%22%2C%22link%22%3A%22%23%22%7D%5D" add_hover_effect="1" style="client" animation="fade-in-up" delay_items="yes" css=".vc_custom_1590460288834{padding-top: 10px !important;padding-bottom: 30px !important;}"][/vc_column][vc_column width="1/3"][pix_text size="text-24" bold="font-weight-bold" secondary_font="secondary-font" content_color="heading-default" animation="fade-in-up" css=".vc_custom_1590461484591{padding-top: 10px !important;}"]Join over +15,000 clients![/pix_text][pix_text size="text-18" content_color="body-default" animation="fade-in-up" delay="200"]Combine seamlessly fitting layouts, customize everything you want.[/pix_text][pix_button btn_text="Join the event" btn_style="underline" btn_remove_padding="no-padding" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="yes" btn_animation="fade-in-up" btn_icon="pixicon-angle-right" btn_anim_delay="400" css=".vc_custom_1590469271654{margin-top: 10px !important;}" btn_link="#pix_section_pricing"][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // marketing

    $data = array();
    $data['name'] = __( 'Clients Marketing', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/clients/marketing-clients.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all clients';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592491203204{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row][vc_column][pix_text size="text-sm" bold="font-weight-bold" content_color="body-default" position="text-center" animation="fade-in-up" delay="400"]Join over +15,000 happy clients![/pix_text][clients in_row="2" clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/marketing/wp-content/uploads/sites/6/2020/05/dior.png%22%2C%22title%22%3A%22Dior%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/marketing/wp-content/uploads/sites/6/2020/05/spotify.png%22%2C%22title%22%3A%22spotify%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/marketing/wp-content/uploads/sites/6/2020/05/apple.png%22%2C%22title%22%3A%22apple%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/marketing/wp-content/uploads/sites/6/2020/05/pixfort.png%22%2C%22title%22%3A%22pixfort%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/marketing/wp-content/uploads/sites/6/2020/05/sncf.png%22%2C%22title%22%3A%22sncf%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/marketing/wp-content/uploads/sites/6/2020/05/google.png%22%2C%22title%22%3A%22google%22%2C%22link%22%3A%22%23%22%7D%5D" add_hover_effect="1" style="client" animation="fade-in-up" delay_items="yes" css=".vc_custom_1590186129451{padding-bottom: 30px !important;}"][pix_button btn_text="Acquire new customers" btn_target="true" btn_style="blink" btn_color="gray-1" btn_text_color="heading-default" btn_size="lg" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" btn_div="text-center" btn_link="https://pixfort.website/redirect?to=essentials" btn_icon="pixicon-users-2" css=".vc_custom_1590184934667{border-top-width: 1px !important;border-right-width: 1px !important;border-bottom-width: 1px !important;border-left-width: 1px !important;border-left-color: rgba(10,9,9,0.08) !important;border-left-style: solid !important;border-right-color: rgba(10,9,9,0.08) !important;border-right-style: solid !important;border-top-color: rgba(10,9,9,0.08) !important;border-top-style: solid !important;border-bottom-color: rgba(10,9,9,0.08) !important;border-bottom-style: solid !important;border-radius: 10px !important;}"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // landing

    $data = array();
    $data['name'] = __( 'Clients Landing', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/clients/landing-clients.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all clients';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592528502299{border-top-width: 1px !important;border-bottom-width: 1px !important;padding-top: 120px !important;padding-bottom: 120px !important;background-color: #ffffff !important;border-top-color: rgba(0,0,0,0.08) !important;border-top-style: solid !important;border-bottom-color: rgba(0,0,0,0.08) !important;border-bottom-style: solid !important;}"][vc_row][vc_column content_align="text-center" offset="vc_col-md-offset-2 vc_col-md-8"][content_box style="" hover_effect="" add_hover_effect="" rounded_box="rounded-custom" animation="fade-in-left" content_align="text-left" content_inline="1" el_class="" css=".vc_custom_1591157311589{padding-top: 5px !important;padding-right: 5px !important;padding-bottom: 5px !important;padding-left: 5px !important;background-color: rgba(10,10,10,0.08) !important;*background-color: rgb(10,10,10) !important;border-radius: 20px !important;}"][pix_badge bold="font-weight-bold" secondary_font="" rounded="badge-pill" text_color="white" bg_color="secondary" style="" hover_effect="" add_hover_effect="" padding="" text="+15.000 Startups" css=".vc_custom_1592438149149{padding-top: 7px !important;padding-right: 12px !important;padding-bottom: 7px !important;padding-left: 12px !important;}"][pix_badge bold="font-weight-bold" secondary_font="" rounded="badge-pill" text_color="dark-opacity-5" bg_color="transparent" style="" hover_effect="" add_hover_effect="" padding="" text="You are in good company" css=".vc_custom_1592438031259{padding-top: 7px !important;padding-right: 5px !important;padding-bottom: 7px !important;padding-left: 5px !important;}"][/content_box][clients clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/landing/wp-content/uploads/sites/16/2020/06/houzz.png%22%2C%22title%22%3A%22houzz%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/landing/wp-content/uploads/sites/16/2020/06/uber.png%22%2C%22title%22%3A%22uber%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/landing/wp-content/uploads/sites/16/2020/06/eventbrite.png%22%2C%22title%22%3A%22eventbrite%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/landing/wp-content/uploads/sites/16/2020/06/stripe.png%22%2C%22title%22%3A%22stripe%22%2C%22link%22%3A%22%23%22%7D%5D" add_hover_effect="1" style="client" animation="fade-in-up" delay_items="yes" delay="600" css=".vc_custom_1592438128289{padding-top: 20px !important;}"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // restaurant

    $data = array();
    $data['name'] = __( 'Clients Restaurant', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/clients/restaurant-clients.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all clients';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" content_placement="middle" pix_over_visibility="" css=".vc_custom_1592608250795{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #f8f9fa !important;}" fade_in_intro="https://essentials.pixfort.com/restaurant/wp-content/uploads/sites/17/2020/06/intro-bg.jpg" b_custom_height="120px"][vc_row full_width="stretch_row"][vc_column content_align="text-center" offset="vc_col-md-offset-1 vc_col-md-10"][clients clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/restaurant/wp-content/uploads/sites/17/2020/06/mc.png%22%2C%22title%22%3A%22pepsi%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/restaurant/wp-content/uploads/sites/17/2020/06/pepsi.png%22%2C%22title%22%3A%22pepsi%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/restaurant/wp-content/uploads/sites/17/2020/06/burger.png%22%2C%22title%22%3A%22pepsi%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/restaurant/wp-content/uploads/sites/17/2020/06/cola.png%22%2C%22title%22%3A%22pepsi%22%2C%22link%22%3A%22%23%22%7D%5D" add_hover_effect="1" style="client" animation="fade-in-up" delay_items="yes" delay="600"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // ecommerce

    $data = array();
    $data['name'] = __( 'Clients carousel Ecommerce', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/clients/ecommerce-clients.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all clients';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" fade_in_opacity="pix-opacity-3" pix_over_visibility="" pix_overlay_color="gray-8" css=".vc_custom_1591246229625{padding-top: 120px !important;padding-bottom: 120px !important;}" fade_in_intro="https://essentials.pixfort.com/ecommerce/wp-content/uploads/sites/18/2020/06/image-intro-1.jpg"][vc_row][vc_column][pix_text size="text-18" bold="font-weight-bold" secondary_font="secondary-font" content_color="light-opacity-7" position="text-center" animation="fade-in-up" delay="600" css=".vc_custom_1591246265835{padding-bottom: 20px !important;}"]Trusted by over 2,000 of the world’s leading companies[/pix_text][content_box style="6" hover_effect="" add_hover_effect="" animation="" css=".vc_custom_1591246166341{padding: 40px !important;background-color: #ffffff !important;}"][clients_slider clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/ecommerce/wp-content/uploads/sites/18/2020/06/google.png%22%2C%22title%22%3A%22google%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/ecommerce/wp-content/uploads/sites/18/2020/06/apple.png%22%2C%22title%22%3A%22apple%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/ecommerce/wp-content/uploads/sites/18/2020/06/pixfort.png%22%2C%22title%22%3A%22pixfort%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/ecommerce/wp-content/uploads/sites/18/2020/06/nike.png%22%2C%22title%22%3A%22nike%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/ecommerce/wp-content/uploads/sites/18/2020/06/spotify.png%22%2C%22title%22%3A%22spotify%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/ecommerce/wp-content/uploads/sites/18/2020/06/sncf.png%22%2C%22title%22%3A%22sncf%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/ecommerce/wp-content/uploads/sites/18/2020/06/twitter.png%22%2C%22title%22%3A%22twitter%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/ecommerce/wp-content/uploads/sites/18/2020/06/dior.png%22%2C%22title%22%3A%22dior%22%7D%5D" add_hover_effect="1" style="client" animation="fade-in" delay_items="yes" slider_num="5" slider_style="pix-style-standard" slider_effect="pix-fade-out-effect" prevnextbuttons="" pagedots="" freescroll="" cellalign="left" slider_scale="" autoplay="" adaptiveheight="true" righttoleft="" slider_wrap="true" visible_y="pix-overflow-y-visible" visible_overflow="pix-overflow-all-visible"][/content_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // foundation

    $data = array();
    $data['name'] = __( 'Clients carousel Foundation', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/clients/foundation-clients.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all clients';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_bg_grdient="bg-gradient-primary" fade_in_opacity="pix-opacity-1" pix_over_visibility="" css=".vc_custom_1592346879467{padding-top: 100px !important;padding-bottom: 100px !important;}" fade_in_intro="https://essentials.pixfort.com/foundation/wp-content/uploads/sites/19/2020/06/image-bg-2.jpg"][vc_row full_width="stretch_row"][vc_column][pix_badge bold="font-weight-bold" secondary_font="" text_color="white" bg_color="dark-opacity-3" style="" hover_effect="" add_hover_effect="" animation="fade-in-left" element_div="text-center" padding="" text="+15.000 Companies" css=".vc_custom_1592348658470{border-top-width: 2px !important;border-right-width: 2px !important;border-bottom-width: 2px !important;border-left-width: 2px !important;padding-top: 7px !important;padding-right: 12px !important;padding-bottom: 7px !important;padding-left: 12px !important;border-left-color: #e9ecef !important;border-right-color: #e9ecef !important;border-top-color: #e9ecef !important;border-bottom-color: #e9ecef !important;}" delay="600"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="white" css=".vc_custom_1591077800981{padding-top: 20px !important;}"]Join The Force of Change[/sliding-text][pix_text size="text-20" content_color="light-opacity-7" position="text-center" animation="fade-in-up" max_width="500px" delay="1000"]Be ready to use the next generation of WordPress themes. Be ready to met Essentials by pixfort.[/pix_text][clients_slider clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/foundation/wp-content/uploads/sites/19/2020/06/google-white.png%22%2C%22title%22%3A%22google%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/foundation/wp-content/uploads/sites/19/2020/06/carrefour-white.png%22%2C%22title%22%3A%22carrefour%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/foundation/wp-content/uploads/sites/19/2020/06/pixfort-white.png%22%2C%22title%22%3A%22pixfort%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/foundation/wp-content/uploads/sites/19/2020/06/nike-white.png%22%2C%22title%22%3A%22nike%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/foundation/wp-content/uploads/sites/19/2020/06/spotify-white.png%22%2C%22title%22%3A%22spotify%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/foundation/wp-content/uploads/sites/19/2020/06/netflix-white.png%22%2C%22title%22%3A%22netflix%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/foundation/wp-content/uploads/sites/19/2020/06/airbnb-white.png%22%2C%22title%22%3A%22Airbnb%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/foundation/wp-content/uploads/sites/19/2020/06/adidas-white.png%22%2C%22title%22%3A%22adidas%22%7D%5D" add_hover_effect="1" slider_num="5" slider_style="pix-style-standard" slider_effect="pix-circular-slider" prevnextbuttons="1" pagedots="1" dots_style="light-dots" freescroll="" cellalign="left" slider_scale="" autoplay="" adaptiveheight="true" righttoleft="" slider_wrap="true" visible_y="pix-overflow-y-visible" visible_overflow="pix-overflow-all-visible" css=".vc_custom_1592325275306{padding-top: 20px !important;}"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // construction

    $data = array();
    $data['name'] = __( 'Clients Construction', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/clients/construction-clients.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all clients';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" pix_visibility="1" css=".vc_custom_1592668318413{padding-top: 60px !important;padding-bottom: 60px !important;background-color: #f8f9fa !important;}"][vc_row content_placement="middle"][vc_column width="1/3" content_align="text-center"][heading title_color="body-default" title_size="h6" position="text-left" animation="fade-in-left" secondary_font="secondary-font" title="Trusted by over 2,000 of the world’s leading construction companies" delay="400"][/vc_column][vc_column width="2/3"][content_box style="" hover_effect="" add_hover_effect="" rounded_box="rounded-10" animation="fade-in-up" css=".vc_custom_1589839877849{border-top-width: 1px !important;border-right-width: 1px !important;border-bottom-width: 1px !important;border-left-width: 1px !important;padding-top: 20px !important;padding-right: 40px !important;padding-bottom: 20px !important;padding-left: 40px !important;background-color: #ffffff !important;border-left-color: #e9ecef !important;border-left-style: solid !important;border-right-color: #e9ecef !important;border-right-style: solid !important;border-top-color: #e9ecef !important;border-top-style: solid !important;border-bottom-color: #e9ecef !important;border-bottom-style: solid !important;}"][clients clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/construction/wp-content/uploads/sites/20/2020/06/vinci.png%22%2C%22title%22%3A%22vinci%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/construction/wp-content/uploads/sites/20/2020/06/total.png%22%2C%22title%22%3A%22total%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/construction/wp-content/uploads/sites/20/2020/06/sncf.png%22%2C%22title%22%3A%22sncf%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/construction/wp-content/uploads/sites/20/2020/06/eiffage.png%22%2C%22title%22%3A%22eiffage%22%2C%22link%22%3A%22%23%22%7D%5D" add_hover_effect="1" style="client" animation="fade-in" delay_items="yes" css=".vc_custom_1591148317430{margin-bottom: 0px !important;}"][/content_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // corporate

    $data = array();
    $data['name'] = __( 'Clients Corporate', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/clients/corporate-clients.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all clients';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592707180783{padding-top: 10px !important;padding-bottom: 10px !important;background-color: #ffffff !important;}"][vc_row][vc_column][clients in_row="2" clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/corporate/wp-content/uploads/sites/22/2020/06/lime.png%22%2C%22title%22%3A%22lime%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/corporate/wp-content/uploads/sites/22/2020/06/uber.png%22%2C%22title%22%3A%22uber%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/corporate/wp-content/uploads/sites/22/2020/06/discord.png%22%2C%22title%22%3A%22discord%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/corporate/wp-content/uploads/sites/22/2020/06/houzz.png%22%2C%22title%22%3A%22houzz%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/corporate/wp-content/uploads/sites/22/2020/06/stripe.png%22%2C%22title%22%3A%22stripe%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/corporate/wp-content/uploads/sites/22/2020/06/eventbrite.png%22%2C%22title%22%3A%22eventbrite%22%2C%22link%22%3A%22%23%22%7D%5D" add_hover_effect="1" style="client" animation="fade-in-up" delay_items="yes" css=".vc_custom_1592308912781{padding-top: 10px !important;padding-bottom: 10px !important;}"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // product

    $data = array();
    $data['name'] = __( 'Clients product', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/clients/product-clients.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all clients';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_scale_in="pix-scale-in-sm" pix_over_visibility="" css=".vc_custom_1591436944552{padding-top: 100px !important;padding-bottom: 100px !important;background-color: #212529 !important;}"][vc_row css=".vc_custom_1591423000803{padding-top: 60px !important;}"][vc_column content_align="text-center" offset="vc_col-md-offset-1 vc_col-md-10"][pix_numbers numbers_style="numbers-stack" duration="1500" title_color="white" title_size="h1" title_display="display-1" content_position="text-center" text_before="+" number="15000" css=".vc_custom_1591434251163{padding-bottom: 20px !important;}"][/pix_numbers][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" text_color="gradient-primary" css=".vc_custom_1591432028918{padding-bottom: 40px !important;}"]Great companies and small business trust pixfort services[/sliding-text][heading title_color="light-opacity-7" title_size="h6" animation="fade-in-left" secondary_font="secondary-font" title="Trusted by over 2,000 of the world’s leading companies" delay="400" css=".vc_custom_1591432007430{padding-bottom: 30px !important;}"][clients clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/product/wp-content/uploads/sites/23/2020/06/google-white.png%22%2C%22title%22%3A%22google%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/product/wp-content/uploads/sites/23/2020/06/pixfort-white.png%22%2C%22title%22%3A%22pixfort%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/product/wp-content/uploads/sites/23/2020/06/spotify-white.png%22%2C%22title%22%3A%22Spotify%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/product/wp-content/uploads/sites/23/2020/06/netflix-white.png%22%2C%22title%22%3A%22netflix%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/product/wp-content/uploads/sites/23/2020/06/airbnb-white.png%22%2C%22title%22%3A%22Airbnb%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/product/wp-content/uploads/sites/23/2020/06/nike-white.png%22%2C%22title%22%3A%22nike%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/product/wp-content/uploads/sites/23/2020/06/carrefour-white.png%22%2C%22title%22%3A%22carrefour%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/product/wp-content/uploads/sites/23/2020/06/adidas-white.png%22%2C%22title%22%3A%22adidas%22%2C%22link%22%3A%22%23%22%7D%5D" add_hover_effect="1" style="client" animation="fade-in" delay_items="yes" css=".vc_custom_1591431664407{margin-bottom: 40px !important;}"][pix_button btn_text="Create an account" btn_size="lg" btn_effect="1" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" btn_animation="fade-in-left" btn_icon="pixicon-user-3" btn_link="https://pixfort.website/redirect?to=essentials" btn_anim_delay="1000"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // influencer

    $data = array();
    $data['name'] = __( 'Clients right Influencer', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/clients/influencer-clients-right.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all clients';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" pix_visibility="1" css=".vc_custom_1592838902281{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row content_placement="middle"][vc_column width="1/2"][pix_icon media_type="char" char="😎" has_icon_bg="true" icon_bg_color="gradient-primary-light" icon_size="48" style="" hover_effect="" add_hover_effect=""][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h4" text_color="gradient-primary" css=".vc_custom_1591575874792{padding-top: 20px !important;}"]Brands I worked with[/sliding-text][pix_text size="text-18" content_color="body-default" animation="fade-in-up" delay="600" css=".vc_custom_1591575884982{padding-top: 10px !important;}"]Combine seamlessly fitting layouts, customize everything you want, switch components on the go using our page builder.[/pix_text][pix_button btn_text="Contact me for collaboration" btn_color="primary-light" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" btn_div="text-left" btn_link="https://pixfort.website/redirect?to=essentials" btn_icon="pixicon-email-1" css=".vc_custom_1591576504776{margin-top: 20px !important;}"][/vc_column][vc_column width="1/2"][content_box style="" hover_effect="" add_hover_effect="" rounded_box="rounded-10" animation="fade-in-up" css=".vc_custom_1589839877849{border-top-width: 1px !important;border-right-width: 1px !important;border-bottom-width: 1px !important;border-left-width: 1px !important;padding-top: 20px !important;padding-right: 40px !important;padding-bottom: 20px !important;padding-left: 40px !important;background-color: #ffffff !important;border-left-color: #e9ecef !important;border-left-style: solid !important;border-right-color: #e9ecef !important;border-right-style: solid !important;border-top-color: #e9ecef !important;border-top-style: solid !important;border-bottom-color: #e9ecef !important;border-bottom-style: solid !important;}"][clients in_row="6" clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/influencer/wp-content/uploads/sites/26/2020/06/slack-colored.png%22%2C%22title%22%3A%22Slack%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/influencer/wp-content/uploads/sites/26/2020/06/netflix-colored.png%22%2C%22title%22%3A%22Netflix%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/influencer/wp-content/uploads/sites/26/2020/06/spotify-colored.png%22%2C%22title%22%3A%22Spotify%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/influencer/wp-content/uploads/sites/26/2020/06/booking-colored.png%22%2C%22title%22%3A%22Booking%22%2C%22link%22%3A%22%23%22%7D%5D" add_hover_effect="1" style="client" animation="fade-in" delay_items="yes" css=".vc_custom_1591856247260{margin-bottom: 0px !important;}"][/content_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'Clients left Influencer', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/clients/influencer-clients-left.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all clients';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" pix_visibility="1" css=".vc_custom_1592838902281{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row content_placement="middle"][vc_column width="1/2"][content_box style="" hover_effect="" add_hover_effect="" rounded_box="rounded-10" animation="fade-in-up" css=".vc_custom_1589839877849{border-top-width: 1px !important;border-right-width: 1px !important;border-bottom-width: 1px !important;border-left-width: 1px !important;padding-top: 20px !important;padding-right: 40px !important;padding-bottom: 20px !important;padding-left: 40px !important;background-color: #ffffff !important;border-left-color: #e9ecef !important;border-left-style: solid !important;border-right-color: #e9ecef !important;border-right-style: solid !important;border-top-color: #e9ecef !important;border-top-style: solid !important;border-bottom-color: #e9ecef !important;border-bottom-style: solid !important;}"][clients in_row="6" clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/influencer/wp-content/uploads/sites/26/2020/06/slack-colored.png%22%2C%22title%22%3A%22Slack%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/influencer/wp-content/uploads/sites/26/2020/06/netflix-colored.png%22%2C%22title%22%3A%22Netflix%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/influencer/wp-content/uploads/sites/26/2020/06/spotify-colored.png%22%2C%22title%22%3A%22Spotify%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/influencer/wp-content/uploads/sites/26/2020/06/booking-colored.png%22%2C%22title%22%3A%22Booking%22%2C%22link%22%3A%22%23%22%7D%5D" add_hover_effect="1" style="client" animation="fade-in" delay_items="yes" css=".vc_custom_1591856247260{margin-bottom: 0px !important;}"][/content_box][/vc_column][vc_column width="1/2"][pix_icon media_type="char" char="😎" has_icon_bg="true" icon_bg_color="gradient-primary-light" icon_size="48" style="" hover_effect="" add_hover_effect=""][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h4" text_color="gradient-primary" css=".vc_custom_1591575874792{padding-top: 20px !important;}"]Brands I worked with[/sliding-text][pix_text size="text-18" content_color="body-default" animation="fade-in-up" delay="600" css=".vc_custom_1591575884982{padding-top: 10px !important;}"]Combine seamlessly fitting layouts, customize everything you want, switch components on the go using our page builder.[/pix_text][pix_button btn_text="Contact me for collaboration" btn_color="primary-light" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" btn_div="text-left" btn_link="https://pixfort.website/redirect?to=essentials" btn_icon="pixicon-email-1" css=".vc_custom_1591576504776{margin-top: 20px !important;}"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'Clients stack Influencer', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/clients/influencer-clients-stack.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all clients';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" pix_visibility="1" css=".vc_custom_1592838902281{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row content_placement="middle" css=".vc_custom_1592839050769{padding-bottom: 40px !important;}"][vc_column content_align="text-center" offset="vc_col-md-offset-2 vc_col-md-8"][pix_icon media_type="char" char="🚀" has_icon_bg="true" icon_bg_color="gradient-primary-light" icon_size="48" content_align="inline" style="" hover_effect="" add_hover_effect=""][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h4" text_color="gradient-primary" css=".vc_custom_1592839039140{padding-top: 20px !important;}"]Brands I worked with[/sliding-text][pix_text size="text-18" content_color="body-default" position="text-center" animation="fade-in-up" delay="600" css=".vc_custom_1592839030155{padding-top: 10px !important;}"]Combine seamlessly fitting layouts, customize everything you want, switch components on the go using our page builder.[/pix_text][pix_button btn_text="Contact me for collaboration" btn_color="primary-light" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" btn_link="https://pixfort.website/redirect?to=essentials" btn_icon="pixicon-email-1" css=".vc_custom_1592839035799{margin-top: 20px !important;}"][/vc_column][/vc_row][vc_row][vc_column offset="vc_col-md-offset-3 vc_col-md-6"][content_box style="" hover_effect="" add_hover_effect="" rounded_box="rounded-10" animation="fade-in-up" css=".vc_custom_1589839877849{border-top-width: 1px !important;border-right-width: 1px !important;border-bottom-width: 1px !important;border-left-width: 1px !important;padding-top: 20px !important;padding-right: 40px !important;padding-bottom: 20px !important;padding-left: 40px !important;background-color: #ffffff !important;border-left-color: #e9ecef !important;border-left-style: solid !important;border-right-color: #e9ecef !important;border-right-style: solid !important;border-top-color: #e9ecef !important;border-top-style: solid !important;border-bottom-color: #e9ecef !important;border-bottom-style: solid !important;}"][clients in_row="6" clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/influencer/wp-content/uploads/sites/26/2020/06/slack-colored.png%22%2C%22title%22%3A%22Slack%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/influencer/wp-content/uploads/sites/26/2020/06/netflix-colored.png%22%2C%22title%22%3A%22Netflix%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/influencer/wp-content/uploads/sites/26/2020/06/spotify-colored.png%22%2C%22title%22%3A%22Spotify%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/influencer/wp-content/uploads/sites/26/2020/06/booking-colored.png%22%2C%22title%22%3A%22Booking%22%2C%22link%22%3A%22%23%22%7D%5D" add_hover_effect="1" style="client" animation="fade-in" delay_items="yes" css=".vc_custom_1591856247260{margin-bottom: 0px !important;}"][/content_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // app

    $data = array();
    $data['name'] = __( 'Clients App', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/clients/app-clients.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all clients';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" top_divider="" top_divider_color="" css=".vc_custom_1592867653843{padding-top: 60px !important;padding-bottom: 60px !important;background-color: #ffffff !important;}"][vc_row][vc_column offset="vc_col-md-offset-1 vc_col-md-10"][pix_text bold="font-weight-bold" content_color="heading-default" position="text-center" animation="fade-in-up" delay="400"]Join over +15,000 happy clients![/pix_text][clients in_row="5" clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/app/wp-content/uploads/sites/28/2020/06/tc.png%22%2C%22title%22%3A%22tc%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/app/wp-content/uploads/sites/28/2020/06/wired-gray.png%22%2C%22title%22%3A%22w%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/app/wp-content/uploads/sites/28/2020/06/fb.png%22%2C%22title%22%3A%22fb%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/app/wp-content/uploads/sites/28/2020/06/google.png%22%2C%22title%22%3A%22g%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/app/wp-content/uploads/sites/28/2020/06/engadget.png%22%2C%22title%22%3A%22eng%22%2C%22link%22%3A%22%23%22%7D%5D" add_hover_effect="1" style="client" animation="fade-in-up" delay_items="yes"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // agency

    $data = array();
    $data['name'] = __( 'Clients Agency', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/clients/agency-clients.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all clients';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592879126867{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row full_width="stretch_row"][vc_column][heading title_color="body-default" title_size="h6" animation="fade-in-up" secondary_font="secondary-font" title="Trusted by over 2,000 of the world’s leading companies" delay="400" css=".vc_custom_1591759208046{padding-bottom: 30px !important;}"][content_box style="3" hover_effect="3" add_hover_effect="" rounded_box="rounded-10" animation="" pix_scale_in="pix-scale-in-sm" css=".vc_custom_1591756996429{padding-top: 40px !important;padding-right: 40px !important;padding-bottom: 40px !important;padding-left: 40px !important;background-color: #ffffff !important;}"][clients in_row="5" clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/agency/wp-content/uploads/sites/29/2020/06/google.png%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/agency/wp-content/uploads/sites/29/2020/06/sncf.png%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/agency/wp-content/uploads/sites/29/2020/06/pixfort.png%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/agency/wp-content/uploads/sites/29/2020/06/apple.png%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/agency/wp-content/uploads/sites/29/2020/06/spotify.png%22%7D%5D" add_hover_effect="" style="client"][/content_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // beauty

    $data = array();
    $data['name'] = __( 'Clients right Beauty', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/clients/beauty-clients-right.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all clients';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592881036517{padding-top: 60px !important;padding-bottom: 60px !important;background-color: #ffffff !important;}"][vc_row full_width="stretch_row" content_placement="middle" css=".vc_custom_1591858589924{background-color: #ffffff !important;}"][vc_column width="1/3"][pix_numbers numbers_style="numbers-stack" before_secondary_font="secondary-font" number_secondary_font="secondary-font" duration="2000" title_color="dark-opacity-2" title_size="h1" title_display="display-3" content_color="heading-default" content_size="h3" text_before="+" number="240"]Brands available on our website[/pix_numbers][pix_text size="text-18" content_color="body-default" animation="fade-in-up" max_width="650px" delay="1000" css=".vc_custom_1591858033310{padding-top: 10px !important;}"]This is just a simple text made for Essentials awesome template.[/pix_text][/vc_column][vc_column width="2/3"][clients clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/beauty/wp-content/uploads/sites/30/2020/06/dior.png%22%2C%22title%22%3A%22dior%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/beauty/wp-content/uploads/sites/30/2020/06/loreal.png%22%2C%22title%22%3A%22l'oreal%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/beauty/wp-content/uploads/sites/30/2020/06/louis.png%22%2C%22title%22%3A%22louis%20vuitton%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/beauty/wp-content/uploads/sites/30/2020/06/pixfort.png%22%2C%22title%22%3A%22pixfort%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/beauty/wp-content/uploads/sites/30/2020/06/burberry.png%22%2C%22title%22%3A%22burberry%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/beauty/wp-content/uploads/sites/30/2020/06/hermes.png%22%2C%22title%22%3A%22hermes%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/beauty/wp-content/uploads/sites/30/2020/06/lancome.png%22%2C%22title%22%3A%22lancome%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/beauty/wp-content/uploads/sites/30/2020/06/channel.png%22%2C%22title%22%3A%22chanel%22%2C%22link%22%3A%22%23%22%7D%5D" add_hover_effect="1" style="client" animation="fade-in" delay_items="yes"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'Clients left Beauty', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/clients/beauty-clients-left.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all clients';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592881036517{padding-top: 60px !important;padding-bottom: 60px !important;background-color: #ffffff !important;}"][vc_row full_width="stretch_row" content_placement="middle" css=".vc_custom_1591858589924{background-color: #ffffff !important;}"][vc_column width="2/3"][clients clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/beauty/wp-content/uploads/sites/30/2020/06/dior.png%22%2C%22title%22%3A%22dior%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/beauty/wp-content/uploads/sites/30/2020/06/loreal.png%22%2C%22title%22%3A%22l'oreal%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/beauty/wp-content/uploads/sites/30/2020/06/louis.png%22%2C%22title%22%3A%22louis%20vuitton%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/beauty/wp-content/uploads/sites/30/2020/06/pixfort.png%22%2C%22title%22%3A%22pixfort%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/beauty/wp-content/uploads/sites/30/2020/06/burberry.png%22%2C%22title%22%3A%22burberry%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/beauty/wp-content/uploads/sites/30/2020/06/hermes.png%22%2C%22title%22%3A%22hermes%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/beauty/wp-content/uploads/sites/30/2020/06/lancome.png%22%2C%22title%22%3A%22lancome%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/beauty/wp-content/uploads/sites/30/2020/06/channel.png%22%2C%22title%22%3A%22chanel%22%2C%22link%22%3A%22%23%22%7D%5D" add_hover_effect="1" style="client" animation="fade-in" delay_items="yes"][/vc_column][vc_column width="1/3"][pix_numbers numbers_style="numbers-stack" before_secondary_font="secondary-font" number_secondary_font="secondary-font" duration="2000" title_color="dark-opacity-2" title_size="h1" title_display="display-3" content_color="heading-default" content_size="h3" text_before="+" number="240"]Brands available on our website[/pix_numbers][pix_text size="text-18" content_color="body-default" animation="fade-in-up" max_width="650px" delay="1000" css=".vc_custom_1591858033310{padding-top: 10px !important;}"]This is just a simple text made for Essentials awesome template.[/pix_text][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // original

    $data = array();
    $data['name'] = __( 'Clients CTA Main Original', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/clients/original-main-clients-cta.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all clients cta';
    $data['content']  = <<<CONTENT
[vc_row css=".vc_custom_1593041983437{padding-top: 60px !important;padding-bottom: 60px !important;}"][vc_column content_align="text-center"][clients in_row="2" clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2019/12/spotify.png%22%2C%22title%22%3A%22Spotify%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2019/12/airbnb.png%22%2C%22title%22%3A%22Airbnb%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2019/12/pixfort-1.png%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2019/12/nike.png%22%2C%22title%22%3A%22Airbnb%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2019/12/netflix.png%22%2C%22title%22%3A%22Airbnb%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2019/12/adidas.png%22%2C%22title%22%3A%22Airbnb%22%7D%5D" add_hover_effect="" style="client" css=".vc_custom_1582517697202{padding-bottom: 20px !important;}"][pix_text content_color="body-default" position="text-center" animation="fade-in-up" max_width="600px" delay="200"]Looking to start an new project using Essentials WordPress theme?[/pix_text][pix_button btn_text="Go to pixfort shop" btn_secondary_font="secondary-font" btn_color="white" btn_text_color="body-default" btn_size="normal" btn_effect="2" btn_hover_effect="2" btn_add_hover_effect="1" btn_animation="fade-in-up" btn_link="#" btn_icon="pixicon-bag-2" btn_anim_delay="400" css=".vc_custom_1577512017173{margin-top: 10px !important;}"][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'Clients in About simple page', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/clients/original-about-simple-clients.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all clients';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" pix_visibility="1" css=".vc_custom_1589319583329{background-color: #ffffff !important;}"][vc_row full_width="stretch_row" content_placement="middle" css=".vc_custom_1593126558739{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_column width="1/2"][vc_row_inner][vc_column_inner width="1/2"][pix_img rounded_img="rounded-xl" animation="fade-in-up" style="" hover_effect="" add_hover_effect="" image="https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2020/05/about-small-1.jpg" css=".vc_custom_1589322141569{margin-bottom: 30px !important;}" delay="200"][pix_img rounded_img="rounded-xl" animation="fade-in-up" style="" hover_effect="" add_hover_effect="" image="https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2020/05/about-small-3.jpg" css=".vc_custom_1589322154555{margin-bottom: 30px !important;}" delay="600"][/vc_column_inner][vc_column_inner width="1/2"][pix_img rounded_img="rounded-xl" animation="fade-in-up" style="" hover_effect="" add_hover_effect="" image="https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2020/05/about-small-2.jpg" css=".vc_custom_1589322149682{margin-bottom: 30px !important;}" delay="400"][pix_img rounded_img="rounded-xl" animation="fade-in-up" style="" hover_effect="" add_hover_effect="" image="https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2020/05/about-small-4.jpg" css=".vc_custom_1589322158692{margin-bottom: 30px !important;}" delay="800"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/2" content_align="text-center" css=".vc_custom_1589319724725{padding-top: 20px !important;padding-right: 30px !important;padding-bottom: 20px !important;padding-left: 30px !important;}"][pix_badge bold="font-weight-bold" secondary_font="secondary-font" text_color="heading-default" bg_color="gray-2" style="" hover_effect="" add_hover_effect="" animation="fade-in-up" padding="" text="We're hiring" css=".vc_custom_1589320407808{padding-top: 5px !important;padding-right: 9px !important;padding-bottom: 5px !important;padding-left: 9px !important;}"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="heading-default" css=".vc_custom_1589318724275{margin-top: 10px !important;}"]Join us Today[/sliding-text][pix_text size="text-18" content_color="body-default" position="text-center" animation="fade-in-up" max_width="640px" delay="200"]Each week our editors add new content to our blog, you can find many useful topics, exclusive for Essentials owners.[/pix_text][clients in_row="4" clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2019/12/pixfort-1.png%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2019/12/nike.png%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2019/12/spotify.png%22%7D%5D" add_hover_effect="" style="client" animation="fade-in-up" delay_items="yes" delay="1000" css=".vc_custom_1589335586504{padding-top: 20px !important;}"][pix_img align="text-center" animation="fade-in-up" img_div="text-center" style="" hover_effect="" add_hover_effect="" image="https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2020/05/signature.jpg" width="200px" css=".vc_custom_1589333580513{padding-top: 40px !important;}" delay="200"][pix_text size="text-sm" bold="font-weight-bold" secondary_font="secondary-font" content_color="heading-default" position="text-center" animation="fade-in-up" max_width="640px" delay="200" css=".vc_custom_1589319831089{padding-top: 10px !important;}"]CEO & Founder at pixfort[/pix_text][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1589320262436{padding-top: 60px !important;padding-bottom: 60px !important;}"][vc_column content_align="text-center" offset="vc_col-md-offset-2 vc_col-md-8"][pix_icon media_type="duo_icon" pix_duo_icon="flower-2" content_align="inline" style="" hover_effect="" add_hover_effect="6" css=".vc_custom_1589320801561{padding-right: 20px !important;}"][pix_icon media_type="duo_icon" pix_duo_icon="chair-1" content_align="inline" style="" hover_effect="" add_hover_effect="6" css=".vc_custom_1589320794715{padding-right: 20px !important;}"][pix_icon media_type="duo_icon" pix_duo_icon="earth" content_align="inline" style="" hover_effect="" add_hover_effect="6"][heading title_color="heading-default" title_size="h2" title="Create Awesome Photo Stack Images with Essentials." css=".vc_custom_1589320930164{padding-top: 40px !important;}"][pix_text size="text-20" content_color="body-default" animation="fade-in-up" delay="200" css=".vc_custom_1588796015442{padding-top: 10px !important;}"]We design and develop world-class websites and applications, design better and spend less time without restricting creative freedom.[/pix_text][vc_row_inner css=".vc_custom_1589321720499{padding-top: 20px !important;padding-bottom: 40px !important;}"][vc_column_inner width="1/3"][pix_numbers numbers_style="numbers-stack" duration="1500" title_color="primary" title_size="h1" content_color="heading-default" content_position="text-center" text_before="+" number="100"]Team members[/pix_numbers][/vc_column_inner][vc_column_inner width="1/3"][pix_numbers numbers_style="numbers-stack" duration="1500" title_color="primary" title_size="h1" content_color="heading-default" content_position="text-center" text_before="+" number="28"]Nationalities[/pix_numbers][/vc_column_inner][vc_column_inner width="1/3"][pix_numbers numbers_style="numbers-stack" duration="1500" title_color="primary" title_size="h1" content_color="heading-default" content_position="text-center" text_before="+" number="13"]Spoken languages[/pix_numbers][/vc_column_inner][/vc_row_inner][pix_badge bold="font-weight-bold" secondary_font="secondary-font" rounded="badge-pill" text_color="heading-default" bg_color="transparent" style="" hover_effect="" add_hover_effect="" element_div="text-center" padding="" text="Made with Love in France" css=".vc_custom_1589320865201{margin-top: 20px !important;margin-bottom: 20px !important;border-top-width: 2px !important;border-right-width: 2px !important;border-bottom-width: 2px !important;border-left-width: 2px !important;padding-top: 18px !important;padding-right: 30px !important;padding-bottom: 18px !important;padding-left: 30px !important;border-left-color: #e9ecef !important;border-left-style: solid !important;border-right-color: #e9ecef !important;border-right-style: solid !important;border-top-color: #e9ecef !important;border-top-style: solid !important;border-bottom-color: #e9ecef !important;border-bottom-style: solid !important;}"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // finance

    $data = array();
    $data['name'] = __( 'Clients Finance', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/clients/finance-clients.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all clients';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_bg_grdient="bg-gradient-primary" pix_over_visibility="" css=".vc_custom_1600735367993{padding-top: 100px !important;padding-bottom: 100px !important;}"][vc_row pix_particles_check=""][vc_column][heading title_color="white" title_size="h3" animation="fade-in-up" title="Meet our Customers." delay="200" css=".vc_custom_1600638251156{padding-bottom: 20px !important;}" max_width="550px"][pix_text size="text-20" content_color="light-opacity-7" position="text-center" animation="fade-in-up" max_width="550px" delay="300"]Advanced cameras combined with a large display.[/pix_text][/vc_column][/vc_row][vc_row pix_particles_check="" css=".vc_custom_1600638236029{padding-top: 40px !important;}"][vc_column content_align="text-center" offset="vc_col-md-offset-1 vc_col-md-10"][clients clients="%5B%7B%22image%22%3A%22https%3A%2F%2Fessentials.pixfort.com%2Fproduct%2Fwp-content%2Fuploads%2Fsites%2F23%2F2020%2F06%2Fgoogle-white.png%22%2C%22title%22%3A%22google%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https%3A%2F%2Fessentials.pixfort.com%2Fproduct%2Fwp-content%2Fuploads%2Fsites%2F23%2F2020%2F06%2Fpixfort-white.png%22%2C%22title%22%3A%22pixfort%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https%3A%2F%2Fessentials.pixfort.com%2Fproduct%2Fwp-content%2Fuploads%2Fsites%2F23%2F2020%2F06%2Fspotify-white.png%22%2C%22title%22%3A%22Spotify%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https%3A%2F%2Fessentials.pixfort.com%2Fproduct%2Fwp-content%2Fuploads%2Fsites%2F23%2F2020%2F06%2Fnetflix-white.png%22%2C%22title%22%3A%22netflix%22%2C%22link%22%3A%22%23%22%7D%5D" add_hover_effect="1" style="client" animation="fade-in" delay_items="yes" css=".vc_custom_1600638112889{margin-bottom: 40px !important;}"][pix_button btn_text="Create an account" btn_color="secondary" btn_size="lg" btn_effect="3" btn_hover_effect="3" btn_add_hover_effect="" btn_icon_animation="yes" btn_animation="fade-in-left" btn_icon="pixicon-user-3" btn_link="#" btn_anim_delay="400"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // seo

    $data = array();
    $data['name'] = __( 'Clients SEO', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/clients/seo-clients.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all clients';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" pix_visibility="1" css=".vc_custom_1603682687894{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_row content_placement="middle" pix_particles_check=""][vc_column width="1/3" content_align="text-center"][heading title_color="heading-default" title_size="h6" position="text-left" secondary_font="secondary-font" title="Trusted by over 2,000 of the world’s leading construction companies" css=".vc_custom_1603928374243{padding-top: 30px !important;padding-bottom: 30px !important;}"][/vc_column][vc_column width="2/3"][content_box style="" hover_effect="" add_hover_effect="" rounded_box="rounded-10" animation="fade-in-up" css=".vc_custom_1603928395648{border-top-width: 2px !important;border-right-width: 2px !important;border-bottom-width: 2px !important;border-left-width: 2px !important;padding-top: 20px !important;padding-right: 40px !important;padding-bottom: 20px !important;padding-left: 40px !important;background-color: #ffffff !important;border-left-color: #e9ecef !important;border-left-style: solid !important;border-right-color: #e9ecef !important;border-right-style: solid !important;border-top-color: #e9ecef !important;border-top-style: solid !important;border-bottom-color: #e9ecef !important;border-bottom-style: solid !important;}"][clients clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/construction/wp-content/uploads/sites/20/2020/06/vinci.png%22%2C%22title%22%3A%22vinci%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/construction/wp-content/uploads/sites/20/2020/06/total.png%22%2C%22title%22%3A%22total%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/construction/wp-content/uploads/sites/20/2020/06/sncf.png%22%2C%22title%22%3A%22sncf%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/construction/wp-content/uploads/sites/20/2020/06/eiffage.png%22%2C%22title%22%3A%22eiffage%22%2C%22link%22%3A%22%23%22%7D%5D" add_hover_effect="1" style="client" animation="fade-in" delay_items="yes" css=".vc_custom_1591148317430{margin-bottom: 0px !important;}"][/content_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // modern

    $data = array();
    $data['name'] = __( 'Clients Modern', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/clients/modern-clients.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all clients';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1617666656641{padding-top: 60px !important;padding-bottom: 60px !important;background-color: #ffffff !important;}"][vc_row pix_particles_check=""][vc_column offset="vc_col-md-offset-1 vc_col-md-10"][pix_numbers numbers_style="numbers-stack" before_secondary_font="secondary-font" number_secondary_font="secondary-font" duration="1200" title_color="gradient-primary" title_size="h1" title_display="display-3" content_color="heading-default" content_size="h5" content_position="text-center" text_before="+" number="20" text_after="K" css=".vc_custom_1613353452329{padding-bottom: 40px !important;}"]Brands available on our website[/pix_numbers][clients clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/modern/wp-content/uploads/sites/45/2021/03/nike.png%22%2C%22title%22%3A%22dior%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/modern/wp-content/uploads/sites/45/2021/03/pixfort.png%22%2C%22title%22%3A%22l'oreal%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/modern/wp-content/uploads/sites/45/2021/03/apple.png%22%2C%22title%22%3A%22louis%20vuitton%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/modern/wp-content/uploads/sites/45/2021/03/spotify.png%22%2C%22title%22%3A%22chanel%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/modern/wp-content/uploads/sites/45/2021/03/google.png%22%2C%22title%22%3A%22hermes%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/modern/wp-content/uploads/sites/45/2021/03/twitter.png%22%2C%22title%22%3A%22burberry%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/modern/wp-content/uploads/sites/45/2021/03/dior.png%22%2C%22title%22%3A%22lancome%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/modern/wp-content/uploads/sites/45/2021/03/sncf.png%22%2C%22title%22%3A%22pixfort%22%2C%22link%22%3A%22%23%22%7D%5D" add_hover_effect="1" style="client" animation="fade-in" delay_items="yes" delay="0"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // company

    $data = array();
    $data['name'] = __( 'Clients Company', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/clients/company-clients.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all clients';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" top_divider="" top_divider_color="" css=".vc_custom_1616974700290{padding-top: 60px !important;padding-bottom: 60px !important;background-color: #ffffff !important;}"][vc_row pix_particles_check=""][vc_column offset="vc_col-md-offset-3 vc_col-md-6"][pix_text bold="font-weight-bold" content_color="heading-default" position="text-center" animation="fade-in-up" delay="400"]Join over +15,000 happy clients![/pix_text][clients in_row="4" clients="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/company/wp-content/uploads/sites/47/2021/02/tc.png%22%2C%22title%22%3A%22tc%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/company/wp-content/uploads/sites/47/2021/02/wired.png%22%2C%22title%22%3A%22w%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/company/wp-content/uploads/sites/47/2021/02/google.png%22%2C%22title%22%3A%22g%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/company/wp-content/uploads/sites/47/2021/02/fb.png%22%2C%22title%22%3A%22fb%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/company/wp-content/uploads/sites/47/2021/02/engadget.png%22%2C%22title%22%3A%22eng%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/company/wp-content/uploads/sites/47/2021/02/envato.png%22%2C%22title%22%3A%22envato%22%2C%22link%22%3A%22%23%22%7D%5D" add_hover_effect="1" style="client" animation="fade-in-up" delay_items="yes"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    return $templates;
}




 ?>
