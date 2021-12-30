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
//$posts = \App\Post::where('id','>', 1)->get();
//$posts = \App\Category::find(1)->posts()->get();
//$categories = \App\Post::find(1)->category()->get();
//$users = \App\Role::find(1)->users()->get();
//$roles = \App\User::find(1)->roles()->get();
//dd($posts);
//dd($categories);
//dd($users);

/*foreach ( $posts as $post) {
  var_dump($post);
}
foreach ( $categories as $category) {
  var_dump($category);
}
foreach ( $roles as $role) {
  var_dump($role);
}
die();*/


$routing = new \System\Router\Routing();
$routing->run();