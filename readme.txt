=== WP-Parsi Statistics ===
Contributors: AliRezaPro
Donate link: http://arghorbani.ir
Tags: wp-parsi,unique, statistic, visit , visitor , visitor statistic, Browser, hits, live visit, month, page, Post, sidebar, stats, summary, today, total, visitors, week, yearl, yesterday
Requires at least: 3.8
Tested up to: 3.8
Stable tag: 1.5
License: GPLv2

This plugin provide you full statistic of your site. You can show statistics with widget or many usefull function in your theme.

== Description ==
This plugin provide you full statistic of your site. You can show statistics with widget and 37 usefull function in your theme.
this plugin have 31 strong function for each type of output.
and 6 strong Special function which you can output from each date.
after install you can active widget and enjoye your site statistic.
widget have default style and if you want to change that and you know css and html can change style file in plugin folder.


Language Support:

* English
* Persian

Features:

* Today visits / unique visits
* Todaye all visits ->post/page
* Yesterday visitors / unique visits
* Yesterday All visits ->post/page
* Week visits / unique visits
* Week all visits ->post/page
* Last Week visits / unique visits
* Last two week visits / unique visits
* Month Visits / unique visits
* month all visits ->post/page
* Last Month visits / unique visits
* Last two month visits / unique visits
* Years Visit / unique visits
* Without any writing code


== Installation ==
for install version 1.5 , make sure remove wpp_increase_visited() function in your them.

1. Upload plugin folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to 'Widgets' and choose 'statistics'


* Functions list:
list of post functions
`<?php echo wpp_get_today_post_visit(); ?>`
define this function for get todaye 
`<?php echo wpp_get_yest_post_visit(); ?>`
`<?php echo wpp_get_week_post_visit(); ?>`
`<?php echo wpp_get_month_post_visit(); ?>`
`<?php echo wpp_get_year_post_visit(); ?>`
`<?php echo wpp_get_all_post_visit(); ?> `
`<?php echo wpp_get_top_post_visits($num); ?>`
show most popular posts(based on post visits)
example : echo wpp_get_top_post_visits(10);
this show 10 most popular post.You can change this parametr anything you want
`<?php echo wpp_get_specificDay_post_visit($date); ?>`
Show number visits of specific Day with this format ('2013/10/19')
`<?php echo wpp_get_post_visit_to_now($date); ?>`



list of global functions
`<?php echo wpp_get_today(); ?>`
`<?php echo wpp_get_yest(); ?>`
`<?php echo wpp_get_week(); ?>`
`<?php echo wpp_get_twoWeek_ago(); ?>`
`<?php echo wpp_get_month(); ?> `
`<?php echo wpp_get_twoMonth_ago(); ?>`
`<?php echo wpp_get_year(); ?>`
`<?php echo wpp_get_twoYears_ago(); ?>`
`<?php echo wpp_get_statistics(); ?> `
`<?php echo wpp_get_all_visit(); ?> `
`<?php echo wpp_get_unique_today(); ?>`
`<?php echo wpp_get_unique_yest(); ?> `
`<?php echo wpp_get_unique_week(); ?>`
`<?php echo wpp_get_unique_twoWeek_ago(); ?>`
`<?php echo wpp_get_unique_month(); ?> `
`<?php echo wpp_get_unique_twoMonth_ago(); ?>`
`<?php echo wpp_get_unique_year(); ?>`
`<?php echo wpp_get_unique_twoYears_ago(); ?>`
`<?php echo wpp_get_unique_statistics(); ?>`
`<?php echo wpp_get_all_unique_visit(); ?>`
`<?php echo wpp_get_specificDay_visits($date); ?>`
show number visits of specific Day with this format : ('2013/10/19')
`<?php echo wpp_get_unique_specificDay_visits($date); ?>`
`<?php echo wpp_get_specificDay_visits_to_now($date); ?>`
`<?php echo wpp_get_unique_specificDay_visits_to_now($date); ?>`


== Frequently Asked Questions ==

== Screenshots ==



== Changelog ==
= 1.5 =
* many change in core
* make seperate file and folder
* make class for post and page
* remove some query and some improve
* make it Automatic plugin

= 1.0 =
* Start the project...
