<?php
function jsonAPI($data){
	if(!empty($data)){
		header('Content-Type: application/json');
		echo json_encode($data);
		exit;
	}
}

function dbug($data){
	var_dump($data);
	die();
}
?>