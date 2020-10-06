<?php
$osession = new oSession;
$osession->start();
oSSL::Impose(true);
oFile::Inc(oRoute::Path('config'));