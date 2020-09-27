<?php


//Login User
function login($email, $password, $type){
	$dataset['email'] = $email;
	$dataset['password'] = $password;
	$dataset['type'] = $type;
	
	$result = selectDB('email', 'user', $dataset);
	if($result === TRUE){return TRUE;}
	return FALSE;
}


//Authenticate User
function authenticate($email, $type){
	$dataset['email'] = $email;
	$dataset['type'] = $type;
	
	$result = selectDB('email', 'user', $dataset);
	if($result === TRUE){return TRUE;}
	return FALSE;
}

//active user's information
function userActive(){
	$dataset['email'] = $_SESSION['email'];
	$result = selectDB('*', 'user', $dataset, 'record');
	if($result === FALSE || isMultiDi($result) === TRUE){return FALSE;}
	return $result;
}

// List of Trackings
function trackings($return='json'){
	$query = "SELECT * FROM `record` ORDER BY `id` DESC";
	$result = queryDB($query, 'record');
	if($result === FALSE){return FALSE;}
	if($return == 'json'){return json_encode($result);}
	return $result;
}

// Find tracking record
function tracking($bind='', $return='json'){
	$query = "SELECT * FROM `record` WHERE `bind` = '$bind' LIMIT 1";
	$result = queryDB($query, 'record');
	if($result === FALSE){return FALSE;}
	if($return == 'json'){return json_encode($result);}
	elseif(isMultiDi($result)){$result = $result[0];}
	return $result;
}

// Delete tracking record
function trackingDelete($bind=''){
	$query = "DELETE FROM `record` WHERE `bind` = '$bind' LIMIT 1";
	$result = queryDB($query, 'boolean');
	if($result === FALSE){return FALSE;}
	return TRUE;
}

//Create Record
function trackingCreate($dataset){
	$result = insertDB($dataset, 'record');
	if($result === TRUE){return TRUE;}
	return FALSE;
}
?>