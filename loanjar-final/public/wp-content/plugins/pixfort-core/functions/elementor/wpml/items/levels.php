<?php
if( class_exists('WPML_Elementor_Module_With_Items') ) {
    /**
     * Class WPML_Elementor_Icon_List
     */
    class Pix_WPML_Elementor_Levels extends WPML_Elementor_Module_With_Items {
        /**
         * @return string
         */
        public function get_items_field() {
            return 'items';
        }
        /**
         * @return array
         */
        public function get_fields() {
            return array( 'title', 'text', 'link' );
        }
        /**
         * @param string $field
         *
         * @return string
         */
        protected function get_title( $field ) {
            switch( $field ) {
                case 'title':
                    return esc_html__( 'Levels: title', 'pixfort-core' );
                case 'text':
                    return esc_html__( 'Levels: text', 'pixfort-core' );
                case 'link':
                    return esc_html__( 'Levels: link', 'pixfort-core' );
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
                case 'title':
                    return 'LINE';
                case 'text':
                    return 'LINE';
                case 'link':
                    return 'LINE';
                default:
                    return '';
            }
        }
    }
}
