<?php
use Webmasteran\Sample_Classes\First_Sample;
use Webmasteran\Sample_Classes\Apps\Second_Sample;

require '../vendor/autoload.php';

$obj = new First_Sample();
$obj->say_hello(' Webmasters!!!');

$obj1 = new Second_Sample();
$obj1->show_message();
echo $obj1->name;


