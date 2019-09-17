<?php

namespace Webmasteran\Sample_Classes\Database;

class Db_Extend extends \PDO {

	private static $instance;
	private $host;
	private $username;
	private $password;
	private $db;
	private $options
		= [
			\PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
			\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
			\PDO::MYSQL_ATTR_FOUND_ROWS   => true,
			/*\PDO::ATTR_EMULATE_PREPARES   => false*/
		];
	private $row_count;

	#make a connection
	public function __construct( $host, $username, $password, $db ) {

		$this->host     = $host;
		$this->username = $username;
		$this->password = $password;
		$this->db       = $db;

		$dsn = "mysql:host={$this->host};dbname=$this->db;chartset=utf8";
		try {
			parent::__construct( $dsn, $this->username, $this->password, $this->options );
			$this->success_message( 'success_connect' );
		} catch ( \PDOException $e ) {
			$this->fail_message( 'failed_connect', $e );
		}
	}

	public function success_message( $situation = 'success_insert' ) {
		$message = '';
		switch ( $situation ) {
			case 'success_insert':
				$message = "New record was added successfully in your table";
				break;
			case 'success_update':
				$message = "Your desire record was successfully updated in your table";
				break;
			case 'success_delete':
				$message = "Your desire record was successfully deleted in your table";
				break;
			case 'success_query':
			case 'success_select':
				$message = "Your query was successfully executed in your table";
				break;
			case 'success_connect':
				$message = "Connected successfully to database";
				break;
		}
		echo $message;
		echo '<br>';
		echo '<hr>';
	}

	public function fail_message( $situation = 'failed_insert', $e = null ) {
		$message = '';
		switch ( $situation ) {
			case 'failed_insert':
				$message = "Your insert failed because of: ";
				break;
			case 'failed_update':
				$message = "Your record update failed because of: ";
				break;
			case 'failed_delete':
				$message = "Your record delete failed because of: ";
				break;
			case 'failed_connect':
				$message = "Your connection to database failed because of: ";
				break;
			case 'failed_query':
			case 'failed_select':
				$message = "Your query to database failed because of: ";
				break;
		}
		echo $message . $e->getMessage();
		echo '<br>';
		echo "The error code is: " . $e->getCode();
		echo '<br>';
		die( 'You can not continue!' );
	}

	public static function get_instance( $host = "localhost", $username = "mehdi", $password = "mznx9182", $db = "gallery_db" ) {
		if ( ! self::$instance ) { // If no instance then make one
			self::$instance = new self( $host, $username, $password, $db );
		}

		return self::$instance;
	}

	/**
	 * @return mixed
	 */
	public function get_row_count() {
		return $this->row_count;
	}

	public function fetch_query( $sql, $mode = null, $show_message = false ) {
		try {
			$stmt = $this->query( $sql );
			if ( $show_message ) {
				$this->success_message( 'success_query' );
			}

			return $stmt->fetch( $mode );
		} catch ( \PDOException $e ) {
			$this->fail_message( 'failed_query', $e );
		}

	}

	public function fetch_all_query( $sql, $mode = null, $show_message = false ) {
		try {
			$stmt = $this->query( $sql );
			if ( $show_message ) {
				$this->success_message( 'success_query' );
			}

			return $stmt->fetchAll( $mode );
		} catch ( \PDOException $e ) {
			$this->fail_message( 'failed_query', $e );
		}
	}

	public function safe_fetch( $sql, $args, $mode = null, $show_message = false ) {
		try {
			$stmt = $this->prepare( $sql );
			$stmt->execute( $args );
			if ( $show_message ) {
				$this->success_message( 'success_query' );
			}

			return $stmt->fetch( $mode );
		} catch ( \PDOException $e ) {
			$this->fail_message( 'failed_query', $e );
		}

	}

	#get the number of rows in a result

	public function safe_fetch_all( $sql, $args, $mode = null, $show_message = false ) {
		try {
			$stmt = $this->prepare( $sql );
			$stmt->execute( $args );
			if ( $show_message ) {
				$this->success_message( 'success_query' );
			}

			return $stmt->fetchAll( $mode );
		} catch ( \PDOException $e ) {
			$this->fail_message( 'failed_query', $e );
		}

	}

	public function safe_execute( $sql, $args, $show_message = false, $show_count = false ) {
		try {
			$crud_name = $this->get_crud_name( $sql );
			$stmt      = $this->prepare( $sql );
			$stmt->execute( $args );
			if ( $this->has_count( $stmt->rowCount() ) ) {
				if ( $show_message ) {
					$this->success_message( 'success_' . $crud_name );
				}
				$this->row_count += $stmt->rowCount();
			} else {
				echo "<b>Sorry, Noting happens in Database with your $crud_name command!!!!</b><br>";
			}


		} catch ( \PDOException $e ) {
			$this->fail_message( 'failed_' . $crud_name, $e );
		}

	}

	public function get_crud_name( $sql ) {
		$cruds = [ 'insert', 'update', 'delete', 'select' ];
		foreach ( $cruds as $crud ) {
			if ( preg_match( "/{$crud}/i", $sql ) ) {
				$result = $crud;
				break;
			} else {
				$result = 'query';
			}
		}

		return $result;

	}

	public function has_count( $row_count ) {
		if ( $row_count > 0 ) {
			return true;
		}

		return false;
	}


	# closes the database connection when object is destroyed.

	public function __destruct() {
		//echo '<h1>Hey Gholam, No I am close!</h1>';
		$this->connection = null;
	}
}


