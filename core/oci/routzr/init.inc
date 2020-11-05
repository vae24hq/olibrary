<?php
$session = new oSession;
$session->start();
oSSL::Impose(true);
oFile::Inc(oRoute::Path('setting'));
#BEGIN CODE FOR WEBSITE
if(oRoute::site() != false){
	oFile::Inc(oRoute::path('themezr').'site.inc');
	// $page = oRoute::page();
	// echo oPrint::Neat(CONFIG);
}
#END CODE FOR WEBSITE

