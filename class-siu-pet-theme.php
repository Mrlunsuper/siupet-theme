<?php
/**
 * Main theme class
 * Defines the main theme class for the SIUPET theme.
 *
 * @package SIUPET
 */

/**
 * Use singletone pattern to create a single instance of the class.
 */
class Siu_Pet_Theme {

	/**
	 * Class instance
	 *
	 * @var object $instance The instance of the class.
	 */
	private static $instance = null;

	/**
	 * Class constructor
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Include all the files
	 */
	public function init() {
		$this->includes();
		$this->setup();

		self::$instance->nav = Siu_Pet_Nav::get_instance();
		self::$instance->nav->init();

		self::$instance->assets      = new Siu_Pet_Assets();
		self::$instance->hooks       = new Siu_Pet_Hooks();
		self::$instance->woocommerce = new Siu_Pet_Woocommerce();
		self::$instance->options     = new Siu_Pet_Theme_Options();
	}

	/**
	 * Include all the files
	 */
	public function includes() {
		require_once SIUPET_THEME_DIR . '/includes/class-siu-pet-nav.php';
		require_once SIUPET_THEME_DIR . '/includes/class-siu-pet-assets.php';
		require_once SIUPET_THEME_DIR . '/includes/class-siu-pet-hooks.php';
		require_once SIUPET_THEME_DIR . '/includes/class-siu-pet-woocommerce.php';
		require_once SIUPET_THEME_DIR . '/includes/class-siu-pet-theme-options.php';
	}

	/**
	 * Theme setup
	 */
	public function setup() {
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 100,
				'width'       => 400,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => array( 'site-title', 'site-description' ),
			)
		);
		add_theme_support(
			'custom-background',
			array(
				'default-color' => '#ffffff',
				'default-image' => '',
			)
		);
		add_theme_support(
			'custom-header',
			array(
				'default-image'          => '',
				'default-text-color'     => '#000000',
				'width'                  => 1000,
				'height'                 => 250,
				'flex-height'            => true,
				'flex-width'             => true,
				'wp-head-callback'       => '',
				'admin-head-callback'    => '',
				'admin-preview-callback' => '',
			)
		);
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat' ) );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'menus' );
		// Support woocommerce
		add_theme_support( 'woocommerce' );
	}

}
