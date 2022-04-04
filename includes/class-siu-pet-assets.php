<?php
/**
 * Class Siu_Pet_Assets
 *
 * @package SIUPET
 * @author  Siupet
 */

/**
 * Siu_Pet_Assets class
 */
class Siu_Pet_Assets {

	/**
	 * Siu_Pet_Assets constructor.
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
	}

	/**
	 * Admin enqueue scripts
	 */
	public function admin_enqueue_scripts() {
		wp_enqueue_media();
	}

	/**
	 * Enqueue scripts and styles.
	 */
	public function enqueue_scripts() {
		$condition = $this->check_site_condition();

		switch ( $condition ) {
			case 'home':
				$this->enqueue_home_scripts();
				$this->unregister_woocommerce_styles();
				break;
			case 'product':
				$this->enqueue_single_product_scripts();
				break;
			case 'archive':
				$this->enqueue_archive_scripts();
				break;
			case 'single':
				$this->enqueue_single_scripts();
				break;
			default:
				break;
		}
		$this->enqueue_shared_scripts();
	}

	/**
	 * Check current page context
	 *
	 * @return string
	 */
	public function check_site_condition() {
		if ( is_front_page() ) {
			return 'home';
		}

		if ( is_page() ) {
			return 'page';
		}

		if ( is_single() ) {
			return 'single';
		}

		if ( is_archive() ) {
			return 'archive';
		}

		if ( is_search() ) {
			return 'search';
		}

		if ( is_404() ) {
			return '404';
		}

		if ( is_product() ) {
			return 'product';
		}

		return 'other';
	}

	/**
	 * Enqueue shared scripts
	 */
	public function enqueue_shared_scripts() {
		// Reset CSS.
		wp_enqueue_style( 'siu-pet-reset-style', SIUPET_THEME_URL . '/assets/css/reset.css', array(), SIUPET_THEME_VERSION );
		wp_enqueue_style( 'siu-pet-header-style', SIUPET_THEME_URL . '/assets/css/header.css', array(), SIUPET_THEME_VERSION );
		wp_enqueue_style( 'siu-pet-layout-style', SIUPET_THEME_URL . '/assets/css/layout.css', array(), SIUPET_THEME_VERSION );

		// Flickity css.
		wp_enqueue_style( 'siu-pet-flickity-style', SIUPET_THEME_URL . '/assets/css/flickity.min.css', array(), SIUPET_THEME_VERSION ); 
		// Linear icons.
		wp_enqueue_style( 'siu-pet-linear-icons', SIUPET_THEME_URL . '/assets/css/icon-font.min.css', array(), SIUPET_THEME_VERSION );

		// Flickity js.
		wp_enqueue_script( 'siu-pet-flickity-js', SIUPET_THEME_URL . '/assets/js/flickity.pkgd.min.js', array( 'jquery' ), SIUPET_THEME_VERSION, true );
		// Siupet main js.
		wp_enqueue_script( 'siu-pet-script', SIUPET_THEME_URL . '/assets/js/siupet.js', array( 'jquery' ), SIUPET_THEME_VERSION, true );

	}

	/**
	 * Enqueue home scripts
	 */
	public function enqueue_home_scripts() {
		wp_enqueue_style( 'siu-pet-home-style', SIUPET_THEME_URL . '/assets/css/home.css', array(), SIUPET_THEME_VERSION );
	}

	/**
	 * Enqueue single product scripts
	 */
	public function enqueue_single_product_scripts() {
		wp_enqueue_style( 'siu-pet-single-product-style', SIUPET_THEME_URL . '/assets/css/single-product.css', array(), SIUPET_THEME_VERSION );
	}

	/**
	 * Enqueue archive scripts
	 */
	public function enqueue_archive_scripts() {
		wp_enqueue_style( 'siu-pet-archive-style', SIUPET_THEME_URL . '/assets/css/archive.css', array(), SIUPET_THEME_VERSION );
	}

	/**
	 * Enqueue single scripts
	 */
	public function enqueue_single_scripts() {
		wp_enqueue_style( 'siu-pet-single-style', SIUPET_THEME_URL . '/assets/css/single.css', array(), SIUPET_THEME_VERSION );
	}

	/**
	 * Unregister default WooCommerce styles and blocks styles
	 */
	public function unregister_woocommerce_styles() {
		wp_dequeue_style( 'woocommerce-general' );
		wp_dequeue_style( 'woocommerce-layout' );
		wp_dequeue_style( 'woocommerce-smallscreen' );
		wp_dequeue_style( 'woocommerce_frontend_styles' );
		wp_dequeue_style( 'woocommerce_fancybox_styles' );
		wp_dequeue_style( 'woocommerce_chosen_styles' );
		wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
		wp_dequeue_style( 'wc-blocks-style' );
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wc-blocks-vendors-style' );

	}

}
