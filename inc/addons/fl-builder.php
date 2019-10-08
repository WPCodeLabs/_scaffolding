<?php

/**
 * Disable Gutenberg for beaver builder enabled post types
 *
 */
function _s_disable_gutenberg( $can_edit, $post_type ) {

	// Bail and do nothing if beaver builder isn't installed
	if( !class_exists( 'FLBuilderModel' ) ) {
		return $can_edit;
	}

	$activated_post_types = get_option( '_fl_builder_post_types', array( 'page' ) );

	if( in_array( get_post_type(), $activated_post_types ) && FLBuilderModel::is_builder_enabled() ) {

		$can_edit = false;
	}

	return $can_edit;

}
add_filter( 'gutenberg_can_edit_post_type', '_s_disable_gutenberg', 10, 2 );
add_filter( 'use_block_editor_for_post_type', '_s_disable_gutenberg', 10, 2 );

/**
 * Disable Classic Editor for beaver builder enabled post types
 *
 */
function _s_disable_classic_editor() {
	// Bail and do nothing if beaver builder isn't installed
	if( !class_exists( 'FLBuilderModel' ) ) {
		return false;
	}

	$screen = get_current_screen();
	$activated_post_types = get_option( '_fl_builder_post_types', array() );

	if( in_array( $screen->id , $activated_post_types ) && FLBuilderModel::is_builder_enabled() ) {
		remove_post_type_support( $screen->id, 'editor' );
	}
}
add_action( 'admin_head', '_s_disable_classic_editor' );

/**
 * Make beaver builder the default editor if post type is supported
 */
function _s_make_beaver_builder_default( $post_ID, $post, $update ) {
	// Bail and do nothing if beaver builder isn't installed
	if( !class_exists( 'FLBuilderModel' ) ) {
		return false;
	}

	$activated_post_types = get_option( '_fl_builder_post_types', array() );

	if( in_array( $post->post_type, $activated_post_types ) && !$update ) {
		update_post_meta( $post_ID, '_fl_builder_enabled', true );
	}

}
add_action( 'wp_insert_post', '_s_make_beaver_builder_default', 10, 3 );