<?php
if( class_exists('WPML_Elementor_Module_With_Items') ) {
    /**
     * Class WPML_Elementor_Icon_List
     */
    class Pix_WPML_Elementor_Tabs extends WPML_Elementor_Module_With_Items {
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
            return array( 'title', 'content' );
        }
        /**
         * @param string $field
         *
         * @return string
         */
        protected function get_title( $field ) {
            switch( $field ) {
                case 'text':
                    return esc_html__( 'Horizontal tabs: text', 'pixfort-core' );
                case 'content':
                    return esc_html__( 'Horizontal tabs: content', 'pixfort-core' );
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
                case 'text':
                    return 'LINE';
                case 'content':
                    return 'VISUAL';
                default:
                    return '';
            }
        }
    }
}
