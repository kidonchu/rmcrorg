<?php get_header(); ?>

<div class="row">

	<div class="col-xs-9">

		<?php if ( function_exists( 'yoast_breadcrumb' ) ) {
			yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
		} ?>

		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<h1 class="hide"><?php single_cat_title(); ?></h1>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
				$name = get_post_format();
				get_template_part( 'content', $name );
				?>

			<?php endwhile; ?>

			<?php rmcr_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main>

	</div>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
