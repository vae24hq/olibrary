<?php
#SETTING
// $setting['project'] = array('name' => "WOWCatholic", 'version' => "Alpha-0.0.1", 'mode' => 'development');
// $setting['database'] = array('name' => "ao_one", 'user' => "ao", 'password' => "AO20", 'host' => "ao.co", 'driver' => 'iPDO');
$setting['database'] = array('user' => "ao", 'password' => "AO20", 'host' => "ao.co", 'driver' => 'iPDO');
$setting['database_two'] = array('name' => "ao_two", 'user' => "ao", 'password' => "AO20", 'host' => "ao.co", 'driver' => 'iPDO');
defined('CONFIG') ? null : define('CONFIG', $setting);