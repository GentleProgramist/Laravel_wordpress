<?php




function pix_templates_blog(){
    $templates = array();

    // Startup

    $data = array(); // Create new array
    $data['name'] = __( 'Blog posts Startup', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/blog/startup-blog.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template all blog'; // CSS class name
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" b_flip_h="true" css=".vc_custom_1589749821030{padding-top: 80px !important;padding-bottom: 80px !important;border-radius: 10px !important;}" b_custom_height="400px"][vc_row][vc_column][pix_badge bold="font-weight-bold" secondary_font="" style="" hover_effect="" add_hover_effect="" animation="fade-in-up" element_div="text-center" padding="" text="First Time on Themeforest" css=".vc_custom_1589677887111{padding-top: 7px !important;padding-right: 12px !important;padding-bottom: 7px !important;padding-left: 12px !important;}"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h3" text_color="dark-opacity-8" css=".vc_custom_1589672914961{padding-top: 20px !important;}"]Read from the blog[/sliding-text][pix_text size="text-20" content_color="body-default" position="text-center" animation="fade-in-up" max_width="600px" css=".vc_custom_1589677893908{padding-bottom: 20px !important;}" delay="200"]Here’s what you need to know about your pixfort, based on the questions we get asked the most.[/pix_text][pix_button btn_text="Get Essentials today" btn_style="underline" btn_remove_padding="no-padding" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" btn_div="text-center" btn_animation="fade-in-up" btn_link="https://pixfort.website/redirect?to=essentials" btn_icon="pixicon-bag-2" btn_anim_delay="400"][/vc_column][/vc_row][vc_row css=".vc_custom_1589749814140{padding-top: 40px !important;}"][vc_column][pix_blog blog_size="sm" blog_style_box="1" count="3" items_count="3" category="" pagination="" style="2" hover_effect="2" add_hover_effect="1"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // Software

    $data = array(); // Create new array
    $data['name'] = __( 'Blog posts Software', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/blog/software-blog-posts.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template all blog'; // CSS class name
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" css=".vc_custom_1589839944606{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_row content_placement="middle"][vc_column width="2/3" css=".vc_custom_1561772161711{margin-top: 20px !important;margin-bottom: 20px !important;}"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h3" text_color="heading-default"]Articles from Essentials[/sliding-text][pix_text size="text-20" content_color="dark-opacity-4" animation="fade-in-up" delay="1200"]Combine seamlessly fitting layouts, customize everything[/pix_text][/vc_column][vc_column width="1/3" content_align="text-right" el_class="d-md-flex align-items-center"][pix_button btn_text="Check our Blog" btn_size="normal" btn_rounded="btn-rounded" btn_effect="2" btn_hover_effect="2" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="yes" btn_animation="fade-in-up" btn_link="https://essentials.pixfort.com/software/blog/" btn_icon="pixicon-book-open-4" btn_anim_delay="800"][/vc_column][/vc_row][vc_row][vc_column][pix_blog blog_size="md" blog_style_box="1" count="3" items_count="3" category="" pagination="" rounded_img="rounded-10" style="4" hover_effect="6" add_hover_effect="4" bottom_divider_select="6"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // saas

    $data = array(); // Create new array
    $data['name'] = __( '3 Blog posts', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/blog/saas-blog-posts.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template all blog'; // CSS class name
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" css=".vc_custom_1590020309663{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_row full_width="stretch_row"][vc_column][pix_badge bold="font-weight-bold" secondary_font="" text_color="white" bg_color="gray-4" style="" hover_effect="" add_hover_effect="" animation="fade-in-left" element_div="text-center" padding="" text="UNLIMITED POSSIBILITIES" css=".vc_custom_1590019330454{border-top-width: 2px !important;border-right-width: 2px !important;border-bottom-width: 2px !important;border-left-width: 2px !important;padding-top: 7px !important;padding-right: 12px !important;padding-bottom: 7px !important;padding-left: 12px !important;border-left-color: #e9ecef !important;border-right-color: #e9ecef !important;border-top-color: #e9ecef !important;border-bottom-color: #e9ecef !important;}" delay="600"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h3" text_color="gradient-primary" max_width="500px" css=".vc_custom_1590020281154{padding-top: 20px !important;}"]Read from the Blog[/sliding-text][pix_text size="text-18" content_color="body-default" position="text-center" animation="fade-in-up" max_width="500px" delay="1000"]Be ready to use the next generation of WordPress themes. Be ready to met Essentials by pixfort.[/pix_text][/vc_column][/vc_row][vc_row css=".vc_custom_1590020409125{padding-top: 20px !important;}"][vc_column][pix_blog blog_style="default" blog_size="sm" blog_style_box="1" count="3" items_count="3" category="" pagination="" rounded_img="rounded-10" style="2" hover_effect="2" add_hover_effect="1"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array(); // Create new array
    $data['name'] = __( '2x2 Blog posts', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/blog/saas-blog-posts-2x2.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template all blog'; // CSS class name
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" css=".vc_custom_1590020309663{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_row full_width="stretch_row"][vc_column][pix_badge bold="font-weight-bold" secondary_font="" text_color="white" bg_color="gray-4" style="" hover_effect="" add_hover_effect="" animation="fade-in-left" element_div="text-center" padding="" text="UNLIMITED POSSIBILITIES" css=".vc_custom_1590019330454{border-top-width: 2px !important;border-right-width: 2px !important;border-bottom-width: 2px !important;border-left-width: 2px !important;padding-top: 7px !important;padding-right: 12px !important;padding-bottom: 7px !important;padding-left: 12px !important;border-left-color: #e9ecef !important;border-right-color: #e9ecef !important;border-top-color: #e9ecef !important;border-bottom-color: #e9ecef !important;}" delay="600"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h3" text_color="gradient-primary" max_width="500px" css=".vc_custom_1590020281154{padding-top: 20px !important;}"]Read from the Blog[/sliding-text][pix_text size="text-18" content_color="body-default" position="text-center" animation="fade-in-up" max_width="500px" delay="1000"]Be ready to use the next generation of WordPress themes. Be ready to met Essentials by pixfort.[/pix_text][/vc_column][/vc_row][vc_row css=".vc_custom_1590020409125{padding-top: 20px !important;}"][vc_column offset="vc_col-md-offset-2 vc_col-md-8"][pix_blog blog_style="default" blog_size="sm" blog_style_box="1" count="4" items_count="2" category="" pagination="" rounded_img="rounded-10" style="2" hover_effect="2" add_hover_effect="1"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // event

    $data = array(); // Create new array
    $data['name'] = __( 'Blog Event', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/blog/event-blog.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template all blog'; // CSS class name
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592482954414{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row full_width="stretch_row" content_placement="middle"][vc_column width="4/12" offset="vc_col-xs-12"][pix_badge bold="font-weight-bold" secondary_font="" text_color="white" bg_color="secondary" text_size="custom" style="" hover_effect="" add_hover_effect="" animation="fade-in-up" padding="" text="From our Blog" css=".vc_custom_1591915736911{margin-bottom: 15px !important;padding-top: 9px !important;padding-right: 15px !important;padding-bottom: 8px !important;padding-left: 15px !important;}" delay="300" text_custom_size="14px"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h2" text_color="heading-default"]Recent news[/sliding-text][pix_text size="text-18" content_color="body-default" animation="fade-in-up" delay="600" max_width="600px"]Combine seamlessly fitting layouts, customize everything you want.[/pix_text][/vc_column][vc_column width="8/12" offset="vc_col-xs-12" css=".vc_custom_1590469445560{border-top-width: 30px !important;padding-bottom: 30px !important;}"][pix_blog blog_size="md" blog_style_box="" count="2" items_count="2" category="" orderby="rand" pagination="" style="" hover_effect="" add_hover_effect=""][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // creative

    $data = array(); // Create new array
    $data['name'] = __( 'Blog Creative', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/blog/creative-blog.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template all blog'; // CSS class name
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" bottom_divider_select="8" bottom_layers="1" top_divider_select="8" top_layers="1" css=".vc_custom_1592351788916{background-color: #f8f9fa !important;}"][vc_row content_placement="middle" css=".vc_custom_1590891031388{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_column width="1/2"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h3" text_color="heading-default" max_width="500px"]Start building beautiful websites in minutes using the most advanced theme.[/sliding-text][/vc_column][vc_column width="1/2"][pix_text size="text-20" content_color="body-default" animation="fade-in-up" delay="400"]Creating stunning and professional websites has never been easier, today with Essentials you will be able to build awesome websites in no time![/pix_text][pix_button btn_text="View Case Study" btn_secondary_font="secondary-font" btn_style="underline" btn_color="gray-7" btn_remove_padding="no-padding" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" btn_link="#" btn_icon="pixicon-arrow-right2"][/vc_column][/vc_row][vc_row css=".vc_custom_1592516638778{padding-top: 20px !important;padding-bottom: 80px !important;}"][vc_column][pix_blog blog_size="sm" blog_style_box="1" count="3" items_count="3" category="" pagination="" rounded_img="rounded-10" style="2" hover_effect="2" add_hover_effect="1" bottom_divider_select="dynamic" bottom_moving_divider_color="%5B%7B%22d_gradient%22%3A%22%22%2C%22d_color_1%22%3A%22%23ffffff%22%2C%22d_color_2%22%3A%22%23f8f9fa%22%7D%2C%7B%22d_gradient%22%3A%22%22%2C%22d_color_1%22%3A%22rgba(255%2C255%2C255%2C0.6)%22%2C%22d_color_2%22%3A%22%23f8f9fa%22%7D%2C%7B%22d_gradient%22%3A%22%22%2C%22d_color_1%22%3A%22rgba(255%2C255%2C255%2C0.3)%22%2C%22d_color_2%22%3A%22%23f8f9fa%22%7D%5D"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // foundation

    $data = array();
    $data['name'] = __( '3 Blog posts Foundation', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/blog/foundation-blog.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all blog';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592348700065{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row full_width="stretch_row" css=".vc_custom_1592345023607{padding-bottom: 20px !important;}"][vc_column][pix_badge bold="font-weight-bold" secondary_font="" text_color="white" bg_color="primary" style="" hover_effect="" add_hover_effect="" animation="fade-in-left" element_div="text-center" padding="" text="Exclusive Articles" css=".vc_custom_1592345003744{border-top-width: 2px !important;border-right-width: 2px !important;border-bottom-width: 2px !important;border-left-width: 2px !important;padding-top: 7px !important;padding-right: 12px !important;padding-bottom: 7px !important;padding-left: 12px !important;border-left-color: #e9ecef !important;border-right-color: #e9ecef !important;border-top-color: #e9ecef !important;border-bottom-color: #e9ecef !important;}" delay="600"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="heading-default" max_width="500px" css=".vc_custom_1592344962119{padding-top: 20px !important;}"]Read from the Blog[/sliding-text][pix_text size="text-18" content_color="body-default" position="text-center" animation="fade-in-up" max_width="500px" delay="1000"]Be ready to use the next generation of WordPress themes. Be ready to met Essentials by pixfort.[/pix_text][/vc_column][/vc_row][vc_row css=".vc_custom_1590020409125{padding-top: 20px !important;}"][vc_column][pix_blog blog_style="full-img" blog_style_box="1" count="3" items_count="3" category="" pagination="" rounded_img="rounded-10" style="2" hover_effect="2" add_hover_effect="1"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( '2 Blog posts Foundation', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/blog/foundation-blog-x2.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all blog';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592348700065{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row full_width="stretch_row" css=".vc_custom_1592345023607{padding-bottom: 20px !important;}"][vc_column][pix_badge bold="font-weight-bold" secondary_font="" text_color="white" bg_color="primary" style="" hover_effect="" add_hover_effect="" animation="fade-in-left" element_div="text-center" padding="" text="Exclusive Articles" css=".vc_custom_1592345003744{border-top-width: 2px !important;border-right-width: 2px !important;border-bottom-width: 2px !important;border-left-width: 2px !important;padding-top: 7px !important;padding-right: 12px !important;padding-bottom: 7px !important;padding-left: 12px !important;border-left-color: #e9ecef !important;border-right-color: #e9ecef !important;border-top-color: #e9ecef !important;border-bottom-color: #e9ecef !important;}" delay="600"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="heading-default" max_width="500px" css=".vc_custom_1592344962119{padding-top: 20px !important;}"]Read from the Blog[/sliding-text][pix_text size="text-18" content_color="body-default" position="text-center" animation="fade-in-up" max_width="500px" delay="1000"]Be ready to use the next generation of WordPress themes. Be ready to met Essentials by pixfort.[/pix_text][/vc_column][/vc_row][vc_row css=".vc_custom_1590020409125{padding-top: 20px !important;}"][vc_column][pix_blog blog_style="full-img" blog_style_box="1" count="2" items_count="2" category="" orderby="rand" pagination="" rounded_img="rounded-10" style="2" hover_effect="2" add_hover_effect="1"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // business

    $data = array();
    $data['name'] = __( 'Blog carousel right business', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/blog/business-blog-carousel-right.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all blog';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592260433713{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #f8f9fa !important;}"][vc_row full_width="stretch_row" content_placement="middle"][vc_column width="1/3" css=".vc_custom_1561772161711{margin-top: 20px !important;margin-bottom: 20px !important;}"][pix_icon media_type="duo_icon" pix_duo_icon="book-open" icon_size="36" content_align="inline" style="" hover_effect="" add_hover_effect=""][heading title_color="heading-default" title_size="h4" position="text-left" title="Read exclusive articles from our blog" css=".vc_custom_1592260356937{padding-top: 30px !important;padding-bottom: 10px !important;}"][pix_text size="text-18" content_color="body-default" animation="fade-in-up" delay="1200"]Combine seamlessly fitting layouts, customize everything[/pix_text][pix_button btn_text="Check our Blog" btn_color="secondary" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="yes" btn_animation="fade-in-up" btn_link="https://essentials.pixfort.com/business/blog/" btn_icon="pixicon-angle-right" btn_anim_delay="800"][/vc_column][vc_column width="2/3" el_class="d-md-flex align-items-center"][pix_blog_slider count="5" blog_size="md" blog_style_box="1" rounded_img="rounded-xl" style="2" hover_effect="2" add_hover_effect="1" bottom_divider_select="5" slider_num="2" slider_style="pix-style-standard" slider_effect="pix-circular-left" prevnextbuttons="" pagedots="1" freescroll="" cellalign="left" slider_scale="" autoplay="" adaptiveheight="true" righttoleft="" slider_wrap="" visible_y="pix-overflow-y-visible" visible_overflow="pix-overflow-all-visible"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'Blog carousel left business', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/blog/business-blog-carousel-left.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all blog';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592260433713{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #f8f9fa !important;}"][vc_row full_width="stretch_row" content_placement="middle"][vc_column width="2/3" el_class="d-md-flex align-items-center"][pix_blog_slider count="5" blog_size="md" blog_style_box="1" rounded_img="rounded-xl" style="2" hover_effect="2" add_hover_effect="1" bottom_divider_select="5" slider_num="2" slider_style="pix-style-standard" slider_effect="pix-circular-right" prevnextbuttons="" pagedots="1" freescroll="" cellalign="right" slider_scale="" autoplay="" adaptiveheight="true" righttoleft="true" slider_wrap="" visible_y="pix-overflow-y-visible" visible_overflow="pix-overflow-all-visible"][/vc_column][vc_column width="1/3" css=".vc_custom_1561772161711{margin-top: 20px !important;margin-bottom: 20px !important;}"][pix_icon media_type="duo_icon" pix_duo_icon="book-open" icon_size="36" content_align="inline" style="" hover_effect="" add_hover_effect=""][heading title_color="heading-default" title_size="h4" position="text-left" title="Read exclusive articles from our blog" css=".vc_custom_1592260356937{padding-top: 30px !important;padding-bottom: 10px !important;}"][pix_text size="text-18" content_color="body-default" animation="fade-in-up" delay="1200"]Combine seamlessly fitting layouts, customize everything[/pix_text][pix_button btn_text="Check our Blog" btn_color="secondary" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="yes" btn_animation="fade-in-up" btn_link="https://essentials.pixfort.com/business/blog/" btn_icon="pixicon-angle-right" btn_anim_delay="800"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // coronavirus

    $data = array();
    $data['name'] = __( 'Blog posts Coronavirus', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/blog/coronavirus-blog.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all blog';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592219059391{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row full_width="stretch_row" equal_height="yes"][vc_column width="1/3"][content_box style="" hover_effect="" add_hover_effect="" animation="" sticky_top="sticky-top"][pix_icon media_type="duo_icon" pix_duo_icon="book-open" icon_color="secondary" has_icon_bg="true" icon_bg_color="secondary-light" style="" hover_effect="" add_hover_effect=""][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h4" text_color="heading-default" max_width="500px" css=".vc_custom_1591494041675{padding-top: 20px !important;}"]Read from the Blog[/sliding-text][pix_text size="text-18" content_color="body-default" animation="fade-in-up" max_width="600px" delay="1000" css=".vc_custom_1591494054043{padding-bottom: 10px !important;}"]Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum industry's standard.[/pix_text][pix_button btn_text="View our blog" btn_color="primary-light" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" btn_div="text-left" btn_animation="fade-in-up" btn_icon="pixicon-book-open-4" btn_link="https://essentials.pixfort.com/coronavirus/blog" btn_anim_delay="600"][/content_box][/vc_column][vc_column width="2/3"][pix_blog blog_style="default" blog_size="sm" blog_style_box="1" count="4" items_count="2" category="" pagination="" rounded_img="rounded-10" style="2" hover_effect="2" add_hover_effect="1"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // personal

    $data = array();
    $data['name'] = __( 'Posts carousel Personal', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/blog/personal-blog.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all blog';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592789168450{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #f8f9fa !important;}"][vc_row full_width="stretch_row"][vc_column][pix_badge bold="font-weight-bold" secondary_font="" text_color="white" bg_color="gray-4" style="" hover_effect="" add_hover_effect="" animation="fade-in-left" element_div="text-center" padding="" text="Weekly new articles" css=".vc_custom_1592146307993{border-top-width: 2px !important;border-right-width: 2px !important;border-bottom-width: 2px !important;border-left-width: 2px !important;padding-top: 7px !important;padding-right: 12px !important;padding-bottom: 7px !important;padding-left: 12px !important;border-left-color: #e9ecef !important;border-right-color: #e9ecef !important;border-top-color: #e9ecef !important;border-bottom-color: #e9ecef !important;}" delay="600"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h3" text_color="gradient-primary" max_width="500px" css=".vc_custom_1590020281154{padding-top: 20px !important;}"]Read from the Blog[/sliding-text][pix_text size="text-18" content_color="body-default" position="text-center" animation="fade-in-up" max_width="500px" delay="1000"]Be ready to use the next generation of WordPress themes. Be ready to met Essentials by pixfort.[/pix_text][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1592146236775{padding-top: 20px !important;padding-bottom: 30px !important;}"][vc_column][pix_blog_slider count="5" blog_size="md" blog_style_box="1" rounded_img="rounded-10" style="1" hover_effect="2" add_hover_effect="1" bottom_divider_select="8" slider_num="3" slider_style="pix-style-standard" slider_effect="pix-circular-slider" prevnextbuttons="1" pagedots="1" freescroll="" cellalign="left" slider_scale="" autoplay="" adaptiveheight="true" righttoleft="" slider_wrap="true" visible_y="pix-overflow-y-visible" visible_overflow="pix-overflow-all-visible"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // influencer

    $data = array();
    $data['name'] = __( 'Blog posts Influencer', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/blog/influencer-blog.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all blog';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" pix_visibility="1" css=".vc_custom_1593188775066{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_row full_width="stretch_row" css=".vc_custom_1591576435300{padding-bottom: 20px !important;}"][vc_column content_align="text-center" offset="vc_col-lg-offset-2 vc_col-lg-8"][pix_icon media_type="char" char="✏" has_icon_bg="true" icon_bg_color="gradient-primary-light" icon_size="48" content_align="center" style="" hover_effect="" add_hover_effect=""][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="gradient-primary" css=".vc_custom_1591576156726{padding-top: 20px !important;}"]Read from my blog[/sliding-text][pix_text size="text-20" content_color="body-default" animation="fade-in-up" delay="600" css=".vc_custom_1591573822455{padding-top: 10px !important;}"]Combine seamlessly fitting layouts, customize everything you want, switch components on the go using our page builder.[/pix_text][pix_button btn_text="Read more from blog" btn_color="primary-light" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" btn_div="text-center" btn_link="https://essentials.pixfort.com/influencer/blog/" btn_icon="pixicon-bars-menu" css=".vc_custom_1591576145043{margin-top: 20px !important;}"][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1591576403321{padding-top: 20px !important;}"][vc_column][pix_blog_slider count="5" blog_style="padding" blog_size="sm" blog_style_box="1" style="" hover_effect="" add_hover_effect="1" slider_num="3" slider_style="pix-style-standard" slider_effect="pix-effect-standard" prevnextbuttons="1" pagedots="1" freescroll="" slider_scale="" autoplay="" adaptiveheight="true" righttoleft="" slider_wrap="true" visible_y="" visible_overflow=""][/vc_column][/vc_row][/vc_section]            
CONTENT;

    array_push($templates, $data);

    // blogger

    $data = array();
    $data['name'] = __( 'Blog carousel Blogger', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/blog/blogger-blog.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all blog';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592883317781{background-color: #ffffff !important;}"][vc_row full_width="stretch_row" css=".vc_custom_1592883323655{padding-top: 60px !important;padding-bottom: 60px !important;background-color: #ffffff !important;}"][vc_column content_align="text-center"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h5" text_color="heading-default" max_width="850px"]Handpicked Articles[/sliding-text][pix_text content_color="body-default" position="text-center" animation="fade-in-up" max_width="560px" delay="1600" css=".vc_custom_1591665558042{padding-bottom: 10px !important;}"]Selection of our best topics in the blog.[/pix_text][pix_blog_slider count="7" blog_style="full-img" orderby="rand" order="ASC" style="1" hover_effect="2" add_hover_effect="1" slider_num="3" slider_style="pix-style-standard" slider_effect="pix-circular-slider" prevnextbuttons="1" pagedots="1" freescroll="" slider_scale="" cellpadding="pix-p-20" autoplay="" adaptiveheight="true" righttoleft="" slider_wrap="true" visible_y="pix-overflow-y-visible" visible_overflow="pix-overflow-all-visible"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'Posts with right sidebar Blogger', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/blog/blogger-posts-right-sidebar.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all blog pages';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1591668081266{border-bottom-width: 1px !important;padding-top: 20px !important;padding-bottom: 80px !important;border-bottom-color: rgba(0,0,0,0.08) !important;border-bottom-style: solid !important;}"][vc_row full_width="stretch_row" equal_height="yes" css=".vc_custom_1591656092325{padding-top: 20px !important;}"][vc_column width="2/3"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h5" text_color="heading-default" remove_mb="1" css=".vc_custom_1591667162459{padding-bottom: 15px !important;}"]Recent Articles[/sliding-text][pix_blog blog_style="left-img" blog_style_box="1" count="3" items_count="1" category="" pagination="1" style="1" hover_effect="2" add_hover_effect="1"][/vc_column][vc_column width="1/3"][content_box style="" hover_effect="" add_hover_effect="" animation="" sticky_top="sticky-top" css=".vc_custom_1591667177633{padding-top: 8px !important;}"][vc_widget_sidebar sidebar_id="sidebar-1"][/content_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'Posts with left sidebar Blogger', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/blog/blogger-posts-left-sidebar.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all blog pages';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1591668081266{border-bottom-width: 1px !important;padding-top: 20px !important;padding-bottom: 80px !important;border-bottom-color: rgba(0,0,0,0.08) !important;border-bottom-style: solid !important;}"][vc_row full_width="stretch_row" equal_height="yes" css=".vc_custom_1591656092325{padding-top: 20px !important;}"][vc_column width="1/3"][content_box style="" hover_effect="" add_hover_effect="" animation="" sticky_top="sticky-top" css=".vc_custom_1591667177633{padding-top: 8px !important;}"][vc_widget_sidebar sidebar_id="sidebar-1"][/content_box][/vc_column][vc_column width="2/3"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h5" text_color="heading-default" remove_mb="1" css=".vc_custom_1591667162459{padding-bottom: 15px !important;}"]Recent Articles[/sliding-text][pix_blog blog_style="left-img" blog_style_box="1" count="3" items_count="1" category="" pagination="1" style="1" hover_effect="2" add_hover_effect="1"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'Posts center Blogger', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/blog/blogger-posts-center.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all blog pages';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1591668081266{border-bottom-width: 1px !important;padding-top: 20px !important;padding-bottom: 80px !important;border-bottom-color: rgba(0,0,0,0.08) !important;border-bottom-style: solid !important;}"][vc_row full_width="stretch_row" equal_height="yes" css=".vc_custom_1591656092325{padding-top: 20px !important;}"][vc_column content_align="text-center" offset="vc_col-md-offset-2 vc_col-md-8"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h5" text_color="heading-default" remove_mb="1" css=".vc_custom_1592883531579{padding-bottom: 30px !important;}"]Recent Articles[/sliding-text][pix_blog blog_style="left-img" blog_style_box="1" count="3" items_count="1" category="" pagination="1" style="1" hover_effect="2" add_hover_effect="1"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // kb

    $data = array();
    $data['name'] = __( 'Blog posts carousel Knowledge base', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/blog/kb-articles.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all blog';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1593017820787{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #f8f9fa !important;}"][vc_row content_placement="middle"][vc_column width="2/3" css=".vc_custom_1561772161711{margin-top: 20px !important;margin-bottom: 20px !important;}"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h3" text_color="heading-default"]Handpicked articles[/sliding-text][pix_text size="text-18" content_color="body-default" animation="fade-in-up" delay="400"]Combine seamlessly fitting layouts, customize everything[/pix_text][/vc_column][vc_column width="1/3" content_align="text-right" el_class="d-md-flex align-items-center"][pix_button btn_text="Check more articles" btn_color="secondary" btn_size="md" btn_rounded="btn-rounded" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="yes" btn_animation="fade-in-left" btn_link="https://essentials.pixfort.com/software/blog/" btn_icon="pixicon-arrow-right2" btn_anim_delay="800"][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1590205750193{padding-bottom: 20px !important;}"][vc_column][pix_blog_slider count="6" blog_size="sm" blog_style_box="1" style="2" hover_effect="3" add_hover_effect="4" slider_num="3" slider_style="pix-style-standard" slider_effect="pix-fade-out-effect" prevnextbuttons="1" pagedots="1" freescroll="" slider_scale="" autoplay="" adaptiveheight="true" righttoleft="" slider_wrap="true" visible_y="pix-overflow-y-visible" visible_overflow="pix-overflow-all-visible"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // original

    $data = array();
    $data['name'] = __( 'Blog carousel Main Original', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/blog/original-main-blog.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all blog';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" bottom_divider_select="8" b_has_animation="true" b_1_animation="slide-in-up" b_2_is_gradient="true" b_2_color="rgba(233,236,239,0.61)" b_2_animation="slide-in-up" b_3_is_gradient="true" b_3_color="#ffffff" b_3_color_2="rgba(206,212,218,0.1)" b_3_animation="slide-in-up" css=".vc_custom_1593042333792{padding-top: 80px !important;padding-bottom: 80px !important;}" b_2_delay="150" b_3_delay="300"][vc_row full_width="stretch_row" content_placement="top" css=".vc_custom_1588302838196{padding-top: 20px !important;padding-bottom: 30px !important;background-color: #f8f9fa !important;}"][vc_column width="1/2"][animated-heading words="%5B%7B%22word%22%3A%22Topics.%22%2C%22has_color%22%3A%22true%22%2C%22word_color%22%3A%22gradient-primary%22%2C%22word_custom_color%22%3A%22%23333333%22%7D%2C%7B%22word%22%3A%22Articles.%22%2C%22has_color%22%3A%22true%22%2C%22word_color%22%3A%22gradient-primary%22%2C%22word_custom_color%22%3A%22%23333333%22%7D%2C%7B%22word%22%3A%22Tutorials.%22%2C%22has_color%22%3A%22true%22%2C%22word_color%22%3A%22gradient-primary%22%2C%22word_custom_color%22%3A%22%23333333%22%7D%5D" space_after="space_after" br_after="space_after" size="h2" title_color="gradient-primary" position="left" animation="fade-in-up" secondary_font="secondary-font" title="Featured" text_after="Exclusively for you!"][/vc_column][vc_column width="1/2" css=".vc_custom_1588302714726{padding-top: 30px !important;padding-bottom: 30px !important;}"][pix_text size="text-20" content_color="body-default" animation="fade-in-up" max_width="640px" delay="200"]Each week our editors add new content to our blog, you can find useful topics, exclusive for Essentials owners.[/pix_text][pix_button btn_text="Check our blog" btn_secondary_font="secondary-font" btn_style="underline" btn_color="gray-4" btn_text_color="heading-default" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_position="after" btn_animation="fade-in-up" btn_link="https://essentials.pixfort.com/original/blog/" btn_icon="pixicon-angle-right" btn_anim_delay="400" css=".vc_custom_1588778021826{margin-right: 0px !important;margin-left: 0px !important;padding-right: 0px !important;padding-left: 0px !important;}"][/vc_column][/vc_row][vc_row full_width="stretch_row"][vc_column][pix_blog_slider count="6" blog_size="md" blog_style_box="1" style="6" hover_effect="5" add_hover_effect="7" bottom_divider_select="17" slider_num="3" slider_style="pix-style-standard" slider_effect="pix-circular-slider" prevnextbuttons="1" pagedots="1" freescroll="" slider_scale="" autoplay="" adaptiveheight="true" righttoleft="" slider_wrap="true" visible_y="pix-overflow-y-visible" visible_overflow="pix-overflow-all-visible" item_box="0" blog_slider_overflow="true" autolay="1" autolay_time="2500" pagination="Yes" css=".vc_custom_1588424676963{padding-bottom: 20px !important;}"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);



    return $templates;
}




 ?>
