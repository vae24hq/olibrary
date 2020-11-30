<?php
require oRoute::path('config', true);
$session = new oSession;
$session->start();
oSSL::impose(true);
oTime::zone('Africa/Lagos');

// echo $path = oRoute::path('cloudzr');
$config['database']['name'] = 'AODB.db3';
$config['database']['host'] = oRoute::path('cloudzr');
$db = new oSQLite($config['database']);