<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _s_builder_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', '_scaffolding' ),
		'id'            => 'sidebar-primary',
		'description'   => esc_html__( 'Add widgets here.', '_scaffolding' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	/**
	 * Conditionally register woocommerce shop sidebar
	 */
	if( _s_is_addon_active( 'woocommerce' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Primary Sidebar - Woocommerce', '_scaffolding' ),
			'id'            => 'sidebar-woocommerce',
			'description'   => esc_html__( 'Add widgets here.', '_scaffolding' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
	}
}
add_action( 'widgets_init', '_s_builder_widgets_init' );

