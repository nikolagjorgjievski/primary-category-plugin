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

function primary_category_register_meta() {
	register_meta(
		'post',
		'_primary_category_id',
		array(
			'show_in_rest' => true,
			'type' => 'integer',
			'single' => true,
			'sanitize_callback' => 'sanitize_text_field',
			'auth_callback' => function() {
				return current_user_can( 'edit_posts' );
			},
		)
	);
}
add_action( 'init', 'primary_category_register_meta' );

if ( is_admin() ) {
	function primary_category_plugin_enqueue_assets() {
		wp_enqueue_script(
			'primary_category_plugin_js',
			plugins_url( 'build/index.js', __FILE__ ),
			array( 'wp-plugins', 'wp-edit-post', 'wp-element', 'wp-components', 'wp-data' )
		);
	}
	add_action( 'enqueue_block_editor_assets', 'primary_category_plugin_enqueue_assets' );
}
