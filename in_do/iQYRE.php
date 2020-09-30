<?php


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