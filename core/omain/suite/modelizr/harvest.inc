<?php
class Harvest {
	public $SQL;
	public $project;

	public function __construct($PROJECT_CONFIG, $DB_CONFIG){
		$this->project = $PROJECT_CONFIG;
		$this->SQL = new oSQLi($DB_CONFIG);
	}


	public function CreateLog($data){
		$puid = oRandom::Create('iPuid');
		$suid = oRandom::Create('iSuid');
		$euid = oRandom::Create('iEuid');
		if(empty($data['logid'])){$data['logid'] = NULL;}
		if(empty($data['user'])){$data['user'] = NULL;}
		if(empty($data['action'])){$data['action'] = NULL;}
		if(empty($data['standing'])){$data['standing'] = NULL;}
		if(empty($data['platform'])){$data['platform'] = NULL;}
		if(empty($data['report'])){$data['report'] = 'Initiated';}
		if(empty($data['summary'])){$data['summary'] = 'No Summary';}
		if(empty($data['ip'])){$data['ip'] = oServer::RemoteIP();}
		if(empty($data['platform'])){$data['platform'] = 'Unknown';}

		$query = "INSERT INTO `harv_logs`(`user`, `standing`, `action`, `report`, `summary`, `ip`, `platform`, `logid`, `puid`, `suid`, `euid`) ";
		$query .= "VALUES ('{$data['user']}', '{$data['standing']}', '{$data['action']}', '{$data['report']}', '{$data['summary']}', '{$data['ip']}', '{$data['platform']}', '{$data['logid']}', '{$puid}', '{$suid}', '{$euid}')";
		return $this->SQL->run($query, 'iAffected');
	}
}