<?php

use Webmasteran\Sample_Classes\Database\Db_Extend;
use Webmasteran\Sample_Classes\Functions\Utility;

require '../../vendor/autoload.php';
$euro         = '';
$dollar       = '';
$request_type = '';
$id           = 0;

#Add header to show menu in this page
require_once 'template_parts/header_db_sample.php';


if ( isset( $_POST ) && ! empty( $_POST ) ) {
	$euro         = Utility::test_input( $_POST['euro'] );
	$dollar       = Utility::test_input( $_POST['dollar'] );
	$request_type = Utility::test_input( $_POST['request-type'] );
	if ( ! is_numeric( $euro ) || ! is_numeric( $dollar ) ) {
		die( '<h2 class="msn-p-10">You can not continue, Return to form and put numeric value to assign your form!</h2>' );
	}
	if ( $request_type == 'update' ) {
		$id = Utility::test_input( $_POST['id'] );
	}
}


#set default timezone for this script based on Tehran time
date_default_timezone_set( "Asia/Tehran" );

#Insert data in database
$msn_db_connection = Db_Extend::get_instance( "localhost", "mehdi", "mznx9182", "msntrainers", true );
$sample_record     = [ $dollar, $euro, date( "Y-m-d H:i:s" ) ];
if ( $request_type == 'insert' ) {
	$sample_query = "INSERT INTO currency (dollar, euro, created_date) VALUES ( ? , ? , ? )";
} else {
	$sample_query = "UPDATE  currency SET dollar = ? , euro = ? , created_date = ? WHERE id = $id";
}

$msn_db_connection->safe_execute( $sample_query, $sample_record, true );

#close database connections.
unset( $msn_db_connection );

require_once 'template_parts/footer_db_sample.php';










