<?php
function jsonResp($data){
	if(!empty($data)){
		header('Content-Type: application/json');
		echo json_encode($data);
		exit;
	}
}

function isArrayMulti($data){
	$result = array_filter($data,'is_array');
	if(count($result)>0) return TRUE;
	return FALSE;
}

function dbug($data){
	if(is_array($data)){
		if (count($data) !== count($data, COUNT_RECURSIVE)){print_r($data);}
			else {
				foreach ($data as $key => $value){echo '<strong>'.$key.':</strong> '. $value.'<br>';}
			}
	}
	else {var_dump($data);}
	die();
}
?>