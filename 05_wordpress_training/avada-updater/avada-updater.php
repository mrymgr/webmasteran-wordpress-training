<?php


/*
 * Define paths and files for updater script
 * */
$main_path                     = '../temp-source/';
$has_host_name                 = true;
$host_name                     = 'jesmoravan.com';
$main_wordpress_path           = dirname( __FILE__ );
$avada_new_version_path        = $main_path . 'avada-new-version-files/';
$avada_new_theme_file          = $avada_new_version_path . 'avada-new.zip';
$avada_new_fusion_builder_file = $avada_new_version_path . 'fusion-builder-new.zip';
$avada_new_fusion_core_file    = $avada_new_version_path . 'fusion-core-new.zip';
$avada_older_version_path      = $main_path . 'avada-older-versions/';
$avada_lang_path               = $main_path . 'avada-lang-bak/';
$whole_site_backup_path        = $main_path . 'whole-site-backup/';
$backup_zip_file_name          = $host_name . '-backup-' . date( 'Y-m-d' ) . '.zip';
$main_log_file                 = 'update-log-file-' . date( 'Ymd' ) . '.log';

$htaccess_lite_speed_config = <<< HTACCESS
<IfModule Litespeed>
RewriteEngine On
RewriteRule .* - [E=noabort:1]
RewriteRule .* - [E=noconntimeout:1]
</IfModule>
HTACCESS;

/*

<IfModule Litespeed>
RewriteEngine On
RewriteRule .* - [E=noabort:1]
RewriteRule .* - [E=noconntimeout:1]
</IfModule>
*/


$avada_version    = '5.8.2';
$is_check_updraft = true;
$has_backup_zip   = false;

/*
 * Change max_execution_time
 * Change memory_limit
 * Change max_input_time
 * */
function msn_change_ini_settings() {
	//ini_set( 'max_input_vars', '10000' );
	set_time_limit( - 1 );
	var_dump( (int) ini_get( 'max_input_time' ) );
	var_dump( (int) ini_get( 'max_execution_time' ) );
	var_dump( (int) ini_get( 'memory_limit' ) );
	var_dump( (int) ini_get( 'max_input_vars' ) );
}

/*
 * get type of webserver
 * */
function msn_check_server_type() {
	$server_type = $_SERVER['SERVER_SOFTWARE'];

	if ( preg_match( "/apache/i", $server_type ) ) {
		return 'apache';
	} elseif ( preg_match( "/litespeed/i", $server_type ) ) {

		return 'litespeed';
	} else {
		return 'nginx';
	}

}

/*
 * Write on log file
 * */
function msn_write_on_log_file( $string, $file_name ) {

	if ( ! file_exists( $file_name ) ) {
		file_put_contents( $file_name, $string );
	} else {
		$file_content = file_get_contents( $file_name );
		file_put_contents( $file_name, $string, FILE_APPEND | LOCK_EX );
	}
	echo "<p>$string</p>";
	echo '<hr>';
}

/*
 * Add a string in the beginning of a file
 * */
function msn_file_prepend( $string, $filename ) {

	$fileContent = file_get_contents( $filename );
	if ( preg_match( "/E=noabort:1/", $fileContent )
	     && preg_match( "/E=noconntimeout:1/", $fileContent )
	) {
		echo 'yes yes <br>';

		return true;
	}
	$result = file_put_contents( $filename, $string . "\n" . $fileContent );
	if ( $result === false ) {
		return false;
	} else {
		return true;
	}

}


/*
 * Check critical directory or files
 * */
function msn_check_critical_file_exist( $path, $type, $logfile ) {
	$error_message = PHP_EOL . 'Error message created on: ' . date( 'Y-m-d' ) . '.' . PHP_EOL;
	if ( ! file_exists( $path ) ) {
		switch ( $type ) {
			case 'main_path':
				$error_message .= 'You must define correct main path';
				break;
			case 'avada_file_path':
				$error_message .= 'You must define correct avada file path';
				break;
			case 'avada_theme_file':
				$error_message .= 'You must put theme zip file in avada-new-version-filse directory';
				break;
			case 'avada_fusion_builder_file':
				$error_message .= 'You must put fusion builder zip file in avada-new-version-filse directory';
				break;
			case 'avada_fusion_core_file':
				$error_message .= 'You must put fusion core zip file in avada-new-version-filse directory';
				break;
		}

		msn_write_on_log_file( $error_message . PHP_EOL, $logfile );
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

function msn_zip_data_without_permission( $source, $destination, $os = 'linux' ) {
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
							$file         = realpath( $file );
							$relativePath = substr( $file, strlen( $source ) );
							if ( is_dir( $file ) ) {
								$zip->addEmptyDir( str_replace( $source . '/', '', $file . '/' ) );
							} else if ( is_file( $file ) ) {
								$zip->addFromString( str_replace( $source . '/', '', $file ), file_get_contents( $file ) );
							}
						}
					} else if ( is_file( $source ) ) {
						$zip->addFromString( basename( $source ), file_get_contents( $source ) );
					}

					$zip->setExternalAttributesName( $relativePath,
						ZipArchive::OPSYS_UNIX,
						fileperms( $file ) << 16 );
				}

				return $zip->close();
			}

		}

		return false;

	}


}

/*
 * function to zip data with its related permissions in linux os
 * */
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

				$templateArchive = new ZipArchive();
				$templateArchive->open( $destination,
					ZipArchive::CREATE | ZipArchive::OVERWRITE );

				$files = new RecursiveIteratorIterator(
					new RecursiveDirectoryIterator( $source ),
					RecursiveIteratorIterator::LEAVES_ONLY
				);

				foreach ( $files as $name => $file ) {

					// Get real and relative path for current file
					$filePath = $file->getRealPath();

					// relative path is full path, reduced with length of templateDir string and 11 more chars for /templates/
					$relativePath = substr( $filePath, strlen( $source ) );

					// Add regular files
					if ( ! $file->isDir() ) {
						// Add current file to archive
						$templateArchive->addFile( $filePath, $relativePath );
					} elseif ( substr( $relativePath, - 2 ) === "/." ) {
						// Remove the dot representing the current directory
						$relativePath = substr( $relativePath, 0, - 1 );
						// Add current directory to archive
						$templateArchive->addEmptyDir( $relativePath );
					} else {
						continue;
					}

					$templateArchive->setExternalAttributesName( $relativePath,
						ZipArchive::OPSYS_UNIX,
						fileperms( $filePath ) << 16 );
				}

				// Template Zip archive will be created only after closing object
				return $templateArchive->close();

				//return $zip->close();
			}

		}

		return false;

	}
}


/*
 * =======================
 * Starting Point of Script
 * ========================
 * */

/*
 * set ini settings
 * */
msn_change_ini_settings();

/*
 * Check type of webserver and put related code on it
 * */
if ( msn_check_server_type() == 'litespeed' ) {
	$htaccess_file_path         = __DIR__ . '/.htaccess';
	$result_of_htaccess_writing = msn_file_prepend( $htaccess_lite_speed_config, $htaccess_file_path );
	if ( $result_of_htaccess_writing ) {
		$msn_writing_message = PHP_EOL . 'Writing on htaccess file was successful on: ' . date( 'Y-m-d' ) . '.' . PHP_EOL;
	} else {
		$msn_writing_message = PHP_EOL . 'Error when Writing on htaccess file!!! It was at: ' . date( 'Y-m-d' ) . '.' . PHP_EOL;
	}
	msn_write_on_log_file( $msn_writing_message, $main_log_file );
} else {
	$msn_writing_message = PHP_EOL . 'It is not LiteSpeed Server. So nothing write on log file at: ' . date( 'Y-m-d' ) . '.' . PHP_EOL;
	msn_write_on_log_file( $msn_writing_message, $main_log_file );
}


/*
 * Checking critical directory and file before executing script
 * */
msn_check_critical_file_exist( $main_path, 'main_path', $main_log_file );
msn_check_critical_file_exist( $avada_new_version_path, 'avada_file_path', $main_log_file );
msn_check_critical_file_exist( $avada_new_theme_file, 'avada_theme_file', $main_log_file );
msn_check_critical_file_exist( $avada_new_fusion_builder_file, 'avada_fusion_builder_file', $main_log_file );
msn_check_critical_file_exist( $avada_new_fusion_core_file, 'avada_fusion_core_file', $main_log_file );

/*
 * Checking directory or files that we need to continue this script.
 * If they don't exist, we will create theme.
 * */
msn_check_directory_exist( $avada_older_version_path, 'keeping older versions of Avada ' );
msn_check_directory_exist( $avada_lang_path, 'keeping language files of Avada' );
msn_check_directory_exist( $avada_lang_path, 'keeping language files of Avada' );
msn_check_directory_exist( $whole_site_backup_path, 'keeping log files of update process' );


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

/*
 * zip all of file in wp root directory
 * https://stackoverflow.com/questions/36287554/php-ziparchive-file-permissions
 * https://gist.github.com/mikamboo/9205589
 * https://stackoverflow.com/questions/9262622/set-permissions-for-all-files-and-folders-recursively
 * */
if ( $has_backup_zip ) {
	echo 'yes!!!';
} else {
	//$result_of_zipping = msn_zip_data( $main_wordpress_path, $whole_site_backup_path . 'backup.zip', 'windows' );
	$result_of_zipping = msn_zip_data( $main_wordpress_path, $backup_zip_file_name );
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