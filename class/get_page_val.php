<?php
include_once 'statistic_class.php';

class get_page_statistic_val {
    
    private $statisticArray=null;
    private $UniqueStatisticArray=null;
    private $wppPage= null;
    
     public function __construct(){

        if(is_null($this->statisticArray)){
            $this->GetPagestatisticArray();
            }
        if(is_null($this->UniqueStatisticArray)){
            $this->GetPageUniquestatisticArray();
            }

    }
      private function GetPoststatisticArray(){
        if(is_null($this->wppPage)){
            $this->wppPage=new wpp_pageStatistic();
            $this->wppPage->__construct();
        }
        
        return $this->wppPage;  
    }
    
    private function GetPagestatisticArray(){
       $StatisticPageObject=$this->GetPoststatisticArray();
        $this->statisticArray=$StatisticPageObject->statisticArray();
    }
     private function GetPageUniquestatisticArray(){
         $StatisticPageObject=$this->GetPoststatisticArray();
        $this->UniqueStatisticArray=$StatisticPageObject->UstatisticArray();
    }
    
// this function return today statistic and other function return yesterdaye and ...
	public function wpp_get_today() {
		return $this->statisticArray['today'];
	}

	public function wpp_get_yest() {
		return $this->statisticArray['yest'];
	}

	public function wpp_get_week() {
		return $this->statisticArray['week'];
	}

	public function wpp_get_twoWeek_ago() {
		return $this->statisticArray['lweek'];
	}

	public function wpp_get_month() {
		return $this->statisticArray['month'];
	}

	public function wpp_get_twoMonth_ago() {
		return $this->statisticArray['lmonth'];
	}

	public function wpp_get_year() {
		return $this->statisticArray['year'];
	}

	public function wpp_get_twoYears_ago() {
		return $this->statisticArray['lyear'];
	}

	public function wpp_get_statistics() {
		return $this->statisticArray;
	}
    
// this function gives you all statistic
	public function wpp_get_all_visit() {
	   $StatisticPageObject=$this->GetPoststatisticArray();
		$select = $StatisticPageObject->wpp_Get_statistic();
		$counter = 0;
		foreach ($select as $row) {
			$counter += $row -> count;
		}
		return $counter;
	}
//this function gives you today unque statistic
	public function wpp_get_unique_today() {
		return $this->UniqueStatisticArray['today'];
	}

	public function wpp_get_unique_yest() {
		return $this->UniqueStatisticArray['yest'];
	}

	public function wpp_get_unique_week() {
		return $this->UniqueStatisticArray['week'];
	}

	public function wpp_get_unique_twoWeek_ago() {
		return $this->UniqueStatisticArray['lweek'];
	}

	public function wpp_get_unique_month() {
		return $this->UniqueStatisticArray['month'];
	}

	public function wpp_get_unique_twoMonth_ago() {
		return $this->UniqueStatisticArray['lmonth'];
	}

	public function wpp_get_unique_year() {
		return $this->UniqueStatisticArray['year'];
	}

	public function wpp_get_unique_twoYears_ago() {
		return $this->UniqueStatisticArray['lyear'];
	}

	public function wpp_get_unique_statistics() {
		return $this->UniqueStatisticArray;
	}
//this function gives you all nnique visits
	public function wpp_get_all_unique_visit() {
		global $wpdb;
		$result = $wpdb -> get_var("SELECT count(id) FROM " . $wpdb -> prefix . "ip_log");

		return $result;
	}

	//this 4  function Additional function to customize your statistication
	//in this function you can pass the date and get statistic of that day !
	/*
	 *
	 *
	 */
	public function wpp_get_specificDay_visits($date) {// you can pass the date as argument for gets statistic for that date
		try {
			$d = str_replace('/', '', $date);
			global $wpdb;
			$result = $wpdb -> get_var("SELECT count FROM " . $wpdb -> prefix . "static where date='$d'");
			return $result;
		} catch (exception $s) {
			exit("you have error " . $s -> getMessage());
		}

	}

	public function wpp_get_unique_specificDay_visits($date) {//you can pass the date as argument for gets all unique visits of that date
		try {
			global $wpdb;
			$d = str_replace('/', '', $date);
			$sid = $wpdb -> get_var("SELECT sid FROM " . $wpdb -> prefix . "ip_log where date='$d'");
            $sta=$this->GetPoststatisticArray();
			$counter =$sta-> wpp_Get_unique_statistic($sid);
			return $counter;
		} catch (exception $e) {
			exit("you have error " . $s -> getMessage());
		}
	}

	public function wpp_get_specificDay_visits_to_now($date) {//you pass argument (date) and thsi function gives you all visites of that date to now
		try {
			$now = date("Ymd");
			$d = str_replace('/', '', $date);
            $sta=$this->GetPoststatisticArray();
			$getData = $sta-> wpp_Get_statistic();
			$count = 0;
			foreach ($getData as $row) {
				if (($d <= $row -> date)) {
					$count += $row -> count;
				}
			}
			return $count;
		} catch (exception $e) {
			exit("you have error " . $s -> getMessage());
		}
	}

	public function wpp_get_unique_specificDay_visits_to_now($date) {
		try {
			$d = str_replace('/', '', $date);
            $sta=$this->GetPoststatisticArray();
			$getData = $sta-> wpp_Get_statistic();

			$counter = 0;
			foreach ($getData as $row) {
				if (($d <= $row -> date)) {
					$counter += $sta-> wpp_Get_unique_statistic($row -> sid);
				}
			}
			return $counter;
		} catch (exception $e) {
			exit("you have error " . $s -> getMessage());
		}
	}

}
?>