<?php

function repeatInString( $main_string, $sub_string ) {
	$sub_string_counter = 0;
	if ( null === $main_string or null === $sub_string
	     or 0 === strlen( $main_string ) or 0 === strlen( $sub_string )
	) {
		return $sub_string_counter;
	}

	while ( strlen( $main_string ) > 0 ) {
		$position = strpos( $main_string, $sub_string );
		if ( false !== $position ) {
			$sub_string_counter ++;
			$main_string = substr( $main_string, $position + 1 );
		} else {
			break;
		}
	}
	return $sub_string_counter;


}

