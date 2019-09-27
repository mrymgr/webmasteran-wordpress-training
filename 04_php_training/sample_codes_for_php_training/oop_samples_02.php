<?php


class MsnCar {
	//define properties in a class
	public static $car_static_property = "This is for parent class";
	public $name;
	protected $company;
	private $wheel_count = 4;
	private $door_count;

	public function __construct( $name, $door_count, $company ) {
		$this->name       = $name;
		$this->door_count = $door_count;
		$this->company    = $company;
	}

	public static function car_reference() {
		echo self::$car_static_property . '<br>';
		//sample of late static binding
		echo static::$car_static_property . '<br>';
	}

	public function moving() {
		echo "Now I'm moving So fast" . '<br>';
	}

	public function stopping() {
		echo "Now I'm stopping so well" . '<br>';
	}

	public function __toString() {
		return 'The name of car is ' . $this->name . ' and from ' . $this->company . ' with ' . $this->door_count . ' doors!!!<br>';
	}
}

//Inheritance in PHP
final class PrideGhahreman extends MsnCar {
	public static $car_static_property = "This is for child class";
	public $wings_number;

	public function __construct( $name, $door_count, $company ) {
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


// Create a new object
$newobj = new PrideGhahreman( 'pride 6 dar', 6, 'Saipa Ghashang' );
// Define and use new method in child class
echo $newobj->parvaz();
// Use a method from the parent class
$newobj->moving();
// Use a method from the parent classg
$newobj->stopping();
// Define and use new property in child class
$newobj->wings_number = 2;
// Use a method from the parent class and ovverriding parent method in child method
echo $newobj;
echo '<hr>';
MsnCar::car_reference();

