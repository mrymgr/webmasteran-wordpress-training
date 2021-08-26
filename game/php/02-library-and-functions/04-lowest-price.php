<?php
$all_product_count       = readline( 'Enter all product count: ' );
$advertise_product_count = readline( 'Enter advertise product count: ' );
if ( $advertise_product_count > $all_product_count ) {
	$advertise_product_count = $all_product_count;
}


$key_array     = [];
$product_array = [];

for ( $i = 0; $i < $all_product_count; $i ++ ) {
	$key_array[] = readline( 'Enter product name: ' );
}

for ( $i = 0; $i < $all_product_count; $i ++ ) {
	$value                             = readline( 'Enter product price: ' );
	$product_array[ $key_array[ $i ] ] = $value;
}

function msn_usort_for_lowest_price( $x, $y ) {
	if ( intval( $x ) == intval( $y ) ) {
		return 0;
	}

	return ( intval( $x ) < intval( $y ) ) ? - 1 : 1;

}

uasort( $product_array, 'msn_usort_for_lowest_price' );
$product_array_key = array_keys($product_array);
$product_array_value = array_values($product_array);

for ( $i = 0; $i < $advertise_product_count ; $i++ ) {
	echo "{$product_array_key[$i]}:{$product_array_value[$i]}\n";
}
