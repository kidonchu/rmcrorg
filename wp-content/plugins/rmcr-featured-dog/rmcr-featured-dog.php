<?php
/*
Plugin Name: RMCR Featured Dog
Description: This plugin handles featured dog of the week for RMCR
Version: 0.1.0
Author: Kidon Chu
Dependency:
- Advanced Custom Fields
- class: RMCR Dog
*/
if ( ! class_exists( 'Rmcr_Featured_Dog' ) ):

	class Rmcr_Featured_Dog {

		protected $_version = '0.1.0';

		public function __construct() {
			add_action( 'wp_enqueue_scripts', array( $this, 'add_styles' ) );
			$this->_include_core();
		}

		public function add_styles()
		{
			wp_enqueue_style( 'rfd-style', WP_PLUGIN_URL . '/rmcr-featured-dog/css/rfd-style.css', array(), $this->_version );
		}

		public function _include_core() {
			include_once( 'core/class.rfd.php' );
			include_once( 'core/class.rfd-widget.php' );
		}

	}

endif;

$rfd = new Rmcr_Featured_Dog();
