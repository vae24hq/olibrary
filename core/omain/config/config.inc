<?php
//========== PROJECT SETTINGS ==========
$setting['project'] = array('name' => "HarvestPad", 'version' => "Alpha-0.0.4");


//========== DATABASE SETTINGS ==========
$setting['database'] = array('name' => "aodb", 'user' => "ao", 'password' => "AO20", 'host' => "ao.co", 'driver' => 'iPDO');


#DEFINING CONSTANTS
defined('SETTING_PROJECT') ? null : define('SETTING_PROJECT', $setting['project']);
defined('SETTING_DATABASE') ? null : define('SETTING_DATABASE', $setting['database']);