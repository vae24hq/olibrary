<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * IGNITE ~ Default File • DEPENDENCY»
 */

#DEFINE SEPARATOR
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('PS') ? null : define('PS', '/');


#DEFINE DIRECTORY
defined('oROOT') ? null : define('oROOT', __DIR__.DS);

defined('oLIBRY') ? null : define('oLIBRY', oROOT.'libry'.DS);
defined('oBOND') ? null : define('oBOND', oLIBRY.'bond'.DS);
defined('oCLASS') ? null : define('oCLASS', oLIBRY.'class'.DS);
defined('oINSTANCE') ? null : define('oINSTANCE', oCLASS.'instance'.DS);
defined('oSTATIC') ? null : define('oSTATIC', oCLASS.'static'.DS);

defined('oSOURCE') ? null : define('oSOURCE', oROOT.'source'.DS);

defined('oBITZR') ? null : define('oBITZR', 'bitzr'.DS);
defined('oLAYOUTZR') ? null : define('oLAYOUTZR', 'layoutzr'.DS);
defined('oMODELIZR') ? null : define('oMODELIZR', 'modelizr'.DS);
defined('oRGANIZR') ? null : define('oRGANIZR', 'organizr'.DS);
defined('oROUTZR') ? null : define('oROUTZR', 'routzr'.DS);
defined('oUTILIZR') ? null : define('oUTILIZR', 'utilizr'.DS);
defined('oVIEWZR') ? null : define('oVIEWZR', 'viewzr'.DS);


// defined('oFUNC') ? null : define('oFUNC', oLIBRY.'func'.DS);
// defined('oBJ') ? null : define('oBJ', oLIBRY.'object'.DS);
// defined('oBIT') ? null : define('oBIT', SOURCE.'bitzr'.DS);
// defined('oLAYOUT') ? null : define('oLAYOUT', SOURCE.'layoutzr'.DS);
// defined('oMODEL') ? null : define('oMODEL', SOURCE.'modelizr'.DS);
// defined('oRGANIZR') ? null : define('oRGANIZR', SOURCE.'organizr'.DS);
// defined('oUTIL') ? null : define('oUTIL', SOURCE.'utilizr'.DS);
// defined('oVIEW') ? null : define('oVIEW', SOURCE.'viewzr'.DS);



#REQUIRE LIBRARY
require oSTATIC.'print.inc';
require oSTATIC.'exit.inc';
if(!file_exists(oSTATIC.'file.inc')){
	oExit::E404(oSTATIC.'file.inc');
}
require oSTATIC.'file.inc';
oFile::Inc(oSTATIC.'string.inc');
oFile::Inc(oINSTANCE.'session.inc');
oFile::Inc(oSTATIC.'redirect.inc');
oFile::Inc(oSTATIC.'ssl.inc');
oFile::Inc(oSTATIC.'json.inc');
oFile::Inc(oSTATIC.'random.inc');
oFile::Inc(oSTATIC.'ip.inc');
oFile::Inc(oSTATIC.'url.inc');
oFile::Inc(oSTATIC.'currency.inc');
oFile::Inc(oSTATIC.'format.inc');
#@TODO ~ work on database and related objects
oFile::Inc(oINSTANCE.'database.inc');
oFile::Inc(oINSTANCE.'route.inc');
oFile::Inc(oBOND.'mobile.inc');



#INITIALIZE PROJECT (based on a specific project)
// #oFile::Inc(oRouter::Path('oInitFile', 'oGET', 'isOptional'), 'isOptional');
#oFile::Inc(oROUTZR.'harvest.inc');


#DEVBOX FILE - for development, demo & testing
oFile::Inc(oROOT.'_o'.DS.'dev'.DS.'_debug.php', 'isOptional');
?>