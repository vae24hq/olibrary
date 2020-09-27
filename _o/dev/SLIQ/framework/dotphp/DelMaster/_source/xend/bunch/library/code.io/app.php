<?php


// Create new user
function create_user($dataset){
	$insert = insertDB($dataset, 'user');
	if($insert === TRUE){return TRUE;}	
	return FALSE; #return $insert;
}
?>