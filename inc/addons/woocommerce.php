<?php
/**
 * Wrapper to see if we are on any woocommerce page
 *
 * Alternatively, use the built in 'is_woocommerce' to exclude non-product pages
 * like cart, account, etc
 */
function _s_is_woocommerce() {
	return is_woocommerce() || is_cart() || is_checkout() || is_account_page() ? true : false;
}
/**
 * Use the woocommerce sidebar in place of the primary sidebar
 */
function _s_woocommerce_sidebars( $sidebar_name ) {
	if( _s_is_woocommerce() ) {
		// Remove the primary sidebar
		remove_action( '_s_sidebar', '_s_include_sidebar' );
		// Add action to include the woocommerce sidebar
		add_action( '_s_sidebar', '_s_include_woocommerce_sidebar' );
	}
}
add_filter( 'wp', '_s_woocommerce_sidebars' );
/**
 * Include the woocommerce sidebar
 * @return [type] [description]
 */
function _s_include_woocommerce_sidebar() {
	_s_get_template_part( 'sidebar', 'woocommerce' );
}

/**
 * Replace the default loop with the woocommerce provided loop
 *
 * Allows woocommerce to make content decisions and use the hooks/filters provided
 * to override individual parts
 */
function _s_woocommerce_loop() {
	if( is_woocommerce() ) {
		/**
		 * Remove the default loop
		 */
		remove_action( '_s_loop', '_s_include_loop' );
		/**
		 * Add in the woocommerce loop
		 * @see  https://docs.woocommerce.com/wc-apidocs/source-function-woocommerce_content.html#897-946
		 */
		add_action( '_s_loop', 'woocommerce_content' );
	}
}
add_action( 'wp', '_s_woocommerce_loop' );

/**
 * Add Woocommerce theme supports
 *
 * @see https://docs.woocommerce.com/document/declare-woocommerce-support-in-third-party-theme/
 * @see https://woocommerce.wordpress.com/2017/02/28/adding-support-for-woocommerce-2-7s-new-gallery-feature-to-your-theme/
 */
function _s_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 150,
		'single_image_width'    => 300,
        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 3,
            'min_columns'     => 2,
            'max_columns'     => 3,
        ),
	) );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', '_s_woocommerce_support' );
/**
 * Optimize WooCommerce Assets
 *
 * Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
 */
function _s_manage_woocommerce_styles() {

	if ( function_exists( 'is_woocommerce' ) ) {

		if ( !is_woocommerce() && !is_cart() && !is_checkout() ) {
            ## Dequeue WooCommerce styles
			wp_dequeue_style('woocommerce-layout');
			wp_dequeue_style('woocommerce-general');
			wp_dequeue_style('woocommerce-smallscreen');
			## Dequeue WooCommerce scripts
			wp_dequeue_script('wc-cart-fragments');
			wp_dequeue_script('woocommerce');
			wp_dequeue_script('wc-add-to-cart');

		}
	}
}
add_action( 'wp_enqueue_scripts', '_s_manage_woocommerce_styles' );

/**
 * Set woocommerce template path
 *
 * Tell woocommerce where our main woocommerce file is located
 * default is theme/woocommerce.php, but we want to force woocommerce to use
 * our main index.php file Other mods will be handled using filters/actions
 * @see http://hookr.io/filters/woocommerce_template_loader_files/
 */
function set_woocommerce_template_path( $search_paths ) {
	$search_paths[] = 'index.php';
	return $search_paths;
}
add_filter( 'woocommerce_template_loader_files', 'set_woocommerce_template_path' );

// function override_woowocmmerce_template_parts( $template, $slug, $name ) {
// 	var_dump($template);
// 	var_dump($slug);
// 	var_dump($name);
// 	*
// 	 * Look for a local override
// 	 * Uses the same folder strutcure as in woocommerce plugin

// 	$override = locate_template( "template-parts/woocommerce/{$slug}/", false, false );

// 	return $template;

// }
// add_filter( 'wc_get_template_part', 'override_woowocmmerce_template_parts', 10, 3 );


function override_woowocmmerce_templates( $template, $template_name, $args, $template_path, $default_path ) {
	/**
	 * Look for a local override
	 * Uses the same folder strutcure as in woocommerce plugin
	 */
	$override = locate_template( "template-parts/woocommerce/{$template_name}", false, false );
	/**
	 * Maybe return override
	 */
	return !empty( $override ) ? $override : $template;

}
// add_filter( 'wc_get_template', 'override_woowocmmerce_templates', 10, 5 );