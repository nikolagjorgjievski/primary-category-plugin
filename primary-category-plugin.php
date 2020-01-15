<?php
/**
 * @package Primary_Category_Plugin
 */
/*
Plugin Name: Primary Category Plugin
Plugin URI: https://nikolagjorgjievski.com/
Description: Allows you to designate a primary category for posts.
Version: 1.0.0
Author: nikolagjorgjievski
Author URI: https://nikolagjorgjievski.com/
License: GPLv2 or later
Text Domain: primary-category-plugin
*/

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

define( 'PRIMARY_CATEGORY_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

/**
 * The core plugin class
 */
require_once PRIMARY_CATEGORY_PLUGIN_DIR . 'includes/class-primary-category-plugin.php';

if ( is_admin() ) {
	require_once PRIMARY_CATEGORY_PLUGIN_DIR . 'admin/class-primary-category-plugin-admin.php';
}
