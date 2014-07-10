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
				<aside class="footer-col">
					<header class="footer-col-header">
						<h4 class="footer-col-title">Contact Info</h4>
					</header>
					<div class="footer-col-content">
						<p>
							<strong>Address: </strong>PO Box 482, Parker, CO 80134<br/>
							<strong>Email: </strong>kathryn@rockymountaincockerrescue.org<br/>
							<strong>Phone: </strong>303.617.1939<br/>
							<strong>Fax: </strong>303.680.6692<br/>
							<strong>Map: </strong>
							<a href="https://www.google.com/maps/place/Parker,+CO/@39.5080554,-104.765689,12z/data=!3m1!4b1!4m2!3m1!1s0x876c91ce239a3d55:0xd49aeed43d2e2426">
								View Map
							</a>
						</p>
					</div>
				</aside>
				<aside class="footer-col">
					<header class="footer-col-header">
						<h4 class="footer-col-title">Follow Us</h4>
					</header>
					<div class="footer-col-content">
						<ul>
							<li>
								<a href="#">Facebook</a>
							</li>
							<li>
								<a href="#">Twitter</a>
							</li>
						</ul>
					</div>
				</aside>
			</div>
		</div>

		<p>
			Rocky Mountain Cocker Rescue in Colorado is a nonprofit, tax-exempt organization under Section 501(c)(3) of
			the Internal Revenue Code. All donations are tax deductible as allowed by law.
		</p>

	</div>

</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
