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





