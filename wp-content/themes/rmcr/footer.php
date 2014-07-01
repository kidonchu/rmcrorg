<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package rmcr
 */
?>

	</div><!-- #content -->

	<footer id="mastfooter" class="site-footer container" role="contentinfo">

		<div class="row">
			<div class="col-md-4">
				<?php if ( ! dynamic_sidebar( 'footer-1' ) ) : ?>

					<aside id="meta" class="widget">
						<h1 class="widget-title"><?php _e( 'Meta', 'rmcr' ); ?></h1>
						<ul>
							<?php wp_register(); ?>
							<li><?php wp_loginout(); ?></li>
							<?php wp_meta(); ?>
						</ul>
					</aside>

				<?php endif; // end sidebar widget area ?>
			</div>
			<div class="col-md-4">
				<?php if ( ! dynamic_sidebar( 'footer-2' ) ) : ?>

					<aside id="meta" class="widget">
						<h1 class="widget-title"><?php _e( 'Meta', 'rmcr' ); ?></h1>
						<ul>
							<?php wp_register(); ?>
							<li><?php wp_loginout(); ?></li>
							<?php wp_meta(); ?>
						</ul>
					</aside>

				<?php endif; // end sidebar widget area ?>
			</div>
			<div class="col-md-4">
				<?php if ( ! dynamic_sidebar( 'footer-3' ) ) : ?>

					<aside id="meta" class="widget">
						<h1 class="widget-title"><?php _e( 'Meta', 'rmcr' ); ?></h1>
						<ul>
							<?php wp_register(); ?>
							<li><?php wp_loginout(); ?></li>
							<?php wp_meta(); ?>
						</ul>
					</aside>

				<?php endif; // end sidebar widget area ?>
			</div>
		</div>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'rmcr' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'rmcr' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'rmcr' ), 'rmcr', '<a href="http://kidonchu.com" rel="designer">Kidon Chu</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
