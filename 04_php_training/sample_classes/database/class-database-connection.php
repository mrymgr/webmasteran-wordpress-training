<?php

namespace Webmasteran\Sample_Classes\Database;

class Database_Connection {
	public $connection;
	private $server_name = "localhost";
	private $username = "mehdi";
	private $password = "mznx9182";
	private $db_name = "sampledb";

	/**
	 * Database_Connection constructor.
	 *
	 */
	public function __construct() {
		$this->open_db_connection();

	}


	public function open_db_connection() {
		try {
			$this->connection = new \PDO( "mysql:host={$this->server_name};db_name=$this->db_name;chartset=utf8", $this->username, $this->password );
			// set the PDO error mode to exception
			$this->connection->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
			echo "Connected successfully";
		} catch ( \PDOException $e ) {
			echo "Connection failed: " . $e->getMessage();
		}
	}

	public function close_db_connection(  ) {
		$this->connection = null;

	}
}