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

// Enable internationalisation
//		load_plugin_textdomain( 'rds', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

//To perform action while activating pulgin i.e. creating the thumbnail of first image of  all posts
//		register_activation_hook( __FILE__, 'rds_activate' );

		// To perform action while publishing post i.e. creating the thumbnail of first image of post
//		add_action( 'publish_post', array( 'Rds', 'publish_post' ) );

		//Add  the needed styles & script
		add_action( 'wp_print_styles', array( 'Rds', 'add_style' ) );
//		add_action( 'wp_head', 'rds_add_custom_style' );
//		add_action( 'init', 'rds_add_script' );

		// add color picker
//		add_action( 'admin_enqueue_scripts', 'rds_enqueue_color_picker' );
	}

	public static function add_custom_style() {
		echo "<style type=\"text/css\" media=\"screen\">" . stripslashes( get_option( 'rds_custom_css' ) ) . "</style>";
	}

	/** Link the needed stylesheet */
	public static function add_style() {
		wp_enqueue_style( 'rds-style', WP_PLUGIN_URL . '/rmcr-dogs-slider/css/style.css' );
	}


	public static function show_slider( $category_ids = null, $status_to_show = 'adoptable' ) {

		$recent_posts = get_posts( array(
			'numberposts' => - 1,
//		'offset'      => 0,
//		'category'    => '',
//		'orderby'     => 'post_date',
//		'order'       => 'DESC',
//		'include'     => '',
//		'exclude'     => '',
			'post_type'   => 'dog',
			'post_status' => 'publish'
		) );

		$total_num_posts = count( $recent_posts );
		$num_pages = ceil( $total_num_posts / self::POSTS_PER_SLIDE );

		$dogs = array();
		foreach ( $recent_posts as $post ) {

			$dog = new RMCR_Dog( $post->ID );
			if ($dog->get_data('status') == 'Adoptable') {
				$dog->set_data( 'permalink', get_permalink( $post->ID ) );
				$dogs[ ] = $dog;
			}

		}
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
								<div class="col">

									<?php $dog->the_dog_block(); ?>
									<h3 class="title">
										<a href="<?php echo $dog->get_data( 'permalink' ); ?>">
											<?php echo $dog->get_data( 'name' ); ?>
										</a>
									</h3>

									<a href="<?php echo $dog->get_data( 'permalink' ); ?>">
										<img class="thumb" src="<?php echo $dog->get_data( 'photo1' ); ?>"
										     alt="Photo of <?php echo $dog->get_data( 'name' ) ?>">
									</a>

									<div class="content">

										<p>
											<strong>Gender:</strong>
											<?php echo $dog->get_data( 'gender' ); ?><br>
											<strong>Age:</strong>
											<?php echo $dog->get_age_translated(); ?>
										</p>

									</div>

								</div>
								<?php $p ++; ?>
							<?php endfor; ?>
						</div>
					<?php endfor; ?>
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