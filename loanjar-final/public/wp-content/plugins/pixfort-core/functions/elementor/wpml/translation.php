<?php
include_once( 'items/accordion.php' );
include_once( 'items/animated-heading.php' );
include_once( 'items/circles.php' );
include_once( 'items/event.php' );
include_once( 'items/feature-list.php' );
include_once( 'items/highlighted-text.php' );
include_once( 'items/tabs.php' );
include_once( 'items/levels.php' );
include_once( 'items/progress-bars.php' );
include_once( 'items/reviews-slider.php' );
include_once( 'items/slider.php' );
include_once( 'items/testimonials.php' );

/**
* Make our widgets compatible with WPML elementor list
*
* @param array $widgets
* @return array
*/
function pix_wpml_widgets_to_translate_list( $widgets ) {



    $widgets[ 'pix-3d-box' ] = array(
        'conditions' => array( 'widgetType' => 'pix-3d-box' ),
        'fields'     => array(
            array(
                'field'       => 'title',
                'type'        => __( 'Title', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'text',
                'type'        => __( 'Text', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
        ),
    );

    $widgets[ 'pix-accordion' ] = array(
      'conditions'        => array( 'widgetType' => 'pix-accordion' ),
      'fields'            => array(),
      'integration-class' => 'Pix_WPML_Elementor_Accordion',
   );

    $widgets[ 'pix-alert' ] = array(
        'conditions' => array( 'widgetType' => 'pix-alert' ),
        'fields'     => array(
            array(
                'field'       => 'title',
                'type'        => __( 'Title', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
        ),
    );

    $widgets[ 'pix-animated-heading' ] = array(
      'conditions'        => array( 'widgetType' => 'pix-animated-heading' ),
      'fields'            => array(
          array(
              'field'       => 'title',
              'type'        => __( 'Title', 'pixfort-core' ),
              'editor_type' => 'LINE'
          ),
      ),
      'integration-class' => 'Pix_WPML_Elementor_Animated_Heading',
   );

    $widgets[ 'pix-badge' ] = array(
        'conditions' => array( 'widgetType' => 'pix-badge' ),
        'fields'     => array(
            array(
                'field'       => 'text',
                'type'        => __( 'Text', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
        ),
    );

    $widgets[ 'pix-button' ] = array(
        'conditions' => array( 'widgetType' => 'pix-button' ),
        'fields'     => array(
            array(
                'field'       => 'btn_text',
                'type'        => __( 'Button text', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
        ),
    );

    $widgets[ 'pix-card-wide' ] = array(
        'conditions' => array( 'widgetType' => 'pix-card-wide' ),
        'fields'     => array(
            array(
                'field'       => 'title',
                'type'        => __( 'title', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'text',
                'type'        => __( 'text', 'pixfort-core' ),
                'editor_type' => 'AREA'
            ),
        ),
    );

    $widgets[ 'pix-card' ] = array(
        'conditions' => array( 'widgetType' => 'pix-card' ),
        'fields'     => array(
            array(
                'field'       => 'title',
                'type'        => __( 'title', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'text',
                'type'        => __( 'text', 'pixfort-core' ),
                'editor_type' => 'AREA'
            ),
            array(
                'field'       => 'link_text',
                'type'        => __( 'Link Text', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
        ),
    );

    $widgets[ 'pix-chart' ] = array(
        'conditions' => array( 'widgetType' => 'pix-chart' ),
        'fields'     => array(
            array(
                'field'       => 'title',
                'type'        => __( 'title', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'text',
                'type'        => __( 'text', 'pixfort-core' ),
                'editor_type' => 'AREA'
            ),
        ),
    );

    $widgets[ 'pix-circles' ] = array(
        'conditions' => array( 'widgetType' => 'pix-circles' ),
        'fields'     => array(
            array(
                'field'       => 'btn_text',
                'type'        => __( 'Button Text', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
        ),
        'integration-class' => 'Pix_WPML_Elementor_Circles',
    );

    $widgets[ 'pix-cta' ] = array(
        'conditions' => array( 'widgetType' => 'pix-cta' ),
        'fields'     => array(
            array(
                'field'       => 'title',
                'type'        => __( 'title', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'text',
                'type'        => __( 'text', 'pixfort-core' ),
                'editor_type' => 'AREA'
            ),
            array(
                'field'       => 'btn_text',
                'type'        => __( 'Button Text', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
        ),
    );

    $widgets[ 'pix-event' ] = array(
        'conditions' => array( 'widgetType' => 'pix-event' ),
        'fields'     => array(),
        'integration-class' => 'Pix_WPML_Elementor_Event',
    );

    $widgets[ 'pix-fancybox' ] = array(
        'conditions' => array( 'widgetType' => 'pix-fancybox' ),
        'fields'     => array(
            array(
                'field'       => 'title',
                'type'        => __( 'title', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'text',
                'type'        => __( 'text', 'pixfort-core' ),
                'editor_type' => 'AREA'
            ),
        ),
    );

    $widgets[ 'pix-faq' ] = array(
        'conditions' => array( 'widgetType' => 'pix-faq' ),
        'fields'     => array(
            array(
                'field'       => 'title',
                'type'        => __( 'title', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'content',
                'type'        => __( 'content', 'pixfort-core' ),
                'editor_type' => 'AREA'
            ),
        ),
    );

    $widgets[ 'pix-feature-list' ] = array(
        'conditions' => array( 'widgetType' => 'pix-feature-list' ),
        'fields'     => array(
            array(
                'field'       => 'title',
                'type'        => __( 'title', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'content',
                'type'        => __( 'content', 'pixfort-core' ),
                'editor_type' => 'AREA'
            ),
        ),
        'integration-class' => 'Pix_WPML_Elementor_Feature_List',
    );

    $widgets[ 'pix-feature' ] = array(
        'conditions' => array( 'widgetType' => 'pix-feature' ),
        'fields'     => array(
            array(
                'field'       => 'title',
                'type'        => __( 'title', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'content',
                'type'        => __( 'content', 'pixfort-core' ),
                'editor_type' => 'AREA'
            ),
        ),
    );

    $widgets[ 'pix-heading' ] = array(
        'conditions' => array( 'widgetType' => 'pix-heading' ),
        'fields'     => array(
            array(
                'field'       => 'title',
                'type'        => __( 'title', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
        ),
    );

    $widgets[ 'pix-highlighted-text' ] = array(
        'conditions' => array( 'widgetType' => 'pix-highlighted-text' ),
        'fields'     => array(),
        'integration-class' => 'Pix_WPML_Elementor_Highlighted_Text',
    );

    $widgets[ 'pix-horizontal-tabs' ] = array(
        'conditions' => array( 'widgetType' => 'pix-horizontal-tabs' ),
        'fields'     => array(),
        'integration-class' => 'Pix_WPML_Elementor_Tabs',
    );

    $widgets[ 'pix-levels' ] = array(
        'conditions' => array( 'widgetType' => 'pix-levels' ),
        'fields'     => array(),
        'integration-class' => 'Pix_WPML_Elementor_Levels',
    );

    $widgets[ 'pix-img-box' ] = array(
        'conditions' => array( 'widgetType' => 'pix-img-box' ),
        'fields'     => array(
            array(
                'field'       => 'alt',
                'type'        => __( 'Image alternative text', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'title',
                'type'        => __( 'title', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'content',
                'type'        => __( 'content', 'pixfort-core' ),
                'editor_type' => 'AREA'
            ),
        ),
    );

    $widgets[ 'pix-img' ] = array(
        'conditions' => array( 'widgetType' => 'pix-img' ),
        'fields'     => array(
            array(
                'field'       => 'alt',
                'type'        => __( 'Image alternative text', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
        ),
    );

    $widgets[ 'pix-map' ] = array(
        'conditions' => array( 'widgetType' => 'pix-map' ),
        'fields'     => array(
            array(
                'field'       => 'address',
                'type'        => __( 'address', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
        ),
    );

    $widgets[ 'pix-numbers' ] = array(
        'conditions' => array( 'widgetType' => 'pix-numbers' ),
        'fields'     => array(
            array(
                'field'       => 'text_before',
                'type'        => __( 'Text Before', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'text_after',
                'type'        => __( 'Text After', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'content',
                'type'        => __( 'content', 'pixfort-core' ),
                'editor_type' => 'AREA'
            ),
        ),
    );

    $widgets[ 'pix-photo-box' ] = array(
        'conditions' => array( 'widgetType' => 'pix-photo-box' ),
        'fields'     => array(
            array(
                'field'       => 'title',
                'type'        => __( 'title', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
        ),
    );

    $widgets[ 'pix-promo-box' ] = array(
        'conditions' => array( 'widgetType' => 'pix-promo-box' ),
        'fields'     => array(
            array(
                'field'       => 'title',
                'type'        => __( 'title', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'badge',
                'type'        => __( 'badge', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'link_text',
                'type'        => __( 'link_text', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
        ),
    );

    $widgets[ 'pix-pricing' ] = array(
        'conditions' => array( 'widgetType' => 'pix-pricing' ),
        'fields'     => array(
            array(
                'field'       => 'title',
                'type'        => __( 'title', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'price',
                'type'        => __( 'price', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'currency',
                'type'        => __( 'currency', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'period',
                'type'        => __( 'period', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'subtitle',
                'type'        => __( 'subtitle', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'btn_text',
                'type'        => __( 'Button text', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
        ),
        'integration-class' => 'Pix_WPML_Elementor_Feature_List',
    );

    $widgets[ 'pix-progress-bars' ] = array(
        'conditions' => array( 'widgetType' => 'pix-progress-bars' ),
        'fields'     => array( ),
        'integration-class' => 'Pix_WPML_Elementor_Progress_Bars',
    );

    $widgets[ 'pix-review' ] = array(
        'conditions' => array( 'widgetType' => 'pix-review' ),
        'fields'     => array(
            array(
                'field'       => 'content',
                'type'        => __( 'content', 'pixfort-core' ),
                'editor_type' => 'AREA'
            ),
            array(
                'field'       => 'name',
                'type'        => __( 'name', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'title',
                'type'        => __( 'title', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
        ),
    );

    $widgets[ 'pix-reviews-slider' ] = array(
        'conditions' => array( 'widgetType' => 'pix-reviews-slider' ),
        'fields'     => array(),
        'integration-class' => 'Pix_WPML_Elementor_Reviews_Slider',
    );

    $widgets[ 'pix-slider' ] = array(
        'conditions' => array( 'widgetType' => 'pix-slider' ),
        'fields'     => array(),
        'integration-class' => 'Pix_WPML_Elementor_Slider',
    );

    $widgets[ 'pix-testimonial-masonry' ] = array(
        'conditions' => array( 'widgetType' => 'pix-testimonial-masonry' ),
        'fields'     => array(),
        'integration-class' => 'Pix_WPML_Elementor_Testimonials',
    );

    $widgets[ 'pix-testimonials-slider' ] = array(
        'conditions' => array( 'widgetType' => 'pix-testimonials-slider' ),
        'fields'     => array(),
        'integration-class' => 'Pix_WPML_Elementor_Testimonials',
    );

    $widgets[ 'pix-shop-category' ] = array(
        'conditions' => array( 'widgetType' => 'pix-shop-category' ),
        'fields'     => array(
            array(
                'field'       => 'alt',
                'type'        => __( 'alt', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'title',
                'type'        => __( 'title', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'link_text',
                'type'        => __( 'link_text', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
        ),
    );

    $widgets[ 'pix-sliding-text' ] = array(
        'conditions' => array( 'widgetType' => 'pix-sliding-text' ),
        'fields'     => array(
            array(
                'field'       => 'content',
                'type'        => __( 'Content', 'pixfort-core' ),
                'editor_type' => 'AREA'
            ),
        ),
    );

    $widgets[ 'pix-story' ] = array(
        'conditions' => array( 'widgetType' => 'pix-story' ),
        'fields'     => array(
            array(
                'field'       => 'alt',
                'type'        => __( 'alt', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'title',
                'type'        => __( 'title', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
        ),
    );

    $widgets[ 'pix-team-member-circle' ] = array(
        'conditions' => array( 'widgetType' => 'pix-team-member-circle' ),
        'fields'     => array(
            array(
                'field'       => 'name',
                'type'        => __( 'name', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'title',
                'type'        => __( 'title', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'description',
                'type'        => __( 'description', 'pixfort-core' ),
                'editor_type' => 'AREA'
            ),
        ),
    );

    $widgets[ 'pix-team-member' ] = array(
        'conditions' => array( 'widgetType' => 'pix-team-member' ),
        'fields'     => array(
            array(
                'field'       => 'name',
                'type'        => __( 'name', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'title',
                'type'        => __( 'title', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'description',
                'type'        => __( 'description', 'pixfort-core' ),
                'editor_type' => 'AREA'
            ),
        ),
    );

    $widgets[ 'pix-testimonial' ] = array(
        'conditions' => array( 'widgetType' => 'pix-testimonial' ),
        'fields'     => array(
            array(
                'field'       => 'name',
                'type'        => __( 'name', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'title',
                'type'        => __( 'title', 'pixfort-core' ),
                'editor_type' => 'LINE'
            ),
            array(
                'field'       => 'text',
                'type'        => __( 'text', 'pixfort-core' ),
                'editor_type' => 'AREA'
            ),
        ),
    );

    $widgets[ 'pix-text' ] = array(
        'conditions' => array( 'widgetType' => 'pix-text' ),
        'fields'     => array(
            array(
                'field'       => 'content',
                'type'        => __( 'content', 'pixfort-core' ),
                'editor_type' => 'AREA'
            ),
        ),
    );

    $widgets[ 'pix-vertical-tabs' ] = array(
        'conditions' => array( 'widgetType' => 'pix-vertical-tabs' ),
        'fields'     => array(),
        'integration-class' => 'Pix_WPML_Elementor_Tabs',
    );

    return $widgets;
}

/**
* Add filter on wpml elementor widgets node when init action.
*
* @return void
*/
function pix_wpml_widgets_to_translate_filter(){
    add_filter( 'wpml_elementor_widgets_to_translate', 'pix_wpml_widgets_to_translate_list' );
}
add_action( 'init', 'pix_wpml_widgets_to_translate_filter' );
