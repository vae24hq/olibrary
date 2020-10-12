<?php
$session = new oSession;
$session->start();
oSSL::Impose(true);
oFile::Inc(oRoute::Path('config'));
oFile::Inc(oHELPER.'mysqli.inc');

#Database connection
$db = new oSQLi(SETTING_DATABASE); #$db = new oDatabase(SETTING_DATABASE, 'iMySQLi');


#For *Site
if(oRoute::Site()){
}

#For *API
elseif(oRoute::API()){
	$terminus = oRoute::Model();
	$organizr = oRoute::Path('source').oRGANIZR.$terminus.'.inc';



	// #Output
	// if(!isset($_REQUEST['ao'])){
	// 	return oJson::Display($harv);
	// }
	// else {
	// 	echo oPrint::Neat($harv);
	// 	return;
	// }
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