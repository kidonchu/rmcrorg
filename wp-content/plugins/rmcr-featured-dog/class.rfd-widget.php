<?php

class Rfd_Widget extends WP_Widget {

	public function __construct() {

		load_plugin_textdomain( 'rfd' );

		parent::__construct(
			'rfd_widget',
			__( 'RMCR Featured Dog Widget' , 'rfd'),
			array( 'description' => __( 'Display featured dog of the week' , 'rfd') )
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

		$dogs = get_posts(array('post_type' => 'dog'));
	?>

		<p>
			<label for="<?php echo $this->get_field_id('post_id'); ?>">Featured Dog ID:</label>
			<select id="<?php echo $this->get_field_id('post_id'); ?>"
			        class="widefat"
			        name="<?php echo $this->get_field_name('post_id'); ?>">
				<?php foreach($dogs as $dog) : ?>
					<?php if(function_exists('the_field')) : ?>
						<?php if(get_field('status', $dog->ID) == 'Adoptable') : ?>
							<option value="<?php echo $dog->ID; ?>"><?php the_field('rmcr_id', $dog->ID); ?></option>
						<?php endif; ?>
					<?php endif; ?>
				<?php endforeach; ?>
			</select>
		</p>

	<?php
	}

	public function widget( $args, $instance ) {

		echo $args['before_widget'];

		$dog = false;
		if ( ! empty( $instance['post_id'] ) ) {
			$dog = new RMCR_Dog($instance['[post_id']);
		}
		?>

		<?php if($dog) : ?>
			<h3>Featured Dog</h3>
			<img src="<?php echo $dog->get_data('photo1') ?>" alt="<?php $dog->get_data('rmcr_id') ?>">
		<?php endif; ?>

		<?php
		echo $args['after_widget'];
	}
}

function rfd_register_widgets() {
	register_widget( 'Rfd_Widget' );
}

add_action( 'widgets_init', 'rfd_register_widgets' );
