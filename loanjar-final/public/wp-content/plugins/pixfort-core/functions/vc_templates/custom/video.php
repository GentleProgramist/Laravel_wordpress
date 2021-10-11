<?php




function pix_templates_video(){
    $templates = array();

    // marketing

    $data = array(); // Create new array
    $data['name'] = __( 'Video 10 columns', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/video/marketing-video.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all video content'; // CSS class name
    $data['content']  = <<<CONTENT
 [vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592490897233{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #f8f9fa !important;}"][vc_row content_placement="middle"][vc_column css=".vc_custom_1592491166344{margin-top: 20px !important;margin-bottom: 20px !important;}" offset="vc_col-md-offset-1 vc_col-md-10"][pix_video aspect="embed-responsive-16by9" rounded_img="rounded-10" overlay_color="gradient-primary" in_popup="1" style="2" hover_effect="3" add_hover_effect="1" image="https://essentials.pixfort.com/marketing/wp-content/uploads/sites/6/2020/05/video-image.jpg" css=".vc_custom_1590186393507{margin-bottom: 60px !important;}" embed_code="JTNDaWZyYW1lJTIwd2lkdGglM0QlMjI1NjAlMjIlMjBoZWlnaHQlM0QlMjIzMTUlMjIlMjBzcmMlM0QlMjJodHRwcyUzQSUyRiUyRnd3dy55b3V0dWJlLmNvbSUyRmVtYmVkJTJGdU00SW5ORUdIa00lMjIlMjBmcmFtZWJvcmRlciUzRCUyMjAlMjIlMjBhbGxvdyUzRCUyMmFjY2VsZXJvbWV0ZXIlM0IlMjBhdXRvcGxheSUzQiUyMGVuY3J5cHRlZC1tZWRpYSUzQiUyMGd5cm9zY29wZSUzQiUyMHBpY3R1cmUtaW4tcGljdHVyZSUyMiUyMGFsbG93ZnVsbHNjcmVlbiUyMGF1dG9wbGF5JTNEJTIyYXV0b3BsYXklMjIlM0UlM0MlMkZpZnJhbWUlM0U="][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // creative

    $data = array(); // Create new array
    $data['name'] = __( 'Video with divider', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/video/creative-video.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all video content'; // CSS class name
    $data['content']  = <<<CONTENT
 [vc_section full_width="stretch_row" pix_over_visibility="" bottom_divider_select="8" bottom_layers="1" top_divider_select="8" top_layers="1" css=".vc_custom_1592516570008{background-color: #f8f9fa !important;}"][vc_row full_width="stretch_row" content_placement="middle" css=".vc_custom_1592516562415{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_column offset="vc_col-md-offset-1 vc_col-md-10"][pix_video aspect="embed-responsive-16by9" rounded_img="rounded-10" pix_tilt="tilt" animation="fade-in-up" text_color="body-default" overlay_color="gradient-primary" overlay_opacity="pix-opacity-4" in_popup="1" style="3" hover_effect="3" add_hover_effect="1" image="https://essentials.pixfort.com/creative/wp-content/uploads/sites/14/2020/06/video-image.jpg" embed_code="JTNDaWZyYW1lJTIwd2lkdGglM0QlMjI1NjAlMjIlMjBoZWlnaHQlM0QlMjIzMTUlMjIlMjBzcmMlM0QlMjJodHRwcyUzQSUyRiUyRnd3dy55b3V0dWJlLmNvbSUyRmVtYmVkJTJGdU00SW5ORUdIa00lMjIlMjBmcmFtZWJvcmRlciUzRCUyMjAlMjIlMjBhbGxvdyUzRCUyMmFjY2VsZXJvbWV0ZXIlM0IlMjBhdXRvcGxheSUzQiUyMGVuY3J5cHRlZC1tZWRpYSUzQiUyMGd5cm9zY29wZSUzQiUyMHBpY3R1cmUtaW4tcGljdHVyZSUyMiUyMGFsbG93ZnVsbHNjcmVlbiUyMGF1dG9wbGF5JTNEJTIyYXV0b3BsYXklMjIlM0UlM0MlMkZpZnJhbWUlM0U="][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array(); // Create new array
    $data['name'] = __( 'Video popup Creative', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/video/creative-video-popup.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all video content'; // CSS class name
    $data['content']  = <<<CONTENT
 [vc_section full_width="stretch_row" pix_over_visibility="" bottom_divider_select="19" bottom_layers="1" b_1_color="#f8f9fa" css=".vc_custom_1592352079790{padding-top: 60px !important;padding-bottom: 60px !important;background-color: #ffffff !important;}"][vc_row][vc_column content_align="text-center" offset="vc_col-md-offset-2 vc_col-md-8"][content_box style="" hover_effect="" add_hover_effect="" rounded_box="rounded-10" animation="" css=".vc_custom_1592351962093{padding-top: 40px !important;padding-right: 30px !important;padding-bottom: 40px !important;padding-left: 30px !important;border-radius: 10px !important;}"][pix_video_popup aspect="embed-responsive-16by9" animation="fade-in-up" text_color="heading-default" embed_code="JTNDaWZyYW1lJTIwd2lkdGglM0QlMjI1NjAlMjIlMjBoZWlnaHQlM0QlMjIzMTUlMjIlMjBzcmMlM0QlMjJodHRwcyUzQSUyRiUyRnd3dy55b3V0dWJlLmNvbSUyRmVtYmVkJTJGdU00SW5ORUdIa00lMjIlMjBmcmFtZWJvcmRlciUzRCUyMjAlMjIlMjBhbGxvdyUzRCUyMmFjY2VsZXJvbWV0ZXIlM0IlMjBhdXRvcGxheSUzQiUyMGVuY3J5cHRlZC1tZWRpYSUzQiUyMGd5cm9zY29wZSUzQiUyMHBpY3R1cmUtaW4tcGljdHVyZSUyMiUyMGFsbG93ZnVsbHNjcmVlbiUyMGF1dG9wbGF5JTNEJTIyYXV0b3BsYXklMjIlM0UlM0MlMkZpZnJhbWUlM0U="][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="heading-default" css=".vc_custom_1590887231991{padding-top: 30px !important;}" max_width="600px"]Join the revolution[/sliding-text][pix_text size="text-20" content_color="body-default" animation="fade-in-up" delay="400" max_width="500px"]Creating stunning and professional websites has never been easier, today with Essentials you will be able to build awesome websites in no time![/pix_text][/content_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // landing

    $data = array(); // Create new array
    $data['name'] = __( 'Video popup Landing', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/video/landing-video-popup.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all video content'; // CSS class name
    $data['content']  = <<<CONTENT
 [vc_section full_width="stretch_row" pix_over_visibility="" top_divider_select="8" t_has_animation="true" t_2_is_gradient="true" t_2_color="#e6dbff" t_2_animation="fade-in-up" t_3_is_gradient="true" t_3_color="#ffffff" t_3_color_2="#f6f2ff" t_3_animation="fade-in-up" css=".vc_custom_1592528412580{padding-top: 120px !important;padding-bottom: 120px !important;}" t_2_delay="150" t_3_delay="300"][vc_row css=".vc_custom_1592437938552{padding-bottom: 40px !important;}"][vc_column content_align="text-center"][pix_video_popup aspect="embed-responsive-16by9" animation="fade-in-up" text_color="secondary" delay="200" embed_code="JTNDaWZyYW1lJTIwd2lkdGglM0QlMjI1NjAlMjIlMjBoZWlnaHQlM0QlMjIzMTUlMjIlMjBzcmMlM0QlMjJodHRwcyUzQSUyRiUyRnd3dy55b3V0dWJlLmNvbSUyRmVtYmVkJTJGdU00SW5ORUdIa00lMjIlMjBmcmFtZWJvcmRlciUzRCUyMjAlMjIlMjBhbGxvdyUzRCUyMmFjY2VsZXJvbWV0ZXIlM0IlMjBhdXRvcGxheSUzQiUyMGVuY3J5cHRlZC1tZWRpYSUzQiUyMGd5cm9zY29wZSUzQiUyMHBpY3R1cmUtaW4tcGljdHVyZSUyMiUyMGFsbG93ZnVsbHNjcmVlbiUyMGF1dG9wbGF5JTNEJTIyYXV0b3BsYXklMjIlM0UlM0MlMkZpZnJhbWUlM0U="][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="heading-default" css=".vc_custom_1592437926963{padding-top: 40px !important;}" max_width="600px"]Super powerful features[/sliding-text][pix_text size="text-20" content_color="body-default" position="text-center" animation="fade-in-up" delay="500" css=".vc_custom_1592436405007{padding-bottom: 10px !important;}" max_width="600px"]Design better and spend less time without restricting creative freedom. Combine layouts, customize everything.[/pix_text][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // foundation

    $data = array();
    $data['name'] = __( 'Video right Foundation', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/video/foundation-video-right.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all video content';
    $data['content']  = <<<CONTENT
  [vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592347938565{padding-top: 120px !important;padding-bottom: 120px !important;background-color: #ffffff !important;}"][vc_row content_placement="middle"][vc_column width="1/3"][pix_badge bold="font-weight-bold" secondary_font="" text_color="white" bg_color="secondary" style="" hover_effect="" add_hover_effect="" animation="fade-in-up" padding="" text="Clean and Simple" css=".vc_custom_1592347742058{padding-top: 7px !important;padding-right: 12px !important;padding-bottom: 7px !important;padding-left: 12px !important;}"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h3" text_color="heading-default" css=".vc_custom_1592347768090{padding-top: 20px !important;}"]Showcase works[/sliding-text][pix_text size="text-20" content_color="body-default" animation="fade-in-up" delay="900" css=".vc_custom_1592347637063{padding-bottom: 10px !important;}" max_width="600px"]This is just a simple text made for this unique and awesome template, you can replace it with any text.[/pix_text][/vc_column][vc_column width="2/3"][pix_video aspect="embed-responsive-16by9" rounded_img="rounded-10" pix_tilt="tilt" animation="fade-in-up" overlay_color="secondary" overlay_opacity="pix-opacity-7" in_popup="1" style="3" hover_effect="3" add_hover_effect="1" image="https://essentials.pixfort.com/foundation/wp-content/uploads/sites/19/2020/06/slider-image-2.jpg" delay="400" embed_code="JTNDaWZyYW1lJTIwd2lkdGglM0QlMjI1NjAlMjIlMjBoZWlnaHQlM0QlMjIzMTUlMjIlMjBzcmMlM0QlMjJodHRwcyUzQSUyRiUyRnd3dy55b3V0dWJlLmNvbSUyRmVtYmVkJTJGdU00SW5ORUdIa00lMjIlMjBmcmFtZWJvcmRlciUzRCUyMjAlMjIlMjBhbGxvdyUzRCUyMmFjY2VsZXJvbWV0ZXIlM0IlMjBhdXRvcGxheSUzQiUyMGVuY3J5cHRlZC1tZWRpYSUzQiUyMGd5cm9zY29wZSUzQiUyMHBpY3R1cmUtaW4tcGljdHVyZSUyMiUyMGFsbG93ZnVsbHNjcmVlbiUyMGF1dG9wbGF5JTNEJTIyYXV0b3BsYXklMjIlM0UlM0MlMkZpZnJhbWUlM0U="][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'Video left Foundation', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/video/foundation-video-left.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all video content';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592347938565{padding-top: 120px !important;padding-bottom: 120px !important;background-color: #ffffff !important;}"][vc_row content_placement="middle"][vc_column width="2/3"][pix_video aspect="embed-responsive-16by9" rounded_img="rounded-10" pix_tilt="tilt" animation="fade-in-up" overlay_color="secondary" overlay_opacity="pix-opacity-7" in_popup="1" style="3" hover_effect="3" add_hover_effect="1" image="https://essentials.pixfort.com/foundation/wp-content/uploads/sites/19/2020/06/image-bg-2.jpg" delay="400" embed_code="JTNDaWZyYW1lJTIwd2lkdGglM0QlMjI1NjAlMjIlMjBoZWlnaHQlM0QlMjIzMTUlMjIlMjBzcmMlM0QlMjJodHRwcyUzQSUyRiUyRnd3dy55b3V0dWJlLmNvbSUyRmVtYmVkJTJGdU00SW5ORUdIa00lMjIlMjBmcmFtZWJvcmRlciUzRCUyMjAlMjIlMjBhbGxvdyUzRCUyMmFjY2VsZXJvbWV0ZXIlM0IlMjBhdXRvcGxheSUzQiUyMGVuY3J5cHRlZC1tZWRpYSUzQiUyMGd5cm9zY29wZSUzQiUyMHBpY3R1cmUtaW4tcGljdHVyZSUyMiUyMGFsbG93ZnVsbHNjcmVlbiUyMGF1dG9wbGF5JTNEJTIyYXV0b3BsYXklMjIlM0UlM0MlMkZpZnJhbWUlM0U="][/vc_column][vc_column width="1/3"][pix_badge bold="font-weight-bold" secondary_font="" text_color="white" bg_color="primary" style="" hover_effect="" add_hover_effect="" animation="fade-in-up" padding="" text="Clean and Simple" css=".vc_custom_1592658963717{padding-top: 7px !important;padding-right: 12px !important;padding-bottom: 7px !important;padding-left: 12px !important;}"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h3" text_color="heading-default" css=".vc_custom_1592347768090{padding-top: 20px !important;}"]Showcase works[/sliding-text][pix_text size="text-20" content_color="body-default" animation="fade-in-up" delay="900" css=".vc_custom_1592347637063{padding-bottom: 10px !important;}" max_width="600px"]This is just a simple text made for this unique and awesome template, you can replace it with any text.[/pix_text][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // business

    $data = array();
    $data['name'] = __( 'Video popup Business', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/video/business-video-popup.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all video content';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592699922020{background-color: #ffffff !important;}"][vc_row css=".vc_custom_1592256475026{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_column content_align="text-center"][pix_video_popup aspect="embed-responsive-16by9" animation="fade-in-up" size="90" embed_code="JTNDaWZyYW1lJTIwd2lkdGglM0QlMjI1NjAlMjIlMjBoZWlnaHQlM0QlMjIzMTUlMjIlMjBzcmMlM0QlMjJodHRwcyUzQSUyRiUyRnd3dy55b3V0dWJlLmNvbSUyRmVtYmVkJTJGdU00SW5ORUdIa00lMjIlMjBmcmFtZWJvcmRlciUzRCUyMjAlMjIlMjBhbGxvdyUzRCUyMmFjY2VsZXJvbWV0ZXIlM0IlMjBhdXRvcGxheSUzQiUyMGVuY3J5cHRlZC1tZWRpYSUzQiUyMGd5cm9zY29wZSUzQiUyMHBpY3R1cmUtaW4tcGljdHVyZSUyMiUyMGFsbG93ZnVsbHNjcmVlbiUyMGF1dG9wbGF5JTNEJTIyYXV0b3BsYXklMjIlM0UlM0MlMkZpZnJhbWUlM0U="][heading title_color="heading-default" title_size="h4" title="The new era of building websites" css=".vc_custom_1592246085106{padding-top: 30px !important;padding-bottom: 10px !important;}"][pix_text size="text-18" content_color="body-default" position="text-center" css=".vc_custom_1592246081258{padding-bottom: 30px !important;}" max_width="600px"]It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.[/pix_text][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // photography

    $data = array();
    $data['name'] = __( 'Video carousel Photography', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/video/photography-video.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all video content';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1592139415063{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}" el_id="pix_section_pricing"][vc_row full_width="stretch_row" content_placement="middle"][vc_column content_align="text-center" css=".vc_custom_1592137735614{padding-right: 30px !important;padding-left: 30px !important;}"][pix_text size="text-18" bold="font-weight-bold" content_color="heading-default" animation="fade-in-up" remove_pb_padding="m-0" delay="200" max_width="600px"]Stunning effect carousel[/pix_text][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="gradient-primary" css=".vc_custom_1592141956781{padding-top: 10px !important;}"]Video Circular Carousel[/sliding-text][pix_text size="text-18" content_color="body-default" animation="fade-in-up" delay="900" css=".vc_custom_1592138473880{padding-bottom: 10px !important;}" max_width="600px"]This is just a simple text made for this unique and awesome template, you can replace it with any text.[/pix_text][/vc_column][/vc_row][vc_row full_width="stretch_row_content"][vc_column offset="vc_col-md-offset-1 vc_col-md-10" css=".vc_custom_1592140885946{padding-top: 40px !important;padding-bottom: 40px !important;}"][pix_video_slider items="%5B%7B%22embed_code%22%3A%22%3Ciframe%20width%3D%5C%22560%5C%22%20height%3D%5C%22315%5C%22%20src%3D%5C%22https%3A%2F%2Fwww.youtube.com%2Fembed%2FuM4InNEGHkM%5C%22%20frameborder%3D%5C%220%5C%22%20allow%3D%5C%22accelerometer%3B%20autoplay%3B%20encrypted-media%3B%20gyroscope%3B%20picture-in-picture%5C%22%20allowfullscreen%20autoplay%3D%5C%22autoplay%5C%22%3E%3C%2Fiframe%3E%22%2C%22image%22%3A%22https://essentials.pixfort.com/photography/wp-content/uploads/sites/27/2020/06/video-1.jpg%22%7D%2C%7B%22embed_code%22%3A%22%3Ciframe%20width%3D%5C%22560%5C%22%20height%3D%5C%22315%5C%22%20src%3D%5C%22https%3A%2F%2Fwww.youtube.com%2Fembed%2FuM4InNEGHkM%5C%22%20frameborder%3D%5C%220%5C%22%20allow%3D%5C%22accelerometer%3B%20autoplay%3B%20encrypted-media%3B%20gyroscope%3B%20picture-in-picture%5C%22%20allowfullscreen%20autoplay%3D%5C%22autoplay%5C%22%3E%3C%2Fiframe%3E%22%2C%22image%22%3A%22https://essentials.pixfort.com/photography/wp-content/uploads/sites/27/2020/06/video-4.jpg%22%7D%2C%7B%22embed_code%22%3A%22%3Ciframe%20width%3D%5C%22560%5C%22%20height%3D%5C%22315%5C%22%20src%3D%5C%22https%3A%2F%2Fwww.youtube.com%2Fembed%2FuM4InNEGHkM%5C%22%20frameborder%3D%5C%220%5C%22%20allow%3D%5C%22accelerometer%3B%20autoplay%3B%20encrypted-media%3B%20gyroscope%3B%20picture-in-picture%5C%22%20allowfullscreen%20autoplay%3D%5C%22autoplay%5C%22%3E%3C%2Fiframe%3E%22%2C%22image%22%3A%22https://essentials.pixfort.com/photography/wp-content/uploads/sites/27/2020/06/video-3.jpg%22%7D%2C%7B%22embed_code%22%3A%22%3Ciframe%20width%3D%5C%22560%5C%22%20height%3D%5C%22315%5C%22%20src%3D%5C%22https%3A%2F%2Fwww.youtube.com%2Fembed%2FuM4InNEGHkM%5C%22%20frameborder%3D%5C%220%5C%22%20allow%3D%5C%22accelerometer%3B%20autoplay%3B%20encrypted-media%3B%20gyroscope%3B%20picture-in-picture%5C%22%20allowfullscreen%20autoplay%3D%5C%22autoplay%5C%22%3E%3C%2Fiframe%3E%22%2C%22image%22%3A%22https://essentials.pixfort.com/photography/wp-content/uploads/sites/27/2020/06/video-2.jpg%22%7D%5D" aspect="embed-responsive-16by9" rounded_img="rounded-10" animation="fade-in-up" text_color="heading-default" overlay_color="gradient-primary" slider_num="2" slider_style="pix-style-standard" slider_effect="pix-circular-slider" prevnextbuttons="1" pagedots="1" freescroll="" slider_scale="pix-slider-scale" autoplay="" adaptiveheight="true" righttoleft="" slider_wrap="true" visible_y="pix-overflow-y-visible" visible_overflow="pix-overflow-all-visible" style="" hover_effect="" add_hover_effect=""][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // beauty

    $data = array();
    $data['name'] = __( 'Videos Beauty', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/video/beauty-video-carousel.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all video content';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" bottom_divider_select="8" b_1_color="#f8f9fa" b_2_is_gradient="true" b_2_color="rgba(233,236,239,0.5)" b_3_is_gradient="true" b_3_color="rgba(255,255,255,0.01)" b_3_color_2="rgba(206,196,177,0.5)" css=".vc_custom_1592954604797{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row css=".vc_custom_1591855310794{padding-bottom: 40px !important;}"][vc_column][pix_text size="text-20" bold="font-weight-bold" content_color="heading-default" position="text-center" animation="fade-in-up" max_width="500px" delay="1000"]Make Stunning Websites in Minutes![/pix_text][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="gradient-primary" max_width="650px"]Some Beauty Tutorials[/sliding-text][pix_text size="text-20" content_color="body-default" position="text-center" animation="fade-in-up" max_width="650px" delay="1000"]This is just a simple text made for Essentials awesome template.[/pix_text][pix_button btn_text="Check our YouTube channel" btn_secondary_font="secondary-font" btn_color="white" btn_text_color="heading-default" btn_size="md" btn_effect="1" btn_hover_effect="2" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="yes" btn_div="text-center" btn_animation="fade-in-up" btn_icon="pixicon-play-circle" btn_link="https://essentials.pixfort.com/beauty/shop" btn_anim_delay="600" css=".vc_custom_1591923233368{margin-top: 10px !important;}"][/vc_column][/vc_row][vc_row full_width="stretch_row"][vc_column width="1/3"][pix_video aspect="embed-responsive-16by9" rounded_img="rounded-xl" pix_tilt="tilt" animation="fade-in-up" text_color="heading-default" overlay_color="gradient-primary" overlay_opacity="pix-opacity-7" in_popup="1" style="3" hover_effect="3" add_hover_effect="1" image="https://essentials.pixfort.com/beauty/wp-content/uploads/sites/30/2020/06/shipe-image-12.jpg" embed_code="JTNDaWZyYW1lJTIwd2lkdGglM0QlMjI1NjAlMjIlMjBoZWlnaHQlM0QlMjIzMTUlMjIlMjBzcmMlM0QlMjJodHRwcyUzQSUyRiUyRnd3dy55b3V0dWJlLmNvbSUyRmVtYmVkJTJGdU00SW5ORUdIa00lMjIlMjBmcmFtZWJvcmRlciUzRCUyMjAlMjIlMjBhbGxvdyUzRCUyMmFjY2VsZXJvbWV0ZXIlM0IlMjBhdXRvcGxheSUzQiUyMGVuY3J5cHRlZC1tZWRpYSUzQiUyMGd5cm9zY29wZSUzQiUyMHBpY3R1cmUtaW4tcGljdHVyZSUyMiUyMGFsbG93ZnVsbHNjcmVlbiUyMGF1dG9wbGF5JTNEJTIyYXV0b3BsYXklMjIlM0UlM0MlMkZpZnJhbWUlM0U=" css=".vc_custom_1593012186221{padding-top: 40px !important;padding-bottom: 40px !important;}"][/vc_column][vc_column width="1/3"][pix_video aspect="embed-responsive-16by9" rounded_img="rounded-xl" pix_tilt="tilt" animation="fade-in-up" text_color="heading-default" overlay_color="gradient-primary" overlay_opacity="pix-opacity-7" in_popup="1" style="3" hover_effect="3" add_hover_effect="1" image="https://essentials.pixfort.com/beauty/wp-content/uploads/sites/30/2020/06/shipe-image-9.jpg" embed_code="JTNDaWZyYW1lJTIwd2lkdGglM0QlMjI1NjAlMjIlMjBoZWlnaHQlM0QlMjIzMTUlMjIlMjBzcmMlM0QlMjJodHRwcyUzQSUyRiUyRnd3dy55b3V0dWJlLmNvbSUyRmVtYmVkJTJGdU00SW5ORUdIa00lMjIlMjBmcmFtZWJvcmRlciUzRCUyMjAlMjIlMjBhbGxvdyUzRCUyMmFjY2VsZXJvbWV0ZXIlM0IlMjBhdXRvcGxheSUzQiUyMGVuY3J5cHRlZC1tZWRpYSUzQiUyMGd5cm9zY29wZSUzQiUyMHBpY3R1cmUtaW4tcGljdHVyZSUyMiUyMGFsbG93ZnVsbHNjcmVlbiUyMGF1dG9wbGF5JTNEJTIyYXV0b3BsYXklMjIlM0UlM0MlMkZpZnJhbWUlM0U=" css=".vc_custom_1593012192379{padding-top: 40px !important;padding-bottom: 40px !important;}"][/vc_column][vc_column width="1/3"][pix_video aspect="embed-responsive-16by9" rounded_img="rounded-xl" pix_tilt="tilt" animation="fade-in-up" text_color="heading-default" overlay_color="gradient-primary" overlay_opacity="pix-opacity-7" in_popup="1" style="3" hover_effect="3" add_hover_effect="1" image="https://essentials.pixfort.com/beauty/wp-content/uploads/sites/30/2020/06/shipe-image-11.jpg" embed_code="JTNDaWZyYW1lJTIwd2lkdGglM0QlMjI1NjAlMjIlMjBoZWlnaHQlM0QlMjIzMTUlMjIlMjBzcmMlM0QlMjJodHRwcyUzQSUyRiUyRnd3dy55b3V0dWJlLmNvbSUyRmVtYmVkJTJGdU00SW5ORUdIa00lMjIlMjBmcmFtZWJvcmRlciUzRCUyMjAlMjIlMjBhbGxvdyUzRCUyMmFjY2VsZXJvbWV0ZXIlM0IlMjBhdXRvcGxheSUzQiUyMGVuY3J5cHRlZC1tZWRpYSUzQiUyMGd5cm9zY29wZSUzQiUyMHBpY3R1cmUtaW4tcGljdHVyZSUyMiUyMGFsbG93ZnVsbHNjcmVlbiUyMGF1dG9wbGF5JTNEJTIyYXV0b3BsYXklMjIlM0UlM0MlMkZpZnJhbWUlM0U=" css=".vc_custom_1593012199982{padding-top: 40px !important;padding-bottom: 40px !important;}"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // kb

    $data = array();
    $data['name'] = __( 'Video carousel 3 Knowledge base', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/video/kb-video-3.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all video content';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1590020309663{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_row content_placement="middle"][vc_column width="2/3" css=".vc_custom_1561772161711{margin-top: 20px !important;margin-bottom: 20px !important;}"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h3" text_color="heading-default"]Handpicked video tutorials[/sliding-text][pix_text size="text-18" content_color="body-default" animation="fade-in-up" delay="400"]Combine seamlessly fitting layouts, customize everything[/pix_text][/vc_column][vc_column width="1/3" content_align="text-right" el_class="d-md-flex align-items-center"][pix_button btn_text="View all videos" btn_color="red" btn_size="md" btn_rounded="btn-rounded" btn_effect="2" btn_hover_effect="2" btn_add_hover_effect="" btn_icon_animation="yes" btn_animation="fade-in-left" btn_link="https://essentials.pixfort.com/software/blog/" btn_icon="pixicon-play-circle" btn_anim_delay="800"][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1590205760905{padding-bottom: 20px !important;}"][vc_column][pix_video_slider items="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/knowledge-base-demo/wp-content/uploads/sites/7/2020/05/kb-card-2.png%22%7D%2C%7B%22embed_code%22%3A%22%3Ciframe%20width%3D%5C%22560%5C%22%20height%3D%5C%22315%5C%22%20src%3D%5C%22https%3A%2F%2Fwww.youtube.com%2Fembed%2FuM4InNEGHkM%5C%22%20frameborder%3D%5C%220%5C%22%20allow%3D%5C%22accelerometer%3B%20autoplay%3B%20encrypted-media%3B%20gyroscope%3B%20picture-in-picture%5C%22%20allowfullscreen%20autoplay%3D%5C%22autoplay%5C%22%3E%3C%2Fiframe%3E%22%2C%22image%22%3A%22https://essentials.pixfort.com/knowledge-base-demo/wp-content/uploads/sites/7/2020/05/kb-card-3.png%22%7D%2C%7B%22embed_code%22%3A%22%3Ciframe%20width%3D%5C%22560%5C%22%20height%3D%5C%22315%5C%22%20src%3D%5C%22https%3A%2F%2Fwww.youtube.com%2Fembed%2FuM4InNEGHkM%5C%22%20frameborder%3D%5C%220%5C%22%20allow%3D%5C%22accelerometer%3B%20autoplay%3B%20encrypted-media%3B%20gyroscope%3B%20picture-in-picture%5C%22%20allowfullscreen%20autoplay%3D%5C%22autoplay%5C%22%3E%3C%2Fiframe%3E%22%2C%22image%22%3A%22https://essentials.pixfort.com/knowledge-base-demo/wp-content/uploads/sites/7/2020/05/kb-card-1-2.png%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/knowledge-base-demo/wp-content/uploads/sites/7/2020/05/kb-card-2.png%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/knowledge-base-demo/wp-content/uploads/sites/7/2020/05/kb-card-1.png%22%7D%5D" aspect="embed-responsive-16by9" rounded_img="rounded-xl" animation="fade-in-up" size="80" overlay_color="gradient-primary" overlay_opacity="pix-opacity-9" slider_num="3" slider_style="pix-style-standard" slider_effect="pix-fade-out-effect" prevnextbuttons="1" pagedots="1" freescroll="" cellalign="left" slider_scale="" autoplay="" adaptiveheight="true" righttoleft="" slider_wrap="true" visible_y="pix-overflow-y-visible" visible_overflow="pix-overflow-all-visible" style="2" hover_effect="3" add_hover_effect="4" css=".vc_custom_1590208810510{padding-top: 80px !important;padding-bottom: 80px !important;}"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'Video carousel 2 Knowledge base', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/video/kb-video-2.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all video content';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1590020309663{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_row content_placement="middle"][vc_column width="2/3" css=".vc_custom_1561772161711{margin-top: 20px !important;margin-bottom: 20px !important;}"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h3" text_color="heading-default"]Handpicked video tutorials[/sliding-text][pix_text size="text-18" content_color="body-default" animation="fade-in-up" delay="400"]Combine seamlessly fitting layouts, customize everything[/pix_text][/vc_column][vc_column width="1/3" content_align="text-right" el_class="d-md-flex align-items-center"][pix_button btn_text="View all videos" btn_color="red" btn_size="md" btn_rounded="btn-rounded" btn_effect="2" btn_hover_effect="2" btn_add_hover_effect="" btn_icon_animation="yes" btn_animation="fade-in-left" btn_link="https://essentials.pixfort.com/software/blog/" btn_icon="pixicon-play-circle" btn_anim_delay="800"][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1590205760905{padding-bottom: 20px !important;}"][vc_column][pix_video_slider items="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/knowledge-base-demo/wp-content/uploads/sites/7/2020/05/kb-card-2.png%22%7D%2C%7B%22embed_code%22%3A%22%3Ciframe%20width%3D%5C%22560%5C%22%20height%3D%5C%22315%5C%22%20src%3D%5C%22https%3A%2F%2Fwww.youtube.com%2Fembed%2FuM4InNEGHkM%5C%22%20frameborder%3D%5C%220%5C%22%20allow%3D%5C%22accelerometer%3B%20autoplay%3B%20encrypted-media%3B%20gyroscope%3B%20picture-in-picture%5C%22%20allowfullscreen%20autoplay%3D%5C%22autoplay%5C%22%3E%3C%2Fiframe%3E%22%2C%22image%22%3A%22https://essentials.pixfort.com/knowledge-base-demo/wp-content/uploads/sites/7/2020/05/kb-card-3.png%22%7D%2C%7B%22embed_code%22%3A%22%3Ciframe%20width%3D%5C%22560%5C%22%20height%3D%5C%22315%5C%22%20src%3D%5C%22https%3A%2F%2Fwww.youtube.com%2Fembed%2FuM4InNEGHkM%5C%22%20frameborder%3D%5C%220%5C%22%20allow%3D%5C%22accelerometer%3B%20autoplay%3B%20encrypted-media%3B%20gyroscope%3B%20picture-in-picture%5C%22%20allowfullscreen%20autoplay%3D%5C%22autoplay%5C%22%3E%3C%2Fiframe%3E%22%2C%22image%22%3A%22https://essentials.pixfort.com/knowledge-base-demo/wp-content/uploads/sites/7/2020/05/kb-card-1-2.png%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/knowledge-base-demo/wp-content/uploads/sites/7/2020/05/kb-card-2.png%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/knowledge-base-demo/wp-content/uploads/sites/7/2020/05/kb-card-1.png%22%7D%5D" aspect="embed-responsive-16by9" rounded_img="rounded-xl" animation="fade-in-up" overlay_color="gradient-primary" overlay_opacity="pix-opacity-9" slider_num="2" slider_style="pix-style-standard" slider_effect="pix-fade-out-effect" prevnextbuttons="1" pagedots="1" freescroll="" cellalign="left" slider_scale="" autoplay="" adaptiveheight="true" righttoleft="" slider_wrap="true" visible_y="pix-overflow-y-visible" visible_overflow="pix-overflow-all-visible" style="2" hover_effect="3" add_hover_effect="4" css=".vc_custom_1593020183457{padding-top: 80px !important;padding-bottom: 80px !important;}"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // original

    $data = array();
    $data['name'] = __( 'Video in About simple page', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/video/original-about-simple-video.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all video content';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" bottom_divider_select="19" b_has_animation="true" b_1_color="#f8f9fa" b_2_is_gradient="true" b_2_color="#ffffff" b_2_color_2="rgba(255,255,255,0.9)" b_2_animation="fade-in-up" b_3_is_gradient="true" b_3_color="#e9ecef" b_3_color_2="#dee2e6" b_3_animation="fade-in-up" css=".vc_custom_1593126602311{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}" b_3_delay="200"][vc_row][vc_column][pix_video aspect="embed-responsive-16by9" rounded_img="rounded-xl" pix_tilt="tilt" text_color="heading-default" overlay_opacity="pix-opacity-9" style="3" hover_effect="" add_hover_effect="" image="https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2020/05/pricing-simple-intro-image.jpg" embed_code="JTNDaWZyYW1lJTIwd2lkdGglM0QlMjI1NjAlMjIlMjBoZWlnaHQlM0QlMjIzMTUlMjIlMjBzcmMlM0QlMjJodHRwcyUzQSUyRiUyRnd3dy55b3V0dWJlLmNvbSUyRmVtYmVkJTJGdU00SW5ORUdIa00lMjIlMjBmcmFtZWJvcmRlciUzRCUyMjAlMjIlMjBhbGxvdyUzRCUyMmFjY2VsZXJvbWV0ZXIlM0IlMjBhdXRvcGxheSUzQiUyMGVuY3J5cHRlZC1tZWRpYSUzQiUyMGd5cm9zY29wZSUzQiUyMHBpY3R1cmUtaW4tcGljdHVyZSUyMiUyMGFsbG93ZnVsbHNjcmVlbiUzRSUzQyUyRmlmcmFtZSUzRQ=="][/vc_column][/vc_row][vc_row css=".vc_custom_1589320102942{padding-top: 40px !important;}"][vc_column offset="vc_col-md-offset-2 vc_col-md-8"][pix_badge bold="font-weight-bold" secondary_font="secondary-font" text_color="heading-default" bg_color="gray-2" style="" hover_effect="" add_hover_effect="" element_div="text-center" padding="" text="Made by pixfort team" css=".vc_custom_1589321131449{margin-bottom: 20px !important;padding-top: 9px !important;padding-right: 15px !important;padding-bottom: 9px !important;padding-left: 15px !important;}"][pix_text content_color="body-default" position="text-center" animation="fade-in-up" delay="200"]Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dolar elite monda ont ca enim ad nowe minim veniam.[/pix_text][circles circles="%5B%7B%22title%22%3A%22Sara%20Hadid%22%2C%22img%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2020/04/thumbnail-person-2.jpg%22%2C%22color%22%3A%22pix-bg-custom%22%7D%2C%7B%22title%22%3A%22John%20Doe%22%2C%22img%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2020/04/thumbnail-person-1.jpg%22%2C%22color%22%3A%22pix-bg-custom%22%7D%2C%7B%22title%22%3A%22Carla%20Smith%22%2C%22img%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2020/04/thumbnail-person-3.jpg%22%2C%22color%22%3A%22pix-bg-custom%22%7D%5D" effect="" circles_align="justify-content-center" btn_text="Purchase Essentials" btn_secondary_font="secondary-font" btn_style="underline" btn_color="yellow" btn_text_color="heading-default" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="yes" btn_link="https://pixfort.website/redirect?to=essentials" btn_icon="pixicon-angle-right" c_css=".vc_custom_1588609567596{padding-top: 10px !important;}"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'Video with content Portfolio item VIDEO', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/video/original-video-portfolio-video.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all video content';
    $data['content']  = <<<CONTENT
[vc_section pix_over_visibility="" css=".vc_custom_1593128807949{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_row][vc_column content_align="text-center" offset="vc_col-md-offset-1 vc_col-md-10"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="heading-default" max_width="700px"]Add any content to create a stunning portfolio item page![/sliding-text][pix_text size="text-18" content_color="body-default" position="text-center" max_width="650px" css=".vc_custom_1588503065090{padding-bottom: 40px !important;}"]Making a stunning and professional websites has never been easier, today with Essentials you will be able to build awesome websites in no time![/pix_text][pix_video aspect="embed-responsive-16by9" rounded_img="rounded-10" pix_tilt="tilt" animation="fade-in-up" text_color="heading-default" overlay_color="heading-default" overlay_opacity="pix-opacity-10" in_popup="1" style="3" hover_effect="3" add_hover_effect="1" image="https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2020/04/image-carousel-original-1-1.jpg" embed_code="JTNDaWZyYW1lJTIwd2lkdGglM0QlMjI1NjAlMjIlMjBoZWlnaHQlM0QlMjIzMTUlMjIlMjBzcmMlM0QlMjJodHRwcyUzQSUyRiUyRnd3dy55b3V0dWJlLmNvbSUyRmVtYmVkJTJGdU00SW5ORUdIa00lMjIlMjBmcmFtZWJvcmRlciUzRCUyMjAlMjIlMjBhbGxvdyUzRCUyMmFjY2VsZXJvbWV0ZXIlM0IlMjBhdXRvcGxheSUzQiUyMGVuY3J5cHRlZC1tZWRpYSUzQiUyMGd5cm9zY29wZSUzQiUyMHBpY3R1cmUtaW4tcGljdHVyZSUyMiUyMGFsbG93ZnVsbHNjcmVlbiUyMGF1dG9wbGF5JTNEJTIyYXV0b3BsYXklMjIlM0UlM0MlMkZpZnJhbWUlM0U="][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'Video popup and CTA Portfolio item GALLERY', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/video/original-gallery-portfolio-video.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all video content cta';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" bottom_divider_select="19" bottom_layers="1" b_1_color="#f8f9fa" css=".vc_custom_1593132773050{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row][vc_column content_align="text-center" offset="vc_col-md-offset-1 vc_col-md-10"][content_box style="6" hover_effect="" add_hover_effect="" rounded_box="rounded-10" animation="" css=".vc_custom_1588760099650{padding-top: 60px !important;padding-right: 30px !important;padding-bottom: 60px !important;padding-left: 30px !important;background-color: #ffffff !important;}"][pix_video_popup aspect="embed-responsive-16by9" animation="fade-in-up" text_color="heading-default" bg_color="gray-1" embed_code="JTNDaWZyYW1lJTIwd2lkdGglM0QlMjI1NjAlMjIlMjBoZWlnaHQlM0QlMjIzMTUlMjIlMjBzcmMlM0QlMjJodHRwcyUzQSUyRiUyRnd3dy55b3V0dWJlLmNvbSUyRmVtYmVkJTJGdU00SW5ORUdIa00lMjIlMjBmcmFtZWJvcmRlciUzRCUyMjAlMjIlMjBhbGxvdyUzRCUyMmFjY2VsZXJvbWV0ZXIlM0IlMjBhdXRvcGxheSUzQiUyMGVuY3J5cHRlZC1tZWRpYSUzQiUyMGd5cm9zY29wZSUzQiUyMHBpY3R1cmUtaW4tcGljdHVyZSUyMiUyMGFsbG93ZnVsbHNjcmVlbiUyMGF1dG9wbGF5JTNEJTIyYXV0b3BsYXklMjIlM0UlM0MlMkZpZnJhbWUlM0U="][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h2" text_color="heading-default" max_width="600px" css=".vc_custom_1588760130768{padding-top: 30px !important;}"]Start creating stunning websites in minutes![/sliding-text][pix_text size="text-20" content_color="body-default" animation="fade-in-up" delay="400" max_width="500px"]Creating stunning and professional websites has never been easier, today with Essentials you will be able to build awesome websites in no time![/pix_text][pix_button btn_text="Purchase Essentials" btn_secondary_font="secondary-font" btn_style="flat" btn_color="gradient-primary" btn_text_color="white" btn_size="md" btn_effect="6" btn_hover_effect="4" btn_add_hover_effect="7" btn_icon_position="after" btn_animation="fade-in-up" btn_link="https://pixfort.website/redirect?to=essentials" btn_icon="pixicon-angle-right" btn_anim_delay="400"][/content_box][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // seo

    $data = array();
    $data['name'] = __( 'Video content SEO', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/video/seo-about-page-video-content.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all video content';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" bottom_divider_select="20" bottom_layers="1" pix_overlay_color="gray-1" responsive_css="{``pix_res_sm_pt``:``20``,``pix_res_sm_pb``:``20``,``pix_res_md_pt``:``40``,``pix_res_md_pb``:``40``}" css=".vc_custom_1604715640738{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}" pix_overlay_opacity="1"][vc_row content_placement="middle" pix_particles_check=""][vc_column width="1/2" css=".vc_custom_1591234701512{padding-right: 20px !important;padding-left: 20px !important;}"][pix_highlighted_text items="%5B%7B%22text%22%3A%22Create%20stunning%20websites%20and%20landing%20pages%20%22%2C%22highlight_color%22%3A%22%23ffd900%22%2C%22heading_font%22%3A%22heading-font%22%7D%2C%7B%22text%22%3A%22in%20minutes!%22%2C%22is_highlighted%22%3A%22true%22%2C%22highlight_color%22%3A%22%23ffd900%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%7D%5D" title_size="h2" position="text-left" heading_id="1603927077393-5d603e25-5894" css=".vc_custom_1603927258635{padding-bottom: 20px !important;}"][pix_feature_list content_size="text-20" content_color="body-default" icon_color="secondary" features="%5B%7B%22text%22%3A%22Track%20your%20teams%20progress%20with%20mobile%20app%22%2C%22media_type%22%3A%22duo_icon%22%2C%22pix_duo_icon%22%3A%22done-circle%22%2C%22icon%22%3A%22pixicon-user-male-menu%22%7D%2C%7B%22text%22%3A%22Focus%20on%20your%20important%20tasks%20and%20orders%22%2C%22media_type%22%3A%22duo_icon%22%2C%22pix_duo_icon%22%3A%22done-circle%22%2C%22icon%22%3A%22pixicon-slides-flow%22%7D%2C%7B%22text%22%3A%22Pay%20up%20to%20%2450k%20with%20premium%20credit%20card%22%2C%22media_type%22%3A%22duo_icon%22%2C%22pix_duo_icon%22%3A%22done-circle%22%2C%22icon%22%3A%22pixicon-check-circle-1%22%7D%5D" flist_bold="" css=".vc_custom_1603927626735{padding-bottom: 20px !important;}"][pix_button btn_text="Discover all Features" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" btn_link="#" btn_icon="pixicon-plane-takingoff-1"][/vc_column][vc_column width="1/2" css=".vc_custom_1592230956225{padding-top: 20px !important;padding-bottom: 20px !important;}"][pix_video aspect="embed-responsive-16by9" rounded_img="rounded-10" animation="fade-in-up" overlay_color="primary" in_popup="1" style="" hover_effect="" add_hover_effect="7" image="https://essentials.pixfort.com/seo/wp-content/uploads/sites/42/2020/02/software-image-5.png" css=".vc_custom_1605414316748{padding-top: 120px !important;padding-bottom: 120px !important;}" embed_code="JTNDaWZyYW1lJTIwd2lkdGglM0QlMjI1NjAlMjIlMjBoZWlnaHQlM0QlMjIzMTUlMjIlMjBzcmMlM0QlMjJodHRwcyUzQSUyRiUyRnd3dy55b3V0dWJlLmNvbSUyRmVtYmVkJTJGS21HYVYxMkExeDglMjIlMjBmcmFtZWJvcmRlciUzRCUyMjAlMjIlMjBhbGxvdyUzRCUyMmFjY2VsZXJvbWV0ZXIlM0IlMjBhdXRvcGxheSUzQiUyMGNsaXBib2FyZC13cml0ZSUzQiUyMGVuY3J5cHRlZC1tZWRpYSUzQiUyMGd5cm9zY29wZSUzQiUyMHBpY3R1cmUtaW4tcGljdHVyZSUyMiUyMGFsbG93ZnVsbHNjcmVlbiUzRSUzQyUyRmlmcmFtZSUzRQ=="][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // modern

    $data = array();
    $data['name'] = __( 'Video with features Modern', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/video/modern-features-video.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all video features content';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" bottom_divider_select="8" bottom_layers="1" b_has_animation="true" b_1_is_gradient="true" b_1_color="rgba(10,10,10,0.01)" b_1_color_2="rgba(0,0,0,0.4)" b_1_animation="fade-in-down" top_divider_select="8" top_layers="1" t_has_animation="true" t_1_is_gradient="true" t_1_color="rgba(255,255,255,0.01)" t_1_color_2="rgba(255,255,255,0.1)" t_1_animation="fade-in-up" css=".vc_custom_1613441469590{padding-top: 120px !important;padding-bottom: 120px !important;background-color: #212529 !important;}" t_1_delay="300" b_1_delay="500"][vc_row content_placement="middle" pix_particles_check=""][vc_column width="2/3"][pix_video_popup aspect="embed-responsive-16by9" animation="fade-in-up" text_color="heading-default" embed_code="JTNDaWZyYW1lJTIwd2lkdGglM0QlMjI1NjAlMjIlMjBoZWlnaHQlM0QlMjIzMTUlMjIlMjBzcmMlM0QlMjJodHRwcyUzQSUyRiUyRnd3dy55b3V0dWJlLmNvbSUyRmVtYmVkJTJGS21HYVYxMkExeDglMjIlMjBmcmFtZWJvcmRlciUzRCUyMjAlMjIlMjBhbGxvdyUzRCUyMmFjY2VsZXJvbWV0ZXIlM0IlMjBhdXRvcGxheSUzQiUyMGNsaXBib2FyZC13cml0ZSUzQiUyMGVuY3J5cHRlZC1tZWRpYSUzQiUyMGd5cm9zY29wZSUzQiUyMHBpY3R1cmUtaW4tcGljdHVyZSUyMiUyMGFsbG93ZnVsbHNjcmVlbiUzRSUzQyUyRmlmcmFtZSUzRQ=="][sliding-text bold="font-weight-bold" secondary_font="secondary-font" text_color="white" css=".vc_custom_1613438055457{padding-top: 30px !important;padding-bottom: 30px !important;}"]Introducing a new revolutionary method to build stunning word-class websites.[/sliding-text][pix_text size="text-20" bold="font-weight-bold" content_color="light-opacity-6" css=".vc_custom_1613434787671{padding-top: 10px !important;}" max_width="600px"]Combine seamlessly fitting layouts, customize everything you want, switch components on the go using Essentials theme.[/pix_text][/vc_column][vc_column width="1/3"][pix_feature media_type="icon" title_size="h4" title_color="white" title_bold="font-weight-bold" title_secondary_font="secondary-font" content_size="text-18" content_color="body-default" content_bold="font-weight-bold" icon_size="48" padding_title="15px" padding_content="15px" animation="fade-in-up" title="Fully secure platform with premium support." css=".vc_custom_1613438207765{padding-top: 20px !important;padding-right: 20px !important;padding-bottom: 30px !important;padding-left: 20px !important;}" element_id="1613437650682-2edc7f35-9499" icon="pixicon-music-notation"]Get Essentials today and start building next-generation websites.[/pix_feature][pix_feature media_type="icon" title_size="h4" title_color="white" title_bold="font-weight-bold" title_secondary_font="secondary-font" content_size="text-18" content_color="body-default" content_bold="font-weight-bold" icon_size="48" padding_title="15px" padding_content="15px" animation="fade-in-up" title="Unlimited future updates with Essentials theme." css=".vc_custom_1613438197569{padding-top: 20px !important;padding-right: 20px !important;padding-bottom: 30px !important;padding-left: 20px !important;}" element_id="1613437650573-ee6edafd-4914" icon="pixicon-user-female-menu"]Get Essentials today and start building next-generation websites.[/pix_feature][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    return $templates;
}




 ?>
