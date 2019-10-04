<?php

/*
 * Sample of comparison operator with classes
 * */

class Point {
	private $x;
	private $y;

	public function __construct( $x, $y ) {
		$this->x = $x;
		$this->y = $y;
	}

	/**
	 * Compare two points
	 *
	 * @param Point $p1
	 * @param Point $p2
	 *
	 * @return boolean return true if two points are equal, otherwise returns false
	 */
	public static function compare( $p1, $p2 ) {
		return $p1 == $p2;
	}

	public function getX() {
		return $this->x;
	}

	public function setX( $x ) {
		$this->x = $x;
	}

	public function getY() {
		return $this->y;
	}

	public function setY( $y ) {
		$this->y = $y;
	}
}

$p1 = new Point( 10, 20 );
$p2 = new Point( 10, 20 );
if ( Point::compare( $p1, $p2 ) ) {
	echo 'p1 and p2 are equal <br/>';
} else {
	echo 'p1 and p2 are not equal <br/>';
}
