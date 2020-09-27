<?php
/* CYAR™ framework is an evolving library for rapid & efficient development of modem responsive static or dynamic website and applications.
 * Built and maintained at OIAVO™ using PHP, MySQL, HTML, CSS, JS & derived technology. Version 0.0.1 | CYAR™ Web framework © 2016
 * ========================================================================================================================================
 * PHP | core::device ~ device detection & rendition | Dependency » plugin {mobile-detect} + class {session}
 */

class device {
	private static $instance;

	//-------------- Prevent multiple instances ---------------
	private function __construct(){self::$status = 'offline'; return;}

	//-------------- Returns a single instance ---------------
	public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}


	// Validate device type
	public static function isValid($device){
		$data = array('desktop', 'tablet', 'phone');
		if(!empty($device) && in_array($device, $data)){return TRUE;}		
		return FALSE;
	}

	// Identify actual device type
	public static function identify(){
		$device = new Mobile_Detect;
		return ($device->isMobile() ? ($device->isTablet() ? 'tablet' : 'phone') : 'desktop');
	}

	// Set device type
	public static function setAs($to='request'){
		session::start();
		if($to=='request'){
			if(isset($_REQUEST['v']) && !empty($_REQUEST['v'])){
				if(self::isValid($_REQUEST['v'])){return $_SESSION['DeviceIsA'] = $_REQUEST['v'];}
				elseif(!empty($_SESSION['DeviceIsA'])){return $_SESSION['DeviceIsA'];}
				else {return $_SESSION['DeviceIsA'] = self::identify();}
			}
			elseif(!empty($_SESSION['DeviceIsA'])){return $_SESSION['DeviceIsA'];}
			else {return $_SESSION['DeviceIsA'] = self::identify();}
		}
		elseif(self::isValid($to)){return $_SESSION['DeviceIsA'] = $to;}
		else {return FALSE;}
	}

	// Return 'set' device type
	public static function is(){return self::setAs();}

} //************ End of class ~ Device ************//
?>