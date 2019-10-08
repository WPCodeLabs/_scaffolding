<?php

if ( ! isset( $content_width ) ) {
	$content_width = 1270;
}

add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

add_theme_support( 'title-tag' );

add_theme_support( 'post-thumbnails' );

add_theme_support( 'default-post-thumbnail', array(
	'image' => THEME_ROOT_URL . 'assets/images/default-featured-image.jpg',
	'width' => 1000,
	'height' => 750,
) );

add_theme_support( 'post-formats', array( 'aside', 'audio', 'video', 'chat', 'gallery', 'image', 'quote', 'status', 'link' ) );

add_theme_support( 'customize-selective-refresh-widgets' );

add_theme_support( 'custom-background' );

add_theme_support( 'custom-logo', array( 'flex-width'  => true, 'flex-height' => true, 'height' => 100, 'width' => 400 ) );

add_theme_support( 'align-wide' );

set_post_thumbnail_size( 1000, 750, true );

add_theme_support( 'custom-header', array(
	'flex-height'            => true,
	'flex-width'             => true,
	'header-text'            => false,
	'wp-head-callback'       => '_s__custom_header_style',
	'admin-head-callback'    => '_s__custom_header_style',
	'admin-preview-callback' => '_s__custom_header_style',
));

add_image_size( 'medium-square', 500, 500, true );
add_image_size( 'large-square', 1000, 1000, true );
/**
 * Add featured image size to selector
 */
function gsp_show_image_sizes($sizes) {
    $sizes['medium-square'] = __( 'Medium Square', '_scaffolding' );
    $sizes['large-square'] = __( 'Large Square', '_scaffolding' );
    return $sizes;
}
add_filter( 'image_size_names_choose', 'gsp_show_image_sizes' );

/**
 * Enqueue styles & scripts
 */
function _s_enqueue_assets() {
	/**
	 * Enqueue Javascript Files
	 */
	wp_enqueue_script( '_s_modernizer', THEME_ROOT_URL . 'assets/js/modernizr.min.js', array(), '2.8.3', false );

	wp_enqueue_script( '_s_masonry', THEME_ROOT_URL . 'assets/js/masonry.pkgd.min.js', array( 'jquery' ), THEME_VERSION, true );

	wp_enqueue_script( '_s_slick', THEME_ROOT_URL . 'assets/js/slick.js', array(), THEME_VERSION, true );

	wp_enqueue_script( '_s_script', THEME_ROOT_URL . 'assets/js/public.js', array( 'jquery', '_s_masonry', '_s_slick' ), THEME_VERSION, true );
	/**
	 * Enqueue CSS Files
	 */

	// wp_enqueue_style( '_s_bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', array(), 'all' );

	wp_enqueue_style( '_s_typekit', '//use.typekit.net/hbf6ycs.css', array(), 'all' );

	wp_enqueue_style( '_s_google_fonts', '//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap', array(), 'all' );

	wp_enqueue_style( '_s_styles', THEME_ROOT_URL . 'assets/css/public.css', array(), THEME_VERSION, 'all' );

}
add_action( 'wp_enqueue_scripts', '_s_enqueue_assets' );

function _s__custom_header_style() {
	// Do nothing if custom header not supported.
	if( !current_theme_supports( 'custom-header' ) ) {
		return;
	}

	$header_image = get_header_image();

	// Header image CSS, if exists.
	if( $header_image ) {
		printf( '<style type="text/css">#masthead { background-image: url(%s); }</style>', esc_url( $header_image ) );
	}
}

function _s_excerpt_more( $more ) {
	global $post;
	return '<a class="moretag" href="'. get_permalink( $post->ID ) . '"> Read the full article...</a>';
}
add_filter('excerpt_more', '_s_excerpt_more');