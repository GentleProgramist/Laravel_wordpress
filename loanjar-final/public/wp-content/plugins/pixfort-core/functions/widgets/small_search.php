<?php



// Creating the widget
class pix_small_search extends WP_Widget {

    function __construct() {
        parent::__construct(
            // Base ID of your widget
            'pix_small_search',
            // Widget name will appear in UI
            __('PixFort Search', 'pixfort-core'),
            // Widget description
            array( 'description' => __( 'Small search widget', 'pixfort-core' ), )
        );

    }

    // Creating widget front-end
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) ){
            echo $args['before_title'] . $title . $args['after_title'];
        }

        $nonce = wp_create_nonce("search_nonce");
        $link = admin_url('admin-ajax.php?action=pix_ajax_searcht&nonce='.$nonce);
        $search_data = 'data-search-link="'.$link.'"';

        // This is where you run the code and display the output
        // echo $this->id;
        $placeholder = esc_attr__('Search for something', 'pixfort-core');
        echo '<form class="pix-small-search pix-ajax-search-container position-relative bg-white shadow-sm rounded-lg pix-small-search" method="get" action="'.esc_url( home_url( '/' ) ).'">
                <div class="input-group input-group-lg2 ">
                    <input type="text" class="form-control pix-ajax-search form-control-lg shadow-0 font-weight-bold text-body-default" name="s" autocomplete="off" placeholder="'.$placeholder.'" aria-label="Search" '.$search_data.'>
                    <div class="input-group-append">
                        <button class="btn btn-lg2 btn-white m-0 text-body-default" type="submit">'.pix_load_inline_svg(PIX_CORE_PLUGIN_DIR.'/functions/images/search.svg').'</button>
                    </div>
                </div>
            </form>';




        echo $args['after_widget'];
    }

    // Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }else {
            $title = __( 'Search', 'pixfort-core' );
        }

        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php
    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }


} // Class pix_widget ends here


 ?>
