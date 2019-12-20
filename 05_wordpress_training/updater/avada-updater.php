<?php

namespace Updater;

use Updater\Inc\Core\Avada;
use Updater\Inc\Core\Updraft;
use Updater\Inc\Functions\Files_Backup;
use Updater\Inc\Functions\Utility;
use Updater\Inc\Functions\Path;


require_once 'inc/class-autoloader.php';
/*
 * set time zone
 * */
Utility::set_time_zone( 'Asia/Tehran' );

#put your script directory here:
$script_directory = 'updater';
//$msn_script_directory = 'update.wpwebmaster.ir';
$script_path = dirname( __FILE__ );
#put your main domain name here:
/*
 * Note: for new domain name you must set host_name and host_path in Path class
 * and is_check_updraft in Updraft class
 * */
//$domain_name = 'novinbazsazi';
//$domain_name = 'jesmoravan';
//$domain_name = 'test-academy';
//$msn_domain_name = 'anyl';
//$domain_name = 'aitanrehab';
//$domain_name = 'hekmat';
//$domain_name = 'stargaz';
//$domain_name = 'wpwebmaster';
//$domain_name = 'firstsite.com';
//$domain_name = 'secondsite.com';
$domain_name = 'spec';
/*
 * Define paths and files for updater script
 * */
$main_path = '../temp-source/';
#put last version of avada here:
$avada_last_version = '6.0.3';
#put new version of avada here:
$avada_new_version = '6.1.2';

$path_obj    = new Path( $script_directory, $script_path, $domain_name, $main_path );
$avada_obj   = new Avada( $path_obj->main_path(), $path_obj->host_path(), $avada_last_version, $avada_new_version );
$backup_obj  = new Files_Backup( $path_obj->main_path(), $path_obj->host_name(), $path_obj->host_path() );
$updraft_obj = new Updraft( $path_obj->main_path(), $path_obj->host_path(), $domain_name );



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
