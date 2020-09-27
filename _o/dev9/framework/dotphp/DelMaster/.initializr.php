<?php
//========== SEPARATOR ==========//
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('PS') ? null : define('PS', '/');


//========== ROOT DIRECTORY ==========//
$oinitializrFile = __FILE__;
$oinitializrPaths = pathinfo($oinitializrFile);
$oRootDirectory = $oinitializrPaths['dirname'];
define('oBASEPATH', $oRootDirectory);


//========== DIRECTOR STRUCTURE ==========//
# Define ENGINE DS
defined('ODAO') ? null : define('ODAO', oBASEPATH.DS.'odao'.DS);
	defined('oBOND') ? null : define('oBOND', ODAO.'bond'.DS);
	defined('oCORE') ? null : define('oCORE', ODAO.'crux'.DS);
	defined('oLIBRY') ? null : define('oLIBRY', ODAO.'libry'.DS);
	defined('oHELPER') ? null : define('oHELPER', ODAO.'libry'.DS);

# Define APP DS
defined('oAPP') ? null : define('oAPP', oBASEPATH.DS.'build'.DS);
	defined('oCONFIG') ? null : define('oCONFIG', oAPP.'config'.DS);
	defined('oLAYOUT') ? null : define('oLAYOUT', oAPP.'layout'.DS);
		defined('oBITZR') ? null : define('oBITZR', oLAYOUT.'bitzr'.DS);
		defined('oSLICEZR') ? null : define('oSLICEZR', oLAYOUT.'slicezr'.DS);
		defined('oVIEWZR') ? null : define('oVIEWZR', oLAYOUT.'viewzr'.DS);
		defined('oPAGEZR') ? null : define('oPAGEZR', oLAYOUT.'pagezr'.DS);
	defined('oSUITE') ? null : define('oSUITE', oAPP.'suite'.DS);
		defined('oAPIZR') ? null : define('oAPIZR', oSUITE.'apizr'.DS);
		defined('oMODELIZR') ? null : define('oMODELIZR', oSUITE.'modelizr'.DS);
		defined('oRGANIZR') ? null : define('oRGANIZR', oSUITE.'organizr'.DS);
		defined('oUTILIZR') ? null : define('oUTILIZR', oSUITE.'utilizr'.DS);

# Define APP's UPLOAD PATH
defined('oDATA') ? null : define('oDATA', oAPP.'upload'.DS);

# Using HTACCESS for PATH
defined('oASSET') ? null : define('oASSET', 'asset'.PS);
defined('oJS') ? null : define('oJS', 'js'.PS);
defined('oCSS') ? null : define('oCSS', 'css'.PS);
defined('oAUDIO') ? null : define('oAUDIO', 'audio'.PS);
defined('oVIDEO') ? null : define('oVIDEO', 'video'.PS);
defined('oDOC') ? null : define('oDOC', 'document'.PS);
defined('oIMG') ? null : define('oIMG', 'image'.PS);
defined('oICON') ? null : define('oICON', 'icon'.PS);
defined('oFONT') ? null : define('oFONT', 'font'.PS);
defined('oPLUG') ? null : define('oPLUG', 'plugin'.PS);
defined('oUPLOAD') ? null : define('oUPLOAD', 'upload'.PS);


//========== LIBRARY ==========//
require oCORE.'session.php';

require oCONFIG.'setting.php';

require oHELPER.'helper.php';
require oHELPER.'inc.php';
require oHELPER.'file.php';
require oHELPER.'route.php';
require oHELPER.'redirect.php';

oInc(oCONFIG.'router.php');

require oHELPER.'db.php';

oDB::connect();
oRoute::routeApp();


/*
require CORE.'helper.php';
require CORE.'ofile.php';
require CORE.'db.php';
require ODAO.'odao.php';*/


//========== INITIALIZE ==========//
/*$oAPP = odao::instantiate();
$oDB = db::connect();*/
?>