<?php
/**
 * Sample of debugging in PHP
 */

ob_start();
session_start();
session_start();
ob_clean();
#sample of error_reporting function
//error_reporting(E_ERROR or E_WARNING);

#Disable showing errors in PHP
//ini_set('display_errors','Off');

if ( ! file_exists( 'uploads/gholam.txt' ) ) {
	die( "Gholam.txt is not exist" );
} else {
	$file = fopen( 'uploads/gholam.txt', 'r' );
	echo "This file was opened successfully.";
}

//Sample of fatal errors
/*function call_gholam() {
	echo 'Hey, gholam';
}

function call_gholam() {
	echo 'Salam, gholam';
}

call_gholam();*/

//call_gholam();
//require 'gholam.php';

//Sample of warning errors
include 'gholam.php';

echo '<br>';
echo '<hr>';
echo 'This is after warning message';

echo '<hr>';
//Sample of Notice errors

$msn_sample_array         = [
	'name'   => 'gholam',
	'family' => 'gholam zadeh',
];
$msn_sample_indexed_array = [ 1, 2, 3 ];
echo $msn_sample_array['age'];
echo $msn_sample_indexed_array[17];

//ob_end_clean();
echo $gholam;
