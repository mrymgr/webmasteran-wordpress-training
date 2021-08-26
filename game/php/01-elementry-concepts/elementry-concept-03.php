<?php

$player_array = [];
for ( $i = 0; $i < 3; $i ++ ) {
	$player_name                  = readline( 'Input player name: ' );
	$player_array[ $player_name ] = 0;
}

for ( $i = 0; $i < 4; $i ++ ) {
	$temp_name                  = readline( 'Enter winner name: ' );
	$temp_score                 = readline( 'Enter Score' );
	$player_array[ $temp_name ] += (int) $temp_score;
}

arsort( $player_array );
echo array_keys( $player_array )[0];

