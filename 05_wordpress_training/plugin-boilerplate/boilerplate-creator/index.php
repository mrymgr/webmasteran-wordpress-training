<?php

namespace Boilerplate_Creator;
require_once __DIR__ . '/vendor/autoload.php';

use Boilerplate_Creator\Inc\Core;
use Boilerplate_Creator\Inc\Functions\Files_Process;
use Boilerplate_Creator\Inc\Setting;

/**
 * Initial values
 */
$htaccess_lite_speed_config
	            = <<< HTACCESS
<IfModule Litespeed>
RewriteEngine On
RewriteRule .* - [E=noabort:1]
RewriteRule .* - [E=noconntimeout:1]
</IfModule>
HTACCESS;
$initial_values = [
	'script_path'                     => dirname( __FILE__ ),
	'htaccess_config'                 => $htaccess_lite_speed_config,
	'new_path'                        => 'siawood-products/',
	'new_small_name_with_dash'        => 'siawood-products',
	'new_plugin_name_in_header'       => 'Siawood Products Manager',
	'new_plugin_description'          => 'A plugin to manage Siawood products',
	'new_plugin_version'              => '1.0.1',
	'new_namespace'                   => 'Siawood_Products',
	'new_link'                        => 'https://wpwebmaster.ir',
	'new_author_name'                 => 'Mehdi Soltani Neshan',
	'new_author_uri'                  => 'https://wpwebmaster.ir',
	'new_author_email'                => 'soltani.n.mehdi@gmail.com',
	'new_main_plugin_name'            => 'Siawood_Products_Plugin',
	'new_plugin_name_main_name_const' => 'SIAWOOD_PRODUCTS_PLUGIN',
	'new_plugin_name_const_prefix'    => 'SIAWOOD_PRODUCTS',
	'new_plugin_name_method_prefix'   => 'siawood_products',
	'is_need_change_plugin_version'   => true,
	'is_need_change_link'             => true,
	'is_need_change_author_name'      => true,
	'is_need_change_author_email'     => true,
	'is_need_activation_hook'         => true,
	'is_need_deactivation_hook'       => true,
	'is_need_uninstall_hook'          => true,
];


$core_object = new Core(
	new Setting( $initial_values ),
	new Files_Process()
);
$core_object->init();