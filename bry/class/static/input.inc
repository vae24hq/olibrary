<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oInput ~ Input Utility • DEPENDENCY» string
 */
class oInput {
	//METHOD • Returns data from post/get/request
	public static function method($i='iPost', $v=''){
		if(!empty($i)){
			if($i == 'iRequest' && oString::is_empty($_REQUEST)  === false){$o = $_REQUEST;}
			elseif($i == 'iGet' && oString::is_empty($_GET)  === false){$o = $_GET;}
			elseif($i == 'iPost' && oString::is_empty($_POST)  === false){$o = $_POST;}
			elseif($i == 'iSession' && oString::is_empty($_SESSION)  === false){$o = $_SESSION;}
		}

		if(!empty($o)){
			if(oString::is_empty($v) === false){
				if(isset($o[$v])){return $o[$v];}
				return false;
			}
			return $o;
		}
		return false;
	}





	public static function encode($i='', $v='iHTML', $inverse=false){
		if(!empty($i)){
			if($v == 'iHTML'){
				if($inverse === false){
					return htmlentities($i); #return htmlentities($i, ENT_COMPAT|ENT_QUOTES,'ISO-8859-1', true);
				}
				else {
					return html_entity_decode($i);
				}
			}
		}
		return false;
	}





	public static function dataset($data, $set){
		$dataset = array();
		foreach($set as $index){
			if(array_key_exists($index, $data)){
				$dataset[$index] = trim($data[$index]);
				#@TODO ~ call cleanup method
			}
			else {
				$dataset[$index] = '';
			}
		}
		if(!empty($dataset)){return $dataset;}
		return '';
	}





	public static function clean($i){
		return oString::clean($i);
	}





	public static function sanitize($i, $v=''){
		if(!oString::is_empty($i)){
			if(is_array($i)){
				$sanitizers = ['email', 'password'];
				foreach($i as $key => $value){
					if(in_array($key, $sanitizers)){
						$o[$key] = self::sanitize($value, 'i'.ucfirst($key));
					}
					else {
						$o[$key] = self::sanitize($value, $v);
					}
				}
			}
			else {
				$o = $i;

				if($v == 'iEmail'){
					$o = filter_var($o, FILTER_SANITIZE_EMAIL);
					$o = trim(strtolower($o));
				}

				if($v == 'iPassword'){
					$o = oCrypt::password($o);
				}

				$o = addslashes($o);
				$o  = self::clean($o);
			}
			return $o;
		}
		return false;
	}
} // EndOfClass - oInput