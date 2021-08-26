<?php
function encrypt( $string, int $n ) {

	if ( is_null( $string ) or empty( $string ) ) {
		return $string;
	}
	$result       = '';
	$shift_number = abs( $n % 26 );
	for ( $i = 0; $i < strlen( $string ); $i ++ ) {
		if ( ctype_upper( $string[ $i ] ) ) {
			$result .= chr( 65 + (( ord( $string[ $i ] ) - 65 + $shift_number ) % 26) );
		} else {
			$result .= chr( 97 + (( ord( $string[ $i ] ) - 97 + $shift_number ) % 26) );
		}

	}
	return $result;
}


function decrypt( $string, int $n ) {

	if ( is_null( $string ) or empty( $string ) ) {
		return $string;
	}
	$result       = '';
	$shift_number = abs( $n % 26 );
	for ( $i = 0; $i < strlen( $string ); $i ++ ) {
		if ( ctype_upper( $string[ $i ] ) ) {
			$result .= chr( 90 - (( abs(ord( $string[ $i ] ) - 90) + $shift_number ) % 26) );
		} else {
			$result .= chr( 122 - (( abs(ord( $string[ $i ] ) - 122) + $shift_number ) % 26) );
		}

	}
	return $result;
}


