<?php

$temp_array = [];
for ( $i = 0 ; $i < 5 ; $i++) {
	$temp_array[$i] = readline();
}

$comparing_value = readline();
$result = 'NO';

for ( $i = 0 ; $i < 5 ; $i++) {
	if ($temp_array[$i] == $comparing_value) {
		$result = 'YES';
		break;
	}

}

echo $result;

