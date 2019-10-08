<?php
/**
 * Include the single view first
 */
include THEME_ROOT_DIR . 'inc/views/single.php';
/**
 * Remove breadcrumbs
 */
remove_action( '_s_after_masthead', '_s_breadcrumbs' );