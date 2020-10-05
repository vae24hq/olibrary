<?php
class HarvestPad {
	public $SQL;
	public $project;

	function __construct($config){
		if(!empty($config['project'])){$this->project = $config['project'];}
		$this->SQL = new oSQL($config['database']);
	}


	function Required($input, $fields){
		if(is_array($fields)){
			foreach ($fields as $value) {
				if(is_array($input)){
					#@TODO ~ change to empty string check
					if(empty($input[$value])){
						return $value.' is required';
					}
				}
			}
		}
	}


	function Logs($data){
		$puid = oRandom::Create('iPuid');
		$suid = oRandom::Create('iSuid');
		$euid = oRandom::Create('iEuid');
		if(empty($data['logid'])){$data['logid'] = NULL;}
		if(empty($data['user'])){$data['user'] = NULL;}
		if(empty($data['action'])){$data['action'] = NULL;}
		if(empty($data['platform'])){$data['platform'] = NULL;}
		if(empty($data['status'])){$data['status'] = 'initiated';}
		if(empty($data['ip'])){$data['ip'] = oServer::RemoteIP();}
		if(empty($data['platform'])){$data['platform'] = 'Unknown';}

		$query = "INSERT INTO `logso`(`user`, `action`, `status`, `ip`, `platform`, `logid`, `puid`, `suid`, `euid`) ";
		$query .= "VALUES ('{$data['user']}', '{$data['action']}', '{$data['status']}', '{$data['ip']}', '{$data['platform']}', '{$data['logid']}', '{$puid}', '{$suid}', '{$euid}');";
		return $this->SQL->Handler($query, false);
	}





	public function Register($data){
		$fields = array('phone', 'password', 'surname', 'firstname', 'platform');
		$e = $this->Required($data, $fields);

		if(!empty($e)){
			return $this->SQL->Response('error', $e);
		}
		else {
			$input = $data;
			$phone_exist = $this->SQL->HasRecord('phone', $input['phone'], 'usero', '=');
			if($phone_exist === true){return $this->SQL->Response('error', $input['phone'].' already exists');}
			if(!empty($input['email'])){
				$email_exist = $this->SQL->HasRecord('email', $input['email'], 'usero', '=');
				if($email_exist === true){return $this->SQL->Response('error', $input['email'].' already exists');}
			}

			$input['surname'] = ucwords(strtolower($input['surname']));
			$input['firstname'] = ucwords(strtolower($input['firstname']));
			$puid = oRandom::Create('iPuid');
			$euid = oRandom::Create('iEuid');
			$suid = oRandom::Create('iSuid');

			if(empty($input['email'])){
				$query = "INSERT INTO `usero`(`phone`, `password`, `surname`, `firstname`, `puid`, `suid`, `euid`) ";
				$query .= "VALUES ('{$input['phone']}', '{$input['password']}', '{$input['surname']}', '{$input['firstname']}', '{$puid}', '{$suid}', '{$euid}');";
			} else {
				$query = "INSERT INTO `usero`(`email`, `phone`, `password`, `surname`, `firstname`, `puid`, `suid`, `euid`) ";
				$query .= "VALUES ('{$input['email']}', '{$input['phone']}', '{$input['password']}', '{$input['surname']}', '{$input['firstname']}', '{$puid}', '{$suid}', '{$euid}');";
			}

			$o = $this->SQL->Handler($query, false);
			if(!empty($o)){
				if($o['status'] == 'success'){
					$query = "SELECT `User`.`suid` AS `bind`, `email`, `phone`, `username`, `role`, `surname`, `firstname`, `parisho`.`name` AS `parish` FROM `usero` AS `User`, `parisho` WHERE  User.`suid` = '{$suid}' AND  `User`.`parisho` = `parisho`.`suid` LIMIT 1;";
					$o = $this->SQL->Handler($query, false);

					#Log Data
					$logdata = array(
						'user' => $suid,
						'action' => 'signup',
						'status' => 'success',
						'platform' => $data['platform'],
					);
					$this->Logs($logdata);
				}
			}
			return $o;
		}
	}






	public function ParishList(){
		$sql = 'SELECT `suid` AS `ID`, CONCAT(`name`, " - ",`suburb`, ", ",`city`) AS `Title` FROM `parisho` WHERE `status` = 2;';
		return $this->SQL->Handler($sql, false);
	}

}