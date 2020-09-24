<?php
//CONFIG
$oDemo['config'] = array(
	'source' => oRouter::Source(),
	'route' => oRouter::Route(),
	'link' => oRouter::Link(),
	'directory' => array('root' => oRouter::Path('oSourcePath')),
);

#database config
$oDemo['config']['database'] = array('name' => "demo", 'user' => "root", 'password' => "", 'host' => "localhost");


#application UI
$view = $oDemo['config']['directory']['root'].'layout'.DS.'view'.DS.$oDemo['config']['link'].'.inc';
#oFile::InCheck($view);
#require $view;

echo oDump::Neat($oDemo);


#API Prototype
