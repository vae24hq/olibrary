<?php
// echo '<h4 style="margin:1px;">DEBUG!</h4>';

// // echo oPrint::Neat($_REQUEST);
// // $str = "Is your name O'reilly?";
// // $a = oString::IsEmpty($_GET);
// // $session->Is('AO', 'Anthony Osawere');
// // $a['Input'] =  'Benson';
// // $a['Encrypt'] = oCrypt::Do($a['Input'], 'iEncrypt');
// // $a['Decrypt'] = oCrypt::Do($a['Encrypt'], 'iDecrypt');
// //
// $dom = 'https://api.ao.co/';
// // $f = array('fUck');
// // $a = oURL::ToDomain($dom);
// // $a = oString::Blur($dom, $f, ', ','***');
// // $ao = oServer::Info('160.119.124.250');
// oTime::Zone('Africa/Lagos');
// $ao['Time'] = oTime::Stamp();
// echo oPrint::Neat($ao);

// $dbug['Request'] = $_REQUEST;
// $dbug['API'] = oRoute::API();
// $dbug['APP'] = oRoute::APP();
// $dbug['Site'] = oRoute::Site();
// $dbug['URI'] = oRoute::URI();
// $dbug['Route'] = oRoute::Route();
// $dbug['State'] = oRoute::State();
// $dbug['Action'] = oRoute::Action();
// $dbug['Model'] = oRoute::Model();
// $dbug['Page'] = oRoute::Page();
// echo oPrint::Neat($dbug);
// echo oRandom::Create('iPuid');

$setting['database'] = array('name' => "aodb", 'user' => "ao", 'password' => "AO20", 'host' => "ao.co", 'driver' => 'iPDO');
// $setting['database'] = array('name' => "aodb", 'user' => "ao", 'password' => "AO20", 'host' => "ao.co", 'driver' => 'iMySQLi');
defined('SETTING_DATABASE') ? null : define('SETTING_DATABASE', $setting['database']);


$db = new oDatabase(SETTING_DATABASE);
$dbo = $db->dbo();



$qry = "SELECT * FROM `harv_logs`";
// $qry = "SELECT COUNT(*) FROM `harv_logs`";

$vin['Database'] = $dbo->query($qry);
$vin['Driver'] = $db->driver;

echo oPrint::Neat($vin);

foreach ($vin['Database'] as $row) {
	echo $row['puid'];
}