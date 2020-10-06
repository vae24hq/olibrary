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