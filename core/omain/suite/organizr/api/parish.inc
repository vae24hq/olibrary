<?php
// // if($state == 'failed'){
// // 	$response['status'] = 'F9';
// // 	$response['reason'] = 'ping failed';
// // 	$response['message'] = 'A failure response was initiated';
// // }
// // elseif($state == 'success'){
// // 	$response['status'] = 'OK';
// // 	$response['record'] = 1;
// // 	$response['recordset'] = array('project' => $harvest->project['name'], 'version' => $harvest->project['version']);
// // }

// if($state == 'default'){

// }

#CREATE
if($state == 'create'){
	$input = array();
	if(!empty($_REQUEST)){$input = $_REQUEST;} #@TODO - change to $_POST & use DATA
	$fields = array('phone', 'password', 'surname', 'firstname');
	$e = IsRequired($input, $fields);
	if(!empty($e)){
		#return $this->SQL_Response('error', $e);
	}
}