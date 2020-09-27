<?php
/* PYPE™ - web development framework [HTML/CSS/PHP/SQL/JS/MORE]
 * PHP | utility::pagination
 * Dependency »
 */

function cleanIndexURL(){
	$page = $_SERVER["PHP_SELF"];
	$page = str_replace('index.php', '', $page);
	return $page;
}

function paginationClean($queryString = '', $pageNo = '', $totalRows = '') {
	if(empty($queryString)){$queryString = $_SERVER['QUERY_STRING'];}
	if(empty($pageNo)){
		if(!empty($_GET['pageNo_DataSet'])){
			$pageNo = $_GET['pageNo_DataSet'];
		}
	}
	if(empty($totalRows)){
		if(!empty($_GET['totalRows_DataSet'])){
			$totalRows = $_GET['totalRows_DataSet'];
		}
	}		
	
	$pageNoClean = ("pageNo_DataSet={$pageNo}&totalRows_DataSet={$totalRows}&");
	$queryString = str_replace($pageNoClean, '', $queryString);				
	return $queryString;
}

class Sorting {
	public $orderIs = 'ascending';

	function __construct(){
		if(!empty($_REQUEST['order'])){
			$order = $_REQUEST['order'];
			$orders = array('ascending','descending');
			if(in_array($order, $orders)){
				$this->orderIs = $order;
			}
		}
	}

	public function toggleOrder(){
		if($this->orderIs =='ascending'){$task = 'descending';}
		else {$task = 'ascending';}
		return $task;
	}

	public function SQLOrder(){
		if($this->orderIs =='ascending'){$task = 'ASC';}
		if($this->orderIs =='descending'){$task = 'DESC';}
		return $task;
	}
}
?>