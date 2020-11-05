<?php
#LOGIN
if($action == 'login'){
	$input = array();
	if(!empty($_REQUEST)){$input = $_REQUEST;} #@TODO - change to $_POST & use DATA
	$fields = array('userid', 'password');
	$e = IsRequired($input, $fields);
	if(!empty($e)){
		$omodel = $harvest->SQL_Response('error', $e);
	}
	else {
		#check if user exists
		$user_check['phone'] = $harvest->SQL_IsRecord('phone', $input['userid'], 'harv_user', '=');
		$user_check['email'] = $harvest->SQL_IsRecord('email', $input['userid'], 'harv_user', '=');
		$user_check['username'] = $harvest->SQL_IsRecord('username', $input['userid'], 'harv_user', '=');
		if($user_check['phone'] === false && $user_check['email'] === false && $user_check['username'] === false){
			$omodel = $harvest->SQL_Response('error', 'No account for '.$input['userid']);
		}
		else {
			$db = $harvest->dbo;
			$qry = "SELECT `User`.`suid` AS `bind`, `password`, `email`, `phone`, `username`, `role`, `surname`, `firstname`, `othername`, `User`.`status`, `User`.`stage`, `harv_parish`.`name` AS `parish`, `harv_parish`.`suid` AS `parishid`FROM `harv_user` AS `User`, `harv_parish` WHERE  '{$input['userid']}' IN (`username`, `phone`, `email`) AND  `User`.`parisho` = `harv_parish`.`suid` LIMIT 1;";
			$tsk = $db->query($qry);
			if($tsk !== false){
				$v['record'] = $tsk->num_rows;
				$recordset = $tsk->fetch_array(MYSQLI_ASSOC);
				if(oCrypt::IsPassword($input['password'], $recordset['password']) === false){
					$omodel = $harvest->SQL_Response('error', 'Incorrect password');
				}
				else {
					$v['record'] = $tsk->num_rows;
					unset($recordset['password']);
					$v['recordset'][] = $recordset;
					$omodel = $harvest->SQL_Report('success', $v);
				}
			}
		}
	}
}