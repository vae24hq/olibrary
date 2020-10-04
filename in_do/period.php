<?php






	//-------------- Calculate & Returns time difference ---------------
public static function difference($past='', $future='', $yield='string', $unitAs='long'){
	if(empty($past) || empty($future) || empty($yield) || empty($unitAs)){
		$msg = 'One or more errors occurred with the argument on '.__FUNCTION__.'()';
		return die($msg);
	}
	if($past>=$future){
		$msg = 'past cannot be greater than future in '.__FUNCTION__.'()';
		return die($msg);
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

		#returning particular unit, from the total
	if($yield=='Y'){return ($time / 31556926 % 12);}
	if($yield=='W'){return ($time / 604800 % 52);}
	if($yield=='D'){return ($time / 86400 % 7);}
	if($yield=='H'){return ($time / 3600 % 24);}
	if($yield=='M'){return ($time / 60 % 60);}
	if($yield=='S'){return ($time % 60);}
}

	//-------------- Calculate and Returns time spent ---------------
public static function spent($unixTime=''){
	if(empty($unixTime)){return false;}

	$nowTime = time();
	$nowDate = self::doDate("j", $nowTime); $nowMonth = self::doDate("n", $nowTime); $nowyear = self::doDate("Y", $nowTime);
	$timeDate = self::doDate("j", $unixTime); $timeMonth = self::doDate("n", $unixTime); $timeYear = self::doDate("Y", $unixTime);
	$time_spent = ''; $numVar = 0; $unit ='';
	if($nowTime>=$unixTime){
			if($nowTime-$unixTime < 60){#for SECONDS
				$seconds = $nowTime-$unixTime; $time_spent = $seconds; $numVar = 773; $unit = 'second';
			}
			elseif($nowTime-$unixTime < 3600){#for MINUTES
				$minutes = round(($nowTime-$unixTime)/60); $time_spent = $minutes; $numVar = 774; $unit = 'minute';
			}
			elseif($nowTime-$unixTime < 86400){#for HOURS
				$hours = round(($nowTime-$unixTime)/3600); $time_spent = $hours; $numVar = 775; $unit = 'hour';
			}
			elseif($nowTime-$unixTime < 1209600){#for DAYS
				$days = round(($nowTime-$unixTime)/86400); $time_spent = $days; $numVar = 776; $unit = 'day';
			}
			elseif(mktime(0, 0, 0, $nowMonth-1, $nowDate, $nowyear) < mktime(0, 0, 0, $timeMonth, $timeDate, $timeYear)){#for WEEKS
				$weeks = round(($nowTime-$unixTime)/604800); $time_spent = $weeks; $numVar = 777; $unit = 'week';
			}
			elseif(mktime(0, 0, 0, $nowMonth, $nowDate, $nowyear-1) < mktime(0, 0, 0, $timeMonth, $timeDate, $timeYear)){#for MONTHS
				if($nowyear==$timeYear){$subtract = 0;} else {$subtract = 12;}
				$months = round($nowMonth-$timeMonth+$subtract); $time_spent = $months; $numVar = 778; $unit = 'month';
			}
			else {
				#for YEARS
				if($nowMonth<$timeMonth){$subtract = 1;}
				elseif($nowMonth==$timeMonth){
					if($nowDate<$timeDate){$subtract = 1;}
					else {$subtract = 0;}
				}
				else {$subtract = 0;}
				$years = $nowyear-$timeYear-$subtract;
				$time_spent = $years;
				$numVar = 779;
				$unit = 'year';
				if($years == 0) { $time_spent = "  => "; $numVar = 0;}
			}
			return array($numVar, $time_spent, $unit);
			// return $time_spent.$unit;
		} else {$msg = ' Please enter a past time'; die($msg);}
	}

	//-------------- Returns duration of time spent ---------------
	public static function duration($unixTime){
		if(empty($unixTime)){return false;}
		else {
			$time_spent = self::spent($unixTime);
			$durationCount = $time_spent['1']; $unit = $time_spent['2'];
			if($durationCount>1){$unit = ($unit.'s');}
			return ($durationCount.' '.$unit.' ago');
		}
	}


























	//-------------- Return time in micro floats ---------------
	public static	function doMicro(){
		list($usec, $sec) = explode(" ", microtime());
		return ((float)$usec + (float)$sec);
	}


	//****** CREATE DATE & TIME, RETURN [formated] ******//
	public static	function create($period='oNOW', $type='oDATE'){
		if($period == 'oNOW' || $period == 'oTODAY'){$period = time();}
		if(!self::isTimestamp($period)){$period = strtotime($period);}

		#Format
		if($type == 'oDATE'){$format = 'd-M-Y';}
		elseif($type == 'oDATED1'){$format = 'd/m/Y';}
		elseif($type == 'oDATED2'){$format = 'd-m-Y';}
		elseif($type == 'oDATED3'){$format = 'F d, Y';}
		elseif($type == 'oDATED4'){$format = 'l, F d, Y';}

		elseif($type == 'oTIME'){$format = 'h:i:s A';}

		elseif($type == 'oDATETIME'){$format = 'l, F d, Y h:i:s A';}

		elseif($type == 'oMYSQLDATETIME'){$format = 'Y-m-d H:i:s';}
		elseif($type == 'oMYSQLDATE'){$format = 'Y-m-d';}
		elseif($type == 'oMYSQLTIME'){$format = 'H:i:s';}

		elseif($type == 'oREPORT'){$format = 'd/m/Y h:i:s A';}

		elseif($type == 'oLETTER1'){return date('j').'<sup>'.date('S').'</sup> '.date('F, Y');}
		elseif($type == 'oLETTER2'){return date('M j').'<sup>'.date('S').'</sup> '.date('Y');}
		elseif($type == 'oLETTER3'){return date('F j').'<sup>'.date('S').'</sup> '.date('Y');}
		elseif($type == 'oUNIX'){return $period;}
		else {$format = $type;}

		return date($format, $period);
	} //****** END ******//


	//****** COMPUTE TIME DIFFERENCE, RETURN SECONDS ******//
	public static function secondsApart($past, $future='oNOW')
	{
		if(!empty($past) && !empty($future)){
			if($future == 'oNOW' || $future == 'oTODAY'){$future = time();}
			$resolve = $future - $past;
			return $resolve;
		}
		return false;
	} //****** END ******//






	//-------------- Calculates time spent {from the past - unixtime} untill now - Returns array ---------------
	public static function timeDiff($pastUnixTime='', $futureUnixTime='now'){
		if(isEmpty($pastUnixTime)){return false;} #TODO - make sure its valid unix timestamp

		if(isEmpty($futureUnixTime) || $futureUnixTime == 'now'){$now = time();} else {$now = $futureUnixTime;}
		$nowDate = date("j", $now); $nowMonth = date("n", $now); $nowyear = date("Y", $now);
		$timeDate = date("j", $pastUnixTime); $timeMonth = date("n", $pastUnixTime); $timeYear = date("Y", $pastUnixTime);
		$spent = "  => "; $numVar = 0; $unit ="  => ";
		if($now >= $pastUnixTime){
			switch(true){
				case($now-$pastUnixTime < 60):
					#RETURNS SECONDS
				$seconds = $now-$pastUnixTime; $spent = $seconds; $numVar = 773; $unit = 'second';
				break;

				case ($now-$pastUnixTime < 3600):
					#RETURNS MINUTES
				$minutes = round(($now-$pastUnixTime)/60); $spent = $minutes; $numVar = 774; $unit = 'minute';
				break;

				case ($now-$pastUnixTime < 86400):
					#RETURNS HOURS
				$hours = round(($now-$pastUnixTime)/3600); $spent = $hours; $numVar = 775; $unit = 'hour';
				break;

				case ($now-$pastUnixTime < 1209600):
					#RETURNS DAYS
				$days = round(($now-$pastUnixTime)/86400); $spent = $days; $numVar = 776; $unit = 'day';
				break;

				case (mktime(0, 0, 0, $nowMonth-1, $nowDate, $nowyear) < mktime(0, 0, 0, $timeMonth, $timeDate, $timeYear)):
					#RETURNS WEEKS
				$weeks = round(($now-$pastUnixTime)/604800); $spent = $weeks; $numVar = 777; $unit = 'week';
				break;

				case (mktime(0, 0, 0, $nowMonth, $nowDate, $nowyear-1) < mktime(0, 0, 0, $timeMonth, $timeDate, $timeYear)):
					#RETURNS MONTHS
				if($nowyear==$timeYear){$subtract = 0;} else {$subtract = 12;}
				$months = round($nowMonth-$timeMonth+$subtract); $spent = $months; $numVar = 778; $unit = 'month';
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
				$spent = $years;
				$numVar = 779;
				$unit = 'year';
				if($years == 0) {$spent = "  => "; $numVar = 0;}
				break;
			}

			return Array($numVar, $spent, $unit);
		}
		else {
			$msg = ' Please enter a past time';
			return printMsg($msg);
		}
	}

	//Return duration of time {from the past - unixtime} untill now
	function getTimeSpent($pastUnixTime='', $futureUnixTime='now'){
		if(!isEmpty($pastUnixTime)){
			$spent = self::timeDiff($pastUnixTime, $futureUnixTime);
			$count = $spent['1']; $unit = $spent['2'];
			if($count > 1){$unit = ($unit.'s');}
			return ($count.' '.$unit.' ago');
		}
		return FALSE;
	}





//Calculate time diffrence - TODO - upgrade and add features
	function getTimeDifference($past='', $future=''){
		$past = new DateTime($past);
		$future = new DateTime($future);
		$interval = $past->diff($future);
		return $interval->format('%a total days');
	}



	function isValidDateTimeString($str_dt, $str_dateformat, $str_timezone) {
		$date = DateTime::createFromFormat($str_dateformat, $str_dt, new DateTimeZone($str_timezone));
		return $date && DateTime::getLastErrors()["warning_count"] == 0 && DateTime::getLastErrors()["error_count"] == 0;
	}









//Calculate time diffrence
	function calc_time_difference($past='', $future='', $yield='string', $unitAs='long'){
		if(is_empty($past) || is_empty($future) || is_empty($yield) || is_empty($unitAs)){
			$msg = 'One or more errors occured with the argument on '.__FUNCTION__.'()';
			return print_msg($msg);
		}
		if($past>=$future){
			$msg = 'past cannot be greater than future in '.__FUNCTION__.'()';
			return print_msg($msg);
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

	#returning particular unit, from the total
		if($yield=='Y'){return ($time / 31556926 % 12);}
		if($yield=='W'){return ($time / 604800 % 52);}
		if($yield=='D'){return ($time / 86400 % 7);}
		if($yield=='H'){return ($time / 3600 % 24);}
		if($yield=='M'){return ($time / 60 % 60);}
		if($yield=='S'){return ($time % 60);}
	}


//Returns time spent
	function time_spent($unixTime=''){
		if(is_empty($unixTime)){return FALSE;}

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
			return print_msg($msg);
		}
	}


//Return duration
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