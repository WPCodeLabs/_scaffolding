<?php
/**
 * Get View
 *
 * Return string representing the current view
 *
 * @param  string $modifier : string used to utilize a context specific filter
 * @return [string]           The context string
 */
function _s_get_view( $context = '' ) {
	$view = '';

	if( is_front_page() && !is_home() ) {
		$view = 'frontpage';
	}

	else if( is_archive() || is_home() ) {
		$view = 'archive';
	}

	else if( is_search() ) {
		$view = 'search';
	}

	else if( is_singular() ) {
		$view = 'single';
	}

	else if( is_404() ) {
		$view = '404';
	}
	/**
	 * Apply generic filter
	 */
	$view = apply_filters( "_s_view", $view, $context );
	/**
	 * Apply specific filter
	 */
	if( !empty( $context ) ) {
		$view = apply_filters( "_s_{$context}_context", $view );
	}
	return $view;
}

function _s_get_archive_slug() {

	$type = '';

	$object = get_queried_object();

	switch ( get_class( get_queried_object() ) ) {
		case 'WP_User':
			$type = 'author';
			break;
		case 'WP_Post_Type':
			$type = $object->name;
			break;
		case 'WP_Term':
			$type = $object->slug;
			break;
		default:
			// do nothing
			break;
	}

	return $type;
}

function _s_get_template_part( $slug = '', $name = '', $include = true, $relative_path = false, $require_once = false ) {
	/**
	 * Dont waste time if path is empty
	 */
	if( empty( $slug ) ) {
		return;
	}

	$name = apply_filters( "_s_get_template_part_{$slug}", $name );

	$view = _s_get_view();

	$type = get_post_type();

	$templates = array();

	$template = false;

	/**
	 * Named templates take priority
	 */
	if( !empty( $name ) ) {
		$templates[] = "template-parts/{$slug}/{$name}-{$view}-{$type}.php";
		$templates[] = "template-parts/{$slug}/{$name}-{$view}.php";
		$templates[] = "template-parts/{$slug}/{$name}-{$type}.php";
		$templates[] = "template-parts/{$slug}/{$name}.php";
		$templates[] = "template-parts/{$slug}-{$name}.php";
	}

	/**
	 * View/context based templates
	 */
	$templates[] = "template-parts/{$slug}/{$view}-{$type}.php";
	$templates[] = "template-parts/{$slug}/{$view}.php";
	$templates[] = "template-parts/{$slug}/{$type}.php";
	$templates[] = "template-parts/{$slug}/default.php";
	$templates[] = "template-parts/{$slug}.php";

	/**
	 * Search for, and assign first template found
	 */
	foreach( $templates as $template_path ) {

		$template_found = locate_template( $template_path, false, false );

		if( $template_found ) {
			$template = $relative_path === true ? "/{$template_path}" : $template_found;
			break;
		}
	}
	/**
	 * Maybe include
	 */
	if( $template && $include ) {
		if( $require_once ) {
			require_once $template;
		}
		else {
			require $template;
		}
	}
	/**
	 * Or just return it
	 * Useful for when variables need to be accessible
	 */
	else {
		return $template;
	}
}

/**
 * Considitionally include varias files for easier organization
 */
function _s_conditional_includes() {

	$view = _s_get_view();

	locate_template( 'inc/views/' . $view . '.php', true );
}
add_action( 'wp', '_s_conditional_includes' );

