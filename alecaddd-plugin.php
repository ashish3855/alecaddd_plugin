<?php
/**
 * @package  AlecadddPlugin
 */
/**
* Plugin Name: Alecaddd Plugin
* Plugin URI: http://alecaddd.com/plugin
* Description: This is my first attempt on writing a custom Plugin for this amazing tutorial series.
* Version: 1.0.0
* Author: Ashish "Alecaddd" Gupta
* Author URI: http://alecaddd.com
* License: GPLv2 or later
* Text Domain: alecaddd-plugin
*/

/**
* This program is free software; you can redistribute it and/or
* modify it under the terms of the GNU General Public License
* as published by the Free Software Foundation; either version 2
* of the License, or (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*
* Copyright 2005-2015 Automattic, Inc.
*/

defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

// check condition check autoload php file
if ( file_exists( dirname(__FILE__).'/vendor/autoload.php' ) ) {
	require_once dirname(__FILE__).'/vendor/autoload.php';
}

// run register_services method within Init class
if( class_exists('Inc\\Init') ){
	Inc\Init::register_services();
}

// activate and deactivate method
function alecaddd_activate_plugin(){
	Inc\Base\Activate::activate();
}
function alecaddd_deactivate_plugin(){
	Inc\Base\Deactivate::deactivate();
}

// Trigger activate and deactivate hook
register_activation_hook( __FILE__, 'alecaddd_activate_plugin' );
register_deactivation_hook( __FILE__, 'alecaddd_deactivate_plugin' );
