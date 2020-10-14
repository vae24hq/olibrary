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
}