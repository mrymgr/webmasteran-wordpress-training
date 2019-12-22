<?php
/**
 * Created by PhpStorm.
 * User: Mehdi
 * Date: 12/14/2019
 * Time: 13:19
 */
var_dump( PHP_OS );
echo '<br>';

// remove scripts on unnecessary pages
function msn_wpjs_de_script() {
	if ( is_admin() ) {
		wp_dequeue_script( 'woo-tracks' );
	}
}

add_action( 'wp_print_scripts', 'msn_wpjs_de_script', 100 );


