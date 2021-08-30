<?php
$number = (string)readline( 'Please input number: ' );
$sum_of_numbers = 0;
for ( $i = 0; $i < strlen($number) ; $i ++ ) {
	$sum_of_numbers += $number[$i];
}

echo $sum_of_numbers;

