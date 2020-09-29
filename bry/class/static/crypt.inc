<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oCrypt ~ Encryption/Decryption • DEPENDENCY»
 */
class oCrypt {
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

	public static function Do($input='', $type = 'iCrypt'){
		if(!empty($input)){
			if($type == 'iCrypt'){
				$o = hash("md5", $input);
				$o = sha1($o);
				$o = md5($o);
			}

			if(!empty($o)){return $o;}
		}

		return false;
	}


	public static function Password($input, $cost=9){
		if(!empty($cost) && is_int($cost) && $cost > 4){
			return password_hash($input, PASSWORD_BCRYPT, array('cost' => $cost));
		}
		elseif ($cost == 'iDefault'){
			return password_hash($input, PASSWORD_BCRYPT);
		}
		return password_hash($input, PASSWORD_BCRYPT);
	}

	public static function PasswordIs($password, $hash){
		return password_verify($password, $hash);
	}


} // EndOfClass - oCrypt