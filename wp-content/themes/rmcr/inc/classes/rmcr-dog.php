<?php

class RMCR_Dog {

	private $_data = array();
	private $_fields = array(
		'name', 'status', 'rmcr_id', 'gender', 'age', 'adoption_fee',
		'short_description', 'description', 'not_good_with',
		'photo1', 'photo2', 'photo3', 'photo4',
	);

	public function __construct() {
		foreach ( $this->_fields as $field ) {
			$this->setData( $field, get_field( $field ) );
		}
	}

	public function getStatusLabel() {
		$html = '';

		$status = $this->getData( 'status' );
		if ( $status ) {
			switch ( $status ) {
				case 'Pending':
					$html = '<span class="label label-danger">PENDING</span>';
					break;
				case 'Adoptable':
					$html = '<span class="label label-success">ADOPTABLE</span>';
					break;
				case 'Adopted':
					$html = '<span class="label label-info">ADOPTED</span>';
					break;
			}
		}

		return $html;
	}

	public function getAgeTranslated() {
		$ret = false;

		$age = $this->getData( 'age' );
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

	public function getAdoptLink()
	{
		if ($this->getData('name')) {
			return '<a href="#" class="btn btn-warning pull-right">Adopt ' . $this->getData('name') . ' Now</a>';
		}
		return '';
	}
	
	public function getNotGoodWithTranslated()
	{
		if ($this->getData('not_good_with')) {
			return implode(', ', $this->getData('not_good_with'));
		}
		return '';
	}

	public function setData( $key, $value ) {
		$this->_data[ $key ] = $value;
		return $this;
	}

	public function getData( $key ) {
		if ( isset( $this->_data[ $key ] ) ) {
			return $this->_data[ $key ];
		}
		return null;
	}
}