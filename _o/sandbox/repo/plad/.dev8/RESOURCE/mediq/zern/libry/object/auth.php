<?php
/* ZERN™ Framework ~ an evolving, robust platform for rapid & efficient development of modem responsive applications and APIs;
 * Built by ODAO™ [www.osawere.com] using PHP, SQL, HTML, CSS, JS & derived technology.
 * © July 2019 | beta 1.0
 * ===================================================================================================================
 * Dependency » obj:DB, class:period
 * PHP | auth::zern ~ authentication class
 */

class oAuth
{
	private static $instance;
	private $db;
	public $uri;
	public $app;


	//****** CLASS CONSTRUCT  ******//
	public function __construct($connection, $app)
	{
		if(is_object($connection)){
			$this->db = $connection;
			$this->uri = oURL::uri();
			$this->app = $app; #app object
		} else {
			die('Auth:: requires connection - #ZE001-DB');
		}
	} //****** END ******//


	//****** @Prevent DUPLICATION [of class] INSTANCE  ******//
	private function __clone()
	{
		return;
	} //****** END ******//


	//****** @Return HUMAN READABLE INFORMATION  ******//
	protected static function humanize($user)
	{
		if(!empty($user) && is_array($user)){
			if(isset($user['password'])){unset($user['password']);}
			if(!empty($user['username'])){$user['username'] = self::ocrypt($user['username'], 'oDE64');}
			if(!empty($user['email'])){$user['email'] = self::ocrypt($user['email'], 'oDE64');}
			if(!empty($user['type'])){$user['type'] = self::ocrypt($user['type'], 'oDECODE');}
			if(!empty($user['surname'])){$user['surname'] = self::ocrypt($user['surname'], 'oDECODE');}
			if(!empty($user['firstname'])){$user['firstname'] = self::ocrypt($user['firstname'], 'oDECODE');}
			if(!empty($user['othername'])){$user['othername'] = self::ocrypt($user['othername'], 'oDECODE');}
			if(!empty($user['sex'])){
				$sex = strtolower($user['sex']);
				if($sex == 'f'){$user['sex'] = 'Female';}
				elseif($sex == 'm'){$user['sex'] = 'Male';}
			}
			return $user;
		}
	}


	//****** @Return SINGLE INSTANCE  ******//
	public static function instantiate($connection, $app)
	{
		if(is_null(self::$instance)){
			self::$instance = new self($connection, $app);
		}
		return self::$instance;
	} //****** END ******//


	//****** PASSWORD HASHING  ******//
	public static function password($password)
	{
		if(!empty($password)){
			return password_hash($password, PASSWORD_BCRYPT);
		}
		return false;
	}

	//****** VERIFIY PASSWORD [HASHED]  ******//
	public static function isPassword($password, $hashed)
	{
		if(!empty($password) && !empty($hashed)){
			if(password_verify($password, $hashed)){
				return true;
			}
		}
		return false;
	} //****** END ******//


	//****** ENCRYPTION & DECRYPTION ******//
	public static function ocrypt(string $string, $action = 'oENCODE', $key = 'oZERN')
	{
		if($action == 'oEN64'){
			return base64_encode($string);
		} elseif($action == 'oDE64'){
			return base64_decode($string);
		} elseif($action == 'oENCODE'){
			$pre = randomiz('oCRYPT3');
			$post = randomiz('oCRYPT5');
			return $pre . base64_encode($string) . $post;
		} elseif($action == 'oDECODE'){
			$string = oText::trimNum($string, 5, 'oEND');
			$string = oText::trimNum($string, 3);
			return base64_decode($string);
		} elseif($action == 'oENCRYPT' || $action == 'oDECRYPT'){
			$crypto = new oCrypt($key);
			if($action == 'oENCRYPT'){
				return $crypto->encrypt($string);
			} elseif($action == 'oDECRYPT'){
				return $crypto->decrypt($string);
			}
		} elseif($action == 'oCRYPT'){
			return self::password($string);
		} elseif($action == 'oVERIFY' && is_array($string)){
			if(isset($string['string'])){
				$input = $string['string'];
			}
			if(isset($string['hash'])){
				$hash = $string['hash'];
			}

			if(!empty($input) && !empty($hash)){
				return self::isPassword($input, $hash);
			}
		}
	} //****** END ******//


	//****** TIMEOUT USER SESSION ******//
	public static function timeIn()
	{
		$_SESSION['oLASTACTIME'] = time();
	} //****** END ******//


	//****** TIMEOUT USER SESSION ******//
	public function timeOut($location = 'locked', $duration = '1800', $auto = 'oYEAP')
	{
		if(isset($_SESSION['oLASTACTIME'])){
			$timeIn = $_SESSION['oLASTACTIME'];
			$timeNow = time();
			if($timeNow != $timeIn){
				$timeDiff = oPeriod::secondsApart($timeIn, $timeNow);
				if($timeDiff > 1){$timeDiff = $timeDiff - 1;}
				if($timeDiff >= $duration){
					$_SESSION['oLOCKED'] = 'oYEAP';
				}
			}
		}

		if($auto == 'oYEAP'){
			$this->app->redirect($location, ($duration));
		}
	} //****** END ******//


	//****** USER INFORMATION ******//
	public function user($puid, $column = '*', $table ='oUSERX', $return = 'oRECORD')
	{
		$db = $this->db;
		$condition['puid'] = $puid;
		$user = $db->select($column, $table, $condition, 1, $return);
		if(!isset($user['oERROR'])){
			return $user;
		}
		#TODO ~log error resulting from QUERY [on production, die on development]
		return false;
	} //****** END ******//


	//****** AUTHENTICATE USER SESSION ******//
	public function is()
	{
		oSession::start();
		if(empty($_SESSION['oUSER'])){
			$this->app->redirect('login');
		} elseif(!empty($_SESSION['oLOCKED']) && $_SESSION['oLOCKED'] == 'oYEAP'){
			if(!empty($this->uri) && $this->uri != 'locked'){
				$this->app->redirect('locked');
			}
		} else {
			$user = $this->user($_SESSION['oUSER'], 'puid');
			if($user === false){
				#TODO ~ log this improbable occurrence
				if(!empty($this->uri) && $this->uri != 'login'){
					$this->app->redirect('login');
				}
			} elseif($user == 'oNORECORD'){
				if(!empty($this->uri) && $this->uri != 'login'){
					$this->app->redirect('login');
				}
			} elseif(!empty($user['puid'])){
				#TODO
			}
		}
	} //****** END ******//


	//****** LOGIN USER ******//
	public function login($userid, $password, $table = 'oUSERX')
	{
		if(!empty($userid) && !empty($password)){
			$userid = oInput::clean($userid);
			$password = oInput::clean($password);

			/* 1st Query
			$query = "SELECT `puid`, `type`, `password` FROM `{$table}`";
			$query .= " WHERE '" . $userid . "' IN (`email`,`phone`, `username`)";
			$query .= " OR `username` = '" . self::ocrypt($userid, 'oEN64') . "'";
			$query .= ' LIMIT 1';
			*/
			$query = "SELECT `puid`, `type`, `password` FROM `{$table}`";
			$query .= " WHERE '" . self::ocrypt($userid, 'oEN64') . "' IN (`email`, `username`)";
			$query .= " OR `phone` = '" . $userid . "'";
			$query .= ' LIMIT 1';

			$db = $this->db;
			$result = $db->runSQL($query, 'oRECORD');
			if($result === false){
				$resp['oSTATUS'] = 'oNOPE';
				$resp['oCODE'] = 'E600B3';
				return $resp;
			} elseif(isset($result['oERROR'])){
				#TODO ~ Log Query Error
				$resp['oSTATUS'] = 'oNOPE';
				$resp['oCODE'] = 'E600B2';
				return $resp;
			} elseif($result == 'oNORECORD'){
				$resp['oSTATUS'] = 'oNOPE';
				$resp['oCODE'] = 'E404A1';
				return $resp;
			} elseif(empty($result['password'])){
				$resp['oCODE'] = 'E501A1'; #developer error (no implemented correctly)
				return $resp;
			} else {
				$passwordCheck = self::isPassword($password, $result['password']);
				unset($result['password']); #unset password as it has already been used

				if($passwordCheck === false){
					$resp['oSTATUS'] = 'oNOPE';
					$resp['oCODE'] = 'E401A1';
					return $resp;
				} else { #When password is valid
					oSession::start();
					if(!empty($result['puid'])){
						$_SESSION['oUSER'] = $result['puid'];
						$_SESSION['oUSERID'] = $userid;
						$_SESSION['oLOCKED'] = 'oNOPE';
						$_SESSION['oLASTACTIME'] = time();
						$data['oUSER'] = $_SESSION['oUSER'];
						$resp['oDATA'] = $data;
					}
					$resp['oSTATUS'] = 'oYEAP';
					$resp['oCODE'] = 'E200A1';
					return $resp;
				}
			}
		}
	} //****** END ******//


	//****** LOGOUT USER ******//
	public function logout($uri = 'login?zern=logout')
	{
		#TODO ~ collect user and record logout information
		oSession::start();
		if(isset($_SESSION['oUSER'])){
			oSession::delete('oUSER');
		}
		if(isset($_SESSION['oUSERID'])){
			oSession::delete('oUSERID');
		}
		if(isset($_SESSION['oLOCKED'])){
			oSession::delete('oLOCKED');
		}
		if(isset($_SESSION['oLASTACTIME'])){
			oSession::delete('oLASTACTIME');
		}
		oSession::restart();
		if(!empty($uri)){
			$this->app->redirect($uri);
		}
	} //****** END ******//


	//****** SESSION USER ******//
	public function userActive($column = '*')
	{
		if(!empty($_SESSION['oUSER'])){
			$condition['puid'] = $_SESSION['oUSER'];
			$db = $this->db;
			$user = $db->select($column, 'oUSERX', $condition, 1, 'oRECORD');
			if(!isset($user['oERROR'])){
				if($user == 'oNORECORD'){$this->app->redirect('login');}
				else {return self::humanize($user);}
			}
			#TODO ~ log error resulting from QUERY [on production, die on development]
			return false;
		}
	} //****** END ******//


	//****** MODIFY USER PASSWORD ******//
	public function updatePassword($puid, $password, $newpassword)
	{
		if(!empty($puid) && !empty($password) && !empty($newpassword)){
			$db = $this->db;
			$resp = array();

			#Find user
			$column = array('puid', 'password');
			$condition['puid'] = $puid;
			$user = $db->select($column, 'oUSERX', $condition, 1, 'oRECORD');
			if(isset($user['oERROR'])){
				$resp['oCODE'] = 'E600B2';
			}
			else {
				if($user === false){
					$resp['oCODE'] = 'E600B3';
				}
				elseif($user == 'oNORECORD'){
					$resp['oCODE'] = 'E404A1';
				}
				else {
					if(!self::isPassword($password, $user['password'])){
						$resp['oCODE'] = 'E401A1';
					}
					else {
						#Modify password with new password
						$udata = array(); $cond = array();
						$udata['password'] = self::password($newpassword);
						$ucondition['puid'] = $puid;

						$updatePW = $db->updateSQL('oUSERX', $udata, $ucondition, 1, 'oNUMROW');
						if($updatePW === 1){
							$this->app->redirect('locked?zern=password-changed');
						} else {
							#TODO ~
							$resp['oCODE'] = 'E304A1';
						}
					}
				}
			}
			return $resp;
		}
		return false;
	} //****** END ******//


	public static function isCrypt($crypted, $verify)
	{
		$string = self::crypt($crypted, 'decrypt');
		if($string == $verify){
			return true;
		}
		return false;
	}

	public static function restrict($input, $verify, $isCrypt = 'yeap', $redirect = '')
	{
		if($isCrypt == 'yeap'){
			$valid = self::isCrypt($input, $verify);
			if(!$valid && !empty($redirect)){
				URL::redirect($redirect);
			} elseif(!$valid){
				return true;
			}
		} elseif($input != $verify){
			if(!empty($redirect)){
				URL::redirect($redirect);
			}
			return true;
		}

		#false indicates that access should not be restricted
		return false;
	}
}
?>