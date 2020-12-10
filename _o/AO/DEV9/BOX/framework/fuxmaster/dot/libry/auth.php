<?php
class Auth {
	//-------------- logout user  ---------------
	public function logout($uri='login'){
		#@Todo ~ collect user and record logout information
		Session::start();
		if(isset($_SESSION['user_puid'])){
			Session::delete('user_puid');
		}
		Session::restart();
		if(!empty($uri)){
			URL::redirect($uri);
		}
	}

	//-------------- login  ---------------
	public function login($userid, $password){
		$SQL = "SELECT `puid`, `type`, `password` FROM `user` WHERE '".$userid."' IN (`username`,`email`,`phone`) LIMIT 1";
		global $fuxCRUD;
		$result = $fuxCRUD->runSQL($SQL, 'record');
		if(!isset($result['QUERY_FAILED'])){
			if(is_array($result)){
				#verify password
				if(!self::passwordValid($password, $result['password'])){
					return 'PASSWORD_INCORRECT';
				}
			}
			return $result;
		}
		else {
			#Todo ~ log error resulting from QUERY [on production, die on development]
		}
		return false;
	}

	//-------------- user information  ---------------
	public function user($ruid, $column='*'){
		global $fuxCRUD;
		$condition['puid'] = $ruid;
		$user = $fuxCRUD->findSQL($column, 'user', $condition, 'record');
		if(!isset($user['QUERY_FAILED'])){
			return $user;
		}
		#Todo ~ log error resulting from QUERY [on production, die on development]
		return false;
	}

	public function isAuth($column, $runAs='app'){
		#Require login
		Session::start();
		if(empty($_SESSION['user_puid'])){
			URL::redirect('login');
		}
		else {
			#validate active user & return information
			$user = $this->user($_SESSION['user_puid'], $column);
			if($user === false){
				#Todo ~ log when IMPROBABLE CASE Occurs
				URL::redirect('index');
			}
			elseif($user == 'NO_RECORD'){
				#logout, clear session & return to login
				$this->logout('login');
			}
			return $user;
		}
	}

	public static function password($password){
		return password_hash($password, PASSWORD_BCRYPT);
	}

	public static function passwordValid($password, $hash){
		if(password_verify($password, $hash)){return true;}
		return false;
	}

	public static function passwordModify($puid, $password, $passwordcurrent){
		$SQL = "SELECT `puid`, `password` FROM `user` WHERE `puid` = '".$puid."' LIMIT 1";
		global $fuxCRUD;
		$result = $fuxCRUD->runSQL($SQL, 'record');
		if(!isset($result['QUERY_FAILED'])){
			if(is_array($result)){
				#verify password
				if(!self::passwordValid($passwordcurrent, $result['password'])){
					return 'PASSWORD_INCORRECT';
				}
				else {
					#update new password
					$data = array(); $cond = array();
					$password = self::password($password);
					$data['password'] = $password;
					$cond['puid'] = $puid;
					if(!$fuxCRUD->updateSQL($data, 'user', $cond, 1)){
						return 'PASSWORD_CHANGE_FAILED';
					}
				}
			}
			return $result;
		}
		else {
			#Todo ~ log error resulting from QUERY [on production, die on development]
		}
		return false;
	}




	public static function crypt($string, $action='encrypt'){
		if($action=='encrypt'){
			return base64_encode($string);
		}
		else {
			return base64_decode($string);
		}
	}

	public static function isCrypt($crypted, $verify){
		$string = self::crypt($crypted, 'decrypt');
		if($string == $verify){return true;}
		return false;
	}

	public static function restrict($input, $verify, $isCrypt='yeap', $redirect=''){
		if($isCrypt == 'yeap'){
			$valid = self::isCrypt($input, $verify);
			if(!$valid && !empty($redirect)){URL::redirect($redirect);}
			elseif(!$valid){return true;}
		}
		elseif($input != $verify){
			if(!empty($redirect)){URL::redirect($redirect);}
			return true;
		}

		#false indicates that access should not be restricted
		return false;
	}
}
?>