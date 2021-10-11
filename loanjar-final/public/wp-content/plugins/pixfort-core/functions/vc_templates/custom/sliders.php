<?php




function pix_templates_sliders(){
    $templates = array();

    // marketing

    $data = array(); // Create new array
    $data['name'] = __( 'Slider Bold', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/sliders/bold-intro.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all sliders intros'; // CSS class name
    $data['content']  = <<<CONTENT
 [vc_row full_width="stretch_row_content" css=".vc_custom_1592508275889{padding-top: 40px !important;padding-bottom: 40px !important;background-color: #ffffff !important;}"][vc_column][pix_slider items="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/bold/wp-content/uploads/sites/13/2020/06/bold-slider-image-2.jpg%22%2C%22title%22%3A%22Think%20you%20know%20Bold%3F%20Think%20deeper.%22%2C%22text%22%3A%22%20%22%2C%22btn_text%22%3A%22Purchase%20Essentials%22%2C%22link%22%3A%22http%3A%2F%2Fpixfort.website%2Fredirect%3Fto%3Dessentials%22%2C%22target%22%3A%22true%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/bold/wp-content/uploads/sites/13/2020/06/bold-slider-image-1.jpg%22%2C%22title%22%3A%22Build%20an%20online%20business%20in%20minutes.%22%2C%22text%22%3A%22%20%22%2C%22btn_text%22%3A%22Purchase%20Essentials%22%2C%22link%22%3A%22http%3A%2F%2Fpixfort.website%2Fredirect%3Fto%3Dessentials%22%2C%22target%22%3A%22true%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/bold/wp-content/uploads/sites/13/2020/06/bold-slider-image-3.jpg%22%2C%22title%22%3A%22Think%20you%20know%20Bold%3F%20Think%20deeper.%22%2C%22text%22%3A%22%20%22%2C%22btn_text%22%3A%22Purchase%20Essentials%22%2C%22link%22%3A%22http%3A%2F%2Fpixfort.website%2Fredirect%3Fto%3Dessentials%22%2C%22target%22%3A%22true%22%7D%5D" rounded_img="rounded-10" align="text-center" nav_style="circles" secondary_font="secondary-font" title_color="white" title_size="h1" overlay_color="gradient-primary" overlay_opacity="pix-opacity-2" btn_color="gray-8" btn_size="xl" btn_rounded="btn-rounded" btn_effect="6" btn_hover_effect="6" btn_add_hover_effect="" btn_icon_animation="yes" btn_animation="fade-in-up" style="" hover_effect="" add_hover_effect="" btn_icon="pixicon-bag-2" btn_anim_delay="1200" css=".vc_custom_1592124536210{background-color: #ffffff !important;}"][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // creative

    $data = array(); // Create new array
    $data['name'] = __( 'Slider Creative', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/sliders/creative-intro.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all sliders intros'; // CSS class name
    $data['content']  = <<<CONTENT
 [vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1592516302458{background-color: #ffffff !important;}"][vc_column][pix_slider items="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/creative/wp-content/uploads/sites/14/2020/05/slider-image-1-1.jpg%22%2C%22title%22%3A%22Create%20Stunning%20Portfolio%20Layouts%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%20Combine%20layouts%2C%20customize%20everything.%22%2C%22btn_text%22%3A%22Purchase%20Essentials%22%2C%22link%22%3A%22http%3A%2F%2Fpixfort.website%2Fredirect%3Fto%3Dessentials%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/creative/wp-content/uploads/sites/14/2020/06/slider-image-2.jpg%22%2C%22title%22%3A%22Build%20powerful%20online%20store%20in%20minutes.%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%20Combine%20layouts%2C%20customize%20everything.%22%2C%22btn_text%22%3A%22Purchase%20Essentials%22%2C%22link%22%3A%22http%3A%2F%2Fpixfort.website%2Fredirect%3Fto%3Dessentials%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/creative/wp-content/uploads/sites/14/2020/06/slider-image-3.jpg%22%2C%22title%22%3A%22Create%20Stunning%20Portfolio%20Layouts%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%20Combine%20layouts%2C%20customize%20everything.%22%2C%22btn_text%22%3A%22Purchase%20Essentials%22%2C%22link%22%3A%22http%3A%2F%2Fpixfort.website%2Fredirect%3Fto%3Dessentials%22%7D%5D" nav_style="circles" circles_color="primary" title_color="white" title_size="h1" content_color="light-opacity-8" overlay_color="gradient-primary" overlay_opacity="pix-opacity-2" btn_size="md" btn_effect="3" btn_hover_effect="3" btn_add_hover_effect="" btn_icon_animation="yes" btn_animation="fade-in-up" style="" hover_effect="" add_hover_effect="" btn_icon="pixicon-arrow-right2" btn_anim_delay="1400" css=".vc_custom_1592352432061{background-color: #ffffff !important;}"][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // ecommerce

    $data = array(); // Create new array
    $data['name'] = __( 'Slider Ecommerce', 'essentials-core' ); // Assign name for your custom template
    $data['weight'] = 0; // Weight of your template in the template list
    $data['type'] = 'default_templates'; // Weight of your template in the template list
    $data['category'] = 'default_templates'; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/sliders/ecommerce-intro.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all sliders intros'; // CSS class name
    $data['content']  = <<<CONTENT
 [vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1591320879303{background-color: #ffffff !important;}"][vc_column][pix_slider items="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/ecommerce/wp-content/uploads/sites/18/2020/06/image-intro-1.jpg%22%2C%22title%22%3A%22Build%20an%20online%20business%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%20Combine%20layouts%2C%20customize%20everything.%22%2C%22btn_text%22%3A%22Purchase%20Essentials%22%2C%22link%22%3A%22http%3A%2F%2Fpixfort.website%2Fredirect%3Fto%3Dessentials%22%2C%22target%22%3A%22true%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/ecommerce/wp-content/uploads/sites/18/2020/06/image-intro-2.jpg%22%2C%22title%22%3A%22Build%20an%20online%20business%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%20Combine%20layouts%2C%20customize%20everything.%22%2C%22btn_text%22%3A%22Purchase%20Essentials%22%2C%22link%22%3A%22http%3A%2F%2Fpixfort.website%2Fredirect%3Fto%3Dessentials%22%2C%22target%22%3A%22true%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/ecommerce/wp-content/uploads/sites/18/2020/06/image-intro-3.jpg%22%2C%22title%22%3A%22Build%20an%20online%20business%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%20Combine%20layouts%2C%20customize%20everything.%22%2C%22btn_text%22%3A%22Purchase%20Essentials%22%2C%22link%22%3A%22http%3A%2F%2Fpixfort.website%2Fredirect%3Fto%3Dessentials%22%2C%22target%22%3A%22true%22%7D%5D" nav_style="circles" nav_align="left" circles_color="primary" title_color="white" content_color="light-opacity-7" content_size="text-20" overlay_color="gray-8" overlay_opacity="pix-opacity-3" btn_size="md" btn_rounded="btn-rounded" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" style="" hover_effect="" add_hover_effect="" btn_icon="pixicon-bag-2"][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // foundation

    $data = array();
    $data['name'] = __( 'Slider Foundation', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/sliders/foundation-intro.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all sliders intros';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][pix_slider items="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/foundation/wp-content/uploads/sites/19/2020/06/slider-image-1.jpg%22%2C%22title%22%3A%22We%20provide%20support%20to%20local%20communities%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%20Combine%20layouts%2C%20customize%20everything.%22%2C%22btn_text%22%3A%22Make%20a%20donation%22%2C%22link%22%3A%22http%3A%2F%2Fpixfort.website%2Fredirect%3Fto%3Dessentials%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/foundation/wp-content/uploads/sites/19/2020/06/slider-image-2.jpg%22%2C%22title%22%3A%22We%20provide%20support%20to%20local%20communities%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%20Combine%20layouts%2C%20customize%20everything.%22%2C%22btn_text%22%3A%22Purchase%20Essentials%22%2C%22link%22%3A%22http%3A%2F%2Fpixfort.website%2Fredirect%3Fto%3Dessentials%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/foundation/wp-content/uploads/sites/19/2020/06/slider-image-3.jpg%22%2C%22title%22%3A%22We%20provide%20support%20to%20local%20communities%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%20Combine%20layouts%2C%20customize%20everything.%22%2C%22btn_text%22%3A%22Purchase%20Essentials%22%2C%22link%22%3A%22http%3A%2F%2Fpixfort.website%2Fredirect%3Fto%3Dessentials%22%7D%5D" title_color="white" title_size="h1" content_color="light-opacity-6" content_size="text-20" overlay_color="secondary" overlay_opacity="pix-opacity-2" btn_size="lg" btn_effect="6" btn_hover_effect="4" btn_add_hover_effect="7" btn_animation="fade-in-up" style="" hover_effect="" add_hover_effect="" btn_icon="pixicon-dollar-coin" btn_anim_delay="1400"][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // construction

    $data = array();
    $data['name'] = __( 'Slider Construction', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/sliders/construction-intro.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all sliders intros';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][pix_slider items="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/construction/wp-content/uploads/sites/20/2020/06/slider-image-3.jpg%22%2C%22title%22%3A%22Start%20Building%20Your%20Dream%20Home.%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%22%2C%22btn_text%22%3A%22Purchase%20Essentials%22%2C%22link%22%3A%22http%3A%2F%2Fpixfort.website%2Fredirect%3Fto%3Dessentials%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/construction/wp-content/uploads/sites/20/2020/06/slider-image-2.jpg%22%2C%22title%22%3A%22We%20Provide%20High%20Quality%20Services.%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%22%2C%22btn_text%22%3A%22Purchase%20Essentials%22%2C%22link%22%3A%22http%3A%2F%2Fpixfort.website%2Fredirect%3Fto%3Dessentials%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/construction/wp-content/uploads/sites/20/2020/06/slider-image-1.jpg%22%2C%22title%22%3A%22Start%20Building%20Your%20Dream%20Home.%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%22%2C%22btn_text%22%3A%22Purchase%20Essentials%22%2C%22link%22%3A%22http%3A%2F%2Fpixfort.website%2Fredirect%3Fto%3Dessentials%22%7D%5D" nav_style="circles" nav_align="left" circles_color="primary" title_color="white" title_size="h1" content_color="light-opacity-7" overlay_color="heading-default" overlay_opacity="pix-opacity-3" btn_text_color="dark-opacity-6" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" btn_animation="fade-in-up" style="" hover_effect="" add_hover_effect="" css=".vc_custom_1592319144339{background-color: #f8f9fa !important;}" btn_icon="pixicon-bag-2" btn_anim_delay="1400"][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'Image slider Construction', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/sliders/construction-image-slider.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all sliders content';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1591149852473{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_row][vc_column][pix_badge bold="font-weight-bold" secondary_font="" text_color="white" bg_color="primary" style="" hover_effect="" add_hover_effect="" animation="fade-in-up" element_div="text-left" padding="" text="Premium Features" css=".vc_custom_1592344680363{padding-top: 7px !important;padding-right: 12px !important;padding-bottom: 7px !important;padding-left: 12px !important;}"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h3" text_color="heading-default" css=".vc_custom_1592344655717{padding-top: 20px !important;}"]Some of Essentials stunning features[/sliding-text][pix_text size="text-20" content_color="body-default" animation="fade-in-up" delay="900" css=".vc_custom_1590548147650{padding-bottom: 10px !important;}"]This is just a simple text made for this unique and awesome template, you can replace it with any text.[/pix_text][/vc_column][/vc_row][vc_row full_width="stretch_row" content_placement="middle" pix_visibility="1" css=".vc_custom_1592670137299{padding-top: 40px !important;}"][vc_column][pix_img_slider items="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/construction/wp-content/uploads/sites/20/2020/06/slider-image-2.jpg%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/construction/wp-content/uploads/sites/20/2020/06/slider-image-1.jpg%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/construction/wp-content/uploads/sites/20/2020/06/slider-image-3.jpg%22%7D%5D" prevnextbuttons="true" pagedots="true" freescroll="" autoplay="" adaptiveheight="true" righttoleft="" slider_wrap="true" visible_y="" visible_overflow="" style="" hover_effect="" add_hover_effect=""][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // business

    $data = array();
    $data['name'] = __( 'Slider Business', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/sliders/business-intro.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all sliders intros';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][pix_slider items="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/business/wp-content/uploads/sites/21/2020/06/image-intro-4.jpg%22%2C%22title%22%3A%22Lead%20your%20Business%20to%20Success%20with%20pixfort.%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time.%22%2C%22btn_text%22%3A%22Purchase%20Essentials%22%2C%22link%22%3A%22http%3A%2F%2Fpixfort.website%2Fredirect%3Fto%3Dessentials%22%2C%22target%22%3A%22true%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/business/wp-content/uploads/sites/21/2020/06/image-intro-2.jpg%22%2C%22title%22%3A%22Join%20the%20Best%20Entreprises%20in%20France%20and%20Europe.%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time.%22%2C%22btn_text%22%3A%22Purchase%20Essentials%22%2C%22link%22%3A%22http%3A%2F%2Fpixfort.website%2Fredirect%3Fto%3Dessentials%22%2C%22target%22%3A%22true%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/business/wp-content/uploads/sites/21/2020/06/image-intro-3.jpg%22%2C%22title%22%3A%22Lead%20your%20Business%20to%20Success%20with%20pixfort.%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time.%22%2C%22btn_text%22%3A%22Purchase%20Essentials%22%2C%22link%22%3A%22http%3A%2F%2Fpixfort.website%2Fredirect%3Fto%3Dessentials%22%2C%22target%22%3A%22true%22%7D%5D" nav_style="circles" nav_align="left" title_color="white" content_color="light-opacity-7" content_size="text-20" overlay_color="gray-8" overlay_opacity="pix-opacity-3" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" style="3" hover_effect="" add_hover_effect="" btn_icon="pixicon-bag-2" css=".vc_custom_1592246682561{background-color: #ffffff !important;}"][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // photography

    $data = array();
    $data['name'] = __( 'Slider Photography', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/sliders/photography-intro.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all sliders intros';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1591638075017{background-color: #ffffff !important;}"][vc_column][pix_slider items="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/photography/wp-content/uploads/sites/27/2020/06/slider-image-2.jpg%22%2C%22title%22%3A%22Build%20a%20Beautiful%20Website%20in%20Minutes!%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%20Combine%20layouts%2C%20customize%20everything.%22%2C%22btn_text%22%3A%22Purchase%20Essentials%22%2C%22link%22%3A%22http%3A%2F%2Fpixfort.website%2Fredirect%3Fto%3Dessentials%22%2C%22target%22%3A%22true%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/photography/wp-content/uploads/sites/27/2020/06/slider-image-3.jpg%22%2C%22title%22%3A%22Build%20a%20Beautiful%20Website%20in%20Minutes!%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%20Combine%20layouts%2C%20customize%20everything.%22%2C%22btn_text%22%3A%22Purchase%20Essentials%22%2C%22link%22%3A%22http%3A%2F%2Fpixfort.website%2Fredirect%3Fto%3Dessentials%22%2C%22target%22%3A%22true%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/photography/wp-content/uploads/sites/27/2020/06/slider-image-1.jpg%22%2C%22title%22%3A%22Build%20a%20Beautiful%20Website%20in%20Minutes!%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%20Combine%20layouts%2C%20customize%20everything.%22%2C%22btn_text%22%3A%22Purchase%20Essentials%22%2C%22link%22%3A%22http%3A%2F%2Fpixfort.website%2Fredirect%3Fto%3Dessentials%22%2C%22target%22%3A%22true%22%7D%5D" align="text-center" nav_style="circles" title_color="white" title_size="h1" content_color="light-opacity-7" content_size="text-20" overlay_color="heading-default" overlay_opacity="pix-opacity-3" btn_style="flat" btn_color="gradient-primary" btn_text_color="white" btn_size="lg" btn_effect="3" btn_hover_effect="3" btn_add_hover_effect="1" btn_icon_animation="yes" btn_animation="fade-in-up" style="3" hover_effect="3" add_hover_effect="" btn_icon="pixicon-slides-1" btn_anim_delay="1600"][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // beauty

    $data = array();
    $data['name'] = __( 'Slider Beauty', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/sliders/beauty-intro.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all sliders intros';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][pix_slider items="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/beauty/wp-content/uploads/sites/30/2020/06/beauty-slider-image-1-1.jpg%22%2C%22title%22%3A%22Everything%20has%20Beauty%2C%20but%20not%20Everyone%20Sees%20it.%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%22%2C%22btn_text%22%3A%22Purchase%20Essentials%22%2C%22link%22%3A%22http%3A%2F%2Fpixfort.website%2Fredirect%3Fto%3Dessentials%22%2C%22target%22%3A%22true%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/beauty/wp-content/uploads/sites/30/2020/06/beauty-slider-image-3.jpg%22%2C%22title%22%3A%22Everything%20has%20Beauty%2C%20but%20not%20Everyone%20Sees%20it.%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%22%2C%22btn_text%22%3A%22Purchase%20Essentials%22%2C%22link%22%3A%22http%3A%2F%2Fpixfort.website%2Fredirect%3Fto%3Dessentials%22%2C%22target%22%3A%22true%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/beauty/wp-content/uploads/sites/30/2020/06/beauty-slider-image-2.jpg%22%2C%22title%22%3A%22Everything%20has%20Beauty.%20but%20not%20Everyone%20Sees%20it.%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%22%2C%22btn_text%22%3A%22Purchase%20Essentials%22%2C%22link%22%3A%22http%3A%2F%2Fpixfort.website%2Fredirect%3Fto%3Dessentials%22%2C%22target%22%3A%22true%22%7D%5D" align="text-center" nav_style="circles" circles_color="transparent" title_size="custom" content_size="text-18" overlay_opacity="pix-opacity-10" btn_color="white" btn_text_color="heading-default" btn_size="lg" btn_effect="5" btn_hover_effect="6" btn_add_hover_effect="" btn_icon_animation="yes" btn_animation="fade-in-up" style="3" hover_effect="" add_hover_effect="" btn_icon="pixicon-bag-2" btn_anim_delay="1400" css=".vc_custom_1591854233388{background-color: #f8f9fa !important;}" title_custom_size="56px"][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    // original

    $data = array();
    $data['name'] = __( 'Slider Portfolio item SHOWCASE', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/sliders/original-showcase-portfolio-slider.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all sliders intros';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1593133574955{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_row content_placement="middle" css=".vc_custom_1593133584405{padding-bottom: 80px !important;}"][vc_column width="1/2"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" size="h3" text_color="gradient-primary" max_width="500px"]Say Hello to the Most Advanced WordPress Theme Ever Made.[/sliding-text][/vc_column][vc_column width="1/2"][pix_text size="text-20" content_color="body-default" animation="fade-in-up" delay="400"]Creating stunning and professional websites has never been easier, today with Essentials you will be able to build awesome websites in no time![/pix_text][pix_button btn_text="View Case Study" btn_secondary_font="secondary-font" btn_style="underline" btn_color="yellow" btn_remove_padding="no-padding" btn_text_color="heading-default" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" btn_link="#" btn_icon="pixicon-arrow-right2"][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces"][vc_column][pix_slider items="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2020/02/slider-image-1.jpg%22%2C%22title%22%3A%22Say%20Hello%20to%20pixfort%20Beautiful%20%26%20Stunning%20Slider%20%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%20Combine%20layouts%2C%20customize%20everything.%22%2C%22btn_text%22%3A%22Purchase%20Essentials%22%2C%22link%22%3A%22http%3A%2F%2Fpixfort.website%2Fredirect%3Fto%3Dessentials%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2020/03/slider-image-5.jpg%22%2C%22title%22%3A%22Create%20Stunning%20Portfolio%20Layouts%20in%20Seconds!%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%20Combine%20layouts%2C%20customize%20everything.%22%2C%22btn_text%22%3A%22Purchase%20Essentials%22%2C%22link%22%3A%22http%3A%2F%2Fpixfort.website%2Fredirect%3Fto%3Dessentials%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2020/03/slider-image-3.jpg%22%2C%22title%22%3A%22Acquire%20New%20Customers%20with%20Essentials%20Theme%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%20Combine%20layouts%2C%20customize%20everything.%22%2C%22btn_text%22%3A%22Purchase%20Essentials%22%2C%22link%22%3A%22http%3A%2F%2Fpixfort.website%2Fredirect%3Fto%3Dessentials%22%7D%5D" align="text-center" nav_style="circles" circles_color="white" title_color="white" content_color="light-opacity-5" content_size="text-20" overlay_color="gradient-primary" overlay_opacity="pix-opacity-2" animation="fade-in-up" btn_style="underline" btn_color="white" btn_size="lg" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_animation="yes" btn_animation="fade-in-up" style="6" hover_effect="" add_hover_effect="" btn_icon="pixicon-bag-2" btn_anim_delay="1600"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'Slider default boxed ELEMENTS', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/sliders/elements-slider-default-boxed.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all sliders intros';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1583105023518{padding-top: 60px !important;padding-bottom: 60px !important;}"][vc_column][pix_slider items="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2020/03/slider-image-9.jpg%22%2C%22title%22%3A%22Say%20Hello%20to%20pixfort%20Slider%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%20Combine%20layouts%2C%20customize%20everything.%22%2C%22btn_text%22%3A%22Start%20building%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2020/03/slider-image-5.jpg%22%2C%22title%22%3A%22World-Class%20Design%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%20Combine%20layouts%2C%20customize%20everything.%22%2C%22btn_text%22%3A%22Get%20Essentials%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2020/03/slider-image-10.jpg%22%2C%22title%22%3A%22Unlimited%20Possibilities%22%2C%22text%22%3A%22Design%20better%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%20Combine%20layouts%2C%20customize%20everything.%22%2C%22btn_text%22%3A%22Make%20your%20website%22%2C%22link%22%3A%22%23%22%7D%5D" rounded_img="rounded-10" align="text-center" title_color="white" content_color="light-opacity-7" content_size="text-20" overlay_opacity="pix-opacity-6" animation="fade-in-up" btn_secondary_font="secondary-font" btn_color="yellow" btn_size="lg" btn_effect="6" btn_hover_effect="4" btn_add_hover_effect="7" btn_icon_position="after" btn_animation="fade-in-up" style="5" hover_effect="" add_hover_effect="" btn_icon="pixicon-angle-right" btn_anim_delay="1600"][/vc_column][/vc_row]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = __( 'Slider circles boxed ELEMENTS', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/sliders/elements-slider-circles-boxed.png', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all sliders intros';
    $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1583105023518{padding-top: 60px !important;padding-bottom: 60px !important;}"][vc_column][pix_slider items="%5B%7B%22image%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2020/03/slider-image-11.jpg%22%2C%22title%22%3A%22World-Class%20Design%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%20Combine%20layouts%2C%20customize%20everything.%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2020/03/slider-image-12.jpg%22%2C%22title%22%3A%22Say%20Hello%20to%20pixfort%20Slider%22%2C%22text%22%3A%22Design%20better%20websites%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%20Combine%20layouts%2C%20customize%20everything.%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2020/03/slider-image-15.jpg%22%2C%22title%22%3A%22Unlimited%20Possibilities%22%2C%22text%22%3A%22Design%20better%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%20Combine%20layouts%2C%20customize%20everything.%22%7D%2C%7B%22image%22%3A%22https://essentials.pixfort.com/original/wp-content/uploads/sites/4/2020/03/slider-image-13.jpg%22%2C%22title%22%3A%22Unlimited%20Possibilities%22%2C%22text%22%3A%22Design%20better%20and%20spend%20less%20time%20without%20restricting%20creative%20freedom.%20Combine%20layouts%2C%20customize%20everything.%22%7D%5D" rounded_img="rounded-10" align="text-center" nav_style="circles" circles_color="transparent" title_color="white" content_color="light-opacity-7" content_size="text-20" overlay_color="gradient-primary" overlay_opacity="pix-opacity-4" animation="fade-in-up" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" style="3" hover_effect="" add_hover_effect=""][/vc_column][/vc_row]                        
CONTENT;

    array_push($templates, $data);

    return $templates;
}




 ?>
