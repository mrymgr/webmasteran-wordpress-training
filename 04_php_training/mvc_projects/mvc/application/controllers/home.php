<?php

namespace Application\Controllers;


class Home extends Controller {

	public function index() {
		$test_array = ['ghanbar' , 'gholam'];
		$this->view('app.test', compact('test_array') );
	}

	public function create() {
		echo "<h1>This is gholam create method!</h1>";
		$test_array = ['ghanbar' , 'gholam'];
		$this->view('app.test', compact('test_array'));
	}
}
