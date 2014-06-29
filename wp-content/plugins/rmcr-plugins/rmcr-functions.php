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

// Add filter to choose correct label for status
add_filter( 'convert_status', function ( $status ) {
	$html = '';
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
} );

// Add filter to convert age integer to string
add_filter( 'convert_age', function ( $age ) {
	if ( $age ) {
		switch ( $age ) {
			case 1:
			case 2:
			case 3:
				return 'Puppy';
			case 4:
			case 5:
			case 6:
				return 'Young';
			case 7:
			case 9:
			case 10:
				return 'Adult';
			default:
				return 'Senior';
		}
	}
} );
