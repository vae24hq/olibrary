<?php
require(oCORE.'oharvest'.DS.oCONFIG.'config.inc');
$osession = new oSession;
$osession->start();
oSSL::Impose(true);
require(oCORE.'oharvest'.DS.oMODELIZR.'modelizr.inc');
$oroute = new oRoute;
$harvestpad = new HarvestPad($oconfig['config']);

if($oroute->api()){
	$uri = $oroute->api();
	$oresponse['terminus'] = $uri;
	require(oCORE.'oharvest'.DS.oRGANIZR.'api.inc');
	$oharvest['response'] = $oresponse;
	$oharvest['model'] = $omodel;
	if(!isset($_REQUEST['ao'])){
		return oJson::Display($oharvest['response']);
	}
	else {
		echo oPrint::Neat($oharvest['response']);
		// return;
	}
}

else {
	$uri = $oroute->uri();
	require(oCORE.'oharvest'.DS.oRGANIZR.'app.inc');
}


#DEBUGING
function RandIT(){
	$o['puid'] = oRandom::Create('iPuid');
	$o['euid'] = oRandom::Create('iEuid');
	$o['suid'] = oRandom::Create('iSuid');
	echo oPrint::Neat($o);
	return;
}

RandIT();