<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * IGNITE ~ Ignition • DEPENDENCY»
 */
#directory, path & separators
$AO['PS'] = '/';
$AO['DS'] = DIRECTORY_SEPARATOR;

$AO['ROOT'] = __DIR__.$AO['DS'];

$AO['BRY'] = $AO['ROOT'].'bry'.$AO['DS'];
$AO['3RD'] = $AO['ROOT'].'3rd'.$AO['DS'];
$AO['FUNC'] = $AO['ROOT'].'func'.$AO['DS'];

$AO['CORE'] = $AO['ROOT'].'core'.$AO['DS'];

$AO['INIT'] = 'init'.$AO['DS'];
$AO['BIT'] = 'layout'.$AO['DS'].'bitzr'.$AO['DS'];
$AO['VIEW'] = 'layout'.$AO['DS'].'viewzr'.$AO['DS'];

$AO['MODELIZR'] = 'program'.$AO['DS'].'modelizr'.$AO['DS'];
$AO['ORGANIZR'] = 'program'.$AO['DS'].'organizr'.$AO['DS'];
$AO['ROUTZR'] = 'program'.$AO['DS'].'routzr'.$AO['DS'];
$AO['UTILIZR'] = 'program'.$AO['DS'].'utilizr'.$AO['DS'];

$AO['DRIVE'] = $AO['ROOT'].'drive'.$AO['DS'];


#using htaccess for path
$AO['ASSET'] = $AO['PS'].'asset'.$AO['PS'];
$AO['CSS'] = $AO['PS'].'css'.$AO['PS'];
$AO['FONT'] = $AO['PS'].'font'.$AO['PS'];
$AO['ICON'] = $AO['PS'].'icon'.$AO['PS'];
$AO['MEDIA'] = $AO['PS'].'media'.$AO['PS'];
$AO['JS'] = $AO['PS'].'js'.$AO['PS'];

defined('AO') ? null : define('AO', $AO);
if(isset($AO)){unset($AO);}


#require library
require AO['BRY'].'session.inc';
require AO['BRY'].'print.inc';
// require oSTATIC.'exit.inc';
// require oSTATIC.'file.inc';
// require oBOND.'mobile.inc';
// require oSTATIC.'string.inc';
// require oSTATIC.'array.inc';
// require oSTATIC.'redirect.inc';
// require oSTATIC.'ssl.inc';
// require oSTATIC.'json.inc';
// require oSTATIC.'notify.inc';
// require oSTATIC.'random.inc';
// require oSTATIC.'server.inc';
// require oSTATIC.'url.inc';
// require oSTATIC.'device.inc';
// require oSTATIC.'browser.inc';
// require oSTATIC.'currency.inc';
// require oSTATIC.'data.inc';
// require oSTATIC.'format.inc';
// require oSTATIC.'input.inc';
// require oSTATIC.'crypt.inc';
// require oSTATIC.'time.inc';
// require oSTATIC.'route.inc';
// require oBJCT.'db'.DS.'sql.inc';
// require oBJCT.'db'.DS.'database.inc';
// // requireAO.'database.inc';
// // require oHELPER.'html.inc';



#REDIRECT URL
if(!empty($_REQUEST['oredirect'])){
	$redirectTo = strtolower($_REQUEST['oredirect']);
	if(!oString::in($redirectTo, 'http')){
		return oRedirect::oExit(PS.$redirectTo);
	}
	else {
		#@TODO ~ redirect for whole url - http://domain.co
	}
}

