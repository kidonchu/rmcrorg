<?php

class Rds {

	const POSTS_PER_SLIDE = 5;

	private static $initiated = false;

	public static function init() {
		if ( ! self::$initiated ) {
			self::init_hooks();
		}
	}

	/**
	 * Initializes WordPress hooks
	 */
	private static function init_hooks() {
		self::$initiated = true;
		add_action( 'wp_print_styles', array( 'Rds', 'add_style' ) );
	}

	public static function add_custom_style() {
		echo "<style type=\"text/css\" media=\"screen\">" . stripslashes( get_option( 'rds_custom_css' ) ) . "</style>";
	}

	/** Link the needed stylesheet */
	public static function add_style() {
		wp_enqueue_style( 'rds-style', WP_PLUGIN_URL . '/rmcr-dogs-slider/css/style.css' );
	}

	public static function show_slider() {

		$recent_posts = get_posts( array(
			'numberposts' => - 1,
			'post_type'   => 'dog',
			'post_status' => 'publish'
		) );

		// get only adoptable dogs
		$dogs = array();
		foreach ( $recent_posts as $post ) {
			$dog = new RMCR_Dog( $post->ID );
			if ( $dog->get_data( 'status' ) == 'Adoptable' ) {
				$dogs[ ] = $dog;
			}
		}

		$total_num_posts = count( $dogs );
		$num_pages = ceil( $total_num_posts / self::POSTS_PER_SLIDE );
		?>

		<!-- RMCR Dogs Slider js script -->
		<script>
			$j = jQuery.noConflict();
			$j(document).ready(function () {

				var $play, $active;

				$j(".rds .paging a:first").addClass("active");

				var imageWidth = $j(".rds .window").width();
				var imageReelWidth = imageWidth * '<?php echo $num_pages ?>';

				$j(".rds .slider").css({"width": imageReelWidth});

				var slide = function () {

					var triggerID = $active.attr("rel") - 1;
					var sliderPosition = triggerID * imageWidth;

					$j(".rds .paging a").removeClass("active");
					$active.addClass("active");

					$j(".rds .slider").stop(true, false).animate({
						left: -sliderPosition
					}, 500);

				};

				var showNextSlide = function () {

					$play = setInterval(function () {

						$active = $j(".rds .paging a.active").next();

						// if last page, go back to beginning
						if ($active.length === 0) {
							$active = $j(".rds .paging a:first");
						}

						slide();

					}, 5000);
				};

				showNextSlide();

				// paging hover event
				$j(".rds .slider a").hover(function () {
					clearInterval($play);
				}, function () {
					showNextSlide();
				});

				// paging click event
				$j(".rds .paging a").click(function () {
					$active = $j(this);
					clearInterval($play);
					slide();
					showNextSlide();
					return false; // prevent browser jump
				});
			});
		</script>

		<div class="rds">
			<div class="window">
				<div class="row">
					<div class="slider">
						<?php $p = 0; ?>
						<?php for ( $i = 1; $i <= $total_num_posts; $i += self::POSTS_PER_SLIDE ): ?>
							<div class="slide">
								<?php for ( $j = 1; $j <= self::POSTS_PER_SLIDE; $j ++ ): ?>
									<?php if ( $p == $total_num_posts ) : ?>
										<?php break; ?>
									<?php endif; ?>
									<?php /** @var $dog RMCR_Dog */
									$dog = $dogs[ $p ]; ?>
									<div class="col col-md-2">

										<?php $dog->the_dog_block(); ?>

									</div>
									<?php $p ++; ?>
								<?php endfor; ?>
							</div>
						<?php endfor; ?>
					</div>
				</div>
			</div>
			<div class="paging">
				<?php for ( $p = 1; $p <= $num_pages; $p ++ ): ?>
					<a href="#" rel="<?php echo $p; ?>"><?php echo $p; ?></a>
				<?php endfor; ?>
			</div>
		</div>
	<?php
	}
}