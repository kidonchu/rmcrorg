<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package rmcr
 */

get_header(); ?>

<div id="primary" class="content-area">

	<main id="main" class="site-main" role="main">

		<div class="row">

			<div class="col-md-9">

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

			</div>

			<?php get_sidebar(); ?>

		</div>

	</main>

</div><!-- #primary -->

<?php get_footer(); ?>
