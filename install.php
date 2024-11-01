<?php

if (is_admin())
{
    function wpp_create_tabless()
    {
        require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
        global $table_prefix;
        $tables = "
      CREATE TABLE " . $table_prefix . "ip_log (
      `id` bigint(20) NOT NULL AUTO_INCREMENT,
      `sid` bigint(20) DEFAULT NULL,
      `ip` varchar(15) DEFAULT NULL,
      PRIMARY KEY (`id`)
      ) DEFAULT CHARSET=utf8;

      CREATE TABLE " . $table_prefix . "static (
      `sid` bigint(20) NOT NULL AUTO_INCREMENT,
      `date` varchar(10) COLLATE utf8_persian_ci DEFAULT NULL,
      `count` bigint(20) DEFAULT NULL,
      PRIMARY KEY (`sid`)
      ) DEFAULT CHARSET=utf8 ;

      CREATE TABLE  " . $table_prefix . "p_statistic (
      `id` bigint(20) NOT NULL AUTO_INCREMENT,
      `post_id` bigint(20) NOT NULL,
      `counter` bigint(20) NOT NULL,
      `date` varchar(10) DEFAULT NULL,
      PRIMARY KEY (`id`)
      ) DEFAULT CHARSET=utf8 ;
      ";
        dbDelta($tables);
        update_option('wp_parsi_statistics_ver', WP_PARSI_STATISTICS);
    }

}

?>