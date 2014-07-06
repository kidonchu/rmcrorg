<?php get_header(); ?>
<div class="row">
	<div class="col-md-9">
		<?php if ( function_exists( 'yoast_breadcrumb' ) ) {
			yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
		} ?>
		<main id="content" class="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
