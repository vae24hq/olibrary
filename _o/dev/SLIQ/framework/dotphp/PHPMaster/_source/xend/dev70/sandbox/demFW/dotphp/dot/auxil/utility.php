<?php
// Debugging
function dbug($data, $printAs=''){
	if($printAs == 'json'){return jsonResp($data);}
	else {
		if(is_array($data)){
			if(count($data) !== count($data, COUNT_RECURSIVE)){print_r($data);}
			else {
				foreach ($data as $key => $value){
					echo '<strong>'.$key.':</strong> '. $value.'<br>';
				}
			}
		}
		else {
			var_dump($data);
		}
	}
	die();
}

// JSON Output
function jsonResp($data){
	if(!empty($data)){
		header('Content-Type: application/json');
		echo json_encode($data);
		exit;
	}
}

// Get Site
function site($input='o_auto'){
	if(!empty($input) && $input != 'o_auto'){$site = $input;}
	elseif(!empty($_GET['site'])){$site = $_GET['site'];}
	else {$site = 'E404A1';}
	return $site;
}

function oRedirect($location=''){
	if(!empty($location)){header('Location: '.$location);}
	exit;
}

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

?>