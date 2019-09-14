<?php
/**
 * Sample to connect a specific database
 */
$host        = "localhost";
$db_usernam  = "mehdi";
$db_password = "mznx9182";
$db          = "msntrainers";
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
			break;
		case 'success_create_table':
			echo "Your table is created successfully.";
			echo '<br>';
			echo '<hr>';
			break;

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
	#Create a table without foreign key
	$create_task_table
		= "CREATE TABLE IF NOT EXISTS tasks (
	    task_id INT AUTO_INCREMENT PRIMARY KEY,
	    title VARCHAR(255) NOT NULL,
	    start_date DATE,
	    due_date DATE,
	    status TINYINT NOT NULL,
	    priority TINYINT NOT NULL,
	    description TEXT,
	    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
	)  ENGINE=INNODB CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;";

	try {
		$stmt = $connection->prepare( $create_task_table );
		$stmt->execute();
		msn_execute_message( 'success_create_table' );
	} catch ( PDOException $e ) {
		msn_execute_message( 'failed', $e );
	}

}

$run_condition_2 = false;


if ( $run_condition_2 ) {

	msn_get_message( 'second' );

	#Create a table with foreign key
	$create_checklist_table =
		"CREATE TABLE IF NOT EXISTS checklists (
		    todo_id INT AUTO_INCREMENT,
		    task_id INT,
		    todo VARCHAR(255) NOT NULL,
		    is_completed BOOLEAN NOT NULL DEFAULT FALSE,
		    PRIMARY KEY (todo_id , task_id),
		    FOREIGN KEY (task_id)
		        REFERENCES tasks (task_id)
		        ON UPDATE RESTRICT ON DELETE CASCADE
		)  ENGINE=INNODB CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;";

	try {
		$stmt = $connection->prepare( $create_checklist_table );
		$stmt->execute();
		msn_execute_message( 'success_create_table' );
	} catch ( PDOException $e ) {
		msn_execute_message( 'failed', $e );
	}

}

