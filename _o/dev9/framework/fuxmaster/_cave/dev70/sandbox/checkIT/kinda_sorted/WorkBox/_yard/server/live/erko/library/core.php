<?php 
require("utility/func.session.php");
require_once('plugin/mobile-detect.php');
require_once("utility/func.device.php"); 
require_once("utility/class.loader.php");
require_once("utility/util.time.php");
require_once("utility/util.greeting.php");
require_once("utility/util.user.php");
require_once("utility/func.crypt.php");
require_once("utility/util.isloggedin.php");
require_once("utility/func.randomize.php");
require_once("utility/util.replace.php");
require_once("utility/func.formatsizeunit.php");

$cigna_deviceIsA = deviceIsA();
$cignaLoader = new Loader;
$cignaApp = 'erko™';
$cignaModule = $cignaLoader->get('module');
setTimeZone();
?>