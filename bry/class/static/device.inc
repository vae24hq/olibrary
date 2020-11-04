<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oDevice ~ Detect User Device • DEPENDENCY» detect
 */
class oDevice {
	//ISVALID • Return TRUE/FALSE on device type
	public static function validate($type=''){
		if(!empty($type)){
			$types = array('iDesktop', 'iTablet', 'iPhone');
			if(!empty($type) && in_array($type, $types)){return true;}
		}
		return false;
	}





	//IDENTIFY • Identify the device
	public static function identify(){
		$device = new Mobile_Detect;
		return ($device->isMobile() ? ($device->isTablet() ? 'iTablet' : 'iPhone') : 'iDesktop');
	}





	//AS • Set device type
	public static function as($to='iRequest'){
		if($to=='iRequest'){
			if(isset($_REQUEST['v']) && !empty($_REQUEST['v'])){
				if(self::validate($_REQUEST['v'])){return $_SESSION['DeviceIsA'] = $_REQUEST['v'];}
				elseif(!empty($_SESSION['DeviceIsA'])){return $_SESSION['DeviceIsA'];}
				else {return $_SESSION['DeviceIsA'] = self::identify();}
			}
			elseif(!empty($_SESSION['DeviceIsA'])){return $_SESSION['DeviceIsA'];}
			else {return $_SESSION['DeviceIsA'] = self::identify();}
		}
		elseif(self::validate($to)){return $_SESSION['DeviceIsA'] = $to;}
		else {return false;}
	}





	//IS • Get device type
	public static function is(){
		return self::as();
	}
} // EndOfClass - oDevice