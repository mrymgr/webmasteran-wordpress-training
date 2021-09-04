<?php


$base_url = "http://localhost/php/webmasteran/04_php_training/mvc_projects/mvc/";
$base_dir = "/php/webmasteran/04_php_training/mvc_projects/mvc/";

$temp = explode('?', $_SERVER['REQUEST_URI']);
$current_route = str_replace($base_dir, '', $temp[0]);
unset($temp);
