<?php

class RMCR_Product {

	private $_id;
	private $_data = array();
	private $_fields = array(
		'status', 'price', 'product_image', 'shipping_cost', 'option1', 'option2', 'description',
	);
	private $_required_fields = array(
		'status', 'price', 'description',
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

	public function get_price() {
		$ret = '';
		$price = $this->get_data( 'price' );
		if ( $price ) {
			$ret = '$' . number_format( $price, 2, '.', ',' );
		}
		return $ret;
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

	public function the_product_block() {
		?>

		<div class="product-block clearfix">

			<a class="product-thumb"
			   href="<?php echo $this->get_permalink(); ?>"
			   title="<?php echo get_the_title( $this->_id ); ?>">
				<img class="product-thumb-img"
				     src="<?php $data = $this->get_data( 'product_image' );
				     echo $data; ?>"
				     alt="<?php echo get_the_title( $this->_id ); ?>"/>
			</a>

			<h3 class="product-title">
				<a href="<?php echo $this->get_permalink(); ?>" title="<?php echo get_the_title( $this->_id ); ?>">
					<?php the_title(); ?>
				</a>
			</h3>

			<p class="product-desc">
				<?php echo $this->get_data( 'description' ); ?><br/>
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