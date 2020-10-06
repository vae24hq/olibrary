<?php
$session = new oSession;
$session->start();
oSSL::Impose(true);
oFile::Inc(oRoute::Path('config'));
if(oRoute::Site()){
	echo oRoute::Site();
}