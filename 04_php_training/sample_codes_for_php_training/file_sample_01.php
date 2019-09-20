<?php

function msn_check_file( $file_path ) {
	if ( is_file( $file_path ) && file_exists( $file_path ) && is_readable( $file_path ) ) {
		return true;
	} else {
		return false;
	}
}

$file_path = getcwd() . '/uploads/files/sample-file-021.txt';
var_dump( $file_path );
if ( msn_check_file( $file_path ) ) {
	echo 'This is Ok<br>';
} else {
	echo 'This is not a file or file not exist or readable.<br>';
}
echo '<hr>';


#Create directory recursively:

$file_path             = getcwd() . '/uploads';
$sample_recursive_path = $file_path . '/depth1/depth2/depth3/';
/*
if (!mkdir($sample_recursive_path, 0777, true)) {
    die('Failed to create folders...');
}*/

if ( @mkdir( $file_path . 'depth2' . DIRECTORY_SEPARATOR . 'test1' . DIRECTORY_SEPARATOR . 'test2', 0777, true ) ) {
	echo 'I can create all of directories';
} else {
	echo 'Nashod gholam mehraboooon!';
}
echo '<br>';
echo '<hr>';

$file_path = getcwd() . '/uploads/files/sample-file-01.txt';
$myfile = fopen( $file_path, "r" ) or die( "Unable to open file!" );
echo fread( $myfile, filesize( $file_path ) );
fclose( $myfile );

echo '<br>';
echo '<hr>';

$myfile = fopen( $file_path, "r" ) or die( "Unable to open file!" );
echo fgets( $myfile );
fclose( $myfile );

echo '<br>';
echo '<hr>';

echo file_get_contents( $file_path );

echo '<br>';
echo '<hr>';

$msn_sample_names = [
	'first'  => 'Ali Pourabasi',
	'second' => 'Mahdieh Hosseini',
	'third'  => 'Maryam Grivani',
	'forth'  => 'Ali bazyar',
];

$file_path = getcwd() . '/uploads/files/user-list.txt';
/*$msn_file_handler = fopen($file_path, 'a+');
foreach ( $msn_sample_names as $key => $value ) {
	fwrite($msn_file_handler, "This is $key person whose name is $value".PHP_EOL);
}

fclose($msn_file_handler);*/


/*Using file_put_contents instead of open, read and close*/
/*$msn_sample_names = [
	'fifth'  => 'Mahsa Taraghi',
	'sixth' => 'Shayan Daneshvar',
];

foreach ( $msn_sample_names as $key => $value ) {
	$temp_string = "This is $key person whose name is $value".PHP_EOL;
	file_put_contents($file_path,$temp_string,FILE_APPEND);
}*/


echo '<br>';
echo '<hr>';
#sample of fread
$file_path = getcwd() . '/uploads/files/user-list.txt';
if ( msn_check_file( $file_path ) ) {
	$myfile = fopen( $file_path, "r" ) or die( "Unable to open file!" );
	echo fread( $myfile, filesize( $file_path ) );
	fclose( $myfile );
} else {
	echo '<h2>Can not operate on file due to some problems!</h2>';
}

echo '<br>';
echo '<hr>';


#sample of fgetc
$file_path = getcwd() . '/uploads/files/sample-file-01.txt';
if ( msn_check_file( $file_path ) ) {
	$myfile = fopen( $file_path, "r" ) or die( "Unable to open file!" );
	while ( ! feof( $myfile ) ) {
		echo fgetc( $myfile ) . '-----';
	}
	fclose( $myfile );
} else {
	echo '<h2>Can not operate on file due to some problems!</h2>';
}

echo '<br>';
echo '<hr>';
#sample of fgets
$file_path = getcwd() . '/uploads/files/user-list.txt';
if ( msn_check_file( $file_path ) ) {
	$myfile = fopen( $file_path, "r" ) or die( "Unable to open file!" );
	while ( ! feof( $myfile ) ) {
		echo fgets( $myfile ) . '<br>';
	}
	fclose( $myfile );
} else {
	echo '<h2>Can not operate on file due to some problems!</h2>';
}

echo '<br>';
echo '<hr>';

$file_path = getcwd() . '/uploads/files/product.csv';
if ( msn_check_file( $file_path ) ) {
	$myfile = fopen( $file_path, "r" ) or die( "Unable to open file!" );
	while ( ! feof( $myfile ) ) {
		 var_dump(fgetcsv( $myfile ) );
	}
	fclose( $myfile );
} else {
	echo '<h2>Can not operate on file due to some problems!</h2>';
}

echo '<br>';
echo '<hr>';







