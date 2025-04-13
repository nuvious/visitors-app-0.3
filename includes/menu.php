<?php
defined('ABSPATH') or die();

/**
 * Function that creates the menu records
 */
function VST_administrator_menu()
{
	add_menu_page(VST_NAMEPLUGIN,__("Visitors", "Visitors"),'manage_options',VST_PATH . '/admin/start.php');
	add_submenu_page(VST_PATH . '/admin/start.php',__("Start", "Visitors"),__("Start", "Visitors"),'manage_options',VST_PATH . '/admin/start.php');
	add_submenu_page(VST_PATH . '/admin/start.php',__("About", "Visitors"),__("About", "Visitors"),'manage_options',VST_PATH . '/admin/about.php');

	return TRUE;
}