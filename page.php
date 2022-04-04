<?php
/**
 * Page template
 *
 * @package SIUPET
 */
?>
<?php get_header(); ?>
<?php if( ! is_cart() && ! is_checkout() ) : ?>
<div class="product-banner-top text-center flex flex-align-center flex-center flex-column">
	<h1 class="product-banner-title"><?php the_title(); ?></h1>
</div>
<?php endif; ?>
<div class="container">
	<div class="row">
		<h1 class="product-banner-title"><?php the_title(); ?></h1>
	</div>
	<?php the_content(); ?>
</div>
<?php get_footer(); ?>
