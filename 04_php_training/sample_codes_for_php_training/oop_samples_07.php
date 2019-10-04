<?php

#Sample of multi-inheritance
interface Pride {
	public function setModel( $name );

	public function getModel();
}

interface Vehicle {
	public function setHasWheels( $bool );

	public function getHasWheels();
}

class PrideGhoorbagheyi implements Pride, Vehicle {
	private $model;
	private $hasWheels;

	public function getModel() {
		return $this->model;
	}

	public function setModel( $name ) {
		$this->model = $name;
	}

	public function getHasWheels() {
		return ( $this->hasWheels ) ? "has wheels" : "no wheels";
	}

	public function setHasWheels( $bool ) {
		$this->hasWheels = $bool;
	}
}