<?php

class MsnCar {
	//define properties in a class
	const WHEEL = 3;
	public static $car_static_property = "This is for parent class";
	public $name;
	protected $company;
	private $wheel_count = 4;
	private $door_count;
	private $color;

	/**
	 * MsnCar constructor.
	 *
	 * @param     $name
	 * @param int $wheel_count
	 */
	public function __construct( $name = "pride", $wheel_count = 18 ) {
		$this->name        = $name;
		$this->wheel_count = $wheel_count;
	}

	public static function car_reference() {
		echo self::$car_static_property . '<br>';
		//sample of late static binding
		echo static::$car_static_property . '<br>';
	}

	/**
	 * @return mixed
	 */
	public function getColor() {
		return $this->color;
	}


	//Sample of setter and getters

	/**
	 * @param mixed $color
	 */
	public function setColor( $color ) {
		$this->color = $color;
	}

	/**
	 * @return mixed
	 */
	public function getCompany() {
		return $this->company;
	}

	/**
	 * @param mixed $company
	 */
	public function setCompany( $company ) {
		$this->company = $company;
	}

	/**
	 * @return int
	 */
	public function getWheelCount() {
		//Sample of property referencing in a class
		return $this->wheel_count;
	}

	/**
	 * @param int $wheel_count
	 */
	public function setWheelCount( $wheel_count ) {
		$this->wheel_count = $wheel_count;
	}

	/**
	 * @return mixed
	 */
	public function getDoorCount() {
		return $this->door_count;
	}

	//create a method in a class

	/**
	 * @param mixed $door_count
	 */
	public function setDoorCount( $door_count ) {
		$this->door_count = $door_count;
	}

	function moving() {
		echo "Now I'm moving So fast" . '<br>';
	}

	//using properties object inside a class method

	function stopping() {
		echo "Now I'm stopping so well" . '<br>';
	}

	public function __destruct() {
		echo 'It is called before destroying an object from MsnCar class';
	}

	//Sample of static method to referencing parent class

	function car_details() {
		echo $this->name . ' has ' . $this->wheel_count . ' wheels and ' . $this->door_count . ' doors';
	}
}

//Instantiating of a class
$bmw  = new MsnCar();
$benz = new MsnCar( 'Benz 280s', 4 );
//$myPride = new Pride();
//Invoke property of an object
echo $bmw->getWheelCount() . "<br>";
//change or assign new value to object properties
$bmw->setDoorCount( 2 );
$benz->setWheelCount( 6 );
echo $bmw->getDoorCount() . "<br>";
echo $benz->getWheelCount() . "<br>";
echo MsnCar::$car_static_property . "<br>";
$bmw->name
	= 'BMW 325';
echo 'The name of this car is: ' . $bmw->name;
echo '<br>';
//echo $bmw->wheelcount;
$bmw->setColor( 'blue' );
echo 'The color of ' . $bmw->name . ' is: ' . $bmw->getColor();
$pride
	= new MsnCar();
var_dump( $pride );
/*unset($pride);
var_dump( $pride );*/


