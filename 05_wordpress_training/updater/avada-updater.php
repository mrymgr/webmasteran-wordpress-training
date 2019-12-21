<?php

namespace Updater;

use Updater\Inc\Core\Avada;
use Updater\Inc\Core\Updraft;
use Updater\Inc\Functions\Files_Backup;
use Updater\Inc\Functions\Utility;
use Updater\Inc\Functions\Path;
use Updater\Inc\Config\Primary_Setting;


require_once 'inc/class-autoloader.php';
/*
 * set time zone
 * */
Utility::set_time_zone( 'Asia/Tehran' );

$script_path = dirname( __FILE__ );
$primary_setting_obj = new Primary_Setting($script_path);
/*
 * sample of dependency injection
 * */
$path_obj    = new Path( $primary_setting_obj);
$avada_obj   = new Avada( $path_obj->main_path(), $path_obj->host_path(), $primary_setting_obj->avada_last_version(), $primary_setting_obj->avada_new_version() );
$backup_obj  = new Files_Backup( $path_obj->main_path(), $path_obj->host_name(), $path_obj->host_path() );
$updraft_obj = new Updraft( $path_obj->main_path(), $path_obj->host_path(), $primary_setting_obj->domain_name() );


/*
//$is_check_updraft = true;
#Important Note: you must define correct zip file name if this option is true
#put state of checking zip backup file here:
$has_backup_zip = false;
#put count of update site here:
$update_site_count = 2;

var_dump( $path_obj );
var_dump( $avada_obj );
var_dump($backup_obj);
var_dump($updraft_obj);

$htaccess_lite_speed_config
	= <<< HTACCESS
<IfModule Litespeed>
RewriteEngine On
RewriteRule .* - [E=noabort:1]
RewriteRule .* - [E=noconntimeout:1]
</IfModule>
HTACCESS;*/
