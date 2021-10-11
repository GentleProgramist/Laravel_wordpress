<?php



add_action( 'vc_load_default_templates_action','pix_init_templates' ); // Hook in
function pix_all_templates() {
    require_once( 'intros.php' );
    require_once( 'features.php' );
    require_once( 'content.php' );
    require_once( 'headings.php' );
    require_once( 'blog.php' );
    require_once( 'portfolio.php' );
    require_once( 'shop.php' );
    require_once( 'pricing.php' );
    require_once( 'pages.php' );
    require_once( 'cta.php' );
    require_once( 'faq.php' );
    require_once( 'maps.php' );
    require_once( 'clients.php' );
    require_once( 'tabs.php' );
    require_once( 'sliders.php' );
    require_once( 'testimonials.php' );
    require_once( 'accordion.php' );
    require_once( 'video.php' );
    require_once( 'reviews.php' );
    require_once( 'gallery.php' );
    require_once( 'forms.php' );
    require_once( 'team.php' );
    require_once( 'image_carousel.php' );
    require_once( 'links.php' );
    require_once( 'countdown.php' );
    require_once( 'numbers.php' );
    require_once( '404.php' );
    require_once( 'stories.php' );
    require_once( 'miscellaneous.php' );
    require_once( 'footers.php' );

    $templates = array();
    $templates = array_merge($templates, pix_templates_intros() );
    $templates = array_merge($templates, pix_templates_features() );
    $templates = array_merge($templates, pix_templates_content() );
    $templates = array_merge($templates, pix_templates_headings() );
    $templates = array_merge($templates, pix_templates_blog() );
    $templates = array_merge($templates, pix_templates_portfolio() );
    $templates = array_merge($templates, pix_templates_shop() );
    $templates = array_merge($templates, pix_templates_pricing() );
    $templates = array_merge($templates, pix_templates_cta() );
    $templates = array_merge($templates, pix_templates_pages() );
    $templates = array_merge($templates, pix_templates_faq() );
    $templates = array_merge($templates, pix_templates_maps() );
    $templates = array_merge($templates, pix_templates_clients() );
    $templates = array_merge($templates, pix_templates_tabs() );
    $templates = array_merge($templates, pix_templates_sliders() );
    $templates = array_merge($templates, pix_templates_testimonials() );
    $templates = array_merge($templates, pix_templates_accordion() );
    $templates = array_merge($templates, pix_templates_video() );
    $templates = array_merge($templates, pix_templates_reviews() );
    $templates = array_merge($templates, pix_templates_gallery() );
    $templates = array_merge($templates, pix_templates_forms() );
    $templates = array_merge($templates, pix_templates_team() );
    $templates = array_merge($templates, pix_templates_image_carousel() );
    $templates = array_merge($templates, pix_templates_links() );
    $templates = array_merge($templates, pix_templates_countdown() );
    $templates = array_merge($templates, pix_templates_numbers() );
    $templates = array_merge($templates, pix_templates_404() );
    $templates = array_merge($templates, pix_templates_stories() );
    $templates = array_merge($templates, pix_templates_footers() );
    return $templates;
}
function pix_init_templates() {
    $templates = pix_all_templates();
    foreach ($templates as $key => $value) {
        vc_add_default_templates( $value );
    }
}

function pix_get_templates_thumbs(){
    $templates = pix_all_templates();
    $result = array();
    foreach ($templates as $key => $value) {
        $name = strtolower($value['name']);
        $name = str_replace(' ', '-', $name);
        $result[$name] = $value['image_path'];
        // array_push($result, array(
        //      $name => $value['image_path']
        // ));
    }
    return $result;
}




 ?>
