<?php

#autoad handler
include_once 'oop_samples_03.php';

#Sample of abstract method and its usage
$msn_vanet_pride = new VanetPride();
$msn_vanet_pride->setTankCapacity( 30 );

echo "<h2>This vantet pride can move {$msn_vanet_pride->distanceOnFullTank()} Kilometers! Hoora!</h2>";
echo '<br>';
echo '<hr>';

echo  '<h2>These are the samples for Interface</h2>';
#Sample of Interface in PHP
interface Pride {
	public function setModel( $name );

	public function getModel();
}

interface Ghorbaghe {
	public function ghoorGhoor();
}

class PrideGhoorbagheyi implements Pride,Ghorbaghe {
	private $model;

	public function getModel() {
		return $this->model;
	}

	public function setModel( $name ) {
		$this->model = $name;
	}

	public function ghoorGhoor() {
		return 'Pride mige Ghoor Ghoor!';
	}

}

$pride_ghoorghoori = new PrideGhoorbagheyi();
$pride_ghoorghoori->setModel('Khafan Model');


echo "<h3>My pride is {$pride_ghoorghoori->getModel()} and say: {$pride_ghoorghoori->ghoorGhoor()}</h3>";

#sample of multi-inheritance in PHP