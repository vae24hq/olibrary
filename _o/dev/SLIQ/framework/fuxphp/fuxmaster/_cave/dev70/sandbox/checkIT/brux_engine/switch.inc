<?php
/* BRUX™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by ODAO™ OSAWERE [@iamodao - www.osawere.com] using PHP, SQL, HTML, CSS, JS & derived technology.
 * © June 2018 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | brux•Switch ~ control loading of libraries & directory path
 */

//========== SEPARATOR ==========//

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
const PS = '/';

//========== DIRECTOR STRUCTURE ==========//
const APP = 'app';
	// Using HTACCESS for ASSET
		const STYLE = 'style/';
		const FONT = 'font/';
		const AUDIO = 'audio/';
		const DOCUMENT = 'document/';
		const IMAGE = 'image/';
		const FAVICON = 'favicon/';
		const VIDEO = 'video/';
		const SCRIPT = 'script/';
		const O_FILE = 'file/';
		const O_UPLOADPATH = APP.DS.'asset'.DS.'upload'.DS;
	const BUILD = APP.DS.'build'.DS;
		const API = BUILD.'api'.DS;
		const LAYOUT = BUILD.'layout'.DS;
			const DESGIN = LAYOUT.'design'.DS;
				const BIT = LAYOUT.'piece'.DS.'bit'.DS;
				const SLICE = LAYOUT.'piece'.DS.'slice'.DS;
			const VIEW = LAYOUT.'view'.DS;
		const SUITE = BUILD.'suite'.DS;
			const MODELIZR = SUITE.'modelizr'.DS;
			const ORGANIZR = SUITE.'organizr'.DS;
			const UTILIZR = SUITE.'utilizr'.DS;
	const CONFIG = APP.DS.'config'.DS;
		const EXTRA = CONFIG.'extra'.DS;
		const META = CONFIG.'meta'.DS;
		const SLIDE = CONFIG.'slide'.DS;
const BRUX = 'brux'.DS;
	const LIBRY = BRUX.'libry'.DS;
		const  AUXIL = LIBRY.'auxiliary'.DS;
		const RELAT = LIBRY.'relative'.DS;
		const VITAL = LIBRY.'vital'.DS;
	const PLUG = BRUX.'plug'.DS;

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
require VITAL.'session.inc';
require VITAL.'text.inc';
require VITAL.'clean.inc';
require VITAL.'base.inc';

require RELAT.'device.inc'; #(This will also instantiate Device class)

require VITAL.'brux.inc';


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
#require AUXIL.'form.inc';
#require AUXIL.'period.inc';

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


// /*---------- Core library ----------*/
// require(KLASS.'kreo.php');
// kreo::setting($oCIData);
// require(LIBRA.'auxiliary.php');

// /*---------- Application library ----------*/
// require('config'.DS.'app.php');
