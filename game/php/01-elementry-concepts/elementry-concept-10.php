<?php

function formatCardNumber( string $number ) {

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
