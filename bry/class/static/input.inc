<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oInput ~ Input Utility • DEPENDENCY» string
 */
class oInput {
	//METHOD • Returns data from post/get/request
	public static function Method($i='iPost', $v=''){
		if(!empty($i)){
			if($i == 'iRequest' && oString::IsEmpty($_REQUEST)  === false){$o = $_REQUEST;}
			elseif($i == 'iGet' && oString::IsEmpty($_GET)  === false){$o = $_GET;}
			elseif($i == 'iPost' && oString::IsEmpty($_POST)  === false){$o = $_POST;}
			elseif($i == 'iSession' && oString::IsEmpty($_SESSION)  === false){$o = $_SESSION;}
		}

		if(!empty($o)){
			if(oString::IsEmpty($v) === false){
				if(isset($o[$v])){return $o[$v];}
				return false;
			}
			return $o;
		}
		return false;
	}



	public static function EncodeHTML($i=''){
		if(!empty($i)){
			// return htmlentities($i, ENT_COMPAT|ENT_QUOTES,'ISO-8859-1', true);
			return htmlentities($i);
		}
		return false;
	}


	public static function DecodeHTML($i=''){
		if(!empty($i)){
			return html_entity_decode($i);
		}
		return false;
	}





	public static function Dataset($data, $set){
		$dataset = array();
		foreach($set as $index){
			if(array_key_exists($index, $data)){
				$dataset[$index] = trim($data[$index]);
				#@TODO ~ call cleanup method
			}
			else {
				$dataset[$index] = NULL;
			}
		}
		if(!empty($dataset)){return $dataset;}
		return false;
	}





	public static function clean($i){
		if(!empty($i)){
			if(is_array($i)){
				foreach($i as $key => $value){
					$o[$key] = clean($value);
				}
			}
			else {
				$s = array(
					'@<script[^>]*?>.*?</script>@si', #Strip out Javascript
					'@<[\/\!]*?[^<>]*?>@si',          #Strip out HTML tags
					'@<style[^>]*?>.*?</style>@siU',  #Strip style tags properly
					'@<![\s\S]*?--[ \t\n\r]*>@'       #Strip multi-line comments
				);
				$o = preg_replace($s, '', $i);
				$o = trim($o);
			}
			return $o;
		}
		return false;
	}





	public static function sanitize($i, $v=''){
		if(!empty($i)){
			if(is_array($i)){
				foreach($i as $key => $value){$o[$key] = clean($value);}
			}
			else {
				$o = $i;
				if($v == 'iEmail'){
					$o = filter_var($o, FILTER_SANITIZE_EMAIL);
					$o = trim(strtolower($o));
				}

				if(get_magic_quotes_gpc()){$o = stripslashes($o);}
				$o  = self::clean($o);
			}
			return $o;
		}
		return false;
	}


} // EndOfClass - oInput