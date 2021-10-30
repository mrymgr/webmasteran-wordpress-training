<?php

namespace App\Http\Controllers;

class HomeController extends Controller {

	public function index() {
		echo "index method in home controller";
	}

	public function create() {
		echo "create method in home controller";
	}

	public function store() {
		echo "store method in home controller";
	}

	public function edit( $id ) {
		echo "edit method in home controller";
	}

	public function update( $id ) {
		echo "update method in home controller";
	}

	public function destroy( $id ) {
		echo "destroy method in home controller";
	}

}