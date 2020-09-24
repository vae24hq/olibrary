<?php
/* ZERN™ Framework ~ an evolving, robust platform for rapid & efficient development of modem responsive applications and APIs;
 * Built by ODAO™ [www.osawere.com] using PHP, SQL, HTML, CSS, JS & derived technology.
 * © July 2019 | beta 1.0
 * ===================================================================================================================
 * Dependency » index/zern
 * PHP | ignite::project ~ load required library, and ignite app
 */

//========== LOAD LIBRARY (as needed) ==========//
#inc(oLIBJ.'file');
zernLoad(oLIBJ.'pdo');
zernLoad(oLIBCLAS.'period');
zernLoad(oLIBFUNC.'randomiz');
zernLoad(oLIBJ.'crypt');
zernLoad(oLIBJ.'auth');

zernLoad(oLIBJ.'input');
zernLoad(oLIBJ.'data');
zernLoad(oLIBCLAS.'img');

zernLoad(oLIBZ.'dbobj');

if(class_exists('ZERN')){
	//========== INITIALIZE ==========//
	$zernApp = new ZERN();
	$zernApp->initialize();

	/*If application requires database, enable library [DB driver & Auth] -above*/
	if(class_exists('oPDO')){
		$zernDB = new oPDO($zernApp->db);
		if(class_exists('oAuth')){
			$zernAuth = new oAuth($zernDB, $zernApp);
		}
	}

	if(class_exists('oURL')){
		//========== RUN APP ==========//
		$zernRoute = oURL::route();
		if($zernRoute == 'site' || $zernRoute == 'ipaddress'){$zernRoute = 'app';}
		$uriData = oURL::uriData();
		$zernURI = $uriData['uri'];
		$zernLink = $uriData['link'];
		$zernAction = $uriData['action'];
		$zernCase = $uriData['case'];
		$routzr = oROUT.$zernRoute.'.php';
		if(file_exists($routzr)){require $routzr;}
		elseif(defined('oAPP_MODE') && oAPP_MODE == 'dev'){
			exit("ZE4041: Missing [{$routzr}]");
		}
		else {
			exit('ZE4042: Missing Router');
		}
	}
}
?>