<?php



function getHighestPrice() {
	global $data;
	if ( is_null( $data) or empty( $data)) {
		return null;
	}
	$highest_price_name = '';
	$current_price = 0;
	foreach ( $data as $item  ) {
		if ( (int)$item['price'] > $current_price ) {
			$current_price = (int)$item['price'];
			$highest_price_name = $item['name'];
		}
	}
	return  $highest_price_name;
}

