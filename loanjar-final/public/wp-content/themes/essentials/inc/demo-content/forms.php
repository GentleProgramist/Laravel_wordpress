<?php

function pixfort_demo_forms(){
    $data = array();

    $demo = array(
        'import_file_name'             => 'Horizontal Subscription Form',
        'categories'                   => array( 'Contact Form 7' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/contact-forms/horizontal-subscription-form.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/forms/horizontal-subscription-form.jpg',
        'import_notice'                => esc_html__( 'Contact Form 7 plugin should be installed and activated in order to import & use the forms.', 'essentials' ),
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Contact Form',
        'categories'                   => array( 'Contact Form 7' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/contact-forms/contact-form.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/forms/contact-form.jpg',
        'import_notice'                => esc_html__( 'Contact Form 7 plugin should be installed and activated in order to import & use the forms.', 'essentials' ),

    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Advanced Contact Form',
        'categories'                   => array( 'Contact Form 7' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/contact-forms/advanced-contact-form.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/forms/advanced-contact-form.jpg',
        'import_notice'                => esc_html__( 'Contact Form 7 plugin should be installed and activated in order to import & use the forms.', 'essentials' ),

    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Vertical Subscription Form',
        'categories'                   => array( 'Contact Form 7' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/contact-forms/vertical-subscription-form.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/forms/vertical-subscription-form.jpg',
        'import_notice'                => esc_html__( 'Contact Form 7 plugin should be installed and activated in order to import & use the forms.', 'essentials' ),

    );
    array_push($data, $demo);



    return $data;
}
     ?>
