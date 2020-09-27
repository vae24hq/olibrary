<?php
function isPHP($process='version'){
	$result = 'e204';
	if($process=='version'){$result = phpversion();}

	if(isset($result)){return $result;}
}

function isApache($process='version'){
	$result = 'e204';
	if($process=='version'){$result = apache_get_version();}

	if(isset($result)){return $result;}
}
?>