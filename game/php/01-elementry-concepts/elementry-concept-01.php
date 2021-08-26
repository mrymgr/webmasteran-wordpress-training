<?php
$height = readline( 'Enter your height: ' );
$mass   = readline( 'Eneter your mass: ' );

$bmi = $mass / ( $height * $height );

if ( $bmi < 18.5 ) {
	echo 'Underweight';
} elseif ( $bmi >= 18.5 and $bmi <= 25 ) {
	echo 'Normal';
} elseif ( $bmi >= 25 and $bmi <= 30 ) {
	echo 'Overweight';
} else {
	echo 'Obese';
}