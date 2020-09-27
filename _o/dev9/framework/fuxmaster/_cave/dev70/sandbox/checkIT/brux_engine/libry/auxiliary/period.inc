<?php
/* BRUX™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by ODAO™ OSAWERE [@iamodao - www.osawere.com] using PHP, SQL, HTML, CSS, JS & derived technology.
 * © June 2018 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | class•Period ~ manage PHP date & time
 */

class Period {
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

	//-------------- Set default time zone ---------------
	public static function setZone($zone='domestic'){
		if(empty($zone)){return false;}

		if($zone=='domestic'){$result = date_default_timezone_set('Africa/Lagos');}
		else {
			$iszone = in_array($zone, timezone_identifiers_list());
			if(!$iszone){
				$msg = ' invalid timezone {'.$zone.'} ';
				die($msg);
			}
			else {$result = date_default_timezone_set($zone);}
		}
		return $result;
	}

	//-------------- Return micro floats ---------------
	public static function microFloat(){
		list($usec, $sec) = explode(" ", microtime());
		return ((float)$usec + (float)$sec);
	}

	//-------------- Create timestamps ---------------
	public static function timestamp($timeString='now', $caller=''){
		if(empty($timeString)){return false;}
		if(!empty($caller)){$caller = ' on '.$caller;}

		$chore = strtotime($timeString);
		if(!$chore){
			$msg = 'Timestamps conversion failed {'.$timeString.'} '.$caller;
			return die($msg);
		}
		return $chore;
	}

	//-------------- Create time ---------------
	public static function doTime($format='o_time', $time='now'){
		if(empty($format) || empty($time)){return false;}
		if($time=='now'){$timeIs = time();}
		else {
			if(is_int($time) || is_numeric($time)){$timeIs = $time;}
			else {
				$timeIs = timestamp($time, __FUNCTION__);
				if(!$timeIs){
					if(is_numeric($time)){$timeIs = $time;}
					else {return die(' invalid time ['.$time.']');}
				}
			}
		}
		if($format=='o_time'){$formatIs = 'h:i:s A';}
		elseif($format ='o_unix'){return $timeIs;}
		else {$formatIs = $format;}
		return date($formatIs, $timeIs);
	}

	//-------------- Create date ---------------
	public static function doDate($format='o_date', $date='o_today'){
		if(empty($format) || empty($date)){return false;}
		if($date=='o_today'){$dateIs = time();}
		else {
			if(is_int($date) || is_numeric($date)){$dateIs = $date;}
			else {
				$dateIs = timestamp($date, __FUNCTION__);
				if(!$dateIs){
					if(is_numeric($date)){$dateIs = $date;}
					else {return die(' invalid date ['.$date.']');}
				}
			}
		}
		if($format=='o_date'){$formatIs = 'l, F d, Y';}
		elseif($format=='o_time'){$formatIs = 'h:i:s A';}
		elseif($format=='o_dateAndtime'){$formatIs = 'l, F d, Y h:i:s A';}
		elseif($format=='o_report'){$formatIs = 'd/m/Y h:i:s A';}
		elseif($format=='o_dateD1'){$formatIs = 'd/m/Y';}
		elseif($format=='o_dateD2'){$formatIs = 'd-m-Y';}
		elseif($format=='o_dateD3'){$formatIs = 'F d, Y';}
		elseif($format=='sqlDateTime'){$formatIs = 'Y-m-d h:i:s';}
		//for the following, RETURN
		elseif($format=='o_letter1'){return date('j').'<sup>'.date('S').'</sup> '.date('F, Y');}
		elseif($format=='o_letter2'){return date('M j').'<sup>'.date('S').'</sup> '.date('Y');}
		elseif($format=='o_letter3'){return date('F j').'<sup>'.date('S').'</sup> '.date('Y');}
		elseif($format=='o_unix'){return $dateIs;}
		else {$formatIs = $format;}
		return date($formatIs, $dateIs);
	}

	//-------------- Returns age from date of birth ---------------
	public static function getAge($birthDate=''){//format(YYYY-MM-DD)
		if(empty($birthDate)){return false;}
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

}// END OF CLASS - Period
?>