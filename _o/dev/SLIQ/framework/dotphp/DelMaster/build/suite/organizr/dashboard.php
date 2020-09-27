<?php
oFile::load('auth','modelizr');
oFile::load('auth','utilizr');
$iActiveUser = doAuth();

$view = oFile::prepare('dashboard','viewzr');
if(file_exists($view)){include $view;}
?>