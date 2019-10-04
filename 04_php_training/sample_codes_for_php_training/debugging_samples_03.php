<?php
/**
 * Sample of debugging in PHP
 */

function calcDivision( $a, $b ) {
	if ( $b == 0 ) {
		trigger_error( "calcDivision(): Error zero divisor", E_USER_ERROR );

		return false;
	} else {
		return $a / $b;
	}
}


#define custom error handler
function customError( $error_num, $error_string, $error_file, $error_line, $error_context ) {
	date_default_timezone_set('Asia/Tehran');
	$message = date("Y-m-d H:i:s - ");
	$message .= "Error number:[$error_num], Error message: [$error_string]"."\r\n";
	$message .= "This error locates in file name: [$error_file] and line number:[$error_line] "."\r\n";
	$message .="Variables: ". print_r($error_context, true). "\r\n";
	$message .= "=======================================". "\r\n";

	error_log($message,3,"log/app_errors.log");
	die("There was a problem when running the program, please try again");

}


#set error handler
set_error_handler('customError');
echo calcDivision( 20 , 0);