<?php get_header(); ?>
<div class="row">
	<div class="col-md-9">
		<?php if ( function_exists( 'yoast_breadcrumb' ) ) {
			yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
		} ?>
		<main id="content" class="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<!-- entry-header -->
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header>

					<!-- promotional banners -->
					<div class="row">
						<div class="col-md-4">
							<?php dynamic_sidebar( 'event-promotion-1' ); ?>
						</div>
						<div class="col-md-4">
							<?php dynamic_sidebar( 'event-promotion-2' ); ?>
						</div>
						<div class="col-md-4">
							<?php dynamic_sidebar( 'event-promotion-3' ); ?>
						</div>
					</div>

					<!-- events -->
					<div class="entry-content">
						<div class="row">
							<div class="col-md-4">
								<?php echo do_shortcode( '[google-calendar-events type="list-grouped" title="Events on" max="5"]' ); ?>
							</div>
							<div class="col-md-8">
								<?php echo do_shortcode( '[google-calendar-events type="ajax" title="Events on" max="0"]' ); ?>
							</div>
						</div>
					</div>

					<!-- entry footer -->
					<footer class="entry-footer">
						<?php edit_post_link( __( 'Edit', 'rmcr' ), '<span class="edit-link">', '</span>' ); ?>
					</footer>

				</article><!-- #post-## -->

			<?php endwhile; ?>

		</main>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
