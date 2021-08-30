<?php

function checkRegistrationRules($credentials) {
	$result = [];
	$reserved_username = ['admin','quera'];
	foreach ($credentials as $credential ) {

		if ( in_array($credential[0],$reserved_username)) {
			continue;
		}
		if (strlen($credential[0]) < 4 ) {
			continue;
		}
		if (strlen($credential[1]) < 6 or  ctype_digit($credential[1]) ) {
			continue;
		}
		$result[] = $credential[0];
	}
	return $result;

}
