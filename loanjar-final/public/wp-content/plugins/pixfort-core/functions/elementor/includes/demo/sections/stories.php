<?php




function pix_elementor_templates_stories(){
    $templates = array();
    $thumb_path = PIX_CORE_PLUGIN_URI . 'functions/vc_templates/custom/thumbnails/stories/';

    $data = array (
        'id' => 'event-stories',
        'file' => 'sections/stories/event-stories.json',
        'title' => 'event-stories',
        'thumbnail' => $thumb_path.'event-stories.png',
        'tmpl_created' => '1520443695',
        'author' => 'pixfort',
        'url' => 'https://essentials.pixfort.com/event/homepage-event-elementor/',
        'type' => 'block',
        'subtype' => 'intro',
        'tags' => '["stories"]',
        'menu_order' => '0',
        'popularity_index' => '0',
        'trend_index' => '0',
        'has_page_settings' => '0',
    );
    array_push($templates, $data);


    $data = array (
        'id' => 'influencer-stories',
        'file' => 'sections/stories/influencer-stories.json',
        'title' => 'influencer-stories',
        'thumbnail' => $thumb_path.'influencer-stories.png',
        'tmpl_created' => '1520443695',
        'author' => 'pixfort',
        'url' => 'https://essentials.pixfort.com/influencer/homepage-influencer-elementor/',
        'type' => 'block',
        'subtype' => 'intro',
        'tags' => '["stories"]',
        'menu_order' => '0',
        'popularity_index' => '0',
        'trend_index' => '0',
        'has_page_settings' => '0',
    );
    array_push($templates, $data);


    return $templates;
}




 ?>
