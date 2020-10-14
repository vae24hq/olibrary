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
		$puid = oRandom::Create('iPuid');
		$suid = oRandom::Create('iSuid');
		$euid = oRandom::Create('iEuid');
		if(empty($data['logid'])){$data['logid'] = NULL;}
		if(empty($data['user'])){$data['user'] = NULL;}
		if(empty($data['action'])){$data['action'] = NULL;}
		if(empty($data['status'])){$data['status'] = NULL;}
		if(empty($data['platform'])){$data['platform'] = NULL;}
		if(empty($data['report'])){$data['report'] = 'Initiated';}
		if(empty($data['summary'])){$data['summary'] = 'No Summary';}
		if(empty($data['ip'])){$data['ip'] = oServer::RemoteIP();}
		if(empty($data['platform'])){$data['platform'] = 'Unknown';}

		$sql = "INSERT INTO `harv_logs`(`user`, `status`, `action`, `report`, `summary`, `ip`, `platform`, `logid`, `puid`, `suid`, `euid`) ";
		$sql .= "VALUES ('{$data['user']}', '{$data['status']}', '{$data['action']}', '{$data['report']}', '{$data['summary']}', '{$data['ip']}', '{$data['platform']}', '{$data['logid']}', '{$puid}', '{$suid}', '{$euid}')";
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

	}



}