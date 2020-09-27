<?php
//========== SEPARATOR ==========//
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('PS') ? null : define('PS', '/');


//========== DIRECTOR STRUCTURE ==========//
	// Using HTACCESS for PATH
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

	// Including DIRECTORY
	defined('DOT') ? null : define('DOT', 'dot'.DS);
		defined('BOND') ? null : define('BOND', DOT.'bond'.DS);
		defined('LIBRY') ? null : define('LIBRY', DOT.'core'.DS);


	defined('APP') ? null : define('APP', 'app'.DS);
		defined('TO_UPLOAD') ? null : define('TO_UPLOAD', APP.'file'.DS);
		defined('VIEW') ? null : define('VIEW', APP.'view'.DS);
			defined('BIT') ? null : define('BIT', VIEW.'bit'.DS);
			defined('OHTTP') ? null : define('OHTTP', VIEW.'ohttp'.DS);
		defined('SUITE') ? null : define('SUITE', APP.'code'.DS);
			defined('API') ? null : define('API', SUITE.'api'.DS);
			defined('MODELIZR') ? null : define('MODELIZR', SUITE.'modelizr'.DS);
			defined('ORGANIZR') ? null : define('ORGANIZR', SUITE.'organizr'.DS);
			defined('UTILIZR') ? null : define('UTILIZR', SUITE.'utilizr'.DS);
?>