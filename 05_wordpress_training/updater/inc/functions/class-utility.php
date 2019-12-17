<?php
/**
 * Utility Class File
 *
 * This file contains Utility class and includes all of useful methods which is
 * needed during script running.
 *
 * @package    Updater\Inc\Functions
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://wpwebmaster.ir
 * @since      1.0.0
 */

namespace Updater\Inc\Functions;


/**
 * Class Utility
 *
 * This file contains Utility class and includes all of useful methods which is
 * needed during script running.
 *
 * @package    Updater\Inc\Functions
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 */
class Utility {

	public static function set_time_zone( $area ) {
		date_default_timezone_set( $area );
	}

	/**
	 * Appends a trailing slash.
	 *
	 * Will remove trailing forward and backslashes if it exists already before adding
	 * a trailing forward slash. This prevents double slashing a string or path.
	 *
	 * The primary use of this is for paths and thus should be used for paths. It is
	 * not restricted to paths and offers no specific path support.
	 *
	 * @since 1.2.0
	 *
	 * @param string $string What to add the trailing slash to.
	 *
	 * @return string String with trailing slash added.
	 */
	public static function trailingslashit( $string ) {
		return untrailingslashit( $string ) . '/';
	}

	/**
	 * Removes trailing forward slashes and backslashes if they exist.
	 *
	 * The primary use of this is for paths and thus should be used for paths. It is
	 * not restricted to paths and offers no specific path support.
	 *
	 * @since 2.2.0
	 *
	 * @param string $string What to remove the trailing slashes from.
	 *
	 * @return string String without the trailing slashes.
	 */
	public static function untrailingslashit( $string ) {
		return rtrim( $string, '/\\' );
	}

}


