<?php




function pix_elementor_templates_countdown(){
    $templates = array();
    $thumb_path = PIX_CORE_PLUGIN_URI . 'functions/vc_templates/custom/thumbnails/countdown/';

    $data = array (
        'id' => 'event-countdown',
        'file' => 'sections/countdown/event-countdown.json',
        'title' => 'event-countdown',
        'thumbnail' => $thumb_path.'event-countdown.png',
        'tmpl_created' => '1520443695',
        'author' => 'pixfort',
        'url' => 'https://essentials.pixfort.com/event/homepage-event-elementor/',
        'type' => 'block',
        'subtype' => 'intro',
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
