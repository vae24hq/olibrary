<?php
/** Begin STRING functions **/

// check for needle in string
function inString($string='', $needle=''){
	if(isEmpty($string) || isEmpty($needle)){return FALSE;}
	if(strpos($string, $needle) !== false){return TRUE;}
	return FALSE;
}

// find and replace string
function stringSwap($subject='', $search='', $replace='', $occurence='all'){
	#check if $search is found, else return full string
	$isfound = strstr($subject, $search);
	if(!$isfound){$task = $subject;}
	else {
		if($occurence=='all'){$task = str_replace($search, $replace, $subject);}
		else {
			if($occurence=='first'){$pos = strpos($subject, $search);}
			if($occurence=='last'){$pos = strrpos($subject, $search);}
			if($pos !== false){$task = substr_replace($subject, $replace, $pos, strlen($search));}
			else {$task = $subject;}
		}
	}

 	#return task
	return $task;
}

// trim edges or character(s) from string
function trimEdge($string='', $character=''){
 	#perform validation
	if(isEmpty($string) || is_null($character)){return false;}

 	#prepare & return result
	$task = trim($string);
	$task = preg_replace('/\s+/', '', $task);
	if(!isEmpty($character)){$task = trim($task, $character);}
	return $task;
}

// return words capitalized
function capitalizeWords($string='', $words='library'){
	if(isEmpty($string) || isEmpty($words) || ($words!='library' && !is_array($words))){return false;}
	if($words=='library'){
		$words = array(
			'sms', 'faq', 'cms',
			'Sms', 'Faq', 'Cms'
		);
	}
	$stringBit = preg_split('/\s+/', $string);
	foreach ($stringBit as $bit){
		if(in_array($bit, $words)){
			$capBit = strtoupper($bit);
			$string = str_replace($bit, $capBit, $string);
		}
	}

	#return task
	return $string;
}

// returns cleaned up string
function cleanUp($string=''){
	if(isEmpty($string)){return FALSE;}
	$string = trim($string);
	$string = stringSwap($string, ' and', ' &');
	$string = stringSwap($string, '-', ' ');

	#return task
	return $string;
}

function rewriteRH($string=''){
	if(isEmpty($string)){return FALSE;}
	$string = trim($string);
	$string = strtolower($string);
	$string = stringSwap($string, '_', ' ');
	$string = stringSwap($string, 'bank', '');
	$string = stringSwap($string, 'banking', '');
	$string = stringSwap($string, 'boa', 'BofA');
	$string = stringSwap($string, 'ing ', 'ING ');
	$string = stringSwap($string, ' ing', ' ING');
	$string = stringSwap($string, 'wells fargo', 'W.Fargo');

	$string = trim($string);
	$string = ucwords($string);
	$string = stringSwap($string, 'ING', ' ING_Bank');
	$string = preg_replace('!\s+!', ' ', $string);
	$string = capitalizeWords($string);
	return $string;
}?>