<?php
/* ZERN™ Framework ~ an evolving, robust platform for rapid & efficient development of modem responsive applications and APIs;
 * Built by ODAO™ [www.osawere.com] using PHP, SQL, HTML, CSS, JS & derived technology.
 * © July 2019 | beta 1.0
 * ===================================================================================================================
 * Dependency » index/zern
 * PHP | app::route ~ run app
 */

imposeSSL();
$noauthLinks = array('login', 'logout', 'locked');
if(!in_array($zernLink, $noauthLinks)){
	$zernAuth->is();
	$zernAuth->timeOut('locked', 500000);
}
require $zernApp->router();
$zernAuth->timeIn();
?>