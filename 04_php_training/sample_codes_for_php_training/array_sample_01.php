<?php
/*Simple array*/
$msn_simple_array = array( 5, 'Mehdi', 3.14, array( 1, 2, 3, 4 ) );
var_dump( $msn_simple_array );
echo '<hr>';
/*Short array syntax*/
$msn_short_array_syntax = [ 10, 20, 30, 40 ];
var_dump( $msn_short_array_syntax );

echo '<hr>';

$msn_customized_array_index = [
	8  => 'ahmad',
	10 => 'Mehdi',
	'abbas',
	20 => 'Soltani',
	30 => 'Gholam',
	'ghanbarak', //overwrite by mamad
	31 => 'mamad',
	'Havicheh',
];
var_dump( $msn_customized_array_index );

echo '<hr>';

/*Simple associative arrays*/
$msn_simple_associative_array = [
	'first_name' => 'Mehdi',
	'last_name'  => 'Soltani',
	'profession' => 'programmer',
];
var_dump( $msn_simple_associative_array );

echo '<hr>';

/*Simple Multidimensional arrays*/
$msn_simple_multidimensional_array = [
	[
		'first_name'  => 'Mehdi',
		'last_name'   => 'Soltani',
		'profession'  => 'programmer',
		'friend_name' => 'Agha Gholam',
	],
	[
		'first_name' => 'Saeed',
		'last_name'  => 'Hoseini',
		'profession' => 'Digital Marketer',
	],
	'abbas agha',
	6,
];
var_dump( $msn_simple_multidimensional_array );

echo '<hr>';

var_dump( $msn_customized_array_index );
/*Add or change array elements*/
$msn_customized_array_index[12] = 'Ghasem';
$msn_customized_array_index[10] = 'Mehran';

var_dump( $msn_customized_array_index );

echo '<hr>';

var_dump( $msn_simple_associative_array );

$msn_simple_associative_array['first_name'] = 'gholam';
$msn_simple_associative_array['age']        = '230 years';
var_dump( $msn_simple_associative_array );

/*Check for being empty in array*/
var_dump( $msn_customized_array_index[42] ?? null );
var_dump( $msn_customized_array_index );
var_dump( isset( $msn_customized_array_index[42] ) );
var_dump( empty( $msn_customized_array_index[42] ) );
echo isset( $msn_customized_array_index[42] ) ? $msn_customized_array_index[42] : 'Default Value';

echo '<hr>';

$msn_adding_to_array[20] = 'Mehdi Soltani';
$msn_adding_to_array[]   = 100;
$msn_adding_to_array[]   = 'Agha Gholam';
var_dump( $msn_adding_to_array );

echo '<hr>';
/*Simple Multidimensional arrays*/
$msn_simple_multidimensional_array   = [
	[
		'first_name'  => 'Mehdi',
		'last_name'   => 'Soltani',
		'profession'  => 'programmer',
		'friend_name' => 'Agha Gholam',
	],
	[
		'first_name' => 'Saeed',
		'last_name'  => 'Hoseini',
		'profession' => 'Digital Marketer',
	],
	'abbas agha',
	6,
];
$msn_simple_multidimensional_array[] = [
	'first_name'  => 'Mehdi',
	'last_name'   => 'Gholami',
	'profession'  => 'Inkareh',
	'friend_name' => 'Saeed Hoseini',
];
var_dump( $msn_simple_multidimensional_array );

echo '<hr>';

/*Using for loop to iterate in an array*/

$simple_loop_on_array = [ 100, 200, 300 ];
for ( $i = 0; $i < count( $simple_loop_on_array ); $i ++ ) {
	echo $simple_loop_on_array[ $i ];
	if ( $i < count( $simple_loop_on_array ) - 1 ) {
		echo ' - ';
	}
}

echo '<br>';
//Have notice with following codes
/*for ( $i = 0; $i < count( $msn_customized_array_index ); $i ++ ) {
	echo $msn_customized_array_index [ $i ] .'<br>';

}*/


echo '<br>';
/*Using while loop to iterate in an array*/
$counter = 0;
while ( $counter < count( $simple_loop_on_array ) ) {
	echo $simple_loop_on_array[ $counter ];
	if ( $counter < count( $simple_loop_on_array ) - 1 ) {
		echo ' - ';
	}
	$counter ++;
}
echo '<br>';

/*Check isset and not empty for an array before iterating*/
if ( isset( $simple_loop_on_array ) && ! empty( $simple_loop_on_array ) ) {
	for ( $i = 0; $i < count( $simple_loop_on_array ); $i ++ ) {
		echo $simple_loop_on_array[ $i ];
		if ( $i < count( $simple_loop_on_array ) - 1 ) {
			echo ' - ';
		}
	}
}

echo '<hr>';

/*I must change it for next week*/
/*for ( $i = 0; $i < count( $msn_customized_array_index ); $i ++ ) {
	 var_dump($msn_customized_array_index[ $i ]);
	if ( isset( $msn_customized_array_index[ $i ] ) && ! empty( $msn_customized_array_index[ $i ] ) ) {
		echo $msn_customized_array_index[ $i ];

	}

}*/

/*Using array_keys to get keys in an array*/
var_dump( $msn_simple_associative_array );
$msn_get_array_keys   = array_keys( $msn_simple_associative_array );
$msn_get_array_values = array_values( $msn_simple_associative_array );
var_dump( $msn_get_array_keys );
var_dump( $msn_get_array_values );
echo '<hr>';
/*Sample of traversing in multi-dimensional array */
$employees               = [];
$employees['employee-1'] = [
	'id'         => 1394,
	'first_name' => 'gholam',
	'last_name'  => 'gholami',
	'profession' => 'khafan programmer',
];
$employees['employee-2'] = [
	'id'         => 1395,
	'first_name' => 'Sina',
	'last_name'  => 'Sajadi',
	'profession' => 'front-end developer',
];
$employees['employee-3'] = [
	'id'         => 1396,
	'first_name' => 'Saeed',
	'last_name'  => 'Kamyabi',
	'profession' => 'back-end developer',
];
$employees['employee-4'] = [
	'id'         => 1397,
	'first_name' => 'Abas',
	'last_name'  => 'Hajkenari',
	'profession' => 'translator',
];
$employees['employee-5'] = [
	'id'         => 1398,
	'first_name' => 'Mamad',
	'last_name'  => 'Reshad',
	'profession' => 'operator',
];
$employees['employee-6'] = [
	'id'         => 1399,
	'first_name' => 'Matin',
	'last_name'  => 'Tayefi',
	'profession' => 'khafan operator',
];
$employees['employee-7'] = [
	'id'         => 1400,
	'first_name' => 'Siavash',
	'last_name'  => 'Sedaghat',
	'profession' => 'accountant',
];
$employees['employee-8'] = [
	'id'         => 1401,
	'first_name' => 'Siavash',
	'last_name'  => 'Kameli',
	'profession' => 'khafan accountant',
];
$departments             = [];
$employee_counter        = 1;
foreach ( $employees as $employee ) {
	switch ( $employee_counter ) {
		case 1:
		case 2:
		case 3:
			$departments['software_team'][] = $employee;
			break;
		case 4:
		case 5:
		case 6:
			$departments['reservation_team'][] = $employee;
			break;
		case 7:
		case 8:
			$departments['accounting_team'][] = $employee;
			break;
	}
	$employee_counter ++;
}
foreach ( $departments as $key_department => $value_department ) {
	echo '<pre>';
	echo '<em> Employees of ' . $key_department . '</em>:<br>';
	foreach ( $value_department as $employeee ) {
		echo "\t" . '<strong>ID of Employee</strong>: ' . $employeee['id'];
		echo ' , <strong>Name: </strong>' . $employeee['first_name'];
		echo ' , <strong>Family:</strong> ' . $employeee['last_name'];
		echo ' , <strong>Profession:</strong> ' . $employeee['profession'];
		echo '<br>';
	}
	echo '</pre>';
}
echo '<br>';
echo '<hr>';

/*Sample of recursive function to iterate on n-dimensional array*/
function msn_iterate_array( $array, $level = 1 ) {
	foreach ( $array as $key => $value ) {
		if ( is_array( $value ) ) {
			//echo 'level is: '. $level . '<br>';
			echo str_repeat( " ", 4 * ( $level - 1 ) );
			echo $key, ' => <br>';
			msn_iterate_array( $value, $level + 1 );
		} else {
			echo str_repeat( " ", 4 * ( $level - 1 ) );
			echo $key, ' => ', $value, ' ';
		}
		echo '<br>';
	}
}

$msn_sample_recursive_on_array = [
	10,
	20,
	30,
	[
		'name'       => 'safdar',
		'family'     => 'safdari',
		'Jangoolers' => [
			'bandbazi',
			'sedaye soosk',
			'poshtak varo'
		],
	],
	50,
	[ 200, 300, 500 ]
];
msn_iterate_array( $msn_sample_recursive_on_array );

echo '<hr>';
/*Simple array sort*/
$msn_simple_array_for_sort = [ 110, 13, 2, 253, 99, 45, 73, 56 ];
sort( $msn_simple_array_for_sort );
var_dump( $msn_simple_array_for_sort );
echo '<br>';
/*Simple array with different types and Descending sort*/
$msn_simple_array_for_sort = [ 110, 13, 'gholam', 2, 253, 99, 45, 85.2, 'Ghanbarak', 73, 56 ];
sort( $msn_simple_array_for_sort );
var_dump( $msn_simple_array_for_sort );
/*Simple array with different types and Descending sort*/
$msn_simple_array_for_sort = [ 110, 13, 'gholam', 2, 253, 99, 45, 85.2, 'Ghanbarak', 73, 56 ];
rsort( $msn_simple_array_for_sort );
var_dump( $msn_simple_array_for_sort );

echo '<hr>';

$simple_asort_for_associative_array_1 = [
	'first'  => 'Mehdi',
	'second' => 'gholam',
	'third'  => 'Akbar',
	'forth'  => 'Jafar',
];
asort( $simple_asort_for_associative_array_1 );
var_dump( $simple_asort_for_associative_array_1 );

/*Simple arsort for associative array*/
$simple_asort_for_associative_array_2 = [
	'first'  => 'Soltani',
	'second' => 'gholami',
	'third'  => 'Akbari',
	'forth'  => 'Jafari',
];
arsort( $simple_asort_for_associative_array_2 );
var_dump( $simple_asort_for_associative_array_2 );

/*Simple ksort for associative array*/
$simple_asort_for_associative_array_3 = [
	'name'   => 'Mehdi',
	'family' => 'Soltani',
	'id'     => '7728028',
	'age'    => '22',
];
ksort( $simple_asort_for_associative_array_3 );
var_dump( $simple_asort_for_associative_array_3 );

/*Simple krsort for associative array*/
$simple_asort_for_associative_array_3 = [
	'name'   => 'Mehdi',
	'family' => 'Soltani',
	'id'     => '7728028',
	'age'    => '22',
];
krsort( $simple_asort_for_associative_array_3 );
var_dump( $simple_asort_for_associative_array_3 );

echo '<hr>';

/*Simple usort with */
$msn_usort_number = [ 4, 8, 3, 6, 2 ];
var_dump( $msn_usort_number );
echo '<b>return ( $a < $b ) ? - 1 : 1;</b><br>';
function msn_usort_for_number( $a, $b ) {
	if ( $a == $b ) {
		return 0;
	}
	echo "a: $a & b: $b <br>";

	return ( $a < $b ) ? - 1 : 1;
}

usort( $msn_usort_number, 'msn_usort_for_number' );
var_dump( $msn_usort_number );

/*User define sort by string length with usort in DESC mode*/
$animals = [ 'dog', 'tiger', 'giraffe', 'bear' ];
usort( $animals, function ( $a, $b ) {
	return strlen( $b ) - strlen( $a );
} );
var_dump( $animals );

echo '<hr>';


$msn_score = [
	'math'     => 18.5,
	'physics'  => 14.25,
	'history'  => 16,
	'sport'    => 20,
	'jeopardy' => 16
];
function msn_uasort_for_score( $x, $y ) {
	if ( $x == $y ) {
		return 0;
	}

	return ( $x < $y ) ? - 1 : 1;
}

uasort( $msn_score, 'msn_uasort_for_score' );
var_dump( $msn_score );
uksort( $msn_score, 'msn_uasort_for_score' );
var_dump( $msn_score );

echo '<hr>';


// CREATE A TEST DATA SET - AN ARRAY OF OBJECTS
$obj          = new stdClass;
$obj->created = '2019-09-06';
$obj->rating  = '28';
$arr[0]       = $obj;
$obj          = new stdClass;
$obj->created = '2019-09-06';
$obj->rating  = '42';
$arr[1]       = $obj;
$obj          = new stdClass;
$obj->created = '2019-09-08';
$obj->rating  = '23';
$arr[3]       = $obj;
$obj          = new stdClass;
$obj->created = '2019-09-09';
$obj->rating  = '25';
$arr[4]       = $obj;
$obj          = new stdClass;
$obj->created = '2019-09-11';
$obj->rating  = '23';
$arr[6]       = $obj;
$obj          = new stdClass;
$obj->created = '2019-09-07';
$obj->rating  = '20';
$arr[7]       = $obj;
$obj          = new stdClass;
$obj->created = '2019-09-10';
$obj->rating  = '45';
$arr[10]      = $obj;
// A FUNCTION TO COMPARE created PROPERTIES
function sort_created_asc( $a, $b ) {
	return ( $a->created < $b->created ) ? - 1 : 1;
}

function sort_rating_desc ( $a , $b ) {
	return ( $a->rating > $b->rating ) ? - 1 : 1;
}

var_dump( $arr );
// SORT BY created PROPERTY
usort( $arr, 'sort_created_asc' );
echo PHP_EOL . "SORTED BY created: " . PHP_EOL;
var_dump( $arr );
echo '<hr>';

usort( $arr, 'sort_rating_desc' );
echo PHP_EOL . "SORTED BY rating From top: " . PHP_EOL;
var_dump( $arr );




















