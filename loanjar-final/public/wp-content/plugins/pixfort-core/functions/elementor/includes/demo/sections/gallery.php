<?php




function pix_elementor_templates_gallery(){
    $templates = array();
    $thumb_path = PIX_CORE_PLUGIN_URI . 'functions/vc_templates/custom/thumbnails/gallery/';

    $data = array (
        'id' => 'company-works-page-gallery',
        'file' => 'sections/gallery/company-works-page-gallery.json',
        'title' => 'company-works-page-gallery',
        'thumbnail' => $thumb_path.'company-works-page-gallery.png',
        'tmpl_created' => '1520443695',
        'author' => 'pixfort',
        'url' => 'https://essentials.pixfort.com/company-elementor/works',
        'type' => 'block',
        'subtype' => 'portfolio',
        'tags' => '["portfolio"]',
        'menu_order' => '0',
        'popularity_index' => '0',
        'trend_index' => '0',
        'has_page_settings' => '0',
    );
    array_push($templates, $data);

    $data = array (
        'id' => 'modern-gallery',
        'file' => 'sections/gallery/modern-gallery.json',
        'title' => 'modern-gallery',
        'thumbnail' => $thumb_path.'modern-gallery.png',
        'tmpl_created' => '1520443695',
        'author' => 'pixfort',
        'url' => 'https://essentials.pixfort.com/modern-elementor/',
        'type' => 'block',
        'subtype' => 'portfolio',
        'tags' => '["portfolio"]',
        'menu_order' => '0',
        'popularity_index' => '0',
        'trend_index' => '0',
        'has_page_settings' => '0',
    );
    array_push($templates, $data);

    $data = array (
        'id' => 'gallery-gallery',
        'file' => 'sections/gallery/gallery-gallery.json',
        'title' => 'gallery-gallery',
        'thumbnail' => $thumb_path.'gallery-gallery.png',
        'tmpl_created' => '1520443695',
        'author' => 'pixfort',
        'url' => 'https://essentials.pixfort.com/gallery-elementor/',
        'type' => 'block',
        'subtype' => 'portfolio',
        'tags' => '["portfolio"]',
        'menu_order' => '0',
        'popularity_index' => '0',
        'trend_index' => '0',
        'has_page_settings' => '0',
    );
    array_push($templates, $data);



    return $templates;
}




 ?>
