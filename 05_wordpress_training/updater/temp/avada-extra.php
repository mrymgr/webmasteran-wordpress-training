<?php
#put your script directory here:
//$msn_script_directory = 'updater';
$msn_script_directory = 'update.wpwebmaster.ir';
$msn_script_path      = dirname( __FILE__ );
$msn_main_start_path  = str_replace( $msn_script_directory, '', $msn_script_path );
/*
 * For linux OS
 * */
$msn_main_start_path = str_replace( '//', '', $msn_main_start_path );
/*
 * For Windows OS
 * */
$msn_main_start_path = str_replace( '\/', '', $msn_main_start_path );

#put your main domain name here:
//$msn_domain_name = 'novinbazsazi';
//$msn_domain_name = 'jesmoravan';
//$msn_domain_name = 'test-academy';
//$msn_domain_name = 'anyl';
//$msn_domain_name = 'aitanrehab';
//$msn_domain_name = 'hekmat';
//$msn_domain_name = 'stargaz';
$msn_domain_name = 'wpwebmaster';
//$msn_domain_name = 'firstsite.com';
//$msn_domain_name = 'secondsite.com';
//$msn_domain_name = 'spec';
switch ( $msn_domain_name ) {
	case 'anyl':
		$host_name        = 'anyl';
		$host_path        = 'anyl.wpwebmaster.ir/';
		$is_check_updraft = true;
		break;
	case 'aitanrehab':
		$host_name        = 'aitan';
		$host_path        = 'aitanrehab/';
		$is_check_updraft = false;
		break;
	case 'hekmat':
		$host_name        = 'hekmat';
		$host_path        = 'hco.wpwebmaster.ir/';
		$is_check_updraft = false;
		break;
	case 'novinbazsazi':
		$host_name        = 'novinbazsazi';
		$host_path        = 'novinbazsazi.com/';
		$is_check_updraft = true;
		break;
	case 'test-academy':
		$host_name        = 'test-academy';
		$host_path        = 'academy.wpwebmaster.ir/';
		$is_check_updraft = false;
		break;
	case 'stargaz':
		$host_name        = 'stargaz';
		$host_path        = 'stargazetrading.com/';
		$is_check_updraft = true;
		break;
	case 'jesmoravan':
		$host_name        = 'jesmoravan';
		$host_path        = 'jesmoravan.com/';
		$is_check_updraft = true;
		break;
	case 'wpwebmaster':
		$host_name        = 'wpwebmaster';
		$host_path        = 'public_html/';
		$is_check_updraft = true;
		break;
	case 'firstsite.com':
		$host_name        = 'firstsite';
		$host_path        = 'firstsite.com/';
		$is_check_updraft = true;
		break;
	case 'secondsite.com':
		$host_name        = 'secondsite';
		$host_path        = 'secondsite.com/';
		$is_check_updraft = true;
		break;
	case 'spec':
		$host_name        = 'spec';
		$host_path        = 'spec/';
		$is_check_updraft = true;
		break;
	case 'webmaster':
		$host_name        = 'webmaster';
		$host_path        = 'webmaster/';
		$is_check_updraft = false;
		break;
}

/*
 * =======================
 * clean version
 * =======================
 *
 * */

#put your script directory here:
$msn_script_directory = 'updater';
$msn_script_path      = dirname( __FILE__ );
$msn_main_start_path  = str_replace( $msn_script_directory, '', $msn_script_path );
/*
 * For linux OS
 * */
$msn_main_start_path = str_replace( '//', '', $msn_main_start_path );
/*
 * For Windows OS
 * */
$msn_main_start_path = str_replace( '\/', '', $msn_main_start_path );

#put your main domain name here:
$msn_domain_name = 'firstsite.com';
$msn_domain_name = 'secondsite.com';
$msn_domain_name = 'spec';
$msn_domain_name = 'webmaster';
switch ( $msn_domain_name ) {
	case 'firstsite.com':
		$host_name        = 'firstsite';
		$host_path        = 'firstsite.com/';
		$is_check_updraft = true;
		break;
	case 'secondsite.com':
		$host_name        = 'secondsite';
		$host_path        = 'secondsite.com/';
		$is_check_updraft = true;
		break;
	case 'spec':
		$host_name        = 'spec';
		$host_path        = 'spec/';
		$is_check_updraft = true;
		break;
	case 'webmaster':
		$host_name        = 'webmaster';
		$host_path        = 'webmaster/';
		$is_check_updraft = false;
		break;
}
