<?php
#DEFINE DIRECTORY
defined('oROOT') ? null : define('oROOT', __DIR__.DS);

defined('oLIBRY') ? null : define('oLIBRY', oROOT.'bry'.DS);
defined('oBOND') ? null : define('oBOND', oLIBRY.'bond'.DS);
defined('oCLASS') ? null : define('oCLASS', oLIBRY.'class'.DS);
defined('oINSTANCE') ? null : define('oINSTANCE', oCLASS.'instance'.DS);
defined('oBJCT') ? null : define('oBJCT', oCLASS.'object'.DS);
defined('oHELPER') ? null : define('oHELPER', oLIBRY.'helper'.DS);
defined('oSTATIC') ? null : define('oSTATIC', oCLASS.'static'.DS);
defined('oFUNC') ? null : define('oFUNC', oLIBRY.'func'.DS);

defined('oCORE') ? null : define('oCORE', oROOT.'core'.DS);

defined('oCONFIG') ? null : define('oCONFIG', 'config'.DS);
defined('oLAYOUT') ? null : define('oLAYOUT', 'layout'.DS);
defined('oBITZR') ? null : define('oBITZR', oLAYOUT.'bitzr'.DS);
defined('oSLICEZR') ? null : define('oSLICEZR', oLAYOUT.'slicezr'.DS);
defined('oFORMZR') ? null : define('oFORMZR', oLAYOUT.'formzr'.DS);
defined('oTHEMEZR') ? null : define('oTHEMEZR', oLAYOUT.'themezr'.DS);
defined('oVIEWZR') ? null : define('oVIEWZR', oLAYOUT.'viewzr'.DS);

defined('oROUTZR') ? null : define('oROUTZR', 'routzr'.DS);

defined('oSUITE') ? null : define('oSUITE', 'suite'.DS);
defined('oMODELIZR') ? null : define('oMODELIZR', oSUITE.'modelizr'.DS);
defined('oRGANIZR') ? null : define('oRGANIZR', oSUITE.'organizr'.DS);
defined('oUTILIZR') ? null : define('oUTILIZR', oSUITE.'utilizr'.DS);