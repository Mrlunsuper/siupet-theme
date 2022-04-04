<?php
/**
 * Single post template
 *
 * @package    SIUPET
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>

<article>
	<div class="container">
		<div class="text-center">
			<h1 class="single-post-title"><?php the_title(); ?></h1>
		</div>
		<div class="line-title"></div>
		<div class="row">
			<div class="col-md-12">
				<div class="single-post-content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
</article>
<?php get_footer(); ?>
