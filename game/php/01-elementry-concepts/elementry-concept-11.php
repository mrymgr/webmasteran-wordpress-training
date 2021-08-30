<?php
$voters = [];
$voters_count = readline( 'Please enter voters count: ' );
$counter_array= [];
for ( $i = 0; $i < $voters_count; $i ++ ) {
	$temp_voter                  = readline( 'Input voter name: ' );
	if (in_array($temp_voter, $voters)) {
		$counter_array[$temp_voter] += 1;
	} else {

		$counter_array[$temp_voter] = 1 ;
	}
	$voters[] = $temp_voter;
}

foreach ($counter_array as $key => $value) {
	if ( $value > 1) {
		echo $key."\n";
	}
}
