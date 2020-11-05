<?php
#LIST
if($action == 'list'){
	$input = array();
	if(!empty($_REQUEST)){$input = $_REQUEST;} #@TODO - change to $_POST & use DATA
	$fields = array('usero');
	$e = IsRequired($input, $fields);
	if(!empty($e)){
		$omodel = $harvest->SQL_Response('error', $e);
	}
	else {
		$db = $harvest->dbo;
		$qry = "SELECT `suid`, `title`, `amount` FROM `harv_pledge` WHERE `usero` = '{$input['usero']}'";
		$tsk = $db->query($qry);
		if($tsk !== false){
			$v['record'] = $tsk->num_rows;
			if($v['record'] == 1){$v['recordset'][] = $tsk->fetch_array(MYSQLI_ASSOC);}
			elseif($v['record'] > 1){$v['recordset'] = $tsk->fetch_all(MYSQLI_ASSOC);}
			$omodel = $harvest->SQL_Report('success', $v);
		}
	}
}