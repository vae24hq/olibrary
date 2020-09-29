<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oCrypt ~ Encryption/Decryption • DEPENDENCY»
 */
class oCrypt {
	protected static $method = 'aes-128-ctr'; // default cipher method if none supplied
	private static $key;

	//BASE64 • Describe method
	public static function Base64($input='', $encode=true){
		if(!empty($input)){
			if($encode === true){
				$o = base64_encode($input);
			}
			else {
				$o = base64_decode($input);
			}
			return $o;
		}
		return false;
	}



	//PASSWORD • Password Encryption
	public static function Password($input, $cost=9){
		if(!empty($cost) && is_int($cost) && $cost > 4){
			return password_hash($input, PASSWORD_BCRYPT, array('cost' => $cost));
		}
		elseif ($cost == 'iDefault'){
			return password_hash($input, PASSWORD_BCRYPT);
		}
		return password_hash($input, PASSWORD_BCRYPT);
	}


	//PASSWORD • Password Verification
	public static function PasswordIs($password, $hash){
		return password_verify($password, $hash);
	}



	protected static function iv_bytes(){
		return openssl_cipher_iv_length(self::$method);
	}


	//PREPARE • Password Verification
	public static function Prepare($key=false, $method=false){
		if(!$key || empty($key)){$key = php_uname();} #default encryption key if none supplied
		if(ctype_print($key)){self::$key = openssl_digest($key, 'SHA256', TRUE);} #convert ASCII keys to binary format
		else {$key = $key;}

		if($method){
			if(in_array(strtolower($method), openssl_get_cipher_methods())){self::$method = $method;}
			else {
				oExit::Run(__METHOD__, "unrecognized cipher method: [{$method}]", __CLASS__);
			}
		}
	}



	public static function En($input='', $key=false, $method=false){
		if(!empty($input)){
			self::Prepare($key, $method);
			$iv = openssl_random_pseudo_bytes(self::iv_bytes());
			return bin2hex($iv) . openssl_encrypt($input, self::$method, self::$key, 0, $iv);
		}
		return false;
	}


	public static function De($input='', $key=false, $method=false){
		if(!empty($input)){
			self::Prepare($key, $method);
			$iv_strlen = 2  * self::iv_bytes();
			if(preg_match("/^(.{" . $iv_strlen . "})(.+)$/", $input, $regs)) {
				list(, $iv, $crypted_string) = $regs;
				if(ctype_xdigit($iv) && strlen($iv) % 2 == 0) {
					return openssl_decrypt($crypted_string, self::$method, self::$key, 0, hex2bin($iv));
				}
			}
		}
		return false;
	}


	//DO • Do Encryption
	public static function Do($input='', $type = 'iCrypt', $key=false, $method=false){
		if(!empty($input)){
			if($type == 'iCrypt'){
				$o = hash("md5", $input);
				$o = sha1($o);
				$o = md5($o);
			}
			elseif($type == 'iEncrypt'){
				return self::En($input, $key, $method);
			}
			elseif($type == 'iDecrypt'){
				return self::De($input, $key, $method);
			}

			if(!empty($o)){return $o;}
		}

		return false;
	}


} // EndOfClass - oCrypt