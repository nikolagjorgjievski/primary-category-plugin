<?php
/**
 * Primary Category Plugin file.
 *
 * @package Primary_Category_Plugin
 */

/**
 * If this file is called directly, abort.
 */
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Class for the admin side of the plugin.
 */
class Primary_Category_Plugin_Admin
{
	/**
	 *
	 */
	private static $initiated = false;

	/**
	 * Initializes the class
	 */
	public static function init() {
		if ( ! self::$initiated ) {
			self::init_hooks();
		}
	}

	/**
	 * Initializes WordPress hooks
	 */
	private static function init_hooks() {
		self::$initiated = true;
	}

}
