<?php
#SETTING
$setting['project'] = array('name' => "WOWCatholic", 'version' => "Alpha-0.0.1", 'mode' => 'development');
$setting['database'] = array('name' => "wowcatholic", 'user' => "ao", 'pw' => "AO20", 'host' => "ao.co", 'driver' => 'iPDO');
$setting['old_database'] = array('name' => "wowcatholic_main", 'user' => "ao", 'pw' => "AO20", 'host' => "ao.co", 'driver' => 'iPDO');
defined('CONFIG') ? null : define('CONFIG', $setting);