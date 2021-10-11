<?php
if( class_exists('WPML_Elementor_Module_With_Items') ) {
    /**
     * Class WPML_Elementor_Icon_List
     */
    class Pix_WPML_Elementor_Animated_Heading extends WPML_Elementor_Module_With_Items {
        /**
         * @return string
         */
        public function get_items_field() {
            return 'words';
        }
        /**
         * @return array
         */
        public function get_fields() {
            return array( 'word' );
        }
        /**
         * @param string $field
         *
         * @return string
         */
        protected function get_title( $field ) {
            switch( $field ) {
                case 'word':
                    return esc_html__( 'Animated Heading: Word', 'pixfort-core' );
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
                case 'word':
                    return 'LINE';
                default:
                    return '';
            }
        }
    }
}
