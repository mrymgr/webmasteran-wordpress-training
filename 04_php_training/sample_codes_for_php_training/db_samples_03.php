<?php
/**
 * Sample to connect a specific database
 */
$host        = "localhost";
$db_usernam  = "mehdi";
$db_password = "mznx9182";
$db          = "gallery_db";
$charset     = 'utf8mb4';
//DSN: abbreviation of Data Source Name
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES   => false,
];

function msn_get_message( $condition ) {
	echo '<br>';
	echo "Now, $condition condition is executing...";
	echo '<br>';
}

function msn_execute_message( $situation = 'success_insert', $e = null ) {
	switch ( $situation ) {
		case 'success_insert':
			echo "New record was added successfully in your table";
			echo '<br>';
			break;
		case 'failed':
			echo "Your insert failed because of: " . $e->getMessage();
			echo '<br>';
			echo "The error code is: " . $e->getCode();
			echo '<br>';
			die( 'You can not continue!' );
			break;
		case 'success_connect':
			echo "Connected successfully to database";
			echo '<br>';
			echo '<hr>';

	}
}


try {
	$connection = new PDO( $dsn, $db_usernam, $db_password, $options );
	/*
	 * if you do not send options, you can only set attribute by this method in the following
	 * 	$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	 * */
	msn_execute_message( 'success_connect' );
} catch ( PDOException $e ) {
	msn_execute_message( 'failed', $e );
}

$run_condition_1 = false;


if ( $run_condition_1 ) {

	msn_get_message( 'first' );
	# Unnamed placeholders
	$sample_username  = 'ghasemak';
	$sample_password  = 'ghasemak';
	$sample_firstname = 'ghasemak';
	$sample_lastname  = 'ghasemzadeh';
	$sample_query     = "INSERT INTO users (username, password, first_name, last_name) VALUES ( ? , ? , ? , ? )";

	try {
		$stmt = $connection->prepare( $sample_query );
		$stmt->execute( [ $sample_username, $sample_password, $sample_firstname, $sample_lastname ] );
		msn_execute_message();
	} catch ( PDOException $e ) {
		msn_execute_message( 'failed', $e );
	}

}

$run_condition_2 = false;


if ( $run_condition_2 ) {

	msn_get_message( 'second' );

	$sample_user  = [ 'ghasemak1', 'ghasemak1', 'ghasemak1', 'ghasemzadeh' ];
	$sample_query = "INSERT INTO users (username, password, first_name, last_name) VALUES ( ? , ? , ? , ? )";

	try {
		$stmt = $connection->prepare( $sample_query );
		#you can pass with an array
		$stmt->execute( $sample_user );
		msn_execute_message();
	} catch ( PDOException $e ) {
		msn_execute_message( 'failed', $e );
	}

}

#sample class to generate a user
class Msn_Generate_User {
	public $username;
	public $password;
	public $first_name;
	public $last_name;

	public function __construct( $username, $password, $first_name, $last_name ) {
		$this->username   = $username;
		$this->password   = $password;
		$this->first_name = $first_name;
		$this->last_name  = $last_name;
	}
}


$run_condition_3 = false;


if ( $run_condition_3 ) {

	msn_get_message( 'third' );

	$new_user     = new Msn_Generate_User( 'ghasemak2', 'ghasemak2', 'ghasemak2', 'ghasemzadeh' );
	$sample_query = "INSERT INTO users (username, password, first_name, last_name) VALUES ( ? , ? , ? , ? )";

	try {
		$stmt = $connection->prepare( $sample_query );
		#you can convert your object to an array and pass it to execute method
		$stmt->execute( array_values( (array) $new_user ) );

		msn_execute_message();
	} catch ( PDOException $e ) {
		msn_execute_message( 'failed', $e );
	}

}


$run_condition_4 = false;


if ( $run_condition_4 ) {

	msn_get_message( 'forth' );
	# Unnamed placeholders
	$sample_username  = 'ghasemak4';
	$sample_password  = 'ghasemak4';
	$sample_firstname = 'ghasemak4';
	$sample_lastname  = 'ghasemzadeh4';
	$sample_query     = "INSERT INTO users (username, password, first_name, last_name) VALUES ( ? , ? , ? , ? )";

	try {
		#Example with bindParam method
		$stmt = $connection->prepare( $sample_query );
		$stmt->bindParam( 1, $sample_username );
		$stmt->bindParam( 2, $sample_password );
		$stmt->bindParam( 3, $sample_firstname );
		$stmt->bindParam( 4, $sample_lastname );
		$stmt->execute();
		msn_execute_message();
	} catch ( PDOException $e ) {
		msn_execute_message( 'failed', $e );
	}

}


$run_condition_5 = false;


if ( $run_condition_5 ) {

	msn_get_message( 'fifth' );
	#named placeholders
	$sample_username  = 'ghasemak5';
	$sample_password  = 'ghasemak5';
	$sample_firstname = 'ghasemak5';
	$sample_lastname  = 'ghasemzadeh5';
	$sample_query     = "INSERT INTO users (username, password, first_name, last_name) VALUES ( :username , :password , :first_name , :last_name )";

	try {
		#Sample with bindParam
		$stmt = $connection->prepare( $sample_query );
		$stmt->bindParam( ':username', $sample_username );
		$stmt->bindParam( ':password', $sample_password );
		$stmt->bindParam( ':first_name', $sample_firstname );
		$stmt->bindParam( ':last_name', $sample_lastname );
		$stmt->execute();
		msn_execute_message();
	} catch ( PDOException $e ) {
		msn_execute_message( 'failed', $e );
	}

}

$run_condition_6 = false;


if ( $run_condition_6 ) {

	msn_get_message( 'sixth' );
	#named placeholders
	$sample_username  = 'ghasemak6';
	$sample_password  = 'ghasemak6';
	$sample_firstname = 'ghasemak6';
	$sample_lastname  = 'ghasemzadeh6';
	$sample_user      = [
		':username'   => $sample_username,
		':password'   => $sample_password,
		':first_name' => $sample_firstname,
		':last_name'  => $sample_lastname,
	];
	$sample_query     = "INSERT INTO users (username, password, first_name, last_name) VALUES ( :username , :password , :first_name , :last_name )";

	try {
		$stmt = $connection->prepare( $sample_query );
		$stmt->execute( $sample_user );
		msn_execute_message();
	} catch ( PDOException $e ) {
		msn_execute_message( 'failed', $e );
	}

}


$run_condition_7 = false;


if ( $run_condition_7 ) {

	msn_get_message( 'seventh' );

	$msn_users = [
		'ali'     => 'alavi',
		'gholam'  => 'gholami',
		'goolakh' => 'goolakhi',
		'hamed'   => 'hamedi',
	];

	$sample_query = "UPDATE  users SET last_name = ? WHERE username = ?";

	try {
		$stmt = $connection->prepare( $sample_query );
		foreach ( $msn_users as $key => $value ) {
			$stmt->execute( [ $value, $key ] );
		}

		msn_execute_message();
	} catch ( PDOException $e ) {
		msn_execute_message( 'failed', $e );
	}

}





