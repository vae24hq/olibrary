<?php
require oRoute::path('config', true);
$session = new oSession;
$session->start();
oSSL::impose(true);
oTime::zone('Africa/Lagos');

$config['database']['host'] = oRoute::path('cloudzr');
$config['database']['name'] = $config['database']['name'].'.db3';
$db = new oSQLite($config['database'], true);
// $db->backup($dbase);

// $backup = new SQLite3('backup.sqlite');
// $db->backup($config['database']['host'].'backup.db3');