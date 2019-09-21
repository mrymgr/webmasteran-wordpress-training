<?php

use Webmasteran\Sample_Classes\Database\Db_Extend;
use Webmasteran\Sample_Classes\Database\Utility;

require '../../vendor/autoload.php';
$euro   = '';
$dollar = '';
$sample_records = [];

#Add header to show menu in this page
require_once 'template_parts/header_db_sample.php';

$loop_count = 0;
if ( isset( $_POST ) && ! empty( $_POST ) ) {
	$loop_count = Utility::test_input( $_POST['number'] );
	if ( ! is_numeric( $loop_count ) || $loop_count < 1 ) {
		die( '<h2 class="msn-p-10">You can not continue, Return to form and put numeric value to assign your form!</h2>' );
	}
}

#set default timezone for this script based on Tehran time
date_default_timezone_set( "Asia/Tehran" );

#Insert data in database
$msn_db_connection = Db_Extend::get_instance( "localhost", "mehdi", "mznx9182", "msntrainers", true );
while ( $loop_count ) {
	$dollar = rand(11000, 13000);
	$euro = rand( 13000, 16000);
	$day = rand(1,28);
	$month = rand(1,12);
	$hour = rand(1,14);
	$minute = rand(1,60);
	$sample_records[] = [ $dollar, $euro, date( "Y-$month-$day $hour:$minute:s" ) ];
	$loop_count--;
}



$sample_query      = "INSERT INTO currency (dollar, euro, created_date) VALUES ( ? , ? , ? )";
foreach ( $sample_records as $sample_record ) {
	$msn_db_connection->safe_execute( $sample_query, $sample_record, true );
}

#close database connections.
unset( $msn_db_connection );

require_once 'template_parts/footer_db_sample.php';









