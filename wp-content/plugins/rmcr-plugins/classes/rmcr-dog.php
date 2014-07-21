<?php

class RMCR_Dog {

	private $_id;
	private $_data = array();
	private $_fields = array(
		'name', 'status', 'rmcr_id', 'gender', 'age', 'adoption_fee',
		'short_description', 'description', 'not_good_with',
		'photo1', 'photo2', 'photo3', 'photo4',
	);
	private $_required_fields = array(
		'name', 'status', 'rmcr_id', 'gender', 'age', 'short_description', 'description',
	);

	public function __construct( $id = false ) {
		$this->_id = $id;
		if ( ! $this->_id ) {
			$this->_id = get_the_ID();
		}
		foreach ( $this->_fields as $field ) {
			$this->set_data( $field, get_field( $field, $this->_id ) );
		}
	}

	public function has_required_fields() {
		foreach ( $this->_required_fields as $key ) {
			if ( null === $this->get_data( $key ) ) {
				return false;
			}
		}
		return true;
	}

	public function get_status_label() {
		$html = '';

		$status = $this->get_data( 'status' );
		if ( $status ) {
			switch ( $status ) {
				case 'Pending':
					$html = '<span class="label label-danger">PENDING</span>';
					break;
				case 'Sidelined':
					$html = '<span class="label label-warning">SIDELINED</span>';
					break;
				case 'Adoptable':
					$html = '<span class="label label-success">ADOPTABLE</span>';
					break;
				case 'Adopted':
					$html = '<span class="label label-info">ADOPTED</span>';
					break;
				default:
					$html = '<span class="label label-default">UNKNOWN</span>';
			}
		}

		return $html;
	}

	public function get_age_translated() {
		$ret = false;

		$age = $this->get_data( 'age' );
		if ( $age ) {
			switch ( $age ) {
				case 1:
				case 2:
				case 3:
					$ret = 'Puppy';
					break;
				case 4:
				case 5:
				case 6:
					$ret = 'Young';
					break;
				case 7:
				case 9:
				case 10:
					$ret = 'Adult';
					break;
				default:
					$ret = 'Senior';
			}
		}

		return $ret;
	}

	public function get_adopt_link() {
		if ( $this->get_data( 'name' ) ) {
			return '<a href="' . get_home_url( null, 'adoption-information' ) . '" class="btn btn-warning pull-right">Adopt ' . $this->get_data( 'name' ) . ' Now</a>';
		}
		return '';
	}

	public function get_not_good_with_translated() {
		if ( $this->get_data( 'not_good_with' ) ) {
			return implode( ', ', $this->get_data( 'not_good_with' ) );
		}
		return '';
	}

	public function set_data( $key, $value ) {
		$this->_data[ $key ] = $value;
		return $this;
	}

	public function get_data( $key = null ) {

		// fetch all data if key is not provided
		if ( ! $key && $this->_data ) {
			return $this->_data;
		}

		if ( isset( $this->_data[ $key ] ) ) {
			return $this->_data[ $key ];
		}

		return null;
	}

	public function the_dog_block() {
		?>

		<div class="dog-block">

			<?php $images = get_images_src(); ?>

			<a href="<?php echo get_the_permalink( $this->_id ); ?>">
				<?php if ( isset( $images[ 'image1' ] ) ) : ?>
					<img class="dog-thumb"
					     src="<?php echo $images[ 'image1' ][ 0 ]; ?>"
					     alt="<?php echo $this->get_data( 'name' ) ?>"/>
				<?php else: ?>
					<img class="dog-thumb"
					     src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/image_placeholder.jpg"
					     alt="<?php echo $this->get_data( 'name' ) ?>"/>
				<?php endif; ?>
			</a>

			<h3 class="dog-title">
				<a href="<?php echo get_the_permalink( $this->_id ); ?>">
					<?php echo $this->get_data( 'name' ) ?>
				</a>
			</h3>

			<p class="dog-description">
				<span class="dog-status">
					<?php echo $this->get_status_label(); ?>
				</span>
				<span class="dog-gender">
					<strong>Gender:</strong>
					<?php echo $this->get_data( 'gender' ); ?>
				</span>
				<span class="dog-age">
					<strong>Age:</strong>
					<?php echo $this->get_age_translated(); ?>
				</span>
			</p>

		</div>

	<?php
	}

	public function get_post() {
		return WP_Post::get_instance( $this->_id );
	}

	public function get_permalink() {
		return get_the_permalink( $this->_id );
	}
}