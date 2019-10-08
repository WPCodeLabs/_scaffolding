<?php
/**
 * Add Custom Templates
 */
function _s_wp_query_register_templates( $templates ) {
	// Add custom template here if needed
	return $templates;
}
add_filter( 'wp_query_engine_templates', '_s_wp_query_register_templates' );
/**
 * Override default template
 */
function wp_query_default_content( $template_name, $context, $query, $atts ) {
	_s_get_template_part( 'content', 'archive' );
}
function wp_query_default_content_wrap_open( $template_name, $context, $query, $atts ) {
	return false;
}
function wp_query_default_content_wrap_close( $template_name, $context, $query, $atts ) {
	return false;
}