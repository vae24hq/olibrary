<?php
$currentHost = 'http://'. $_SERVER['HTTP_HOST'];
		$currentHost .= '/SHIM';
		
	$currentDirectory   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		
		//library
		$library = $currentHost.'/library';
			$class = $library.'/_class';
			$function = $library.'/_function';
			$utility = $library.'/_utility';
			
		//script
		$script = $currentHost.'/script';
			$ajax = $script.'/ajax';
			$css = $script.'/css';
			$jquery = $script.'/jquery';
			$js = $script.'/js';
			$spry = $script.'/spry';
?>