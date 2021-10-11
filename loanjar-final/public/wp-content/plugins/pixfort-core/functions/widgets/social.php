<?php



// Creating the widget
class pix_social extends WP_Widget {

    function __construct() {
        parent::__construct(
            // Base ID of your widget
            'pix_social',
            // Widget name will appear in UI
            __('PixFort Social Links', 'pixfort-core'),
            // Widget description
            array( 'description' => __( 'Social Links widget', 'pixfort-core' ), )
        );

    }

    // Creating widget front-end
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $facebook = apply_filters( 'widget_title', $instance['facebook'] );
        $instagram = apply_filters( 'widget_title', $instance['instagram'] );
        $twitter = apply_filters( 'widget_title', $instance['twitter'] );
        $linkedin = false;
        if (!empty($instance['linkedin'])) $linkedin = apply_filters( 'widget_title', $instance['linkedin'] );
        $dribbble = false;
        if (!empty($instance['snapchat'])) $snapchat = apply_filters( 'widget_title', $instance['snapchat'] );
        $snapchat = false;
        if (!empty($instance['dribbble'])) $dribbble = apply_filters( 'widget_title', $instance['dribbble'] );
        $telegram = false;
        if (!empty($instance['telegram'])) $telegram = apply_filters( 'widget_title', $instance['telegram'] );
        $whatsapp = false;
        if (!empty($instance['whatsapp'])) $whatsapp = apply_filters( 'widget_title', $instance['whatsapp'] );
        $flipboard = false;
        if (!empty($instance['flipboard'])) $flipboard = apply_filters( 'widget_title', $instance['flipboard'] );
        $vk = false;
        if (!empty($instance['vk'])) $vk = apply_filters( 'widget_title', $instance['vk'] );
        $behance = false;
        if (!empty($instance['behance'])) $behance = apply_filters( 'widget_title', $instance['behance'] );

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) ){
            echo $args['before_title'] . $title . $args['after_title'];
        }

        echo '<div class="pix-social_widget pix-py-10">';
            if($facebook){
                echo '<a href="'.$facebook.'" class="d-inline-block bg-white pix-mr-10 shadow-sm fly-sm shadow-hover-sm text-body-default"><span class="d-flex h-100 align-items-center justify-content-center "><i class="pixicon-facebook3"></i></span></a>';
            }
            if($instagram){
                echo '<a href="'.$instagram.'" class="d-inline-block bg-white pix-mr-10 shadow-sm fly-sm shadow-hover-sm text-body-default"><span class="d-flex h-100 align-items-center justify-content-center "><i class="pixicon-instagram2"></i></span></a>';
            }
            if($twitter){
                echo '<a href="'.$twitter.'" class="d-inline-block bg-white pix-mr-10 shadow-sm fly-sm shadow-hover-sm text-body-default"><span class="d-flex h-100 align-items-center justify-content-center "><i class="pixicon-twitter"></i></span></a>';
            }
            if($linkedin){
                echo '<a href="'.$linkedin.'" class="d-inline-block bg-white pix-mr-10 shadow-sm fly-sm shadow-hover-sm text-body-default"><span class="d-flex h-100 align-items-center justify-content-center "><i class="pixicon-linkedin"></i></span></a>';
            }
            if($dribbble){
                echo '<a href="'.$dribbble.'" class="d-inline-block bg-white pix-mr-10 shadow-sm fly-sm shadow-hover-sm text-body-default"><span class="d-flex h-100 align-items-center justify-content-center "><i class="pixicon-dribbble"></i></span></a>';
            }
            if($snapchat){
                echo '<a href="'.$snapchat.'" class="d-inline-block bg-white pix-mr-10 shadow-sm fly-sm shadow-hover-sm text-body-default"><span class="d-flex h-100 align-items-center justify-content-center "><i class="pixicon-snapchat"></i></span></a>';
            }
            if($telegram){
                echo '<a href="'.$telegram.'" class="d-inline-block bg-white pix-mr-10 shadow-sm fly-sm shadow-hover-sm text-body-default"><span class="d-flex h-100 align-items-center justify-content-center "><i class="pixicon-telegram"></i></span></a>';
            }
            if($whatsapp){
                echo '<a href="'.$whatsapp.'" class="d-inline-block bg-white pix-mr-10 shadow-sm fly-sm shadow-hover-sm text-body-default"><span class="d-flex h-100 align-items-center justify-content-center "><i class="pixicon-whatsapp"></i></span></a>';
            }
            if($flipboard){
                echo '<a href="'.$flipboard.'" class="d-inline-block bg-white pix-mr-10 shadow-sm fly-sm shadow-hover-sm text-body-default"><span class="d-flex h-100 align-items-center justify-content-center "><i class="pixicon-flipboard"></i></span></a>';
            }
            if($vk){
                echo '<a href="'.$vk.'" class="d-inline-block bg-white pix-mr-10 shadow-sm fly-sm shadow-hover-sm text-body-default"><span class="d-flex h-100 align-items-center justify-content-center "><i class="pixicon-vk"></i></span></a>';
            }
            if($behance){
                echo '<a href="'.$behance.'" class="d-inline-block bg-white pix-mr-10 shadow-sm fly-sm shadow-hover-sm text-body-default"><span class="d-flex h-100 align-items-center justify-content-center "><i class="pixicon-behance"></i></span></a>';
            }
        echo '</div>';






        echo $args['after_widget'];
    }

    // Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }else {
            $title = __( 'Social Links', 'pixfort-core' );
        }
        $facebook = '';
        $instagram = '';
        $twitter = '';
        $dribbble = '';
        $linkedin = '';
        $snapchat = '';
        $telegram = '';
        $whatsapp = '';
        $flipboard = '';
        $vk = '';
        $behance = '';
        if ( isset( $instance[ 'facebook' ] ) ) {
            $facebook = $instance[ 'facebook' ];
        }
        if ( isset( $instance[ 'instagram' ] ) ) {
            $instagram = $instance[ 'instagram' ];
        }
        if ( isset( $instance[ 'twitter' ] ) ) {
            $twitter = $instance[ 'twitter' ];
        }
        if ( isset( $instance[ 'dribbble' ] ) ) {
            $dribbble = $instance[ 'dribbble' ];
        }
        if ( isset( $instance[ 'linkedin' ] ) ) {
            $linkedin = $instance[ 'linkedin' ];
        }
        if ( isset( $instance[ 'snapchat' ] ) ) {
            $snapchat = $instance[ 'snapchat' ];
        }
        if ( isset( $instance[ 'telegram' ] ) ) {
            $telegram = $instance[ 'telegram' ];
        }
        if ( isset( $instance[ 'whatsapp' ] ) ) {
            $whatsapp = $instance[ 'whatsapp' ];
        }
        if ( isset( $instance[ 'flipboard' ] ) ) {
            $flipboard = $instance[ 'flipboard' ];
        }
        if ( isset( $instance[ 'vk' ] ) ) {
            $vk = $instance[ 'vk' ];
        }
        if ( isset( $instance[ 'behance' ] ) ) {
            $behance = $instance[ 'behance' ];
        }


        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e( 'Instagram:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" type="text" value="<?php echo esc_attr( $instagram ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e( 'Linkedin:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" type="text" value="<?php echo esc_attr( $linkedin ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'dribbble' ); ?>"><?php _e( 'Dribbble:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'dribbble' ); ?>" name="<?php echo $this->get_field_name( 'dribbble' ); ?>" type="text" value="<?php echo esc_attr( $dribbble ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'snapchat' ); ?>"><?php _e( 'Snapchat:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'snapchat' ); ?>" name="<?php echo $this->get_field_name( 'snapchat' ); ?>" type="text" value="<?php echo esc_attr( $snapchat ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'telegram' ); ?>"><?php _e( 'Telegram:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'telegram' ); ?>" name="<?php echo $this->get_field_name( 'telegram' ); ?>" type="text" value="<?php echo esc_attr( $telegram ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'whatsapp' ); ?>"><?php _e( 'Whatsapp:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'whatsapp' ); ?>" name="<?php echo $this->get_field_name( 'whatsapp' ); ?>" type="text" value="<?php echo esc_attr( $whatsapp ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'flipboard' ); ?>"><?php _e( 'Flipboard:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'flipboard' ); ?>" name="<?php echo $this->get_field_name( 'flipboard' ); ?>" type="text" value="<?php echo esc_attr( $flipboard ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'vk' ); ?>"><?php _e( 'VK:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'vk' ); ?>" name="<?php echo $this->get_field_name( 'vk' ); ?>" type="text" value="<?php echo esc_attr( $vk ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'behance' ); ?>"><?php _e( 'Behance:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'behance' ); ?>" name="<?php echo $this->get_field_name( 'behance' ); ?>" type="text" value="<?php echo esc_attr( $behance ); ?>" />
        </p>
        <?php
    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
        $instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? strip_tags( $new_instance['instagram'] ) : '';
        $instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
        $instance['linkedin'] = ( ! empty( $new_instance['linkedin'] ) ) ? strip_tags( $new_instance['linkedin'] ) : '';
        $instance['dribbble'] = ( ! empty( $new_instance['dribbble'] ) ) ? strip_tags( $new_instance['dribbble'] ) : '';
        $instance['snapchat'] = ( ! empty( $new_instance['snapchat'] ) ) ? strip_tags( $new_instance['snapchat'] ) : '';
        $instance['telegram'] = ( ! empty( $new_instance['telegram'] ) ) ? strip_tags( $new_instance['telegram'] ) : '';
        $instance['whatsapp'] = ( ! empty( $new_instance['whatsapp'] ) ) ? strip_tags( $new_instance['whatsapp'] ) : '';
        $instance['flipboard'] = ( ! empty( $new_instance['flipboard'] ) ) ? strip_tags( $new_instance['flipboard'] ) : '';
        $instance['vk'] = ( ! empty( $new_instance['vk'] ) ) ? strip_tags( $new_instance['vk'] ) : '';
        $instance['behance'] = ( ! empty( $new_instance['behance'] ) ) ? strip_tags( $new_instance['behance'] ) : '';
        return $instance;
    }


} // Class pix_widget ends here


 ?>
