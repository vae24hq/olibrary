<?php
/* iQYRE™ - a micro web application development framework by iCYZa™ © 2015
 * Program -> core.php
 */

#PATH SEPARATOR
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('FS') ? null : define('FS', '/');

require('session.php');

require('plug.get-ip.php');
require('plug.mobile-detect.php');

require('ie.php');
require('string.php');
require('link.php');
require('time.php');
require('device.php');

require('iqyre.php');
?>