<?php

use Webmasteran\Sample_Classes\Database\Db_Extend;

require '../../vendor/autoload.php';


/*
 * Sample of database connection with a class
 *
 * */
$msndb = Db_Extend::get_instance();

if ( false ) {
	$result = $msndb->fetch_query( 'SELECT * FROM users', PDO::FETCH_ASSOC, true );
	var_dump( $result );
	echo '<hr>';
	echo '<hr>';
}

if ( false ) {
	$result = $msndb->fetch_all_query( 'SELECT id, username FROM users', PDO::FETCH_KEY_PAIR, true );
	var_dump( $result );
	echo '<hr>';
	echo '<hr>';
}

if ( false ) {
	$result = $msndb->fetch_all_query( 'SELECT * FROM users', null, true );
	var_dump( $result );
	echo '<hr>';
	echo '<hr>';
}

if ( false ) {
	$sample_users[]            = [ 'ghasemak1', 'ghasemak1', 'ghasemak1', 'ghasemzadeh' ];
	$sample_users[]            = [ 'ghasemak2', 'ghasemak2', 'ghasemak2', 'ghasemzadeh' ];
	$sample_users[]            = [ 'ghasemak3', 'ghasemak3', 'ghasemak3', 'ghasemzadeh' ];
	$count_of_inserted_records = 0;
	$sample_query              = "INSERT INTO users (username, password, first_name, last_name) VALUES ( ? , ? , ? , ? )";

	foreach ( $sample_users as $sample_user ) {
		$msndb->safe_execute( $sample_query, $sample_user, true );
	}
	echo '<hr>';
	echo '<hr>';
}

if ( false ) {
	$sample_users = [
		[
			'username'  => 'ghasemak1',
			'password'  => 'ghasemak1234',
			'last_name' => 'ghasemzadeh11',
		],
		[
			'username'  => 'ghasemak2',
			'password'  => 'ghasemak2344',
			'last_name' => 'ghasemzadeh22',
		],
		[
			'username'  => 'ghasemak3',
			'password'  => 'ghasemak3454',
			'last_name' => 'ghasemzadeh33',
		],
	];

	$sample_query = "UPDATE  users SET password = ? , last_name = ? WHERE username = ?";
	foreach ( $sample_users as $sample_user ) {
		$msndb->safe_execute( $sample_query, [ $sample_user['password'], $sample_user['last_name'], $sample_user['username'] ], true );
	}

	#to see number of execution (or row count)
	var_dump( $msndb->get_row_count() );
}


if ( false ) {
	$sample_users = [ 'ghasemak1', 'ghasemak2', 'ghasemak3' ];
	$sample_query = "DELETE FROM users WHERE username = ?";

	foreach ( $sample_users as $sample_user ) {
		$msndb->safe_execute( $sample_query, [ $sample_user ], true );
	}
	#to see number of execution (or row count)
	var_dump( $msndb->get_row_count() );
}

/*To close your connection*/
unset( $msndb );










