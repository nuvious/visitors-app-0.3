<?php
defined('ABSPATH') or die();
/*
Plugin Name: Visitors
Plugin URI: https://github.com/domingoruiz/WORDPRESS_visitors
Description: Small Wordpress plugin that records and displays visits to your website.
Version:0.3
Author:Domingo Ruiz Arroyo
Author URI:https://doming.es/
License:GNU v3
Text Domain: Visitors
Domain Path: /languages/
*/

// Define all the constants to use in the proyect
define('VST_NAMEPLUGIN', "visitors-app");
define('VST_VERSION', "0.3");
define('VST_PATH',plugin_dir_path(__FILE__));

// Include all the files that I need
include(VST_PATH . 'includes/menu.php');
include(VST_PATH . 'includes/database.php');
include(VST_PATH . 'includes/activate_deactivate.php');
include(VST_PATH . 'includes/date.php');

// Load the languages
function VST_load_language() {
	load_plugin_textdomain( 'Visitors', FALSE, dirname( plugin_basename( __FILE__ ) ) . '/languages/');
}

// We register the functions of the application
add_action( 'plugins_loaded', 'VST_load_language' ); // Languages
add_action( 'wp_head', 'VST_save_record' ); // Register visit
add_action( 'admin_menu', 'VST_administrator_menu' ); // Menu
register_activation_hook(__FILE__,'VST_activate'); // Activation function
register_activation_hook(__FILE__,'VST_deactivate'); // Desactivation function