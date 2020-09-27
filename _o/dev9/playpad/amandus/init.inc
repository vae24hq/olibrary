<?php
$amandusDBC = array(
	'dsn' => 'mysql:dbname=woca_bar;host=localhost',
	'user' => 'woca',
	'password' => 'woca'
);



oFile::isCheck(DIR_AMANDUS_LIBRARY.'mysql.inc');
oFile::isCheck(DIR_AMANDUS_LIBRARY.'json.inc');
require DIR_AMANDUS_LIBRARY.'mysql.inc';
require DIR_AMANDUS_LIBRARY.'json.inc';



$oPDO = new oSQL($amandusDBC);
$amandusDB = $oPDO->dbo;



// JSON DATA OUTPUT
// if($oLink == 'data-uri'){

// 	if($oDataURILink == 'category'){

// $stmt = $amandusDB->prepare($sql);
$stmt = $amandusDB->prepare("CALL DrinkAll()");
$exec = $stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
if($exec != false && !empty($result)){
	#oJSON::run($result, 'oPRINT');
}



// 		$stmt = $oPDO->prepare("CALL CategoryAll()");
// 		// $stmt->bindParam(1, 'hai!', PDO::PARAM_STR);
// 		$rs = $stmt->execute();
// 		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// 		echo $result[0];

// 	}

// }
// JSON DATA OUTPUT - end

// oDUMP($_REQUEST);
?>