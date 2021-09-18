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

	}

	public function find( $id ) {

	}

	public function insert( $values ) {

	}

	public function update( $id, $values ) {

	}

	public function delete( $id ) {

	}
}
