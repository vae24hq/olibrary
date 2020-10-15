<?php
#CREATE
if($action == 'create'){
	$input = array();
	if(!empty($_REQUEST)){$input = $_REQUEST;} #@TODO - change to $_POST & use DATA
	$fields = array('title', 'amount', 'parisho', 'harvesto');
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

		$sql = "INSERT INTO `harv_target` (`euid`, `suid`, `puid`, `title`, `amount`, `parisho`, `harvesto`)
		VALUES ('{$euid}', '{$suid}', '{$puid}', '{$input['title']}', '{$input['amount']}', '{$input['parisho']}', '{$input['harvesto']}')";
		// echo oPrint::Neat($harvest->dbc->run($sql, 'iAffected'));
		if($harvest->dbc->run($sql, 'iAffected') == 1){
			$v['record'] = 1;
			$v['recordset']['bind'] = $suid;
			$omodel = $harvest->SQL_Report('success', $v);
		}
	}
}



#LIST
if($action == 'list'){
	$input = array();
	if(!empty($_REQUEST)){$input = $_REQUEST;} #@TODO - change to $_POST & use DATA
	$fields = array('harvesto');
	$e = IsRequired($input, $fields);
	if(!empty($e)){
		$omodel = $harvest->SQL_Response('error', $e);
	}
	else {
		$db = $harvest->dbo;
		$sql = "SELECT `suid` AS `id`, CONCAT(`title`) AS `title` FROM `harv_target` WHERE `harvesto` = '{$input['harvesto']}' ORDER BY `auid` ASC";
		$tsk = $db->query($sql);
		if($tsk !== false){
			$v['record'] = $tsk->num_rows;
			$v['recordset'] = $tsk->fetch_all(MYSQLI_ASSOC);
			$omodel = $harvest->SQL_Report('success', $v);
		}
	}
}