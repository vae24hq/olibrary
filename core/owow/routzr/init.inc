<?php
#REQUIRED TO UNSET INC METHOD
if(isset($inc_path)){unset($inc_path);}
if(isset($inc_required)){unset($inc_required);}
if(isset($inc_once)){unset($inc_once);}

#INITIALIZE
$session = new oSession;
$session->start();
oSSL::impose(true);
oFile::Inc(oRoute::path('setting'));
$model = oRoute::model();
// // $pathz['organizr'] = oRoute::path('organizr');
// // $state = oRoute::state();
// // $action = oRoute::action();
// // $source = oRoute::path('source');

// #BEGIN API CODEBASE
// if(oRoute::api() != false){
// }
// #END API CODEBASE





// #BEGIN APP CODEBASE
// if(oRoute::app() != false){
// 	// require ($pathz['organizr'].'app'.DS.oRoute::model().'.inc');
// }
// #END APP CODEBASE





// #BEGIN SITE CODEBASE
// if(oRoute::site() != false){
// }
// #END SITE CODEBASE

// // if(oRoute::site() != false){
// 	// oFile::Inc(oRoute::path('themezr').'site.inc');
// 	// $page = oRoute::page();
// 	// echo oPrint::Neat(CONFIG);
// // }