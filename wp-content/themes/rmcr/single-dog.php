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

	<div id="primary" class="col-md-9">

		<main id="content" class="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'partials/content', 'single-dog' ); ?>

				<?php rmcr_post_nav(); ?>

			<?php endwhile; // end of the loop ?>

		</main><!-- #main -->

	</div><!-- #primary -->

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>