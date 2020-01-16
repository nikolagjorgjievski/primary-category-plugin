<?php
/**
 * @package PrimaryCategoryPlugin
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

define( 'PRIMARY_CATEGORY_PLUGIN_VERSION', '0.1.0' );
define( 'PRIMARY_CATEGORY_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'PRIMARY_CATEGORY_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once PRIMARY_CATEGORY_PLUGIN_DIR . 'includes/core.php';

require_once PRIMARY_CATEGORY_PLUGIN_DIR . 'includes/classes/class-primary-category-frontend.php';
require_once PRIMARY_CATEGORY_PLUGIN_DIR . 'includes/frontend-wrappers.php';

function create_posttype() {

	register_post_type( 'movies',
		// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Movies' ),
				'singular_name' => __( 'Movie' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'movies'),
			'show_in_rest' => true,
			'supports' => array('editor'),
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );
