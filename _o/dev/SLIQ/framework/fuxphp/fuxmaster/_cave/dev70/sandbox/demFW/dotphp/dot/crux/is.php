<?php
function isPHP($process='version'){
	$result = 'e204';
	if($process=='version'){$result = phpversion();}

	if(isset($result)){return $result;}
}

function isApache($process='version'){
	$result = 'e204';
	if($process=='version'){$result = apache_get_version();}

	if(isset($result)){return $result;}
}

function isArrayMulti($data){
	if(is_array($data)){
		$result = array_filter($data,'is_array');
		if(count($result)>0) return TRUE;
	}
	return FALSE;
}

function isEmpty($data=''){
	if(!isset($data)){return TRUE;}
	else {
		if(is_array($data)){
			if(empty($data)){return TRUE;}
		} else {
			$data = trim($data);
			$length = strlen($data);
			if($length<1){return TRUE;}
		}
	}

	return FALSE;
}

function isActiveLink($uri=''){
	$activeLink = getActiveLink();
	if($uri == $activeLink){return TRUE;}
	return FALSE;
}
?>