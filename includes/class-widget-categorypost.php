<?php

/**
 * contents of original vcsassist-plugin.php.
 */

/**
 * Register thumbnail sizes.
 *
 * @return void
 */
// function category_posts_add_image_size(){
// 	$sizes = get_option('mkrdip_cat_post_thumb_sizes');
// 	
// 	if ( $sizes ){
// 		foreach ( $sizes as $id=>$size ) {
// 			add_image_size( 'cat_post_thumb_size' . $id, $size[0], $size[1], true );
// 		}
// 	}
// }
//
// add_action( 'init', 'category_posts_add_image_size' );


/**
 * Category Posts Widget Class
 *
 * Shows the single category posts with some configurable options
 */



function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('[Read more]', 'your-text-domain') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );



