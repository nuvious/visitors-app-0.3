<?php
defined('ABSPATH') or die();

/**
 * Function that is executed in the plugin activation
 */
function VST_activate()
{
	return VST_create_table_records();
}

/**
 * Function that is executed in the plugin deactivate
 */
function VST_deactivate()
{
	return VST_delete_table_records();
}