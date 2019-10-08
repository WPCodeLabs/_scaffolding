<?php
/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 * See: https://jetpack.com/support/content-options/
 */
function _s_jetpack_theme_support() {

	add_theme_support( 'jetpack-social-menu' );

	add_theme_support( 'jetpack-responsive-videos' );

	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => '_s_infinite_scroll_render',
		'footer'    => false, // false, or ID of element to match width
		'wrapper' => false,
		'type' => 'scroll', // click or scroll, or emit
	) );

	add_theme_support( 'jetpack-content-options', array(
	    'blog-display'       => 'excerpt', // the default setting of the theme: 'content', 'excerpt' or array( 'content', 'excerpt' ) for themes mixing both display.
	    'author-bio'         => true, // display or not the author bio: true or false.
	    'author-bio-default' => true, // the default setting of the author bio, if it's being displayed or not: true or false (only required if false).
	    'masonry'            => '.site-main', // a CSS selector matching the elements that triggers a masonry refresh if the theme is using a masonry layout.
	    'post-details'       => array(
	        'stylesheet'      => 'themeslug-style', // name of the theme's stylesheet.
	        'date'            => '.posted-on', // a CSS selector matching the elements that display the post date.
	        'categories'      => '.cat-links', // a CSS selector matching the elements that display the post categories.
	        'tags'            => '.tags-links', // a CSS selector matching the elements that display the post tags.
	        'author'          => '.byline', // a CSS selector matching the elements that display the post author.
	        'comment'         => '.comments-link', // a CSS selector matching the elements that display the comment link.
	    ),
	    'featured-images'    => array(
	        'archive'         => true, // enable or not the featured image check for archive pages: true or false.
	        'archive-default' => false, // the default setting of the featured image on archive pages, if it's being displayed or not: true or false (only required if false).
	        'post'            => true, // enable or not the featured image check for single posts: true or false.
	        'post-default'    => false, // the default setting of the featured image on single posts, if it's being displayed or not: true or false (only required if false).
	        'page'            => true, // enable or not the featured image check for single pages: true or false.
	        'page-default'    => false, // the default setting of the featured image on single pages, if it's being displayed or not: true or false (only required if false).
	        'fallback'          => true, // enable or not the featured image fallback: true or false.
	        'fallback-default'  => true, // the default setting for featured image fallbacks: true or false (only required if false)
	    ),
	) );
}
add_action( 'after_setup_theme', '_s_jetpack_theme_support' );
/**
 * Custom render function for Infinite Scroll.
 */
function _s_infinite_scroll_render() {
	// Check for woocommerce, which has it's own support
	if( !function_exists( 'is_woocommerce' ) || is_woocommerce() === false ) {
		do_action( '_s_loop' );
	}
}

/**
 * Add the jetpack author bio
 */
function _s_jetpack_author_bio() {
	if( function_exists( 'jetpack_author_bio' ) ) {
		jetpack_author_bio();
	}
}
// add_action( '_s_after_loop', '_s_jetpack_author_bio' );
/**
 * Jetpack content options default image support
 */
function _s_jetpack_default_thumbnail( $default ) {
	/**
	 * See if we're using jetpack content options
	 */
	if( !get_theme_support( 'jetpack-content-options' ) ) {
		return $default;
	}

	$view = _s_get_view();

	if( $view === 'archive' ) {
		$default = get_option( 'jetpack_content_featured_images_archive' ) === '' ? false : $default;
	}

	return $default;
}
add_filter( '_s_default_thumbnail', '_s_jetpack_default_thumbnail' );
