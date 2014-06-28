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

// Custom template for Dog
function my_cpt_post_types( $post_types ) {
	$post_types[ ] = 'dog';
	return $post_types;
}

add_filter( 'cpt_post_types', 'my_cpt_post_types' );
