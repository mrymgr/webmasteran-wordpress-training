<?php

/*
 * The old values for plugin boilerplate
 * */

$old_path                   = 'plugin-name/';
$old_plugin_name            = 'OOP Plugin Boilerplate - Light Version';

$old_plugin_description     = 'Description for OOP Plugin';
$old_namespace              = 'Plugin_Name_Name_Space';
$old_link                   = 'https://github.com/msn60/oop-wordpress-pluging-boilerplate-light-version';
$old_author                 = 'Put your name here';
$old_author_uri             = 'https://example.com';
$old_author_name_email      = 'Your_Name <youremail@nomail.com>';
$old_main_plugin_name       = 'Plugin_Name_Plugin';
$old_plugin_name_version    = 'PLUGIN_NAME_VERSION';
$old_plugin_name_db_version = 'PLUGIN_NAME_DB_VERSION';


/*
 * New values for our new plugin
 * */

$new_path                   = 'msn-customizer/';
$new_plugin_directory       = 'msn-customizer';
$new_file_name              = 'msn-customizer';
$new_plugin_name            = 'Msn Customizer';
$new_constant_plugin_prefix = 'MSN_CUSTOMIZER_';

$new_plugin_description     = 'New description for Msn Customizer';
$new_namespace              = 'Msn_Customizer';
$new_link                   = 'https://github.com/links';
$new_author                 = 'Mehdi Soltani';
$new_author_uri             = 'https://wpwebmaster.ir';
$new_author_name_email      = 'Mehdi Soltani <soltani.n.mehdi@gmail.com>';
$new_main_plugin_name       = 'Msn_Customizer_Plugin';
$new_plugin_name_version    = $new_constant_plugin_prefix.'VERSION';
$new_plugin_name_db_version = $new_constant_plugin_prefix.'DB_VERSION';

/*
 * create new directory structure for new plugin
 * */
if ( ! file_exists( $new_path ) ) {
	mkdir( $new_plugin_directory, 0755 );
}

/*
 * Change main plugin file
 * */
$str              = file_get_contents( $old_path . 'plugin-name.php' );
$str              = str_replace( "$old_plugin_name", "$new_plugin_name", $str );
$str              = str_replace( "$old_plugin_description", "$new_plugin_description", $str );
$str              = str_replace( "$old_namespace", "$new_namespace", $str );
$str              = str_replace( "$old_link", "$new_link", $str );
$str              = str_replace( "$old_author", "$new_author", $str );
$str              = str_replace( "$old_author_uri", "$new_author_uri", $str );
$str              = str_replace( "$old_author_name_email", "$new_author_name_email", $str );
$str              = str_replace( "$old_main_plugin_name", "$new_main_plugin_name", $str );
$str              = str_replace( "$old_plugin_name_version", "$new_plugin_name_version", $str );
$str              = str_replace( "$old_plugin_name_db_version", "$new_plugin_name_db_version", $str );
$modifying_result = file_put_contents( $new_path . $new_file_name . '.php', $str );
if ( $modifying_result !== false ) {
	echo 'every things is ok!!!';
} else {
	echo 'we have some problems!';
}

