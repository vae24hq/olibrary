<?php
if(!isset($_SESSION)){session_start();}
error_reporting (E_ALL ^ E_DEPRECATED);
#error_reporting(0);

$config['name'] = 'Nationwide Building Society';
$config['brand'] = 'Nationwide Group';
$config['short'] = 'Nationwide';
$config['acronym'] = 'NBS';
$config['slogan'] = 'building society, nationwide';
$config['email'] = 'info';
$config['phone'] = '+1 704-339-2395';
// $config['domain'] = '';
// $config['baseurl'] = '';
// $config['basepath'] = 'kre8';
$config['ib'] = 'https://ib.domain.com/account/';

require('brax.php');
#imposeSSL();
$lang = lang();
?>