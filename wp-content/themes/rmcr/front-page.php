<?php get_header(); ?>

</div>

<div class="hero-wrapper">
	<div class="container">
		<div class="hero">
			<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/large2.jpg"
			     alt="Rocky Mountain Cocker Rescue Org" style="width:100%;height:300px;">
		</div>
	</div>
</div>

<div class="container">

	<div class="row">

		<div class="col-md-9">

			<div class="dog-slider">

				<header class="clearfix">

					<h2 class="home-title pull-left">
						Cocker Spaniels Waiting For Your Adoption
					</h2>

					<a class="btn btn-warning pull-right"
					   href="<?php echo get_home_url( null, 'dog-adoption/adopt-rescued-cocker-spaniels' ) ?>">
						View All Adoptable Dogs
					</a>

				</header>

				<?php if ( class_exists( 'Rds' ) ) : ?>
					<?php Rds::show_slider() ?>
				<?php endif; ?>

				<div class="row">

					<div class="col-md-4">

						<?php dynamic_sidebar( 'featured-dog' ); ?>

					</div>

					<div class="col-md-4">

						<header class="col-header">

						<?php dynamic_sidebar( 'new-story' ) ?>

						</header>

					</div>
				</div>

			</div>

		</div>

		<?php get_sidebar(); ?>

	</div>

	<?php get_footer(); ?>
