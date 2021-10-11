<?php
if( class_exists('WPML_Elementor_Module_With_Items') ) {
    /**
     * Class WPML_Elementor_Icon_List
     */
    class Pix_WPML_Elementor_Event extends WPML_Elementor_Module_With_Items {
        /**
         * @return string
         */
        public function get_items_field() {
            return 'features';
        }
        /**
         * @return array
         */
        public function get_fields() {
            return array( 'time', 'link' );
        }
        /**
         * @param string $field
         *
         * @return string
         */
        protected function get_title( $field ) {
            switch( $field ) {
                case 'time':
                    return esc_html__( 'Event: time', 'pixfort-core' );
                case 'title':
                    return esc_html__( 'Event: title', 'pixfort-core' );
                case 'text':
                    return esc_html__( 'Event: text', 'pixfort-core' );
                default:
                    return '';
            }
        }
        /**
         * @param string $field
         *
         * @return string
         */
        protected function get_editor_type( $field ) {
            switch( $field ) {
                case 'time':
                    return 'LINE';
                case 'title':
                    return 'LINE';
                case 'text':
                    return 'AREA';
                default:
                    return '';
            }
        }
    }
}
