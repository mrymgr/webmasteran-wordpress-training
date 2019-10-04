<?php

#autoad handler
include_once 'oop_samples_03.php';

#sample of multi-inheritance in PHP
interface a {
	public function foo();
}

interface b extends a {
	public function baz( int $baz );
}

// This will work
class c implements b {
	public function foo() {
	}

	public function baz( int $baz ) {
	}
}

// This will not work and result in a fatal error
class d implements b {
	public function foo() {
	}

	public function baz( string $foo ) {
	}
}


