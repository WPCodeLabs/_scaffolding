<?php

/**
 * Page specific actions, to set the default layout
 * Copy functions from desired template
 */
if( in_array( get_post_type(), array( 'page', 'contentblock' ) ) && is_page_template() == false && _s_is_fl_builder() == true ) {
	// Remove the sidebar
	remove_all_actions( '_s_sidebar' );
	// Add some classes
	add_filter( 'body_class', function( $classes ) {
		$classes[] = 'full-width-stretched';
		return $classes;
	});
}