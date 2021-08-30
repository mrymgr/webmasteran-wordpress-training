<?php

function formatPhoneNumber( string $number ) {
	$string_start = substr( $number, 0, 2 );
	$raw_string   = substr( $number, 1 );
	if ( '09' !== $string_start ) {
		return null;
	}

	return '+98' . $raw_string;

}


