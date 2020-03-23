<?php
/**
 * Setting class
 *
 * This file contains Setting class which can set Primary settings for script
 *
 * @package    Boilerplate_Creator
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://wpwebmaster.ir
 * @since      1.0.0
 */

namespace Boilerplate_Creator\Inc;

use Boilerplate_Creator\Inc\Functions\Utility;


/**
 * Class Setting
 *
 * This file contains Setting class which can set Primary settings for script
 *
 * @package    Boilerplate_Creator
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @property string  $script_path
 * @property string  $old_path
 * @property string  $old_small_name_with_dash
 * @property string  $old_full_path
 * @property string  $old_plugin_name_in_header
 * @property string  $old_plugin_description
 * @property string  $old_plugin_version
 * @property string  $old_namespace
 * @property string  $old_link
 * @property string  $old_author_name
 * @property string  $old_author_uri
 * @property string  $old_author_email
 * @property string  $old_main_plugin_name
 * @property string  $old_plugin_name_main_name_const
 * @property string  $old_plugin_name_const_prefix
 * @property string  $old_plugin_name_method_prefix
 * @property string  $new_path
 * @property string  $new_small_name_with_dash
 * @property string  $new_full_path
 * @property string  $new_plugin_name_in_header
 * @property string  $new_plugin_description
 * @property string  $new_plugin_version
 * @property string  $new_namespace
 * @property string  $new_link
 * @property string  $new_author_name
 * @property string  $new_author_uri
 * @property string  $new_author_email
 * @property string  $new_main_plugin_name
 * @property string  $new_plugin_name_main_name_const
 * @property string  $new_plugin_name_const_prefix
 * @property string  $new_plugin_name_method_prefix
 * @property boolean $is_need_change_plugin_version
 * @property boolean $is_need_change_link
 * @property boolean $is_need_change_author_name
 * @property boolean $is_need_change_author_email
 * @property boolean $is_need_activation_hook
 * @property boolean $is_need_deactivation_hook
 * @property boolean $is_need_uninstall_hook
 * @property string  $main_log_file
 * @property string  $new_plugin_main_file_name
 * @property string  $new_file_name_prefix
 * @property string  $new_abstract_files_full_path
 * @property string  $new_interface_files_full_path
 * @property string  $new_admin_files_full_path
 * @property string  $new_config_files_full_path
 * @property string  $new_database_files_full_path
 * @property string  $new_functions_files_full_path
 * @property string  $new_hooks_files_full_path
 * @property string  $new_init_files_full_path
 * @property string  $new_pagehandlers_files_full_path
 * @property string  $new_parts_files_full_path
 * @property string  $new_uninstall_files_full_path
 * @property string  $new_includes_files_full_path
 * @property string  $new_templates_files_full_path
 * @property array   $general_search_items
 *
 */
class Setting {
	use Utility;
	protected $script_path;
	protected $old_path;
	protected $old_small_name_with_dash;
	protected $old_full_path;
	protected $old_plugin_name_in_header;
	protected $old_plugin_description;
	protected $old_plugin_version;
	protected $old_namespace;
	protected $old_link;
	protected $old_author_name;
	protected $old_author_uri;
	protected $old_author_email;
	protected $old_main_plugin_name;
	protected $old_plugin_name_main_name_const;
	protected $old_plugin_name_const_prefix;
	protected $old_plugin_name_method_prefix;

	protected $new_path;
	protected $new_small_name_with_dash;
	protected $new_full_path;
	protected $new_plugin_name_in_header;
	protected $new_plugin_description;
	protected $new_plugin_version;
	protected $new_namespace;
	protected $new_link;
	protected $new_author_name;
	protected $new_author_uri;
	protected $new_author_email;
	protected $new_main_plugin_name;
	protected $new_plugin_name_main_name_const;
	protected $new_plugin_name_const_prefix;
	protected $new_plugin_name_method_prefix;

	protected $is_need_change_plugin_version;
	protected $is_need_change_link;
	protected $is_need_change_author_name;
	protected $is_need_change_author_email;
	protected $is_need_activation_hook;
	protected $is_need_deactivation_hook;
	protected $is_need_uninstall_hook;

	protected $main_log_file;
	protected $new_plugin_main_file_name;
	protected $new_file_name_prefix;
	protected $new_abstract_files_full_path;
	protected $new_interface_files_full_path;
	protected $new_admin_files_full_path;
	protected $new_config_files_full_path;
	protected $new_database_files_full_path;
	protected $new_functions_files_full_path;
	protected $new_hooks_files_full_path;
	protected $new_init_files_full_path;
	protected $new_pagehandlers_files_full_path;
	protected $new_parts_files_full_path;
	protected $new_uninstall_files_full_path;
	protected $new_includes_files_full_path;
	protected $new_templates_files_full_path ;

	protected $general_search_items;


	public function __construct(
		$initial_values
	) {
		$this->script_path                     = $this->trailingslashit( $initial_values['script_path'] );
		$this->old_path                        = 'plugin-name-dir/';
		$this->old_small_name_with_dash        = 'plugin-name';
		$this->old_full_path                   = str_replace( 'boilerplate-creator/', '', $this->script_path ) . $this->old_path;
		$this->old_plugin_name_in_header       = 'OOP WordPress Plugin Boilerplate';
		$this->old_plugin_description          = 'Description for OOP Plugin';
		$this->old_plugin_version              = '1.0.2';
		$this->old_namespace                   = 'Plugin_Name_Name_Space';
		$this->old_link                        = 'https://github.com/msn60/oop-wordpress-plugin-boilerplate';
		$this->old_author_name                 = 'Mehdi Soltani';
		$this->old_author_uri                  = 'https://wpwebmaster.ir';
		$this->old_author_email                = 'soltani.n.mehdi@gmail.com';
		$this->old_main_plugin_name            = 'Plugin_Name_Plugin';
		$this->old_plugin_name_main_name_const = 'PLUGIN_NAME_MAIN_NAME';
		$this->old_plugin_name_const_prefix    = 'PLUGIN_NAME';
		$this->old_plugin_name_method_prefix   = 'plugin_name';

		$this->new_path                        = $initial_values['new_path'];
		$this->new_small_name_with_dash        = $initial_values['new_small_name_with_dash'];
		$this->new_full_path                   = str_replace( 'boilerplate-creator/', '', $this->script_path ) . $this->new_path;
		$this->new_plugin_name_in_header       = $initial_values['new_plugin_name_in_header'];
		$this->new_plugin_description          = $initial_values['new_plugin_description'];
		$this->new_plugin_version              = $initial_values['new_plugin_version'];
		$this->new_namespace                   = $initial_values['new_namespace'];
		$this->new_link                        = $initial_values['new_link'];
		$this->new_author_name                 = $initial_values['new_author_name'];
		$this->new_author_uri                  = $initial_values['new_author_uri'];
		$this->new_author_email                = $initial_values['new_author_email'];
		$this->new_main_plugin_name            = $initial_values['new_main_plugin_name'];
		$this->new_plugin_name_main_name_const = $initial_values['new_plugin_name_main_name_const'];
		$this->new_plugin_name_const_prefix    = $initial_values['new_plugin_name_const_prefix'];
		$this->new_plugin_name_method_prefix   = $initial_values['new_plugin_name_method_prefix'];

		$this->is_need_change_plugin_version = $initial_values['is_need_change_plugin_version'];
		$this->is_need_change_link           = $initial_values['is_need_change_link'];
		$this->is_need_change_author_name    = $initial_values['is_need_change_author_name'];
		$this->is_need_change_author_email   = $initial_values['is_need_change_author_email'];
		$this->is_need_activation_hook       = $initial_values['is_need_activation_hook'];
		$this->is_need_deactivation_hook     = $initial_values['is_need_deactivation_hook'];
		$this->is_need_uninstall_hook        = $initial_values['is_need_uninstall_hook'];

		$this->main_log_file                    = $this->script_path . 'logs/' . "{$this->new_plugin_name_method_prefix}-creation-log-file"
		                                          . date( 'Ymd' )
		                                          . '.log';
		$this->new_plugin_main_file_name        = $this->new_full_path . str_replace( '/', '', $this->new_path . '.php' );
		$this->new_file_name_prefix             = str_replace( '/', '', $this->new_path );
		$this->new_abstract_files_full_path     = $this->new_full_path . 'includes/abstracts/';
		$this->new_interface_files_full_path    = $this->new_full_path . 'includes/interfaces/';
		$this->new_admin_files_full_path        = $this->new_full_path . 'includes/admin/';
		$this->new_config_files_full_path       = $this->new_full_path . 'includes/config/';
		$this->new_database_files_full_path     = $this->new_full_path . 'includes/database/';
		$this->new_functions_files_full_path    = $this->new_full_path . 'includes/functions/';
		$this->new_hooks_files_full_path        = $this->new_full_path . 'includes/hooks/';
		$this->new_init_files_full_path         = $this->new_full_path . 'includes/init/';
		$this->new_pagehandlers_files_full_path = $this->new_full_path . 'includes/pagehandlers/';
		$this->new_parts_files_full_path        = $this->new_full_path . 'includes/parts/';
		$this->new_uninstall_files_full_path    = $this->new_full_path . 'includes/uninstall/';
		$this->new_includes_files_full_path     = $this->new_full_path . 'includes/';
		$this->new_templates_files_full_path    = $this->new_full_path . 'templates/';

		$this->general_search_items = [
			[
				'search'  => $this->old_plugin_version,
				'replace' => $this->new_plugin_version,
			],
			[
				'search'  => $this->old_namespace,
				'replace' => $this->new_namespace,
			],
			[
				'search'  => $this->old_link,
				'replace' => $this->new_link,
			],
			[
				'search'  => $this->old_author_name,
				'replace' => $this->new_author_name,
			],
			[
				'search'  => $this->old_author_uri,
				'replace' => $this->new_author_uri,
			],
			[
				'search'  => $this->old_author_email,
				'replace' => $this->new_author_email,
			],

		];


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


