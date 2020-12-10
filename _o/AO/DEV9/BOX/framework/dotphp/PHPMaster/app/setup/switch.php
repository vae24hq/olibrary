<?php
//========== INITIALIZE ==========//
if(empty($iKonfig)){
	$odao = new ODAO();
}
else {
	$odao = new ODAO($iKonfig);
}
?>