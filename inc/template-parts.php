<?php
/**
 * Include the header markup
 */
function _s_include_header() {
	_s_get_template_part( 'header', 'header' );
}
add_action( '_s_header', '_s_include_header' );
/**
 * Inluce the masthead markup
 */
function _s_include_masthead() {
	_s_get_template_part( 'header', 'masthead' );
}
add_action( '_s_site_header', '_s_include_masthead' );
/**
 * Include the main loop
 */
function _s_include_loop() {
	_s_get_template_part( 'loop' );
}
add_action( '_s_loop', '_s_include_loop' );
/**
 * Include the primary sidebar markup
 */
function _s_include_sidebar() {
	_s_get_template_part( 'sidebar', 'primary' );
}
add_action( '_s_sidebar', '_s_include_sidebar' );
/**
 * Include the footer markup
 */
function _s_include_footer() {
	_s_get_template_part( 'footer', 'footer' );
}
add_action( '_s_footer', '_s_include_footer' );
/**
 * Include the colophon markup
 */
function _s_include_colophon() {
	_s_get_template_part( 'footer', 'colophon' );
}
add_action( '_s_site_footer', '_s_include_colophon' );
/**
 * Include the comments markup
 */
function _s_comments() {
	/*
	 * If the current post is protected by a password and
	 * the visitor has not yet entered the password we will
	 * return early without loading the comments.
	 */
	if ( post_password_required() ) {
		return;
	}
	if ( comments_open() || get_comments_number() ) {
		comments_template( _s_get_template_part( 'comments', 'comments', false, true  ) );
	}
}
add_action( '_s_comments', '_s_comments' );
/**
 * Include a single comment
 */
function _s_comment( $comment, $args, $depth ) {
	require _s_get_template_part( 'comments', 'comment', false );
}