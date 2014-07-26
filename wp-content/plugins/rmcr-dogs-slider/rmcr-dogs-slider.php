<?php
/*
Plugin Name: RMCR Dogs Slider
Description: This plugin generates a slider with post type: Dog
Version: 0.1.0
Author: Kidon Chu
*/

require_once( WP_PLUGIN_DIR . '/rmcr-dogs-slider/core/class.rds.php' );

add_action( 'init', array( 'Rds', 'init' ) );
