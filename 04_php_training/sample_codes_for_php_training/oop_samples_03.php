<?php

/***** Autoloder class *****/
class Autoloader {
	public function __construct() {
		spl_autoload_register( array( $this, 'autoload' ) );
	}

	public function autoload( $class_name ) {
		$file = $this->convert_class_to_file( $class_name );
		if ( is_file( $file ) && file_exists( $file ) && is_readable( $file ) && ! class_exists( $class_name ) ) {
			//var_dump($file);
			include_once $file;
		} else {
			die( "This file name: {$file} was not found...!" );
		}
	}

	public function convert_class_to_file( $class_name ) {
		$class    = strtolower( $class_name );
		$class    = 'class-' . $class;
		$filename = "inc/{$class}.php";

		return $filename;
	}
}

new Autoloader();