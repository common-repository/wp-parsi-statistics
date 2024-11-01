<?php
/*
Plugin Name: WP-Parsi Statistic
Plugin URI: http://forum.wp-parsi.com
Author: Alireza Ghorbani
Author URI: http://arghorbani.ir
Description: This plugin provide you full statistic of your site. You can show statistics with widget or many usefull function in your theme.
Version: 1.5
*/


define('WP_PARSI_STATISTICS', '1.5');
define('WP_STATISTIC',plugins_url()."/".dirname( plugin_basename( __FILE__ ) ) );


function wpp_add_style_statistics(){
    echo "<link rel='stylesheet' href='".WP_STATISTIC."/css/style.css"."' type='text/css' media='all' />";
}
add_action('wp_head','wpp_add_style_statistics');    

// call function when user want to delete plugin
include_once( dirname( __FILE__ ) . '/unistall.php');
register_uninstall_hook(__file__, 'wp_parsi_statistics_unistall');

include_once( dirname( __FILE__ ) . '/widget.php');

include_once( dirname( __FILE__ ) . '/class/statistic_class.php');
include_once( dirname( __FILE__ ) . '/class/get_page_val.php');
include_once( dirname( __FILE__ ) . '/class/get_post_val.php');
include_once( dirname( __FILE__ ) . '/class/get_all_statistic_val.php');


/////////define textdomain for language/////////////
load_plugin_textdomain('wp-parsi-st',  false, dirname( plugin_basename( __FILE__ ) ) . '/languages/');


add_action('shutdown', 'wp_parsi_statistic_action');

function wp_parsi_statistic_action() {

	if (is_home()) {
		$pageStatic =new wpp_pageStatistic();
		$pageStatic -> wpp_increase_visited();
	}

	if (is_single()) {
		$pageStatic = new wpp_pageStatistic();
		$pageStatic -> wpp_increase_Post_Counter();
	}

}
    
    
    
$beforeinstalled = get_option('wp_parsi_statistics_ver');
if ($beforeinstalled != WP_PARSI_STATISTICS) {
	if ($beforeinstalled == false) {
		include_once (dirname(__FILE__) . '/install.php');
		register_activation_hook(__FILE__, 'wpp_create_tabless');
	} else {
		include_once (dirname(__FILE__) . '/upgrade.php');
	}
}




function wppst_load_widgets()
{
    register_widget('WPPST_Widget');
}
add_action('widgets_init', 'wppst_load_widgets');


?>