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

		echo $args[ 'before_widget' ];

		if ( !empty( $title ) ) {
			echo $args[ 'before_title' ] . $title . $args[ 'after_title' ];
		}

		$html = '<div style="min-height:100px;min-width:100%;background-color:tomato;">Adoption Banner</div>';
		echo $html;

		echo $args[ 'after_widget' ];
	}

	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = __( 'New title', 'rmcr_adoption_banner_widget_domain' );
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
		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ) ? strip_tags( $new_instance[ 'title' ] ) : '';
		return $instance;
	}
}

add_action( 'widgets_init', function() {
	register_widget( 'rmcr_adoption_banner_widget' );
} );
