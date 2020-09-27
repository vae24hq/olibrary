<?php
require '.initializr.php';
$json = ''; if(!empty($_GET['json'])){$json = $_GET['json'];}
$card = ''; if(!empty($_GET['card'])){$card = $_GET['card'];}

if($json == 'cards'){
	include oUTIL.'auth.php';
	require oMODEL.'user.php';
	require oMODEL.'record.php';
	if(strtolower(user::active('type')) == 'adhoc'){
		$oDataSet = record::cards('','adhoc', user::active('puid'));
	} else {
		$oDataSet = record::cards();
	}
}


if($json == 'history'){
	include oUTIL.'auth.php';
	require oMODEL.'user.php';
	require oMODEL.'record.php';
	if(!empty($card)){
		$oDataSet = record::history($card);
	} else {
		$oDataSet = record::history();
	}
}

# THE OUTPUT
if($oDataSet != 'NO_RECORD' && is_array($oDataSet)){
	$oDataSet = jsonData($oDataSet, $json);
	Utility::jsonResp($oDataSet);
}

function jsonData($data, $jsonuri=''){
	if($jsonuri=='cards'){
		if(Utility::isArrayMulti($data)){
			foreach ($data as $row){
				include oUTIL.'js-data.cards.php';
			}
		}
		else {
			$row = $data;
			include oUTIL.'js-data.cards.php';
		}
	}


	if($jsonuri=='history'){
		if(Utility::isArrayMulti($data)){
			foreach ($data as $row){
				include oUTIL.'js-data.history.php';
			}
		}
		else {
			$row = $data;
			include oUTIL.'js-data.history.php';
		}
	}
	return $record;
}
?>