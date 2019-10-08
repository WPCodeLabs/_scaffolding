<?php

/*******************************************************************************
 *                 ______                 __  _
 *                / ____/_  ______  _____/ /_(_)___  ____  _____
 *               / /_  / / / / __ \/ ___/ __/ / __ \/ __ \/ ___/
 *              / __/ / /_/ / / / / /__/ /_/ / /_/ / / / (__  )
 *             /_/    \__,_/_/ /_/\___/\__/_/\____/_/ /_/____/
 *
 ******************************************************************************/

/**
 * Setup some theme constants
 *
 * Constants used throughout the theme
 * @since version 1.0.0
 */
define( 'THEME_ROOT_DIR', trailingslashit( get_stylesheet_directory() ) );
define( 'THEME_ROOT_URL', trailingslashit( get_stylesheet_directory_uri() ) );
define( 'THEME_SLUG', '_scaffolding' );
define( 'THEME_URL', 'https://www.wpcodelabs.com/' );
define( 'THEME_VERSION', WP_DEBUG === true ? time() : '1.0.0' );
/**
 * Global theme functions and helpers
 */
include_once THEME_ROOT_DIR . 'inc/framework.php';
/**
 * Base theme settings
 */
include_once THEME_ROOT_DIR . 'inc/init.php';
/**
 * Widget related functions
 */
include_once THEME_ROOT_DIR . 'inc/widgets.php';
/**
 * Menu related functions
 */
include_once THEME_ROOT_DIR . 'inc/nav-menus.php';
/**
 * Functions that orchestrate theme organization and structure
 */
include_once THEME_ROOT_DIR . 'inc/template-parts.php';
/**
 * Functions that are used in the theme files
 */
include_once THEME_ROOT_DIR . 'inc/template-tags.php';
/**
 * Common plugin and addon support
 */
include_once THEME_ROOT_DIR . 'inc/addons.php';