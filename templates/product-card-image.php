<?php
/**
 * Product card image template
 *
 * @package SiuPet/Templates
 */

?>
<div class="product-card-image">
	<div class="product-card-image-overlay"></div>
	<?php if ( ! is_product() ) : ?>
		<img class="img-responsive lazy-load-image" data-src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $title ); ?>">						
	<?php else : ?>
		<img class="img-responsive" src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $title ); ?>">
	<?php endif; ?>
</div>
