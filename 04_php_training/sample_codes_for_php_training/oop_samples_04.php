<?php

#autoad handler
include_once 'oop_samples_03.php';

// Create a new object
$newobj = new PrideGhahreman( 'pride 6 dar', 6, 'Saipa Ghashang' );
// Define and use new method in child class
echo $newobj->parvaz();
// Use a method from the parent class
$newobj->moving();
// Use a method from the parent classg
$newobj->stopping();
// Define and use new property in child class
$newobj->wings_number = 2;
// Use a method from the parent class and ovverriding parent method in child method
echo $newobj;
echo '<hr>';
MsnCar::car_reference();

echo '<br>';
echo '<hr>';

#Sample of overloading method in PHP
$obj1 = new PrideGhahreman();
var_dump($obj1);
$obj2 = new PrideGhahreman('Prido shasi boland' );
var_dump($obj2);
$obj3 = new PrideGhahreman('Prido bi shasi' , 18 , 'Saipa palang' );
var_dump($obj3);