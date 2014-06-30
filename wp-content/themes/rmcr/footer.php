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
