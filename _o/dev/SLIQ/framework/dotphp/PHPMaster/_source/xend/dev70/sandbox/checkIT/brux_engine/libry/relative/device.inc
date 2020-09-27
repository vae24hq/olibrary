<?php
/* BRUX™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by ODAO™ OSAWERE [@iamodao - www.osawere.com] using PHP, SQL, HTML, CSS, JS & derived technology.
 * © June 2018 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | class•Device ~ 
 */

class Device {
	private static $instance;

	//-------------- Prevent multiple instances ---------------
	private function __construct(){
		require PLUG.'mobile.inc';
		return;
	}

	//-------------- Prevent duplication ---------------
	private function __clone(){return;}

	//-------------- Returns a single instance ---------------
	public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}

	//-------------- Validate device type ---------------
	public static function validate($device=''){
		$devices = array('desktop', 'tablet', 'phone');
		if(!empty($device) && in_array($device, $devices)){return true;}
		return false;
	}

	//-------------- Identify device type ---------------
	public static function identify(){
		$device = new Mobile_Detect;
		return ($device->isMobile() ? ($device->isTablet() ? 'tablet' : 'phone') : 'desktop');
	}

	//-------------- Set device type ---------------
	public static function set($to='request'){
		#Session::Start();
		if($to=='request'){
			if(isset($_REQUEST['render']) && !empty($_REQUEST['render'])){
				if(self::validate($_REQUEST['render'])){return $_SESSION['DeviceIsA'] = $_REQUEST['render'];}
				elseif(!empty($_SESSION['DeviceIsA'])){return $_SESSION['DeviceIsA'];}
				else { return $_SESSION['DeviceIsA'] = self::identify();}
			}
			elseif(!empty($_SESSION['DeviceIsA'])){return $_SESSION['DeviceIsA'];}
			else {return $_SESSION['DeviceIsA'] = self::identify();}
		}
		elseif(self::validate($to)){return $_SESSION['DeviceIsA'] = $to;}
		else {return false;}
	}

	//-------------- Returns device type ---------------
	public static function isA($type='request'){
		return self::set($type);
	}
}// END OF CLASS - Device

# Instantiate class to enable usage
Device::instantiate();
?>