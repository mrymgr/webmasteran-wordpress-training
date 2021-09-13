<?php

namespace System\Bootstrap;

class Autoload {

	public function autoloader() {

		global $base_dir;
		spl_autoload_register( function ($className) {
			$className = str_replace("\\", DIRECTORY_SEPARATOR , $className);
			include_once $_SERVER['DOCUMENT_ROOT'] . '/php/webmasteran/04_php_training/mvc_projects/mvc/' . $className. '.php';
		});
	}
}
