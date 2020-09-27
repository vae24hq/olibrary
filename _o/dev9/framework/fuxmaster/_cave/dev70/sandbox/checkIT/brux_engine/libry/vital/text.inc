<?php
/* BRUX™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by ODAO™ OSAWERE [@iamodao - www.osawere.com] using PHP, SQL, HTML, CSS, JS & derived technology.
 * © June 2018 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | class•Text ~ string utilities
 */

class Text {
	private static $instance;

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

	//-------------- Return boolean on actual empty check ('0' is not empty) ---------------
	public static function isempty($input){
		if(!isset($input)){return TRUE;}
		else {
			if(is_array($input)){
				if(empty($input)){return TRUE;}
			} else {
				$input = trim($input);
				$length = strlen($input);
				if($length < 1){return TRUE;}
			}
		}
		return FALSE;
	}

	//-------------- Return boolean on actual not empty check ---------------
	public static function notempty($input){
		if(self::isempty($input)){return FALSE;}
		return TRUE;
	}

	//-------------- Return True (if array is multi-dimensional) or False ---------------
	public static function ismulti($array){
		return (count($array) != count($array, 1));
	}

	//-------------- Display Message in choice format ---------------
	public static function display($msg, $format='export'){
		if($format == 'dump'){var_dump($msg);}
		elseif($format == 'export'){echo '<tt><pre>'.var_export($msg, true).'</pre></tt>';}
		elseif($format == 'echo'){
			if(!is_array(($msg))){echo $msg;}
			else {
				foreach ($msg as $key => $value){
					echo $key.': '.$value."<br>";
				}
			}
		}
		else {print_r($msg);}
		return;
	}

	//-------------- Find needle in string and return boolean ---------------
	public static function in($input, $needle){
		if(strpos($input, $needle) !== FALSE){return TRUE;}
		return FALSE;
	}

	//-------------- Substitute a character|string|o_space in a string and vice-versa ---------------
	public static function swap($string, $search, $substitute , $occurrence='o_all'){
		#check if $search is found and return result, else return full string
		$found = self::in($string, $search);
		if(!$found){return $string;}
		else {
			if($occurrence == 'o_all'){
				return str_replace($search, $substitute, $string);
			} else {
				$pos = FALSE;
				if($occurrence == 'o_first'){$pos = strpos($string, $search);}
				elseif($occurrence == 'o_last'){$pos = strrpos($string, $search);}
				elseif(is_numeric($occurrence)){
					$occurrences = self::position($string, $search, 'o_all');
					$count = count($occurrences);
					#array count begins with 0, make sure $occurrence matches with $count
					$position = $occurrence-1;
					if($count <> $position){
						$pos = $occurrences[$position]-1;
					}
				}

				if($pos !== FALSE){return substr_replace($string, $substitute, $pos, strlen($search));} else {return $string;}
			}
		}
	}

	//-------------- Substitute space in a string with character|string and vice-versa ---------------
	public static function swapspace($string, $value, $inverse='nope'){
		if($inverse == 'yeah'){
			return str_replace($value, ' ', $string);
		}
		return preg_replace('/\s+/', $value, $string);
	}

	//-------------- Return FALSE OR value before first occurrence character|string if found ---------------
	public static function before($string, $search, $strip='yeah'){
		$pos = strpos($string, $search);
		if($pos && $pos != 0){$result = substr($string, 0, $pos);}
		if($strip != 'yeah'){$result = $result.$search;}
		if(isset($result)){return $result;}
		return FALSE;
	}

	//-------------- Return FALSE OR value after first character|string if found ---------------
	public static function after($string, $search, $strip='yeah'){
		$found = strstr($string, $search);
		if($found){
			$result = $found;
			if($strip == 'yeah'){
				$result = self::swap($result, $search, '', 'o_first');
			}
		}
		if(!empty($result)){return $result;}
		return FALSE;
	}

	//-------------- Return FALSE OR nth[numeric] position of character|string ---------------
	public static function nth($string, $nth){
		$length = strlen($string);
		if($nth <= $length){
			$nth = (int)$nth -1;
			return $string[$nth];
		}
		return FALSE;
	}

	//-------------- Return position(s) of character|string [CASE SenSItive] ---------------
	public static function position($string, $search, $occurrence='o_all'){
		#prepare default
		$offset = 1; $pos = FALSE;

		#prepare task
		if($occurrence != 'o_all'){
			if($occurrence == 'o_first'){$pos = strpos($string, $search);}
			if($occurrence == 'o_last'){$pos = strrpos($string, $search);}

			if($pos !== FALSE){$pos = $pos + $offset;}
		}
		else {
			$pos_first = self::position($string, $search, 'o_first');
			$pos_last = self::position($string, $search, 'o_last');

			if($pos_first === $pos_last){$pos = $pos_first;}
			else {
				$pointer = $pos_first; $pos[] = $pointer;
				while ($pointer < $pos_last){
					$pos_next = strpos($string, $search, $pointer);
					$pointer = $pos_next + $offset;
					$pos[] .= $pointer;
				}
			}
		}
		return $pos;
	}

	//-------------- Remove space, character anywhere found ---------------
	public static function trim($string, $char='o_default'){
		if(!empty($string)){
			$string = trim($string); #Remove space in edges
			if($char == 'o_space'){$string = preg_replace('/\s+/', '', $string);} #Remove space, anywhere found
			elseif(!empty($char)){$string = trim($string, $char);} #Remove (space|character|sting), from edges
		}
		return $string;
	}
}//END OF CLASS - Text
?>