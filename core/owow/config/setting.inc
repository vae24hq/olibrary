<?php
//========== PROJECT SETTING ==========
$setting['project'] = array('name' => "WOWCatholic", 'version' => "Alpha-0.0.1");


//========== DATABASE SETTING ==========
$setting['database'] = array('name' => "wowcatholic", 'user' => "ao", 'password' => "AO20", 'host' => "ao.co", 'driver' => 'iPDO');


#SETTING
defined('CONFIG') ? null : define('CONFIG', $setting);