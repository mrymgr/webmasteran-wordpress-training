<?php
/**
 * Sample to connect a specific database
 */
$host = "localhost";
$db_usernam   = "mehdi";
$db_password   = "mznx9182";
$db     = "gallery_db";
$charset = 'utf8mb4';
//DSN: abbreviation of Data Source Name
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
	$connection = new PDO( $dsn, $db_usernam, $db_password, $options );
	/*
	 * if you do not send options, you can only set attribute by this method in the following
	 * 	$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	 * */
	echo "Connected successfully";
	echo '<br>';
} catch ( PDOException $e ) {
	echo "Connection failed: " . $e->getMessage();
	echo '<br>';
	echo "The error code is: " . $e->getCode();
	echo '<br>';
	die( 'You can not continue!' );
}


# no placeholders - ripe for SQL Injection!
$sample_username = 'ghasemak';
$sample_password = 'ghasemak';
$sample_firstname = 'ghasemak';
$sample_lastname = 'ghasemzadeh';
$sample_query = "INSERT INTO users (username, password, first_name, last_name) VALUES ('$sample_username', '$sample_password', '$sample_firstname', '$sample_lastname')";

try {
	$connection->query($sample_query);
	/*
	 * if you do not send options, you can only set attribute by this method in the following
	 * 	$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	 * */
	echo "New record was added successfully in your table";
	echo '<br>';
} catch ( PDOException $e ) {
	echo "Your insert failed because of: " . $e->getMessage();
	echo '<br>';
	echo "The error code is: " . $e->getCode();
	echo '<br>';
	die( 'You can not continue!' );
}

