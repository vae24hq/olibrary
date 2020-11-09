<?php
#REQUIRED TO UNSET INC METHOD
if(isset($inc_path)){unset($inc_path);}
if(isset($inc_required)){unset($inc_required);}
if(isset($inc_once)){unset($inc_once);}

#INITIALIZE
$session = new oSession;
$session->start();
oSSL::impose(true);
oTime::zone('Africa/Lagos');
oFile::inc(oRoute::path('setting'));
$routa['source'] = oRoute::path('source');
$routa['model'] = oRoute::model();
$routa['action'] = oRoute::action();
$routa['state'] = oRoute::state();
$routa['api'] = $routa['source'].oROUTZR.'api.inc';
$routa['app'] = $routa['source'].oROUTZR.'app.inc';
$routa['site'] = $routa['source'].oROUTZR.'site.inc';
$routa['utilizr'] = oRoute::path('utilizr').$routa['model'].'.inc';
oFile::inc($routa['source'].oMODELIZR.'wow.inc');
$wow = new WOWCa(CONFIG);
// $state = oRoute::state();
// $action = oRoute::action();

#BEGIN API CODE
if(oRoute::api() !== false){
	oFile::exist($routa['api']);
	require $routa['api'];
}
#END API CODE




#BEGIN APP CODE
elseif(oRoute::app() !== false){
	oFile::exist($routa['app']);
	require $routa['app'];
}
#END APP CODE





#BEGIN SITE CODE
elseif(oRoute::site() !== false){
	oFile::exist($routa['site']);
	require $routa['site'];
}
#END SITE CODE