<?php
/* PYPE™ - web development framework [HTML/CSS/PHP/SQL/JS/MORE]
 * PHP | utility::string
 * Dependency » *
 */
function clean($string){
		$string = str_replace('-', ' ', $string);
		$string = str_replace('_', ' ', $string);
		$string = trimspace($string);
		return $string;
}

function trimspace($string){
		$string = trim($string);
		return $string;
}

function decorate($string,$As='sentence'){
	if($As=='sentence'){return ucfirst($string);}
	if($As=='capword'){return ucwords($string);}
}

//return string before a value
function strBefore($subject, $needle){
	$pos = strpos($subject, $needle);
	if($pos >=1){return substr($subject, 0, $pos);}
	else {return FALSE;}
}

//return string after a value
function strAfter($subject, $needle, $removeNeedle='no'){
	$isNeedle = strstr($subject, $needle);
	if($isNeedle){
		if($removeNeedle !='no'){$isNeedle = str_replace($needle, '', $isNeedle);}
	return $isNeedle;
	}
	else {return FALSE;}
	
}

//remove extra white space, or space & value from 
function strStrip($value, $char=''){
	$task = preg_replace('/\s\s+/', ' ', $value);
	$task = trimspace($task);
	if($char!=''){$task = trim($task, $char);}
	return $task;
}

//replace string with value
function replaceString($search, $replace, $subject, $occurence='all'){
	$task ='ok';

	#check if $search is found, else return full string
	$isSearch = strstr($subject, $search);
	if(!$isSearch){$task = $subject;}
	else {
		if($occurence=='all'){$task = str_replace($search, $replace, $subject);}
		else {
			if($occurence=='first'){$pos = strpos($subject, $search);}
			if($occurence=='last'){$pos = strrpos($subject, $search);}
			
			if($pos !== false){
				$task = substr_replace($subject, $replace, $pos, strlen($search));
			}
		}
	}
	return $task;
}

//check if a string exists inside another
function inString($needle, $string){
	if (strpos($string, $needle) !== false){
		return TRUE;
	}
	else {
		return FALSE;
	}
}

//return $n characters of a string countring from begining
function nthCharOfString($string, $nth){
	$nth = $nth -1;
	return $string[$nth];
}
?>