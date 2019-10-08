<?php

register_nav_menus( array(
	'primary' => esc_html__( 'Primary', '_scaffolding' ),
) );

/**
 * Add submenu toggle buttons
 *
 * @param string $output
 * @param string $item
 * @param string $depth
 * @return string $output
 */
function _s_submenu_toggle( $output, $item, $depth, $args ) {
    // Bail early if we don't need to do anything
    // if( empty( $settings[$args->theme_location] ) || $settings[$args->theme_location] === 'disabled' ) {
    // 	return "<span class='nav-item-container'>{$output}</span>";
    // }
	// If this item has children, append the button
    if( in_array( 'menu-item-has-children', $item->classes ) ){
    	$output  = "<span class='nav-item-container'>{$output}";
        $output .= '<button class="sub-menu-toggle _s_icon _s_icon-expand_more" aria-expanded="false" aria-pressed="false" role="button"><span class="screen-reader-text">Submenu</span></button>';
        $output .= '</span>';
    } else {
    	$output = "<span class='nav-item-container'>{$output}</span>";
    }
    // Return the output
    return $output;
}
add_filter( 'walker_nav_menu_start_el', '_s_submenu_toggle', 999, 4 );

function _s_menu_description( $item_output, $item ) {
	$description = trim( $item->post_content );
	if( !empty( $description ) ) {
		$item_output = str_replace( '</a>', '</span><span class="description">' . $item->description . '</span></a>', $item_output );
	}
	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', '_s_menu_description', 10, 2 );