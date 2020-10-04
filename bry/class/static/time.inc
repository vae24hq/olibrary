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
			return date($fmt, $time);
		}
	}


} // EndOfClass - oTime