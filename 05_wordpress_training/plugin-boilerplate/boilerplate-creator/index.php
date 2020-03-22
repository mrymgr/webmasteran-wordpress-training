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
	'new_path'                        => 'restaurant-booking/',
	'new_small_name_with_dash'        => 'restaurant-booking',
	'new_plugin_name_in_header'       => 'Restaurant Booking',
	'new_plugin_description'          => 'A plugin to book restaurant',
	'new_plugin_version'              => '1.0.1',
	'new_namespace'                   => 'Restaurant_Booking',
	'new_link'                        => 'https://wpwebmaster.ir',
	'new_author_name'                 => 'Mehdi Soltani Neshan',
	'new_author_uri'                  => 'https://wpwebmaster.ir',
	'new_author_email'                => 'soltani.n.mehdi@gmail.com',
	'new_main_plugin_name'            => 'Restaurant_Booking_Plugin',
	'new_plugin_name_main_name_const' => 'RESTAURANT_BOOKING_PLUGIN',
	'new_plugin_name_const_prefix'    => 'RESTAURANT_BOOKING',
	'new_plugin_name_method_prefix'   => 'restaurant_bookings',
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