<?php
#REQUIRE LIBRARY
require oINSTANCE.'session.inc';
require oSTATIC.'print.inc';
require oSTATIC.'exit.inc';
$oFileClass = oSTATIC.'file.inc';
if(!file_exists($oFileClass)){oExit::E404($oFileClass);}
require $oFileClass;
oFile::Inc(oSTATIC.'string.inc');
oFile::Inc(oSTATIC.'array.inc');
oFile::Inc(oSTATIC.'redirect.inc');
oFile::Inc(oSTATIC.'ssl.inc');
oFile::Inc(oSTATIC.'json.inc');
oFile::Inc(oSTATIC.'notify.inc');
oFile::Inc(oSTATIC.'random.inc');
oFile::Inc(oSTATIC.'server.inc');
oFile::Inc(oSTATIC.'url.inc');
oFile::Inc(oBOND.'mobile.inc');
oFile::Inc(oSTATIC.'device.inc');
// oFile::Inc(oSTATIC.'browser.inc');
oFile::Inc(oSTATIC.'currency.inc');
oFile::Inc(oSTATIC.'data.inc');
oFile::Inc(oSTATIC.'format.inc');
oFile::Inc(oSTATIC.'input.inc');
oFile::Inc(oSTATIC.'crypt.inc');
oFile::Inc(oSTATIC.'time.inc');
oFile::Inc(oSTATIC.'route.inc');
oFile::Inc(oBJCT.'db'.DS.'database.inc');
// oFile::Inc(oHELPER.'html.inc');