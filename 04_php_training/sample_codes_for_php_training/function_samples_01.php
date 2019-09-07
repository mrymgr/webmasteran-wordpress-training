<?php
declare( strict_types=1 );
setcookie( 'username', 'asghar' );

function msn_sample_function_without_param() {
	echo "<h1>This is sample function without any parameter.</h1>";
}

function msn_check_something( $name ) {
	echo "<h1>Salam $name</h1>";
}

function msn_fan_team_with_echo( $name = 'amghezi', $favorite_team = 'dore kolash germezi' ) {
	echo "<h2>I'm $name and I love $favorite_team</h2><br>";
}

function msn_fan_team_with_return( $name = 'amghezi', $favorite_team = 'dore kolash germezi' ) {
	return "<h2>I'm $name and I love $favorite_team</h2><br>";
}

function msn_is_user_login( $username ) {
	if ( $username == 'mehdi' ) {
		return true;
	} else {
		return false;
	}
}

function msn_multiply( int &$first_number, int &$second_number ): int {
	$first_number  += 20;
	$second_number += 10;

	return $first_number * $second_number;
}


if ( isset( $_COOKIE['username'] ) ) {
	var_dump( $_COOKIE['username'] );
	$msn_username = $_COOKIE['username'];
	if ( msn_is_user_login( $msn_username ) ) {
		msn_sample_function_without_param();
		$msn_name = 'Amghezi';
		msn_check_something( $msn_name );

		msn_fan_team_with_echo( 'Gholam', 'Aftabesazi Manchester' );
		msn_fan_team_with_echo();

		echo msn_fan_team_with_return();
	} else {
		echo "<h1>Your are not login!</h1>";
	}
}

$first_number  = 11;
$second_number = 40;
$msn_result    = msn_multiply( $first_number, $second_number );
echo "<h3>The result of Multiply $first_number to $second_number is $msn_result</h3>";


