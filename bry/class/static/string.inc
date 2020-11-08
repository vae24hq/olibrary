<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oString ~ String Handling • DEPENDENCY»
 */
class oString {
	//IS • Returns TRUE/FALSE if input is a string
	public static function is($i){
		return is_string($i);
	}


	//IS_EMPTY • Returns TRUE/FALSE if variable is empty or not
	public static function is_empty($i){
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


	//IN • Returns TRUE/FALSE if needle is found in string
	public static function in($string, $needle, $case=false){
		if($case === true){#case is sensitive
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


	//SPACE • Substitute space with value(s) in a string and vice-versa
	public static function space($string, $value, $inverse=false){
		if($inverse === true){return str_replace($value, ' ', $string);}
		return preg_replace('/\s+/', $value, $string);
	}


	//TO • Substitute a character|string in a string and vice-versa
	public static function to($string, $search, $substitute, $occurence='iAll', $case=false){
		if(self::in($string, $search, $case) === false){#return STRING if search NOT found
			return $string;
		}
		else {#when SEARCH is found in STRING
			if($occurence == 'iAll'){
				if($case === true){#when case IS sensitive
					return str_replace($search, $substitute, $string);
				}
				return str_ireplace($search, $substitute, $string); #only when case is NOT sensitive
			}
			else {
				if($occurence == 'iFirst'){$pos = strpos($string, $search);}
				if($occurence == 'iLast'){$pos = strrpos($string, $search);}
				if($pos !== false){
					return substr_replace($string, $substitute, $pos, strlen($search));
				}
				return $string;
			}
		}
	}


	//CLEAN • Clean up STRING/ARRAY
	public static function clean($i, $tags=''){
		if(empty($tags)){
		#To strip out javascript | HTML tags | Style tags | multi-line comments
			$tags = array(
				'@<script[^>]*?>.*?</script>@si',
				'@<[\/\!]*?[^<>]*?>@si',
				'@<style[^>]*?>.*?</style>@siU',
				'@<![\s\S]*?--[ \t\n\r]*>@'
			);
		}
		if(!is_array($i)){
			$o = '';
			$o = preg_replace($tags, '', $i);
			$o = strip_tags($o);
		}
		else {
			$o = array();
			foreach ($i as $key => $v){
				$clean = preg_replace($tags, '', $v);
				$clean = strip_tags($clean);
				$o[$key] = $clean;
			}
		}
		$o = preg_replace("/&#?[a-z0-9]+;/i","", $o);
		return trim($o);
	}


	//SLASH • Remove or add slash to string/array
	public static function slash($input, $r='iTrim'){
		if($r == 'iTrim'){
			if(!is_array($input)){
				$o = '';
				$o = stripslashes($input);
			}
			else {
				$o = array();
				foreach ($input as $key => $value){$o[$key] = stripslashes($value);}
			}
		}
		elseif($r == 'iAdd'){
			if(!is_array($input)){
				$o = '';
				$o = addslashes($input);
			}
			else {
				$o = array();
				foreach ($input as $key => $value){$o[$key] = addslashes($value);}
			}
		}
		return $o;
	}


	//BLUR • Substitute censored word from a string (using library as DB) @TODO ~ improve on it
	public static function blur($string, $lib, $symbol = ', ', $blur='***', $case=false){
		$o = $string;
		$words = explode(" ", $string);
		if(!is_array($lib)){
			$lib = explode($symbol, $lib);
		}
		#TODO ~ check for words with special characters - [fuck. fuck_ fuck* fuck/]
		foreach ($words as $word){
			if(in_array(strtolower($word), array_map('strtolower', $lib))){
				$o = self::to($o, $word, $blur , 'iAll', $case);
			}
		}
		return $o;
	}


	//CROP • Trim edges or character(s) from string
	public static function crop($string='', $v=''){
		if(!empty($string)){
			$o = trim($string);
			$o = preg_replace('/\s+/', '', $o);
			if(self::is_empty($v) === false){
				$o = trim($o, $v);
			}
			return $o;
		}
		return false;
	}


	//NTH • Trim edges or character(s) from string
	public static function nth($string='', $nth=''){ #nth is position IE value has to be numeric
		if(self::is_empty($string) === false && self::is_empty($nth) === false){
			$length = strlen($string);
			if($nth<=$length){
				$nth = (int)$nth -1;
				return $string[$nth];
			}
		}
		return false;
	}


	//BEFORE • Return false OR value before first occurrence character|string if found
	public static function before($string, $search, $strip=true){
		$pos = strpos($string, $search);
		if($pos && $pos != 0){$o = substr($string, 0, $pos);}
		if($strip !== true){$o = $o.$search;}
		if(isset($o)){return $o;}
		return false;
	}


	//AFTER • Return false OR value after first character|string if found
	public static function after($string, $search, $strip=true, $occurence='iFirst'){
		$found = strstr($string, $search);
		if($found){
			$o = $found;
			if($strip === true){
				$o = self::to($o, $search, '', $occurence);
			}
		}
		if(!empty($o)){return $o;}
		return false;
	}


	//MATCH •
	public static function match($string='', $comparison='', $absolute=false){
		if(!self::is_empty($string)  && !self::is_empty($comparison)){
			if($absolute === true){
				if($string === $comparison){return true;}
			}
			else {
				if($string == $comparison){return true;}
			}
			return false;
		}
	}
} // EndOfClass - oString