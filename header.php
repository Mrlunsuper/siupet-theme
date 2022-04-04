<?php
/**
 * Index Template
 *
 * @package SIUPET
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
		<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body>
	<header class="header">
		<div class="container">
			<div class="row flex flex-align-center">
				<div class="col-4-m">
					<div class="header-left">
						<a href="<?php echo esc_url( get_home_url() ); ?>" class="logo">
							<img class="logo-img hide-on-mobile lazy-load-image" data-src="<?php echo esc_url( wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ) ); ?>" alt="siu pet logo">
							<img class="logo-img hide-on-desktop lazy-load-image" data-src="<?php echo esc_html( wpsf_get_setting( 'siupet_theme_options', 'general', 'logo_mobile' ) ); ?>" alt="siu pet logo">
						</a>
					</div>
				</div>
				<div class="col-auto">
					<div class="header-center hide-on-mobile">
						<?php do_action( 'siu_pet_nav_menu' ); ?>
					</div>
					<div class="menu-mobile hide-on-desktop text-center">
						<input class="hidden" id="menu-mobile-input" type="checkbox">
						<label class="menu-mobile-label" for="menu-mobile-input">
							<span class="lnr lnr-menu"></span>
						</label>
						<div class="header-mobile-menu">
							<div class="header-mobile-menu-content">
								<label for="menu-mobile-input" class="header-mobile-menu-close">
									<span class="lnr lnr-cross"></span>
								</label>
								<?php do_action( 'siu_pet_nav_menu' ); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-4-m hide-on-mobile">
					<div class="header-right flex flex-justify-end">
						<div class="flex flex-align-center">
							<div class="header-booking margin-right-10">
								<a href="https://fb.com/book/siupet.care/" target="_blank" class="btn btn-primary" alt="Đặt lịch" title="Đặt lịch">
								<span class="lnr lnr-calendar-full"></span>
									Đặt lịch
								</a>
							</div>
							<a class="header-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_html_e( 'Cart', 'woocommerce' ); ?>">
								<div class="header-cart-icon">
									<span class="lnr lnr-cart">   </span>
								</div>
								<div class="header-cart-count">
									<span>
										<?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?>
									</span>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>


