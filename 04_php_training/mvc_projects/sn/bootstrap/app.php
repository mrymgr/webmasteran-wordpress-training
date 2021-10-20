<?php

/*Add config for this project*/
require_once ('../config/app.php');
require_once ('../config/database.php');

/*Add routes for this project*/
require_once ('../routes/web.php');
require_once ('../routes/api.php');

$routing = new \System\Router\Routing();
$routing->run();