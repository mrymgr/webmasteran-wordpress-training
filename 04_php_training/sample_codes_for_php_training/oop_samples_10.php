<?php

/*
 * Sample of trait in OOP
 * */

trait Logger {
	function log( $msg ) {
		echo '<pre>';
		echo date( 'Y-m-d h:i:s' ) . ':' . '(' . __CLASS__ . ') ' . $msg . '<br/>';
		echo '</pre>';
	}
}

class BankAccount {
	use Logger;
	private $accountNumber;

	function __construct( $accountNumber ) {
		$this->accountNumber = $accountNumber;
		$this->log( "A new $accountNumber bank account created" );
	}
}

class User {
	use Logger;

	function __construct() {
		$this->log( "A new user created" );
	}
}

$account = new BankAccount( '1234567674' );
echo '<hr>';
$user    = new User();
