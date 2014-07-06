<?php get_header(); ?>

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

						<!-- events -->
						<div class="entry-content">
							<?php the_content(); ?>
						</div>

						<!-- promotional banners -->
						<div class="row">
							<div class="col-md-4">
								<div style="min-height: 300px;background-color: purple;">
									<a href="<?php echo get_home_url( null, 'ways-to-help/donate' ) ?>"
									   class="btn btn-primary">
										Donate Now
									</a>
								</div>
							</div>
							<div class="col-md-4">
								<div style="min-height: 300px;background-color: purple;">
									<a href="<?php echo get_home_url( null, 'ways-to-help/volunteer' ) ?>"
									   class="btn btn-primary">
										Volunteer
									</a>
								</div>
							</div>
							<div class="col-md-4">
								<div style="min-height: 300px;background-color: purple;">
									<a href="<?php echo get_home_url( null, 'ways-to-help/foster-home' ) ?>"
									   class="btn btn-primary">
										Foster Home
									</a>
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
