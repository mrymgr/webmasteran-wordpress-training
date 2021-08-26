<?php

function getExtension($file_path) {
	$temp_array = explode('.',$file_path);
	$temp_array_count = count($temp_array);
	if ( 1 === $temp_array_count ) {
		return '';
	} else {
		return $temp_array[$temp_array_count - 1];
	}

}

