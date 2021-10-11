<?php




function pix_templates_404(){
    $templates = array();

    // 404

    $data = array();
    $data['name'] = __( '404 Page SEO', 'essentials-core' );
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'thumbnails/404/seo-404-page.jpg', __FILE__ ) );
    $data['custom_class'] = 'custom_template_for_vc_custom_template all custom_404 pages';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" full_height="yes" content_placement="middle" pix_over_visibility="" bottom_divider_select="2" bottom_layers="1" pix_overlay_color="gray-1"][vc_row full_width="stretch_row" content_placement="middle" pix_particles_check="" responsive_css="{``pix_res_sm_pt``:``60``,``pix_res_sm_pb``:``60``,``pix_res_md_pt``:``60``,``pix_res_md_pb``:``60``}" css=".vc_custom_1605062747142{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_column width="1/2" css=".vc_custom_1559101053478{padding: 30px !important;}"][pix_highlighted_text items="%5B%7B%22text%22%3A%22Oppps%22%2C%22is_highlighted%22%3A%22true%22%2C%22highlight_color%22%3A%22%23ffd900%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%7D%5D" position="text-left" heading_id="1604288510938-88c6fcb0-435c"][pix_feature title_size="h3" title_bold="font-weight-bold" content_size="text-18" content_color="body-default" padding_title="30px" animation="fade-in-up" title="Page not found!" delay="400" css=".vc_custom_1604288491658{margin-bottom: 30px !important;}" element_id="1604288454580-fd4a5406-7191"]Combine seamlessly fitting layouts, customize everything you want, switch components on the go using our bootstrap.[/pix_feature][pix_button btn_text="Go back to home" btn_color="primary-light" btn_size="md" btn_effect="" btn_hover_effect="" btn_add_hover_effect="" btn_icon_position="after" btn_icon_animation="yes" btn_animation="fade-in-up" btn_link="http://essentials.pixfort.com/seo/" btn_icon="pixicon-angle-right" btn_anim_delay="800"][/vc_column][vc_column width="1/2"][pix_img rounded_img="rounded-lg" align="text-center" pix_scale_in="pix-scale-in-sm" style="" hover_effect="" add_hover_effect="1" image="https://essentials.pixfort.com/seo/wp-content/uploads/sites/42/2020/11/404-image.png"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);


    return $templates;
}




 ?>
