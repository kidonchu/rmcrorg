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

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header>

					<img class="product-image"
					     src="<?php the_field('product_image'); ?>"
					     alt="<?php the_title(); ?>"/>

					<p class="product-desc">
						<?php the_field('description'); ?>
					</p>

					<?php echo do_shortcode( '[wp_cart_button name="' . get_the_title() .
						'" price="' . get_field( 'price' ) .
						'" var1="' . str_replace( ',', '|', get_field( 'option1' ) ) .
						'" var2="' . str_replace( ',', '|', get_field( 'option2' ) ) .
						'" shipping="' . get_field( 'shipping_cost' ) .
						'"]' );
					?>

					<footer class="entry-footer product-footer">
						<p>
							You can update the quantity in the shopping cart.<br/>
							<a class="btn btn-warning shopping-cart-link" href="<?php echo esc_url(home_url('rmcr-store/cart')); ?>">
								Go to Shopping Cart
							</a>
						</p>
					</footer>


					</article>

				<?php endwhile; ?>

			</main>

		</div>

		<?php get_sidebar(); ?>

	</div>

<?php get_footer(); ?>