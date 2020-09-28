<?php
function set_timezone($zone='domestic'){
 	if(is_empty($zone)){return FALSE;}

	if($zone=='domestic'){$chore = date_default_timezone_set('Africa/Lagos');}
	else {
		$iszone = in_array($zone, timezone_identifiers_list());
		if(!$iszone){
			$msg = ' invalid timezone {'.$zone.'} ';
			return printMsg($msg);
		}
		else {$chore = date_default_timezone_set($zone);}
	}
 	return $chore;
}

function micro_time_float(){
	list($usec, $sec) = explode(" ", microtime());
	return ((float)$usec + (float)$sec);
}

function do_timestamp($timeString='now', $caller=''){
 	if(is_empty($timeString)){return FALSE;}
 	if(!is_empty($caller)){$caller = ' on '.$caller;}

	$chore = strtotime($timeString);
	if(!$chore){
		$msg = ' timestamp conversion failed {'.$timeString.'} '.$caller;
		return printMsg($msg);
	}
 	return $chore;
}

function do_time($format='time', $time='now'){
 	if(is_empty($format) || is_empty($time)){return FALSE;}
	if($time=='now'){$timeIs = time();}
	else {
		if(is_int($time) || is_numeric($time)){$timeIs = $time;}
		else {
			$timeIs = do_timestamp($time, __FUNCTION__);
			if(!$timeIs){
				if(is_numeric($time)){$timeIs = $time;}
				else {return printMsg(' invalid time ['.$time.']');}
			}
		}
	}
	if($format=='time'){$formatIs = 'h:i:s A';}
	elseif($format ='unix'){return $timeIs;}
	else {$formatIs = $format;}
	return date($formatIs, $timeIs);
}

function do_date($format='date', $date='today'){
 	if(is_empty($format) || is_empty($date)){return FALSE;}
	if($date=='today'){$dateIs = time();}
	else {
		if(is_int($date) || is_numeric($date)){$dateIs = $date;}
		else {
			$dateIs = do_timestamp($date, __FUNCTION__);
			if(!$dateIs){
				if(is_numeric($date)){$dateIs = $date;}
				else {return printMsg(' invalid date ['.$date.']');}
			}
		}
	}
	if($format=='date'){$formatIs = 'l, F d, Y';}
	elseif($format=='time'){$formatIs = 'h:i:s A';}
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
	elseif($format=='unix'){return $dateIs;}
	else {$formatIs = $format;}
	return date($formatIs, $dateIs);
}

function get_age($birthDate=''){//format(YYYY-MM-DD)
 	if(is_empty($birthDate)){return FALSE;}
	$time = time();
	$day = date("d", $time); $month = date("m", $time); $year = date("Y", $time);
	$birthDay = substr($birthDate, 8, 2); $birthMonth = substr($birthDate, 5, 2); $birthYear = substr($birthDate, 0, 4);
	if($month < $birthMonth){$subtract = 1;}
	elseif($month==$birthMonth){
		if($day < $birthDay){$subtract = 1;}
		else {$subtract = 0;}
	}
	else {$subtract = 0;}
	$chore = $year-$birthYear-$subtract;
	return $chore;
}

function calc_time_difference($past='', $future='', $yield='string', $unitAs='long'){
 	if(is_empty($past) || is_empty($future) || is_empty($yield) || is_empty($unitAs)){
 		$msg = 'One or more errors occured with the argument on '.__FUNCTION__.'()';
 		return printMsg($msg);
 	}
	if($past>=$future){
		$msg = 'past cannot be greater than future in '.__FUNCTION__.'()';
 		return printMsg($msg);
 	}

	$time = $future - $past;

	if($unitAs=='short'){
		$units = array(
		'y'=>$time / 31556926 % 12,
		'w'=>$time / 604800 % 52,
		'd'=>$time / 86400 % 7,
		'h'=>$time / 3600 % 24,
		'm'=>$time / 60 % 60,
		's'=>$time % 60);
	}
	elseif($unitAs=='abbr'){
		$units = array(
		' yr'=>$time / 31556926 % 12,
		' wk'=>$time / 604800 % 52,
		' day'=>$time / 86400 % 7,
		' hr'=>$time / 3600 % 24,
		' min'=>$time / 60 % 60,
		' sec'=>$time % 60);
	}
	else {
		$units = array(
		' year'=>$time / 31556926 % 12,
		' week'=>$time / 604800 % 52,
		' day'=>$time / 86400 % 7,
		' hour'=>$time / 3600 % 24,
		' minute'=>$time / 60 % 60,
		' second'=>$time % 60);
	}

	foreach($units as $unit => $value){
    	if($value>1){
    		if($unitAs!='short'){$ret[] = $value . $unit .'s';}
			else {$ret[] = $value . $unit;}
		}
    	if($value==1){$ret[] = $value . $unit;}
    }
	$count = count($ret);
	if($unitAs!='short'){
		if($count > 1){array_splice($ret, count($ret)-1, 0, 'and');}
		$ret[] = '';
	  }
	if($yield=='string'){return join(' ', $ret);}
	 	if($yield=='array'){return $ret;}

	#RETURNING PARTICULAR UNIT, from the total
	if($yield=='Y'){return ($time / 31556926 % 12);}
	if($yield=='W'){return ($time / 604800 % 52);}
	if($yield=='D'){return ($time / 86400 % 7);}
	if($yield=='H'){return ($time / 3600 % 24);}
	if($yield=='M'){return ($time / 60 % 60);}
	if($yield=='S'){return ($time % 60);}
}

function time_spent($unixTime=''){
 	if(is_empty($unixTime)){return DoError('U-CALC/03|01');}

	$nowTime = time();
	$nowDate = do_date("j", $nowTime); $nowMonth = do_date("n", $nowTime); $nowyear = do_date("Y", $nowTime);
	$timeDate = do_date("j", $unixTime); $timeMonth = do_date("n", $unixTime); $timeYear = do_date("Y", $unixTime);
	$time_spent = "  => "; $numVar = 0; $dateUnit ="  => ";
	if($nowTime>=$unixTime){
		switch(TRUE){
			case($nowTime-$unixTime < 60):
				#RETURNS SECONDS
				$seconds = $nowTime-$unixTime; $time_spent = $seconds; $numVar = 773; $dateunit = 'second';
				break;

			case ($nowTime-$unixTime < 3600):
				#RETURNS MINUTES
				$minutes = round(($nowTime-$unixTime)/60); $time_spent = $minutes; $numVar = 774; $dateunit = 'minute';
				break;

			case ($nowTime-$unixTime < 86400):
				#RETURNS HOURS
				$hours = round(($nowTime-$unixTime)/3600); $time_spent = $hours; $numVar = 775; $dateunit = 'hour';
				break;

			case ($nowTime-$unixTime < 1209600):
				#RETURNS DAYS
				$days = round(($nowTime-$unixTime)/86400); $time_spent = $days; $numVar = 776; $dateunit = 'day';
				break;

			case (mktime(0, 0, 0, $nowMonth-1, $nowDate, $nowyear) < mktime(0, 0, 0, $timeMonth, $timeDate, $timeYear)):
				#RETURNS WEEKS
				$weeks = round(($nowTime-$unixTime)/604800); $time_spent = $weeks; $numVar = 777; $dateunit = 'week';
				break;

			case (mktime(0, 0, 0, $nowMonth, $nowDate, $nowyear-1) < mktime(0, 0, 0, $timeMonth, $timeDate, $timeYear)):
				#RETURNS MONTHS
				if($nowyear==$timeYear){$subtract = 0;} else {$subtract = 12;}
				$months = round($nowMonth-$timeMonth+$subtract); $time_spent = $months; $numVar = 778; $dateunit = 'month';
				break;

			default:
				#RETURNS YEARS
				if($nowMonth<$timeMonth){$subtract = 1;}
				elseif($nowMonth==$timeMonth){
					if($nowDate<$timeDate){$subtract = 1;}
					else {$subtract = 0;}
				}
				else {$subtract = 0;}
				$years = $nowyear-$timeYear-$subtract;
				$time_spent = $years;
				$numVar = 779;
				$dateunit = 'year';
				if($years == 0) { $time_spent = "  => "; $numVar = 0;}
				break;
		}

		return Array($numVar, $time_spent, $dateunit);
	}
	else {
		$msg = ' Please enter a past time';
		return printMsg($msg);
	}
}

function get_duration($unixTime){
 	if(is_empty($unixTime)){return FALSE;}
	else {
		$time_spent = time_spent($unixTime);
		$durationCount = $time_spent['1']; $dateUnit = $time_spent['2'];
		if($durationCount>1){$dateUnit = ($dateUnit.'s');}
		return ($durationCount.' '.$dateUnit.' ago');
	}
}
?>