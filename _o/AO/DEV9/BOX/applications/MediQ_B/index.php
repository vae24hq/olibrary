<?php
/* ZERN™ Framework ~ an evolving, robust platform for rapid & efficient development of modem responsive applications and APIs;
 * Built by ODAO™ [www.osawere.com] using PHP, SQL, HTML, CSS, JS & derived technology.
 * © July 2019 | beta 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | index::root ~ default file
 */

# DEFINE APP MODE - [DEV|BETA|PROD|OFF|MAINTENANCE] -R
define('oAPP_MODE', 'dev');

# PROJECT CONFIGURATION -R
$oConfig = array();
$oConfig['project'] = 'MediQ';
$oConfig['ver'] = '1.0';
$oConfig['ifip'] = 'mediq'; /*The path to app when accessed via IP*/
$oConfig['url'] = 'mediq'; /*The base URL to app*/

# LOAD INITIALIZER -R
if(file_exists('init.php')){
	require 'init.php';
}
?>