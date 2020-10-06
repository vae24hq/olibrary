<?php
$session = new oSession;
$session->start();
oSSL::Impose(true);
oFile::Inc(oRoute::Path('config'));
if(!oRoute::API() && !oRoute::APP()){

}