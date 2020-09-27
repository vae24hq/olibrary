<?php
/* PYPE™ - web development framework [HTML/CSS/PHP/SQL/JS/MORE]
 * PHP | switch
 * Dependency »
 */
require('config.php');
require('build/setting.php');

require('engine/utility/session.php');
require('engine/utility/device.php');

require('engine/utility/time.php');
setTimeZone();

require('engine/utility/title.php');
require('engine/utility/meta.php');
require('engine/utility/document.php');
require('engine/utility/string.php');
require('engine/utility/url.php');
require('engine/utility/greeting.php');
require('engine/utility/pagination.php');

require('engine/function/crypt.php');
require('engine/function/randomize.php');
require('engine/function/redirect.php');

require('engine/class/loader.php');

$pypeLoader = new Loader;
$pypeModule = $pypeLoader->get('module');
$pypeOperation = $pypeLoader->get('operation');
$pypeAction = $pypeLoader->get('action');
$pypeTitle = $pypeLoader->get('title');
$pypeContent = $pypeLoader->get('content');

$moduleTitle = $pypeModule.' '.$pypeOperation;

$isDevice = deviceIsA();

require(DBCONNECTION);

require(ISAPP.DS.'func.layout.php');
require(ISAPP.DS.'getsqlvaluestring.php');
require(ISAPP.DS.'activeuser.php');
require(ISAPP.DS.'sql.php');
require(ISAPP.DS.'func.isnav.php');
require(ISAPP.DS.'func.notify.php');
require(ISAPP.DS.'func.restrict.php');
require(ISAPP.DS.'func.autologin.php');
require(ISAPP.DS.'util.rs.php');
require(ISAPP.DS.'func.isloggedinuser.php');
require(ISAPP.DS.'examquestionresult.php');
require(ISAPP.DS.'func.math.php');
require(ISAPP.DS.'func.gp.php');
?>