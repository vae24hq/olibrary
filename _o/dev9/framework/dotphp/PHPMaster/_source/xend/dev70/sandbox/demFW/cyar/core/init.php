<?php
/* CYAR™ framework is an evolving library for rapid & efficient development of modem responsive static or dynamic website and applications.
 * Built and maintained at OIAVO™ using PHP, MySQL, HTML, CSS, JS & derived technology. Version 0.0.1 | CYAR™ Web framework © 2016
 * ========================================================================================================================================
 * PHP | core::init ~ initialization
 */

//-------------- Define separators ---------------
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('PS') ? null : define('PS', '/');


//-------------- Define directory ---------------
	
defined('PATH_ASSET') ? null : define('PATH_ASSET', 'asset');
	defined('PATH_CSS') ? null : define('PATH_CSS', PATH_ASSET);
	defined('PATH_FAVICON') ? null : define('PATH_FAVICON', PATH_ASSET.PS.'favicon');
	defined('PATH_IMG') ? null : define('PATH_IMG', PATH_ASSET.PS.'image');
		defined('PATH_SLIDE') ? null : define('PATH_SLIDE', PATH_IMG.PS.'slide');
	defined('PATH_JS') ? null : define('PATH_JS', PATH_ASSET.PS.'js');
	defined('PATH_UPLOAD') ? null : define('PATH_UPLOAD', PATH_ASSET.PS.'upload');
	
	defined('DIR_UPLOAD') ? null : define('DIR_UPLOAD', PATH_ASSET.DS.'upload');

defined('BUILD') ? null : define('BUILD', 'build');
	defined('DIR_API') ? null : define('DIR_API', BUILD.DS.'api');
	defined('DIR_MODEL') ? null : define('DIR_MODEL', BUILD.DS.'model');
	defined('DIR_ORGANIZER') ? null : define('DIR_ORGANIZER', BUILD.DS.'organizer');
	defined('DIR_PIECE') ? null : define('DIR_PIECE', BUILD.DS.'piece');
	defined('DIR_VIEW') ? null : define('DIR_VIEW', BUILD.DS.'view');

defined('CORE') ? null : define('CORE', 'core');
	defined('OBJ') ? null : define('OBJ', CORE.DS.'object');
	defined('PLUG') ? null : define('PLUG', CORE.DS.'plugin');
	defined('UTIL') ? null : define('UTIL', CORE.DS.'utility');


//-------------- Begin default check and reporting ---------------
#toDO [ERROR_CHECKER] ~ check that CONSTANTs (everything) is defined and properly set

#PHP error reporting settings
if(SET_MODE == 2){error_reporting(E_ALL | E_STRICT);}
elseif(SET_MODE == 3){error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));}
elseif(SET_MODE == 4){error_reporting(0);}


//-------------- Load of library(s), run initialization and custom configuration ---------------
require_once UTIL.DS.'vital.php';

require_once OBJ.DS.'session.php';
session::start();
require_once PLUG.DS.'detect.php';
require_once OBJ.DS.'device.php';
require_once UTIL.DS.'browser.php';
require_once OBJ.DS.'cyar.php';
cyar::setting($config);

require_once UTIL.DS.'relative.php';
require_once OBJ.DS. 'link.php';
require_once OBJ.DS.'markup.php';


/** from DEV.io
require_once(UTIL.DS.'rendition.php');
require_once(UTIL.DS.'image.php');
require_once(UTIL.DS.'ip.php');
require_once(UTIL.DS.'randomize.php');
if(cyar::module()=='logout'){session::reset(); $_SESSION['loggedin'] = 'no'; $_SESSION['user_bin'] = '';}*/
?>