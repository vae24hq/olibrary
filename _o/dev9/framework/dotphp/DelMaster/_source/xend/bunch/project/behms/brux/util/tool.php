<?php


function oRandomiz($value='ruid'){
	if($value == 'puid'){$randomiz = mt_rand(10000000, 99999999);}
	if($value == 'suid'){$randomiz = mt_rand();}
	if($value == 'bind'){$randomiz = mt_rand().time();}
	if($value == 'username'){
		$alpha = array_merge(range('A', 'Z'),range('a', 'z'), range(0,9));
		shuffle($alpha);
		$randomiz = $alpha[2].$alpha[30].$alpha[14].$alpha[45].$alpha[50].time().$alpha[10].$alpha[19].$alpha[39].$alpha[7].$alpha[61];
	}
	if($value == 'short'){
		$alpha = array_merge(range('a', 'z'),range('A', 'Z'));
		shuffle($alpha);
		$randomiz = rand(10000,99999).$alpha[5].$alpha[21];
	}

	if($value == 'ruid'){
		$alpha = array_merge(range('A', 'Z'),range('a', 'z'), range(0,9));
		shuffle($alpha);
		$randomiz = $alpha[2].$alpha[30].$alpha[14].$alpha[45].$alpha[50].mt_rand().$alpha[10].$alpha[19].$alpha[39].$alpha[7].$alpha[61].time().$alpha[29].$alpha[17].$alpha[31];
	}

	if($value == 'cardno'){
		$randomiz = date('Ymd').mt_rand(10,99);
	}
	return $randomiz;
}

function oRedirect($location=''){
	if(!empty($location)){header('Location: '.$location);}
	exit;
}

function oRequest($iRequest=''){
	if(!empty($iRequest)){
		$oRequest = $iRequest;
	}
	elseif(isset($_REQUEST['oRequest']) && !empty($_REQUEST['oRequest'])){
		$oRequest = $_REQUEST['oRequest'];
	}
	else {
		$oRequest = 'default';
	}

	return strtolower($oRequest);
}

function oRoute($iRoute='o_SELF'){
	if(!empty($iRoute) && $iRoute != 'o_SELF' && $iRoute != 'o_URI'){
		$oRoute = $iRoute;
	}
	elseif($iRoute == 'o_SELF'){
		$oRoute = basename($_SERVER['PHP_SELF']);
		$oRoute = pathinfo($oRoute);
		$oRoute = $oRoute['filename'];
	}
	elseif($iRoute == 'o_URI'){
		$oRoute = $_SERVER['REQUEST_URI'];
	}
	else {
		$oRoute = 'index';
	}

	return strtolower($oRoute);
}
?>