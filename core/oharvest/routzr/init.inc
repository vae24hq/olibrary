<?php
require(oCORE.'oharvest'.DS.oCONFIG.'config.inc');
$osession = new oSession;
$osession->start();
oSSL::Impose(true);
require(oCORE.'oharvest'.DS.oUTILIZR.'sql.inc');
require(oCORE.'oharvest'.DS.oMODELIZR.'modelizr.inc');
$oroute = new oRoute;
$harvestpad = new HarvestPad($oconfig['config']);

if($oroute->api()){
	$uri = $oroute->api();
	$creo['terminus'] = $uri;
	require(oCORE.'oharvest'.DS.oRGANIZR.'api.inc');

	#Merging MODEL's response
	if(!empty($creo) && !empty($omodel) && is_array($creo) && is_array($omodel)){
		$creo = array_merge($creo, $omodel);
	}

	if(!isset($_REQUEST['ao'])){
		return oJson::Display($creo);
	}
	else {
		echo oPrint::Neat($creo);
		// return;
	}
}
else {
	$uri = $oroute->uri();
	require(oCORE.'oharvest'.DS.oRGANIZR.'app.inc');
}


if(isset($_REQUEST['uid'])){
#DEBUGING
	function RandIT(){
		$o['puid'] = oRandom::Create('iPuid');
		$o['euid'] = oRandom::Create('iEuid');
		$o['suid'] = oRandom::Create('iSuid');
		echo oPrint::Neat($o);
		return;
	}
	RandIT();
}