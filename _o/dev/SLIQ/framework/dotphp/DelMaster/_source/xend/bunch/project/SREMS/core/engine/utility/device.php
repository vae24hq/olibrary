<?php
/* PYPE™ - web development framework [HTML/CSS/PHP/SQL/JS/MORE]
 * PHP | utility::device
 * Dependency » util:session | plugin:mobile-detect
 */
require(PLUGIN.DS.'mobile-detect.php');
function deviceIsA(){
	inSession();		
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

function deviceDetect(){
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

$deviceIsA = deviceIsA();
if($deviceIsA=='phone'){$isDesktop = FALSE; $isTablet = FALSE; $isPhone = TRUE;}
elseif($deviceIsA=='tablet'){$isDesktop = FALSE; $isTablet = TRUE; $isPhone = FALSE;}
else{$isDesktop = TRUE; $isTablet = FALSE; $isPhone = FALSE;}
?>