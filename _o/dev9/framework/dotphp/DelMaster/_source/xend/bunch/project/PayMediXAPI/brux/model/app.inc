<?php
class app extends brux {
	private static $instance;
	private static $status;

	//-------------- Prevent multiple instances ---------------
	private function __construct(){return;}

	//-------------- Prevent duplication ---------------
	private function __clone(){return;}

	//-------------- Returns a single instance ---------------
	public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}


	//-------------- SETTING ---------------
	public static function setting($data=''){
		if(!empty($data['host'])){$record['host'] = $data['host'];} else {$record['host'] = $_SERVER['HTTP_HOST'];}
		if(!empty($data['domain'])){$record['domain'] = $data['domain'];} else {$record['domain'] = 'www.247medic.org';}
		if(!empty($data['name'])){$record['name'] = $data['name'];} else {$record['name'] = '247MedicApp';}
		if(!empty($data['URL'])){$record['URL'] = $data['URL'];} else {$record['URL'] = 'https://'.$record['host'].'/';}
		if(!empty($data['email'])){$record['email'] = $data['email'];} else {$record['email'] = 'info@'.$record['domain'];}

		return $record;
	}

	//-------------- INFO ---------------
	public static function info($value='all'){
		if(isset($_GET['app'])){$record['app'] = $_GET['app'];}
		if(isset($_GET['api'])){$record['api'] = $_GET['api'];}
		if(isset($_GET['ver'])){$record['ver'] = $_GET['ver'];}

		#COLLECT INFO FROM SETTING
		$setting = self::setting();
		$record = array_merge($record, $setting);

		#RETURN
		if($value == 'all'){return $record;}
		elseif($value == 'version' && !empty($record['ver'])){return $record['ver'];}
		elseif(isset($record[$value])){return $record[$value];}
	}

	//-------------- ROUTE ---------------
	public static function route(){
		$route = 'index';
		if(isset($_REQUEST['api']) && !empty($_REQUEST['api'])){$route = $_REQUEST['api'];}
		return strtolower($route);
	}


	//-------------- LOGIN ---------------
	public static function login($userid, $password){
		$sql = "SELECT `bind`, `type`, `status`, `firstname`, `surname` FROM `user` WHERE '".$userid."' IN (`username`,`email`,`phone`) AND `password` = '".$password."' LIMIT 1";
		$login = self::runSQL($sql);
		if(!$login){return FALSE;}
		return $login;
	}

	//-------------- SEARCH USER ---------------
	public static function findUser($search, $filter){
		$record = self::record($filter, 'user', $filter, $search);
		return $record;
	}

	//-------------- UPDATE USER ---------------
	public static function updateUser($data, $filter){
		$user = self::findUser($filter['bind'],'bind');
		if($user != 'NO_RECORD'){
			return self::update($data, 'user', $filter);
		}
		return $user;
	}
	
	//-------------- SIGNUP USER ---------------
	public static function signup($data=''){
		if(empty($data) || !is_array($data)){return FALSE;}

		#Checks
		$username = self::findUser($data['username'],'username');
		if($username != 'NO_RECORD'){return 'USERNAME_EXIST';}

		$email = self::findUser($data['email'],'email');
		if($email != 'NO_RECORD'){return 'EMAIL_EXIST';}

		$phone = self::findUser($data['phone'],'phone');
		if($phone != 'NO_RECORD'){return 'PHONE_EXIST';}

		#Create [USER]
		$sql = self::insertRUID('user');
		foreach ($data as $key => $value){
			if(!empty($value)){$sql .= ", `".$key."` = '".$value."'";}
		}
		$db = self::database();
		$affected_row = $db->exec($sql);
		if($affected_row < 1){return FALSE;}
		#Get [USER's - bind]
		else {
			return self::record('bind, type, status', 'user', 'email', $data['email']);
		}
	}

	//-------------- NEW CODE GENERATION ---------------
	public static function createCode($data=''){
		if(empty($data) || !is_array($data)){return FALSE;}

		#Create code for [USER]
		$columns = array('user', 'phonecode', 'emailcode');
		$sql = self::insertRUID('vericode');
		foreach ($columns as $key){
			if(!empty($data[$key])){
				$sql .= ", `".$key."` = '".$data[$key]."'";
			}
		}

		$db = self::database();
		$affected_row = $db->exec($sql);

		if($affected_row < 1){return FALSE;}
		#Get [USER's - codes]
		else {
			return self::record('`phonecode`,`emailcode`,`user`', 'vericode', 'user', $data['user']);
		}
	}

	//-------------- SIGNUP VERIFICATION GENERATION ---------------
	public static function signupVeriGen($data=''){
		if(empty($data) || !is_array($data)){return FALSE;}

		#Signup
		$signup = self::signup($data);
		if(!empty($signup['bind'])){
			$code['user'] = $signup['bind'];
			$code['phonecode'] = 'P'.brux::randomiz('short');
			$code['emailcode'] = 'E'.brux::randomiz('short');
			return self::createCode($code);
		}
		return $signup;
	}

	//-------------- VERIFIED NOTICE ---------------
	public static function verified($user='', $verified=''){
		if(empty($user) || empty($verified)){return FALSE;}
		
		$filta['user'] = $user;

		#Verified
		if($verified == 'email'){
			$data['status'] = 'EMAIL';
		}
		elseif($verified == 'phone'){
			$data['status'] = 'PHONE';
		}
		elseif($verified == 'both'){
			$data['status'] = 'BOTH';
		}

		return self::update($data, 'vericode', $filta);
	}

}
?>
