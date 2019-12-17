<?php
/**
 * Path Class File
 *
 * This file contains Path class which can related paths for running script
 *
 * @package    Updater\Inc\Functions
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://wpwebmaster.ir
 * @since      1.0.0
 */

namespace Updater\Inc\Functions;


/**
 * Class Path
 *
 * This file contains Path class which can related paths for running script
 *
 * @package    Updater\Inc\Functions
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 */
class Path {

	private $script_directory;
	private $script_path;
	private $domain_name;
	private $main_path;

	private $main_start_path;
	private $host_name;
	private $host_path;
	private $is_check_updraft;
	private $wordpress_path;
	private $main_theme_path;
	private $main_plugin_path;
	private $log_files_path;
	private $main_log_file;

	public function __construct(
		$script_directory, $script_path, $domain_name, $main_path
	) {
		$this->script_directory = $script_directory;
		$this->script_path      = $script_path;
		$this->domain_name      = $domain_name;
		$this->main_path        = $main_path;
		$this->main_start_path  = $this->set_main_start_path();
		$this->host_name        = $this->set_host_name_path_updraft( $domain_name )['host_name'];
		$this->host_path        = $this->set_host_name_path_updraft( $domain_name )['host_path'];
		$this->is_check_updraft = $this->set_host_name_path_updraft( $domain_name )['is_check_updraft'];
		$this->wordpress_path   = $this->set_wordpress_path();
		$this->main_theme_path  = '../' . $this->host_path . 'wp-content/themes/';
		$this->main_plugin_path = '../' . $this->host_path . 'wp-content/plugins/';
		$this->log_files_path   = $this->main_path . '06-log-files/';
		$this->main_log_file    = $this->log_files_path . "{$this->host_name}-update-log-file-" . date( 'Ymd' ) . '.log';

	}

	/**
	 * @param mixed $main_start_path
	 */
	private function set_main_start_path() {
		$main_start_path = str_replace( $this->script_directory, '', $this->script_path );
		/*
		 * For linux OS
		 * */
		$main_start_path = str_replace( '//', '', $main_start_path );
		/*
		 * For Windows OS
		 * */
		$main_start_path = str_replace( '\/', '', $main_start_path );

		return $main_start_path;

	}

	private function set_host_name_path_updraft( $domain_name ) {
		switch ( $domain_name ) {
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
			case 'webmaster':
				$host_name        = 'webmaster';
				$host_path        = 'webmaster/';
				$is_check_updraft = false;
				break;
			case 'spec':
				$host_name        = 'spec';
				$host_path        = 'spec/';
				$is_check_updraft = true;
				break;
			default:
				$host_name        = 'spec';
				$host_path        = 'spec/';
				$is_check_updraft = true;

		}

		return [
			'host_name'        => $host_name,
			'host_path'        => $host_path,
			'is_check_updraft' => $is_check_updraft,
		];
	}

	private function set_wordpress_path() {
		//$has_host_name = true;
		if ( PHP_OS == 'WINNT' ) {
			return str_replace( '/', '\\', $this->main_start_path . $this->host_path );
		} else {
			return $this->main_start_path . $this->host_path;
		}

	}

	public function main_path(  ) {
		return $this->main_path;
	}

	/**
	 * @return mixed
	 */
	public function main_start_path() {
		return $this->main_start_path;
	}

	public function host_name() {
		return $this->host_name;
	}

	public function host_path() {
		return $this->host_path;
	}

	public function is_check_updraft() {
		return $this->is_check_updraft;
	}

	public function wordpress_path() {
		return $this->wordpress_path;
	}

	public function main_theme_path() {
		return $this->main_theme_path;
	}

	public function main_plugin_path() {
		return $this->main_plugin_path;
	}

	public function log_files_path() {
		return $this->log_files_path;
	}

	public function main_log_file() {
		return $this->main_log_file;
	}

}


