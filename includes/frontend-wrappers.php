<?php
/**
 * Provides function for frontend queries.
 *
 * @package PrimaryCategoryPlugin
 */

/**
 * Returns array of WP_Post which have the primary category
 *
 * @param int   $category The category to filter the posts. It can be the id, name or slug.
 * @param array $args     Additional arguments for the WP_Query.
 *
 * @return array|false|WP_Error
 */
function get_posts_by_primary_category( $category, $args = array() ) {
	$primary_category_frontend = Primary_Category_Frontend::get_instance();
	return $primary_category_frontend->get_primary_term_posts( $category, $args );
}
