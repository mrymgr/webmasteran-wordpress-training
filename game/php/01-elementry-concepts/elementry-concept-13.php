<?php

function color( &$temp_array ) {

	$first_dimension  = count( $temp_array );
	$second_dimension = count( $temp_array[0] );
	$third_dimension  = count( $temp_array[0][0] );

	for ($i = 0 ; $i < $first_dimension; $i++ ) {
		for ($j = 0 ; $j < $second_dimension; $j++ )  {
			for ($k = 0 ; $k < $third_dimension; $k++ )  {
				if ( 0 === $i or
				     ( $first_dimension - 1 ) === $i or
				     0 === $j or
				     ( $second_dimension - 1 ) === $j or
				     0 === $k or
				     ( $third_dimension - 1 ) === $k
				) {
					$temp_array[$i][$j][$k] = 1;
				} else {
					$temp_array[$i][$j][$k] = 0;
				}

			}

		}

	}


}

$temp_array1 = [
	[
		[ 5, 5, 5 ],
		[ 5, 5, 5 ],
		[ 5, 5, 5 ],
		[ 5, 5, 5 ],
		[ 5, 5, 5 ],
	],
	[
		[ 5, 5, 5 ],
		[ 5, 5, 5 ],
		[ 5, 5, 5 ],
		[ 5, 5, 5 ],
		[ 5, 5, 5 ],
	],
	[
		[ 5, 5, 5 ],
		[ 5, 5, 5 ],
		[ 5, 5, 5 ],
		[ 5, 5, 5 ],
		[ 5, 5, 5 ],
	],
	[
		[ 5, 5, 5 ],
		[ 5, 5, 5 ],
		[ 5, 5, 5 ],
		[ 5, 5, 5 ],
		[ 5, 5, 5 ],
	]
];

color($temp_array1);
var_dump($temp_array1);

for ( $i = 0; $i < count( $temp_array1 ); ++ $i ) {
	echo 'layer ' . ( $i + 1 ) . ':' . '<br>';;
	foreach ( $temp_array1[ $i ] as $j ) {
		foreach ( $j as $k ) {
			echo $k . ' ';
		}
		echo '<br>';;
	}
}