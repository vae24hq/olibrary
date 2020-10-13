<?php
$session = new oSession;
$session->start();
oSSL::Impose(true);
oFile::Inc(oRoute::Path('config'));
// oFile::Inc(oHELPER.'mysqli.inc');

#Controls
$model = oRoute::Model();
$state = oRoute::State();
$action = oRoute::Action();
$source = oRoute::Path('source');
oFile::Inc(oRoute::Path('modelizr').'harvest.inc');


$harvest = new Harvest(SETTING_PROJECT, SETTING_DATABASE);

#For *Site
if(oRoute::Site()){
}



#For *API
elseif(oRoute::API()){
	$response = array();
	$response['terminus'] = $model;
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
			$organizr = $source.oRGANIZR.'api'.DS.$model.'.inc';
			require $organizr;
		}
	}


	#Output
	if(!isset($_REQUEST['ojson'])){
		echo oPrint::Neat($response);
		return;
	} else {
		return oJson::Display($response);
	}
}


#For *APP
elseif(oRoute::APP()){
}


#DEV
// $db->transaction();

// $sql = "INSERT INTO `_sample` (`stage`) VALUES ('".mt_rand()."');";
// $sql .= "INSERT INTO `_sample` (`stage`) VALUES ('".mt_rand()."');";
// $db->queries($sql);

// echo $db->error();
// foreach($db->query($sql) as $row){echo $row['name'].'<br>';}
// echo oPrint::Neat($db->error('iMsg'));
// $v = true;
// $db->commit('commit');