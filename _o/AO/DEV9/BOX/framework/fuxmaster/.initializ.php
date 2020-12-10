<?php
//========== SEPARATOR ==========//
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('PS') ? null : define('PS', '/');


//========== ROOT DIRECTORY ==========//
$orootFile = __FILE__;
$oPaths = pathinfo($orootFile);
$oRootDir = $oPaths['dirname'];
define('oBASEPATH', $oRootDir);


//========== DIRECTOR STRUCTURE ==========//
# Define ENGINE DS
defined('DOT') ? null : define('DOT', oBASEPATH.DS.'dot'.DS);
	defined('oBOND') ? null : define('oBOND', DOT.'bond'.DS);
	defined('oLIBRY') ? null : define('oLIBRY', DOT.'libry'.DS);

# Define APP DS
defined('oPROJECT') ? null : define('oPROJECT', oBASEPATH.DS.'project'.DS);
	defined('oCLOUD') ? null : define('oCLOUD', oPROJECT.'cloud'.DS);
	defined('oINTERFACE') ? null : define('oINTERFACE', oPROJECT.'interface'.DS);
		defined('oLAYOUT') ? null : define('oLAYOUT', oINTERFACE.'layout'.DS);
			defined('oBIT') ? null : define('oBIT', oLAYOUT.'bitzr'.DS);
			defined('oSLICE') ? null : define('oSLICE', oLAYOUT.'slicezr'.DS);
			defined('oVIEW') ? null : define('oVIEW', oLAYOUT.'viewzr'.DS);
		defined('oUTLINE') ? null : define('oUTLINE', oINTERFACE.'outline'.DS);
	defined('oSUITE') ? null : define('oSUITE', oPROJECT.'suite'.DS);
		defined('oAPI') ? null : define('oAPI', oSUITE.'api'.DS);
		defined('oMODEL') ? null : define('oMODEL', oSUITE.'modelizr'.DS);
		defined('oRGANIZ') ? null : define('oRGANIZ', oSUITE.'organizr'.DS);
		defined('oUTIL') ? null : define('oUTIL', oSUITE.'utilizr'.DS);

# Using HTACCESS for PATH
defined('ASSET') ? null : define('ASSET', 'asset'.PS);
defined('CSS') ? null : define('CSS', 'css'.PS);
defined('ICON') ? null : define('ICON', 'icon'.PS);
defined('JS') ? null : define('JS', 'js'.PS);
defined('AUDIO') ? null : define('AUDIO', 'audio'.PS);
defined('DOCUMENT') ? null : define('DOCUMENT', 'js'.PS);
defined('GRAFIX') ? null : define('GRAFIX', 'grafix'.PS);
defined('VIDEO') ? null : define('VIDEO', 'video'.PS);
defined('PLUGIN') ? null : define('PLUGIN', 'plugin'.PS);
defined('CLOUD') ? null : define('CLOUD', 'cloud'.PS);




//========== LIBRARY ==========//
require(oPROJECT.'config.php');
if(defined('MACHINE_IS') && MACHINE_IS == 'dev'){error_reporting(E_ALL);}
else {error_reporting(0);}
require oLIBRY.'file.php';
oFile::add(oLIBRY.'session');
oFile::add(oLIBRY.'text');
oFile::add(oLIBRY.'helper');
oFile::add(oLIBRY.'url');
oFile::add(oLIBRY.'form');
oFile::add(oLIBRY.'data');
oFile::add(DOT.'fux');
oFile::add(oLIBRY.'auth');
oFile::add(oLIBRY.'notify');
oFile::add(oLIBRY.'crud');

//========== INITIALIZE ==========//
Helper::initialize();
$fuxApp = new FUX();
$fuxCRUD = new CRUD();
$fuxAuth = new Auth;
?>