<?php

namespace Updater;

use Updater\Inc\Core\Avada;
use Updater\Inc\Core\Updraft;
use Updater\Inc\Functions\Files_Backup;
use Updater\Inc\Functions\Utility;
use Updater\Inc\Functions\Path;
use Updater\Inc\Functions\Files_Process;
use Updater\Inc\Config\Primary_Setting;
use Updater\Inc\Config\Avada_Setting;


require_once 'inc/class-autoloader.php';
/*
 * set time zone
 * */
Utility::set_time_zone( 'Asia/Tehran' );

$script_path         = dirname( __FILE__ );
$primary_setting_obj = new Avada_Setting( $script_path );
/*
 * sample of dependency injection
 * */
$path_obj          = new Path( $primary_setting_obj );
$avada_obj         = new Avada( $path_obj->main_path(), $path_obj->host_path(), $primary_setting_obj->avada_last_version(),
	$primary_setting_obj->avada_new_version() );
$backup_obj        = new Files_Backup( $path_obj->main_path(), $path_obj->host_name(), $path_obj->host_path() );
$updraft_obj       = new Updraft( $path_obj->main_path(), $path_obj->host_path(), $primary_setting_obj->domain_name() );
$files_process_obj = new Files_Process();
var_dump( $primary_setting_obj );
var_dump( $path_obj );
var_dump( $avada_obj );
var_dump( $backup_obj );
var_dump( $updraft_obj );

/*

*/

/*
 * =======================
 * Starting Point of Script
 * ========================
 * */

/*
 * =================
 * set ini settings
 * =================
 * */
Utility::change_ini_settings();
$htaccess_lite_speed_config
	= <<< HTACCESS
<IfModule Litespeed>
RewriteEngine On
RewriteRule .* - [E=noabort:1]
RewriteRule .* - [E=noconntimeout:1]
</IfModule>
HTACCESS;

/*
 * ==================================================
 * Check type of webserver and put related code on it
 * ==================================================
 * */
if ( Utility::check_server_type() == 'litespeed' ) {
	$msn_writing_message = $files_process_obj->check_prepend_htaccess_for_litespeed( $htaccess_lite_speed_config, $path_obj->htaccess_file_path() );
	$files_process_obj->append( $msn_writing_message, $path_obj->main_log_file() );
} else {
	$msn_writing_message = 'It is not LiteSpeed Server. So nothing write on htaccess file. Date is : ' . date( 'Y-m-d  H:i:s' ) . '.';
}
$files_process_obj->append( $msn_writing_message, $path_obj->main_log_file() );
$files_process_obj->append_section_separator( $path_obj->main_log_file() );


