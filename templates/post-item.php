<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<div class="post-list-item">
	<div class="post-list-item-image">
		<div class="post-list-item-image-overlay"></div>
		<img class="img-responsive lazy-load-image" data-src="<?php echo esc_url( $post_image_url ); ?>" alt="<?php echo esc_attr( $post_title ); ?>">
	</div>
	<div class="post-item-info">
		<div class="post-item-title">
			<h3>
				<a href="<?php echo esc_url( $post_link ); ?>">
					<?php echo esc_html( $post_title ); ?>
				</a>
			</h3>
		</div>

		<div class="post-item-date">
			<?php echo esc_html( $post_date ); ?>
		</div>
	</div>
</div>
