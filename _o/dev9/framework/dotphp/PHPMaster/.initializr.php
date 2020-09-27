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
	defined('oHELPER') ? null : define('oHELPER', DOT.'ancillary'.DS);
	defined('oBUNDLE') ? null : define('oBUNDLE', DOT.'bundle'.DS);
	defined('oCORE') ? null : define('oCORE', DOT.'central'.DS);

# Define APP DS
defined('oAPP') ? null : define('oAPP', oBASEPATH.DS.'app'.DS);
	defined('oBUILD') ? null : define('oBUILD', oAPP.'build'.DS);
		defined('oDESIGN') ? null : define('oDESIGN', oBUILD.'design'.DS);
		defined('oLAYOUT') ? null : define('oLAYOUT', oBUILD.'layout'.DS);
			defined('oBIT') ? null : define('oBIT', oLAYOUT.'bitzr'.DS);
			defined('oSLICE') ? null : define('oSLICE', oLAYOUT.'slicezr'.DS);
			defined('oVIEW') ? null : define('oVIEW', oLAYOUT.'viewzr'.DS);
		defined('oSUITE') ? null : define('oSUITE', oBUILD.'suite'.DS);
			defined('oAPI') ? null : define('oAPI', oSUITE.'apizr'.DS);
			defined('oMODEL') ? null : define('oMODEL', oSUITE.'modelizr'.DS);
			defined('oRGANIZ') ? null : define('oRGANIZ', oSUITE.'organizr'.DS);
			defined('oUTIL') ? null : define('oUTIL', oSUITE.'utilizr'.DS);
	defined('oCLOUD') ? null : define('oCLOUD', oAPP.'cloud'.DS);
	defined('oCONFIG') ? null : define('oCONFIG', oAPP.'setup'.DS);

# Using HTACCESS for PATH
defined('ASSET') ? null : define('ASSET', 'asset'.PS);
defined('CSS') ? null : define('CSS', 'css'.PS);
defined('JS') ? null : define('JS', 'js'.PS);
defined('FONT') ? null : define('FONT', 'font'.PS);
defined('IMAGE') ? null : define('IMAGE', 'image'.PS);
defined('ICON') ? null : define('ICON', 'icon'.PS);
defined('DOCUMENT') ? null : define('DOCUMENT', 'document'.PS);
defined('PLUGIN') ? null : define('PLUGIN', 'plugin'.PS);
defined('AUDIO') ? null : define('AUDIO', 'audio'.PS);
defined('VIDEO') ? null : define('VIDEO', 'video'.PS);
defined('CLOUD') ? null : define('CLOUD', 'cloud'.PS);


//========== LIBRARY ==========//
require oCONFIG.'config.php';
include oCORE.'utility.php';

// include oHELPER.'utility.php';



// include oHELPER.'randomize.php';
// include oHELPER.'redirect.php';
// require oHELPER.'inc.php';
// require oHELPER.'file.php';
require DOT.'odao.php';
include oHELPER.'notify.php';


//========== INITIALIZE ==========//
Utility::initializ();
require oCONFIG.'switch.php';
require oUTIL.'error.php';
?>