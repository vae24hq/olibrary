<?php
if(!isset($_SESSION)){session_start();}

//Error reporting settings
function oErrorReport(){
	global $oCIData;
	if(isset($oCIData['environ']) && !empty($oCIData['environ'])){
		$environ = $oCIData['environ'];
		if($environ == 'prod'){error_reporting(0);}
		elseif($environ == 'dbug'){error_reporting(E_ALL & ~E_DEPRECATED);}
		else {error_reporting(E_ALL | E_STRICT);}
	} else {error_reporting(E_ALL);}
	return;
}

//ImposeSSL settings
function oSSL(){
	global $oCIData;
	if(isset($oCIData['imposeSSL']) && !empty($oCIData['imposeSSL'])){
		$imposeSSL = $oCIData['imposeSSL'];
		if($imposeSSL == 'yeah'){
			oImposeSSL();
		}
	}
	return;
}
?>