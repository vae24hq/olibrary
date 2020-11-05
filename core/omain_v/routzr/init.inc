<?php
$session = new oSession;
$session->start();
oSSL::Impose(true);
oFile::Inc(oRoute::Path('setting'));
oFile::Inc(oRoute::Path('utilizr').'required.inc');

#CONTROLS
$model = oRoute::Model();
$state = oRoute::State();
$action = oRoute::Action();
$path = oRoute::Path('source');


#WEBSITE
if(oRoute::Site()){
}

#NOT WEBSITE
else {
	oFile::Inc(oRoute::Path('modelizr').'main.inc');
	$harvest = new Harvest(SETTING_PROJECT, SETTING_DATABASE);
	$response = array();
	$log = array();
	$response['terminus'] = $model; #@TODO ~ return only recognized terminus
	$log['action'] = $model;

	#APLICATION PROGRAM INTERFACE
	if(oRoute::API()){
		oFile::Inc(oRoute::Path('utilizr').'keys.inc');
		$KeyIsValid = KeyIsValid();
		if($KeyIsValid !== true){
			$response = array_merge($response, $KeyIsValid);
		}
		else {
			oFile::Inc(oRoute::Path('utilizr').'platform.inc');
			$PlatformIsValid = PlatformIsValid();
			if($PlatformIsValid !== true){
				$response = array_merge($response, $PlatformIsValid);
			}
			else {
				$log['platform'] = $_REQUEST['platform'];
				$models = array('ping', 'register', 'auth', 'user', 'parish', 'harvest', 'target', 'parishioner');

				if($model == 'index'){
					$response['status'] = 'F9';
					$response['reason'] = 'Request is forbidden';
				}
				elseif($model == 'ping'){
					if($state == 'failed'){
						$response['status'] = 'F9';
						$response['reason'] = 'ping failed';
						$response['message'] = 'A failure response was initiated';

						$log['status'] = 'failure';
						$log['summary'] = $response['message'];
					}
					elseif($state == 'success'){
						$response['status'] = 'OK';
						$response['record'] = 1;
						$response['recordset'] = array('project' => $harvest->project['name'], 'version' => $harvest->project['version']);

						$log['status'] = 'success';
						$log['summary'] = $harvest->project['name'].' - '.$harvest->project['version'];
					}
					$harvest->CreateLog($log);
				}
				elseif(in_array($model, $models)){
					$organizr = $path.oRGANIZR.'api'.DS.$model.'.inc';
					if(!file_exists($organizr)){oExit::E404($organizr, 'Missing File');}
					require $organizr;
					// $omethod = 'o'.ucfirst($model);
					// $omodel = $harvest->{$omethod}();
					if(!empty($omodel)){$response = array_merge($response, $omodel);}

				}
				else {
					$response['status'] = 'F9';
					$response['reason'] = 'Request is unrecognized';
				}
			}
		}



		#OUTPUT RESPONSE
		if(!isset($_REQUEST['ojson'])){
			echo oPrint::Neat($response);
			return;
		} else {
			return oJson::Display($response);
		}
	}

	#APLICATION
	elseif(oRoute::APP()){
	}

}