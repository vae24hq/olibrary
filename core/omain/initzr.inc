<?php
// error_reporting(0);
require oRoute::path('config', true);
$session = new oSession;
$session->start();
oSSL::impose(true);
oTime::zone('Africa/Lagos');

$config['database']['host'] = oRoute::path('cloudzr');
$config['database']['name'] = $config['database']['name'].'.db3';
$db = new oSQLite($config['database'], true);


$dbug['CREATE_TABLE'] = $db->createTB('ao', ['name' => 'TEXT', 'email' => 'UNIQUE',]);

$config['debug'] = $dbug;