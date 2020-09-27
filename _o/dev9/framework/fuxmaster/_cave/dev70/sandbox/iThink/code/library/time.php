<?php
/* iQYRE™ - a micro web application development framework by iCYZa™ © 2015
 * Program -> time.php
 */

function SetTimeZoneTo($zone='domestic'){
	#ERROR CHECK
 	if(empty($zone)){return IsError('U-TIME/01|01A');}
 	
 	#PREPARE
	if($zone=='domestic'){$chore = date_default_timezone_set('Africa/Lagos');}
	else {
		$iszone = in_array($zone, timezone_identifiers_list());
		if(!$iszone){
			$add_msg = ' Invalid timezone {'.$zone.'} ';
			return IsError('U-TIME/01|02A', $add_msg, 'self');
		}
		else {$chore = date_default_timezone_set($zone);}
	}
 	
 	#RETURN
 	return $chore;
}

function MicroTimeFloat(){
	#PREPARE
	list($usec, $sec) = explode(" ", microtime());
	
	#RETURN
	return ((float)$usec + (float)$sec);
}

function DoTimeStamp($timeString='', $caller=''){
	#ERROR CHECK
 	if(empty($timeString)){return IsError('U-TIME/02|01A');}

	#PREPARE
	$chore = strtotime($timeString);
	if(!$chore){
		$add_msg = ' Timestamp conversion failed {'.$timeString.'} '.$caller;
		return IsError('U-TIME/02|02A', $add_msg, $caller);
	}

	#RETURN
 	return $chore;
}

function DoTime($format='time', $time='now'){
	#ERROR CHECK
 	if(empty($format)){return IsError('U-TIME/03|01A');}
 	if(empty($time)){return IsError('U-TIME/03|01B');}
 	
	#PREPARE
	if($time=='now'){$timeIs = time();}
	else {
		$timeIs = DoTimeStamp($time, 'U-TIME/03');
		if(!$timeIs){
			if(is_numeric($time)){$timeIs = $time;}
			else {return IsError('U-TIME/03|02A', $time);}
		}
	}

	if($format=='time'){$formatIs = 'h:i:s A';}
	else {$formatIs = $format;}

 	#RETURN
	return date($formatIs, $timeIs);
}

function DoDate($format='date', $date='today'){
	#ERROR
 	if(empty($format)){return IsError('U-TIME/04|01A');}
 	if(empty($date)){return IsError('U-TIME/04|01B');}
 	
	#PREPARE
	if($date=='today'){$dateIs = time();}
	else {
		$dateIs = doTimeStamp($date, 'U-TIME/04');
		if(!$dateIs){
			if(is_numeric($date)){$dateIs = $date;}
			else {return IsError('U-TIME/04|02A', $date);}
		}
	}

	if($format=='date'){$formatIs = 'l, F d, Y';}
	elseif($format=='dateAndtime'){$formatIs = 'l, F d, Y h:i:s A';}
	elseif($format=='report'){$formatIs = 'd/m/Y h:i:s A';}
	elseif($format=='dateD1'){$formatIs = 'd/m/Y';}
	elseif($format=='dateD2'){$formatIs = 'd-m-Y';}
	elseif($format=='dateD3'){$formatIs = 'F d, Y';}
	elseif($format=='sqlDateTime'){$formatIs = 'Y-m-d h:i:s';}

	//for the following, RETURN
	elseif($format=='letter'){return date('j').'<sup>'.date('S').'</sup> '.date('F, Y');}
	elseif($format=='letter2'){return date('M j').'<sup>'.date('S').'</sup> '.date('Y');}
	elseif($format=='letter3'){return date('F j').'<sup>'.date('S').'</sup> '.date('Y');}
	else {$formatIs = $format;}

 	#RETURN
	return date($formatIs, $dateIs);
}
?>