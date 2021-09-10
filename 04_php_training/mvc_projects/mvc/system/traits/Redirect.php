<?php

namespace System\Traits;

trait Redirect {

	/**
	 * @param $url
	 */
	protected function redirect ($url) {
		$protocol = stripos( $_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
		header("Location: " . $protocol . $_SERVER['HTTP_HOST'] . '/php/webmasteran/04_php_training/mvc_projects/mvc/'. $url);
	}

	protected function back() {
		$http_referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
		if ( null !== $http_referer ) {
			header("Location: " . $http_referer);
		} else {
			echo "Route not found";
		}

	}

}

