<?php
/* Caix™ ~ a framework for rapid web development built by Deron Ellse for Vien3™ © 2016
 * Program -> caix.php - caix related functions
 * ===============================================================================
 */

function is_empty($input=''){
	if(!isset($input)){return TRUE;}
	else {
		if(is_array($input)){
			if(empty($input)){return TRUE;}
		} else {
			$input = trim($input);
			$length = strlen($input);
			if($length<1){return TRUE;}
		}
	}
	return FALSE;
}

function in_string($string='', $needle=''){
	if(is_empty($string) || is_empty($needle)){
		return DoError('U-STRING/01|01');
	}

	if(strpos($string, $needle) !== false){return TRUE;}
	return FALSE;
}

function space_to_char($string='', $character='', $inverse='nope'){
 	if(is_empty($string) || is_empty($character) || is_empty($inverse)){
 		return DoError('U-STRING/02|01');
 	}

 	if($inverse=='yeah'){return str_replace($character, ' ', $string);}
 	return preg_replace('/\s+/', $character, $string);
}

function string_swap($subject='', $search='', $replace='', $occurence='all', $origin='self'){
 	if(is_empty($subject)){
 		$msg = 'An empty value has been parsed for the argument [subject] on '.__FUNCTION__.'() which originated from '. ucwords($origin);
 		return DoError('U-STRING/03|01A', $msg);
 	}
 	if(is_null($search)){return DoError('U-STRING/03|01B');}
 	if(is_null($replace)){return DoError('U-STRING/03|01C');}
 	if(is_empty($occurence)){return DoError('U-STRING/03|01D');}

 	$occurences = array('all', 'first', 'last');
	if(!in_array($occurence, $occurences)){
 		return DoError('U-STRING/03|02');
	}

	$isFound = strstr($subject, $search); //check if $search is found, else return full string
	if(!$isFound){$task = $subject;}
	else {
		if($occurence=='all'){$task = str_replace($search, $replace, $subject);}
		else {
			if($occurence=='first'){$pos = strpos($subject, $search);}
			if($occurence=='last'){$pos = strrpos($subject, $search);}
			if($pos !== false){$task = substr_replace($subject, $replace, $pos, strlen($search));}
			else {$task = $subject;}
		}
	}
 	
 	return $task;
}


function trim_edge($string='', $character=''){
 	if(is_empty($string) || is_null($character)){
 		return DoError('U-STRING/04|01A');
 	}

 	$task = trim($string);
	$task = preg_replace('/\s+/', '', $task);
 	if(!is_empty($character)){$task = trim($task, $character);}

 	return $task;
}

function nth_char($string='', $nth=''){ #nth is position ie value has to be numberic
 	if(is_empty($string) || is_empty($nth)){
 		return DoError('U-STRING/05|01');
 	}
 	
	$length = strlen($string);
	if($nth<=$length){
		$nth = (int)$nth -1;
		return $string[$nth];
	}
	return FALSE;
}

function string_before($subject='', $needle='', $strip='yeah'){
 	if(is_null($needle) || is_empty($subject) || is_empty($strip)){
 		return DoError('U-STRING/06|01');
 	}
	
	$pos = strpos($subject, $needle);
	$task = '';
	if($pos && $pos!=0){$task = substr($subject, 0, $pos);}
	if($strip !='yeah'){$task = $task.$needle;}

 	return $task;
}

function string_after($subject='', $needle='', $strip='yeah'){
 	if(is_null($needle) || is_empty($subject) || is_empty($strip)){
 		return DoError('U-STRING/07|01');
 	}
	
	$task = strstr($subject, $needle);
	if($task){
		if($strip =='yeah'){
			$task = str_replace($needle, '', $task);
		}
	}

 	return $task;
}


function clean_up($string=''){
	if(is_empty($string)){return DoError('U-STRING/10|01');}
 	
 	$string = trim($string);
	$string = string_swap($string, 'and', '&');
	$string = StringInArrayToCap($string);
	$string = string_swap($string, '_', ' ');
	$string = StringInArrayAs($string);
	$string = StringInArrayToCap($string);
	return $string;
}

function strip_to_space($string=''){
 	if(is_empty($string)){return DoError('U-STRING/11|01');}
	
	$string = trim($string);
	$string = space_to_char($string, '-', 'yeah');
	$string = space_to_char($string, '_', 'yeah');
	$string = space_to_char($string, '!', 'yeah');
	$string = space_to_char($string, '|', 'yeah');

 	return $string;
}

class caix {

	public static function site(){
		$site = strtolower($_SERVER['HTTP_HOST']);
		return trim_edge($site);
	}

	public static function domain($domain=''){
		if(empty($domain)){$domain = self::Site();}
		$domain = string_swap($domain, 'https://', '', 'first');
		$domain = string_swap($domain, 'http://', '', 'first');
		$domain = string_swap($domain, 'www.', '', 'first');
		$domain = string_swap($domain, 'mail.', '', 'first');
		$domain = string_swap($domain, 'ftp.', '', 'first');
		$domain = string_swap($domain, 'mx.', '', 'first');
		$domain = string_swap($domain, '/', '', 'last');
		return trim_edge(strtolower($domain));
	}

	public static function name($name=''){
		if(empty($name)){$name = self::Domain();}
		$name = str_replace('.com', '', $name);
		$name = str_replace('.org', '', $name);
		$name = str_replace('.net', '', $name);
		$name = str_replace('.ng', '', $name);
		$name = str_replace('.ga', '', $name);
		$name = str_replace('.tk', '', $name);
		$name = str_replace('.io', '', $name);

		$name = strip_to_space($name);
		$name = mb_convert_case($name.' ', MB_CASE_TITLE, "UTF-8");
		return trim_edge($name);
	}
}
?>