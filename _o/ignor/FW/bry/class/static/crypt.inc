<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oCrypt ~ Encryption/Decryption • DEPENDENCY»
 */
class oCrypt {
	protected static $method = 'aes-128-ctr'; #default cipher method if none supplied
	private static $key;

	//BASE64 • Describe method
	public static function base($input='', $encode=true){
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
	public static function password($input, $cost=''){
		if(!empty($cost) && is_int($cost) && $cost > 4){
			return password_hash($input, PASSWORD_BCRYPT, array('cost' => $cost));
		}
		elseif ($cost == 'iDefault'){
			return password_hash($input, PASSWORD_BCRYPT);
		}
		return password_hash($input, PASSWORD_BCRYPT);
	}




	//PASSWORD • Password Verification
	public static function is_password($password, $hash){
		return password_verify($password, $hash);
	}




	//PREPARE • Prepare Cipher
	protected static function iv_bytes(){
		return openssl_cipher_iv_length(self::$method);
	}




	//PREPARE • Prepare Encryption
	public static function prepare($key=false, $method=false){
		if(!$key || empty($key)){$key = php_uname();} #default encryption key if none supplied
		if(ctype_print($key)){self::$key = openssl_digest($key, 'SHA256', TRUE);} #convert ASCII keys to binary format
		else {$key = $key;}

		if($method){
			if(in_array(strtolower($method), openssl_get_cipher_methods())){self::$method = $method;}
			else {
				oExit::run(__METHOD__, "unrecognized cipher method: [{$method}]", __CLASS__);
			}
		}
	}




	//EN • Encryption
	public static function en($input='', $key=false, $method=false){
		if(!empty($input)){
			self::prepare($key, $method);
			$iv = openssl_random_pseudo_bytes(self::iv_bytes());
			return bin2hex($iv) . openssl_encrypt($input, self::$method, self::$key, 0, $iv);
		}
		return false;
	}




	//DE • Decryption
	public static function de($input='', $key=false, $method=false){
		if(!empty($input)){
			self::prepare($key, $method);
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





	//DO • Run Encryption
	public static function run($input='', $type = 'iCrypt', $key=false, $method=false){
		if(!empty($input)){
			if($type == 'iCrypt'){
				$o = hash("md5", $input);
				$o = sha1($o);
				$o = md5($o);
			}
			elseif($type == 'iEncrypt'){
				return self::en($input, $key, $method);
			}
			elseif($type == 'iDecrypt'){
				return self::de($input, $key, $method);
			}

			if(!empty($o)){return $o;}
		}

		return false;
	}
} // EndOfClass - oCrypt