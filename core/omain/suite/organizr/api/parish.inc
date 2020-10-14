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
	$fields = array('name', 'country', 'state', 'city', 'suburb');
	$e = IsRequired($input, $fields);
	if(!empty($e)){
		$omodel = $harvest->SQL_Response('error', $e);
	}
	else {
		#@TODO ~ possible duplicate & error check
		#ADD PARISH
		$euid = oRandom::Create('iEuid');
		$suid = oRandom::Create('iSuid');
		$puid = oRandom::Create('iPuid');

		$sql = "INSERT INTO `harv_parish` (`euid`, `suid`, `puid`, `name`, `country`, `state`, `city`, `suburb`)
		VALUES ('{$euid}', '{$suid}', '{$puid}', '{$input['name']}', '{$input['country']}', '{$input['state']}', '{$input['city']}', '{$input['suburb']}')";
		if($harvest->dbc->run($sql, 'iAffected') == 1){
			$v['record'] = 1;
			$v['recordset']['bind'] = $suid;
			$omodel = $harvest->SQL_Report('success', $v);
		}
	}
}