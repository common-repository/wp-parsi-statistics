<?php
include_once 'get_page_val.php';
include_once 'statistic_class.php';

class get_all_statistic_val {
    
    private $NewClassInitialize;
    private $PoststatisticArrays=null;
    private $wppPage = null;
    private $pageVal = null;
    
    
     public function __construct(){
        
        if($this->NewClassInitialize  instanceof get_page_statistic_val){
            return $this->NewClassInitialize;

        } else {
             $this->NewClassInitialize = $this->get_page_val();
        }
        
        if(is_null($this->PoststatisticArrays)){
            $this->GetPoststatisticArray();
            }
    }
    
    
    private function getMeStatistic(){
        if(is_null($this->wppPage)){
            $this->wppPage=new wpp_pageStatistic();
            $this->wppPage->__construct();
        }
        
        return $this->wppPage;
    }
    
    
    private function GetPoststatisticArray(){
        $st=$this->getMeStatistic();
        $this->PoststatisticArrays=$st->PoststatisticArray();
    }
    
    
    private function get_page_val(){
        if(is_null($this->pageVal)){
            $this->pageVal = new get_page_statistic_val();
        }
        
        return $this->pageVal;
    }


	public function wpp_get_all_today_visit() {
		$todaypost =$this->PoststatisticArrays['today'];
		$visit =  $this->NewClassInitialize->wpp_get_today();

		return $todaypost + $visit;
	}

	public function wpp_get_all_yest_visit() {
		$yestpost = $this->PoststatisticArrays['yest'];
		$visit =$this->NewClassInitialize-> wpp_get_yest();
		return $yestpost + $visit;
	}

	public function wpp_get_all_week_visit() {
		$weekpost = $this->PoststatisticArrays['week'];
		$visit = $this->NewClassInitialize-> wpp_get_week();
		return $weekpost + $visit;
	}

	public function wpp_get_all_month_visit() {
		$monthpost = $this->PoststatisticArrays['month'];
		$visit =$this->NewClassInitialize-> wpp_get_month();
		return $monthpost + $visit;
	}

	public function wpp_get_all_year_visit() {
		$yearpost = $this->PoststatisticArrays['year'];
		$visit = $this->NewClassInitialize-> wpp_get_today();
		return $yearpost + $visit;
	}

}
?>