<?php
require oRoute::path('config', true);
$session = new oSession;
$session->start();
oSSL::impose(true);
oTime::zone('Africa/Lagos');
// echo oPrint::Neat();