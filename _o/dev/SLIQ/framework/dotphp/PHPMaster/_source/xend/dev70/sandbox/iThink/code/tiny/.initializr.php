<?php
if(!isset($_SESSION)){session_start();}
require 'source/konfig.php';



/**===========================================================================
	CORE & FOUNDATION LIBRARY
===========================================================================**/
require '.tiny/crux/character.php';
require '.tiny/crux/helper.php';

require '.tiny/tiny.php';



/**===========================================================================
	INITIALIZATION SETTINGS
===========================================================================**/
#$tinyApp = Tiny::instantiate('o_config');
#Helper::instantiate('o_config');
#Helper::setReport();
#Helper::setSSL();
Helper::runErrorDoc();


/**===========================================================================
	AUXILIARY LIBRARY
===========================================================================**/
#require_once '.tiny/auxil/mysql_pdo.php'; {Pre included by CRUD}
require '.tiny/auxil/crud.php';

require '.tiny/auxil/link.php';
require '.tiny/auxil/markup.php';



/**===========================================================================
	APPLICATION SPECIFIC LIBRARY
===========================================================================**/
#require(UTILIZR.'library.php');
?>