<?php
$session = new oSession;
$session->start();
oSSL::Impose(true);
oFile::Inc(oRoute::Path('config'));

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
$database = new oDatabase(SETTING_DATABASE, 'iMySQLi');
$database2 = new oDatabase(SETTING_DATABASE);