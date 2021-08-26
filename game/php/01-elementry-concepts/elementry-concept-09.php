<?php

function formatCardNumber( string $number ) {
/*	$numbers_array = [ '0', '1', '2', '3', '4', '5', '6', '7', '8' , '9'];
	for ( $i = 0 ; $i < strlen($number) ; $i++) {
		if ( ! in_array($number[0], $numbers_array)) {
			return null;
		}
	}*/

	if ( ! ctype_digit($number)) {
		return null;
	}

	$concat_array = [];
	for ($i=0 ; $i < 4 ; $i++) {
		$concat_array[$i] = substr( $number, 0, 4 );
		$number = substr( $number, 4 );
	}

	$result = '';
	$i = 0 ;
	foreach ( $concat_array as $item) {
		if ( $i < 3) {
			$result .= $item . ' ';
		} else {
			$result .= $item;
		}
		$i++;
	}
	return $result;

}
