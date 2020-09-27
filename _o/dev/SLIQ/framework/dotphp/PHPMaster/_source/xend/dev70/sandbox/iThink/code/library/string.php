<?php
/* iQYRE™ - a micro web application development framework by iCYZa™ © 2015
 * Program -> string.php
 */

function InString($needle='', $string='', $trigger='self'){
	#SANCTION
 	if(empty($needle)){return IsError('U-STRING/01|01A', $trigger);}
 	if(empty($string)){return IsError('U-STRING/01|01B', $trigger);}
 	
 	#PREPARE & RETURN
	if(strpos($string, $needle) !== false){return TRUE;}
	else {return FALSE;}
}

function SpaceToChar($character='', $string='', $reverse='no-reverse', $trigger='self'){
	#SANCTION
 	if(empty($character)){return IsError('U-STRING/02|01A', $trigger);}
 	if(empty($string)){return IsError('U-STRING/02|01B', $trigger);}
 	if(empty($reverse)){return IsError('U-STRING/02|01C', $trigger);}
 	$reverses = array('reverse', 'no-reverse');
	if(!in_array($reverse, $reverses)){return IsError('U-STRING/02|02A', $trigger);}

 	#PREPARE & RESOLVE
 	if($reverse=='reverse'){$task = str_replace($character, ' ', $string);}
 	elseif($reverse=='no-reverse') {$task = preg_replace('/\s+/', $character, $string);}

	#RETURN
 	return $task;
}

function TrimEdge($string='', $character='', $trigger='self'){
	#SANCTION
 	if(empty($string)){return IsError('U-STRING/03|01A', $trigger);}
 	
 	#PREPARE & RESOLVE
	$task = trim($string);
	$task = preg_replace('/\s+/', '', $task);
 	if(!empty($character)){$task = trim($task, $character);}

	#RETURN
 	return $task;
}

function StringSwap($search='', $replace='', $subject='', $occurence='all', $trigger='self'){
	#SANCTION
 	if(empty($search)){return IsError('U-STRING/04|01A', $trigger);}
 	if(empty($subject)){return IsError('U-STRING/04|01B', $trigger);}
 	if(empty($occurence)){return IsError('U-STRING/04|01C', $trigger);}
 	$occurences = array('all', 'first', 'last');
	if(!in_array($occurence, $occurences)){return IsError('U-STRING/04|02A', $trigger);}

 	#PREPARE & RESOLVE
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
 	
	#RETURN
 	return $task;
}

function nthChar($nth='', $string='', $trigger='self'){
	#SANCTION
 	if(empty($nth)){return IsError('U-STRING/05|01A', $trigger);}
 	if(empty($string)){return IsError('U-STRING/05|01B', $trigger);}
 	
	#PREPARE & RETURN
	$length = strlen($string);
	if($nth<=$length){$nth = (int)$nth -1; $task = $string[$nth];}
	else {return FALSE;}
	return $task;
}

function StringBefore($needle='', $subject='', $stripNeedle='yeah', $trigger='self'){
	#SANCTION
 	if(empty($needle)){return IsError('U-STRING/06|01A', $trigger);}
 	if(empty($subject)){return IsError('U-STRING/06|01B', $trigger);}
 	if(empty($stripNeedle)){return IsError('U-STRING/06|01C', $trigger);}
	
	#PREPARE & RESOLVE
	$pos = strpos($subject, $needle);
	$task = '';
	if($pos && $pos!=0){$task = substr($subject, 0, $pos);}
	if($stripNeedle !='yeah'){$task = $task.$needle;}

	#RETURN
 	return $task;
}

function StringAfter($needle='', $subject='', $stripNeedle='yeah'){
	#SANCTION
 	if(empty($needle)){return IsError('U-STRING/07|01A', $trigger);}
 	if(empty($subject)){return IsError('U-STRING/07|01B', $trigger);}
 	if(empty($stripNeedle)){return IsError('U-STRING/07|01C', $trigger);}
	
	#PREPARE & RESOLVE
	$task = strstr($subject, $needle);
	if($task){
		if($stripNeedle =='yeah'){
			$task = str_replace($needle, '', $task);
		}
	}

	#RETURN
 	return $task;
}

function CleanString($string='', $trigger='self'){
	#ERROR CHECK
 	if(empty($string)){return IsError('U-STRING/08|01A', $trigger);}
	
	#PREPARE & RESOLVE
	/*$task = SpaceToChar('-', $string, 'reverse');
	$task = SpaceToChar('_', $task, 'reverse');
	$task = SpaceToChar('!', $task, 'reverse');
	$task = SpaceToChar('|', $task, 'reverse');*/
	$task = trim($task);

	#RETURN
 	return $task;
}

function StringInArrayToCap($words='library', $string=''){
	#SANCTION
 	if(empty($words)){return IsError('U-STRING/09|01A');}
 	if(empty($string)){return IsError('U-STRING/09|01B');}

 	if($words!='library'){if(!is_array($words)){return IsError('U-STRING/09|02A');}}
 	else {$words = array('sms', 'faq', 'Sms', 'Faq');}

	#PREPARE & RESOLVE
	$stringBit = preg_split('/\s+/', $string);
	foreach ($stringBit as $bit){
		if(in_array($bit, $words)){
			$capBit = strtoupper($bit);
			$string = str_replace($bit, $capBit, $string);
		}
	}
	
	#RETURN
	return $string;
}
?>