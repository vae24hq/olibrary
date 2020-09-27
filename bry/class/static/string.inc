<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oString ~ String Handling • DEPENDENCY»
 */
class oString {

	//Is • Returns TRUE/FALSE if variable is string
	public static function Is($i){
		return is_string($i);
	}


	//IsEmpty • Returns TRUE/FALSE if variable is empty or not
	public static function IsEmpty($i){
		if(!isset($i)){return true;}
		else {
			if(is_array($i)){
				if(empty($i)){return true;}
			} else {
				$i = trim($i);
				$length = strlen($i);
				if($length < 1){return true;}
			}
		}
		return false;
	}


	//In • Returns TRUE/FALSE if needle is found in string
	public static function In($string, $needle, $case_sensitive=false){
		if($case_sensitive === true){#case IS sensitive
			if(strpos($string, $needle) !== false){
				return true;
			}
		}
		else {#case is NOT sensitive
			if(stripos($string, $needle) !== false){
				return true;
			}
		}
		return false;
	}


	//SpaceTo • Substitute space with value(s) in a string and vice-versa
	public static function SpaceTo($string, $value, $inverse=false){
		if($inverse === true){return str_replace($value, ' ', $string);}
		return preg_replace('/\s+/', $value, $string);
	}


	//To • Substitute a character|string in a string and vice-versa
	public static function To($string, $search, $substitute , $occurence='oALL', $case_sensitive=false){
		if(self::In($string, $search, $case_sensitive) === false){#return STRING if search NOT found
			return $string;
		}
		else {#when SEARCH is found in STRING
			if($occurence == 'oALL'){
				if($case_sensitive === true){#when case IS sensitive
					return str_replace($search, $substitute, $string);
				}
				return str_ireplace($search, $substitute, $string); #only when case is NOT sensitive
			}
			else {
				if($occurence == 'oFIRST'){$pos = strpos($string, $search);}
				if($occurence == 'oLAST'){$pos = strrpos($string, $search);}
				if($pos !== false){
					return substr_replace($string, $substitute, $pos, strlen($search));
				}
				return $string;
			}
		}
	}



	//Blur • Substitute censored word from a string (using library as DB) @TODO ~ improve on it
	public static function Blur($string, $library, $symbol = ', ', $blur='***', $case_sensitive=false){
		$o = $string;
		$words = explode(" ", $string);
		if(!is_array($library)){
			$library = explode($symbol, $library);
		}

		foreach ($words as $word){
			if(in_array(strtolower($word), array_map('strtolower', $library))){
				$o = self::To($o, $word, $blur , 'oALL', $case_sensitive);
			}
		}
		return $o;
	}


		//-------------- Return false OR value before first occurrence character|string if found ---------------
	public static function before($string, $search, $strip='oYEAH'){
		$pos = strpos($string, $search);
		if($pos && $pos != 0){$result = substr($string, 0, $pos);}
		if($strip != 'oYEAH'){$result = $result.$search;}
		if(isset($result)){return $result;}
		return false;
	}


	//-------------- Return false OR value after first character|string if found ---------------
	public static function after($string, $search, $strip='oYEAH'){
		$found = strstr($string, $search);
		if($found){
			$result = $found;
			if($strip == 'oYEAH'){
				$result = oString::swap($result, $search, '', 'oFIRST');
			}
		}
		if(!empty($result)){return $result;}
		return false;
	}


	public static function match($string='', $comparison='', $rule='iDEFAULT'){
		if($rule == 'iABSOLUTE' && $string === $comparison){return true;}
		elseif($rule != 'iABSOLUTE' && $string == $comparison){return true;}
		return false;
	}

	public static function domainUtility($o, $to){
		#Returns domain from URL
		if($to == 'oDOMAIN'){
			$o = oString::swap($o, 'https://', '', 'oFIRST');
			$o = oString::swap($o, 'http://', '', 'oFIRST');

			#Remove sub-directory if found
			if(self::in($o, '/')){
				$o = self::stringBefore($o, '/', 'oYEAH');
			}

			#Remove [known] sub-domain  TODO  ~ use library
			$subs = array('www','en', 'ng');
			$o_stripped = '';
			foreach ($subs as $sub){
				if(self::in($o, $sub)){
					$o = oString::swap($o, 'www.', '', 'oFIRST');
				}
			}
		}

		#Returns page title from string
		if($to == 'oTITLE'){
			$o = oString::swap($o, '-', ' ');
			$o = oString::swap($o, '_', ' ');
			$o = ucwords($o);
		}


		#Returns method-clean name from string
		if($to == 'oMETHOD'){
			$o = oString::swap($o, '-', ' ');
			$o = oString::swap($o, '_', ' ');
			$o = ucwords($o);
			$o = lcfirst($o);
			$o = self::spaceTo($o, '');
		}

		return $o;
	}


} // EndOfClass - oString