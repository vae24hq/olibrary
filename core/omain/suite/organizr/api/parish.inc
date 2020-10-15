<?php
#CREATE
if($action == 'create'){
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
			$v['recordset']['id'] = $suid;
			$omodel = $harvest->SQL_Report('success', $v);
		}
	}
}


#LIST
if($action == 'list'){
	$db = $harvest->dbo;
	$sql = "SELECT `suid` AS `id`, CONCAT(`name`, ' - ', `suburb`, ', ',`city`) AS `title` FROM `harv_parish` WHERE `status` = 'active' ORDER BY `name` ASC";
	$tsk = $db->query($sql);
	if($tsk !== false){
		$v['record'] = $tsk->num_rows;
		$v['recordset'] = $tsk->fetch_all(MYSQLI_ASSOC);
		$omodel = $harvest->SQL_Report('success', $v);
	}
}