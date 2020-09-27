<?php
if(!isset($_SESSION)){session_start();}
error_reporting (E_ALL ^ E_DEPRECATED);
#error_reporting(0);

$config['name'] = 'Barclays Africa Group Limited';
$config['brand'] = 'Barclays';
$config['short'] = 'Barclays Africa Group';
$config['acronym'] = 'BAGL';
$config['slogan'] = 'your reliable partner in Oil and Gas';
$config['email'] = 'info';
$config['phone'] = '+234 (0) 805-686-0222';
// $config['domain'] = '';
// $config['baseurl'] = '';
// $config['basepath'] = 'kre8';
require('brax.php');
imposeSSL();
$lang = lang();
?>