<?php
require(oCORE.'oharvest'.DS.oCONFIG.'config.inc');
$osession = new oSession;
$osession->start();
oSSL::Impose(true);
require(oCORE.'oharvest'.DS.oMODELIZR.'modelizr.inc');
$oroute = new oRoute;
if($oroute->api()){
	$uri = $oroute->api();
	echo $oresponse['terminus'] = $uri;
	require(oCORE.'oharvest'.DS.oRGANIZR.'api.inc');
	$oharvest['response'] = $oresponse;

}
else {
	$uri = $oroute->uri();
	require(oCORE.'oharvest'.DS.oRGANIZR.'app.inc');
}
