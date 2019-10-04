<?php

/*
 * Sample of DocBlock in a class
 * */

/**
 * A simple class
 *
 * This is the long description for this class,
 * which can span as many lines as needed. It is
 * not required, whereas the short description is
 * necessary.
 *
 * It can also span multiple paragraphs if the
 * description merits that much verbiage.
 *
 * @author    Jason Lengstorf <jason.lengstorf@ennuidesign.com>
 * @copyright 2010 Ennui Design
 * @license   http://www.php.net/license/3_01.txt PHP License 3.01
 */
class SimpleClass {
	/**
	 * A public variable
	 *
	 * @var string stores data for the class
	 */
	public $foo;

	/**
	 * Sets $foo to a new value upon class instantiation
	 *
	 * @param string $val a value required for the class
	 *
	 * @return void
	 */
	public function __construct( $val ) {
		$this->foo = $val;
	}

	/**
	 * Multiplies two integers
	 *
	 * Accepts a pair of integers and returns the
	 * product of the two.
	 *
	 * @param int $bat a number to be multiplied
	 * @param int $baz a number to be multiplied
	 *
	 * @return int the product of the two parameters
	 */
	public function bar( $bat, $baz ) {
		return $bat * $baz;
	}
}