<?php
defined('ABSPATH') or die();

function VST_create_table_records() {
	global $wpdb;
	$table_name = $wpdb->prefix . 'VST_registros';

	if(!$wpdb->query("SELECT * FROM ".$table_name." LIMIT 1")) {
		$wpdb->query( '
					CREATE TABLE `' . $table_name . '` (
					  `id` int(11) NOT NULL,
					  `patch` text COLLATE utf8_unicode_ci DEFAULT NULL,
					  `datetime` datetime DEFAULT NULL,
					  `useragent` text COLLATE utf8_unicode_ci DEFAULT NULL,
					  `ip` text COLLATE utf8_unicode_ci DEFAULT NULL
					);
				' );
		$wpdb->query( '
					ALTER TABLE `' . $table_name . '` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT, add PRIMARY KEY (`id`);
				' );
	}
}

function VST_save_record() {
	global $wpdb;
	$table_name = $wpdb->prefix . 'VST_registros';

	VST_create_table_records();

	return $wpdb->insert(
				$table_name,
				array(
					'patch' => $_SERVER["REQUEST_URI"],
					'datetime' => current_time( 'mysql' ),
					'useragent' => $_SERVER['HTTP_USER_AGENT'],
					'ip' => $_SERVER['HTTP_X_FORWARDED_FOR']
				)
			);
}

function VST_get_records($date_start, $date_finish) {
	global $wpdb;
	$table_name = $wpdb->prefix . 'VST_registros';

	return $wpdb->get_results('
		SELECT * 
		FROM '.$table_name.'
		WHERE datetime between "'.$date_start->format("Y-m-d").' 00:00:00" and "'.$date_finish->format("Y-m-d").' 23:59:59"	
		ORDER BY id DESC;
	');
}

function VST_get_statistics($date_start, $date_finish) {
	global $wpdb;
	$table_name = $wpdb->prefix . 'VST_registros';

	$usuarios= count($wpdb->get_results('
					SELECT * 
					FROM '.$table_name.'
					WHERE datetime between "'.$date_start->format("Y-m-d").' 00:00:00" and "'.$date_finish->format("Y-m-d").' 23:59:59"	
					GROUP BY ip;
				'));

	$visitas = count($wpdb->get_results('
					SELECT * 
					FROM '.$table_name.'
					WHERE datetime between "'.$date_start->format("Y-m-d").' 00:00:00" and "'.$date_finish->format("Y-m-d").' 23:59:59";	
				'));

	return array($usuarios, $visitas);
}

function VST_delete_table_records() {
	global $wpdb;
	$table_name = $wpdb->prefix . 'VST_registros';

	return $wpdb->query('DROP TABLE `'.$table_name.'`');
}