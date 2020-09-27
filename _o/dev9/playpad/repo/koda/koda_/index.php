<?php
/**ZERN™ Framework ~ an evolving, robust platform for rapid & efficient development of modem responsive applications and APIs;
 * Built by ODAO™ [www.osawere.com] using PHP, SQL, HTML, CSS, JS & derived technology.
 * © July 2019 | beta 1.0
 * ===================================================================================================================
 * Dependency » ~
 * PHP | index::root ~ default file
 **/

define('oAPP_MODE', 'dev');
$oConfig = array();
$oConfig['project'] = 'PCF';
$oConfig['ver'] = '1.0';
$oConfig['ifip'] = 'koda';
$oConfig['url'] = 'koda.co';
if(file_exists('.zern.php')){
	require '.zern.php';
	$zernDIR = zernBP('oDIR', __FILE__);
	$zernURL = zernBP('oHOST');
	define('zernDIR', $zernDIR);
	define('zernURL', $zernURL);
	$zertInit = zernDIR.'zern'.DS.'init.php';
	if(file_exists($zertInit)){
		require $zertInit;
		if((!defined('oPROJECT') || oPROJECT == '') || !file_exists(oPROJECT.'ignite.php')){exit('ZE404: Ignition Missing');}
		require oPROJECT.'ignite.php';
	}
}
?>