<?php
$session = new oSession;
$session->start();
oSSL::Impose(true);
oFile::Inc(oRoute::Path('config'));

$b['Request'] = $_REQUEST;
$b['API'] = oRoute::API();
$b['APP'] = oRoute::APP();
$b['URI'] = oRoute::URI();
$b['Route'] = oRoute::Route();
$b['State'] = oRoute::State();
$b['Action'] = oRoute::Action();
$b['Model'] = oRoute::Model();

echo oPrint::Neat($b);