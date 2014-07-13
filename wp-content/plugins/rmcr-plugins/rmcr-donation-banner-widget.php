<?php

class Rmcr_Donation_Banner_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'rmcr_donation_banner_widget', // base ID
			__( 'Donation Banner Widget', 'rmcr_donation_banner_widget_domain' ), // widget name
			array(
				'description' => __( 'Donation banner widget', 'rmcr_donation_banner_widget_domain' ),
			)
		);
	}

	public function widget( $args, $instance ) {

		$title = apply_filters( 'widget_title', $instance[ 'title' ] );

		echo $args[ 'before_widget' ];

		if ( ! empty( $title ) ) {
			echo $args[ 'before_title' ] . $title . $args[ 'after_title' ];
		}
		?>

		<div class="banner-widget">
			<a href="<?php echo home_url( 'ways-to-help/donate' ) ?>"
			   title="Donate to RMCR">
				<img class="banner-widget-img"
				     src="http://local.rmcr.org/wp-content/uploads/2014/07/donation-banner.jpg"
				     alt="Donation Banner"/>
			</a>
		</div>

		<?php

		echo $args[ 'after_widget' ];
	}

	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = __( 'New title', 'rmcr_donation_banner_widget_domain' );
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
			       name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
			       value="<?php echo esc_attr( $title ); ?>"/>
		</p>
	<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance[ 'title' ] = ( ! empty( $new_instance[ 'title' ] ) ) ? strip_tags( $new_instance[ 'title' ] ) : '';
		return $instance;
	}
}

function register_donation_banner_widget() {
	register_widget( 'rmcr_donation_banner_widget' );
}

add_action( 'widgets_init', 'register_donation_banner_widget' );
