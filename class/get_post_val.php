<?php


class get_post_statistic_val {

	public function wpp_get_today_post_visit() {
		$now = date("Ymd");
		$postid = get_the_ID();
		global $wpdb;
		$result = $wpdb -> get_var("SELECT counter FROM " . $wpdb -> prefix . "p_statistic where post_id='$postid' and date='$now'");

		return $result;
	}

	public function wpp_get_yest_post_visit() {
		$yest = date('Ymd', strtotime('-1 day'));
		$postid = get_the_ID();
		global $wpdb;
		$result = $wpdb -> get_var("SELECT counter FROM " . $wpdb -> prefix . "p_statistic where post_id='$postid' and date='$yest'");

		return $result;

	}

	public function wpp_get_week_post_visit() {
		$week = date('Ymd', strtotime('-1 week'));
		$now = date("Ymd");
		$postid = get_the_ID();
		global $wpdb;
		$result = $wpdb -> get_var("SELECT sum(counter) FROM " . $wpdb -> prefix . "p_statistic where (post_id='$postid' and (date BETWEEN '$week' and '$now'))");

		return $result;

	}

	public function wpp_get_month_post_visit() {
		$month = date('Ymd', strtotime('-1 month'));
		$now = date("Ymd");
		$postid = get_the_ID();
		global $wpdb;
		$result = $wpdb -> get_var("SELECT sum(counter) FROM " . $wpdb -> prefix . "p_statistic where (post_id='$postid' and (date BETWEEN '$month' and '$now'))");

		return $result;

	}

	public function wpp_get_year_post_visit() {
		$year = date('Ymd', strtotime('-1 year'));
		$now = date("Ymd");
		$postid = get_the_ID();
		global $wpdb;
		$result = $wpdb -> get_var("SELECT sum(counter) FROM " . $wpdb -> prefix . "p_statistic where (post_id='$postid' and (date BETWEEN '$year' and  '$now'))");

		return $result;
	}

	public function wpp_get_all_one_post_visit() {
		$postid = get_the_ID();
		global $wpdb;
		$result = $wpdb -> get_var("SELECT sum(counter) FROM " . $wpdb -> prefix . "p_statistic where post_id='$postid'");

		return $result;
	}

	/**
	 *
	 * you can pass the number of post id you want to get
	 *
	 */
	public function wpp_get_top_post_visits($num) {
		global $wpdb;
		$result = $wpdb -> get_results("SELECT post_id,sum(counter)s FROM " . $wpdb -> prefix . "p_statistic group by (post_id) order by s desc limit $num");

		foreach ($result as $top) {
			echo $top -> post_id . "<br />";

		}
	}

	public function wpp_get_specificDay_post_visit($date) {
		try {
			$postid = get_the_ID();
			$d = str_replace('/', '', $date);
			global $wpdb;
			$result = $wpdb -> get_var("SELECT counter FROM " . $wpdb -> prefix . "p_statistic where post_id='$postid' and date='$d'");
			return $result;
		} catch (exception $s) {
			exit("you have error " . $s -> getMessage());
		}
	}

	// must be ok
	public function wpp_get_post_visit_to_now($date) {
		$now = date("Ymd");
		$d = str_replace('/', '', $date);
		$postid = get_the_ID();
		global $wpdb;
		$res = $wpdb -> get_results("SELECT post_id,counter,date FROM " . $wpdb -> prefix . "p_statistic where  post_id='$postid' and date='$d'");

		$count = 0;
		foreach ($res as $row) {
			if (($row -> date >= $d && $row -> date <= $now)) {
				$count += $row -> counter;
			}
		}
		return $count;
	}

}
?>