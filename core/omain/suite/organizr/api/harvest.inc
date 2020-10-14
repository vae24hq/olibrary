<?php
#CREATE
if($state == 'create'){
	$input = array();
	if(!empty($_REQUEST)){$input = $_REQUEST;} #@TODO - change to $_POST & use DATA
	$fields = array('title', 'parisho');
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

		$sql = "INSERT INTO `harv_harvest` (`euid`, `suid`, `puid`, `title`, `parisho`)
		VALUES ('{$euid}', '{$suid}', '{$puid}', '{$input['title']}', '{$input['parisho']}')";
		if($harvest->dbc->run($sql, 'iAffected') == 1){
			$v['record'] = 1;
			$v['recordset']['bind'] = $suid;
			$omodel = $harvest->SQL_Report('success', $v);
		}
	}
}