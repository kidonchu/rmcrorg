<?php
/**
 * Template Name: Dog Grid
 * The Template for displaying dog grid.
 *
 * @package rmcr
 */
?>

<?php get_header(); ?>
<?php
$status = false;
?>

<div class="row">

	<div class="col-xs-9">

		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : the_post(); ?>

				<?php $status = get_post_meta( get_the_ID(), 'dog_status', true ); // used for dog grid display ?>

				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>

			<?php endif; ?>


			<?php $wp_query = new WP_Query( array( 'post_type' => 'dog', 'posts_per_page' => - 1 ) ); ?>
			<?php if ( $wp_query->have_posts() ) : ?>

				<div class="row dog-grid">

					<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

						<?php $dog = new RMCR_Dog( get_the_ID() ); ?>

						<?php // if status of the dog is specified, filter by status ?>
						<?php if ( $status != $dog->get_data( 'status' ) ) : ?>
							<?php continue; ?>
						<?php endif; ?>

						<div class="col-md-2">
							<?php $dog->the_dog_block(); ?>
						</div>

					<?php endwhile; ?>

				</div>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

		</main>

	</div>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
