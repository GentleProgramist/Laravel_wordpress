<?php




function pix_elementor_templates_faq(){
    $templates = array();
    $thumb_path = PIX_CORE_PLUGIN_URI . 'functions/vc_templates/custom/thumbnails/faq/';

    $data = array (
        'id' => 'startup-faq',
        'file' => 'sections/faq/startup-faq.json',
        'title' => 'Startup faq',
        'thumbnail' => $thumb_path.'startup-faq.png',
        'tmpl_created' => '1520443695',
        'author' => 'pixfort',
        'url' => 'https://essentials.pixfort.com/startup/homepage-startup-elementor/',
        'type' => 'block',
        'subtype' => 'faq',
        'tags' => '["faq"]',
        'menu_order' => '0',
        'popularity_index' => '0',
        'trend_index' => '0',
        'has_page_settings' => '0',
    );

    array_push($templates, $data);

    $data = array (
        'id' => 'saas-faq-left',
        'file' => 'sections/faq/saas-faq-left.json',
        'title' => 'saas-faq-left',
        'thumbnail' => $thumb_path.'saas-faq-left.png',
        'tmpl_created' => '1520443695',
        'author' => 'pixfort',
        'url' => 'https://essentials.pixfort.com/saas/homepage-saas-elementor/',
        'type' => 'block',
        'subtype' => 'faq',
        'tags' => '["faq"]',
        'menu_order' => '0',
        'popularity_index' => '0',
        'trend_index' => '0',
        'has_page_settings' => '0',
    );

    array_push($templates, $data);

    $data = array (
        'id' => 'saas-faq-right',
        'file' => 'sections/faq/saas-faq-right.json',
        'title' => 'saas-faq-right',
        'thumbnail' => $thumb_path.'saas-faq-right.png',
        'tmpl_created' => '1520443695',
        'author' => 'pixfort',
        'url' => 'https://essentials.pixfort.com/saas/homepage-saas-elementor/',
        'type' => 'block',
        'subtype' => 'faq',
        'tags' => '["faq"]',
        'menu_order' => '0',
        'popularity_index' => '0',
        'trend_index' => '0',
        'has_page_settings' => '0',
    );
    array_push($templates, $data);

    $data = array (
        'id' => 'corporate-faq',
        'file' => 'sections/faq/corporate-faq.json',
        'title' => 'corporate-faq',
        'thumbnail' => $thumb_path.'corporate-faq.png',
        'tmpl_created' => '1520443695',
        'author' => 'pixfort',
        'url' => 'https://essentials.pixfort.com/corporate/homepage-corporate-elementor/',
        'type' => 'block',
        'subtype' => 'faq',
        'tags' => '["faq"]',
        'menu_order' => '0',
        'popularity_index' => '0',
        'trend_index' => '0',
        'has_page_settings' => '0',
    );
    array_push($templates, $data);

    $data = array (
        'id' => 'original-pricing-simple-page-faq',
        'file' => 'sections/faq/original-pricing-simple-page-faq.json',
        'title' => 'original-pricing-simple-page-faq',
        'thumbnail' => $thumb_path.'original-pricing-simple-page-faq.png',
        'tmpl_created' => '1520443695',
        'author' => 'pixfort',
        'url' => 'https://essentials.pixfort.com/pricing-simple/',
        'type' => 'block',
        'subtype' => 'faq',
        'tags' => '["faq"]',
        'menu_order' => '0',
        'popularity_index' => '0',
        'trend_index' => '0',
        'has_page_settings' => '0',
    );
    array_push($templates, $data);


    return $templates;
}




 ?>
