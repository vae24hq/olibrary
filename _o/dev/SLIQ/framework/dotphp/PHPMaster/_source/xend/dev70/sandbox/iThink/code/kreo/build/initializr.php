<?php
/*----------  Separator  ----------*/
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('PS') ? null : define('PS', '/');


/*----------  Directory  ----------*/
defined('CRUX') ? null : define('CRUX', 'crux'.DS);
	defined('KLASS') ? null : define('KLASS', CRUX.'klass'.DS);
	defined('LIBRA') ? null : define('LIBRA', CRUX.'libra'.DS);
	defined('PLUG') ? null : define('PLUG', CRUX.'plug'.DS);

defined('BUILD') ? null : define('BUILD', 'build'.DS);
	defined('LAYOUT') ? null : define('LAYOUT', BUILD.'layout'.DS);
		defined('PIECE') ? null : define('PIECE', LAYOUT.'piece'.DS);
			defined('BIT') ? null : define('BIT', PIECE.'bit'.DS);
			defined('SLICE') ? null : define('SLICE', PIECE.'slice'.DS);
		defined('THEME') ? null : define('THEME', LAYOUT.'theme'.DS);
		defined('VIEW') ? null : define('VIEW', LAYOUT.'view'.DS);

	defined('SUITE') ? null : define('SUITE', BUILD.'suite'.DS);
		defined('MODELIZR') ? null : define('MODELIZR', SUITE.'modelizr'.DS);
		defined('ORGANIZR') ? null : define('ORGANIZR', SUITE.'organizr'.DS);
		defined('UTILIZR') ? null : define('UTILIZR', SUITE.'utilizr'.DS);

require('config'.DS.'path.php');
require('config'.DS.'setting.php');
require('config'.DS.'meta.php');
require('config'.DS.'database.php');

/*---------- Independent library ----------*/
require(LIBRA.'helper.php');
require(LIBRA.'switch.php');
require(KLASS.'string.php');

/*---------- Cleanup/Formatting library ----------*/
require(LIBRA.'cleanup.php');
require(LIBRA.'base.php');

/*---------- Core library ----------*/
require(KLASS.'kreo.php');
kreo::setting($oCIData);
require(LIBRA.'auxiliary.php');

/*---------- Application library ----------*/
require('config'.DS.'app.php');
?>