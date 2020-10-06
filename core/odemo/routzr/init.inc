<?php
$session = new oSession;
$session->start();
oSSL::Impose(true);
oFile::Inc(oRoute::Path('config'));

$b['uri'] = oRoute::URI();
$b['model'] = oRoute::Model();
$b['action'] = oRoute::Action();
$b['state'] = oRoute::State();
echo oPrint::Neat($b);