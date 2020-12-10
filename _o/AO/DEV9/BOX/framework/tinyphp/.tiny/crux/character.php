<?php
class Character {
	private static $instance;
	private static $config;

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



	//-------------- Find needle in string and return boolean ---------------
	public static function in($string, $needle){
		if(strpos($string, $needle) !== false){return true;}
		return false;
	}

	//-------------- Substitute a character|string in a string and vice-versa ---------------
	public static function swap($string, $search, $substitute , $occurence='all'){
		#check if $search is found and return result, else return full string
		$found = self::in($string, $search);
		if(!$found){return $string;}
		else {
			if($occurence == 'all'){return str_replace($search, $substitute, $string);}
			else {
				if($occurence == 'first'){$pos = strpos($string, $search);}
				if($occurence == 'last'){$pos = strrpos($string, $search);}

				if($pos !== false){
					return substr_replace($string, $substitute, $pos, strlen($search));
				}
				else {return $string;}
			}
		}
	}

	//-------------- Substitute space in a string with character|string and vice-versa ---------------
	public static function spaceTo($string, $value, $inverse='nope'){
		if($inverse == 'yeah'){
			return str_replace($value, ' ', $string);
		}
		return preg_replace('/\s+/', $value, $string);
	}

	//-------------- Return false OR value before first occurrence character|string if found ---------------
	public static function before($string, $search, $strip='yeah'){
		$pos = strpos($string, $search);
		if($pos && $pos != 0){$result = substr($string, 0, $pos);}
		if($strip != 'yeah'){$result = $result.$search;}
		if(isset($result)){return $result;}
		return false;
	}


	//-------------- Return false OR value after first character|string if found ---------------
	public static function after($string, $search, $strip='yeah'){
		$found = strstr($string, $search);
		if($found){
			$result = $found;
			if($strip == 'yeah'){
				$result = self::swap($result, $search, '', 'first');
			}
		}
		if(!empty($result)){return $result;}
		return false;
	}


	//-------------- Return false OR nth[numeric] position of character|string ---------------
	public static function nth($string, $nth){
		$length = strlen($string);
		if($nth <= $length){
			$nth = (int)$nth -1;
			return $string[$nth];
		}
		return false;
	}


	//-------------- Return position(s) of character|string [CASE SenSItive] ---------------
	public static function position($string, $search, $occurence='all'){
		#prepare default
		$offset = 1; $pos = false;

		#prepare task
		if($occurence != 'all'){
			if($occurence == 'first'){$pos = strpos($string, $search);}
			if($occurence == 'last'){$pos = strrpos($string, $search);}

			if($pos !== false){$pos = $pos + $offset;}
		}
		else {
			$pos_first = self::position($string, $search, 'first');
			$pos_last = self::position($string, $search, 'last');

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
	public static function trim($string, $trim='o_default', $char=''){
		if(!empty($string)){

			#Remove space in edges
			$string = trim($string);

			#Remove space, anywhere found
			if($trim == 'o_space'){$string = preg_replace('/\s+/', '', $string);}

			#Remove (space|character|sting), from edges
			if($trim == 'o_char'){$string = trim($string, $char);}
		}
		return $string;
	}
}
// END OF CLASS - Character
?>