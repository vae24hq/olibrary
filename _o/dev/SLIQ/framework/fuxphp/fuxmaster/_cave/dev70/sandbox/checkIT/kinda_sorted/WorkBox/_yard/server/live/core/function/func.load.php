<?php
	function loadsite($type='page') {
		if(isset($_GET['link']) && ($_GET['link'] != '')) {$link = $_GET['link'];}	else {$link = 'home';}
		
		$pages = array('home','about-us','services','products','gallery','contact-us','legal-information','terms','privacy-policy','media-center','subscribed');
		if(!in_array($link, $pages)) { $link = 'home';}
		
		if($type == 'page') {
			$page =  str_replace('-', '_', $link).'.php';
			include('core/page/'."{$page}");
			return;
		}
		
		if($type == 'link') { return $link; }
	}
?>