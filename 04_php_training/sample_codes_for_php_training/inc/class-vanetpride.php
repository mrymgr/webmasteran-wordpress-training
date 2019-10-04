<?php

class VanetPride extends AbstractMsnCar {
	public function distanceOnFullTank() {
		$kilometers = $this->tankCapacity * 100;

		return $kilometers;
	}
}