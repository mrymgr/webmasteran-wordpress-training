<?php

abstract class AbstractMsnCar {
	/*Abstract classes can have property*/
	protected $tankCapacity;

	/*Abstract classes can have non abstract method*/
	public function setTankCapacity( $tankCapacity ) {
		$this->tankCapacity = $tankCapacity;
	}

	// Abstract method
	abstract public function distanceOnFullTank();
}