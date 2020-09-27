<?php
class device {
	private static $instance;

		public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}

	public static function validate($device=''){
		$devices = array('desktop', 'tablet', 'phone');
		if(!empty($device) && in_array($device, $devices)){return TRUE;}
		return FALSE;
	}

	public static function identify(){
		$device = new Mobile_Detect;
		return ($device->isMobile() ? ($device->isTablet() ? 'tablet' : 'phone') : 'desktop');
	}

	public static function set_as($to='request'){
		Session::Start();
		if($to=='request'){
			if(isset($_REQUEST['v']) && !empty($_REQUEST['v'])){
				if(self::validate($_REQUEST['v'])){return $_SESSION['DeviceIsA'] = $_REQUEST['v'];}
				elseif(!empty($_SESSION['DeviceIsA'])){return $_SESSION['DeviceIsA'];}
				else { return $_SESSION['DeviceIsA'] = self::identify();}
			}
			elseif(!empty($_SESSION['DeviceIsA'])){return $_SESSION['DeviceIsA'];}
			else {return $_SESSION['DeviceIsA'] = self::identify();}
		}
		elseif(self::validate($to)){return $_SESSION['DeviceIsA'] = $to;}
		else {return FALSE;}
	}

	public static function is(){return self::set_as();}
}
?>