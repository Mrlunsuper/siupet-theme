<?php
/**
 * Product card template
 *
 * @package WooCommerce/Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! $product || ! $product->is_visible() ) {
	return;
}

?>
<div class="product-card ef-fade-up">
	<?php do_action( 'sp_product_link_start', $product ); ?>
		<?php do_action( 'sp_product_image', $product ); ?>
	<?php do_action( 'sp_product_link_end' ); ?>
	<div class="product-card-body">
		<?php do_action( 'sp_product_link_start', $product ); ?>

		<?php do_action( 'sp_product_title', $product ); ?>

		<?php do_action( 'sp_product_link_end' ); ?>
		
		<?php do_action( 'sp_product_price', $product ); ?>

		<?php do_action( 'sp_product_desc', $product ); ?>
	</div>
</div>
