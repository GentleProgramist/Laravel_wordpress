<?php
/**
 * Product quantity inputs
 *
 * Author: PixFort
 *
 * pixfort version
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( $max_value && $min_value === $max_value ) {
	?>
	<div class="quantity hidden">
		<input type="hidden" id="<?php echo esc_attr( $input_id ); ?>" class="qty" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $min_value ); ?>" />
	</div>
	<?php
} else {
	/* translators: %s: Quantity. */
	$labelledby = ! empty( $args['product_name'] ) ? sprintf( esc_html__( '%s quantity', 'essentials' ), strip_tags( $args['product_name'] ) ) : '';
	?>
	<div class="quantity mr-2 pix-px-10 bg-white rounded-lg shadow-sm d-inline-block">
		<label class="screen-reader-text sr-only" for="<?php echo esc_attr( $input_id ); ?>"><?php esc_html_e( 'Quantity', 'essentials' ); ?></label>
		<a href="#" class="minus d-inline-block text-body-default" >-</a>
		<input
			type="number"
			id="<?php echo esc_attr( $input_id ); ?>"
			class="input-text qty text form-control shadow-0 d-inline-block"
			step="<?php echo esc_attr( $step ); ?>"
			min="<?php echo esc_attr( $min_value ); ?>"
			max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>"
			name="<?php echo esc_attr( $input_name ); ?>"
			value="<?php echo esc_attr( $input_value ); ?>"
			title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'essentials' ); ?>"

			size="4"
			pattern="<?php echo esc_attr( $pattern ); ?>"
			inputmode="<?php echo esc_attr( $inputmode ); ?>"
			aria-labelledby="<?php echo esc_attr( $labelledby ); ?>" />
			<a href="#" class="plus d-inline-block text-body-default" >+</a>
	</div>
	<?php
}
