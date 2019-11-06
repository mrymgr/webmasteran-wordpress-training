<?php

/*
 * Define paths and files for updater script
 * */
$main_path                     = '../temp-source/';
$avada_new_version_path        = $main_path . 'avada-new-version-files/';
$avada_new_theme_file          = $avada_new_version_path . 'avada-new.zip';
$avada_new_fusion_builder_file = $avada_new_version_path . 'fusion-builder-new.zip';
$avada_new_fusion_core_file    = $avada_new_version_path . 'fusion-core-new.zip';
$avada_older_version_path      = $main_path . 'avada-older-versions/';
$avada_lang_path               = $main_path . 'avada-lang-bak/';


$has_host_name    = true;
$host_name        = 'jesmoravan.com';
$avada_version    = '5.8.2';
$is_check_updraft = true;


/*
 * Check critical directory or files
 * */
function msn_check_critical_file_exist( $path, $type ) {
	$error_message = '';
	if ( ! file_exists( $path ) ) {
		switch ( $type ) {
			case 'main_path':
				$error_message = 'You must define correct main path';
				break;
			case 'avada_file_path':
				$error_message = 'You must define correct avada file path';
				break;
			case 'avada_theme_file':
				$error_message = 'You must put theme zip file in avada-new-version-filse directory';
				break;
			case 'avada_fusion_builder_file':
				$error_message = 'You must put fusion builder zip file in avada-new-version-filse directory';
				break;
			case 'avada_fusion_core_file':
				$error_message = 'You must put fusion core zip file in avada-new-version-filse directory';
				break;
		}

		echo "<h1>$error_message</h1>";
		die( '<h2>You can not continue!!!</h2>' );
	}

}

function msn_check_directory_exist( $path ) {
	if ( ! file_exists( $path ) ) {
		mkdir( $path, 0755 );
	}
}

function msn_move_all_files( $dir, $new_dir ) {
	// Open a known directory, and proceed to read its contents
	if ( is_dir( $dir ) ) {
		if ( $dh = opendir( $dir ) ) {
			while ( ( $file = readdir( $dh ) ) !== false ) {
				echo '<br>Moving: ' . $file;
				//exclude unwanted
				if ( $file == ".htaccess" ) {
					continue;
				}
				if ( $file == "." ) {
					continue;
				}
				if ( $file == ".." ) {
					continue;
				}
				if ( $file == "index.html" ) {
					continue;
				}
				if ( $file == "web.config" ) {
					continue;
				}

				//if ($file=="index.php") continue; for example if you have index.php in the folder
				if ( rename( $dir . '/' . $file, $new_dir . '/' . $file ) ) {
					echo " Files Copyed Successfully";
					echo ": $new_dir/$file";
					//if files you are moving are images you can print it from
					//new folder to be sure they are there
				} else {
					echo "File Not Copy";
				}
			}
			closedir( $dh );
		}
	}
}

/*
 * Checking critical directory and file before executing script
 * */
msn_check_critical_file_exist( $main_path, 'main_path' );
msn_check_critical_file_exist( $avada_new_version_path, 'avada_file_path' );
msn_check_critical_file_exist( $avada_new_theme_file, 'avada_theme_file' );
msn_check_critical_file_exist( $avada_new_fusion_builder_file, 'avada_fusion_builder_file' );
msn_check_critical_file_exist( $avada_new_fusion_core_file, 'avada_fusion_core_file' );

/*
 * Checking directory or files that we need to continue this script.
 * If they don't exist, we will create theme.
 * */
msn_check_directory_exist( $avada_older_version_path );
msn_check_directory_exist( $avada_lang_path );

/*
 * move updraft files (if it's exist)
 * */
if ( $is_check_updraft ) {
	$updraft_path     = 'wp-content/updraft/';
	$updraft_bak_path = $main_path . 'updraft-bak/';
	msn_check_directory_exist( $updraft_bak_path );
	echo '<h2>back up results for updraft files</h2>';
	msn_move_all_files($updraft_path, $updraft_bak_path);
	echo '<hr>';
}



/*if ( $is_check_updraft ) {
	echo '<h2>Results for moving updraft files to original directory</h2>';
	msn_move_all_files($updraft_bak_path, $updraft_path );
	echo '<hr>';
}*/