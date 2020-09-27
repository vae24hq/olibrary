<?php
/* ZERN™ Framework ~ an evolving, robust platform for rapid & efficient development of modem responsive applications and APIs;
 * Built by ODAO™ [www.osawere.com] using PHP, SQL, HTML, CSS, JS & derived technology.
 * © July 2019 | beta 1.0
 * ===================================================================================================================
 * Dependency » index/zern
 * PHP | init::root ~ default initializer
 */

/*Disable App when MODE is undefined or set to off*/
if(!defined('oAPP_MODE') || oAPP_MODE == '' || oAPP_MODE == 'off'){echo 'ONI';exit;}

//========== ZERN PATH & LIBRARY ==========//
if(file_exists('.zern.php')){
	require '.zern.php';
	$zernDIR = zernBP('oDIR', __FILE__);
	$zernURL = zernBP('oHOST');
	define('zernDIR', $zernDIR);
	define('zernURL', $zernURL);
	$zertup = zernDIR.'zern'.DS.'setup.php';
	if(file_exists($zertup)){
		require $zertup;
		if((!defined('oPROJECT') || oPROJECT == '') || !file_exists(oPROJECT.'ignite.php')){exit('ZE404: Ignition Missing');}
		require oPROJECT.'ignite.php';
	}
}
?>