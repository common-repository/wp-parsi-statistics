<?php
 
 class wpp_pageStatistic {
    
    private $Now=null;
    
       public function __construct() {  
        $this -> wpp_make_date_visit();
        $this->wpp_make_date_post_visit();
        $this -> Now = date("Ymd");
   }
    

	//for Store value
	private $statistic = array("today" => 0, "yest" => 0, "week" => 0, "lweek" => 0, "month" => 0, "lmonth" => 0, "year" => 0, "lyear" => 0);
	private $Ustatistic = array("today" => 0, "yest" => 0, "week" => 0, "lweek" => 0, "month" => 0, "lmonth" => 0, "year" => 0, "lyear" => 0);
	private $post_statistic = array("today" => 0, "yest" => 0, "week" => 0, "month" => 0, "year" => 0, "all" => 0);

  //property for catch array in other class
    public function statisticArray(){
        return $this->statistic;
    }
    public function UstatisticArray(){
        return $this->Ustatistic;
    }
    public function PoststatisticArray(){
        return $this->post_statistic;
    }



    private function wpp_get_post_visit()
    {
        global $wpdb;
        return $res = $wpdb->get_results("SELECT post_id,counter,date FROM " . $wpdb->
            prefix . "p_statistic");
    }

    public function wpp_make_date_post_visit()
    {
        $res = $this->wpp_get_post_visit();
        $now = $this->Now;
        foreach ($res as $row) {
            if ($now == $row->date) {
                $this->post_statistic['today'] += $row->counter;
            }
            if ((date('Ymd', strtotime('-1 day'))) == $row->date) {
                $this->post_statistic['yest'] += $row->counter;
            }
            if ($row->date >= (date('Ymd', strtotime('-1 week'))) && $row->date <= (date('Ymd',
                strtotime('-1 day')))) {
                $this->post_statistic['week'] += $row->counter;
            }

            if ($row->date >= (date('Ymd', strtotime('-1 month'))) && $row->date <= (date('Ymd',
                strtotime('-1 day')))) {
                $this->post_statistic['month'] += $row->counter;
            }

            if ($row->date >= (date('Ymd', strtotime('-1 year'))) && $row->date <= (date('Ymd',
                strtotime('-1 day')))) {
                $this->post_statistic['year'] += $row->counter;
            }
        }
    }
    

	/*
	 * this function for increase counter
     * check if is today ? Increase Counter and if is not today ? create record
	 *
	 */
	public function wpp_increase_visited() {
		$ip = $this -> wpp_getIp();
		$now = $this->Now;
		global $wpdb;
		$res = $wpdb -> get_results("SELECT sid,date,count FROM " . $wpdb -> prefix . "static where date='$now'");
		if (count($res) > 0) {//if today record exist ? increase
			foreach ($res as $row) {
				$newcount = $row -> count + 1;
				////get nunber of today visitor and increase that
				$sid = $row -> sid;
				///update count filed for increase
				$wpdb -> query("UPDATE " . $wpdb -> prefix . "static SET `count`= " . $newcount . " WHERE `date`='$now'");
				/////////------check if ip not exist in db insert that for unique statistic------//////////////////////////////////////////
				$res = $wpdb -> get_row("select ip from " . $wpdb -> prefix . "ip_log where ip='$ip'");

				if (count($res) == 0) {
					$wpdb -> query("INSERT INTO " . $wpdb -> prefix . "ip_log (`sid`, `ip`) VALUES ('" . $sid . "', '" . $ip . "')");
				}

			}
		} else//if today record not exist , create that
		{
			$countNum = "1";
			$wpdb -> query("INSERT INTO " . $wpdb -> prefix . "static (`date`, `count`) VALUES ('" . $now . "', '" . $countNum . "')");

			$wpdb -> query("INSERT INTO " . $wpdb -> prefix . "ip_log (`sid`, `ip`) VALUES ('" . $wpdb->insert_id . "', '" . $ip . "');");
		}

	}

	/*
	 *
	 * this function makes the date and field the arraye as today and yest and ..
	 */
	private function wpp_make_date_visit() {
		$getStatistic = $this -> wpp_Get_statistic();
		foreach ($getStatistic as $row) {
			if ($this->Now == $row -> date) {
				$this -> statistic['today'] = $row -> count;
				$this -> Ustatistic['today'] = $this -> wpp_Get_unique_statistic($row -> sid);
			}
			if ((date('Ymd', strtotime('-1 day'))) == $row -> date) {
				$this -> statistic['yest'] = $row -> count;
				$this -> Ustatistic['yest'] = $this -> wpp_Get_unique_statistic($row -> sid);
			}
			if ($row -> date >= date('Ymd', strtotime('-1 week')) && $row -> date <= date('Ymd', strtotime('-1 day'))) {
				$this -> statistic['week'] += $row -> count;
				$this -> Ustatistic['week'] += $this -> wpp_Get_unique_statistic($row -> sid);
			}
			if ($row -> date >= date('Ymd', strtotime('-2 week')) && $row -> date <= (date('Ymd', strtotime('-1 week')))) {
				$this -> statistic['lweek'] += $row -> count;
				$this -> Ustatistic['lweek'] += $this -> wpp_Get_unique_statistic($row -> sid);
			}
			if ($row -> date >= date('Ymd', strtotime('-1 month')) && $row -> date <= date('Ymd', strtotime('-1 day'))) {
				$this -> statistic['month'] += $row -> count;
				$this -> Ustatistic['month'] += $this -> wpp_Get_unique_statistic($row -> sid);
			}
			if ($row -> date >= date('Ymd', strtotime('-2 month')) && $row -> date <= (date('Ymd', strtotime('-1 month')))) {
				$this -> statistic['lmonth'] += $row -> count;
				$this -> Ustatistic['lmonth'] += $this -> wpp_Get_unique_statistic($row -> sid);
			}
			if ($row -> date >= date('Ymd', strtotime('-1 year')) && $row -> date <= date('Ymd', strtotime('-1 day'))) {
				$this -> statistic['year'] += $row -> count;
				$this -> Ustatistic['year'] += $this -> wpp_Get_unique_statistic($row -> sid);
			}
			if ($row -> date >= date('Ymd', strtotime('-2 year')) && $row -> date <= date('Ymd', strtotime('-1 year'))) {
				$this -> statistic['lyear'] += $row -> count;
				$this -> Ustatistic['lyear'] += $this -> wpp_Get_unique_statistic($row -> sid);
			}
		}

	}

	public function wpp_increase_Post_Counter() {
		$postid = get_the_ID();
		global $wpdb;
        $now = $this->Now;
		$rest = $wpdb -> get_var("SELECT counter FROM " . $wpdb -> prefix . "p_statistic where post_id='$postid' and date='$now'");
		if (empty($rest)) {
			$wpdb -> query("INSERT INTO " . $wpdb -> prefix . "p_statistic (`post_id`, `counter`,`date`) VALUES ('" . $postid . "', '1','" . $now . "');");
		} else {
			$st = $rest + 1;
			$wpdb -> query("UPDATE " . $wpdb -> prefix . "p_statistic SET `counter`= '$st'
                          WHERE post_id='$postid' and date='$now'");
		}
	}

	//----------------------------------------------------------------------------------

	public function wpp_Get_statistic() {
		global $wpdb;
		return $res = $wpdb -> get_results("SELECT sid,date,count FROM " . $wpdb -> prefix . "static");

	}

	public function wpp_Get_unique_statistic($sid) {
		global $wpdb;
		$result = $wpdb -> get_results("SELECT sid FROM " . $wpdb -> prefix . "ip_log where sid='$sid'");
		$count = $wpdb->num_rows;
		return $count;
	}
  
  //give me ip for unique statistic
	private function wpp_getIp() {

		$ip = $_SERVER['REMOTE_ADDR'];
		if ($ip) {
			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			}
			return $ip;
		}
		return false;
	}

}
?>