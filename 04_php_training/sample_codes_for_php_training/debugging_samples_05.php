<?php
/**
 * Sample of debugging in PHP
 */


#create custom error
function customError( $e ) {
	echo "Error message: {$e->getMessage()} <br>";
	echo "Error Code: {$e->getCode()} <br>";
	echo "Error file: {$e->getFile()} <br>";
	echo "Error line: {$e->getLine()} <br>";
}

set_exception_handler("customError");
$error = "Always error by gholam";
$error_num = E_USER_ERROR;
throw new Exception( $error, $error_num);

//Continue after exception
echo 'Hello gholam';

