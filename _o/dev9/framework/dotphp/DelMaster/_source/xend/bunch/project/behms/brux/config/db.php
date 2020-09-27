<?php
function konfig($filter=''){
	//database configuration
	if($filter == 'db_konfig'){
		$konfig['server'] = 'localhost';
		$konfig['database'] = 'behms';
		$konfig['username'] = 'root';
		$konfig['password'] = '';
		return $konfig;
	}

	//app configuration
	$konfig['hospitalName'] = "St Jude Specialist";
	$konfig['appName'] = "St Jude Specialist HMS";

	if(!empty($filter) && isset($konfig[$filter])){return $konfig[$filter];}

	return $konfig;
}
?>