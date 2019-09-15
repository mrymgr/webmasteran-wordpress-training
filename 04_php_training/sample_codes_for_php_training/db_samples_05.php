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
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
	PDO::ATTR_EMULATE_PREPARES   => false,
	PDO::MYSQL_ATTR_FOUND_ROWS   => true,
];

function msn_get_message( $condition ) {
	echo '<br>';
	echo "Now, $condition condition is executing...";
	echo '<br>';
}

function msn_has_change( $row_count ) {
	if ( $row_count > 0 ) {
		return true;
	}

	return false;
}

function msn_get_class_constant_list( $class_name ) {
	$temp_class = new ReflectionClass( $class_name );
	return array_flip( $temp_class->getConstants() );

}

function msn_execute_message( $situation = 'success_insert', $e = null ) {
	switch ( $situation ) {
		case 'success_insert':
			echo "New record was added successfully in your table";
			echo '<br>';
			break;
		case 'success_update':
			echo "Your desire record was successfully updated in your table";
			echo '<br>';
			break;
		case 'success_delete':
			echo "Your desire record was successfully deleted in your table";
			echo '<br>';
			break;
		case 'failed':
			echo "Your insert failed because of: " . $e->getMessage();
			echo '<br>';
			echo "The error code is: " . $e->getCode();
			echo '<br>';
			die( 'You can not continue!' );
			break;
		case 'failed_update':
			echo "Your record update failed because of: " . $e->getMessage();
			echo '<br>';
			echo "The error code is: " . $e->getCode();
			echo '<br>';
			die( 'You can not continue!' );
			break;
		case 'failed_delete':
			echo "Your record delete failed because of: " . $e->getMessage();
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

/*Sample of INSERT in table*/
if ( $run_condition_1 ) {

	msn_get_message( 'first' );
	# Unnamed placeholders
	$sample_users[]            = [ 'ghasemak1', 'ghasemak1', 'ghasemak1', 'ghasemzadeh' ];
	$sample_users[]            = [ 'ghasemak2', 'ghasemak2', 'ghasemak2', 'ghasemzadeh' ];
	$sample_users[]            = [ 'ghasemak3', 'ghasemak3', 'ghasemak3', 'ghasemzadeh' ];
	$count_of_inserted_records = 0;
	$sample_query              = "INSERT INTO users (username, password, first_name, last_name) VALUES ( ? , ? , ? , ? )";
	try {
		$stmt = $connection->prepare( $sample_query );
		foreach ( $sample_users as $sample_user ) {
			$stmt->execute( $sample_user );
			$count_of_inserted_records ++;
			msn_execute_message();
		}
	} catch ( PDOException $e ) {
		msn_execute_message( 'failed', $e );
	}

	echo "<h2>Number of inserted records: $count_of_inserted_records</h2><br>";


}

$run_condition_2 = false;


if ( $run_condition_2 ) {

	msn_get_message( 'second' );


	$sample_users = [];
	$sample_users = [
		[
			'username'  => 'ghasemak1',
			'password'  => 'ghasemak123',
			'last_name' => 'ghasemzadeh1',
		],
		[
			'username'  => 'ghasemak2',
			'password'  => 'ghasemak234',
			'last_name' => 'ghasemzadeh2',
		],
		[
			'username'  => 'ghasemak3',
			'password'  => 'ghasemak345',
			'last_name' => 'ghasemzadeh3',
		],
	];

	$sample_query           = "UPDATE  users SET password = ? , last_name = ? WHERE username = ?";
	$count_of_updated_users = 0;

	try {
		$stmt = $connection->prepare( $sample_query );
		foreach ( $sample_users as $sample_user ) {
			$stmt->execute( [ $sample_user['password'], $sample_user['last_name'], $sample_user['username'] ] );
			if ( msn_has_change( $stmt->rowCount() ) ) {
				msn_execute_message( 'success_update' );
				$count_of_updated_users += $stmt->rowCount();
			}
		}

	} catch ( PDOException $e ) {
		msn_execute_message( 'failed_update', $e );
	}
	echo "<h2>Number of updated records: $count_of_updated_users</h2><br>";


}


$run_condition_3 = false;


if ( $run_condition_3 ) {

	msn_get_message( 'third' );
	$sample_users = [];
	$sample_users = [ 'ghasemak1', 'ghasemak2', 'ghasemak3' ];

	$sample_query           = "DELETE FROM users WHERE username = ?";
	$count_of_deleted_users = 0;

	try {
		$stmt = $connection->prepare( $sample_query );
		foreach ( $sample_users as $sample_user ) {
			$stmt->execute( [ $sample_user ] );
			if ( msn_has_change( $stmt->rowCount() ) ) {
				msn_execute_message( 'success_delete' );
				$count_of_deleted_users += $stmt->rowCount();
			}

		}

	} catch ( PDOException $e ) {
		msn_execute_message( 'failed_delete', $e );
	}
	echo "<h2>Number of deleted records: $count_of_deleted_users</h2><br>";


}


$run_condition_4 = false;


if ( $run_condition_4 ) {

	msn_get_message( 'forth' );
	$msn_temp_user = [ 'gholamzadegan', 'gholam' ];
	$sample_query  = "UPDATE users SET last_name = ? WHERE username = ?";

	try {
		#Example with bindParam method
		$connection->prepare( $sample_query )->execute( $msn_temp_user );
		msn_execute_message( 'success_update' );
	} catch ( PDOException $e ) {
		msn_execute_message( 'failed_update', $e );
	}

}


$run_condition_5 = false;


if ( $run_condition_5 ) {

	msn_get_message( 'fifth' );
	#named placeholders
	$msn_fetch_modes = [
		PDO::FETCH_NUM, //returns enumerated array
		PDO::FETCH_ASSOC, //returns associative array
		PDO::FETCH_BOTH, //both of the above
		PDO::FETCH_OBJ, //returns object
		PDO::FETCH_LAZY, //allows all three (numeric associative and object) methods without memory overhead
	];
	$sample_query    = "SELECT * FROM users WHERE username = 'gholam'";

	/*get list of constant*/
	$msn_constant_list = msn_get_class_constant_list('PDO');
	//var_dump($msn_constant_list);
	try {
		foreach ( $msn_fetch_modes as $msn_fetch_mode ) {
			$sample_string = '';
			echo "<h2>This is result of fetch a record with $msn_constant_list[$msn_fetch_mode] mode!</h2>";
			var_dump( $connection->query( $sample_query )->fetch( $msn_fetch_mode ) );
		}
	} catch ( PDOException $e ) {
		msn_execute_message( 'failed', $e );
	}

}

/*$run_condition_6 = false;


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

}*/

$connection = null;





