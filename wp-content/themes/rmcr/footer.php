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

<footer id="mastfooter" class="site-footer" role="contentinfo">

	<div class="container">

		<div class="row">

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
			<div class="col-md-3">

				<?php if ( ! dynamic_sidebar( 'footer-4' ) ) : ?>

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

	</div>

</footer>

<div class="bottom-footer">

	<?php if ( ! dynamic_sidebar( 'footer-5' ) ) : ?>

		<p class="text-center">
			Rocky Mountain Cocker Rescue in Colorado is a nonprofit, tax-exempt organization under Section 501(c)(3) of
			the Internal Revenue Code. All donations are tax deductible as allowed by law.
		</p>

	<?php endif; // end sidebar widget area ?>

</div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
