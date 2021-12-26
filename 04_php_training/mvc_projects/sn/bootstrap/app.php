<?php

//dd helper function

function dd($var) {
  echo "<pre>";
  print_r($var);
  //var_dump($var);
  echo "</pre>";
  exit;
}

/*Add config for this project*/
require_once ('../config/app.php');
require_once ('../config/database.php');

/*Add routes for this project*/
require_once ('../routes/web.php');
require_once ('../routes/api.php');

//Sample to test ORM
$categories = \App\Category::all();
dd($categories);


$routing = new \System\Router\Routing();
$routing->run();