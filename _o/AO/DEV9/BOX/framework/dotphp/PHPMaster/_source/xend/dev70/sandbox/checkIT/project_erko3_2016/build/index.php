<?php
/* erko™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by DeronEllse™ [@deronellse - www.deronellse.com/about] using PHP, MySQL, HTML, CSS, JS & derived technology.
 * © February 2016 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | build::index ~ base configuration
 */


// separators
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('PS') ? null : define('PS', '/');

// path definition
defined('ASSET') ? null : define('ASSET', 'asset');
	defined('PATH_BANNER') ? null : define('PATH_BANNER', ASSET.PS.'banner');
	defined('PATH_CSS') ? null : define('PATH_CSS', ASSET.PS.'css');
	defined('PATH_ICON') ? null : define('PATH_ICON', ASSET.PS.'icon');
	defined('PATH_JS') ? null : define('PATH_JS', ASSET.PS.'js');
	defined('PATH_MEDIA') ? null : define('PATH_MEDIA', ASSET.PS.'media');
	defined('PATH_SLIDE') ? null : define('PATH_SLIDE', ASSET.PS.'slide');
	defined('PATH_CAPTCHA') ? null : define('PATH_CAPTCHA', PATH_MEDIA.PS.'captcha'.PS);

defined('BUILD') ? null : define('BUILD', 'build');
	defined('LAYOUT') ? null : define('LAYOUT', BUILD.DS.'layout');
	defined('PIECE') ? null : define('PIECE', BUILD.DS.'piece');
	defined('SUITE') ? null : define('SUITE', BUILD.DS.'suite');
		defined('API') ? null : define('API', SUITE.DS.'api');
		defined('MODEL') ? null : define('MODEL', SUITE.DS.'model');
		defined('ORGANIZER') ? null : define('ORGANIZER', SUITE.DS.'organizer');
	defined('VIEW') ? null : define('VIEW', BUILD.DS.'view');

defined('LIBRARY') ? null : define('LIBRARY', 'crux');
	defined('CORE') ? null : define('CORE', LIBRARY.DS.'core');
	defined('PLUG') ? null : define('PLUG', LIBRARY.DS.'plug');
	defined('UTIL') ? null : define('UTIL', LIBRARY.DS.'utility');

defined('DATAHOUSE') ? null : define('DATAHOUSE', 'data'.DS);

//load library
require_once(BUILD.DS.'setting.php');
require(LIBRARY.DS.'index.php');
erko::setting($config);

//include utilities as you require
require_once(UTIL.DS.'slide.php');
require_once(UTIL.DS.'rendition.php');
require_once(UTIL.DS.'image.php');
#require_once(UTIL.DS.'ip.php');
#require_once(UTIL.DS.'randomiz.php');

if(erko::module()=='logout'){session::reset(); $_SESSION['loggedin'] = 'no'; $_SESSION['user_bin'] = '';}
?>