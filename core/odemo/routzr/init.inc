<?php
oFile::Inc(oBJCT.'db'.DS.'pdo.inc');
oFile::Inc(oBJCT.'db'.DS.'mysqli.inc');
// $dbconfig = array('name' => "aodb", 'user' => "ao", 'pw' => "AO20", 'host' => "ao.co", 'driver' => 'iPDO');
$dbconfig = array('name' => "aodb", 'user' => "ao", 'pw' => "AO20", 'host' => "ao.co", 'driver' => 'iMySQLi');
// $dbconfig = array('name' => "oNONE", 'user' => "ao", 'pw' => "AO20", 'host' => "ao.co", 'driver' => 'iMySQLi');
$db = new oDatabase($dbconfig);
// $db = new oDatabase($dbconfig);
// $db = new oSQLi($dbconfig);
$dbo = $db->dbo();




// $q = "SELECT COUNT(*) FROM `harv_logs`";
$q = "SELECT * FROM `harv_logs`";
$v = $db->SQL($q);
// $v = $db->isDB('aodemo');
// $v = $db->createDB('aodemo');

echo oPrint::Neat($v);