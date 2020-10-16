<?php
# CREATE
if($action == 'create'){
	$input = array();
	if(!empty($_REQUEST)){$input = $_REQUEST;} #@TODO - change to $_POST & use DATA
	$fields = array('phone', 'surname', 'firstname', 'parishid');
	$e = IsRequired($input, $fields);
	if(!empty($e)){
		$omodel = $harvest->SQL_Response('error', $e);
	}
	else {
		$phone_check = $harvest->SQL_IsRecord('phone', $input['phone'], 'harv_user', '=');
		if($phone_check === true){$omodel = $harvest->SQL_Response('error',$input['phone'].' already exists');}
		else {
			if(!empty($input['email'])){
				$email_check = $harvest->SQL_IsRecord('email', $input['email'], 'harv_user', '=');
				if($email_check === true){$omodel = $harvest->SQL_Response('error', $input['email'].' already exists');}
			}

			if(empty($phone_check) && empty($email_check)){
				#@TODO ~ possible duplicate & error check
				if(!empty($input['password'])){$input['password'] = oCrypt::Password($input['password']);} else {$input['password'] = oCrypt::Password($input['phone']);}

				$input['surname'] = ucwords(strtolower($input['surname']));
				$input['firstname'] = ucwords(strtolower($input['firstname']));
				$euid = oRandom::Create('iEuid');
				$suid = oRandom::Create('iSuid');
				$puid = oRandom::Create('iPuid');

				$sql = "INSERT INTO `harv_user` (";
				if(!empty($input['email'])){$sql .= "`email`, ";}
				$sql .= "`euid`, `suid`, `puid`, `phone`, `password`, `surname`, `firstname`, `parisho`) VALUES (";
				if(!empty($input['email'])){$sql .= "'{$input['email']}', ";}
				$sql .= "'{$euid}', '{$suid}', '{$puid}', '{$input['phone']}', '{$input['password']}', '{$input['surname']}', '{$input['firstname']}', '{$input['parishid']}')";
				$o = $harvest->dbc->run($sql, 'iAffected');

				if($o == 1){
					$db = $harvest->dbo;
					$qry = "SELECT `User`.`suid` AS `bind`, `email`, `phone`, `username`, `role`, `surname`, `firstname`, `othername`, `User`.`status`, `User`.`stage`, `harv_parish`.`name` AS `parish`, `harv_parish`.`suid` AS `parishid` FROM `harv_user` AS `User`, `harv_parish` WHERE  User.`suid` = '{$suid}' AND  `User`.`parisho` = `harv_parish`.`suid` LIMIT 1;";
					$tsk = $db->query($qry);
					if($tsk !== false){
						$v['record'] = $tsk->num_rows;
						$v['recordset'][] = $tsk->fetch_array(MYSQLI_ASSOC);
						$omodel = $harvest->SQL_Report('success', $v);
					}
				}
			}
		}
	}
}