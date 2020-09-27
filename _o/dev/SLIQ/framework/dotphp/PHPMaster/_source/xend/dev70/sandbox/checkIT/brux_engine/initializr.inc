<?php
/* BRUX™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by ODAO™ OSAWERE [@iamodao - www.osawere.com] using PHP, SQL, HTML, CSS, JS & derived technology.
 * © June 2018 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | brux•Initializer ~ load libraries
 */

//========== SEPARATOR ==========//
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('PS') ? null : define('PS', '/');

//========== DIRECTOR STRUCTURE ==========//
defined('APP') ? null : define('APP', 'app');

	// Using HTACCESS for assets
	defined('STYLE') ? null : define('STYLE', 'style'.PS);
	defined('FONT') ? null : define('FONT', 'font'.PS);
	defined('AUDIO') ? null : define('AUDIO', 'audio'.PS);
	defined('DOCUMENT') ? null : define('DOCUMENT', 'document'.PS);
	defined('IMAGE') ? null : define('IMAGE', 'image'.PS);
	defined('VIDEO') ? null : define('VIDEO', 'video'.PS);
	defined('SCRIPT') ? null : define('SCRIPT', 'script'.PS);
	defined('DOWNLOAD') ? null : define('DOWNLOAD', 'download'.PS);
	defined('UPLOAD') ? null : define('UPLOAD', APP.DS.'asset'.DS.'upload'.DS);

	defined('BUILD') ? null : define('BUILD', APP.'build'.DS);
		defined('API') ? null : define('API', BUILD.'api'.DS);
		defined('LAYOUT') ? null : define('LAYOUT', BUILD.'layout'.DS);
			defined('DESGIN') ? null : define('DESGIN', LAYOUT.'design'.DS);
				defined('SNIPPET') ? null : define('SNIPPET', LAYOUT.'piece'.DS.'bit'.DS);
				defined('SLICE') ? null : define('SLICE', LAYOUT.'piece'.DS.'slice'.DS);
			defined('VIEW') ? null : define('VIEW', LAYOUT.'view'.DS);

		defined('SUITE') ? null : define('SUITE', BUILD.'suite'.DS);
			defined('MODELIZR') ? null : define('MODELIZR', SUITE.'modelizr'.DS);
			defined('ORGANIZR') ? null : define('ORGANIZR', SUITE.'organizr'.DS);
			defined('UTILIZR') ? null : define('UTILIZR', SUITE.'utilizr'.DS);

	defined('CONFIG') ? null : define('CONFIG', APP.'config'.DS);
		defined('EXTRA') ? null : define('EXTRA', CONFIG.'extra'.DS);
		defined('META') ? null : define('META', CONFIG.'meta'.DS);
		defined('SLIDE') ? null : define('SLIDE', CONFIG.'slide'.DS);

defined('ENGINE') ? null : define('ENGINE', 'brux'.DS);
	defined('LIBRY') ? null : define('LIBRY', ENGINE.'libry'.DS);
		defined('AUXIL') ? null : define('AUXIL', LIBRY.'auxiliary'.DS);
		defined('RELATIV') ? null : define('RELATIV', LIBRY.'relative'.DS);
		defined('CRUX') ? null : define('CRUX', LIBRY.'vital'.DS);
	defined('PLUG') ? null : define('PLUG', ENGINE.'plug'.DS);

/**===========================================================================
	REQUIRE CONFIGURATION & META DATA
===========================================================================**/
require CONFIG.'setting.inc';
require EXTRA.'db.inc';

require META.'title.inc';
require META.'description.inc';
require META.'keyword.inc';
require META.'heading.inc';

require SLIDE.'home.inc';

/**===========================================================================
	REQUIRE CORE & FOUNDATION LIBRARY
===========================================================================**/
require CRUX.'session.inc';
require CRUX.'text.inc';

// require CRUX.'helper.php';
// require CRUX.'cyar.php';

/**===========================================================================
	INITIALIZATION SETTINGS
===========================================================================**/
Session::start();
// CYAR::instantiate();
// Helper::instantiate();
// Helper::setReport();
// Helper::setSSL();
// Helper::docHTTP();
//

/**===========================================================================
	AUXILIARY LIBRARY
===========================================================================**/
require AUXIL.'form.inc';
// require LIBRY.'device.php';
// require LIBRY.'period.php';

// require LIBRY.'crud.php';
// require LIBRY.'link.php';
// require LIBRY.'markup.php';

/**===========================================================================
	APPLICATION SPECIFIC LIBRARY
===========================================================================**/
// require(UTILIZR.'library.php');
//
//
//
//
//
//
//
//
//
//
//
// require('config'.DS.'path.php');
// require('config'.DS.'setting.php');
// require('config'.DS.'meta.php');
// require('config'.DS.'database.php');

// /*---------- Independent library ----------*/
// require(LIBRA.'helper.php');
// require(LIBRA.'switch.php');
// require(KLASS.'string.php');

// ---------- Cleanup/Formatting library ----------
// require(LIBRA.'cleanup.php');
// require(LIBRA.'base.php');

// /*---------- Core library ----------*/
// require(KLASS.'kreo.php');
// kreo::setting($oCIData);
// require(LIBRA.'auxiliary.php');

// /*---------- Application library ----------*/
// require('config'.DS.'app.php');
