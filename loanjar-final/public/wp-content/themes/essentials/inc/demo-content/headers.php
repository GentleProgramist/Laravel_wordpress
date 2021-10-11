<?php

function pixfort_demo_headers(){
    $data = array();

    $demo = array(
        'import_file_name'             => 'Company Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/company/company-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-company.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/company',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Gallery Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/gallery/gallery-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-gallery.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/gallery',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Modern Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/modern/modern-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-modern.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/modern',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'SEO Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/seo/seo-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-seo.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/seo',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Fast Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/fast/fast-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-fast.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/fast',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Onepage Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/onepage/onepage-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-onepage.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/onepage',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Finance Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/finance/finance-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-finance.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/finance',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Original Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/original/original-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-original.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/original',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Software Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/software/software-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-software.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/software',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'SaaS Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/saas/saas-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-saas.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/saas',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Startup Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/startup/startup-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-startup.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/startup',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Marketing Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/marketing/marketing-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-marketing.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/marketing',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Knowledge Base Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/kb/kb-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-kb.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/knowledge-base-demo',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Services Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/services/services-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-services.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/services',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Event Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/event/event-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-event.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/event',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Slides Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/slides/slides-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-slides.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/slides',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Medical Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/medical/medical-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-medical.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/medical',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Cryptocurrency Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/cryptocurrency/cryptocurrency-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-cryptocurrency.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/cryptocurrency',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Bold Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/bold/bold-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-bold.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/bold',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Creative Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/creative/creative-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-creative.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/creative',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Ebook Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/ebook/ebook-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-ebook.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/ebook',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Landing Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/landing/landing-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-landing.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/landing',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Restaurant Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/restaurant/restaurant-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-restaurant.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/restaurant',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Ecommerce Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/ecommerce/ecommerce-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-ecommerce.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/ecommerce',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Foundation Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/foundation/foundation-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-foundation.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/foundation',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Construction Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/construction/construction-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-construction.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/construction',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Business Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/business/business-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-business.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/business',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Corporate Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/corporate/corporate-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-corporate.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/corporate',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Product Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/product/product-header.xml',
        // 'import_file_url'            => 'https://pixfort-hub-proxy-n6vas.ondigitalocean.app/demo-content/product/product-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-product.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/product',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'coronavirus Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/coronavirus/coronavirus-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-coronavirus.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/coronavirus',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Personal Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/personal/personal-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-personal.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/personal',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Influencer Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/influencer/influencer-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-influencer.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/influencer',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Photography Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/photography/photography-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-photography.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/photography',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'App Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/app/app-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-app.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/app',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Agency Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/agency/agency-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-agency.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/agency',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Beauty Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/beauty/beauty-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-beauty.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/beauty',
    );
    array_push($data, $demo);

    $demo = array(
        'import_file_name'             => 'Blogger Header',
        'categories'                   => array( 'Headers' ),
        'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/blogger/blogger-header.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-content/thumbs/headers/header-blogger.jpg',
        'preview_url'                  => 'https://essentials.pixfort.com/blogger',
    );
    array_push($data, $demo);


    return $data;
}
     ?>
