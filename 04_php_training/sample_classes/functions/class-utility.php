<?php

namespace Webmasteran\Sample_Classes\Functions;

class Utility {

	private static $instance;

	public static function get_instance() {
		if ( ! self::$instance ) { // If no instance then make one
			self::$instance = new self();
		}

		return self::$instance;
	}

	public static function test_input( $data ) {
		$data = trim( $data );
		$data = stripslashes( $data );
		$data = htmlspecialchars( $data );

		return $data;
	}

	public static function get_id( $id ) {
		if ( isset( $id ) && ! empty( $id ) && is_numeric( $id ) && $id > 0 ) {
			return $id;
		} else {
			die( '<h2>You can not access to this page, Please use another links from site menu!</h2>' );;
		}
	}
}


