<?php
/**
 * Primary Category Frontend functionality.
 *
 * @package PrimaryCategoryPlugin
 */

/**
 * Primary Category Frontend Class
 *
 * Used for frontend queries
 */
class Primary_Category_Frontend {

	/**
	 * Stores the instance of the class
	 *
	 * @var Primary_Category_Frontend
	 */
	protected static $instance = null;

	/**
	 * Returns the current instance of the class
	 *
	 * @return Primary_Category_Frontend Returns the current instance of the class
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Returns array of WP_Post which have the primary category
	 *
	 * @param int   $category  The category id to filter the posts. The category to filter the posts. It can be the id, name or slug.
	 * @param array $args         Additional arguments for the WP_Query.
	 *
	 * @return array|false|WP_Error
	 */
	public function get_primary_term_posts( $category, $args ) {
		$category_id = term_exists( $category );

		if ( is_null( $category_id ) || 0 === $category_id ) {
			return new WP_Error( 'nocategory', __( 'Category does not exist', 'primary-category-plugin' ) );
		}

		$defaults = array(
			'post_status'    => 'publish',
			'posts_per_page' => 10,
			'post_type'      => 'post',
		);

		$meta_query = array(
			'key'   => '_primary_category_id',
			'value' => $category_id,
		);

		$args               = wp_parse_args( $args, $defaults );
		$args['meta_query'] = array( $meta_query );

		$query = new WP_Query( $args );

		return $query->posts;
	}

}
