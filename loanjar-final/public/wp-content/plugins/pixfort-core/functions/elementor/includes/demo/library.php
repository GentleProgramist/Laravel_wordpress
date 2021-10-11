<?php

$thumb_path = PIX_CORE_PLUGIN_URI . 'functions/elementor/includes/demo/thumbs/';



require_once( 'sections/intros.php' );
require_once( 'sections/features.php' );
require_once( 'sections/blog.php' );
require_once( 'sections/content.php' );
require_once( 'sections/cta.php' );
require_once( 'sections/faq.php' );
require_once( 'sections/pricing.php' );
require_once( 'sections/tabs.php' );
require_once( 'sections/testimonials.php' );
require_once( 'sections/clients.php' );
require_once( 'sections/heading.php' );
require_once( 'sections/footers.php' );
require_once( 'sections/reviews.php' );
require_once( 'sections/gallery.php' );
require_once( 'sections/links.php' );
require_once( 'sections/forms.php' );
require_once( 'sections/accordion.php' );
require_once( 'sections/image_carousel.php' );
require_once( 'sections/team.php' );
require_once( 'sections/portfolio.php' );
require_once( 'sections/countdown.php' );
require_once( 'sections/stories.php' );
require_once( 'sections/numbers.php' );
require_once( 'sections/shop.php' );
require_once( 'sections/maps.php' );
require_once( 'sections/sliders.php' );
require_once( 'sections/video.php' );
require_once( 'sections/popups.php' );

require_once( 'pages.php' );

$sections = array();
$sections = array_merge($sections, pix_elementor_templates_intros() );
$sections = array_merge($sections, pix_elementor_templates_features() );
$sections = array_merge($sections, pix_elementor_templates_blog() );
$sections = array_merge($sections, pix_elementor_templates_content() );
$sections = array_merge($sections, pix_elementor_templates_cta() );
$sections = array_merge($sections, pix_elementor_templates_faq() );
$sections = array_merge($sections, pix_elementor_templates_pricing() );
$sections = array_merge($sections, pix_elementor_templates_tabs() );
$sections = array_merge($sections, pix_elementor_templates_testimonials() );
$sections = array_merge($sections, pix_elementor_templates_clients() );
$sections = array_merge($sections, pix_elementor_templates_heading() );
$sections = array_merge($sections, pix_elementor_templates_footers() );
$sections = array_merge($sections, pix_elementor_templates_reviews() );
$sections = array_merge($sections, pix_elementor_templates_gallery() );
$sections = array_merge($sections, pix_elementor_templates_links() );
$sections = array_merge($sections, pix_elementor_templates_forms() );
$sections = array_merge($sections, pix_elementor_templates_accordion() );
$sections = array_merge($sections, pix_elementor_templates_image_carousel() );
$sections = array_merge($sections, pix_elementor_templates_team() );
$sections = array_merge($sections, pix_elementor_templates_portfolio() );
$sections = array_merge($sections, pix_elementor_templates_countdown() );
$sections = array_merge($sections, pix_elementor_templates_stories() );
$sections = array_merge($sections, pix_elementor_templates_numbers() );
$sections = array_merge($sections, pix_elementor_templates_shop() );
$sections = array_merge($sections, pix_elementor_templates_maps() );
$sections = array_merge($sections, pix_elementor_templates_sliders() );
$sections = array_merge($sections, pix_elementor_templates_video() );
$sections = array_merge($sections, pix_elementor_templates_popups() );


$templates = array_merge( $sections, $pages);
$library = array (
  'timestamp' => 1561218722,
  'upgrade_notice' =>
  array (
    'version' => '2.0.0',
    'message' => '',
    'update_link' => '',
  ),
  'library' =>
  array (
    'types_data' =>
    array (
      'block' =>
      array (
        'categories' =>
        array (
          '404 page',
          'about',
          'archive',
          'call to action',
          'clients',
          'contact',
          'faq',
          'features',
          'footer',
          'header',
          'intro',
          'portfolio',
          'pricing',
          'product archive',
          'services',
          'single page',
          'single post',
          'single product',
          'stats',
          'subscribe',
          'team',
          'testimonials',
        ),
      ),
      'popup' =>
      array (
        'categories' =>
        array (
          0 => 'bottom bar',
          1 => 'classic',
          2 => 'fly-in',
          3 => 'full screen',
          4 => 'hello bar',
          5 => 'slide-in',
        ),
      ),
    ),
    'categories' => '["404 page","about","archive","call to action","clients","contact","faq","features","footer","header","intro","portfolio","pricing","product archive","services","single page","single post","single product","stats","subscribe","team","testimonials"]',
    'templates' => $templates
  ),
);


?>
