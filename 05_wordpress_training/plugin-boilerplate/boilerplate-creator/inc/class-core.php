<?php
/**
 * Core class
 *
 * This file contains Core class which can handle whole script process
 *
 * @package    Boilerplate_Creatore
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://wpwebmaster.ir
 * @since      1.0.0
 */

namespace Boilerplate_Creator\Inc;

use Boilerplate_Creator\Inc\Functions\{
	Utility, Files_Process
};
use Boilerplate_Creator\Inc\Setting;

/**
 * Class Core
 *
 * This file contains core class which can set Primary class for script
 *
 * @package    Boilerplate_Creator
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @property Setting       $settings
 * @property boolean       $is_in_test_mode
 * @property Files_Process $file_process
 */
class Core {
	use Utility;
	/**
	 * @var Setting $settings Primary settings for this script
	 */
	protected $settings;
	/**
	 * @var boolean $is_in_test_mode
	 */
	protected $is_in_test_mode;
	/**
	 * @var Files_Process $file_process
	 */
	protected $file_process;

	public function __construct( Setting $settings, Files_Process $files_process ) {
		/**
		 * set time zone
		 */
		$this->set_time_zone( 'Asia/Tehran' );
		$this->settings        = $settings;
		$this->file_process    = $files_process;
		$this->is_in_test_mode = true;
	}

	public function init() {

		if ( $this->is_in_test_mode ) {


		} else {
			$this->create_new_project();
			$this->create_new_files_and_directories();
			$this->remove_extra_files();
			$this->rename_main_plugin_file();
			var_dump( $this );
			//TODO:
		}
	}

	/**
	 * Create directory for new plugin
	 */
	public function create_new_project() {
		$result = $this->file_process->make_directory_if_not_exist( '../' . $this->settings->new_path, 'for new plugin path' );
		$this->file_process->append( $result ['message'], $this->settings->main_log_file );
		$this->file_process->append_section_separator( $this->settings->main_log_file );
	}

	/**
	 * Create new directories and files for new plugin
	 */
	public function create_new_files_and_directories() {
		$result = $this->file_process->copy_directory(
			$this->settings->old_full_path,
			$this->settings->new_full_path
		);
		$this->file_process->append( $result ['message'], $this->settings->main_log_file );
		$this->file_process->append_section_separator( $this->settings->main_log_file );
	}

	/**
	 * Rename extra file in new plugin directory
	 */
	public function remove_extra_files() {
		$this->file_process->remove_file( $this->settings->new_full_path . 'LICENSE.txt' );
		$this->file_process->remove_file( $this->settings->new_full_path . '.gitignore' );
		// TODO: log this process in future
	}

	/**
	 * Rename main plugin file
	 */
	public function rename_main_plugin_file() {
		rename(
			$this->settings->new_full_path . 'plugin-name.php',
			$this->settings->new_full_path . str_replace( '/', '', $this->settings->new_path . '.php' )
		);

		// TODO: log this process in future
	}

	/**
	 * @param $property
	 *
	 * @return mixed
	 */
	public function __get( $property ) {
		return $this->$property;
	}

	/**
	 * @param $name
	 * @param $value
	 */
	public function __set( $name, $value ) {
		$this->$name = $value;
	}


}