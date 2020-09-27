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

	//-------------- SITE ---------------
	public static function site($data=''){
		if(!empty($data['host'])){$site['host'] = $data['host'];} else {$site['host'] = $_SERVER['HTTP_HOST'];}
		if(!empty($data['domain'])){$site['domain'] = $data['domain'];} else {$site['domain'] = 'www.247medic.org';}
		if(!empty($data['name'])){$site['name'] = $data['name'];} else {$site['name'] = '247MedicApp';}
		if(!empty($data['URL'])){$site['URL'] = $data['URL'];} else {$site['URL'] = 'https://'.$site['host'].'/';}
		if(!empty($data['email'])){$site['email'] = $data['email'];} else {$site['email'] = 'info@'.$site['domain'];}
		if(!empty($site[$data])){return $site[$data];}
	}

	public static function route(){
		$route = 'index';
		if(isset($_REQUEST['api']) && !empty($_REQUEST['api'])){$route = $_REQUEST['api'];}
		return strtolower($route);
	}



	//-------------- LOGIN ---------------
	public static function login($userid, $password){
		$sql = "SELECT `bind` FROM `user` WHERE '".$userid."' IN (`username`,`email`,`phone`) AND `password` = '".$password."' LIMIT 1";
		$db = self::database();
		$statement = $db->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		if(count($result) == 1 && is_array($result)){return $result[0];}
		elseif(is_array($result) && !empty($result)){return $result;}
		return FALSE;
	}

//-------------- REGISTER ---------------
	public static function register($data=''){
		if(empty($data) || !is_array($data)){return FALSE;}
		$db = self::database();

		#CHECKS
		$usernameFound = self::record('auid', 'user', 'username', $data['username']);
		if($usernameFound !== FALSE){return 'username_exist';}

		$emailFound = self::record('auid', 'user', 'email', $data['email']);
		if($emailFound !== FALSE){return 'email_exist';}

		$phoneFound = self::record('auid', 'user', 'phone', $data['phone']);
		if($phoneFound !== FALSE){return 'phone_exist';}

		#Create [USER]
		$user_columns = array('username', 'password', 'email', 'phone', 'name', 'dob', 'address', 'gender', 'location', 'type');
		$user_sql = self::insertRUID('user');
		foreach ($user_columns as $user_key){
			if(!empty($data[$user_key])){
				$user_sql .= ", `".$user_key."` = '".$data[$user_key]."'";
			}
		}
		$user_affected_row = $db->exec($user_sql);
		if($user_affected_row < 1){return FALSE;}
		else {
			#Get [USER's - bind]
			$record = self::record('bind', 'user', 'email', $data['email']);
			return $record;
		}
		return TRUE;
	}

}
?>