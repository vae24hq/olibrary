<?php
/* PYPE™ - web development framework [HTML/CSS/PHP/SQL/JS/MORE]
 * PHP | config
 * Dependency »
 */
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('FS') ? null : define('FS', '/');
defined('EXTENSION') ? null : define('EXTENSION','php');

#DEFAULT DIRECTORY
defined('ASSET') ? null : define('ASSET','asset');
	defined('ANIMATION') ? null : define('ANIMATION', ASSET.FS.'animation');
	defined('FAVICON') ? null : define('FAVICON', ASSET.FS.'favicon');
	defined('ICON') ? null : define('ICON', ASSET.FS.'icon');
	defined('SCRIPT') ? null : define('SCRIPT', ASSET.FS.'script');
		defined('CSS') ? null : define('CSS', SCRIPT.FS.'css');
		defined('SPRY') ? null : define('SPRY', SCRIPT.FS.'spry');
		defined('JS') ? null : define('JS', SCRIPT.FS.'js');
defined('BUILD') ? null : define('BUILD','build');
	defined('FORMS') ? null : define('FORMS', BUILD.DS.'_form');
defined('CORE') ? null : define('CORE','core');
	defined('ISAPP') ? null : define('ISAPP', CORE.DS.'isapp');
	defined('PLUGIN') ? null : define('PLUGIN', CORE.DS.'plugin');
	defined('VIEW') ? null : define('VIEW', CORE.DS.'view');
	defined('NOT_FOUND') ? null : define('NOT_FOUND', VIEW.DS.'404.php');
		defined('PIECE') ? null : define('PIECE', VIEW.DS.'piece');
defined('DESIGN') ? null : define('DESIGN','design');
	defined('SLICE') ? null : define('SLICE', DESIGN.DS.'slice');
	defined('SUBNAV ') ? null : define('SUBNAV', SLICE.DS.'subnav');
defined('STORAGE') ? null : define('STORAGE','storage');
	defined('PASSPORT ') ? null : define('PASSPORT', STORAGE.DS.'passport');
	
defined('DBCONNECTION') ? null : define('DBCONNECTION', CORE.DS.'engine'.DS.'dbconnect.php');
?>