<?php
class user {
	private static $instance;
	private static $status;
	public static $odao;

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



	public static function active($info=''){
		$activeUser = doAuth();
		if(isset($activeUser[$info])){
			if($info=='username' || $info=='type'){
				return Utility::username($activeUser[$info], 'decrypt');
			}
			else {
			return $activeUser[$info];
			}
		}
		return false;
	}


	//-------------- Modify Password ---------------
	public static function modifyPW($puid='', $current='', $update=''){
		if(empty($puid) || empty($current) || empty($update)){return false;}
		global $odao;
		#find user
		$SQL = "SELECT `puid`, `password` FROM `user` WHERE `puid` = '".$puid."' LIMIT 1";
		$user = $odao->runSQL($SQL);
		// Record found
		if($user != 'NO_RECORD'){
			// Check if current password march
			if($current !== $user['password']){
				$mark['code'] = 'E401';
				$mark['msg'] = 'Your password is invalid';
			}
			// Check if current password march
			elseif($current === $update){
				$mark['code'] = 'E406';
				$mark['msg'] = 'Your new password cannot be same as old password';
			} else {
				//update password
				$updatePW['password'] = $update;
				$updateCond['puid'] = $puid;
				$update = $odao->updateSQL($updatePW, 'user', $updateCond);
				if($update === true){
					$mark['code'] = 'E202';
					$mark['msg'] = 'Your password has been modified';
				}
				else {
					$mark['code'] = 'E204';
					$mark['msg'] = 'Your password was not modified';
				}
			}
		}
		// Record not found
		elseif($user == 'NO_RECORD'){
			$mark['code'] = 'E404';
			$mark['msg'] = 'no user account found';
		}
		else {
			$mark['code'] = 'E600';
			$mark['msg'] = 'an error occurred';
		}

		return $mark;
	}
}
?>