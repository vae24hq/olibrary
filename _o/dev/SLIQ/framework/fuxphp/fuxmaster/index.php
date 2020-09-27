<?php
$initApp = '.initializ.php';
if(file_exists($initApp)){require $initApp;}

//========== ROUTE APP ==========//
oFile::add('_cave/dev70/ibruv'); #remove on production
$fuxApp->router();
?>