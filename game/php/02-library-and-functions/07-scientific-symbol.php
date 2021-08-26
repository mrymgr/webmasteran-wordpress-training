<?php


$number = readline('Please insert your number: ');
//echo "\n";
if ( $number == 0 or $number == -0 ) {
	echo '0';
} else {
	//$decimal_count =  strlen(substr(strrchr($number, "."), 1));
	$power = floor(log10(abs($number)));
	if ( ($number > 0 and $number < 1) or ( $number < 0 and $number > -1) ) {
		for ( $i = 0; $i < abs($power) ; $i++) {
			$number = (float)$number * 10;
		}
	} else {
		for ( $i = 0; $i < abs($power) ; $i++) {
			$number = (float)$number / 10;
		}
	}

	//$number = number_format( (float)($number / pow(10 , $power)) , $decimal_count);
	//echo "\n";
	echo $number . 'e' . $power;

}



