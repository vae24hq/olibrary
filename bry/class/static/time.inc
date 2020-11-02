<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oTime ~ Date, Time & Period Utilities • DEPENDENCY» exit
 */
class oTime {
	//MICRO • Set/Get Timezone
	public static function Zone($i='iDomestic'){
		if(!empty($i)){
			if($i == 'iGet'){
				return date_default_timezone_get();
			}
			elseif($i == 'iDomestic'){
				return date_default_timezone_set('Africa/Lagos');
			}
			else {
				$zones = in_array($i, timezone_identifiers_list());
				if(!$zones){
					return oExit::Run(__METHOD__, 'Invalid', $i);
				}
				return date_default_timezone_set($i);
			}
		}
		return false;
	}



	//MICRO •
	public static function Micro(){
		list($usec, $sec) = explode(" ", microtime());
		return ((float)$usec + (float)$sec);
	}




	public static function StampValid($timestamp){
		$check = (is_int($timestamp) OR is_float($timestamp)) ? $timestamp : (string) (int) $timestamp;
		return  ($check === $timestamp) AND ( (int) $timestamp <=  PHP_INT_MAX) AND ( (int) $timestamp >= ~PHP_INT_MAX);
	}



	//STAMP • Create timestamp from string
	public static function Stamp($time='now'){
		if(!empty($time)){
			$o = strtotime($time);
			if(!$o){
				return oExit::Run(__METHOD__, 'not controverted', $time);
			}
			return $o;
		}
		return false;
	}



	//CREATE • Create time [Returns formated time or timestamp]
	public static function Create($fmt='iTime', $time='now'){
		if(!empty($fmt) && !empty($time)){
			if($time == 'now'){$time = time();}
			elseif(!is_int($time) && !is_numeric($time)){$time = self::Stamp($time);}

			if($fmt == 'iTime'){$fmt = 'h:i:s A';}
			elseif($fmt == 'iSQLTime'){$fmt = 'h:i:s';}
			elseif($fmt == 'iUnix'){return $t;}
			elseif($fmt == 'iDate'){return self::Date($fmt, $time);}
			return date($fmt, $time);
		}
		return false;
	}



	//DATE • Create date [Returns formated date]
	public static function Date($fmt='iDate', $date='today'){
		if(!empty($fmt) && !empty($date)){
			if($date == 'today' || $date == 'now'){$date = time();}
			elseif(!is_int($date) && !is_numeric($date)){$date = self::Stamp($date);}

			if($fmt == 'iDate'){$fmt = 'l, F d, Y';}
			elseif($fmt == 'iTime'){return self::Create($fmt, $date);}
			elseif($fmt == 'iDateTime'){$fmt = 'l, F d, Y h:i:s A';}
			elseif($fmt == 'iReport'){$fmt = 'd/m/Y h:i:s A';}
			elseif($fmt == 'iDateR1'){$fmt = 'd/m/Y';}
			elseif($fmt == 'iDateR2'){$fmt = 'd-m-Y';}
			elseif($fmt == 'iDateR3'){$fmt = 'F d, Y';}
			elseif($fmt == 'iSQLDateTime'){$fmt = 'Y-m-d H:i:s';}
			elseif($fmt == 'iSQL'){$fmt = 'Y-m-d';}
			elseif($fmt == 'iLetterA'){return date('M j', $date).'<sup>'.date('S', $date).'</sup> '.date('Y', $date);}
			elseif($fmt == 'iLetterB'){return date('j', $date).'<sup>'.date('S', $date).'</sup> '.date('F, Y', $date);}
			elseif($fmt == 'iLetterC'){return date('F j', $date).'<sup>'.date('S', $date).'</sup> '.date('Y', $date);}
			elseif($fmt == 'iUnix'){return $date;}
			return date($fmt, $date);
		}
		return false;
	}



	//AGE • Returns age from date of birth in years
	public static function Age($i=''){
		if(!empty($i)){
			#@TODO ~ make sure input match format (YYYY-MM-DD)
			$time = time(); $day = date("d", $time); $month = date("m", $time); $year = date("Y", $time);
			$birthDay = substr($i, 8, 2); $birthMonth = substr($i, 5, 2); $birthYear = substr($i, 0, 4);
			if($month < $birthMonth){$subtract = 1;}
			elseif($month==$birthMonth){
				if($day < $birthDay){$subtract = 1;}
				else {$subtract = 0;}
			}
			else {$subtract = 0;}
			return ($year-$birthYear-$subtract);
		}
		return false;
	}



	//SECOND TO • Convert seconds to min, hour & day
	public static function SecondsTo($sec, $to='iMinute'){
		if(!empty($sec) && !empty($to)){
			if($to == 'iMinute'){$o = ($sec / 60);}
			if($to == 'iHour'){$o = ($sec / 60) / 60;}
			if($to == 'iDay'){$o = (($sec / 60) / 60) / 24;}
			return $o;
		}
		return false;
	}



	//MINUTE TO • Convert minutes to seconds, hour & day
	public static function MinutesTo($min, $to='iSecond'){
		if(!empty($min) && !empty($to)){
			if($to == 'iSecond'){$o = ($min * 60);}
			if($to == 'iHour'){$o = ($min / 60);}
			if($to == 'iDay'){$o = ($min / 60) / 24;}
			return $o;
		}
		return false;
	}



	//HOUR TO • Convert hours to sec, min & day
	public static function HoursTo($hr, $to='iDay'){
		if(!empty($hr) && !empty($to)){
			if($to == 'iSecond'){$o = ($hr * 60) * 60;}
			if($to == 'iMinute'){$o = $hr * 60;}
			if($to == 'iDay'){$o = $hr / 24;}
			return $o;
		}
		return false;
	}



	//DAY TO • Convert days to sec, min & hours
	public static function DaysTo($day, $to='iHour'){
		if(!empty($day) && !empty($to)){
			if($to == 'iSecond'){$o = (($day * 24) * 60) * 60;}
			if($to == 'iMinute'){$o = ($day * 24) * 60;}
			if($to == 'iHour'){$o = $day * 24;}
			return $o;
		}
		return false;
	}



	//DIFFERENCE • Calculate time difference - TODO - upgrade and add features
	public static function Difference($past='', $future='', $fmt='%a days'){
		$past = new DateTime($past);
		$future = new DateTime($future);
		$date = $past->diff($future);
		return $date->format($fmt);
	}










} // EndOfClass - oTime