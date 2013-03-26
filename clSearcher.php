<?php
$clSearcher = new clSearcher();

class clSearcher {

	private $portalURL = "http://geo.craigslist.org/iso/us/";

	private $in;

	public function __construct() {
		require_once 'phpQuery.php';
		$this->in = json_decode(file_get_contents("php://input"));
		switch ($this->in->f) {
			case "getLocations":
				$this->getLocations();
				break;
			
			case "getJobs":
				@$this->getJobs($this->in->startDate, $this->in->endDate, $this->in->locID, $this->in->locURL, $this->in->search, $this->in->adds);
				break;
		}
	}

	public function getLocations() {
		$locations = array();
		
		$doc = file_get_contents($this->portalURL);
		$doc = phpQuery::newDocumentHTML($doc);
		
		foreach (pq("#list > a") as $location) {
			$obj = new stdClass();
			$obj->url = pq($location)->attr("href");
			$obj->name = pq($location)->text();
			$locations[] = $obj;
		}
		
		echo json_encode($locations);
	}

	public function getJobs($startDate, $endDate, $locID, $locURL, $search, $adds) {
		$startDate = strtotime("{$startDate}");
		$endDate = strtotime("{$endDate} 23:59:59");
		
		$jobs = array();
		
		$doc = file_get_contents("{$locURL}search/jjj/?zoomToPosting=&query={$search}&srchType=A&{$adds}");
		$doc = phpQuery::newDocumentHTML($doc);
		
		foreach (pq(".pl") as $job) {
			$jobDate = strtotime(pq($job)->children(".itemdate")->text());
			
			if ($jobDate >= $startDate && $jobDate <= $endDate) {
				$obj = new stdClass();
				$obj->url = pq($job)->children("a")->attr("href");
				$obj->title = pq($job)->children("a")->text();
				$jobs[] = $obj;
			}
		}
		
		echo json_encode($jobs);
	}

}

?>