<?php


/*
 * Define paths and files for updater script
 * */
$main_path                     = '../temp-source/';
$main_wordpress_path           = dirname( __FILE__ );
$avada_new_version_path        = $main_path . 'avada-new-version-files/';
$avada_new_theme_file          = $avada_new_version_path . 'avada-new.zip';
$avada_new_fusion_builder_file = $avada_new_version_path . 'fusion-builder-new.zip';
$avada_new_fusion_core_file    = $avada_new_version_path . 'fusion-core-new.zip';
$avada_older_version_path      = $main_path . 'avada-older-versions/';
$avada_lang_path               = $main_path . 'avada-lang-bak/';
$whole_site_backup_path        = $main_path . 'whole-site-backup/';


$has_host_name    = true;
$host_name        = 'jesmoravan.com';
$avada_version    = '5.8.2';
$is_check_updraft = true;
$has_backup_zip   = true;


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

function msn_check_directory_exist( $path, $type ) {
	if ( ! file_exists( $path ) ) {
		mkdir( $path, 0755 );
		echo "<br>The directory for {$type} is created succesfully!";
		echo '<hr>';
	}
}

function msn_move_all_updraft_files( $dir, $new_dir ) {
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

function msn_zip_data( $source, $destination, $os = 'linux' ) {
	if ( $os == 'windows' ) {
		if ( extension_loaded( 'zip' ) ) {
			if ( file_exists( $source ) ) {
				$zip = new ZipArchive();
				if ( $zip->open( $destination, ZIPARCHIVE::CREATE ) ) {
					$source = realpath( $source );
					if ( is_dir( $source ) ) {
						$iterator = new RecursiveDirectoryIterator( $source );
						// skip dot files while iterating
						$iterator->setFlags( RecursiveDirectoryIterator::SKIP_DOTS );
						$files = new RecursiveIteratorIterator( $iterator, RecursiveIteratorIterator::SELF_FIRST );
						foreach ( $files as $file ) {
							$file = realpath( $file );
							if ( is_dir( $file ) ) {
								$zip->addEmptyDir( str_replace( $source . '', '', $file . '' ) );
							} else if ( is_file( $file ) ) {
								$zip->addFromString( str_replace( $source . '', '', $file ), file_get_contents( $file ) );
							}
						}
					} else if ( is_file( $source ) ) {
						$zip->addFromString( basename( $source ), file_get_contents( $source ) );
					}
				}

				return $zip->close();
			}
		}

		return false;
	} else {
		if ( extension_loaded( 'zip' ) ) {
			if ( file_exists( $source ) ) {
				$zip = new ZipArchive();
				if ( $zip->open( $destination, ZIPARCHIVE::CREATE ) ) {
					$source = realpath( $source );
					if ( is_dir( $source ) ) {
						$iterator = new RecursiveDirectoryIterator( $source );
						// skip dot files while iterating
						$iterator->setFlags( RecursiveDirectoryIterator::SKIP_DOTS );
						$files = new RecursiveIteratorIterator( $iterator, RecursiveIteratorIterator::SELF_FIRST );
						foreach ( $files as $file ) {
							$file = realpath( $file );
							if ( is_dir( $file ) ) {
								$zip->addEmptyDir( str_replace( $source . '/', '', $file . '/' ) );
							} else if ( is_file( $file ) ) {
								$zip->addFromString( str_replace( $source . '/', '', $file ), file_get_contents( $file ) );
							}
						}
					} else if ( is_file( $source ) ) {
						$zip->addFromString( basename( $source ), file_get_contents( $source ) );
					}
				}

				return $zip->close();
			}
		}

		return false;

	}


}

function msn_change_ini_settings() {
	ini_set( 'max_execution_time', '3000' );
	ini_set( 'memory_limit', '3000M' );
	ini_set( 'max_input_time', '10000' );
	set_time_limit( - 1 );
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
msn_check_directory_exist( $avada_older_version_path, 'keeping older versions of Avada ' );
msn_check_directory_exist( $avada_lang_path, 'keeping language files of Avada' );
msn_check_directory_exist( $whole_site_backup_path, 'keeping backup files of whole site' );

/*
 * move updraft files (if it's exist)
 * */
/*if ( $is_check_updraft ) {
	$updraft_path     = 'wp-content/updraft/';
	$updraft_bak_path = $main_path . 'updraft-bak/';
	msn_check_directory_exist( $updraft_bak_path, 'keeping extra updraft files ' );
	echo '<h2>back up results for updraft files</h2>';
	msn_move_all_updraft_files( $updraft_path, $updraft_bak_path );
	echo '<hr>';
}*/

/*
 * zip all of data in root directory
 * Some notes about zipping:
 * https://www.litespeedtech.com/support/wiki/doku.php/litespeed_wiki:php:run-without-timeouts
 * https://clients.netorigin.com.au/knowledgebase/156/How-do-I-increase-the-connection-timeout-for-my-website.html
 * https://stackoverflow.com/questions/7739870/increase-max-execution-time-for-php
 *
 *
 * */


if ( $has_backup_zip ) {
	echo 'yes!!!';
} else {
	//$result_of_zipping = msn_zip_data( $main_wordpress_path, $whole_site_backup_path . 'backup.zip', 'windows' );
	$result_of_zipping = msn_zip_data( $main_wordpress_path, $whole_site_backup_path . 'backup.zip' );
	if ( $result_of_zipping === false ) {
		echo 'We can not zip your data!<br>';
		echo '<hr>';
	} else {
		echo 'Zipping your file is successful!<br>';
		echo '<hr>';
	}
}


/*if ( $is_check_updraft ) {

	$updraft_path     = 'wp-content/updraft/';
	$updraft_bak_path = $main_path . 'updraft-bak/';
	echo '<h2>Results for moving updraft files to original directory</h2>';
	msn_move_all_updraft_files( $updraft_bak_path, $updraft_path );
	echo '<hr>';
}*/