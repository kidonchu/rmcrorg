<?php
/**
 * Template Name Posts: Dog
 * The Template for displaying all single posts.
 *
 * @package rmcr
 */
?>
<?php get_header(); ?>
	<div class="row">
		<div class="col-md-9">
			<?php if ( function_exists( 'yoast_breadcrumb' ) ) {
				yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
			} ?>
			<main id="content" class="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'partials/content', 'single-dog' ); ?>

					<?php rmcr_post_nav(); ?>

				<?php endwhile; // end of the loop ?>

			</main>
		</div>
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>