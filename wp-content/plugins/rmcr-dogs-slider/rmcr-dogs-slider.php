<?php
/*
Plugin Name: RMCR Dogs Slider
Description: This plugin generates a slider with post type: Dog
Version: 0.1.0
Author: Kidon Chu
*/

// Enable internationalisation
load_plugin_textdomain( 'rds', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

//To perform action while activating pulgin i.e. creating the thumbnail of first image of  all posts
register_activation_hook( __FILE__, 'rds_activate' );

//Create menu for configure page
add_action( 'admin_menu', 'rds_admin_actions' );
add_action( 'admin_print_styles', 'rds_admin_style' );

// To perform action while publishing post i.e. creating the thumbnail of first image of post
add_action( 'publish_post', 'rds_publish_post' );

//Add  the nedded styles & script
add_action( 'wp_print_styles', 'rds_add_style' );
add_action( 'wp_head', 'rds_add_custom_style' );
add_action( 'init', 'rds_add_script' );

// add color picker
add_action( 'admin_enqueue_scripts', 'rds_enqueue_color_picker' );
function rds_enqueue_color_picker() {
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'rds-color-picker-script', plugins_url( 'js/rds.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

/**
 *Set the default options while activating the pugin & create thumbnails of first image of all the posts
 */
function rds_activate() {

	$posts_per_slide = get_option( 'rds_post_per_slide' );
	if ( empty( $posts_per_slide ) ) {
		$posts_per_slide = '4';
		update_option( 'rds_post_per_slide', $posts_per_slide );
	}

	rds_post_img_thumb();
}

/**
 *  Called on post publish
 *  add_action( 'publish_post', 'rds_publish_post' );
 */
function rds_publish_post() {
	global $post;
	rds_post_img_thumb( (int)$post->ID );
}

/**
 *It creates thumbnails of first image of post
 *
 * @param $post_id
 *
 * @return void
 */
function rds_post_img_thumb( $post_id = null ) {
	$width = get_option( 'rds_width' );
	$height = get_option( 'rds_height' );
	$slider_content = get_option( 'rds_slider_content' );
	$post_per_slide = get_option( 'rds_post_per_slide' );
	$total_posts = get_option( 'rds_total_posts' );
	$category_ids = get_option( 'rds_category_ids' );
	$post_include_ids = get_option( 'rds_post_include_ids' );
	$post_exclude_ids = get_option( 'rds_post_exclude_ids' );

	$set_img_width = ( $width / $post_per_slide ) - 12;
	if ( $slider_content == 3 ) {
		$set_img_width = (int)( ( $set_img_width / 2 ) - 20 );
	}
	$set_img_height = $height - 54;

	if ( empty( $post_id ) ) {
		$args = array(
			'numberposts' => $total_posts,
			'offset'      => 0,
			'category'    => $category_ids,
			'orderby'     => 'post_date',
			'order'       => 'DESC',
			'include'     => $post_include_ids,
			'exclude'     => $post_exclude_ids,
			'post_type'   => 'post',
			'post_status' => 'publish' );
		$recent_posts = get_posts( $args );
		if ( count( $recent_posts ) < $total_posts ) {
			$total_posts = count( $recent_posts );
		}

		foreach ( $recent_posts as $key => $val ) {
			$post_details[ $key ][ 'post_ID' ] = $val->ID;
			$post_details[ $key ][ 'post_content' ] = $val->post_content;
		}
	} else {
		$post_details[ '0' ][ 'post_ID' ] = $post_id;
		$get_post_details = get_post( $post_id );
		$post_details[ '0' ][ 'post_content' ] = $get_post_details->post_content;
	}

	foreach ( $post_details as $key_p => $val_p ) {

		$first_img_name = '';
		$img_name = '';
		$first_img_src = '';
		$first_img_name_arr = get_post_custom_values( 'rds_custom_thumb', $val_p[ 'post_ID' ] );
		$first_img_name = $first_img_name_arr[ '0' ];

		if ( function_exists( 'has_post_thumbnail' ) && has_post_thumbnail( $val_p[ 'post_ID' ] ) && empty( $first_img_name ) ) {
			$img_details = wp_get_attachment_image_src( get_post_thumbnail_id( $val_p[ 'post_ID' ] ), 'full' );
			$first_img_name = $img_details[ 0 ];
		} else {

			if ( empty( $first_img_name ) ) {
				preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $val_p[ 'post_content' ], $matches );

				if ( count( $matches ) && isset( $matches[ 1 ] ) ) {
					$first_img_name = $matches[ 1 ][ 0 ];
				}
			}
		}

		if ( isset( $_SERVER[ 'SUBDOMAIN_DOCUMENT_ROOT' ] ) && ! empty( $_SERVER[ 'SUBDOMAIN_DOCUMENT_ROOT' ] ) ) {
			$server_root = $_SERVER[ 'SUBDOMAIN_DOCUMENT_ROOT' ];
		} elseif ( isset( $_SERVER[ 'SPT_DOCROOT' ] ) && ! empty( $_SERVER[ 'SPT_DOCROOT' ] ) ) {
			$server_root = $_SERVER[ 'SPT_DOCROOT' ];
		} else {
			$server_root = $_SERVER[ 'DOCUMENT_ROOT' ];
		}

		if ( ! empty( $first_img_name ) ) {
			$arr_img = explode( '/', $first_img_name );
			unset( $arr_img[ 0 ] );
			unset( $arr_img[ 1 ] );
			unset( $arr_img[ 2 ] );
			if ( isset( $_SERVER[ 'SPT_DOCROOT' ] ) && ! empty( $_SERVER[ 'SPT_DOCROOT' ] ) ) {
				unset( $arr_img[ 3 ] );
			}
			$first_img_src = $server_root . "/" . implode( '/', $arr_img );
		}

		if ( ! empty( $first_img_src ) ) {
			$size = @getimagesize( $first_img_src );

			if ( $set_img_width > 0 && $set_img_height > 0 && $size ) {
				if ( $size[ 0 ] <= $set_img_width && $size[ 1 ] <= $set_img_height ) {
					$img_file = $first_img_src;
				} else {
					$img_file = image_resize( $first_img_src, $set_img_width, $set_img_height, 'true' );
				}
			}

			if ( ! empty( $img_file ) ) {
				$new_wrp_img_src = substr( $img_file, strlen( $server_root ) );

				if ( $rds_image_src = get_post_custom_values( '_rds_img_src', $val_p[ 'post_ID' ] ) ) {
					$old_wrp_img_src = $rds_image_src[ '0' ];

					if ( $old_wrp_img_src != $new_wrp_img_src ) {
						$old_img_path = $server_root . $old_wrp_img_src;
						if ( ! empty( $old_wrp_img_src ) ) {
							$is_delete = get_post_meta( $val_p[ 'post_ID' ], '_rds_is_delete_img' );
							if ( is_file( $old_img_path ) && $is_delete[ 0 ] ) {
								@unlink( $old_img_path );
							}
						}
						update_post_meta( $val_p[ 'post_ID' ], '_rds_img_src', $new_wrp_img_src );
					}
				} else {
					add_post_meta( $val_p[ 'post_ID' ], '_rds_img_src', $new_wrp_img_src );
				}

				if ( $size[ 0 ] <= $set_img_width && $size[ 1 ] <= $set_img_height ) {
					if ( get_post_meta( $val_p[ 'post_ID' ], '_rds_is_delete_img' ) ) {
						update_post_meta( $val_p[ 'post_ID' ], '_rds_is_delete_img', 0 );
					}
				} else {
					if ( get_post_meta( $val_p[ 'post_ID' ], '_rds_is_delete_img' ) ) {
						update_post_meta( $val_p[ 'post_ID' ], '_rds_is_delete_img', 1 );
					} else {
						add_post_meta( $val_p[ 'post_ID' ], '_rds_is_delete_img', 1 );
					}
				}
			}
		} else {
			if ( $rds_image_src = get_post_custom_values( '_rds_img_src', $val_p[ 'post_ID' ] ) ) {
				$old_wrp_img_src = $rds_image_src[ '0' ];

				$old_img_path = $server_root . $old_wrp_img_src;
				if ( ! empty( $old_wrp_img_src ) ) {
					$is_delete = get_post_meta( $val_p[ 'post_ID' ], '_rds_is_delete_img' );
					if ( is_file( $old_img_path ) && $is_delete[ 0 ] ) {
						@unlink( $old_img_path );
						delete_post_meta( $val_p[ 'post_ID' ], '_rds_img_src', $old_wrp_img_src );
						delete_post_meta( $val_p[ 'post_ID' ], '_rds_is_delete_img' );
					}
				}
			}
		}
	}
	return;
}

/** Create menu for options page */
function rds_admin_actions() {
	add_options_page( __( 'Recent Posts Slider', 'rds' ), __( 'Recent Posts Slider', 'rds' ), 'manage_options', 'recent-posts-slider', 'rds_admin' );
}

/** To perform admin page functionality */
function rds_admin() {
	if ( ! current_user_can( 'manage_options' ) )
		wp_die( __( 'You do not have sufficient permissions to access this page.', 'rds' ) );
	include( 'recent-posts-slider-admin.php' );
}

function rds_admin_style() {
	wp_enqueue_style( 'rds-admin-style', WP_PLUGIN_URL . '/recent-posts-slider/css/rds-admin-style.css' );
}

/** Link the needed stylesheet */
function rds_add_style() {
	wp_enqueue_style( 'rds-style', WP_PLUGIN_URL . '/recent-posts-slider/css/style.css' );
}

function rds_add_custom_style() {
	echo "<style type=\"text/css\" media=\"screen\">" . stripslashes( get_option( 'rds_custom_css' ) ) . "</style>";
}

/** Link the needed script */
function rds_add_script() {
	if ( ! is_admin() ) {
		wp_enqueue_script( 'jquery' );
	}
}

function rds_show( $category_ids = null, $status_to_show = 'adoptable') {

	$posts_per_slide = get_option( 'rds_posts_per_slide' );
	$post_title_color = get_option( 'rds_post_title_color' );
	$post_title_bg_color = get_option( 'rds_post_title_bg_color' );
	$slider_speed = get_option( 'rds_slider_speed' );
	$pagination_style = get_option( 'rds_pagination_style' );
	$excerpt_words = get_option( 'rds_excerpt_words' );
	$show_post_date = get_option( 'rds_show_post_date' );
	$post_date_text = get_option( 'rds_post_date_text' );
	$post_date_format = get_option( 'rds_post_date_format' );

	if ( empty( $post_date_text ) ) {
		$post_date_text = "Posted On:";
	}

	if ( empty( $post_date_format ) ) {
		$post_date_format = "j-F-Y";
	}

	if ( empty( $slider_speed ) ) {
		$slider_speed = 7000;
	} else {
		$slider_speed = $slider_speed * 1000;
	}
	if ( empty( $post_title_color ) ) {
		$post_title_color = "#666";
	}
	$post_title_bg_color_js = "";
	if ( ! empty( $post_title_bg_color ) ) {
		$post_title_bg_color_js = $post_title_bg_color;
	}
	$excerpt_length = '';
	$excerpt_length = abs( ( ( $width - 40 ) / 20 ) * ( ( $height - 55 ) / 15 ) );
	/*if ( ($width) > $height)
	$excerpt_length = $excerpt_length - (($excerpt_length * 5) /100);
	else
	$excerpt_length = $excerpt_length - (($excerpt_length * 30) /100);*/

	$posts_per_slide = 4;

	$post_details = null;
	$recent_posts = get_posts( array(
		'numberposts' => -1,
//		'offset'      => 0,
//		'category'    => '',
//		'orderby'     => 'post_date',
//		'order'       => 'DESC',
//		'include'     => '',
//		'exclude'     => '',
		'post_type'   => 'dog',
		'post_status' => 'publish'
	));

	$num_pages = ceil(count($recent_posts) / $posts_per_slide);

	foreach ( $recent_posts as $key => $val ) {
		$post_details[ $key ][ 'post_title' ] = $val->post_title;
		$post_details[ $key ][ 'post_permalink' ] = get_permalink( $val->ID );
	}
	?>

	<!-- RMCR Dogs Slider js script -->
	<script>
	$j = jQuery.noConflict();
	$j(document).ready(function() {';

	//Set Default State of each portfolio piece
	if ( $pagination_style != '3' ) {
		$output .= '$j("#rds .paging").show();';
	}
	$output .= '$j("#rds .paging a:first").addClass("active");

	$j(".slide").css({"width" : ' . $width . '});
	$j("#rds .window").css({"width" : ' . ( $width ) . '});
	$j("#rds .window").css({"height" : ' . $height . '});

	$j("#rds .col").css({"width" : ' . ( ( $width / $posts_per_slide ) - 2 ) . '});
	$j("#rds .col").css({"height" : ' . ( $height - 4 ) . '});
	$j("#rds .col p.post-title span").css({"color" : "' . ( $post_title_color ) . '"});
	$j("#rds .post-date").css({"top" : ' . ( $height - 20 ) . '});
	$j("#rds .post-date").css({"width" : ' . ( ( $width / $posts_per_slide ) - 12 ) . '});';

	if ( ! empty( $post_title_bg_color_js ) ) {
		$output .= '$j("#rds .col p.post-title").css({"background-color" : "' . ( $post_title_bg_color_js ) . '"});';
	}

	$output .= 'var imageWidth = $j("#rds .window").width();
	//var imageSum = $j("#rds .slider div").size();
	var imageReelWidth = imageWidth * ' . $paging . ';

	//Adjust the image reel to its new size
	$j("#rds .slider").css({"width" : imageReelWidth});

	//Paging + Slider Function
	rotate = function(){
		var triggerID = $active.attr("rel") - 1; //Get number of times to slide
		//alert(triggerID);
		var sliderPosition = triggerID * imageWidth; //Determines the distance the image reel needs to slide

		$j("#rds .paging a").removeClass("active");
		$active.addClass("active");

		//Slider Animation
		$j("#rds .slider").stop(true,false).animate({
			left: -sliderPosition
		}, 500 );
	};
	var play;
	//Rotation + Timing Event
	rotateSwitch = function(){
		play = setInterval(function(){ //Set timer - this will repeat itself every 3 seconds
			$active = $j("#rds .paging a.active").next();
			if ( $active.length === 0) { //If paging reaches the end...
				$active = $j("#rds .paging a:first"); //go back to first
			}
			rotate(); //Trigger the paging and slider function
		}, ' . $slider_speed . ');
	};

	rotateSwitch(); //Run function on launch

	//On Hover
	$j("#rds .slider a").hover(function() {
		clearInterval(play); //Stop the rotation
	}, function() {
		rotateSwitch(); //Resume rotation
	});

	//On Click
	$j("#rds .paging a").click(function() {
		$active = $j(this); //Activate the clicked paging
		//Reset Timer
		clearInterval(play); //Stop the rotation
		rotate(); //Trigger rotation immediately
		rotateSwitch(); // Resume rotation
		return false; //Prevent browser jump to link anchor
	});
});

</script>';

	$output .= '<div id="rds">
            <div class="window">
                <div class="slider">';
	$p = 0;
	for ( $i = 1; $i <= $total_posts; $i += $posts_per_slide ) {
		$output .= '<div class="slide">';
		for ( $j = 1; $j <= $posts_per_slide; $j ++ ) {
			$output .= '<div class="col"><p class="post-title"><a href="' . $post_details[ $p ][ 'post_permalink' ] . '"><span>' . __( $post_details[ $p ][ 'post_title' ], 'rds' ) . '</span></a></p>';
			if ( $slider_content == 2 ) {
				$output .= '<p class="slider-content">' . __( $post_details[ $p ][ 'post_excerpt' ], 'rds' );
				if ( $show_post_date ) {
					$output .= '<div class="post-date">' . __( $post_date_text, 'rds' ) . ' ' . __( $post_details[ $p ][ 'post_date' ], 'rds' ) . '</div>';
				}
				$output .= '</p></div>';
			} elseif ( $slider_content == 1 ) {
				$output .= '<p class="slider-content-img">';
				if ( ! empty( $post_details[ $p ][ 'post_first_img' ][ '0' ] ) ) {
					$rds_img_src_path = $post_details[ $p ][ 'post_first_img' ][ '0' ];
					if ( ! empty( $rds_img_src_path ) ) {
						$output .= '<a href="' . $post_details[ $p ][ 'post_permalink' ] . '"><center><img src="' . $rds_img_src_path . '" alt="' . __( $post_details[ $p ][ 'post_title' ], 'rds' ) . '" /></center></a>';
					}
				}
				if ( $show_post_date ) {
					$output .= '<div class="post-date">' . __( $post_date_text, 'rds' ) . ' ' . __( $post_details[ $p ][ 'post_date' ], 'rds' ) . '</div>';
				}
				$output .= '</p></div>';
			} elseif ( $slider_content == 3 ) {
				$output .= '<p class="slider-content-both">';
				if ( ! empty( $post_details[ $p ][ 'post_first_img' ][ '0' ] ) || ! empty( $post_details[ $p ][ 'post_excerpt' ] ) ) {
					$rds_img_src_path = $post_details[ $p ][ 'post_first_img' ][ '0' ];
					if ( ! empty( $rds_img_src_path ) ) {
						$output .= '<a href="' . $post_details[ $p ][ 'post_permalink' ] . '"><img src="' . $rds_img_src_path . '" alt="' . __( $post_details[ $p ][ 'post_title' ], 'rds' ) . '" align="left" /></a>';
					}
					$output .= __( $post_details[ $p ][ 'post_excerpt' ], 'rds' );
				}
				if ( $show_post_date ) {
					$output .= '<div class="post-date">' . __( $post_date_text, 'rds' ) . ' ' . __( $post_details[ $p ][ 'post_date' ], 'rds' ) . '</div>';
				}
				$output .= '</p></div>';
			}
			$p ++;
			if ( $p == $total_posts )
				$p = 0;
		}
		$output .= '<div class="clr"></div>
				</div>';
	}
	$output .= '
                </div>
            </div>
            <div class="paging">';
	for ( $p = 1; $p <= $paging; $p ++ ) {
		if ( $pagination_style == '2' ) {
			$output .= '<a href="#" rel="' . $p . '">&bull;</a>';
		} elseif ( $pagination_style == '1' ) {
			$output .= '<a href="#" rel="' . $p . '">' . $p . '</a>';
		} elseif ( $pagination_style == '3' ) {
			$output .= '<a href="#" rel="' . $p . '">&nbsp;</a>';
		}
	}
	$output .= '</div>
        </div><div class="rds-clr"></div>';
	return $output;
}

/** Create post excerpt manually
 *
 * @param $post_content
 * @param $excerpt_length
 *
 * @return post_excerpt or  void
 */
function create_excerpt( $post_content, $excerpt_length, $post_permalink, $excerpt_words = null ) {
	$keep_excerpt_tags = get_option( 'rds_keep_excerpt_tags' );

	if ( ! $keep_excerpt_tags ) {
		$post_excerpt = strip_shortcodes( $post_content );
		$post_excerpt = str_replace( ']]>', ']]&gt;', $post_excerpt );
		$post_excerpt = strip_tags( $post_excerpt );
	} else {
		$post_excerpt = $post_content;
	}

	$link_text = get_option( 'rds_link_text' );
	if ( ! empty( $link_text ) ) {
		$more_link = $link_text;
	} else {
		$more_link = "[more]";
	}
	if ( ! empty( $excerpt_words ) ) {
		if ( ! empty( $post_excerpt ) ) {
			$words = explode( ' ', $post_excerpt, $excerpt_words + 1 );
			array_pop( $words );
			array_push( $words, ' <a href="' . $post_permalink . '">' . $more_link . '</a>' );
			$post_excerpt_rds = implode( ' ', $words );
			return $post_excerpt_rds;
		} else {
			return;
		}
	} else {
		$post_excerpt_rds = substr( $post_excerpt, 0, $excerpt_length );
		if ( ! empty( $post_excerpt_rds ) ) {
			if ( strlen( $post_excerpt ) > strlen( $post_excerpt_rds ) ) {
				$post_excerpt_rds = substr( $post_excerpt_rds, 0, strrpos( $post_excerpt_rds, ' ' ) );
			}
			$post_excerpt_rds .= ' <a href="' . $post_permalink . '">' . $more_link . '</a>';
			return $post_excerpt_rds;
		} else {
			return;
		}
	}
}
