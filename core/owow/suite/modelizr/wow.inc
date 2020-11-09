
<?php
class WOWCa {
	public function __construct($config){
		$this->project = $config['project'];

		#initiate database
		$this->db = new oDatabase($config['database']);
		$this->dbo = $this->db->dbo();

		#initiate ODL database
		$this->OldDB = new oDatabase($config['old_database']);
		$this->OldDBO = $this->OldDB->dbo();
	}











	public function signup($input){
		$input = oSQL::prep($input); #remove empty input
		$input = oSQL::guid($input);

		$input['activity'] = 'signup';
		$input['step'] = 1;

		$sql = oSQL::insert('userao', $input, 'iParam');
		$stmt = $this->dbo->prepare($sql);
		$execute = $stmt->execute($input);
		if($execute === false){
			$PDOError = $stmt->errorInfo();
			return $PDOError[2];
		}

		#SUCCESSFUL at this point (return SUID as BIND)
		return array('bind' => $input['suid'], 'activity' => $input['activity'], 'step' => $input['step']); #return $execute;
	}

	public function signupOnOld($input){
		unset($input['religion']);
		$input['language']  = 'english';
		$input['joined'] = time();
		$input['active'] = 1;
		$input['phone_number'] = $input['phone']; unset($input['phone']);
		$input['type'] = 'user';
		$input['registered'] = date('n').'/'. date("Y");
		$input['lastseen'] = time();
		$input['ip_address'] = oServer::IP();
		$input['src'] = 'AO';// src = [AO_Web|AO_iOS|AO_Android]
		$input['email_code'] = md5(rand(1111, 9999) . time());
		// country_id = 159
		// $input['birthday'] = $input['dob'];
		// $input['gender']
		// cover = 'upload/photos/d-cover.jpg'
		// avatar = 'upload/photos/d-avatar.jpg'  OR upload/photos/f-avatar.jpg
		// first_name
		// last_name
		#email
		#username
		#password   =  Wo_Secure(password_hash($registration_data['password'], PASSWORD_DEFAULT));
		#suid


		$sql = oSQL::insert('Wo_Users', $input, 'iParam');
		$stmt = $this->OldDBO->prepare($sql);
		$execute = $stmt->execute($input);
		// if($execute === false){
		// 	$PDOError = $stmt->errorInfo();
		// 	return $PDOError[2];
		// }

		#SUCCESSFUL at this point (return SUID as BIND)
		#return array('bind' => $input['suid'], 'activity' => $input['activity'], 'step' => $input['step']); #return $execute;
		return true;
	}



	public function update($input){
		$input = oSQL::prep($input);
		if(isset($input['id'])){
			$id = $input['id'];
			unset($input['id']);

			$where['suid'] = $id;

			$sql = oSQL::update('userao', $input, $where, 'iParam');
			$stmt = $this->dbo->prepare($sql);
			$execute = $stmt->execute(array_merge($input, $where));
			if($execute === false){
				$PDOError = $stmt->errorInfo();
				return $PDOError[2];
			}
			elseif($execute === true){
				$count = $stmt->rowCount();
			}

			#UPDATE IS SUCCESSFUL
			return array('bind' => $id, 'activity' => $input['activity'], 'step' => $input['step']); #return $execute;
		}

		#FAILED - because user id is required
		return array('report' => 'failed - no user id input');
	}



	public function finduserid($input){
		$input = oSQL::prep($input);
		if(isset($input['id'])){
			$id = $input['id'];
			unset($input['id']);

			$where['suid'] = $id;
		}

		#FAILED - because user id is required
		return array('report' => 'failed - no user id input');
	}
}