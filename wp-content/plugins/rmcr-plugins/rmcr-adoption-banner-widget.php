<?php

class Rmcr_Adoption_Banner_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'rmcr_adoption_banner_widget', // base ID
			__( 'Adoption Banner Widget', 'rmcr_adoption_banner_widget_domain' ), // widget name
			array(
				'description' => __( 'Adoption banner widget', 'rmcr_adoption_banner_widget_domain' ),
			)
		);
	}

	public function widget( $args, $instance ) {

		$title = apply_filters( 'widget_title', $instance[ 'title' ] );
		$banner_path = $instance['banner_path'];

		echo $args[ 'before_widget' ];

		if ( ! empty( $title ) ) {
			echo $args[ 'before_title' ] . $title . $args[ 'after_title' ];
		}
		?>

		<div class="banner-widget">
			<a href="<?php echo home_url( 'dog-adoption/adopt-rescued-cocker-spaniels' ) ?>"
			   title="Adopt Rescued Cocker Spaniels">
				<img class="banner-widget-img"
				     src="<?php echo $banner_path; ?>"
				     alt="Adoption Banner"/>
			</a>
		</div>


		<?php

		echo $args[ 'after_widget' ];
	}

	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = __( 'New title', 'rmcr_adoption_banner_widget_domain' );
		}

		$banner_path = isset( $instance[ 'banner_path' ] ) ?
			$instance[ 'banner_path' ] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
			       name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
			       value="<?php echo esc_attr( $title ); ?>"/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'banner_path' ); ?>"><?php _e( 'Banner Image Path:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'banner_path' ); ?>"
			       name="<?php echo $this->get_field_name( 'banner_path' ); ?>" type="text"
			       value="<?php echo esc_attr( $banner_path ); ?>"/>
		</p>
	<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance[ 'title' ] = ( ! empty( $new_instance[ 'title' ] ) ) ? strip_tags( $new_instance[ 'title' ] ) : '';
		$instance[ 'banner_path' ] = ( ! empty( $new_instance[ 'banner_path' ] ) ) ? strip_tags( $new_instance[ 'banner_path' ] ) : '';
		return $instance;
	}
}

function register_adoption_banner_widget() {
	register_widget( 'rmcr_adoption_banner_widget' );
}

add_action( 'widgets_init', 'register_adoption_banner_widget' );
