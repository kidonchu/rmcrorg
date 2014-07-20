<?php
/**
 * Template Name Posts: Product
 * The Template for displaying a product
 *
 * @package rmcr
 */
?>
<?php get_header(); ?>
	<div class="row">
		<div class="col-md-9">
			<main id="content" class="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php $images = get_images_src(); ?>

					<?php foreach($images as $key => $image) : ?>
						<img src="<?php echo $image[0]; ?>" alt=""/>
					<?php endforeach; ?>


					<?php echo do_shortcode( '[wp_cart_button name="' . get_the_title() .
						'" price="' . get_field( 'price' ) . '" var1="' . str_replace( ',', '|', get_field( 'option1' ) ) . '"]' ); ?>

				<?php endwhile; ?>

			</main>

			<div class="shopping-cart">
				<?php // show shopping cart for every product page
				echo do_shortcode( '[show_wp_shopping_cart]' );
				?>
			</div>

		</div>

		<?php get_sidebar(); ?>

	</div>

<?php get_footer(); ?>