
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


		#new database connection
		$this->db_new = new oDatabase($config['database']);
		$this->dbo_new = $this->db_new->dbo();

		#current database connection
		$this->db_old = new oDatabase($config['old_database']);
		$this->dbo_old = $this->db_old->dbo();

	}



	public function execute_failed($stmt){
		$dbo_error = $stmt->errorInfo();
		$e['input'] = $input;
		$e['sql'] = $sql;
		$e['error'] = 'query failed';
		$e['message'] = $dbo_error[2];
		#@TODO: log Error
		return $e;
	}



	public function user_exist($value, $check){
		if($check == 'username'){
			#check old db
			$sql = "SELECT `username` FROM `Wo_Users` WHERE `username` = '{$value}' LIMIT 1";
		}
		$stmt = $this->dbo_old->prepare($sql);
		if($stmt === false){
				#Cannot prepare SQL statement::@TODO
		}
		else {
			$execute = $stmt->execute();
			if($execute === false){
				return $this->execute_failed($stmt);
			}
			return $execute;
		}
	}



	public function signup_new($input){
		$input = oSQL::prep($input);
		$input = oSQL::guid($input);
		$param = oSQL::param_input($input);
		$sql = oSQL::insert('userao', $input, 'iParam');
		$stmt = $this->dbo_new->prepare($sql);
		if($stmt === false){
			#Cannot prepare SQL statement::@TODO
		}
		else {
			$execute = $stmt->execute($param);
			if($execute === false){
				$PDOError = $stmt->errorInfo();
				$error['input'] = $input;
				$error['sql'] = $sql;
				$error['error'] = 'Query failed to execute';
				$error['message'] = $PDOError[2];
				#@TODO: log Error
				return $error;
			}
			elseif($execute === true){
				#SUCCESSFUL at this point (return SUID as BIND)
				$response = array('bind' => $input['suid'], 'activity' => $input['activity'], 'step' => $input['step']);
				return $response;
			}
		}
		return false;
	}




	public function signup_old($input){
		$input = oSQL::prep($input);
		$param = oSQL::param_input($input);
		$sql = oSQL::insert('Wo_Users', $input, 'iParam');
		$stmt = $this->dbo_old->prepare($sql);
		if($stmt === false){
			#cannot prepare SQL statement::@TODO
		}
		else {
			$execute = $stmt->execute($param);
			if($execute === false){
				$PDOError = $stmt->errorInfo();
				$error['input'] = $input;
				$error['sql'] = $sql;
				$error['error'] = 'query failed';
				$error['message'] = $PDOError[2];
				return $error;
			}
			elseif($execute === true){
				return true;
			}
		}
		return false;
	}





	public function update_new($input, $filter){
		$input = oSQL::prep($input);
		$filter = oSQL::prep($filter);
		$param = oSQL::param_input($input);
		$suid = oSQL::param_input($filter);
		$sql = oSQL::update('userao', $input, $filter, 'iParam');
		$stmt = $this->dbo_new->prepare($sql);
		if($stmt === false){
			#Cannot prepare SQL statement::@TODO
		}
		else {
			$execute = $stmt->execute(array_merge($param, $suid));
			if($execute === false){
				$PDOError = $stmt->errorInfo();
				$error['input'] = $input;
				$error['sql'] = $sql;
				$error['error'] = 'query failed';
				$error['message'] = $PDOError[2];
				return $error;
			}
			elseif($execute === true || $execute > 0){
				#Successful Update at this point (return SUID as BIND)
				$response = array('bind' => $filter['suid'], 'activity' => $input['activity'], 'step' => $input['step']);
				return $response;
			}
		}
		return false;
	}





	public function update_old($input, $filter){
		$input = oSQL::prep($input);
		$filter = oSQL::prep($filter);
		$param = oSQL::param_input($input);
		$suid = oSQL::param_input($filter);
		$sql = oSQL::update('Wo_Users', $input, $filter, 'iParam');
		$stmt = $this->dbo_old->prepare($sql);
		if($stmt === false){
			#Cannot prepare SQL statement::@TODO
		}
		else {
			$execute = $stmt->execute(array_merge($param, $suid));
			if($execute === false){
				$PDOError = $stmt->errorInfo();
				$error['input'] = $input;
				$error['sql'] = $sql;
				$error['error'] = 'query failed';
				$error['message'] = $PDOError[2];
				return $error;
			}
			elseif($execute === true || $execute > 0){
				return true;
			}
		}
		return false;
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
		if($execute === false){
			$PDOError = $stmt->errorInfo();
			// return $PDOError[2];
		}
		$ORAX['executed'] = $execute;
		$ORAX['Error'] = $PDOError;
		return $ORAX;

		#SUCCESSFUL at this point (return SUID as BIND)
		#return array('bind' => $input['suid'], 'activity' => $input['activity'], 'step' => $input['step']); #return $execute;
		return true;
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