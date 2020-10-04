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
			elseif($fmt == 'iUnix'){return $t;}
			elseif($fmt == 'iDate'){return self::Date($fmt, $time);}
			return date($fmt, $time);
		}
		return false;
	}



	//DATE • Create date [Returns formated date]
	public static function Date($fmt='iSQLDateTime', $date='today'){
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
			elseif($fmt == 'iLetterA'){return date('M j', $date).'<sup>'.date('S', $date).'</sup> '.date('Y', $date);}
			elseif($fmt == 'iLetterB'){return date('j', $date).'<sup>'.date('S', $date).'</sup> '.date('F, Y', $date);}
			elseif($fmt == 'iLetterC'){return date('F j', $date).'<sup>'.date('S', $date).'</sup> '.date('Y', $date);}
			elseif($fmt == 'iUnix'){return $date;}
			return date($fmt, $date);
		}
		return false;
	}


} // EndOfClass - oTime