<?php
/**ORAX™ Framework is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
* Creator: Osawere™ O. Anthony - @iamodao - www.osawere.com  © August 2020 | Apache License
* ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ==
* INDEX ~ Default File • DEPENDENCY»
*/

#DEFINE SEPARATOR & DIRECTORY
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('PS') ? null : define('PS', '/');
defined('DIR_ROOT') ? null : define('DIR_ROOT', __DIR__.DS);
defined('DIR_ORAX') ? null : define('DIR_ORAX', DIR_ROOT.'orax'.DS);
defined('DIR_ORAX_ESSENTIAL') ? null : define('DIR_ORAX_ESSENTIAL', DIR_ORAX.'essential'.DS);
defined('DIR_SOURCE') ? null : define('DIR_SOURCE', DIR_ROOT.'source'.DS);

#REQUIRED ~ ESSENTIAL LIBRARY
if(!file_exists(DIR_ORAX_ESSENTIAL.'reporting.inc')){
	exit('<strong>oESSENTIAL::</strong> Resource Unavailable [<em>'.DIR_ORAX_ESSENTIAL.'reporting.inc'.'</em>]');
} else {
	require DIR_ORAX_ESSENTIAL.'reporting.inc';
	if(!file_exists(DIR_ORAX_ESSENTIAL.'file.inc')){
		o404EXIT(DIR_ORAX_ESSENTIAL.'file.inc');
	}
	require DIR_ORAX_ESSENTIAL.'file.inc';
	oFile::isCheck(DIR_ORAX.'library.inc');
	require DIR_ORAX.'library.inc';
	oFile::isCheck(DIR_SOURCE.'config.inc');
	require DIR_SOURCE.'config.inc';
	oFile::isCheck(DIR_ORAX.'init.inc');
	require DIR_ORAX.'init.inc';

	#SANDBOX FILE - for development, demo & testing
	$o_debug_file = '_ignore'.DS.'debug.inc';
	if(oFile::is($o_debug_file)){
		require $o_debug_file;
	}
}

#CALLING ROUTER
if(isset($orax) && class_exists('orax') && method_exists('orax', 'router')){
	$orax->router('oDEFAULT');
}


#ST. AMANDUS BARROOM MENU APP
$oRouter = oRouter::get();
$oLink = oRouter::link();
$oDataURILink = oRouter::uri();
if($oRouter == 'amandus'){
	defined('DIR_AMANDUS') ? null : define('DIR_AMANDUS', DIR_ROOT.'amandus'.DS);
	defined('DIR_AMANDUS_LIBRARY') ? null : define('DIR_AMANDUS_LIBRARY', DIR_AMANDUS.'libry'.DS);
	oFile::isCheck(DIR_AMANDUS.'init.inc');
	require DIR_AMANDUS.'init.inc';
}

oDUMP($_REQUEST);
?>