<?php

use Webmasteran\Sample_Classes\First_Sample;
use Webmasteran\Sample_Classes\Apps\Second_Sample;

require '../vendor/autoload.php';
/*
 * 2 sample examples to see how composer works
 * */
$obj = new First_Sample();
$obj->say_hello( ' Webmasters!!!' );

$obj1 = new Second_Sample();
$obj1->show_message();
echo $obj1->name;
echo '<hr>';

/*
 * Sample of database connection with a class
 *
 * */
