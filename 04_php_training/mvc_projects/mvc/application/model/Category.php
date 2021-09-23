<?php

namespace Application\Model;

class Category extends Model {

	public function all() {

		$query  = "SELECT * FROM `categories`; ";
		$result = $this->query( $query )->fetchAll();
		$this->closeConnection();

		return $result;
	}

	public function articles( $cat_id ) {

		$query  = "SELECT * FROM `articles` WHERE c_id = ?";
		$result = $this->query( $query, [ $cat_id ] )->fetch();

		return $result;
	}

	public function find( $id ) {

		$query  = "SELECT * FROM `categories` WHERE id = ? ;";
		$result = $this->query( $query, [ $id ] )->fetch();
		$this->closeConnection();

		return $result;
	}

	public function insert( $values ) {

		$query = "INSERT INTO `categories` (`name`, `description`, `updated_at`)  VALUES 
							(?, ?, now());";
		$this->execute( $query, array_values( $values ) );
		$this->closeConnection();
	}

	public function update( $id, $values ) {

		$query = "UPDATE `categories` SET `name` = ? , `description` = ?, `updated_at` = now() WHERE `id` = ? ;";
		$this->execute( $query, array_merge( array_values( $values ), [ $id ] ) );
		$this->closeConnection();
	}

	public function delete( $id ) {

		$query = "DELETE FROM `categories` WHERE `id` = ?;";
		$this->execute( $query, [ $id ] );
		$this->closeConnection();

	}
}
