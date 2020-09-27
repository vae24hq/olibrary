<?php

//========== SEPARATOR ==========//
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('PS') ? null : define('PS', '/');


//========== DIRECTOR STRUCTURE ==========//
	# Define APP DS
	defined('DOAPP') ? null : define('DOAPP', 'odao'.DS);
		defined('LIBRY') ? null : define('LIBRY', DOAPP.'libry'.DS);
		defined('MODELIZR') ? null : define('MODELIZR', DOAPP.'modelizr'.DS);
		defined('ORGANIZR') ? null : define('ORGANIZR', DOAPP.'organizr'.DS);
		defined('UTILIZR') ? null : define('UTILIZR', DOAPP.'utilizr'.DS);
		defined('SLICE') ? null : define('SLICE', DOAPP.'slicezr'.DS);
		defined('VIEW') ? null : define('VIEW', DOAPP.'viewzr'.DS);

		defined('BIT') ? null : define('BIT', SLICE.'piece.');
		defined('LAYOUT') ? null : define('LAYOUT', SLICE.'layout.');

	# Define APP's UPLOAD PATH
		defined('DATA') ? null : define('DATA', 'upload'.DS);


//========== LIBRARY ==========//
require '.config.php';
require LIBRY.'session.php';
require UTILIZR.'helper.php';
require LIBRY.'odao.php';
require LIBRY.'database.php';


//========== INITIALIZE ==========//
$MediPlex = odao::instantiate();
?>