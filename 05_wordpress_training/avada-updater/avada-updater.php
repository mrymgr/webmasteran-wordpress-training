<?php

#set time zone
date_default_timezone_set( 'Asia/Tehran' );

/*
 * Define paths and files for updater script
 * */
$main_path                         = '../temp-source/';
$has_host_name                     = true;
$host_name                         = 'jesmoravan.com';
$main_wordpress_path               = dirname( __FILE__ );
$avada_new_files_temp_path         = $main_path . '01-temp-new-version-files/';
$avada_new_theme_file              = $avada_new_files_temp_path . 'avada-new.zip';
$avada_new_fusion_builder_file     = $avada_new_files_temp_path . 'fusion-builder-new.zip';
$avada_new_fusion_core_file        = $avada_new_files_temp_path . 'fusion-core-new.zip';
$avada_older_version_path          = $main_path . '02-avada-older-versions/';
$avada_new_version_path            = $main_path . '03-avada-new-version-files/';
$avada_lang_path                   = $main_path . '04-avada-lang-bak/';
$whole_site_backup_path            = $main_path . '05-whole-site-backup/';
$current_avada_theme_path          = 'wp-content/themes/Avada/';
$current_avada_fusion_builder_path = 'wp-content/plugins/fusion-builder/';
$current_avada_fusion_core_path    = 'wp-content/plugins/fusion-core/';
$log_files_path                    = $main_path . '06-log-files/';
$backup_zip_file_name              = $host_name . '-backup-' . date( 'Y-m-d' ) . '.zip';
$backup_zip_file_path              = './' . $backup_zip_file_name;
$main_log_file                     = 'update-log-file-' . date( 'Ymd' ) . '.log';

$htaccess_lite_speed_config
	= <<< HTACCESS
<IfModule Litespeed>
RewriteEngine On
RewriteRule .* - [E=noabort:1]
RewriteRule .* - [E=noconntimeout:1]
</IfModule>
HTACCESS;

$avada_last_version          = '6.0.0';
$avada_current_version       = '6.1.2';
$is_check_updraft            = false;
$updraft_path                = 'wp-content/updraft/';
$updraft_bak_path            = $main_path . '07-updraft-bak/';
$has_backup_zip              = false;
$is_need_to_copy_avada_files = true;

/*
 * Change max_execution_time
 * Change memory_limit
 * Change max_input_time
 * */
function msn_change_ini_settings() {
	//ini_set( 'max_input_vars', '10000' );
	set_time_limit( - 1 );
	/*var_dump( (int) ini_get( 'max_input_time' ) );
	var_dump( (int) ini_get( 'max_execution_time' ) );
	var_dump( (int) ini_get( 'memory_limit' ) );
	var_dump( (int) ini_get( 'max_input_vars' ) );*/
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
function msn_write_on_log_file( $string, $file_name, $show_on_screen = true ) {

	$string = $string . PHP_EOL;
	if ( file_exists( $file_name ) ) {
		$file_content = file_get_contents( $file_name );
		file_put_contents( $file_name, $string, FILE_APPEND | LOCK_EX );

	} else {
		file_put_contents( $file_name, $string );
	}
	if ( $show_on_screen ) {
		$string = str_replace( '*', '', $string );
		echo "<p style='font-size: 20px;font-weight: bold;'>$string</p>";
		echo '<hr>';
	}
}

function msn_section_separator() {
	return PHP_EOL . '****************************' . PHP_EOL;
}

/*
 * Add a string in the beginning of a file
 * */
function msn_file_prepend( $string, $filename ) {

	$fileContent = file_get_contents( $filename );
	if ( preg_match( "/E=noabort:1/", $fileContent )
	     && preg_match( "/E=noconntimeout:1/", $fileContent )
	) {

		return 'already is written';
	}
	$result = file_put_contents( $filename, $string . "\n" . $fileContent );
	if ( $result === false ) {
		return false;
	} else {
		return 'succesfully is wrote';
	}

}


/*
 * Check critical directory or files
 * */
function msn_check_critical_file_exist( $path, $type, $logfile ) {
	$error_message = 'Error message created on: ' . date( 'Y-m-d  H:i:s' ) . '.' . PHP_EOL;
	if ( ! file_exists( $path ) ) {
		switch ( $type ) {
			case 'main_path':
				$error_message .= 'You must define correct main path!';
				break;
			case 'avada_file_path':
				$error_message .= 'You must define correct avada file path!';
				break;
			case 'avada_theme_file':
				$error_message .= 'You must put theme zip file in 01-temp-new-version-files directory!';
				break;
			case 'avada_fusion_builder_file':
				$error_message .= 'You must put fusion builder zip file in 01-temp-new-version-files directory!';
				break;
			case 'avada_fusion_core_file':
				$error_message .= 'You must put fusion core zip file in 01-temp-new-version-files directory!';
				break;
		}

		msn_write_on_log_file( $error_message, $logfile );
		msn_write_on_log_file( msn_section_separator(), $logfile );
		//echo "<h1>$error_message</h1>";
		die( '<h2>You can not continue!!!</h2>' );
	}

}

/*
 * check directory exists and if not, it will create
 * */
function msn_check_directory_exist( $path, $type, $logfile ) {
	if ( ! file_exists( $path ) ) {
		mkdir( $path, 0755 );
		$message = "The directory for {$type} is created succesfully at: " . date( 'Y-m-d H:i:s' ) . '.';
		msn_write_on_log_file( $message, $logfile );
	}
}

/*
 * Check is directory empty or not
 * */
function msn_is_dir_empty( $dir_name ) {
	if ( ! is_dir( $dir_name ) ) {
		return false;
	}
	foreach ( scandir( $dir_name ) as $file ) {
		if ( ! in_array( $file, array( '.', '..', '.svn', '.git' ) ) ) {
			return false;
		}
	}

	return true;
}

/*
 * Move all files in a directory
 * */
function msn_move_all_files( $dir, $new_dir, $logfile = null, $unwanted_files = [] ) {
	// Open a known directory, and proceed to read its contents
	if ( is_dir( $dir ) ) {
		if ( $dh = opendir( $dir ) ) {
			while ( ( $file = readdir( $dh ) ) !== false ) {
				//exclude unwanted
				if ( $file == "." ) {
					continue;
				}
				if ( $file == ".." ) {
					continue;
				}
				if ( ! empty( $unwanted_files ) ) {
					foreach ( $unwanted_files as $unwanted_file ) {
						if ( $file == $unwanted_file ) {
							continue 2;
						}
					}
				}

				//if ($file=="index.php") continue; for example if you have index.php in the folder
				if ( rename( $dir . '/' . $file, $new_dir . '/' . $file ) ) {
					$message = "{$file} is copied in {$new_dir} successfully at: " . date( 'Y-m-d H:i:s' ) . '.';
					msn_write_on_log_file( $message, $logfile );
					//if files you are moving are images you can print it from
					//new folder to be sure they are there
				} else {
					$message = "{$file} was successfully copied in {$new_dir}  at: " . date( 'Y-m-d H:i:s' ) . '.';
					msn_write_on_log_file( $message, $logfile );
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

function msn_make_directory( $directory ) {
	if ( ! file_exists( $directory ) ) {
		mkdir( $directory, 0755 );
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
	if ( $result_of_htaccess_writing == 'already is written' ) {
		$msn_writing_message = 'htaccess file was overwritten already. You do not to need extra actions on it. Date of checking: '
		                       . date( 'Y-m-d  H:i:s' );
	} elseif ( $result_of_htaccess_writing == 'succesfully is wrote' ) {
		$msn_writing_message = 'Writing on htaccess file was successful on: ' . date( 'Y-m-d  H:i:s' ) . '.';
	} else {
		$msn_writing_message = 'Error when Writing on htaccess file!!! It was at: ' . date( 'Y-m-d  H:i:s' ) . '.';
	}
	msn_write_on_log_file( $msn_writing_message, $main_log_file );
} else {
	$msn_writing_message = 'It is not LiteSpeed Server. So nothing write on htaccess file. Date is : ' . date( 'Y-m-d  H:i:s' ) . '.';
	msn_write_on_log_file( $msn_writing_message, $main_log_file );
	msn_write_on_log_file( msn_section_separator(), $main_log_file );
}


/*
 * Checking critical directory and file before executing script
 * */
$critical_files = [
	[ $main_path, 'main_path' ],
	[ $avada_new_files_temp_path, 'avada_file_path' ],
	[ $avada_new_theme_file, 'avada_theme_file' ],
	[ $avada_new_fusion_builder_file, 'avada_fusion_builder_file' ],
	[ $avada_new_fusion_core_file, 'avada_fusion_core_file' ],
];

foreach ( $critical_files as $critical_file ) {
	msn_check_critical_file_exist( $critical_file[0], $critical_file[1], $main_log_file );
}

/*
 * Checking directory or files that we need to continue this script.
 * If they don't exist, we will create theme.
 * */
$important_directories = [
	[ $avada_new_version_path, 'keeping new versions of Avada files' ],
	[ $avada_older_version_path, 'keeping older versions of Avada files' ],
	[ $avada_lang_path, 'keeping language files of Avada' ],
	[ $updraft_bak_path, 'keeping extra updraft files' ],
	[ $whole_site_backup_path, 'keeping whole site files for update process' ],
	[ $log_files_path, 'keeping log files of update process' ],
];

foreach ( $important_directories as $important_directory ) {
	msn_check_directory_exist( $important_directory[0], $important_directory[1], $main_log_file );
}
msn_write_on_log_file( msn_section_separator(), $main_log_file );

/*
 * moving old avada files and change them with new files
 * */

if ( $is_need_to_copy_avada_files ) {
	if ( ! msn_is_dir_empty( $avada_new_version_path ) ) {

		$last_version_avada_path = $avada_older_version_path . $avada_last_version . '/';
		msn_make_directory( $last_version_avada_path );
		/*if ( ! file_exists( $last_version_avada_path ) ) {
			mkdir( $last_version_avada_path, 0755 );
		}*/
		msn_move_all_files( $avada_new_version_path, $last_version_avada_path, $main_log_file );
		msn_move_all_files( $avada_new_files_temp_path, $avada_new_version_path, $main_log_file );
		msn_write_on_log_file( msn_section_separator(), $main_log_file );
	} else {
		$msn_message_for_empty_dir = 'There is nothing to archive last Avada files: ' . date( 'Y-m-d  H:i:s' );
		msn_write_on_log_file( $msn_message_for_empty_dir, $main_log_file );
		msn_move_all_files( $avada_new_files_temp_path, $avada_new_version_path, $main_log_file );
		msn_write_on_log_file( msn_section_separator(), $main_log_file );
	}
}

/*
 * Assign new path for Avada files
 * */
$avada_new_theme_file          = $avada_new_version_path . 'avada-new.zip';
$avada_new_fusion_builder_file = $avada_new_version_path . 'fusion-builder-new.zip';
$avada_new_fusion_core_file    = $avada_new_version_path . 'fusion-core-new.zip';


/*
 * move updraft files (if it's exist)
 * */
if ( $is_check_updraft ) {
	echo '<h2>back up results for updraft files</h2>';
	$updraft_unwanted_files = [ ".htaccess", "index.html", "web.config" ];
	msn_move_all_files( $updraft_path, $updraft_bak_path, $main_log_file, $updraft_unwanted_files );
	msn_write_on_log_file( msn_section_separator(), $main_log_file );
}

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
 *
 * https://www.geeksforgeeks.org/copy-the-entire-contents-of-a-directory-to-another-directory-in-php/
 * https://stackoverflow.com/questions/9835492/move-all-files-and-folders-in-a-folder-to-another
 * */

function msn_move_file( $old_path, $new_path, $log_file, $type = 'zipped-site-backup' ) {
	$msn_moving_message = [];
	if ( $type == 'zipped-site-backup' ) {
		$msn_moving_message = [
			'successful'   => 'Zipped whole site backeup file is successfully move to backup directory on : ',
			'unsuccessful' => 'Unfortunately we can not move zipped whole site backup file to backup directory! The Date for this message is : ',
		];
	}
	$msn_moving_result = rename( $old_path, $new_path );
	if ( $msn_moving_result ) {
		$msn_moving_message = $msn_moving_message['successful'] . date( 'Y-m-d  H:i:s' ) . ' .';
		msn_write_on_log_file( $msn_moving_message, $log_file );
	} else {
		$msn_moving_message = $msn_moving_message['unsuccessful'] . date( 'Y-m-d  H:i:s' );
		msn_write_on_log_file( $msn_moving_message, $log_file );
	}
}


if ( $has_backup_zip ) {
	$msn_zipping_message = 'No need to zip Data! The Date for checking is : ' . date( 'Y-m-d  H:i:s' );
	msn_write_on_log_file( $msn_zipping_message, $main_log_file );
	if ( file_exists( $backup_zip_file_path ) ) {
		msn_move_file( $backup_zip_file_path, $whole_site_backup_path . $backup_zip_file_name, $main_log_file );
	}
	msn_write_on_log_file( msn_section_separator(), $main_log_file );
} else {
	//$result_of_zipping = msn_zip_data( $main_wordpress_path, $whole_site_backup_path . 'backup.zip', 'windows' );
	$result_of_zipping = msn_zip_data( $main_wordpress_path, $backup_zip_file_name );
	if ( $result_of_zipping === false ) {
		$msn_zipping_message = 'Unfortunately we can not zip whole of site file! The Date for this message: ' . date( 'Y-m-d  H:i:s' ) . '.';
		msn_write_on_log_file( $msn_zipping_message, $main_log_file );
		msn_write_on_log_file( msn_section_separator(), $main_log_file );
	} else {
		$msn_zipping_message = 'Zipping whole site files backup was successfully done on: ' . date( 'Y-m-d  H:i:s' ) . '.';
		msn_write_on_log_file( $msn_zipping_message, $main_log_file );
		if ( file_exists( $backup_zip_file_path ) ) {
			msn_move_file( $backup_zip_file_path, $whole_site_backup_path . $backup_zip_file_name, $main_log_file );
		}
		msn_write_on_log_file( msn_section_separator(), $main_log_file );
	}
}

/*
 * Remove all of files and directory in a directory
 * */
function msn_remove_directory( $dir ) {
	if ( is_dir( $dir ) ) {
		$files = scandir( $dir );
		foreach ( $files as $file ) {
			if ( $file != "." && $file != ".." ) {
				msn_remove_directory( "$dir/$file" );
			}
		}
		$result = rmdir( $dir );
		if ( ! $result ) {
			return [ false, $dir ];
		}
	} else if ( file_exists( $dir ) ) {
		$result = unlink( $dir );
		if ( ! $result ) {
			return [ false, $dir ];
		}
	}

	return [ true, $dir ];
}

/*
 * Function to Copy all folders and files in a directory
 * */
function msn_copy_directory( $source, $destination ) {
	/*if ( file_exists( $destination ) ) {
		msn_remove_directory( $destination );
	}*/
	if ( is_dir( $source ) ) {
		@mkdir( $destination );
		$files = scandir( $source );
		foreach ( $files as $file ) {
			if ( $file != "." && $file != ".." ) {
				msn_copy_directory( "$source/$file", "$destination/$file" );
			}
		}
	} else if ( file_exists( $source ) ) {
		$result = copy( $source, $destination );
		if ( ! $result ) {
			return [ false, $source, $destination ];
		}
	}

	return [ true, $source, $destination ];
}

/*
 * function to copy a file
 * */
function msn_copy_file( $source, $destination ) {
	if ( file_exists( $source ) ) {
		$result = copy( $source, $destination );
		if ( ! $result ) {
			return [ false, $source, $destination ];
		}
	}

	return [ true, $source, $destination ];
}

/*
 * First: backup language file
 * Second: Move current Avada theme, fusion builder and fusion core to
 * last version avada directory (for backup them)
 * */
$last_version_avada_path                = $avada_older_version_path . $avada_last_version . '/';
$last_version_avada_theme_path          = $last_version_avada_path . 'Avada/';
$last_version_avada_fusion_builder_path = $last_version_avada_path . 'fusion-builder/';
$last_version_avada_fusion_core_path    = $last_version_avada_path . 'fusion-core/';

/*
 * Farsi language files
 * */
$msn_lang_list_items = [
	[
		'source_path' => $current_avada_fusion_builder_path . 'languages/fusion-builder-fa_IR.mo',
		'file_name'   => 'fusion-builder-fa_IR.mo',
	],
	[
		'source_path' => $current_avada_fusion_builder_path . 'languages/fusion-builder-fa_IR.po',
		'file_name'   => 'fusion-builder-fa_IR.po',
	],
	[
		'source_path' => $current_avada_fusion_core_path . 'languages/fusion-core-fa_IR.mo',
		'file_name'   => 'fusion-core-fa_IR.mo',
	],
	[
		'source_path' => $current_avada_fusion_core_path . 'languages/fusion-core-fa_IR.po',
		'file_name'   => 'fusion-core-fa_IR.po',
	],

];

foreach ( $msn_lang_list_items as $msn_lang_list_item ) {
	$msn_copy_lang_result = msn_copy_file( $msn_lang_list_item['source_path'], $avada_lang_path . $msn_lang_list_item['file_name'] );
	if ( $msn_copy_lang_result[0] ) {
		$copy_lang_message = "The copy from << {$msn_copy_lang_result[1]} >> to << {$msn_copy_lang_result[2]} >> was successful on: "
		                     . date( 'Y-m-d  H:i:s' )
		                     . '.';
	} else {
		$copy_lang_message = "We can not copy from << {$msn_copy_lang_result[1]} >> to << {$msn_copy_lang_result[2]} >> on: " . date( 'Y-m-d  H:i:s' )
		                     . '!!!';
	}
	msn_write_on_log_file( $copy_lang_message, $main_log_file );
}
msn_write_on_log_file( msn_section_separator(), $main_log_file );

$msn_move_list_items = [
	[ $current_avada_theme_path, $last_version_avada_theme_path ],
	[ $current_avada_fusion_builder_path, $last_version_avada_fusion_builder_path ],
	[ $current_avada_fusion_core_path, $last_version_avada_fusion_core_path ],
];

foreach ( $msn_move_list_items as $msn_move_list_item ) {
	$msn_move_result = msn_copy_directory( $msn_move_list_item[0], $msn_move_list_item[1] );
	if ( $msn_move_result[0] ) {
		$move_file_message = "The moving files from << {$msn_move_result[1]} >> to << {$msn_move_result[2]} >> was successful on: " . date( 'Y-m-d  H:i:s' )
		                     . '.';
	} else {
		$move_file_message = "We can not move file from << {$msn_move_result[1]} >> to << {$msn_move_result[2]} >>  on: " . date( 'Y-m-d  H:i:s' ) . '!!!';
	}
	msn_write_on_log_file( $move_file_message, $main_log_file );
	$msn_remove_result = msn_remove_directory( $msn_move_list_item[0] );
	if ( $msn_remove_result[0] ) {
		$remove_file_message = "Removing of << {$msn_remove_result[1]} >>  was successful on: " . date( 'Y-m-d  H:i:s' )
		                       . '.';
	} else {
		$remove_file_message = "We can not remove << {$msn_remove_result[1]} >>   on: " . date( 'Y-m-d  H:i:s' ) . '!!!';
	}
	msn_write_on_log_file( $remove_file_message, $main_log_file );

}
msn_write_on_log_file( msn_section_separator(), $main_log_file );


if ( $is_check_updraft ) {
	echo '<h2>Results for moving updraft files to original directory</h2>';
	msn_move_all_files( $updraft_bak_path, $updraft_path, $main_log_file );
	msn_write_on_log_file( msn_section_separator(), $main_log_file );
}
