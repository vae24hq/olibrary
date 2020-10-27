<?php
oFile::Inc(oBJCT.'db'.DS.'pdo.inc');
oFile::Inc(oBJCT.'db'.DS.'mysqli.inc');
$dbconfig = array('name' => "aodb", 'user' => "ao", 'pw' => "AO20", 'host' => "ao.co", 'driver' => 'iMySQLi');
$dbconfig = array('name' => "aodb", 'user' => "ao", 'pw' => "AO20", 'host' => "ao.co", 'driver' => 'iPDO');
// $dbconfig = array('name' => "oNONE", 'user' => "ao", 'pw' => "AO20", 'host' => "ao.co", 'driver' => 'iMySQLi');
$db = new oDatabase($dbconfig);
// $db = new oSQLi($dbconfig);
// $db = new oPDO($dbconfig);
$dbo = $db->dbo;

// $AO['DB'] = $db;
// $AO['CLASS'] = $db->dbco;
// $AO['OBJECT'] = $db->dbo();

echo oPrint::Neat($db);



$qry = "SELECT COUNT(*) FROM `harv_logs`";
// $vin['uQuery'] = $db->dbco->query($vin['qry']);
$v = $dbo->query($qry);
echo oPrint::Neat($v);