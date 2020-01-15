<?php

/** If this file is called directly, abort.
 */
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

class Primary_Category_Plugin
{
	private static $initiated = false;

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
