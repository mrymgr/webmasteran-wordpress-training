<?php

namespace Webmasteran\Sample_Classes\Database;

class Db_Extend extends \PDO {

	private static $instance;
	private $host = "localhost";
	private $username = "mehdi";
	private $password = "mznx9182";
	private $db = "gallery_db";
	private $options
		= [
			\PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
			\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
			/*\PDO::ATTR_EMULATE_PREPARES   => false*/
		];

	#make a connection

	public function __construct() {

		$dsn = "mysql:host={$this->host};dbname=$this->db;chartset=utf8";
		try {
			parent::__construct( $dsn, $this->username, $this->password, $this->options );
			echo 'Connected successfully';
		} catch ( \PDOException $e ) {
			echo $e->getMessage();
			echo '<br>';
			echo $e->getCode();
			die( 'You can not continue!' );
		}
	}


	public static function getInstance() {
		if ( ! self::$instance ) { // If no instance then make one
			self::$instance = new self();
		}

		return self::$instance;
	}


	public function normal_query( $sql ) {
		$stmt = $this->query( $sql );
		/*$result[] = null;*/
		while ( $row = $stmt->fetch() ) {
			$result[] = $row;
		}

		return $result;
	}

	public function fetch_all( $sql ) {
		$stmt = $this->query( $sql );

		return $stmt->fetchAll();
	}

	public function fetch_one( $sql ) {
		$stmt = $this->query( $sql );

		return $stmt->fetch();
	}

	public function safe_query( $sql, $args = null ) {
		if ( ! $args ) {
			return $this->query( $sql );
		}
		$stmt = $this->prepare( $sql );
		$stmt->execute( $args );

		return $stmt;

	}

	public function fetch_result( $sql, $args = null ) {
		if ( ! $args ) {
			return $this->query( $sql );
		}
		$stmt = $this->prepare( $sql );
		$stmt->execute( $args );
		$version = $stmt->fetchAll();

		return $version;
	}

	#get the number of rows in a result
	public function num_rows( $query ) {
		# create a prepared statement
		$stmt = parent::prepare( $query );

		if ( $stmt ) {
			# execute query
			$stmt->execute();

			return $stmt->rowCount();
		} else {
			return self::get_error();
		}
	}

	#display error
	public function get_error() {
		$this->connection->errorInfo();
	}

	# closes the database connection when object is destroyed.
	public function __destruct() {
		$this->connection = null;
	}
}


