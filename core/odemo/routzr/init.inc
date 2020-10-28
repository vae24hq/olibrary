<?php
// oTime::Zone('Africa/Lagos');
oTime::Zone('America/Los_Angeles');


// $dbconfig = array('name' => "aodb", 'user' => "ao", 'pw' => "AO20", 'host' => "ao.co", 'driver' => 'iPDO');
$dbconfig = array('name' => "aodb", 'user' => "ao", 'pw' => "AO20", 'host' => "ao.co", 'driver' => 'iMySQLi');
// $dbconfig = array('name' => "oNONE", 'user' => "ao", 'pw' => "AO20", 'host' => "ao.co", 'driver' => 'iMySQLi');
$db = new oDatabase($dbconfig);
// $db = new oDatabase($dbconfig);
// $db = new oSQLi($dbconfig);
$dbo = $db->dbo();



$v = '';
// $q = "SELECT COUNT(`auid`) FROM `harv_logs`"; #TODO count function
// $q = "INSERT INTO `harv_logs` (`action`) VALUES ('runam')";
// $v = $db->SQL($q);
// $v = $db->isDB('aodemo');
// $v = $db->createDB('ao');
// $v = $db->useDB('ao');
// $q = "SELECT * FROM `harv_logs`";
// $v = $db->deleteTB('hshs');
// $db->deleteTB('user');
// $v = $db->createTB('user');

$var['status'] = 'success';
// $v = $db->SQL('harv_logs', 'status', 'success');



$qry = "SELECT * FROM `harv_logs`";
$ans['SQL'] = $db->runSQL($qry, 'iFetchRow');
$ans['SQLPrep'] = $db->runSQLPrep($qry, 'iFetchRow');
echo oPrint::Neat($ans);