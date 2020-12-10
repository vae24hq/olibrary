<?php
$o_config_db = array(
	// 'host' => 'fdb17.eohost.com',
	// 'database' => '2342647_db',
	// 'user' => '2342647_db',
	// 'password' => 'Franci17.#@'
);

function dbase($dataset='o_auto'){

	if($dataset == 'o_auto'){
		global $o_config_db;
		$dataset = $o_config_db;
	}
	#ToDO - Validation

	if(empty($dataset['host'])){$dataset['host'] = 'localhost';}
	if(empty($dataset['database'])){$dataset['database'] = 'trackdb';}
	if(empty($dataset['user'])){$dataset['user'] = 'root';}
	if(empty($dataset['password'])){$dataset['password'] = 'OpenDB';}

	return $dataset;
}

require_once 'crud.php';
CRUD::instantiate();


function oTrack($input=''){
	$query = "SELECT * FROM `record` WHERE `track_id` = '".$input."'";
	$result = CRUD::query($query, 'nope');
	if($result === false){return false;}
	else {
		$record = false;
		$count = CRUD::numRows($result);
		if($count == 1){$record = CRUD::row($result);}
		elseif($count > 1){$record = CRUD::rows($result);}
	}
	return $record;
}?>