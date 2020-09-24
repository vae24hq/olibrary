<?php
/*** BEGIN PROJECT CONFIGURATION ***/
$aHavest['config'] = array(
	'source' => oRouter::Source(),
	'route' => oRouter::Route(),
	'link' => oRouter::Link(),

	#directory
	'directory' => array(
		'root' => oRouter::Path('oSourcePath'),
	),

	#database
	'database' => array(
		'name' => "aodb",
		'user' => "ao",
		'password' => "AO20",
		'host' => "ao.co",
	),
);
/*** END PROJECT CONFIGURATION ***/


#REQUIRED LIBRARY
oFile::Inc(oCLASS.'database.inc');
oFile::Inc(oCLASS.'json.inc');

$oAPP_SOURCE_DIR = $aHavest['config']['directory']['root'];
oFile::Inc($oAPP_SOURCE_DIR.'program'.DS.'harvest.inc');


#RUN APP
oSession::Start();
$oApp = new HarvestApp($aHavest);

$debug = $oApp->Login('iam', 'oweb');
oJson::Display($debug);