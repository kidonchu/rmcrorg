<?php get_header(); ?>

<div class="row">

	<div class="col-md-9">

		<main id="content" class="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php if ( function_exists( 'yoast_breadcrumb' ) ) {
					yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
				} ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php if($hero_image = get_post_meta( get_the_ID(), 'hero_image', true )) : ?>
						<img class="page-hero" src="<?php echo $hero_image; ?>" alt=""/>
					<?php endif; ?>

					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'rmcr' ),
							'after'  => '</div>',
						) );
						?>
					</div><!-- .entry-content -->
					<footer class="entry-footer">
						<?php edit_post_link( __( 'Edit', 'rmcr' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-footer -->
				</article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>

		</main>

	</div>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
