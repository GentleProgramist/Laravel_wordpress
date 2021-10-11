<?php

class My_Elementor_Widgets {

	protected static $instance = null;

	public static function get_instance() {
		if ( ! isset( static::$instance ) ) {
			static::$instance = new static;
		}

		return static::$instance;
	}

	protected function __construct() {

		// require_once('library.php');
		require_once('includes/custom-control-init.php');


		wp_register_script( 'pix-global', PIX_CORE_PLUGIN_URI.'/functions/elementor/js/global.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );


		require_once('globals.php');
		require_once('widgets/widget1.php');
		require_once('widgets/accordion.php');
		require_once('widgets/alert.php');
		require_once('widgets/auto-video.php');
		require_once('widgets/badge.php');
		require_once('widgets/blog-slider.php');
		require_once('widgets/blog.php');
		require_once('widgets/button.php');
		require_once('widgets/card-wide.php');
		require_once('widgets/card.php');
		require_once('widgets/chart.php');
		require_once('widgets/circles.php');
		require_once('widgets/clients-carousel.php');
		require_once('widgets/clients.php');
		require_once('widgets/comparison-table.php');

		require_once('widgets/countdown.php');
		require_once('widgets/cta.php');
		require_once('widgets/dividers.php');
		require_once('widgets/event.php');
		require_once('widgets/fancy-mockup.php');
		require_once('widgets/fancybox.php');
		require_once('widgets/faq.php');
		require_once('widgets/feature-list.php');
		require_once('widgets/feature.php');

		require_once('widgets/gallery.php');
		require_once('widgets/heading.php');
		require_once('widgets/horizontal-tabs.php');
		require_once('widgets/highlighted-text.php');
		require_once('widgets/vertical-tabs.php');
		require_once('widgets/icon.php');
		require_once('widgets/img-box.php');
		require_once('widgets/img-carousel.php');
		require_once('widgets/img-slider.php');
		require_once('widgets/img.php');
		require_once('widgets/levels.php');
		require_once('widgets/map.php');
		require_once('widgets/numbers.php');
		require_once('widgets/photo-box.php');
		require_once('widgets/photo-stack.php');
		require_once('widgets/portfolio-slider.php');
		require_once('widgets/portfolio.php');
		require_once('widgets/pricing.php');
		require_once('widgets/products-carousel.php');
		require_once('widgets/progress-bars.php');
		require_once('widgets/promo-box.php');
		require_once('widgets/review.php');
		require_once('widgets/reviews-slider.php');
		require_once('widgets/search.php');
		require_once('widgets/shop-category.php');
		require_once('widgets/slider.php');
		require_once('widgets/sliding-text.php');
		require_once('widgets/social-icons.php');
		require_once('widgets/story.php');
		require_once('widgets/team-member-circle.php');
		require_once('widgets/team-member.php');
		require_once('widgets/testimonial-masonry.php');
		require_once('widgets/testimonial.php');
		require_once('widgets/testimonials-slider.php');
		require_once('widgets/text.php');
		require_once('widgets/video-popup.php');
		require_once('widgets/video-slider.php');
		require_once('widgets/video.php');
		// require_once('widgets/menu.php');

		require_once('widgets/3d-box.php');
		require_once('widgets/animated-heading.php');
		// require_once('includes/pix-section.php');
		// $ps = new PixSection();

		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}

	public function register_widgets() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\My_Widget_1() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Accordion() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Alert() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Animated_Heading() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Auto_Video() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Badge() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Blog_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Blog() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Button() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Card_Wide() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Card() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Chart() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Circles() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Clients_Carousel() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Clients() );
		// pix_beta

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Comparison_Table() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Countdown() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_CTA() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Dividers() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Event() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Fancy_Mockup() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Fancybox() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Faq() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Feature_List() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Feature() );
		// pix_beta
		// if(defined('PIX_DEV')){
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Gallery() );
		// }
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Heading() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Highlighted_Text() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Icon() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Img_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Img_Carousel() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Img_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Img() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Levels() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Map() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Numbers() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Photo_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Photo_Stack() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Portfolio_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Portfolio() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Pricing() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Products_Carousel() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Progress_Bars() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Promo_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Review() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Reviews_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Search() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Shop_Category() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Sliding_Text() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Social_Icons() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Story() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Team_Member_Circle() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Team_Member() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Testimonial_Masonry() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Testimonial() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Testimonials_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Text() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Video_Popup() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Video_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Video() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Horizontal_Tabs() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Vertical_Tabs() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_3d_Box() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Pix_Eor_Menu() );


		
	}

}


add_action( 'init', 'my_elementor_init' );
function my_elementor_init() {
	My_Elementor_Widgets::get_instance();
}


function add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'pixfort',
		[
			'title' => __( 'PixFort Elements', 'pixfort-core' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );




add_action( 'elementor/init', function() {
	$disable_pix_blocks = false;
	if(!empty(pix_plugin_get_option('pix-disable-elementor-demo'))){
		if(pix_plugin_get_option('pix-disable-elementor-demo')){
			$disable_pix_blocks = true;
		}
	}
	if(!$disable_pix_blocks){
		include 'includes/source.php';

		$callSource = true;
		if (defined('PHP_MAJOR_VERSION') && PHP_MAJOR_VERSION < 7){
			$callSource = false;
			add_action( 'admin_notices', 'pixfort_php_notice' );
		}
		if($callSource){
			$unregister_source = function($id) {
				unset( $this->_registered_sources[ $id ] );
			};

			$unregister_source->call( \Elementor\Plugin::instance()->templates_manager, 'remote');
			\Elementor\Plugin::instance()->templates_manager->register_source( 'Elementor\TemplateLibrary\Source_Custom' );
		}
	}
}, 15 );


function pixfort_php_notice(){
	?>
    <div class="notice pixfort-admin-notice notice-warning is-dismissible">
        <div class="notice-text"><strong><?php echo esc_attr__( 'Warning: ', 'pixfort-core' ); ?></strong><?php echo esc_attr__( 'The php version on the server is outdated (older than php version 7), elementor templates will not be loaded, please update php on your server.', 'pixfort-core' ); ?></div>

		<a href="https://wordpress.org/support/update-php/" target="_blank" class="button button-primary"><?php echo esc_attr__( 'Learn more about updating PHP', 'pixfort-core' ); ?></a>
    </div>
    <?php
}

if ( function_exists('icl_object_id') ) {
    include_once( 'wpml/translation.php' );
}
