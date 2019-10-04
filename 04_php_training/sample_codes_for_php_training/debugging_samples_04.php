<?php
/**
 * Sample of debugging in PHP
 */


try {
	$error  = 'Always throw this error';
	$error_num = E_USER_ERROR;
	throw new Exception($error,$error_num);

} catch ( Exception $e ) {
	//var_dump($e);
	echo "Error message: {$e->getMessage()} <br>";
	echo "Error Code: {$e->getCode()} <br>";
	echo "Error file: {$e->getFile()} <br>";
	echo "Error line: {$e->getLine()} <br>";
}

//Continue after exception
echo  'Hello gholam';

