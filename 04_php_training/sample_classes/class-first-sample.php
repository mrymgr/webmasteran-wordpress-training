<?php
namespace Webmasteran\Sample_Classes;

class First_Sample {
	public $name = __FILE__;

	public function say_hello( $name ) {
		echo "<h1>Hello $name !!!</h1>";
	}
}