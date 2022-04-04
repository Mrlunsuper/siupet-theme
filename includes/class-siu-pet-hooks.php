<?php
/**
 * Class Siu_Pet_Hooks
 *
 * @package SIUPET
 */

/**
 * Siu_Pet_Hooks class
 */
class Siu_Pet_Hooks {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'sp_product_price', array( $this, 'product_card_price' ), 10, 1 );
		add_action( 'sp_product_title', array( $this, 'product_card_title' ), 10, 1 );
		add_action( 'sp_product_desc', array( $this, 'product_card_desc' ), 10, 1 );
		add_action( 'sp_product_image', array( $this, 'product_card_image' ), 10, 1 );
		add_action( 'sp_product_link_start', array( $this, 'product_card_links_start' ), 10, 1 );
		add_action( 'sp_product_link_end', array( $this, 'product_card_links_end' ) );
	}

	/**
	 * Product card template image
	 *
	 * @param WC_Product $product Product object.
	 */
	public function product_card_image( $product ) {

		$image_id  = get_post_thumbnail_id( $product->get_id() );
		$image_url = wp_get_attachment_image_src( $image_id, 'full' );
		$image_url = $image_url[0];
		$title     = $product->get_name();
		ob_start();

		wc_get_template(
			'product-card-image.php',
			array(
				'image_url' => $image_url,
				'title'     => $title,
			),
			'',
			SIUPET_THEME_DIR . '/templates/'
		);
        //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo ob_get_clean();
	}

	/**
	 * Product card template title
	 *
	 * @param WC_Product $product Product object.
	 */
	public function product_card_title( $product ) {

		$title = $product->get_name();
		ob_start();

		wc_get_template(
			'product-card-title.php',
			array(
				'title' => $title,
			),
			'',
			SIUPET_THEME_DIR . '/templates/'
		);
        //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo ob_get_clean();
	}

	/**
	 * Product card template price
	 *
	 * @param WC_Product $product Product object.
	 */
	public function product_card_price( $product ) {

		$price = $product->get_price_html();
		ob_start();

		wc_get_template(
			'product-card-price.php',
			array(
				'price' => $price,
			),
			'',
			SIUPET_THEME_DIR . '/templates/'
		);
        //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo ob_get_clean();
	}

	/**
	 * Product card template desc
	 *
	 * @param WC_Product $product Product object.
	 */
	public function product_card_desc( $product ) {

		$desc = $product->get_description();
		ob_start();

		wc_get_template(
			'product-card-desc.php',
			array(
				'desc' => $desc,
			),
			'',
			SIUPET_THEME_DIR . '/templates/'
		);
        //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo ob_get_clean();

	}

	/**
	 * Product card template links start
	 *
	 * @param WC_Product $product Product object.
	 */
	public function product_card_links_start( $product ) {

		echo sprintf( '<a class="product-card-link" href="%s">', esc_url( $product->get_permalink() ) );
	}

	/**
	 * Product card template links end
	 */
	public function product_card_links_end() {

		echo '</a>';
	}
}

