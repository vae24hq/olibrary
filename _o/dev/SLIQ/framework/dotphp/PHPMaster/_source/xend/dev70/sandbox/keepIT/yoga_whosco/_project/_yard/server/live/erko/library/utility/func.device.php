<?php
/* Cigna™ - a micro web content management system by QuickOne™
 * SiEMO™ Nigeria [www.siemo.com.ng]
 * Author(s) -> Crieg A. Siemo ~ www.iamsiemo.com // crieg@siemo.com.ng
 * © August 2014 | version 1.0 beta
 * PHP | func:device - manages device detetction for display & other functionality
 * Dependency » plugin:mobile-detect | func:session
 */
	#require_once('func.session.php');
	#require_once('../plugin/mobile-detect.php');
	
	function deviceIsA(){
		runSession();		
		$setDevice = setDevice();
		if($setDevice=='auto') { #device is not set by request
			//check if device is already in session
			if(isset($_SESSION['deviceIsA']) && !empty ($_SESSION['deviceIsA'])) {
				return $_SESSION['deviceIsA'];
			}
			//detect device
			else {
				$deviceDetect = deviceDetect();
				$_SESSION['deviceIsA'] = $deviceDetect;
				return $deviceDetect;
			}
		}
		elseif ($setDevice=='detect') {
			$autoDetect = deviceDetect();
			$_SESSION['deviceIsA'] = $autoDetect;
			return $autoDetect;
		}
		else { #device is set by request
			$_SESSION['deviceIsA'] = $setDevice;
			return $setDevice;		
		}			
	}
	
	function deviceDetect () {
		$detect = new Mobile_Detect;
		$device = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'desktop');
		return $device;
	}
	
	function setDevice($device='auto'){
		if($device=='auto') {
			if(isset($_REQUEST['device']) && !empty($_REQUEST['device'])){
				$devices = array('tablet','phone','desktop');
				if(in_array($_REQUEST['device'], $devices)) {
					$device = $_REQUEST['device'];
				}
				else {
					$device = 'detect';
				}
			}
		}
		return $device;
	} 
?>