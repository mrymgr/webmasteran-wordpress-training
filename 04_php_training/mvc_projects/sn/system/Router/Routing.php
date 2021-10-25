<?php

namespace System\Router;

class Routing {

	private $current_route;
	private $method_field;
	private $routes;
	private $values = [];

	/**
	 * Routing Class Constructor
	 */
	public function __construct() {
		$this->current_route = explode( '/', CURRENT_ROUTE );

		$this->method_field = $this->methodField();

		global $routes;
		$this->routes = $routes;

	}

	public function run() {

	}

	public function match() {

		$reservedRoutes = $this->routes[ $this->method_field ];
		foreach ( $reservedRoutes as $reservedRoute ) {
			if ( $this->compare( $reservedRoute['url'] ) ) {
				return [
					"class"  => $reservedRoute['class'],
					"method" => $reservedRoute['method'],
				];
			} else {
				$this->values = [];
			}
		}

		return [];
	}

	private function compare( $reservedRouteUrl ) {

		if ( '' == trim( $reservedRouteUrl, '/' ) ) {
			return '' === trim( $this->current_route[0], '/' );
		}

		$reservedRouteUrlArray = explode( '/', $reservedRouteUrl );
		if ( sizeof( $this->current_route ) != sizeof( $reservedRouteUrlArray ) ) {
			return false;
		}

		foreach ( $this->current_route as $key => $currentRouteElement ) {
			$reservedRouteUrlElement = $reservedRouteUrlArray[ $key ];
			if ( "{" == substr( $reservedRouteUrlElement, 0, 1 )
			     && "}" == substr( $reservedRouteUrlElement, - 1 )
			) {
				array_push( $this->values, $currentRouteElement );
			} elseif ( $reservedRouteUrlElement != $currentRouteElement ) {
				return false;
			}
		}

		return true;
	}

	/**
	 * Error 404 method
	 * to send 404 response to client
	 *
	 */
	public function error404() {

		\http_response_code( 404 );
		include __DIR__ . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR . '404.php';
	}

	/**
	 * Find http verbs for request
	 * to detect get, post, put and delete method
	 *
	 * @return string
	 */
	public function methodField() {

		$method_field = strtolower( $_SERVER['REQUEST_METHOD'] );
		if ( 'post' == $method_field ) {
			if ( isset( $_POST['_method'] ) ) {
				if ( 'put' == $_POST['_method'] ) {
					$method_field = 'put';
				} elseif ( 'delete' == $_POST['_method'] ) {
					$method_field = 'delete';
				}
			}
		}

		return $method_field;
	}
}