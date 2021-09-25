<?php

namespace Application\Model;

class Article extends Model {

	public function all() {

		$query  = "SELECT * FROM `articles`; ";
		$result = $this->query( $query )->fetchAll();
		$this->closeConnection();

		return $result;
	}

	public function find( $id ) {

		$query  = "SELECT * , (SELECT `name` FROM `categories` WHERE `categories`.`id` = `articles`.`cat_id` ) as `category_name`
							FROM `articles` WHERE id = ? ;";
		$result = $this->query( $query, [ $id ] )->fetch();
		$this->closeConnection();

		return $result;
	}

	public function insert( $values ) {

		$query = "INSERT INTO `articles` (`title`, `cat_id`, `body`, `created_at`)  VALUES 
							(?, ?, ?, now());";
		$this->execute( $query, array_values( $values ) );
		$this->closeConnection();

	}

	public function update( $id, $values ) {

		$query = "UPDATE `articles` SET `title` = ? , `cat_id` = ? , `body` = ? , `created_at` = now() WHERE `id` = ? ;";
		$this->execute( $query, array_merge( array_values( $values ), [ $id ] ) );
		$this->closeConnection();
	}

	public function delete( $id ) {

		$query = "DELETE FROM `articles` WHERE `id` = ?;";
		$this->execute( $query, [ $id ] );
		$this->closeConnection();

	}

	public function category( $id ) {
		$query = "SELECT `name` 
							FROM `categories`
							WHERE `id` = ?";

		$result = $this->query( $query, [ $id ] )->fetch();
		$this->closeConnection();

		return $result;
	}
}
