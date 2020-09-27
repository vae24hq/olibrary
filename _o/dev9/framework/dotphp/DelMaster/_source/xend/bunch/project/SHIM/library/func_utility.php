<?php
	//require_once("_function/func_display.php");
	
		function get_script() {
		$script_name = $_SERVER['PHP_SELF'];
		return $script_name;
	}
	
	function get_referrer() {
		if(isset($_SERVER['HTTP_referrer'])){
			$the_referrer = $_SERVER['HTTP_referrer'];
			return $the_referrer;
		}
		else {
			print_msg("The browser returned no referrer information");
			return;
		}
	}
		
	function inc($incfile = '', $once = 'unset') { //include file		
		if($incfile == '') { //if filename is not specified
			$msg = "Cannot include file without name";
			print_msg("$msg"); 
			
		}		
		else { //filename specified
			//check if file exist
			if (file_exists($incfile)) { //file found
				if($once == 'set') {
					include_once("$incfile");
				} 
				else {
					include("$incfile");
				}
				return;
			}
			else { //file not found
				$msg="The file <strong>{$incfile}</strong> is not accessible";
				print_msg("$msg");
			}			
		}
		return;
	}
	
	function redirect($url = '', $duration = 'now', $scope = 'local') { //url redirect
		if ($url == '') {
			$msg = "Specify <strong>location</strong> for redirect!";
			print_msg("$msg");				
		}		
		else {
			if ($scope == 'local') { //local scope redirect
				 $ownhost  = $_SERVER['HTTP_HOST'];
				 $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				if (!headers_sent()) {
					if($duration == 'now'){
						header("Location: http://{$ownhost}{$uri}/{$url}");
						exit;
					} 
					else {
						header("Refresh: $duration; URL=http://{$ownhost}{$uri}/{$url}");
					}
					
				} 
				else { 
					$result = "<p>
								<strong>Opps!</strong>
								<br/>It seems a minor error has occured!
								<br/>Please <a " ."href=\"http://{$ownhost}{$uri}/{$url}\">click here</a> to proceed\n</p>";
					print_msg($result);
				}

			}
			else if($scope == 'global') {
				if (!headers_sent()) {
					if($duration == 'now'){
						header("Location: http://{$url}");
						exit;
					}
					else {
						header("Refresh: $duration; URL=http://{$url}");
					}
				} 
				else { 
					$result = "<p>
							<strong>Opps!</strong>
							<br/>A minor error has occured!
							<br/>Please click <a " ."href=\"http://{$url}\">click here</a> to proceed\n</p>";
					print_msg($result);
				}
			}
		}
	}
		
	
	
	function getUrlAction() {
			if(isset($_GET['act']) && $_GET['act'] != '') {
				$task = $_GET['act'];
			}
			else {
				$task = 'default';
			}
			return $task;
		}
		
		function showUrlArea($area) {
			$getActUrl = getUrlAction();
			if($area == $getActUrl) {
			 $showArea = 'yes';
			}
			else {
				$showArea = 'no';
			}
			return $showArea;
		}
		
		function toggleSortOrder($toggleFor) {
			
			if(isset($_GET['sorting'])) {
				$sorting = $_GET['sorting'];
			}
			else {
				$sorting = '';
			}
			
			$orderIn = 'ASC';			
			if($toggleFor == $sorting) {
				if(isset($_GET['order']) && $_GET['order'] == 'ASC'){
					$orderIn = 'DESC';
				} 
			}
			return $orderIn;
		}
		
		function cleanUrlSort($value) {
			$order = toggleSortOrder($value);
			$getUrlOn = $_SERVER['QUERY_STRING'];
			$getUrlOn = strstr($getUrlOn, 'sorting' , true);			
			if($getUrlOn == '') {
				$getUrlOn = $_SERVER['QUERY_STRING'];
				$getUrlOn = $getUrlOn ."&sorting=".$value."&order=".$order;
			} 
			else {
				$getUrlOn = $getUrlOn ."sorting=".$value."&order=".$order;
			}
			 $getUrlOn = cleanOffPagination($getUrlOn);
			 echo $getUrlOn;
			return;		
		}
		
		function cleanUrlShow($value) {
			
			$getUrlOn = $_SERVER['QUERY_STRING'];
			$getUrlOn = strstr($getUrlOn, 'show' , true);		
						
			if($getUrlOn == '') {
				$getUrlOn = $_SERVER['QUERY_STRING'];
				if($value != 'default') {
					$getUrlOn = $getUrlOn ."&show=".$value;
				}
			} 
			else {
				if($value != 'default') {
					$getUrlOn = $getUrlOn ."show=".$value;
				} 
				else {
					$getUrlOn = rtrim($getUrlOn, '&');
				}
			}
			 
			 $getUrlOn = cleanOffPagination($getUrlOn);
			echo $getUrlOn;
			return;		
		}
		
	
	function cleanOffPagination($getUrlOn = '', $pageNum = '', $totalRows = '') {
		if($getUrlOn == '') { $getUrlOn = $_SERVER['QUERY_STRING'];}
		if($pageNum == '') { if(isset($_GET['pageNum_DataSet'])) {$pageNum = $_GET['pageNum_DataSet'];} else {$pageNum = '';}}
		if($totalRows == '') { if(isset($_GET['totalRows_DataSet'])) { $totalRows = $_GET['totalRows_DataSet'];} else {$totalRows = '';}}		
				$cleanPageNum = ("pageNum_DataSet={$pageNum}&totalRows_DataSet={$totalRows}&");
				$getUrlOn = str_replace($cleanPageNum, '', $getUrlOn);
				
		return $getUrlOn;
	}
		 
		 
	function currentPage($set = 'removeIndex') {
		$page = $_SERVER["PHP_SELF"];
		if($set == 'removeIndex') {$page = str_replace('index.php', '', $page);}
		return $page;
	}
		
	function get_client_ip() {
    $ipaddress = '';
    if ($_SERVER['HTTP_CLIENT_IP'])
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if($_SERVER['HTTP_X_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if($_SERVER['HTTP_X_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if($_SERVER['HTTP_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if($_SERVER['HTTP_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if($_SERVER['REMOTE_ADDR'])
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
 
    return $ipaddress;
}
?>