<?php
/**ORAX™ Framework is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
* Creator: Osawere™ O. Anthony - @iamodao - www.osawere.com  © August 2020 | Apache License
* ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ==
* INDEX ~ Default File • DEPENDENCY»
*/

#DEFINE SEPARATOR & DIRECTORY
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('PS') ? null : define('PS', '/');
defined('ROOT') ? null : define('ROOT', __DIR__.DS);
defined('ORAX') ? null : define('ORAX', ROOT.'orax'.DS);
defined('ESSENTIAL') ? null : define('ESSENTIAL', ORAX.'essential'.DS);
defined('SOURCE') ? null : define('SOURCE', ROOT.'source'.DS);

#REQUIRED ~ ESSENTIAL LIBRARY
if(!file_exists(ESSENTIAL.'reporting.inc')){
	exit('<strong>oESSENTIAL::</strong> Resource Unavailable [<em>'.ESSENTIAL.'reporting.inc'.'</em>]');
} else {
	require ESSENTIAL.'reporting.inc';
	if(!file_exists(ESSENTIAL.'file.inc')){
		o404EXIT(ESSENTIAL.'file.inc');
	}
	require ESSENTIAL.'file.inc';
	oFile::isCheck(ORAX.'library.inc');
	require ORAX.'library.inc';
	oFile::isCheck(SOURCE.'config.inc');
	require SOURCE.'config.inc';
	oFile::isCheck(SOURCE.'init.inc');
	require SOURCE.'init.inc';

	#SANDBOX FILE - for development, demo & testing
	$o_debug_file = '_ignore'.DS.'debug.inc';
	if(oFile::is($o_debug_file)){
		require $o_debug_file;
	}
}
?>