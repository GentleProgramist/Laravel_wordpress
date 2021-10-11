<?php



require_once( 'shortcodes/test.php' );
require_once( 'shortcodes/accordion.php' );
require_once( 'shortcodes/accordion_text.php' );
require_once( 'shortcodes/accordion_tab.php' );
require_once( 'shortcodes/animated-heading.php' );
require_once( 'shortcodes/alert.php' );
require_once( 'shortcodes/auto-video.php' );
require_once( 'shortcodes/badge.php' );
require_once( 'shortcodes/blog.php' );
require_once( 'shortcodes/blog_slider.php' );
require_once( 'shortcodes/promo-box.php' );
require_once( 'shortcodes/button.php' );
require_once( 'shortcodes/card.php' );
require_once( 'shortcodes/card-group.php' );
require_once( 'shortcodes/card-wide.php' );
require_once( 'shortcodes/chart.php' );
require_once( 'shortcodes/circles.php' );
require_once( 'shortcodes/clients.php' );
require_once( 'shortcodes/clients_slider.php' );
// pix_beta
// if(defined('PIX_DEV')){
	require_once( 'shortcodes/comparison_table.php' );
// }
require_once( 'shortcodes/content_box.php' );
require_once( 'shortcodes/content_stack.php' );
require_once( 'shortcodes/content_tab.php' );
require_once( 'shortcodes/content_tabs.php' );
require_once( 'shortcodes/countdown.php' );
require_once( 'shortcodes/cta.php' );
require_once( 'shortcodes/event.php' );
require_once( 'shortcodes/3d_box.php' );
require_once( 'shortcodes/fancy_box.php' );
require_once( 'shortcodes/fancy-mockup.php' );
require_once( 'shortcodes/faq.php' );
require_once( 'shortcodes/feature.php' );
require_once( 'shortcodes/feature-list.php' );
// pix_beta
// if(defined('PIX_DEV')){
	require_once( 'shortcodes/gallery.php' );
// }
require_once( 'shortcodes/heading.php' );
require_once( 'shortcodes/highlight-box.php' );
require_once( 'shortcodes/highlighted-text.php' );
require_once( 'shortcodes/icon.php' );
require_once( 'shortcodes/img.php' );
require_once( 'shortcodes/img-carousel.php' );

require_once( 'shortcodes/img-box.php' );
require_once( 'shortcodes/img-slider.php' );
require_once( 'shortcodes/levels.php' );
require_once( 'shortcodes/map.php' );
require_once( 'shortcodes/dividers.php' );
require_once( 'shortcodes/numbers.php' );
require_once( 'shortcodes/photo_box.php' );
require_once( 'shortcodes/photo-stack.php' );
require_once( 'shortcodes/portfolio.php' );
require_once( 'shortcodes/portfolio_slider.php' );
require_once( 'shortcodes/pricing.php' );
require_once( 'shortcodes/pricing-group.php' );
require_once( 'shortcodes/products-carousel.php' );
require_once( 'shortcodes/progress-bars.php' );
require_once( 'shortcodes/search.php' );
require_once( 'shortcodes/shop-category.php' );
require_once( 'shortcodes/slider.php' );
require_once( 'shortcodes/sliding-text.php' );
require_once( 'shortcodes/social-icons.php' );
require_once( 'shortcodes/story.php' );
require_once( 'shortcodes/tabs.php' );
require_once( 'shortcodes/tabs_h_text.php' );
require_once( 'shortcodes/tabs_v_text.php' );
require_once( 'shortcodes/team-member.php' );
require_once( 'shortcodes/team-member-circle.php' );
require_once( 'shortcodes/testimonial.php' );
require_once( 'shortcodes/testimonial-masonry.php' );
require_once( 'shortcodes/testimonials_slider.php' );
require_once( 'shortcodes/review.php' );
require_once( 'shortcodes/reviews_slider.php' );
require_once( 'shortcodes/responsive-spacer.php' );

require_once( 'shortcodes/text.php' );
require_once( 'shortcodes/video.php' );
require_once( 'shortcodes/video-popup.php' );
require_once( 'shortcodes/video-slider.php' );
require_once( 'shortcodes/misc.php' );
// require_once( 'shortcodes/menu.php' );






/* ---------------------------------------------------------------------------
 * Alert Block [alertblock]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pix_emoji' ) ){
	function sc_pix_emoji( $attr, $content = null ){
		$output  = '<span class="pix-emoji">'.do_shortcode($content).'</span>';
		return $output;
	}
}

add_shortcode( 'pix_emoji', 'sc_pix_emoji' );


add_filter( 'wpcf7_form_elements', 'delicious_wpcf7_form_elements' );

function delicious_wpcf7_form_elements( $form ) {
    $form = '<div class="pix-contact7-form">'.$form.'</div>';
    $form = do_shortcode( $form );
    return $form;
}

 ?>
