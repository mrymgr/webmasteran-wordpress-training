<?php
/**
 * Sample to connect a specific database
 */
$servername = "localhost";
$username   = "mehdi";
$password   = "mznx9182";
$dbname     = "sampledb";

try {
	$connection = new PDO( "mysql:host=$servername;dbname=$dbname;chartset=utf8", $username, $password );
	// set the PDO error mode to exception
	$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	echo "Connected successfully";
} catch ( PDOException $e ) {
	echo "Connection failed: " . $e->getMessage();
}

$connection = null;