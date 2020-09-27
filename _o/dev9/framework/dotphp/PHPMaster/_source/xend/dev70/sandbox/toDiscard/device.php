<?php
/* iQYRE™ - a micro web application development framework by iCYZa™ © 2015
 * Program -> device.php
 */

class Device {
	private static $Instance;
	public static $IsA;

	private static function IsKnown($device='', $caller=''){
		#ERROR CHECK
 		if(empty($device)){return IsError('C-DEVICE/01|01A');}

		#PREPARE & RETURN
		$devices = array('desktop', 'tablet', 'phone');
		if(!empty($device) && in_array($device, $devices)){return TRUE;}
		else {return FALSE;}
	}

	private function __construct(){
		self::$IsA = self::IsA();
		return;
	}

	public static function Detect(){
		$obj = new Mobile_Detect;
		return ($obj->isMobile() ? ($obj->isTablet() ? 'tablet' : 'phone') : 'desktop');
	}

	public static function IsIE(){
		$obj = new Mobile_Detect;
		$version = $obj->version('IE');
		if(!$version){return FALSE;}
		else {return intval($version);}
	}

	public static function Set($to='request'){
		SustainSession(); #Session::Sustain();
		if($to=='request'){
			if(isset($_REQUEST['render']) && !empty($_REQUEST['render'])){
				if(self::IsKnown($_REQUEST['render'])){
					return $_SESSION['DeviceIsA'] = $_REQUEST['render'];
				}
				elseif(!empty($_SESSION['DeviceIsA'])){
					return $_SESSION['DeviceIsA'];
				}
				else {
					return $_SESSION['DeviceIsA'] = self::Detect();
				}
			}
			elseif(!empty($_SESSION['DeviceIsA'])){
				return $_SESSION['DeviceIsA'];
			}
			else {
				return $_SESSION['DeviceIsA'] = self::Detect();
			}
		} 
		elseif(self::IsKnown($to)){
			return $_SESSION['DeviceIsA'] = $to;
		}
		else {
			#die('CE400D2 '.__METHOD__);
			return IsError('C-DEVICE/02|02A');
		}
	}

	public static function IsA(){
		return self::Set();
	}

	public static function Instanciate(){
		if(is_null(self::$Instance)){self::$Instance = new self();}
		return self::$Instance;
	}
}
?>