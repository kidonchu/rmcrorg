<?php get_header(); ?>
	<div class="row">
		<div class="col-md-9">
			<?php if ( function_exists( 'yoast_breadcrumb' ) ) {
				yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
			} ?>
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'single' ); ?>

					<?php rmcr_post_nav(); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main>
		</div>
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>