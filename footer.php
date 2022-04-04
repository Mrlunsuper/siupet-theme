<footer>
	<div class="container">
		<div class="row">
			<div class="col-4">
				<div class="footer-logo">
					<img class="img-responsive lazy-load-image" data-src="<?php echo esc_url( wpsf_get_setting( 'siupet_theme_options', 'general', 'footer_logo' ) ); ?>" alt="Siupet Logo">
				</div>
				<h2 class="footer-text">
					Grooming and Spa
				</h2>
			</div>
			<div class="col-4 col-padding-15">
				<h3 class="footer-title">
					<?php esc_html_e( 'Thông tin', 'siu-pet' ); ?>
				</h3>
				<div class="footer-info">
					<p class="footer-text">
						<span class="lnr lnr-map-marker"></span>
						<?php echo esc_html( wpsf_get_setting( 'siupet_theme_options', 'general', 'address' ) ); ?>
					</p>
					<p class="footer-text">
						<span class="lnr lnr-smartphone"></span>
						<?php echo esc_html( wpsf_get_setting( 'siupet_theme_options', 'general', 'phone' ) ); ?>
					</p>
					<p class="footer-text">
						<span class="lnr lnr-clock"></span>
						<?php echo nl2br( wpsf_get_setting( 'siupet_theme_options', 'general', 'open_hours' ) ); ?>
					</p>
				</div>
			</div>
			<div class="col-4 col-padding-15">
				<h3 class="footer-title">
					<?php esc_html_e( 'Liên kết nhanh', 'siu-pet' ); ?>
				</h3>
				<div class="footer-menu">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer',
							)
						);
						?>
				</div>
			</div>

			<div class="col-4">
				<h3 class="footer-title">
					<?php esc_html_e( 'Bản đồ', 'siu-pet' ); ?>
				</h3>
				<div class="footer-map">
					<img class="img-responsive lazy-load-image" data-src="<?php echo esc_url( wpsf_get_setting( 'siupet_theme_options', 'general', 'footer_map' ) ); ?>" alt="Siupet map">
				</div>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
