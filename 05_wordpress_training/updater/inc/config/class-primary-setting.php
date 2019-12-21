<?php
/**
 * Primary_Setting class
 *
 * This file contains Primary_Setting class which can set Primary settings for script
 *
 * @package    Updater\Inc\Config
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://wpwebmaster.ir
 * @since      1.0.1
 */

namespace Updater\Inc\Config;


/**
 * Class Primary_Setting
 *
 * This file contains Primary_Setting class which can set Primary settings for script
 *
 * @package    Updater\Inc\Config
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 */
class Primary_Setting {

	//$msn_script_directory = 'update.wpwebmaster.ir';
	private $script_path;
	#put your script directory here:
	private $script_directory;
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
	private $domain_name;
	/*
	 * Define paths and files for updater script
	 * */
	private $main_path;
	#put last version of avada here:
	private $avada_last_version;
	#put new version of avada here:
	private $avada_new_version;

	public function __construct(
		$script_path,
		$script_directory = 'updater',
		$domain_name = 'spec',
		$main_path = '../temp-source/',
		$avada_last_version = '6.0.3',
		$avada_new_version = '6.1.2'
	) {
		//$msn_script_directory = 'update.wpwebmaster.ir';
		$this->script_path        = $script_path;
		$this->script_directory   = $script_directory;
		$this->domain_name        = $domain_name;
		$this->main_path          = $main_path;
		$this->avada_last_version = $avada_last_version;
		$this->avada_new_version  = $avada_new_version;
	}

	public function script_path() {
		return $this->script_path;
	}

	public function script_directory() {
		return $this->script_directory;
	}

	public function domain_name() {
		return $this->domain_name;
	}

	public function main_path(  ) {
		return $this->main_path;
	}

	public function avada_last_version() {
		return $this->avada_last_version;
	}

	public function avada_new_version() {
		return $this->avada_new_version;
	}


}


