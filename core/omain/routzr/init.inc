<?php
$session = new oSession;
$session->start();
oSSL::Impose(true);
oFile::Inc(oRoute::Path('config'));

#Database connection
$db = new oDatabase(SETTING_DATABASE, 'iPDO'); #$db = new oDatabase(SETTING_DATABASE, 'iMySQLi');
$dbo =  $db->connection;

#For *site
if(oRoute::Site()){
}

#For *api
elseif(oRoute::API()){
}

#For *app
elseif(oRoute::APP()){
}



#DEV
// $sql = 'SELECT * FROM `parisho`';
// foreach($dbo->query($sql) as $row){echo $row['name'];}
// echo oPrint::Neat($qry['name']);

$v['Ra'] = oRandom::Create('iSuid');
$v['Pass'] = 'Toni';
$v['Passw'] = oCrypt::Password($v['Pass']);
echo oPrint::Neat($v);
