<?php
if( class_exists('WPML_Elementor_Module_With_Items') ) {
    /**
     * Class WPML_Elementor_Icon_List
     */
    class Pix_WPML_Elementor_Slider extends WPML_Elementor_Module_With_Items {
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
            return array( 'title', 'alt', 'text', 'btn_text', 'link' );
        }
        /**
         * @param string $field
         *
         * @return string
         */
        protected function get_title( $field ) {
            switch( $field ) {
                case 'title':
                    return esc_html__( 'Slider: title', 'pixfort-core' );
                case 'alt':
                    return esc_html__( 'Slider: alt', 'pixfort-core' );
                case 'text':
                    return esc_html__( 'Slider: text', 'pixfort-core' );
                case 'btn_text':
                    return esc_html__( 'Slider: btn_text', 'pixfort-core' );
                case 'link':
                    return esc_html__( 'Slider: link', 'pixfort-core' );
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
                case 'alt':
                    return 'LINE';
                case 'text':
                    return 'LINE';
                case 'btn_text':
                    return 'LINE';
                case 'link':
                    return 'LINE';
                default:
                    return '';
            }
        }
    }
}
