<?php




define('APP_TITLE', 'MVC project');
define('BASE_URL', 'http://localhost:8000');
/*
 * Reserve 8000 port for this project
 * ==================================
 * php -S localhost:8000 -t path_of_your_project
 * php -S localhost:8000 -t c:/laragon/www/php/webmasteran/04_php_training/mvc_projects/sn/public
 *
 * note: you can find path of your project with pwd command
 *
 * */
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
	'put' => [

	],
	'delete' => [

	]
];
