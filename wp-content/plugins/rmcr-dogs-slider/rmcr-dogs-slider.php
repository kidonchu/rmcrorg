<?php
/*
Plugin Name: RMCR Dogs Slider
Description: This plugin generates a slider with post type: Dog
Version: 0.1.0
Author: Kidon Chu
*/

define( 'RDS__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( RDS__PLUGIN_DIR . 'class.rds.php' );

add_action( 'init', array( 'Rds', 'init' ) );

//function rds_enqueue_color_picker() {
//	wp_enqueue_style( 'wp-color-picker' );
//	wp_enqueue_script( 'rds-color-picker-script', plugins_url( 'js/rds.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
//}
//
///**
// *Set the default options while activating the pugin & create thumbnails of first image of all the posts
// */
//function rds_activate() {
//
//	$posts_per_slide = get_option( 'rds_post_per_slide' );
//	if ( empty( $posts_per_slide ) ) {
//		$posts_per_slide = '4';
//		update_option( 'rds_post_per_slide', $posts_per_slide );
//	}
//
//	rds_post_img_thumb();
//}
//
///**
// *  Called on post publish
// *  add_action( 'publish_post', 'rds_publish_post' );
// */
//function rds_publish_post() {
//	global $post;
//	rds_post_img_thumb( (int)$post->ID );
//}
//
///**
// *It creates thumbnails of first image of post
// *
// * @param $post_id
// *
// * @return void
// */
//function rds_post_img_thumb( $post_id = null ) {
//	$width = get_option( 'rds_width' );
//	$height = get_option( 'rds_height' );
//	$slider_content = get_option( 'rds_slider_content' );
//	$post_per_slide = get_option( 'rds_post_per_slide' );
//	$total_posts = get_option( 'rds_total_posts' );
//	$category_ids = get_option( 'rds_category_ids' );
//	$post_include_ids = get_option( 'rds_post_include_ids' );
//	$post_exclude_ids = get_option( 'rds_post_exclude_ids' );
//
//	$set_img_width = ( $width / $post_per_slide ) - 12;
//	if ( $slider_content == 3 ) {
//		$set_img_width = (int)( ( $set_img_width / 2 ) - 20 );
//	}
//	$set_img_height = $height - 54;
//
//	if ( empty( $post_id ) ) {
//		$args = array(
//			'numberposts' => $total_posts,
//			'offset'      => 0,
//			'category'    => $category_ids,
//			'orderby'     => 'post_date',
//			'order'       => 'DESC',
//			'include'     => $post_include_ids,
//			'exclude'     => $post_exclude_ids,
//			'post_type'   => 'post',
//			'post_status' => 'publish' );
//		$recent_posts = get_posts( $args );
//		if ( count( $recent_posts ) < $total_posts ) {
//			$total_posts = count( $recent_posts );
//		}
//
//		foreach ( $recent_posts as $key => $val ) {
//			$post_details[ $key ][ 'post_ID' ] = $val->ID;
//			$post_details[ $key ][ 'post_content' ] = $val->post_content;
//		}
//	} else {
//		$post_details[ '0' ][ 'post_ID' ] = $post_id;
//		$get_post_details = get_post( $post_id );
//		$post_details[ '0' ][ 'post_content' ] = $get_post_details->post_content;
//	}
//
//	foreach ( $post_details as $key_p => $val_p ) {
//
//		$first_img_name = '';
//		$img_name = '';
//		$first_img_src = '';
//		$first_img_name_arr = get_post_custom_values( 'rds_custom_thumb', $val_p[ 'post_ID' ] );
//		$first_img_name = $first_img_name_arr[ '0' ];
//
//		if ( function_exists( 'has_post_thumbnail' ) && has_post_thumbnail( $val_p[ 'post_ID' ] ) && empty( $first_img_name ) ) {
//			$img_details = wp_get_attachment_image_src( get_post_thumbnail_id( $val_p[ 'post_ID' ] ), 'full' );
//			$first_img_name = $img_details[ 0 ];
//		} else {
//
//			if ( empty( $first_img_name ) ) {
//				preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $val_p[ 'post_content' ], $matches );
//
//				if ( count( $matches ) && isset( $matches[ 1 ] ) ) {
//					$first_img_name = $matches[ 1 ][ 0 ];
//				}
//			}
//		}
//
//		if ( isset( $_SERVER[ 'SUBDOMAIN_DOCUMENT_ROOT' ] ) && ! empty( $_SERVER[ 'SUBDOMAIN_DOCUMENT_ROOT' ] ) ) {
//			$server_root = $_SERVER[ 'SUBDOMAIN_DOCUMENT_ROOT' ];
//		} elseif ( isset( $_SERVER[ 'SPT_DOCROOT' ] ) && ! empty( $_SERVER[ 'SPT_DOCROOT' ] ) ) {
//			$server_root = $_SERVER[ 'SPT_DOCROOT' ];
//		} else {
//			$server_root = $_SERVER[ 'DOCUMENT_ROOT' ];
//		}
//
//		if ( ! empty( $first_img_name ) ) {
//			$arr_img = explode( '/', $first_img_name );
//			unset( $arr_img[ 0 ] );
//			unset( $arr_img[ 1 ] );
//			unset( $arr_img[ 2 ] );
//			if ( isset( $_SERVER[ 'SPT_DOCROOT' ] ) && ! empty( $_SERVER[ 'SPT_DOCROOT' ] ) ) {
//				unset( $arr_img[ 3 ] );
//			}
//			$first_img_src = $server_root . "/" . implode( '/', $arr_img );
//		}
//
//		if ( ! empty( $first_img_src ) ) {
//			$size = @getimagesize( $first_img_src );
//
//			if ( $set_img_width > 0 && $set_img_height > 0 && $size ) {
//				if ( $size[ 0 ] <= $set_img_width && $size[ 1 ] <= $set_img_height ) {
//					$img_file = $first_img_src;
//				} else {
//					$img_file = image_resize( $first_img_src, $set_img_width, $set_img_height, 'true' );
//				}
//			}
//
//			if ( ! empty( $img_file ) ) {
//				$new_wrp_img_src = substr( $img_file, strlen( $server_root ) );
//
//				if ( $rds_image_src = get_post_custom_values( '_rds_img_src', $val_p[ 'post_ID' ] ) ) {
//					$old_wrp_img_src = $rds_image_src[ '0' ];
//
//					if ( $old_wrp_img_src != $new_wrp_img_src ) {
//						$old_img_path = $server_root . $old_wrp_img_src;
//						if ( ! empty( $old_wrp_img_src ) ) {
//							$is_delete = get_post_meta( $val_p[ 'post_ID' ], '_rds_is_delete_img' );
//							if ( is_file( $old_img_path ) && $is_delete[ 0 ] ) {
//								@unlink( $old_img_path );
//							}
//						}
//						update_post_meta( $val_p[ 'post_ID' ], '_rds_img_src', $new_wrp_img_src );
//					}
//				} else {
//					add_post_meta( $val_p[ 'post_ID' ], '_rds_img_src', $new_wrp_img_src );
//				}
//
//				if ( $size[ 0 ] <= $set_img_width && $size[ 1 ] <= $set_img_height ) {
//					if ( get_post_meta( $val_p[ 'post_ID' ], '_rds_is_delete_img' ) ) {
//						update_post_meta( $val_p[ 'post_ID' ], '_rds_is_delete_img', 0 );
//					}
//				} else {
//					if ( get_post_meta( $val_p[ 'post_ID' ], '_rds_is_delete_img' ) ) {
//						update_post_meta( $val_p[ 'post_ID' ], '_rds_is_delete_img', 1 );
//					} else {
//						add_post_meta( $val_p[ 'post_ID' ], '_rds_is_delete_img', 1 );
//					}
//				}
//			}
//		} else {
//			if ( $rds_image_src = get_post_custom_values( '_rds_img_src', $val_p[ 'post_ID' ] ) ) {
//				$old_wrp_img_src = $rds_image_src[ '0' ];
//
//				$old_img_path = $server_root . $old_wrp_img_src;
//				if ( ! empty( $old_wrp_img_src ) ) {
//					$is_delete = get_post_meta( $val_p[ 'post_ID' ], '_rds_is_delete_img' );
//					if ( is_file( $old_img_path ) && $is_delete[ 0 ] ) {
//						@unlink( $old_img_path );
//						delete_post_meta( $val_p[ 'post_ID' ], '_rds_img_src', $old_wrp_img_src );
//						delete_post_meta( $val_p[ 'post_ID' ], '_rds_is_delete_img' );
//					}
//				}
//			}
//		}
//	}
//	return;
//}
//
//
//
///** Link the needed script */
//function rds_add_script() {
//	if ( ! is_admin() ) {
//		wp_enqueue_script( 'jquery' );
//	}
//}
//
///** Create post excerpt manually
// *
// * @param $post_content
// * @param $excerpt_length
// *
// * @return post_excerpt or  void
// */
//function create_excerpt( $post_content, $excerpt_length, $post_permalink, $excerpt_words = null ) {
//	$keep_excerpt_tags = get_option( 'rds_keep_excerpt_tags' );
//
//	if ( ! $keep_excerpt_tags ) {
//		$post_excerpt = strip_shortcodes( $post_content );
//		$post_excerpt = str_replace( ']]>', ']]&gt;', $post_excerpt );
//		$post_excerpt = strip_tags( $post_excerpt );
//	} else {
//		$post_excerpt = $post_content;
//	}
//
//	$link_text = get_option( 'rds_link_text' );
//	if ( ! empty( $link_text ) ) {
//		$more_link = $link_text;
//	} else {
//		$more_link = "[more]";
//	}
//	if ( ! empty( $excerpt_words ) ) {
//		if ( ! empty( $post_excerpt ) ) {
//			$words = explode( ' ', $post_excerpt, $excerpt_words + 1 );
//			array_pop( $words );
//			array_push( $words, ' <a href="' . $post_permalink . '">' . $more_link . '</a>' );
//			$post_excerpt_rds = implode( ' ', $words );
//			return $post_excerpt_rds;
//		} else {
//			return;
//		}
//	} else {
//		$post_excerpt_rds = substr( $post_excerpt, 0, $excerpt_length );
//		if ( ! empty( $post_excerpt_rds ) ) {
//			if ( strlen( $post_excerpt ) > strlen( $post_excerpt_rds ) ) {
//				$post_excerpt_rds = substr( $post_excerpt_rds, 0, strrpos( $post_excerpt_rds, ' ' ) );
//			}
//			$post_excerpt_rds .= ' <a href="' . $post_permalink . '">' . $more_link . '</a>';
//			return $post_excerpt_rds;
//		} else {
//			return;
//		}
//	}
//}
