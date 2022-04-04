<?php
/**
 * SIUPET Theme Header Class
 * Defines the header class for the SIUPET theme.
 *
 * @package SIUPET
 */

/** Use singletone pattern to create a single instance of the class. */
class Siu_Pet_Nav {

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
	 * Init hooks
	 */
	public function init() {
		add_action( 'after_setup_theme', array( $this, 'register_nav_menus_location' ) );
		add_action( 'siu_pet_nav_menu', array( $this, 'primary_menu' ) );
		add_filter( 'nav_menu_css_class', array( $this, 'primary_menu_classes' ), 10, 2 );
	}

	/**
	 * Register navigation locations
	 */
	public function register_nav_menus_location() {
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'siu-pet' ),
				'social'  => __( 'Social Menu', 'siu-pet' ),
				'footer'  => __( 'Footer Menu', 'siu-pet' ),
			)
		);
	}
	/**
	 * Add classes to the primary menu
	 *
	 * @param array  $classes The classes for the menu item.
	 * @param object $item The menu item.
	 * @return array $classes The modified classes for the menu item.
	 */
	public function primary_menu_classes( $classes, $item ) {
		$object = get_queried_object();
		if ( 'primary' === $item->theme_location ) {
			$classes[] = 'menu-item';
			$classes[] = 'menu-item-' . $item->ID;
			$classes[] = 'menu-item-' . $item->post_name;
			if ( isset( $object->post_name ) && $item->post_name === $object->post_name ) {
				$classes[] = 'current-menu-item';
			}
		}
		return $classes;
	}

	/**
	 * Ouptut the primary menu
	 */
	public function primary_menu() {
		$args = array(
			'theme_location'  => 'primary',
			'container'       => 'nav',
			'container_id'    => 'primary-menu',
			'container_class' => 'header-menu',
			'menu_id'         => 'primary-menu-items',
			'menu_class'      => 'menu-items',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		);
		wp_nav_menu( $args );
	}

}
