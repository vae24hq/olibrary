<?php
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


	//-------------- Find needle in string and return boolean ---------------
	public static function in($string, $needle){
		$string = (string) $string;
		$needle = (string) $needle;
		if(strpos($string, $needle) !== false){return true;}
		return false;
	}

	public static function isSame($string, $string2){
		if($string === $string2){ return true;}
		return false;
	}

	public static function swapText($subject='', $search='', $replace='', $occurence='all'){
		$occurences = array('all', 'first', 'last');
		if(Helper::isEmpty($subject) || is_null($search) || is_null($replace) || Helper::isEmpty($occurence) || !in_array($occurence, $occurences)){
			$msg = 'One or more errors occurred with the argument on '.__FUNCTION__.'()';
			return printMsg($msg);
		}

		#Cast to String
		$subject = (string) $subject;
		$search = (string) $search;
		$replace = (string) $replace;

		$isfound = strstr($subject, $search); //check if $search is found, else return full string
		if(!$isfound){$chore = $subject;}
		else {
			if($occurence=='all'){$chore = str_replace($search, $replace, $subject);}
			else {
				if($occurence=='first'){$pos = strpos($subject, $search);}
				if($occurence=='last'){$pos = strrpos($subject, $search);}
				if($pos !== false){$chore = substr_replace($subject, $replace, $pos, strlen($search));}
				else {$chore = $subject;}
			}
		}
		return $chore;
	}

	public static function partOf($input, $length, $ellipses = true, $strip_html = true) {
		//strip tags, if desired
		if ($strip_html) {$input = strip_tags($input);}

		//no need to trim, already shorter than trim length
		if (strlen($input) <= $length) {return $input;}

		//find last space within length
		$last_space = strrpos(substr($input, 0, $length), ' ');
		$trimmed_text = substr($input, 0, $last_space);

		//add ellipses (...)
		if ($ellipses) {$trimmed_text .= '...';}

		return $trimmed_text;
	}
}
?>