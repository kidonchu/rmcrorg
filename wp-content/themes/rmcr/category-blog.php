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

					<?php get_template_part( 'content', get_post_format() ); ?>

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
