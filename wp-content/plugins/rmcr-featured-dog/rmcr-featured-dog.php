<?php
/*
Plugin Name: RMCR Featured Dog
Description: This plugin handles featured dog of the week for RMCR
Version: 0.1.0
Author: Kidon Chu
*/

define( 'RFD__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( RFD__PLUGIN_DIR . 'class.rfd.php' );
require_once( RFD__PLUGIN_DIR . 'class.rfd-widget.php' );

add_action( 'init', array( 'Rfd', 'init' ) );

