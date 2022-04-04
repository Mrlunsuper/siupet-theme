<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>
<section class="section">
	<div class="product-banner-top text-center flex flex-align-center flex-center flex-column">
		<h1 class="product-banner-title"><?php woocommerce_page_title(); ?></h1>
	</div>
	<div class="container">
		<?php
			do_action( 'woocommerce_before_shop_loop' );
		?>
		<div class="clearfix"></div>
		<div class="margin-bottom-10"></div>
		<div class="row">
			<div class="products-card columns-4">
				<?php
				if ( wc_get_loop_prop( 'total' ) ) {
					while ( have_posts() ) {
						the_post();

						$roduct_id = get_the_ID();
						$product   = wc_get_product( $roduct_id );

						sp_get_template(
							'product-card',
							array(
								'product' => $product,
							)
						);
					}
				}
				?>
			</div>
		</div>
		<?php
			do_action( 'woocommerce_after_shop_loop' );
		?>
	</div>
	<div class="margin-bottom-10"></div>
</section>
<?php
get_footer( 'shop' );
