<?php
/**
 * Provides core plugin functions.
 *
 * @package PrimaryCategoryPlugin
 */

/**
 * Registers the primary category meta field
 */
function primary_category_register_meta() {
	register_meta(
		'post',
		'_primary_category_id',
		array(
			'show_in_rest'      => true,
			'type'              => 'integer',
			'single'            => true,
			'sanitize_callback' => 'sanitize_text_field',
			'auth_callback'     => function() {
				return current_user_can( 'edit_posts' );
			},
		)
	);
}
add_action( 'init', 'primary_category_register_meta' );

/**
 * Enqueues assets used by the admin
 */
function primary_category_plugin_enqueue_assets() {
	wp_enqueue_script(
		'primary_category_plugin_js',
		PRIMARY_CATEGORY_PLUGIN_URL . 'build/index.js',
		array( 'wp-plugins', 'wp-edit-post', 'wp-element', 'wp-components', 'wp-data' ),
		PRIMARY_CATEGORY_PLUGIN_VERSION,
		true
	);
}
add_action( 'admin_enqueue_scripts', 'primary_category_plugin_enqueue_assets' );
