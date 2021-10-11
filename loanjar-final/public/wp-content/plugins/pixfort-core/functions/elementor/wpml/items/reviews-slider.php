<?php
if( class_exists('WPML_Elementor_Module_With_Items') ) {
    /**
     * Class WPML_Elementor_Icon_List
     */
    class Pix_WPML_Elementor_Reviews_Slider extends WPML_Elementor_Module_With_Items {
        /**
         * @return string
         */
        public function get_items_field() {
            return 'slides';
        }
        /**
         * @return array
         */
        public function get_fields() {
            return array( 'name', 'content' );
        }
        /**
         * @param string $field
         *
         * @return string
         */
        protected function get_title( $field ) {
            switch( $field ) {
                case 'name':
                    return esc_html__( 'Reviews Slider: name', 'pixfort-core' );
                case 'content':
                    return esc_html__( 'Reviews Slider: content', 'pixfort-core' );
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
                case 'name':
                    return 'LINE';
                case 'content':
                    return 'AREA';
                default:
                    return '';
            }
        }
    }
}
