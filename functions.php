<?php

define( 'SIUPET_THEME_DIR', get_template_directory() );
define( 'SIUPET_THEME_URL', get_template_directory_uri() );
define( 'SIUPET_THEME_ASSET_URI', SIUPET_THEME_URL . '/assets' );
define( 'SIUPET_THEME_VERSION', '1.0.0' );

require_once SIUPET_THEME_DIR . '/class-siu-pet-theme.php';

$siu_pet_theme = Siu_Pet_Theme::get_instance();
$siu_pet_theme->init();


if ( ! function_exists( 'sp_home_products' ) ) {
	/**
	 * Get products for home page
	 */
	function sp_home_products() {
		$args = array(
			'post_type'      => 'product',
			'posts_per_page' => 8,
			'orderby'        => 'featured',
			'fields'         => 'ids',
		);

		$products = sp_cache( 'home_products', get_posts( $args ) );

		if ( $products ) {
			$products = array_map( 'wc_get_product', $products );
			foreach ( $products as $product ) {
				wc_get_template( 'templates/product-card.php', array( 'product' => $product ) );
			}
		}

	}

	add_action( 'sp_home_products', 'sp_home_products' );
}

if ( ! function_exists( 'sp_home_news' ) ) {
	/**
	 * Get news for home page
	 */
	function sp_home_news() {
		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => 4,
			'orderby'        => 'featured',
			'fields'         => 'ids',
		);

		$posts = sp_cache( 'home_news', get_posts( $args ) );

		if ( $posts ) {
			$posts = array_map( 'get_post', $posts );
			foreach ( $posts as $post ) {
				setup_postdata( $post );
				$post_title     = $post->post_title;
				$post_link      = $post->guid;
				$post_image_url = get_the_post_thumbnail_url( $post->ID, 'full' );
				$post_date      = $post->post_date;

				$post_date = date_i18n( 'd M Y', strtotime( $post_date ) );
				if ( empty( $post_image_url ) ) {
					$post_image_url = SIUPET_THEME_ASSET_URI . '/images/no-image.png';
				}
				sp_get_template(
					'post-item',
					array(
						'post_title'     => $post_title,
						'post_link'      => $post_link,
						'post_image_url' => $post_image_url,
						'post_date'      => $post_date,
					)
				);
			}
		}

	}

	add_action( 'sp_home_news', 'sp_home_news' );
}

if ( ! function_exists( 'sp_get_template' ) ) {

	/**
	 * Get template
	 *
	 * @param string $template_name Template name.
	 * @param array  $args          Template arguments.
	 */
	function sp_get_template( $template_name, $args = array() ) {
		extract( $args );
		include SIUPET_THEME_DIR . '/templates/' . $template_name . '.php';
	}
}

if ( ! function_exists( 'catch_post_image' ) ) {
	/**
	 * Get post image
	 *
	 * @param int $post_id Post ID.
	 * @return string
	 */
	function catch_post_image( $post_id ) {
		$post_thumbnail_id = get_post_thumbnail_id( $post_id );
		if ( $post_thumbnail_id ) {
			$post_thumbnail_img = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
			return $post_thumbnail_img[0];
		}
		return '';
	}
}

if ( ! function_exists( 'sp_cache' ) ) {
	/**
	 * Get cache
	 *
	 * @param string $key Cache key.
	 * @param mixed  $data Data.
	 * @return mixed
	 */
	function sp_cache( $key, $data = null ) {

		$prefix = 'sp_';
		$cache  = get_transient( $prefix . $key );
		if ( $cache ) {
			return $cache;
		} elseif ( null !== $data ) {
			set_transient( $prefix . $key, $data, HOUR_IN_SECONDS );
			return $data;
		}

	}
}

/** Clear SP cache */
add_action( 'save_post', 'sp_clear_cache' );
add_action( 'deleted_post', 'sp_clear_cache' );
add_action( 'switch_theme', 'sp_clear_cache' );

if ( ! function_exists( 'sp_clear_cache' ) ) {
	/**
	 * Clear SP cache
	 *
	 * @param int $post_id Post ID.
	 */
	function sp_clear_cache( $post_id ) {
		$prefix = 'sp_';
		$keys   = array(
			'home_products',
			'home_news',
		);
		foreach ( $keys as $key ) {
			delete_transient( $prefix . $key );
		}
	}
}
