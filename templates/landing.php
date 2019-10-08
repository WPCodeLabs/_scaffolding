<?php
/**
 *
 * Template Name: Landing Page
 *
 */

/**
 * Remove all actions from undesired areas
 */
remove_all_actions( '_s_site_header' );
remove_all_actions( '_s_sidebar' );
remove_all_actions( '_s_site_footer' );

/**
 * Add some additional body classes
 */
add_filter( 'body_class', function( $classes ) {
	$classes[] = 'landing-page';
	$classes[] = 'full-width-stretched';
	return $classes;
} );

/**
 * Add filter to get the template part from templates-parts/content/page-landing.php
 */
add_filter( '_s_get_template_part_content', function( $name ) {
	return 'landing';
} );

/**
 * Include the main index file
 */
get_template_part( 'index' );
