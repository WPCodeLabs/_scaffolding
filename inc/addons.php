<?php
/**
 * Check if certain addons exist
 */
function _s_is_addon_active( $addon = '' ) {

	switch ( $addon ) {
		case 'woocommerce':
			$active = class_exists( 'woocommerce' );
			break;
		case 'flbuilder':
			$active = class_exists( 'FLBuilderModel' );
			break;
		case 'jetpack':
			$active = class_exists( 'Jetpack' );
			break;
		default:
			$active = false;
			break;
	}

	return $active;
}
/**
 * Check if a page uses beaver builder
 */
function _s_is_fl_builder() {
	if( class_exists( 'FLBuilderModel' ) ) {
		return !empty( FLBuilderModel::is_builder_enabled() );
	}
	return '';
}
/**
 * Maybe include Woocommerce support
 */
if( _s_is_addon_active( 'woocommerce' ) ) {
	include_once THEME_ROOT_DIR . 'inc/addons/woocommerce.php';
}
/**
 * Maybe include beaver builder support
 */
if( _s_is_addon_active( 'flbuilder' ) ) {
	include_once THEME_ROOT_DIR . 'inc/addons/fl-builder.php';
}
/**
 * Maybe include jetpack support
 */
if( _s_is_addon_active( 'jetpack' ) ) {
	include_once THEME_ROOT_DIR . 'inc/addons/jetpack.php';
}