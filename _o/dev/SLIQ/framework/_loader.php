<?php 
	class loader {
		function geturl($url = 'autoget') {
			if(isset($_GET['url']) && ($_GET['url'] != '')) { $urlvalue = $_GET['url'];}
			else {$urlvalue = "index";}
			$urlvalue = strtolower($urlvalue);					
			return $urlvalue;
		}
				
		function getpage() {
			$url = $this->geturl();
			$url = str_replace('-', '_', $url);
			$page = $url;			
			return $page;			
		}
		
		function get_title() {			
			$url = $this->geturl();
			$url = str_replace('-', ' ', $url);
			$title = ucwords($url);
			if($title =='Index') {
				$pagetitle = 'Welcome to Christ\'s Evangelical Ministry for Salvation';
			} else {
			$pagetitle = $title.' :: CEMS - Christ\'s Evangelical Ministry for Salvation';
			}
			echo $pagetitle;
			return;
		}
		
		function layout() {
			$ui = $this->getpage();
			if($ui == 'index' || $ui == 'home') {$ui = 'primary';}
			elseif($ui == 'redirect') {$ui = 'redirect';}
			else {$ui = 'secondary';}
			return $ui;
		}
		
		function loadpage() {
			$page = $this->getpage();
			if($page =='index') {$page = 'home';}			
			$page = $page.'.php';
			include($page);
			return;
		}
		
		function section($section) {
			include($section.'.php');			
			return;			
		}
		
	}
	$loader = new loader;
	$layout = $loader->layout();
 ?>