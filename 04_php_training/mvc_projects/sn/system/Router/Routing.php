<?php

namespace System\Router;

use ReflectionMethod;

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
		$match = $this->match();
		if ( empty( $match ) ) {
			$this->error404();
		}

		$classPath = str_replace( '\\', '/', $match['class'] );
		$path      = BASE_DIR . DIRECTORY_SEPARATOR . "App/Http/Controllers" . DIRECTORY_SEPARATOR . $classPath . '.php';
		if ( ! file_exists( $path ) ) {
			$this->error404();
		}

		$class  = '\App\Http\Controllers\\' . $match['class'];
		$object = new $class();
		if ( method_exists( $object, $match['method'] ) ) {
			$reflection     = new ReflectionMethod( $class, $match['method'] );
			$parameterCount = $reflection->getNumberOfParameters();

			if ( $parameterCount <= count( $this->values ) ) {
				call_user_func_array( array( $object, $match['method'] ), $this->values );
			}
		} else {
			$this->error404();
		}
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