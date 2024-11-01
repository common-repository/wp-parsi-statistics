<?php

function wp_parsi_statistics_unistall() {
	global $table_prefix,$wpdb;

	$wpdb->query( "DROP TABLE IF EXISTS " . $table_prefix . "ip_log");
   	$wpdb->query( "DROP TABLE IF EXISTS " . $table_prefix . "static");
   	$wpdb->query( "DROP TABLE IF EXISTS  " . $table_prefix . "p_statistic");

delete_option( 'wp_parsi_statistics_ver' );
}


?>