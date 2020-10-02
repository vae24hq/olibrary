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

defined('oLIBRY') ? null : define('oLIBRY', oROOT.'bry'.DS);
defined('oBOND') ? null : define('oBOND', oLIBRY.'bond'.DS);
defined('oCLASS') ? null : define('oCLASS', oLIBRY.'class'.DS);
defined('oINSTANCE') ? null : define('oINSTANCE', oCLASS.'instance'.DS);
defined('oSTATIC') ? null : define('oSTATIC', oCLASS.'static'.DS);
defined('oFUNC') ? null : define('oFUNC', oLIBRY.'func'.DS);

defined('oSOURCE') ? null : define('oSOURCE', oROOT.'source'.DS);

defined('oLAYOUT') ? null : define('oLAYOUT', 'layoutzr'.DS);
defined('oBITZR') ? null : define('oBITZR', oLAYOUT.'bitzr'.DS);
defined('oFORMZR') ? null : define('oFORMZR', oLAYOUT.'formzr'.DS);
defined('oTHEMEZR') ? null : define('oTHEMEZR', oLAYOUT.'themezr'.DS);
defined('oVIEWZR') ? null : define('oVIEWZR', oLAYOUT.'viewzr'.DS);

defined('oROUTZR') ? null : define('oROUTZR', 'routzr'.DS);

defined('oSUITE') ? null : define('oSUITE', 'suite'.DS);
defined('oMODELIZR') ? null : define('oMODELIZR', oSUITE.'modelizr'.DS);
defined('oRGANIZR') ? null : define('oRGANIZR', oSUITE.'organizr'.DS);
defined('oUTILIZR') ? null : define('oUTILIZR', oSUITE.'utilizr'.DS);


#Using HTACCESS for PATH
defined('CLOUD') ? null : define('CLOUD', 'cloud'.PS);
defined('ASSET') ? null : define('ASSET', 'asset'.PS);
defined('CSS') ? null : define('CSS', 'css'.PS);
defined('ICON') ? null : define('ICON', 'icon'.PS);
defined('JS') ? null : define('JS', 'js'.PS);
defined('MEDIA') ? null : define('MEDIA', 'media'.PS);
defined('PLUGIN') ? null : define('PLUGIN', 'plugin' . PS);
defined('AUDIO') ? null : define('AUDIO', 'audio'.PS);
defined('DOCUMENT') ? null : define('DOCUMENT', 'document'.PS);
defined('GRAFIX') ? null : define('GRAFIX', 'grafix'.PS);
defined('IMAGE') ? null : define('IMAGE', 'image'.PS);
defined('VIDEO') ? null : define('VIDEO', 'video'.PS);
defined('FONT') ? null : define('FONT', 'font' . PS);


#REQUIRE LIBRARY
require oSTATIC.'print.inc';
require oSTATIC.'exit.inc';
if(!file_exists(oSTATIC.'file.inc')){
	oExit::E404(oSTATIC.'file.inc');
}
require oSTATIC.'file.inc';
oFile::Inc(oSTATIC.'string.inc');
oFile::Inc(oSTATIC.'array.inc');
oFile::Inc(oINSTANCE.'session.inc');
oFile::Inc(oSTATIC.'redirect.inc');
oFile::Inc(oSTATIC.'ssl.inc');
oFile::Inc(oSTATIC.'json.inc');
oFile::Inc(oSTATIC.'random.inc');
oFile::Inc(oSTATIC.'server.inc');
oFile::Inc(oSTATIC.'url.inc');
oFile::Inc(oSTATIC.'currency.inc');
oFile::Inc(oSTATIC.'format.inc');
oFile::Inc(oSTATIC.'input.inc');
oFile::Inc(oSTATIC.'crypt.inc');
oFile::Inc(oSTATIC.'time.inc');
oFile::Inc(oINSTANCE.'database.inc');
oFile::Inc(oINSTANCE.'route.inc');
oFile::Inc(oBOND.'mobile.inc');



#INITIALIZE PROJECT (based on a specific project)
// oFile::Inc(oRouter::Path('oInitFile', 'oGET', 'isOptional'), 'isOptional');
// oFile::Inc(oROUTZR.'oharvest.inc');


#DEVBOX FILE - for development, demo & testing
oFile::Inc(oROOT.'_o'.DS.'ignor'.DS.'_debug.php', 'isOptional');
?>