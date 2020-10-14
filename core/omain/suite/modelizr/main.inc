<?php
class Harvest {
	public $dbc;
	public $dbo;
	public $project;

	public function __construct($PROJECT_CONFIG, $DB_CONFIG){
		$this->project = $PROJECT_CONFIG;
		$db = new oDatabase($DB_CONFIG);
		$this->dbc = $db->connect;
		$this->dbo = $db->dbo();
	}


	public function SQL_QueryCheck($i=''){
		#@TODO ~ clean up
		if(!empty($i['query'])){
			$zz = $this->SQL_Report('error', $o['query']['message']);

		}
		echo oPrint::Neat($zz);
	}



	public function SQL_IsRecord($column, $value, $table, $symbol='='){
		$sql = "SELECT `{$column}` FROM `{$table}` WHERE `{$column}` {$symbol} '".$value."';";
		$o = $this->dbc->run($sql, 'iAffected');

		#@TODO ~ clean up & get details
		// if(!empty($o['query']) || ){
		// 	$zz = $this->SQL_Report('error', $o['query']['message']);

		// }
		echo oPrint::Neat($o);

		// if(!empty($o) && $o['executed'] === true && $o['record'] > 0){
		// 	return true;
		// }
		// return false;
	}


	public function SQL_Report($type, $v){
		$report = array();
		if($type == 'error'){
			$report['status'] = 'F9';
			$report['reason'] = $v;
			return $report;
		}
		elseif($type == 'success'){
			$report['status'] = 'OK';
			if(!empty($v['record'])){$report['record'] = $v['record'];}
			if(!empty($v['recordset'])){$report['recordset'] = $v['recordset'];}
			return $report;
		}
	}


	public function SQL_Response($type, $o, $query='', $debug=false){
		if($debug === false){
			$response = $this->SQL_Report($type, $o);
		}
		else {
			$response = $this->SQL_Report($type, $o);
			if(!empty($query['syntax'])){$response['debug'] = $query['syntax'];}
		}
		return $response;
	}


	public function CreateLog($data){
		$euid = oRandom::Create('iEuid');
		$suid = oRandom::Create('iSuid');
		$puid = oRandom::Create('iPuid');
		if(empty($data['status'])){$data['status'] = NULL;}
		if(empty($data['logid'])){$data['logid'] = NULL;}
		if(empty($data['user'])){$data['user'] = NULL;}
		if(empty($data['action'])){$data['action'] = NULL;}
		if(empty($data['report'])){$data['report'] = 'Initiated';}
		if(empty($data['summary'])){$data['summary'] = 'No Summary';}
		if(empty($data['platform'])){$data['platform'] = 'Unknown';}
		if(empty($data['ip'])){$data['ip'] = oServer::RemoteIP();}
		$sql = "INSERT INTO `harv_logs` (`euid`, `suid`, `puid`, `status`, `logid`, `user`, `action`, `report`, `summary`, `platform`, `ip`)
		VALUES ('{$euid}', '{$suid}', '{$puid}', '{$data['status']}', '{$data['logid']}', '{$data['user']}', '{$data['action']}', '{$data['report']}', '{$data['summary']}', '{$data['platform']}', '{$data['ip']}')";
		return $this->dbc->run($sql, 'iAffected');
	}




	public function oRegister(){
		$input = array();
		#@TODO - change to $_POST & use DATA
		if(!empty($_REQUEST)){$input = $_REQUEST;}

		$fields = array('phone', 'password', 'surname', 'firstname');
		$e = IsRequired($input, $fields);
		if(!empty($e)){
			return $this->SQL_Response('error', $e);
		}
		else {
			$phone_exist = $this->SQL_IsRecord('phone', $input['phone'], 'harv_user', '=');
			if($phone_exist === true){return $this->SQL_Response('error', $input['phone'].' already exists');}
			if(!empty($input['email'])){
				$email_exist = $this->SQL_IsRecord('email', $input['email'], 'harv_user', '=');
				if($email_exist === true){return $this->SQL_Response('error', $input['email'].' already exists');}
			}
		}
	}



}