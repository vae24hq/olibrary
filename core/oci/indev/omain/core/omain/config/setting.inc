<?php
//========== PROJECT SETTINGS ==========
$setting['project'] = array('name' => "Rimco", 'version' => "Alpha-0.0.4");


//========== DATABASE SETTINGS ==========
$setting['database'] = array('name' => "openbtc", 'user' => "ao", 'password' => "AO20", 'host' => "ao.co", 'driver' => 'iPDO');


#SETTINGS
defined('CONFIG') ? null : define('CONFIG', $setting);