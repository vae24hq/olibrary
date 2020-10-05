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



	public function Logs($data){
		$puid = oRandom::Create('iPuid');
		$suid = oRandom::Create('iSuid');
		$euid = oRandom::Create('iEuid');
		if(empty($data['logid'])){$data['logid'] = NULL;}
		if(empty($data['user'])){$data['user'] = NULL;}
		if(empty($data['action'])){$data['action'] = NULL;}
		if(empty($data['platform'])){$data['platform'] = NULL;}
		if(empty($data['report'])){$data['report'] = 'initiated';}
		if(empty($data['ip'])){$data['ip'] = oServer::RemoteIP();}
		if(empty($data['platform'])){$data['platform'] = 'Unknown';}

		$query = "INSERT INTO `logso`(`user`, `action`, `report`, `ip`, `platform`, `logid`, `puid`, `suid`, `euid`) ";
		$query .= "VALUES ('{$data['user']}', '{$data['action']}', '{$data['report']}', '{$data['ip']}', '{$data['platform']}', '{$data['logid']}', '{$puid}', '{$suid}', '{$euid}');";
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

			if(!empty($input['password'])){$input['password'] = oCrypt::Password($input['password']);}

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
					$query = "SELECT `User`.`suid` AS `bind`, `email`, `phone`, `username`, `role`, `surname`, `firstname`, `User`.`standing`, `User`.`stage`, `parisho`.`name` AS `parish` FROM `usero` AS `User`, `parisho` WHERE  User.`suid` = '{$suid}' AND  `User`.`parisho` = `parisho`.`suid` LIMIT 1;";
					$o = $this->SQL->Handler($query, false);

					#Log Data
					$logdata = array(
						'user' => $suid,
						'action' => 'register',
						'report' => 'success',
						'platform' => $data['platform'],
					);
					$this->Logs($logdata);
				}
			}
			return $o;
		}
	}



	public function Login($data){
		$fields = array('userid', 'password', 'platform');
		$e = $this->Required($data, $fields);
		if(!empty($e)){
			return $this->SQL->Response('error', $e);
		}
		else {
			// check if user exists
			$user_exist['phone'] = $this->SQL->HasRecord('phone', $data['userid'], 'usero', '=');
			$user_exist['email'] = $this->SQL->HasRecord('email', $data['userid'], 'usero', '=');
			$user_exist['username'] = $this->SQL->HasRecord('username', $data['userid'], 'usero', '=');
			if($user_exist['phone'] === false && $user_exist['email'] === false && $user_exist['username'] === false){
				return $this->SQL->Response('error', 'No account for '.$data['userid']);
			}
			else {
				$query = "SELECT `User`.`suid` AS `bind`, `password`, `email`, `phone`, `username`, `role`, `surname`, `firstname`, `User`.`standing`, `User`.`stage`, `parisho`.`name` AS `parish` FROM `usero` AS `User`, `parisho` WHERE  '{$data['userid']}' IN (`username`, `phone`, `email`)  AND  `User`.`parisho` = `parisho`.`suid` LIMIT 1;";
				$o = $this->SQL->Handler($query, false);
				if(!empty($o['recordset'][0]['password'])){
					$password = $o['recordset'][0]['password'];
					if(oCrypt::IsPassword($data['password'], $password) === false){
						$p['status'] = 'failed';
						$p['reason'] = 'Incorrect password';
						$logdata = array(
							'user' => $o['recordset'][0]['bind'],
							'action' => 'login',
							'report' => 'failed',
							'platform' => $data['platform'],
						);
						$this->Logs($logdata);
						return $p;
					}
				}

				// #Log Data
				// if(!empty($o['response']['recordset'][0])){
				// 	$user_bind = $o['response']['recordset'][0]['bind'];
				// } else {
				// 	$user_bind = '';
				// }

				// $logdata = array(
				// 	'user' => $user_bind,
				// 	'action' => 'signin',
				// 	'status' => 'success',
				// 	'platform' => $data['platform'],
				// );
				// $this->Logs($logdata);
				// return $o;
			}
		}
	}





	public function ParishList(){
		$sql = 'SELECT `suid` AS `id`, CONCAT(`name`, " - ",`suburb`, ", ",`city`) AS `title` FROM `parisho` WHERE `standing` = 2;';
		return $this->SQL->Handler($sql, false);
	}

}