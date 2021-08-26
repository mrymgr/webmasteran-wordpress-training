<?php
$checking_string = readline( 'Enter your string: ' );
$temp_array      = [];
$result          = 'NO';
$is_find_bug  = false;

for ( $i = 0; $i < strlen( $checking_string ); $i ++ ) {
	if ( in_array( $checking_string[ $i ], [ '(', '{', '[' ] ) ) {
		array_push( $temp_array, $checking_string[ $i ] );
		continue;
	}
	if ( in_array( $checking_string[ $i ], [ ')', '}', ']' ] ) ) {
		switch ( end( $temp_array ) ) {
			case '(':
				if ( ')' === $checking_string[ $i ] ) {
					array_pop( $temp_array );
				} else {
					$is_find_bug = true;
				}
				break;
			case '{':
				if ( '}' === $checking_string[ $i ] ) {
					array_pop( $temp_array );
				} else {
					$is_find_bug = true;
				}
				break;
			case '[':
				if ( ']' === $checking_string[ $i ] ) {
					array_pop( $temp_array );
				} else {
					$is_find_bug = true;
				}
				break;
			default:
				$is_find_bug = true;
		}
	}
	if ( $is_find_bug ) {
		break;
	}

}

if ( 0 === count( $temp_array ) and ! $is_find_bug) {
	$result = 'YES';
}
echo $result;

