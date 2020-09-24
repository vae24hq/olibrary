<?php
/**AO™ Framework is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Osawere™ O. Anthony - @iamodao - www.osawere.com  © August 2020 | Apache License
 * ============================================================================================
 * INDEX ~ Default File • DEPENDENCY»
 */
/***** [SET & RETURN LANG] *****/
function oLang($lang=''){
if(empty($lang)){
if(!empty($_GET['lang'])){$_SESSION['iLang'] = $_GET['lang'];}
elseif(!empty($_POST['lang'])){$_SESSION['iLang'] = $_POST['lang'];}

if(empty($_SESSION['iLang'])){$_SESSION['iLang'] = 'en';}
$lang = $_SESSION['lang'];
}
else {
$_SESSION['lang'] = $lang;
}
return $lang;
}