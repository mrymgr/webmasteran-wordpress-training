<?php

namespace System\Traits;

trait View {

	protected function view( $dir, $vars = null ) {
		$dir = str_replace( '.', '/', $dir );
		if ($vars) {

			$path = realpath( dirname(__FILE__) . "/../../application/view"). '/'. $dir . ".php";
		}

		if ( file_exists($path)) {
			extract($vars);
			return require_once $path;
		} else {
			echo "<h2>this view on: {$path} does not exist!!!</h2>";
		}
	}

}