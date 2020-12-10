<?php
// Prepare Route
function route($type='o_auto', $uri='o_auto'){
	# define & set value for $type
	if(empty($type) || $type == 'o_auto'){
		$type = 'link';
		if(isset($_GET['go'])){$type = 'go';}
		elseif(isset($_GET['api'])){$type = 'api';}
		elseif(isset($_GET['redirect'])){$type = 'redirect';}
		elseif(isset($_GET['download'])){$type = 'download';}
		elseif(isset($_GET['app'])){$type = 'app';}
	}
	else {
		$types = array('link','go','api','redirect','download','app');
		if(!in_array($type, $types)){$type = 'link';}
	}

	# define & set value for $uri
	if(empty($uri)){$uri = 'index';}
	elseif($uri == 'o_auto'){
		if(isset($_GET[$type])){
			if(!empty($_GET[$type])){$uri = $_GET[$type];}
			else {$uri = 'index';}
		}
		else {
			$route = route();
			$uri = $route['uri'];
		}
	}

	# return
	$route = array();
	if(!empty($type)){$route['type'] = $type;}
	if(!empty($uri)){$route['uri'] = $uri;}
	return $route;
}

function routeInfo($return='o_all'){
	$route = route();
	if($return=='type'){return $route['type'];}
	elseif($return=='uri'){return $route['uri'];}
	else {return $route;}
}

function getActiveLink(){
	$routeInfo = routeInfo();
	if($routeInfo['type'] == 'link'){return $routeInfo['uri'];}
}
?>