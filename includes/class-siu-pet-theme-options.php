<?php
/**
 * SiuPet_Theme_Options class
 *
 * @package SIUPET
 */

/**
 * SiuPet_Theme_Options class
 */
class Siu_Pet_Theme_Options {

	/**
	 * WordPress Settings Framework instance
	 */
	private $wpsf;

	/**
	 * Constructor
	 */
	public function __construct() {
		require_once SIUPET_THEME_DIR . '/includes/lib/wp-settings-framework.php';
		$this->wpsf = new WordPressSettingsFramework( SIUPET_THEME_DIR . '/includes/settings/theme-options.php', 'siupet_theme_options' );
		add_action( 'admin_menu', array( $this, 'add_options_page' ) );
	}

	/**
	 * Add options page
	 */
	public function add_options_page() {
		$this->wpsf->add_settings_page(
			array(
				'parent_slug' => 'themes.php',
				'page_title'  => esc_html__( 'SiuPet Theme Options', 'siu-pet' ),
				'menu_title'  => esc_html__( 'SiuPet Theme Options', 'siu-pet' ),
				'capability'  => 'manage_options',
			)
		);
	}

}

