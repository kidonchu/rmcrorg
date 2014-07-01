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

	<div class="row main-footer">

		<div class="col-md-3">
			<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/logo_main.png"
			     alt="<?php bloginfo( 'name' ); ?>">
		</div>

		<div class="col-md-3">
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
		<div class="col-md-3">
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
		<div class="col-md-3">
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

	<p>
		Rocky Mountain Cocker Rescue in Colorado is a nonprofit, tax-exempt organization under Section 501(c)(3) of
		the Internal Revenue Code. All donations are tax deductible as allowed by law.
	</p>

</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
