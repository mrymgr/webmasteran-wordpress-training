<?php


//Inheritance in PHP
final class PrideGhahreman extends MsnCar {
	public static $car_static_property = "This is for child class";
	public $wings_number;

	public function __construct( $name = 'Prido shasi kootah', $door_count = 3, $company  = 'Saipa Ghashang') {
		parent::__construct( $name, $door_count, $company ); // Call the parent class's constructor
		echo "A new constructor in " . __CLASS__ . ".<br />";
	}

	public function parvaz() {
		echo "You can fly with " . __CLASS__ . ".<br />";
	}

	public function moving() {
		echo '<hr>';
		parent::moving();
		echo 'This is moving method in child and the class name is: ' . __CLASS__ . '<br>';

	}


	public function __toString() {
		$temp = parent::__toString();

		return $temp . ' This Pride has ' . $this->wings_number . ' wings';
	}
}




