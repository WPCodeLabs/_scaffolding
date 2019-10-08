<?php
/**
 *
 * Template Name: Full Width
 *
 */

/**
 * Remove all actions from undesired areas
 */
remove_all_actions( '_s_sidebar' );

/**
 * Add some additional body classes
 */
add_filter( 'body_class', function( $classes ) {
	$classes[] = 'full-width-content';
	return $classes;
} );

/**
 * Include the main index file
 */
get_template_part( 'index' );
