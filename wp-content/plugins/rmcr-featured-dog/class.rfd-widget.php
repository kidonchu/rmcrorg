<?php

class Rfd_Widget extends WP_Widget {

	public function __construct() {

		load_plugin_textdomain( 'rfd' );

		parent::__construct(
			'rfd_widget',
			__( 'RMCR Featured Dog Widget', 'rfd' ),
			array( 'description' => __( 'Display featured dog of the week', 'rfd' ) )
		);

		if ( is_active_widget( false, false, $this->id_base ) ) {
			add_action( 'wp_head', array( $this, 'css' ) );
		}
	}

	function css() {
		?>
		<style type="text/css">
		</style>
	<?php
	}

	public function form( $instance ) {

		$dogs = get_posts( array( 'post_type' => 'dog' ) );

		$title = ( isset( $instance[ 'title' ] ) ) ? $instance[ 'title' ] : '';
		$post_id = ( isset( $instance[ 'post_id' ] ) ) ? $instance[ 'post_id' ] : '';
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat"
			       name="<?php echo $this->get_field_name( 'title' ); ?>"
			       value="<?php echo $title ?>"/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'post_id' ); ?>">Featured Dog ID:</label>
			<select id="<?php echo $this->get_field_id( 'post_id' ); ?>"
			        class="widefat"
			        name="<?php echo $this->get_field_name( 'post_id' ); ?>">
				<?php foreach ( $dogs as $dog ) : ?>
					<?php if ( function_exists( 'the_field' ) ) : ?>
						<?php if ( get_field( 'status', $dog->ID ) == 'Adoptable' ) : ?>
							<option
								value="<?php echo $dog->ID; ?>" <?php echo ( $dog->ID == $post_id ) ? 'selected' : '' ?>>
								<?php the_field( 'rmcr_id', $dog->ID ); ?>
							</option>
						<?php endif; ?>
					<?php endif; ?>
				<?php endforeach; ?>
			</select>
		</p>

	<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $new_instance;
		$instance[ 'title' ] = ( ! empty( $new_instance[ 'title' ] ) ) ? strip_tags( $new_instance[ 'title' ] ) : '';
		return $instance;
	}


	public function widget( $args, $instance ) {

		$title = apply_filters( 'widget_title', $instance[ 'title' ] );
		if ( $title ) {
			$title = $args[ 'before_title' ] . $title . $args[ 'after_title' ];
		}

		echo $args[ 'before_widget' ];

		$dog = false;
		if ( ! empty( $instance[ 'post_id' ] ) ) {
			$dog = new RMCR_Dog( $instance[ 'post_id' ] );
		}
		?>

		<?php if ( $dog ) : ?>
			<?php echo $title ?>
			<a href="<?php echo $dog->get_permalink(); ?>"><?php echo $dog->get_data( 'name' ); ?></a>
			<img src="<?php echo $dog->get_data( 'photo1' ); ?>" alt="<?php $dog->get_data( 'rmcr_id' ); ?>">
			<p>
				<strong>Gender:</strong>
				<?php echo $dog->get_data('gender'); ?><br/>
				<strong>Age:</strong>
				<?php echo $dog->get_age_translated(); ?>
			</p>
			<p><?php echo $dog->get_data( 'short_description' ); ?></p>
		<?php endif; ?>

		<?php
		echo $args[ 'after_widget' ];
	}
}

function rfd_register_widgets() {
	register_widget( 'Rfd_Widget' );
}

add_action( 'widgets_init', 'rfd_register_widgets' );
