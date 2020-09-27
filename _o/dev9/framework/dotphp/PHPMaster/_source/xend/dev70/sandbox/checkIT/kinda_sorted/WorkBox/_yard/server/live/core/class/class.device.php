<?php
/* facil™ ver 0.1 (beta) - a cliqcore™ [iamSiEMO™] framework ~ {simplicity works!}
 * PHP :: class » Device - return information about the device accessing this app
 * Dependency » mobile-detect [library] | Session, isError [class]
 * Author(s) » Crieg A. Siemo - www.iamsiemo.com // crieg@siemo.com.ng
 * SiEMo™ Inc - www.siemo.com.ng ~ cliqcore™ - www.cliqcore.com [CLiQ4Net]
 * July 2014 © facil™
 */
 
// require_once('../_library/mobile-detect.php');
 require_once('class.session.php');
 
 class Device {
 	public $devices = array('phone', 'tablet', 'desktop');
	private $Session;
	
	function __construct(){
		global $facil_session;
		$this->Session = $facil_session;
		$this->Session->run();	
	}
	
	#detect device type
 	private function detect() {
 		$detect = new Mobile_Detect;
		$device = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'desktop');
		return $_SESSION['device'] = strtolower ($device);
 	}
	
	#set device type
	 function set($device='auto') {
		if($device=='auto') { return $device = $this->detect(); } // if device is set to detect type
		else { //if device is set to a fixed type
			if(in_array($device, $this->devices)) { return $_SESSION['device'] = $device; } //if fixed type is in array of types
			else { //log error []
				//echo '['.$device.'] is not a known device...we detect!';
				return $device = $this->detect();
			}
		}
	}
	
	#return device type
	public function isA($type='getinfo') {
			if(!empty($type) && $type !='getinfo') { return $this->set($type); }
			else {
				if(isset($_REQUEST['device']) && !empty($_REQUEST['device'])) { return $isA = $this->set($_REQUEST['device']); } //if a device type is requested
				elseif(isset($_SESSION['device']) && !empty($_SESSION['device'])) { return $isA = $_SESSION['device']; } //if session contains device type
				else { return $isA = $this->detect();  } //auto detect device type
			}
	}
 	
 }

#instantiate session and assign to variable
	$facil_device = new Device;
	//demo $session->run();
?>