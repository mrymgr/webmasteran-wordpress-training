<?php




define('APP_TITLE', 'MVC project');
define('BASE_URL', 'https://localhost:8000');
//define('BASE_URL', 'https://localhost/php/webmasteran/04_php_training/mvc_projects/sn/');
//define('MSN_BASE_URL', 'php/webmasteran/04_php_training/mvc_projects/sn/');
define('BASE_DIR', realpath(__DIR__."/../"));


$temp = str_replace( BASE_URL, '', explode('?', $_SERVER['REQUEST_URI'])[0]);
$temp === "/" ? $temp = "" : $temp = substr($temp, 1);

define('CURRENT_ROUTE', $temp);

global $routes;

$routes = [
	'get' => [

	],
	'post' => [

	],
	'delete' => [

	]
];
