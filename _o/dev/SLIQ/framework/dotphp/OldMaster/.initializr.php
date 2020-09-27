<?php
//========== SEPARATOR ==========//
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('PS') ? null : define('PS', '/');


//========== DIRECTOR STRUCTURE ==========//
# Define APP DS
defined('APP') ? null : define('APP', 'app'.DS);
	defined('BUILD') ? null : define('BUILD', APP.'build'.DS);
		defined('LAYOUT') ? null : define('LAYOUT', BUILD.'layout'.DS);
			defined('SLICEZR') ? null : define('SLICEZR', LAYOUT.'slicezr'.DS);
				defined('BIT') ? null : define('BIT', SLICEZR.'bit.');
			defined('VIEWZR') ? null : define('VIEWZR', LAYOUT.'viewzr'.DS);
		defined('SUITE') ? null : define('SUITE', BUILD.'suite'.DS);
			defined('APIZR') ? null : define('APIZR', SUITE.'apizr'.DS);
			defined('MODELIZR') ? null : define('MODELIZR', SUITE.'modelizr'.DS);
			defined('ORGANIZR') ? null : define('ORGANIZR', SUITE.'organizr'.DS);
		defined('UTILIZR') ? null : define('UTILIZR', BUILD.'utilizr'.DS);


# Define ENGINE DS
defined('ODAO') ? null : define('ODAO', 'odao'.DS);
	defined('BOND') ? null : define('BOND', ODAO.'bond'.DS);
	defined('CORE') ? null : define('CORE', ODAO.'core'.DS);
	defined('LIBRY') ? null : define('LIBRY', ODAO.'libry'.DS);

# Define APP's UPLOAD PATH
defined('DATA') ? null : define('DATA', APP.'upload'.DS);

# Using HTACCESS for PATH
defined('ASSET') ? null : define('ASSET', 'asset'.PS);
defined('JS') ? null : define('JS', 'js'.PS);
defined('CSS') ? null : define('CSS', 'css'.PS);
defined('AUDIO') ? null : define('AUDIO', 'audio'.PS);
defined('VIDEO') ? null : define('VIDEO', 'video'.PS);
defined('DOC') ? null : define('DOC', 'document'.PS);
defined('IMG') ? null : define('IMG', 'image'.PS);
defined('ICON') ? null : define('ICON', 'icon'.PS);
defined('FONT') ? null : define('FONT', 'font'.PS);
defined('PLUG') ? null : define('PLUG', 'plugin'.PS);
defined('UPLOAD') ? null : define('UPLOAD', 'upload'.PS);


# Important Settings
#define('BASEPATH', $system_path);


//========== LIBRARY ==========//
require APP.'.config.php';
require CORE.'session.php';
require CORE.'helper.php';
require CORE.'ofile.php';
require CORE.'db.php';
require ODAO.'odao.php';


//========== INITIALIZE ==========//
$oAPP = odao::instantiate();
$oDB = db::connect();
?>