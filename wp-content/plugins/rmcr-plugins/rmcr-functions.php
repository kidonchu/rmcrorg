<?php
/*
Plugin Name: Functions Plugin for RMCR
Description: Site specific functions.php for RMCR
*/

/* Custom Post Type: Dog */
function register_custom_post_type_dog() {
	register_post_type( 'dog', array(
		'label'           => 'Dogs',
		'description'     => 'Custom Post Type: Dog',
		'public'          => true,
		'show_ui'         => true,
		'show_in_menu'    => true,
		'capability_type' => 'post',
		'map_meta_cap'    => true,
		'hierarchical'    => false,
		'rewrite'         => array( 'slug' => 'dogs', 'with_front' => true ),
		'query_var'       => true,
		'supports'        => array( 'title', 'trackbacks', 'custom-fields', 'revisions', 'thumbnail', 'page-attributes', 'post-formats' ),
		'labels'          => array(
			'name'               => 'Dogs',
			'singular_name'      => 'Dog',
			'menu_name'          => 'Dogs',
			'add_new'            => 'Add Dog',
			'add_new_item'       => 'Add New Dog',
			'edit'               => 'Edit',
			'edit_item'          => 'Edit Dog',
			'new_item'           => 'New Dog',
			'view'               => 'View Dog',
			'view_item'          => 'View Dog',
			'search_items'       => 'Search Dogs',
			'not_found'          => 'No Dogs Found',
			'not_found_in_trash' => 'No Dogs Found in Trash',
			'parent'             => 'Parent Dog',
		)
	) );
}

add_action( 'init', 'register_custom_post_type_dog' );

/* Custom Post Type: Product */
function register_custom_post_type_product() {
	register_post_type( 'product', array(
		'label'           => 'Products',
		'description'     => 'Custom Post Type: Product',
		'public'          => true,
		'show_ui'         => true,
		'show_in_menu'    => true,
		'capability_type' => 'post',
		'map_meta_cap'    => true,
		'hierarchical'    => false,
		'rewrite'         => array( 'slug' => 'rmcr-store', 'with_front' => true ),
		'query_var'       => true,
		'supports'        => array( 'title', 'trackbacks', 'custom-fields', 'revisions', 'thumbnail', 'page-attributes', 'post-formats' ),
		'labels'          => array(
			'name'               => 'Products',
			'singular_name'      => 'Product',
			'menu_name'          => 'Products',
			'add_new'            => 'Add Products',
			'add_new_item'       => 'Add New Products',
			'edit'               => 'Edit',
			'edit_item'          => 'Edit Products',
			'new_item'           => 'New Products',
			'view'               => 'View Products',
			'view_item'          => 'View Products',
			'search_items'       => 'Search Products',
			'not_found'          => 'No Products Found',
			'not_found_in_trash' => 'No Products Found in Trash',
			'parent'             => 'Parent Product',
		)
	) );
}

add_action( 'init', 'register_custom_post_type_product' );

// Custom template for Dog & Product
function my_cpt_post_types( $post_types ) {
	$post_types = array( 'post', 'dog', 'product' );
	return $post_types;
}

add_filter( 'cpt_post_types', 'my_cpt_post_types' );
add_filter( 'images_cpt', 'my_cpt_post_types' );

/**
 * Register widget area.
 */
function rmcr_register_widget_areas() {
	register_sidebar( array(
		'name'          => __( 'Event Promotion 1', 'rmcr' ),
		'id'            => 'event-promotion-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget event-promotion-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Event Promotion 2', 'rmcr' ),
		'id'            => 'event-promotion-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget event-promotion-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Event Promotion 3', 'rmcr' ),
		'id'            => 'event-promotion-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget event-promotion-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'rmcr' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget footer-col %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="footer-col-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'rmcr' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget footer-col %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="footer-col-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'rmcr' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget footer-col %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="footer-col-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Featured Dog', 'rmcr' ),
		'id'            => 'featured-dog',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget featured-dog-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'New Story', 'rmcr' ),
		'id'            => 'new-story',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget new-story-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><a href="' . esc_url( home_url( 'blog' ) ) . '">',
		'after_title'   => '</a></h3>',
	) );
}

add_action( 'widgets_init', 'rmcr_register_widget_areas' );

// custom admin settings
function setup_admin() {
	add_options_page( 'Google Calendar Events', 'Google Calendar Events', 'manage_options', basename( __FILE__ ), array( $this, 'admin_page' ) );
	add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
}

/**
 * Load Dog class
 */
require dirname( __FILE__ ) . '/classes/rmcr-dog.php';

/**
 * Load Donation Banner Widget
 */
require dirname( __FILE__ ) . '/rmcr-donation-banner-widget.php';

/**
 * Load Adoption Banner Widget
 */
require dirname( __FILE__ ) . '/rmcr-adoption-banner-widget.php';
