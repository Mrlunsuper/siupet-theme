<?php
/**
 * All woocommerce functions and hooks
 *
 * @package    SIUPET
 */

/**
 * Class SIUPET_WooCommerce
 */
class Siu_Pet_Woocommerce {

	/**
	 * Constructor
	 */
	public function __construct() {
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
		add_action( 'woocommerce_before_main_content', array( $this, 'before_single_product' ), 25 );
		add_action( 'sp_single_product_image', array( $this, 'single_product_image' ) );
		add_action( 'sp_single_product_info', array( $this, 'single_product_info' ) );
		add_filter( 'woocommerce_product_tabs', array( $this, 'unset_woocommerce_single_product_tabs' ) );
	}

	/**
	 * Add content before the single product
	 */
	public function before_single_product() {
		global $product;

		if ( ! $product || ! is_a( $product, 'WC_Product' ) ) {
			$product = wc_get_product( get_the_ID() );
		}
		$product_title = $product->get_name();
		echo sprintf(
			'<div class="product-banner-top text-center flex flex-align-center flex-center flex-column"><h1 class="product-banner-title">%1$s</h1>',
			esc_html( $product_title )
		);
		echo woocommerce_breadcrumb();
		echo '</div>';
	}

	/**
	 * Single product image
	 */
	public function single_product_image() {
		global $product;

		if ( ! $product || ! is_a( $product, 'WC_Product' ) ) {
			$product = wc_get_product( get_the_ID() );
		}

		$product_image_url = $product->get_image_id();
		$product_title     = $product->get_name();

		echo sprintf(
			'<img src="%s" alt="%s" class="img-responsive" />',
			esc_url( wp_get_attachment_image_url( $product_image_url, 'full' ) ),
			esc_attr( $product_title )
		);
	}

	/**
	 * Single product info
	 */
	public function single_product_info() {
		global $product;

		if ( ! $product || ! is_a( $product, 'WC_Product' ) ) {
			$product = wc_get_product( get_the_ID() );
		}

		$product_title = $product->get_name();
		$product_price = $product->get_price_html();
		$product_desc  = $product->get_short_description();

		// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
		echo sprintf(
			'<div class=""><p>%1$s</p><p>%2$s</p></div>',
			$product_price,
			esc_html( $product_desc )
		);
	}

	/**
	 * Unset woocommerce single product tabs
	 *
	 * @param array $tabs Tabs.
	 */
	public function unset_woocommerce_single_product_tabs( $tabs ) {
		unset( $tabs['reviews'] );
		unset( $tabs['additional_information'] );
		return $tabs;
	}
}
