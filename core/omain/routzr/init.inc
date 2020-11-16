<?php
oFile::inc(oRoute::path('setting'));
$db = new oDatabase(CONFIG['database']);
$dbo = $db->dbo;


$dbug['Create'] = $db->create('zdba', 'iTable');
// $dbug['Destroy DB'] = $db->destroy('zdba', 'iDatabase');


echo oPrint::Neat($dbug);